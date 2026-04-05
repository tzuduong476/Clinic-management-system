<?php
require_once '../backend/db.php';
$currentUser = getCurrentUser();
?>

<!DOCTYPE html>

<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Service List | Elysian Skin Clinic</title>
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
<body class="bg-background-light text-slate-900 antialiased">
    <!-- Header / Navigation -->
    <header class="sticky top-0 z-50 w-full border-b border-slate-100 bg-white/95 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center">
                    <span class="material-symbols-outlined text-primary text-2xl">spa</span>
                </div>
                <span class="text-lg font-black text-slate-900">Elysian <span class="text-primary">Skin Clinic</span></span>
            </div>
            <nav class="hidden md:flex items-center gap-10">
                <a class="text-sm font-bold text-slate-heading hover:text-primary transition-colors" href="home.php">Home</a>
                <a class="text-sm font-bold text-primary" href="dichvu.php">Service List</a>
                <a class="text-sm font-bold text-slate-heading hover:text-primary transition-colors" href="about.php">About Us</a>
                <a class="text-sm font-bold text-slate-heading hover:text-primary transition-colors" href="contact.php">Contact</a>
            </nav>
            <div class="flex items-center gap-4">
                <?php if ($currentUser): ?>
                    <span class="text-sm font-bold text-slate-heading">Hi, <?= htmlspecialchars($currentUser['full_name']); ?></span>
                    <a href="../backend/logout.php" class="px-6 py-2.5 text-sm font-bold text-slate-heading hover:bg-primary/10 transition-all rounded-full">Sign Out</a>
                <?php else: ?>
                    <a href="signin.php" class="px-6 py-2.5 text-sm font-bold text-slate-heading hover:bg-primary/10 transition-all rounded-full">Sign In</a>
                    <a href="signup.php" class="px-6 py-2.5 text-sm font-bold bg-primary text-white hover:shadow-lg hover:shadow-primary/30 transition-all rounded-full">Sign Up</a>
                <?php endif; ?>
            </div>
        </div>
    </header>
    <main class="max-w-7xl mx-auto px-6 py-12">
        <!-- Page Header -->
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-primary/10 rounded-full mb-6">
                <span class="w-2 h-2 bg-primary rounded-full"></span>
                <span class="text-xs font-bold text-primary uppercase tracking-widest">Our Services</span>
            </div>
            <h1 class="text-4xl lg:text-5xl font-black text-slate-heading mb-4">Service List</h1>
            <p class="text-lg text-cool-gray max-w-2xl mx-auto">Precision medical therapies utilizing state-of-the-art clinical technology for targeted skin transformation.</p>
        </div>

        <!-- Combo Packages Section -->
    <section class="py-20 bg-gradient-to-br from-primary/5 via-white to-primary/10">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-primary/10 rounded-full mb-6">
                    <span class="w-2 h-2 bg-primary rounded-full"></span>
                    <span class="text-xs font-bold text-primary uppercase tracking-widest">Special Packages</span>
                </div>
                <h2 class="text-4xl lg:text-5xl font-black text-slate-heading mb-4">Signature Combos</h2>
                <p class="text-lg text-cool-gray max-w-2xl mx-auto">Curated treatment combinations for comprehensive skin transformation and lasting results.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Combo 1: Glow Package -->
                <div class="bg-white rounded-3xl overflow-hidden border-2 border-primary/20 hover:border-primary transition-all duration-500 group relative">
                    <div class="absolute top-4 right-4 bg-primary text-white text-xs font-bold px-3 py-1 rounded-full">POPULAR</div>
                    <div class="h-72 overflow-hidden relative">
                        <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="assets/combo-glow.png" alt="Glow Package"/>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 text-white">
                            <span class="text-xs font-bold uppercase tracking-widest opacity-80">3 Sessions</span>
                            <h3 class="text-2xl font-black mt-1">Glow Package</h3>
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center gap-2 mb-4">
                            <span class="text-2xl font-black text-primary">5.500.000 VND</span>
                            <span class="text-sm text-cool-gray line-through">7.000.000 VND</span>
                        </div>
                        <ul class="space-y-3 mb-6">
                            <li class="flex items-center gap-2 text-sm text-cool-gray"><span class="material-symbols-outlined text-primary text-lg">check_circle</span> Hydra Renewal x2</li>
                            <li class="flex items-center gap-2 text-sm text-cool-gray"><span class="material-symbols-outlined text-primary text-lg">check_circle</span> LED Light Therapy x1</li>
                            <li class="flex items-center gap-2 text-sm text-cool-gray"><span class="material-symbols-outlined text-primary text-lg">check_circle</span> Free Skin Analysis</li>
                        </ul>
                        <a href="service-detail.php?id=combo1" class="block w-full bg-primary text-white text-center py-4 rounded-xl font-bold hover:shadow-xl hover:shadow-primary/30 transition-all">Book Now</a>
                    </div>
                </div>

                <!-- Combo 2: Ultimate Transformation -->
                <div class="bg-white rounded-3xl overflow-hidden border-2 border-primary/30 hover:border-primary transition-all duration-500 group relative transform md:-translate-y-4">
                    <div class="absolute top-4 right-4 bg-gradient-to-r from-amber-400 to-orange-500 text-white text-xs font-bold px-3 py-1 rounded-full">BEST VALUE</div>
                    <div class="h-72 overflow-hidden relative">
                        <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="assets/combo-ultimate.png" alt="Ultimate Package"/>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 text-white">
                            <span class="text-xs font-bold uppercase tracking-widest opacity-80">5 Sessions</span>
                            <h3 class="text-2xl font-black mt-1">Ultimate Transformation</h3>
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center gap-2 mb-4">
                            <span class="text-2xl font-black text-primary">12.000.000 VND</span>
                            <span class="text-sm text-cool-gray line-through">15.000.000 VND</span>
                        </div>
                        <ul class="space-y-3 mb-6">
                            <li class="flex items-center gap-2 text-sm text-cool-gray"><span class="material-symbols-outlined text-primary text-lg">check_circle</span> Laser Resurfacing x2</li>
                            <li class="flex items-center gap-2 text-sm text-cool-gray"><span class="material-symbols-outlined text-primary text-lg">check_circle</span> Hydra Renewal x2</li>
                            <li class="flex items-center gap-2 text-sm text-cool-gray"><span class="material-symbols-outlined text-primary text-lg">check_circle</span> Dermal Fillers x1</li>
                            <li class="flex items-center gap-2 text-sm text-cool-gray"><span class="material-symbols-outlined text-primary text-lg">check_circle</span> VIP Aftercare Kit</li>
                        </ul>
                        <a href="service-detail.php?id=combo2" class="block w-full bg-gradient-to-r from-primary to-cyan-400 text-white text-center py-4 rounded-xl font-bold hover:shadow-xl hover:shadow-primary/30 transition-all">Book Now</a>
                    </div>
                </div>

                <!-- Combo 3: Ageless Package -->
                <div class="bg-white rounded-3xl overflow-hidden border-2 border-primary/20 hover:border-primary transition-all duration-500 group relative">
                    <div class="h-72 overflow-hidden relative">
                        <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="assets/combo-ageless.png" alt="Ageless Package"/>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div class="absolute bottom-6 left-6 text-white">
                            <span class="text-xs font-bold uppercase tracking-widest opacity-80">4 Sessions</span>
                            <h3 class="text-2xl font-black mt-1">Ageless Package</h3>
                        </div>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center gap-2 mb-4">
                            <span class="text-2xl font-black text-primary">8.500.000 VND</span>
                            <span class="text-sm text-cool-gray line-through">10.500.000 VND</span>
                        </div>
                        <ul class="space-y-3 mb-6">
                            <li class="flex items-center gap-2 text-sm text-cool-gray"><span class="material-symbols-outlined text-primary text-lg">check_circle</span> Advanced Acne Therapy x2</li>
                            <li class="flex items-center gap-2 text-sm text-cool-gray"><span class="material-symbols-outlined text-primary text-lg">check_circle</span> Chemical Peel x1</li>
                            <li class="flex items-center gap-2 text-sm text-cool-gray"><span class="material-symbols-outlined text-primary text-lg">check_circle</span> LED Light Therapy x1</li>
                        </ul>
                        <a href="service-detail.php?id=combo3" class="block w-full bg-primary text-white text-center py-4 rounded-xl font-bold hover:shadow-xl hover:shadow-primary/30 transition-all">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Individual Services Grid -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Service 1: Hydra Renewal -->
            <a href="service-detail.php?id=1" class="bg-white rounded-2xl overflow-hidden border border-slate-100 hover:shadow-2xl transition-all duration-500 group block">
                <div class="h-64 overflow-hidden relative">
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?w=800&q=80" alt="Hydra Renewal"/>
                </div>
                <div class="p-8">
                    <h4 class="font-extrabold text-xl text-slate-heading mb-3">Hydra Renewal</h4>
                    <p class="text-sm text-cool-gray mb-6 leading-relaxed">Deep cellular hydration and detoxification using advanced vortex technology for immediate radiance.</p>
                    <span class="text-primary text-sm font-bold border-b-2 border-primary/20 hover:border-primary transition-all pb-1 uppercase tracking-widest">View Details</span>
                </div>
            </a>

            <!-- Service 2: Laser Resurfacing -->
            <a href="service-detail.php?id=2" class="bg-white rounded-2xl overflow-hidden border border-slate-100 hover:shadow-2xl transition-all duration-500 group block">
                <div class="h-64 overflow-hidden relative">
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?w=800&q=80" alt="Laser Resurfacing"/>
                </div>
                <div class="p-8">
                    <h4 class="font-extrabold text-xl text-slate-heading mb-3">Laser Resurfacing</h4>
                    <p class="text-sm text-cool-gray mb-6 leading-relaxed">Fractional CO2 laser treatment for wrinkle reduction and skin texture improvement.</p>
                    <span class="text-primary text-sm font-bold border-b-2 border-primary/20 hover:border-primary transition-all pb-1 uppercase tracking-widest">View Details</span>
                </div>
            </a>

            <!-- Service 3: Advanced Acne Therapy -->
            <a href="service-detail.php?id=3" class="bg-white rounded-2xl overflow-hidden border border-slate-100 hover:shadow-2xl transition-all duration-500 group block">
                <div class="h-64 overflow-hidden relative">
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="https://images.unsplash.com/photo-1552693673-1bf958298935?w=800&q=80" alt="Advanced Acne Therapy"/>
                </div>
                <div class="p-8">
                    <h4 class="font-extrabold text-xl text-slate-heading mb-3">Advanced Acne Therapy</h4>
                    <p class="text-sm text-cool-gray mb-6 leading-relaxed">Multi-dimensional approach combining blue light therapy with pharmaceutical-grade treatments.</p>
                    <span class="text-primary text-sm font-bold border-b-2 border-primary/20 hover:border-primary transition-all pb-1 uppercase tracking-widest">View Details</span>
                </div>
            </a>

            <!-- Service 4: Dermal Fillers -->
            <a href="service-detail.php?id=4" class="bg-white rounded-2xl overflow-hidden border border-slate-100 hover:shadow-2xl transition-all duration-500 group block">
                <div class="h-64 overflow-hidden relative">
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="https://images.unsplash.com/photo-1512290923902-8a9f81dc236c?w=800&q=80" alt="Dermal Fillers"/>
                </div>
                <div class="p-8">
                    <h4 class="font-extrabold text-xl text-slate-heading mb-3">Dermal Fillers</h4>
                    <p class="text-sm text-cool-gray mb-6 leading-relaxed">Hyaluronic acid fillers for volume restoration and facial contouring.</p>
                    <span class="text-primary text-sm font-bold border-b-2 border-primary/20 hover:border-primary transition-all pb-1 uppercase tracking-widest">View Details</span>
                </div>
            </a>

            <!-- Service 5: Chemical Peel -->
            <a href="service-detail.php?id=5" class="bg-white rounded-2xl overflow-hidden border border-slate-100 hover:shadow-2xl transition-all duration-500 group block">
                <div class="h-64 overflow-hidden relative">
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="https://images.unsplash.com/photo-1557804506-669a67965ba0?w=800&q=80" alt="Chemical Peel"/>
                </div>
                <div class="p-8">
                    <h4 class="font-extrabold text-xl text-slate-heading mb-3">Chemical Peel</h4>
                    <p class="text-sm text-cool-gray mb-6 leading-relaxed">Medical-grade exfoliation for skin renewal and pigmentation correction.</p>
                    <span class="text-primary text-sm font-bold border-b-2 border-primary/20 hover:border-primary transition-all pb-1 uppercase tracking-widest">View Details</span>
                </div>
            </a>

            <!-- Service 6: LED Light Therapy -->
            <a href="service-detail.php?id=6" class="bg-white rounded-2xl overflow-hidden border border-slate-100 hover:shadow-2xl transition-all duration-500 group block">
                <div class="h-64 overflow-hidden relative">
                    <img class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="https://images.unsplash.com/photo-1519415510236-718bdfcd89c8?w=800&q=80" alt="LED Light Therapy"/>
                </div>
                <div class="p-8">
                    <h4 class="font-extrabold text-xl text-slate-heading mb-3">LED Light Therapy</h4>
                    <p class="text-sm text-cool-gray mb-6 leading-relaxed">Non-invasive light treatment for acne, aging, and skin rejuvenation.</p>
                    <span class="text-primary text-sm font-bold border-b-2 border-primary/20 hover:border-primary transition-all pb-1 uppercase tracking-widest">View Details</span>
                </div>
            </a>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-slate-100 py-16 mt-12">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-12">
            <div class="col-span-1 md:col-span-2 space-y-6">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined text-white">spa</span>
                    </div>
                    <h1 class="text-xl font-extrabold tracking-tight text-slate-heading">Elysian <span class="text-primary">Skin Clinic</span></h1>
                </div>
                <p class="text-cool-gray max-w-sm">
                    Luxury clinical dermatology for those who demand precision and excellence in skin care.
                </p>
            </div>
            <div>
                <h4 class="font-bold text-slate-heading mb-6">Clinic Info</h4>
                <ul class="space-y-4 text-sm font-medium text-cool-gray">
                    <li><a class="hover:text-primary transition-colors" href="dichvu.php">Service Menu</a></li>
                    <li><a class="hover:text-primary transition-colors" href="#">Our Doctors</a></li>
                    <li><a class="hover:text-primary transition-colors" href="#">Locations</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-slate-heading mb-6">Contact</h4>
                <ul class="space-y-4 text-sm font-medium text-cool-gray">
                    <li class="flex items-center gap-2"><span class="material-symbols-outlined text-xs">call</span> +84 (0) 123 456 789</li>
                    <li class="flex items-center gap-2"><span class="material-symbols-outlined text-xs">mail</span> care@elysian.clinic</li>
                </ul>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-6 mt-16 pt-8 border-t border-slate-100 flex flex-col md:flex-row justify-between items-center gap-4 text-xs font-bold text-cool-gray uppercase tracking-widest">
            <p>© 2024 Elysian Skin Clinic. All Rights Reserved.</p>
            <div class="flex gap-8">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
            </div>
        </div>
    </footer>
</body>
</html>
