<?php
require_once __DIR__ . '/../backend/db.php';
$currentUser = getCurrentUser();
if (!$currentUser || ($currentUser['role'] ?? '') !== 'doctor') {
    header('Location: ../frontend/signin.php');
    exit;
}
$currentPage = 'customers';
$plan_id = (int)($_GET['plan_id'] ?? 0);
$session_id = (int)($_GET['session_id'] ?? 0);
if ($session_id <= 0) {
    header('Location: customers.php');
    exit;
}
$stmt = $conn->prepare("SELECT s.*, p.customer_id, p.title as plan_title FROM treatment_plan_sessions s JOIN treatment_plans p ON p.id = s.plan_id WHERE s.id = ?");
$stmt->execute([$session_id]);
$session = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$session) {
    header('Location: customers.php');
    exit;
}
$cid = (int)$session['customer_id'];
$customer = $conn->prepare("SELECT Name FROM `Customer` WHERE Customer_ID = ?");
$customer->execute([$cid]);
$customer = $customer->fetch(PDO::FETCH_ASSOC);
$record = null;
try {
    $r = $conn->prepare("SELECT * FROM session_records WHERE plan_session_id = ? LIMIT 1");
    $r->execute([$session_id]);
    $record = $r->fetch(PDO::FETCH_ASSOC);
} catch (Throwable $e) { }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $observations = trim($_POST['clinical_observations'] ?? '');
    $rating = (int)($_POST['outcome_rating'] ?? 0);
    if ($rating < 1 || $rating > 5) $rating = null;
    $next_focus = trim($_POST['next_focus'] ?? '');
    try {
        if ($record) {
            $conn->prepare("UPDATE session_records SET clinical_observations = ?, outcome_rating = ?, next_focus = ? WHERE plan_session_id = ?")->execute([$observations, $rating, $next_focus, $session_id]);
        } else {
            $conn->prepare("INSERT INTO session_records (plan_session_id, clinical_observations, outcome_rating, next_focus) VALUES (?, ?, ?, ?)")->execute([$session_id, $observations, $rating, $next_focus]);
        }
        $conn->prepare("UPDATE treatment_plan_sessions SET completed_at = NOW() WHERE id = ?")->execute([$session_id]);
    } catch (Throwable $e) { }
    header('Location: customer_detail.php?id=' . $cid . '&tab=plan');
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Cập nhật phiên điều trị | Elysian</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
</head>
<body class="bg-slate-50 min-h-screen flex">
    <?php include __DIR__ . '/_sidebar.php'; ?>
    <div class="flex-1 p-8">
        <a href="customer_detail.php?id=<?= $cid ?>&tab=plan" class="text-primary font-medium text-sm hover:underline mb-4 inline-block">← Quay lại kế hoạch</a>
        <h1 class="text-xl font-bold text-slate-800 mb-2">Cập nhật phiên điều trị</h1>
        <p class="text-slate-500 text-sm mb-6"><?= htmlspecialchars($customer['Name']) ?> — Session #<?= (int)$session['session_number'] ?>: <?= htmlspecialchars($session['service_name']) ?></p>
        <form method="post" class="max-w-2xl space-y-6 bg-white rounded-xl border border-slate-200 p-6">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Ghi chú lâm sàng *</label>
                <textarea name="clinical_observations" rows="5" class="w-full rounded-lg border border-slate-200 px-4 py-2" placeholder="Quan sát điều trị, phản ứng da, thông số lâm sàng..."><?= htmlspecialchars($record['clinical_observations'] ?? '') ?></textarea>
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Đánh giá kết quả (1-5)</label>
                <div class="flex gap-2">
                    <?php for ($r = 1; $r <= 5; $r++): ?>
                    <label class="flex items-center gap-1 cursor-pointer">
                        <input type="radio" name="outcome_rating" value="<?= $r ?>" <?= (int)($record['outcome_rating'] ?? 0) === $r ? 'checked' : '' ?>/>
                        <span><?= $r ?></span>
                    </label>
                    <?php endfor; ?>
                </div>
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Trọng tâm phiên tiếp theo</label>
                <input type="text" name="next_focus" value="<?= htmlspecialchars($record['next_focus'] ?? '') ?>" class="w-full rounded-lg border border-slate-200 px-4 py-2" placeholder="e.g. Tiếp tục Anti-Redness..."/>
            </div>
            <div class="flex gap-2">
                <button type="submit" class="px-5 py-2.5 rounded-lg bg-primary text-white font-semibold hover:bg-primary-dark">Hoàn thành phiên & Lưu</button>
                <a href="customer_detail.php?id=<?= $cid ?>&tab=plan" class="px-5 py-2.5 rounded-lg border border-slate-200 text-slate-700">Hủy</a>
            </div>
        </form>
    </div>
</body>
</html>
