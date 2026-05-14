<?php
require_once __DIR__ . '/../backend/db.php';
$currentUser = getCurrentUser();
if (!$currentUser || !in_array($currentUser['role'] ?? '', ['admin', 'receptionist', 'doctor'], true)) {
    header('Location: ../frontend/signin.php');
    exit;
}
$currentPage = 'customers';
$canEditProfile = in_array($currentUser['role'] ?? '', ['doctor', 'admin'], true);
$canCreatePlan = (($currentUser['role'] ?? '') === 'doctor');

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

// Appointments for this customer (match by name+phone or email OR by plan_session_id)
$stmt = $conn->prepare("
    SELECT id, booking_code, service_name, specialist_name, appointment_date, appointment_time, total_price, status, payment_status, appointment_type, plan_session_id
    FROM appointments
    WHERE (customer_name = ? AND (customer_phone = ? OR ? = '')) 
       OR customer_phone = ?
       OR (plan_session_id IS NOT NULL AND ? != '')
    ORDER BY appointment_date DESC, appointment_time DESC
    LIMIT 50
");
$stmt->execute([$customer['Name'], $customer['Phone'] ?? '', $customer['Phone'] ?? '', $customer['Phone'] ?? '', $cid]);
$appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Also match by name only for alternate spellings
if (empty($appointments)) {
    $stmt = $conn->prepare("
        SELECT id, booking_code, service_name, specialist_name, appointment_date, appointment_time, total_price, status, payment_status, appointment_type, plan_session_id
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
$completedPlans = [];
$planSessions = [];
try {
    $stmt = $conn->prepare("SELECT id FROM treatment_plans WHERE customer_id = ? ORDER BY id DESC");
    $stmt->execute([$cid]);
    $allPlanIds = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    foreach ($allPlanIds as $existingPlanId) {
        syncTreatmentPlanStatus($conn, (int)$existingPlanId);
    }

    $stmt = $conn->prepare("SELECT id, title, specialist_id, overall_goal, start_date, status FROM treatment_plans WHERE customer_id = ? ORDER BY id DESC");
    $stmt->execute([$cid]);
    $allPlans = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($allPlans as $p) {
        if ($p['status'] === 'active' && !$activePlan) {
            $activePlan = $p;
        } elseif ($p['status'] === 'completed') {
            $completedPlans[] = $p;
        }
    }

    if ($activePlan) {
        try {
            $stmt = $conn->prepare("
                SELECT tps.*, 
                       tss.scheduled_date, tss.scheduled_time, tss.status as schedule_status, tss.appointment_id,
                       ap.booking_code
                FROM treatment_plan_sessions tps
                LEFT JOIN treatment_session_schedules tss ON tps.id = tss.plan_session_id
                LEFT JOIN appointments ap ON tss.appointment_id = ap.id
                WHERE tps.plan_id = ?
                ORDER BY tps.session_number
            ");
            $stmt->execute([$activePlan['id']]);
            $planSessions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Throwable $e) {
            $stmt = $conn->prepare("SELECT id, session_number, service_name, focus_notes, completed_at FROM treatment_plan_sessions WHERE plan_id = ? ORDER BY session_number");
            $stmt->execute([$activePlan['id']]);
            $planSessions = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach ($planSessions as &$sessionItem) {
                $sessionItem['session_image_path'] = null;
                $sessionItem['scheduled_date'] = null;
                $sessionItem['scheduled_time'] = null;
                $sessionItem['schedule_status'] = null;
                $sessionItem['booking_code'] = null;
            }
            unset($sessionItem);
        }
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
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Patient Profile | Elysian Management Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>
    <style> body { font-family: 'Inter', sans-serif; } .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; } </style>
    <script> tailwind.config = { theme: { extend: { colors: { primary: '#0db9f2', 'primary-dark': '#0a9ad4' } } } } </script>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex">
    <?php include __DIR__ . '/_sidebar.php'; ?>
    <div class="flex-1 flex flex-col min-w-0">
        <?php 
        $title = 'Patient Profile';
        $backLink = 'customers.php';
        include __DIR__ . '/_topbar.php'; 
        ?>

        <main class="flex-1 p-8 overflow-auto">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-8">
                <div class="flex items-center gap-6">
                    <div class="w-20 h-20 rounded-full bg-primary/20 flex items-center justify-center text-primary text-3xl font-bold">
                        <?= mb_substr($customer['Name'], 0, 1) ?>
                    </div>
                    <div>
                        <h1 class="text-3xl font-black text-slate-800"><?= htmlspecialchars($customer['Name']) ?></h1>
                        <p class="text-slate-500 font-mono text-sm">PID: <?= htmlspecialchars($pid) ?></p>
                        <div class="flex gap-2 mt-2">
                            <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-green-100 text-green-800 uppercase tracking-wider">Active Patient</span>
                            <?php if ($totalSpent > 10000000): ?>
                            <span class="px-2 py-0.5 rounded text-[10px] font-bold bg-amber-100 text-amber-800 uppercase tracking-wider">VIP</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <?php if ($canEditProfile): ?>
                    <button type="button" id="btnEditProfile" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg border border-primary text-primary font-bold text-sm hover:bg-primary/5 transition-all">
                        <span class="material-symbols-outlined text-lg">edit_note</span> Edit Profile
                    </button>
                    <?php endif; ?>
                    <a href="create_appointment.php" class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-primary text-white font-bold text-sm hover:bg-primary-dark shadow-lg shadow-primary/20 transition-all">
                        <span class="material-symbols-outlined text-lg">calendar_add_on</span> New Booking
                    </a>
                </div>
            </div>

            <nav class="flex gap-1 border-b border-slate-200 mb-8">
                <a href="?id=<?= $cid ?>&tab=info"   class="px-6 py-3 text-sm font-bold border-b-2 transition-all <?= $tab === 'info' ? 'border-primary text-primary' : 'border-transparent text-slate-500 hover:text-slate-700' ?>">Clinical Info</a>
                <a href="?id=<?= $cid ?>&tab=appointments" class="px-6 py-3 text-sm font-bold border-b-2 transition-all <?= $tab === 'appointments' ? 'border-primary text-primary' : 'border-transparent text-slate-500 hover:text-slate-700' ?>">Appointments</a>
                <a href="?id=<?= $cid ?>&tab=plan"  class="px-6 py-3 text-sm font-bold border-b-2 transition-all <?= $tab === 'plan' ? 'border-primary text-primary' : 'border-transparent text-slate-500 hover:text-slate-700' ?>">Treatment Pathway</a>
                <a href="?id=<?= $cid ?>&tab=billing" class="px-6 py-3 text-sm font-bold border-b-2 transition-all <?= $tab === 'billing' ? 'border-primary text-primary' : 'border-transparent text-slate-500 hover:text-slate-700' ?>">Billing History</a>
            </nav>

            <?php if ($tab === 'info'): ?>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 space-y-8">
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-8">
                        <h2 class="text-sm font-black text-slate-400 uppercase tracking-widest mb-6 flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary text-lg">clinical_notes</span>
                            Patient Assessment & Records
                        </h2>
                        <div id="infoView" class="grid grid-cols-1 md:grid-cols-2 gap-y-6 gap-x-12">
                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase mb-1">Phone Number</label>
                                <p class="text-slate-700 font-bold"><?= htmlspecialchars($customer['Phone'] ?: '—') ?></p>
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase mb-1">Email Address</label>
                                <p class="text-slate-700 font-bold"><?= htmlspecialchars($customer['Email']) ?></p>
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase mb-1">Skin Type Classification</label>
                                <p class="text-slate-700 font-bold"><?= htmlspecialchars($customer['Skin_type'] ?: 'Not Assessed') ?></p>
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase mb-1">Specific Skin Condition</label>
                                <p class="text-slate-700 font-bold"><?= htmlspecialchars($customer['Skin_condition'] ?: 'None reported') ?></p>
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase mb-1">Date of Birth</label>
                                <p class="text-slate-700 font-bold"><?= $customer['Date_of_birth'] ? date('M j, Y', strtotime($customer['Date_of_birth'])) : '—' ?></p>
                            </div>
                            <div>
                                <label class="block text-[10px] font-black text-slate-400 uppercase mb-1">Clinical Record Created</label>
                                <p class="text-slate-700 font-bold"><?= date('M j, Y', strtotime($customer['Created_at'])) ?></p>
                            </div>
                        </div>
                        <form id="formEditProfile" class="hidden space-y-6 mt-4" action="">
                            <input type="hidden" name="customer_id" value="<?= (int)$cid ?>"/>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-2 uppercase">Full Name *</label>
                                    <input type="text" name="name" value="<?= htmlspecialchars($customer['Name']) ?>" class="w-full rounded-lg border border-slate-200 px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary/20 outline-none" required/>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-2 uppercase">Phone Number</label>
                                    <input type="text" name="phone" value="<?= htmlspecialchars($customer['Phone'] ?? '') ?>" class="w-full rounded-lg border border-slate-200 px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary/20 outline-none"/>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-2 uppercase">Email *</label>
                                    <input type="email" name="email" value="<?= htmlspecialchars($customer['Email']) ?>" class="w-full rounded-lg border border-slate-200 px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary/20 outline-none" required/>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-2 uppercase">Skin Type</label>
                                    <input type="text" name="skin_type" value="<?= htmlspecialchars($customer['Skin_type'] ?? '') ?>" class="w-full rounded-lg border border-slate-200 px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary/20 outline-none" placeholder="e.g. Oily, Sensitive"/>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-2 uppercase">Skin Condition</label>
                                    <input type="text" name="skin_condition" value="<?= htmlspecialchars($customer['Skin_condition'] ?? '') ?>" class="w-full rounded-lg border border-slate-200 px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary/20 outline-none" placeholder="e.g. Redness, Acne-prone"/>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 mb-2 uppercase">Date of Birth</label>
                                    <input type="date" name="date_of_birth" value="<?= htmlspecialchars($customer['Date_of_birth'] ?? '') ?>" class="w-full rounded-lg border border-slate-200 px-4 py-2.5 text-sm focus:ring-2 focus:ring-primary/20 outline-none"/>
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-700 mb-2 uppercase">Medical Notes & History</label>
                                <textarea name="patient_notes" rows="4" class="w-full rounded-lg border border-slate-200 px-4 py-3 text-sm focus:ring-2 focus:ring-primary/20 outline-none" placeholder="Enter clinical assessment, history, and notes..."><?= htmlspecialchars($customer['Patient_notes'] ?? '') ?></textarea>
                            </div>
                            <div class="flex gap-3">
                                <button type="submit" class="px-6 py-2 rounded-lg bg-primary text-white font-bold text-sm hover:bg-primary-dark transition-all">Save Changes</button>
                                <button type="button" id="btnCancelEdit" class="px-6 py-2 rounded-lg border border-slate-200 text-slate-600 font-bold text-sm hover:bg-slate-50 transition-all">Cancel</button>
                            </div>
                        </form>
                    </div>
                    <div class="bg-white rounded-xl border border-slate-200 shadow-sm p-8">
                        <h2 class="text-sm font-black text-slate-400 uppercase tracking-widest mb-4 flex items-center gap-2">
                            <span class="material-symbols-outlined text-primary text-lg">history_edu</span>
                            Clinical Notes & Assessment
                        </h2>
                        <p id="patientNotesView" class="text-slate-600 text-sm leading-relaxed whitespace-pre-wrap"><?= htmlspecialchars($customer['Patient_notes'] ?: 'No clinical notes recorded for this patient.') ?></p>
                    </div>
                </div>
                <div class="space-y-6">
                    <div class="bg-primary/10 rounded-xl border border-primary/20 p-8">
                        <h3 class="text-[10px] font-black text-primary uppercase tracking-widest mb-4 flex items-center gap-2">
                            <span class="material-symbols-outlined text-lg">insights</span>
                            Relationship Value
                        </h3>
                        <p class="text-3xl font-black text-slate-800"><?= number_format($totalSpent) ?> ₫</p>
                        <p class="text-xs text-slate-500 mt-1 font-bold">Total Lifetime Revenue</p>
                        <div class="mt-6 pt-6 border-t border-primary/10 space-y-3">
                            <div class="flex justify-between text-sm">
                                <span class="text-slate-500">Appointments</span>
                                <span class="font-bold text-slate-700"><?= count(array_filter($appointments, function($a) { return $a['status'] !== 'cancelled'; })) ?></span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-slate-500">Loyalty Tier</span>
                                <span class="font-bold text-amber-600"><?= $totalSpent > 10000000 ? 'Platinum' : ($totalSpent > 5000000 ? 'Gold' : 'Silver') ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php elseif ($tab === 'appointments'): ?>
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                <table class="w-full text-sm">
                    <thead class="bg-slate-50 text-slate-500 uppercase text-[10px] font-black tracking-widest">
                        <tr>
                            <th class="text-left px-6 py-4">Appointment Date</th>
                            <th class="text-left px-6 py-4">Clinical Service</th>
                            <th class="text-left px-6 py-4">Assigned Specialist</th>
                            <th class="text-left px-6 py-4">Status</th>
                            <th class="text-left px-6 py-4">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($appointments as $a):
                            $st = $a['status'] ?? 'confirmed';
                            $isFromPlan = !empty($a['plan_session_id']);
                            $stClass = $st === 'confirmed'
                                ? 'bg-green-100 text-green-700'
                                : ($st === 'pending'
                                    ? 'bg-amber-100 text-amber-700'
                                    : ($st === 'checked_in'
                                        ? 'bg-cyan-100 text-cyan-700'
                                        : ($st === 'completed'
                                            ? 'bg-sky-100 text-sky-700'
                                            : ($st === 'no_show'
                                                ? 'bg-rose-100 text-rose-700'
                                                : 'bg-slate-100 text-slate-500'))));
                        ?>
                        <tr class="border-t border-slate-100 hover:bg-slate-50/50">
                            <td class="px-6 py-4">
                                <p class="font-bold text-slate-800"><?= date('M j, Y', strtotime($a['appointment_date'])) ?></p>
                                <p class="text-xs text-slate-400 font-medium"><?= formatTime($a['appointment_time']) ?></p>
                            </td>
                            <td class="px-6 py-4">
                                <p class="font-medium text-slate-700"><?= htmlspecialchars($a['service_name']) ?></p>
                                <?php if ($isFromPlan): ?>
                                    <span class="inline-flex items-center gap-1 mt-1 px-2 py-0.5 rounded bg-violet-100 text-violet-700 text-[10px] font-black uppercase">
                                        <span class="material-symbols-outlined text-[12px]">clinical_notes</span>
                                        From Plan
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 text-slate-600"><?= htmlspecialchars($a['specialist_name']) ?></td>
                            <td class="px-6 py-4">
                                <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase <?= $stClass ?>"><?= $st ?></span>
                            </td>
                            <td class="px-6 py-4">
                                <a href="edit_appointment.php?id=<?= $a['id'] ?>" class="text-primary font-bold text-xs hover:underline uppercase tracking-wider">Manage</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php if (empty($appointments)): ?>
                        <tr><td colspan="5" class="py-12 text-center text-slate-500 font-medium italic">No clinical history found for this patient.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
           <?php elseif ($tab === 'plan'): ?>
<?php
$completedCount = 0;
$totalSessionCount = count($planSessions);
$nextSessionId = null;

foreach ($planSessions as $sessionItem) {
    if (!empty($sessionItem['completed_at'])) {
        $completedCount++;
    } elseif ($nextSessionId === null) {
        $nextSessionId = (int)$sessionItem['id'];
    }
}

$progressPercent = $totalSessionCount > 0 ? (int)round(($completedCount / $totalSessionCount) * 100) : 0;
?>
<div class="space-y-6">
    <div class="flex flex-wrap items-center justify-between gap-4">
        <div>
            <h3 class="text-2xl font-black tracking-tight text-slate-950">Treatment Pathway</h3>
            <?php if ($activePlan): ?>
                <p class="mt-1 text-sm font-semibold text-slate-500">
                    <?= htmlspecialchars($completedCount) ?> / <?= htmlspecialchars($totalSessionCount) ?> sessions completed
                </p>
            <?php endif; ?>
        </div>

        <?php if ($canCreatePlan && !$activePlan): ?>
            <a
                href="create_plan.php?customer_id=<?= (int)$cid ?>"
                class="inline-flex h-11 items-center gap-2 rounded-full bg-primary px-5 text-sm font-black text-white shadow-lg shadow-primary/20 transition hover:-translate-y-0.5 hover:bg-primary-dark"
            >
                <span class="material-symbols-outlined text-[19px]">add_circle</span>
                Create Plan
            </a>
        <?php endif; ?>

        <?php if ($canCreatePlan && $activePlan): ?>
            <a
                href="edit_plan.php?plan_id=<?= (int)$activePlan['id'] ?>&customer_id=<?= (int)$cid ?>"
                class="inline-flex h-11 items-center gap-2 rounded-full border border-slate-200 bg-white px-5 text-sm font-black text-slate-600 transition hover:bg-sky-50 hover:text-primary"
            >
                <span class="material-symbols-outlined text-[19px]">settings</span>
                Edit Strategy
            </a>
        <?php endif; ?>
    </div>

    <?php if ($activePlan): ?>
        <section class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-sm">
            <div class="relative border-b border-slate-100 bg-gradient-to-br from-sky-50 via-white to-cyan-50 p-7">
                <div class="pointer-events-none absolute -right-16 -top-16 h-48 w-48 rounded-full bg-sky-200/40 blur-3xl"></div>

                <div class="relative grid gap-5 lg:grid-cols-[1fr_280px] lg:items-center">
                    <div>
                        <p class="text-xs font-black uppercase tracking-[0.2em] text-primary">
                            Active Pathway
                        </p>

                        <h4 class="mt-2 text-3xl font-black tracking-tight text-slate-950">
                            <?= htmlspecialchars($activePlan['title']) ?>
                        </h4>

                        <?php if (!empty($activePlan['overall_goal'])): ?>
                            <p class="mt-2 max-w-2xl text-sm font-semibold leading-6 text-slate-500">
                                <?= htmlspecialchars($activePlan['overall_goal']) ?>
                            </p>
                        <?php endif; ?>
                    </div>

                    <div class="rounded-[1.5rem] border border-white/80 bg-white/85 p-4 shadow-sm backdrop-blur">
                        <div class="flex items-end justify-between gap-3">
                            <div>
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Progress</p>
                                <p class="mt-2 text-3xl font-black text-slate-950"><?= htmlspecialchars($progressPercent) ?>%</p>
                            </div>

                            <div class="text-right">
                                <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Started</p>
                                <p class="mt-2 text-sm font-black text-slate-700">
                                    <?= htmlspecialchars(formatDate($activePlan['start_date'])) ?>
                                </p>
                            </div>
                        </div>

                        <div class="mt-4 h-2 overflow-hidden rounded-full bg-slate-100">
                            <div class="h-full rounded-full bg-primary" style="width: <?= htmlspecialchars($progressPercent) ?>%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-7">
                <?php if (empty($planSessions)): ?>
                    <div class="rounded-[1.5rem] border border-dashed border-slate-200 bg-slate-50 py-12 text-center">
                        <span class="material-symbols-outlined text-5xl text-slate-300">timeline</span>
                        <p class="mt-3 text-sm font-bold text-slate-500">No sessions in this plan.</p>
                    </div>
                <?php else: ?>
                    <div class="relative">
                        <div class="absolute bottom-8 left-[18px] top-8 hidden w-px bg-slate-200 sm:block"></div>

                        <div class="space-y-4">
                            <?php foreach ($planSessions as $session): ?>
                                <?php
                                $isCompleted = !empty($session['completed_at']);
                                $isNext = !$isCompleted && $nextSessionId === (int)$session['id'];
                                $isFuture = !$isCompleted && !$isNext;

                                $cardClass = $isNext
                                    ? 'border-sky-200 bg-sky-50/70 shadow-[0_18px_50px_rgba(14,165,233,0.12)]'
                                    : ($isCompleted ? 'border-emerald-100 bg-white' : 'border-slate-100 bg-white opacity-70');

                                $dotClass = $isCompleted
                                    ? 'bg-emerald-500 text-white'
                                    : ($isNext ? 'bg-primary text-white ring-8 ring-sky-100' : 'bg-slate-100 text-slate-400');

                                $labelText = $isCompleted ? 'Done' : ($isNext ? 'Next' : 'Pending');
                                $labelClass = $isCompleted
                                    ? 'bg-emerald-50 text-emerald-700'
                                    : ($isNext ? 'bg-primary text-white' : 'bg-slate-100 text-slate-500');
                                ?>

                                <div class="relative grid gap-4 sm:grid-cols-[38px_1fr]">
                                    <div class="relative hidden sm:flex sm:justify-center">
                                        <div class="z-10 flex h-9 w-9 items-center justify-center rounded-full text-sm font-black <?= $dotClass ?>">
                                            <?php if ($isCompleted): ?>
                                                <span class="material-symbols-outlined text-[20px]">check</span>
                                            <?php else: ?>
                                                <?= (int)$session['session_number'] ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <article class="rounded-[1.5rem] border p-5 transition hover:-translate-y-0.5 hover:shadow-sm <?= $cardClass ?>">
                                        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                                            <div class="min-w-0">
                                                <div class="mb-2 flex flex-wrap items-center gap-2">
                                                    <span class="inline-flex rounded-full px-3 py-1 text-[11px] font-black uppercase tracking-[0.14em] <?= $labelClass ?>">
                                                        <?= htmlspecialchars($labelText) ?>
                                                    </span>

                                                    <span class="text-xs font-black uppercase tracking-[0.16em] text-slate-400">
                                                        Session #<?= (int)$session['session_number'] ?>
                                                    </span>

                                                    <?php if ($isCompleted): ?>
                                                        <span class="text-xs font-bold text-slate-400">
                                                            · <?= htmlspecialchars(formatDate($session['completed_at'])) ?>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>

                                                <h4 class="truncate text-xl font-black tracking-tight <?= $isFuture ? 'text-slate-400' : 'text-slate-950' ?>">
                                                    <?= htmlspecialchars($session['service_name'] ?: 'Untitled session') ?>
                                                </h4>

                                                <?php if (!empty($session['focus_notes'])): ?>
                                                    <p class="mt-1 max-w-2xl text-sm font-semibold text-slate-500">
                                                        <?= htmlspecialchars($session['focus_notes']) ?>
                                                    </p>
                                                <?php endif; ?>

                                                <?php if (!empty($session['session_image_path'])): ?>
                                                    <a
                                                        href="../<?= htmlspecialchars($session['session_image_path']) ?>"
                                                        target="_blank"
                                                        class="mt-3 inline-flex items-center gap-2 text-xs font-black text-primary hover:underline"
                                                    >
                                                        <img
                                                            src="../<?= htmlspecialchars($session['session_image_path']) ?>"
                                                            alt="Session image"
                                                            class="h-9 w-9 rounded-xl border border-slate-200 object-cover"
                                                        />
                                                        View image
                                                    </a>
                                                <?php endif; ?>

                                                <?php if (!empty($session['scheduled_date']) && $session['schedule_status'] === 'scheduled'): ?>
                                                    <?php 
                                                    $scheduledTs = strtotime($session['scheduled_date'] . ' ' . $session['scheduled_time']);
                                                    $isToday = date('Y-m-d') === date('Y-m-d', $scheduledTs);
                                                    $isPast = $scheduledTs < time();
                                                    ?>
                                                    <div class="mt-2 flex flex-wrap items-center gap-2">
                                                        <span class="inline-flex items-center gap-1.5 rounded-xl <?= $isToday ? 'bg-amber-50 text-amber-700' : ($isPast ? 'bg-red-50 text-red-600' : 'bg-sky-50 text-sky-600') ?> px-3 py-1.5 text-xs font-black">
                                                            <span class="material-symbols-outlined text-[14px]">schedule</span>
                                                            <?php if ($isToday): ?>
                                                                Hôm nay, <?= date('H:i', $scheduledTs) ?>
                                                            <?php elseif ($isPast): ?>
                                                                Đã quá hẹn
                                                            <?php else: ?>
                                                                <?= date('M j', $scheduledTs) ?>, <?= date('H:i', $scheduledTs) ?>
                                                            <?php endif; ?>
                                                        </span>
                                                        <?php if (!empty($session['booking_code'])): ?>
                                                            <span class="text-xs font-semibold text-slate-400">
                                                                <?= htmlspecialchars($session['booking_code']) ?>
                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>

                                            <div class="flex shrink-0 items-center gap-2">
                                                <?php if ($isCompleted): ?>
                                                    <a
                                                        href="session_update.php?plan_id=<?= (int)$activePlan['id'] ?>&session_id=<?= (int)$session['id'] ?>"
                                                        class="inline-flex h-10 items-center justify-center rounded-2xl border border-slate-200 bg-white px-4 text-xs font-black uppercase tracking-[0.12em] text-slate-500 transition hover:bg-sky-50 hover:text-primary"
                                                    >
                                                        View Notes
                                                    </a>
                                                <?php elseif ($isNext && $canCreatePlan): ?>
                                                    <a
                                                        href="session_update.php?plan_id=<?= (int)$activePlan['id'] ?>&session_id=<?= (int)$session['id'] ?>"
                                                        class="inline-flex h-12 items-center gap-2 rounded-2xl bg-primary px-5 text-sm font-black text-white shadow-lg shadow-primary/20 transition hover:-translate-y-0.5 hover:bg-primary-dark"
                                                    >
                                                        <span class="material-symbols-outlined text-[19px]">play_arrow</span>
                                                        Start Session
                                                    </a>
                                                <?php else: ?>
                                                    <?php if ($canCreatePlan && empty($session['scheduled_date'])): ?>
                                                        <button
                                                            type="button"
                                                            onclick="openScheduleModal(<?= (int)$session['id'] ?>, <?= (int)$activePlan['id'] ?>)"
                                                            class="mt-2 inline-flex h-9 items-center gap-1.5 rounded-xl bg-slate-100 px-3 text-xs font-black text-slate-600 hover:bg-sky-50 hover:text-primary transition"
                                                        >
                                                            <span class="material-symbols-outlined text-[14px]">add_alarm</span>
                                                            Schedule
                                                        </button>
                                                    <?php elseif (!empty($session['scheduled_date']) && $session['schedule_status'] === 'cancelled'): ?>
                                                        <span class="mt-2 inline-flex items-center gap-1.5 rounded-xl bg-red-50 px-3 py-1.5 text-xs font-black text-red-600">
                                                            <span class="material-symbols-outlined text-[14px]">event_busy</span>
                                                            Cancelled
                                                        </span>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    <?php else: ?>
        <div class="rounded-[2rem] border-2 border-dashed border-slate-200 bg-white/70 px-6 py-16 text-center">
            <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-3xl bg-sky-50 text-primary">
                <span class="material-symbols-outlined text-[32px]">clinical_notes</span>
            </div>

            <h4 class="mt-4 text-xl font-black text-slate-950">No active pathway</h4>

            <?php if ($canCreatePlan): ?>
                <a
                    href="create_plan.php?customer_id=<?= (int)$cid ?>"
                    class="mt-5 inline-flex h-11 items-center gap-2 rounded-full bg-primary px-5 text-sm font-black text-white shadow-lg shadow-primary/20 transition hover:-translate-y-0.5 hover:bg-primary-dark"
                >
                    <span class="material-symbols-outlined text-[19px]">add_circle</span>
                    Create Plan
                </a>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php if (!empty($completedPlans)): ?>
        <div class="mt-12">
            <h4 class="mb-4 text-sm font-black uppercase tracking-[0.2em] text-slate-400">Past Pathways</h4>
            <div class="grid gap-4 sm:grid-cols-2">
                <?php foreach ($completedPlans as $p): ?>
                    <div class="rounded-2xl border border-slate-200 bg-white p-5 transition hover:bg-slate-50">
                        <div class="flex items-start justify-between">
                            <div>
                                <h5 class="font-black text-slate-950"><?= htmlspecialchars($p['title']) ?></h5>
                                <p class="mt-1 text-xs font-semibold text-slate-500">
                                    Started <?= htmlspecialchars(formatDate($p['start_date'])) ?>
                                </p>
                            </div>
                            <span class="rounded-full bg-emerald-50 px-2 py-1 text-[10px] font-black uppercase tracking-wider text-emerald-600">
                                Completed
                            </span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</div>

            <?php elseif ($tab === 'billing'): ?>
            <div class="bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden">
                <table class="w-full text-sm">
                    <thead class="bg-slate-50 text-slate-500 uppercase text-[10px] font-black tracking-widest">
                        <tr>
                            <th class="text-left px-6 py-4">Booking Code</th>
                            <th class="text-left px-6 py-4">Service Provided</th>
                            <th class="text-right px-6 py-4">Amount</th>
                            <th class="text-center px-6 py-4">Payment Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($appointments as $a): if ($a['status'] === 'cancelled') continue; ?>
                        <tr class="border-t border-slate-100 hover:bg-slate-50/50">
                            <td class="px-6 py-4 font-mono text-xs text-slate-500"><?= htmlspecialchars($a['booking_code']) ?></td>
                            <td class="px-6 py-4 font-medium text-slate-700"><?= htmlspecialchars($a['service_name']) ?></td>
                            <td class="px-6 py-4 text-right font-black text-slate-800"><?= number_format((int)preg_replace('/[^0-9]/', '', $a['total_price'])) ?> đ</td>
                            <td class="px-6 py-4 text-center">
                                <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase <?= $a['payment_status'] === 'paid' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' ?>">
                                    <?= $a['payment_status'] ?: 'Unpaid' ?>
                                </span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        <?php if (empty($appointments)): ?>
                        <tr><td colspan="4" class="py-12 text-center text-slate-500 font-medium italic">No financial records found.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>
        </main>
    </div>

    <script>
    const btnEdit = document.getElementById('btnEditProfile');
    const infoView = document.getElementById('infoView');
    const formEdit = document.getElementById('formEditProfile');
    const btnCancel = document.getElementById('btnCancelEdit');

    if (btnEdit) {
        btnEdit.addEventListener('click', () => {
            infoView.classList.add('hidden');
            formEdit.classList.remove('hidden');
        });
    }
    if (btnCancel) {
        btnCancel.addEventListener('click', () => {
            infoView.classList.remove('hidden');
            formEdit.classList.add('hidden');
        });
    }

    if (formEdit) {
        formEdit.addEventListener('submit', function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            const data = Object.fromEntries(fd.entries());
            
            fetch('../backend/update_customer_profile.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(data)
            })
            .then(r => r.json())
            .then(res => {
                if (res.success) {
                    alert('Profile updated successfully!');
                    window.location.reload();
                } else {
                    alert('Error: ' + (res.message || 'Update failed'));
                }
            })
            .catch(() => alert('Network error, please try again.'));
        });
    }

    // Schedule Modal Functions
    async function openScheduleModal(sessionId, planId) {
        document.getElementById('scheduleSessionId').value = sessionId;
        document.getElementById('schedulePlanId').value = planId;
        document.getElementById('scheduleDate').value = '';
        document.getElementById('scheduleTime').value = '';
        document.getElementById('scheduleNotes').value = '';
        document.getElementById('scheduleResult').innerHTML = '';
        document.getElementById('scheduleModal').classList.remove('hidden');
    }

    function closeScheduleModal() {
        document.getElementById('scheduleModal').classList.add('hidden');
    }

    async function submitSchedule() {
        const sessionId = document.getElementById('scheduleSessionId').value;
        const planId = document.getElementById('schedulePlanId').value;
        const date = document.getElementById('scheduleDate').value;
        const time = document.getElementById('scheduleTime').value;
        const notes = document.getElementById('scheduleNotes').value;

        if (!date || !time) {
            document.getElementById('scheduleResult').innerHTML = '<p class="text-red-600 text-sm font-bold">Please select date and time</p>';
            return;
        }

        try {
            const response = await fetch('../backend/api/schedule_session.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    plan_session_id: parseInt(sessionId),
                    scheduled_date: date,
                    scheduled_time: time,
                    specialist_id: <?= $activePlan['specialist_id'] ?? 0 ?>,
                    notes: notes
                })
            });

            const result = await response.json();

            if (result.success) {
                document.getElementById('scheduleResult').innerHTML = `
                    <div class="text-emerald-600 text-sm font-bold flex items-center gap-2">
                        <span class="material-symbols-outlined text-[18px]">check_circle</span>
                        Scheduled! Booking: ${result.data.booking_code}
                    </div>
                `;
                setTimeout(() => window.location.reload(), 1500);
            } else {
                document.getElementById('scheduleResult').innerHTML = `<p class="text-red-600 text-sm font-bold">${result.message}</p>`;
            }
        } catch (error) {
            document.getElementById('scheduleResult').innerHTML = `<p class="text-red-600 text-sm font-bold">Error: ${error.message}</p>`;
        }
    }
    </script>

    <!-- Schedule Modal -->
    <div id="scheduleModal" class="fixed inset-0 z-50 hidden">
        <div class="absolute inset-0 bg-black/50 backdrop-blur-sm" onclick="closeScheduleModal()"></div>
        <div class="absolute left-1/2 top-1/2 w-full max-w-md -translate-x-1/2 -translate-y-1/2">
            <div class="bg-white rounded-3xl shadow-2xl p-8 m-4">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-xl font-black text-slate-900">Schedule Session</h3>
                    <button onclick="closeScheduleModal()" class="p-2 hover:bg-slate-100 rounded-full transition">
                        <span class="material-symbols-outlined text-slate-500">close</span>
                    </button>
                </div>
                <input type="hidden" id="scheduleSessionId">
                <input type="hidden" id="schedulePlanId">
                <div class="space-y-4">
                    <div>
                        <label class="block text-xs font-black uppercase tracking-wider text-slate-500 mb-2">Date</label>
                        <input type="date" id="scheduleDate" class="w-full h-12 rounded-xl border border-slate-200 px-4 font-semibold focus:ring-2 focus:ring-primary/20 outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-black uppercase tracking-wider text-slate-500 mb-2">Time</label>
                        <input type="time" id="scheduleTime" class="w-full h-12 rounded-xl border border-slate-200 px-4 font-semibold focus:ring-2 focus:ring-primary/20 outline-none">
                    </div>
                    <div>
                        <label class="block text-xs font-black uppercase tracking-wider text-slate-500 mb-2">Notes (optional)</label>
                        <textarea id="scheduleNotes" rows="2" class="w-full rounded-xl border border-slate-200 px-4 py-3 font-semibold focus:ring-2 focus:ring-primary/20 outline-none" placeholder="Additional notes"></textarea>
                    </div>
                </div>
                <div id="scheduleResult" class="mt-4"></div>
                <div class="flex gap-3 mt-6">
                    <button onclick="submitSchedule()" class="flex-1 h-12 rounded-xl bg-primary text-white font-black hover:bg-primary-dark transition">
                        Confirm Schedule
                    </button>
                    <button onclick="closeScheduleModal()" class="h-12 px-6 rounded-xl border border-slate-200 font-black text-slate-600 hover:bg-slate-50 transition">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
