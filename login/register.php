<?php
session_start();
include("connect.php");

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check database connection
if (!$con) {
    die(json_encode(['status' => 'error', 'message' => 'Database connection failed']));
}

// Generate 8-character code
function generateCode($length = 8)
{
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
    return substr(str_shuffle($chars), 0, $length);
}

// Send reset password email using your mail script
function sendResetEmail($email, $first_name, $last_name, $reset_code)
{
    global $con;

    $reset_link = "http://whitebox.go.ke/reset_password.php?action=reset&code=" .
        urlencode($reset_code) . "&email=" . urlencode(base64_encode($email));

    $expiry_time = date('l, F j, Y \a\t g:i A', strtotime('+1 hour'));

    $subject = "Reset Your WhiteBox Password";

    $message = "
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Password Reset</title>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; }
                .header { background: linear-gradient(135deg, #085c02ff 0%, #861616a0 100%); color: white; padding: 25px; text-align: center; }
                .content { background: #ffffff; padding: 30px; border: 1px solid #e0e0e0; border-top: none; }
                .reset-box { background: #f8f9fa; border: 2px solid #085c02; padding: 25px; margin: 25px 0; text-align: center; border-radius: 10px; }
                .reset-code { font-family: 'Courier New', monospace; font-size: 32px; font-weight: bold; letter-spacing: 3px; color: #085c02; margin: 15px 0; }
                .btn { display: inline-block; background: #085c02; color: white; padding: 14px 30px; text-decoration: none; 
                       border-radius: 6px; font-weight: bold; font-size: 16px; margin: 15px 0; }
                .warning { background: #fff3cd; border-left: 4px solid #ffc107; padding: 15px; margin: 20px 0; }
                .footer { text-align: center; margin-top: 30px; color: #666; font-size: 12px; }
                .security-note { background: #e7f3ff; border: 1px solid #b3d7ff; padding: 15px; border-radius: 8px; margin: 20px 0; }
            </style>
        </head>
        <body>
            <div class='header'>
                <h1>Password Reset Request</h1>
            </div>
            <div class='content'>
                <p>Dear <strong>$first_name $last_name</strong>,</p>
                <p>We received a request to reset your WhiteBox account password.</p>
                
                <div class='reset-box'>
                    <h3>Your Password Reset Code</h3>
                    <div class='reset-code'>$reset_code</div>
                    <p>Enter this 8-character code on the reset page</p>
                    <a href='$reset_link' class='btn'>Reset Password Now</a>
                </div>
                
                <div class='security-note'>
                    <p><strong>Security Note:</strong> If you didn't request this password reset, please ignore this email. 
                    Your account security is important to us.</p>
                </div>
                
                <div class='warning'>
                    <p><strong>Expires:</strong> This code will expire on $expiry_time (1 hour from now)</p>
                </div>
                
                <p>For security reasons, this code can only be used once and will expire in 1 hour.</p>
                
                <p>Best regards,<br><strong>The WhiteBox Security Team</strong></p>
            </div>
            <div class='footer'>
                <p>© " . date('Y') . " WhiteBox. All rights reserved.</p>
            </div>
        </body>
        </html>
    ";

    // Use your mail script
    $mail_subject = $subject;
    $mail_message = $message;

    // Include your mail sending script
    if (file_exists("../Huduma_WhiteBox/mails/general.php")) {
        include("../Huduma_WhiteBox/mails/general.php");
        return true;
    } else {
        // Fallback to PHP mail() if your script doesn't exist
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
        $headers .= "From: WhiteBox Security <security@whitebox.go.ke>" . "\r\n";
        $headers .= "Reply-To: support@whitebox.go.ke" . "\r\n";

        return mail($email, $subject, $message, $headers);
    }
}

// Send password changed confirmation email
function sendPasswordChangedEmail($email, $first_name, $last_name)
{
    $subject = "Password Successfully Changed - WhiteBox";

    $message = "
        <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;'>
            <div style='background: #28a745; color: white; padding: 25px; text-align: center;'>
                <h1 style='margin: 0;'>Password Changed Successfully</h1>
            </div>
            <div style='padding: 30px; background: #f9f9f9;'>
                <p>Dear <strong>$first_name $last_name</strong>,</p>
                <p>Your WhiteBox account password has been successfully changed.</p>
                
                <div style='background: #d4edda; border: 2px solid #c3e6cb; color: #155724; 
                             padding: 20px; margin: 25px 0; text-align: center; border-radius: 10px;'>
                    <div style='font-size: 48px; margin-bottom: 10px;'>✅</div>
                    <p style='margin: 0; font-size: 18px; font-weight: bold;'>
                        Password Updated Successfully
                    </p>
                </div>
                
                <div style='background: #fff3cd; border-left: 4px solid #ffc107; padding: 15px; margin: 20px 0;'>
                    <p style='margin: 0; color: #856404;'>
                        <strong>Security Alert:</strong> If you did not make this change, 
                        please contact our support team immediately at 
                        <a href='mailto:support@whitebox.go.ke' style='color: #856404; font-weight: bold;'>
                        support@whitebox.go.ke</a>
                    </p>
                </div>
                
                <div style='text-align: center; margin: 30px 0;'>
                    <a href='http://whitebox.go.ke/login.php' 
                       style='background: #28a745; color: white; padding: 12px 24px; text-decoration: none; 
                              border-radius: 6px; font-weight: bold; font-size: 16px; display: inline-block;'>
                        Login to Your Account
                    </a>
                </div>
                
                <p>For your security, we recommend:</p>
                <ul style='padding-left: 20px;'>
                    <li>Using a strong, unique password</li>
                    <li>Enabling two-factor authentication if available</li>
                    <li>Not sharing your password with anyone</li>
                    <li>Regularly updating your password</li>
                </ul>
                
                <p>Best regards,<br><strong>The WhiteBox Security Team</strong></p>
            </div>
            <div style='background: #333; color: white; padding: 15px; text-align: center; font-size: 12px;'>
                <p style='margin: 0;'>© " . date('Y') . " WhiteBox. All rights reserved.</p>
            </div>
        </div>
    ";

    // Use your mail script
    $mail_subject = $subject;
    $mail_message = $message;

    // Include your mail sending script
    if (file_exists("/Huduma_WhiteBox/mails/general.php")) {
        include("/Huduma_WhiteBox/mails/general.php");
        return true;
    } else {
        // Fallback to PHP mail()
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
        $headers .= "From: WhiteBox Security <security@whitebox.go.ke>" . "\r\n";

        return mail($email, $subject, $message, $headers);
    }
}

// Hash password function
function hashword($string, $salt)
{
    return crypt($string, '$1$' . $salt . '$');
}

// Handle different actions
$action = $_GET['action'] ?? $_POST['action'] ?? '';

switch ($action) {

    case 'request':
        // Handle password reset request
        handleResetRequest();
        break;

    case 'reset':
        // Show reset password form or process reset
        handlePasswordReset();
        break;

    case 'verify':
        // Verify reset code (AJAX)
        verifyResetCode();
        break;

    case 'update':
        // Update password
        updatePassword();
        break;

    default:
        // Show request form
        showRequestForm();
        break;
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
        $_SESSION['reset_success'] = "If an account exists with this email, a reset code has been sent.";
        header("Location: reset_password.php");
        exit();
    }

    $user = mysqli_fetch_assoc($checkUser);
    $first_name = $user['first_name'];
    $last_name = $user['last_name'];

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
        // Send reset email using your mail script
        if (sendResetEmail($email, $first_name, $last_name, $reset_code)) {
            $_SESSION['reset_success'] = "Password reset code sent to your email!";
            $_SESSION['reset_email'] = base64_encode($email);
            header("Location: reset_password.php?action=reset&email=" . urlencode(base64_encode($email)));
        } else {
            $_SESSION['reset_error'] = "Failed to send email. Please try again.";
            header("Location: reset_password.php");
        }
    } else {
        $_SESSION['reset_error'] = "Failed to generate reset code. Please try again.";
        header("Location: reset_password.php");
    }
    exit();
}

// Function to handle password reset
function handlePasswordReset()
{
    global $con;

    // If form submitted with code verification
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['verify_code'])) {
        $code = $_POST['code'] ?? '';
        $email_encoded = $_POST['email'] ?? '';

        if (empty($code) || empty($email_encoded)) {
            $_SESSION['reset_error'] = "Please enter the reset code.";
            header("Location: reset_password.php?action=reset&email=" . urlencode($email_encoded));
            exit();
        }

        $email = base64_decode($email_encoded);
        $email = mysqli_real_escape_string($con, trim($email));
        $code = mysqli_real_escape_string($con, trim($code));

        // Verify reset code
        $result = verifyResetCodeInDB($email, $code);

        if ($result['status'] === 'success') {
            $_SESSION['reset_verified'] = true;
            $_SESSION['reset_email'] = $email_encoded;
            $_SESSION['reset_code'] = $code;
            header("Location: reset_password.php?action=reset&verified=true&email=" . urlencode($email_encoded));
        } else {
            $_SESSION['reset_error'] = $result['message'];
            header("Location: reset_password.php?action=reset&email=" . urlencode($email_encoded));
        }
        exit();
    }

    // Show reset form
    showResetForm();
}

// Function to verify reset code in database
function verifyResetCodeInDB($email, $code)
{
    global $con;

    // Check if token is valid and not expired
    $check_query = "SELECT * FROM users WHERE email='$email' 
                    AND token='$code' 
                    AND token_type='reset' 
                    AND token_expires_at > NOW()";

    $result = mysqli_query($con, $check_query);

    if (!$result) {
        return ['status' => 'error', 'message' => 'Database error.'];
    }

    if (mysqli_num_rows($result) > 0) {
        return ['status' => 'success', 'message' => 'Code verified successfully.'];
    }

    // Check different failure scenarios
    $check_expired = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND token='$code' 
                                        AND token_type='reset' AND token_expires_at <= NOW()");

    if (mysqli_num_rows($check_expired) > 0) {
        return ['status' => 'error', 'message' => 'Reset code has expired.'];
    }

    $check_wrong = mysqli_query($con, "SELECT * FROM users WHERE email='$email' AND token_type='reset'");

    if (mysqli_num_rows($check_wrong) > 0) {
        return ['status' => 'error', 'message' => 'Invalid reset code.'];
    }

    return ['status' => 'error', 'message' => 'No reset request found for this email.'];
}

// Function to verify reset code (AJAX)
function verifyResetCode()
{
    global $con;

    $code = $_POST['code'] ?? '';
    $email_encoded = $_POST['email'] ?? '';

    if (empty($code) || empty($email_encoded)) {
        echo json_encode(['status' => 'error', 'message' => 'Code and email required']);
        exit();
    }

    $email = base64_decode($email_encoded);
    $email = mysqli_real_escape_string($con, trim($email));
    $code = mysqli_real_escape_string($con, trim($code));

    $result = verifyResetCodeInDB($email, $code);
    echo json_encode($result);
    exit();
}

// Function to update password
function updatePassword()
{
    global $con;

    $salt = "A073955@am";

    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';
    $email_encoded = $_POST['email'] ?? '';
    $code = $_POST['code'] ?? '';

    // Validate inputs
    if (empty($password) || empty($confirm_password) || empty($email_encoded) || empty($code)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
        exit();
    }

    if ($password !== $confirm_password) {
        echo json_encode(['status' => 'error', 'message' => 'Passwords do not match.']);
        exit();
    }

    if (strlen($password) < 8) {
        echo json_encode(['status' => 'error', 'message' => 'Password must be at least 8 characters.']);
        exit();
    }

    $email = base64_decode($email_encoded);
    $email = mysqli_real_escape_string($con, trim($email));
    $code = mysqli_real_escape_string($con, trim($code));

    // Verify code again before updating password
    $verify_result = verifyResetCodeInDB($email, $code);

    if ($verify_result['status'] !== 'success') {
        echo json_encode(['status' => 'error', 'message' => $verify_result['message']]);
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
        // Get user info for confirmation email
        $user_query = mysqli_query($con, "SELECT first_name, last_name FROM users WHERE email='$email'");
        $user = mysqli_fetch_assoc($user_query);

        // Send confirmation email using your mail script
        sendPasswordChangedEmail($email, $user['first_name'], $user['last_name']);

        // Clear session
        unset($_SESSION['reset_verified']);
        unset($_SESSION['reset_email']);
        unset($_SESSION['reset_code']);

        echo json_encode(['status' => 'success', 'message' => 'Password updated successfully!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update password.']);
    }
    exit();
}

// Function to show request form
function showRequestForm()
{
    // [Rest of the HTML/JavaScript code remains exactly the same as before]
    // Only the email sending functions were updated above

    // The HTML/CSS/JavaScript from the previous version remains unchanged
    // This includes the form, styling, and JavaScript functions
    // ...
}