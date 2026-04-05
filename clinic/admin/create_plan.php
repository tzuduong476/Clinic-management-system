<?php
require_once __DIR__ . '/../backend/db.php';
$currentUser = getCurrentUser();
if (!$currentUser || ($currentUser['role'] ?? '') !== 'doctor') {
    header('Location: ../frontend/signin.php');
    exit;
}
$currentPage = 'customers';
$cid = (int)($_GET['customer_id'] ?? 0);
if ($cid <= 0) {
    header('Location: customers.php');
    exit;
}
$stmt = $conn->prepare("SELECT Customer_ID, Name FROM `Customer` WHERE Customer_ID = ?");
$stmt->execute([$cid]);
$customer = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$customer) {
    header('Location: customers.php');
    exit;
}
$specialists = $conn->query("SELECT id, name FROM specialists ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);
$services = $conn->query("SELECT id, name FROM services ORDER BY name")->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $specialist_id = (int)($_POST['specialist_id'] ?? 0);
    $goal = trim($_POST['overall_goal'] ?? '');
    $start_date = trim($_POST['start_date'] ?? '');
    $clinical_notes = trim($_POST['clinical_notes'] ?? '');
    if (!$title || !$specialist_id || !$start_date || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $start_date)) {
        $err = 'Vui lòng điền đầy đủ: Tiêu đề, Chuyên gia, Ngày bắt đầu.';
    } else {
        $stmt = $conn->prepare("SELECT name FROM specialists WHERE id = ?");
        $stmt->execute([$specialist_id]);
        $specName = $stmt->fetchColumn() ?: '';
        $conn->prepare("INSERT INTO treatment_plans (customer_id, title, specialist_id, overall_goal, start_date, clinical_notes, status) VALUES (?, ?, ?, ?, ?, ?, 'active')")->execute([$cid, $title, $specialist_id, $goal, $start_date, $clinical_notes]);
        $plan_id = (int)$conn->lastInsertId();
        for ($i = 1; $i <= 10; $i++) {
            $sid = trim($_POST["service_id_$i"] ?? '');
            $sname = trim($_POST["service_name_$i"] ?? '');
            $focus = trim($_POST["focus_$i"] ?? '');
            if ($sid) {
                if (!$sname) {
                    $q = $conn->prepare("SELECT name FROM services WHERE id = ?");
                    $q->execute([$sid]);
                    $sname = $q->fetchColumn() ?: $sid;
                }
                $conn->prepare("INSERT INTO treatment_plan_sessions (plan_id, session_number, service_id, service_name, focus_notes) VALUES (?, ?, ?, ?, ?)")->execute([$plan_id, $i, $sid, $sname, $focus]);
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
    <title>Tạo kế hoạch điều trị | Elysian</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
</head>
<body class="bg-slate-50 min-h-screen flex">
    <?php include __DIR__ . '/_sidebar.php'; ?>
    <div class="flex-1 p-8">
        <a href="customer_detail.php?id=<?= $cid ?>&tab=plan" class="text-primary font-medium text-sm hover:underline mb-4 inline-block">← Quay lại hồ sơ</a>
        <h1 class="text-2xl font-bold text-slate-800 mb-6">Tạo kế hoạch điều trị: <?= htmlspecialchars($customer['Name']) ?></h1>
        <?php if (!empty($err)): ?><p class="text-red-600 text-sm mb-4"><?= htmlspecialchars($err) ?></p><?php endif; ?>
        <form method="post" class="max-w-2xl space-y-6 bg-white rounded-xl border border-slate-200 p-6">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Tên kế hoạch *</label>
                <input type="text" name="title" value="<?= htmlspecialchars($_POST['title'] ?? '') ?>" class="w-full rounded-lg border border-slate-200 px-4 py-2" placeholder="e.g. Advanced Acne Recovery Pathway" required/>
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Chuyên gia phụ trách *</label>
                <select name="specialist_id" required class="w-full rounded-lg border border-slate-200 px-4 py-2">
                    <option value="">-- Chọn --</option>
                    <?php foreach ($specialists as $s): ?>
                    <option value="<?= (int)$s['id'] ?>" <?= (int)($_POST['specialist_id'] ?? 0) === (int)$s['id'] ? 'selected' : '' ?>><?= htmlspecialchars($s['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Ngày bắt đầu *</label>
                <input type="date" name="start_date" value="<?= htmlspecialchars($_POST['start_date'] ?? date('Y-m-d')) ?>" class="w-full rounded-lg border border-slate-200 px-4 py-2" required/>
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Mục tiêu tổng thể</label>
                <textarea name="overall_goal" rows="3" class="w-full rounded-lg border border-slate-200 px-4 py-2" placeholder="Mô tả mục tiêu điều trị..."><?= htmlspecialchars($_POST['overall_goal'] ?? '') ?></textarea>
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-2">Các phiên điều trị (Session)</label>
                <?php for ($i = 1; $i <= 5; $i++): ?>
                <div class="flex flex-wrap gap-2 items-center mb-3">
                    <span class="text-slate-500 text-sm w-20">Session #<?= $i ?>:</span>
                    <select name="service_id_<?= $i ?>" class="flex-1 min-w-[180px] rounded-lg border border-slate-200 px-3 py-2 text-sm" onchange="var o=this.options[this.selectedIndex]; this.form.service_name_<?= $i ?>.value=o?o.getAttribute('data-name')||'':'';">
                        <option value="">-- Chọn dịch vụ --</option>
                        <?php foreach ($services as $sv): ?>
                        <option value="<?= htmlspecialchars($sv['id']) ?>" data-name="<?= htmlspecialchars($sv['name']) ?>"><?= htmlspecialchars($sv['name']) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="hidden" name="service_name_<?= $i ?>" value=""/>
                    <input type="text" name="focus_<?= $i ?>" placeholder="Ghi chú phiên" class="flex-1 min-w-[180px] rounded-lg border border-slate-200 px-3 py-2 text-sm"/>
                </div>
                <?php endfor; ?>
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Ghi chú lâm sàng</label>
                <textarea name="clinical_notes" rows="3" class="w-full rounded-lg border border-slate-200 px-4 py-2"><?= htmlspecialchars($_POST['clinical_notes'] ?? '') ?></textarea>
            </div>
            <div class="flex gap-2">
                <button type="submit" class="px-5 py-2.5 rounded-lg bg-primary text-white font-semibold hover:bg-primary-dark">Tạo kế hoạch</button>
                <a href="customer_detail.php?id=<?= $cid ?>&tab=plan" class="px-5 py-2.5 rounded-lg border border-slate-200 text-slate-700">Hủy</a>
            </div>
        </form>
    </div>
    <script>
    document.querySelectorAll('select[name^="service_id_"]').forEach(function(sel) {
        sel.addEventListener('change', function() {
            var num = this.name.replace('service_id_','');
            var nameInput = this.form.querySelector('input[name="service_name_'+num+'"]');
            var opt = this.options[this.selectedIndex];
            if (nameInput && opt) nameInput.value = opt.getAttribute('data-name') || '';
        });
    });
    </script>
</body>
</html>
