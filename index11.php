<?php
session_start();
?>
<!DOCTYPE html>

<?php
$id = "";
$datab = "not_shown";

if (isset($_SESSION["id"])) {
    $loginuser = $_SESSION["username"];
    $user = base64_decode($loginuser);

    include("connect.php");
    $user_not = "";

    $checkExist = mysqli_query($con, "SELECT * FROM users WHERE email='$user'") or die(mysqli_error($con));

    if (mysqli_num_rows($checkExist) != 0) {
        $user_not = "dashboard";
    } else {
        $_SESSION = array();
        session_destroy();
        ?>
        <script type="text/javascript">
            location.replace("index.php");
        </script>
        <?php
    }
} else {
    $datab = "";
}
?>

<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WhiteBox - Login & Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --primary: #4361ee;
            --primary-dark: #3a56d4;
            --secondary: #7209b7;
            --success: #058d27ca;
            --success-dark: #014608ff;
            --light: #f8f9fa;
            --dark: #212529;
            --gray: #6c757d;
            --danger: #a91616ff;
            --card-shadow: 0 15px 35px rgba(50, 50, 93, 0.1), 0 5px 15px rgba(0, 0, 0, 0.07);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #085c02ff 0%, #861616a0 100%);
            min-height: 100vh;
            /* display: flex; */
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        /* 
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: auto;
            / * background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><polygon fill="%23ffffff" fill-opacity="0.05" points="0,1000 1000,0 1000,1000"/></svg>'); * /
            background: url('sources/images/slider/image1.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-blend-mode: darken;
            / * blends overlay + image * /
            /  * sources/images/slider/image5.jpg background-size: cover; * /
            z-index: -2;
        } */
        /* Background Image */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('sources/images/slider/image5.jpg') center/cover no-repeat;
            z-index: -2;
            /* very far behind */
        }

        /* Dark Overlay */
        body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(68, 115, 61, 0.55);
            /* darkness level */
            z-index: -1;
            /* sits above image, below everything else */
        }

        .auth-space {
            width: 100%;
            max-width: 450px;
            margin: 0 auto;
            animation: fadeIn 0.8s ease;
        }

        .auth-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: var(--card-shadow);
            padding: 40px 35px;
            width: 100%;
            transition: var(--transition);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .auth-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(50, 50, 93, 0.15), 0 7px 20px rgba(0, 0, 0, 0.1);
        }

        .card-headera {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.08);
            position: relative;
        }

        .card-headera::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: var(--primary);
            border-radius: 3px;
        }

        .card-headera h2 {
            color: var(--dark);
            font-weight: 600;
            margin-top: 5px;
            font-size: 1.8rem;
        }

        .logo {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            background: var(--primary);
            border-radius: 50%;
            margin-bottom: 15px;
            box-shadow: 0 5px 15px rgba(2, 205, 19, 0.3);
        }

        .logo i {
            color: white;
            font-size: 1.5rem;
        }

        .header-flex {
            display: flex;
            justify-content: space-between;
            /* pushes items to far left and right */
            align-items: center;
            /* vertically centers them */
            width: 100%;
        }

        .logo_position {
            height: 100;
            /* width: 100px; */
            /* adjust as needed */
        }

        .back-home {
            display: inline-flex;
            align-items: center;
            color: var(--gray);
            text-decoration: none;
            font-size: 14px;
            margin-bottom: 10px;
            transition: var(--transition);
        }

        .back-home:hover {
            color: var(--primary);
            transform: translateX(-3px);
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--dark);
            font-size: 1.5rem;
        }

        .form-control {
            width: 100%;
            padding: 15px 45px 15px 15px;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            font-size: 16px;
            transition: var(--transition);
            background: white;
            font-family: 'Poppins', sans-serif;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(1, 184, 22, 0.6);
            outline: none;
        }

        .input-icon {
            position: absolute;
            right: 15px;
            top: 42px;
            color: var(--gray);
            font-size: 1.5rem;
        }

        .password-field-container {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 42px;
            cursor: pointer;
            color: var(--gray);
            transition: var(--transition);
            z-index: 2;
        }

        .password-toggle:hover {
            color: var(--primary);
        }

        .btn {
            display: block;
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 20px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            text-align: center;
            font-family: 'Poppins', sans-serif;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: 0.5s;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-success {
            background: var(--success);
            color: white;
            box-shadow: 0 4px 15px rgba(116, 115, 114, 0.6);
            transition: var(--transition);
        }

        .btn-success:hover {
            background: var(--success-dark);
            box-shadow: 0 6px 20px rgba(47, 46, 46, 0.95);
            transform: translateY(-2px);
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--success);
            color: var(--success);
        }

        .btn-outline:hover {
            background: var(--success);
            color: white;
        }

        .card-footera {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid rgba(0, 0, 0, 0.08);
            font-size: 14px;
            color: var(--gray);
        }

        .card-footera a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
        }

        .card-footera a:hover {
            text-decoration: underline;
            color: var(--primary-dark);
        }

        .error-message {
            color: var(--danger);
            font-size: 14px;
            margin-top: 10px;
            text-align: center;
            padding: 10px;
            background: rgba(230, 57, 70, 0.1);
            border-radius: 8px;
            border-left: 4px solid var(--danger);
        }

        .success-message {
            color: #28a745;
            font-size: 14px;
            margin-top: 10px;
            text-align: center;
            padding: 10px;
            background: rgba(40, 167, 69, 0.1);
            border-radius: 8px;
            border-left: 4px solid #28a745;
        }

        .checkbox-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .checkbox-container input {
            margin-right: 10px;
            width: 18px;
            height: 18px;
            accent-color: var(--primary);
        }

        .password-strength {
            margin-top: 8px;
        }

        .strength-meter {
            height: 6px;
            border-radius: 3px;
            margin-bottom: 5px;
            transition: var(--transition);
            background: #e9ecef;
            overflow: hidden;
        }

        .strength-meter-fill {
            height: 100%;
            width: 0%;
            transition: var(--transition);
            border-radius: 3px;
        }

        .strength-text {
            font-size: 12px;
            color: var(--gray);
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }

        .col-md-6 {
            flex: 0 0 50%;
            max-width: 50%;
            padding: 0 10px;
        }

        /* Animation classes */
        .animation {
            animation: slideUp 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .not_shown {
            display: none;
        }

        /* Loader */
        #loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        }

        #loaderimg {
            width: 80px;
            height: 80px;
        }

        /* Responsive adjustments */
        @media all and (max-width: 768px) {
            .mobile_hidden {
                display: none !important;
            }

            .col-md-6 {
                flex: 0 0 100%;
                max-width: 100%;
            }

            .auth-card {
                padding: 30px 25px;
            }

            body {
                padding: 15px;
            }

            .card-headera h2 {
                font-size: 1.6rem;
            }
        }

        @media all and (min-width: 768px) {
            .desktop_hidden {
                display: none !important;
            }
        }

        @media all and (max-width: 480px) {
            .auth-card {
                padding: 25px 20px;
            }

            .card-headera h2 {
                font-size: 1.5rem;
            }

            .logo {
                width: 50px;
                height: 50px;
            }

            .logo i {
                font-size: 1.3rem;
            }
        }

        /* Password strength colors */
        .strength-weak .strength-meter-fill {
            background: var(--danger);
            width: 33%;
        }

        .strength-medium .strength-meter-fill {
            background: #ffc107;
            width: 66%;
        }

        .strength-strong .strength-meter-fill {
            background: #28a745;
            width: 100%;
        }

        .tabs {
            display: flex;
            margin-bottom: 25px;
            border-radius: 10px;
            overflow: hidden;
            background: #f1f3f5;
            padding: 5px;
        }

        .tab {
            flex: 1;
            text-align: center;
            padding: 12px;
            cursor: pointer;
            transition: var(--transition);
            border-radius: 8px;
            font-weight: 500;
        }

        .tab.active {
            background: var(--danger);
            color: white;
            box-shadow: 0 2px 10px rgba(188, 5, 5, 1);
        }
    </style>
    <?php include('links.php'); ?>
</head>

<body>
    <input type="hidden" class="splashinputs" id="user_email">
    <div class="containerfluid- no_padding not_shown" id="home_pagedata"></div>

    <div class="auth-container" id="landing_page">
        <div class="auth-space">
            <!-- Login Section -->
            <div class="auth-card" id="login_page">
                <div class="card-headera">
                    <div class="header-flex">
                        <a class="back-home start" href="index.php">
                            <i class="fas fa-arrow-left"></i> Back Home
                        </a>

                        <div class="end">
                            <img src="Huduma_WhiteBox/Whitebox.png" alt="logo" class="logo_position">
                        </div>
                    </div>

                    <h2>Welcome Back</h2>
                    <p class="text-muted">Sign in to your WhiteBox account</p>
                </div>
                <div class="card-body">
                    <div id="notific"></div>
                    <form class="omb_loginForm bv-form" autocomplete="off" method="POST" novalidate="novalidate">
                        <div class="form-group">
                            <label for="username" class="">Email Address</label>
                            <input type="email" id="username" class="form-control" name="email"
                                placeholder="Enter your email" required>
                            <i class="fas fa-envelope input-icon"></i>
                        </div>
                        <div class="form-group password-field-container">
                            <label for="password-field">Password</label>
                            <input id="password-field" type="password" class="form-control"
                                placeholder="Enter your password" name="password" required>
                            <!-- <i class="fas fa-lock input-icon"></i> -->
                            <span class="password-toggle" id="togglePassword">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                        <div class="form-group" style="text-align: right; margin-bottom: 25px;">
                            <a class="resete_pass" id="forgot_pwd_title"
                                style="cursor: pointer; color: var(--primary); text-decoration: none;">
                                Forgot Password?
                            </a>
                        </div>
                        <button type="button" class="btn btn-success pt-3" id="login_btn">
                            <i class="fas fa-sign-in-alt"></i> Sign In
                        </button>
                    </form>
                    <div class="error-message" id="error_data"></div>
                </div>
                <div class="card-footera">
                    Don't have an account?
                    <a id="back_toregister" style="cursor:pointer; font-weight: 600;">Create Account</a>
                </div>
            </div>

            <!-- Password Reset Section -->
            <div class="animation not_shown auth-card" id="pass_resetpage">
                <div class="card-headera">

                    <div class="header-flex">
                        <a class="back-home start" href="index.php">
                            <i class="fas fa-arrow-left"></i> Back Home
                        </a>

                        <div class="end">
                            <img src="Huduma_WhiteBox/Whitebox.png" alt="logo" class="logo_position">
                        </div>
                    </div>

                    <h2>Reset Password</h2>
                    <p class="text-muted">Recover your account</p>
                </div>

                <div class="card-body">
                    <div class="recover_dives" id="rec_ver">
                        <p style="text-align: center; margin-bottom: 20px; color: var(--gray);">Enter your email to
                            reset
                            your password</p>
                        <form id="recover_form" class="omb_loginForm bv-form" autocomplete="off" method="POST"
                            novalidate="novalidate">
                            <div class="form-group">
                                <label for="remail">Email Address</label>
                                <input type="email" class="form-control email" id="remail" name="remail"
                                    placeholder="Enter your email" required>
                                <i class="fas fa-envelope input-icon"></i>
                            </div>
                            <button type="button" id="recover_now" class="btn btn-success py-3">
                                <i class="fas fa-redo"></i> Reset Password
                            </button>
                        </form>
                        <div class="error-message" id="recovery_error"></div>
                    </div>

                    <div class="not_shown recover_dives" id="new_pass">
                        <p style="text-align: center; margin-bottom: 20px; color: var(--gray);">Check your email for
                            confirmation code</p>
                        <form id="recovernew_form" class="omb_loginForm bv-form" autocomplete="off" method="POST"
                            novalidate="novalidate">
                            <div class="form-group">
                                <label for="code">Confirmation Code</label>
                                <input type="text" class="form-control email" id="code" name="code"
                                    placeholder="Enter confirmation code" required>
                                <i class="fas fa-key input-icon"></i>
                            </div>
                            <button type="button" id="confirm_now" class="btn btn-success py-3">
                                <i class="fas fa-check"></i> Verify Code
                            </button>
                        </form>
                        <div class="error-message" id="confirm_error"></div>
                    </div>

                    <div class="not_shown recover_dives" id="newnow_pass">
                        <p style="text-align: center; margin-bottom: 20px; color: var(--gray);">Create your new password
                        </p>
                        <form id="new_passset" class="omb_loginForm bv-form" autocomplete="off" method="POST"
                            novalidate="novalidate">
                            <input name="emailsets" id="emailsets" type="hidden" value="">
                            <div class="form-group password-field-container">
                                <label for="password_n">New Password</label>
                                <input type="password" class="form-control email" id="password_n" name="password_n"
                                    placeholder="New Password" required>
                                <!-- <i class="fas fa-lock input-icon"></i> -->
                                <span class="password-toggle" id="toggleNewPassword">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                            <div class="form-group password-field-container">
                                <label for="new_passworn">Confirm Password</label>
                                <input type="password" class="form-control email" id="new_passworn" name="new_passworn"
                                    placeholder="Repeat Password" required>
                                <!-- <i class="fas fa-lock input-icon"></i> -->
                                <span class="password-toggle" id="toggleConfirmPassword">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                            <button type="button" id="create_newpass" class="btn btn-success py-3">
                                <i class="fas fa-save"></i> Update Password
                            </button>
                        </form>
                        <div class="error-message" id="createerror"></div>
                    </div>
                </div>
                <div class="card-footera">
                    Back to login? <a id="backlogins" style="cursor: pointer;">Sign In</a>
                </div>
            </div>

            <!-- Registration Section -->
            <div class="animation not_shown auth-card" id="register_page">
                <div class="card-headera">

                    <div class="header-flex">
                        <a class="back-home start" href="index.php">
                            <i class="fas fa-arrow-left"></i> Back Home
                        </a>

                        <div class="end">
                            <img src="Huduma_WhiteBox/Whitebox.png" alt="logo" class="logo_position">
                        </div>
                    </div>

                    <h2>Create Account</h2>
                    <p class="text-muted">Join WhiteBox today</p>
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
                                <label for="Email">Email Address</label>
                                <input type="email" class="form-control" id="Email" name="email" placeholder="Email"
                                    required>
                                <i class="fas fa-envelope input-icon"></i>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" name="phone" maxlength="13"
                                    placeholder="Phone Number" required>
                                <i class="fas fa-phone input-icon"></i>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <i class="fas fa-venus-mars input-icon"></i>
                        </div>
                        <div class="form-group password-field-container">
                            <label for="newpassword">Password</label>
                            <input type="password" class="form-control" id="newpassword" name="newpassword"
                                placeholder="Password" required>
                            <!-- <i class="fas fa-lock input-icon"></i> -->
                            <span class="password-toggle" id="toggleRegPassword">
                                <i class="fas fa-eye"></i>
                            </span>
                            <div class="password-strength">
                                <div class="strength-meter">
                                    <div class="strength-meter-fill"></div>
                                </div>
                                <div class="strength-text">
                                    Password strength: <span id="str_stregnth">None</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group password-field-container">
                            <label for="password_confirm">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirm" name="password_confirm"
                                placeholder="Confirm Password" required>
                            <!-- <i class="fas fa-lock input-icon"></i> -->
                            <span class="password-toggle" id="toggleRegConfirmPassword">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                        <div class="checkbox-container">
                            <input required checked class="pancityd" id="termsabd" name="termsa" type="checkbox">
                            <label for="termsabd">I accept <a href="#modal" style="color: var(--primary);">Terms and
                                    Conditions</a></label>
                        </div>
                        <button type="button" class="btn btn-success py-3" id="SubmitButton">
                            <i class="fas fa-user-plus"></i> Create Account
                        </button>
                    </form>
                    <div class="error-message" id="sign_uperror"></div>
                </div>
                <div class="card-footera">
                    Already have an account? <a style="cursor:pointer;" id="back_tologin">Sign In</a>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="col-sm-12 col-xs-12 not_shown" id="loader">
        <img src="Huduma_WhiteBox/images/loader1.gif" id="loaderimg">
    </div> -->

    <input type="hidden" class="splashinputs" id="secret_key">

    <script>
        // Password toggle functionality
        document.addEventListener('DOMContentLoaded', function () {
            // Toggle password visibility
            function setupPasswordToggle(toggleId, passwordId) {
                const toggle = document.getElementById(toggleId);
                const password = document.getElementById(passwordId);

                if (toggle && password) {
                    toggle.addEventListener('click', function () {
                        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                        password.setAttribute('type', type);
                        this.querySelector('i').classList.toggle('fa-eye');
                        this.querySelector('i').classList.toggle('fa-eye-slash');
                    });
                }
            }

            // Set up all password toggles
            setupPasswordToggle('togglePassword', 'password-field');
            setupPasswordToggle('toggleNewPassword', 'password_n');
            setupPasswordToggle('toggleConfirmPassword', 'new_passworn');
            setupPasswordToggle('toggleRegPassword', 'newpassword');
            setupPasswordToggle('toggleRegConfirmPassword', 'password_confirm');

            // Page navigation
            document.getElementById('back_toregister')?.addEventListener('click', function () {
                showPage('register_page');
            });

            document.getElementById('back_tologin')?.addEventListener('click', function () {
                showPage('login_page');
            });

            document.getElementById('forgot_pwd_title')?.addEventListener('click', function () {
                showPage('pass_resetpage');
            });

            document.getElementById('backlogins')?.addEventListener('click', function () {
                showPage('login_page');
            });

            function showPage(pageId) {
                // Hide all pages
                const pages = document.querySelectorAll('.auth-card');
                pages.forEach(page => {
                    page.classList.add('not_shown');
                    page.classList.remove('animation');
                });

                // Show the selected page
                const targetPage = document.getElementById(pageId);
                if (targetPage) {
                    targetPage.classList.remove('not_shown');
                    setTimeout(() => {
                        targetPage.classList.add('animation');
                    }, 10);
                }
            }

            // Password strength indicator
            const passwordInput = document.getElementById('newpassword');
            const strengthMeter = document.querySelector('.strength-meter');
            const strengthText = document.getElementById('str_stregnth');
            const strengthFill = document.querySelector('.strength-meter-fill');

            if (passwordInput) {
                passwordInput.addEventListener('input', function () {
                    const password = this.value;
                    let strength = 0;

                    // Check password length
                    if (password.length >= 8) strength += 25;

                    // Check for lowercase letters
                    if (/[a-z]/.test(password)) strength += 25;

                    // Check for uppercase letters
                    if (/[A-Z]/.test(password)) strength += 25;

                    // Check for numbers and special characters
                    if (/[0-9]/.test(password)) strength += 15;
                    if (/[^A-Za-z0-9]/.test(password)) strength += 10;

                    // Update strength meter
                    strengthFill.style.width = `${strength}%`;

                    // Update text and color
                    if (strength < 40) {
                        strengthText.textContent = 'Weak';
                        strengthMeter.className = 'strength-meter strength-weak';
                    } else if (strength < 70) {
                        strengthText.textContent = 'Medium';
                        strengthMeter.className = 'strength-meter strength-medium';
                    } else {
                        strengthText.textContent = 'Strong';
                        strengthMeter.className = 'strength-meter strength-strong';
                    }

                    if (password.length === 0) {
                        strengthText.textContent = 'None';
                        strengthFill.style.width = '0';
                    }
                });
            }
        });
    </script>

    <!-- Your existing JavaScript code for form submission and validation remains here -->
    <!-- ... (keep your existing JavaScript code for form handling) ... -->

</body>

</html>
<script>
    // Password toggle functionality
    document.addEventListener('DOMContentLoaded', function () {
        // Toggle password visibility
        function setupPasswordToggle(toggleId, passwordId) {
            const toggle = document.getElementById(toggleId);
            const password = document.getElementById(passwordId);

            if (toggle && password) {
                toggle.addEventListener('click', function () {
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);
                    this.querySelector('i').classList.toggle('fa-eye');
                    this.querySelector('i').classList.toggle('fa-eye-slash');
                });
            }
        }

        // Set up all password toggles
        setupPasswordToggle('togglePassword', 'password-field');
        setupPasswordToggle('toggleNewPassword', 'password_n');
        setupPasswordToggle('toggleConfirmPassword', 'new_passworn');
        setupPasswordToggle('toggleRegPassword', 'newpassword');
        setupPasswordToggle('toggleRegConfirmPassword', 'password_confirm');
        setupPasswordToggle('toggleElearningPassword', 'passwordw1');
        setupPasswordToggle('toggleElearningConfirmPassword', 'passwordw2');

        // Page navigation
        document.getElementById('back_toregister')?.addEventListener('click', function () {
            showPage('register_page');
        });

        document.getElementById('back_tologin')?.addEventListener('click', function () {
            showPage('login_page');
        });

        document.getElementById('forgot_pwd_title')?.addEventListener('click', function () {
            showPage('pass_resetpage');
        });

        document.getElementById('backlogins')?.addEventListener('click', function () {
            showPage('login_page');
        });

        document.getElementById('open_elerning')?.addEventListener('click', function () {
            showPage('elearning_page');
        });

        function showPage(pageId) {
            // Hide all pages
            const pages = document.querySelectorAll('.logins');
            pages.forEach(page => {
                page.classList.add('not_shown');
                page.classList.remove('animation');
            });

            // Show the selected page
            const targetPage = document.getElementById(pageId);
            if (targetPage) {
                targetPage.classList.remove('not_shown');
                setTimeout(() => {
                    targetPage.classList.add('animation');
                }, 10);
            }
        }
    });
</script>

<script type="text/javascript" src="Huduma_WhiteBox/js/jquery.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!--global js starts-->
<script>
    // Your existing JavaScript code remains exactly the same
    <?php
    include("connect.php");
    $yeard = date('Y');
    $code = isset($_GET['code']) ? mysqli_real_escape_string($con, base64_decode($_GET['code'])) : '';
    $email = isset($_GET['key']) ? mysqli_real_escape_string($con, base64_decode($_GET['key'])) : '';
    ?>

    $(document).ready(function () {
        // Initialize page state
        $(".logins").hide();
        $("#login_page").show();

        // Get email from URL parameters if exists
        var email = '<?php echo isset($_GET["key"]) ? mysqli_real_escape_string($con, base64_decode($_GET["key"])) : ""; ?>';
        var recoversource = email ? "linking" : "";

        // Navigation handlers
        $("#back_toregister").click(function (e) {
            e.preventDefault();
            $(".logins").hide();
            $("#register_page").show();
        });

        $("#back_tologin, #backlogins").click(function (e) {
            e.preventDefault();
            $(".logins").hide();
            $(".recover_dives").hide();
            $("#login_page").show();
        });

        $("#forgot_pwd_title").click(function (e) {
            e.preventDefault();
            $(".logins").hide();
            $("#pass_resetpage").show();
            $(".recover_dives").hide();
            $("#rec_ver").show();
        });

        $("#open_elerning").click(function (e) {
            e.preventDefault();
            $(".logins").hide();
            $("#elearning_page").show();
        });

        // Email validation function
        function validateEmail(email) {
            var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            return emailReg.test(email);
        }

        // Password strength validation
        function validatePassword(password) {
            return password && password.length >= 8;
        }

        // Show/hide loader
        function showLoader(element) {
            element.html("Processing... <i class='fa fa-spinner fa-spin'></i>").css("color", "black");
        }

        function hideLoader(element) {
            element.html("");
        }

        // E-learning form validation and submission
        $("#emaile").focusout(function () {
            var email = $(this).val();
            if (!email) return;

            if (!validateEmail(email)) {
                $(this).val("").css("border", "2px solid red");
                $("#errorreport").html("Check your email address!");
            } else {
                $(this).css("border", "1px solid #ccc");
                $("#errorreport").html("");
            }
        });

        $("#DateOfBirth").focusout(function () {
            var oldyeard = '<?php echo date("Y"); ?>';
            var mydate = $(this).val();
            var d = new Date(mydate);
            var n = d.getFullYear();
            var differenced = oldyeard - n;

            if (differenced < 18) {
                $(this).val("");
                $("#errorreport").html("Date of birth Must be above 18 years");
                $(this).css("border", "2px solid red");
            } else {
                $("#errorreport").html("");
                $(this).css("border", "1px solid #ccc");
            }
        });

        $("#Submitelerning").click(function () {
            var error = "";
            var requiredFields = [
                $("#fname"), $("#sname"), $("#genderb"), $("#DateOfBirth"),
                $("#emaile"), $("#phoneb"), $("#passwordw1"), $("#passwordw2")
            ];

            // Check all required fields
            for (var i = 0; i < requiredFields.length; i++) {
                if (!requiredFields[i].val()) {
                    error = "All mandatory fields required!";
                    break;
                }
            }

            // Validate email
            if (!error && !validateEmail($("#emaile").val())) {
                error = "Invalid email format!";
            }

            // Validate passwords
            if (!error && $("#passwordw1").val() !== $("#passwordw2").val()) {
                error = "Passwords do not match!";
            }

            // Validate password strength
            if (!error && !validatePassword($("#passwordw1").val())) {
                error = "Password must be at least 8 characters long!";
            }

            if (error) {
                $("#errorreport").html(error);
                return;
            }

            var r = confirm("Are you sure you want to submit this information? Click OK to proceed or CANCEL to stop.");
            if (!r) return;

            showLoader($("#errorreport"));
            $("#innov_next_button").addClass("hidden");

            var formData = new FormData($("#commentForm")[0]);
            $.ajax({
                url: 'login/signup.php',
                method: 'POST',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    var responsed = atob(response);
                    if ($.trim(responsed) === "This account exists") {
                        $("#errorreport").html("This account exists");
                    } else {
                        $("#errorreport").html("");
                        $("#secret_key").val($.trim(response));

                        $(".logins").hide();
                        $("#login_page").show();
                        $("#login_headers").html("ACCOUNT VERIFICATION");
                        $(".logins").hide();
                        $("#pass_resetpage").show();
                        $(".recover_dives").hide();
                        $("#confirm_mcodes").show();
                    }
                },
                error: function () {
                    $("#errorreport").html("Error submitting form. Please try again.");
                }
            });
        });

        $("#termsbs").click(function () {
            $(this).prop("checked", !$(this).prop("checked"));
        });

        // Registration form validation
        $("#newpassword, #password_confirm").focusout(function () {
            var password = $(this).val();
            if (!validatePassword(password)) {
                $("#sign_uperror").html("Password must be at least 8 characters long").css("color", "red");
            } else {
                $("#sign_uperror").html("").css("color", "black");
            }
        });

        $("#Email").focusout(function () {
            var email = $(this).val();
            if (!email) return;

            if (!validateEmail(email)) {
                $(this).val("");
                $("#sign_uperror").html("Check your email address!").css('color', 'red');
            } else {
                $("#sign_uperror").html("").css('color', 'black');
            }
        });

        // Login functionality
        $("#login_btn").click(function () {
            var busername = btoa($("#username").val());
            var bpass = btoa($("#password-field").val());

            if (!busername || !bpass) {
                $("#error_data").html("Username and Password Required!");
                return;
            }

            showLoader($("#error_data"));

            $.post("login/login.php", { busername: busername, bpass: bpass }, function (response) {
                var ddata = atob(response);

                if (recoversource) {
                    location.replace("index.php");
                    return;
                }

                switch ($.trim(ddata)) {
                    case "e_learning":
                        handleSuccessfulLogin(busername, "mydashboard/e_learning.php");
                        break;
                    case "portal":
                        handleSuccessfulLogin(busername, "mydashboard/dashboard.php");
                        break;
                    case "Sorry, wrong username or password!":
                    case "Wrong Password, Check the password sent to your email, the first letter is in uppercase":
                    case "Wrong username or password, kindly try again or sign up":
                    case "All fields required!":
                        $("#error_data").html(ddata);
                        break;
                    case "new_password":
                        $("#emailsets").val($("#username").val());
                        $("#password-field").prop("placeholder", "Input new Password").val("");
                        $("#error_data").html("");
                        $(".recover_dives").hide();
                        $("#forgot_pwd_title").click();
                        $("#newnow_pass").show();
                        break;
                    case "":
                        $("#error_data").html("");
                        break;
                    default:
                        $("#secret_key").val($.trim(response));
                        $("#login_headers").html("ACCOUNT VERIFICATION");
                        $(".logins").hide();
                        $("#pass_resetpage").show();
                        $(".recover_dives").hide();
                        $("#confirm_mcodes").show();
                        $("#error_data").html("");
                }
            }).fail(function () {
                $("#error_data").html("Error connecting to server. Please try again.");
            });
        });

        function handleSuccessfulLogin(username, dashboardUrl) {
            $("#user_email").val(username);
            $.post(dashboardUrl, { model: username }, function (data) {
                $(".modal-backdrop").hide();
                $('body').removeClass("modal-open");
                $("#error_data").html("");
                $("#home_pagedata").hide().html("");
                $("#loginmodal").modal("hide").removeData();
                $("#landing_page").show().html(data);
            }).fail(function () {
                $("#error_data").html("Error loading dashboard. Please try again.");
            });
        }

        // Registration form submission
        $("#SubmitButton").click(function () {
            var first_name = $("#first_name").val();
            var last_name = $("#last_name").val();
            var email = $("#Email").val();
            var phone = $("#phone").val();
            var gender = $("#gender").val();
            var password1 = $("#newpassword").val();
            var password2 = $("#password_confirm").val();

            // Validate required fields
            if (!first_name || !last_name || !email || !phone || !gender) {
                $("#sign_uperror").html("All Fields Required!").css("color", "red");
                return;
            }

            // Validate email
            if (!validateEmail(email)) {
                $("#sign_uperror").html("Invalid email format!").css("color", "red");
                return;
            }

            // Validate passwords
            if (!password1) {
                $("#sign_uperror").html("Password Required!").css("color", "red");
                return;
            }

            if (!validatePassword(password1)) {
                $("#sign_uperror").html("Password must be at least 8 characters long").css("color", "red");
                return;
            }

            if (!password2) {
                $("#sign_uperror").html("Confirmation Password Required!").css("color", "red");
                return;
            }

            if (password1 !== password2) {
                $("#sign_uperror").html("Passwords do not match").css("color", "red");
                return;
            }

            showLoader($("#sign_uperror"));

            var formData = new FormData($("#reg_form")[0]);
            $.ajax({
                url: 'login/validate.php',
                method: 'POST',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    var responsed = atob(response);
                    if ($.trim(responsed) === "This account exists") {
                        $("#sign_uperror").html(responsed).css("color", "black");
                    } else {
                        $("#secret_key").val($.trim(response));
                        $(".logins").hide();
                        $("#login_page").show();
                        $("#login_headers").html("ACCOUNT VERIFICATION");
                        $(".logins").hide();
                        $("#pass_resetpage").show();
                        $(".recover_dives").hide();
                        $("#confirm_mcodes").show();
                    }
                },
                error: function () {
                    $("#sign_uperror").html("Error submitting form. Please try again.").css("color", "red");
                }
            });
        });

        // Password recovery functionality
        $("#remail").focusout(function () {
            var email = $(this).val();
            if (!email) return;

            if (!validateEmail(email)) {
                $("#recovery_error").html("Check your email address!").css('color', 'red');
            } else {
                $("#recovery_error").html("").css('color', 'black');
            }
        });

        $("#recover_now").click(function () {
            var rcover_email = $("#remail").val();

            if (!rcover_email) {
                $("#recovery_error").html("Email required!").css("color", "red");
                return;
            }

            if (!validateEmail(rcover_email)) {
                $("#recovery_error").html("Check your email address!").css('color', 'red');
                return;
            }

            showLoader($("#recovery_error"));

            var formData = new FormData($("#recover_form")[0]);
            $.ajax({
                url: 'login/recover.php',
                method: 'POST',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    var responsed = atob(response);
                    if (responsed === "Email does not exist") {
                        $("#recovery_error").html(responsed).css("color", "black");
                    } else {
                        $("#secret_key").val($.trim(response));
                        $("#emailsets").val($.trim(rcover_email));
                        $(".recover_dives").hide();
                        $("#new_pass").show();
                        $("#confirm_error").html("").css("color", "black");
                        $("#recovery_error").html("").css("color", "black");
                    }
                },
                error: function () {
                    $("#recovery_error").html("Error processing request. Please try again.").css("color", "red");
                }
            });
        });

        // Confirmation code validation
        $("#confirm_now").click(function () {
            var code = $("#code").val();
            var keycode = $("#secret_key").val();

            if (!code) {
                $("#confirm_error").html("Input confirmation code").css("color", "red");
                return;
            }

            var new_code = btoa(code);
            if (new_code === keycode) {
                $(".recover_dives").hide();
                $("#newnow_pass").show();
                $("#confirm_error").html("").css("color", "black");
            } else {
                $("#confirm_error").html("Wrong confirmation code, try again!").css("color", "red");
            }
        });

        $("#confirm_codesd").click(function () {
            var coded = $("#conf_codes").val();
            var keycode = $("#secret_key").val();

            if (!coded) {
                $("#confirm_dderror").html("Input confirmation code").css("color", "red");
                return;
            }

            var new_coded = btoa(coded);
            if (new_coded === keycode) {
                var busername = btoa($("#username").val()) || btoa($("#Email").val());

                showLoader($("#confirm_dderror"));

                $.post("login/update.php", { busername: busername }, function (response) {
                    var ddata = atob(response);
                    if ($.trim(ddata) === "success") {
                        $("#user_email").val(busername);
                        showLoader($("#confirm_dderror"));
                        loadDashboard(busername);
                    } else {
                        $("#confirm_dderror").html(ddata).css("color", "red");
                    }
                }).fail(function () {
                    $("#confirm_dderror").html("Error verifying account. Please try again.").css("color", "red");
                });
            } else {
                $("#confirm_dderror").html("Wrong confirmation code, try again!").css("color", "red");
            }
        });

        function loadDashboard(username) {
            $.post("mydashboard/dashboard.php", { model: username }, function (data) {
                $(".modal-backdrop").hide();
                $('body').removeClass("modal-open");
                $("#error_data").html("");
                $("#home_pagedata").hide().html("");
                $("#loginmodal").modal("hide").removeData();
                $("#landing_page").show().html(data);
                $("#confirm_dderror").html("").css("color", "black");
            }).fail(function () {
                $("#confirm_dderror").html("Error loading dashboard. Please try again.").css("color", "red");
            });
        }

        // New password creation
        $("#password_n, #new_passworn").focusout(function () {
            var password = $(this).val();
            if (!validatePassword(password)) {
                $("#createerror").html("Password must be at least 8 characters long").css("color", "red");
            } else {
                $("#createerror").html("").css("color", "black");
            }
        });

        $("#create_newpass").click(function () {
            var password = $("#password_n").val();
            var conf_pass = $("#new_passworn").val();

            if (!password || !conf_pass) {
                $("#createerror").html("All fields required!").css("color", "red");
                return;
            }

            if (password !== conf_pass) {
                $("#createerror").html("Passwords do not match!").css("color", "red");
                return;
            }

            if (!validatePassword(password)) {
                $("#createerror").html("Password must be at least 8 characters long").css("color", "red");
                return;
            }

            showLoader($("#createerror"));

            var formData = new FormData($("#new_passset")[0]);
            $.ajax({
                url: 'login/reset.php',
                method: 'POST',
                data: formData,
                contentType: false,
                cache: false,
                processData: false,
                success: function (response) {
                    var responsed = atob(response);
                    if (responsed === "success") {
                        $(".logins").hide();
                        $("#login_page").show();
                        $("#login_headers").html("LOGIN WITH THE NEW PASSWORD");
                        $("#createerror").html("").css("color", "black");
                    } else {
                        $("#createerror").html(responsed).css("color", "black");
                    }
                },
                error: function () {
                    $("#createerror").html("Error resetting password. Please try again.").css("color", "red");
                }
            });
        });

        // Password toggle functionality
        $(".password-toggle").click(function () {
            var input = $(this).siblings('input');
            var icon = $(this).find('i');

            if (input.attr('type') === 'password') {
                input.attr('type', 'text');
                icon.removeClass('fa-eye').addClass('fa-eye-slash');
            } else {
                input.attr('type', 'password');
                icon.removeClass('fa-eye-slash').addClass('fa-eye');
            }
        });

        // Disable right-click context menu
        $(document).bind("contextmenu", function (e) {
            return false;
        });
    });

    // AngularJS Password Strength Controller
    var myApp = angular.module("myapp", []);
    myApp.controller("PasswordController", function ($scope) {
        var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
        var mediumRegex = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})");

        $scope.passwordStrength = {
            "float": "left",
            "height": "10px",
            "margin-top": "5px",
            "border-radius": "4px"
        };

        $scope.analyze = function (value) {
            if (!value) {
                $("#pass_t").hide();
                $("#strengthmeter").hide();
                return;
            }

            $("#pass_t").show();
            $("#strengthmeter").show();

            if (strongRegex.test(value)) {
                $scope.passwordStrength["background-color"] = "green";
                $scope.passwordStrength["width"] = "100%";
                $("#str_stregnth").html("100%").css("color", "green");
            } else if (mediumRegex.test(value)) {
                $scope.passwordStrength["background-color"] = "orange";
                $scope.passwordStrength["width"] = "70%";
                $("#str_stregnth").html("70%").css("color", "orange");
            } else {
                $scope.passwordStrength["background-color"] = "red";
                $scope.passwordStrength["width"] = "40%";
                $("#str_stregnth").html("40%").css("color", "red");
            }
        };
    });
</script>



<!--page level js ends-->
<script type="text/javascript">

    $('.count').each(function () {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 4000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        //var recoversource="";
        // alert()
        $("#loginmodaldd").click(function () {
            //alert()

        })
        $("#about_us").click(function () {
            $(".about_uspages").show();
            $("#home_page").hide();
        })
        $("#home_pagedd").click(function () {

            $("#home_page").show();
            $(".about_uspages").hide();
        })
        $("#back_tologin").click(function () {
            $(".logins").hide();
            $("#login_page").show();
            $("#login_headers").html("LOGIN HERE")
        })
        $("#back_toregister").click(function () {
            $("#login_headers").html("SIGN UP HERE")
            $(".logins").hide();
            $("#register_page").show();
        })
        $("#back_toelearning").click(function () {
            $("#login_headers").html("SIGN UP TO E-LEARNING")
            $(".logins").hide();
            $("#elearning_page").show();
        })


        //gto confirm acc 
        var loginuser = '<?php echo $loginuser ?>';
        //alert(loginuser)
        if (loginuser) {
            var user_not = '<?php echo $user_not ?>';

            //  var busername=btoa('<?php echo $user ?>');
            // alert(busername)
            $("#user_email").val(loginuser);

            $.post("mydashboard/" + user_not + ".php", { model: loginuser }, function (data) {
                $(".modal-backdrop").hide();
                $('body').removeClass("modal-open");
                $("#error_data").html("");

                $("#home_pagedata").hide().html("");
                $("#home_pagedata").html("");
                $("#loginmodal").modal("hide").removeData();
                $("#landing_page").show().html(data);

                $("#confirm_dderror").html("").css("color", "black");

                //body.style.removeProperty('padding-right');


                //$("#home_page").hide();
                $("#error_data").html("");


            })
        } else {

        }

    });
</script>
<!-- end page level js -->
<script type="text/javascript" src="minijava.js"></script>
<script type="text/javascript" src="Huduma_WhiteBox/jquery.js"></script>
<script type="text/javascript" src="Huduma_WhiteBox/bootstrap.js"></script>
<script src="Huduma_WhiteBox/bootstrapValidator.js" type="text/javascript"></script>
<script type="text/javascript" src="Huduma_WhiteBox/icheck.js"></script>
<script type="text/javascript" src="Huduma_WhiteBox/register_custom.js"></script>
<!--global js end-->
<script type="text/javascript" src="Huduma_WhiteBox/slick.js"></script>

<script language="JavaScript">
    $(document).ready(function () {
        $(document).bind("contextmenu", function (e) {

            return false;

        })


    })


</script>


</body>

</html>