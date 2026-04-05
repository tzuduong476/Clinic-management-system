<?php
require_once '../backend/db.php';
$currentUser = getCurrentUser();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Elysian Skin Clinic | Clinical Excellence in Skincare</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#0db9f2",
                        "background-light": "#FFFFFF",
                        "background-dark": "#FFFFFF",
                        "slate-heading": "#33475B",
                        "cool-gray": "#64748B",
                    },
                    fontFamily: { "display": ["Manrope"] },
                    borderRadius: {"DEFAULT": "0.5rem", "lg": "1rem", "xl": "1.5rem", "full": "9999px"},
                },
            },
        }
    </script>
    <style type="text/tailwindcss">
        body { font-family: 'Manrope', sans-serif; background-color: #FFFFFF; }
        .material-symbols-outlined { font-family: 'Material Symbols Outlined'; font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    </style>
</head>
<body class="bg-white text-slate-900 font-display">
    <header class="sticky top-0 z-[100] bg-white/95 backdrop-blur-md border-b border-slate-100">
        <nav class="container mx-auto px-6 py-4 flex items-center justify-between" style="position: relative; z-index: 100;">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary text-2xl">spa</span>
                </div>
                <span class="text-lg font-black text-slate-900">Elysian <span class="text-primary">Skin Clinic</span></span>
            </div>
            <div class="flex items-center gap-10">
                <a class="text-sm font-bold text-slate-heading hover:text-primary transition-colors" href="home.php">Home</a>
                <a class="text-sm font-bold text-slate-heading hover:text-primary transition-colors" href="dichvu.php">Service List</a>
                <a class="text-sm font-bold text-slate-heading hover:text-primary transition-colors" href="about.php">About Us</a>
                <a class="text-sm font-bold text-slate-heading hover:text-primary transition-colors" href="contact.php">Contact</a>
            </div>
            <button id="mobile-menu-btn" class="lg:hidden p-2 text-slate-heading" onclick="toggleMobileMenu()">
                <span class="material-symbols-outlined text-3xl">menu</span>
            </button>
            <!-- Mobile Menu -->
            <div id="mobile-menu" class="hidden fixed inset-0 bg-white z-50" style="display: none;">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-8">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                                <span class="material-symbols-outlined text-primary text-2xl">spa</span>
                            </div>
                            <span class="text-lg font-black text-slate-900">Elysian <span class="text-primary">Skin Clinic</span></span>
                        </div>
                        <button onclick="toggleMobileMenu()" class="p-2">
                            <span class="material-symbols-outlined text-3xl">close</span>
                        </button>
                    </div>
                    <div class="flex flex-col gap-6">
                        <a class="text-xl font-bold text-slate-heading hover:text-primary transition-colors" href="home.php" onclick="toggleMobileMenu()">Home</a>
                        <a class="text-xl font-bold text-slate-heading hover:text-primary transition-colors" href="dichvu.php" onclick="toggleMobileMenu()">Service List</a>
                        <a class="text-xl font-bold text-slate-heading hover:text-primary transition-colors" href="about.php" onclick="toggleMobileMenu()">About Us</a>
                        <a class="text-xl font-bold text-slate-heading hover:text-primary transition-colors" href="contact.php" onclick="toggleMobileMenu()">Contact</a>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-6">
                <?php if ($currentUser): ?>
                    <span class="text-sm font-bold text-slate-heading">Signed in as <?= htmlspecialchars($currentUser['full_name']); ?></span>
                    <a class="text-sm font-bold text-primary hover:text-primary/80 transition-colors" href="profile.php">Profile</a>
                    <a class="text-sm font-bold text-slate-heading hover:text-primary transition-colors" href="../backend/logout.php">Sign Out</a>
                <?php else: ?>
                    <a class="text-sm font-bold text-slate-heading hover:text-primary transition-colors" href="signin.php">Sign In</a>
                    <a href="signup.php" class="bg-primary text-white px-7 py-2.5 rounded-full font-bold hover:shadow-lg hover:shadow-primary/20 transition-all">Sign Up</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="relative pt-16 lg:pt-28 pb-24">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-20 items-center">
                <div class="relative order-2 lg:order-1">
                    <div class="absolute -top-6 -left-6 w-32 h-32 bg-primary/5 rounded-full blur-2xl"></div>
                    <img alt="Modern Clinical Environment" class="rounded-2xl shadow-xl relative z-10 w-full object-cover aspect-[4/5]" src="https://images.unsplash.com/photo-1629909613654-28e377c37b09?w=800&q=80"/>
                    <div class="absolute -bottom-8 -right-8 bg-white p-8 rounded-xl shadow-2xl z-20 border border-slate-100 hidden md:block">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-primary/10 rounded-full flex items-center justify-center">
                                <span class="material-symbols-outlined text-primary text-3xl">verified_user</span>
                            </div>
                            <div>
                                <p class="text-[10px] font-black uppercase tracking-[0.2em] text-primary">Certified Quality</p>
                                <p class="font-bold text-slate-heading text-lg">ISO 9001 Facility</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="space-y-10 order-1 lg:order-2">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-slate-50 border border-slate-100 rounded-full">
                        <span class="w-2 h-2 bg-primary rounded-full"></span>
                        <span class="text-xs font-bold text-slate-heading uppercase tracking-widest">Medical Grade Excellence</span>
                    </div>
                    <h1 class="text-5xl lg:text-7xl font-extrabold text-slate-heading leading-[1.1]">
                        Your Skin Journey, <br/><span class="text-primary">Clinically Guided.</span>
                    </h1>
                    <p class="text-lg text-cool-gray leading-relaxed max-w-xl">
                        Structured treatment plans designed by leading dermatologists and tracked session by session with high-resolution diagnostic imaging for measurable, lasting results.
                    </p>
                    <div class="flex flex-wrap gap-5 pt-4">
                        <button class="bg-primary text-white px-10 py-5 rounded-full font-bold text-lg hover:shadow-xl hover:shadow-primary/30 transition-all">Start Your Skin Plan</button>
                        <a href="dichvu.php" class="border-2 border-slate-200 text-slate-heading px-10 py-5 rounded-full font-bold text-lg hover:border-primary hover:text-primary transition-all">Explore Treatments</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Us Showcase -->
    <section id="about-us" class="py-24 bg-slate-50" style="scroll-margin-top: 80px;">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-10 items-center">
                <div class="rounded-[32px] overflow-hidden shadow-2xl border border-slate-100 bg-white relative">
                    <img class="w-full h-[460px] object-cover" src="https://images.unsplash.com/photo-1545239351-1141bd82e8a6?w=1200&q=80" alt="Clinic treatment room"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/70 to-transparent"></div>
                    <div class="absolute left-6 bottom-6 text-white space-y-1">
                        <p class="text-xs uppercase tracking-[0.3em] text-white/70">The Bespoke Difference</p>
                        <p class="text-2xl font-black">Elysian Skin Clinic</p>
                    </div>
                </div>

                <div class="space-y-6">
                    <p class="text-xs font-bold uppercase tracking-[0.5em] text-primary">About Us</p>
                    <h2 class="text-4xl lg:text-5xl font-black text-slate-heading leading-tight">Science meets soul: redefining skincare with precision and warmth.</h2>
                    <p class="text-lg text-cool-gray leading-relaxed">We blend clinical rigor, concierge care, and thoughtful storytelling so you never question what’s next on your skin journey. Every treatment plan is designed alongside a dermatologist, continuously reviewed with diagnostic imaging, and delivered with transparent coaching.</p>
                    <p class="text-base text-slate-heading">Our care team bridges the science of evidence-backed treatments with the rituals that make each visit feel restorative. Expect documented outcomes, personalized education, and proactive follow-ups.</p>
                    <div class="flex flex-wrap gap-4">
                        <button class="bg-primary text-white px-8 py-4 rounded-full font-bold shadow-lg shadow-primary/20 hover:shadow-xl hover:shadow-primary/40 transition">Book Your Consultation</button>
                        <button class="border border-slate-200 text-slate-heading px-8 py-4 rounded-full font-bold hover:border-primary hover:text-primary transition">View Treatments</button>
                    </div>
                    <div class="grid sm:grid-cols-3 gap-4 pt-6">
                        <div class="bg-white rounded-3xl p-5 border border-slate-100 text-center">
                            <p class="text-3xl font-black text-slate-heading">12+</p>
                            <p class="text-xs uppercase tracking-[0.3em] text-slate-400">Years of research</p>
                        </div>
                        <div class="bg-white rounded-3xl p-5 border border-slate-100 text-center">
                            <p class="text-3xl font-black text-slate-heading">4.9/5</p>
                            <p class="text-xs uppercase tracking-[0.3em] text-slate-400">Trusted reviews</p>
                        </div>
                        <div class="bg-white rounded-3xl p-5 border border-slate-100 text-center">
                            <p class="text-3xl font-black text-slate-heading">3200+</p>
                            <p class="text-xs uppercase tracking-[0.3em] text-slate-400">Completed plans</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto space-y-4">
                <p class="text-xs font-bold uppercase tracking-[0.5em] text-primary">Our Core Values</p>
                <h3 class="text-3xl font-black text-slate-heading">Precision, purity, and people-first care</h3>
                <p class="text-cool-gray">We never compromise on scientific integrity or the warmth of the experience.</p>
            </div>
            <div class="grid lg:grid-cols-3 gap-6 mt-10">
                <div class="bg-slate-50 rounded-3xl p-8 border border-slate-100 text-center space-y-4">
                    <span class="material-symbols-outlined text-primary text-4xl">medical_services</span>
                    <h4 class="text-xl font-bold text-slate-heading">Clinical Precision</h4>
                    <p class="text-sm text-slate-500">Data-rich diagnostics keep every treatment measurable.</p>
                </div>
                <div class="bg-slate-50 rounded-3xl p-8 border border-slate-100 text-center space-y-4">
                    <span class="material-symbols-outlined text-primary text-4xl">sparkles</span>
                    <h4 class="text-xl font-bold text-slate-heading">Pure Ingredients</h4>
                    <p class="text-sm text-slate-500">Medical-grade actives, tailored to your skin profile.</p>
                </div>
                <div class="bg-slate-50 rounded-3xl p-8 border border-slate-100 text-center space-y-4">
                    <span class="material-symbols-outlined text-primary text-4xl">favorite</span>
                    <h4 class="text-xl font-bold text-slate-heading">Client-Centric</h4>
                    <p class="text-sm text-slate-500">Concierge planning, coaching, and accountability.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-slate-50">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-[0.95fr,1.05fr] gap-10 items-center">
                <div class="rounded-[32px] overflow-hidden shadow-2xl border border-slate-100 bg-white">
                    <img class="w-full h-[520px] object-cover" src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?w=800&q=80" alt="Doctor portrait"/>
                </div>
                <div class="space-y-5 p-8 bg-white rounded-[32px] border border-slate-100 shadow-lg">
                    <p class="text-xs font-bold uppercase tracking-[0.4em] text-primary">Dr. Elena Sterling, MD</p>
                    <h3 class="text-3xl font-black text-slate-heading">Board-certified dermatologist</h3>
                    <p class="text-lg text-slate-heading leading-relaxed">Dr. Sterling translates clinical research into approachable, measurable care. She trains our team on physiology-first protocols and personally reviews every bespoke roadmap.</p>
                    <ul class="space-y-4">
                        <li class="flex items-start gap-3 text-slate-600">
                            <span class="material-symbols-outlined text-primary mt-1">check_circle</span>
                            <span>Session-by-session documentation & quantitative imaging</span>
                        </li>
                        <li class="flex items-start gap-3 text-slate-600">
                            <span class="material-symbols-outlined text-primary mt-1">check_circle</span>
                            <span>Concierge guidance + lifestyle coaching</span>
                        </li>
                        <li class="flex items-start gap-3 text-slate-600">
                            <span class="material-symbols-outlined text-primary mt-1">check_circle</span>
                            <span>Continuous review to keep progress on track</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center space-y-3">
                <p class="text-xs font-bold uppercase tracking-[0.5em] text-primary">Inside Our Clinic</p>
                <h3 class="text-3xl font-black text-slate-heading">A calm, medical sanctuary</h3>
                <p class="text-cool-gray">Every space is designed for comfort before, during, and after treatment.</p>
            </div>
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 mt-8">
                <img class="w-full h-48 object-cover rounded-2xl" src="https://images.unsplash.com/photo-1505691938895-1758d7feb511?w=600&q=80" alt="Reception"/>
                <img class="w-full h-48 object-cover rounded-2xl" src="https://images.unsplash.com/photo-1600180758890-8f4228f74e4b?w=600&q=80" alt="Treatment room"/>
                <img class="w-full h-48 object-cover rounded-2xl" src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=600&q=80" alt="Products"/>
                <img class="w-full h-48 object-cover rounded-2xl" src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?w=600&q=80" alt="Hallway"/>
            </div>
        </div>
    </section>

    <section class="py-20 bg-slate-900 text-white">
        <div class="container mx-auto px-6 text-center space-y-6">
            <p class="text-xs uppercase tracking-[0.5em] text-white/70">Ready to begin your personalized skin journey?</p>
            <h3 class="text-3xl lg:text-4xl font-black">Book a consultation and begin a treatment pathway that finally feels bespoke.</h3>
            <div class="flex flex-wrap justify-center gap-4">
                <button class="bg-primary text-white px-8 py-4 rounded-full font-bold shadow-lg shadow-primary/30 hover:shadow-xl transition">Book Your Consultation</button>
                <button class="border border-white/40 text-white px-8 py-4 rounded-full font-bold hover:border-white hover:text-primary transition">View Treatments</button>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-24 bg-slate-900 text-white" style="scroll-margin-top: 80px;">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-16">
                <div class="space-y-8">
                    <div>
                        <p class="text-xs font-bold uppercase tracking-[0.5em] text-primary mb-3">Get in Touch</p>
                        <h2 class="text-4xl lg:text-5xl font-black leading-tight">We'd love to hear from you.</h2>
                    </div>
                    <p class="text-lg text-slate-400 leading-relaxed">Whether you're ready to book your first consultation or just have questions about our treatments, our team is here to help.</p>
                    
                    <div class="grid sm:grid-cols-2 gap-6 pt-4">
                        <div class="bg-slate-800/50 rounded-2xl p-6 border border-slate-700">
                            <span class="material-symbols-outlined text-primary text-3xl mb-3">location_on</span>
                            <h4 class="font-bold text-white mb-2">Visit Us</h4>
                            <p class="text-sm text-slate-400">123 Dermatology Lane<br/>Ho Chi Minh City, Vietnam</p>
                        </div>
                        <div class="bg-slate-800/50 rounded-2xl p-6 border border-slate-700">
                            <span class="material-symbols-outlined text-primary text-3xl mb-3">phone</span>
                            <h4 class="font-bold text-white mb-2">Call Us</h4>
                            <p class="text-sm text-slate-400">+84 (0) 123 456 789<br/>Mon - Sat: 9AM - 7PM</p>
                        </div>
                        <div class="bg-slate-800/50 rounded-2xl p-6 border border-slate-700">
                            <span class="material-symbols-outlined text-primary text-3xl mb-3">email</span>
                            <h4 class="font-bold text-white mb-2">Email Us</h4>
                            <p class="text-sm text-slate-400">care@elysian.clinic<br/>We reply within 24 hours</p>
                        </div>
                        <div class="bg-slate-800/50 rounded-2xl p-6 border border-slate-700">
                            <span class="material-symbols-outlined text-primary text-3xl mb-3">chat</span>
                            <h4 class="font-bold text-white mb-2">Live Chat</h4>
                            <p class="text-sm text-slate-400">Available on website<br/>9AM - 9PM daily</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-[32px] p-8 lg:p-10 text-slate-900">
                    <h3 class="text-2xl font-black mb-6">Send us a message</h3>
                    <form id="contact-form" class="space-y-5">
                        <div class="grid sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Your Name</label>
                                <input type="text" name="name" placeholder="John Doe" class="w-full px-5 py-4 rounded-xl border border-slate-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition"/>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Email Address</label>
                                <input type="email" name="email" placeholder="john@example.com" class="w-full px-5 py-4 rounded-xl border border-slate-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition"/>
                            </div>
                        </div>
                        <div class="grid sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Phone Number</label>
                                <input type="tel" name="phone" placeholder="+84 xxx xxx xxx" class="w-full px-5 py-4 rounded-xl border border-slate-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition"/>
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Subject</label>
                                <select name="subject" class="w-full px-5 py-4 rounded-xl border border-slate-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition bg-white">
                                    <option>General Inquiry</option>
                                    <option>Book Consultation</option>
                                    <option>Treatment Question</option>
                                    <option>Feedback</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Your Message</label>
                            <textarea name="message" rows="5" placeholder="Tell us how we can help you..." class="w-full px-5 py-4 rounded-xl border border-slate-200 focus:border-primary focus:ring-2 focus:ring-primary/20 outline-none transition resize-none"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-primary text-white py-5 rounded-xl font-bold text-lg hover:shadow-xl hover:shadow-primary/30 transition">Send Message</button>
                        <div id="form-message" class="hidden p-4 rounded-xl text-center"></div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Protocol Section -->
    <section class="py-24 bg-slate-50/50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-20">
                <h2 class="text-4xl font-extrabold text-slate-heading">The Elysian Protocol</h2>
                <div class="w-20 h-1 bg-primary mx-auto mt-6"></div>
                <p class="text-cool-gray mt-6 max-w-2xl mx-auto text-lg">A scientifically-backed, data-driven pathway to optimal skin health and cellular rejuvenation.</p>
            </div>
            <div class="grid md:grid-cols-3 gap-16">
                <div class="text-center group bg-white p-10 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-all">
                    <div class="w-24 h-24 bg-primary/5 rounded-2xl flex items-center justify-center mx-auto mb-8 group-hover:bg-primary transition-all duration-300">
                        <span class="material-symbols-outlined text-5xl text-primary group-hover:text-white">fingerprint</span>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-slate-heading">1. Skin Assessment</h3>
                    <p class="text-cool-gray leading-relaxed">Comprehensive digital face scans to identify underlying conditions, UV damage, and hydration baseline metrics.</p>
                </div>
                <div class="text-center group bg-white p-10 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-all">
                    <div class="w-24 h-24 bg-primary/5 rounded-2xl flex items-center justify-center mx-auto mb-8 group-hover:bg-primary transition-all duration-300">
                        <span class="material-symbols-outlined text-5xl text-primary group-hover:text-white">assignment_turned_in</span>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-slate-heading">2. Personalized Plan</h3>
                    <p class="text-cool-gray leading-relaxed">A custom medical roadmap detailing every clinical intervention, wavelength selection, and session objective.</p>
                </div>
                <div class="text-center group bg-white p-10 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-all">
                    <div class="w-24 h-24 bg-primary/5 rounded-2xl flex items-center justify-center mx-auto mb-8 group-hover:bg-primary transition-all duration-300">
                        <span class="material-symbols-outlined text-5xl text-primary group-hover:text-white">monitoring</span>
                    </div>
                    <h3 class="text-2xl font-bold mb-4 text-slate-heading">3. Progress Tracking</h3>
                    <p class="text-cool-gray leading-relaxed">Session-by-session data logging and polarized photo documentation to verify physiological improvements.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16 gap-8">
                <div class="max-w-xl">
                    <h2 class="text-4xl font-extrabold text-slate-heading mb-4">Service List</h2>
                    <p class="text-cool-gray text-lg">Precision medical therapies utilizing state-of-the-art clinical technology for targeted skin transformation.</p>
                </div>
                <a class="group text-primary font-bold flex items-center gap-2 hover:gap-4 transition-all" href="dichvu.php">View Full Menu <span class="material-symbols-outlined">arrow_forward</span></a>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Combo Banner -->
                <div class="lg:col-span-2 bg-gradient-to-br from-primary to-cyan-400 rounded-3xl p-8 text-white relative overflow-hidden group">
                    <div class="absolute right-0 top-0 w-64 h-64 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2 group-hover:scale-110 transition-transform duration-500"></div>
                    <div class="absolute right-8 bottom-8 w-32 h-32 bg-white/10 rounded-full translate-y-1/4"></div>
                    <div class="relative z-10">
                        <span class="inline-block px-3 py-1 bg-white/20 rounded-full text-xs font-bold uppercase tracking-widest mb-4">Limited Time</span>
                        <h3 class="text-3xl font-black mb-2">Signature Combos</h3>
                        <p class="text-white/80 mb-6 max-w-xs">Save up to 25% with our curated treatment packages</p>
                        <a href="dichvu.php" class="inline-flex items-center gap-2 bg-white text-primary px-6 py-3 rounded-full font-bold hover:shadow-lg transition-all">View Packages <span class="material-symbols-outlined">arrow_forward</span></a>
                    </div>
                </div>
                <!-- Service 1 -->
                <a href="service-detail.php?id=1" class="bg-white rounded-2xl overflow-hidden border border-slate-100 hover:shadow-2xl transition-all duration-500 group block">
                    <div class="h-64 overflow-hidden relative">
                        <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?w=800&q=80"/>
                    </div>
                    <div class="p-6">
                        <h4 class="font-extrabold text-lg text-slate-heading mb-2">Hydra Renewal</h4>
                        <p class="text-sm text-cool-gray">Deep cellular hydration for immediate radiance.</p>
                    </div>
                </a>
                <!-- Service 2 -->
                <a href="service-detail.php?id=2" class="bg-white rounded-2xl overflow-hidden border border-slate-100 hover:shadow-2xl transition-all duration-500 group block">
                    <div class="h-64 overflow-hidden relative">
                        <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?w=800&q=80"/>
                    </div>
                    <div class="p-6">
                        <h4 class="font-extrabold text-lg text-slate-heading mb-2">Laser Resurfacing</h4>
                        <p class="text-sm text-cool-gray">Fractional CO2 for wrinkle reduction.</p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-slate-900 text-white py-16">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-12">
                <div class="col-span-2">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
                            <span class="material-symbols-outlined text-white">spa</span>
                        </div>
                        <span class="text-xl font-extrabold">Elysian <span class="text-primary">Skin Clinic</span></span>
                    </div>
                    <p class="text-slate-400 max-w-sm">Luxury clinical dermatology for those who demand precision and excellence in skin care.</p>
                </div>
                <div>
                    <h4 class="font-bold mb-6">Clinic Info</h4>
                    <ul class="space-y-4 text-sm text-slate-400">
                        <li><a href="dichvu.php" class="hover:text-primary transition-colors">Service Menu</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">Our Doctors</a></li>
                        <li><a href="#" class="hover:text-primary transition-colors">Locations</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-6">Contact</h4>
                    <ul class="space-y-4 text-sm text-slate-400">
                        <li>+84 (0) 123 456 789</li>
                        <li>care@elysian.clinic</li>
                        <li>Ho Chi Minh City, VN</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-slate-800 mt-12 pt-8 flex flex-col md:flex-row justify-between text-xs text-slate-500 uppercase tracking-widest">
                <p>© 2024 Elysian Skin Clinic. All Rights Reserved.</p>
                <div class="flex gap-6 mt-4 md:mt-0">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>
<script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            if (menu.style.display === 'none' || menu.style.display === '') {
                menu.style.display = 'block';
            } else {
                menu.style.display = 'none';
            }
            document.body.classList.toggle('overflow-hidden');
        }
    </script>
</body>
</html>
