<?php
require_once __DIR__ . '/../backend/db.php';
$currentUser = getCurrentUser();
if (!$currentUser || ($currentUser['role'] ?? '') !== 'doctor') {
    header('Location: ../frontend/signin.php');
    exit;
}
$currentPage = 'customers';
$plan_id = (int)($_GET['plan_id'] ?? 0);
$cid = (int)($_GET['customer_id'] ?? 0);
if ($plan_id <= 0 || $cid <= 0) {
    header('Location: customers.php');
    exit;
}
$stmt = $conn->prepare("SELECT * FROM treatment_plans WHERE id = ? AND customer_id = ?");
$stmt->execute([$plan_id, $cid]);
$plan = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$plan) {
    header('Location: customer_detail.php?id=' . $cid . '&tab=plan');
    exit;
}
$customer = $conn->prepare("SELECT Customer_ID, Name FROM `Customer` WHERE Customer_ID = ?");
$customer->execute([$cid]);
$customer = $customer->fetch(PDO::FETCH_ASSOC);
$sessions = $conn->prepare("SELECT * FROM treatment_plan_sessions WHERE plan_id = ? ORDER BY session_number");
$sessions->execute([$plan_id]);
$sessions = $sessions->fetchAll(PDO::FETCH_ASSOC);
$specialists = $conn->query("SELECT id, name FROM specialists ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);
$services = $conn->query("SELECT id, name FROM services ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $specialist_id = (int)($_POST['specialist_id'] ?? 0);
    $goal = trim($_POST['overall_goal'] ?? '');
    $reason = trim($_POST['reason_adjustment'] ?? '');
    if (!$title || !$specialist_id) {
        $err = 'Vui lòng điền Tiêu đề và Chuyên gia.';
    } else {
        $conn->prepare("UPDATE treatment_plans SET title = ?, specialist_id = ?, overall_goal = ?, updated_at = NOW() WHERE id = ?")->execute([$title, $specialist_id, $goal, $plan_id]);
        foreach ($sessions as $s) {
            $sn = $s['session_number'];
            $sid = trim($_POST["service_id_$sn"] ?? '');
            $sname = trim($_POST["service_name_$sn"] ?? '');
            $focus = trim($_POST["focus_$sn"] ?? '');
            if ($sid && $sname) {
                $conn->prepare("UPDATE treatment_plan_sessions SET service_id = ?, service_name = ?, focus_notes = ? WHERE id = ?")->execute([$sid, $sname, $focus, $s['id']]);
            }
        }
        header('Location: customer_detail.php?id=' . $cid . '&tab=plan');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Chỉnh sửa kế hoạch | Elysian</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
</head>
<body class="bg-slate-50 min-h-screen flex">
    <?php include __DIR__ . '/_sidebar.php'; ?>
    <div class="flex-1 p-8">
        <a href="customer_detail.php?id=<?= $cid ?>&tab=plan" class="text-primary font-medium text-sm hover:underline mb-4 inline-block">← Quay lại hồ sơ</a>
        <h1 class="text-2xl font-bold text-slate-800 mb-6">Chỉnh sửa kế hoạch: <?= htmlspecialchars($plan['title']) ?></h1>
        <?php if (!empty($err)): ?><p class="text-red-600 text-sm mb-4"><?= htmlspecialchars($err) ?></p><?php endif; ?>
        <form method="post" class="max-w-2xl space-y-6 bg-white rounded-xl border border-slate-200 p-6">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Tên kế hoạch *</label>
                <input type="text" name="title" value="<?= htmlspecialchars($plan['title']) ?>" class="w-full rounded-lg border border-slate-200 px-4 py-2" required/>
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Chuyên gia *</label>
                <select name="specialist_id" required class="w-full rounded-lg border border-slate-200 px-4 py-2">
                    <?php foreach ($specialists as $s): ?>
                    <option value="<?= (int)$s['id'] ?>" <?= (int)$plan['specialist_id'] === (int)$s['id'] ? 'selected' : '' ?>><?= htmlspecialchars($s['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Mục tiêu tổng thể</label>
                <textarea name="overall_goal" rows="3" class="w-full rounded-lg border border-slate-200 px-4 py-2"><?= htmlspecialchars($plan['overall_goal'] ?? '') ?></textarea>
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Các phiên điều trị</label>
                <?php foreach ($sessions as $s): $n = $s['session_number']; ?>
                <div class="flex flex-wrap gap-2 items-center mb-3">
                    <span class="text-slate-500 text-sm w-24">#<?= $n ?>:</span>
                    <select name="service_id_<?= $n ?>" class="flex-1 min-w-[180px] rounded-lg border border-slate-200 px-3 py-2 text-sm" onchange="var o=this.options[this.selectedIndex]; this.form['service_name_<?= $n ?>'].value=o?o.getAttribute('data-name')||'':'';">
                        <?php foreach ($services as $sv): ?>
                        <option value="<?= htmlspecialchars($sv['id']) ?>" data-name="<?= htmlspecialchars($sv['name']) ?>" <?= ($s['service_id'] ?? '') === $sv['id'] ? 'selected' : '' ?>><?= htmlspecialchars($sv['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="hidden" name="service_name_<?= $n ?>" value="<?= htmlspecialchars($s['service_name'] ?? '') ?>"/>
                    <input type="text" name="focus_<?= $n ?>" value="<?= htmlspecialchars($s['focus_notes'] ?? '') ?>" placeholder="Ghi chú phiên" class="flex-1 min-w-[180px] rounded-lg border border-slate-200 px-3 py-2 text-sm"/>
                </div>
                <?php endforeach; ?>
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Lý do điều chỉnh (ghi chú audit)</label>
                <textarea name="reason_adjustment" rows="2" class="w-full rounded-lg border border-slate-200 px-4 py-2" placeholder="Ghi rõ lý do thay đổi..."><?= htmlspecialchars($_POST['reason_adjustment'] ?? '') ?></textarea>
            </div>
            <div class="flex gap-2">
                <button type="submit" class="px-5 py-2.5 rounded-lg bg-primary text-white font-semibold hover:bg-primary-dark">Lưu thay đổi</button>
                <a href="customer_detail.php?id=<?= $cid ?>&tab=plan" class="px-5 py-2.5 rounded-lg border border-slate-200 text-slate-700">Hủy</a>
            </div>
        </form>
    </div>
</body>
</html>
