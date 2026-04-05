<?php
// Database connection configuration
class DatabaseConfig {
    public string $host = "localhost";
    public string $dbname = "clinic";
    public string $username = "root";
    public string $password = "";
}

$config = new DatabaseConfig();

try {
    $conn = new PDO("mysql:host={$config->host};dbname={$config->dbname};charset=utf8mb4", $config->username, $config->password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    if (str_contains($e->getMessage(), 'Unknown database')) {
        $temp = new PDO("mysql:host={$config->host}", $config->username, $config->password);
        $temp->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $temp->exec("CREATE DATABASE IF NOT EXISTS `{$config->dbname}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
        $conn = new PDO("mysql:host={$config->host};dbname={$config->dbname};charset=utf8mb4", $config->username, $config->password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    } else {
        throw new RuntimeException("Database connection failed: " . $e->getMessage());
    }
}

ensureUsersTable($conn);
ensureAdminUser($conn);
ensureReceptionistUser($conn);
ensureDoctorUser($conn);
ensureCustomerTable($conn);
ensureSpecialistsTable($conn);
ensureAppointmentsTable($conn);
ensureTreatmentPlansTable($conn);
ensureTreatmentPlanSessionsTable($conn);
ensureSessionRecordsTable($conn);
ensureServicesTable($conn);
ensureContactsTable($conn);

// Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Helper function to get database connection (PDO)
function getDBConnection(): PDO {
    global $conn;
    return $conn;
}

// Helper function to get logged in user
function getCurrentUser() {
    if (isset($_SESSION['user_id'])) {
        return [
            'id' => $_SESSION['user_id'],
            'email' => $_SESSION['user_email'],
            'full_name' => $_SESSION['user_name'],
            'role' => $_SESSION['user_role'] ?? 'patient'
        ];
    }
    return null;
}

// Helper function to check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Helper function to redirect
function ensureUsersTable(PDO $conn): void {
    $conn->exec("
        CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            full_name VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL UNIQUE,
            phone VARCHAR(20),
            password VARCHAR(255) NOT NULL,
            role ENUM('patient', 'admin', 'doctor', 'receptionist') DEFAULT 'patient',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ");
    // Add 'receptionist' to role ENUM if it doesn't exist
    try {
        $conn->exec("ALTER TABLE users MODIFY COLUMN role ENUM('patient', 'admin', 'doctor', 'receptionist') DEFAULT 'patient'");
    } catch (PDOException $e) {
        // Column might already have the correct type or other issue
    }
}

function ensureAdminUser(PDO $conn): void {
    $stmt = $conn->query("SELECT id FROM users WHERE role = 'admin' LIMIT 1");
    if ($stmt->fetch()) return;
    $hash = password_hash('123', PASSWORD_DEFAULT);
    $conn->exec("INSERT INTO users (full_name, email, phone, password, role) VALUES ('Admin', 'admin@elysian.clinic', '', " . $conn->quote($hash) . ", 'admin')");
}

function ensureReceptionistUser(PDO $conn): void {
    $stmt = $conn->query("SELECT id FROM users WHERE role = 'receptionist' LIMIT 1");
    if ($stmt->fetch()) return;
    $hash = password_hash('123', PASSWORD_DEFAULT);
    $conn->exec("INSERT INTO users (full_name, email, phone, password, role) VALUES ('Lễ Tân', 'letan@clinic.com', '', " . $conn->quote($hash) . ", 'receptionist')");
}

function ensureDoctorUser(PDO $conn): void {
    $stmt = $conn->query("SELECT id FROM users WHERE role = 'doctor' LIMIT 1");
    if ($stmt->fetch()) return;
    $hash = password_hash('123', PASSWORD_DEFAULT);
    $conn->exec("INSERT INTO users (full_name, email, phone, password, role) VALUES ('Dr. Sarah Jensen', 'doctor@elysian.clinic', '', " . $conn->quote($hash) . ", 'doctor')");
}

function ensureCustomerTable(PDO $conn): void {
    $conn->exec("
        CREATE TABLE IF NOT EXISTS `Customer` (
            Customer_ID INT AUTO_INCREMENT PRIMARY KEY,
            Name VARCHAR(100) NOT NULL,
            Phone VARCHAR(20),
            Email VARCHAR(100) NOT NULL UNIQUE,
            Password VARCHAR(255) NOT NULL,
            Skin_type VARCHAR(50) DEFAULT '',
            Medical_history TEXT DEFAULT '',
            Created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ");
    $customerCols = [
        'Date_of_birth' => "ADD COLUMN Date_of_birth DATE DEFAULT NULL AFTER Medical_history",
        'Skin_condition' => "ADD COLUMN Skin_condition VARCHAR(100) DEFAULT '' AFTER Date_of_birth",
        'Patient_notes' => "ADD COLUMN Patient_notes TEXT DEFAULT NULL AFTER Skin_condition"
    ];
    foreach ($customerCols as $colName => $alterStmt) {
        try {
            $stmt = $conn->query("SELECT COUNT(*) FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'Customer' AND COLUMN_NAME = '$colName'");
            if ($stmt && (int)$stmt->fetchColumn() === 0) {
                $conn->exec("ALTER TABLE `Customer` $alterStmt");
            }
        } catch (PDOException $e) { /* ignore */ }
    }
}

function ensureSpecialistsTable(PDO $conn): void {
    $conn->exec("
        CREATE TABLE IF NOT EXISTS specialists (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            title VARCHAR(150) NOT NULL,
            avatar_url VARCHAR(500) DEFAULT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ");
    $stmt = $conn->query("SELECT COUNT(*) FROM specialists");
    if ((int)$stmt->fetchColumn() === 0) {
        $conn->exec("
            INSERT INTO specialists (name, title, avatar_url) VALUES
            ('Dr. Sarah Jenkins', 'Lead Dermatologist', 'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=100&h=100&fit=crop&crop=face'),
            ('Dr. Lam', 'Senior Dermatologist', 'https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?w=100&h=100&fit=crop&crop=face'),
            ('Dr. Michael Chen', 'Aesthetic Specialist', 'https://images.unsplash.com/photo-1622253692010-333f2da6031d?w=100&h=100&fit=crop&crop=face')
        ");
    }
}

function ensureAppointmentsTable(PDO $conn): void {
    $conn->exec("
        CREATE TABLE IF NOT EXISTS appointments (
            id INT AUTO_INCREMENT PRIMARY KEY,
            booking_code VARCHAR(20) NOT NULL UNIQUE,
            user_id INT DEFAULT NULL,
            customer_name VARCHAR(100) NOT NULL,
            customer_phone VARCHAR(20) NOT NULL,
            service_id VARCHAR(50) NOT NULL,
            service_name VARCHAR(200) NOT NULL,
            specialist_id INT NOT NULL,
            specialist_name VARCHAR(100) NOT NULL,
            appointment_date DATE NOT NULL,
            appointment_time TIME NOT NULL,
            total_price VARCHAR(50) NOT NULL,
            status ENUM('pending', 'confirmed', 'cancelled') DEFAULT 'confirmed',
            payment_status ENUM('unpaid', 'paid') DEFAULT 'unpaid',
            payment_method VARCHAR(50) DEFAULT NULL,
            payment_note TEXT DEFAULT NULL,
            confirmed_by INT DEFAULT NULL,
            confirmed_at DATETIME DEFAULT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ");
    
    // Add columns with proper error handling - use separate try/catch for each
    $columnsToAdd = [
        "user_id" => "ADD COLUMN user_id INT DEFAULT NULL AFTER booking_code",
        "payment_status" => "ADD COLUMN payment_status ENUM('unpaid', 'paid') DEFAULT 'unpaid' AFTER status",
        "payment_method" => "ADD COLUMN payment_method VARCHAR(50) DEFAULT NULL AFTER payment_status",
        "payment_note" => "ADD COLUMN payment_note TEXT DEFAULT NULL AFTER payment_method",
        "confirmed_by" => "ADD COLUMN confirmed_by INT DEFAULT NULL AFTER payment_note",
        "confirmed_at" => "ADD COLUMN confirmed_at TIMESTAMP DEFAULT NULL AFTER confirmed_by"
    ];
    
    foreach ($columnsToAdd as $colName => $alterStmt) {
        try {
            // Check if column exists first
            $stmt = $conn->query("SELECT COUNT(*) FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = 'appointments' AND COLUMN_NAME = '$colName'");
            if ((int)$stmt->fetchColumn() === 0) {
                $conn->exec("ALTER TABLE appointments $alterStmt");
            }
        } catch (PDOException $e) {
            // Column might already exist or other issue, ignore
        }
    }
}

function ensureTreatmentPlansTable(PDO $conn): void {
    $conn->exec("
        CREATE TABLE IF NOT EXISTS treatment_plans (
            id INT AUTO_INCREMENT PRIMARY KEY,
            customer_id INT NOT NULL,
            title VARCHAR(200) NOT NULL,
            specialist_id INT NOT NULL,
            overall_goal TEXT,
            start_date DATE NOT NULL,
            status ENUM('active', 'completed', 'cancelled') DEFAULT 'active',
            clinical_notes TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
    ");
}

function ensureTreatmentPlanSessionsTable(PDO $conn): void {
    $conn->exec("
        CREATE TABLE IF NOT EXISTS treatment_plan_sessions (
            id INT AUTO_INCREMENT PRIMARY KEY,
            plan_id INT NOT NULL,
            session_number INT NOT NULL,
            service_id VARCHAR(50) NOT NULL,
            service_name VARCHAR(200) NOT NULL,
            focus_notes TEXT,
            completed_at DATETIME DEFAULT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
    ");
}

function ensureSessionRecordsTable(PDO $conn): void {
    $conn->exec("
        CREATE TABLE IF NOT EXISTS session_records (
            id INT AUTO_INCREMENT PRIMARY KEY,
            plan_session_id INT NOT NULL,
            clinical_observations TEXT,
            outcome_rating TINYINT DEFAULT NULL,
            next_focus VARCHAR(255) DEFAULT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
    ");
}

function ensureContactsTable(PDO $conn): void {
    $conn->exec("
        CREATE TABLE IF NOT EXISTS contacts (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL,
            phone VARCHAR(20),
            subject VARCHAR(100),
            message TEXT NOT NULL,
            status ENUM('new', 'read', 'replied') DEFAULT 'new',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ");
}

function ensureServicesTable(PDO $conn): void {
    $conn->exec("
        CREATE TABLE IF NOT EXISTS services (
            id VARCHAR(20) PRIMARY KEY,
            name VARCHAR(200) NOT NULL,
            tagline VARCHAR(200) DEFAULT '',
            category VARCHAR(100) DEFAULT '',
            image VARCHAR(500) DEFAULT '',
            duration VARCHAR(50) DEFAULT '',
            sessions VARCHAR(50) DEFAULT '',
            price VARCHAR(50) DEFAULT '',
            original_price VARCHAR(50) DEFAULT NULL,
            description TEXT DEFAULT '',
            benefits JSON DEFAULT NULL,
            preparation JSON DEFAULT NULL,
            is_combo TINYINT(1) DEFAULT 0,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ");
    $stmt = $conn->query("SELECT COUNT(*) FROM services");
    if ((int)$stmt->fetchColumn() === 0) {
        $conn->exec("
            INSERT INTO services (id, name, tagline, category, image, duration, sessions, price, original_price, description, benefits, preparation, is_combo) VALUES
            ('1', 'Hydra Renewal', 'Deep Cellular Hydration', 'Hydration Therapy', 'https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?w=800&q=80', '45 - 60 mins', '3-Session Path', '1.800.000 VND', NULL, 'Our Hydra Renewal treatment utilizes advanced vortex technology to deliver deep cellular hydration and detoxification.', '[\"Deep pore cleansing and detoxification\",\"Instant hydration boost\",\"Improved skin texture and tone\",\"Reduced appearance of fine lines\",\"Enhanced product absorption\"]', '[\"Avoid direct sun exposure 24 hours prior\",\"Arrive with a clean, makeup-free face\",\"Stay hydrated before your session\",\"Avoid harsh skincare products 2 days before\"]', 0),
            ('2', 'Laser Resurfacing', 'Precision Wrinkle Reduction', 'Laser Therapy', 'https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?w=800&q=80', '60 - 90 mins', '4-Session Path', '4.500.000 VND', NULL, 'Our Fractional CO2 Laser Resurfacing treatment targets wrinkles, fine lines, and skin texture with precision.', '[\"Significant wrinkle reduction\",\"Improved skin texture and tone\",\"Reduced appearance of scars\",\"Stimulated collagen production\",\"Long-lasting results\"]', '[\"Avoid sun exposure 2 weeks prior\",\"Discontinue Retinol 1 week before\",\"Avoid blood thinners 3 days prior\",\"Arrive with clean skin\"]', 0),
            ('3', 'Advanced Acne Therapy', 'Multi-Dimensional Acne Treatment', 'Dermatological Precision', 'https://images.unsplash.com/photo-1552693673-1bf958298935?w=800&q=80', '60 - 90 mins', '5-Session Path', '3.500.000 VND', NULL, 'Our Advanced Acne Therapy is a multi-dimensional approach designed by leading clinical dermatologists.', '[\"Deep pore cleansing\",\"Inflammation reduction\",\"Future acne prevention\",\"Reduced scarring\",\"Balanced oil production\"]', '[\"Avoid direct sun exposure 48 hours prior\",\"Discontinue Retinol use 3 days before\",\"Arrive with a clean, makeup-free face\",\"Hydrate well before your session\"]', 0),
            ('4', 'Dermal Fillers', 'Volume Restoration & Contouring', 'Injectable Therapy', 'https://images.unsplash.com/photo-1512290923902-8a9f81dc236c?w=800&q=80', '30 - 45 mins', 'Single Session', '5.500.000 VND', NULL, 'Our Dermal Fillers treatment uses premium hyaluronic acid fillers to restore volume and enhance facial contours.', '[\"Immediate volume restoration\",\"Enhanced facial contours\",\"Reduced appearance of wrinkles\",\"Natural-looking results\",\"Long-lasting effects\"]', '[\"Avoid blood thinners 1 week prior\",\"Avoid alcohol 24 hours before\",\"Discontinue Retinol 2 days before\",\"No active skin infections\"]', 0),
            ('5', 'Chemical Peel', 'Medical-Grade Exfoliation', 'Skin Renewal', 'https://images.unsplash.com/photo-1557804506-669a67965ba0?w=800&q=80', '45 - 60 mins', '3-Session Path', '2.200.000 VND', NULL, 'Our Medical-Grade Chemical Peel provides controlled exfoliation to remove damaged skin cells and stimulate regeneration.', '[\"Pigmentation correction\",\"Improved skin texture\",\"Reduced fine lines\",\"Even skin tone\",\"Enhanced radiance\"]', '[\"Avoid sun exposure 1 week prior\",\"Discontinue Retinol 5 days before\",\"Avoid harsh exfoliants 3 days prior\",\"Keep skin moisturized\"]', 0),
            ('6', 'LED Light Therapy', 'Non-Invasive Skin Rejuvenation', 'Light Therapy', 'https://images.unsplash.com/photo-1519415510236-718bdfcd89c8?w=800&q=80', '20 - 30 mins', '6-Session Path', '1.500.000 VND', NULL, 'Our LED Light Therapy uses specific wavelengths of light to target various skin concerns.', '[\"Acne reduction\",\"Anti-aging effects\",\"Reduced inflammation\",\"Improved skin healing\",\"No downtime\"]', '[\"Remove all makeup before treatment\",\"Cleanse skin thoroughly\",\"No specific restrictions\",\"Stay hydrated\"]', 0),
            ('combo1', 'Glow Package', 'Radiant Skin Transformation', 'Signature Combo', 'assets/combo-glow.png', '180 mins total', '3 Sessions', '5.500.000 VND', '7.000.000 VND', 'Our Glow Package is designed for those seeking instant radiance.', '[\"Hydra Renewal x2 sessions\",\"LED Light Therapy x1 session\",\"Free Skin Analysis\",\"Personalized skincare recommendations\",\"Post-treatment aftercare kit\"]', '[\"Avoid sun exposure before treatments\",\"Arrive with clean face\",\"Stay hydrated\",\"Complete consultation form\"]', 1),
            ('combo2', 'Ultimate Transformation', 'Complete Skin Makeover', 'Signature Combo', 'assets/combo-ultimate.png', '300 mins total', '5 Sessions', '12.000.000 VND', '15.000.000 VND', 'The Ultimate Transformation is our most comprehensive package.', '[\"Laser Resurfacing x2 sessions\",\"Hydra Renewal x2 sessions\",\"Dermal Fillers x1 session\",\"VIP Aftercare Kit\",\"Priority booking\",\"Complimentary touch-up\"]', '[\"Comprehensive consultation required\",\"Avoid sun exposure 2 weeks prior\",\"Discontinue Retinol 1 week before\",\"Plan for minimal downtime\"]', 1),
            ('combo3', 'Ageless Package', 'Reverse Signs of Aging', 'Signature Combo', 'assets/combo-ageless.png', '240 mins total', '4 Sessions', '8.500.000 VND', '10.500.000 VND', 'The Ageless Package targets multiple signs of aging.', '[\"Advanced Acne Therapy x2 sessions\",\"Chemical Peel x1 session\",\"LED Light Therapy x1 session\",\"Age management consultation\",\"Customized anti-aging skincare plan\"]', '[\"Avoid sun exposure 1 week prior\",\"Discontinue Retinol 5 days before\",\"Arrive with clean skin\",\"Discuss any allergies in consultation\"]', 1)
        ");
    }
}

function redirect($url) {
    header("Location: $url");
    exit();
}