<?php
require_once '../backend/db.php';
$currentUser = getCurrentUser();
?>

<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Contact | Elysian Skin Clinic</title>
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
                <a class="text-sm font-bold text-slate-heading hover:text-primary transition-colors" href="about.php">About Us</a>
                <a class="text-sm font-bold text-primary" href="contact.php">Contact</a>
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
        <!-- Contact Section -->
        <section class="py-24 bg-slate-900 text-white">
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

    <script>
        document.getElementById('contact-form').addEventListener('submit', function(e) {
            e.preventDefault();
            const formData = new FormData(this);
            const messageDiv = document.getElementById('form-message');
            
            messageDiv.className = 'p-4 rounded-xl text-center bg-primary/10 text-primary';
            messageDiv.textContent = 'Sending...';
            messageDiv.classList.remove('hidden');
            
            fetch('../backend/contact.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    messageDiv.className = 'p-4 rounded-xl text-center bg-green-100 text-green-700';
                    messageDiv.textContent = data.message;
                    document.getElementById('contact-form').reset();
                } else {
                    messageDiv.className = 'p-4 rounded-xl text-center bg-red-100 text-red-700';
                    messageDiv.textContent = data.errors ? data.errors.join(', ') : 'Error sending message';
                }
            })
            .catch(error => {
                messageDiv.className = 'p-4 rounded-xl text-center bg-red-100 text-red-700';
                messageDiv.textContent = 'An error occurred. Please try again.';
            });
        });
    </script>
</body>
</html>
