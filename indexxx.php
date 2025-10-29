<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WhiteBox - Authentication</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #4361ee;
            --primary-dark: #3a56d4;
            --secondary: #7209b7;
            --light: #f8f9fa;
            --dark: #212529;
            --gray: #6c757d;
            --gray-light: #e9ecef;
            --success: #4bb543;
            --danger: #dc3545;
            --warning: #ffc107;
            --border-radius: 12px;
            --box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            color: var(--dark);
            line-height: 1.6;
        }

        .container {
            width: 100%;
            max-width: 450px;
            margin: 0 auto;
        }

        .auth-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
            transition: var(--transition);
        }

        .auth-card:hover {
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
        }

        .card-header {
            background: linear-gradient(to right, var(--primary), var(--secondary));
            color: white;
            padding: 25px 30px;
            position: relative;
        }

        .back-home {
            color: white;
            text-decoration: none;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 15px;
            transition: var(--transition);
            opacity: 0.9;
        }

        .back-home:hover {
            opacity: 1;
            transform: translateX(-3px);
        }

        .card-header h2 {
            font-size: 24px;
            font-weight: 600;
            margin: 0;
        }

        .card-body {
            padding: 30px;
        }

        .card-footer {
            padding: 20px 30px;
            background-color: var(--gray-light);
            text-align: center;
            font-size: 14px;
            color: var(--gray);
        }

        .card-footer a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        .card-footer a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--dark);
        }

        .form-control {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid var(--gray-light);
            border-radius: 8px;
            font-size: 15px;
            transition: var(--transition);
            background-color: white;
        }

        .form-control:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
        }

        .password-field {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--gray);
            transition: var(--transition);
        }

        .password-toggle:hover {
            color: var(--primary);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 14px 20px;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            width: 100%;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
        }

        .btn-outline {
            background-color: transparent;
            border: 2px solid var(--primary);
            color: var(--primary);
        }

        .btn-outline:hover {
            background-color: var(--primary);
            color: white;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }

        .col-md-6 {
            flex: 0 0 50%;
            padding: 0 10px;
        }

        .checkbox-container {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 20px;
        }

        .checkbox-container input[type="checkbox"] {
            margin-top: 5px;
            accent-color: var(--primary);
        }

        .checkbox-container label {
            margin-bottom: 0;
            font-size: 14px;
        }

        .checkbox-container a {
            color: var(--primary);
            text-decoration: none;
        }

        .checkbox-container a:hover {
            text-decoration: underline;
        }

        .password-strength {
            margin-top: 10px;
        }

        .strength-meter {
            height: 6px;
            border-radius: 3px;
            background-color: var(--gray-light);
            margin-bottom: 8px;
            overflow: hidden;
        }

        .strength-meter-fill {
            height: 100%;
            width: 0%;
            transition: var(--transition);
        }

        .strength-text {
            font-size: 13px;
            color: var(--gray);
        }

        .error-message {
            color: var(--danger);
            font-size: 14px;
            margin-top: 10px;
            padding: 10px 15px;
            background-color: rgba(220, 53, 69, 0.08);
            border-radius: 8px;
            border-left: 4px solid var(--danger);
            display: none;
        }

        .success-message {
            color: var(--success);
            font-size: 14px;
            margin-top: 10px;
            padding: 10px 15px;
            background-color: rgba(75, 181, 67, 0.08);
            border-radius: 8px;
            border-left: 4px solid var(--success);
            display: none;
        }

        .not_shown {
            display: none;
        }

        .animation {
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .required {
            color: var(--danger);
        }

        .divider {
            display: flex;
            align-items: center;
            margin: 20px 0;
        }

        .divider::before, .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background-color: var(--gray-light);
        }

        .divider span {
            padding: 0 15px;
            color: var(--gray);
            font-size: 14px;
        }

        .splashinputs {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid var(--gray-light);
            border-radius: 8px;
            font-size: 15px;
            transition: var(--transition);
            background-color: white;
        }

        .splashinputs:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
        }

        /* Responsive adjustments */
        @media (max-width: 576px) {
            .col-md-6 {
                flex: 0 0 100%;
            }
            
            .card-body {
                padding: 20px;
            }
            
            .card-header, .card-footer {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="auth-card">
            <!-- Login Section -->
            <div class="logins" id="login_page">
                <div class="card-header">
                    <a class="back-home" href="index.php">
                        <i class="fas fa-arrow-left"></i> Back Home
                    </a>
                    <h2>LOGIN HERE</h2>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <button class="btn btn-outline" id="open_elerning">
                            <i class="fas fa-graduation-cap"></i> Sign-up to e-learning
                        </button>
                    </div>

                    <div class="divider">
                        <span>or</span>
                    </div>

                    <div id="notific"></div>
                    <form class="omb_loginForm bv-form" autocomplete="off" method="POST" novalidate="novalidate">
                        <div class="form-group">
                            <label for="username">Email</label>
                            <input type="email" id="username" class="form-control" name="email"
                                placeholder="Enter your email" required>
                        </div>
                        <div class="form-group password-field">
                            <label for="password-field">Password</label>
                            <input id="password-field" type="password" class="form-control"
                                placeholder="Enter your password" name="password" required>
                            <span class="password-toggle" id="togglePassword">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                        <button type="button" class="btn btn-primary" id="login_btn">
                            <i class="fas fa-sign-in-alt"></i> Login to WhiteBox
                        </button>
                    </form>
                    <div class="error-message" id="error_data"></div>
                </div>
                <div class="card-footer">
                    <a class="resete_pass" id="forgot_pwd_title" style="cursor: pointer;">
                        <i class="fas fa-key"></i> Forgot Password?
                    </a>
                    <div style="margin-top: 10px;">Don't have an account?
                        <a id="back_toregister" style="cursor:pointer"><strong> Sign Up</strong></a>
                    </div>
                </div>
            </div>

            <!-- Password Reset Section -->
            <div class="animation not_shown logins" id="pass_resetpage">
                <div class="card-header">
                    <a class="back-home" href="index.php">
                        <i class="fas fa-arrow-left"></i> Back Home
                    </a>
                    <h2>RESET PASSWORD</h2>
                </div>

                <div class="card-body">
                    <div class="recover_dives" id="rec_ver">
                        <p>Enter your email to reset your password</p>
                        <form id="recover_form" class="omb_loginForm bv-form" autocomplete="off" method="POST"
                            novalidate="novalidate">
                            <div class="form-group">
                                <label for="remail">Email</label>
                                <input type="email" class="form-control email" id="remail" name="remail"
                                    placeholder="Enter your email" required>
                            </div>
                            <button type="button" id="recover_now" class="btn btn-primary">
                                <i class="fas fa-redo"></i> Reset Your Password
                            </button>
                        </form>
                        <div class="error-message" id="recovery_error"></div>
                    </div>

                    <div class="not_shown recover_dives" id="new_pass">
                        <p>Check your email for confirmation key</p>
                        <form id="recovernew_form" class="omb_loginForm bv-form" autocomplete="off" method="POST"
                            novalidate="novalidate">
                            <div class="form-group">
                                <label for="code">Confirmation Key</label>
                                <input type="text" class="form-control email" id="code" name="code"
                                    placeholder="Enter confirmation key" required>
                            </div>
                            <button type="button" id="confirm_now" class="btn btn-primary">
                                <i class="fas fa-check"></i> Confirm Code
                            </button>
                        </form>
                        <div class="error-message" id="confirm_error"></div>
                    </div>

                    <div class="not_shown recover_dives" id="newnow_pass">
                        <p>Create new password</p>
                        <form id="new_passset" class="omb_loginForm bv-form" autocomplete="off" method="POST"
                            novalidate="novalidate">
                            <input name="emailsets" id="emailsets" type="hidden" value="">
                            <div class="form-group password-field">
                                <label for="password_n">New Password</label>
                                <input type="password" class="form-control email" id="password_n" name="password_n"
                                    placeholder="New Password" required>
                                <span class="password-toggle" id="toggleNewPassword">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                            <div class="form-group password-field">
                                <label for="new_passworn">Confirm Password</label>
                                <input type="password" class="form-control email" id="new_passworn"
                                    name="new_passworn" placeholder="Repeat Password" required>
                                <span class="password-toggle" id="toggleConfirmPassword">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                            <button type="button" id="create_newpass" class="btn btn-primary">
                                <i class="fas fa-save"></i> Save Password
                            </button>
                        </form>
                        <div class="error-message" id="createerror"></div>
                    </div>
                </div>
                <div class="card-footer">
                    Back to login page? <a id="backlogins" style="cursor: pointer;">Click here</a>
                </div>
            </div>

            <!-- Registration Section -->
            <div class="animation not_shown logins" id="register_page">
                <div class="card-header">
                    <a class="back-home" href="index.php">
                        <i class="fas fa-arrow-left"></i> Back Home
                    </a>
                    <h2>SIGN UP</h2>
                </div>
                <div class="card-body">
                    <div id="notific"> </div>
                    <form method="POST" id="reg_form" novalidate="novalidate" class="bv-form">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="first_name">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name"
                                    placeholder="First Name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="last_name">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name"
                                    placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="Email">Email</label>
                                <input type="email" class="form-control" id="Email" name="email" placeholder="Email"
                                    required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone" maxlength="13"
                                    placeholder="Phone Number" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="form-group password-field">
                            <label for="newpassword">Password</label>
                            <input type="password" class="form-control" id="newpassword" name="newpassword"
                                placeholder="Password" required>
                            <span class="password-toggle" id="toggleRegPassword">
                                <i class="fas fa-eye"></i>
                            </span>
                            <div class="password-strength">
                                <div class="strength-meter">
                                    <div class="strength-meter-fill" id="strengthmeter"></div>
                                </div>
                                <div class="strength-text">
                                    Password strength: <span id="str_stregnth">None</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group password-field">
                            <label for="password_confirm">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirm"
                                name="password_confirm" placeholder="Confirm Password" required>
                            <span class="password-toggle" id="toggleRegConfirmPassword">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                        <div class="checkbox-container">
                            <input required checked class="pancityd" id="termsabd" name="termsa" type="checkbox">
                            <label for="termsabd">I accept <a href="#modal">Terms and Conditions</a></label>
                        </div>
                        <button type="button" class="btn btn-primary" id="SubmitButton">
                            <i class="fas fa-user-plus"></i> Sign Up
                        </button>
                    </form>
                    <div class="error-message" id="sign_uperror"></div>
                </div>
                <div class="card-footer">
                    <div>Already have an account? <a style="cursor:pointer;" id="back_tologin">Log In</a></div>
                </div>
            </div>

            <!-- E-learning Section -->
            <div class="animation not_shown logins" id="elearning_page">
                <div class="card-header">
                    <a class="back-home" href="index.php">
                        <i class="fas fa-arrow-left"></i> Back Home
                    </a>
                    <h2>E-LEARNING SIGN UP</h2>
                </div>
                <div class="card-body">
                    <div id="notific"> </div>
                    <form method="POST" id="commentForm" novalidate="novalidate" class="bv-form">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="fname">First Name <span class="required">*</span></label>
                                <input type="text" name="fname" id="fname" class="splashinputs" minlength="3"
                                    maxlength="100" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="sname">Last Name <span class="required">*</span></label>
                                <input type="text" name="sname" id="sname" class="splashinputs" minlength="3"
                                    maxlength="100" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="genderb">Gender <span class="required">*</span></label>
                                <select class="splashinputs" name="genderb" id="genderb" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="DateOfBirth">Date of Birth <span class="required">*</span></label>
                                <input type="date" name="DateOfBirth" id="DateOfBirth" class="splashinputs"
                                    required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="emaile">Your Email <span class="required">*</span></label>
                                <input type="email" name="emaile" id="emaile" class="splashinputs" minlength="3"
                                    maxlength="100" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phoneb">Phone No <span class="required">*</span></label>
                                <input type="text" name="phoneb" id="phoneb" class="splashinputs" minlength="10"
                                    maxlength="13" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6 password-field">
                                <label for="passwordw1">Password <span class="required">*</span></label>
                                <input type="password" name="passwordw1" id="passwordw1" class="splashinputs"
                                    minlength="3" maxlength="100" required>
                                <span class="password-toggle" id="toggleElearningPassword">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                            <div class="form-group col-md-6 password-field">
                                <label for="passwordw2">Repeat Password <span class="required">*</span></label>
                                <input type="password" name="passwordw2" id="passwordw2" class="splashinputs"
                                    minlength="3" maxlength="100" required>
                                <span class="password-toggle" id="toggleElearningConfirmPassword">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                        </div>
                        <div class="checkbox-container">
                            <input type="checkbox" checked id="termsbs" value="termsbs" name="termsbs"
                                class="pancityd" role="termsbs" required>
                            <label for="termsbs">I agree to the terms and conditions <span
                                    class="required">*</span></label>
                        </div>
                        <button type="button" class="btn btn-primary" id="Submitelerning">
                            <i class="fas fa-graduation-cap"></i> Sign Up
                        </button>
                    </form>
                    <div class="error-message" id="errorreport"></div>
                </div>
                <div class="card-footer">
                    <div>Already have an account? <a style="cursor:pointer;"
                            onclick='$("#back_tologin").click()'>Log
                            In</a></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Password visibility toggle
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle password visibility
            const togglePasswordButtons = document.querySelectorAll('.password-toggle');
            
            togglePasswordButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const input = this.parentElement.querySelector('input');
                    const icon = this.querySelector('i');
                    
                    if (input.type === 'password') {
                        input.type = 'text';
                        icon.classList.remove('fa-eye');
                        icon.classList.add('fa-eye-slash');
                    } else {
                        input.type = 'password';
                        icon.classList.remove('fa-eye-slash');
                        icon.classList.add('fa-eye');
                    }
                });
            });
            
            // Password strength indicator
            const passwordInput = document.getElementById('newpassword');
            if (passwordInput) {
                passwordInput.addEventListener('input', function() {
                    const strengthMeter = document.getElementById('strengthmeter');
                    const strengthText = document.getElementById('str_stregnth');
                    const password = this.value;
                    
                    let strength = 0;
                    let feedback = '';
                    
                    if (password.length >= 8) strength++;
                    if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength++;
                    if (/\d/.test(password)) strength++;
                    if (/[^a-zA-Z\d]/.test(password)) strength++;
                    
                    // Update strength meter
                    const strengthPercent = strength * 25;
                    strengthMeter.style.width = `${strengthPercent}%`;
                    
                    // Update colors and text
                    if (strengthPercent <= 25) {
                        strengthMeter.style.backgroundColor = '#dc3545';
                        feedback = 'Weak';
                    } else if (strengthPercent <= 50) {
                        strengthMeter.style.backgroundColor = '#ffc107';
                        feedback = 'Fair';
                    } else if (strengthPercent <= 75) {
                        strengthMeter.style.backgroundColor = '#17a2b8';
                        feedback = 'Good';
                    } else {
                        strengthMeter.style.backgroundColor = '#28a745';
                        feedback = 'Strong';
                    }
                    
                    strengthText.textContent = feedback;
                });
            }
            
            // Page navigation
            document.getElementById('back_toregister').addEventListener('click', function() {
                showPage('register_page');
            });
            
            document.getElementById('back_tologin').addEventListener('click', function() {
                showPage('login_page');
            });
            
            document.getElementById('forgot_pwd_title').addEventListener('click', function() {
                showPage('pass_resetpage');
            });
            
            document.getElementById('backlogins').addEventListener('click', function() {
                showPage('login_page');
            });
            
            document.getElementById('open_elerning').addEventListener('click', function() {
                showPage('elearning_page');
            });
            
            function showPage(pageId) {
                // Hide all pages
                document.querySelectorAll('.logins').forEach(page => {
                    page.classList.add('not_shown');
                });
                
                // Show selected page
                document.getElementById(pageId).classList.remove('not_shown');
            }
        });
    </script>
</body>
</html>