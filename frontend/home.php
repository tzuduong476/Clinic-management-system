<?php
require_once '../backend/db.php';

$currentUser = getCurrentUser();
$userName = $currentUser['full_name'] ?? 'Guest';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Elysian Skin Clinic | Clinical Excellence in Skincare</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>

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

        .material-symbols-outlined {
            font-family: 'Material Symbols Outlined';
            font-variation-settings: 'FILL' 0, 'wght' 500, 'GRAD' 0, 'opsz' 24;
        }

        .section-label {
            @apply text-xs font-black uppercase tracking-[0.34em] text-primary;
        }

        .soft-card {
            @apply rounded-[2rem] border border-slate-100 bg-white shadow-[0_18px_55px_rgba(15,31,61,0.08)];
        }
    </style>
</head>

<body class="bg-white text-slate-900 font-display antialiased">
    <?php include __DIR__ . '/public_navbar.php'; ?>

    <main>
        <!-- Hero Section -->
        <section class="relative overflow-hidden py-16 lg:py-24">
            <div class="container mx-auto px-6">
                <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-center">
                    <div class="relative order-2 lg:order-1">
                        <div class="absolute -top-8 -left-8 w-48 h-48 bg-primary/10 rounded-full blur-3xl"></div>
                        <div class="absolute -bottom-8 -right-8 w-56 h-56 bg-sky-200/30 rounded-full blur-3xl"></div>

                        <div class="relative rounded-[2.25rem] overflow-hidden shadow-soft border border-slate-100 bg-white p-3">
                            <img
                                alt="Modern clinical skincare room"
                                class="rounded-[1.75rem] w-full h-[520px] object-cover"
                                src="https://images.unsplash.com/photo-1629909613654-28e377c37b09?w=1000&q=85"
                            />

                            <div class="absolute left-7 bottom-7 rounded-[1.5rem] bg-white/92 backdrop-blur-xl p-5 shadow-xl border border-white/80 max-w-[300px]">
                                <div class="flex items-start gap-4">
                                    <div class="w-12 h-12 bg-primary-soft rounded-2xl flex items-center justify-center shrink-0">
                                        <span class="material-symbols-outlined text-primary text-3xl">verified_user</span>
                                    </div>
                                    <div>
                                        <p class="text-[10px] font-black uppercase tracking-[0.22em] text-primary">Clinical Quality</p>
                                        <p class="font-black text-slate-heading leading-snug">Personalized treatment pathway</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-8 order-1 lg:order-2">
                        <div class="inline-flex items-center gap-2 px-4 py-2 bg-primary-soft border border-sky-100 rounded-full">
                            <span class="w-2 h-2 bg-primary rounded-full"></span>
                            <span class="text-xs font-black text-slate-heading uppercase tracking-[0.22em]">Elysian Skin Clinic</span>
                        </div>

                        <div class="space-y-5">
                            <h1 class="text-5xl lg:text-7xl font-black text-slate-heading leading-[1.04] tracking-[-0.055em]">
                                Your Skin Journey, <br/>
                                <span class="text-primary">Clinically Guided.</span>
                            </h1>
                            <p class="text-lg text-cool-gray leading-8 max-w-xl font-medium">
                                Personalized skincare treatments supported by appointment management, customer records, and session-by-session treatment tracking.
                            </p>
                        </div>

                        <div class="flex flex-wrap gap-4 pt-2">
                            <a href="booking.php" class="inline-flex items-center justify-center gap-2 bg-primary text-white px-8 py-4 rounded-full font-black text-base hover:shadow-glow hover:-translate-y-0.5 transition-all">
                                Book Appointment
                                <span class="material-symbols-outlined text-xl">arrow_forward</span>
                            </a>
                            <a href="dichvu.php" class="inline-flex items-center justify-center border-2 border-slate-200 text-slate-heading bg-white px-8 py-4 rounded-full font-black text-base hover:border-primary hover:text-primary transition-all">
                                Explore Treatments
                            </a>
                        </div>

                        <div class="grid grid-cols-3 gap-3 max-w-xl pt-4">
                            <div class="rounded-3xl bg-white border border-slate-100 p-5 shadow-sm">
                                <p class="text-3xl font-black text-slate-heading">1:1</p>
                                <p class="text-xs font-bold text-cool-gray mt-1">Consultation</p>
                            </div>
                            <div class="rounded-3xl bg-white border border-slate-100 p-5 shadow-sm">
                                <p class="text-3xl font-black text-slate-heading">6+</p>
                                <p class="text-xs font-bold text-cool-gray mt-1">Care Sessions</p>
                            </div>
                            <div class="rounded-3xl bg-white border border-slate-100 p-5 shadow-sm">
                                <p class="text-3xl font-black text-slate-heading">24/7</p>
                                <p class="text-xs font-bold text-cool-gray mt-1">Record Access</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Short -->
        <section class="py-20 bg-slate-50">
            <div class="container mx-auto px-6">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div class="space-y-6">
                        <p class="section-label">About Elysian</p>
                        <h2 class="text-4xl lg:text-5xl font-black text-slate-heading leading-tight tracking-[-0.04em]">
                            A clinic experience built around clarity, comfort, and measurable progress.
                        </h2>
                        <p class="text-lg text-cool-gray leading-8">
                            Elysian combines skincare consultation, treatment planning, appointment booking, payment visibility, and session progress tracking in one organized clinic workflow.
                        </p>

                        <div class="grid sm:grid-cols-2 gap-3 pt-2">
                            <div class="flex items-center gap-2 text-sm font-bold text-slate-heading">
                                <span class="material-symbols-outlined text-primary text-lg">check_circle</span>
                                Personalized treatment course
                            </div>
                            <div class="flex items-center gap-2 text-sm font-bold text-slate-heading">
                                <span class="material-symbols-outlined text-primary text-lg">check_circle</span>
                                Session-by-session updates
                            </div>
                            <div class="flex items-center gap-2 text-sm font-bold text-slate-heading">
                                <span class="material-symbols-outlined text-primary text-lg">check_circle</span>
                                Customer profile history
                            </div>
                            <div class="flex items-center gap-2 text-sm font-bold text-slate-heading">
                                <span class="material-symbols-outlined text-primary text-lg">check_circle</span>
                                Appointment and payment status
                            </div>
                        </div>
                    </div>

                    <div class="rounded-[2.25rem] overflow-hidden shadow-soft border border-slate-100 bg-white relative">
                        <img
                            class="w-full h-[460px] object-cover"
                            src="https://images.unsplash.com/photo-1579684453423-f84349ef60b0?w=1200&q=85"
                            alt="Dermatology consultation in clinic"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/75 via-slate-900/10 to-transparent"></div>
                        <div class="absolute left-7 bottom-7 text-white space-y-1">
                            <p class="text-xs uppercase tracking-[0.3em] text-white/70">Treatment Pathway</p>
                            <p class="text-2xl font-black">Clear care from first visit to follow-up.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Services -->
        <section class="py-20 bg-white">
            <div class="container mx-auto px-6">
                <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-6 mb-10">
                    <div>
                        <p class="section-label">Featured Services</p>
                        <h2 class="mt-3 text-4xl lg:text-5xl font-black text-slate-heading tracking-[-0.04em]">
                            Focused care, easier to choose.
                        </h2>
                    </div>
                    <a href="dichvu.php" class="inline-flex w-fit items-center gap-2 rounded-full border-2 border-slate-200 px-6 py-3 text-sm font-black text-slate-heading hover:border-primary hover:text-primary transition-colors">
                        View All Services
                        <span class="material-symbols-outlined text-lg">arrow_forward</span>
                    </a>
                </div>

                <div class="grid md:grid-cols-3 gap-6">
                    <a href="service-detail.php?id=1" class="soft-card overflow-hidden hover:-translate-y-1 hover:shadow-soft transition-all duration-300 group block">
                        <div class="h-64 overflow-hidden relative">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?w=900&q=85" alt="Acne treatment"/>
                        </div>
                        <div class="p-6">
                            <div class="w-12 h-12 bg-primary-soft rounded-2xl flex items-center justify-center mb-5">
                                <span class="material-symbols-outlined text-primary">spa</span>
                            </div>
                            <h3 class="font-black text-xl text-slate-heading mb-2">Acne & Skin Recovery</h3>
                            <p class="text-sm text-cool-gray leading-6">
                                Structured care for acne, sensitivity, texture, and skin barrier recovery.
                            </p>
                        </div>
                    </a>

                    <a href="service-detail.php?id=2" class="soft-card overflow-hidden hover:-translate-y-1 hover:shadow-soft transition-all duration-300 group block">
                        <div class="h-64 overflow-hidden relative">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?w=900&q=85" alt="Laser resurfacing"/>
                        </div>
                        <div class="p-6">
                            <div class="w-12 h-12 bg-primary-soft rounded-2xl flex items-center justify-center mb-5">
                                <span class="material-symbols-outlined text-primary">auto_fix_high</span>
                            </div>
                            <h3 class="font-black text-xl text-slate-heading mb-2">Laser & Renewal</h3>
                            <p class="text-sm text-cool-gray leading-6">
                                Modern treatment support for pores, scars, pigmentation, and uneven tone.
                            </p>
                        </div>
                    </a>

                    <a href="service-detail.php?id=3" class="soft-card overflow-hidden hover:-translate-y-1 hover:shadow-soft transition-all duration-300 group block">
                        <div class="h-64 overflow-hidden relative">
                            <img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=900&q=85" alt="Skin consultation"/>
                        </div>
                        <div class="p-6">
                            <div class="w-12 h-12 bg-primary-soft rounded-2xl flex items-center justify-center mb-5">
                                <span class="material-symbols-outlined text-primary">clinical_notes</span>
                            </div>
                            <h3 class="font-black text-xl text-slate-heading mb-2">Treatment Planning</h3>
                            <p class="text-sm text-cool-gray leading-6">
                                A clear course with planned sessions, doctor notes, and follow-up guidance.
                            </p>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <!-- Process / System Value -->
        <section class="py-20 bg-slate-50">
            <div class="container mx-auto px-6">
                <div class="rounded-[2.5rem] bg-clinic-navy text-white overflow-hidden shadow-soft">
                    <div class="grid lg:grid-cols-[0.92fr_1.08fr] gap-0 items-stretch">
                        <div class="p-8 lg:p-12">
                            <p class="text-xs font-black uppercase tracking-[0.34em] text-primary">How It Works</p>
                            <h2 class="mt-4 text-4xl lg:text-5xl font-black leading-tight tracking-[-0.04em]">
                                From appointment to treatment history.
                            </h2>
                            <p class="mt-5 text-white/70 leading-8 text-base">
                                The system keeps the customer journey organized, so each visit connects with the right profile, treatment course, payment status, and session progress.
                            </p>
                            <a href="booking.php" class="mt-8 inline-flex items-center justify-center rounded-full bg-white px-7 py-4 font-black text-clinic-navy hover:text-primary transition-colors">
                                Start Booking
                            </a>
                        </div>

                        <div class="grid md:grid-cols-3 gap-4 p-6 lg:p-8 bg-white/5">
                            <div class="rounded-[1.75rem] bg-white/10 border border-white/10 p-6">
                                <div class="w-12 h-12 rounded-2xl bg-primary/20 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-primary">event_available</span>
                                </div>
                                <p class="mt-5 text-lg font-black">01. Book</p>
                                <p class="mt-2 text-sm leading-6 text-white/65">Create and manage appointments clearly.</p>
                            </div>

                            <div class="rounded-[1.75rem] bg-white/10 border border-white/10 p-6">
                                <div class="w-12 h-12 rounded-2xl bg-primary/20 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-primary">assignment</span>
                                </div>
                                <p class="mt-5 text-lg font-black">02. Plan</p>
                                <p class="mt-2 text-sm leading-6 text-white/65">Build a course with sessions and goals.</p>
                            </div>

                            <div class="rounded-[1.75rem] bg-white/10 border border-white/10 p-6">
                                <div class="w-12 h-12 rounded-2xl bg-primary/20 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-primary">monitoring</span>
                                </div>
                                <p class="mt-5 text-lg font-black">03. Track</p>
                                <p class="mt-2 text-sm leading-6 text-white/65">Update progress and preserve history.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA -->
        <section class="py-20 bg-white">
            <div class="container mx-auto px-6">
                <div class="relative overflow-hidden rounded-[2.5rem] bg-gradient-to-br from-sky-50 via-white to-primary-soft border border-sky-100 p-8 lg:p-12 shadow-soft">
                    <div class="absolute -right-20 -top-20 w-72 h-72 bg-primary/20 rounded-full blur-3xl"></div>

                    <div class="relative grid lg:grid-cols-[1fr_auto] gap-8 items-center">
                        <div>
                            <p class="section-label">Ready to begin?</p>
                            <h2 class="mt-3 text-4xl lg:text-5xl font-black text-slate-heading tracking-[-0.04em] max-w-3xl">
                                Start a more organized skincare journey with Elysian.
                            </h2>
                            <p class="mt-4 text-cool-gray leading-7 max-w-2xl">
                                Book your appointment and let the clinic team guide each step through a clear treatment pathway.
                            </p>
                        </div>

                        <div class="flex flex-col sm:flex-row lg:flex-col gap-3">
                            <a href="booking.php" class="inline-flex items-center justify-center rounded-full bg-primary text-white px-8 py-4 font-black hover:shadow-glow transition-all">
                                Book Appointment
                            </a>
                            <a href="contact.php" class="inline-flex items-center justify-center rounded-full border-2 border-slate-200 bg-white text-slate-heading px-8 py-4 font-black hover:border-primary hover:text-primary transition-colors">
                                Contact Clinic
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-clinic-navy text-white py-16">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-12">
                <div class="md:col-span-2">
                    <div class="flex items-center gap-3 mb-6">
                        <?php include __DIR__ . '/../shared/logo_svg.php'; ?>
                    </div>
                    <p class="text-white/60 max-w-md leading-7">
                        Elysian Skin Clinic provides personalized skincare treatment, appointment booking, and treatment pathway management in one organized clinic experience.
                    </p>
                </div>

                <div>
                    <h4 class="font-black mb-6 text-white">Clinic</h4>
                    <ul class="space-y-4 text-sm text-white/60 font-semibold">
                        <li><a href="dichvu.php" class="hover:text-primary transition-colors">Services</a></li>
                        <li><a href="about.php" class="hover:text-primary transition-colors">About</a></li>
                        <li><a href="booking.php" class="hover:text-primary transition-colors">Booking</a></li>
                        <li><a href="contact.php" class="hover:text-primary transition-colors">Contact</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-black mb-6 text-white">Contact</h4>
                    <ul class="space-y-4 text-sm text-white/60 font-semibold">
                        <li class="flex gap-3">
                            <span class="material-symbols-outlined text-primary text-lg shrink-0">mail</span>
                            <span>elysian@group4.com.vn</span>
                        </li>
                        <li class="flex gap-3">
                            <span class="material-symbols-outlined text-primary text-lg shrink-0">location_on</span>
                            <span>So 1 Phan Tay Nhac, Hanoi, Vietnam</span>
                        </li>
                        <li class="flex gap-3">
                            <span class="material-symbols-outlined text-primary text-lg shrink-0">schedule</span>
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
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');

            if (!menu) {
                return;
            }

            if (menu.style.display === 'none' || menu.style.display === '') {
                menu.style.display = 'block';
                document.body.classList.add('overflow-hidden');
            } else {
                menu.style.display = 'none';
                document.body.classList.remove('overflow-hidden');
            }
        }
    </script>
</body>
</html>