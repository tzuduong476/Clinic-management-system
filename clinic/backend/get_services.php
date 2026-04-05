<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
require_once __DIR__ . '/db.php';

$stmt = $conn->query("SELECT id, name, tagline, category, image, duration, sessions, price, original_price, is_combo FROM services ORDER BY is_combo DESC, id ASC");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

$services = [];
foreach ($rows as $row) {
    $services[] = [
        'id' => $row['id'],
        'name' => $row['name'],
        'tagline' => $row['tagline'],
        'category' => $row['category'],
        'image' => $row['image'],
        'duration' => $row['duration'],
        'sessions' => $row['sessions'],
        'price' => $row['price'],
        'original_price' => $row['original_price'],
        'is_combo' => (bool)$row['is_combo']
    ];
}

echo json_encode(['success' => true, 'data' => $services]);
