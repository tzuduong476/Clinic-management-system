<?php
require_once __DIR__ . '/../backend/db.php';
$currentUser = getCurrentUser();
if (!$currentUser || !in_array($currentUser['role'] ?? '', ['admin', 'receptionist', 'doctor'], true)) {
    header('Location: ../frontend/signin.php');
    exit;
}

$currentPage = 'calendar';
$id = (int)($_GET['id'] ?? 0);
if ($id <= 0) {
    header('Location: calendar.php');
    exit;
}
$stmt = $conn->prepare("
    SELECT id, booking_code, customer_name, customer_phone, service_id, service_name,
           specialist_id, specialist_name, appointment_date, appointment_time, total_price, status
    FROM appointments WHERE id = ?
");
$stmt->execute([$id]);
$apt = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$apt) {
    header('Location: calendar.php');
    exit;
}
// Format time for display
$t = $apt['appointment_time'];
if (preg_match('/^(\d{2}):(\d{2})/', $t, $m)) {
    $h = (int)$m[1];
    $ampm = $h >= 12 ? 'PM' : 'AM';
    $h12 = $h > 12 ? $h - 12 : ($h === 0 ? 12 : $h);
    $apt['appointment_time_display'] = sprintf('%d:%s %s', $h12, $m[2], $ampm);
} else {
    $apt['appointment_time_display'] = $t;
}

$stmt = $conn->query("SELECT id, name, title FROM specialists ORDER BY name");
$specialists = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt = $conn->query("SELECT id, name, price FROM services ORDER BY name");
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Sửa lịch hẹn | Elysian Management Hub</title>
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
            <a href="calendar.php" class="text-slate-600 hover:text-primary flex items-center gap-2">
                <span class="material-symbols-outlined">arrow_back</span> Quay lại Calendar
            </a>
            <div class="flex items-center gap-4">
                <span class="text-sm font-semibold text-slate-600"><?= htmlspecialchars($currentUser['full_name'] ?? '') ?></span>
                <a href="../backend/logout.php" class="text-sm text-slate-500 hover:text-primary">Đăng xuất</a>
            </div>
        </header>

        <main class="flex-1 p-8 overflow-auto">
            <h1 class="text-2xl font-bold text-slate-800 mb-2">Sửa lịch hẹn: <?= htmlspecialchars($apt['customer_name']) ?></h1>
            <p class="text-slate-500 text-sm mb-6">Mã: #<?= htmlspecialchars($apt['booking_code']) ?>. Thay đổi thông tin hoặc chọn khung giờ khác để tránh trùng lịch.</p>

            <form id="formEdit" class="max-w-2xl space-y-6 bg-white rounded-xl border border-slate-200 shadow-sm p-6">
                <input type="hidden" id="appointment_id" value="<?= (int)$apt['id'] ?>"/>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Họ tên khách *</label>
                        <input type="text" id="customer_name" name="customer_name" required
                               value="<?= htmlspecialchars($apt['customer_name']) ?>"
                               class="w-full rounded-lg border border-slate-200 px-4 py-2 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none"/>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Số điện thoại *</label>
                        <input type="tel" id="customer_phone" name="customer_phone" required
                               value="<?= htmlspecialchars($apt['customer_phone']) ?>"
                               class="w-full rounded-lg border border-slate-200 px-4 py-2 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none"/>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Trạng thái</label>
                    <select id="status" name="status" class="w-full rounded-lg border border-slate-200 px-4 py-2 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none">
                        <option value="pending" <?= ($apt['status'] ?? '') === 'pending' ? 'selected' : '' ?>>Chờ xác nhận</option>
                        <option value="confirmed" <?= ($apt['status'] ?? '') === 'confirmed' ? 'selected' : '' ?>>Đã xác nhận</option>
                        <option value="cancelled" <?= ($apt['status'] ?? '') === 'cancelled' ? 'selected' : '' ?>>Đã hủy</option>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Dịch vụ *</label>
                    <select id="service_id" name="service_id" required
                            class="w-full rounded-lg border border-slate-200 px-4 py-2 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none">
                        <?php foreach ($services as $s): ?>
                        <option value="<?= htmlspecialchars($s['id']) ?>" data-name="<?= htmlspecialchars($s['name']) ?>" data-price="<?= htmlspecialchars($s['price'] ?? '') ?>"
                                <?= ($s['id'] === $apt['service_id'] || $s['name'] === $apt['service_name']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($s['name']) ?> (<?= htmlspecialchars($s['price'] ?? '') ?>)
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Chuyên gia *</label>
                    <select id="specialist_id" name="specialist_id" required
                            class="w-full rounded-lg border border-slate-200 px-4 py-2 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none">
                        <?php foreach ($specialists as $s): ?>
                        <option value="<?= (int)$s['id'] ?>" data-name="<?= htmlspecialchars($s['name']) ?>"
                                <?= (int)$s['id'] === (int)$apt['specialist_id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($s['name']) ?> - <?= htmlspecialchars($s['title']) ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Ngày hẹn *</label>
                    <input type="date" id="appointment_date" name="appointment_date" required
                           value="<?= htmlspecialchars($apt['appointment_date']) ?>"
                           class="rounded-lg border border-slate-200 px-4 py-2 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none"/>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Khung giờ (chọn lại nếu đổi ngày/chuyên gia) *</label>
                    <div id="slotsContainer" class="flex flex-wrap gap-2">
                        <span class="text-slate-500 text-sm">Đang tải...</span>
                    </div>
                    <input type="hidden" id="appointment_time" name="appointment_time" value="<?= htmlspecialchars($apt['appointment_time_display'] ?? $apt['appointment_time']) ?>"/>
                </div>
                <div id="msg" class="hidden rounded-lg p-3 text-sm"></div>
                <div class="flex flex-wrap items-center justify-between gap-4 pt-4">
                    <div class="flex gap-3">
                        <button type="button" id="btnCancelApt" class="text-red-600 hover:text-red-700 font-medium text-sm flex items-center gap-1">
                            <span class="material-symbols-outlined text-lg">cancel</span> Hủy lịch hẹn
                        </button>
                        <a href="calendar.php" class="px-5 py-2.5 rounded-lg border border-slate-200 text-slate-700 font-medium hover:bg-slate-50">Bỏ qua thay đổi</a>
                    </div>
                    <button type="submit" id="btnSubmit" class="px-5 py-2.5 rounded-lg bg-primary text-white font-semibold hover:bg-primary-dark">
                        Lưu thay đổi
                    </button>
                </div>
            </form>
        </main>
    </div>

    <script>
    (function() {
        const baseUrl = '../backend';
        const appointmentId = parseInt(document.getElementById('appointment_id').value, 10);
        const currentTimeDisplay = document.getElementById('appointment_time').value;

        const specialistSelect = document.getElementById('specialist_id');
        const dateInput = document.getElementById('appointment_date');
        const slotsContainer = document.getElementById('slotsContainer');
        const timeHidden = document.getElementById('appointment_time');

        function loadSlots() {
            const specialistId = specialistSelect.value;
            const date = dateInput.value;
            if (!specialistId || !date) {
                slotsContainer.innerHTML = '<span class="text-slate-500 text-sm">Chọn chuyên gia và ngày.</span>';
                return;
            }
            slotsContainer.innerHTML = '<span class="text-slate-500 text-sm">Đang tải...</span>';
            fetch(baseUrl + '/get_slots.php?date=' + encodeURIComponent(date) + '&specialist_id=' + encodeURIComponent(specialistId) + '&exclude_appointment_id=' + appointmentId)
                .then(function(r) { return r.json(); })
                .then(function(data) {
                    if (!data.success || !data.data || data.data.length === 0) {
                        slotsContainer.innerHTML = '<span class="text-amber-600 text-sm">Không còn khung giờ trống. Giữ nguyên giờ hiện tại hoặc chọn ngày khác.</span>';
                        timeHidden.value = currentTimeDisplay;
                        return;
                    }
                    let html = '';
                    data.data.forEach(function(t) {
                        const isCurrent = t === currentTimeDisplay;
                        const cls = isCurrent ? 'bg-primary text-white border-primary' : 'border-slate-200 hover:bg-primary/10 hover:border-primary';
                        html += '<button type="button" class="slot-btn px-4 py-2 rounded-lg border text-sm font-medium ' + cls + '" data-time="' + t + '">' + t + '</button>';
                    });
                    slotsContainer.innerHTML = html;
                    timeHidden.value = currentTimeDisplay;
                    slotsContainer.querySelectorAll('.slot-btn').forEach(function(btn) {
                        btn.addEventListener('click', function() {
                            slotsContainer.querySelectorAll('.slot-btn').forEach(function(b) { b.classList.remove('bg-primary', 'text-white', 'border-primary'); });
                            this.classList.add('bg-primary', 'text-white', 'border-primary');
                            timeHidden.value = this.getAttribute('data-time');
                        });
                    });
                })
                .catch(function() {
                    slotsContainer.innerHTML = '<span class="text-red-600 text-sm">Không thể tải khung giờ.</span>';
                    timeHidden.value = currentTimeDisplay;
                });
        }
        specialistSelect.addEventListener('change', loadSlots);
        dateInput.addEventListener('change', loadSlots);
        loadSlots();

        document.getElementById('formEdit').addEventListener('submit', function(e) {
            e.preventDefault();
            const specialistOpt = specialistSelect.options[specialistSelect.selectedIndex];
            const specialistName = specialistOpt ? specialistOpt.getAttribute('data-name') : '';
            const serviceOpt = document.getElementById('service_id').options[document.getElementById('service_id').selectedIndex];
            const serviceName = serviceOpt ? serviceOpt.getAttribute('data-name') : '';
            const totalPrice = serviceOpt ? serviceOpt.getAttribute('data-price') : '';

            const payload = {
                id: appointmentId,
                customer_name: document.getElementById('customer_name').value.trim(),
                customer_phone: document.getElementById('customer_phone').value.trim(),
                service_id: document.getElementById('service_id').value,
                service_name: serviceName,
                specialist_id: parseInt(specialistSelect.value, 10),
                specialist_name: specialistName,
                appointment_date: dateInput.value,
                appointment_time: timeHidden.value,
                total_price: totalPrice,
                status: document.getElementById('status').value
            };
            const btn = document.getElementById('btnSubmit');
            btn.disabled = true;
            fetch(baseUrl + '/update_appointment.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            })
            .then(function(r) { return r.json(); })
            .then(function(res) {
                if (res.success) {
                    showMsg('Đã lưu thay đổi.', 'success');
                    setTimeout(function() { window.location.href = 'calendar.php'; }, 1000);
                } else {
                    showMsg(res.message || 'Có lỗi xảy ra.', 'error');
                    btn.disabled = false;
                }
            })
            .catch(function() {
                showMsg('Lỗi kết nối.', 'error');
                btn.disabled = false;
            });
        });

        document.getElementById('btnCancelApt').addEventListener('click', function() {
            if (!confirm('Bạn có chắc muốn hủy lịch hẹn này?')) return;
            fetch(baseUrl + '/cancel_appointment.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id: appointmentId })
            })
            .then(function(r) { return r.json(); })
            .then(function(res) {
                if (res.success) {
                    showMsg('Đã hủy lịch hẹn.', 'success');
                    setTimeout(function() { window.location.href = 'calendar.php'; }, 1000);
                } else {
                    showMsg(res.message || 'Không thể hủy.', 'error');
                }
            })
            .catch(function() { showMsg('Lỗi kết nối.', 'error'); });
        });

        function showMsg(text, type) {
            const el = document.getElementById('msg');
            el.textContent = text;
            el.className = 'rounded-lg p-3 text-sm ' + (type === 'error' ? 'bg-red-50 text-red-800' : 'bg-green-50 text-green-800');
            el.classList.remove('hidden');
        }
    })();
    </script>
</body>
</html>
