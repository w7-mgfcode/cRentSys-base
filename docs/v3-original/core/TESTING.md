# Quality Assurance & Verification Manual

> **Module**: Testing Strategies & Test Matrices  
> **Scope**: Manual Verification, Edge Cases, Boundary Testing

---

## 1. Test Execution Matrix

| Test Suite | Target Component | Scenario Description | Expected Outcome |
| :--- | :--- | :--- | :--- |
| **TC-01** | `rent.php` $ightarrow$ `rent2.php` | Request 24h 0m rental (e.g. 10:00 to 10:00 next day). | Billed as exactly 1 rental day. |
| **TC-02** | `rent.php` $ightarrow$ `rent2.php` | Request 24h 1m rental (e.g. 10:00 to 10:01 next day). | Billed as exactly 2 rental days (24h ceiling rule). |
| **TC-03** | `rent2.php` | Request period overlapping with an existing booking in `v3_rent`. | Booked car is excluded from available car list. |
| **TC-04** | `rent3.php` | Select pickup on Saturday at 15:00 (closing is 14:00 in `v3_nyitva`). | Out-of-hours delivery fee applied from `v3_felv_ar WHERE nyitva=0`. |
| **TC-05** | `rent5.php` | Complete order with GPS and Cleaning selected. | `v3_rent` row created; dual HTML emails dispatched. |
| **TC-06** | `contractor.php` | Download RTF contract for booking. | Outputs valid Microsoft Word RTF stream with CASCO 10% clause. |
| **TC-07** | `admin_calendar.php` | Hover over occupied date block in monthly grid matrix. | `wz_tooltip.js` popup displays customer name, phone, and hours. |
| **TC-08** | `admin_allincome.php` | Audit monthly turnover. | Net total, 20% Gross total, and 50% investor net/gross share correctly computed. |

---

## 2. Boundary Condition Test Cases (24-Hour Day Ceiling)

$$	ext{Days} = \left\lfloor rac{t_{	ext{end}} - t_{	ext{start}} - 1}{86400} ightfloor + 1$$

| Start Timestamp | End Timestamp | Difference ($\Delta t$) | Calculated Days | Verification Status |
| :---: | :---: | :---: | :---: | :---: |
| 2026-09-01 10:00 | 2026-09-02 09:59 | 86,340s | **1 Day** | PASS |
| 2026-09-01 10:00 | 2026-09-02 10:00 | 86,400s | **1 Day** | PASS |
| 2026-09-01 10:00 | 2026-09-02 10:01 | 86,460s | **2 Days** | PASS |
| 2026-09-01 10:00 | 2026-09-03 10:00 | 172,800s | **2 Days** | PASS |
