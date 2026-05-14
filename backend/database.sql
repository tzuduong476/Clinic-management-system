CREATE DATABASE IF NOT EXISTS clinic CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE clinic;

SET FOREIGN_KEY_CHECKS = 0;
SET @unused_tables = (
    SELECT GROUP_CONCAT(CONCAT('`', table_name, '`'))
    FROM information_schema.tables
    WHERE table_schema = DATABASE()
      AND table_name NOT IN (
          'users',
          'Customer',
          'specialists',
          'services',
          'appointments',
          'feedback',
          'treatment_plans',
          'treatment_plan_sessions',
          'session_records'
      )
);
SET @drop_unused_sql = IF(@unused_tables IS NULL, 'SELECT 1', CONCAT('DROP TABLE ', @unused_tables));
PREPARE stmt_drop_unused FROM @drop_unused_sql;
EXECUTE stmt_drop_unused;
DEALLOCATE PREPARE stmt_drop_unused;

DROP TABLE IF EXISTS session_records;
DROP TABLE IF EXISTS treatment_plan_sessions;
DROP TABLE IF EXISTS treatment_plans;
DROP TABLE IF EXISTS appointments;
DROP TABLE IF EXISTS feedback;
DROP TABLE IF EXISTS services;
DROP TABLE IF EXISTS specialists;
DROP TABLE IF EXISTS `Customer`;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20),
    password VARCHAR(255) NOT NULL,
    role ENUM('patient', 'admin', 'doctor', 'receptionist') DEFAULT 'patient',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `Customer` (
    Customer_ID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(100) NOT NULL,
    Phone VARCHAR(20),
    Email VARCHAR(100) NOT NULL UNIQUE,
    Password VARCHAR(255) NOT NULL,
    Skin_type VARCHAR(50) DEFAULT '',
    Medical_history TEXT DEFAULT '',
    Date_of_birth DATE DEFAULT NULL,
    Skin_condition VARCHAR(100) DEFAULT '',
    Patient_notes TEXT DEFAULT NULL,
    Created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE specialists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    title VARCHAR(150) NOT NULL,
    avatar_url VARCHAR(500) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE services (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE appointments (
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
    status ENUM('pending', 'confirmed', 'checked_in', 'completed', 'no_show', 'cancelled') DEFAULT 'confirmed',
    payment_status ENUM('unpaid', 'paid') DEFAULT 'unpaid',
    payment_method VARCHAR(50) DEFAULT NULL,
    payment_note TEXT DEFAULT NULL,
    confirmed_by INT DEFAULT NULL,
    confirmed_at DATETIME DEFAULT NULL,
    arrival_status ENUM('not_arrived', 'arrived') DEFAULT 'not_arrived',
    checked_in_at DATETIME DEFAULT NULL,
    checked_in_by INT DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE treatment_plans (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE treatment_plan_sessions (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE session_records (
    id INT AUTO_INCREMENT PRIMARY KEY,
    plan_session_id INT NOT NULL,
    clinical_observations TEXT,
    outcome_rating TINYINT DEFAULT NULL,
    next_focus VARCHAR(255) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20),
    subject VARCHAR(100),
    message TEXT NOT NULL,
    status ENUM('new', 'read', 'replied') DEFAULT 'new',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO users (id, full_name, email, phone, password, role) VALUES
(1, 'Admin', 'admin@elysian.clinic', '0901000001', '$2y$10$4Zmxu1radRQSZGzQpt39Zelbw24zUfHM8tfXOJ61/nnVrUmhNAa9m', 'admin'),
(2, 'Lễ Tân Mai Anh', 'letan@clinic.com', '0901000002', '$2y$10$4Zmxu1radRQSZGzQpt39Zelbw24zUfHM8tfXOJ61/nnVrUmhNAa9m', 'receptionist'),
(3, 'Dr. Sarah Jensen', 'doctor@elysian.clinic', '0901000003', '$2y$10$4Zmxu1radRQSZGzQpt39Zelbw24zUfHM8tfXOJ61/nnVrUmhNAa9m', 'doctor');

INSERT INTO `Customer` (Customer_ID, Name, Phone, Email, Password, Skin_type, Medical_history, Date_of_birth, Skin_condition, Patient_notes) VALUES
(1, 'Nguyễn Minh Anh', '0903111222', 'minhanh@gmail.com', '$2y$10$4Zmxu1radRQSZGzQpt39Zelbw24zUfHM8tfXOJ61/nnVrUmhNAa9m', 'Combination', 'Da nhạy cảm nhẹ, không dị ứng thuốc', '1997-03-11', 'Acne-prone', 'Theo dõi vùng chữ T'),
(2, 'Trần Hoài Nam', '0903222333', 'hoainam@gmail.com', '$2y$10$4Zmxu1radRQSZGzQpt39Zelbw24zUfHM8tfXOJ61/nnVrUmhNAa9m', 'Oily', 'Tiền sử mụn viêm, đang dùng BHA nồng độ thấp', '1994-09-22', 'Post-acne marks', 'Ưu tiên giảm thâm và kiểm soát dầu'),
(3, 'Lê Khánh Linh', '0903333444', 'khanhlinh@gmail.com', '$2y$10$4Zmxu1radRQSZGzQpt39Zelbw24zUfHM8tfXOJ61/nnVrUmhNAa9m', 'Dry', 'Da thiếu ẩm theo mùa', '2000-01-08', 'Dehydrated skin', 'Ưu tiên liệu trình phục hồi hàng rào da');

INSERT INTO specialists (id, name, title, avatar_url) VALUES
(1, 'Dr. Sarah Jenkins', 'Lead Dermatologist', 'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=100&h=100&fit=crop&crop=face'),
(2, 'Dr. Lam', 'Senior Dermatologist', 'https://images.unsplash.com/photo-1612349317150-e413f6a5b16d?w=100&h=100&fit=crop&crop=face'),
(3, 'Dr. Michael Chen', 'Aesthetic Specialist', 'https://images.unsplash.com/photo-1622253692010-333f2da6031d?w=100&h=100&fit=crop&crop=face');

INSERT INTO services (id, name, tagline, category, image, duration, sessions, price, original_price, description, benefits, preparation, is_combo, status) VALUES
('1', 'Hydra Renewal', 'Deep Cellular Hydration', 'Hydration Therapy', 'https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?w=800&q=80', '45 - 60 mins', '3-Session Path', '1.800.000 VND', NULL, 'Hydra Renewal ứng dụng công nghệ làm sạch xoáy nước và cấp ẩm sâu.', '["Làm sạch sâu lỗ chân lông","Cấp ẩm tức thì","Bề mặt da mịn hơn","Giảm khô ráp"]', '["Tránh nắng trực tiếp 24 giờ trước điều trị","Đến với da mặt sạch","Uống đủ nước trước buổi hẹn"]', 0, 'active'),
('2', 'Laser Resurfacing', 'Precision Wrinkle Reduction', 'Laser Therapy', 'https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?w=800&q=80', '60 - 90 mins', '4-Session Path', '4.500.000 VND', NULL, 'Liệu trình laser fractional giúp cải thiện nếp nhăn và bề mặt da.', '["Giảm nếp nhăn","Cải thiện cấu trúc da","Kích thích collagen"]', '["Ngưng retinol 7 ngày trước điều trị","Hạn chế nắng gắt 2 tuần trước"]', 0, 'active'),
('3', 'Advanced Acne Therapy', 'Multi-Dimensional Acne Treatment', 'Dermatological Precision', 'https://images.unsplash.com/photo-1552693673-1bf958298935?w=800&q=80', '60 - 90 mins', '5-Session Path', '3.500.000 VND', NULL, 'Điều trị mụn đa tác động, giảm viêm và hạn chế thâm sau mụn.', '["Giảm viêm mụn","Giảm nguy cơ sẹo","Kiểm soát dầu"]', '["Không nặn mụn trước buổi điều trị","Giữ da sạch và thông thoáng"]', 0, 'active'),
('4', 'Dermal Fillers', 'Volume Restoration & Contouring', 'Injectable Therapy', 'https://images.unsplash.com/photo-1512290923902-8a9f81dc236c?w=800&q=80', '30 - 45 mins', 'Single Session', '5.500.000 VND', NULL, 'Tiêm filler HA giúp cải thiện thể tích và đường nét khuôn mặt.', '["Hiệu quả tức thì","Đường nét cân đối hơn"]', '["Không dùng rượu 24 giờ trước điều trị","Thông báo tiền sử dị ứng cho bác sĩ"]', 0, 'active'),
('5', 'Chemical Peel', 'Medical-Grade Exfoliation', 'Skin Renewal', 'https://images.unsplash.com/photo-1557804506-669a67965ba0?w=800&q=80', '45 - 60 mins', '3-Session Path', '2.200.000 VND', NULL, 'Peel y khoa giúp tái tạo bề mặt da, đều màu và sáng mịn hơn.', '["Giảm xỉn màu","Bề mặt da đều hơn","Hỗ trợ giảm thâm"]', '["Dưỡng ẩm tốt trước buổi peel","Không tẩy da chết mạnh 3 ngày trước"]', 0, 'active'),
('6', 'LED Light Therapy', 'Non-Invasive Skin Rejuvenation', 'Light Therapy', 'https://images.unsplash.com/photo-1519415510236-718bdfcd89c8?w=800&q=80', '20 - 30 mins', '6-Session Path', '1.500.000 VND', NULL, 'Liệu pháp ánh sáng LED hỗ trợ phục hồi và giảm viêm da.', '["Không xâm lấn","Ít thời gian nghỉ dưỡng","Phù hợp da nhạy cảm"]', '["Làm sạch da trước điều trị","Không yêu cầu chuẩn bị phức tạp"]', 0, 'active'),
('combo1', 'Glow Package', 'Radiant Skin Transformation', 'Signature Combo', 'assets/combo-glow.png', '180 mins total', '3 Sessions', '5.500.000 VND', '7.000.000 VND', 'Combo Glow kết hợp cấp ẩm, phục hồi và làm sáng da.', '["Hydra Renewal x2","LED Therapy x1","Tư vấn chăm sóc da cá nhân"]', '["Tránh nắng trước liệu trình","Đến đúng lịch hẹn"]', 1, 'active'),
('combo2', 'Ultimate Transformation', 'Complete Skin Makeover', 'Signature Combo', 'assets/combo-ultimate.png', '300 mins total', '5 Sessions', '12.000.000 VND', '15.000.000 VND', 'Combo toàn diện cho khách hàng cần cải thiện nhiều vấn đề da.', '["Laser x2","Hydra x2","Filler x1"]', '["Khám và tư vấn toàn diện trước khi bắt đầu"]', 1, 'active'),
('combo3', 'Ageless Package', 'Reverse Signs of Aging', 'Signature Combo', 'assets/combo-ageless.png', '240 mins total', '4 Sessions', '8.500.000 VND', '10.500.000 VND', 'Combo hỗ trợ giảm dấu hiệu lão hóa và cải thiện độ đàn hồi.', '["Acne Therapy x2","Chemical Peel x1","LED x1"]', '["Hạn chế nắng và dưỡng ẩm đều đặn trước liệu trình"]', 1, 'active');

INSERT INTO appointments (id, booking_code, user_id, customer_name, customer_phone, service_id, service_name, specialist_id, specialist_name, appointment_date, appointment_time, total_price, status, payment_status, payment_method, payment_note, confirmed_by, confirmed_at) VALUES
(1, 'ELY100001', 1, 'Nguyễn Minh Anh', '0903111222', '1', 'Hydra Renewal', 1, 'Dr. Sarah Jenkins', CURDATE(), '09:00:00', '1.800.000 VND', 'confirmed', 'paid', 'cash', 'Thanh toán tại quầy', 2, NOW()),
(2, 'ELY100002', 2, 'Trần Hoài Nam', '0903222333', '3', 'Advanced Acne Therapy', 2, 'Dr. Lam', DATE_ADD(CURDATE(), INTERVAL 1 DAY), '10:30:00', '3.500.000 VND', 'pending', 'unpaid', NULL, NULL, NULL, NULL),
(3, 'ELY100003', 3, 'Lê Khánh Linh', '0903333444', 'combo1', 'Glow Package', 3, 'Dr. Michael Chen', DATE_ADD(CURDATE(), INTERVAL 2 DAY), '14:00:00', '5.500.000 VND', 'confirmed', 'paid', 'transfer', 'Đã chuyển khoản trước', 2, NOW());

INSERT INTO treatment_plans (id, customer_id, title, specialist_id, overall_goal, start_date, status, clinical_notes) VALUES
(1, 1, 'Phục hồi nền da và cấp ẩm sâu', 1, 'Tăng độ ẩm, giảm kích ứng và ổn định hàng rào bảo vệ da', CURDATE(), 'active', 'Theo dõi phản ứng da sau từng buổi'),
(2, 2, 'Kiểm soát mụn viêm và mờ thâm', 2, 'Giảm mụn viêm, hạn chế mụn tái phát, cải thiện vết thâm', DATE_SUB(CURDATE(), INTERVAL 7 DAY), 'active', 'Kết hợp chăm sóc tại nhà theo phác đồ');

INSERT INTO treatment_plan_sessions (id, plan_id, session_number, service_id, service_name, focus_notes, completed_at) VALUES
(1, 1, 1, '1', 'Hydra Renewal', 'Làm sạch sâu và cấp ẩm ban đầu', DATE_SUB(NOW(), INTERVAL 3 DAY)),
(2, 1, 2, '6', 'LED Light Therapy', 'Giảm đỏ và phục hồi sau làm sạch', NULL),
(3, 2, 1, '3', 'Advanced Acne Therapy', 'Ưu tiên vùng mụn viêm cằm và má', DATE_SUB(NOW(), INTERVAL 5 DAY)),
(4, 2, 2, '5', 'Chemical Peel', 'Peel nồng độ thấp để giảm thâm', NULL);

INSERT INTO session_records (id, plan_session_id, clinical_observations, outcome_rating, next_focus) VALUES
(1, 1, 'Da đáp ứng tốt, giảm khô căng rõ sau buổi đầu', 4, 'Duy trì cấp ẩm và giảm đỏ'),
(2, 3, 'Mụn viêm giảm nhẹ, chưa xuất hiện kích ứng mạnh', 4, 'Tiếp tục kiểm soát dầu và xử lý thâm sau viêm');

INSERT INTO feedback (id, name, email, phone, subject, message, status, created_at) VALUES
(1, 'Phạm Huyền', 'phamhuyen@gmail.com', '0903444555', 'Tư vấn liệu trình mụn', 'Mình muốn tư vấn lộ trình 5 buổi cho da dầu mụn.', 'new', DATE_SUB(NOW(), INTERVAL 2 DAY)),
(2, 'Đặng Quốc Bảo', 'quocbao@gmail.com', '0903555666', 'Đặt lịch cuối tuần', 'Cho mình đặt lịch chiều thứ 7 tuần này.', 'read', DATE_SUB(NOW(), INTERVAL 1 DAY)),
(3, 'Vũ Ngọc Mai', 'ngocmai@gmail.com', '0903666777', 'Hỏi về combo glow', 'Combo glow có phù hợp da nhạy cảm không?', 'replied', NOW());

SET FOREIGN_KEY_CHECKS = 1;
