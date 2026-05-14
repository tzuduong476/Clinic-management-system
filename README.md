# 🏥 Elysian Skin Clinic – PHP + MySQL Demo

This repository hosts a clinic marketing site plus PHP-powered authentication pages wired to a MySQL backend. It is meant to run inside a PHP/Apache stack such as XAMPP or MAMP.

---

## 🚀 Tech Stack

| Layer     | Technology                      |
| --------- | ------------------------------- |
| Frontend  | PHP + Tailwind CSS + Material Icons |
| Backend   | PHP (PDO)                        |
| Database  | MySQL (MariaDB) via XAMPP         |

## 🧰 Prerequisites

- XAMPP, MAMP, or any PHP 8+ server bundle with Apache + MySQL enabled  
- PHP extensions: PDO, mbstring, json  
- Browser to open `frontend/*.php` pages

## ⚙️ Local Setup (XAMPP)

1. Copy the project folder (`clinic_management_system_g4-main-2`) into your Apache `htdocs` directory.  
2. Launch Apache and MySQL from the XAMPP control panel.  
3. Use phpMyAdmin or the CLI to import `backend/database.sql`. This creates the `clinic` database, `users` table, and seeds a test admin user (`admin@elysian.clinic` with password `admin123`).  
4. Update `backend/db.php` if your MySQL user, password, or schema name differs.  
5. Visit `http://localhost/clinic_management_system_g4-main-2/frontend/home.php` (or whichever page you need).

## 🗄️ Database & Authentication

- `backend/database.sql`: Creates the `clinic` database and all required tables.  
- `backend/db.php`: Central PDO connection, session bootstrapping, and automatic table creation.  
- `backend/auth.php`: Consolidated API for login and registration.  
- `backend/logout.php`: Clears the session and redirects to signin.

For detailed setup instructions in Vietnamese, please see [HUONG_DAN_CAI_DAT.md](file:///Applications/XAMPP/xamppfiles/htdocs/clinic_management_system_g4-main-2/HUONG_DAN_CAI_DAT.md).

The registration and login APIs return JSON payloads so that the `frontend/signup.php` and `frontend/signin.php` pages can show user-friendly feedback and automatically redirect on success. Each successful registration inserts a row into the `Customer` table (verify via phpMyAdmin or `SELECT * FROM clinic.Customer`).

## 🧑‍⚕️ Frontend Form Flow

- `frontend/signup.php`: The newly added JavaScript listens to the form submit, posts to `../backend/register.php`, displays validation messages, and navigates to `signin.php` when registration succeeds.  
- `frontend/signin.php`: The login form submits via `fetch` to `../backend/login.php`, shows the response message, and redirects to `home.php` once authenticated.  
- `frontend/home.php`, `frontend/dichvu.php`, and `frontend/service-detail.php`: include `backend/db.php` so the marketing pages display a “signed in as …” badge and a Sign Out link whenever `$_SESSION` holds an authenticated user.  
- Both forms no longer rely on static placeholders for success/error and now reuse the JSON payload coming from the PHP backend.

## 🚀 Running the App

1. Make sure Apache + MySQL are running in XAMPP.  
2. Visit `http://localhost/clinic_management_system_g4-main-2/backend/test-db.php` to verify PHP, PDO, and the `clinic.users` table are accessible (login/register auto-create the database and table if they’re missing).  
3. Navigate to `http://localhost/clinic_management_system_g4-main-2/frontend/signup.php` to create a new patient account.  
4. Use `http://localhost/clinic_management_system_g4-main-2/frontend/signin.php` to log in, explore the marketing pages, then call `backend/logout.php` to end the session.

## 🗂️ Directory Overview

```
clinic_management_system_g4-main-2/
├── backend/        # PDO helper + auth APIs + SQL schema
│   ├── db.php
│   ├── auth.php
│   ├── logout.php
│   └── database.sql
├── frontend/        # Tailwind-driven PHP marketing + auth pages
│   ├── assets/      # Shared static images (logo, hero)
│   ├── home.php
│   ├── dichvu.php
│   ├── service-detail.php
│   ├── signup.php
│   └── signin.php
└── README.md
```
