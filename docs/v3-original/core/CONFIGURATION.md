# System Configuration & Runtime Parameters

> **Module**: Configuration Guide  
> **Source Scripts**: `sys/connect.php`, `admin_open.php`, `admin_pricesave.php`

---

## 1. Database Connection Configuration (`sys/connect.php`)

All persistence routines import database credentials from `sys/connect.php`:

| Parameter | Default Value | Description |
| :--- | :--- | :--- |
| **Host** | `localhost` | MySQL database hostname or socket path. |
| **Username** | `localren` | Database user account name. |
| **Password** | `tnerLACOL8002` | Database account password. |
| **Database** | `localren_hu` | Target schema name containing all `v3_*` tables. |

---

## 2. Dynamic Business Hours Configuration (`v3_nyitva`)

Configured via the administrative panel at `admin_open.php` and persisted in `v3_nyitva`. The system evaluates these times to determine whether pickup/return surcharges apply.

| Day Index (`nap`) | Day of Week | Default Opening (`nyitora`) | Default Closing (`zarora`) |
| :---: | :--- | :---: | :---: |
| **1** | Hétfő (Monday) | `08:00:00` | `18:00:00` |
| **2** | Kedd (Tuesday) | `08:00:00` | `18:00:00` |
| **3** | Szerda (Wednesday) | `08:00:00` | `18:00:00` |
| **4** | Csütörtök (Thursday) | `08:00:00` | `18:00:00` |
| **5** | Péntek (Friday) | `08:00:00` | `18:00:00` |
| **6** | Szombat (Saturday) | `08:00:00` | `14:00:00` |
| **7** | Vasárnap (Sunday) | `08:00:00` | `12:00:00` |

---

## 3. Location Delivery & Surcharge Fee Matrix (`v3_felv_ar`)

Configured via `admin_pricesave.php` and persisted in `v3_felv_ar`:

```
v3_felv_ar
├── nyitva = 1 (Normal Business Hours)
│   ├── iroda:    0 HUF (Central office handover)
│   ├── ferihegy: 3,000 HUF (Budapest Airport delivery)
│   └── egyeb:    2,000 HUF (Custom address delivery)
└── nyitva = 0 (Out-of-Hours / Night / Weekend Off-Hours)
    ├── iroda:    2,000 HUF (Off-hours office handover surcharge)
    ├── ferihegy: 5,000 HUF (Off-hours airport delivery surcharge)
    └── egyeb:    4,000 HUF (Off-hours custom address delivery)
```

---

## 4. Hardcoded System Rates & Operational Add-ons

| Option / Add-on | Rate / Calculation | Source File Reference |
| :--- | :--- | :--- |
| **Post-Rental Cleaning (`takar`)** | Flat +2,500 HUF | `rent4.php`, `rent5.php`, `contractor.php` |
| **GPS Navigation Device (`gps`)** | +500 HUF / day | `rent4.php`, `rent5.php` |
| **Accessories (Baby seat, ski rack)** | +1,000 HUF / day / item | `rent5.php` (email text notice) |
| **Value-Added Tax (ÁFA)** | 20% Multiplier (`/5*6`) | `admin_allincome.php`, `contractor.php` |
| **Investor Net Profit Share** | 50% of vehicle rate (`autoar/2`) | `admin_allincome.php` |
