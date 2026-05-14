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
    SELECT 
        id,
        booking_code,
        customer_name,
        customer_phone,
        service_id,
        service_name,
        specialist_id,
        specialist_name,
        appointment_date,
        appointment_time,
        total_price,
        status
    FROM appointments 
    WHERE id = ?
");
$stmt->execute([$id]);
$apt = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$apt) {
    header('Location: calendar.php');
    exit;
}

function h($value): string
{
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function formatTimeDisplay($time): string
{
    if (!is_string($time) || trim($time) === '') {
        return '—';
    }

    if (preg_match('/^(\d{2}):(\d{2})/', $time, $matches)) {
        $hour = (int)$matches[1];
        $minute = $matches[2];
        $period = $hour >= 12 ? 'PM' : 'AM';
        $hour12 = $hour > 12 ? $hour - 12 : ($hour === 0 ? 12 : $hour);

        return sprintf('%d:%s %s', $hour12, $minute, $period);
    }

    return $time;
}

$stmt = $conn->query("SELECT id, name, title FROM specialists ORDER BY name");
$specialists = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $conn->query("SELECT id, name, price FROM services ORDER BY name");
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);

$currentTimeRaw = (string)($apt['appointment_time'] ?? '');
$currentTimeDisplay = formatTimeDisplay($currentTimeRaw);
$currentStatus = (string)($apt['status'] ?? 'confirmed');

function appointmentStatusLabel(string $status): string
{
    $labels = [
        'pending' => 'Pending',
        'confirmed' => 'Confirmed',
        'checked_in' => 'Checked in',
        'completed' => 'Completed',
        'no_show' => 'No-show',
        'cancelled' => 'Cancelled',
    ];

    return $labels[$status] ?? ucfirst(str_replace('_', ' ', $status));
}

function appointmentStatusOptions(string $currentStatus): array
{
    $map = [
        'pending' => ['pending', 'confirmed', 'cancelled'],
        'confirmed' => ['confirmed', 'checked_in', 'no_show', 'cancelled'],
        'checked_in' => ['checked_in', 'completed'],
        'completed' => ['completed'],
        'no_show' => ['no_show'],
        'cancelled' => ['cancelled'],
    ];

    return $map[$currentStatus] ?? ['pending', 'confirmed', 'checked_in', 'completed', 'no_show', 'cancelled'];
}

$statusOptions = appointmentStatusOptions($currentStatus);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Edit Appointment | Elysian Management Hub</title>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#0db9f2',
                        'primary-dark': '#0a9ad4'
                    },
                    boxShadow: {
                        soft: '0 18px 50px rgba(15, 23, 42, 0.08)',
                        glow: '0 18px 60px rgba(14, 165, 233, 0.18)'
                    }
                }
            }
        };
    </script>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 500, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>

<body class="h-screen bg-slate-50 text-slate-800 flex overflow-hidden">
    <?php include __DIR__ . '/_sidebar.php'; ?>

    <div class="flex min-w-0 flex-1 flex-col min-h-0">
        <?php
        $title = 'Edit Appointment';
        $subtitle = 'Update booking details and slot assignment.';
        $backLink = 'calendar.php';
        include __DIR__ . '/_topbar.php';
        ?>

        <main class="min-h-0 flex-1 overflow-y-auto overflow-x-hidden bg-[radial-gradient(circle_at_top_left,rgba(14,165,233,0.10),transparent_30%),linear-gradient(180deg,#f8fcff_0%,#f8fafc_45%,#f1f5f9_100%)]">
            <div class="mx-auto max-w-[1380px] px-8 py-8">
                <div class="mb-6 flex flex-wrap items-end justify-between gap-4">
                    <div>
                        <div class="mb-3 inline-flex items-center gap-2 rounded-full border border-sky-100 bg-sky-50 px-3 py-1.5 text-xs font-black uppercase tracking-[0.18em] text-sky-600">
                            <span class="h-2 w-2 rounded-full bg-sky-400"></span>
                            Appointment
                        </div>

                        <h2 class="text-4xl font-black leading-tight tracking-[-0.05em] text-slate-950">
                            Edit appointment
                        </h2>

                        <p class="mt-2 text-sm font-medium text-slate-500">
                            Booking #<?= h($apt['booking_code'] ?? '') ?>
                        </p>
                    </div>

                    <a
                        href="calendar.php"
                        class="inline-flex h-11 items-center gap-2 rounded-full border border-slate-200 bg-white px-4 text-sm font-black text-slate-600 shadow-sm transition hover:bg-slate-50"
                    >
                        <span class="material-symbols-outlined text-[18px]">arrow_back</span>
                        Back to Calendar
                    </a>
                </div>

                <form id="formEdit" class="grid gap-6 xl:grid-cols-[1fr_360px]">
                    <input type="hidden" id="appointment_id" value="<?= h((int)$apt['id']) ?>"/>
                    <input type="hidden" id="appointment_time" name="appointment_time" value="<?= h($currentTimeRaw) ?>"/>
                    <input type="hidden" id="current_time_raw" value="<?= h($currentTimeRaw) ?>"/>
                    <input type="hidden" id="current_time_display" value="<?= h($currentTimeDisplay) ?>"/>

                    <section class="space-y-5">
                        <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                            <div class="flex items-center gap-3 border-b border-slate-100 px-6 py-5">
                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-sky-50 text-sky-600">
                                    <span class="material-symbols-outlined text-[22px]">person</span>
                                </div>

                                <div>
                                    <h3 class="text-xl font-black tracking-tight text-slate-950">Customer</h3>
                                    <p class="text-sm font-medium text-slate-500">Basic client information.</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 gap-4 p-6 sm:grid-cols-2">
                                <div>
                                    <label class="mb-2 block text-sm font-black text-slate-700">
                                        Customer Name <span class="text-sky-500">*</span>
                                    </label>
                                    <input
                                        type="text"
                                        id="customer_name"
                                        name="customer_name"
                                        required
                                        value="<?= h($apt['customer_name'] ?? '') ?>"
                                        class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                    />
                                </div>

                                <div>
                                    <label class="mb-2 block text-sm font-black text-slate-700">
                                        Phone Number <span class="text-sky-500">*</span>
                                    </label>
                                    <input
                                        type="tel"
                                        id="customer_phone"
                                        name="customer_phone"
                                        required
                                        value="<?= h($apt['customer_phone'] ?? '') ?>"
                                        class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                    />
                                </div>
                            </div>
                        </div>

                        <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                            <div class="flex items-center gap-3 border-b border-slate-100 px-6 py-5">
                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-emerald-50 text-emerald-600">
                                    <span class="material-symbols-outlined text-[22px]">spa</span>
                                </div>

                                <div>
                                    <h3 class="text-xl font-black tracking-tight text-slate-950">Treatment</h3>
                                    <p class="text-sm font-medium text-slate-500">Service, specialist and status.</p>
                                </div>
                            </div>

                            <div class="grid grid-cols-1 gap-5 p-6 lg:grid-cols-2">
                                <div>
                                    <label class="mb-2 block text-sm font-black text-slate-700">
                                        Service <span class="text-sky-500">*</span>
                                    </label>
                                    <select
                                        id="service_id"
                                        name="service_id"
                                        required
                                        class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                    >
                                        <?php foreach ($services as $service): ?>
                                            <option
                                                value="<?= h($service['id']) ?>"
                                                data-name="<?= h($service['name']) ?>"
                                                data-price="<?= h($service['price'] ?? '') ?>"
                                                <?= ((string)$service['id'] === (string)($apt['service_id'] ?? '') || $service['name'] === ($apt['service_name'] ?? '')) ? 'selected' : '' ?>
                                            >
                                                <?= h($service['name']) ?><?= !empty($service['price']) ? ' · ' . h($service['price']) : '' ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div>
                                    <label class="mb-2 block text-sm font-black text-slate-700">
                                        Specialist <span class="text-sky-500">*</span>
                                    </label>
                                    <select
                                        id="specialist_id"
                                        name="specialist_id"
                                        required
                                        class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                    >
                                        <?php foreach ($specialists as $specialist): ?>
                                            <option
                                                value="<?= h((int)$specialist['id']) ?>"
                                                data-name="<?= h($specialist['name']) ?>"
                                                <?= (int)$specialist['id'] === (int)($apt['specialist_id'] ?? 0) ? 'selected' : '' ?>
                                            >
                                                <?= h($specialist['name']) ?><?= !empty($specialist['title']) ? ' · ' . h($specialist['title']) : '' ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="lg:col-span-2">
                                    <label class="mb-2 block text-sm font-black text-slate-700">
                                        Status
                                    </label>
                                    <select
                                        id="status"
                                        name="status"
                                        class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                    >
                                        <?php foreach ($statusOptions as $statusOption): ?>
                                            <option value="<?= h($statusOption) ?>" <?= $currentStatus === $statusOption ? 'selected' : '' ?>>
                                                <?= h(appointmentStatusLabel($statusOption)) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                    <p class="mt-2 text-xs font-semibold leading-5 text-slate-500">
                                        Workflow: Pending -> Confirmed -> Checked in -> Completed, or branch to No-show / Cancelled.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                            <div class="flex items-center gap-3 border-b border-slate-100 px-6 py-5">
                                <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-violet-50 text-violet-600">
                                    <span class="material-symbols-outlined text-[22px]">event_available</span>
                                </div>

                                <div>
                                    <h3 class="text-xl font-black tracking-tight text-slate-950">Schedule</h3>
                                    <p class="text-sm font-medium text-slate-500">Update date or select another slot.</p>
                                </div>
                            </div>

                            <div class="space-y-5 p-6">
                                <div class="max-w-sm">
                                    <label class="mb-2 block text-sm font-black text-slate-700">
                                        Appointment Date <span class="text-sky-500">*</span>
                                    </label>
                                    <input
                                        type="date"
                                        id="appointment_date"
                                        name="appointment_date"
                                        required
                                        value="<?= h($apt['appointment_date'] ?? '') ?>"
                                        class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                    />
                                </div>

                                <div>
                                    <label class="mb-3 block text-sm font-black text-slate-700">
                                        Available Slots <span class="text-sky-500">*</span>
                                    </label>

                                    <div
                                        id="slotsContainer"
                                        class="min-h-[104px] rounded-[1.5rem] border border-dashed border-slate-200 bg-slate-50/70 p-4"
                                    >
                                        <div class="flex h-full min-h-[72px] items-center justify-center text-center">
                                            <p class="text-sm font-bold text-slate-500">Loading slots...</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <aside class="xl:sticky xl:top-6 h-fit">
                        <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                            <div class="relative overflow-hidden bg-slate-950 p-6 text-white">
                                <div class="pointer-events-none absolute -right-12 -top-12 h-40 w-40 rounded-full bg-sky-400/25 blur-3xl"></div>
                                <div class="relative">
                                    <p class="text-xs font-black uppercase tracking-[0.2em] text-sky-300">Summary</p>
                                    <h3 class="mt-3 text-2xl font-black tracking-tight">Review changes</h3>
                                </div>
                            </div>

                            <div class="space-y-3 p-5">
                                <div class="rounded-2xl bg-slate-50 p-4">
                                    <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Booking Code</p>
                                    <p class="mt-2 font-mono text-base font-black text-slate-900">
                                        #<?= h($apt['booking_code'] ?? '') ?>
                                    </p>
                                </div>

                                <div class="rounded-2xl bg-slate-50 p-4">
                                    <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Customer</p>
                                    <p id="summaryCustomer" class="mt-2 text-base font-black text-slate-900">—</p>
                                    <p id="summaryPhone" class="mt-0.5 text-sm font-semibold text-slate-500">—</p>
                                </div>

                                <div class="rounded-2xl bg-sky-50 p-4">
                                    <p class="text-xs font-black uppercase tracking-[0.18em] text-sky-500">Service</p>
                                    <p id="summaryService" class="mt-2 text-base font-black text-slate-900">—</p>
                                    <p id="summaryPrice" class="mt-0.5 text-sm font-semibold text-slate-500">—</p>
                                </div>

                                <div class="rounded-2xl bg-emerald-50 p-4">
                                    <p class="text-xs font-black uppercase tracking-[0.18em] text-emerald-600">Specialist</p>
                                    <p id="summarySpecialist" class="mt-2 text-base font-black text-slate-900">—</p>
                                </div>

                                <div class="rounded-2xl bg-violet-50 p-4">
                                    <p class="text-xs font-black uppercase tracking-[0.18em] text-violet-600">Time</p>
                                    <p id="summaryDate" class="mt-2 text-base font-black text-slate-900">—</p>
                                    <p id="summaryTime" class="mt-0.5 text-sm font-semibold text-slate-500">—</p>
                                </div>

                                <div class="rounded-2xl bg-amber-50 p-4">
                                    <p class="text-xs font-black uppercase tracking-[0.18em] text-amber-600">Status</p>
                                    <p id="summaryStatus" class="mt-2 text-base font-black text-slate-900">—</p>
                                </div>

                                <?php if ($currentStatus === 'confirmed'): ?>
                                    <form action="../backend/mark_appointment_arrived.php" method="post" class="rounded-2xl border border-cyan-100 bg-cyan-50 p-4">
                                        <input type="hidden" name="id" value="<?= h((int)$apt['id']) ?>"/>
                                        <input type="hidden" name="redirect" value="edit_appointment.php?id=<?= h((int)$apt['id']) ?>"/>
                                        <p class="text-xs font-black uppercase tracking-[0.18em] text-cyan-700">Quick action</p>
                                        <p class="mt-2 text-sm font-semibold leading-6 text-slate-600">
                                            Mark this booking as checked in when the customer arrives.
                                        </p>
                                        <button
                                            type="submit"
                                            class="mt-3 inline-flex h-11 items-center justify-center gap-2 rounded-2xl bg-cyan-500 px-4 text-sm font-black text-white shadow-sm transition hover:bg-cyan-600"
                                        >
                                            <span class="material-symbols-outlined text-[19px]">how_to_reg</span>
                                            Check in Customer
                                        </button>
                                    </form>
                                <?php endif; ?>

                                <div id="msg" class="hidden rounded-2xl border px-4 py-3 text-sm font-bold"></div>

                                <div class="grid gap-3 pt-2">
                                    <button
                                        type="submit"
                                        id="btnSubmit"
                                        class="inline-flex h-12 items-center justify-center gap-2 rounded-2xl bg-sky-500 px-5 text-sm font-black text-white shadow-glow transition hover:-translate-y-0.5 hover:bg-sky-600 disabled:cursor-not-allowed disabled:opacity-60 disabled:hover:translate-y-0"
                                    >
                                        <span class="material-symbols-outlined text-[19px]">save</span>
                                        Save Changes
                                    </button>

                                    <button
                                        type="button"
                                        id="btnCancelApt"
                                        class="inline-flex h-12 items-center justify-center gap-2 rounded-2xl border border-rose-100 bg-rose-50 px-5 text-sm font-black text-rose-600 transition hover:bg-rose-100"
                                    >
                                        <span class="material-symbols-outlined text-[19px]">cancel</span>
                                        Cancel Appointment
                                    </button>

                                    <a
                                        href="calendar.php"
                                        class="inline-flex h-12 items-center justify-center rounded-2xl border border-slate-200 bg-white px-5 text-sm font-black text-slate-600 transition hover:bg-slate-50"
                                    >
                                        Discard
                                    </a>
                                </div>
                            </div>
                        </div>
                    </aside>
                </form>
            </div>
        </main>
    </div>

    <script>
        (function() {
            const baseUrl = '../backend';
            const appointmentId = parseInt(document.getElementById('appointment_id').value, 10);

            const currentTimeRaw = document.getElementById('current_time_raw').value;
            const currentTimeDisplay = document.getElementById('current_time_display').value;

            const specialistSelect = document.getElementById('specialist_id');
            const serviceSelect = document.getElementById('service_id');
            const dateInput = document.getElementById('appointment_date');
            const statusSelect = document.getElementById('status');

            const customerNameInput = document.getElementById('customer_name');
            const customerPhoneInput = document.getElementById('customer_phone');

            const slotsContainer = document.getElementById('slotsContainer');
            const timeHidden = document.getElementById('appointment_time');

            const summaryCustomer = document.getElementById('summaryCustomer');
            const summaryPhone = document.getElementById('summaryPhone');
            const summaryService = document.getElementById('summaryService');
            const summaryPrice = document.getElementById('summaryPrice');
            const summarySpecialist = document.getElementById('summarySpecialist');
            const summaryDate = document.getElementById('summaryDate');
            const summaryTime = document.getElementById('summaryTime');
            const summaryStatus = document.getElementById('summaryStatus');

            const messageBox = document.getElementById('msg');
            const submitButton = document.getElementById('btnSubmit');

            function showMsg(text, type) {
                messageBox.classList.remove(
                    'hidden',
                    'border-emerald-100',
                    'bg-emerald-50',
                    'text-emerald-700',
                    'border-rose-100',
                    'bg-rose-50',
                    'text-rose-700',
                    'border-sky-100',
                    'bg-sky-50',
                    'text-sky-700'
                );

                if (type === 'error') {
                    messageBox.classList.add('border-rose-100', 'bg-rose-50', 'text-rose-700');
                } else if (type === 'info') {
                    messageBox.classList.add('border-sky-100', 'bg-sky-50', 'text-sky-700');
                } else {
                    messageBox.classList.add('border-emerald-100', 'bg-emerald-50', 'text-emerald-700');
                }

                messageBox.textContent = text;
            }

            function hideMsg() {
                messageBox.classList.add('hidden');
                messageBox.textContent = '';
            }

            function getSelectedService() {
                const option = serviceSelect.options[serviceSelect.selectedIndex];

                if (!option) {
                    return {
                        name: '',
                        price: ''
                    };
                }

                return {
                    name: option.getAttribute('data-name') || '',
                    price: option.getAttribute('data-price') || ''
                };
            }

            function getSelectedSpecialist() {
                const option = specialistSelect.options[specialistSelect.selectedIndex];

                if (!option) {
                    return {
                        id: '',
                        name: ''
                    };
                }

                return {
                    id: specialistSelect.value,
                    name: option.getAttribute('data-name') || ''
                };
            }

            function formatStatusLabel(value) {
                if (value === 'confirmed') return 'Confirmed';
                if (value === 'checked_in') return 'Checked in';
                if (value === 'completed') return 'Completed';
                if (value === 'no_show') return 'No-show';
                if (value === 'cancelled') return 'Cancelled';
                return 'Pending';
            }

            function updateSummary() {
                const service = getSelectedService();
                const specialist = getSelectedSpecialist();

                summaryCustomer.textContent = customerNameInput.value.trim() || 'Not selected';
                summaryPhone.textContent = customerPhoneInput.value.trim() || 'Phone pending';

                summaryService.textContent = service.name || 'Not selected';
                summaryPrice.textContent = service.price || 'Price pending';

                summarySpecialist.textContent = specialist.name || 'Not selected';

                summaryDate.textContent = dateInput.value || 'Date pending';
                summaryTime.textContent = timeHidden.value || currentTimeRaw || currentTimeDisplay || 'Slot pending';

                summaryStatus.textContent = formatStatusLabel(statusSelect.value);
            }

            function renderSlotsLoading() {
                slotsContainer.innerHTML = `
                    <div class="flex h-full min-h-[72px] items-center justify-center text-center">
                        <div>
                            <div class="mx-auto h-9 w-9 animate-spin rounded-full border-4 border-sky-100 border-t-sky-500"></div>
                            <p class="mt-3 text-sm font-bold text-slate-500">Loading slots...</p>
                        </div>
                    </div>
                `;
            }

            function renderSlotsEmpty() {
                slotsContainer.innerHTML = `
                    <div class="flex h-full min-h-[72px] items-center justify-center text-center">
                        <p class="text-sm font-bold text-amber-700">
                            No available slots. Current time will be kept.
                        </p>
                    </div>
                `;
            }

            function renderSlotsError() {
                slotsContainer.innerHTML = `
                    <div class="flex h-full min-h-[72px] items-center justify-center text-center">
                        <p class="text-sm font-bold text-rose-700">
                            Failed to load slots.
                        </p>
                    </div>
                `;
            }

            function normalizeTime(value) {
                return String(value || '').trim();
            }

            function loadSlots() {
                const specialistId = specialistSelect.value;
                const date = dateInput.value;

                hideMsg();

                if (!specialistId || !date) {
                    slotsContainer.innerHTML = `
                        <div class="flex h-full min-h-[72px] items-center justify-center text-center">
                            <p class="text-sm font-bold text-slate-500">Select specialist and date.</p>
                        </div>
                    `;
                    updateSummary();
                    return;
                }

                renderSlotsLoading();

                fetch(baseUrl + '/get_slots.php?date=' + encodeURIComponent(date) + '&specialist_id=' + encodeURIComponent(specialistId) + '&exclude_appointment_id=' + encodeURIComponent(appointmentId))
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(data) {
                        if (!data.success || !data.data || data.data.length === 0) {
                            renderSlotsEmpty();
                            timeHidden.value = currentTimeRaw;
                            updateSummary();
                            return;
                        }

                        let slots = data.data.slice();

                        if (currentTimeRaw && !slots.includes(currentTimeRaw) && !slots.includes(currentTimeDisplay)) {
                            slots.unshift(currentTimeRaw);
                        }

                        let html = '<div class="grid grid-cols-2 gap-2 sm:grid-cols-3 lg:grid-cols-4">';

                        slots.forEach(function(time) {
                            const safeTime = String(time).replace(/"/g, '&quot;');
                            const isCurrent = normalizeTime(time) === normalizeTime(currentTimeRaw) || normalizeTime(time) === normalizeTime(currentTimeDisplay);
                            const selectedClass = isCurrent
                                ? 'border-sky-500 bg-sky-500 text-white shadow-glow'
                                : 'border-slate-200 bg-white text-slate-600 hover:border-sky-200 hover:bg-sky-50 hover:text-sky-600';

                            html += `
                                <button
                                    type="button"
                                    class="slot-btn inline-flex h-11 items-center justify-center rounded-2xl border px-4 text-sm font-black shadow-sm transition ${selectedClass}"
                                    data-time="${safeTime}"
                                >
                                    ${time}
                                </button>
                            `;
                        });

                        html += '</div>';
                        slotsContainer.innerHTML = html;

                        timeHidden.value = currentTimeRaw;

                        slotsContainer.querySelectorAll('.slot-btn').forEach(function(button) {
                            button.addEventListener('click', function() {
                                slotsContainer.querySelectorAll('.slot-btn').forEach(function(item) {
                                    item.classList.remove('border-sky-500', 'bg-sky-500', 'text-white', 'shadow-glow');
                                    item.classList.add('border-slate-200', 'bg-white', 'text-slate-600');
                                });

                                this.classList.remove('border-slate-200', 'bg-white', 'text-slate-600');
                                this.classList.add('border-sky-500', 'bg-sky-500', 'text-white', 'shadow-glow');

                                timeHidden.value = this.getAttribute('data-time') || '';
                                updateSummary();
                                hideMsg();
                            });
                        });

                        updateSummary();
                    })
                    .catch(function() {
                        renderSlotsError();
                        timeHidden.value = currentTimeRaw;
                        updateSummary();
                    });
            }

            customerNameInput.addEventListener('input', updateSummary);
            customerPhoneInput.addEventListener('input', updateSummary);

            serviceSelect.addEventListener('change', function() {
                updateSummary();
                hideMsg();
            });

            specialistSelect.addEventListener('change', loadSlots);
            dateInput.addEventListener('change', loadSlots);

            statusSelect.addEventListener('change', function() {
                updateSummary();
                hideMsg();
            });

            document.getElementById('formEdit').addEventListener('submit', function(event) {
                event.preventDefault();

                const specialist = getSelectedSpecialist();
                const service = getSelectedService();

                const payload = {
                    id: appointmentId,
                    customer_name: customerNameInput.value.trim(),
                    customer_phone: customerPhoneInput.value.trim(),
                    service_id: serviceSelect.value,
                    service_name: service.name,
                    specialist_id: parseInt(specialist.id, 10),
                    specialist_name: specialist.name,
                    appointment_date: dateInput.value,
                    appointment_time: timeHidden.value,
                    total_price: service.price,
                    status: statusSelect.value
                };

                if (!payload.customer_name || !payload.customer_phone || !payload.service_id || !payload.specialist_id || !payload.appointment_date || !payload.appointment_time) {
                    showMsg('Please complete all required fields.', 'error');
                    return;
                }

                submitButton.disabled = true;
                showMsg('Saving changes...', 'info');

                fetch(baseUrl + '/update_appointment.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(payload)
                })
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(result) {
                        if (result.success) {
                            showMsg('Changes saved. Redirecting...', 'success');

                            window.setTimeout(function() {
                                window.location.href = 'calendar.php';
                            }, 700);
                        } else {
                            showMsg(result.message || 'Failed to save changes.', 'error');
                            submitButton.disabled = false;
                        }
                    })
                    .catch(function() {
                        showMsg('Network error. Please try again.', 'error');
                        submitButton.disabled = false;
                    });
            });

            document.getElementById('btnCancelApt').addEventListener('click', function() {
                if (!confirm('Cancel this appointment?')) {
                    return;
                }

                showMsg('Cancelling appointment...', 'info');

                fetch(baseUrl + '/cancel_appointment.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        id: appointmentId
                    })
                })
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(result) {
                        if (result.success) {
                            showMsg('Appointment cancelled. Redirecting...', 'success');

                            window.setTimeout(function() {
                                window.location.href = 'calendar.php';
                            }, 700);
                        } else {
                            showMsg(result.message || 'Failed to cancel appointment.', 'error');
                        }
                    })
                    .catch(function() {
                        showMsg('Network error. Please try again.', 'error');
                    });
            });

            updateSummary();
            loadSlots();
        })();
    </script>
</body>
</html>
