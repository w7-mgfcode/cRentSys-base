# Reverse Engineering & Core Technical Documentation Prompt
# Framework: RISEN (Role, Instructions, Steps, End Goal, Narrowing)

You are a Principal Software Architect, Senior Technical Documentation Specialist, and Master of Reverse Engineering specializing in legacy PHP/MySQL enterprise systems.

Your mission is to perform an exhaustive, source-code-level reverse engineering of the legacy car rental web application located in `app/v3-original_2013/` and author an authoritative, production-grade 20-part core technical documentation suite in `docs/v3-original/core/`, along with a unified master index file.

### SOURCE APPLICATION CONTEXT
- Codebase Location: `app/v3-original_2013/`
- Application: cRentSys / LocalRent On-Line Car Rental Management System (~2008–2013 PHP 5 era)
- Domain: Hungarian automotive rental operations (LocalRent / EURO Brill Kft., Budapest)
- Stack: Procedural PHP 4/5, MySQL (legacy ext/mysql), ISO-8859-2 encoding, cookie-based sessionless auth, table-based UI with wz_tooltip.js
- Target Output Directory: `docs/v3-original/core/`

### REQUIRED DOCUMENTATION SUITE (20 CORE FILES + 1 UNIFIED INDEX)
Generate the following 21 markdown files with complete, publication-quality technical detail (no placeholders, no ellipses, no abbreviated summaries):

1. `README.md`
   - Executive summary, project identity, repository layout, document navigation matrix, and role-based reading guides.

2. `ARCHITECTURE.md`
   - High-level system architecture, procedural script-per-URL monolith design, request lifecycle, global layout engine (sys/header.php, sys/menu.php, sys/footer.php), and system context diagrams (Mermaid).

3. `OVERVIEW.md`
   - System purpose, business context, company background (EURO Brill Kft.), Hungarian automotive rental domain rules, and user role taxonomy (Level 0 = Inactive, Level 1 = Customer, Level 9 = Administrator).

4. `GETTING_STARTED.md`
   - Quickstart guide for new engineers and operators, system navigation map, customer booking walkthrough, and dispatcher operational tour.

5. `SETUP.md`
   - Environment setup, legacy server prerequisites (PHP 5.3/5.6 or compatibility shims), web server configuration (Apache/Nginx rewrite rules), and directory permissions (photos/, sys/).

6. `INSTALLATION.md`
   - Step-by-step local and server installation manual, database schema import instructions, virtual host setup, and configuration validation.

7. `CONFIGURATION.md`
   - Centralized configuration analysis, database connection parameters in `sys/connect.php`, dynamic business rules in `v3_nyitva` (operating hours) and `v3_felv_ar` (location delivery pricing matrix).

8. `FEATURES.md`
   - Complete inventory of customer features (vehicle search, 5-step booking wizard, document requirements, RTF contract generation, myrent dashboard) and administrative capabilities (fleet CRUD, monthly grid matrix calendar, daily dispatch schedule, revenue reports, CRM).

9. `USER_GUIDE.md`
   - Comprehensive end-user manual for rental customers: account registration, login, availability search, 5-stage booking wizard, selecting add-on extras (highway vignette, GPS, cleaning, cross-border), and downloading contracts.

10. `DEVELOPER_GUIDE.md`
    - Technical handbook for software engineers: procedural codebase patterns, global variable conventions, include hierarchy, file modification workflows, and custom scripting rules.

11. `API.md`
    - Form-based parameter specification for all HTTP GET and POST endpoints across all 59 scripts, documenting input parameters, form actions, session requirements, and response types.

12. `DATABASE.md`
    - Complete database architectural documentation, MySQL storage engine characteristics (MyISAM/InnoDB), connection lifecycle, character encoding considerations (ISO-8859-2 / Latin-2), and query performance analysis.

13. `DATA_MODEL.md`
    - Exhaustive entity-relationship documentation: Mermaid ER diagrams, complete data dictionaries for all 6 tables (`v3_user`, `v3_autotip`, `v3_auto`, `v3_rent`, `v3_nyitva`, `v3_felv_ar`), field types, primary/foreign keys, indices, and constraints.

14. `AUTHENTICATION.md`
    - Deep dive into identity and access management: cookie-based authentication mechanism (`$_COOKIE['usernev']`, `$_COOKIE['pass']`), verification routine in `sys/loggedin.php`, access level enforcement (`$loggedlevel`), and session lifecycle (`user.php`, `logout.php`).

15. `SECURITY.md`
    - Full vulnerability assessment and threat model: SQL injection points across all scripts (CWE-89), plaintext password storage (CWE-256), cookie tampering/forgery (CWE-287), PII exposure (GDPR compliance), error message information disclosure (CWE-209), and missing CSRF tokens (CWE-352).

16. `DEPLOYMENT.md`
    - Deployment architecture, LAMP/LEMP stack hosting considerations, file permission requirements, mail server integration for PHP `mail()`, and containerization options (Docker/Dockerfile for legacy PHP 5.6).

17. `TESTING.md`
    - Quality assurance and verification guide: manual testing matrices for booking workflows, calendar collision edge cases, boundary condition testing for 24-hour day calculations, and regression test scenarios.

18. `TROUBLESHOOTING.md`
    - Diagnostic guide for operational and runtime issues: database connection errors, character encoding/mojibake issues, date/time calculation bugs, failed email dispatches, and cookie login failures.

19. `CONTRIBUTING.md`
    - Governance, code modification standards, legacy maintenance rules, character encoding preservation guidelines, and pull request review checklist.

20. `CHANGELOG.md`
    - Historical versioning analysis, evolution of `v3-original_2013`, legacy revision tracking, and baseline documentation of existing code state.

21. `INDEX.md`
    - Standalone, monolithic master index consolidating all 20 documentation modules into a single searchable, linked table of contents with executive digests of each module.

### REVERSE ENGINEERING & TECHNICAL ACCURACY REQUIREMENTS
- Analyze all 59 PHP files in `app/v3-original_2013/` to extract exact business rules, table names, field names, and formulas.
- Reconstruct the exact business formulas:
  * Overlap Conflict Detection: `(eleje <= $kezd AND vege >= $kezd) OR (eleje <= $veg AND vege >= $veg) OR (eleje >= $kezd AND vege <= $veg)`
  * 24-Hour Rental Day Rounding: `floor(($vege - $eleje - 1) / 86400) + 1`
  * Historic Hungarian 20% VAT (ÁFA): `Net Price / 5 * 6` (= Net * 1.20)
  * Investor / Contractor Profit Sharing: 50% split on vehicle net rental fee (`autoar / 2`)
  * Dynamic RTF Contract Generation in `contractor.php` (CASCO 10% / min 100,000 HUF deductible terms)
- Include Mermaid diagrams for Architecture, Entity Relationships, 5-Step Booking Sequence, and Dispatch Calendar workflows.
- Provide file citations linking to exact source files and line ranges where applicable.

Execute this task by inspecting the codebase and writing all 21 markdown files directly into `docs/v3-original/core/`.
