<style>
    /* Your existing CSS remains the same */
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
</style>

<!-- Terms and Conditions Modal -->
<div id="termsModal" class="fixed inset-0 z-[10001] hidden" aria-hidden="true">
    <!-- Your existing terms modal content -->
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
                                <input type="email" id="loginEmail" name="email"
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
                                <input type="password" id="loginPassword" name="password"
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
                <form id="signupForm" class="space-y-5 hidden">
                    <h2 class="text-2xl font-bold text-center text-gray-800">Create Account</h2>
                    <p class="text-center text-gray-500">Join us today and get started</p>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">First Name</label>
                            <input type="text" id="signupFirstName" name="first_name"
                                class="w-full border border-gray-200 rounded-xl py-3 px-4 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition"
                                placeholder="First Name" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Last Name</label>
                            <input type="text" id="signupLastName" name="last_name"
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
                                <input type="email" id="signupEmail" name="email"
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
                                <input type="text" id="signupPhone" name="phone"
                                    class="w-full border border-gray-200 rounded-xl py-3 pl-10 pr-4 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition"
                                    placeholder="Your phone number" required>
                            </div>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                        <select id="signupGender" name="gender"
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
                                <input type="password" id="signupPassword" name="newpassword"
                                    class="w-full border border-gray-200 rounded-xl py-3 pl-10 pr-4 focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition"
                                    placeholder="Create a password" required>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Confirm Password</label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                                    <i class="fas fa-lock"></i>
                                </span>
                                <input type="password" id="signupConfirmPassword" name="password_confirm"
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
                            <input type="email" id="forgotEmail" name="remail"
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

                <!-- RESET PASSWORD FORM -->
                <form id="resetPasswordForm" class="space-y-5 hidden">
                    <div class="text-center">
                        <div
                            class="w-16 h-16 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-lock text-2xl"></i>
                        </div>
                        <h2 class="text-2xl font-bold text-gray-800">Create New Password</h2>
                        <p class="text-gray-500 mt-1">Enter your new password</p>
                    </div>

                    <div>
                        <input type="hidden" id="resetCode" name="code">
                        <input type="hidden" id="resetEmail" name="emailsets">

                        <label class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password" id="resetNewPassword" name="password_n"
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
                            <input type="password" id="resetConfirmPassword" name="new_passworn"
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
    <!-- Your existing info modal content -->
</div>

<!-- Investor Modal -->
<div id="investorModal" class="fixed inset-0 z-[10000] hidden" aria-hidden="true">
    <!-- Your existing investor modal content -->
</div>

<!-- Redirect Modal -->
<div id="redirectModal" class="fixed inset-0 z-[10000] hidden" aria-hidden="true">
    <!-- Your existing redirect modal content -->
</div>

<!-- Success Message -->
<div id="success-message"
    class="success-message fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg max-w-sm opacity-0 transform translate-y-10">
    <i class="fas fa-check-circle mr-2"></i> Thank you for your interest! We will contact you shortly.
</div>

<script>
    // Modal Management System
    let activeModal = null;
    let activeForm = 'loginForm';

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

    // Show error message
    function showError(formElement, message) {
        // Remove any existing error messages
        const existingError = formElement.querySelector('.error-message');
        if (existingError) {
            existingError.remove();
        }

        const errorDiv = document.createElement('div');
        errorDiv.className = 'error-message text-red-500 text-sm mt-2 text-center p-2 bg-red-50 rounded-lg';
        errorDiv.innerHTML = `<i class="fas fa-exclamation-circle mr-1"></i> ${message}`;
        formElement.appendChild(errorDiv);

        setTimeout(() => {
            if (errorDiv.parentNode) {
                errorDiv.remove();
            }
        }, 5000);
    }

    // Show loader on form submission
    function showLoader(formElement) {
        const submitBtn = formElement.querySelector('button[type="submit"]');
        submitBtn.dataset.originalText = submitBtn.innerHTML;
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
    }

    // Hide loader after form submission
    function hideLoader(formElement) {
        const submitBtn = formElement.querySelector('button[type="submit"]');
        const originalText = submitBtn.dataset.originalText;
        if (originalText) {
            submitBtn.innerHTML = originalText;
        }
        submitBtn.disabled = false;
    }

    // Email validation
    function validateEmail(email) {
        const emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test(email);
    }

    // Password validation
    function validatePassword(password) {
        return password.length >= 8;
    }

    // Get form data as object
    function getFormData(formElement) {
        const formData = new FormData(formElement);
        const data = {};
        for (let [key, value] of formData.entries()) {
            data[key] = value;
        }
        return data;
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

        // Close modal when clicking on backdrop
        setupBackdropClose();
    }

    // Setup form submission handlers
    function setupFormHandlers() {
        // Login form
        document.getElementById('loginForm').addEventListener('submit', handleLogin);

        // Signup form
        document.getElementById('signupForm').addEventListener('submit', handleSignup);

        // Forgot password form
        document.getElementById('forgotForm').addEventListener('submit', handleForgotPassword);

        // Reset password form
        document.getElementById('resetPasswordForm').addEventListener('submit', handleResetPassword);

        // Investor form
        document.getElementById('investors').addEventListener('submit', handleInvestorForm);
    }

    // Setup email validation
    function setupEmailValidation() {
        document.addEventListener('blur', function (e) {
            if (e.target.type === 'email') {
                const emailVal = e.target.value;
                if (emailVal === "") return;

                if (!validateEmail(emailVal)) {
                    e.target.value = "";
                    e.target.placeholder = "Wrong email format!";
                    e.target.classList.add("border-red-500");

                    const formGroup = e.target.closest('.form-group') || e.target.parentElement;
                    showError(formGroup, "Please enter a valid email address!");
                } else {
                    e.target.classList.remove("border-red-500");
                    e.target.classList.add("border-green-500");
                }
            }
        }, true);
    }

    // Setup password validation
    function setupPasswordValidation() {
        document.addEventListener('blur', function (e) {
            if (e.target.type === 'password') {
                const password = e.target.value;
                const length = password.length;

                if (length > 0 && length < 8) {
                    e.target.classList.add("border-red-500");
                    const formGroup = e.target.closest('.form-group') || e.target.parentElement;
                    showError(formGroup, "Password must be at least 8 characters long!");
                } else if (length >= 8) {
                    e.target.classList.remove("border-red-500");
                    e.target.classList.add("border-green-500");
                }
            }
        }, true);
    }

    // Setup backdrop close functionality
    function setupBackdropClose() {
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('fixed') && e.target.classList.contains('inset-0')) {
                closeModal();
            }
        });
    }

    // Form Handlers
    async function handleLogin(e) {
        e.preventDefault();
        const form = e.target;

        const email = document.getElementById('loginEmail').value;
        const password = document.getElementById('loginPassword').value;

        if (!email || !password) {
            showError(form, "Email and password are required!");
            return;
        }

        if (!validateEmail(email)) {
            showError(form, "Please enter a valid email address!");
            return;
        }

        showLoader(form);

        try {
            const formData = getFormData(form);

            // Base64 encode credentials for security
            const busername = btoa(email);
            const bpass = btoa(password);

            const response = await fetch('login/login.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `busername=${encodeURIComponent(busername)}&bpass=${encodeURIComponent(bpass)}`
            });

            const data = await response.text();
            handleLoginResponse(data, busername);
        } catch (error) {
            showError(form, "Login failed. Please check your connection and try again.");
        } finally {
            hideLoader(form);
        }
    }

    async function handleSignup(e) {
        e.preventDefault();
        const form = e.target;

        const firstName = document.getElementById('signupFirstName').value;
        const lastName = document.getElementById('signupLastName').value;
        const email = document.getElementById('signupEmail').value;
        const phone = document.getElementById('signupPhone').value;
        const gender = document.getElementById('signupGender').value;
        const password = document.getElementById('signupPassword').value;
        const passwordConfirm = document.getElementById('signupConfirmPassword').value;
        const terms = document.getElementById('terms').checked;

        // Validation
        if (!firstName || !lastName || !email || !phone || !gender || !password || !passwordConfirm) {
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

        if (password !== passwordConfirm) {
            showError(form, "Passwords do not match!");
            return;
        }

        showLoader(form);

        try {
            const formData = new FormData(form);
            const response = await fetch('login/validate.php', {
                method: 'POST',
                body: formData
            });

            const data = await response.text();

            try {
                const decodedResponse = atob(data);
                if (decodedResponse.trim() === "This account exists") {
                    showError(form, "This account already exists!");
                } else {
                    document.getElementById('secret_key').value = data.trim();
                    showForm('loginForm');
                    showSuccessMessage("Account created successfully! Please check your email for verification.");
                }
            } catch (error) {
                showError(form, "Registration failed. Please try again.");
            }
        } catch (error) {
            showError(form, "Registration failed. Please try again.");
        } finally {
            hideLoader(form);
        }
    }

    async function handleForgotPassword(e) {
        e.preventDefault();
        const form = e.target;

        const email = document.getElementById('forgotEmail').value;

        if (!email) {
            showError(form, "Email is required!");
            return;
        }

        if (!validateEmail(email)) {
            showError(form, "Please enter a valid email address!");
            return;
        }

        showLoader(form);

        try {
            const formData = new FormData(form);
            const response = await fetch('login/recover.php', {
                method: 'POST',
                body: formData
            });

            const data = await response.text();

            try {
                const decodedResponse = atob(data);
                if (decodedResponse === "Email does not exist") {
                    showError(form, "Email does not exist in our system!");
                } else {
                    document.getElementById('secret_key').value = data.trim();
                    showSuccessMessage("Password reset instructions have been sent to your email!");
                    showForm('loginForm');
                }
            } catch (error) {
                showError(form, "Password reset failed. Please try again.");
            }
        } catch (error) {
            showError(form, "Password reset failed. Please try again.");
        } finally {
            hideLoader(form);
        }
    }

    async function handleResetPassword(e) {
        e.preventDefault();
        const form = e.target;

        const password = document.getElementById('resetNewPassword').value;
        const passwordConfirm = document.getElementById('resetConfirmPassword').value;

        if (!password || !passwordConfirm) {
            showError(form, "Both password fields are required!");
            return;
        }

        if (!validatePassword(password)) {
            showError(form, "Password must be at least 8 characters long!");
            return;
        }

        if (password !== passwordConfirm) {
            showError(form, "Passwords do not match!");
            return;
        }

        showLoader(form);

        try {
            const formData = new FormData(form);
            const response = await fetch('login/reset.php', {
                method: 'POST',
                body: formData
            });

            const data = await response.text();

            try {
                const decodedResponse = atob(data);
                if (decodedResponse === "success") {
                    showSuccessMessage("Password reset successfully! You can now login with your new password.");
                    showForm('loginForm');
                } else {
                    showError(form, decodedResponse);
                }
            } catch (error) {
                showError(form, "Password reset failed. Please try again.");
            }
        } catch (error) {
            showError(form, "Password reset failed. Please try again.");
        } finally {
            hideLoader(form);
        }
    }

    async function handleInvestorForm(e) {
        e.preventDefault();
        const form = e.target;

        // Basic validation
        const requiredFields = form.querySelectorAll('input[required], select[required]');
        let valid = true;

        requiredFields.forEach(field => {
            if (!field.value) {
                valid = false;
                field.classList.add('border-red-500');
            } else {
                field.classList.remove('border-red-500');
            }
        });

        if (!valid) {
            showError(form, "Please fill all required fields!");
            return;
        }

        showLoader(form);

        try {
            const formData = new FormData(form);
            const response = await fetch('submit_investor.php', {
                method: 'POST',
                body: formData
            });

            if (response.ok) {
                showSuccessMessage("Thank you for your interest! We will contact you shortly.");
                closeModal();
                form.reset();
            } else {
                showError(form, "Submission failed. Please try again.");
            }
        } catch (error) {
            showError(form, "Submission failed. Please try again.");
        } finally {
            hideLoader(form);
        }
    }

    // Handle login response
    function handleLoginResponse(response, username) {
        const trimmedResponse = response.trim();

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
                showError(document.getElementById("loginForm"), response);
                break;
            default:
                if (response) {
                    document.getElementById('secret_key').value = response.trim();
                    showSuccessMessage("Account verification required. Please check your email.");
                }
                break;
        }
    }

    // Redirect to dashboard
    async function redirectToDashboard(url, username) {
        try {
            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `model=${encodeURIComponent(username)}`
            });

            const data = await response.text();
            closeModal();

            // Handle dashboard redirection
            if (typeof updateMainContent === 'function') {
                updateMainContent(data);
            } else {
                window.location.href = 'dashboard.php';
            }
        } catch (error) {
            showError(document.getElementById("loginForm"), "Failed to redirect to dashboard. Please try again.");
        }
    }

    // Function to show reset password form with code
    function showResetPasswordForm(email, code) {
        document.getElementById('resetEmail').value = email;
        document.getElementById('resetCode').value = code;
        showForm('resetPasswordForm');
    }

    // Disable right-click context menu
    document.addEventListener("contextmenu", function (e) {
        e.preventDefault();
        return false;
    });

    // Initialize when document is ready
    document.addEventListener('DOMContentLoaded', function () {
        initApp();

        // Store original button text for all submit buttons
        document.querySelectorAll('button[type="submit"]').forEach(button => {
            button.dataset.originalText = button.innerHTML;
        });
    });

    // Escape key to close modal
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && activeModal) {
            closeModal();
        }
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
<script src="script.js"></script>