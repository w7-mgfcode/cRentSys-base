# HTTP Parameter & Form Interface Specification

> **Module**: HTTP Interface & Form Contract Reference  
> **Source Scripts**: All 59 `.php` controllers

---

## 1. Authentication & Profile Endpoints

### 1.1 `POST /user.php`
- **Purpose**: Authenticates credentials, verifies `v3_user`, and sets client cookies.
- **Parameters**:
  - `usernev` (`string`, required): Username.
  - `pass` (`string`, required): Plaintext password.
- **Response**: Sets `usernev` and `pass` cookies; redirects to homepage.

### 1.2 `GET /logout.php`
- **Purpose**: Destroys active session cookies.
- **Parameters**: None.
- **Response**: Clears `usernev` and `pass` cookies; renders logout notice.

### 1.3 `POST /register_save.php`
- **Purpose**: Validates and creates a new customer record (`szint = 1`).
- **Parameters**:
  - `usernev`, `pass`, `pass2`, `mail`, `veznev`, `kernev`, `anynev`, `szulido`, `szulhely`, `nemzet`, `szemig`, `jogsi`, `lakvaros`, `lakcim`, `lakirsz`, `tel`, `veztel`.
- **Response**: Displays success message or validation errors.

---

## 2. Customer Booking Funnel Endpoints

### 2.1 `POST /rent2.php`
- **Purpose**: Evaluates vehicle availability and renders available car catalog.
- **Parameters**:
  - `kev` (Year), `kho` (Month), `kna` (Day), `kor` (Hour), `kpe` (Minute) — Start time.
  - `vev` (Year), `vho` (Month), `vna` (Day), `vor` (Hour), `vpe` (Minute) — End time.
- **Response**: HTML list of available cars with calculated daily rates.

### 2.2 `POST /rent3.php`
- **Purpose**: Evaluates out-of-hours pickup/return and renders location selector.
- **Parameters**:
  - `auto` (`int`): Physical car ID (`v3_auto.autid`).
  - `autoar` (`int`): Base vehicle rental price.
  - `kezdido` (`int`): Start Unix timestamp.
  - `vegeido` (`int`): End Unix timestamp.
- **Response**: Location selection form with dynamic surcharge fees.

### 2.3 `POST /rent4.php`
- **Purpose**: Renders booking summary and optional extras checkboxes.
- **Parameters**:
  - `auto`, `autoar`, `kezdido`, `vegeido`, `hely` (Pickup location), `vhely` (Return location), `egyeb` (Custom pickup addr), `vegyeb` (Custom return addr).
- **Response**: Order review screen with optional add-on checkboxes.

### 2.4 `POST /rent5.php`
- **Purpose**: Commits reservation to database and dispatches confirmation emails.
- **Parameters**:
  - `auto`, `autoar`, `kezdido`, `vegeido`, `hely`, `vhely`, `felvar`, `viszar`, `megj`, `apaly`, `takar`, `hatar`, `gps`, `gps_ar`, `kulnap`.
- **Response**: Writes to `v3_rent`, sends dual HTML emails via `mail()`, renders success screen.

### 2.5 `GET /contractor.php?rentid={id}`
- **Purpose**: Generates dynamic Microsoft Word RTF contract stream for download.
- **Parameters**: `rentid` (`int`, required).
- **Response**: `Content-type: application/x-msdownload`, attachment `szerzodes.rtf`.

---

## 3. Administrative Endpoints (`loggedlevel == 9`)

| Endpoint | Method | Key Parameters | Action Description |
| :--- | :---: | :--- | :--- |
| `admin_carnewsave.php` | `POST` | `auttip, rendszam, alvaz, motor, forgalmi, tulaj, kod` | Inserts new car into `v3_auto`. |
| `admin_carmodsave.php` | `POST` | `autoid, rendszam, alvaz, motor, forgalmi, tulaj, kod` | Updates physical car in `v3_auto`. |
| `admin_cardel2.php` | `GET` | `carid` | Deletes physical vehicle from `v3_auto`. |
| `admin_cartypnewsave.php`| `POST` | `gyarto, tipus, extra, ar, megjegy, kep` | Inserts new category into `v3_autotip`. |
| `admin_cartypmodsave.php`| `POST` | `tipid, gyarto, tipus, extra, ar, megjegy, kep` | Updates category in `v3_autotip`. |
| `admin_cartypdel2.php` | `GET` | `cartypid` | Deletes category and cascades to `v3_auto`. |
| `admin_rentedsave.php` | `POST` | `rentid, autoid, eleje, vege, felvetel, vissza, autoar, felvar, visszar` | Updates reservation in `v3_rent`. |
| `admin_rentdel2.php` | `GET` | `rentid` | Deletes reservation from `v3_rent`. |
| `admin_usermod.php` | `POST` | `user, level` | Updates `v3_user.szint` (0, 1, or 9). |
| `admin_opensave.php` | `POST` | `nyit1..nyit7, zar1..zar7` | Updates weekly opening schedule in `v3_nyitva`. |
| `admin_pricesave.php` | `POST` | `iroda0, iroda1, ferih0, ferih1, egyeb0, egyeb1` | Updates location fee matrix in `v3_felv_ar`. |
| `admin_allincome.php` | `GET` | `ev, ho` | Returns monthly revenue audit report. |
