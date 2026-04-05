<?php
require_once __DIR__ . '/../backend/db.php';
$currentUser = getCurrentUser();
$service_id = isset($_GET['id']) ? trim($_GET['id']) : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Booking | Elysian Skin Clinic</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: { "primary": "#0db9f2", "slate-custom": "#1e293b", "cool-gray": "#64748B" },
                    fontFamily: { "display": ["Manrope", "sans-serif"] },
                    borderRadius: { "DEFAULT": "1rem", "lg": "2rem", "full": "9999px" }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Manrope', sans-serif; }
        .material-symbols-outlined {
            font-family: 'Material Symbols Outlined';
            font-weight: 400;
            font-style: normal;
            font-size: 24px;
            line-height: 1;
            letter-spacing: normal;
            text-transform: none;
            display: inline-block;
            white-space: nowrap;
            word-wrap: normal;
            direction: ltr;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="bg-[#f5f8f8] text-slate-custom antialiased min-h-screen flex flex-col">
    <!-- Header -->
    <header class="sticky top-0 z-40 w-full border-b border-primary/10 bg-white/95 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary text-2xl">spa</span>
                </div>
                <span class="text-lg font-black text-slate-900">Elysian <span class="text-primary">Skin Clinic</span></span>
            </div>
            <nav class="hidden md:flex items-center gap-10">
                <a class="text-sm font-semibold hover:text-primary transition-colors" href="home.php">Home</a>
                <a class="text-sm font-semibold text-primary" href="dichvu.php">Service List</a>
                <a class="text-sm font-semibold hover:text-primary transition-colors" href="about.php">About US</a>
                <a class="text-sm font-semibold hover:text-primary transition-colors" href="contact.php">Contact</a>
            </nav>
            <div class="flex items-center gap-4">
                <?php if ($currentUser): ?>
                    <span class="text-sm font-bold text-slate-custom">Hi, <?= htmlspecialchars($currentUser['full_name']); ?></span>
                    <a href="../backend/logout.php" class="px-6 py-2.5 text-sm font-bold text-slate-custom hover:bg-primary/10 rounded-full">Sign Out</a>
                <?php else: ?>
                    <a href="signin.php" class="text-sm font-bold text-slate-custom hover:text-primary">Sign In</a>
                    <a href="signup.php" class="px-6 py-2.5 text-sm font-bold bg-primary text-white rounded-full">Sign Up</a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-6 py-10 flex-1">
        <!-- Progress -->
        <div class="flex justify-center gap-4 md:gap-8 mb-10">
            <a href="#" data-step="1" class="step-tab flex flex-col items-center gap-1">
                <span class="text-xs font-bold uppercase tracking-wider text-slate-custom/70">1. INFORMATION</span>
                <span class="w-full h-0.5 rounded bg-slate-200 step-line" data-step="1"></span>
            </a>
            <a href="#" data-step="2" class="step-tab flex flex-col items-center gap-1">
                <span class="text-xs font-bold uppercase tracking-wider text-slate-custom/70">2. SCHEDULE</span>
                <span class="w-full h-0.5 rounded bg-slate-200 step-line" data-step="2"></span>
            </a>
            <a href="#" data-step="3" class="step-tab flex flex-col items-center gap-1">
                <span class="text-xs font-bold uppercase tracking-wider text-slate-custom/70">3. CONFIRM</span>
                <span class="w-full h-0.5 rounded bg-slate-200 step-line" data-step="3"></span>
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
            <!-- Left: Steps content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Step 1 -->
                <div id="step1" class="booking-step">
                    <h2 class="text-2xl font-black text-slate-custom mb-1">Booking Step 1: Info & Selection</h2>
                    <p class="text-cool-gray mb-8">Tell us who you are and what care you're looking for.</p>
                    <div class="space-y-6">
                        <div class="flex flex-col sm:flex-row gap-4">
                            <div class="flex-1">
                                <label class="block text-sm font-bold text-slate-custom mb-2">Full Name *</label>
                                <input type="text" id="fullName" placeholder="e.g. Alexander Pierce" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:ring-2 focus:ring-primary/30 focus:border-primary"/>
                            </div>
                            <div class="flex-1">
                                <label class="block text-sm font-bold text-slate-custom mb-2">Phone Number *</label>
                                <input type="tel" id="phone" placeholder="+84 XXX XXX XXX" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:ring-2 focus:ring-primary/30 focus:border-primary"/>
                                <p class="mt-1 text-sm text-cool-gray">Already have an account? <a href="signin.php" class="text-primary font-bold">Sign in</a></p>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-custom mb-2">Select Treatment</label>
                            <select id="selectTreatment" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:ring-2 focus:ring-primary/30 focus:border-primary">
                                <option value="">-- Choose treatment --</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-custom mb-2">Select Specialist</label>
                            <select id="selectSpecialist" class="w-full px-4 py-3 rounded-xl border border-slate-200 bg-white focus:ring-2 focus:ring-primary/30 focus:border-primary">
                                <option value="">-- Choose specialist --</option>
                            </select>
                        </div>
                        <a href="#" id="backStep1" class="hidden text-primary font-bold text-sm">← Back</a>
                    </div>
                </div>

                <!-- Step 2 -->
                <div id="step2" class="booking-step hidden">
                    <h2 class="text-2xl font-black text-slate-custom mb-1">Booking Step 2: Schedule Selection</h2>
                    <p class="text-cool-gray mb-8">Choose a date and time that works best for you.</p>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 mb-6">
                        <div class="flex items-center justify-between mb-4">
                            <span id="calendarMonthLabel" class="font-bold text-slate-custom">March 2026</span>
                            <div class="flex gap-2">
                                <button type="button" id="calPrev" class="p-2 rounded-lg hover:bg-slate-100"><span class="material-symbols-outlined text-xl">chevron_left</span></button>
                                <button type="button" id="calNext" class="p-2 rounded-lg hover:bg-slate-100"><span class="material-symbols-outlined text-xl">chevron_right</span></button>
                            </div>
                        </div>
                        <div id="calendarGrid" class="grid grid-cols-7 gap-1 text-center text-sm"></div>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
                        <h3 class="font-bold text-slate-custom mb-3">Available Time Slots</h3>
                        <div id="timeSlots" class="flex flex-wrap gap-2"></div>
                        <p id="noSlots" class="text-cool-gray text-sm hidden">Select a date to see available times.</p>
                    </div>
                    <a href="#" id="backToStep1" class="inline-block mt-6 text-primary font-bold text-sm">← Back to Information</a>
                </div>

                <!-- Step 3 -->
                <div id="step3" class="booking-step hidden">
                    <h2 class="text-2xl font-black text-slate-custom mb-1">Final Review</h2>
                    <p class="text-cool-gray mb-8">Please verify your appointment details before confirming.</p>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6 mb-6">
                        <h3 class="font-bold text-slate-custom mb-4 flex items-center gap-2"><span class="material-symbols-outlined text-primary">check_circle</span> Appointment Details</h3>
                        <p class="text-sm text-slate-custom"><span class="text-cool-gray font-medium">SERVICE:</span> <span id="reviewService"></span></p>
                        <p class="text-sm text-slate-custom mt-2"><span class="text-cool-gray font-medium">SPECIALIST:</span> <span id="reviewSpecialist"></span></p>
                        <p class="text-sm text-slate-custom mt-2"><span class="text-cool-gray font-medium">DATE & TIME:</span> <span id="reviewDateTime"></span></p>
                    </div>
                    <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
                        <h3 class="font-bold text-slate-custom mb-4 flex items-center gap-2"><span class="material-symbols-outlined text-primary">person</span> Client Information</h3>
                        <p class="text-sm text-slate-custom"><span class="text-cool-gray font-medium">FULL NAME:</span> <span id="reviewName"></span></p>
                        <p class="text-sm text-slate-custom mt-2"><span class="text-cool-gray font-medium">PHONE NUMBER:</span> <span id="reviewPhoneMask"></span></p>
                    </div>
                    <a href="#" id="backToStep2" class="inline-block mt-6 text-primary font-bold text-sm">← Back to Schedule</a>
                </div>
            </div>

            <!-- Right: Booking Summary -->
            <div class="lg:col-span-1">
                <div id="summaryCard" class="sticky top-28 rounded-2xl bg-gradient-to-br from-primary/15 to-primary/5 border border-primary/10 p-6 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-24 h-24 opacity-20 bg-white rounded-bl-full"></div>
                    <p class="text-xs font-bold text-cool-gray uppercase tracking-wider mb-1">REVIEW SELECTION</p>
                    <h3 class="text-xl font-black text-slate-custom mb-6">Booking Summary</h3>
                    <div class="space-y-4 text-sm">
                        <p class="flex items-center gap-2"><span class="material-symbols-outlined text-primary text-lg">spa</span> <span class="text-cool-gray font-medium">SELECTED SERVICE</span></p>
                        <p id="summaryService" class="font-bold text-slate-custom pl-7">--</p>
                        <p class="flex items-center gap-2 mt-4"><span class="material-symbols-outlined text-primary text-lg">medical_services</span> <span class="text-cool-gray font-medium">SPECIALIST</span></p>
                        <p id="summarySpecialist" class="font-bold text-slate-custom pl-7">--</p>
                        <p class="flex items-center gap-2 mt-4" id="summaryDateLabel"><span class="material-symbols-outlined text-primary text-lg">calendar_today</span> <span class="text-cool-gray font-medium">SELECTED DATE & TIME</span></p>
                        <p id="summaryDateTime" class="font-bold text-slate-custom pl-7">--</p>
                        <p class="text-cool-gray font-medium mt-4">Total Price</p>
                        <p id="summaryPrice" class="text-2xl font-black text-primary">--</p>
                    </div>
                    <button type="button" id="btnNextStep1" class="mt-6 w-full py-4 bg-primary text-white font-bold rounded-xl hover:shadow-lg hover:shadow-primary/30 transition-all flex items-center justify-center gap-2">
                        Next: Choose Date & Time <span class="material-symbols-outlined text-xl">arrow_forward</span>
                    </button>
                    <button type="button" id="btnNextStep2" class="mt-6 w-full py-4 bg-primary text-white font-bold rounded-xl hover:shadow-lg hover:shadow-primary/30 transition-all hidden items-center justify-center gap-2">
                        Next: Review & Confirm <span class="material-symbols-outlined text-xl">arrow_forward</span>
                    </button>
                    <button type="button" id="btnConfirmBooking" class="mt-6 w-full py-4 bg-primary text-white font-bold rounded-xl hover:shadow-lg hover:shadow-primary/30 transition-all hidden items-center justify-center gap-2">
                        Confirm Booking <span class="material-symbols-outlined text-xl">check</span>
                    </button>
                    <p class="text-xs text-cool-gray mt-4">No payment required at this step.</p>
                    <p id="termsNote" class="text-xs text-cool-gray mt-2 hidden">By confirming, you agree to our booking terms.</p>
                </div>
            </div>
        </div>
    </main>

    <!-- Confirmation Modal -->
    <div id="confirmModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/50 backdrop-blur-sm">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-8 text-center">
            <div class="w-16 h-16 rounded-full bg-green-500 flex items-center justify-center mx-auto mb-6">
                <span class="material-symbols-outlined text-white text-4xl">check</span>
            </div>
            <h2 class="text-2xl font-black text-slate-custom mb-2">Booking Confirmed!</h2>
            <p class="text-cool-gray mb-6">A confirmation SMS has been sent to your phone. We look forward to seeing you.</p>
            <a href="#" id="viewSchedule" class="block w-full py-4 bg-primary text-white font-bold rounded-xl mb-3">View My Schedule</a>
            <a href="home.php" class="block text-primary font-bold text-sm">Return to Home</a>
            <p class="flex items-center justify-center gap-2 mt-6 text-sm text-cool-gray">
                <span class="material-symbols-outlined text-lg">tag</span> BOOKING ID: <span id="bookingIdDisplay" class="font-mono font-bold">--</span>
            </p>
        </div>
    </div>

    <!-- Footer -->
    <footer class="border-t border-slate-100 bg-white py-8 mt-auto">
        <div class="max-w-6xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-4 text-xs font-bold text-cool-gray uppercase tracking-widest">
            <p class="flex items-center gap-2"><span class="material-symbols-outlined text-primary">shield</span> Secure Booking System © 2024 Elysian Skin Clinic</p>
            <div class="flex gap-6">
                <a href="#" class="hover:text-primary">Privacy Policy</a>
                <a href="#" class="hover:text-primary">Terms of Service</a>
                <a href="contact.php" class="hover:text-primary">Contact Us</a>
            </div>
        </div>
    </footer>

    <script>
(function() {
    const step1 = document.getElementById('step1');
    const step2 = document.getElementById('step2');
    const step3 = document.getElementById('step3');
    const summaryCard = document.getElementById('summaryCard');
    const btnNextStep1 = document.getElementById('btnNextStep1');
    const btnNextStep2 = document.getElementById('btnNextStep2');
    const btnConfirmBooking = document.getElementById('btnConfirmBooking');
    const confirmModal = document.getElementById('confirmModal');
    const summaryDateLabel = document.getElementById('summaryDateLabel');
    const termsNote = document.getElementById('termsNote');

    let currentStep = 1;
    let services = [];
    let specialists = [];
    let selectedDate = null;
    let selectedTime = null;
    var now = new Date();
    let calendarYear = now.getFullYear();
    let calendarMonth = now.getMonth();
    const presetServiceId = '<?= addslashes($service_id) ?>';

    function showStep(step) {
        currentStep = step;
        step1.classList.toggle('hidden', step !== 1);
        step2.classList.toggle('hidden', step !== 2);
        step3.classList.toggle('hidden', step !== 3);
        btnNextStep1.classList.toggle('hidden', step !== 1);
        btnNextStep2.classList.toggle('hidden', step !== 2);
        btnConfirmBooking.classList.toggle('hidden', step !== 3);
        termsNote.classList.toggle('hidden', step !== 3);
        summaryDateLabel.querySelector('span').textContent = step === 3 ? 'TIME' : 'SELECTED DATE & TIME';
        document.querySelectorAll('.step-tab').forEach(function(t) {
            const s = parseInt(t.getAttribute('data-step'), 10);
            const line = t.querySelector('.step-line');
            const label = t.querySelector('span:first-child');
            if (s <= step) {
                label.classList.remove('text-slate-custom/70'); label.classList.add('text-primary');
                if (line) { line.classList.remove('bg-slate-200'); line.classList.add('bg-primary'); }
            } else {
                label.classList.add('text-slate-custom/70'); label.classList.remove('text-primary');
                if (line) { line.classList.add('bg-slate-200'); line.classList.remove('bg-primary'); }
            }
        });
        if (step === 3) fillReview();
        if (step === 2 && selectedDate) loadSlots(selectedDate);
    }

    function getData() {
        const sid = document.getElementById('selectTreatment').value;
        const svc = services.find(function(s) { return s.id === sid; });
        const specId = document.getElementById('selectSpecialist').value;
        const spec = specialists.find(function(s) { return String(s.id) === specId; });
        return {
            fullName: document.getElementById('fullName').value.trim(),
            phone: document.getElementById('phone').value.trim(),
            serviceId: sid,
            serviceName: svc ? svc.name : '',
            servicePrice: svc ? svc.price : '',
            specialistId: spec ? spec.id : null,
            specialistName: spec ? spec.name : '',
            date: selectedDate,
            time: selectedTime
        };
    }

    function updateSummary() {
        const d = getData();
        document.getElementById('summaryService').textContent = d.serviceName || '--';
        document.getElementById('summarySpecialist').textContent = d.specialistName || '--';
        document.getElementById('summaryPrice').textContent = d.servicePrice || '--';
        if (d.date && d.time) {
            const dateStr = formatDisplayDate(d.date);
            document.getElementById('summaryDateTime').textContent = dateStr + ' at ' + d.time;
        } else {
            document.getElementById('summaryDateTime').textContent = '--';
        }
    }

    function formatDisplayDate(ymd) {
        if (!ymd) return '';
        const [y, m, d] = ymd.split('-');
        const months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
        return months[parseInt(m,10)-1] + ' ' + parseInt(d,10) + ', ' + y;
    }

    function fillReview() {
        const d = getData();
        document.getElementById('reviewService').textContent = d.serviceName || '--';
        document.getElementById('reviewSpecialist').textContent = d.specialistName || '--';
        document.getElementById('reviewDateTime').textContent = (d.date && d.time) ? (formatDisplayDate(d.date) + ' at ' + d.time) : '--';
        document.getElementById('reviewName').textContent = d.fullName || '--';
        const phone = d.phone || '';
        const mask = phone.length > 6 ? phone.slice(0, 4) + '••••••' + phone.slice(-2) : phone;
        document.getElementById('reviewPhoneMask').textContent = mask || '--';
    }

    async function loadServices() {
        const r = await fetch('../backend/get_services.php');
        const j = await r.json();
        if (j.success && j.data) services = j.data;
        const sel = document.getElementById('selectTreatment');
        sel.innerHTML = '<option value="">-- Choose treatment --</option>' + services.map(function(s) {
            return '<option value="' + s.id + '">' + s.name + '</option>';
        }).join('');
        if (presetServiceId && services.some(function(s) { return s.id === presetServiceId; })) {
            sel.value = presetServiceId;
        }
        updateSummary();
    }

    async function loadSpecialists() {
        const r = await fetch('../backend/get_specialists.php');
        const j = await r.json();
        if (j.success && j.data) specialists = j.data;
        const sel = document.getElementById('selectSpecialist');
        sel.innerHTML = '<option value="">-- Choose specialist --</option>' + specialists.map(function(s) {
            return '<option value="' + s.id + '">' + s.name + ' - ' + (s.title || '') + '</option>';
        }).join('');
        updateSummary();
    }

    function renderCalendar() {
        const label = document.getElementById('calendarMonthLabel');
        const months = ['January','February','March','April','May','June','July','August','September','October','November','December'];
        label.textContent = months[calendarMonth] + ' ' + calendarYear;
        const first = new Date(calendarYear, calendarMonth, 1);
        const last = new Date(calendarYear, calendarMonth + 1, 0);
        const startPad = (first.getDay() + 6) % 7;
        const days = ['MON','TUE','WED','THU','FRI','SAT','SUN'];
        let html = days.map(function(d) { return '<div class="font-bold text-cool-gray text-xs">' + d + '</div>'; }).join('');
        for (let i = 0; i < startPad; i++) html += '<div class="p-2 text-slate-300">' + (new Date(calendarYear, calendarMonth, -startPad + i + 1).getDate()) + '</div>';
        const today = new Date();
        today.setHours(0,0,0,0);
        for (let d = 1; d <= last.getDate(); d++) {
            const date = new Date(calendarYear, calendarMonth, d);
            const ymd = date.getFullYear() + '-' + String(date.getMonth()+1).padStart(2,'0') + '-' + String(d).padStart(2,'0');
            const isPast = date < today;
            const isSelected = selectedDate === ymd;
            let cls = 'p-2 rounded-full text-sm cursor-pointer ';
            if (isPast) cls += 'text-slate-300 cursor-not-allowed';
            else if (isSelected) cls += 'bg-primary text-white';
            else cls += 'hover:bg-primary/10 text-slate-custom';
            html += '<button type="button" class="' + cls + '" data-date="' + ymd + '" ' + (isPast ? 'disabled' : '') + '>' + d + '</button>';
        }
        const rest = 7 - ((startPad + last.getDate()) % 7);
        if (rest < 7) for (let i = 1; i <= rest; i++) html += '<div class="p-2 text-slate-300">' + i + '</div>';
        document.getElementById('calendarGrid').innerHTML = html;
        document.querySelectorAll('#calendarGrid button[data-date]').forEach(function(btn) {
            btn.addEventListener('click', function() {
                selectedDate = this.getAttribute('data-date');
                renderCalendar();
                loadSlots(selectedDate);
                updateSummary();
            });
        });
    }

    async function loadSlots(date) {
        const container = document.getElementById('timeSlots');
        const noSlots = document.getElementById('noSlots');
        container.innerHTML = '';
        noSlots.classList.add('hidden');
        if (!date) { noSlots.classList.remove('hidden'); noSlots.textContent = 'Select a date to see available times.'; return; }
        const serviceId = document.getElementById('selectTreatment').value || '';
        const specialistId = document.getElementById('selectSpecialist').value || '0';
        const r = await fetch('../backend/get_slots.php?date=' + encodeURIComponent(date) + '&service_id=' + encodeURIComponent(serviceId) + '&specialist_id=' + encodeURIComponent(specialistId));
        const j = await r.json();
        if (!j.success || !j.data || j.data.length === 0) {
            noSlots.classList.remove('hidden');
            noSlots.textContent = 'No slots available for this date.';
            return;
        }
        j.data.forEach(function(t) {
            const btn = document.createElement('button');
            btn.type = 'button';
            btn.className = 'px-4 py-2 rounded-xl border text-sm font-medium ' + (selectedTime === t ? 'border-primary text-primary bg-primary/5' : 'border-slate-200 text-slate-custom hover:border-primary hover:text-primary');
            btn.textContent = t;
            btn.addEventListener('click', function() {
                selectedTime = t;
                loadSlots(date);
                updateSummary();
            });
            container.appendChild(btn);
        });
    }

    document.getElementById('calPrev').addEventListener('click', function() {
        if (calendarMonth === 0) { calendarMonth = 11; calendarYear--; } else calendarMonth--;
        renderCalendar();
    });
    document.getElementById('calNext').addEventListener('click', function() {
        if (calendarMonth === 11) { calendarMonth = 0; calendarYear++; } else calendarMonth++;
        renderCalendar();
    });

    function validateStep1() {
        const d = getData();
        if (!d.fullName) { alert('Please enter your full name.'); return false; }
        if (!d.phone) { alert('Please enter your phone number.'); return false; }
        if (!d.serviceId) { alert('Please select a treatment.'); return false; }
        if (!d.specialistId) { alert('Please select a specialist.'); return false; }
        return true;
    }

    function validateStep2() {
        const d = getData();
        if (!d.date) { alert('Please select a date.'); return false; }
        if (!d.time) { alert('Please select a time slot.'); return false; }
        return true;
    }

    btnNextStep1.addEventListener('click', function() {
        if (!validateStep1()) return;
        showStep(2);
        renderCalendar();
        if (selectedDate) loadSlots(selectedDate);
    });

    btnNextStep2.addEventListener('click', function() {
        if (!validateStep2()) return;
        showStep(3);
    });

    btnConfirmBooking.addEventListener('click', async function() {
        const d = getData();
        if (!d.fullName || !d.phone || !d.serviceId || !d.serviceName || !d.specialistId || !d.specialistName || !d.date || !d.time || !d.servicePrice) {
            alert('Please complete all steps.');
            return;
        }
        this.disabled = true;
        try {
            const r = await fetch('../backend/create_booking.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    customer_name: d.fullName,
                    customer_phone: d.phone,
                    service_id: d.serviceId,
                    service_name: d.serviceName,
                    specialist_id: d.specialistId,
                    specialist_name: d.specialistName,
                    appointment_date: d.date,
                    appointment_time: d.time,
                    total_price: d.servicePrice
                })
            });
            const j = await r.json();
            if (j.success && j.booking_id) {
                document.getElementById('bookingIdDisplay').textContent = j.booking_id;
                confirmModal.classList.remove('hidden');
                confirmModal.classList.add('flex');
            } else {
                alert(j.message || 'Booking failed.');
            }
        } catch (e) {
            alert('Network error. Please try again.');
        }
        this.disabled = false;
    });

    document.querySelectorAll('.step-tab').forEach(function(t) {
        t.addEventListener('click', function(e) {
            e.preventDefault();
            const s = parseInt(this.getAttribute('data-step'), 10);
            if (s === 1 || (s === 2 && validateStep1()) || (s === 3 && validateStep1() && validateStep2())) showStep(s);
        });
    });

    document.getElementById('selectTreatment').addEventListener('change', updateSummary);
    document.getElementById('selectSpecialist').addEventListener('change', updateSummary);
    document.getElementById('fullName').addEventListener('input', updateSummary);
    document.getElementById('phone').addEventListener('input', updateSummary);

    document.getElementById('backToStep1').addEventListener('click', function(e) { e.preventDefault(); showStep(1); });
    document.getElementById('backToStep2').addEventListener('click', function(e) { e.preventDefault(); showStep(2); });

    document.getElementById('viewSchedule').addEventListener('click', function(e) {
        e.preventDefault();
        window.location.href = 'home.php';
    });

    loadServices().then(loadSpecialists).then(function() {
        renderCalendar();
        updateSummary();
    });
})();
    </script>
</body>
</html>
