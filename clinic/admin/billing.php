<?php
require_once __DIR__ . '/../backend/db.php';
$currentUser = getCurrentUser();
if (!$currentUser || !in_array($currentUser['role'] ?? '', ['admin', 'receptionist', 'doctor'], true)) {
    header('Location: ../frontend/signin.php');
    exit;
}

$currentPage = 'billing';
$dateFrom = trim($_GET['from'] ?? '');
$dateTo = trim($_GET['to'] ?? '');
$filterStatus = trim($_GET['status'] ?? '');
$filterPayment = trim($_GET['payment'] ?? '');
$page = max(1, (int)($_GET['page'] ?? 1));
$perPage = 15;
$offset = ($page - 1) * $perPage;

$today = date('Y-m-d');
$monthStart = date('Y-m-01');
$monthEnd = date('Y-m-t');

if ($dateFrom === '') $dateFrom = $monthStart;
if ($dateTo === '') $dateTo = $monthEnd;

function parseRevenue(PDO $conn, $dateFrom, $dateTo, $excludeCancelled = true) {
    $statusCond = $excludeCancelled ? " AND status != 'cancelled'" : '';
    $paymentCond = " AND payment_status = 'paid'";
    $stmt = $conn->prepare("SELECT total_price FROM appointments WHERE appointment_date BETWEEN ? AND ? $statusCond $paymentCond");
    $stmt->execute([$dateFrom, $dateTo]);
    $prices = $stmt->fetchAll(PDO::FETCH_COLUMN);
    $sum = 0;
    foreach ($prices as $p) {
        $sum += (int)preg_replace('/[^0-9]/', '', $p ?? '');
    }
    return $sum;
}

$revenueToday = parseRevenue($conn, $today, $today);
$revenueThisMonth = parseRevenue($conn, $monthStart, $monthEnd);
$stmt = $conn->query("SELECT total_price FROM appointments WHERE status != 'cancelled' AND payment_status = 'paid'");
$allPrices = $stmt->fetchAll(PDO::FETCH_COLUMN);
$revenueTotal = 0;
foreach ($allPrices as $p) {
    $revenueTotal += (int)preg_replace('/[^0-9]/', '', $p ?? '');
}

$stmt = $conn->prepare("SELECT COUNT(*) FROM appointments WHERE appointment_date = ? AND status != 'cancelled'");
$stmt->execute([$today]);
$todayCount = (int)$stmt->fetchColumn();

// Overdue/unpaid balance (for Client Overdue Balances card)
$stmt = $conn->query("SELECT total_price FROM appointments WHERE status != 'cancelled' AND (payment_status = 'unpaid' OR payment_status IS NULL)");
$unpaidPrices = $stmt->fetchAll(PDO::FETCH_COLUMN);
$overdueAmount = 0;
foreach ($unpaidPrices as $p) {
    $overdueAmount += (int)preg_replace('/[^0-9]/', '', $p ?? '');
}
$overdueCount = count($unpaidPrices);

$stmt = $conn->prepare("
    SELECT id, booking_code, customer_name, customer_phone, service_name, specialist_name, appointment_date, appointment_time, total_price, status, payment_status, payment_method, created_at
    FROM appointments
    WHERE appointment_date BETWEEN ? AND ?
    ORDER BY appointment_date DESC, appointment_time DESC
");
$stmt->execute([$dateFrom, $dateTo]);
$allBills = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($filterStatus !== '') {
    $allBills = array_filter($allBills, function ($b) use ($filterStatus) { return ($b['status'] ?? '') === $filterStatus; });
    $allBills = array_values($allBills);
}
if ($filterPayment !== '') {
    $allBills = array_filter($allBills, function ($b) use ($filterPayment) { return ($b['payment_status'] ?? 'unpaid') === $filterPayment; });
    $allBills = array_values($allBills);
}
$totalBills = count($allBills);
$totalPages = $perPage > 0 ? (int)ceil($totalBills / $perPage) : 1;
$paginated = array_slice($allBills, $offset, $perPage);

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
    <title>Billing | Elysian Management Hub</title>
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
            <div class="flex items-center gap-4 flex-1">
                <p class="text-sm text-slate-500">Billing &amp; Invoices &gt; Client Billing Inquiries</p>
                <div class="max-w-sm flex-1">
                    <input type="text" placeholder="Search billing inquiries..." class="w-full pl-4 pr-4 py-2 rounded-lg border border-slate-200 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none"/>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <span class="material-symbols-outlined text-slate-500 cursor-pointer">notifications</span>
                <a href="../backend/logout.php" class="text-sm text-slate-500 hover:text-primary">Sign Out</a>
                <div class="w-9 h-9 rounded-full bg-primary/20 flex items-center justify-center"><span class="material-symbols-outlined text-primary">person</span></div>
            </div>
        </header>
        <main class="flex-1 p-8 overflow-auto">
            <!-- Metric cards (Screen 4.1) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5 flex items-center gap-4">
                    <span class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center"><span class="material-symbols-outlined text-green-600 text-2xl">payments</span></span>
                    <div>
                        <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Today's Client Payments</p>
                        <p class="text-2xl font-bold text-slate-800"><?= number_format($revenueToday) ?> VND</p>
                        <p class="text-xs text-green-600">+8.2% vs yesterday</p>
                    </div>
                </div>
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5 flex items-center gap-4">
                    <span class="w-12 h-12 rounded-full bg-amber-100 flex items-center justify-center"><span class="material-symbols-outlined text-amber-600 text-2xl">warning</span></span>
                    <div>
                        <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Client Overdue Balances</p>
                        <p class="text-2xl font-bold text-slate-800"><?= number_format($overdueAmount) ?> VND</p>
                        <p class="text-xs text-slate-500"><?= $overdueCount ?> pending accounts</p>
                    </div>
                </div>
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5 flex items-center gap-4">
                    <span class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center"><span class="material-symbols-outlined text-primary text-2xl">thumb_up</span></span>
                    <div>
                        <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Client Billing Satisfaction</p>
                        <p class="text-2xl font-bold text-slate-800">98.4%</p>
                        <p class="text-xs text-green-600">High Rating</p>
                    </div>
                </div>
            </div>

            <div class="mb-4 flex flex-wrap items-center gap-3">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Filters:</span>
                <form method="get" action="billing.php" class="flex flex-wrap items-center gap-2" id="billingFilters">
                    <select name="payment" onchange="this.form.submit()" class="rounded-lg border border-slate-200 text-sm py-2 px-3">
                        <option value="">Payment Status: All</option>
                        <option value="paid" <?= $filterPayment === 'paid' ? 'selected' : '' ?>>Paid</option>
                        <option value="unpaid" <?= $filterPayment === 'unpaid' ? 'selected' : '' ?>>Unpaid</option>
                    </select>
                    <select name="status" onchange="this.form.submit()" class="rounded-lg border border-slate-200 text-sm py-2 px-3">
                        <option value="">Appointment: All</option>
                        <option value="confirmed" <?= $filterStatus === 'confirmed' ? 'selected' : '' ?>>Confirmed</option>
                        <option value="pending" <?= $filterStatus === 'pending' ? 'selected' : '' ?>>Pending</option>
                        <option value="cancelled" <?= $filterStatus === 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                    </select>
                    <label class="text-sm text-slate-600">From</label>
                    <input type="date" name="from" value="<?= htmlspecialchars($dateFrom) ?>" class="rounded-lg border border-slate-200 text-sm py-2 px-3"/>
                    <label class="text-sm text-slate-600">To</label>
                    <input type="date" name="to" value="<?= htmlspecialchars($dateTo) ?>" class="rounded-lg border border-slate-200 text-sm py-2 px-3"/>
                    <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg text-sm font-semibold">Apply</button>
                    <a href="billing.php" class="px-4 py-2 rounded-lg border border-slate-200 text-sm font-semibold hover:bg-slate-50">Reset Filters</a>
                </form>
            </div>

            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-100">
                    <h3 class="font-bold text-slate-800">Client Invoices</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider text-xs">
                            <tr>
                                <th class="text-left px-6 py-3 font-semibold">Client Invoice ID</th>
                                <th class="text-left px-6 py-3 font-semibold">Customer Name</th>
                                <th class="text-left px-6 py-3 font-semibold">Service Provided Date</th>
                                <th class="text-left px-6 py-3 font-semibold">Service Details</th>
                                <th class="text-left px-6 py-3 font-semibold">Total Bill (VND)</th>
                                <th class="text-left px-6 py-3 font-semibold">Client Payment Mode</th>
                                <th class="text-left px-6 py-3 font-semibold">Payment Outcome</th>
                                <th class="text-left px-6 py-3 font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($paginated)): ?>
                            <tr><td colspan="8" class="px-6 py-12 text-slate-500 text-center">No billing records in this period.</td></tr>
                            <?php else: ?>
                            <?php foreach ($paginated as $b):
                                $st = $b['status'] ?? 'confirmed';
                                $stClass = $st === 'confirmed' ? 'bg-green-100 text-green-800' : ($st === 'pending' ? 'bg-amber-100 text-amber-800' : 'bg-slate-100 text-slate-600');
                                $payStatus = $b['payment_status'] ?? 'unpaid';
                                $payClass = $payStatus === 'paid' ? 'bg-green-100 text-green-800' : 'bg-amber-100 text-amber-800';
                                $payLabel = $payStatus === 'paid' ? 'PAID' : 'UNPAID';
                                $invId = '#INV-' . preg_replace('/[^0-9]/', '', $b['booking_code']);
                                if ($invId === '#INV-') $invId = '#INV-' . $b['id'];
                            ?>
                            <tr class="border-t border-slate-100 hover:bg-slate-50/50">
                                <td class="px-6 py-3 font-mono text-slate-600"><?= htmlspecialchars($invId) ?></td>
                                <td class="px-6 py-3">
                                    <span class="w-8 h-8 rounded-full bg-primary/10 inline-flex items-center justify-center text-primary text-xs font-bold mr-2"><?= mb_substr($b['customer_name'], 0, 1) ?></span>
                                    <?= htmlspecialchars($b['customer_name']) ?>
                                </td>
                                <td class="px-6 py-3 text-slate-600"><?= formatDate($b['appointment_date']) ?></td>
                                <td class="px-6 py-3 text-slate-600"><?= htmlspecialchars($b['service_name']) ?></td>
                                <td class="px-6 py-3 font-semibold text-slate-800"><?= htmlspecialchars($b['total_price']) ?></td>
                                <td class="px-6 py-3 text-slate-600"><?= $b['payment_method'] ? ucfirst(str_replace('_', ' ', $b['payment_method'])) : '—' ?></td>
                                <td class="px-6 py-3"><span class="px-2 py-0.5 rounded text-xs font-bold <?= $payClass ?>"><?= $payLabel ?></span></td>
                                <td class="px-6 py-3">
                                    <a href="customers.php?search=<?= urlencode($b['customer_phone']) ?>" class="text-primary font-semibold hover:underline text-xs">View Client History</a>
                                    <span class="mx-1">|</span>
                                    <button type="button" onclick="openStatementModal('<?= htmlspecialchars($b['booking_code'], ENT_QUOTES) ?>', '<?= htmlspecialchars($b['customer_name'], ENT_QUOTES) ?>', '<?= htmlspecialchars($b['service_name'], ENT_QUOTES) ?>', '<?= htmlspecialchars($b['total_price'], ENT_QUOTES) ?>', '<?= htmlspecialchars($b['appointment_date'], ENT_QUOTES) ?>')" class="text-primary font-semibold hover:underline text-xs">View Statement</button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="px-6 py-3 border-t border-slate-100 flex items-center justify-between text-sm text-slate-500">
                    <span>Showing <?= $totalBills ? $offset + 1 : 0 ?>–<?= min($offset + $perPage, $totalBills) ?> of <?= $totalBills ?> invoices</span>
                    <div class="flex items-center gap-2">
                        <a href="?page=<?= $page - 1 ?>&from=<?= urlencode($dateFrom) ?>&to=<?= urlencode($dateTo) ?>&status=<?= urlencode($filterStatus) ?>&payment=<?= urlencode($filterPayment) ?>" class="px-3 py-1 rounded <?= $page <= 1 ? 'text-slate-300 pointer-events-none' : 'text-primary hover:bg-primary/10' ?>">Previous</a>
                        <?php for ($i = 1; $i <= min($totalPages, 5); $i++): ?>
                        <a href="?page=<?= $i ?>&from=<?= urlencode($dateFrom) ?>&to=<?= urlencode($dateTo) ?>&status=<?= urlencode($filterStatus) ?>&payment=<?= urlencode($filterPayment) ?>" class="px-3 py-1 rounded <?= $i === $page ? 'bg-primary text-white' : 'text-slate-600 hover:bg-slate-100' ?>"><?= $i ?></a>
                        <?php endfor; ?>
                        <a href="?page=<?= $page + 1 ?>&from=<?= urlencode($dateFrom) ?>&to=<?= urlencode($dateTo) ?>&status=<?= urlencode($filterStatus) ?>&payment=<?= urlencode($filterPayment) ?>" class="px-3 py-1 rounded <?= $page >= $totalPages ? 'text-slate-300 pointer-events-none' : 'text-primary hover:bg-primary/10' ?>">Next</a>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Client Service Statement Modal (Screen 4.2) -->
    <div id="statementModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-xl shadow-xl w-full max-w-lg mx-4 max-h-[90vh] overflow-y-auto">
            <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between sticky top-0 bg-white">
                <div class="flex items-center gap-2">
                    <span class="text-xs font-bold text-slate-400 uppercase">Official Document</span>
                    <button onclick="printStatement()" class="p-1 rounded hover:bg-slate-100"><span class="material-symbols-outlined text-slate-500">print</span></button>
                </div>
                <button onclick="closeStatementModal()" class="text-slate-400 hover:text-slate-600"><span class="material-symbols-outlined">close</span></button>
            </div>
            <div class="p-6">
                <h2 class="text-xl font-bold text-slate-800 mb-1">Client Service Statement</h2>
                <p class="text-xs text-slate-500">Statement ID: <span id="stmtId">#STMT-</span></p>
                <p class="text-xs text-slate-500">Service Date: <span id="stmtDate">—</span></p>
                <div class="mt-4 p-4 bg-slate-50 rounded-lg">
                    <p class="text-xs text-slate-500">Client Profile</p>
                    <p class="font-bold text-slate-800" id="stmtClientName">—</p>
                    <p class="text-xs text-slate-500">Associated Booking: <span id="stmtBooking" class="font-mono">—</span></p>
                </div>
                <div class="mt-4 border border-slate-200 rounded-lg overflow-hidden">
                    <table class="w-full text-sm">
                        <thead class="bg-slate-50 text-slate-600 text-left">
                            <tr><th class="px-4 py-2 font-semibold">Service Description</th><th class="px-4 py-2 font-semibold">Unit Price</th><th class="px-4 py-2 font-semibold">Qty</th><th class="px-4 py-2 font-semibold">Total</th></tr>
                        </thead>
                        <tbody>
                            <tr><td class="px-4 py-3" id="stmtServiceDesc">—</td><td class="px-4 py-3" id="stmtUnitPrice">—</td><td class="px-4 py-3">1</td><td class="px-4 py-3 font-semibold" id="stmtTotal">—</td></tr>
                        </tbody>
                    </table>
                </div>
                <div class="mt-4 text-right">
                    <p class="text-sm text-slate-600">Subtotal: <span id="stmtSubtotal">—</span></p>
                    <p class="text-lg font-bold text-slate-800 mt-1">TOTAL AMOUNT DUE: <span id="stmtAmountDue">—</span></p>
                    <p class="text-xs text-slate-500">VND</p>
                </div>
                <div class="mt-6 grid grid-cols-1 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Accepted Payment Method</label>
                        <select id="stmtPaymentMethod" class="w-full rounded-lg border border-slate-200 py-2 px-3 text-sm">
                            <option value="cash">Cash</option>
                            <option value="bank_transfer">Bank Transfer</option>
                            <option value="credit_card">Credit Card</option>
                            <option value="momo">MoMo</option>
                            <option value="vnpay">VNPay</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-1">Payment Resolution Status</label>
                        <select id="stmtPaymentStatus" class="w-full rounded-lg border border-slate-200 py-2 px-3 text-sm">
                            <option value="unpaid">Unpaid</option>
                            <option value="paid">Paid</option>
                        </select>
                    </div>
                </div>
                <div class="mt-6 flex gap-3 justify-end">
                    <button type="button" onclick="closeStatementModal()" class="px-4 py-2 rounded-lg border border-slate-200 text-slate-600 font-semibold hover:bg-slate-50">Close Statement</button>
                    <button type="button" onclick="registerPayment()" class="px-4 py-2 rounded-lg bg-primary text-white font-semibold hover:bg-primary-dark">Register Payment</button>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" id="stmtBookingCode" value=""/>

    <script>
    function openStatementModal(bookingCode, clientName, serviceName, totalPrice, serviceDate) {
        document.getElementById('stmtBookingCode').value = bookingCode;
        document.getElementById('stmtId').textContent = '#STMT-' + bookingCode.replace(/[^0-9A-Za-z]/g, '');
        document.getElementById('stmtDate').textContent = serviceDate || '—';
        document.getElementById('stmtClientName').textContent = clientName || '—';
        document.getElementById('stmtBooking').textContent = '#' + bookingCode;
        document.getElementById('stmtServiceDesc').textContent = (serviceName || '—') + ' (session)';
        var num = (totalPrice || '').replace(/[^0-9]/g, '');
        var formatted = num ? parseInt(num, 10).toLocaleString('vi-VN') : '—';
        document.getElementById('stmtUnitPrice').textContent = formatted;
        document.getElementById('stmtTotal').textContent = totalPrice || '—';
        document.getElementById('stmtSubtotal').textContent = totalPrice || '—';
        document.getElementById('stmtAmountDue').textContent = totalPrice || '—';
        document.getElementById('statementModal').classList.remove('hidden');
        document.getElementById('statementModal').classList.add('flex');
    }
    function closeStatementModal() {
        document.getElementById('statementModal').classList.add('hidden');
        document.getElementById('statementModal').classList.remove('flex');
    }
    function printStatement() {
        window.print();
    }
    function registerPayment() {
        var bookingCode = document.getElementById('stmtBookingCode').value;
        var paymentMethod = document.getElementById('stmtPaymentMethod').value;
        var form = new FormData();
        form.append('action', 'confirm_payment');
        form.append('booking_code', bookingCode);
        form.append('payment_method', paymentMethod);
        form.append('payment_note', '');
        fetch('../backend/payments_api.php', { method: 'POST', body: form })
            .then(function(r) { return r.json(); })
            .then(function(data) {
                if (data.success) {
                    alert('Payment registered successfully.');
                    closeStatementModal();
                    window.location.reload();
                } else {
                    alert(data.message || 'Failed to register payment.');
                }
            })
            .catch(function() { alert('Network error.'); });
    }
    </script>
    <?php
    $bookingParam = trim($_GET['booking'] ?? '');
    if ($bookingParam !== '') {
        $match = null;
        foreach ($paginated as $b) {
            if (($b['booking_code'] ?? '') === $bookingParam) { $match = $b; break; }
        }
        if (!$match) {
            $stmtOne = $conn->prepare("SELECT booking_code, customer_name, service_name, total_price, appointment_date FROM appointments WHERE booking_code = ? LIMIT 1");
            $stmtOne->execute([$bookingParam]);
            $match = $stmtOne->fetch(PDO::FETCH_ASSOC);
        }
        if ($match):
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        openStatementModal('<?= htmlspecialchars($match['booking_code'], ENT_QUOTES) ?>', '<?= htmlspecialchars($match['customer_name'], ENT_QUOTES) ?>', '<?= htmlspecialchars($match['service_name'], ENT_QUOTES) ?>', '<?= htmlspecialchars($match['total_price'], ENT_QUOTES) ?>', '<?= htmlspecialchars(isset($match['appointment_date']) ? formatDate($match['appointment_date']) : '', ENT_QUOTES) ?>');
    });
    </script>
    <?php endif; } ?>
</body>
</html>
