<?php
require_once '../backend/db.php';

$currentUser = getCurrentUser();
$userName = $currentUser['full_name'] ?? 'Guest';

$esc = static function ($value): string {
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
};

$icon = static function (string $name, string $class = 'h-5 w-5'): string {
    $icons = [
        'arrow' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'check' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M20 6 9 17l-5-5" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'mail' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M4 6h16v12H4V6Z" stroke="currentColor" stroke-width="2.1" stroke-linejoin="round"/><path d="m4 7 8 6 8-6" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'phone' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M6.6 3.5 9.2 8c.4.7.3 1.5-.3 2.1l-1.1 1.1a13.5 13.5 0 0 0 5 5l1.1-1.1c.6-.6 1.4-.7 2.1-.3l4.5 2.6c.8.5 1.1 1.4.8 2.3-.5 1.5-1.9 2.6-3.5 2.6C9.1 22.3 1.7 14.9 1.7 6.2c0-1.6 1.1-3 2.6-3.5.9-.3 1.8 0 2.3.8Z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/></svg>',
        'location' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 21s7-5.6 7-12a7 7 0 1 0-14 0c0 6.4 7 12 7 12Z" stroke="currentColor" stroke-width="2.1"/><circle cx="12" cy="9" r="2.4" fill="currentColor"/></svg>',
        'clock' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2.1"/><path d="M12 7v5l3 2" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'chat' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 18.5 3.5 22l4-1.4A9.3 9.3 0 0 0 12 21c5 0 9-3.6 9-8s-4-8-9-8-9 3.6-9 8c0 2.1.8 4 2 5.5Z" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"/><path d="M8 12h8M8 15h5" stroke="currentColor" stroke-width="2.1" stroke-linecap="round"/></svg>',
        'send' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M21 3 10.5 13.5M21 3l-6.7 18-3.8-7.5L3 9.7 21 3Z" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"/></svg>',
    ];

    return $icons[$name] ?? '';
};

$contactCards = [
    [
        'icon' => 'location',
        'title' => 'Visit Us',
        'description' => 'So 1 Phan Tay Nhac, Hanoi, Vietnam',
    ],
    [
        'icon' => 'mail',
        'title' => 'Email Us',
        'description' => 'elysian@group4.com.vn',
    ],
    [
        'icon' => 'phone',
        'title' => 'Call Us',
        'description' => '+84 (0) 123 456 789',
    ],
    [
        'icon' => 'clock',
        'title' => 'Opening Hours',
        'description' => 'Mon - Sat, 9:00 AM - 7:00 PM',
    ],
];
?>
<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Contact | Elysian Skin Clinic</title>

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

        .input-field {
            @apply w-full rounded-2xl border border-slate-200 bg-white px-5 py-4 text-sm font-semibold text-slate-heading outline-none transition focus:border-primary focus:ring-4 focus:ring-primary/10;
        }

        .input-label {
            @apply mb-2 block text-sm font-black text-slate-heading;
        }
    </style>
</head>

<body class="bg-white text-slate-900 font-display antialiased">
    <!-- Header -->
  <?php include __DIR__ . '/public_navbar.php'; ?>

    <main>
        <!-- Hero / Contact -->
        <section class="relative overflow-hidden py-16 lg:py-24">
            <div class="container mx-auto px-6">
                <div class="grid lg:grid-cols-[0.95fr_1.05fr] gap-10 lg:gap-14 items-stretch">
                    <!-- Left -->
                    <div class="relative overflow-hidden rounded-[2.5rem] bg-clinic-navy p-8 lg:p-10 text-white shadow-soft">
                        <div class="absolute -right-24 -top-24 h-80 w-80 rounded-full bg-primary/25 blur-3xl"></div>
                        <div class="absolute -left-24 -bottom-24 h-80 w-80 rounded-full bg-sky-400/10 blur-3xl"></div>

                        <div class="relative space-y-8">
                            <div class="inline-flex items-center gap-2 rounded-full border border-white/10 bg-white/10 px-4 py-2">
                                <span class="h-2 w-2 rounded-full bg-primary"></span>
                                <span class="text-xs font-black uppercase tracking-[0.24em] text-white/75">Contact Elysian</span>
                            </div>

                            <div class="space-y-5">
                                <h1 class="text-5xl lg:text-7xl font-black leading-[1.04] tracking-[-0.055em]">
                                    Let’s start your <span class="text-primary">skin journey.</span>
                                </h1>
                                <p class="max-w-xl text-lg font-medium leading-8 text-white/68">
                                    Send us your question, book a consultation, or contact the clinic team for treatment guidance.
                                </p>
                            </div>

                            <div class="grid sm:grid-cols-2 gap-4">
                                <?php foreach ($contactCards as $card): ?>
                                    <div class="rounded-[1.75rem] border border-white/10 bg-white/10 p-5">
                                        <div class="mb-4 flex h-11 w-11 items-center justify-center rounded-2xl bg-primary/20 text-primary">
                                            <?= $icon($card['icon'], 'h-6 w-6'); ?>
                                        </div>
                                        <h3 class="font-black text-white"><?= $esc($card['title']); ?></h3>
                                        <p class="mt-2 text-sm leading-6 text-white/60"><?= $esc($card['description']); ?></p>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                            <div class="rounded-[1.75rem] border border-white/10 bg-white/10 p-5">
                                <div class="flex items-start gap-4">
                                    <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-primary/20 text-primary">
                                        <?= $icon('chat', 'h-6 w-6'); ?>
                                    </div>
                                    <div>
                                        <p class="font-black text-white">Need help choosing a treatment?</p>
                                        <p class="mt-1 text-sm leading-6 text-white/60">
                                            Start with a consultation. Our team will suggest a suitable service or treatment course.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form -->
                    <div class="rounded-[2.5rem] border border-slate-100 bg-white p-6 shadow-soft lg:p-10">
                        <div class="mb-8">
                            <p class="section-label">Send a Message</p>
                            <h2 class="mt-3 text-4xl font-black tracking-[-0.04em] text-slate-heading lg:text-5xl">
                                How can we help?
                            </h2>
                            <p class="mt-4 max-w-2xl text-cool-gray leading-7">
                                Fill in the form below. The clinic team will get back to you as soon as possible.
                            </p>
                        </div>

                        <form id="contact-form" class="space-y-5">
                            <div class="grid sm:grid-cols-2 gap-5">
                                <div>
                                    <label class="input-label" for="name">Your Name</label>
                                    <input id="name" type="text" name="name" placeholder="Your full name" class="input-field" required/>
                                </div>

                                <div>
                                    <label class="input-label" for="email">Email Address</label>
                                    <input id="email" type="email" name="email" placeholder="you@example.com" class="input-field" required/>
                                </div>
                            </div>

                            <div class="grid sm:grid-cols-2 gap-5">
                                <div>
                                    <label class="input-label" for="phone">Phone Number</label>
                                    <input id="phone" type="tel" name="phone" placeholder="+84 xxx xxx xxx" class="input-field"/>
                                </div>

                                <div>
                                    <label class="input-label" for="subject">Subject</label>
                                    <select id="subject" name="subject" class="input-field">
                                        <option>General Inquiry</option>
                                        <option>Book Consultation</option>
                                        <option>Treatment Question</option>
                                        <option>Feedback</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label class="input-label" for="message">Your Message</label>
                                <textarea id="message" name="message" rows="6" placeholder="Tell us how we can help you..." class="input-field resize-none" required></textarea>
                            </div>

                            <button id="submit-button" type="submit" class="inline-flex w-full items-center justify-center gap-3 rounded-full bg-primary px-8 py-5 text-base font-black text-white shadow-[0_18px_45px_rgba(13,185,242,0.28)] transition-all hover:-translate-y-0.5 hover:shadow-[0_22px_55px_rgba(13,185,242,0.38)]">
                                <span>Send Message</span>
                                <?= $icon('send', 'h-5 w-5'); ?>
                            </button>

                            <div id="form-message" class="hidden rounded-2xl p-4 text-center text-sm font-bold"></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Map / Visit -->
        <section class="py-20 bg-slate-50">
            <div class="container mx-auto px-6">
                <div class="grid lg:grid-cols-[0.9fr_1.1fr] gap-8 items-stretch">
                    <div class="rounded-[2.5rem] bg-white p-8 lg:p-10 shadow-soft border border-slate-100">
                        <p class="section-label">Visit Our Clinic</p>
                        <h2 class="mt-3 text-4xl lg:text-5xl font-black text-slate-heading tracking-[-0.04em]">
                            Easy to reach, calm to visit.
                        </h2>
                        <p class="mt-4 text-cool-gray leading-7">
                            Our clinic is designed for privacy, comfort, and organized treatment follow-up.
                        </p>

                        <div class="mt-8 space-y-4">
                            <div class="flex items-start gap-4 rounded-3xl bg-slate-50 p-5">
                                <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-primary-soft text-primary">
                                    <?= $icon('location', 'h-6 w-6'); ?>
                                </span>
                                <div>
                                    <p class="font-black text-slate-heading">Address</p>
                                    <p class="mt-1 text-sm text-cool-gray leading-6">So 1 Phan Tay Nhac, Hanoi, Vietnam</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 rounded-3xl bg-slate-50 p-5">
                                <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-primary-soft text-primary">
                                    <?= $icon('mail', 'h-6 w-6'); ?>
                                </span>
                                <div>
                                    <p class="font-black text-slate-heading">Email</p>
                                    <p class="mt-1 text-sm text-cool-gray leading-6">elysian@group4.com.vn</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="relative min-h-[420px] overflow-hidden rounded-[2.5rem] border border-slate-100 bg-white shadow-soft">
                        <img
                            src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=1200&q=85"
                            alt="Elysian clinic reception"
                            class="h-full min-h-[420px] w-full object-cover"
                        />
                        <div class="absolute inset-0 bg-gradient-to-t from-clinic-navy/75 via-clinic-navy/10 to-transparent"></div>
                        <div class="absolute bottom-7 left-7 right-7 rounded-[1.75rem] border border-white/20 bg-white/15 p-5 text-white backdrop-blur-xl">
                            <p class="text-xs font-black uppercase tracking-[0.24em] text-white/65">Elysian Skin Clinic</p>
                            <p class="mt-2 text-2xl font-black">Personalized skincare in a calm clinical space.</p>
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
                                Book your first consultation with Elysian.
                            </h2>
                            <p class="mt-4 text-cool-gray leading-7 max-w-2xl">
                                Start with a clear consultation before choosing a service or treatment course.
                            </p>
                        </div>

                        <div class="flex flex-col sm:flex-row lg:flex-col gap-3">
                            <a href="booking.php" class="inline-flex items-center justify-center rounded-full bg-primary text-white px-8 py-4 font-black hover:shadow-glow transition-all">
                                Book Appointment
                            </a>
                            <a href="dichvu.php" class="inline-flex items-center justify-center rounded-full border-2 border-slate-200 bg-white text-slate-heading px-8 py-4 font-black hover:border-primary hover:text-primary transition-colors">
                                View Services
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer giống home -->
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

        const contactForm = document.getElementById('contact-form');
        const formMessage = document.getElementById('form-message');
        const submitButton = document.getElementById('submit-button');

        if (contactForm && formMessage && submitButton) {
            contactForm.addEventListener('submit', function (event) {
                event.preventDefault();

                const formData = new FormData(contactForm);
                const buttonText = submitButton.querySelector('span');

                formMessage.className = 'rounded-2xl p-4 text-center text-sm font-bold bg-primary/10 text-primary';
                formMessage.textContent = 'Sending...';
                formMessage.classList.remove('hidden');

                submitButton.disabled = true;
                submitButton.classList.add('opacity-70', 'cursor-not-allowed');

                if (buttonText) {
                    buttonText.textContent = 'Sending...';
                }

                fetch('../backend/contact.php', {
                    method: 'POST',
                    body: formData
                })
                    .then(function (response) {
                        return response.json();
                    })
                    .then(function (data) {
                        if (data.success) {
                            formMessage.className = 'rounded-2xl p-4 text-center text-sm font-bold bg-emerald-50 text-emerald-700 border border-emerald-100';
                            formMessage.textContent = data.message || 'Your message has been sent successfully.';
                            contactForm.reset();
                        } else {
                            formMessage.className = 'rounded-2xl p-4 text-center text-sm font-bold bg-red-50 text-red-700 border border-red-100';
                            formMessage.textContent = data.errors ? data.errors.join(', ') : 'Error sending message. Please try again.';
                        }
                    })
                    .catch(function () {
                        formMessage.className = 'rounded-2xl p-4 text-center text-sm font-bold bg-red-50 text-red-700 border border-red-100';
                        formMessage.textContent = 'An error occurred. Please try again.';
                    })
                    .finally(function () {
                        submitButton.disabled = false;
                        submitButton.classList.remove('opacity-70', 'cursor-not-allowed');

                        if (buttonText) {
                            buttonText.textContent = 'Send Message';
                        }
                    });
            });
        }
    </script>
</body>
</html>