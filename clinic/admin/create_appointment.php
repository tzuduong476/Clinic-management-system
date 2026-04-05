<?php
require_once __DIR__ . '/../backend/db.php';
$currentUser = getCurrentUser();
if (!$currentUser || !in_array($currentUser['role'] ?? '', ['admin', 'receptionist', 'doctor'], true)) {
    header('Location: ../frontend/signin.php');
    exit;
}

$currentPage = 'calendar';
$stmt = $conn->query("SELECT id, name, title FROM specialists ORDER BY name");
$specialists = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt = $conn->query("SELECT id, name, price FROM services ORDER BY name");
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);
$customers = $conn->query("SELECT Customer_ID, Name, Phone, Email FROM `Customer` ORDER BY Name")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Tạo lịch hẹn | Elysian Management Hub</title>
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
            <h1 class="text-2xl font-bold text-slate-800 mb-2">Tạo lịch hẹn mới</h1>
            <p class="text-slate-500 text-sm mb-6">Điền thông tin khách hàng và chọn khung giờ phù hợp để tránh trùng lịch chuyên gia.</p>

            <form id="formCreate" class="max-w-2xl space-y-6 bg-white rounded-xl border border-slate-200 shadow-sm p-6">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Tìm khách hàng (tên hoặc SĐT)</label>
                    <div class="flex gap-2">
                        <input type="text" id="customerSearch" placeholder="Gõ tên hoặc số điện thoại..."
                               class="flex-1 rounded-lg border border-slate-200 px-4 py-2 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none"/>
                        <button type="button" id="btnSearchCustomer" class="px-4 py-2 rounded-lg bg-slate-100 text-slate-700 text-sm font-medium hover:bg-slate-200">Tìm</button>
                    </div>
                    <p class="mt-1 text-xs text-slate-500">Hoặc nhập tên/SĐT bên dưới. <a href="customers.php" class="text-primary font-semibold">+ Đăng ký khách mới</a></p>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Họ tên khách *</label>
                        <input type="text" id="customer_name" name="customer_name" required
                               class="w-full rounded-lg border border-slate-200 px-4 py-2 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none"
                               placeholder="Nguyễn Văn A"/>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Số điện thoại *</label>
                        <input type="tel" id="customer_phone" name="customer_phone" required
                               class="w-full rounded-lg border border-slate-200 px-4 py-2 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none"
                               placeholder="0901234567"/>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Dịch vụ *</label>
                    <select id="service_id" name="service_id" required
                            class="w-full rounded-lg border border-slate-200 px-4 py-2 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none">
                        <option value="">-- Chọn dịch vụ --</option>
                        <?php foreach ($services as $s): ?>
                        <option value="<?= htmlspecialchars($s['id']) ?>" data-name="<?= htmlspecialchars($s['name']) ?>" data-price="<?= htmlspecialchars($s['price'] ?? '') ?>">
                            <?= htmlspecialchars($s['name']) ?> (<?= htmlspecialchars($s['price'] ?? '') ?>)
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Chuyên gia *</label>
                    <select id="specialist_id" name="specialist_id" required
                            class="w-full rounded-lg border border-slate-200 px-4 py-2 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none">
                        <option value="">-- Chọn chuyên gia --</option>
                        <?php foreach ($specialists as $s): ?>
                        <option value="<?= (int)$s['id'] ?>" data-name="<?= htmlspecialchars($s['name']) ?>"><?= htmlspecialchars($s['name']) ?> - <?= htmlspecialchars($s['title']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Ngày hẹn *</label>
                    <input type="date" id="appointment_date" name="appointment_date" required
                           class="rounded-lg border border-slate-200 px-4 py-2 focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none"/>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Khung giờ trống (chọn chuyên gia & ngày trước) *</label>
                    <div id="slotsContainer" class="flex flex-wrap gap-2">
                        <span class="text-slate-500 text-sm">Chọn chuyên gia và ngày để xem giờ trống.</span>
                    </div>
                    <input type="hidden" id="appointment_time" name="appointment_time" value=""/>
                </div>
                <div id="msg" class="hidden rounded-lg p-3 text-sm"></div>
                <div class="flex gap-3 pt-4">
                    <a href="calendar.php" class="px-5 py-2.5 rounded-lg border border-slate-200 text-slate-700 font-medium hover:bg-slate-50">Hủy</a>
                    <button type="submit" id="btnSubmit" class="px-5 py-2.5 rounded-lg bg-primary text-white font-semibold hover:bg-primary-dark">
                        Tạo lịch hẹn
                    </button>
                </div>
            </form>
        </main>
    </div>

    <script>
    (function() {
        const baseUrl = '../backend';
        const customers = <?= json_encode($customers) ?>;

        document.getElementById('customerSearch').addEventListener('keyup', function(e) {
            if (e.key === 'Enter') doSearch();
        });
        document.getElementById('btnSearchCustomer').addEventListener('click', doSearch);
        function doSearch() {
            const q = document.getElementById('customerSearch').value.trim().toLowerCase();
            if (!q) return;
            const found = customers.find(function(c) {
                return (c.Name && c.Name.toLowerCase().includes(q)) ||
                       (c.Phone && c.Phone.replace(/\s/g, '').includes(q.replace(/\s/g, ''))) ||
                       (c.Email && c.Email.toLowerCase().includes(q));
            });
            if (found) {
                document.getElementById('customer_name').value = found.Name || '';
                document.getElementById('customer_phone').value = found.Phone || '';
            }
        }

        const specialistSelect = document.getElementById('specialist_id');
        const dateInput = document.getElementById('appointment_date');
        const slotsContainer = document.getElementById('slotsContainer');
        const timeHidden = document.getElementById('appointment_time');

        function loadSlots() {
            const specialistId = specialistSelect.value;
            const date = dateInput.value;
            timeHidden.value = '';
            if (!specialistId || !date) {
                slotsContainer.innerHTML = '<span class="text-slate-500 text-sm">Chọn chuyên gia và ngày để xem giờ trống.</span>';
                return;
            }
            slotsContainer.innerHTML = '<span class="text-slate-500 text-sm">Đang tải...</span>';
            fetch(baseUrl + '/get_slots.php?date=' + encodeURIComponent(date) + '&specialist_id=' + encodeURIComponent(specialistId))
                .then(function(r) { return r.json(); })
                .then(function(data) {
                    if (!data.success || !data.data || data.data.length === 0) {
                        slotsContainer.innerHTML = '<span class="text-amber-600 text-sm">Không còn khung giờ trống cho chuyên gia này trong ngày đã chọn.</span>';
                        return;
                    }
                    let html = '';
                    data.data.forEach(function(t) {
                        html += '<button type="button" class="slot-btn px-4 py-2 rounded-lg border border-slate-200 text-sm font-medium hover:bg-primary/10 hover:border-primary" data-time="' + t + '">' + t + '</button>';
                    });
                    slotsContainer.innerHTML = html;
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
                });
        }
        specialistSelect.addEventListener('change', loadSlots);
        dateInput.addEventListener('change', loadSlots);

        document.getElementById('formCreate').addEventListener('submit', function(e) {
            e.preventDefault();
            const specialistId = specialistSelect.value;
            const specialistOpt = specialistSelect.options[specialistSelect.selectedIndex];
            const specialistName = specialistOpt ? specialistOpt.getAttribute('data-name') : '';
            const serviceOpt = document.getElementById('service_id').options[document.getElementById('service_id').selectedIndex];
            const serviceName = serviceOpt ? serviceOpt.getAttribute('data-name') : '';
            const totalPrice = serviceOpt ? serviceOpt.getAttribute('data-price') : '';

            const payload = {
                customer_name: document.getElementById('customer_name').value.trim(),
                customer_phone: document.getElementById('customer_phone').value.trim(),
                service_id: document.getElementById('service_id').value,
                service_name: serviceName,
                specialist_id: parseInt(specialistId, 10),
                specialist_name: specialistName,
                appointment_date: document.getElementById('appointment_date').value,
                appointment_time: timeHidden.value,
                total_price: totalPrice
            };
            if (!payload.appointment_time) {
                showMsg('Vui lòng chọn khung giờ.', 'error');
                return;
            }
            const btn = document.getElementById('btnSubmit');
            btn.disabled = true;
            fetch(baseUrl + '/create_booking.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            })
            .then(function(r) { return r.json(); })
            .then(function(res) {
                if (res.success) {
                    showMsg('Đã tạo lịch hẹn thành công. Mã: ' + (res.booking_id || ''), 'success');
                    setTimeout(function() { window.location.href = 'calendar.php'; }, 1500);
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
