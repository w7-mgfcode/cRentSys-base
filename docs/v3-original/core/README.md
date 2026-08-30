# cRentSys (LocalRent v3) — Core Technical Documentation

> **Application**: cRentSys / LocalRent On-Line Foglalási Rendszer  
> **Source Baseline**: `app/v3-original_2013/` (~2008–2013 Production Release)  
> **Target Path**: `docs/v3-original/core/`  
> **Classification**: Reverse-Engineered Enterprise Reference Manual

---

## Executive Summary

**cRentSys** is a monolithic web application engineered for automotive rental agencies, originally deployed by **EURO Brill Kft.** under the brand **LocalRent** in Budapest, Hungary. The system automates the customer reservation funnel, schedule conflict detection, location delivery surcharge calculation, transactional HTML email dispatch, dynamic Microsoft Word RTF agreement generation, fleet inventory management, interactive monthly dispatcher calendar grids, and financial revenue sharing.

```mermaid
graph TD
    subgraph Customer Portal [Public & Authenticated]
        A1[index.php / search.php] --> A2[5-Step Booking Wizard: rent.php -> rent5.php]
        A2 --> A3[Dual HTML Email Dispatch: Customer + Operations]
        A2 --> A4[myrent.php: Customer Dashboard]
        A4 --> A5[contractor.php: RTF Contract Generator]
    end

    subgraph Administration Backoffice [Access Level 9]
        B1[admin.php Dashboard] --> B2[admin_car*.php: Fleet & Category CRUD]
        B1 --> B3[admin_calendar.php: Monthly Grid Matrix with Tooltips]
        B1 --> B4[admin_allincome.php: Revenue & Investor Reports]
        B1 --> B5[admin_customer.php / admin_user.php: CRM & Access Control]
        B1 --> B6[admin_open.php / admin_pricesave.php: Operating Hours & Surcharges]
    end

    subgraph Relational Persistence [MySQL 4.1/5.0]
        C1[(v3_user)]
        C2[(v3_autotip)]
        C3[(v3_auto)]
        C4[(v3_rent)]
        C5[(v3_nyitva)]
        C6[(v3_felv_ar)]
    end

    Customer Portal --> Relational Persistence
    Administration Backoffice --> Relational Persistence
```

---

## 20-Part Core Documentation Navigation

| Document | Primary Focus | Description |
| :--- | :--- | :--- |
| **[INDEX.md](INDEX.md)** | Unified Master Index | Consolidates all 20 modules into a single searchable guide. |
| **[ARCHITECTURE.md](ARCHITECTURE.md)** | System Design | Procedural monolith pattern, script-per-URL lifecycle, and layout engine. |
| **[OVERVIEW.md](OVERVIEW.md)** | Domain & Business Context | Operational background, Hungarian rental domain, and user role taxonomy. |
| **[GETTING_STARTED.md](GETTING_STARTED.md)** | Quickstart Tour | Fast onboarding guide for developers, operators, and dispatchers. |
| **[SETUP.md](SETUP.md)** | Environment Setup | Server prerequisites, web server directives, and directory permissions. |
| **[INSTALLATION.md](INSTALLATION.md)** | Step-by-Step Install | Database initialization, virtual host setup, and baseline verification. |
| **[CONFIGURATION.md](CONFIGURATION.md)** | Settings & Parameters | Database connection (`sys/connect.php`), operating hours, and location fee matrix. |
| **[FEATURES.md](FEATURES.md)** | Functional Matrix | Detailed breakdown of all customer and administrative features. |
| **[USER_GUIDE.md](USER_GUIDE.md)** | Customer Manual | End-user instructions for searching, booking, and contract downloading. |
| **[DEVELOPER_GUIDE.md](DEVELOPER_GUIDE.md)** | Engineering Handbook | Procedural coding standards, include hierarchy, and maintenance rules. |
| **[API.md](API.md)** | HTTP Interface Specs | Complete GET/POST parameter specification across all 59 scripts. |
| **[DATABASE.md](DATABASE.md)** | DB Architecture | Storage engine (MyISAM), character encoding (ISO-8859-2), and connection flow. |
| **[DATA_MODEL.md](DATA_MODEL.md)** | Entity Relationships | Full ER diagrams, data dictionaries, primary/foreign keys, and constraints. |
| **[AUTHENTICATION.md](AUTHENTICATION.md)** | Identity & Sessions | Cookie authentication mechanism (`usernev`, `pass`), validation, and roles. |
| **[SECURITY.md](SECURITY.md)** | Vulnerability Audit | In-depth threat model (SQLi, plaintext auth, cookie forgery, PII, CSRF). |
| **[DEPLOYMENT.md](DEPLOYMENT.md)** | Hosting & Operations | LAMP stack architecture, file permissions, PHP mail(), and containerization. |
| **[TESTING.md](TESTING.md)** | Verification & QA | Manual testing matrices, edge cases, and 24h ceiling boundary conditions. |
| **[TROUBLESHOOTING.md](TROUBLESHOOTING.md)** | Diagnostics & Fixes | Resolution guides for database errors, mojibake encoding, and booking bugs. |
| **[CONTRIBUTING.md](CONTRIBUTING.md)** | Code Standards | Legacy maintenance guidelines, PR checklist, and patch management. |
| **[CHANGELOG.md](CHANGELOG.md)** | Version History | Historical evolution of `v3-original_2013` and baseline release notes. |

---

## Role-Based Reading Paths

* **System Architects & Lead Developers**: Start with [ARCHITECTURE.md](ARCHITECTURE.md), [DATA_MODEL.md](DATA_MODEL.md), and [SECURITY.md](SECURITY.md).
* **Full-Stack Engineers & Maintainers**: Review [DEVELOPER_GUIDE.md](DEVELOPER_GUIDE.md), [API.md](API.md), [AUTHENTICATION.md](AUTHENTICATION.md), and [CONFIGURATION.md](CONFIGURATION.md).
* **System Administrators & DevOps**: Focus on [SETUP.md](SETUP.md), [INSTALLATION.md](INSTALLATION.md), [DEPLOYMENT.md](DEPLOYMENT.md), and [TROUBLESHOOTING.md](TROUBLESHOOTING.md).
* **Product Managers & Operations Dispatchers**: Read [OVERVIEW.md](OVERVIEW.md), [FEATURES.md](FEATURES.md), [USER_GUIDE.md](USER_GUIDE.md), and [GETTING_STARTED.md](GETTING_STARTED.md).
