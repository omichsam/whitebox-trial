<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Huduma WhiteBox - Authentication</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#1e3a8a',
                        secondary: '#3b82f6',
                        accent: '#10b981',
                        dark: '#0f172a',
                        light: '#f8fafc'
                    }
                }
            }
        }
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .demo-button {
            background: white;
            color: #1e3a8a;
            padding: 16px 32px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 18px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .demo-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.25);
        }
        
        /* Modal Animation */
        @keyframes modal-fade-in {
            0% { opacity: 0; transform: scale(0.95); }
            100% { opacity: 1; transform: scale(1); }
        }
        
        .animate-modal-fade-in { 
            animation: modal-fade-in 0.3s ease forwards; 
        }
        
        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 10000;
        }
        
        .modal.active {
            display: block;
        }
        
        .modal-backdrop {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, 0.6);
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        .modal.active .modal-backdrop {
            opacity: 1;
        }
        
        .modal-dialog {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }
        
        .modal-content {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 420px;
            overflow: hidden;
            opacity: 0;
            transform: scale(0.95);
        }
        
        .modal.active .modal-content {
            opacity: 1;
            transform: scale(1);
            transition: all 0.3s;
        }
        
        .modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid #e5e7eb;
            background: linear-gradient(to right, #1e3a8a, #3b82f6);
            color: white;
        }
        
        .modal-title {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 1.1rem;
            font-weight: 700;
        }
        
        .modal-title-icon {
            width: 1.8rem;
            height: 1.8rem;
            border-radius: 0.5rem;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .modal-close {
            padding: 0.5rem;
            border-radius: 0.5rem;
            color: rgba(255, 255, 255, 0.8);
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .modal-close:hover {
            color: white;
            background: rgba(255, 255, 255, 0.1);
        }
        
        .modal-body {
            padding: 1.5rem;
            max-height: 70vh;
            overflow-y: auto;
        }
        
        .logo-container {
            display: flex;
            justify-content: center;
            margin-bottom: 1.25rem;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 700;
            font-size: 1.25rem;
            color: #1e3a8a;
        }
        
        .logo-icon {
            width: 2.5rem;
            height: 2.5rem;
            background: #1e3a8a;
            color: white;
            border-radius: 0.6rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .form-group {
            margin-bottom: 1rem;
        }
        
        .form-label {
            display: block;
            margin-bottom: 0.4rem;
            font-weight: 500;
            color: #374151;
            font-size: 0.9rem;
        }
        
        .form-input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            font-size: 0.95rem;
            transition: all 0.2s;
        }
        
        .form-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }
        
        .form-options {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.25rem;
            font-size: 0.85rem;
        }
        
        .form-check {
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }
        
        .form-link {
            color: #3b82f6;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.85rem;
        }
        
        .form-link:hover {
            text-decoration: underline;
        }
        
        .btn-primary {
            width: 100%;
            padding: 0.75rem;
            background: #3b82f6;
            color: white;
            border: none;
            border-radius: 0.5rem;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .btn-primary:hover {
            background: #2563eb;
        }
        
        .auth-switch {
            text-align: center;
            margin-top: 1.25rem;
            padding-top: 1.25rem;
            border-top: 1px solid #e5e7eb;
            color: #6b7280;
            font-size: 0.9rem;
        }
        
        .auth-link {
            color: #3b82f6;
            font-weight: 600;
            cursor: pointer;
        }
        
        .auth-link:hover {
            text-decoration: underline;
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.75rem;
        }
        
        .back-button {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            color: #3b82f6;
            background: none;
            border: none;
            cursor: pointer;
            font-size: 0.85rem;
            margin-bottom: 1rem;
            padding: 0;
        }
        
        .back-button:hover {
            text-decoration: underline;
        }
        
        /* Responsive adjustments */
        @media (max-width: 640px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .modal-content {
                max-width: 95%;
            }
            
            .modal-body {
                padding: 1.25rem;
            }
        }
    </style>
</head>
<body>
    <!-- Demo button to open the modal -->
    <button class="demo-button" onclick="openModal('loginModal')">
        Show Login Modal
    </button>

    <!-- Login Modal -->
    <div id="loginModal" class="modal" aria-hidden="true">
        <!-- Backdrop -->
        <div class="modal-backdrop" onclick="closeModal('loginModal')"></div>

        <!-- Dialog wrapper for centering -->
        <div class="modal-dialog">
            <!-- Dialog -->
            <div class="modal-content" role="dialog" aria-modal="true" aria-labelledby="loginModalTitle">
                <!-- Header -->
                <div class="modal-header">
                    <div class="modal-title">
                        <div class="modal-title-icon">
                            <i class="fas fa-user-lock"></i>
                        </div>
                        <h2 id="loginModalTitle">LOGIN HERE</h2>
                    </div>
                    <button class="modal-close" onclick="closeModal('loginModal')" aria-label="Close modal">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <!-- Body -->
                <div class="modal-body">
                    <button class="back-button" onclick="goBack()">
                        <i class="fas fa-arrow-left"></i> Back Home
                    </button>
                    
                    <div class="logo-container">
                        <div class="logo">
                            <div class="logo-icon">
                                <span>HWB</span>
                            </div>
                            <span>Huduma WhiteBox</span>
                        </div>
                    </div>
                    
                    <form id="loginForm">
                        <div class="form-group">
                            <label class="form-label" for="loginEmail">Email</label>
                            <input type="email" id="loginEmail" class="form-input" placeholder="Email" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="loginPassword">Password</label>
                            <input type="password" id="loginPassword" class="form-input" placeholder="Password" required>
                        </div>
                        
                        <div class="form-options">
                            <div class="form-check">
                                <input type="checkbox" id="remember">
                                <label for="remember">Remember me</label>
                            </div>
                            <a href="#" class="form-link" onclick="switchToReset(); return false;">Forgot Password?</a>
                        </div>
                        
                        <button type="submit" class="btn-primary">Login</button>
                    </form>
                    
                    <div class="auth-switch">
                        Don't have an account? <a class="auth-link" onclick="switchToSignup()">Sign Up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Signup Modal -->
    <div id="signupModal" class="modal" aria-hidden="true">
        <!-- Backdrop -->
        <div class="modal-backdrop" onclick="closeModal('signupModal')"></div>

        <!-- Dialog wrapper for centering -->
        <div class="modal-dialog">
            <!-- Dialog -->
            <div class="modal-content" role="dialog" aria-modal="true" aria-labelledby="signupModalTitle">
                <!-- Header -->
                <div class="modal-header">
                    <div class="modal-title">
                        <div class="modal-title-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <h2 id="signupModalTitle">SIGN UP HERE</h2>
                    </div>
                    <button class="modal-close" onclick="closeModal('signupModal')" aria-label="Close modal">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <!-- Body -->
                <div class="modal-body">
                    <button class="back-button" onclick="goBack()">
                        <i class="fas fa-arrow-left"></i> Back Home
                    </button>
                    
                    <div class="logo-container">
                        <div class="logo">
                            <div class="logo-icon">
                                <span>HWB</span>
                            </div>
                            <span>Huduma WhiteBox</span>
                        </div>
                    </div>
                    
                    <form id="signupForm">
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label" for="firstName">First Name</label>
                                <input type="text" id="firstName" class="form-input" placeholder="First Name" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="lastName">Last Name</label>
                                <input type="text" id="lastName" class="form-input" placeholder="Last Name" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="signupEmail">Email</label>
                            <input type="email" id="signupEmail" class="form-input" placeholder="Email" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="phone">Phone Number</label>
                            <input type="tel" id="phone" class="form-input" placeholder="Phone Number" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label" for="gender">Gender</label>
                            <select id="gender" class="form-input" required>
                                <option value="" disabled selected>Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label" for="signupPassword">Password</label>
                                <input type="password" id="signupPassword" class="form-input" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="confirmPassword">Confirm Password</label>
                                <input type="password" id="confirmPassword" class="form-input" placeholder="Confirm Password" required>
                            </div>
                        </div>
                        
                        <div class="form-check" style="margin-bottom: 1.25rem;">
                            <input type="checkbox" id="terms" required>
                            <label for="terms">I accept Terms and Conditions</label>
                        </div>
                        
                        <button type="submit" class="btn-primary">Create Account</button>
                    </form>
                    
                    <div class="auth-switch">
                        Already have an account? <a class="auth-link" onclick="switchToLogin()">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Reset Password Modal -->
    <div id="resetModal" class="modal" aria-hidden="true">
        <!-- Backdrop -->
        <div class="modal-backdrop" onclick="closeModal('resetModal')"></div>

        <!-- Dialog wrapper for centering -->
        <div class="modal-dialog">
            <!-- Dialog -->
            <div class="modal-content" role="dialog" aria-modal="true" aria-labelledby="resetModalTitle">
                <!-- Header -->
                <div class="modal-header">
                    <div class="modal-title">
                        <div class="modal-title-icon">
                            <i class="fas fa-key"></i>
                        </div>
                        <h2 id="resetModalTitle">RESET PASSWORD</h2>
                    </div>
                    <button class="modal-close" onclick="closeModal('resetModal')" aria-label="Close modal">
                        <i class="fas fa-times"></i>
                    </button>
                </div>

                <!-- Body -->
                <div class="modal-body">
                    <button class="back-button" onclick="goBack()">
                        <i class="fas fa-arrow-left"></i> Back Home
                    </button>
                    
                    <div class="logo-container">
                        <div class="logo">
                            <div class="logo-icon">
                                <span>HWB</span>
                            </div>
                            <span>Huduma WhiteBox</span>
                        </div>
                    </div>
                    
                    <form id="resetForm">
                        <div class="form-group">
                            <label class="form-label" for="resetEmail">Enter your Email</label>
                            <input type="email" id="resetEmail" class="form-input" placeholder="Email" required>
                        </div>
                        
                        <button type="submit" class="btn-primary">Send Reset Link</button>
                    </form>
                    
                    <div class="auth-switch">
                        Remember your password? <a class="auth-link" onclick="switchToLogin()">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Modal functionality
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        
        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }
        
        function switchToSignup() {
            closeModal('loginModal');
            setTimeout(() => openModal('signupModal'), 300);
        }
        
        function switchToLogin() {
            closeModal('signupModal');
            closeModal('resetModal');
            setTimeout(() => openModal('loginModal'), 300);
        }
        
        function switchToReset() {
            closeModal('loginModal');
            setTimeout(() => openModal('resetModal'), 300);
        }
        
        function goBack() {
            // This would typically redirect to your home page
            alert("Redirecting to home page...");
            closeModal('loginModal');
            closeModal('signupModal');
            closeModal('resetModal');
        }
        
        // Close modal with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const modals = document.querySelectorAll('.modal.active');
                if (modals.length > 0) {
                    closeModal(modals[0].id);
                }
            }
        });
        
        // Form submission
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Add your login logic here
            alert('Login functionality would be implemented here');
        });
        
        document.getElementById('signupForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Add your signup logic here
            alert('Signup functionality would be implemented here');
        });
        
        document.getElementById('resetForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Add your reset password logic here
            alert('Password reset functionality would be implemented here');
        });
    </script>
</body>
</html>