# Contribution Guidelines & Maintenance Standards

> **Module**: Maintenance & Contribution Standards  
> **Source Base**: `app/v3-original_2013/`

---

## 1. Legacy Maintenance Principles

When modifying or maintaining the legacy `v3-original_2013` baseline:

1. **Preserve Character Encoding**:
   - All source files are encoded in **`ISO-8859-2`** (Latin-2). Never save files in UTF-8 without executing a full project-wide encoding migration.
2. **Adhere to Procedural Page Architecture**:
   - Maintain the layout inclusion order: `sys/header.php` at the top, `sys/footer.php` at the bottom.
3. **Strict Authorization Verification**:
   - Every administrative script must include `sys/loggedin.php` and enforce `if ($loggedlevel == 9)`.
4. **No Global State Breakage**:
   - Respect global variables instantiated by `sys/loggedin.php` (`$loggedin`, `$loggedlevel`, `$ulogged`).

---

## 2. Code Review Checklist

- [ ] Does the script check user authorization before executing state mutations?
- [ ] Are date/time inputs parsed through `mktime()` / `strtotime()` consistently?
- [ ] Is character encoding preserved in ISO-8859-2?
- [ ] Are HTML table widths aligned with the 770px container grid?
- [ ] Are all database operations scoped with `or die(mysql_error())` for legacy consistency?
