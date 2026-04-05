<?php
require_once __DIR__ . '/../backend/db.php';
$currentUser = getCurrentUser();
if (!$currentUser || !in_array($currentUser['role'] ?? '', ['admin', 'receptionist', 'doctor'], true)) {
    header('Location: ../frontend/signin.php');
    exit;
}

$currentPage = 'calendar';

// Week navigation: ?week=YYYY-MM-DD (Monday of that week)
$weekParam = $_GET['week'] ?? '';
if ($weekParam && preg_match('/^\d{4}-\d{2}-\d{2}$/', $weekParam)) {
    $monday = new DateTime($weekParam);
} else {
    $monday = new DateTime('today');
    $dow = (int)$monday->format('w'); // 0=Sun, 1=Mon...
    if ($dow === 0) $dow = 7;
    $monday->modify('-' . ($dow - 1) . ' days');
}
$days = [];
for ($i = 0; $i < 7; $i++) {
    $d = clone $monday;
    $d->modify("+$i days");
    $days[] = $d;
}
$weekStart = $days[0]->format('Y-m-d');
$weekEnd = $days[6]->format('Y-m-d');

// Filters
$filterSpecialist = (int)($_GET['specialist'] ?? 0);
$filterStatus = trim($_GET['status'] ?? '');
$filterService = trim($_GET['service'] ?? '');

$stmt = $conn->query("SELECT id, name, title FROM specialists ORDER BY name");
$specialists = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt = $conn->query("SELECT DISTINCT service_name FROM appointments WHERE service_name != '' ORDER BY service_name");
$serviceNames = $stmt->fetchAll(PDO::FETCH_COLUMN);

// Appointments for the week
$stmt = $conn->prepare("
    SELECT id, booking_code, customer_name, customer_phone, service_id, service_name, specialist_id, specialist_name,
           appointment_date, appointment_time, total_price, status
    FROM appointments
    WHERE appointment_date BETWEEN ? AND ?
    ORDER BY appointment_date ASC, appointment_time ASC
");
$stmt->execute([$weekStart, $weekEnd]);
$allAppointments = $stmt->fetchAll(PDO::FETCH_ASSOC);
$appointments = array_values(array_filter($allAppointments, function ($a) use ($filterSpecialist, $filterStatus, $filterService) {
    if ($filterSpecialist && (int)$a['specialist_id'] !== $filterSpecialist) return false;
    if ($filterStatus !== '' && ($a['status'] ?? '') !== $filterStatus) return false;
    if ($filterService !== '' && ($a['service_name'] ?? '') !== $filterService) return false;
    return true;
}));

// Stats for today
$today = date('Y-m-d');
$stmt = $conn->prepare("SELECT COUNT(*) FROM appointments WHERE appointment_date = ? AND status != 'cancelled'");
$stmt->execute([$today]);
$todayCount = (int)$stmt->fetchColumn();
$stmt = $conn->prepare("SELECT total_price FROM appointments WHERE appointment_date = ? AND status != 'cancelled'");
$stmt->execute([$today]);
$prices = $stmt->fetchAll(PDO::FETCH_COLUMN);
$revenueToday = 0;
foreach ($prices as $p) {
    $revenueToday += (int)preg_replace('/[^0-9]/', '', $p ?? '');
}
$stmt = $conn->query("SELECT id FROM specialists");
$specialistCount = $stmt->rowCount();
$totalSlots = $specialistCount * 12;
$occupancyRate = $totalSlots > 0 ? min(100, (int)round(($todayCount / $totalSlots) * 100)) : 0;

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

$dayShort = ['MON', 'TUE', 'WED', 'THU', 'FRI', 'SAT', 'SUN'];
$appointmentsByDay = [];
foreach ($days as $i => $d) {
    $key = $d->format('Y-m-d');
    $appointmentsByDay[$key] = array_filter($appointments, function ($a) use ($key) { return ($a['appointment_date'] ?? '') === $key; });
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Calendar | Elysian Management Hub</title>
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
            <div class="flex-1 max-w-md">
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                    <input type="text" placeholder="Search patient, ID, or phone number..." class="w-full pl-10 pr-4 py-2 rounded-lg border border-slate-200 text-sm focus:ring-2 focus:ring-primary/20 focus:border-primary outline-none"/>
                </div>
            </div>
            <div class="flex items-center gap-4">
                <span class="text-sm font-semibold text-slate-600">Admin View</span>
                <span class="material-symbols-outlined text-slate-500 cursor-pointer">notifications</span>
                <a href="../backend/logout.php" class="text-sm text-slate-500 hover:text-primary">Sign Out</a>
                <div class="w-9 h-9 rounded-full bg-primary/20 flex items-center justify-center"><span class="material-symbols-outlined text-primary">person</span></div>
            </div>
        </header>

        <main class="flex-1 p-8 overflow-auto">
            <div class="mb-6 flex flex-wrap items-center justify-between gap-4">
                <div>
                    <h2 class="text-2xl font-bold text-slate-800">Calendar</h2>
                    <p class="text-slate-500 text-sm">Week of <?= $days[0]->format('M j') ?> – <?= $days[6]->format('M j, Y') ?></p>
                </div>
                <div class="flex items-center gap-2">
                    <a href="create_appointment.php" class="px-4 py-2 rounded-lg bg-primary text-white font-semibold text-sm hover:bg-primary-dark inline-flex items-center gap-2">
                        <span class="material-symbols-outlined text-lg">add</span> Tạo lịch hẹn
                    </a>
                    <a href="?week=<?= (clone $monday)->modify('-7 days')->format('Y-m-d') ?>&specialist=<?= $filterSpecialist ?>&status=<?= urlencode($filterStatus) ?>&service=<?= urlencode($filterService) ?>" class="px-3 py-2 rounded-lg border border-slate-200 text-sm font-medium hover:bg-slate-50">Previous</a>
                    <a href="?specialist=<?= $filterSpecialist ?>&status=<?= urlencode($filterStatus) ?>&service=<?= urlencode($filterService) ?>" class="px-3 py-2 rounded-lg bg-slate-100 text-slate-700 text-sm font-medium">This week</a>
                    <a href="?week=<?= (clone $monday)->modify('+7 days')->format('Y-m-d') ?>&specialist=<?= $filterSpecialist ?>&status=<?= urlencode($filterStatus) ?>&service=<?= urlencode($filterService) ?>" class="px-3 py-2 rounded-lg border border-slate-200 text-sm font-medium hover:bg-slate-50">Next</a>
                </div>
            </div>

            <!-- Overview stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5">
                    <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-1">TOTAL BOOKINGS TODAY</p>
                    <p class="text-2xl font-black text-slate-800"><?= $todayCount ?> <span class="text-base font-semibold text-slate-500">Appointments</span></p>
                </div>
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5">
                    <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-1">SPECIALIST OCCUPANCY RATE</p>
                    <p class="text-2xl font-black text-slate-800"><?= $occupancyRate ?>% <span class="text-base font-semibold text-slate-500">Capacity</span></p>
                </div>
                <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5">
                    <p class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-1">REVENUE FORECAST (TODAY)</p>
                    <p class="text-2xl font-black text-slate-800"><?= number_format($revenueToday) ?> VND</p>
                </div>
            </div>

            <!-- Filters -->
            <form method="get" action="calendar.php" class="mb-6 flex flex-wrap items-center gap-3">
                <input type="hidden" name="week" value="<?= htmlspecialchars($weekStart) ?>"/>
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Filters:</span>
                <select name="specialist" onchange="this.form.submit()" class="rounded-lg border border-slate-200 text-sm py-2 px-3">
                    <option value="">All Specialists</option>
                    <?php foreach ($specialists as $s): ?>
                    <option value="<?= (int)$s['id'] ?>" <?= $filterSpecialist === (int)$s['id'] ? 'selected' : '' ?>><?= htmlspecialchars($s['name']) ?></option>
                    <?php endforeach; ?>
                </select>
                <select name="status" onchange="this.form.submit()" class="rounded-lg border border-slate-200 text-sm py-2 px-3">
                    <option value="">All Status</option>
                    <option value="confirmed" <?= $filterStatus === 'confirmed' ? 'selected' : '' ?>>Confirmed</option>
                    <option value="pending" <?= $filterStatus === 'pending' ? 'selected' : '' ?>>Pending</option>
                    <option value="cancelled" <?= $filterStatus === 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                </select>
                <select name="service" onchange="this.form.submit()" class="rounded-lg border border-slate-200 text-sm py-2 px-3">
                    <option value="">All Services</option>
                    <?php foreach ($serviceNames as $sn): ?>
                    <option value="<?= htmlspecialchars($sn) ?>" <?= $filterService === $sn ? 'selected' : '' ?>><?= htmlspecialchars($sn) ?></option>
                    <?php endforeach; ?>
                </select>
                <a href="calendar.php" class="text-sm text-primary font-semibold hover:underline">Clear Filters</a>
            </form>

            <!-- Week calendar grid -->
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm border-collapse">
                        <thead>
                            <tr class="bg-slate-50">
                                <th class="w-20 py-3 text-left px-3 text-xs font-bold text-slate-500 uppercase">Time</th>
                                <?php foreach ($days as $i => $d): ?>
                                <th class="min-w-[140px] py-3 text-center text-xs font-bold text-slate-600">
                                    <?= $dayShort[$i] ?> <?= $d->format('j') ?>
                                </th>
                                <?php endforeach; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $hours = [8, 10, 12, 14, 16, 18];
                            foreach ($hours as $hour):
                                $hourEnd = $hour + 2;
                            ?>
                            <tr class="border-t border-slate-100">
                                <td class="py-2 px-3 text-slate-500 text-xs font-medium align-top"><?= $hour ?>:00</td>
                                <?php foreach ($days as $d):
                                    $dateKey = $d->format('Y-m-d');
                                    $dayAppointments = array_filter($appointmentsByDay[$dateKey] ?? [], function ($a) use ($hour, $hourEnd) {
                                        $t = $a['appointment_time'] ?? '';
                                        if (preg_match('/^(\d{2}):/', $t, $m)) {
                                            $h = (int)$m[1];
                                            return $h >= $hour && $h < $hourEnd;
                                        }
                                        return false;
                                    });
                                ?>
                                <td class="min-w-[140px] align-top p-1 vertical-align-top">
                                    <?php foreach ($dayAppointments as $apt):
                                        $st = $apt['status'] ?? 'confirmed';
                                        $bg = $st === 'cancelled' ? 'bg-slate-100' : ($st === 'pending' ? 'bg-amber-50 border-amber-200' : 'bg-primary/5 border-primary/20');
                                        $canEdit = $st !== 'cancelled';
                                    ?>
                                    <div class="mb-1 rounded-lg border p-2 <?= $bg ?> text-xs group">
                                        <p class="font-semibold text-slate-800 truncate"><?= htmlspecialchars($apt['customer_name']) ?></p>
                                        <p class="text-slate-600 truncate"><?= htmlspecialchars($apt['service_name']) ?></p>
                                        <p class="text-slate-500 mt-0.5"><?= formatTime($apt['appointment_time']) ?></p>
                                        <?php if ($canEdit): ?>
                                        <a href="edit_appointment.php?id=<?= (int)$apt['id'] ?>" class="mt-1 inline-block text-primary font-medium hover:underline">Sửa</a>
                                        <?php endif; ?>
                                    </div>
                                    <?php endforeach; ?>
                                </td>
                                <?php endforeach; ?>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- List view for small screens / backup -->
            <div class="mt-6 bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-100">
                    <h3 class="font-bold text-slate-800">Appointments this week</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead class="bg-slate-50 text-slate-500 uppercase tracking-wider text-xs">
                            <tr>
                                <th class="text-left px-6 py-3 font-semibold">Date</th>
                                <th class="text-left px-6 py-3 font-semibold">Time</th>
                                <th class="text-left px-6 py-3 font-semibold">Patient</th>
                                <th class="text-left px-6 py-3 font-semibold">Service</th>
                                <th class="text-left px-6 py-3 font-semibold">Specialist</th>
                                <th class="text-left px-6 py-3 font-semibold">Status</th>
                                <th class="text-left px-6 py-3 font-semibold w-28">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($appointments)): ?>
                            <tr><td colspan="7" class="px-6 py-8 text-slate-500 text-center">No appointments in this week with current filters.</td></tr>
                            <?php else: ?>
                            <?php foreach ($appointments as $apt):
                                $st = $apt['status'] ?? 'confirmed';
                                $stClass = $st === 'confirmed' ? 'bg-green-100 text-green-800' : ($st === 'pending' ? 'bg-amber-100 text-amber-800' : 'bg-slate-100 text-slate-600');
                                $canEdit = $st !== 'cancelled';
                            ?>
                            <tr class="border-t border-slate-100 hover:bg-slate-50/50">
                                <td class="px-6 py-3 text-slate-600"><?= date('D M j', strtotime($apt['appointment_date'])) ?></td>
                                <td class="px-6 py-3 text-slate-600"><?= formatTime($apt['appointment_time']) ?></td>
                                <td class="px-6 py-3 font-medium text-slate-800"><?= htmlspecialchars($apt['customer_name']) ?></td>
                                <td class="px-6 py-3"><?= htmlspecialchars($apt['service_name']) ?></td>
                                <td class="px-6 py-3 text-slate-600"><?= htmlspecialchars($apt['specialist_name']) ?></td>
                                <td class="px-6 py-3"><span class="px-2 py-0.5 rounded text-xs font-bold <?= $stClass ?>"><?= ucfirst($st) ?></span></td>
                                <td class="px-6 py-3">
                                    <?php if ($canEdit): ?>
                                    <a href="edit_appointment.php?id=<?= (int)$apt['id'] ?>" class="text-primary font-medium text-sm hover:underline inline-flex items-center gap-1">Sửa</a>
                                    <span class="text-slate-300 mx-1">|</span>
                                    <a href="edit_appointment.php?id=<?= (int)$apt['id'] ?>#cancel" class="text-red-600 font-medium text-sm hover:underline inline-flex items-center gap-1">Hủy lịch</a>
                                    <?php else: ?>
                                    <span class="text-slate-400 text-sm">—</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
