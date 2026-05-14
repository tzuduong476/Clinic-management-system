<?php
// Database connection configuration
class DatabaseConfig {
    public string $host;
    public string $dbname;
    public string $username;
    public string $password;

    public function __construct() {
        $this->host = getenv('DB_HOST') ?: 'localhost';
        $this->dbname = getenv('DB_NAME') ?: 'clinic';
        $this->username = getenv('DB_USER') ?: 'root';
        $this->password = getenv('DB_PASS') ?: '';
    }
}

$config = new DatabaseConfig();

// Connect without database first
try {
    $pdoNoDb = new PDO("mysql:host={$config->host};charset=utf8mb4", $config->username, $config->password);
    $pdoNoDb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Create database if not exists
    $pdoNoDb->exec("CREATE DATABASE IF NOT EXISTS `{$config->dbname}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    $pdoNoDb->exec("USE `{$config->dbname}`");
    
    // Now connect with database
    $conn = new PDO("mysql:host={$config->host};dbname={$config->dbname};charset=utf8mb4", $config->username, $config->password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Database connection error: " . $e->getMessage());
    die(json_encode(['success' => false, 'message' => 'Không thể kết nối cơ sở dữ liệu. Vui lòng kiểm tra cấu hình.']));
}

// Ensure all tables exist
ensureAllTables($conn);

// Start session with fallback path for restricted environments
if (session_status() === PHP_SESSION_NONE) {
    $savePath = (string)ini_get('session.save_path');
    $parts = explode(';', $savePath);
    $resolvedPath = trim((string)end($parts));
    if ($resolvedPath === '' || !is_dir($resolvedPath) || !is_writable($resolvedPath)) {
        $fallbackPath = __DIR__ . '/../tmp/sessions';
        if (!is_dir($fallbackPath)) {
            @mkdir($fallbackPath, 0777, true);
        }
        if (is_dir($fallbackPath) && is_writable($fallbackPath)) {
            session_save_path($fallbackPath);
        }
    }
    session_start();
}

// Helper function to get logged in user
function getCurrentUser() {
    if (isset($_SESSION['user_id'])) {
        $phone = preg_replace('/\D/', '', (string)($_SESSION['user_phone'] ?? ''));
        return [
            'id' => $_SESSION['user_id'],
            'email' => $_SESSION['user_email'] ?? '',
            'full_name' => $_SESSION['user_name'] ?? '',
            'role' => $_SESSION['user_role'] ?? 'patient',
            'phone' => $phone
        ];
    }
    return null;
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function redirect($url) {
    header("Location: $url");
    exit();
}

// Master function to ensure all tables
function ensureAllTables(PDO $conn) {
    ensureUsersTable($conn);
    ensureCustomerTable($conn);
    ensureSpecialistsTable($conn);
    ensureServicesTable($conn);
    ensureAppointmentsTable($conn);
    ensureNotificationsTable($conn);
    ensureTreatmentPlansTable($conn);
    ensureTreatmentPlanSessionsTable($conn);
    ensureSessionRecordsTable($conn);
    ensureSessionSchedulesTable($conn);
    ensureFeedbackTable($conn);
    
    // Ensure default users exist
    ensureDefaultUsers($conn);
}

// Helper to add column if not exists
function addColumnIfNotExists(PDO $conn, string $table, string $colName, string $alterStmt) {
    try {
        $stmt = $conn->query("SELECT COUNT(*) FROM information_schema.COLUMNS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = '$table' AND COLUMN_NAME = '$colName'");
        if ($stmt && (int)$stmt->fetchColumn() === 0) {
            $conn->exec("ALTER TABLE `$table` $alterStmt");
        }
    } catch (PDOException $e) {
        error_log("addColumnIfNotExists error for $table.$colName: " . $e->getMessage());
    }
}

// Helper to check if table exists
function tableExists(PDO $conn, string $tableName): bool {
    try {
        $stmt = $conn->prepare("SELECT COUNT(*) FROM information_schema.tables WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = ?");
        $stmt->execute([$tableName]);
        return (int)$stmt->fetchColumn() > 0;
    } catch (PDOException $e) {
        return false;
    }
}

// Users table
function ensureUsersTable(PDO $conn) {
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
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
    ");
    
    try {
        $conn->exec("ALTER TABLE users MODIFY COLUMN role ENUM('patient', 'admin', 'doctor', 'receptionist') DEFAULT 'patient'");
    } catch (PDOException $e) { }
}

// Default users
function ensureDefaultUsers(PDO $conn) {
    $hash = password_hash('123', PASSWORD_DEFAULT);
    
    // Admin
    $stmt = $conn->prepare("SELECT id FROM users WHERE role = 'admin' LIMIT 1");
    $stmt->execute();
    if (!$stmt->fetch()) {
        $stmt = $conn->prepare("INSERT INTO users (full_name, email, phone, password, role) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute(['Admin', 'admin@elysian.clinic', '', $hash, 'admin']);
    }
    
    // Receptionist
    $stmt = $conn->prepare("SELECT id FROM users WHERE role = 'receptionist' LIMIT 1");
    $stmt->execute();
    if (!$stmt->fetch()) {
        $stmt = $conn->prepare("INSERT INTO users (full_name, email, phone, password, role) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute(['Lễ Tân', 'letan@clinic.com', '', $hash, 'receptionist']);
    }
    
    // Doctor
    $stmt = $conn->prepare("SELECT id FROM users WHERE role = 'doctor' LIMIT 1");
    $stmt->execute();
    if (!$stmt->fetch()) {
        $stmt = $conn->prepare("INSERT INTO users (full_name, email, phone, password, role) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute(['Dr. Sarah Jensen', 'doctor@elysian.clinic', '', $hash, 'doctor']);
    }
}

// Customer table
function ensureCustomerTable(PDO $conn) {
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
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
    ");
    
    addColumnIfNotExists($conn, 'Customer', 'Date_of_birth', "ADD COLUMN Date_of_birth DATE DEFAULT NULL AFTER Medical_history");
    addColumnIfNotExists($conn, 'Customer', 'Skin_condition', "ADD COLUMN Skin_condition VARCHAR(100) DEFAULT '' AFTER Date_of_birth");
    addColumnIfNotExists($conn, 'Customer', 'Patient_notes', "ADD COLUMN Patient_notes TEXT DEFAULT NULL AFTER Skin_condition");
}

// Specialists table
function ensureSpecialistsTable(PDO $conn) {
    $conn->exec("
        CREATE TABLE IF NOT EXISTS specialists (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            title VARCHAR(150) NOT NULL,
            avatar_url VARCHAR(500) DEFAULT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
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

// Services table
function ensureServicesTable(PDO $conn) {
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
            status ENUM('active', 'hidden') DEFAULT 'active',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
    ");
    
    addColumnIfNotExists($conn, 'services', 'status', "ADD COLUMN status ENUM('active', 'hidden') DEFAULT 'active' AFTER is_combo");
    
    try {
        $conn->exec("UPDATE services SET status = 'active' WHERE status IS NULL OR status = ''");
    } catch (PDOException $e) { }
    
    $stmt = $conn->query("SELECT COUNT(*) FROM services");
    if ((int)$stmt->fetchColumn() === 0) {
        $conn->exec("
            INSERT INTO services (id, name, tagline, category, image, duration, sessions, price, original_price, description, benefits, preparation, is_combo, status) VALUES
            ('1', 'Hydra Renewal', 'Deep Cellular Hydration', 'Hydration Therapy', 'https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?w=800&q=80', '45 - 60 mins', '3-Session Path', '1.800.000 VND', NULL, 'Our Hydra Renewal treatment utilizes advanced vortex technology to deliver deep cellular hydration and detoxification.', '[\"Deep pore cleansing and detoxification\",\"Instant hydration boost\",\"Improved skin texture and tone\",\"Reduced appearance of fine lines\",\"Enhanced product absorption\"]', '[\"Avoid direct sun exposure 24 hours prior\",\"Arrive with a clean, makeup-free face\",\"Stay hydrated before your session\",\"Avoid harsh skincare products 2 days before\"]', 0, 'active'),
            ('2', 'Laser Resurfacing', 'Precision Wrinkle Reduction', 'Laser Therapy', 'https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?w=800&q=80', '60 - 90 mins', '4-Session Path', '4.500.000 VND', NULL, 'Our Fractional CO2 Laser Resurfacing treatment targets wrinkles, fine lines, and skin texture with precision.', '[\"Significant wrinkle reduction\",\"Improved skin texture and tone\",\"Reduced appearance of scars\",\"Stimulated collagen production\",\"Long-lasting results\"]', '[\"Avoid sun exposure 2 weeks prior\",\"Discontinue Retinol 1 week before\",\"Avoid blood thinners 3 days prior\",\"Arrive with clean skin\"]', 0, 'active'),
            ('3', 'Advanced Acne Therapy', 'Multi-Dimensional Acne Treatment', 'Dermatological Precision', 'https://images.unsplash.com/photo-1552693673-1bf958298935?w=800&q=80', '60 - 90 mins', '5-Session Path', '3.500.000 VND', NULL, 'Our Advanced Acne Therapy is a multi-dimensional approach designed by leading clinical dermatologists.', '[\"Deep pore cleansing\",\"Inflammation reduction\",\"Future acne prevention\",\"Reduced scarring\",\"Balanced oil production\"]', '[\"Avoid direct sun exposure 48 hours prior\",\"Discontinue Retinol use 3 days before\",\"Arrive with a clean, makeup-free face\",\"Hydrate well before your session\"]', 0, 'active'),
            ('4', 'Dermal Fillers', 'Volume Restoration & Contouring', 'Injectable Therapy', 'https://images.unsplash.com/photo-1512290923902-8a9f81dc236c?w=800&q=80', '30 - 45 mins', 'Single Session', '5.500.000 VND', NULL, 'Our Dermal Fillers treatment uses premium hyaluronic acid fillers to restore volume and enhance facial contours.', '[\"Immediate volume restoration\",\"Enhanced facial contours\",\"Reduced appearance of wrinkles\",\"Natural-looking results\",\"Long-lasting effects\"]', '[\"Avoid blood thinners 1 week prior\",\"Avoid alcohol 24 hours before\",\"Discontinue Retinol 2 days before\",\"No active skin infections\"]', 0, 'active'),
            ('5', 'Chemical Peel', 'Medical-Grade Exfoliation', 'Skin Renewal', 'https://images.unsplash.com/photo-1557804506-669a67965ba0?w=800&q=80', '45 - 60 mins', '3-Session Path', '2.200.000 VND', NULL, 'Our Medical-Grade Chemical Peel provides controlled exfoliation to remove damaged skin cells and stimulate regeneration.', '[\"Pigmentation correction\",\"Improved skin texture\",\"Reduced fine lines\",\"Even skin tone\",\"Enhanced radiance\"]', '[\"Avoid sun exposure 1 week prior\",\"Discontinue Retinol 5 days before\",\"Avoid harsh exfoliants 3 days prior\",\"Keep skin moisturized\"]', 0, 'active'),
            ('6', 'LED Light Therapy', 'Non-Invasive Skin Rejuvenation', 'Light Therapy', 'https://images.unsplash.com/photo-1519415510236-718bdfcd89c8?w=800&q=80', '20 - 30 mins', '6-Session Path', '1.500.000 VND', NULL, 'Our LED Light Therapy uses specific wavelengths of light to target various skin concerns.', '[\"Acne reduction\",\"Anti-aging effects\",\"Reduced inflammation\",\"Improved skin healing\",\"No downtime\"]', '[\"Remove all makeup before treatment\",\"Cleanse skin thoroughly\",\"No specific restrictions\",\"Stay hydrated\"]', 0, 'active'),
            ('combo1', 'Glow Package', 'Radiant Skin Transformation', 'Signature Combo', 'assets/combo-glow.png', '180 mins total', '3 Sessions', '5.500.000 VND', '7.000.000 VND', 'Our Glow Package is designed for those seeking instant radiance.', '[\"Hydra Renewal x2 sessions\",\"LED Light Therapy x1 session\",\"Free Skin Analysis\",\"Personalized skincare recommendations\",\"Post-treatment aftercare kit\"]', '[\"Avoid sun exposure before treatments\",\"Arrive with clean face\",\"Stay hydrated\",\"Complete consultation form\"]', 1, 'active'),
            ('combo2', 'Ultimate Transformation', 'Complete Skin Makeover', 'Signature Combo', 'assets/combo-ultimate.png', '300 mins total', '5 Sessions', '12.000.000 VND', '15.000.000 VND', 'The Ultimate Transformation is our most comprehensive package.', '[\"Laser Resurfacing x2 sessions\",\"Hydra Renewal x2 sessions\",\"Dermal Fillers x1 session\",\"VIP Aftercare Kit\",\"Priority booking\",\"Complimentary touch-up\"]', '[\"Comprehensive consultation required\",\"Avoid sun exposure 2 weeks prior\",\"Discontinue Retinol 1 week before\",\"Plan for minimal downtime\"]', 1, 'active'),
            ('combo3', 'Ageless Package', 'Reverse Signs of Aging', 'Signature Combo', 'assets/combo-ageless.png', '240 mins total', '4 Sessions', '8.500.000 VND', '10.500.000 VND', 'The Ageless Package targets multiple signs of aging.', '[\"Advanced Acne Therapy x2 sessions\",\"Chemical Peel x1 session\",\"LED Light Therapy x1 session\",\"Age management consultation\",\"Customized anti-aging skincare plan\"]', '[\"Avoid sun exposure 1 week prior\",\"Discontinue Retinol 5 days before\",\"Arrive with clean skin\",\"Discuss any allergies in consultation\"]', 1, 'active')
        ");
    }
}

// Appointments table
function ensureAppointmentsTable(PDO $conn) {
    $conn->exec("
        CREATE TABLE IF NOT EXISTS appointments (
            id INT AUTO_INCREMENT PRIMARY KEY,
            booking_code VARCHAR(20) NOT NULL UNIQUE,
            user_id INT DEFAULT NULL,
            customer_id INT DEFAULT NULL,
            customer_name VARCHAR(100) NOT NULL,
            customer_phone VARCHAR(20) NOT NULL,
            service_id VARCHAR(50) NOT NULL,
            service_name VARCHAR(200) NOT NULL,
            specialist_id INT NOT NULL,
            specialist_name VARCHAR(100) NOT NULL,
            appointment_date DATE NOT NULL,
            appointment_time TIME NOT NULL,
            total_price VARCHAR(50) NOT NULL,
            status ENUM('pending', 'confirmed', 'checked_in', 'completed', 'no_show', 'cancelled') DEFAULT 'confirmed',
            payment_status ENUM('unpaid', 'paid') DEFAULT 'unpaid',
            payment_method VARCHAR(50) DEFAULT NULL,
            payment_note TEXT DEFAULT NULL,
            confirmed_by INT DEFAULT NULL,
            confirmed_at DATETIME DEFAULT NULL,
            arrival_status ENUM('not_arrived', 'arrived') DEFAULT 'not_arrived',
            checked_in_at DATETIME DEFAULT NULL,
            checked_in_by INT DEFAULT NULL,
            appointment_type VARCHAR(50) DEFAULT 'consultation',
            plan_session_id INT DEFAULT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
    ");
    
    // Sync ENUM for status
    try {
        $conn->exec("ALTER TABLE appointments MODIFY COLUMN status ENUM('pending', 'confirmed', 'checked_in', 'completed', 'no_show', 'cancelled') NOT NULL DEFAULT 'confirmed'");
    } catch (PDOException $e) { }
}

// Notifications table
function ensureNotificationsTable(PDO $conn) {
    $conn->exec("
        CREATE TABLE IF NOT EXISTS notifications (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT DEFAULT NULL,
            customer_id INT DEFAULT NULL,
            type ENUM('appointment', 'session', 'payment', 'system', 'reminder') NOT NULL,
            title VARCHAR(200) NOT NULL,
            message TEXT NOT NULL,
            priority ENUM('low', 'medium', 'high', 'urgent') DEFAULT 'medium',
            is_read BOOLEAN DEFAULT FALSE,
            related_id INT DEFAULT NULL,
            related_type VARCHAR(50) DEFAULT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            INDEX idx_user_read (user_id, is_read),
            INDEX idx_customer (customer_id),
            INDEX idx_type (type),
            INDEX idx_created (created_at)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
    ");
    
    addColumnIfNotExists($conn, 'notifications', 'priority', "ADD COLUMN priority ENUM('low', 'medium', 'high', 'urgent') DEFAULT 'medium' AFTER message");
    addColumnIfNotExists($conn, 'notifications', 'related_id', "ADD COLUMN related_id INT DEFAULT NULL AFTER is_read");
    addColumnIfNotExists($conn, 'notifications', 'related_type', "ADD COLUMN related_type VARCHAR(50) DEFAULT NULL AFTER related_id");
}

// Treatment Plans table
function ensureTreatmentPlansTable(PDO $conn) {
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

// Treatment Plan Sessions table
function ensureTreatmentPlanSessionsTable(PDO $conn) {
    $conn->exec("
        CREATE TABLE IF NOT EXISTS treatment_plan_sessions (
            id INT AUTO_INCREMENT PRIMARY KEY,
            plan_id INT NOT NULL,
            session_number INT NOT NULL,
            service_id VARCHAR(50) NOT NULL,
            service_name VARCHAR(200) NOT NULL,
            focus_notes TEXT,
            before_image_path VARCHAR(500) DEFAULT NULL,
            after_image_path VARCHAR(500) DEFAULT NULL,
            completed_at DATETIME DEFAULT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
    ");
    
    addColumnIfNotExists($conn, 'treatment_plan_sessions', 'before_image_path', "ADD COLUMN before_image_path VARCHAR(500) DEFAULT NULL AFTER focus_notes");
    addColumnIfNotExists($conn, 'treatment_plan_sessions', 'after_image_path', "ADD COLUMN after_image_path VARCHAR(500) DEFAULT NULL AFTER before_image_path");
    addColumnIfNotExists($conn, 'treatment_plan_sessions', 'completed_at', "ADD COLUMN completed_at DATETIME DEFAULT NULL");
}

// Session Records table
function ensureSessionRecordsTable(PDO $conn) {
    $conn->exec("
        CREATE TABLE IF NOT EXISTS session_records (
            id INT AUTO_INCREMENT PRIMARY KEY,
            plan_session_id INT NOT NULL,
            treatment_date DATE DEFAULT NULL,
            clinical_observations TEXT,
            skin_response VARCHAR(100) DEFAULT NULL,
            outcome_rating TINYINT DEFAULT NULL,
            pain_level INT DEFAULT NULL,
            products_used TEXT,
            home_care TEXT,
            next_focus VARCHAR(255) DEFAULT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            UNIQUE KEY uniq_plan_session_id (plan_session_id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
    ");
    
    addColumnIfNotExists($conn, 'session_records', 'treatment_date', "ADD COLUMN treatment_date DATE DEFAULT NULL AFTER plan_session_id");
    addColumnIfNotExists($conn, 'session_records', 'skin_response', "ADD COLUMN skin_response VARCHAR(100) DEFAULT NULL AFTER clinical_observations");
    addColumnIfNotExists($conn, 'session_records', 'pain_level', "ADD COLUMN pain_level INT DEFAULT NULL AFTER outcome_rating");
    addColumnIfNotExists($conn, 'session_records', 'products_used', "ADD COLUMN products_used TEXT AFTER pain_level");
    addColumnIfNotExists($conn, 'session_records', 'home_care', "ADD COLUMN home_care TEXT AFTER products_used");
    addColumnIfNotExists($conn, 'session_records', 'updated_at', "ADD COLUMN updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP AFTER created_at");
    
    try {
        $stmt = $conn->query("SHOW INDEX FROM session_records WHERE Key_name = 'uniq_plan_session_id'");
        if (!$stmt || !$stmt->fetch()) {
            $conn->exec("ALTER TABLE session_records ADD UNIQUE KEY uniq_plan_session_id (plan_session_id)");
        }
    } catch (PDOException $e) { }
}

// Session Schedules table
function ensureSessionSchedulesTable(PDO $conn) {
    $conn->exec("
        CREATE TABLE IF NOT EXISTS treatment_session_schedules (
            id INT AUTO_INCREMENT PRIMARY KEY,
            plan_session_id INT NOT NULL,
            scheduled_date DATE NOT NULL,
            scheduled_time TIME NOT NULL,
            specialist_id INT NOT NULL,
            status ENUM('scheduled', 'completed', 'cancelled', 'rescheduled') DEFAULT 'scheduled',
            notes TEXT,
            appointment_id INT DEFAULT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
    ");
    
    addColumnIfNotExists($conn, 'treatment_session_schedules', 'appointment_id', "ADD COLUMN appointment_id INT DEFAULT NULL AFTER status");
    addColumnIfNotExists($conn, 'treatment_session_schedules', 'updated_at', "ADD COLUMN updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP AFTER created_at");
}

// Feedback table
function ensureFeedbackTable(PDO $conn) {
    $hasLegacyContacts = tableExists($conn, 'contacts');
    $hasFeedback = tableExists($conn, 'feedback');

    if ($hasLegacyContacts && !$hasFeedback) {
        try {
            $conn->exec("RENAME TABLE contacts TO feedback");
            $hasFeedback = true;
        } catch (PDOException $e) { }
    }

    $conn->exec("
        CREATE TABLE IF NOT EXISTS feedback (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL,
            phone VARCHAR(20),
            subject VARCHAR(100),
            message TEXT NOT NULL,
            status ENUM('new', 'read', 'replied') DEFAULT 'new',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4
    ");

    if ($hasLegacyContacts && tableExists($conn, 'contacts')) {
        try {
            $conn->exec("
                INSERT IGNORE INTO feedback (id, name, email, phone, subject, message, status, created_at)
                SELECT c.id, c.name, c.email, c.phone, c.subject, c.message, c.status, c.created_at
                FROM contacts c
                LEFT JOIN feedback f ON f.id = c.id
                WHERE f.id IS NULL
            ");
            $conn->exec("DROP TABLE IF EXISTS contacts");
        } catch (PDOException $e) { }
    }
}

// Sync treatment plan status
function syncTreatmentPlanStatus(PDO $conn, int $planId): ?string {
    if ($planId <= 0) {
        return null;
    }

    $stmt = $conn->prepare("SELECT status FROM treatment_plans WHERE id = ? LIMIT 1");
    $stmt->execute([$planId]);
    $currentStatus = $stmt->fetchColumn();

    if ($currentStatus === false || $currentStatus === 'cancelled') {
        return $currentStatus !== false ? (string)$currentStatus : null;
    }

    $stmt = $conn->prepare("
        SELECT
            COUNT(*) AS total_sessions,
            SUM(CASE WHEN completed_at IS NOT NULL THEN 1 ELSE 0 END) AS completed_sessions
        FROM treatment_plan_sessions
        WHERE plan_id = ?
    ");
    $stmt->execute([$planId]);
    $stats = $stmt->fetch(PDO::FETCH_ASSOC) ?: [];

    $totalSessions = (int)($stats['total_sessions'] ?? 0);
    $completedSessions = (int)($stats['completed_sessions'] ?? 0);

    $targetStatus = ($totalSessions > 0 && $completedSessions >= $totalSessions) ? 'completed' : 'active';

    if ((string)$currentStatus !== $targetStatus) {
        $stmt = $conn->prepare("UPDATE treatment_plans SET status = ?, updated_at = NOW() WHERE id = ?");
        $stmt->execute([$targetStatus, $planId]);
    }

    return $targetStatus;
}

function syncAllTreatmentPlanStatuses(PDO $conn): void {
    $stmt = $conn->query("SELECT id FROM treatment_plans WHERE status <> 'cancelled'");
    $planIds = $stmt ? $stmt->fetchAll(PDO::FETCH_COLUMN) : [];

    foreach ($planIds as $planId) {
        syncTreatmentPlanStatus($conn, (int)$planId);
    }
}
