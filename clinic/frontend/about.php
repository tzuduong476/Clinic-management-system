<?php
require_once '../backend/db.php';
$currentUser = getCurrentUser();
?>

<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>About Us | Elysian Skin Clinic</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@200;300;400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#0db9f2",
                        "background-light": "#FFFFFF",
                        "background-dark": "#101e22",
                        "slate-heading": "#33475B",
                        "cool-gray": "#64748B",
                    },
                    fontFamily: {
                        "display": ["Manrope", "sans-serif"]
                    },
                    borderRadius: {"DEFAULT": "1rem", "lg": "2rem", "xl": "3rem", "full": "9999px"},
                },
            },
        }
    </script>
    <style>
        body { font-family: 'Manrope', sans-serif; }
        .material-symbols-outlined {
            font-family: 'Material Symbols Outlined';
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
    </style>
</head>
<body class="bg-white text-slate-900 font-display">
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-100">
        <nav class="container mx-auto px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary text-2xl">spa</span>
                </div>
                <span class="text-lg font-black text-slate-900">Elysian <span class="text-primary">Skin Clinic</span></span>
            </div>
            <div class="flex items-center gap-10">
                <a class="text-sm font-bold text-slate-heading hover:text-primary transition-colors" href="home.php">Home</a>
                <a class="text-sm font-bold text-slate-heading hover:text-primary transition-colors" href="dichvu.php">Service List</a>
                <a class="text-sm font-bold text-primary" href="about.php">About Us</a>
                <a class="text-sm font-bold text-slate-heading hover:text-primary transition-colors" href="contact.php">Contact</a>
            </div>
            <div class="flex items-center gap-6">
                <?php if ($currentUser): ?>
                    <span class="text-sm font-bold text-slate-heading">Hi, <?= htmlspecialchars($currentUser['full_name']); ?></span>
                    <a href="../backend/logout.php" class="px-6 py-2.5 text-sm font-bold text-slate-heading hover:bg-primary/10 transition-all rounded-full">Sign Out</a>
                <?php else: ?>
                    <a href="signin.php" class="text-sm font-bold text-slate-heading hover:text-primary transition-colors">Sign In</a>
                    <a href="signup.php" class="bg-primary text-white px-7 py-2.5 rounded-full font-bold hover:shadow-lg hover:shadow-primary/20 transition-all">Sign Up</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>

    <main>
        <!-- About Us Hero -->
        <section class="py-16 lg:py-24 bg-slate-50">
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
                        <p class="text-lg text-cool-gray leading-relaxed">We blend clinical rigor, concierge care, and thoughtful storytelling so you never question what's next on your skin journey. Every treatment plan is designed alongside a dermatologist, continuously reviewed with diagnostic imaging, and delivered with transparent coaching.</p>
                        <p class="text-base text-slate-heading">Our care team bridges the science of evidence-backed treatments with the rituals that make each visit feel restorative. Expect documented outcomes, personalized education, and proactive follow-ups.</p>
                        <div class="flex flex-wrap gap-4">
                            <a href="dichvu.php" class="bg-primary text-white px-8 py-4 rounded-full font-bold shadow-lg shadow-primary/20 hover:shadow-xl hover:shadow-primary/40 transition">Book Your Consultation</a>
                            <a href="dichvu.php" class="border border-slate-200 text-slate-heading px-8 py-4 rounded-full font-bold hover:border-primary hover:text-primary transition">View Treatments</a>
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

        <!-- Core Values -->
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

        <!-- Doctor Section -->
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

        <!-- Clinic Gallery -->
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

        <!-- CTA -->
        <section class="py-20 bg-slate-900 text-white">
            <div class="container mx-auto px-6 text-center space-y-6">
                <p class="text-xs uppercase tracking-[0.5em] text-white/70">Ready to begin your personalized skin journey?</p>
                <h3 class="text-3xl lg:text-4xl font-black">Book a consultation and begin a treatment pathway that finally feels bespoke.</h3>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="dichvu.php" class="bg-primary text-white px-8 py-4 rounded-full font-bold shadow-lg shadow-primary/30 hover:shadow-xl transition">Book Your Consultation</a>
                    <a href="dichvu.php" class="border border-white/40 text-white px-8 py-4 rounded-full font-bold hover:border-white hover:text-primary transition">View Treatments</a>
                </div>
            </div>
        </section>
    </main>

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
                        <li><a href="about.php" class="hover:text-primary transition-colors">About Us</a></li>
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
                <p>&copy; 2024 Elysian Skin Clinic. All Rights Reserved.</p>
                <div class="flex gap-6 mt-4 md:mt-0">
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
