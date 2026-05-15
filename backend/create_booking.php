<?php
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Method not allowed. Use POST.']);
    exit;
}

try {
    require_once __DIR__ . '/db.php';

    // Support both FormData and JSON input
    $input = json_decode(file_get_contents('php://input'), true) ?? [];

    $name = trim($input['customer_name'] ?? $input['name'] ?? $_POST['name'] ?? $_POST['full_name'] ?? '');
    $phone = trim($input['customer_phone'] ?? $input['phone'] ?? $_POST['phone'] ?? '');
    $service_id = trim($input['service_id'] ?? $_POST['service_id'] ?? '');
    $specialist_id = (int)($input['specialist_id'] ?? $_POST['specialist_id'] ?? 0);
    $date = trim($input['appointment_date'] ?? $_POST['appointment_date'] ?? $_POST['date'] ?? '');
    $time = trim($input['appointment_time'] ?? $_POST['time'] ?? '');

    // Validate required fields
    if (!$name) {
        echo json_encode(['success' => false, 'message' => 'Tên khách hàng không được để trống.']);
        exit;
    }
    
    if (!$phone) {
        echo json_encode(['success' => false, 'message' => 'Số điện thoại không được để trống.']);
        exit;
    }
    
    if (!$service_id) {
        echo json_encode(['success' => false, 'message' => 'Vui lòng chọn dịch vụ.']);
        exit;
    }
    
    if (!$specialist_id || $specialist_id <= 0) {
        echo json_encode(['success' => false, 'message' => 'Vui lòng chọn chuyên gia.']);
        exit;
    }
    
    if (!$date) {
        echo json_encode(['success' => false, 'message' => 'Vui lòng chọn ngày hẹn.']);
        exit;
    }
    
    if (!$time) {
        echo json_encode(['success' => false, 'message' => 'Vui lòng chọn giờ hẹn.']);
        exit;
    }

    // Validate phone format - normalize first (remove all non-digits)
    $phone = preg_replace('/\D/', '', $phone);

    if (!preg_match('/^0\d{9}$/', $phone)) {
        echo json_encode(['success' => false, 'message' => 'Số điện thoại không đúng định dạng. Phải bắt đầu bằng 0 và có đúng 10 chữ số (VD: 0912345678)']);
        exit;
    }

    if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
        echo json_encode(['success' => false, 'message' => 'Định dạng ngày không hợp lệ.']);
        exit;
    }

    // Convert time to SQL format
    $timeSql = null;
    if (preg_match('/^(\d{1,2}):(\d{2})\s*(AM|PM)?$/i', $time, $m)) {
        $h = (int)$m[1];
        $min = (int)$m[2];
        $period = strtoupper($m[3] ?? '');
        
        if ($period === 'PM' && $h < 12) {
            $h += 12;
        } elseif ($period === 'AM' && $h === 12) {
            $h = 0;
        } elseif ($period === '' && $h < 6) {
            // If no period and hour < 6, assume it's PM (e.g., 12:00, 13:00)
            $h += 12;
        }
        
        if ($h >= 0 && $h <= 23 && $min >= 0 && $min <= 59) {
            $timeSql = sprintf('%02d:%02d:00', $h, $min);
        }
    }

    if (!$timeSql) {
        echo json_encode(['success' => false, 'message' => 'Định dạng giờ không hợp lệ.']);
        exit;
    }

    // Check slot still available for this specialist (avoid overlap per specialist)
    $stmt = $conn->prepare("
        SELECT id FROM appointments
        WHERE appointment_date = ? AND appointment_time = ? AND specialist_id = ? AND status != 'cancelled'
    ");
    $stmt->execute([$date, $timeSql, $specialist_id]);
    if ($stmt->fetch()) {
        echo json_encode(['success' => false, 'message' => 'Khung giờ này đã được đặt cho chuyên gia này. Vui lòng chọn giờ khác.']);
        exit;
    }

    $stmt = $conn->prepare("SELECT name, price FROM services WHERE id = ? AND status = 'active' LIMIT 1");
    $stmt->execute([$service_id]);
    $serviceRow = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$serviceRow) {
        echo json_encode(['success' => false, 'message' => 'Dịch vụ không tồn tại hoặc không còn hoạt động trong hệ thống.']);
        exit;
    }

    $stmt = $conn->prepare("SELECT name FROM specialists WHERE id = ? LIMIT 1");
    $stmt->execute([$specialist_id]);
    $specialistRow = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$specialistRow) {
        echo json_encode(['success' => false, 'message' => 'Chuyên gia không tồn tại trong hệ thống.']);
        exit;
    }

    $service_name = $serviceRow['name'];
    $total_price = $serviceRow['price'];
    $specialist_name = $specialistRow['name'];

    $booking_code = 'ELY-' . str_pad((string)random_int(100000, 999999), 6, '0', STR_PAD_LEFT);

    // Try to match customer by phone if not logged in
    // Note: customer_id logic is now handled via $userId above

    // Create booking notification
    $notifyMessage = "Bạn có lịch hẹn mới: $service_name với $specialist_name vào lúc " . date('H:i', strtotime($timeSql)) . " ngày " . date('d/m/Y', strtotime($date)) . ". Mã đặt lịch: $booking_code";

    // Ensure customer_id and user_id are proper integers or null
    $userId = isset($_SESSION['user_id']) ? (int)$_SESSION['user_id'] : null;
    
    $stmt = $conn->prepare("
        INSERT INTO appointments (
            booking_code, user_id, customer_id, customer_name, customer_phone,
            service_id, service_name, specialist_id, specialist_name,
            appointment_date, appointment_time, total_price, status
        ) VALUES (
            :booking_code, :user_id, :customer_id, :customer_name, :customer_phone,
            :service_id, :service_name, :specialist_id, :specialist_name,
            :appointment_date, :appointment_time, :total_price, 'pending'
        )
    ");
    
    $stmt->execute([
        ':booking_code' => $booking_code,
        ':user_id' => $userId,
        ':customer_id' => $userId,
        ':customer_name' => $name,
        ':customer_phone' => $phone,
        ':service_id' => $service_id,
        ':service_name' => $service_name,
        ':specialist_id' => $specialist_id,
        ':specialist_name' => $specialist_name,
        ':appointment_date' => $date,
        ':appointment_time' => $timeSql,
        ':total_price' => $total_price
    ]);

    // Create notification for the customer (if we have a customer_id)
    if ($userId) {
        $stmt = $conn->prepare("
            INSERT INTO notifications (user_id, customer_id, type, title, message, priority, related_type)
            VALUES (:user_id, :customer_id, 'appointment', 'Xác nhận đặt lịch thành công', :message, 'high', 'booking')
        ");
        $stmt->execute([
            ':user_id' => $userId,
            ':customer_id' => $userId,
            ':message' => $notifyMessage
        ]);
    }

    echo json_encode([
        'success' => true,
        'booking_id' => $booking_code,
        'booking_code' => $booking_code,
        'message' => 'Booking created and waiting for confirmation'
    ]);

} catch (PDOException $e) {
    $errorMsg = $e->getMessage();
    error_log("Database error in create_booking.php: " . $errorMsg);
    echo json_encode([
        'success' => false,
        'message' => 'Lỗi cơ sở dữ liệu: ' . substr($errorMsg, 0, 100),
        'debug' => $errorMsg
    ]);
} catch (Exception $e) {
    $errorMsg = $e->getMessage();
    error_log("Error in create_booking.php: " . $errorMsg);
    echo json_encode([
        'success' => false,
        'message' => 'Lỗi: ' . substr($errorMsg, 0, 100),
        'debug' => $errorMsg
    ]);
}
