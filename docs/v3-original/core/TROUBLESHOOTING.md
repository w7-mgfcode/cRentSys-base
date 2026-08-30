# Diagnostic & Troubleshooting Guide

> **Module**: Operational Diagnostics & Remediation  
> **Audience**: Support Engineers, System Administrators

---

## 1. Diagnostic Decision Tree

```mermaid
graph TD
    Issue[Operational Issue Reported] --> CheckType{Category}
    CheckType -->|Database Error| D1[Call to undefined function mysql_connect]
    CheckType -->|Character Encoding| D2[Accented letters appear as mojibake]
    CheckType -->|Authentication| D3[User cannot log in or loses session]
    CheckType -->|Email Delivery| D4[Confirmation emails not received]

    D1 --> R1[Ensure PHP 5.6 or ext/mysql compatibility wrapper is installed]
    D2 --> R2[Verify web server sends AddDefaultCharset ISO-8859-2]
    D3 --> R3[Check browser cookie policy; ensure szint > 0 in v3_user]
    D4 --> R4[Check local MTA sendmail/postfix logs and mail SPF/DKIM]
```

---

## 2. Common Errors & Resolution Steps

### Issue 1: `Fatal error: Call to undefined function mysql_connect()`
- **Root Cause**: Running on PHP 7.0+ where `ext/mysql` has been removed.
- **Resolution**:
  1. Deploy using the containerized PHP 5.6 Docker image, or
  2. Implement a `mysql_*` compatibility shim wrapping `PDO_MySQL` or `mysqli`.

### Issue 2: Hungarian Diacritics Appear Corrupted (`õ`, `û` instead of `ő`, `ű`)
- **Root Cause**: Web server default charset is emitting `UTF-8` while the application files are encoded in `ISO-8859-2`.
- **Resolution**: Add `AddDefaultCharset ISO-8859-2` in Apache VirtualHost configuration or `.htaccess`.

### Issue 3: Customer Cannot Log In After Registration
- **Root Cause**: The user's `szint` column in `v3_user` was initialized to `0` instead of `1`.
- **Resolution**: Verify `v3_user.szint` value. If `0`, execute:
  ```sql
  UPDATE v3_user SET szint = 1 WHERE usernev = 'username';
  ```
