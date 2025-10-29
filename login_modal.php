<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Auth Modal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        // primary: '#2d73e3ff',
                        // secondary: '#8b5cf6',
                        // accent: '#ec4899',
                        // dark: '#1f2937',
                        // light: '#f9fafb'

                        primary: '#1e3a8a',
                        secondary: '#3b82f6',
                        accent: '#10b981',
                        dark: '#0f172a',
                        light: '#f8fafc'
                    },
                    animation: {
                        'slide-in-right': 'slideInRight 0.5s ease-out',
                        'slide-in-left': 'slideInLeft 0.5s ease-out',
                        'fade-in': 'fadeIn 0.5s ease-out',
                        'bounce-in': 'bounceIn 0.6s ease-out'
                    },
                    keyframes: {
                        slideInRight: {
                            '0%': { transform: 'translateX(100%)', opacity: '0' },
                            '100%': { transform: 'translateX(0)', opacity: '1' }
                        },
                        slideInLeft: {
                            '0%': { transform: 'translateX(-100%)', opacity: '0' },
                            '100%': { transform: 'translateX(0)', opacity: '1' }
                        },
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' }
                        },
                        bounceIn: {
                            '0%': { transform: 'scale(0.95)', opacity: '0' },
                            '50%': { transform: 'scale(1.02)', opacity: '1' },
                            '100%': { transform: 'scale(1)', opacity: '1' }
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-50 to-purple-50">

    <!-- Main content with hero section -->
    <div class="max-w-4xl mx-auto px-6 py-12 text-center">

        <!-- Button to open modal -->
        <button onclick="openModal('loginForm')"
            class="px-8 py-3 bg-gradient-to-r from-primary to-secondary text-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:from-primary/90 hover:to-secondary/90 font-medium">
            Get Started <i class="ml-2 fas fa-arrow-right"></i>
        </button>


    </div>

    <!-- Modal Background -->
    <div id="authModal"
        class="fixed inset-0 flex items-center justify-center bg-black/60 opacity-0 pointer-events-none transition-opacity duration-500 z-50 p-4">

        <!-- Modal Panel -->
        <div
            class="bg-white rounded-2xl shadow-2xl max-w-md w-full overflow-hidden transform scale-95 opacity-0 transition duration-500">
            <!-- Header with logo -->
            <div class="bg-gradient-to-r from-light to-primary p-5 flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <div class="w-40 h-12 rounded-lg flex items-center justify-center mr-3">
                        <!-- <span class="text-primary font-bold text-xl">HWB</span> -->
                        <img src="sources/images/logo/Whitebox.png" alt="Whitebox Logo" height="100px" srcset>
                    </div>
                </div>


                <button onclick="closeModal()" class="text-white/80 hover:text-white transition">
                    <i class="fas fa-2x fa-times-circle text-xl"></i>
                </button>
            </div>

            <!-- Forms Container -->
            <div class="p-6 relative overflow-hidden" style="min-height: 450px;">
                <!-- LOGIN FORM -->
                <div id="loginForm" class="space-y-5 hidden animate-slide-in-right">
                    <h2 class="text-2xl font-bold text-center text-dark">Welcome Back</h2>
                    <p class="text-center text-gray-500">Sign in to continue to your account</p>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email"
                                    class="w-full border border-gray-200 rounded-xl py-3 pl-10 pr-4 focus:ring-2 focus:ring-primary/20 focus:border-primary transition"
                                    placeholder="Enter your email">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password"
                                    class="w-full border border-gray-200 rounded-xl py-3 pl-10 pr-4 focus:ring-2 focus:ring-primary/20 focus:border-primary transition"
                                    placeholder="Enter your password">
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" id="remember"
                                    class="h-4 w-4 text-primary border-gray-300 rounded focus:ring-primary/20">
                                <label for="remember" class="text-sm text-gray-600">Remember me</label>
                            </div>
                            <button onclick="showForm('forgotForm')"
                                class="text-sm text-secondary hover:text-primary transition">Forgot Password?</button>
                        </div>

                        <button
                            class="w-full bg-gradient-to-r from-secondary to-primary text-white py-3 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 font-medium">
                            Sign In <i class="ml-2 fas fa-arrow-right"></i>
                        </button>
                    </div>

                    <div class="text-center text-sm mt-4">
                        <span class="text-gray-600">Don't have an account?</span>
                        <button onclick="showForm('signupForm')"
                            class="text-primary hover:text-secondary transition font-medium ml-2">Sign Up</button>
                    </div>
                </div>

                <!-- SIGN UP FORM -->
                <div id="signupForm" class="space-y-5 hidden animate-slide-in-left">
                    <h2 class="text-2xl font-bold text-center text-dark">Create Account</h2>
                    <p class="text-center text-gray-500">Join us today and get started</p>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block  text-sm font-medium text-gray-700 mb-1">First Name</label>
                            <input type="text"
                                class="w-full border border-gray-200 rounded-xl py-3 px-4 focus:ring-2 focus:ring-primary/20 focus:border-primary transition"
                                placeholder="First Name">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                            <input type="text"
                                class="w-full border border-gray-200 rounded-xl py-3 px-4 focus:ring-2 focus:ring-primary/20 focus:border-primary transition"
                                placeholder="Last Name">
                        </div>
                    </div>


                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email"
                                    class="w-full border border-gray-200 rounded-xl py-3 pl-10 pr-4 focus:ring-2 focus:ring-primary/20 focus:border-primary transition"
                                    placeholder="Enter your email">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                                    <i class="fas fa-phone"></i>
                                </span>
                                <input type="text"
                                    class="w-full border border-gray-200 rounded-xl py-3 pl-10 pr-4 focus:ring-2 focus:ring-primary/20 focus:border-primary transition"
                                    placeholder="Your phone number">
                            </div>
                        </div>

                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                        <select
                            class="w-full border border-gray-200 rounded-xl py-3 px-4 focus:ring-2 focus:ring-primary/20 focus:border-primary transition">
                            <option value="">Select Gender</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                    </div>


                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password"
                                    class="w-full border border-gray-200 rounded-xl py-3 pl-10 pr-4 focus:ring-2 focus:ring-primary/20 focus:border-primary transition"
                                    placeholder="Create a password">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password"
                                    class="w-full border border-gray-200 rounded-xl py-3 pl-10 pr-4 focus:ring-2 focus:ring-primary/20 focus:border-primary transition"
                                    placeholder="Confirm your password">
                            </div>
                        </div>
                    </div>



                    <div class="flex items-center space-x-2">
                        <input type="checkbox" id="terms"
                            class="h-4 w-4 text-primary border-gray-300 rounded focus:ring-primary/20">
                        <label for="terms" class="text-sm text-gray-600">I accept the <a href="#"
                                class="text-primary hover:text-secondary transition">Terms and Conditions</a></label>
                    </div>

                    <button
                        class="w-full bg-gradient-to-r from-primary to-secondary text-white py-3 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 font-medium">
                        Create Account <i class="ml-2 fas fa-user-plus"></i>
                    </button>

                    <div class="text-center text-sm">
                        <span class="text-gray-600">Already have an account?</span>
                        <button onclick="showForm('loginForm')"
                            class="text-secondary hover:text-primary transition font-medium ml-2">Sign In</button>
                    </div>
                </div>

                <!-- FORGOT PASSWORD FORM -->
                <div id="forgotForm" class="space-y-5 hidden animate-fade-in">
                    <div class="text-center">
                        <div
                            class="w-16 h-16 bg-purple-100 text-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-key text-2xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-dark">Reset Password</h2>
                        <p class="text-gray-500 mt-1">Enter your email to receive a reset link</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input type="email"
                                class="w-full border border-gray-200 rounded-xl py-3 pl-10 pr-4 focus:ring-2 focus:ring-primary/20 focus:border-primary transition"
                                placeholder="Enter your email">
                        </div>
                    </div>

                    <button
                        class="w-full bg-gradient-to-r from-secondary to-accent text-white py-3 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 font-medium">
                        Send Reset Link <i class="ml-2 fas fa-paper-plane"></i>
                    </button>

                    <div class="text-center text-sm">
                        <button onclick="showForm('loginForm')"
                            class="text-secondary hover:text-primary transition font-medium">
                            <i class="fas fa-arrow-left mr-1"></i> Back to Sign In
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const modal = document.getElementById('authModal');
        const modalPanel = modal.querySelector('div');

        function openModal(formId) {
            modal.classList.remove('opacity-0', 'pointer-events-none');
            modalPanel.classList.remove('scale-95', 'opacity-0');
            modalPanel.classList.add('scale-100', 'opacity-100');
            showForm(formId);
        }

        function closeModal() {
            modal.classList.add('opacity-0', 'pointer-events-none');
            modalPanel.classList.add('scale-95', 'opacity-0');
            modalPanel.classList.remove('scale-100', 'opacity-100');
        }

        function showForm(formId) {
            document.querySelectorAll('#authModal .space-y-5').forEach(f => {
                f.classList.add('hidden');
                f.classList.remove('animate-slide-in-right', 'animate-slide-in-left', 'animate-fade-in');
            });

            const form = document.getElementById(formId);
            form.classList.remove('hidden');

            // Add appropriate animation based on form
            if (formId === 'loginForm') {
                form.classList.add('animate-slide-in-right');
            } else if (formId === 'signupForm') {
                form.classList.add('animate-slide-in-left');
            } else {
                form.classList.add('animate-slide-in-right');
            }
        }

        // Close modal when clicking outside
        modal.addEventListener('click', (e) => {
            if (e.target === modal) closeModal();
        });
    </script>

</body>

</html>