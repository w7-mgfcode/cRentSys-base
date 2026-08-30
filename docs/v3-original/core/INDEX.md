# cRentSys (LocalRent v3) — Complete Master Documentation Index

> **Consolidated Reference**: All 20 Core Modules in a Single Unified Index  
> **Application**: cRentSys / LocalRent On-Line Foglalási Rendszer (~2008–2013)  
> **Source Code**: `app/v3-original_2013/` (59 PHP Scripts)

---

## Master Table of Contents

```
docs/v3-original/core/
├── 1.  README.md            - Executive Overview & Role Navigation
├── 2.  ARCHITECTURE.md      - System Architecture & Request Lifecycle
├── 3.  OVERVIEW.md          - Business Domain & User Taxonomy
├── 4.  GETTING_STARTED.md   - Developer & Dispatcher Quickstart Tour
├── 5.  SETUP.md             - Runtime Prerequisites & Web Server Setup
├── 6.  INSTALLATION.md      - Step-by-Step Installation & DB Init
├── 7.  CONFIGURATION.md     - DB Parameters, Hours & Location Matrix
├── 8.  FEATURES.md          - Comprehensive Functional Matrix
├── 9.  USER_GUIDE.md        - Customer Manual & 5-Step Wizard Guide
├── 10. DEVELOPER_GUIDE.md   - Engineering Handbook & Business Formulas
├── 11. API.md               - HTTP GET/POST Endpoint Parameter Contract
├── 12. DATABASE.md          - Storage Engine & Character Set Architecture
├── 13. DATA_MODEL.md        - Entity-Relationship Diagram & Data Dictionaries
├── 14. AUTHENTICATION.md    - Cookie Session Protocol & Access Levels
├── 15. SECURITY.md          - Threat Model & Vulnerability Audit
├── 16. DEPLOYMENT.md        - LAMP & Docker Containerization Architecture
├── 17. TESTING.md           - QA Verification Matrix & 24h Boundary Tests
├── 18. TROUBLESHOOTING.md   - Diagnostic Trees & Resolution Manual
├── 19. CONTRIBUTING.md      - Contribution Standards & Code Guidelines
└── 20. CHANGELOG.md         - Version History & Baseline Evolution
```

---

## Executive Digests of All Core Modules

### 1. [README.md](README.md)
Executive introduction to cRentSys, high-level architecture diagram, reading paths for architects, engineers, DevOps, and operations dispatchers.

### 2. [ARCHITECTURE.md](ARCHITECTURE.md)
Technical analysis of the script-per-URL procedural monolith pattern, 770px table layout wrapper (`sys/header.php`, `sys/menu.php`, `sys/footer.php`), and `wz_tooltip.js` integration.

### 3. [OVERVIEW.md](OVERVIEW.md)
Business operations of *EURO Brill Kft.* (*LocalRent*), Hungarian rental legal standards (KGFB, CASCO 10% deductible), and user access level taxonomy (`0`=banned, `1`=customer, `9`=admin).

### 4. [GETTING_STARTED.md](GETTING_STARTED.md)
Quickstart guide for onboarding developers, customer booking workflow tour, and morning dispatcher routines.

### 5. [SETUP.md](SETUP.md)
Runtime environment requirements (PHP 5.2–5.6, `ext/mysql`, `mod_php`), `php.ini` directives (`ISO-8859-2`), and Apache VirtualHost configuration.

### 6. [INSTALLATION.md](INSTALLATION.md)
Installation walkthrough: database creation, schema importation (`schema.sql`), initial admin account seeding, and virtual host verification.

### 7. [CONFIGURATION.md](CONFIGURATION.md)
Parameters in `sys/connect.php`, weekly operating schedule in `v3_nyitva`, delivery surcharge matrix in `v3_felv_ar`, and hardcoded operational rates.

### 8. [FEATURES.md](FEATURES.md)
Full feature inventory: customer registration, availability search, 5-stage booking wizard, RTF contract generation, fleet CRUD, monthly matrix calendar, and revenue reporting.

### 9. [USER_GUIDE.md](USER_GUIDE.md)
Step-by-step customer instructions for account registration, searching cars, completing the 5-step booking wizard, selecting add-on options, and downloading agreements in `myrent.php`.

### 10. [DEVELOPER_GUIDE.md](DEVELOPER_GUIDE.md)
Engineering handbook documenting coding conventions, SQL query patterns, 24h day ceiling formula, overlap collision query, 20% VAT formula, and 50% investor revenue split.

### 11. [API.md](API.md)
Parameter specifications for all HTTP GET and POST forms across all 59 scripts (authentication, booking funnel, fleet CRUD, and administrative configuration).

### 12. [DATABASE.md](DATABASE.md)
MySQL MyISAM architecture, non-persistent connection lifecycle, and `latin2` / `latin2_hungarian_ci` collation specifications.

### 13. [DATA_MODEL.md](DATA_MODEL.md)
Complete Entity-Relationship diagrams and exhaustive data dictionaries for all 6 tables: `v3_user`, `v3_autotip`, `v3_auto`, `v3_rent`, `v3_nyitva`, and `v3_felv_ar`.

### 14. [AUTHENTICATION.md](AUTHENTICATION.md)
Analysis of the cookie-based authentication protocol (`usernev`, `pass`), in-memory verification loop in `sys/loggedin.php`, and session invalidation in `logout.php`.

### 15. [SECURITY.md](SECURITY.md)
Vulnerability assessment covering SQL injection (CWE-89), cookie forgery (CWE-287), plaintext password storage (CWE-256), and PII protection (GDPR compliance).

### 16. [DEPLOYMENT.md](DEPLOYMENT.md)
Production deployment topologies, LAMP stack configuration, and complete `Dockerfile` and `docker-compose.yml` configurations for containerized PHP 5.6 execution.

### 17. [TESTING.md](TESTING.md)
Quality assurance test suite matrices, boundary condition verifications for 24-hour day calculations, and calendar conflict test cases.

### 18. [TROUBLESHOOTING.md](TROUBLESHOOTING.md)
Operational diagnostic decision tree, fixing `ext/mysql` missing extension errors, resolving ISO-8859-2 mojibake diacritics, and fixing account level issues.

### 19. [CONTRIBUTING.md](CONTRIBUTING.md)
Legacy maintenance rules, preserving ISO-8859-2 file encoding, procedural coding standards, and pull request checklist.

### 20. [CHANGELOG.md](CHANGELOG.md)
Historical versioning milestones from v1.0 (~2005) through v3.0 (2013 baseline release).
