<?php
require_once '../backend/db.php';

if (isLoggedIn()) {
    redirect('home.php');
}

$esc = static function ($value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
};

$icon = static function (string $name, string $class = 'h-5 w-5'): string {
    $icons = [
        'eye' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M2.5 12s3.5-6.5 9.5-6.5S21.5 12 21.5 12s-3.5 6.5-9.5 6.5S2.5 12 2.5 12Z" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"/><circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="2.1"/></svg>',
        'eye-off' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="m3 3 18 18" stroke="currentColor" stroke-width="2.1" stroke-linecap="round"/><path d="M10.6 5.7A9.5 9.5 0 0 1 12 5.5c6 0 9.5 6.5 9.5 6.5a17 17 0 0 1-2.8 3.7M6.1 6.9C3.7 8.6 2.5 12 2.5 12s3.5 6.5 9.5 6.5c1.8 0 3.3-.5 4.6-1.2" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"/><path d="M9.9 9.9A3 3 0 0 0 14.1 14.1" stroke="currentColor" stroke-width="2.1" stroke-linecap="round"/></svg>',
        'arrow' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'check' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M20 6 9 17l-5-5" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'shield' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 3 19 6v5.5c0 4.6-2.9 7.9-7 9.5-4.1-1.6-7-4.9-7-9.5V6l7-3Z" stroke="currentColor" stroke-width="2.1" stroke-linejoin="round"/><path d="m8.7 12.1 2.1 2.1 4.7-5" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
    ];

    return $icons[$name] ?? '';
};
?>
<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Sign In | Elysian Skin Clinic</title>

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

        .input-label {
            @apply mb-2 block text-sm font-black text-slate-heading;
        }

        .input-field {
            @apply w-full rounded-2xl border border-slate-200 bg-white px-5 py-4 text-sm font-bold text-slate-heading outline-none transition focus:border-primary focus:ring-4 focus:ring-primary/10;
        }
    </style>
</head>

<body class="min-h-screen bg-white text-slate-900 font-display antialiased">
    <?php include __DIR__ . '/public_navbar.php'; ?>

    <main class="relative overflow-hidden">
        <section class="py-12 lg:py-20">
            <div class="container mx-auto px-6">
                <div class="grid min-h-[calc(100vh-160px)] overflow-hidden rounded-[2.5rem] border border-slate-100 bg-white shadow-soft lg:grid-cols-[1.02fr_0.98fr]">
                    <!-- Image / Brand side -->
                    <div class="relative hidden min-h-[720px] overflow-hidden bg-clinic-navy lg:block">
                        <img
                            src="assets/auth-cover.png"
                            alt="Premium Elysian skincare products"
                            class="absolute inset-0 h-full w-full object-cover"
                        />
                        <div class="absolute inset-0 bg-gradient-to-br from-clinic-navy/80 via-clinic-navy/35 to-primary/25"></div>
                        <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,rgba(13,185,242,0.30),transparent_28%),radial-gradient(circle_at_80%_85%,rgba(255,255,255,0.20),transparent_28%)]"></div>

                        <div class="relative flex h-full flex-col justify-between p-10 xl:p-12">
                            <div class="inline-flex w-fit items-center gap-2 rounded-full border border-white/15 bg-white/10 px-4 py-2 backdrop-blur-xl">
                                <span class="h-2 w-2 rounded-full bg-primary"></span>
                                <span class="text-xs font-black uppercase tracking-[0.24em] text-white/75">
                                    Elysian Portal
                                </span>
                            </div>

                            <div class="max-w-xl space-y-6">
                                <div class="inline-flex h-14 w-14 items-center justify-center rounded-2xl bg-white/12 text-primary backdrop-blur-xl">
                                    <?= $icon('shield', 'h-8 w-8'); ?>
                                </div>

                                <div>
                                    <h1 class="text-5xl font-black leading-[1.04] tracking-[-0.055em] text-white xl:text-6xl">
                                        Secure access to your skincare journey.
                                    </h1>
                                    <p class="mt-5 max-w-md text-lg font-medium leading-8 text-white/70">
                                        View appointments, treatment history, and profile details through your Elysian account.
                                    </p>
                                </div>

                                <div class="grid max-w-lg grid-cols-3 gap-3 pt-4">
                                    <div class="rounded-3xl border border-white/10 bg-white/10 p-4 backdrop-blur-xl">
                                        <p class="text-2xl font-black text-white">1:1</p>
                                        <p class="mt-1 text-xs font-bold text-white/55">Consultation</p>
                                    </div>
                                    <div class="rounded-3xl border border-white/10 bg-white/10 p-4 backdrop-blur-xl">
                                        <p class="text-2xl font-black text-white">24/7</p>
                                        <p class="mt-1 text-xs font-bold text-white/55">Access</p>
                                    </div>
                                    <div class="rounded-3xl border border-white/10 bg-white/10 p-4 backdrop-blur-xl">
                                        <p class="text-2xl font-black text-white">Safe</p>
                                        <p class="mt-1 text-xs font-bold text-white/55">Portal</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Form side -->
                    <div class="relative flex items-center justify-center bg-gradient-to-br from-white via-sky-50/45 to-primary-soft/70 p-6 lg:p-10">
                        <div class="absolute -right-20 -top-20 h-72 w-72 rounded-full bg-primary/15 blur-3xl"></div>
                        <div class="absolute -bottom-24 -left-24 h-72 w-72 rounded-full bg-sky-200/40 blur-3xl"></div>

                        <div class="relative w-full max-w-[520px]">
                            <div class="mb-8 text-center lg:text-left">
                                <div class="mb-5 inline-flex items-center gap-2 rounded-full border border-sky-100 bg-white/80 px-4 py-2 shadow-sm">
                                    <span class="h-2 w-2 rounded-full bg-primary"></span>
                                    <span class="text-xs font-black uppercase tracking-[0.22em] text-primary">Sign In</span>
                                </div>

                                <h2 class="text-4xl font-black leading-tight tracking-[-0.04em] text-slate-heading lg:text-5xl">
                                    Welcome back.
                                </h2>
                                <p class="mt-3 text-base font-medium leading-7 text-cool-gray">
                                    Sign in to continue managing your Elysian appointments and treatment journey.
                                </p>

                                <p id="signin-status" class="mt-4 min-h-[1.25rem] text-sm font-bold text-cool-gray transition-colors"></p>
                            </div>

                            <form id="signin-form" class="rounded-[2rem] border border-slate-100 bg-white/90 p-6 shadow-soft backdrop-blur-xl lg:p-8" method="POST">
                                <div class="space-y-5">
                                    <div>
                                        <label class="input-label" for="email">Email or Phone Number</label>
                                        <input
                                            autocomplete="email"
                                            class="input-field"
                                            id="email"
                                            name="email"
                                            placeholder="name@example.com"
                                            required
                                            type="text"
                                        />
                                    </div>

                                    <div>
                                        <div class="mb-2 flex items-center justify-between">
                                            <label class="block text-sm font-black text-slate-heading" for="password">Password</label>
                                            <a class="text-xs font-black text-primary hover:opacity-80 transition-opacity" href="#">
                                                Forgot Password?
                                            </a>
                                        </div>

                                        <div class="relative">
                                            <input
                                                autocomplete="current-password"
                                                class="input-field pr-12"
                                                id="password"
                                                name="password"
                                                placeholder="••••••••"
                                                required
                                                type="password"
                                            />

                                            <button
                                                id="toggle-password"
                                                class="absolute inset-y-0 right-0 flex items-center pr-4 text-cool-gray hover:text-primary transition-colors"
                                                type="button"
                                                aria-label="Toggle password visibility"
                                            >
                                                <span id="password-eye"><?= $icon('eye', 'h-5 w-5'); ?></span>
                                            </button>
                                        </div>
                                    </div>

                                    <button
                                        id="signin-button"
                                        class="inline-flex w-full items-center justify-center gap-3 rounded-full bg-primary px-6 py-4 text-base font-black text-white shadow-[0_18px_45px_rgba(13,185,242,0.28)] transition-all hover:-translate-y-0.5 hover:shadow-[0_22px_55px_rgba(13,185,242,0.38)] active:scale-[0.99]"
                                        type="submit"
                                    >
                                        <span>Sign In</span>
                                        <?= $icon('arrow', 'h-5 w-5'); ?>
                                    </button>
                                </div>

                                <div class="mt-8 border-t border-slate-100 pt-6 text-center">
                                    <p class="text-sm font-semibold text-cool-gray">
                                        Don’t have an account?
                                        <a class="font-black text-primary hover:underline" href="signup.php">Sign Up</a>
                                    </p>
                                </div>
                            </form>

                            <div class="mt-8 grid gap-3 sm:grid-cols-3">
                                <div class="rounded-3xl border border-slate-100 bg-white/80 p-4 text-center shadow-sm">
                                    <div class="mx-auto mb-2 flex h-9 w-9 items-center justify-center rounded-full bg-primary-soft text-primary">
                                        <?= $icon('check', 'h-4 w-4'); ?>
                                    </div>
                                    <p class="text-xs font-black text-slate-heading">Secure Login</p>
                                </div>

                                <div class="rounded-3xl border border-slate-100 bg-white/80 p-4 text-center shadow-sm">
                                    <div class="mx-auto mb-2 flex h-9 w-9 items-center justify-center rounded-full bg-primary-soft text-primary">
                                        <?= $icon('check', 'h-4 w-4'); ?>
                                    </div>
                                    <p class="text-xs font-black text-slate-heading">Private Records</p>
                                </div>

                                <div class="rounded-3xl border border-slate-100 bg-white/80 p-4 text-center shadow-sm">
                                    <div class="mx-auto mb-2 flex h-9 w-9 items-center justify-center rounded-full bg-primary-soft text-primary">
                                        <?= $icon('check', 'h-4 w-4'); ?>
                                    </div>
                                    <p class="text-xs font-black text-slate-heading">Clinic Portal</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pb-12">
            <div class="container mx-auto px-6">
                <p class="text-center text-[10px] font-black uppercase tracking-[0.28em] text-slate-400">
                    Clinical Standard • Secure Authentication • Privacy First
                </p>
            </div>
        </section>
    </main>

    <script>
        (function () {
            const form = document.getElementById('signin-form');
            const statusEl = document.getElementById('signin-status');
            const button = document.getElementById('signin-button');
            const togglePassword = document.getElementById('toggle-password');
            const passwordInput = document.getElementById('password');
            const passwordEye = document.getElementById('password-eye');

            const eyeIcon = <?= json_encode($icon('eye', 'h-5 w-5')); ?>;
            const eyeOffIcon = <?= json_encode($icon('eye-off', 'h-5 w-5')); ?>;

            if (togglePassword && passwordInput && passwordEye) {
                togglePassword.addEventListener('click', function () {
                    const isPassword = passwordInput.type === 'password';
                    passwordInput.type = isPassword ? 'text' : 'password';
                    passwordEye.innerHTML = isPassword ? eyeOffIcon : eyeIcon;
                });
            }

            if (!form || !statusEl || !button) {
                return;
            }

            const buttonText = button.querySelector('span');

            const setStatus = function (message, type) {
                statusEl.textContent = message;
                statusEl.classList.remove('text-primary', 'text-red-500', 'text-emerald-600', 'text-cool-gray');

                if (type === 'success') {
                    statusEl.classList.add('text-emerald-600');
                } else if (type === 'error') {
                    statusEl.classList.add('text-red-500');
                } else {
                    statusEl.classList.add('text-primary');
                }
            };

            form.addEventListener('submit', async function (event) {
                event.preventDefault();

                setStatus('Signing you in...', 'loading');

                button.disabled = true;
                button.classList.add('opacity-70', 'cursor-not-allowed');

                if (buttonText) {
                    buttonText.textContent = 'Signing in...';
                }

                try {
                    const formData = new FormData(form);
                    formData.append('action', 'login');

                    const response = await fetch('../backend/auth.php', {
                        method: 'POST',
                        body: formData
                    });

                    const text = await response.text();
                    let data;

                    try {
                        data = JSON.parse(text);
                    } catch (parseError) {
                        throw new Error('Invalid server response');
                    }

                    setStatus(data.message || 'Signed in successfully.', data.success ? 'success' : 'error');

                    if (data.success) {
                        setTimeout(function () {
                            window.location.href = data.redirect || 'home.php';
                        }, 700);
                    }
                } catch (error) {
                    setStatus('Login service unavailable. Please try again later.', 'error');
                } finally {
                    button.disabled = false;
                    button.classList.remove('opacity-70', 'cursor-not-allowed');

                    if (buttonText) {
                        buttonText.textContent = 'Sign In';
                    }
                }
            });
        })();
    </script>
</body>
</html>