# Installation & Deployment Manual

> **Module**: Installation & Provisioning Guide  
> **Source Artifact**: `schema.sql`  
> **Target Database**: MySQL / MariaDB

---

## 1. Step-by-Step Installation Procedure

### Step 1: Clone or Extract the Codebase
```bash
cd /var/www
git clone https://github.com/w7-mgfcode/cRentSys-base.git crentsys
cd crentsys
```

### Step 2: Create MySQL Database & User
Log into MySQL CLI as administrator:
```sql
CREATE DATABASE `localren_hu` CHARACTER SET latin2 COLLATE latin2_hungarian_ci;

CREATE USER 'localren'@'localhost' IDENTIFIED BY 'tnerLACOL8002';
GRANT ALL PRIVILEGES ON `localren_hu`.* TO 'localren'@'localhost';
FLUSH PRIVILEGES;
```

### Step 3: Import Database Schema & Seed Data
Execute the schema DDL script provided in `docs/v3-original/schema.sql`:
```bash
mysql -u localren -ptnerLACOL8002 localren_hu < docs/v3-original/schema.sql
```

### Step 4: Verify Database Connection Configuration
Ensure [`app/v3-original_2013/sys/connect.php`](file:///home/w7-loqker/w7-workspace/selfbase/w7-mgfcode/repos/cRentSys-base/app/v3-original_2013/sys/connect.php) contains matching credentials:
```php
<?php
  mysql_connect ("localhost", "localren", "tnerLACOL8002") or die (mysql_error());
  mysql_select_db ("localren_hu") or die (mysql_error());
?>
```

### Step 5: Create Initial Administrator Account
Insert the primary administrator account into `v3_user`:
```sql
INSERT INTO `v3_user` (
  `usernev`, `pass`, `szint`, `mail`, `veznev`, `kernev`, `tel`, `regdate`
) VALUES (
  'admin', 'admin123', 9, 'admin@localrent.hu', 'Rendszer', 'Adminisztrátor', '+36704186595', NOW()
);
```

### Step 6: Verify Web Installation
Navigate in your web browser to `http://crentsys.local/index.php`. Verify that the header image renders, the login box appears in the left sidebar, and database errors are absent.
