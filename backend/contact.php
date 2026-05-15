<?php
require_once 'db.php';

header('Content-Type: application/json; charset=utf-8');

function respondJson(array $payload): void
{
    echo json_encode($payload);
    exit;
}

function validateContactPayload(array $input): array
{
    $errors = [];

    if (trim((string)($input['name'] ?? '')) === '') {
        $errors[] = 'Name is required';
    }

    $email = trim((string)($input['email'] ?? ''));
    if ($email === '') {
        $errors[] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format';
    }

    if (trim((string)($input['message'] ?? '')) === '') {
        $errors[] = 'Message is required';
    }

    return $errors;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respondJson(['success' => false, 'errors' => ['Invalid request method']]);
}

$payload = [
    'name' => trim((string)($_POST['name'] ?? '')),
    'email' => trim((string)($_POST['email'] ?? '')),
    'phone' => trim((string)($_POST['phone'] ?? '')),
    'subject' => trim((string)($_POST['subject'] ?? '')),
    'message' => trim((string)($_POST['message'] ?? '')),
];

$errors = validateContactPayload($payload);
if ($errors !== []) {
    respondJson(['success' => false, 'errors' => $errors]);
}

$stmt = getDBConnection()->prepare("
    INSERT INTO feedback (name, email, phone, subject, message, created_at)
    VALUES (?, ?, ?, ?, ?, NOW())
");

if (!$stmt->execute([
    $payload['name'],
    $payload['email'],
    $payload['phone'],
    $payload['subject'],
    $payload['message'],
])) {
    respondJson(['success' => false, 'errors' => ['Failed to send message. Please try again.']]);
}

respondJson([
    'success' => true,
    'message' => 'Thank you for your message! We will get back to you within 24 hours.',
]);
