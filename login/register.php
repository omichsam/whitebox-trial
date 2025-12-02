<?php
session_start();
include("connect.php");

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check database connection
if (!$con) {
    die(base64_encode('db_error'));
}

// Hash password function
function hashword($string, $salt)
{
    return crypt($string, '$1$' . $salt . '$');
}

// Function to send activation email
function sendActivationEmail($email, $first_name, $last_name, $activation_code)
{
    $activation_link = "http://whitebox.go.ke/activate.php?code=" .
        urlencode($activation_code) . "&email=" . urlencode(base64_encode($email));

    $subject = "Activate Your WhiteBox Account";

    $message = "
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Activate Your Account</title>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; max-width: 600px; margin: 0 auto; }
                .header { background: linear-gradient(135deg, #085c02ff 0%, #861616a0 100%); color: white; padding: 25px; text-align: center; }
                .content { background: #ffffff; padding: 30px; border: 1px solid #e0e0e0; border-top: none; }
                .activation-box { background: #f8f9fa; border: 2px solid #085c02; padding: 25px; margin: 25px 0; text-align: center; border-radius: 10px; }
                .btn { display: inline-block; background: #085c02; color: white; padding: 14px 30px; text-decoration: none; 
                       border-radius: 6px; font-weight: bold; font-size: 16px; margin: 15px 0; }
                .warning { background: #fff3cd; border-left: 4px solid #ffc107; padding: 15px; margin: 20px 0; }
                .footer { text-align: center; margin-top: 30px; color: #666; font-size: 12px; }
                .code { font-family: 'Courier New', monospace; font-size: 18px; background: #f5f5f5; padding: 10px; margin: 10px 0; }
            </style>
        </head>
        <body>
            <div class='header'>
                <h1>Welcome to WhiteBox!</h1>
            </div>
            <div class='content'>
                <p>Dear <strong>$first_name $last_name</strong>,</p>
                <p>Thank you for registering with WhiteBox. To complete your registration, please activate your account.</p>
                
                <div class='activation-box'>
                    <h3>Activate Your Account</h3>
                    <p>Click the button below to activate your account:</p>
                    <a href='$activation_link' class='btn'>Activate Account</a>
                    <p style='margin-top: 15px; font-size: 14px;'>
                        Or copy and paste this link in your browser:<br>
                        <span class='code'>$activation_link</span>
                    </p>
                </div>
                
                <div class='warning'>
                    <p><strong>Note:</strong> This activation link will expire in 24 hours.</p>
                </div>
                
                <p>If you didn't create an account with WhiteBox, please ignore this email.</p>
                
                <p>Best regards,<br><strong>The WhiteBox Team</strong></p>
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
        // Fallback to PHP mail()
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
        $headers .= "From: WhiteBox <noreply@whitebox.go.ke>" . "\r\n";
        $headers .= "Reply-To: support@whitebox.go.ke" . "\r\n";

        return mail($email, $subject, $message, $headers);
    }
}

// Generate activation code
function generateActivationCode($length = 32)
{
    return bin2hex(random_bytes($length));
}

// Main registration logic
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Decode base64 encoded data from frontend
    $first_name = base64_decode($_POST['first_name'] ?? '');
    $last_name = base64_decode($_POST['last_name'] ?? '');
    $email = base64_decode($_POST['email'] ?? '');
    $phone = base64_decode($_POST['phone'] ?? '');
    $gender = base64_decode($_POST['gender'] ?? '');
    $password = base64_decode($_POST['password'] ?? '');
    $confirm_password = base64_decode($_POST['confirm_password'] ?? '');

    // Validate input
    if (
        empty($first_name) || empty($last_name) || empty($email) || empty($phone) ||
        empty($gender) || empty($password) || empty($confirm_password)
    ) {
        die(base64_encode('invalid_data'));
    }

    // Check if passwords match
    if ($password !== $confirm_password) {
        die(base64_encode('password_mismatch'));
    }

    // Check password length
    if (strlen($password) < 8) {
        die(base64_encode('password_short'));
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die(base64_encode('invalid_email'));
    }

    // Clean inputs
    $first_name = mysqli_real_escape_string($con, trim($first_name));
    $last_name = mysqli_real_escape_string($con, trim($last_name));
    $email = mysqli_real_escape_string($con, trim(strtolower($email)));
    $phone = mysqli_real_escape_string($con, trim($phone));
    $gender = mysqli_real_escape_string($con, trim($gender));

    // Check if email already exists
    $check_email = mysqli_query($con, "SELECT id FROM users WHERE email='$email'");
    if (mysqli_num_rows($check_email) > 0) {
        die(base64_encode('email_exists'));
    }

    // Check if phone already exists
    $check_phone = mysqli_query($con, "SELECT id FROM users WHERE phone='$phone'");
    if (mysqli_num_rows($check_phone) > 0) {
        die(base64_encode('phone_exists'));
    }

    // Hash password
    $salt = "A073955@am";
    $hashed_password = hashword(base64_encode($password), $salt);

    // Generate activation code
    $activation_code = generateActivationCode();
    $current_time = date('Y-m-d H:i:s');
    $activation_expires = date('Y-m-d H:i:s', strtotime('+24 hours'));

    // Default values
    $status = 'inactive';
    $role = 'user';
    $created_at = $current_time;
    $updated_at = $current_time;

    // Insert user into database
    $insert_query = "INSERT INTO users (first_name, last_name, email, phone, gender, password, 
                      status, role, activation_code, activation_expires, created_at, updated_at)
                     VALUES ('$first_name', '$last_name', '$email', '$phone', '$gender', 
                             '$hashed_password', '$status', '$role', '$activation_code', 
                             '$activation_expires', '$created_at', '$updated_at')";

    if (mysqli_query($con, $insert_query)) {
        // Send activation email
        if (sendActivationEmail($email, $first_name, $last_name, $activation_code)) {
            echo base64_encode('success');
        } else {
            // Even if email fails, registration succeeded
            echo base64_encode('success_no_email');
        }
    } else {
        error_log("Registration error: " . mysqli_error($con));
        die(base64_encode('db_error'));
    }
} else {
    die(base64_encode('invalid_request'));
}
?>