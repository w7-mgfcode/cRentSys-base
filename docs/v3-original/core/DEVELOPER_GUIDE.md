# Developer & Maintainer Engineering Handbook

> **Module**: Developer Guide & Codebase Standards  
> **Source Base**: `app/v3-original_2013/`  
> **Target Audience**: Backend Engineers, Maintenance Programmers

---

## 1. Codebase Organization & Inclusion Architecture

The application is structured as a collection of 59 procedural PHP scripts. There are no namespaces, autoloaders, or object-oriented classes.

```
app/v3-original_2013/
├── sys/
│   ├── connect.php             # Database connection singleton script
│   ├── loggedin.php            # Cookie verification routine
│   ├── header.php / footer.php # Layout wrappers
│   ├── menu.php                # Sidebar assembler
│   └── blocks/                 # Sidebar visual components (login, mainmenu, search)
├── photos/                     # Fleet imagery (full & thumb/)
├── rent*.php                   # Public 5-step booking wizard controllers
├── admin*.php                  # Level 9 administrative controllers
├── register*.php               # User registration & modification handlers
└── style.css                   # Global visual styling rules
```

---

## 2. Common Coding Patterns & Conventions

### Pattern 1: Database Query Execution
Queries use legacy `mysql_query()` with inline string concatenation and hard failure:
```php
include ("sys/connect.php");
$result = mysql_query ("SELECT * FROM v3_auto WHERE autid = '$auto'") or die (mysql_error());
while($row = mysql_fetch_array($result)){
    // Process row
}
```

### Pattern 2: Authentication Enforcement
Every administrative script must include `sys/header.php`, `sys/loggedin.php`, and gate execution behind `$loggedlevel == 9`:
```php
<?php
  include ("sys/header.php");
  include ("sys/loggedin.php");
  include ("sys/connect.php");

  if ($loggedlevel == 9) {
      // Execute admin operations
  } else {
      echo 'Nincs jogosultsága ehhez a területhez!';
  }
  include ("sys/footer.php");
?>
```

---

## 3. Core Business Formulas & Calculations

### 1. 24-Hour Rental Duration Rounding Formula (`rent2.php`, `admin_allincome.php`):
$$\Delta t = t_{	ext{end}} - t_{	ext{start}} - 1$$
$$	ext{Rental Days} = \left\lfloor rac{\Delta t}{86400} ightfloor + 1$$
```php
$eleje = strtotime($row['eleje']);
$vege = strtotime($row['vege']);
$kulonbseg = $vege - $eleje - 1;
$nap = (int)($kulonbseg / 86400) + 1;
```

### 2. Vehicle Availability Overlap Detection Query (`rent2.php`, `search.php`):
```sql
SELECT autoid, eleje, vege 
FROM v3_rent 
WHERE autoid = '$autoch' 
  AND (
    (eleje <= '$kezdido' AND vege >= '$kezdido') OR 
    (eleje <= '$vegeido' AND vege >= '$vegeido') OR 
    (eleje >= '$kezdido' AND vege <= '$vegeido')
  )
```

### 3. Historic Hungarian VAT (ÁFA) Calculation (`admin_allincome.php`, `contractor.php`):
$$	ext{Gross Total} = 	ext{Net Total} 	imes rac{6}{5} = 	ext{Net Total} 	imes 1.20$$
```php
$auto_brutto = ($row['autoar'] / 5 * 6);
$kiszall_brutto = (($row['felvar'] + $row['visszar']) / 5 * 6);
```

### 4. Fleet Investor 50% Revenue Share (`admin_allincome.php`):
$$	ext{Investor Net Share} = rac{	ext{Total Net Auto Rent}}{2}$$
$$	ext{Investor Gross Share} = rac{	ext{Total Net Auto Rent}}{5} 	imes 3$$
```php
$investor_netto = ($osszlove / 2);
$investor_brutto = ($osszlove / 5 * 3);
```
