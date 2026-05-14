<?php
require_once __DIR__ . '/../backend/db.php';

$currentUser = getCurrentUser();
$service_id = isset($_GET['id']) ? trim((string)$_GET['id']) : '';

if (!$currentUser || ($currentUser['role'] ?? '') !== 'patient') {
    header('Location: signin.php?redirect=booking.php');
    exit;
}

$esc = static function ($value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
};

$userName = trim((string)($currentUser['full_name'] ?? ''));
// Clean phone number - only keep digits, then format
$rawPhone = trim((string)($currentUser['phone'] ?? ''));
$userPhone = preg_replace('/\D/', '', $rawPhone);

$icon = static function (string $name, string $class = 'h-5 w-5'): string {
    $icons = [
        'arrow' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'check' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M20 6 9 17l-5-5" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'chevron-left' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m15 18-6-6 6-6" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'chevron-right' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m9 18 6-6-6-6" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'calendar' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M7 3v3M17 3v3M4 9h16M6 5h12a2 2 0 0 1 2 2v11a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V7a2 2 0 0 1 2-2Z" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'clock' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2.1"/><path d="M12 7v5l3 2" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'user' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="8" r="4" stroke="currentColor" stroke-width="2.1"/><path d="M4.5 21a7.5 7.5 0 0 1 15 0" stroke="currentColor" stroke-width="2.1" stroke-linecap="round"/></svg>',
        'phone' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M6.6 3.5 9.2 8c.4.7.3 1.5-.3 2.1l-1.1 1.1a13.5 13.5 0 0 0 5 5l1.1-1.1c.6-.6 1.4-.7 2.1-.3l4.5 2.6c.8.5 1.1 1.4.8 2.3-.5 1.5-1.9 2.6-3.5 2.6C9.1 22.3 1.7 14.9 1.7 6.2c0-1.6 1.1-3 2.6-3.5.9-.3 1.8 0 2.3.8Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>',
        'sparkle' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 2l1.7 6.3L20 10l-6.3 1.7L12 18l-1.7-6.3L4 10l6.3-1.7L12 2Z" fill="currentColor"/><path d="M18.5 15l.8 3.2 3.2.8-3.2.8-.8 3.2-.8-3.2-3.2-.8 3.2-.8.8-3.2Z" fill="currentColor"/></svg>',
        'doctor' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="7" r="4" stroke="currentColor" stroke-width="2.1"/><path d="M4.5 21a7.5 7.5 0 0 1 15 0" stroke="currentColor" stroke-width="2.1" stroke-linecap="round"/><path d="M12 14v5M9.5 16.5h5" stroke="currentColor" stroke-width="2.1" stroke-linecap="round"/></svg>',
        'info' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2.1"/><path d="M12 10.5V17M12 7h.01" stroke="currentColor" stroke-width="2.8" stroke-linecap="round"/></svg>',
        'mail' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 6h16v12H4V6Z" stroke="currentColor" stroke-width="2.1" stroke-linejoin="round"/><path d="m4 7 8 6 8-6" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'location' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 21s7-5.6 7-12a7 7 0 1 0-14 0c0 6.4 7 12 7 12Z" stroke="currentColor" stroke-width="2.1"/><circle cx="12" cy="9" r="2.4" fill="currentColor"/></svg>',
    ];

    return $icons[$name] ?? '';
};
?>
<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Booking | Elysian Skin Clinic</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet"/>

    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#0db9f2",
                        "primary-soft": "#E7F8FE",
                        "background-light": "#FFFFFF",
                        "slate-heading": "#33475B",
                        "cool-gray": "#64748B",
                        "clinic-navy": "#0F1F3D"
                    },
                    fontFamily: {
                        display: ["Manrope", "sans-serif"]
                    },
                    boxShadow: {
                        soft: "0 24px 70px rgba(15, 31, 61, 0.10)",
                        glow: "0 24px 60px rgba(13, 185, 242, 0.22)"
                    },
                    borderRadius: {
                        "4xl": "2rem",
                        "5xl": "2.5rem"
                    }
                }
            }
        }
    </script>

    <style type="text/tailwindcss">
        body {
            font-family: 'Manrope', sans-serif;
            background:
                radial-gradient(circle at top left, rgba(13, 185, 242, 0.10), transparent 34%),
                radial-gradient(circle at 85% 10%, rgba(125, 211, 252, 0.16), transparent 30%),
                #FFFFFF;
        }

        .section-label {
            @apply text-xs font-black uppercase tracking-[0.34em] text-primary;
        }

        .input-label {
            @apply mb-2 block text-sm font-black text-slate-heading;
        }

        .input-field {
            @apply w-full rounded-2xl border border-slate-200 bg-white px-5 py-4 text-sm font-bold text-slate-heading outline-none transition focus:border-primary focus:ring-4 focus:ring-primary/10;
        }

        .input-field-error {
            @apply border-red-300 bg-red-50 focus:border-red-400 focus:ring-red-100;
        }

        .soft-card {
            @apply rounded-[2rem] border border-slate-100 bg-white shadow-[0_18px_55px_rgba(15,31,61,0.08)];
        }

        .step-pill {
            @apply flex items-center gap-3 rounded-full border px-4 py-3 text-sm font-black transition-all;
        }

        .step-pill-active {
            @apply border-primary bg-primary text-white shadow-[0_14px_35px_rgba(13,185,242,0.25)];
        }

        .step-pill-inactive {
            @apply border-slate-200 bg-white text-cool-gray;
        }

        .calendar-day {
            @apply flex aspect-square items-center justify-center rounded-2xl text-sm font-black transition-all;
        }

        .calendar-day-disabled {
            @apply cursor-not-allowed bg-slate-50 text-slate-300;
        }

        .calendar-day-enabled {
            @apply cursor-pointer bg-white text-slate-heading hover:bg-primary-soft hover:text-primary;
        }

        .calendar-day-selected {
            @apply bg-primary text-white shadow-[0_14px_35px_rgba(13,185,242,0.25)] hover:bg-primary hover:text-white;
        }
    </style>
</head>

<body class="min-h-screen bg-white text-slate-900 font-display antialiased">
    <?php include __DIR__ . '/public_navbar.php'; ?>

    <main>
        <!-- Hero -->
        <section class="relative overflow-hidden py-12 lg:py-16">
            <div class="container mx-auto px-6">
                <div class="relative overflow-hidden rounded-[2.5rem] border border-sky-100 bg-gradient-to-br from-sky-50 via-white to-primary-soft p-8 shadow-soft lg:p-12">
                    <div class="absolute -right-20 -top-20 h-80 w-80 rounded-full bg-primary/20 blur-3xl"></div>
                    <div class="absolute -bottom-24 -left-24 h-80 w-80 rounded-full bg-sky-200/30 blur-3xl"></div>

                    <div class="relative grid gap-8 lg:grid-cols-[1fr_auto] lg:items-end">
                        <div>
                            <div class="mb-5 inline-flex items-center gap-2 rounded-full border border-sky-100 bg-white/80 px-4 py-2 shadow-sm">
                                <span class="h-2 w-2 rounded-full bg-primary"></span>
                                <span class="text-xs font-black uppercase tracking-[0.22em] text-primary">Booking</span>
                            </div>

                            <h1 class="max-w-4xl text-5xl font-black leading-[1.04] tracking-[-0.055em] text-slate-heading lg:text-7xl">
                                Book your <span class="text-primary">Elysian</span> appointment.
                            </h1>
                            <p class="mt-5 max-w-2xl text-lg font-medium leading-8 text-cool-gray">
                                Choose your treatment, pick a suitable specialist, then confirm your appointment in three simple steps.
                            </p>
                        </div>

                        <div class="grid grid-cols-3 gap-3 lg:w-[420px]">
                            <div class="rounded-3xl border border-slate-100 bg-white p-5 shadow-sm">
                                <p class="text-3xl font-black text-slate-heading">01</p>
                                <p class="mt-1 text-xs font-bold text-cool-gray">Information</p>
                            </div>
                            <div class="rounded-3xl border border-slate-100 bg-white p-5 shadow-sm">
                                <p class="text-3xl font-black text-slate-heading">02</p>
                                <p class="mt-1 text-xs font-bold text-cool-gray">Schedule</p>
                            </div>
                            <div class="rounded-3xl border border-slate-100 bg-white p-5 shadow-sm">
                                <p class="text-3xl font-black text-slate-heading">03</p>
                                <p class="mt-1 text-xs font-bold text-cool-gray">Confirm</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Booking -->
        <section class="pb-16 lg:pb-20">
            <div class="container mx-auto px-6">
                <div class="mb-8 flex flex-wrap gap-3">
                    <button type="button" data-step="1" class="step-tab step-pill step-pill-active">
                        <span class="flex h-8 w-8 items-center justify-center rounded-full bg-white/20">1</span>
                        Information
                    </button>
                    <button type="button" data-step="2" class="step-tab step-pill step-pill-inactive">
                        <span class="flex h-8 w-8 items-center justify-center rounded-full bg-slate-100">2</span>
                        Schedule
                    </button>
                    <button type="button" data-step="3" class="step-tab step-pill step-pill-inactive">
                        <span class="flex h-8 w-8 items-center justify-center rounded-full bg-slate-100">3</span>
                        Confirm
                    </button>
                </div>

                <div class="grid gap-8 lg:grid-cols-[1.35fr_0.75fr]">
                    <!-- Left content -->
                    <div class="space-y-6">
                        <!-- Step 1 -->
                        <section id="step1" class="booking-step soft-card p-7 lg:p-8">
                            <div class="mb-8">
                                <p class="section-label">Step 1</p>
                                <h2 class="mt-3 text-3xl font-black tracking-[-0.04em] text-slate-heading lg:text-4xl">
                                    Information & treatment selection.
                                </h2>
                                <p class="mt-3 text-cool-gray leading-7">
                                    Tell us who you are and which skincare service you want to book.
                                </p>
                            </div>

                            <div class="grid gap-5 md:grid-cols-2">
                                <div>
                                    <label class="input-label" for="fullName">Full Name *</label>
                                    <input
                                        type="text"
                                        id="fullName"
                                        value="<?= $esc($userName); ?>"
                                        placeholder="Enter your full name"
                                        class="input-field"
                                        required
                                    />
                                </div>

                                <div>
                                    <label class="input-label" for="phone">Phone Number *</label>
                                    <input
                                        type="tel"
                                        id="phone"
                                        value="<?= $esc($userPhone); ?>"
                                        pattern="0[0-9]{9}"
                                        title="Số điện thoại phải bắt đầu bằng 0 và có đúng 10 chữ số (VD: 0912345678)"
                                        placeholder="0912345678"
                                        maxlength="10"
                                        class="input-field phone-input"
                                        required
                                    />
                                    <p id="phone-error" class="mt-2 hidden text-xs font-bold text-red-500">
                                        Số điện thoại cần có 10 số và bắt đầu bằng 0.
                                    </p>
                                </div>

                                <div>
                                    <label class="input-label" for="selectTreatment">Select Treatment *</label>
                                    <select id="selectTreatment" class="input-field">
                                        <option value="">Loading treatments...</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="input-label" for="selectSpecialist">Select Specialist *</label>
                                    <select id="selectSpecialist" class="input-field">
                                        <option value="">Loading specialists...</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mt-8 rounded-[2rem] bg-slate-50 p-5">
                                <div class="flex items-start gap-4">
                                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-primary-soft text-primary">
                                        <?= $icon('info', 'h-6 w-6'); ?>
                                    </div>
                                    <div>
                                        <p class="font-black text-slate-heading">No payment required now</p>
                                        <p class="mt-1 text-sm font-medium leading-6 text-cool-gray">
                                            The clinic team will confirm the appointment and guide you through the next step.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <!-- Step 2 -->
                        <section id="step2" class="booking-step soft-card hidden p-7 lg:p-8">
                            <div class="mb-8">
                                <p class="section-label">Step 2</p>
                                <h2 class="mt-3 text-3xl font-black tracking-[-0.04em] text-slate-heading lg:text-4xl">
                                    Choose date & time.
                                </h2>
                                <p class="mt-3 text-cool-gray leading-7">
                                    Select an available date first, then pick one of the available time slots.
                                </p>
                            </div>

                            <div class="grid gap-6 xl:grid-cols-[1fr_0.85fr]">
                                <div class="rounded-[2rem] border border-slate-100 bg-slate-50 p-5">
                                    <div class="mb-5 flex items-center justify-between gap-4">
                                        <h3 id="calendarMonthLabel" class="text-xl font-black text-slate-heading">Month</h3>
                                        <div class="flex gap-2">
                                            <button type="button" id="calPrev" class="flex h-11 w-11 items-center justify-center rounded-full bg-white text-slate-heading shadow-sm hover:text-primary">
                                                <?= $icon('chevron-left', 'h-5 w-5'); ?>
                                            </button>
                                            <button type="button" id="calNext" class="flex h-11 w-11 items-center justify-center rounded-full bg-white text-slate-heading shadow-sm hover:text-primary">
                                                <?= $icon('chevron-right', 'h-5 w-5'); ?>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="mb-3 grid grid-cols-7 gap-2 text-center text-xs font-black uppercase tracking-[0.15em] text-cool-gray">
                                        <span>Sun</span>
                                        <span>Mon</span>
                                        <span>Tue</span>
                                        <span>Wed</span>
                                        <span>Thu</span>
                                        <span>Fri</span>
                                        <span>Sat</span>
                                    </div>

                                    <div id="calendarGrid" class="grid grid-cols-7 gap-2"></div>
                                </div>

                                <div class="rounded-[2rem] border border-slate-100 bg-white p-5 shadow-sm">
                                    <div class="mb-5 flex items-start justify-between gap-4">
                                        <div>
                                            <p class="text-xs font-black uppercase tracking-[0.22em] text-primary">Available Time</p>
                                            <h3 class="mt-2 text-xl font-black text-slate-heading">Time Slots</h3>
                                        </div>
                                        <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-primary-soft text-primary">
                                            <?= $icon('clock', 'h-6 w-6'); ?>
                                        </div>
                                    </div>

                                    <div id="timeSlots" class="grid grid-cols-2 gap-2"></div>

                                    <p id="noSlots" class="rounded-3xl bg-slate-50 p-5 text-sm font-semibold leading-6 text-cool-gray">
                                        Select a date to see available times.
                                    </p>
                                </div>
                            </div>

                            <button type="button" id="backToStep1" class="mt-7 inline-flex items-center gap-2 text-sm font-black text-primary">
                                <?= $icon('chevron-left', 'h-4 w-4'); ?>
                                Back to Information
                            </button>
                        </section>

                        <!-- Step 3 -->
                        <section id="step3" class="booking-step soft-card hidden p-7 lg:p-8">
                            <div class="mb-8">
                                <p class="section-label">Step 3</p>
                                <h2 class="mt-3 text-3xl font-black tracking-[-0.04em] text-slate-heading lg:text-4xl">
                                    Review & confirm.
                                </h2>
                                <p class="mt-3 text-cool-gray leading-7">
                                    Please check your appointment details before submitting your booking.
                                </p>
                            </div>

                            <div class="grid gap-5 md:grid-cols-2">
                                <div class="rounded-[2rem] border border-slate-100 bg-slate-50 p-6">
                                    <div class="mb-5 flex h-12 w-12 items-center justify-center rounded-2xl bg-primary-soft text-primary">
                                        <?= $icon('calendar', 'h-7 w-7'); ?>
                                    </div>
                                    <p class="text-xs font-black uppercase tracking-[0.2em] text-primary">Appointment</p>
                                    <div class="mt-4 space-y-3 text-sm font-bold text-slate-heading">
                                        <p><span class="text-cool-gray">Service:</span> <span id="reviewService"></span></p>
                                        <p><span class="text-cool-gray">Specialist:</span> <span id="reviewSpecialist"></span></p>
                                        <p><span class="text-cool-gray">Date & Time:</span> <span id="reviewDateTime"></span></p>
                                    </div>
                                </div>

                                <div class="rounded-[2rem] border border-slate-100 bg-slate-50 p-6">
                                    <div class="mb-5 flex h-12 w-12 items-center justify-center rounded-2xl bg-primary-soft text-primary">
                                        <?= $icon('user', 'h-7 w-7'); ?>
                                    </div>
                                    <p class="text-xs font-black uppercase tracking-[0.2em] text-primary">Client</p>
                                    <div class="mt-4 space-y-3 text-sm font-bold text-slate-heading">
                                        <p><span class="text-cool-gray">Full Name:</span> <span id="reviewName"></span></p>
                                        <p><span class="text-cool-gray">Phone:</span> <span id="reviewPhoneMask"></span></p>
                                    </div>
                                </div>
                            </div>

                            <button type="button" id="backToStep2" class="mt-7 inline-flex items-center gap-2 text-sm font-black text-primary">
                                <?= $icon('chevron-left', 'h-4 w-4'); ?>
                                Back to Schedule
                            </button>
                        </section>
                    </div>

                    <!-- Summary -->
                    <aside class="lg:sticky lg:top-28 lg:self-start">
                        <div id="summaryCard" class="overflow-hidden rounded-[2.5rem] border border-sky-100 bg-gradient-to-br from-white via-sky-50 to-primary-soft shadow-soft">
                            <div class="bg-clinic-navy p-7 text-white">
                                <p class="text-xs font-black uppercase tracking-[0.28em] text-primary">Review Selection</p>
                                <h3 class="mt-3 text-3xl font-black tracking-[-0.04em]">Booking Summary</h3>
                                <p class="mt-2 text-sm font-semibold leading-6 text-white/60">
                                    Your selected service, specialist, and schedule will appear here.
                                </p>
                            </div>

                            <div class="space-y-5 p-7">
                                <div>
                                    <p class="flex items-center gap-2 text-xs font-black uppercase tracking-[0.18em] text-cool-gray">
                                        <span class="text-primary"><?= $icon('sparkle', 'h-4 w-4'); ?></span>
                                        Selected Service
                                    </p>
                                    <p id="summaryService" class="mt-2 text-base font-black text-slate-heading">--</p>
                                </div>

                                <div>
                                    <p class="flex items-center gap-2 text-xs font-black uppercase tracking-[0.18em] text-cool-gray">
                                        <span class="text-primary"><?= $icon('doctor', 'h-4 w-4'); ?></span>
                                        Specialist
                                    </p>
                                    <p id="summarySpecialist" class="mt-2 text-base font-black text-slate-heading">--</p>
                                </div>

                                <div>
                                    <p class="flex items-center gap-2 text-xs font-black uppercase tracking-[0.18em] text-cool-gray">
                                        <span class="text-primary"><?= $icon('calendar', 'h-4 w-4'); ?></span>
                                        Date & Time
                                    </p>
                                    <p id="summaryDateTime" class="mt-2 text-base font-black text-slate-heading">--</p>
                                </div>

                                <div class="rounded-[2rem] bg-white p-5 shadow-sm">
                                    <p class="text-xs font-black uppercase tracking-[0.18em] text-cool-gray">Total Price</p>
                                    <p id="summaryPrice" class="mt-2 text-3xl font-black text-primary">--</p>
                                </div>

                                <button type="button" id="btnNextStep1" class="inline-flex w-full items-center justify-center gap-2 rounded-full bg-primary px-6 py-4 font-black text-white shadow-[0_18px_45px_rgba(13,185,242,0.28)] transition hover:-translate-y-0.5">
                                    Next: Choose Date
                                    <?= $icon('arrow', 'h-5 w-5'); ?>
                                </button>

                                <button type="button" id="btnNextStep2" class="hidden w-full items-center justify-center gap-2 rounded-full bg-primary px-6 py-4 font-black text-white shadow-[0_18px_45px_rgba(13,185,242,0.28)] transition hover:-translate-y-0.5">
                                    Next: Review
                                    <?= $icon('arrow', 'h-5 w-5'); ?>
                                </button>

                                <button type="button" id="btnConfirmBooking" class="hidden w-full items-center justify-center gap-2 rounded-full bg-primary px-6 py-4 font-black text-white shadow-[0_18px_45px_rgba(13,185,242,0.28)] transition hover:-translate-y-0.5">
                                    Confirm Booking
                                    <?= $icon('check', 'h-5 w-5'); ?>
                                </button>

                                <p id="booking-status" class="min-h-[1.25rem] text-center text-sm font-bold text-cool-gray"></p>

                                <p class="rounded-3xl bg-white/70 p-4 text-xs font-semibold leading-5 text-cool-gray">
                                    No payment required at this step. By confirming, you agree to Elysian booking terms.
                                </p>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </section>
    </main>

    <!-- Confirmation Modal -->
    <div id="confirmModal" class="fixed inset-0 z-[999] hidden items-center justify-center bg-clinic-navy/70 p-4 backdrop-blur-sm">
        <div class="w-full max-w-lg rounded-[2.5rem] bg-white p-8 text-center shadow-2xl">
            <div class="mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-[2rem] bg-emerald-500 text-white shadow-[0_18px_45px_rgba(16,185,129,0.25)]">
                <?= $icon('check', 'h-10 w-10'); ?>
            </div>

            <p class="section-label">Booking Confirmed</p>
            <h2 class="mt-3 text-3xl font-black tracking-[-0.04em] text-slate-heading">
                Your appointment is booked.
            </h2>
            <p class="mt-3 text-sm font-medium leading-6 text-cool-gray">
                A confirmation message has been sent to your phone. We look forward to seeing you at Elysian.
            </p>

            <div class="mt-6 rounded-3xl bg-slate-50 p-4">
                <p class="text-xs font-black uppercase tracking-[0.18em] text-cool-gray">Booking ID</p>
                <p id="bookingIdDisplay" class="mt-1 font-mono text-xl font-black text-primary">--</p>
            </div>

            <div class="mt-7 grid gap-3 sm:grid-cols-2">
                <a href="profile.php" class="inline-flex items-center justify-center rounded-full bg-primary px-6 py-4 font-black text-white">
                    View Profile
                </a>
                <a href="home.php" class="inline-flex items-center justify-center rounded-full border-2 border-slate-200 px-6 py-4 font-black text-slate-heading hover:border-primary hover:text-primary">
                    Return Home
                </a>
            </div>
        </div>
    </div>

    <!-- Footer giống public pages -->
    <footer class="bg-clinic-navy text-white py-16">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-12">
                <div class="md:col-span-2">
                    <div class="flex items-center gap-3 mb-6">
                        <?php
                        if (file_exists(__DIR__ . '/shared/logo_svg.php')) {
                            include __DIR__ . '/shared/logo_svg.php';
                        }
                        ?>
                    </div>
                    <p class="text-white/60 max-w-md leading-7">
                        Elysian Skin Clinic provides personalized skincare treatment, appointment booking, and treatment pathway management in one organized clinic experience.
                    </p>
                </div>

                <div>
                    <h4 class="font-black mb-6 text-white">Clinic</h4>
                    <ul class="space-y-4 text-sm text-white/60 font-semibold">
                        <li><a href="home.php" class="hover:text-primary transition-colors">Home</a></li>
                        <li><a href="dichvu.php" class="hover:text-primary transition-colors">Services</a></li>
                        <li><a href="about.php" class="hover:text-primary transition-colors">About</a></li>
                        <li><a href="contact.php" class="hover:text-primary transition-colors">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-black mb-6 text-white">Contact</h4>
                    <ul class="space-y-4 text-sm text-white/60 font-semibold">
                        <li class="flex gap-3">
                            <span class="shrink-0 text-primary"><?= $icon('mail', 'h-5 w-5'); ?></span>
                            <span>elysian@group4.com.vn</span>
                        </li>
                        <li class="flex gap-3">
                            <span class="shrink-0 text-primary"><?= $icon('location', 'h-5 w-5'); ?></span>
                            <span>So 1 Phan Tay Nhac, Hanoi, Vietnam</span>
                        </li>
                        <li class="flex gap-3">
                            <span class="shrink-0 text-primary"><?= $icon('clock', 'h-5 w-5'); ?></span>
                            <span>Mon - Sat, 9:00 AM - 7:00 PM</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-white/10 mt-12 pt-8 flex flex-col md:flex-row justify-between gap-4 text-xs text-white/40 uppercase tracking-widest">
                <p>© 2026 Elysian Skin Clinic. All rights reserved.</p>
                <p>Integrated Treatment and Appointment Management System</p>
            </div>
        </div>
    </footer>

    <script>
        (function () {
            const presetServiceId = <?= json_encode($service_id); ?>;

            const step1 = document.getElementById('step1');
            const step2 = document.getElementById('step2');
            const step3 = document.getElementById('step3');
            const stepTabs = Array.from(document.querySelectorAll('.step-tab'));

            const fullNameInput = document.getElementById('fullName');
            const phoneInput = document.getElementById('phone');
            const phoneError = document.getElementById('phone-error');
            const selectTreatment = document.getElementById('selectTreatment');
            const selectSpecialist = document.getElementById('selectSpecialist');

            const calendarMonthLabel = document.getElementById('calendarMonthLabel');
            const calendarGrid = document.getElementById('calendarGrid');
            const calPrev = document.getElementById('calPrev');
            const calNext = document.getElementById('calNext');
            const timeSlots = document.getElementById('timeSlots');
            const noSlots = document.getElementById('noSlots');

            const summaryService = document.getElementById('summaryService');
            const summarySpecialist = document.getElementById('summarySpecialist');
            const summaryDateTime = document.getElementById('summaryDateTime');
            const summaryPrice = document.getElementById('summaryPrice');

            const reviewService = document.getElementById('reviewService');
            const reviewSpecialist = document.getElementById('reviewSpecialist');
            const reviewDateTime = document.getElementById('reviewDateTime');
            const reviewName = document.getElementById('reviewName');
            const reviewPhoneMask = document.getElementById('reviewPhoneMask');

            const btnNextStep1 = document.getElementById('btnNextStep1');
            const btnNextStep2 = document.getElementById('btnNextStep2');
            const btnConfirmBooking = document.getElementById('btnConfirmBooking');
            const backToStep1 = document.getElementById('backToStep1');
            const backToStep2 = document.getElementById('backToStep2');
            const bookingStatus = document.getElementById('booking-status');

            const confirmModal = document.getElementById('confirmModal');
            const bookingIdDisplay = document.getElementById('bookingIdDisplay');

            const phoneRegex = /^0\d{9}$/;

            function cleanPhone(value) {
                return value.replace(/\D/g, '');
            }

            let currentStep = 1;
            let services = [];
            let specialists = [];
            let selectedDate = '';
            let selectedTime = '';
            let calendarDate = new Date();

            calendarDate.setDate(1);

            function escapeHtml(value) {
                return String(value ?? '')
                    .replaceAll('&', '&amp;')
                    .replaceAll('<', '&lt;')
                    .replaceAll('>', '&gt;')
                    .replaceAll('"', '&quot;')
                    .replaceAll("'", '&#039;');
            }

            function normalizeListResponse(data, keys) {
                if (Array.isArray(data)) {
                    return data;
                }

                for (const key of keys) {
                    if (Array.isArray(data?.[key])) {
                        return data[key];
                    }
                }

                return [];
            }

            function getServiceName(service) {
                return service?.name || service?.service_name || service?.title || 'Treatment';
            }

            function getServicePrice(service) {
                return service?.price || service?.total_price || service?.Price || '--';
            }

            function getSpecialistName(specialist) {
                return specialist?.full_name || specialist?.name || specialist?.specialist_name || specialist?.Name || 'Specialist';
            }

            function getSelectedService() {
                return services.find(function (service) {
                    return String(service.id) === String(selectTreatment.value);
                }) || null;
            }

            function getSelectedSpecialist() {
                return specialists.find(function (specialist) {
                    return String(specialist.id) === String(selectSpecialist.value);
                }) || null;
            }

            function setStatus(message, type) {
                bookingStatus.textContent = message || '';
                bookingStatus.classList.remove('text-red-500', 'text-emerald-600', 'text-primary', 'text-cool-gray');

                if (type === 'error') {
                    bookingStatus.classList.add('text-red-500');
                } else if (type === 'success') {
                    bookingStatus.classList.add('text-emerald-600');
                } else if (type === 'loading') {
                    bookingStatus.classList.add('text-primary');
                } else {
                    bookingStatus.classList.add('text-cool-gray');
                }
            }

            function setButtonLoading(button, isLoading, loadingText, normalText) {
                if (!button) {
                    return;
                }

                button.disabled = isLoading;
                button.classList.toggle('opacity-70', isLoading);
                button.classList.toggle('cursor-not-allowed', isLoading);

                const span = button.querySelector('span');
                if (span) {
                    span.textContent = isLoading ? loadingText : normalText;
                }
            }

            function showStep(step) {
                currentStep = step;

                step1.classList.toggle('hidden', step !== 1);
                step2.classList.toggle('hidden', step !== 2);
                step3.classList.toggle('hidden', step !== 3);

                btnNextStep1.classList.toggle('hidden', step !== 1);
                btnNextStep1.classList.toggle('inline-flex', step === 1);
                btnNextStep1.classList.toggle('flex', step === 1);

                btnNextStep2.classList.toggle('hidden', step !== 2);
                btnNextStep2.classList.toggle('inline-flex', step === 2);
                btnNextStep2.classList.toggle('flex', step === 2);

                btnConfirmBooking.classList.toggle('hidden', step !== 3);
                btnConfirmBooking.classList.toggle('inline-flex', step === 3);
                btnConfirmBooking.classList.toggle('flex', step === 3);

                stepTabs.forEach(function (tab) {
                    const tabStep = Number(tab.dataset.step);
                    const isActive = tabStep === step;

                    tab.classList.toggle('step-pill-active', isActive);
                    tab.classList.toggle('step-pill-inactive', !isActive);
                });

                setStatus('', 'neutral');

                if (step === 3) {
                    updateReview();
                }

                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            }

            function validatePhone() {
                const cleaned = cleanPhone(phoneInput.value);
                phoneInput.value = cleaned;

                const valid = phoneRegex.test(cleaned);
                const shouldShow = cleaned !== '' && !valid;

                phoneInput.classList.toggle('input-field-error', shouldShow);
                phoneError.classList.toggle('hidden', !shouldShow);

                return valid;
            }

            function validateStep1() {
                validatePhone();

                if (fullNameInput.value.trim() === '') {
                    setStatus('Please enter your full name.', 'error');
                    fullNameInput.focus();
                    return false;
                }

                if (!phoneRegex.test(phoneInput.value.trim())) {
                    setStatus('Số điện thoại cần có 10 số và bắt đầu bằng 0.', 'error');
                    phoneInput.focus();
                    return false;
                }

                if (!selectTreatment.value) {
                    setStatus('Please select a treatment.', 'error');
                    selectTreatment.focus();
                    return false;
                }

                if (!selectSpecialist.value) {
                    setStatus('Please select a specialist.', 'error');
                    selectSpecialist.focus();
                    return false;
                }

                return true;
            }

            function validateStep2() {
                if (!selectedDate) {
                    setStatus('Please select an appointment date.', 'error');
                    return false;
                }

                if (!selectedTime) {
                    setStatus('Please select an available time slot.', 'error');
                    return false;
                }

                return true;
            }

            function formatDateLabel(value) {
                if (!value) {
                    return '--';
                }

                const date = new Date(value + 'T00:00:00');

                if (Number.isNaN(date.getTime())) {
                    return value;
                }

                return date.toLocaleDateString('en-US', {
                    weekday: 'short',
                    month: 'short',
                    day: 'numeric',
                    year: 'numeric'
                });
            }

            function maskPhone(phone) {
                const value = String(phone || '');

                if (value.length <= 4) {
                    return value;
                }

                return value.slice(0, 3) + '****' + value.slice(-3);
            }

            function updateSummary() {
                const service = getSelectedService();
                const specialist = getSelectedSpecialist();

                summaryService.textContent = service ? getServiceName(service) : '--';
                summarySpecialist.textContent = specialist ? getSpecialistName(specialist) : '--';
                summaryPrice.textContent = service ? getServicePrice(service) : '--';
                summaryDateTime.textContent = selectedDate && selectedTime
                    ? formatDateLabel(selectedDate) + ', ' + selectedTime
                    : '--';
            }

            function updateReview() {
                reviewService.textContent = summaryService.textContent;
                reviewSpecialist.textContent = summarySpecialist.textContent;
                reviewDateTime.textContent = summaryDateTime.textContent;
                reviewName.textContent = fullNameInput.value.trim();
                reviewPhoneMask.textContent = maskPhone(phoneInput.value.trim());
            }

            async function loadServices() {
                selectTreatment.innerHTML = '<option value="">Loading treatments...</option>';

                try {
                    const response = await fetch('../backend/get_services.php');
                    const data = await response.json();
                    services = normalizeListResponse(data, ['services', 'data', 'items']);

                    selectTreatment.innerHTML = '<option value="">Choose treatment</option>';

                    services.forEach(function (service) {
                        const option = document.createElement('option');
                        option.value = service.id;
                        option.textContent = getServiceName(service);
                        selectTreatment.appendChild(option);
                    });

                    if (presetServiceId) {
                        selectTreatment.value = presetServiceId;
                    }

                    updateSummary();
                } catch (error) {
                    console.error('Failed to load services:', error);
                    services = [];
                    selectTreatment.innerHTML = '<option value="">Unable to load treatments</option>';
                }
            }

            async function loadSpecialists() {
                selectSpecialist.innerHTML = '<option value="">Loading specialists...</option>';

                try {
                    const response = await fetch('../backend/get_specialists.php');
                    const data = await response.json();
                    specialists = normalizeListResponse(data, ['specialists', 'data', 'items']);

                    selectSpecialist.innerHTML = '<option value="">Choose specialist</option>';

                    specialists.forEach(function (specialist) {
                        const option = document.createElement('option');
                        option.value = specialist.id;
                        option.textContent = getSpecialistName(specialist);
                        selectSpecialist.appendChild(option);
                    });

                    updateSummary();
                } catch (error) {
                    console.error('Failed to load specialists:', error);
                    specialists = [];
                    selectSpecialist.innerHTML = '<option value="">Unable to load specialists</option>';
                }
            }

            function renderCalendar() {
                const year = calendarDate.getFullYear();
                const month = calendarDate.getMonth();

                calendarMonthLabel.textContent = calendarDate.toLocaleDateString('en-US', {
                    month: 'long',
                    year: 'numeric'
                });

                calendarGrid.innerHTML = '';

                const firstDay = new Date(year, month, 1);
                const startDay = firstDay.getDay();
                const totalDays = new Date(year, month + 1, 0).getDate();
                const today = new Date();

                today.setHours(0, 0, 0, 0);

                for (let i = 0; i < startDay; i++) {
                    const blank = document.createElement('div');
                    blank.className = 'calendar-day';
                    calendarGrid.appendChild(blank);
                }

                for (let day = 1; day <= totalDays; day++) {
                    const date = new Date(year, month, day);
                    date.setHours(0, 0, 0, 0);

                    const dateValue = date.toISOString().slice(0, 10);
                    const isPast = date < today;
                    const isSelected = selectedDate === dateValue;

                    const button = document.createElement('button');
                    button.type = 'button';
                    button.textContent = String(day);
                    button.className = 'calendar-day ' + (isPast ? 'calendar-day-disabled' : 'calendar-day-enabled');

                    if (isSelected) {
                        button.classList.add('calendar-day-selected');
                    }

                    button.disabled = isPast;

                    if (!isPast) {
                        button.addEventListener('click', function () {
                            selectedDate = dateValue;
                            selectedTime = '';
                            renderCalendar();
                            loadSlots();
                            updateSummary();
                        });
                    }

                    calendarGrid.appendChild(button);
                }
            }

            async function loadSlots() {
                timeSlots.innerHTML = '';
                noSlots.classList.remove('hidden');
                noSlots.textContent = 'Loading available times...';

                if (!selectedDate) {
                    noSlots.textContent = 'Select a date to see available times.';
                    return;
                }

                try {
                    const params = new URLSearchParams({
                        date: selectedDate,
                        appointment_date: selectedDate,
                        service_id: selectTreatment.value,
                        specialist_id: selectSpecialist.value
                    });

                    const response = await fetch('../backend/get_slots.php?' + params.toString());
                    const data = await response.json();

                    let slots = normalizeListResponse(data, ['slots', 'data', 'times', 'available_slots']);

                    if (slots.length === 0) {
                        noSlots.textContent = 'No available slots for this date.';
                        return;
                    }

                    noSlots.classList.add('hidden');

                    slots.forEach(function (slot) {
                        const time = typeof slot === 'string'
                            ? slot
                            : (slot.time || slot.appointment_time || slot.start_time || slot.slot || '');

                        if (!time) {
                            return;
                        }

                        const label = String(time).substring(0, 5);

                        const button = document.createElement('button');
                        button.type = 'button';
                        button.textContent = label;
                        button.className = 'rounded-full border px-4 py-3 text-sm font-black transition ' +
                            (selectedTime === label
                                ? 'border-primary bg-primary text-white shadow-[0_14px_35px_rgba(13,185,242,0.25)]'
                                : 'border-slate-200 bg-white text-slate-heading hover:border-primary hover:text-primary');

                        button.addEventListener('click', function () {
                            selectedTime = label;
                            loadSlots();
                            updateSummary();
                        });

                        timeSlots.appendChild(button);
                    });

                    if (timeSlots.children.length === 0) {
                        noSlots.classList.remove('hidden');
                        noSlots.textContent = 'No available slots for this date.';
                    }
                } catch (error) {
                    console.error('Failed to load slots:', error);
                    noSlots.classList.remove('hidden');
                    noSlots.textContent = 'Unable to load slots. Please try another date.';
                }
            }

            async function confirmBooking() {
                if (!validateStep1() || !validateStep2()) {
                    return;
                }

                setStatus('Confirming your booking...', 'loading');
                setButtonLoading(btnConfirmBooking, true, 'Confirming...', 'Confirm Booking');

                try {
                    const formData = new FormData();
                    formData.append('full_name', fullNameInput.value.trim());
                    formData.append('name', fullNameInput.value.trim());
                    formData.append('phone', phoneInput.value.trim());
                    formData.append('service_id', selectTreatment.value);
                    formData.append('specialist_id', selectSpecialist.value);
                    formData.append('appointment_date', selectedDate);
                    formData.append('date', selectedDate);
                    formData.append('appointment_time', selectedTime);
                    formData.append('time', selectedTime);

                    const response = await fetch('../backend/create_booking.php', {
                        method: 'POST',
                        body: formData
                    });

                    const text = await response.text();
                    let data;

                    try {
                        data = JSON.parse(text);
                    } catch (parseError) {
                        const serverError = text.length > 0 && text.length < 500
                            ? text
                            : 'Invalid server response';
                        setStatus('Server error: ' + serverError, 'error');
                        console.error('JSON parse failed. Server returned:', text);
                        return;
                    }

                    if (data.success) {
                        const bookingCode = data.booking_code || data.booking_id || data.id || data.message || 'Confirmed';

                        bookingIdDisplay.textContent = bookingCode;
                        confirmModal.classList.remove('hidden');
                        confirmModal.classList.add('flex');

                        setStatus('Booking created successfully. Waiting for confirmation.', 'success');
                    } else {
                        const message = Array.isArray(data.errors)
                            ? data.errors.join(', ')
                            : (data.message || 'Unable to create booking.');
                        setStatus(message, 'error');
                    }
                } catch (error) {
                    console.error('Failed to create booking:', error);
                    const message = error?.message || error?.toString() || 'Booking service unavailable. Please try again later.';
                    setStatus('Lỗi: ' + message, 'error');
                } finally {
                    setButtonLoading(btnConfirmBooking, false, 'Confirming...', 'Confirm Booking');
                }
            }

            phoneInput.addEventListener('input', validatePhone);

            selectTreatment.addEventListener('change', function () {
                selectedTime = '';
                updateSummary();

                if (selectedDate) {
                    loadSlots();
                }
            });

            selectSpecialist.addEventListener('change', function () {
                selectedTime = '';
                updateSummary();

                if (selectedDate) {
                    loadSlots();
                }
            });

            btnNextStep1.addEventListener('click', function () {
                if (validateStep1()) {
                    showStep(2);
                    renderCalendar();
                    updateSummary();
                }
            });

            btnNextStep2.addEventListener('click', function () {
                if (validateStep2()) {
                    showStep(3);
                }
            });

            btnConfirmBooking.addEventListener('click', confirmBooking);

            backToStep1.addEventListener('click', function () {
                showStep(1);
            });

            backToStep2.addEventListener('click', function () {
                showStep(2);
            });

            stepTabs.forEach(function (tab) {
                tab.addEventListener('click', function () {
                    const targetStep = Number(tab.dataset.step);

                    if (targetStep === 1) {
                        showStep(1);
                    }

                    if (targetStep === 2 && validateStep1()) {
                        showStep(2);
                    }

                    if (targetStep === 3 && validateStep1() && validateStep2()) {
                        showStep(3);
                    }
                });
            });

            calPrev.addEventListener('click', function () {
                calendarDate.setMonth(calendarDate.getMonth() - 1);
                renderCalendar();
            });

            calNext.addEventListener('click', function () {
                calendarDate.setMonth(calendarDate.getMonth() + 1);
                renderCalendar();
            });

            loadServices();
            loadSpecialists();
            renderCalendar();
            updateSummary();
        })();
    </script>
</body>
</html>
