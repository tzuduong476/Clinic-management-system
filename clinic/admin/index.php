<?php
require_once __DIR__ . '/../backend/db.php';
$currentUser = getCurrentUser();
if (!$currentUser || !in_array($currentUser['role'] ?? '', ['admin', 'receptionist', 'doctor'], true)) {
    header('Location: ../frontend/signin.php');
    exit;
}

$currentPage = 'dashboard';
$today = date('Y-m-d');
$stmt = $conn->prepare("
    SELECT id, booking_code, customer_name, service_name, specialist_name, appointment_time, status, payment_status
    FROM appointments WHERE appointment_date = ? AND status != 'cancelled'
    ORDER BY appointment_time ASC
");
$stmt->execute([$today]);
$appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
$pendingCount = 0;
foreach ($appointments as $a) {
    if (($a['status'] ?? '') === 'pending') $pendingCount++;
}
$stmt = $conn->prepare("SELECT total_price FROM appointments WHERE appointment_date = ? AND status != 'cancelled' AND payment_status = 'paid'");
$stmt->execute([$today]);
$prices = $stmt->fetchAll(PDO::FETCH_COLUMN);
$revenue = 0;
foreach ($prices as $p) {
    $num = preg_replace('/[^0-9]/', '', $p);
    if ($num !== '') $revenue += (int)$num;
}
// Pending amount today (unpaid) for receptionist Daily Payments Summary
$stmt = $conn->prepare("SELECT total_price FROM appointments WHERE appointment_date = ? AND status != 'cancelled' AND (payment_status = 'unpaid' OR payment_status IS NULL)");
$stmt->execute([$today]);
$pendingPrices = $stmt->fetchAll(PDO::FETCH_COLUMN);
$pendingTodayAmount = 0;
foreach ($pendingPrices as $p) {
    $num = preg_replace('/[^0-9]/', '', $p);
    if ($num !== '') $pendingTodayAmount += (int)$num;
}
// Recent activity: last payments and appointments (for receptionist)
$stmt = $conn->query("
    SELECT a.booking_code, a.customer_name, a.payment_status, a.confirmed_at, a.created_at, a.service_name
    FROM appointments a
    WHERE a.status != 'cancelled'
    ORDER BY COALESCE(a.confirmed_at, a.created_at) DESC
    LIMIT 8
");
$recentActivities = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt = $conn->query("SELECT id, name, title FROM specialists ORDER BY id");
$specialists = $stmt->fetchAll(PDO::FETCH_ASSOC);
$specialistCount = count($specialists);
$slotsPerSpecialist = 12;
$totalSlots = $specialistCount * $slotsPerSpecialist;
$occupancyRate = $totalSlots > 0 ? min(100, (int)round((count($appointments) / $totalSlots) * 100)) : 0;

// Customers with last_visit & total_spent (same logic as customers.php)
$stmt = $conn->query("SELECT Customer_ID, Name, Phone, Email, Skin_type, Created_at FROM `Customer` ORDER BY Created_at DESC LIMIT 10");
$recentCustomers = $stmt->fetchAll(PDO::FETCH_ASSOC);
$appointmentsByCustomer = [];
$stmt = $conn->query("SELECT customer_name, customer_phone, appointment_date, total_price FROM appointments WHERE status != 'cancelled'");
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $key = $row['customer_name'] . '|' . $row['customer_phone'];
    if (!isset($appointmentsByCustomer[$key])) {
        $appointmentsByCustomer[$key] = ['last_visit' => null, 'total_spent' => 0, 'visits' => 0];
    }
    $d = $row['appointment_date'];
    if (!$appointmentsByCustomer[$key]['last_visit'] || $d > $appointmentsByCustomer[$key]['last_visit']) {
        $appointmentsByCustomer[$key]['last_visit'] = $d;
    }
    $appointmentsByCustomer[$key]['visits']++;
    $num = preg_replace('/[^0-9]/', '', $row['total_price']);
    if ($num !== '') $appointmentsByCustomer[$key]['total_spent'] += (int)$num;
}
foreach ($recentCustomers as &$c) {
    $key1 = $c['Name'] . '|' . ($c['Phone'] ?? '');
    $key2 = $c['Name'] . '|';
    $key3 = '|' . ($c['Phone'] ?? '');
    $stats = $appointmentsByCustomer[$key1] ?? $appointmentsByCustomer[$key2] ?? $appointmentsByCustomer[$key3] ?? ['last_visit' => null, 'total_spent' => 0, 'visits' => 0];
    $c['last_visit'] = $stats['last_visit'];
    $c['total_spent'] = $stats['total_spent'];
    $c['visit_count'] = $stats['visits'];
}
unset($c);
$totalCustomers = (int)$conn->query("SELECT COUNT(*) FROM `Customer`")->fetchColumn();

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
function formatDate($d) {
    if (!$d) return '—';
    $t = strtotime($d);
    return date('M j, Y', $t);
}
function formatMoney($v) {
    return number_format($v) . ' đ';
}

$dayNames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
$monthNames = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
$dayNum = (int)date('j');
$ord = $dayNum === 1 || $dayNum === 21 || $dayNum === 31 ? 'st' : ($dayNum === 2 || $dayNum === 22 ? 'nd' : ($dayNum === 3 || $dayNum === 23 ? 'rd' : 'th'));
$reportDate = $dayNames[(int)date('w')] . ', ' . $monthNames[(int)date('n')-1] . ' ' . $dayNum . $ord;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Elysian Management Hub | Admin</title>
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

    <!-- Main -->
    <div class="flex-1 flex flex-col min-w-0">
        <!-- Header -->
        <header class="h-16 bg-white border-b border-slate-200 flex items-center justify-between px-8 shrink-0">
            <div class="flex-1 max-w-md">
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                    <input type="text" placeholder="<?= ($currentUser['role'] ?? '') === 'receptionist' ? 'Search patients or billing...' : 'Global search patient or record...' ?>" class="w-full pl-10 pr-4 py-2 rounded-lg border border-slate-200 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none"/>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <span class="text-sm font-semibold text-slate-600"><?= ($currentUser['role'] ?? '') === 'receptionist' ? 'Receptionist Role' : (($currentUser['role'] ?? '') === 'doctor' ? 'Doctor' : 'Admin Role') ?></span>
                <span class="material-symbols-outlined text-slate-500 cursor-pointer">notifications</span>
                <a href="../backend/logout.php" class="text-sm text-slate-500 hover:text-primary">Sign Out</a>
                <?php if (($currentUser['role'] ?? '') === 'receptionist'): ?>
                <a href="customers.php" class="px-3 py-2 rounded-lg border border-primary text-primary font-semibold text-sm hover:bg-primary/5">+ Add New Customer</a>
                <a href="../frontend/booking.php" target="_blank" class="px-3 py-2 rounded-lg bg-primary text-white font-semibold text-sm hover:bg-primary-dark">New Booking</a>
                <?php endif; ?>
                <div class="w-9 h-9 rounded-full bg-primary/20 flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary">person</span>
                </div>
            </div>
        </header>

        <main class="flex-1 p-8 overflow-auto">
            <div class="mb-6">
                <p class="text-sm text-slate-500">Dashboard &gt; Overview</p>
                <h2 class="text-2xl font-bold text-slate-800 mt-1">Clinical Overview</h2>
                <p class="text-slate-500 text-sm">Status report for <?= htmlspecialchars($reportDate) ?></p>
            </div>

            <?php $isReceptionist = ($currentUser['role'] ?? '') === 'receptionist'; ?>

            <?php if (!$isReceptionist): ?>
            <!-- Overview stats (Admin) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5">
                    <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-1">TOTAL BOOKINGS TODAY</p>
                    <p class="text-2xl font-black text-slate-800"><?= count($appointments) ?> <span class="text-base font-semibold text-slate-500">Appointments</span></p>
                </div>
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5">
                    <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-1">SPECIALIST OCCUPANCY RATE</p>
                    <p class="text-2xl font-black text-slate-800"><?= $occupancyRate ?>% <span class="text-base font-semibold text-slate-500">Capacity</span></p>
                </div>
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5">
                    <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-1">REVENUE FORECAST (TODAY)</p>
                    <p class="text-2xl font-black text-slate-800"><?= number_format($revenue) ?> VND</p>
                </div>
            </div>
            <div class="flex flex-wrap items-center justify-end gap-3 mb-6">
                <button type="button" class="px-4 py-2 rounded-lg border border-primary text-primary font-semibold text-sm hover:bg-primary/5">Export PDF</button>
                <a href="../frontend/booking.php" target="_blank" class="px-4 py-2 rounded-lg bg-primary text-white font-semibold text-sm hover:bg-primary-dark">New Booking</a>
            </div>
            <?php endif; ?>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Today's Appointments -->
                <div class="lg:col-span-2 bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                        <h3 class="font-bold text-slate-800">Today's Appointments</h3>
                        <span class="px-3 py-1 rounded-full bg-primary/10 text-primary text-xs font-bold"><?= $pendingCount ?> Pending</span>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider text-xs">
                                <tr>
                                    <th class="text-left px-6 py-3 font-semibold">Patient</th>
                                    <th class="text-left px-6 py-3 font-semibold">Time</th>
                                    <th class="text-left px-6 py-3 font-semibold">Treatment</th>
                                    <?php if ($isReceptionist): ?><th class="text-left px-6 py-3 font-semibold">Payment</th><?php endif; ?>
                                    <th class="text-left px-6 py-3 font-semibold">Specialist</th>
                                    <th class="text-left px-6 py-3 font-semibold">Status</th>
                                    <?php if ($isReceptionist): ?><th class="text-left px-6 py-3 font-semibold">Action</th><?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (empty($appointments)): ?>
                                <tr><td colspan="<?= $isReceptionist ? 7 : 5 ?>" class="px-6 py-8 text-slate-500 text-center">No appointments today.</td></tr>
                                <?php else: ?>
                                <?php foreach ($appointments as $apt): 
                                    $st = $apt['status'] ?? 'confirmed';
                                    $stClass = $st === 'confirmed' ? 'bg-green-100 text-green-800' : ($st === 'pending' ? 'bg-amber-100 text-amber-800' : 'bg-slate-100 text-slate-600');
                                    $paySt = $apt['payment_status'] ?? 'unpaid';
                                    $payClass = $paySt === 'paid' ? 'bg-green-100 text-green-800' : 'bg-amber-100 text-amber-800';
                                    $payLabel = $paySt === 'paid' ? 'PAID' : 'UNPAID';
                                ?>
                                <tr class="border-t border-slate-100 hover:bg-slate-50/50">
                                    <td class="px-6 py-3 font-medium text-slate-800"><?= htmlspecialchars($apt['customer_name']) ?></td>
                                    <td class="px-6 py-3 text-slate-600"><?= htmlspecialchars(formatTime($apt['appointment_time'])) ?></td>
                                    <td class="px-6 py-3"><a href="../frontend/service-detail.php" class="text-primary hover:underline font-medium"><?= htmlspecialchars($apt['service_name']) ?></a></td>
                                    <?php if ($isReceptionist): ?>
                                    <td class="px-6 py-3"><span class="px-2 py-0.5 rounded text-xs font-bold <?= $payClass ?>"><?= $payLabel ?></span></td>
                                    <?php endif; ?>
                                    <td class="px-6 py-3 flex items-center gap-2">
                                        <span class="w-7 h-7 rounded-full bg-primary/10 flex items-center justify-center text-primary text-xs font-bold"><?= mb_substr($apt['specialist_name'], 0, 1) ?></span>
                                        <?= htmlspecialchars($apt['specialist_name']) ?>
                                    </td>
                                    <td class="px-6 py-3"><span class="px-2 py-0.5 rounded text-xs font-bold <?= $stClass ?>"><?= htmlspecialchars(ucfirst($st)) ?></span></td>
                                    <?php if ($isReceptionist): ?>
                                    <td class="px-6 py-3"><a href="billing.php?booking=<?= urlencode($apt['booking_code']) ?>" class="px-3 py-1.5 bg-primary text-white rounded-lg text-xs font-semibold hover:bg-primary-dark">CHECK-IN</a></td>
                                    <?php endif; ?>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="px-6 py-3 border-t border-slate-100">
                        <a href="calendar.php" class="text-primary text-sm font-semibold hover:underline">View Full Schedule</a>
                    </div>
                </div>

                <!-- Right column -->
                <div class="space-y-6">
                    <?php if ($isReceptionist): ?>
                    <!-- Customer Queue Status (Receptionist) -->
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5">
                        <h3 class="font-bold text-slate-800 mb-2">Customer Queue Status</h3>
                        <p class="text-2xl font-black text-slate-800">0 <span class="text-sm font-semibold text-slate-500">WAITING IN LOBBY</span></p>
                        <p class="text-xs text-slate-500 mt-1">AVG WAIT —</p>
                        <p class="text-xs text-slate-500">CAPACITY —</p>
                    </div>
                    <!-- Recent Activity (Receptionist - from DB) -->
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
                        <h3 class="font-bold text-slate-800 mb-4">Recent Activity</h3>
                        <ul class="space-y-3 text-sm">
                            <?php
                            foreach (array_slice($recentActivities, 0, 5) as $act):
                                $isPaid = ($act['payment_status'] ?? '') === 'paid';
                                $icon = $isPaid ? 'check_circle' : 'event';
                                $iconCls = $isPaid ? 'text-green-500' : 'text-slate-400';
                                $label = $isPaid ? 'Payment Received for ' . htmlspecialchars($act['customer_name']) : 'Booking: ' . htmlspecialchars($act['customer_name']) . ' – ' . htmlspecialchars($act['service_name']);
                                $when = $act['confirmed_at'] ?? $act['created_at'];
                                $whenStr = $when ? date('M j, g:i A', strtotime($when)) : '—';
                            ?>
                            <li class="flex items-start gap-2">
                                <span class="material-symbols-outlined <?= $iconCls ?> text-lg shrink-0"><?= $icon ?></span>
                                <span><?= $label ?> <span class="text-slate-400"><?= $whenStr ?></span></span>
                            </li>
                            <?php endforeach; ?>
                            <?php if (empty($recentActivities)): ?>
                            <li class="text-slate-500">No recent activity.</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <!-- Daily Payments Summary (Receptionist) -->
                    <div class="bg-primary rounded-xl shadow-lg p-6 text-white">
                        <h3 class="font-bold opacity-90 mb-2">Daily Payments Summary</h3>
                        <p class="text-2xl font-black"><?= number_format($revenue) ?> ₫</p>
                        <p class="text-sm opacity-90 mt-1">TOTAL COLLECTED</p>
                        <p class="text-lg font-bold mt-3"><?= number_format($pendingTodayAmount) ?> ₫</p>
                        <p class="text-sm opacity-90">PENDING</p>
                        <p class="text-xs mt-2 opacity-80">Today</p>
                    </div>
                    <?php else: ?>
                    <!-- Clinic Capacity (Admin) -->
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
                        <h3 class="font-bold text-slate-800 mb-4">Clinic Capacity</h3>
                        <p class="text-3xl font-black text-slate-800">72% <span class="text-lg font-semibold text-slate-500">FACILITY LOAD</span></p>
                        <p class="text-sm text-slate-500 mt-2">ACTIVE BEDS 9/12</p>
                        <p class="text-sm text-slate-500">ON-CALL 4</p>
                    </div>
                    <!-- Recent Activity (Admin) -->
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
                        <h3 class="font-bold text-slate-800 mb-4">Recent Activity</h3>
                        <ul class="space-y-3 text-sm">
                            <li class="flex items-start gap-2">
                                <span class="material-symbols-outlined text-slate-400 text-lg shrink-0">description</span>
                                <span>New Scan Uploaded for Michael Realman <span class="text-slate-400">2 min ago</span></span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="material-symbols-outlined text-green-500 text-lg shrink-0">check_circle</span>
                                <span>Booking Confirmed: Janet Planet <span class="text-slate-400">15 min ago</span></span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="material-symbols-outlined text-amber-500 text-lg shrink-0">warning</span>
                                <span>Inventory Low: Hyaluronic Serum <span class="text-slate-400">1 hour ago</span></span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="material-symbols-outlined text-slate-400 text-lg shrink-0">description</span>
                                <span>Report Generated: Q3 Efficiency <span class="text-slate-400">3 hours ago</span></span>
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="material-symbols-outlined text-slate-400 text-lg shrink-0">description</span>
                                <span>Consultation Notes by Dr. Aris</span>
                            </li>
                        </ul>
                        <a href="#" class="text-primary text-xs font-semibold mt-2 inline-block">See all logs</a>
                    </div>
                    <?php endif; ?>

                    <!-- Specialist Availability (both) -->
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-6">
                        <h3 class="font-bold text-slate-800 mb-4">Specialist Availability</h3>
                        <div class="flex items-center gap-4 mb-4 text-xs">
                            <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-green-500"></span> AVAILABLE</span>
                            <span class="flex items-center gap-1"><span class="w-2 h-2 rounded-full bg-amber-500"></span> IN TREATMENT</span>
                        </div>
                        <div class="flex flex-wrap gap-4">
                            <?php foreach ($specialists as $i => $s): ?>
                            <div class="flex items-center gap-3 px-4 py-2 rounded-lg border border-slate-100">
                                <span class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center text-primary font-bold text-sm"><?= mb_substr($s['name'], 0, 1) ?></span>
                                <div>
                                    <p class="font-semibold text-slate-800 text-sm"><?= htmlspecialchars($s['name']) ?></p>
                                    <p class="text-xs <?= $i === 2 ? 'text-amber-600' : 'text-green-600' ?>"><?= $i === 2 ? 'SURGERY' : 'READY' ?></p>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <?php if (!$isReceptionist): ?>
            <!-- Daily Revenue (Admin) -->
            <div class="mt-6 grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="bg-primary rounded-xl shadow-lg p-6 text-white">
                    <h3 class="font-bold opacity-90 mb-1">Daily Revenue</h3>
                    <p class="text-3xl font-black"><?= number_format($revenue) ?> đ</p>
                    <p class="text-sm opacity-80 mt-1">+12.5% vs yesterday</p>
                </div>
                <div class="lg:col-span-2"></div>
            </div>
            <?php endif; ?>

            <!-- Hồ sơ bệnh nhân (Patient Profiles) - giao diện như ảnh Customer Management -->
            <div class="mt-8 bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                    <h3 class="font-bold text-slate-800">Hồ sơ bệnh nhân (Customer Management)</h3>
                    <a href="customers.php" class="text-primary text-sm font-semibold hover:underline">Xem tất cả (<?= $totalCustomers ?> khách hàng)</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider text-xs">
                            <tr>
                                <th class="text-left px-6 py-3 font-semibold">PID</th>
                                <th class="text-left px-6 py-3 font-semibold">Full Name</th>
                                <th class="text-left px-6 py-3 font-semibold">Phone Number</th>
                                <th class="text-left px-6 py-3 font-semibold">Skin Type</th>
                                <th class="text-left px-6 py-3 font-semibold">Last Visit</th>
                                <th class="text-left px-6 py-3 font-semibold">Total Spent</th>
                                <th class="text-left px-6 py-3 font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($recentCustomers)): ?>
                            <tr><td colspan="7" class="px-6 py-8 text-slate-500 text-center">Chưa có hồ sơ bệnh nhân.</td></tr>
                            <?php else: ?>
                            <?php foreach ($recentCustomers as $c): 
                                $st = trim($c['Skin_type'] ?? '');
                                $stClass = $st === 'Oily' || $st === 'OILY' ? 'bg-amber-100 text-amber-800' : ($st === 'Dry' || $st === 'DRY' ? 'bg-blue-100 text-blue-800' : ($st === 'Sensitive' || $st === 'SENSITIVE' ? 'bg-pink-100 text-pink-800' : ($st === 'Combination' || $st === 'COMBINATION' ? 'bg-green-100 text-green-800' : 'bg-slate-100 text-slate-700')));
                            ?>
                            <tr class="border-t border-slate-100 hover:bg-slate-50/50">
                                <td class="px-6 py-3 font-mono text-slate-600">#ELC<?= str_pad((string)$c['Customer_ID'], 5, '0', STR_PAD_LEFT) ?></td>
                                <td class="px-6 py-3">
                                    <span class="w-8 h-8 rounded-full bg-primary/10 inline-flex items-center justify-center text-primary text-xs font-bold mr-2"><?= mb_substr($c['Name'], 0, 1) ?></span>
                                    <?= htmlspecialchars($c['Name']) ?>
                                </td>
                                <td class="px-6 py-3 text-slate-600"><?= htmlspecialchars($c['Phone'] ?: ('(' . ($c['Email'] ?? '') . ')')) ?></td>
                                <td class="px-6 py-3"><span class="px-2 py-0.5 rounded text-xs font-bold <?= $stClass ?>"><?= $st ? htmlspecialchars($st) : '—' ?></span></td>
                                <td class="px-6 py-3 text-slate-600"><?= formatDate($c['last_visit']) ?></td>
                                <td class="px-6 py-3 font-semibold text-slate-800"><?= formatMoney($c['total_spent']) ?></td>
                                <td class="px-6 py-3"><a href="customers.php?pid=<?= (int)$c['Customer_ID'] ?>" class="text-primary font-semibold hover:underline inline-flex items-center gap-1">View Details <span class="material-symbols-outlined text-lg">arrow_forward</span></a></td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <div class="px-6 py-3 border-t border-slate-100 text-sm text-slate-500">
                    Showing <?= count($recentCustomers) ?> of <?= $totalCustomers ?> customers
                </div>
            </div>
        </main>
    </div>

</body>
</html>
