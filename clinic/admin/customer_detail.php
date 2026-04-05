<?php
require_once __DIR__ . '/../backend/db.php';
$currentUser = getCurrentUser();
if (!$currentUser || !in_array($currentUser['role'] ?? '', ['admin', 'receptionist', 'doctor'], true)) {
    header('Location: ../frontend/signin.php');
    exit;
}
$currentPage = 'customers';
$canEditProfile = ($currentUser['role'] ?? '') === 'doctor';

$cid = (int)($_GET['id'] ?? 0);
if ($cid <= 0) {
    header('Location: customers.php');
    exit;
}
$stmt = $conn->prepare("SELECT Customer_ID, Name, Phone, Email, Skin_type, Medical_history, Created_at FROM `Customer` WHERE Customer_ID = ?");
$stmt->execute([$cid]);
$customer = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$customer) {
    header('Location: customers.php');
    exit;
}
// Optional columns (may not exist on old DB)
foreach (['Date_of_birth', 'Skin_condition', 'Patient_notes'] as $col) {
    try {
        $q = $conn->query("SELECT $col FROM `Customer` WHERE Customer_ID = $cid LIMIT 1");
        if ($q && $row = $q->fetch(PDO::FETCH_ASSOC)) {
            $customer[$col] = $row[$col] ?? '';
        }
    } catch (Throwable $e) {
        $customer[$col] = '';
    }
}
if (!isset($customer['Date_of_birth'])) $customer['Date_of_birth'] = '';
if (!isset($customer['Skin_condition'])) $customer['Skin_condition'] = '';
if (!isset($customer['Patient_notes'])) $customer['Patient_notes'] = '';

$tab = $_GET['tab'] ?? 'info';
if (!in_array($tab, ['info', 'appointments', 'plan', 'billing'], true)) $tab = 'info';

// Appointments for this customer (match by name+phone or email)
$stmt = $conn->prepare("
    SELECT id, booking_code, service_name, specialist_name, appointment_date, appointment_time, total_price, status, payment_status
    FROM appointments
    WHERE (customer_name = ? AND (customer_phone = ? OR ? = '')) OR customer_phone = ?
    ORDER BY appointment_date DESC, appointment_time DESC
    LIMIT 50
");
$stmt->execute([$customer['Name'], $customer['Phone'] ?? '', $customer['Phone'] ?? '', $customer['Phone'] ?? '']);
$appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Also match by name only for alternate spellings
if (empty($appointments)) {
    $stmt = $conn->prepare("
        SELECT id, booking_code, service_name, specialist_name, appointment_date, appointment_time, total_price, status, payment_status
        FROM appointments
        WHERE customer_name = ? OR customer_phone = ?
        ORDER BY appointment_date DESC, appointment_time DESC
        LIMIT 50
    ");
    $stmt->execute([$customer['Name'], $customer['Phone'] ?? '']);
    $appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$lastVisit = null;
$totalSpent = 0;
foreach ($appointments as $a) {
    if ($a['status'] !== 'cancelled' && (!$lastVisit || $a['appointment_date'] > $lastVisit)) {
        $lastVisit = $a['appointment_date'];
    }
    if ($a['status'] !== 'cancelled' && ($a['payment_status'] ?? '') === 'paid') {
        $totalSpent += (int)preg_replace('/[^0-9]/', '', $a['total_price'] ?? '');
    }
}

$stmt = $conn->query("SELECT id, name FROM specialists ORDER BY name");
$specialists = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt = $conn->query("SELECT id, name, price FROM services ORDER BY name");
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Treatment plan for this customer (if we have table)
$activePlan = null;
$planSessions = [];
try {
    $stmt = $conn->prepare("SELECT id, title, specialist_id, overall_goal, start_date, status FROM treatment_plans WHERE customer_id = ? AND status = 'active' ORDER BY id DESC LIMIT 1");
    $stmt->execute([$cid]);
    $activePlan = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($activePlan) {
        $stmt = $conn->prepare("SELECT id, session_number, service_name, focus_notes, completed_at FROM treatment_plan_sessions WHERE plan_id = ? ORDER BY session_number");
        $stmt->execute([$activePlan['id']]);
        $planSessions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (Throwable $e) { /* table may not exist */ }

function formatTime($t) {
    if (!is_string($t)) return $t;
    if (preg_match('/^(\d{2}):(\d{2})/', $t, $m)) {
        $h = (int)$m[1];
        $ampm = $h >= 12 ? 'PM' : 'AM';
        $h12 = $h > 12 ? $h - 12 : ($h === 0 ? 12 : $h);
        return sprintf('%d:%s %s', $h12, $m[2], $ampm);
    }
    return $t;
}
function formatDate($d) {
    if (!$d) return '—';
    return date('M j, Y', strtotime($d));
}
$pid = 'ELC' . str_pad((string)$customer['Customer_ID'], 5, '0', STR_PAD_LEFT);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Hồ sơ khách hàng | Elysian Management Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <style> body { font-family: 'Inter', sans-serif; } .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; } </style>
    <script> tailwind.config = { theme: { extend: { colors: { primary: '#0db9f2', 'primary-dark': '#0a9ad4' } } } } </script>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex">
    <?php include __DIR__ . '/_sidebar.php'; ?>
    <div class="flex-1 flex flex-col min-w-0">
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 shrink-0">
            <div class="flex items-center gap-4">
                <a href="customers.php" class="text-slate-500 hover:text-primary flex items-center gap-1 text-sm">Customers</a>
                <span class="text-slate-400">/</span>
                <span class="text-slate-700 font-medium">Profile</span>
            </div>
            <div class="flex items-center gap-3">
                <?php if ($canEditProfile): ?>
                <button type="button" id="btnEditProfile" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg border border-primary text-primary font-semibold text-sm hover:bg-primary/5">
                    <span class="material-symbols-outlined text-lg">edit</span> Chỉnh sửa hồ sơ
                </button>
                <?php else: ?>
                <span class="text-slate-400 text-sm">Chế độ xem (chỉ Bác sĩ mới được sửa)</span>
                <?php endif; ?>
                <a href="create_appointment.php" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-primary text-white font-semibold text-sm hover:bg-primary-dark">Đặt lịch</a>
            </div>
        </header>

        <main class="flex-1 p-8 overflow-auto">
            <div class="flex flex-wrap items-center gap-4 mb-6">
                <div class="w-16 h-16 rounded-full bg-primary/20 flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary text-3xl">person</span>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-slate-800"><?= htmlspecialchars($customer['Name']) ?></h1>
                    <p class="text-slate-500 font-mono text-sm">PID: <?= htmlspecialchars($pid) ?></p>
                    <div class="flex gap-2 mt-2">
                        <span class="px-2 py-0.5 rounded text-xs font-bold bg-green-100 text-green-800">ACTIVE</span>
                        <span class="px-2 py-0.5 rounded text-xs font-bold bg-amber-100 text-amber-800">VIP</span>
                    </div>
                </div>
            </div>

            <nav class="flex gap-1 border-b border-slate-200 mb-6">
                <a href="?id=<?= $cid ?>&tab=info"   class="px-4 py-2 text-sm font-medium rounded-t-lg <?= $tab === 'info' ? 'bg-white border border-slate-200 border-b-0 text-primary' : 'text-slate-600 hover:bg-slate-100' ?>">Info</a>
                <a href="?id=<?= $cid ?>&tab=appointments" class="px-4 py-2 text-sm font-medium rounded-t-lg <?= $tab === 'appointments' ? 'bg-white border border-slate-200 border-b-0 text-primary' : 'text-slate-600 hover:bg-slate-100' ?>">Appointments</a>
                <a href="?id=<?= $cid ?>&tab=plan"  class="px-4 py-2 text-sm font-medium rounded-t-lg <?= $tab === 'plan' ? 'bg-white border border-slate-200 border-b-0 text-primary' : 'text-slate-600 hover:bg-slate-100' ?>">Treatment Plan</a>
                <a href="?id=<?= $cid ?>&tab=billing" class="px-4 py-2 text-sm font-medium rounded-t-lg <?= $tab === 'billing' ? 'bg-white border border-slate-200 border-b-0 text-primary' : 'text-slate-600 hover:bg-slate-100' ?>">Billing</a>
            </nav>

            <?php if ($tab === 'info'): ?>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
                        <h2 class="font-bold text-slate-800 mb-4 flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">person</span>
                            PERSONAL & CLINICAL INFORMATION
                        </h2>
                        <div id="infoView" class="space-y-3 text-sm">
                            <p><span class="text-slate-500">Phone:</span> <?= htmlspecialchars($customer['Phone'] ?: '—') ?></p>
                            <p><span class="text-slate-500">Email:</span> <?= htmlspecialchars($customer['Email']) ?></p>
                            <p><span class="text-slate-500">Skin Type:</span> <?= htmlspecialchars($customer['Skin_type'] ?: '—') ?></p>
                            <p><span class="text-slate-500">Skin Condition:</span> <?= htmlspecialchars($customer['Skin_condition'] ?: '—') ?></p>
                            <p><span class="text-slate-500">Date of Birth:</span> <?= $customer['Date_of_birth'] ? formatDate($customer['Date_of_birth']) : '—' ?></p>
                            <p><span class="text-slate-500">Last Visit:</span> <?= formatDate($lastVisit) ?></p>
                        </div>
                        <form id="formEditProfile" class="hidden space-y-4" action="">
                            <input type="hidden" name="customer_id" value="<?= (int)$cid ?>"/>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-semibold text-slate-500 mb-1">Họ tên *</label>
                                    <input type="text" name="name" value="<?= htmlspecialchars($customer['Name']) ?>" class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm" required/>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-slate-500 mb-1">Số điện thoại</label>
                                    <input type="text" name="phone" value="<?= htmlspecialchars($customer['Phone'] ?? '') ?>" class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm"/>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-slate-500 mb-1">Email *</label>
                                    <input type="email" name="email" value="<?= htmlspecialchars($customer['Email']) ?>" class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm" required/>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-slate-500 mb-1">Skin Type</label>
                                    <input type="text" name="skin_type" value="<?= htmlspecialchars($customer['Skin_type'] ?? '') ?>" class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm" placeholder="e.g. Sensitive, Oily"/>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-slate-500 mb-1">Skin Condition</label>
                                    <input type="text" name="skin_condition" value="<?= htmlspecialchars($customer['Skin_condition'] ?? '') ?>" class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm" placeholder="e.g. Redness"/>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-slate-500 mb-1">Date of Birth</label>
                                    <input type="date" name="date_of_birth" value="<?= htmlspecialchars($customer['Date_of_birth'] ?? '') ?>" class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm"/>
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-500 mb-1">Patient Notes</label>
                                <textarea name="patient_notes" rows="4" class="w-full rounded-lg border border-slate-200 px-3 py-2 text-sm" placeholder="Ghi chú lâm sàng, mục tiêu điều trị..."><?= htmlspecialchars($customer['Patient_notes'] ?? '') ?></textarea>
                            </div>
                            <div class="flex gap-2">
                                <button type="submit" class="px-4 py-2 rounded-lg bg-primary text-white font-semibold text-sm hover:bg-primary-dark">Lưu thay đổi</button>
                                <button type="button" id="btnCancelEdit" class="px-4 py-2 rounded-lg border border-slate-200 text-slate-700 text-sm">Hủy</button>
                            </div>
                        </form>
                    </div>
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
                        <h2 class="font-bold text-slate-800 mb-2 flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">note</span>
                            PATIENT NOTES
                        </h2>
                        <p id="patientNotesView" class="text-slate-600 text-sm whitespace-pre-wrap"><?= htmlspecialchars($customer['Patient_notes'] ?: 'Chưa có ghi chú.') ?></p>
                    </div>
                </div>
                <div>
                    <div class="bg-primary/10 rounded-xl border border-primary/20 p-6">
                        <h3 class="font-bold text-slate-800 mb-2 flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary">analytics</span>
                            CRM OVERVIEW
                        </h3>
                        <p class="text-2xl font-black text-slate-800"><?= number_format($totalSpent) ?> ₫</p>
                        <p class="text-sm text-slate-600 mt-1">Total Lifetime Value</p>
                        <p class="text-sm text-slate-600 mt-2">APPOINTMENTS: <?= count(array_filter($appointments, function($a) { return $a['status'] !== 'cancelled'; })) ?></p>
                    </div>
                </div>
            </div>
            <?php elseif ($tab === 'appointments'): ?>
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                <table class="w-full text-sm">
                    <thead class="bg-slate-50"><tr>
                        <th class="text-left px-6 py-3 font-semibold text-slate-600">Date</th>
                        <th class="text-left px-6 py-3 font-semibold text-slate-600">Service</th>
                        <th class="text-left px-6 py-3 font-semibold text-slate-600">Specialist</th>
                        <th class="text-left px-6 py-3 font-semibold text-slate-600">Status</th>
                        <th class="text-left px-6 py-3 font-semibold text-slate-600">Action</th>
                    </tr></thead>
                    <tbody>
                        <?php if (empty($appointments)): ?>
                        <tr><td colspan="5" class="px-6 py-8 text-slate-500 text-center">Chưa có lịch hẹn.</td></tr>
                        <?php else: ?>
                        <?php foreach ($appointments as $a): ?>
                        <tr class="border-t border-slate-100">
                            <td class="px-6 py-3"><?= formatDate($a['appointment_date']) ?> <?= formatTime($a['appointment_time']) ?></td>
                            <td class="px-6 py-3"><?= htmlspecialchars($a['service_name']) ?></td>
                            <td class="px-6 py-3"><?= htmlspecialchars($a['specialist_name']) ?></td>
                            <td class="px-6 py-3"><span class="px-2 py-0.5 rounded text-xs font-bold <?= $a['status'] === 'confirmed' ? 'bg-green-100 text-green-800' : ($a['status'] === 'cancelled' ? 'bg-slate-100' : 'bg-amber-100 text-amber-800') ?>"><?= ucfirst($a['status']) ?></span></td>
                            <td class="px-6 py-3"><a href="edit_appointment.php?id=<?= (int)$a['id'] ?>" class="text-primary font-medium hover:underline">Sửa</a></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <?php elseif ($tab === 'plan'): ?>
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
                <?php if ($activePlan): ?>
                <div class="flex items-center justify-between mb-4">
                    <h2 class="font-bold text-slate-800"><?= htmlspecialchars($activePlan['title']) ?></h2>
                    <?php if ($canEditProfile): ?>
                    <a href="edit_plan.php?customer_id=<?= $cid ?>&plan_id=<?= (int)$activePlan['id'] ?>" class="inline-flex items-center gap-1 text-primary font-semibold text-sm hover:underline"><span class="material-symbols-outlined text-lg">edit</span> Chỉnh sửa kế hoạch</a>
                    <?php endif; ?>
                </div>
                <p class="text-slate-600 text-sm mb-4"><?= htmlspecialchars($activePlan['overall_goal'] ?? '') ?></p>
                <p class="text-slate-500 text-xs mb-4">Bắt đầu: <?= formatDate($activePlan['start_date'] ?? '') ?></p>
                <?php if (!empty($planSessions)): ?>
                <div class="border-t border-slate-100 pt-4">
                    <h3 class="font-semibold text-slate-700 mb-2">Session roadmap</h3>
                    <ul class="space-y-2">
                        <?php foreach ($planSessions as $ps): ?>
                        <li class="flex items-center justify-between py-1">
                            <span>#<?= (int)$ps['session_number'] ?> — <?= htmlspecialchars($ps['service_name']) ?><?= $ps['completed_at'] ? ' <span class="text-green-600 text-xs">(đã hoàn thành)</span>' : '' ?></span>
                            <?php if ($canEditProfile): ?>
                            <a href="session_update.php?plan_id=<?= (int)$activePlan['id'] ?>&session_id=<?= (int)$ps['id'] ?>" class="text-primary text-sm font-medium hover:underline">Cập nhật phiên</a>
                            <?php endif; ?>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <?php endif; ?>
                <?php else: ?>
                <p class="text-slate-500 mb-4">Chưa có kế hoạch điều trị.</p>
                <?php if ($canEditProfile): ?>
                <a href="create_plan.php?customer_id=<?= $cid ?>" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-primary text-white font-semibold text-sm hover:bg-primary-dark">
                    <span class="material-symbols-outlined">add</span> Tạo kế hoạch điều trị
                </a>
                <?php endif; ?>
                <?php endif; ?>
            </div>
            <?php else: ?>
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                <table class="w-full text-sm">
                    <thead class="bg-slate-50"><tr>
                        <th class="text-left px-6 py-3 font-semibold text-slate-600">Date</th>
                        <th class="text-left px-6 py-3 font-semibold text-slate-600">Service</th>
                        <th class="text-left px-6 py-3 font-semibold text-slate-600">Amount</th>
                        <th class="text-left px-6 py-3 font-semibold text-slate-600">Payment</th>
                    </tr></thead>
                    <tbody>
                        <?php foreach (array_filter($appointments, function($a) { return $a['status'] !== 'cancelled'; }) as $a): ?>
                        <tr class="border-t border-slate-100">
                            <td class="px-6 py-3"><?= formatDate($a['appointment_date']) ?></td>
                            <td class="px-6 py-3"><?= htmlspecialchars($a['service_name']) ?></td>
                            <td class="px-6 py-3"><?= htmlspecialchars($a['total_price']) ?></td>
                            <td class="px-6 py-3"><span class="px-2 py-0.5 rounded text-xs font-bold <?= ($a['payment_status'] ?? '') === 'paid' ? 'bg-green-100 text-green-800' : 'bg-amber-100 text-amber-800' ?>"><?= ($a['payment_status'] ?? 'unpaid') === 'paid' ? 'Paid' : 'Unpaid' ?></span></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php if (empty(array_filter($appointments, function($a) { return $a['status'] !== 'cancelled'; }))): ?>
                        <tr><td colspan="4" class="px-6 py-8 text-slate-500 text-center">Chưa có hóa đơn.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>
        </main>
    </div>
    <script>
    (function() {
        var btnEdit = document.getElementById('btnEditProfile');
        var btnCancel = document.getElementById('btnCancelEdit');
        var infoView = document.getElementById('infoView');
        var formEdit = document.getElementById('formEditProfile');
        var notesView = document.getElementById('patientNotesView');
        if (!btnEdit || !formEdit) return;
        btnEdit.addEventListener('click', function() {
            infoView.classList.add('hidden');
            formEdit.classList.remove('hidden');
        });
        if (btnCancel) btnCancel.addEventListener('click', function() {
            infoView.classList.remove('hidden');
            formEdit.classList.add('hidden');
        });
        formEdit.addEventListener('submit', function(e) {
            e.preventDefault();
            var fd = new FormData(formEdit);
            var payload = {
                customer_id: fd.get('customer_id'),
                name: fd.get('name'),
                phone: fd.get('phone'),
                email: fd.get('email'),
                skin_type: fd.get('skin_type'),
                skin_condition: fd.get('skin_condition'),
                date_of_birth: fd.get('date_of_birth'),
                patient_notes: fd.get('patient_notes')
            };
            fetch('../backend/update_customer_profile.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            }).then(function(r) { return r.json(); }).then(function(res) {
                if (res.success) {
                    alert(res.message);
                    window.location.reload();
                } else {
                    alert(res.message || 'Có lỗi.');
                }
            }).catch(function() { alert('Lỗi kết nối.'); });
        });
    })();
    </script>
</body>
</html>
