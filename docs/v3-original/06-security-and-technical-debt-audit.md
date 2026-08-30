# 06 — Security & Technical Debt Audit

> **Module**: Vulnerability Assessment, Threat Modeling, Architecture Flaws, Deprecated APIs  
> **Classification**: Critical Technical Debt & Security Review

---

## 1. Security Vulnerability Assessment Matrix

| Vulnerability ID | Severity | Category | Affected Components | Description & Exploit Scenario |
| :--- | :--- | :--- | :--- | :--- |
| **SEC-01** | **CRITICAL** | SQL Injection (CWE-89) | Ubiquitous across all 59 scripts | Direct interpolation of unescaped `$_POST` and `$_GET` variables into SQL query strings. Allows full database dump, authentication bypass, and table dropping. |
| **SEC-02** | **CRITICAL** | Broken Authentication (CWE-287) | `sys/loggedin.php`, `user.php` | Authentication relies entirely on client-controlled cookies (`usernev` and `pass`). Storing plain text password in cookies allows arbitrary user impersonation and admin takeover. |
| **SEC-03** | **HIGH** | Plaintext Password Storage (CWE-256) | `v3_user.pass`, `register_save.php` | Passwords stored without hashing or salting. Database compromise exposes all user credentials immediately. |
| **SEC-04** | **HIGH** | PII / Data Privacy Exposure (GDPR) | `v3_user`, `admin_custominfo.php` | Unencrypted sensitive personal identification data: National ID (`szemig`), Driver's License (`jogsi`), Mother's maiden name (`anynev`), full home addresses. |
| **SEC-05** | **MEDIUM** | Information Disclosure (CWE-209) | `sys/connect.php`, all queries | Extensive use of `or die(mysql_error())` prints internal database structures and query syntax on runtime errors. |
| **SEC-06** | **MEDIUM** | Lack of CSRF Protection (CWE-352) | All POST actions | No Anti-CSRF tokens implemented on state-changing forms (booking creation, user modifications, vehicle deletions). |

---

## 2. Deep Dive: Vulnerability Proof-of-Concepts

### 2.1 SQL Injection in Authentication & Action Scripts
In `admin_cardel2.php`, `admin_carmodsave.php`, and `rent2.php`:
```php
// Vulnerable code in admin_cardel2.php
$carid = $_GET['carid'];
mysql_query ("DELETE FROM v3_auto WHERE autid='$carid'");
```
**Exploit**: An attacker passing `carid=1' OR '1'='1` will execute:
`DELETE FROM v3_auto WHERE autid='1' OR '1'='1';` — emptying the entire vehicle fleet table.

---

### 2.2 Broken Authentication via Cookie Forgery
In `sys/loggedin.php`:
```php
$result = mysql_query ("SELECT v3_user.uid, v3_user.usernev, v3_user.pass, v3_user.szint FROM v3_user");
while($row = mysql_fetch_array($result)){
  if ($row['usernev'] == $_COOKIE['usernev'] AND $row['pass'] == $_COOKIE['pass'] AND $row['szint'] > 0) {
    $loggedin = 1;
    $loggedlevel = $row['szint'];
    $ulogged = $row['uid'];
  }
}
```
**Exploit**: Because `v3_user` credentials can be read via SQLi, any attacker can set browser cookies:
```http
Cookie: usernev=admin; pass=adminpassword
```
and achieve immediate Level 9 Super Administrator access without visiting the login page.

---

## 3. Technical Debt & Runtime Obsolescence

```mermaid
graph LR
    subgraph Legacy Environment ~2008
        PHP52[PHP 5.2 / 5.3]
        ExtMySQL[ext/mysql driver]
        ISO[ISO-8859-2 Encoding]
        GlobalVars[Register Globals / Raw Arrays]
    end

    subgraph Modern Web Standards 2026
        PHP83[PHP 8.2 / 8.3 / 8.4]
        PDO[PDO / MySQLi Prepared Statements]
        UTF8[UTF-8 utf8mb4 Encoding]
        StrictTypes[Strict Typing & Dependency Injection]
    end

    PHP52 -.->|Incompatible / Fatal| PHP83
    ExtMySQL -.->|Removed in PHP 7.0| PDO
    ISO -.->|Character Corruption| UTF8
    GlobalVars -.->|Deprecated| StrictTypes
```

### Key Compatibility Blockers:
1. **`ext/mysql` Extension Removed**: `mysql_connect()`, `mysql_query()`, `mysql_fetch_array()` were deprecated in PHP 5.5 and completely removed in PHP 7.0. The application triggers a fatal `Error: Call to undefined function mysql_connect()` on any modern PHP runtime.
2. **`strftime()` Deprecation**: Used heavily in `rent.php`, `rent2.php`, `admin_allincome.php`. Deprecated in PHP 8.1; returns warnings or fails.
3. **Character Set Mismatch**: Encoded in `ISO-8859-2` (Latin-2). Hungarian special characters (`ő`, `ű`) will display as corrupt mojibake if served over modern UTF-8 default HTTP headers without explicit charset headers.
