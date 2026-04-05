<?php
require_once __DIR__ . '/../backend/db.php';
$currentUser = getCurrentUser();
if (!$currentUser || !in_array($currentUser['role'] ?? '', ['admin', 'receptionist', 'doctor'], true)) {
    header('Location: ../frontend/signin.php');
    exit;
}

$currentPage = 'payments';

function parseRevenue($conn, $dateFrom, $dateTo, $paymentStatus = 'paid') {
    $stmt = $conn->prepare("SELECT total_price FROM appointments WHERE appointment_date BETWEEN ? AND ? AND payment_status = ? AND status != 'cancelled'");
    $stmt->execute([$dateFrom, $dateTo, $paymentStatus]);
    $prices = $stmt->fetchAll(PDO::FETCH_COLUMN);
    $sum = 0;
    foreach ($prices as $p) {
        $sum += (int)preg_replace('/[^0-9]/', '', $p ?? '');
    }
    return $sum;
}

$today = date('Y-m-d');
$monthStart = date('Y-m-01');
$monthEnd = date('Y-m-t');

$revenueToday = parseRevenue($conn, $today, $today, 'paid');
$revenueThisMonth = parseRevenue($conn, $monthStart, $monthEnd, 'paid');
$revenueTodayAll = parseRevenue($conn, $today, $today, 'unpaid');
$revenueThisMonthAll = parseRevenue($conn, $monthStart, $monthEnd, 'unpaid');

$stmt = $conn->query("SELECT COUNT(*) FROM appointments WHERE payment_status = 'unpaid' AND status != 'cancelled'");
$unpaidCount = (int)$stmt->fetchColumn();

$stmt = $conn->query("SELECT COUNT(*) FROM appointments WHERE payment_status = 'paid' AND status != 'cancelled'");
$paidCount = (int)$stmt->fetchColumn();

function formatDate($d) {
    if (!$d) return '—';
    return date('M j, Y', strtotime($d));
}
function formatTime($t) {
    if (!is_string($t)) return $t;
    if (preg_match('/^(\d{2}):(\d{2})/', $t, $m)) {
        $h = (int)$m[1];
        $min = $m[2];
        $ampm = $h >= 12 ? 'PM' : 'AM';
        $h12 = $h > 12 ? $h - 12 : ($h === 0 ? 12 : $h);
        return sprintf('%d:%s %s', $h12, $min, $ampm);
    }
    return $t;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Xác nhận thanh toán | Elysian Management Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0db9f2',
                        'primary-dark': '#0a9ad4',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex">
    <?php include __DIR__ . '/_sidebar.php'; ?>

    <div class="flex-1 flex flex-col min-w-0">
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 shrink-0">
            <h1 class="text-xl font-bold text-slate-800">Xác nhận thanh toán</h1>
            <div class="flex items-center gap-4">
                <span class="text-sm font-semibold text-slate-600">
                    <?= $currentUser['role'] === 'receptionist' ? 'Receptionist' : ($currentUser['role'] === 'doctor' ? 'Doctor' : 'Admin') ?>
                </span>
                <span class="material-symbols-outlined text-slate-500 cursor-pointer">notifications</span>
                <a href="../backend/logout.php" class="text-sm text-slate-500 hover:text-primary">Sign Out</a>
                <div class="w-9 h-9 rounded-full bg-primary/20 flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary">person</span>
                </div>
            </div>
        </header>

        <main class="flex-1 p-8 overflow-auto">
            <!-- Statistics -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5 flex items-center gap-4">
                    <span class="w-12 h-12 rounded-full bg-amber-100 flex items-center justify-center">
                        <span class="material-symbols-outlined text-amber-600 text-2xl">pending</span>
                    </span>
                    <div>
                        <p class="text-sm text-slate-500 font-medium">Chưa thanh toán</p>
                        <p class="text-2xl font-bold text-slate-800"><?= $unpaidCount ?></p>
                    </div>
                </div>
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5 flex items-center gap-4">
                    <span class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center">
                        <span class="material-symbols-outlined text-green-600 text-2xl">check_circle</span>
                    </span>
                    <div>
                        <p class="text-sm text-slate-500 font-medium">Đã thanh toán</p>
                        <p class="text-2xl font-bold text-slate-800"><?= $paidCount ?></p>
                    </div>
                </div>
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5 flex items-center gap-4">
                    <span class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center">
                        <span class="material-symbols-outlined text-primary text-2xl">today</span>
                    </span>
                    <div>
                        <p class="text-sm text-slate-500 font-medium">Doanh thu hôm nay</p>
                        <p class="text-2xl font-bold text-green-600"><?= number_format($revenueToday) ?> đ</p>
                    </div>
                </div>
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5 flex items-center gap-4">
                    <span class="w-12 h-12 rounded-full bg-purple-100 flex items-center justify-center">
                        <span class="material-symbols-outlined text-purple-600 text-2xl">calendar_month</span>
                    </span>
                    <div>
                        <p class="text-sm text-slate-500 font-medium">Doanh thu tháng này</p>
                        <p class="text-2xl font-bold text-purple-600"><?= number_format($revenueThisMonth) ?> đ</p>
                    </div>
                </div>
            </div>

            <!-- Unpaid Appointments -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden mb-6">
                <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                    <h3 class="font-bold text-slate-800 flex items-center gap-2">
                        <span class="material-symbols-outlined text-amber-600">pending</span>
                        Chờ xác nhận thanh toán
                    </h3>
                    <span class="px-3 py-1 rounded-full bg-amber-100 text-amber-800 text-xs font-bold" id="unpaidBadge"><?= $unpaidCount ?> lịch hẹn</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider text-xs">
                            <tr>
                                <th class="text-left px-6 py-3 font-semibold">Mã đặt lịch</th>
                                <th class="text-left px-6 py-3 font-semibold">Ngày</th>
                                <th class="text-left px-6 py-3 font-semibold">Khách hàng</th>
                                <th class="text-left px-6 py-3 font-semibold">Dịch vụ</th>
                                <th class="text-left px-6 py-3 font-semibold">Bác sĩ</th>
                                <th class="text-left px-6 py-3 font-semibold">Số tiền</th>
                                <th class="text-left px-6 py-3 font-semibold">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody id="unpaidTableBody">
                            <tr><td colspan="7" class="px-6 py-8 text-slate-500 text-center">Đang tải dữ liệu...</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- All Appointments with Payment Status -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-100">
                    <h3 class="font-bold text-slate-800 flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">receipt_long</span>
                        Tất cả lịch hẹn
                    </h3>
                </div>
                <div class="px-6 py-3 border-b border-slate-100 flex flex-wrap items-center gap-3">
                    <select id="paymentFilter" class="rounded-lg border border-slate-200 text-sm py-2 px-3">
                        <option value="">Tất cả trạng thái</option>
                        <option value="unpaid">Chưa thanh toán</option>
                        <option value="paid">Đã thanh toán</option>
                    </select>
                    <input type="date" id="dateFrom" class="rounded-lg border border-slate-200 text-sm py-2 px-3" value="<?= $monthStart ?>"/>
                    <span class="text-slate-400">-</span>
                    <input type="date" id="dateTo" class="rounded-lg border border-slate-200 text-sm py-2 px-3" value="<?= $monthEnd ?>"/>
                    <button onclick="loadAllAppointments()" class="px-4 py-2 bg-primary text-white rounded-lg text-sm font-semibold hover:bg-primary-dark">Lọc</button>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider text-xs">
                            <tr>
                                <th class="text-left px-6 py-3 font-semibold">Mã đặt lịch</th>
                                <th class="text-left px-6 py-3 font-semibold">Ngày</th>
                                <th class="text-left px-6 py-3 font-semibold">Khách hàng</th>
                                <th class="text-left px-6 py-3 font-semibold">Dịch vụ</th>
                                <th class="text-left px-6 py-3 font-semibold">Số tiền</th>
                                <th class="text-left px-6 py-3 font-semibold">Thanh toán</th>
                                <th class="text-left px-6 py-3 font-semibold">Phương thức</th>
                                <th class="text-left px-6 py-3 font-semibold">Xác nhận bởi</th>
                                <th class="text-left px-6 py-3 font-semibold">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody id="allTableBody">
                            <tr><td colspan="9" class="px-6 py-8 text-slate-500 text-center">Đang tải dữ liệu...</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <!-- Confirm Payment Modal -->
    <div id="confirmModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-xl shadow-xl w-full max-w-md mx-4">
            <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                <h3 class="font-bold text-slate-800">Xác nhận thanh toán</h3>
                <button onclick="closeModal()" class="text-slate-400 hover:text-slate-600">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <div class="p-6">
                <div class="mb-4 p-4 bg-slate-50 rounded-lg">
                    <p class="text-sm text-slate-500">Mã đặt lịch</p>
                    <p class="font-bold text-slate-800 text-lg" id="modalBookingCode">-</p>
                    <p class="text-sm text-slate-500 mt-2">Số tiền</p>
                    <p class="font-bold text-green-600 text-lg" id="modalAmount">-</p>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-slate-700 mb-2">Phương thức thanh toán</label>
                    <select id="paymentMethod" class="w-full rounded-lg border border-slate-200 py-2 px-3">
                        <option value="cash">Tiền mặt</option>
                        <option value="bank_transfer">Chuyển khoản</option>
                        <option value="credit_card">Thẻ tín dụng</option>
                        <option value="momo">MoMo</option>
                        <option value="vnpay">VNPay</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-slate-700 mb-2">Ghi chú (tùy chọn)</label>
                    <textarea id="paymentNote" class="w-full rounded-lg border border-slate-200 py-2 px-3" rows="3" placeholder="Nhập ghi chú nếu có..."></textarea>
                </div>
                <input type="hidden" id="modalBookingCodeHidden"/>
                <div class="flex gap-3">
                    <button onclick="closeModal()" class="flex-1 px-4 py-2 border border-slate-200 text-slate-600 rounded-lg font-semibold hover:bg-slate-50">Hủy</button>
                    <button onclick="confirmPayment()" class="flex-1 px-4 py-2 bg-green-600 text-white rounded-lg font-semibold hover:bg-green-700">Xác nhận</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentUnpaidAppointments = [];
        
        async function loadUnpaidAppointments() {
            try {
                const response = await fetch('../backend/payments_api.php?action=get_unpaid_appointments', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                });
                const data = await response.json();
                
                const tbody = document.getElementById('unpaidTableBody');
                document.getElementById('unpaidBadge').textContent = (data.data?.length || 0) + ' lịch hẹn';
                
                if (!data.success || !data.data || data.data.length === 0) {
                    tbody.innerHTML = '<tr><td colspan="7" class="px-6 py-8 text-slate-500 text-center">Không có lịch hẹn chờ thanh toán.</td></tr>';
                    return;
                }
                
                currentUnpaidAppointments = data.data;
                tbody.innerHTML = data.data.map(apt => `
                    <tr class="border-t border-slate-100 hover:bg-slate-50/50">
                        <td class="px-6 py-3 font-mono text-slate-600">${apt.booking_code}</td>
                        <td class="px-6 py-3 text-slate-600">${formatDate(apt.appointment_date)} ${formatTime(apt.appointment_time)}</td>
                        <td class="px-6 py-3 font-medium text-slate-800">${apt.customer_name}<br><span class="text-xs text-slate-500">${apt.customer_phone}</span></td>
                        <td class="px-6 py-3 text-slate-600">${apt.service_name}</td>
                        <td class="px-6 py-3 text-slate-600">${apt.specialist_name}</td>
                        <td class="px-6 py-3 font-semibold text-slate-800">${apt.total_price}</td>
                        <td class="px-6 py-3">
                            <button onclick="openConfirmModal('${apt.booking_code}', '${apt.total_price}')" class="px-3 py-1.5 bg-green-600 text-white rounded-lg text-xs font-semibold hover:bg-green-700">
                                Xác nhận
                            </button>
                        </td>
                    </tr>
                `).join('');
            } catch (error) {
                console.error('Error loading unpaid appointments:', error);
                document.getElementById('unpaidTableBody').innerHTML = '<tr><td colspan="7" class="px-6 py-8 text-red-500 text-center">Lỗi tải dữ liệu.</td></tr>';
            }
        }
        
        async function loadAllAppointments() {
            const paymentStatus = document.getElementById('paymentFilter').value;
            const dateFrom = document.getElementById('dateFrom').value;
            const dateTo = document.getElementById('dateTo').value;
            
            try {
                const params = new URLSearchParams({
                    action: 'get_all_appointments_with_payment',
                    payment_status: paymentStatus,
                    from: dateFrom,
                    to: dateTo
                });
                
                const response = await fetch('../backend/payments_api.php?' + params.toString(), {
                    method: 'POST',
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                });
                const data = await response.json();
                
                const tbody = document.getElementById('allTableBody');
                
                if (!data.success || !data.data || data.data.length === 0) {
                    tbody.innerHTML = '<tr><td colspan="9" class="px-6 py-8 text-slate-500 text-center">Không có dữ liệu.</td></tr>';
                    return;
                }
                
                tbody.innerHTML = data.data.map(apt => {
                    const paymentClass = apt.payment_status === 'paid' ? 'bg-green-100 text-green-800' : 'bg-amber-100 text-amber-800';
                    const paymentLabel = apt.payment_status === 'paid' ? 'Đã thanh toán' : 'Chưa thanh toán';
                    const methodLabel = apt.payment_method ? apt.payment_method : '—';
                    const confirmedBy = apt.confirmed_by_name ? apt.confirmed_by_name : '—';
                    
                    const actionButton = apt.payment_status === 'unpaid' 
                        ? `<button onclick="openConfirmModal('${apt.booking_code}', '${apt.total_price}')" class="px-3 py-1.5 bg-green-600 text-white rounded-lg text-xs font-semibold hover:bg-green-700">Xác nhận</button>`
                        : `<span class="text-xs text-slate-400">—</span>`;
                    
                    return `
                        <tr class="border-t border-slate-100 hover:bg-slate-50/50">
                            <td class="px-6 py-3 font-mono text-slate-600">${apt.booking_code}</td>
                            <td class="px-6 py-3 text-slate-600">${formatDate(apt.appointment_date)}</td>
                            <td class="px-6 py-3 font-medium text-slate-800">${apt.customer_name}</td>
                            <td class="px-6 py-3 text-slate-600">${apt.service_name}</td>
                            <td class="px-6 py-3 font-semibold text-slate-800">${apt.total_price}</td>
                            <td class="px-6 py-3"><span class="px-2 py-0.5 rounded text-xs font-bold ${paymentClass}">${paymentLabel}</span></td>
                            <td class="px-6 py-3 text-slate-600">${methodLabel}</td>
                            <td class="px-6 py-3 text-slate-600">${confirmedBy}</td>
                            <td class="px-6 py-3">${actionButton}</td>
                        </tr>
                    `;
                }).join('');
            } catch (error) {
                console.error('Error loading all appointments:', error);
                document.getElementById('allTableBody').innerHTML = '<tr><td colspan="9" class="px-6 py-8 text-red-500 text-center">Lỗi tải dữ liệu.</td></tr>';
            }
        }
        
        function openConfirmModal(bookingCode, amount) {
            document.getElementById('modalBookingCode').textContent = bookingCode;
            document.getElementById('modalAmount').textContent = amount;
            document.getElementById('modalBookingCodeHidden').value = bookingCode;
            document.getElementById('paymentMethod').value = 'cash';
            document.getElementById('paymentNote').value = '';
            document.getElementById('confirmModal').classList.remove('hidden');
            document.getElementById('confirmModal').classList.add('flex');
        }
        
        function closeModal() {
            document.getElementById('confirmModal').classList.add('hidden');
            document.getElementById('confirmModal').classList.remove('flex');
        }
        
        async function confirmPayment() {
            const bookingCode = document.getElementById('modalBookingCodeHidden').value;
            const paymentMethod = document.getElementById('paymentMethod').value;
            const paymentNote = document.getElementById('paymentNote').value;
            
            try {
                const response = await fetch('../backend/payments_api.php', {
                    method: 'POST',
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                    body: `action=confirm_payment&booking_code=${encodeURIComponent(bookingCode)}&payment_method=${encodeURIComponent(paymentMethod)}&payment_note=${encodeURIComponent(paymentNote)}`
                });
                const data = await response.json();
                
                if (data.success) {
                    alert('Xác nhận thanh toán thành công!');
                    closeModal();
                    loadUnpaidAppointments();
                    loadAllAppointments();
                    location.reload();
                } else {
                    alert(data.message || 'Lỗi xác nhận thanh toán.');
                }
            } catch (error) {
                console.error('Error confirming payment:', error);
                alert('Lỗi kết nối server.');
            }
        }
        
        function formatDate(d) {
            if (!d) return '—';
            const date = new Date(d);
            return date.toLocaleDateString('vi-VN', {day: '2-digit', month: '2-digit', year: 'numeric'});
        }
        
        function formatTime(t) {
            if (!t) return '';
            const parts = t.split(':');
            if (parts.length >= 2) {
                let h = parseInt(parts[0]);
                const min = parts[1];
                const ampm = h >= 12 ? 'PM' : 'AM';
                const h12 = h > 12 ? h - 12 : (h === 0 ? 12 : h);
                return h12 + ':' + min + ' ' + ampm;
            }
            return t;
        }
        
        document.addEventListener('DOMContentLoaded', function() {
            loadUnpaidAppointments();
            loadAllAppointments();
        });
    </script>
</body>
</html>
