# 08 — Appendices & Complete File Catalog

> **Module**: Hungarian-English Domain Glossary, Complete 59-File Catalog, Schema Reference  
> **Source Baseline**: `app/v3-original_2013/`

---

## 1. Hungarian-English Domain Glossary

| Hungarian Term | English Translation | Context in cRentSys |
| :--- | :--- | :--- |
| **Bérlés / Kölcsönzés** | Rental / Leasing | The core business operation of renting vehicles. |
| **Bérbeadó** | Lessor / Rental Agency | The vehicle owner or rental company (*EURO Brill Kft.* / *LocalRent*). |
| **Bérlő** | Lessee / Customer | The registered customer renting the car. |
| **Autótípus (`v3_autotip`)** | Vehicle Model / Class | Category of vehicle (e.g., Suzuki Swift, Skoda Octavia) with daily rates. |
| **Autó (`v3_auto`)** | Physical Fleet Vehicle | Concrete physical vehicle in the fleet with license plate and VIN. |
| **Rendszám** | License Plate Number | State vehicle registration plate (e.g. `JHG-412`). |
| **Alvázszám (`alvaz`)** | VIN / Chassis Number | Vehicle Identification Number. |
| **Motorszám (`motor`)** | Engine Serial Number | Engine identification code. |
| **Forgalmi engedély (`forgalmi`)** | Vehicle Registration Booklet | State vehicle registration cert document number. |
| **Tulajdonos (`tulaj`)** | Owner / Lessor Entity | Legal owner of the vehicle (used for investor contracts). |
| **Felvétel (`felvetel`)** | Handover / Pickup | Location and time when vehicle is picked up. |
| **Visszavétel (`vissza`)** | Return / Dropoff | Location and time when vehicle is returned. |
| **Nyitvatartás (`v3_nyitva`)** | Business Hours | Weekly operating schedule determining out-of-hours surcharges. |
| **Ferihegy** | Budapest Airport | Budapest Liszt Ferenc International Airport (BUD) delivery destination. |
| **Kaució (`megjegy`)** | Security Deposit | Caution money required upon vehicle pickup (e.g., 50,000 HUF). |
| **Autópálya matrica (`apaly`)** | Motorway Vignette | Electronic toll permit for Hungarian highway network. |
| **Takarítás (`takar`)** | Cleaning Service | Post-rental car wash and interior cleaning add-on. |
| **Határátlépés (`hatar`)** | Cross-Border Travel | Authorization and insurance permit to travel outside Hungary. |
| **ÁFA (Általános Forgalmi Adó)** | Value Added Tax (VAT) | Hungarian sales tax (20% in code baseline `/5*6`, currently 27%). |
| **ÁSZF** | General Terms & Conditions | *Általános Szerződési Feltételek* (customer legal terms). |
| **Szint (`szint`)** | Authorization Level | User role level: `0`=Banned, `1`=Customer, `9`=Administrator. |

---

## 2. Complete 59-File Codebase Catalog

### 2.1 System & Shared Libraries (`sys/`)
| File | Lines | Primary Responsibility |
| :--- | :--- | :--- |
| `sys/connect.php` | 4 | Establishes MySQL connection via `mysql_connect()`. |
| `sys/loggedin.php` | 17 | Verifies authentication cookies against `v3_user` table. |
| `sys/header.php` | 18 | Global HTML layout header, charset meta tag, CSS include, and sidebar inclusion. |
| `sys/footer.php` | 11 | Global HTML layout closing tags. |
| `sys/menu.php` | 36 | Sidebar layout combining login, menu, and search modules. |
| `sys/blocks/login.php` | 56 | Sidebar login form or active session info widget. |
| `sys/blocks/mainmenu.php` | 30 | Dynamic sidebar navigation links based on user access level. |
| `sys/blocks/search.php` | 305 | Sidebar vehicle availability datetime filter form. |

### 2.2 Public & Customer Booking Portal
| File | Lines | Primary Responsibility |
| :--- | :--- | :--- |
| `index.php` | 31 | Landing page with rental instructions, contact numbers, and terms summary. |
| `aszf.php` | 62 | General Terms and Conditions (*Általános Szerződési Feltételek*). |
| `fontos.php` | 109 | Important information regarding required identity documents. |
| `contractor.php` | 137 | Dynamic Microsoft Word compatible RTF rental agreement generator. |
| `user.php` | 39 | Form processor that authenticates credentials and sets cookies. |
| `logout.php` | 11 | Session destroyer that unsets `usernev` and `pass` cookies. |
| `register.php` | 168 | Customer registration form capturing complete personal/identity data. |
| `register_save.php` | 305 | Registration form validator and `v3_user` record creator. |
| `register_mod.php` | 127 | Customer profile modification form. |
| `register_modsave.php` | 220 | Profile modification validator and database updater. |
| `myrent.php` | 169 | Customer dashboard displaying historical and upcoming reservations. |
| `search.php` | 121 | Search results controller displaying non-conflicting available cars. |
| `rent.php` | 313 | **Booking Step 1**: Date and time period selection form. |
| `rent2.php` | 130 | **Booking Step 2**: Vehicle model selection and 24h day-rate calculation. |
| `rent3.php` | 143 | **Booking Step 3**: Pickup/dropoff locations and out-of-hours fee calculation. |
| `rent4.php` | 258 | **Booking Step 4**: Optional extras (vignette, GPS, cleaning) and order review. |
| `rent5.php` | 178 | **Booking Step 5**: Final booking commit to `v3_rent` and dual email dispatch. |

### 2.3 Administrative Backoffice (`admin_*.php`)
| File | Lines | Primary Responsibility |
| :--- | :--- | :--- |
| `admin.php` | 41 | Administrator control panel navigation dashboard. |
| `admin_car.php` | 74 | Fleet inventory list grouped by vehicle category. |
| `admin_carnew.php` | 73 | Form to add a new physical fleet vehicle (`v3_auto`). |
| `admin_carnewsave.php` | 25 | Form handler inserting physical vehicle record into `v3_auto`. |
| `admin_carmod.php` | 82 | Form to edit physical vehicle identifiers (license plate, VIN, engine #). |
| `admin_carmodsave.php` | 35 | Form handler executing updates on physical vehicle records. |
| `admin_cardel.php` | 18 | Deletion confirmation screen for physical vehicle. |
| `admin_cardel2.php` | 18 | Form handler executing `DELETE FROM v3_auto WHERE autid = ...`. |
| `admin_cartypnew.php` | 71 | Form to create a new vehicle model class (`v3_autotip`). |
| `admin_cartypnewsave.php` | 24 | Form handler inserting vehicle model record into `v3_autotip`. |
| `admin_cartypmod.php` | 159 | Form to edit vehicle model specifications and daily rate. |
| `admin_cartypmodsave.php` | 35 | Form handler updating vehicle model record in `v3_autotip`. |
| `admin_cartypdel.php` | 18 | Deletion confirmation screen for vehicle category. |
| `admin_cartypdel2.php` | 19 | Form handler cascading deletion of category and attached physical cars. |
| `admin_calendar.php` | 252 | Primary monthly reservation grid matrix visualizer with `wz_tooltip.js`. |
| `admin_cal2.php` | 258 | Secondary / alternative reservation calendar matrix view. |
| `admin_calday.php` | 102 | Daily fleet occupancy and handover calendar view. |
| `admin_caldaydet.php` | 52 | Detailed day-by-day reservation dispatch list. |
| `admin_caldetails.php` | 120 | Single vehicle chronological reservation history and management links. |
| `admin_rentedit.php` | 70 | Reservation editor to modify times, locations, and pricing overrides. |
| `admin_rentedsave.php` | 33 | Form handler updating reservation record in `v3_rent`. |
| `admin_rentdel.php` | 18 | Booking cancellation confirmation screen. |
| `admin_rentdel2.php` | 18 | Form handler executing `DELETE FROM v3_rent WHERE rentid = ...`. |
| `admin_customer.php` | 37 | Customer CRM index and search interface. |
| `admin_customsearch.php` | 36 | Customer search query processor. |
| `admin_custominfo.php` | 103 | Detailed customer dossier showing personal ID data and booking history. |
| `admin_user.php` | 63 | User account table and access level management index. |
| `admin_userinfo.php` | 174 | User account details and access level editor form. |
| `admin_usermod.php` | 18 | Form handler updating access level (`szint`) in `v3_user`. |
| `admin_allincome.php` | 101 | Fleet-wide monthly revenue report with VAT and 50% investor share breakdown. |
| `admin_carincome.php` | 101 | Single-vehicle monthly revenue and utilization report. |
| `admin_open.php` | 149 | Operating schedule editor (`v3_nyitva`) and delivery fee editor (`v3_felv_ar`). |
| `admin_opensave.php` | 44 | Form handler updating operating hours across all 7 days in `v3_nyitva`. |
| `admin_pricesave.php` | 28 | Form handler updating location delivery fees in `v3_felv_ar`. |
