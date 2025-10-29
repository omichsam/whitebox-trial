<style>
    .modal {
        transition: opacity 0.3s ease, transform 0.3s ease;
        transform: scale(0.9);
    }

    .modal.active {
        transform: scale(1);
    }

    /* Fix for full coverage */
    #authModal {
        padding: 0 !important;
    }

    .form-input {
        transition: all 0.3s ease;
    }

    .form-input:focus {
        box-shadow: 0 0 0 3px #006600e3;
    }

    .btn-submit {
        transition: all 0.3s ease;
        background: linear-gradient(to right, #006600, #bc0101ff);
    }

    .btn-submit:hover {
        background: linear-gradient(to right, #006600, #bc0101ff);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(3, 107, 43, 0.92);
    }

    .btn-close {
        transition: all 0.3s ease;
    }

    .btn-close:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.4);
    }

    .success-message {
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.5s ease;
    }

    .success-message.show {
        opacity: 1;
        transform: translateY(0);
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }

        100% {
            transform: scale(1);
        }
    }

    .pulse {
        animation: pulse 2s infinite;
    }

    /* Additional animation classes */
    .animate-slide-in-right {
        animation: slideInRight 0.5s ease-out forwards;
    }

    .animate-slide-in-left {
        animation: slideInLeft 0.5s ease-out forwards;
    }

    .animate-fade-in {
        animation: fadeIn 0.5s ease-out forwards;
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(20px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }

        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }
</style>

<!-- Modal for Patent Guidance -->
<!-- Intellectual Property Modal -->
<div id="ipModal" class="fixed inset-0 z-[10000] hidden" aria-hidden="true">
    <!-- Backdrop -->
    <div id="ipBackdrop" class="absolute inset-0 bg-black/60 opacity-0 transition-opacity"></div>

    <!-- Dialog wrapper for centering -->
    <div class="absolute inset-0 flex items-center justify-center p-4">
        <!-- Dialog -->
        <div id="ipDialog" role="dialog" aria-modal="true" aria-labelledby="ipModalTitle"
            class="w-[95vw] max-w-6xl max-h-[90vh] bg-white rounded-2xl shadow-2xl overflow-hidden opacity-0 scale-95 transition-all">
            <!-- Header -->
            <div class="flex items-center justify-between px-6 py-4 border-b">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-lg grid place-items-center bg-secondary/10 text-secondary">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <h2 id="ipModalTitle" class="text-xl md:text-2xl font-bold text-accent">
                        Protect Your Intellectual Property
                    </h2>
                </div>
                <button id="ipCloseBtn"
                    class="p-2 rounded-lg text-gray-500 hover:text-gray-800 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-primary"
                    aria-label="Close modal">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <!-- Body: two-column on large screens -->
            <div class="grid grid-cols-1 gap-4">
                <!-- Main content -->
                <div class="md:col-span-2 overflow-y-auto max-h-[calc(90vh-4rem)] px-6 py-5">
                    <!-- FAQ as accordion -->
                    <div class="space-y-4" id="ipAccordion">
                        <!-- Item 1 -->
                        <details class="group border rounded-xl p-4 open:shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer list-none">
                                <span class="font-semibold text-primary">1. Do I need to have intellectual property
                                    protection?</span>
                                <i class="fa-solid fa-chevron-down transition-transform group-open:rotate-180"></i>
                            </summary>
                            <div class="mt-3 text-gray-700 text-sm leading-relaxed">
                                Yes. It is recommended that you apply for the protection of your intellectual
                                property before you submit the same to <b>Whitebox</b>. It is important to safeguard
                                your
                                intellectual property rights to secure your creativity and inventiveness and prevent
                                the information contained in your submission from being appropriated by a third
                                party.
                            </div>
                        </details>

                        <!-- Item 2 -->
                        <details class="group border rounded-xl p-4 open:shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer list-none">
                                <span class="font-semibold text-primary">2. When should I protect my intellectual
                                    property?</span>
                                <i class="fa-solid fa-chevron-down transition-transform group-open:rotate-180"></i>
                            </summary>
                            <div class="mt-3 text-gray-700 text-sm leading-relaxed">
                                You should take steps to protect your intellectual property at earliest possible
                                juncture. It is recommended that you should not disclose any information regarding
                                your intellectual property if you have not registered it or applied for
                                registration. Disclosing such information before registration may lead to the
                                appropriation of the information by a third party and hinder your ability to
                                subsequently file for registration.
                            </div>
                        </details>

                        <!-- Item 3 -->
                        <details class="group border rounded-xl p-4 open:shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer list-none">
                                <span class="font-semibold text-primary">3. What forms of protection are
                                    available?</span>
                                <i class="fa-solid fa-chevron-down transition-transform group-open:rotate-180"></i>
                            </summary>
                            <div class="mt-3 text-gray-700 text-sm leading-relaxed">
                                Intellectual property may be protected using <strong>Patents</strong>,
                                <strong>Trademarks</strong>, and
                                <strong>Copyright</strong>. Registration is through the relevant government agency.
                                Ownership can be by
                                a natural person or a registered legal entity.
                            </div>
                        </details>

                        <!-- Item 4 -->
                        <details class="group border rounded-xl p-4 open:shadow-sm">
                            <summary class="flex items-center justify-between cursor-pointer list-none">
                                <span class="font-semibold text-primary">4. What are the benefits of
                                    protection?</span>
                                <i class="fa-solid fa-chevron-down transition-transform group-open:rotate-180"></i>
                            </summary>
                            <div class="mt-3 text-gray-700 text-sm leading-relaxed">
                                Intellectual property(IP) is a business asset and therefore securing it is essential
                                to your business and brand. Secured intellectual property rights exclude third
                                parties from appropriating your rights thus adding value to your business and
                                giving you a competitive edge.
                                <ul class="list-disc list-inside mt-3 space-y-1">
                                    <li><strong>Patents</strong> afford protection to inventions in the
                                        technological or
                                        industrial sector. The Kenya Industrial Property Institute undertakes the
                                        registration of patents. The
                                        requirement for the registration of a patent can be found <a
                                            href="https://www.kipi.go.ke/index.php/patents"
                                            class="text-blue-600 underline">here</a>.</li>
                                    <li><strong>Copyright</strong> affords protection to artistic works of musical,
                                        audiovisual, literary,
                                        and artistic nature. To acquire copyright, the Copyright Act does not
                                        require
                                        registration. However, registration is recommended to claim exclusive
                                        rights.
                                        Registration of
                                        copyright is done by the Kenya Copyright Board. The process of registering
                                        copyright
                                        can be found <a href="https://nrr.copyright.go.ke/"
                                            class="text-blue-600 underline">here</a>.
                                    </li>
                                    <li> <strong>Trademarks</strong> afford protection to brand names, marks, signs,
                                        and
                                        logos associated
                                        with certain goods and services. Registration is handled by the Kenya
                                        Industrial
                                        Property Institute.
                                        The requirements for registration can be found <a
                                            href="https://www.kipi.go.ke/trade-marks"
                                            class="text-blue-600 underline">here</a>. </li>
                                </ul>
                            </div>
                        </details>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Fixed Auth Modal -->
<div id="authModal" class="fixed inset-0 z-[10000] hidden" aria-hidden="true">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black/60 opacity-0 transition-opacity"></div>

    <!-- Dialog wrapper for centering -->
    <div class="absolute inset-0 flex items-center justify-center p-4">
        <!-- Dialog -->
        <div
            class="modal-content bg-white rounded-2xl shadow-2xl max-w-md w-full overflow-hidden transform scale-95 opacity-0 transition duration-500">
            <div class="bg-gradient-to-r from-light to-accent p-5 flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <div class="w-40 h-12 rounded-lg flex items-center justify-center mr-3">
                        <img src="sources/images/logo/Whitebox.png" alt="Whitebox Logo" height="100px" srcset>
                    </div>
                </div>
                <button onclick="closeModal()" class="text-white/80 hover:text-white transition">
                    <i class="fas fa-times fa-2x text-xl"></i>
                </button>
            </div>

            <div class="p-6 relative overflow-hidden" style="min-height: 450px;">
                <!-- LOGIN FORM -->
                <form id="loginForm" class="space-y-5">
                    <h2 class="text-2xl font-bold text-center text-gray-800">Welcome Back</h2>
                    <p class="text-center text-gray-500">Sign in to continue to your account</p>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email"
                                    class="w-full border border-gray-200 rounded-xl py-3 pl-10 pr-4 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition"
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
                                    class="w-full border border-gray-200 rounded-xl py-3 pl-10 pr-4 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition"
                                    placeholder="Enter your password">
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" id="remember"
                                    class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500/20">
                                <label for="remember" class="text-sm text-gray-600">Remember me</label>
                            </div>
                            <button type="button" onclick="showForm('forgotForm')"
                                class="text-sm text-blue-600 hover:text-blue-800 transition">Forgot Password?</button>
                        </div>

                        <button type="submit"
                            class="w-full bg-gradient-to-r from-red-600 to-red-500 text-white py-3 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 font-medium">
                            Sign In <i class="ml-2 fas fa-arrow-right"></i>
                        </button>
                    </div>

                    <div class="text-center text-sm mt-4">
                        <span class="text-gray-600">Don't have an account?</span>
                        <button type="button" onclick="showForm('signupForm')"
                            class="text-blue-600 hover:text-blue-800 transition font-medium ml-2">Sign Up</button>
                    </div>
                </form>

                <!-- SIGN UP FORM -->
                <form id="signupForm" class="space-y-5 hidden">
                    <h2 class="text-2xl font-bold text-center text-gray-800">Create Account</h2>
                    <p class="text-center text-gray-500">Join us today and get started</p>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                            <input type="text"
                                class="w-full border border-gray-200 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition"
                                placeholder="First Name">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                            <input type="text"
                                class="w-full border border-gray-200 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition"
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
                                    class="w-full border border-gray-200 rounded-xl py-3 pl-10 pr-4 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition"
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
                                    class="w-full border border-gray-200 rounded-xl py-3 pl-10 pr-4 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition"
                                    placeholder="Your phone number">
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                        <select
                            class="w-full border border-gray-200 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
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
                                    class="w-full border border-gray-200 rounded-xl py-3 pl-10 pr-4 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition"
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
                                    class="w-full border border-gray-200 rounded-xl py-3 pl-10 pr-4 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition"
                                    placeholder="Confirm your password">
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-2">
                        <input type="checkbox" id="terms"
                            class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500/20">
                        <label for="terms" class="text-sm text-gray-600">I accept the <a href="#"
                                class="text-blue-600 hover:text-blue-800 transition">Terms and Conditions</a></label>
                    </div>

                    <button type="submit"
                        class="w-full bg-gradient-to-r from-red-600 to-red-800 text-white py-3 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 font-medium">
                        Create Account <i class="ml-2 fas fa-user-plus"></i>
                    </button>

                    <div class="text-center text-sm">
                        <span class="text-gray-600">Already have an account?</span>
                        <button type="button" onclick="showForm('loginForm')"
                            class="text-maroon-600 hover:text-blue-800 transition font-medium ml-2">Sign In</button>
                    </div>
                </form>

                <!-- FORGOT PASSWORD FORM -->
                <form id="forgotForm" class="space-y-5 hidden">
                    <div class="text-center">
                        <div
                            class="w-16 h-16 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-key text-2xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Reset Password</h2>
                        <p class="text-gray-500 mt-1">Enter your email to receive a reset link</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <input type="email"
                                class="w-full border border-gray-200 rounded-xl py-3 pl-10 pr-4 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition"
                                placeholder="Enter your email">
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full bg-gradient-to-r from-red-600 to-red-500 text-white py-3 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 font-medium">
                        Send Reset Link <i class="ml-2 fas fa-paper-plane"></i>
                    </button>

                    <div class="text-center text-sm">
                        <button type="button" onclick="showForm('loginForm')"
                            class="text-maroon-600 hover:text-blue-800 transition font-medium">
                            <i class="fas fa-arrow-left mr-1"></i> Back to Sign In
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Other modals remain the same -->
<!-- Info Modal -->
<div id="infoModal" class="fixed inset-0 z-[10000] hidden" aria-hidden="true">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black/60 opacity-0 transition-opacity"></div>

    <!-- Dialog wrapper -->
    <div class="absolute inset-0 flex items-center justify-end">
        <!-- Dialog -->
        <div
            class="modal-content flex flex-col bg-white max-w-sm w-full h-full md:h-auto md:max-h-[90vh] md:rounded-2xl shadow-2xl transform translate-x-full opacity-0 transition-all duration-500">
            <div class="flex justify-between items-center p-5 bg-accent text-white md:rounded-t-2xl">
                <h2 class="text-lg font-semibold">More Info</h2>
                <button onclick="closeModal()" class="text-white hover:text-blue-200 focus:outline-none">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <div class="p-5 flex-1 overflow-y-auto">
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <a onclick="openModal('investorModal')"
                        class="flex flex-col items-center p-3 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors cursor-pointer">
                        <div class="w-12 h-12 bg-primary/80 rounded-full flex items-center justify-center mb-2">
                            <i class="fas fa-hand-holding-usd text-white"></i>
                        </div>
                        <span class="text-xs font-medium text-gray-700 text-center">Investors</span>
                    </a>
                    <a href="#partners"
                        class="flex flex-col items-center p-3 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors cursor-pointer">
                        <div class="w-12 h-12 bg-primary/80 rounded-full flex items-center justify-center mb-2">
                            <i class="fas fa-handshake text-white"></i>
                        </div>
                        <span class="text-xs font-medium text-gray-700 text-center">Partners</span>
                    </a>

                    <div onclick="window.open('https://drive.google.com/drive/folders/1tLF_QrV0nFVV1zqJJjF40uNDrqMlVI-6', '_blank')"
                        class="flex flex-col items-center p-3 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors cursor-pointer">
                        <div class="w-12 h-12 bg-primary/80 rounded-full flex items-center justify-center mb-2">
                            <i class="fas fa-book text-white"></i>
                        </div>
                        <span class="text-xs font-medium text-gray-700 text-center">Library</span>
                    </div>

                    <div
                        class="flex flex-col items-center p-3 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors cursor-pointer">
                        <div class="w-12 h-12 bg-primary/80 rounded-full flex items-center justify-center mb-2">
                            <i class="fas fa-newspaper text-white"></i>
                        </div>
                        <span class="text-xs font-medium text-gray-700 text-center">Media</span>
                    </div>
                </div>

                <div class="space-y-3 mb-6">
                    <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-100 transition-colors">
                        <div class="w-10 h-10 bg-primary/80 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-comment-dots text-light"></i>
                        </div>
                        <span class="font-medium text-gray-700 text-sm">Talk to us</span>
                    </a>

                    <a href="#" class="flex items-center p-3 rounded-lg hover:bg-gray-100 transition-colors">
                        <div class="w-10 h-10 bg-primary/80 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-question-circle text-light"></i>
                        </div>
                        <span class="font-medium text-gray-700 text-sm">FAQs</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Investor Modal with proper backdrop -->
<div id="investorModal" class="fixed inset-0 z-[10000] hidden" aria-hidden="true">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black/60 opacity-0 transition-opacity"></div>

    <!-- Dialog wrapper for centering -->
    <div class="absolute inset-0 flex items-center justify-center p-4">
        <!-- Dialog -->
        <div
            class="modal-content bg-white rounded-xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-y-auto transform scale-95 opacity-0 transition-transform duration-300">
            <div class="sticky top-0 bg-white z-10 rounded-t-xl border-b flex justify-between items-center p-6">
                <h3 class="text-2xl font-bold text-blue-800 flex items-center">
                    <i class="fas fa-hand-holding-usd mr-3 text-blue-600"></i>
                    Investor Request Form
                </h3>
                <button onclick="closeModal()" class="text-gray-500 hover:text-red-500 transition-colors">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <div class="p-6">
                <div class="bg-blue-50 rounded-lg p-4 mb-6">
                    <p class="text-blue-800 text-center"><i class="fas fa-info-circle mr-2"></i>
                        The Huduma WhiteBox Platform receives, evaluates and facilitates growth of Kenyan Innovations,
                        which we evaluate and scale as per their requirements.
                    </p>
                    <p class="text-blue-800 text-center mt-2">If you would like to invest in any of the top innovations
                        evaluated, kindly create an account with us to view the viable solutions.</p>
                </div>

                <form id="investors" class="space-y-6">
                    <input type="hidden" name="_token" value="dummy_token">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="form-group">
                            <label for="investorName" class="block text-sm font-medium text-gray-700 mb-1">Investor Name
                                *</label>
                            <input
                                class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Full Name" name="investorName" type="text" id="investorName" required>
                        </div>

                        <div class="form-group">
                            <label for="Title" class="block text-sm font-medium text-gray-700 mb-1">Title *</label>
                            <select
                                class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                name="Title" id="head_tt" required>
                                <option value="">Select Title</option>
                                <option>Mr</option>
                                <option>Mrs</option>
                                <option>Miss</option>
                                <option>Dr</option>
                                <option>Prof</option>
                                <option>Eng</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address
                                *</label>
                            <input
                                class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="e.g username@example.com" name="email" type="email" id="email"
                                maxlength="50" required>
                        </div>

                        <div class="form-group">
                            <label for="PhoneNumber" class="block text-sm font-medium text-gray-700 mb-1">Phone Number
                                *</label>
                            <input
                                class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="e.g 0712345678 or +254712345678" name="PhoneNumber" maxlength="13"
                                type="text" id="PhoneNumber" required>
                        </div>

                        <div class="form-group">
                            <label for="CompanyName" class="block text-sm font-medium text-gray-700 mb-1">Company Name
                                *</label>
                            <input
                                class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Company Name" name="CompanyName" type="text" id="CompanyName" required>
                        </div>

                        <div class="form-group">
                            <label for="Company_type" class="block text-sm font-medium text-gray-700 mb-1">Company Type
                                *</label>
                            <select
                                class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                id="company_types" name="Company_type" required>
                                <option value="">Select Company Type</option>
                                <option>Sole Proprietorship</option>
                                <option>Public Parastatal</option>
                                <option>Limited Company</option>
                                <option>Partnership</option>
                                <option>Limited Liability Partnership</option>
                                <option>Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="country" class="block text-sm font-medium text-gray-700 mb-1">Country of Origin
                                *</label>
                            <select
                                class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                id="countries" name="country" required>
                                <option value="">Select Country</option>
                                <option>Kenya</option>
                                <option>Uganda</option>
                                <option>Tanzania</option>
                                <option>Rwanda</option>
                                <option>Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="sector_id" class="block text-sm font-medium text-gray-700 mb-1">Sector you would
                                like to invest in *</label>
                            <select
                                class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                id="sector_id" name="sector_id" required>
                                <option value="">Select Sector</option>
                                <option>Agriculture</option>
                                <option>Technology</option>
                                <option>Healthcare</option>
                                <option>Education</option>
                                <option>Finance</option>
                                <option>Energy</option>
                                <option>Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="investor_type" class="block text-sm font-medium text-gray-700 mb-1">Investor
                                Type *</label>
                            <select
                                class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                id="investor_type" name="investor_type" required>
                                <option value="">Select Investor Type</option>
                                <option>Partner</option>
                                <option>Investor/Venture Capitalist</option>
                                <option>Investor/Angel Investor</option>
                                <option>Investor/Peer-to-Peer lender</option>
                                <option>Investor/Personal Investor</option>
                                <option>Investor/Bank</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="HearAboutUs" class="block text-sm font-medium text-gray-700 mb-1">How did you
                                hear about Huduma WhiteBox? *</label>
                            <select
                                class="form-input w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                id="HearAboutUs" name="HearAboutUs" required>
                                <option value="">Select Option</option>
                                <option>Internet</option>
                                <option>Newspaper</option>
                                <option>Radio</option>
                                <option>Another Investor</option>
                                <option>Flyer</option>
                                <option>Social Media</option>
                                <option>Referral</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Would you like to mentor innovators
                            at Huduma WhiteBox?</label>
                        <div class="flex items-center space-x-6">
                            <label class="inline-flex items-center">
                                <input type="radio" name="mentor" value="Yes"
                                    class="h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300" id="mentora"
                                    checked>
                                <span class="ml-2 text-gray-700">Yes</span>
                            </label>
                            <label class="inline-flex items-center">
                                <input type="radio" name="mentor" value="No"
                                    class="h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300" id="mentorb">
                                <span class="ml-2 text-gray-700">No</span>
                            </label>
                        </div>
                    </div>

                    <div class="pt-4 flex justify-center space-x-4">
                        <button type="submit"
                            class="btn-submit text-white font-semibold px-8 py-3 rounded-lg shadow-md">
                            <i class="fas fa-paper-plane mr-2"></i> Submit Request
                        </button>
                        <button type="button" onclick="closeModal()"
                            class="btn-close bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold px-8 py-3 rounded-lg shadow-md">
                            <i class="fas fa-times mr-2"></i> Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Redirect Modal with proper backdrop -->
<div id="redirectModal" class="fixed inset-0 z-[10000] hidden" aria-hidden="true">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black/60 opacity-0 transition-opacity"></div>

    <!-- Dialog wrapper for centering -->
    <div class="absolute inset-0 flex items-center justify-center p-4">
        <!-- Dialog -->
        <div
            class="modal-content bg-white rounded-xl shadow-xl w-full max-w-md p-6 transform scale-95 opacity-0 transition-all duration-300">
            <h2 class="text-xl font-semibold text-secondary mb-4">E-learning Redirection</h2>
            <p class="text-gray-600 mb-6">
                You are about to be redirected to our E-learning platform.
                Do you want to continue?
            </p>
            <div class="flex justify-end gap-3">
                <button onclick="closeModal()"
                    class="px-4 py-2 rounded-lg bg-red-600 text-white hover:bg-gray-300 transition">
                    Cancel
                </button>
                <button onclick="window.location.href='https://elearning.example.com'"
                    class="px-4 py-2 rounded-lg bg-accent text-white hover:bg-indigo-700 transition">
                    Agree & Continue
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Success Message -->
<div id="success-message"
    class="success-message fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg max-w-sm opacity-0 transform translate-y-10">
    <i class="fas fa-check-circle mr-2"></i> Thank you for your interest! We will contact you shortly.
</div>

<script>
    // Updated modal system for new structure
    let activeModal = null;
    let activeForm = 'loginForm';

    function openModal(modalId, formId = null) {
        if (activeModal) {
            closeModal();
            setTimeout(() => {
                actuallyOpenModal(modalId, formId);
            }, 300);
        } else {
            actuallyOpenModal(modalId, formId);
        }
    }

    function actuallyOpenModal(modalId, formId) {
        const modal = document.getElementById(modalId);
        activeModal = modalId;

        // Remove hidden class and show modal
        modal.classList.remove('hidden');

        // Animate backdrop
        const backdrop = modal.querySelector('.absolute.inset-0.bg-black\\/60');
        backdrop.classList.remove('opacity-0');

        // Modal-specific animations
        if (modalId === 'infoModal') {
            const modalContent = modal.querySelector('.modal-content');
            modalContent.classList.remove('translate-x-full', 'opacity-0');
            modalContent.classList.add('translate-x-0', 'opacity-100');
        } else {
            const modalContent = modal.querySelector('.modal-content');
            modalContent.classList.remove('scale-95', 'opacity-0');
            modalContent.classList.add('scale-100', 'opacity-100');
        }

        // Show specific form if requested
        if (formId) {
            showForm(formId);
        }
    }

    function closeModal() {
        if (!activeModal) return;

        const modal = document.getElementById(activeModal);

        // Animate backdrop
        const backdrop = modal.querySelector('.absolute.inset-0.bg-black\\/60');
        backdrop.classList.add('opacity-0');

        // Modal-specific closing animations
        if (activeModal === 'infoModal') {
            const modalContent = modal.querySelector('.modal-content');
            modalContent.classList.remove('translate-x-0', 'opacity-100');
            modalContent.classList.add('translate-x-full', 'opacity-0');
        } else {
            const modalContent = modal.querySelector('.modal-content');
            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-95', 'opacity-0');
        }

        // Hide modal after transition
        setTimeout(() => {
            modal.classList.add('hidden');
            activeModal = null;
        }, 300);
    }

    // Show form function remains the same
    function showForm(formId) {
        const forms = document.querySelectorAll('#authModal form');
        forms.forEach(form => {
            form.classList.add('hidden');
            form.classList.remove('animate-slide-in-right', 'animate-slide-in-left', 'animate-fade-in');
        });

        const targetForm = document.getElementById(formId);
        if (targetForm) {
            targetForm.classList.remove('hidden');

            if (formId === 'loginForm') {
                targetForm.classList.add('animate-slide-in-right');
            } else if (formId === 'signupForm') {
                targetForm.classList.add('animate-slide-in-left');
            } else {
                targetForm.classList.add('animate-fade-in');
            }

            activeForm = formId;
        }
    }

    // Initialize
    document.addEventListener('DOMContentLoaded', function () {
        showForm('loginForm');
    });
</script>