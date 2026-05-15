<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
require_once __DIR__ . '/db.php';
$stmt = $conn->query("SELECT id, name, title, avatar_url FROM specialists ORDER BY name");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode(['success' => true, 'data' => $rows]);
