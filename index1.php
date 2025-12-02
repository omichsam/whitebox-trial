<?php
session_start();
?>

<?php
// Handle alerts for activation and password reset
if (isset($_GET['activated']) && $_GET['activated'] === "true") {
    echo "<script>
        alert('Your account has been activated successfully. You can now log in.');

        // Remove query string from URL
        if (window.history.replaceState) {
            const newUrl = window.location.protocol + '//' + window.location.host + window.location.pathname;
            window.history.replaceState({path:newUrl}, '', newUrl);
        }
    </script>";
}

if (isset($_GET['password_reset']) && $_GET['password_reset'] === "true") {
    echo "<script>
        alert('Your password has been reset successfully. You can now log in with your new password.');

        // Remove query string from URL
        if (window.history.replaceState) {
            const newUrl = window.location.protocol + '//' + window.location.host + window.location.pathname;
            window.history.replaceState({path:newUrl}, '', newUrl);
        }
    </script>";
}
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
    <title>WhiteBox - Login</title>
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
            --warning: #ffc107;
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
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

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
            z-index: -1;
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
            align-items: center;
            width: 100%;
        }

        .logo_position {
            height: 100px;
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
            display: none;
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
            display: none;
        }

        .warning-message {
            color: var(--warning);
            font-size: 14px;
            margin-top: 10px;
            text-align: center;
            padding: 10px;
            background: rgba(255, 193, 7, 0.1);
            border-radius: 8px;
            border-left: 4px solid var(--warning);
            display: none;
        }

        .links-container {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
            flex-wrap: wrap;
        }

        .auth-link {
            color: var(--primary);
            text-decoration: none;
            font-size: 14px;
            transition: var(--transition);
        }

        .auth-link:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .activation-message {
            background: rgba(255, 193, 7, 0.15);
            border: 1px solid var(--warning);
            border-radius: 10px;
            padding: 15px;
            margin: 20px 0;
            text-align: center;
            display: none;
        }

        .activation-message i {
            color: var(--warning);
            margin-right: 10px;
            font-size: 18px;
        }

        /* Animation classes */
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

        /* Responsive adjustments */
        @media all and (max-width: 768px) {
            .mobile_hidden {
                display: none !important;
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

            .links-container {
                flex-direction: column;
                gap: 10px;
                align-items: center;
            }
        }
    </style>
    <?php include('links.php'); ?>
</head>

<body>
    <input type="hidden" class="splashinputs" id="user_email">
    <div class="containerfluid- no_padding not_shown" id="home_pagedata"></div>

    <div class="auth-container" id="landing_page">
        <div class="auth-space">
            <!-- Login Section Only -->
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

                    <!-- Activation Message -->
                    <div class="activation-message" id="activationMessage">
                        <i class="fas fa-exclamation-circle"></i>
                        <span id="activationText">Your account needs to be activated. Please check your email for
                            activation instructions.</span>
                    </div>

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
                            <span class="password-toggle" id="togglePassword">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>

                        <div class="links-container">
                            <a href="register.php" class="auth-link">
                                <i class="fas fa-user-plus"></i> Create Account
                            </a>
                            <a href="reset_password.php" class="auth-link">
                                <i class="fas fa-key"></i> Forgot Password?
                            </a>
                        </div>

                        <button type="button" class="btn btn-success pt-3" id="login_btn" style="margin-top: 20px;">
                            <i class="fas fa-sign-in-alt"></i> Sign In
                        </button>
                    </form>

                    <!-- Error Messages -->
                    <div class="error-message" id="error_data"></div>
                    <div class="success-message" id="success_data"></div>
                    <div class="warning-message" id="warning_data"></div>
                </div>
                <div class="card-footera">
                    Need help? <a href="contact.php">Contact Support</a>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" class="splashinputs" id="secret_key">

    <script>
        // Generic function for multiple password fields
        $(document).ready(function () {
            // Initialize all password toggle buttons
            $('.password-toggle-btn').each(function () {
                const toggleBtn = $(this);
                // Find the associated password input (previous sibling input)
                const passwordInput = toggleBtn.parent().find('input[type="password"], input[type="text"]');

                toggleBtn.click(function () {
                    const isPassword = passwordInput.attr('type') === 'password';
                    const icon = $(this).find('i');

                    passwordInput.attr('type', isPassword ? 'text' : 'password');
                    icon.toggleClass('fa-eye fa-eye-slash');
                    $(this).attr('aria-label', isPassword ? 'Hide password' : 'Show password');
                });
            });
        });
    </script>

</body>

</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Hide all messages initially
        $("#error_data").hide();
        $("#success_data").hide();
        $("#warning_data").hide();
        $("#activationMessage").hide();

        // Login functionality
        $("#login_btn").click(function () {
            var busername = btoa($("#username").val());
            var bpass = btoa($("#password-field").val());
            var email = $("#username").val();

            // Hide all messages
            $("#error_data").hide();
            $("#success_data").hide();
            $("#warning_data").hide();
            $("#activationMessage").hide();

            if (!busername || !bpass) {
                $("#error_data").html("Email and Password are required!").show();
                return;
            }

            if (!validateEmail(email)) {
                $("#error_data").html("Please enter a valid email address!").show();
                return;
            }

            // Show loading state
            $("#login_btn").html('<i class="fas fa-spinner fa-spin"></i> Signing In...').prop('disabled', true);

            $.post("login/login.php", { busername: busername, bpass: bpass }, function (response) {
                var ddata = atob(response);
                console.log("Response:", ddata); // For debugging

                switch (ddata.trim()) {
                    case "portal":
                        // Successful login - account activated
                        handleSuccessfulLogin(busername, "mydashboard/dashboard.php");
                        break;

                    case "e_learning":
                        // e-learning login
                        handleSuccessfulLogin(busername, "mydashboard/e_learning.php");
                        break;

                    case "activation_required":
                        // Account exists but not activated
                        $("#activationMessage").show();
                        $("#activationText").html("Your account is not activated yet. Please check your email for activation instructions or <a href='activate.php?email=" + encodeURIComponent(email) + "' style='color: var(--warning);'>click here</a> to resend activation email.");
                        $("#login_btn").html('<i class="fas fa-sign-in-alt"></i> Sign In').prop('disabled', false);
                        break;

                    case "invalid_credentials":
                        // Wrong password
                        $("#error_data").html("Invalid password. Please try again.").show();
                        $("#login_btn").html('<i class="fas fa-sign-in-alt"></i> Sign In').prop('disabled', false);
                        break;

                    case "user_not_found":
                        // User doesn't exist
                        $("#error_data").html("No account found with this email. Please <a href='register.php' style='color: var(--danger);'>sign up</a> first.").show();
                        $("#login_btn").html('<i class="fas fa-sign-in-alt"></i> Sign In').prop('disabled', false);
                        break;

                    case "missing_credentials":
                        // Empty fields
                        $("#error_data").html("Email and password are required!").show();
                        $("#login_btn").html('<i class="fas fa-sign-in-alt"></i> Sign In').prop('disabled', false);
                        break;

                    default:
                        // Check if response contains an activation code
                        if (ddata.length === 12) { // Base64 encoded 8-character code
                            window.location.href = "activate.php?code=" + encodeURIComponent(response) + "&email=" + encodeURIComponent(email);
                        } else {
                            // Unknown response
                            $("#error_data").html("An unexpected error occurred. Please try again.").show();
                            $("#login_btn").html('<i class="fas fa-sign-in-alt"></i> Sign In').prop('disabled', false);
                        }
                }
            }).fail(function (jqXHR, textStatus, errorThrown) {
                console.error("Login failed:", textStatus, errorThrown);
                $("#error_data").html("Error connecting to server. Please check your internet connection and try again.").show();
                $("#login_btn").html('<i class="fas fa-sign-in-alt"></i> Sign In').prop('disabled', false);
            });
        });

        function handleSuccessfulLogin(username, dashboardUrl) {
            $("#user_email").val(username);
            $.post(dashboardUrl, { model: username }, function (data) {
                $(".modal-backdrop").hide();
                $('body').removeClass("modal-open");
                $("#error_data").hide();
                $("#home_pagedata").hide().html("");
                $("#landing_page").show().html(data);
            }).fail(function () {
                $("#error_data").html("Error loading dashboard. Please try again.").show();
                $("#login_btn").html('<i class="fas fa-sign-in-alt"></i> Sign In').prop('disabled', false);
            });
        }

        function validateEmail(email) {
            var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        // Enable Enter key to submit login form
        $("#username, #password-field").keypress(function (e) {
            if (e.which == 13) {
                $("#login_btn").click();
            }
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

    // Check if user is already logged in
    <?php if (isset($_SESSION["id"])): ?>
        $(document).ready(function () {
            var loginuser = '<?php echo isset($loginuser) ? $loginuser : ""; ?>';
            var user_not = '<?php echo isset($user_not) ? $user_not : ""; ?>';

            if (loginuser && user_not) {
                $("#user_email").val(loginuser);
                $.post("mydashboard/" + user_not + ".php", { model: loginuser }, function (data) {
                    $(".modal-backdrop").hide();
                    $('body').removeClass("modal-open");
                    $("#error_data").hide();
                    $("#home_pagedata").hide().html("");
                    $("#home_pagedata").html("");
                    $("#landing_page").show().html(data);
                });
            }
        });
    <?php endif; ?>
</script>