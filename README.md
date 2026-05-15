# Elysian Skin Clinic – PHP + MySQL

A clinic management system with appointment booking, customer management, and treatment plan tracking.

## Tech Stack

| Layer | Technology |
|-------|------------|
| Frontend | PHP + Tailwind CSS |
| Backend | PHP (PDO) |
| Database | MySQL (MariaDB) via XAMPP |

## Prerequisites

- XAMPP (PHP 8+) with Apache + MySQL
- PHP extensions: PDO, mbstring, json

## Setup (XAMPP)

1. Copy project to `htdocs`
2. Start Apache and MySQL
3. Import `backend/database.sql` via phpMyAdmin
4. Visit:
   - Frontend: `http://localhost/clinic_management_system_g4-main-2/frontend/home.php`
   - Admin: `http://localhost/clinic_management_system_g4-main-2/admin/`

## Default Accounts

| Role | Email | Password |
|------|-------|----------|
| Admin | admin@elysian.clinic | 123 |
| Receptionist | letan@clinic.com | 123 |
| Doctor | doctor@elysian.clinic | 123 |

## Directory Structure

```
clinic_management_system_g4-main-2/
├── backend/           # API endpoints + database
│   ├── db.php        # PDO connection
│   ├── database.sql  # Schema + seed data
│   ├── auth.php      # Login/register
│   ├── contact.php   # Feedback form
│   └── *.php         # API endpoints
├── frontend/         # Customer-facing pages
│   ├── home.php      # Homepage
│   ├── dichvu.php    # Services
│   ├── booking.php   # Appointment booking
│   ├── contact.php   # Contact/feedback form
│   ├── signin.php    # Login
│   └── signup.php    # Register
├── admin/           # Admin dashboard
│   ├── index.php     # Dashboard
│   ├── appointments/ # Manage appointments
│   ├── customers.php # Manage customers
│   └── ...
└── shared/          # Shared components
```
