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
        'sparkle' => '<svg class="' . $class . '" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M12 2l1.7 6.3L20 10l-6.3 1.7L12 18l-1.7-6.3L4 10l6.3-1.7L12 2Z" fill="currentColor"/><path d="M18.5 15l.8 3.2 3.2.8-3.2.8-.8 3.2-.8-3.2-3.2-.8 3.2-.8.8-3.2Z" fill="currentColor"/></svg>',
    ];

    return $icons[$name] ?? '';
};
?>
<!DOCTYPE html>
<html class="light" lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Sign Up | Elysian Skin Clinic</title>

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

        .input-field-error {
            @apply border-red-300 bg-red-50 focus:border-red-400 focus:ring-red-100;
        }
    </style>
</head>

<body class="min-h-screen bg-white text-slate-900 font-display antialiased">
    <?php include __DIR__ . '/public_navbar.php'; ?>

    <main class="relative overflow-hidden">
        <section class="py-12 lg:py-20">
            <div class="container mx-auto px-6">
                <div class="grid min-h-[calc(100vh-160px)] overflow-hidden rounded-[2.5rem] border border-slate-100 bg-white shadow-soft lg:grid-cols-[0.98fr_1.02fr]">
                    <!-- Form side -->
                    <div class="relative flex items-center justify-center bg-gradient-to-br from-white via-sky-50/45 to-primary-soft/70 p-6 lg:p-10">
                        <div class="absolute -left-20 -top-20 h-72 w-72 rounded-full bg-primary/15 blur-3xl"></div>
                        <div class="absolute -bottom-24 -right-24 h-72 w-72 rounded-full bg-sky-200/40 blur-3xl"></div>

                        <div class="relative w-full max-w-[560px]">
                            <div class="mb-8 text-center lg:text-left">
                                <div class="mb-5 inline-flex items-center gap-2 rounded-full border border-sky-100 bg-white/80 px-4 py-2 shadow-sm">
                                    <span class="h-2 w-2 rounded-full bg-primary"></span>
                                    <span class="text-xs font-black uppercase tracking-[0.22em] text-primary">Create Account</span>
                                </div>

                                <h1 class="text-4xl font-black leading-tight tracking-[-0.04em] text-slate-heading lg:text-5xl">
                                    Start your Elysian journey.
                                </h1>
                                <p class="mt-3 text-base font-medium leading-7 text-cool-gray">
                                    Create an account to book appointments and follow your skincare treatment pathway.
                                </p>

                                <p id="signup-status" class="mt-4 min-h-[1.25rem] text-sm font-bold text-cool-gray transition-colors"></p>
                            </div>

                            <form id="signup-form" class="rounded-[2rem] border border-slate-100 bg-white/90 p-6 shadow-soft backdrop-blur-xl lg:p-8" method="POST">
                                <div class="grid gap-5 sm:grid-cols-2">
                                    <div class="sm:col-span-2">
                                        <label class="input-label" for="full_name">Full Name</label>
                                        <input
                                            id="full_name"
                                            name="full_name"
                                            class="input-field"
                                            placeholder="Enter your full name"
                                            required
                                            type="text"
                                        />
                                    </div>

                                    <div>
                                        <label class="input-label" for="email">Email</label>
                                        <input
                                            autocomplete="email"
                                            class="input-field"
                                            id="email"
                                            name="email"
                                            placeholder="name@example.com"
                                            required
                                            type="email"
                                        />
                                    </div>

                                    <div>
                                        <label class="input-label" for="phone">Phone Number</label>
                                        <input
                                            class="input-field phone-input"
                                            id="phone"
                                            name="phone"
                                            pattern="0[0-9]{9}"
                                            title="Số điện thoại phải bắt đầu bằng 0 và có đúng 10 chữ số (VD: 0912345678)"
                                            placeholder="0912345678"
                                            maxlength="10"
                                            required
                                            type="tel"
                                        />
                                        <p id="phone-error" class="mt-2 hidden text-xs font-bold leading-5 text-red-500">
                                            Số điện thoại cần có 10 số và bắt đầu bằng 0.
                                        </p>
                                    </div>

                                    <div>
                                        <label class="input-label" for="password">Password</label>
                                        <div class="relative">
                                            <input
                                                autocomplete="new-password"
                                                class="input-field pr-12"
                                                id="password"
                                                name="password"
                                                placeholder="Create a password"
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

                                    <div>
                                        <label class="input-label" for="confirm_password">Confirm Password</label>
                                        <div class="relative">
                                            <input
                                                autocomplete="new-password"
                                                class="input-field pr-12"
                                                id="confirm_password"
                                                name="confirm_password"
                                                placeholder="Re-enter password"
                                                required
                                                type="password"
                                            />

                                            <button
                                                id="toggle-confirm-password"
                                                class="absolute inset-y-0 right-0 flex items-center pr-4 text-cool-gray hover:text-primary transition-colors"
                                                type="button"
                                                aria-label="Toggle confirm password visibility"
                                            >
                                                <span id="confirm-password-eye"><?= $icon('eye', 'h-5 w-5'); ?></span>
                                            </button>
                                        </div>
                                        <p id="password-error" class="mt-2 hidden text-xs font-bold leading-5 text-red-500">
                                            Passwords do not match.
                                        </p>
                                    </div>
                                </div>

                                <div class="mt-6 flex items-start gap-3 rounded-3xl bg-slate-50 p-4">
                                    <input
                                        class="mt-1 h-4 w-4 rounded border-slate-300 text-primary focus:ring-primary"
                                        id="terms"
                                        name="terms"
                                        required
                                        type="checkbox"
                                    />
                                    <label for="terms" class="text-sm font-semibold leading-6 text-cool-gray">
                                        I agree to the
                                        <a class="font-black text-primary hover:underline" href="#">Terms</a>
                                        and
                                        <a class="font-black text-primary hover:underline" href="#">Privacy Policy</a>.
                                    </label>
                                </div>

                                <button
                                    id="signup-button"
                                    class="mt-6 inline-flex w-full items-center justify-center gap-3 rounded-full bg-primary px-6 py-4 text-base font-black text-white shadow-[0_18px_45px_rgba(13,185,242,0.28)] transition-all hover:-translate-y-0.5 hover:shadow-[0_22px_55px_rgba(13,185,242,0.38)] active:scale-[0.99]"
                                    type="submit"
                                >
                                    <span>Create Account</span>
                                    <?= $icon('arrow', 'h-5 w-5'); ?>
                                </button>

                                <div class="mt-8 border-t border-slate-100 pt-6 text-center">
                                    <p class="text-sm font-semibold text-cool-gray">
                                        Already have an account?
                                        <a class="font-black text-primary hover:underline" href="signin.php">Sign In</a>
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Image / Brand side -->
                    <div class="relative hidden min-h-[760px] overflow-hidden bg-clinic-navy lg:block">
                        <img
                            src="assets/auth-cover.png"
                            alt="Premium Elysian skincare products"
                            class="absolute inset-0 h-full w-full object-cover"
                        />
                        <div class="absolute inset-0 bg-gradient-to-br from-clinic-navy/82 via-clinic-navy/38 to-primary/25"></div>
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
                                    <?= $icon('sparkle', 'h-8 w-8'); ?>
                                </div>

                                <div>
                                    <h2 class="text-5xl font-black leading-[1.04] tracking-[-0.055em] text-white xl:text-6xl">
                                        Personalized care starts here.
                                    </h2>
                                    <p class="mt-5 max-w-md text-lg font-medium leading-8 text-white/70">
                                        Register to book appointments, manage your profile, and continue your treatment course with Elysian.
                                    </p>
                                </div>

                                <div class="grid max-w-lg grid-cols-3 gap-3 pt-4">
                                    <div class="rounded-3xl border border-white/10 bg-white/10 p-4 backdrop-blur-xl">
                                        <p class="text-2xl font-black text-white">Book</p>
                                        <p class="mt-1 text-xs font-bold text-white/55">Appointments</p>
                                    </div>
                                    <div class="rounded-3xl border border-white/10 bg-white/10 p-4 backdrop-blur-xl">
                                        <p class="text-2xl font-black text-white">Track</p>
                                        <p class="mt-1 text-xs font-bold text-white/55">Progress</p>
                                    </div>
                                    <div class="rounded-3xl border border-white/10 bg-white/10 p-4 backdrop-blur-xl">
                                        <p class="text-2xl font-black text-white">Care</p>
                                        <p class="mt-1 text-xs font-bold text-white/55">Pathway</p>
                                    </div>
                                </div>

                                <div class="rounded-[2rem] border border-white/10 bg-white/10 p-5 backdrop-blur-xl">
                                    <div class="flex items-start gap-4">
                                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-primary/20 text-primary">
                                            <?= $icon('shield', 'h-5 w-5'); ?>
                                        </div>
                                        <div>
                                            <p class="font-black text-white">Privacy-first clinic portal</p>
                                            <p class="mt-1 text-sm leading-6 text-white/60">
                                                Your account helps the clinic support appointments and treatment follow-up securely.
                                            </p>
                                        </div>
                                    </div>
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
            const form = document.getElementById('signup-form');
            const statusEl = document.getElementById('signup-status');
            const button = document.getElementById('signup-button');

            const phoneInput = document.getElementById('phone');
            const phoneError = document.getElementById('phone-error');
            const phoneRegex = /^0\d{9}$/;

            const passwordInput = document.getElementById('password');
            const confirmPasswordInput = document.getElementById('confirm_password');
            const passwordError = document.getElementById('password-error');

            const togglePassword = document.getElementById('toggle-password');
            const toggleConfirmPassword = document.getElementById('toggle-confirm-password');
            const passwordEye = document.getElementById('password-eye');
            const confirmPasswordEye = document.getElementById('confirm-password-eye');

            const eyeIcon = <?= json_encode($icon('eye', 'h-5 w-5')); ?>;
            const eyeOffIcon = <?= json_encode($icon('eye-off', 'h-5 w-5')); ?>;

            const setStatus = function (message, type) {
                if (!statusEl) {
                    return;
                }

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

            const setButtonLoading = function (isLoading) {
                if (!button) {
                    return;
                }

                const buttonText = button.querySelector('span');

                button.disabled = isLoading;
                button.classList.toggle('opacity-70', isLoading);
                button.classList.toggle('cursor-not-allowed', isLoading);

                if (buttonText) {
                    buttonText.textContent = isLoading ? 'Creating account...' : 'Create Account';
                }
            };

            const setupPasswordToggle = function (toggleButton, input, iconContainer) {
                if (!toggleButton || !input || !iconContainer) {
                    return;
                }

                toggleButton.addEventListener('click', function () {
                    const isPassword = input.type === 'password';
                    input.type = isPassword ? 'text' : 'password';
                    iconContainer.innerHTML = isPassword ? eyeOffIcon : eyeIcon;
                });
            };

            const validatePhone = function () {
                if (!phoneInput || !phoneError) {
                    return true;
                }

                const cleanedValue = phoneInput.value.replace(/\D/g, '');
                phoneInput.value = cleanedValue;

                const isValid = phoneRegex.test(cleanedValue);

                phoneInput.classList.toggle('input-field-error', cleanedValue !== '' && !isValid);
                phoneError.classList.toggle('hidden', cleanedValue === '' || isValid);

                return isValid;
            };

            const validatePasswordMatch = function () {
                if (!passwordInput || !confirmPasswordInput || !passwordError) {
                    return true;
                }

                const password = passwordInput.value;
                const confirmPassword = confirmPasswordInput.value;
                const shouldCheck = password !== '' && confirmPassword !== '';
                const isValid = !shouldCheck || password === confirmPassword;

                confirmPasswordInput.classList.toggle('input-field-error', shouldCheck && !isValid);
                passwordError.classList.toggle('hidden', !shouldCheck || isValid);

                return isValid;
            };

            setupPasswordToggle(togglePassword, passwordInput, passwordEye);
            setupPasswordToggle(toggleConfirmPassword, confirmPasswordInput, confirmPasswordEye);

            if (phoneInput) {
                phoneInput.addEventListener('input', validatePhone);
            }

            if (passwordInput) {
                passwordInput.addEventListener('input', validatePasswordMatch);
            }

            if (confirmPasswordInput) {
                confirmPasswordInput.addEventListener('input', validatePasswordMatch);
            }

            if (!form) {
                return;
            }

            form.addEventListener('submit', async function (event) {
                event.preventDefault();

                const isPhoneValid = validatePhone();
                const isPasswordValid = validatePasswordMatch();

                if (!isPhoneValid) {
                    setStatus('Invalid format. Please enter 10 digits starting with 0.', 'error');
                    phoneInput.focus();
                    return;
                }

                if (!isPasswordValid) {
                    setStatus('Passwords do not match. Please check again.', 'error');
                    confirmPasswordInput.focus();
                    return;
                }

                setStatus('Creating your account...', 'loading');
                setButtonLoading(true);

                try {
                    const formData = new FormData(form);
                    formData.append('action', 'register');

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

                    setStatus(data.message || 'Account created successfully.', data.success ? 'success' : 'error');

                    if (data.success) {
                        setTimeout(function () {
                            window.location.href = 'signin.php';
                        }, 900);
                    }
                } catch (error) {
                    setStatus('Invalid.', 'error');
                } finally {
                    setButtonLoading(false);
                }
            });
        })();
    </script>
</body>
</html>