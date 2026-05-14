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

function h($value): string
{
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Create Appointment | Elysian Management Hub</title>

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
        $title = 'Create Appointment';
        $subtitle = 'New booking with available slot checking.';
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
                            New appointment
                        </h2>

                        <p class="mt-2 text-sm font-medium text-slate-500">
                            Choose customer, service, specialist and available slot.
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

                <form id="formCreate" class="grid gap-6 xl:grid-cols-[1fr_360px]">
                    <input type="hidden" id="appointment_time" name="appointment_time" value=""/>

                    <section class="space-y-5">
                        <div class="overflow-hidden rounded-[2rem] border border-slate-200 bg-white shadow-soft">
                            <div class="flex items-center justify-between gap-4 border-b border-slate-100 px-6 py-5">
                                <div class="flex items-center gap-3">
                                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-sky-50 text-sky-600">
                                        <span class="material-symbols-outlined text-[22px]">person_search</span>
                                    </div>
                                    <div>
                                        <h3 class="text-xl font-black tracking-tight text-slate-950">Customer</h3>
                                        <p class="text-sm font-medium text-slate-500">Search or enter manually.</p>
                                    </div>
                                </div>

                                <a href="create_customer.php" class="hidden text-sm font-black text-sky-600 hover:text-sky-700 sm:inline">
                                    + New customer
                                </a>
                            </div>

                            <div class="space-y-4 p-6">
                                <div class="grid gap-3 md:grid-cols-[1fr_auto]">
                                    <div class="relative">
                                        <span class="material-symbols-outlined pointer-events-none absolute left-4 top-1/2 -translate-y-1/2 text-[20px] text-slate-400">search</span>
                                        <input
                                            type="text"
                                            id="customerSearch"
                                            placeholder="Name, phone or email..."
                                            class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 pl-12 pr-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                        />
                                    </div>

                                    <button
                                        type="button"
                                        id="btnSearchCustomer"
                                        class="inline-flex h-12 items-center justify-center gap-2 rounded-2xl border border-slate-200 bg-white px-5 text-sm font-black text-slate-700 transition hover:border-sky-200 hover:bg-sky-50 hover:text-sky-600"
                                    >
                                        Search
                                    </button>
                                </div>

                                <div id="customerSearchResult" class="hidden rounded-2xl border px-4 py-3 text-sm font-bold"></div>

                                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                    <div>
                                        <label class="mb-2 block text-sm font-black text-slate-700">
                                            Customer Name <span class="text-sky-500">*</span>
                                        </label>
                                        <input
                                            type="text"
                                            id="customer_name"
                                            name="customer_name"
                                            required
                                            class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                            placeholder="Customer name"
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
                                            class="h-12 w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 text-sm font-semibold text-slate-700 outline-none transition focus:border-sky-300 focus:bg-white focus:ring-4 focus:ring-sky-100"
                                            placeholder="0901234567"
                                        />
                                    </div>
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
                                    <p class="text-sm font-medium text-slate-500">Select service and specialist.</p>
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
                                        <option value="">Select service</option>
                                        <?php foreach ($services as $service): ?>
                                            <option
                                                value="<?= h($service['id']) ?>"
                                                data-name="<?= h($service['name']) ?>"
                                                data-price="<?= h($service['price'] ?? '') ?>"
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
                                        <option value="">Select specialist</option>
                                        <?php foreach ($specialists as $specialist): ?>
                                            <option
                                                value="<?= h((int)$specialist['id']) ?>"
                                                data-name="<?= h($specialist['name']) ?>"
                                            >
                                                <?= h($specialist['name']) ?><?= !empty($specialist['title']) ? ' · ' . h($specialist['title']) : '' ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
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
                                    <p class="text-sm font-medium text-slate-500">Pick date and time slot.</p>
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
                                            <p class="text-sm font-bold text-slate-500">
                                                Select specialist and date to see slots.
                                            </p>
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
                                    <h3 class="mt-3 text-2xl font-black tracking-tight">Review booking</h3>
                                </div>
                            </div>

                            <div class="space-y-3 p-5">
                                <div class="rounded-2xl bg-slate-50 p-4">
                                    <p class="text-xs font-black uppercase tracking-[0.18em] text-slate-400">Customer</p>
                                    <p id="summaryCustomer" class="mt-2 text-base font-black text-slate-900">Not selected</p>
                                    <p id="summaryPhone" class="mt-0.5 text-sm font-semibold text-slate-500">Phone pending</p>
                                </div>

                                <div class="rounded-2xl bg-sky-50 p-4">
                                    <p class="text-xs font-black uppercase tracking-[0.18em] text-sky-500">Service</p>
                                    <p id="summaryService" class="mt-2 text-base font-black text-slate-900">Not selected</p>
                                    <p id="summaryPrice" class="mt-0.5 text-sm font-semibold text-slate-500">Price pending</p>
                                </div>

                                <div class="rounded-2xl bg-emerald-50 p-4">
                                    <p class="text-xs font-black uppercase tracking-[0.18em] text-emerald-600">Specialist</p>
                                    <p id="summarySpecialist" class="mt-2 text-base font-black text-slate-900">Not selected</p>
                                </div>

                                <div class="rounded-2xl bg-violet-50 p-4">
                                    <p class="text-xs font-black uppercase tracking-[0.18em] text-violet-600">Time</p>
                                    <p id="summaryDate" class="mt-2 text-base font-black text-slate-900">Date pending</p>
                                    <p id="summaryTime" class="mt-0.5 text-sm font-semibold text-slate-500">Slot pending</p>
                                </div>

                                <div id="formMessage" class="hidden rounded-2xl border px-4 py-3 text-sm font-bold"></div>

                                <div class="grid gap-3 pt-2">
                                    <button
                                        type="submit"
                                        id="btnSubmit"
                                        class="inline-flex h-12 items-center justify-center gap-2 rounded-2xl bg-sky-500 px-5 text-sm font-black text-white shadow-glow transition hover:-translate-y-0.5 hover:bg-sky-600 disabled:cursor-not-allowed disabled:opacity-60 disabled:hover:translate-y-0"
                                    >
                                        <span class="material-symbols-outlined text-[19px]">add_circle</span>
                                        Create Appointment
                                    </button>

                                    <a
                                        href="calendar.php"
                                        class="inline-flex h-12 items-center justify-center rounded-2xl border border-slate-200 bg-white px-5 text-sm font-black text-slate-600 transition hover:bg-slate-50"
                                    >
                                        Cancel
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
            const customers = <?= json_encode($customers, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) ?>;

            const customerSearch = document.getElementById('customerSearch');
            const btnSearchCustomer = document.getElementById('btnSearchCustomer');
            const customerSearchResult = document.getElementById('customerSearchResult');

            const customerNameInput = document.getElementById('customer_name');
            const customerPhoneInput = document.getElementById('customer_phone');

            const serviceSelect = document.getElementById('service_id');
            const specialistSelect = document.getElementById('specialist_id');
            const dateInput = document.getElementById('appointment_date');
            const slotsContainer = document.getElementById('slotsContainer');
            const timeHidden = document.getElementById('appointment_time');

            const summaryCustomer = document.getElementById('summaryCustomer');
            const summaryPhone = document.getElementById('summaryPhone');
            const summaryService = document.getElementById('summaryService');
            const summaryPrice = document.getElementById('summaryPrice');
            const summarySpecialist = document.getElementById('summarySpecialist');
            const summaryDate = document.getElementById('summaryDate');
            const summaryTime = document.getElementById('summaryTime');
            const formMessage = document.getElementById('formMessage');
            const submitButton = document.getElementById('btnSubmit');

            function showMessage(type, message) {
                formMessage.classList.remove(
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

                if (type === 'success') {
                    formMessage.classList.add('border-emerald-100', 'bg-emerald-50', 'text-emerald-700');
                } else if (type === 'error') {
                    formMessage.classList.add('border-rose-100', 'bg-rose-50', 'text-rose-700');
                } else {
                    formMessage.classList.add('border-sky-100', 'bg-sky-50', 'text-sky-700');
                }

                formMessage.textContent = message;
            }

            function hideMessage() {
                formMessage.classList.add('hidden');
                formMessage.textContent = '';
            }

            function getSelectedService() {
                const option = serviceSelect.options[serviceSelect.selectedIndex];

                if (!option || !serviceSelect.value) {
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

                if (!option || !specialistSelect.value) {
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

            function updateSummary() {
                const service = getSelectedService();
                const specialist = getSelectedSpecialist();

                summaryCustomer.textContent = customerNameInput.value.trim() || 'Not selected';
                summaryPhone.textContent = customerPhoneInput.value.trim() || 'Phone pending';

                summaryService.textContent = service.name || 'Not selected';
                summaryPrice.textContent = service.price || 'Price pending';

                summarySpecialist.textContent = specialist.name || 'Not selected';

                summaryDate.textContent = dateInput.value || 'Date pending';
                summaryTime.textContent = timeHidden.value || 'Slot pending';
            }

            function renderSlotsPlaceholder() {
                slotsContainer.innerHTML = `
                    <div class="flex h-full min-h-[72px] items-center justify-center text-center">
                        <p class="text-sm font-bold text-slate-500">
                            Select specialist and date to see slots.
                        </p>
                    </div>
                `;
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
                            No available slots for this date.
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

            function doSearch() {
                const query = customerSearch.value.trim().toLowerCase();

                if (!query) {
                    customerSearchResult.classList.add('hidden');
                    return;
                }

                const normalizedQuery = query.replace(/\s/g, '');

                const found = customers.find(function(customer) {
                    const name = customer.Name ? String(customer.Name).toLowerCase() : '';
                    const phone = customer.Phone ? String(customer.Phone).replace(/\s/g, '') : '';
                    const email = customer.Email ? String(customer.Email).toLowerCase() : '';

                    return name.includes(query) ||
                        phone.includes(normalizedQuery) ||
                        email.includes(query);
                });

                if (found) {
                    customerNameInput.value = found.Name || '';
                    customerPhoneInput.value = found.Phone || '';

                    customerSearchResult.classList.remove('hidden');
                    customerSearchResult.className = 'rounded-2xl border border-emerald-100 bg-emerald-50 px-4 py-3 text-sm font-bold text-emerald-700';
                    customerSearchResult.textContent = 'Customer found: ' + (found.Name || 'Unnamed customer');

                    updateSummary();
                    hideMessage();
                } else {
                    customerSearchResult.classList.remove('hidden');
                    customerSearchResult.className = 'rounded-2xl border border-amber-100 bg-amber-50 px-4 py-3 text-sm font-bold text-amber-700';
                    customerSearchResult.textContent = 'No matching customer found.';
                }
            }

            function loadSlots() {
                const specialistId = specialistSelect.value;
                const date = dateInput.value;

                timeHidden.value = '';
                updateSummary();
                hideMessage();

                if (!specialistId || !date) {
                    renderSlotsPlaceholder();
                    return;
                }

                renderSlotsLoading();

                fetch(baseUrl + '/get_slots.php?date=' + encodeURIComponent(date) + '&specialist_id=' + encodeURIComponent(specialistId))
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(data) {
                        if (!data.success || !data.data || data.data.length === 0) {
                            renderSlotsEmpty();
                            return;
                        }

                        let html = '<div class="grid grid-cols-2 gap-2 sm:grid-cols-3 lg:grid-cols-4">';

                        data.data.forEach(function(time) {
                            const safeTime = String(time).replace(/"/g, '&quot;');

                            html += `
                                <button
                                    type="button"
                                    class="slot-btn inline-flex h-11 items-center justify-center rounded-2xl border border-slate-200 bg-white px-4 text-sm font-black text-slate-600 shadow-sm transition hover:border-sky-200 hover:bg-sky-50 hover:text-sky-600"
                                    data-time="${safeTime}"
                                >
                                    ${time}
                                </button>
                            `;
                        });

                        html += '</div>';
                        slotsContainer.innerHTML = html;

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
                                hideMessage();
                            });
                        });
                    })
                    .catch(function() {
                        renderSlotsError();
                    });
            }

            customerSearch.addEventListener('keyup', function(event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    doSearch();
                }
            });

            btnSearchCustomer.addEventListener('click', doSearch);

            customerNameInput.addEventListener('input', updateSummary);
            customerPhoneInput.addEventListener('input', updateSummary);

            serviceSelect.addEventListener('change', function() {
                updateSummary();
                hideMessage();
            });

            specialistSelect.addEventListener('change', loadSlots);
            dateInput.addEventListener('change', loadSlots);

            document.getElementById('formCreate').addEventListener('submit', function(event) {
                event.preventDefault();

                const specialist = getSelectedSpecialist();
                const service = getSelectedService();

                const payload = {
                    customer_name: customerNameInput.value.trim(),
                    customer_phone: customerPhoneInput.value.trim(),
                    service_id: serviceSelect.value,
                    service_name: service.name,
                    specialist_id: parseInt(specialist.id, 10),
                    specialist_name: specialist.name,
                    appointment_date: dateInput.value,
                    appointment_time: timeHidden.value,
                    total_price: service.price
                };

                if (!payload.customer_name || !payload.customer_phone || !payload.service_id || !payload.specialist_id || !payload.appointment_date) {
                    showMessage('error', 'Please complete required fields.');
                    return;
                }

                if (!payload.appointment_time) {
                    showMessage('error', 'Please select a time slot.');
                    return;
                }

                submitButton.disabled = true;
                showMessage('info', 'Creating appointment...');

                fetch(baseUrl + '/create_booking.php', {
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
                            showMessage('success', 'Appointment created. Redirecting...');
                            window.setTimeout(function() {
                                window.location.href = 'calendar.php';
                            }, 700);
                        } else {
                            showMessage('error', result.message || 'Failed to create appointment.');
                            submitButton.disabled = false;
                        }
                    })
                    .catch(function() {
                        showMessage('error', 'Network error. Please try again.');
                        submitButton.disabled = false;
                    });
            });

            updateSummary();
            renderSlotsPlaceholder();
        })();
    </script>
</body>
</html>