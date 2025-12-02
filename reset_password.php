<?php
session_start();
include("connect.php");

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check database connection
if (!$con) {
    die("Database connection failed");
}

// Generate 8-character code
function generateCode($length = 8)
{
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    return substr(str_shuffle($chars), 0, $length);
}

// Hash password function
function hashword($string, $salt)
{
    return crypt($string, '$1$' . $salt . '$');
}

$salt = "A073955@am";

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['request_reset'])) {
        // Step 1: Request password reset
        handleResetRequest();
    } elseif (isset($_POST['verify_reset'])) {
        // Step 2: Verify reset code
        verifyResetCode();
    } elseif (isset($_POST['update_password'])) {
        // Step 3: Update password
        updatePassword();
    }
}

// Function to handle password reset request
function handleResetRequest()
{
    global $con;

    $email = $_POST['email'] ?? '';

    if (empty($email)) {
        $_SESSION['reset_error'] = "Please enter your email address.";
        header("Location: reset_password.php");
        exit();
    }

    $email = strtolower(mysqli_real_escape_string($con, trim($email)));

    // Check if user exists
    $checkUser = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");

    if (mysqli_num_rows($checkUser) === 0) {
        // For security, don't reveal if email exists
        $_SESSION['reset_info'] = "If an account exists with this email, a reset code has been sent.";
        header("Location: reset_password.php");
        exit();
    }

    $user = mysqli_fetch_assoc($checkUser);
    $first_name = $user['first_name'];
    $last_name = $user['last_name'];
    $country = $user['country'];

    // Check if account is activated (country = "KE")
    if ($country !== "KE") {
        $_SESSION['reset_error'] = "Your account is not activated. Please activate your account first.";
        header("Location: reset_password.php");
        exit();
    }

    // Generate reset code
    $reset_code = generateCode(8);
    $token_type = 'reset';
    $current_time = date('Y-m-d H:i:s');
    $token_expires_at = date('Y-m-d H:i:s', strtotime('+1 hour'));

    // Update database with reset token
    $update = mysqli_query($con, "UPDATE users SET 
                 token = '$reset_code',
                 token_type = '$token_type',
                 token_expires_at = '$token_expires_at',
                 updated_at = '$current_time'
                 WHERE email = '$email'");

    if ($update) {
        // Send reset email
        sendResetEmail($email, $first_name, $last_name, $reset_code);

        $_SESSION['reset_success'] = "Password reset code sent to your email!";
        $_SESSION['reset_email'] = $email;
        header("Location: reset_password.php?step=2&email=" . urlencode($email));
    } else {
        $_SESSION['reset_error'] = "Failed to generate reset code. Please try again.";
        header("Location: reset_password.php");
    }
    exit();
}

// Function to verify reset code
function verifyResetCode()
{
    global $con;

    $code = $_POST['code'] ?? '';
    $email = $_POST['email'] ?? '';

    if (empty($code) || empty($email)) {
        $_SESSION['reset_error'] = "Please enter the reset code.";
        header("Location: reset_password.php?step=2&email=" . urlencode($email));
        exit();
    }

    $email = mysqli_real_escape_string($con, trim($email));
    $code = mysqli_real_escape_string($con, trim($code));

    // Check if token is valid and not expired
    $check_query = "SELECT * FROM users WHERE email='$email' 
                    AND token='$code' 
                    AND token_type='reset' 
                    AND token_expires_at > NOW()";

    $result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['reset_verified'] = true;
        $_SESSION['reset_email'] = $email;
        $_SESSION['reset_code'] = $code;
        header("Location: reset_password.php?step=3");
    } else {
        // Check if code expired
        $check_expired = mysqli_query($con, "SELECT * FROM users WHERE email='$email' 
                                            AND token='$code' AND token_type='reset' 
                                            AND token_expires_at <= NOW()");

        if (mysqli_num_rows($check_expired) > 0) {
            $_SESSION['reset_error'] = "Reset code has expired. Please request a new one.";
        } else {
            $_SESSION['reset_error'] = "Invalid reset code. Please try again.";
        }
        header("Location: reset_password.php?step=2&email=" . urlencode($email));
    }
    exit();
}

// Function to update password
function updatePassword()
{
    global $con, $salt;

    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $email = $_POST['email'] ?? '';
    $code = $_POST['code'] ?? '';

    // Validate inputs
    if (empty($password) || empty($confirm_password)) {
        $_SESSION['reset_error'] = "Please enter and confirm your new password.";
        header("Location: reset_password.php?step=3");
        exit();
    }

    if ($password !== $confirm_password) {
        $_SESSION['reset_error'] = "Passwords do not match.";
        header("Location: reset_password.php?step=3");
        exit();
    }

    if (strlen($password) < 8) {
        $_SESSION['reset_error'] = "Password must be at least 8 characters.";
        header("Location: reset_password.php?step=3");
        exit();
    }

    $email = mysqli_real_escape_string($con, trim($email));
    $code = mysqli_real_escape_string($con, trim($code));

    // Verify code again before updating password
    $check_query = "SELECT * FROM users WHERE email='$email' 
                    AND token='$code' 
                    AND token_type='reset' 
                    AND token_expires_at > NOW()";

    $result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($result) === 0) {
        $_SESSION['reset_error'] = "Reset session expired. Please start over.";
        header("Location: reset_password.php");
        exit();
    }

    // Hash new password
    $hashed_password = hashword(base64_encode($password), $salt);

    // Update password and clear reset token
    $update_query = "UPDATE users SET 
                     password = '$hashed_password',
                     token = NULL,
                     token_type = NULL,
                     token_expires_at = NULL,
                     updated_at = NOW()
                     WHERE email = '$email' AND token = '$code' AND token_type = 'reset'";

    if (mysqli_query($con, $update_query)) {
        // Get user info
        $user_query = mysqli_query($con, "SELECT first_name, last_name FROM users WHERE email='$email'");
        $user = mysqli_fetch_assoc($user_query);

        // Send confirmation email
        sendPasswordChangedEmail($email, $user['first_name'], $user['last_name']);

        // Clear session
        unset($_SESSION['reset_verified']);
        unset($_SESSION['reset_email']);
        unset($_SESSION['reset_code']);

        $_SESSION['reset_success'] = "Password updated successfully! You can now login.";
        header("Location: index1.php?password_reset=true");
    } else {
        $_SESSION['reset_error'] = "Failed to update password. Please try again.";
        header("Location: reset_password.php?step=3");
    }
    exit();
}

// Function to send reset email
function sendResetEmail($email, $first_name, $last_name, $reset_code)
{
    $reset_link = "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) .
        "/reset_password.php?step=2&email=" . urlencode($email);

    $expiry_time = date('l, F j, Y \a\t g:i A', strtotime('+1 hour'));

    $subject = "Reset Your WhiteBox Password";

    $message = "
        <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;'>
            <div style='background: #085c02; color: white; padding: 20px; text-align: center;'>
                <h2>Password Reset Request</h2>
            </div>
            <div style='padding: 25px; background: #f9f9f9;'>
                <p>Dear <strong>$first_name $last_name</strong>,</p>
                <p>We received a request to reset your WhiteBox account password.</p>
                
                <div style='background: white; border: 2px solid #085c02; padding: 20px; margin: 20px 0; text-align: center; border-radius: 8px;'>
                    <h3 style='color: #085c02; margin-top: 0;'>Your Reset Code</h3>
                    <div style='font-size: 32px; font-weight: bold; letter-spacing: 4px; color: #333; 
                             margin: 15px 0; padding: 15px; background: #f8f9fa; border-radius: 6px;
                             font-family: monospace;'>
                        $reset_code
                    </div>
                    <p style='font-size: 14px; color: #666;'>
                        Enter this 8-character code on the reset page
                    </p>
                </div>
                
                <p>Or visit: <a href='$reset_link'>$reset_link</a></p>
                
                <div style='background: #fff3cd; border-left: 4px solid #ffc107; padding: 15px; margin: 20px 0;'>
                    <p style='margin: 0; color: #856404;'>
                        <strong>Note:</strong> This code expires on $expiry_time (1 hour)
                    </p>
                </div>
                
                <p>If you didn't request this, please ignore this email.</p>
                
                <p>Best regards,<br><strong>The WhiteBox Team</strong></p>
            </div>
        </div>
    ";

    // Include your email sending script
    $mail_subject = $subject;
    $mail_message = $message;

    if (file_exists("Huduma_WhiteBox/mails/general.php")) {
        include("Huduma_WhiteBox/mails/general.php");
    } else {
        // Fallback
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
        $headers .= "From: WhiteBox <noreply@whitebox.go.ke>" . "\r\n";
        mail($email, $subject, $message, $headers);
    }
}

// Function to send password changed email
function sendPasswordChangedEmail($email, $first_name, $last_name)
{
    $subject = "Password Changed Successfully - WhiteBox";

    $message = "
        <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;'>
            <div style='background: #28a745; color: white; padding: 20px; text-align: center;'>
                <h2>Password Updated</h2>
            </div>
            <div style='padding: 25px; background: #f9f9f9;'>
                <p>Dear <strong>$first_name $last_name</strong>,</p>
                <p>Your WhiteBox password has been successfully changed.</p>
                
                <div style='background: #d4edda; border: 2px solid #c3e6cb; color: #155724; 
                         padding: 20px; margin: 20px 0; text-align: center; border-radius: 8px;'>
                    <p style='margin: 0; font-size: 18px; font-weight: bold;'>
                        ✅ Password updated successfully
                    </p>
                </div>
                
                <p>You can now login with your new password.</p>
                
                <p>If you didn't make this change, please contact support immediately.</p>
                
                <p>Best regards,<br><strong>The WhiteBox Security Team</strong></p>
            </div>
        </div>
    ";

    // Include your email sending script
    $mail_subject = $subject;
    $mail_message = $message;

    if (file_exists("Huduma_WhiteBox/mails/general.php")) {
        include("Huduma_WhiteBox/mails/general.php");
    } else {
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
        $headers .= "From: WhiteBox Security <security@whitebox.go.ke>" . "\r\n";
        mail($email, $subject, $message, $headers);
    }
}

// Determine current step
$step = $_GET['step'] ?? 1;
$email = $_GET['email'] ?? ($_SESSION['reset_email'] ?? '');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - WhiteBox</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --primary: #008435ff;
            --primary-dark: #055c15ff;
            --success: #28a745;
            --danger: #dc3545;
            --dark: #212529;
            --gray: #6c757d;
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
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .reset-container {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
        }

        .reset-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            padding: 40px;
            width: 100%;
        }

        .card-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .card-header h2 {
            color: var(--dark);
            margin-bottom: 10px;
        }

        .logo {
            height: 80px;
            margin-bottom: 20px;
        }

        .steps {
            display: flex;
            justify-content: space-between;
            margin: 30px 0;
            position: relative;
        }

        .steps::before {
            content: '';
            position: absolute;
            top: 20px;
            left: 10%;
            right: 10%;
            height: 2px;
            background: #e9ecef;
            z-index: 1;
        }

        .step {
            text-align: center;
            position: relative;
            z-index: 2;
            flex: 1;
        }

        .step-icon {
            width: 40px;
            height: 40px;
            background: white;
            border: 2px solid #e9ecef;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            font-weight: bold;
            color: var(--gray);
        }

        .step.active .step-icon {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        .step.completed .step-icon {
            background: var(--success);
            border-color: var(--success);
            color: white;
        }

        .step-text {
            font-size: 12px;
            color: var(--gray);
        }

        .step.active .step-text {
            color: var(--primary);
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--dark);
        }

        input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            font-family: 'Poppins', sans-serif;
        }

        input:focus {
            border-color: var(--primary);
            outline: none;
        }

        .code-input {
            font-family: 'Courier New', monospace;
            font-size: 20px;
            letter-spacing: 3px;
            text-align: center;
            text-transform: uppercase;
        }

        .btn {
            width: 100%;
            padding: 14px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 10px;
            font-family: 'Poppins', sans-serif;
        }

        .btn:hover {
            background: var(--primary-dark);
        }

        .message {
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .error {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .info {
            background: #e7f3ff;
            color: #1a56db;
            border: 1px solid #b3d7ff;
        }

        .links {
            text-align: center;
            margin-top: 25px;
        }

        .links a {
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
        }

        .links a:hover {
            text-decoration: underline;
        }

        .password-strength {
            margin-top: 10px;
        }

        .strength-bar {
            height: 6px;
            background: #e9ecef;
            border-radius: 3px;
            overflow: hidden;
            margin-bottom: 5px;
        }

        .strength-fill {
            height: 100%;
            width: 0%;
            border-radius: 3px;
            transition: all 0.3s ease;
        }

        .strength-text {
            font-size: 12px;
            color: #6c757d;
        }

        .password-match {
            font-size: 14px;
            font-weight: 500;
            margin-top: 8px;
            display: none;
        }

        .match-valid {
            color: #28a745;
        }

        .match-invalid {
            color: #dc3545;
        }
    </style>
</head>

<body>
    <div class="reset-container">
        <div class="reset-card">
            <div class="card-header">
                <img src="Huduma_WhiteBox/Whitebox.png" alt="WhiteBox" class="logo">
                <h2>Reset Password</h2>
                <p style="color: var(--gray);">Secure your account</p>
            </div>

            <!-- Steps -->
            <div class="steps">
                <div class="step <?php echo $step == 1 ? 'active' : 'completed'; ?>">
                    <div class="step-icon">1</div>
                    <div class="step-text">Request</div>
                </div>
                <div class="step <?php echo $step == 2 ? 'active' : ($step > 2 ? 'completed' : ''); ?>">
                    <div class="step-icon">2</div>
                    <div class="step-text">Verify</div>
                </div>
                <div class="step <?php echo $step == 3 ? 'active' : ''; ?>">
                    <div class="step-icon">3</div>
                    <div class="step-text">New Password</div>
                </div>
            </div>

            <!-- Messages -->
            <?php if (isset($_SESSION['reset_success'])): ?>
                <div class="message success">
                    <i class="fas fa-check-circle"></i>
                    <?php echo $_SESSION['reset_success']; ?>
                    <?php unset($_SESSION['reset_success']); ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['reset_error'])): ?>
                <div class="message error">
                    <i class="fas fa-exclamation-circle"></i>
                    <?php echo $_SESSION['reset_error']; ?>
                    <?php unset($_SESSION['reset_error']); ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['reset_info'])): ?>
                <div class="message info">
                    <i class="fas fa-info-circle"></i>
                    <?php echo $_SESSION['reset_info']; ?>
                    <?php unset($_SESSION['reset_info']); ?>
                </div>
            <?php endif; ?>

            <!-- Step 1: Request Reset -->
            <?php if ($step == 1): ?>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="email">
                            <i class="fas fa-envelope"></i> Email Address
                        </label>
                        <input type="email" id="email" name="email" required placeholder="Enter your registered email">
                    </div>

                    <button type="submit" name="request_reset" class="btn">
                        <i class="fas fa-paper-plane"></i> Send Reset Code
                    </button>
                </form>

                <div class="links">
                    <a href="index1.php">
                        <i class="fas fa-arrow-left"></i> Back to Login
                    </a>
                </div>

                <!-- Step 2: Verify Code -->
            <?php elseif ($step == 2 && !empty($email)): ?>
                <form method="POST" action="">
                    <input type="hidden" name="email" value="<?php echo htmlspecialchars($email); ?>">

                    <div class="form-group">
                        <label for="code">
                            <i class="fas fa-key"></i> Enter Reset Code
                        </label>
                        <input type="text" id="code" name="code" class="code-input" required placeholder="XXXX-XXXX"
                            maxlength="8" pattern="[A-Z0-9]{8}" title="8 uppercase letters/numbers">
                        <small style="color: var(--gray); font-size: 12px;">
                            8-character code sent to <?php echo htmlspecialchars($email); ?>
                        </small>
                    </div>

                    <button type="submit" name="verify_reset" class="btn">
                        <i class="fas fa-check-circle"></i> Verify Code
                    </button>
                </form>

                <div class="links">
                    <a href="reset_password.php">
                        <i class="fas fa-redo"></i> Request New Code
                    </a>
                    <a href="index1.php">
                        <i class="fas fa-arrow-left"></i> Back to Login
                    </a>
                </div>

                <!-- Step 3: New Password -->
            <?php elseif ($step == 3 && isset($_SESSION['reset_verified'])): ?>
                <form method="POST" action="" id="passwordForm">
                    <input type="hidden" name="email" value="<?php echo htmlspecialchars($_SESSION['reset_email']); ?>">
                    <input type="hidden" name="code" value="<?php echo htmlspecialchars($_SESSION['reset_code']); ?>">

                    <div class="form-group">
                        <label for="password">
                            <i class="fas fa-lock"></i> New Password
                        </label>
                        <input type="password" id="password" name="password" required placeholder="Enter new password"
                            minlength="8">

                        <div class="password-strength">
                            <div class="strength-bar">
                                <div class="strength-fill" id="strengthFill"></div>
                            </div>
                            <div class="strength-text" id="strengthText">Password strength: None</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="confirm_password">
                            <i class="fas fa-lock"></i> Confirm Password
                        </label>
                        <input type="password" id="confirm_password" name="confirm_password" required
                            placeholder="Confirm new password" minlength="8">
                        <div class="password-match" id="passwordMatch"></div>
                    </div>

                    <button type="submit" name="update_password" class="btn">
                        <i class="fas fa-save"></i> Update Password
                    </button>
                </form>

                <div class="links">
                    <a href="reset_password.php?step=2&email=<?php echo urlencode($_SESSION['reset_email']); ?>">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                </div>

            <?php else: ?>
                <div class="message error">
                    <i class="fas fa-exclamation-circle"></i>
                    Invalid reset session. Please start over.
                </div>
                <div class="links">
                    <a href="reset_password.php">
                        <i class="fas fa-redo"></i> Start Over
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Format reset code input
            $('#code').on('input', function () {
                this.value = this.value.replace(/[^A-Z0-9]/gi, '').toUpperCase().substring(0, 8);
            });

            // Password strength checker
            $('#password').on('input', function () {
                checkPasswordStrength($(this).val());
            });

            // Password confirmation checker
            $('#confirm_password').on('input', function () {
                checkPasswordMatch();
            });

            // Auto-focus
            if ($('#email').length) $('#email').focus();
            if ($('#code').length) $('#code').focus();
            if ($('#password').length) $('#password').focus();
        });

        function checkPasswordStrength(password) {
            let strength = 0;
            const strengthText = $('#strengthText');
            const strengthFill = $('#strengthFill');

            strengthFill.css({ 'width': '0%', 'background': '#e9ecef' });

            if (password.length === 0) {
                strengthText.text('Password strength: None');
                return;
            }

            if (password.length >= 8) strength += 25;
            if (/[a-z]/.test(password)) strength += 25;
            if (/[A-Z]/.test(password)) strength += 25;
            if (/[0-9]/.test(password)) strength += 25;

            let strengthLevel = 'Weak';
            let color = '#dc3545';

            if (strength >= 75) {
                strengthLevel = 'Strong';
                color = '#28a745';
            } else if (strength >= 50) {
                strengthLevel = 'Good';
                color = '#ffc107';
            } else if (strength >= 25) {
                strengthLevel = 'Fair';
                color = '#fd7e14';
            }

            strengthFill.css({ 'width': strength + '%', 'background': color });
            strengthText.text('Password strength: ' + strengthLevel);
            strengthText.css('color', color);
        }

        function checkPasswordMatch() {
            const password = $('#password').val();
            const confirmPassword = $('#confirm_password').val();
            const matchDiv = $('#passwordMatch');

            if (confirmPassword.length === 0) {
                matchDiv.hide();
                return;
            }

            if (password === confirmPassword) {
                matchDiv.text('✓ Passwords match').addClass('match-valid').removeClass('match-invalid').show();
            } else {
                matchDiv.text('✗ Passwords do not match').addClass('match-invalid').removeClass('match-valid').show();
            }
        }
    </script>
</body>

</html>

<?php
// Close database connection
mysqli_close($con);
?>