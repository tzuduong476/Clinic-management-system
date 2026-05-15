<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

require_once __DIR__ . '/db.php';
require_once __DIR__ . '/notifications_helper.php';

$currentUser = getCurrentUser();

if (!$currentUser) {
    http_response_code(401);
    echo json_encode([
        'success' => false,
        'message' => 'Please sign in to view notifications.',
    ]);
    exit;
}

try {
    $limit = isset($_GET['limit']) ? max(1, min(20, (int)$_GET['limit'])) : 12;
    $payload = getNotificationsPayload($conn, $currentUser, $limit);

    echo json_encode([
        'success' => true,
        'message' => 'Notifications loaded successfully.',
        'role' => $payload['role'],
        'count' => $payload['count'],
        'highlight_count' => $payload['highlight_count'],
        'notifications' => $payload['notifications'],
    ]);
} catch (Throwable $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Unable to load notifications: ' . $e->getMessage(),
    ]);
}
