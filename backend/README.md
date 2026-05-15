# Backend API – Clinic Management System

## 1) Overview

The backend handles appointment management, payment processing, and customer data operations.

## 2) Backend File Structure

| File | Description |
|------|-------------|
| `db.php` | PDO connection, table bootstrap, session helpers |
| `database.sql` | Schema and sample data |
| `auth.php` | Login/register API |
| `logout.php` | Logout endpoint |
| `contact.php` | Feedback form receiver |
| `create_booking.php` | Create appointment |
| `update_appointment.php` | Update appointment |
| `cancel_appointment.php` | Cancel appointment |
| `get_appointments.php` | List user appointments |
| `get_appointment_by_id.php` | Get appointment details |
| `get_slots.php` | Available time slots |
| `get_services.php` | List services |
| `get_specialists.php` | List specialists |
| `get_admin_dashboard.php` | Dashboard metrics |
| `payments_api.php` | Payment operations |
| `get_user.php` | Current user profile |
| `update_customer_profile.php` | Update customer profile |

## 3) Environment Requirements

- PHP 8+, MySQL/MariaDB
- Extensions: `pdo`, `mbstring`, `json`

## 4) Database Configuration

In `db.php`:
- `DB_HOST` (default: `localhost`)
- `DB_NAME` (default: `clinic`)
- `DB_USER` (default: `root`)
- `DB_PASS` (default: empty)

## 5) Quick Setup (XAMPP)

1. Copy project into `htdocs`
2. Start Apache and MySQL
3. Import `backend/database.sql` via phpMyAdmin
4. Access:
   - Frontend: `http://localhost/clinic_management_system_g4-main-2/frontend/home.php`
   - Admin: `http://localhost/clinic_management_system_g4-main-2/admin/`

## 6) Seed Accounts

| Role | Email | Password |
|------|-------|----------|
| Admin | admin@elysian.clinic | 123 |
| Receptionist | letan@clinic.com | 123 |
| Doctor | doctor@elysian.clinic | 123 |

## 7) Database Tables

- `users` - Staff accounts
- `Customer` - Customer profiles
- `specialists` - Doctors/specialists
- `services` - Treatments/services
- `appointments` - Booking records
- `feedback` - Contact form submissions
- `treatment_plans` - Treatment plans
- `treatment_plan_sessions` - Plan sessions
- `session_records` - Session records
