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

    /* Terms Modal Styles */
    .terms-modal-content {
        max-height: 80vh;
        overflow-y: auto;
    }

    /* Password Strength Meter Styles */
    .password-strength-meter {
        margin-top: 5px;
        height: 5px;
        border-radius: 3px;
        transition: all 0.3s ease;
    }

    .strength-weak {
        background-color: #ef4444;
        width: 33%;
    }

    .strength-medium {
        background-color: #f59e0b;
        width: 66%;
    }

    .strength-strong {
        background-color: #10b981;
        width: 100%;
    }

    .strength-text {
        font-size: 0.75rem;
        margin-top: 2px;
    }

    .error-message {
        background-color: #fef2f2;
        border: 1px solid #fecaca;
        color: #dc2626;
        padding: 8px 12px;
        border-radius: 6px;
        margin-top: 8px;
        font-size: 0.875rem;
    }

    .success-message {
        background-color: #f0fdf4;
        border: 1px solid #bbf7d0;
        color: #16a34a;
        padding: 8px 12px;
        border-radius: 6px;
        margin-top: 8px;
        font-size: 0.875rem;
    }
</style>

<!-- Your HTML modals remain the same -->
<!-- Terms and Conditions Modal -->
<div id="termsModal" class="fixed inset-0 z-[10001] hidden" aria-hidden="true">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black/60 opacity-0 transition-opacity"></div>

    <!-- Dialog wrapper for centering -->
    <div class="absolute inset-0 flex items-center justify-center p-4">
        <!-- Dialog -->
        <div
            class="modal-content bg-white rounded-2xl shadow-2xl w-full max-w-4xl max-h-[90vh] overflow-hidden transform scale-95 opacity-0 transition duration-500">
            <div class="bg-gradient-to-r from-light to-accent p-5 flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <div class="w-9 h-9 rounded-lg grid place-items-center bg-secondary/10 text-secondary">
                        <i class="fa-solid fa-file-contract"></i>
                    </div>
                    <h2 class="text-xl md:text-2xl font-bold text-white">
                        Terms and Conditions
                    </h2>
                </div>
                <button onclick="closeModal()" class="text-white/80 hover:text-white transition">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <div class="terms-modal-content p-6">
                <div class="prose max-w-none">
                    <h3 class="text-lg font-semibold mb-4">Terms and Conditions on the use of Whitebox Facility</h3>

                    <p class="mb-4 text-gray-700">
                        The Participants agree that by submitting their idea, innovation or product to
                        the Whitebox Facility they agree to the following terms and conditions which
                        constitute a legally binding agreement between the Government and the
                        Participants. Further, the Participants in registering with the Facility confirm
                        that they have read and fully understood and accepted these terms and
                        conditions.
                    </p>

                    <ol class="list-decimal list-inside space-y-4 text-gray-700">
                        <li class="pl-2">
                            <strong>The Government is under no obligation to take up the idea, innovation or the
                                product or apply it in any manner whatsoever;</strong>
                        </li>

                        <li class="pl-2">
                            <strong>The Government is not responsible for the protection of the intellectual
                                property rights for the idea, innovation or the product and neither does it
                                guarantee any such protection within the Whitebox Facility.</strong> The Participants
                            are advised to follow through with the appropriate Government bodies for the
                            protection of their intellectual property rights.
                        </li>

                        <li class="pl-2">
                            <strong>The Participants agree that they are voluntarily entering in the Whitebox
                                Facility and fully understand its mode of operation.</strong> Their engagement with
                            the Government and its partners is not compulsory and they can choose to opt
                            out at any given time.
                        </li>

                        <li class="pl-2">
                            <strong>The Participants acknowledge that the Whitebox Facility is not responsible
                                for any contracts that the Participants may enter with any of the Facility's
                                partners.</strong> Any such contractual engagements or dealings are willingly entered
                            by the Participants and they do not create any privity with the Government.
                        </li>

                        <li class="pl-2">
                            <strong>The Participants fully understand the objectives of Whitebox Facility and as
                                such the Participants have without any inducement or coercion submitted
                                their ideas, innovations and products to the Facility</strong> and this participation
                            does not create any binding legal obligations with the Government.
                        </li>
                    </ol>

                    <div class="mt-6 p-4 bg-blue-50 rounded-lg">
                        <p class="text-sm text-blue-800">
                            <i class="fas fa-info-circle mr-2"></i>
                            By creating an account, you acknowledge that you have read, understood, and agree to be
                            bound by these Terms and Conditions.
                        </p>
                    </div>
                </div>
            </div>

            <div class="flex justify-end p-4 border-t">
                <button onclick="closeModal()"
                    class="px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">
                    Close
                </button>
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
                <form id="loginForm" class="space-y-5" method="POST">
                    <h2 class="text-2xl font-bold text-center text-gray-800">Welcome Back</h2>
                    <p class="text-center text-gray-500">Sign in to continue to your account</p>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email" name="email" id="loginEmail"
                                    class="w-full border border-gray-200 rounded-xl py-3 pl-10 pr-4 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition"
                                    placeholder="Enter your email" required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" name="password" id="loginPassword"
                                    class="w-full border border-gray-200 rounded-xl py-3 pl-10 pr-4 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition"
                                    placeholder="Enter your password" required>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <input type="checkbox" id="remember" name="remember"
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
                <form id="signupForm" class="space-y-5 hidden" method="POST">
                    <h2 class="text-2xl font-bold text-center text-gray-800">Create Account</h2>
                    <p class="text-center text-gray-500">Join us today and get started</p>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                            <input type="text" name="first_name" id="firstName"
                                class="w-full border border-gray-200 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition"
                                placeholder="First Name" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                            <input type="text" name="last_name" id="lastName"
                                class="w-full border border-gray-200 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition"
                                placeholder="Last Name" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                                    <i class="fas fa-envelope"></i>
                                </span>
                                <input type="email" name="email" id="signupEmail"
                                    class="w-full border border-gray-200 rounded-xl py-3 pl-10 pr-4 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition"
                                    placeholder="Enter your email" required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                                    <i class="fas fa-phone"></i>
                                </span>
                                <input type="text" name="phone" id="phone"
                                    class="w-full border border-gray-200 rounded-xl py-3 pl-10 pr-4 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition"
                                    placeholder="Your phone number" required>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                        <select name="gender" id="gender"
                            class="w-full border border-gray-200 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition"
                            required>
                            <option value="">Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" name="newpassword" id="newpassword"
                                    class="w-full border border-gray-200 rounded-xl py-3 pl-10 pr-4 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition"
                                    placeholder="Create a password" required
                                    oninput="analyzePasswordStrength(this.value)">
                            </div>
                            <!-- Password Strength Meter -->
                            <div id="passwordStrengthContainer" class="hidden">
                                <div class="password-strength-meter" id="strengthmeter"></div>
                                <div class="strength-text text-xs text-gray-500" id="str_stregnth"></div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" name="password_confirm" id="password_confirm"
                                    class="w-full border border-gray-200 rounded-xl py-3 pl-10 pr-4 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition"
                                    placeholder="Confirm your password" required>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-2">
                        <input type="checkbox" id="terms" name="terms" value="accepted"
                            class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500/20" required>
                        <label for="terms" class="text-sm text-gray-600">I accept the
                            <button type="button" onclick="openModal('termsModal')"
                                class="text-blue-600 hover:text-blue-800 transition">
                                Terms and Conditions
                            </button>
                        </label>
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
                <form id="forgotForm" class="space-y-5 hidden" method="POST">
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
                            <input type="email" name="remail" id="remail"
                                class="w-full border border-gray-200 rounded-xl py-3 pl-10 pr-4 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition"
                                placeholder="Enter your email" required>
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

                <!-- RESET PASSWORD FORM (for when user has the reset code) -->
                <form id="resetPasswordForm" class="space-y-5 hidden" method="POST">
                    <div class="text-center">
                        <div
                            class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-lock text-2xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Create New Password</h2>
                        <p class="text-gray-500 mt-1">Enter your new password</p>
                    </div>

                    <div>
                        <input type="hidden" name="code" id="resetCode">
                        <input type="hidden" name="emailsets" id="resetEmail">

                        <label class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password" name="password_n" id="password_n"
                                class="w-full border border-gray-200 rounded-xl py-3 pl-10 pr-4 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition"
                                placeholder="Enter new password" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Confirm New Password</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password" name="new_passworn" id="new_passworn"
                                class="w-full border border-gray-200 rounded-xl py-3 pl-10 pr-4 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition"
                                placeholder="Confirm new password" required>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full bg-gradient-to-r from-green-600 to-green-500 text-white py-3 rounded-xl shadow-md hover:shadow-lg transition-all duration-300 font-medium">
                        Reset Password <i class="ml-2 fas fa-check"></i>
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

                <form id="investors" class="space-y-6" method="POST" action="submit_investor.php">
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
                <button onclick="window.location.href='https://e-learning.whitebox.go.ke'"
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
// Combined JavaScript functionality for the auth modal
$(document).ready(function () {
    // Common variables and functions
    const email = '<?php echo $email ?>';
    const recoversource = email ? "linking" : "";
    
    // Modal Management System
    let activeModal = null;
    let activeForm = 'loginForm';

    // Email validation function
    function validateEmail(email) {
        const emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test(email);
    }
    
    // Password validation function
    function validatePassword(password) {
        return password && password.length >= 8;
    }
    
    // Password strength validation function
    function validatePasswordStrength(password) {
        const strongRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;
        const mediumRegex = /^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})/;
        
        if (strongRegex.test(password)) {
            return { strength: "strong", percentage: "100%", color: "green" };
        } else if (mediumRegex.test(password)) {
            return { strength: "medium", percentage: "70%", color: "orange" };
        } else {
            return { strength: "weak", percentage: "40%", color: "red" };
        }
    }
    
    // Common error display function
    function showError(element, message, isError = true) {
        // Remove any existing error messages in the form
        element.find('.error-message').remove();
        
        const errorDiv = $(`<div class="error-message"></div>`);
        errorDiv.html(`<i class="fas fa-exclamation-circle mr-1"></i> ${message}`);
        element.append(errorDiv);

        setTimeout(() => {
            errorDiv.fadeOut(() => errorDiv.remove());
        }, 5000);
    }
    
    // Show success message
    function showSuccessMessage(message = 'Thank you for your interest! We will contact you shortly.') {
        const successMsg = document.getElementById('success-message');
        if (successMsg) {
            successMsg.innerHTML = `<i class="fas fa-check-circle mr-2"></i> ${message}`;
            successMsg.classList.remove('opacity-0', 'translate-y-10');
            successMsg.classList.add('show');

            setTimeout(() => {
                successMsg.classList.remove('show');
                successMsg.classList.add('opacity-0', 'translate-y-10');
            }, 5000);
        }
    }

    // Show loader on form submission
    function showLoader(formElement) {
        const submitBtn = formElement.find('button[type="submit"]');
        submitBtn.data('original-text', submitBtn.html());
        submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin"></i> Processing...');
    }

    // Hide loader after form submission
    function hideLoader(formElement) {
        const submitBtn = formElement.find('button[type="submit"]');
        const originalText = submitBtn.data('original-text');
        if (originalText) {
            submitBtn.html(originalText);
        }
        submitBtn.prop('disabled', false);
    }

    // Open modal function
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

    // Actually open modal with animations
    function actuallyOpenModal(modalId, formId) {
        const modal = document.getElementById(modalId);
        if (!modal) return;

        activeModal = modalId;
        modal.classList.remove('hidden');

        // Animate backdrop
        const backdrop = modal.querySelector('.absolute.inset-0.bg-black\\/60');
        if (backdrop) {
            backdrop.classList.remove('opacity-0');
        }

        // Modal-specific animations
        const modalContent = modal.querySelector('.modal-content');
        if (modalContent) {
            if (modalId === 'infoModal') {
                modalContent.classList.remove('translate-x-full', 'opacity-0');
                modalContent.classList.add('translate-x-0', 'opacity-100');
            } else {
                modalContent.classList.remove('scale-95', 'opacity-0');
                modalContent.classList.add('scale-100', 'opacity-100');
            }
        }

        // Show specific form if requested
        if (formId) {
            showForm(formId);
        }

        // Prevent body scroll when modal is open
        document.body.style.overflow = 'hidden';
    }

    // Close modal function
    function closeModal() {
        if (!activeModal) return;

        const modal = document.getElementById(activeModal);
        if (!modal) return;

        // Animate backdrop
        const backdrop = modal.querySelector('.absolute.inset-0.bg-black\\/60');
        if (backdrop) {
            backdrop.classList.add('opacity-0');
        }

        // Modal-specific closing animations
        const modalContent = modal.querySelector('.modal-content');
        if (modalContent) {
            if (activeModal === 'infoModal') {
                modalContent.classList.remove('translate-x-0', 'opacity-100');
                modalContent.classList.add('translate-x-full', 'opacity-0');
            } else {
                modalContent.classList.remove('scale-100', 'opacity-100');
                modalContent.classList.add('scale-95', 'opacity-0');
            }
        }

        // Hide modal after transition
        setTimeout(() => {
            modal.classList.add('hidden');
            activeModal = null;
            // Restore body scroll
            document.body.style.overflow = '';
        }, 300);
    }

    // Show specific form in auth modal
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

    // Password strength indicator
    function analyzePasswordStrength(password) {
        const container = $('#passwordStrengthContainer');
        const meter = $('#strengthmeter');
        const text = $('#str_stregnth');
        
        if (!password) {
            container.hide();
            return;
        }
        
        container.show();
        const strengthInfo = validatePasswordStrength(password);
        
        meter.removeClass('strength-weak strength-medium strength-strong')
             .addClass(`strength-${strengthInfo.strength}`)
             .css({
                 'background-color': strengthInfo.color,
                 'width': strengthInfo.percentage
             });
        
        text.text(`${strengthInfo.percentage} - ${strengthInfo.strength.charAt(0).toUpperCase() + strengthInfo.strength.slice(1)}`);
    }

    // Setup form submission handlers
    function setupFormHandlers() {
        // Login form
        $('#loginForm').on('submit', function(e) {
            e.preventDefault();
            const form = $(this);

            const email = form.find('input[name="email"]').val();
            const password = form.find('input[name="password"]').val();

            if (!email || !password) {
                showError(form, "Email and password are required!");
                return;
            }

            if (!validateEmail(email)) {
                showError(form, "Please enter a valid email address!");
                return;
            }

            showLoader(form);

            // Base64 encode credentials
            const busername = btoa(email);
            const bpass = btoa(password);

            $.post("login/login.php", { busername, bpass })
                .done(function (response) {
                    try {
                        const decodedResponse = atob(response);
                        handleLoginResponse(decodedResponse, busername);
                    } catch (error) {
                        showError(form, "Invalid response from server. Please try again.");
                    }
                })
                .fail(function () {
                    showError(form, "Login failed. Please check your connection and try again.");
                })
                .always(function () {
                    hideLoader(form);
                });
        });

        // Signup form
        $('#signupForm').on('submit', function(e) {
            e.preventDefault();
            const form = $(this);

            const first_name = form.find('input[name="first_name"]').val();
            const last_name = form.find('input[name="last_name"]').val();
            const email = form.find('input[name="email"]').val();
            const phone = form.find('input[name="phone"]').val();
            const gender = form.find('select[name="gender"]').val();
            const password = form.find('input[name="newpassword"]').val();
            const password_confirm = form.find('input[name="password_confirm"]').val();
            const terms = form.find('input[name="terms"]').is(':checked');

            // Validation
            if (!first_name || !last_name || !email || !phone || !gender || !password || !password_confirm) {
                showError(form, "All fields are required!");
                return;
            }

            if (!validateEmail(email)) {
                showError(form, "Please enter a valid email address!");
                return;
            }

            if (!terms) {
                showError(form, "You must accept the Terms and Conditions!");
                return;
            }

            if (!validatePassword(password)) {
                showError(form, "Password must be at least 8 characters long!");
                return;
            }

            if (password !== password_confirm) {
                showError(form, "Passwords do not match!");
                return;
            }

            showLoader(form);

            const formData = new FormData(this);
            $.ajax({
                url: 'login/validate.php',
                method: 'POST',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    try {
                        const decodedResponse = atob(response);
                        if ($.trim(decodedResponse) === "This account exists") {
                            showError(form, "This account already exists!");
                        } else {
                            $("#secret_key").val($.trim(response));
                            showForm('loginForm');
                            showSuccessMessage("Account created successfully! Please check your email for verification.");
                        }
                    } catch (error) {
                        showError(form, "Registration failed. Please try again.");
                    }
                },
                error: function () {
                    showError(form, "Registration failed. Please try again.");
                },
                complete: function () {
                    hideLoader(form);
                }
            });
        });

        // Forgot password form
        $('#forgotForm').on('submit', function(e) {
            e.preventDefault();
            const form = $(this);

            const email = form.find('input[name="remail"]').val();

            if (!email) {
                showError(form, "Email is required!");
                return;
            }

            if (!validateEmail(email)) {
                showError(form, "Please enter a valid email address!");
                return;
            }

            showLoader(form);

            const formData = new FormData(this);
            $.ajax({
                url: 'login/recover.php',
                method: 'POST',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    try {
                        const decodedResponse = atob(response);
                        if (decodedResponse === "Email does not exist") {
                            showError(form, "Email does not exist in our system!");
                        } else {
                            $("#secret_key").val($.trim(response));
                            showSuccessMessage("Password reset instructions have been sent to your email!");
                            showForm('loginForm');
                        }
                    } catch (error) {
                        showError(form, "Password reset failed. Please try again.");
                    }
                },
                error: function () {
                    showError(form, "Password reset failed. Please try again.");
                },
                complete: function () {
                    hideLoader(form);
                }
            });
        });

        // Reset password form
        $('#resetPasswordForm').on('submit', function(e) {
            e.preventDefault();
            const form = $(this);

            const password = form.find('input[name="password_n"]').val();
            const password_confirm = form.find('input[name="new_passworn"]').val();

            if (!password || !password_confirm) {
                showError(form, "Both password fields are required!");
                return;
            }

            if (!validatePassword(password)) {
                showError(form, "Password must be at least 8 characters long!");
                return;
            }

            if (password !== password_confirm) {
                showError(form, "Passwords do not match!");
                return;
            }

            showLoader(form);

            const formData = new FormData(this);
            $.ajax({
                url: 'login/reset.php',
                method: 'POST',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    try {
                        const decodedResponse = atob(response);
                        if (decodedResponse === "success") {
                            showSuccessMessage("Password reset successfully! You can now login with your new password.");
                            showForm('loginForm');
                        } else {
                            showError(form, decodedResponse);
                        }
                    } catch (error) {
                        showError(form, "Password reset failed. Please try again.");
                    }
                },
                error: function () {
                    showError(form, "Password reset failed. Please try again.");
                },
                complete: function () {
                    hideLoader(form);
                }
            });
        });

        // Investor form
        $('#investors').on('submit', function(e) {
            e.preventDefault();
            const form = $(this);

            // Basic validation
            const requiredFields = form.find('input[required], select[required]');
            let valid = true;

            requiredFields.each(function () {
                if (!$(this).val()) {
                    valid = false;
                    $(this).addClass('border-red-500');
                } else {
                    $(this).removeClass('border-red-500');
                }
            });

            if (!valid) {
                showError(form, "Please fill all required fields!");
                return;
            }

            showLoader(form);

            const formData = new FormData(this);
            $.ajax({
                url: 'submit_investor.php',
                method: 'POST',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    showSuccessMessage("Thank you for your interest! We will contact you shortly.");
                    closeModal();
                    form[0].reset();
                },
                error: function () {
                    showError(form, "Submission failed. Please try again.");
                },
                complete: function () {
                    hideLoader(form);
                }
            });
        });
    }

    // Handle login response
    function handleLoginResponse(response, username) {
        const trimmedResponse = $.trim(response);

        switch (trimmedResponse) {
            case "e_learning":
                redirectToDashboard('mydashboard/e_learning.php', username);
                break;
            case "portal":
                redirectToDashboard('mydashboard/dashboard.php', username);
                break;
            case "new_password":
                showForm('resetPasswordForm');
                break;
            case "Sorry, wrong username or password!":
            case "Wrong Password, Check the password sent to your email, the first letter is in uppercase":
            case "Wrong username or password, kindly try again or sign up":
            case "All fields required!":
                showError($("#loginForm"), response);
                break;
            default:
                if (response) {
                    $("#secret_key").val($.trim(response));
                    showSuccessMessage("Account verification required. Please check your email.");
                }
                break;
        }
    }

    // Redirect to dashboard
    function redirectToDashboard(url, username) {
        $.post(url, { model: username }, function (data) {
            closeModal();
            // Handle dashboard redirection
            if (typeof updateMainContent === 'function') {
                updateMainContent(data);
            } else {
                window.location.href = 'dashboard.php';
            }
        }).fail(function () {
            showError($("#loginForm"), "Failed to redirect to dashboard. Please try again.");
        });
    }

    // Setup email validation
    function setupEmailValidation() {
        $(document).on('blur', "input[type='email']", function () {
            const emailVal = $(this).val();
            if (emailVal === "") return;

            if (!validateEmail(emailVal)) {
                $(this).addClass("border-red-500");
                const formGroup = $(this).closest('.form-group') || $(this).parent();
                showError(formGroup, "Please enter a valid email address!");
            } else {
                $(this).removeClass("border-red-500");
                $(this).addClass("border-green-500");
            }
        });
    }

    // Setup password validation
    function setupPasswordValidation() {
        $(document).on('blur', "input[type='password']", function () {
            const password = $(this).val();
            const length = password.length;

            if (length > 0 && length < 8) {
                $(this).addClass("border-red-500");
                const formGroup = $(this).closest('.form-group') || $(this).parent();
                showError(formGroup, "Password must be at least 8 characters long!");
            } else if (length >= 8) {
                $(this).removeClass("border-red-500");
                $(this).addClass("border-green-500");
            }
        });
    }

    // Setup backdrop close functionality
    function setupBackdropClose() {
        $(document).on('click', '.fixed.inset-0', function (e) {
            if (e.target === this) {
                closeModal();
            }
        });
    }

    // Initialize the application
    function initApp() {
        // Initialize with login form
        showForm('loginForm');

        // Set up event listeners for all forms
        setupFormHandlers();

        // Set up email validation
        setupEmailValidation();

        // Set up password validation
        setupPasswordValidation();

        // Store original button text for all submit buttons
        $('button[type="submit"]').each(function () {
            $(this).data('original-text', $(this).html());
        });
    }

    // Initialize the app
    initApp();

    // Disable right-click context menu
    $(document).on("contextmenu", function (e) {
        return false;
    });

    // Escape key to close modal
    $(document).on('keydown', function (e) {
        if (e.key === 'Escape' && activeModal) {
            closeModal();
        }
    });
});
</script>