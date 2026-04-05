<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

try {
    require_once 'db.php';
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Database connection failed: ' . $e->getMessage()]);
    exit;
}

$response = ['success' => false, 'message' => ''];
$action = $_POST['action'] ?? $_GET['action'] ?? '';

// ========== LOGIN ==========
if ($action === 'login') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
        $response['message'] = 'Email and password are required.';
        echo json_encode($response);
        exit;
    }

    // Admin login: username "admin" or "admin@elysian.clinic", password "123"
    $isAdminLogin = ($email === 'admin' || strtolower($email) === 'admin@elysian.clinic');
    if ($isAdminLogin) {
        $stmt = $conn->prepare("SELECT id, full_name, email, password, role FROM users WHERE role = 'admin' LIMIT 1");
        $stmt->execute();
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_name'] = $user['full_name'];
            $_SESSION['user_role'] = 'admin';
            $response['success'] = true;
            $response['message'] = 'Admin login successful! Redirecting...';
            $response['redirect'] = '../admin/';
            echo json_encode($response);
            exit;
        }
        $response['message'] = 'Invalid admin credentials.';
        echo json_encode($response);
        exit;
    }

    // Receptionist login: username "letan" or email with role receptionist
    $isReceptionistLogin = (strtolower($email) === 'letan');
    if ($isReceptionistLogin) {
        $stmt = $conn->prepare("SELECT id, full_name, email, password, role FROM users WHERE role = 'receptionist' LIMIT 1");
        $stmt->execute();
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_name'] = $user['full_name'];
            $_SESSION['user_role'] = 'receptionist';
            $response['success'] = true;
            $response['message'] = 'Receptionist login successful! Redirecting...';
            $response['redirect'] = '../admin/';
            echo json_encode($response);
            exit;
        }
        $response['message'] = 'Invalid receptionist credentials.';
        echo json_encode($response);
        exit;
    }

    // Doctor login: username "doctor" or "doctor@elysian.clinic", password "123"
    $isDoctorLogin = (strtolower($email) === 'doctor' || strtolower($email) === 'doctor@elysian.clinic');
    if ($isDoctorLogin) {
        $stmt = $conn->prepare("SELECT id, full_name, email, password, role FROM users WHERE role = 'doctor' LIMIT 1");
        $stmt->execute();
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_name'] = $user['full_name'];
            $_SESSION['user_role'] = 'doctor';
            $response['success'] = true;
            $response['message'] = 'Doctor login successful! Redirecting...';
            $response['redirect'] = '../admin/';
            echo json_encode($response);
            exit;
        }
        $response['message'] = 'Invalid doctor credentials.';
        echo json_encode($response);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['message'] = 'Please provide a valid email address.';
        echo json_encode($response);
        exit;
    }

    $stmt = $conn->prepare('SELECT Customer_ID, Name, Email, Password FROM `Customer` WHERE Email = ? LIMIT 1');
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (!$user || !password_verify($password, $user['Password'])) {
        $response['message'] = 'Invalid email or password.';
        echo json_encode($response);
        exit;
    }

    $_SESSION['user_id'] = $user['Customer_ID'];
    $_SESSION['user_email'] = $user['Email'];
    $_SESSION['user_name'] = $user['Name'];
    $_SESSION['user_role'] = 'patient';

    $response['success'] = true;
    $response['message'] = 'Login successful! Redirecting...';
    $response['redirect'] = '../frontend/home.php';
}
// ========== REGISTER ==========
elseif ($action === 'register') {
    $full_name = trim($_POST['full_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    if (empty($full_name) || empty($email) || empty($password)) {
        $response['message'] = 'Please fill in all required fields.';
        echo json_encode($response);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response['message'] = 'Invalid email format.';
        echo json_encode($response);
        exit;
    }

    if (strlen($password) < 6) {
        $response['message'] = 'Password must be at least 6 characters.';
        echo json_encode($response);
        exit;
    }

    if ($password !== $confirm_password) {
        $response['message'] = 'Passwords do not match.';
        echo json_encode($response);
        exit;
    }

    $stmt = $conn->prepare("SELECT Customer_ID FROM `Customer` WHERE Email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        $response['message'] = 'Email already registered.';
        echo json_encode($response);
        exit;
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        $stmt = $conn->prepare("INSERT INTO `Customer` (Name, Email, Phone, Password, Skin_type, Medical_history) VALUES (?, ?, ?, ?, '', '')");
        $stmt->execute([$full_name, $email, $phone, $hashed_password]);
        
        $response['success'] = true;
        $response['message'] = 'Registration successful! Redirecting...';
    } catch (PDOException $e) {
        $response['message'] = 'Registration failed. Please try again.';
    }
}
else {
    $response['message'] = 'Invalid action. Use action=login or action=register';
}

echo json_encode($response);
