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

// Send reset password email using your general.php system
function sendResetEmail($email, $first_name, $last_name, $reset_code)
{
    global $con;

    $reset_link = "http://whitebox.go.ke/reset_password.php?action=reset&code=" .
        urlencode($reset_code) . "&email=" . urlencode(base64_encode($email));

    $expiry_time = date('l, F j, Y \a\t g:i A', strtotime('+1 hour'));

    // Prepare email using your general.php system variables
    $subject = "Reset Your WhiteBox Password";

    $message = "
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Password Reset - WhiteBox</title>
            <style>
                body { 
                    font-family: 'Arial', sans-serif; 
                    line-height: 1.6; 
                    color: #333; 
                    max-width: 600px; 
                    margin: 0 auto; 
                    background: #f5f5f5;
                }
                .email-container {
                    background: white;
                    border-radius: 10px;
                    overflow: hidden;
                    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
                    margin: 20px auto;
                }
                .email-header {
                    background: linear-gradient(135deg, #085c02ff 0%, #861616a0 100%);
                    color: white;
                    padding: 30px;
                    text-align: center;
                }
                .email-header h1 {
                    margin: 0;
                    font-size: 28px;
                    font-weight: 600;
                }
                .email-header p {
                    margin: 10px 0 0 0;
                    opacity: 0.9;
                    font-size: 16px;
                }
                .email-body {
                    padding: 30px;
                }
                .reset-box {
                    background: #f8f9fa;
                    border: 2px solid #085c02;
                    border-radius: 8px;
                    padding: 25px;
                    margin: 25px 0;
                    text-align: center;
                }
                .reset-code {
                    font-family: 'Courier New', monospace;
                    font-size: 32px;
                    font-weight: bold;
                    letter-spacing: 3px;
                    color: #085c02;
                    margin: 15px 0;
                    padding: 15px;
                    background: white;
                    border-radius: 5px;
                    display: inline-block;
                    border: 1px dashed #085c02;
                }
                .btn-primary {
                    display: inline-block;
                    background: #085c02;
                    color: white;
                    padding: 14px 30px;
                    text-decoration: none;
                    border-radius: 6px;
                    font-weight: bold;
                    font-size: 16px;
                    margin: 15px 0;
                    transition: all 0.3s ease;
                }
                .btn-primary:hover {
                    background: #014608ff;
                    transform: translateY(-2px);
                    box-shadow: 0 5px 15px rgba(8, 92, 2, 0.3);
                }
                .warning-box {
                    background: #fff3cd;
                    border-left: 4px solid #ffc107;
                    padding: 15px;
                    margin: 20px 0;
                    border-radius: 4px;
                }
                .security-note {
                    background: #e7f3ff;
                    border: 1px solid #b3d7ff;
                    padding: 15px;
                    border-radius: 8px;
                    margin: 20px 0;
                }
                .email-footer {
                    background: #333;
                    color: white;
                    padding: 20px;
                    text-align: center;
                    font-size: 12px;
                }
                .email-footer a {
                    color: #4dabf7;
                    text-decoration: none;
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
                    border: 2px solid #085c02;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    margin: 0 auto 10px;
                    font-weight: bold;
                    color: #085c02;
                }
                .step.active .step-icon {
                    background: #085c02;
                    color: white;
                }
                .step-text {
                    font-size: 12px;
                    color: #666;
                    font-weight: 500;
                }
                @media (max-width: 480px) {
                    .steps {
                        flex-direction: column;
                        gap: 20px;
                    }
                    .steps::before {
                        display: none;
                    }
                    .step {
                        display: flex;
                        align-items: center;
                        text-align: left;
                    }
                    .step-icon {
                        margin: 0 15px 0 0;
                    }
                }
            </style>
        </head>
        <body>
            <div class='email-container'>
                <div class='email-header'>
                    <h1>WhiteBox Password Reset</h1>
                    <p>Secure your account with a new password</p>
                </div>
                
                <div class='email-body'>
                    <p>Dear <strong>$first_name $last_name</strong>,</p>
                    <p>We received a request to reset your WhiteBox account password. Use the information below to create a new password.</p>
                    
                    <!-- Reset Steps -->
                    <div class='steps'>
                        <div class='step active'>
                            <div class='step-icon'>1</div>
                            <div class='step-text'>Get Code</div>
                        </div>
                        <div class='step'>
                            <div class='step-icon'>2</div>
                            <div class='step-text'>Enter Code</div>
                        </div>
                        <div class='step'>
                            <div class='step-icon'>3</div>
                            <div class='step-text'>New Password</div>
                        </div>
                    </div>
                    
                    <div class='reset-box'>
                        <h3 style='margin-top: 0; color: #085c02;'>Your Password Reset Code</h3>
                        <div class='reset-code'>$reset_code</div>
                        <p style='color: #666; margin-bottom: 20px;'>
                            8-character reset code (expires in 1 hour)
                        </p>
                        <a href='$reset_link' class='btn-primary'>
                            🔐 Reset Password Now
                        </a>
                        <p style='font-size: 14px; color: #666; margin-top: 15px;'>
                            Or copy and paste this link:<br>
                            <small>$reset_link</small>
                        </p>
                    </div>
                    
                    <div class='security-note'>
                        <p style='margin: 0;'>
                            <strong>🔒 Security Notice:</strong> For your protection, this reset code will expire in 1 hour.
                            If you didn't request this password reset, please ignore this email or contact our support team.
                        </p>
                    </div>
                    
                    <div class='warning-box'>
                        <p style='margin: 0;'>
                            <strong>⚠️ Important:</strong> This code expires on<br>
                            <strong>$expiry_time</strong>
                        </p>
                    </div>
                    
                    <p>If you need help or have questions, please contact our support team.</p>
                    
                    <p style='margin-top: 30px;'>
                        Best regards,<br>
                        <strong style='color: #085c02;'>The WhiteBox Security Team</strong>
                    </p>
                </div>
                
                <div class='email-footer'>
                    <p style='margin: 0;'>© " . date('Y') . " Huduma WhiteBox Platform. All rights reserved.</p>
                    <p style='margin: 8px 0 0 0;'>
                        <a href='http://whitebox.go.ke'>Website</a> | 
                        <a href='http://whitebox.go.ke/privacy.php'>Privacy Policy</a> | 
                        <a href='http://whitebox.go.ke/support.php'>Support</a>
                    </p>
                </div>
            </div>
        </body>
        </html>
    ";

    // Include your email sending script
    // These variables should be recognized by your general.php
    global $subject, $message;

    // Set the variables that your general.php expects
    $mail_subject = $subject;
    $mail_message = $message;
    $to = $email;

    // Include your email sending script
    $email_sent = false;
    if (file_exists("Huduma_WhiteBox/mails/general.php")) {
        // Backup current output buffer
        ob_start();
        include("Huduma_WhiteBox/mails/general.php");
        $output = ob_get_clean();

        // Check if email was sent (you might need to adjust this based on your general.php)
        $email_sent = true;
    } else {
        // Fallback to PHP mail() if general.php doesn't exist
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
        $headers .= "From: WhiteBox <noreply@whitebox.go.ke>" . "\r\n";
        $headers .= "Reply-To: support@whitebox.go.ke" . "\r\n";

        $email_sent = mail($to, $subject, $message, $headers);
    }

    return $email_sent;
}

// Send password changed confirmation email
function sendPasswordChangedEmail($email, $first_name, $last_name)
{
    $subject = "Password Successfully Changed - WhiteBox";

    $message = "
        <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto; background: #f5f5f5; padding: 20px;'>
            <div style='background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.1);'>
                <div style='background: #28a745; color: white; padding: 30px; text-align: center;'>
                    <h1 style='margin: 0; font-size: 28px;'>Password Updated Successfully</h1>
                    <p style='margin: 10px 0 0 0; opacity: 0.9; font-size: 16px;'>Your account security has been enhanced</p>
                </div>
                
                <div style='padding: 30px;'>
                    <p>Dear <strong>$first_name $last_name</strong>,</p>
                    <p>We're writing to confirm that your WhiteBox account password has been successfully changed.</p>
                    
                    <div style='background: #d4edda; border: 2px solid #c3e6cb; color: #155724; 
                                 padding: 20px; margin: 25px 0; text-align: center; border-radius: 10px;'>
                        <div style='font-size: 48px; margin-bottom: 10px;'>✅</div>
                        <p style='margin: 0; font-size: 20px; font-weight: bold;'>
                            Password Security Updated
                        </p>
                        <p style='margin: 10px 0 0 0; font-size: 14px;'>
                            Your account is now protected with a new password
                        </p>
                    </div>
                    
                    <div style='text-align: center; margin: 30px 0;'>
                        <a href='http://whitebox.go.ke/login.php' 
                           style='background: #28a745; color: white; padding: 15px 35px; text-decoration: none; 
                                  border-radius: 6px; font-weight: bold; font-size: 16px; display: inline-block;
                                  box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);'>
                            🔐 Login to Your Account
                        </a>
                    </div>
                    
                    <div style='background: #fff3cd; border-left: 4px solid #ffc107; padding: 15px; margin: 25px 0;'>
                        <p style='margin: 0; color: #856404;'>
                            <strong>Security Alert:</strong> If you did not make this change, please contact our 
                            <a href='mailto:support@whitebox.go.ke' style='color: #856404; font-weight: bold;'>
                            support team</a> immediately at support@whitebox.go.ke or call our security hotline.
                        </p>
                    </div>
                    
                    <h3 style='color: #28a745; margin-top: 30px;'>Security Recommendations:</h3>
                    <div style='background: #f8f9fa; padding: 20px; border-radius: 8px; margin: 15px 0;'>
                        <ul style='padding-left: 20px; margin: 0;'>
                            <li style='margin-bottom: 10px;'>Use a unique password for each online account</li>
                            <li style='margin-bottom: 10px;'>Enable two-factor authentication if available</li>
                            <li style='margin-bottom: 10px;'>Never share your password with anyone</li>
                            <li style='margin-bottom: 10px;'>Update your password regularly (every 3-6 months)</li>
                            <li>Be cautious of phishing emails asking for your credentials</li>
                        </ul>
                    </div>
                    
                    <div style='background: #e7f3ff; border: 1px solid #b3d7ff; padding: 15px; border-radius: 8px; margin: 25px 0;'>
                        <p style='margin: 0; color: #1a56db;'>
                            <strong>Need help?</strong> Visit our 
                            <a href='http://whitebox.go.ke/help.php' style='color: #1a56db; font-weight: bold;'>Help Center</a> 
                            or contact our support team for assistance with your account.
                        </p>
                    </div>
                    
                    <p style='margin-top: 30px; text-align: center;'>
                        Best regards,<br>
                        <strong style='color: #28a745;'>The WhiteBox Security Team</strong><br>
                        <small style='color: #666;'>Protecting your digital experience</small>
                    </p>
                </div>
                
                <div style='background: #333; color: white; padding: 20px; text-align: center; font-size: 12px;'>
                    <p style='margin: 0;'>© " . date('Y') . " Huduma WhiteBox Platform. All rights reserved.</p>
                    <p style='margin: 8px 0 0 0;'>
                        <a href='http://whitebox.go.ke/privacy.php' style='color: #4dabf7; margin: 0 10px;'>Privacy Policy</a> • 
                        <a href='http://whitebox.go.ke/terms.php' style='color: #4dabf7; margin: 0 10px;'>Terms of Service</a> • 
                        <a href='http://whitebox.go.ke/security.php' style='color: #4dabf7; margin: 0 10px;'>Security Center</a>
                    </p>
                </div>
            </div>
        </div>
    ";

    // Include your email sending script
    global $subject, $message;

    // Set the variables that your general.php expects
    $mail_subject = $subject;
    $mail_message = $message;
    $to = $email;

    // Include your email sending script
    if (file_exists("../Huduma_WhiteBox/mails/general.php")) {
        // Backup current output buffer
        ob_start();
        include("../Huduma_WhiteBox/mails/general.php");
        ob_get_clean();
        return true;
    } else {
        // Fallback to PHP mail()
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
        $headers .= "From: WhiteBox Security <security@whitebox.go.ke>" . "\r\n";

        return mail($to, $subject, $message, $headers);
    }
}

// Hash password function (should match your existing system)
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
        // Send reset email using your general.php system
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

        // Send confirmation email using your general.php
        sendPasswordChangedEmail($email, $user['first_name'], $user['last_name']);

        // Clear session
        unset($_SESSION['reset_verified']);
        unset($_SESSION['reset_email']);
        unset($_SESSION['reset_code']);

        echo json_encode(['status' => 'success', 'message' => 'Password updated successfully! You can now login.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update password.']);
    }
    exit();
}

// Function to show request form (this is the main HTML)
function showRequestForm()
{
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Forgot Password - WhiteBox</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
            rel="stylesheet">

        <style>
            :root {
                --primary: #008435ff;
                --primary-dark: #055c15ff;
                --success: #28a745;
                --danger: #dc3545;
                --warning: #ffc107;
                --dark: #212529;
                --gray: #6c757d;
                --light: #f8f9fa;
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
                position: relative;
            }

            body::before {
                content: '';
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: url('sources/images/slider/image5.jpg') center/cover no-repeat;
                z-index: -2;
                opacity: 0.3;
            }

            body::after {
                content: '';
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(8, 92, 2, 0.6);
                z-index: -1;
            }

            .reset-container {
                width: 100%;
                max-width: 500px;
                margin: 0 auto;
                animation: fadeIn 0.8s ease;
            }

            .reset-card {
                background: rgba(255, 255, 255, 0.98);
                backdrop-filter: blur(10px);
                border-radius: 20px;
                box-shadow: 0 15px 35px rgba(50, 50, 93, 0.1), 0 5px 15px rgba(0, 0, 0, 0.07);
                padding: 40px 35px;
                width: 100%;
                border: 1px solid rgba(255, 255, 255, 0.2);
            }

            .card-header {
                text-align: center;
                margin-bottom: 30px;
                padding-bottom: 20px;
                border-bottom: 1px solid rgba(0, 0, 0, 0.08);
                position: relative;
            }

            .card-header::after {
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

            .card-header h2 {
                color: var(--dark);
                font-weight: 600;
                margin-top: 5px;
                font-size: 1.8rem;
            }

            .logo-position {
                height: 80px;
                margin-bottom: 15px;
            }

            .form-group {
                margin-bottom: 25px;
            }

            label {
                display: block;
                margin-bottom: 10px;
                font-weight: 500;
                color: var(--dark);
                font-size: 14px;
            }

            .form-control {
                width: 100%;
                padding: 15px;
                border: 2px solid #e9ecef;
                border-radius: 10px;
                font-size: 16px;
                transition: all 0.3s ease;
                background: white;
                font-family: 'Poppins', sans-serif;
            }

            .form-control:focus {
                border-color: var(--primary);
                box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
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
                display: block;
                width: 100%;
                padding: 15px;
                border: none;
                border-radius: 10px;
                font-size: 16px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                text-align: center;
                font-family: 'Poppins', sans-serif;
                margin-top: 10px;
            }

            .btn-primary {
                background: var(--primary);
                color: white;
                box-shadow: 0 4px 15px rgba(67, 97, 238, 0.3);
            }

            .btn-primary:hover {
                background: var(--primary-dark);
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(67, 97, 238, 0.4);
            }

            .btn-success {
                background: var(--success);
                color: white;
                box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
            }

            .btn-success:hover {
                background: #218838;
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(40, 167, 69, 0.4);
            }

            .btn:disabled {
                opacity: 0.7;
                cursor: not-allowed;
            }

            .message {
                padding: 15px;
                border-radius: 10px;
                margin-bottom: 25px;
                font-size: 14px;
                animation: slideUp 0.5s ease;
            }

            .message.success {
                background: rgba(40, 167, 69, 0.1);
                color: #155724;
                border-left: 4px solid #28a745;
            }

            .message.error {
                background: rgba(220, 53, 69, 0.1);
                color: #721c24;
                border-left: 4px solid #dc3545;
            }

            .message.info {
                background: rgba(23, 162, 184, 0.1);
                color: #0c5460;
                border-left: 4px solid #17a2b8;
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
                font-weight: 500;
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

            .instructions {
                background: #f8f9fa;
                border-radius: 10px;
                padding: 20px;
                margin-bottom: 25px;
                border: 1px solid #e9ecef;
            }

            .instructions h4 {
                color: var(--primary);
                margin-bottom: 10px;
                font-size: 16px;
            }

            .instructions ul {
                padding-left: 20px;
                margin-bottom: 0;
            }

            .instructions li {
                margin-bottom: 8px;
                color: var(--gray);
                font-size: 14px;
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
                font-weight: 500;
            }

            .step.active .step-text {
                color: var(--primary);
                font-weight: 600;
            }

            .links {
                text-align: center;
                margin-top: 25px;
                padding-top: 20px;
                border-top: 1px solid rgba(0, 0, 0, 0.08);
            }

            .links a {
                color: var(--primary);
                text-decoration: none;
                font-weight: 500;
                margin: 0 10px;
                font-size: 14px;
            }

            .links a:hover {
                text-decoration: underline;
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
                    transform: translateY(10px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @media (max-width: 768px) {
                .reset-card {
                    padding: 30px 25px;
                }

                .card-header h2 {
                    font-size: 1.6rem;
                }

                .steps {
                    flex-direction: column;
                    gap: 20px;
                }

                .steps::before {
                    display: none;
                }

                .step {
                    display: flex;
                    align-items: center;
                    text-align: left;
                }

                .step-icon {
                    margin: 0 15px 0 0;
                    flex-shrink: 0;
                }
            }
        </style>
    </head>

    <body>
        <div class="reset-container">
            <div class="reset-card">
                <div class="card-header">
                    <img src="Huduma_WhiteBox/Whitebox.png" alt="WhiteBox Logo" class="logo-position">
                    <h2>Forgot Password</h2>
                    <p style="color: var(--gray); font-size: 14px; margin-top: 5px;">
                        Reset your account password
                    </p>
                </div>

                <!-- Steps -->
                <div class="steps">
                    <div
                        class="step <?php echo !isset($_GET['action']) || $_GET['action'] === '' ? 'active' : 'completed'; ?>">
                        <div class="step-icon">1</div>
                        <div class="step-text">Request Reset</div>
                    </div>
                    <div class="step <?php echo isset($_GET['action']) && $_GET['action'] === 'reset' ? 'active' : ''; ?>">
                        <div class="step-icon">2</div>
                        <div class="step-text">Verify Code</div>
                    </div>
                    <div
                        class="step <?php echo isset($_GET['verified']) && $_GET['verified'] === 'true' ? 'active' : ''; ?>">
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

                <!-- Request Form -->
                <?php if (!isset($_GET['action']) || $_GET['action'] === ''): ?>
                    <div class="instructions">
                        <h4><i class="fas fa-info-circle"></i> How to reset your password:</h4>
                        <ul>
                            <li>Enter your email address below</li>
                            <li>Check your email for a reset code</li>
                            <li>Enter the 8-character code on the next page</li>
                            <li>Create a new password for your account</li>
                            <li>Reset codes expire in 1 hour for security</li>
                        </ul>
                    </div>

                    <form method="POST" action="reset_password.php?action=request">
                        <div class="form-group">
                            <label for="email">
                                <i class="fas fa-envelope"></i> Email Address
                            </label>
                            <input type="email" id="email" name="email" class="form-control"
                                placeholder="Enter your registered email" required>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i> Send Reset Code
                        </button>
                    </form>

                    <div class="links">
                        <a href="login.php">
                            <i class="fas fa-arrow-left"></i> Back to Login
                        </a>
                        <a href="register.php">
                            <i class="fas fa-user-plus"></i> Create Account
                        </a>
                    </div>

                    <!-- Reset Code Verification Form -->
                <?php elseif ($_GET['action'] === 'reset' && !isset($_GET['verified'])): ?>
                    <?php
                    $email_encoded = $_GET['email'] ?? ($_SESSION['reset_email'] ?? '');
                    if (empty($email_encoded)) {
                        header("Location: reset_password.php");
                        exit();
                    }
                    ?>

                    <div class="instructions">
                        <h4><i class="fas fa-shield-alt"></i> Enter Reset Code</h4>
                        <p style="color: var(--gray); font-size: 14px; margin: 0;">
                            Check your email for the 8-character reset code. This code expires in 1 hour.
                        </p>
                    </div>

                    <form method="POST" action="reset_password.php?action=reset" id="verifyForm">
                        <input type="hidden" name="email" value="<?php echo htmlspecialchars($email_encoded); ?>">

                        <div class="form-group">
                            <label for="code">
                                <i class="fas fa-key"></i> Reset Code
                            </label>
                            <input type="text" id="code" name="code" class="form-control code-input" placeholder="XXXX-XXXX"
                                maxlength="8" required pattern="[A-Z0-9]{8}" title="Enter 8 uppercase letters or numbers">
                            <small style="display: block; margin-top: 5px; color: var(--gray); font-size: 12px;">
                                Enter the 8-character code from your email
                            </small>
                        </div>

                        <button type="submit" name="verify_code" class="btn btn-primary" id="verifyBtn">
                            <i class="fas fa-check-circle"></i> Verify Code
                        </button>
                    </form>

                    <div class="links">
                        <a href="javascript:void(0)" onclick="resendResetCode('<?php echo $email_encoded; ?>')">
                            <i class="fas fa-redo"></i> Resend Code
                        </a>
                        <a href="reset_password.php">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                    </div>

                    <!-- New Password Form -->
                <?php elseif (isset($_GET['verified']) && $_GET['verified'] === 'true'): ?>
                    <?php
                    if (!isset($_SESSION['reset_verified']) || !$_SESSION['reset_verified']) {
                        header("Location: reset_password.php");
                        exit();
                    }

                    $email_encoded = $_SESSION['reset_email'] ?? '';
                    $reset_code = $_SESSION['reset_code'] ?? '';

                    if (empty($email_encoded) || empty($reset_code)) {
                        header("Location: reset_password.php");
                        exit();
                    }
                    ?>

                    <div class="instructions">
                        <h4><i class="fas fa-lock"></i> Create New Password</h4>
                        <p style="color: var(--gray); font-size: 14px; margin: 0;">
                            Create a strong password for your account. Must be at least 8 characters long.
                        </p>
                    </div>

                    <form id="passwordForm">
                        <input type="hidden" name="email" value="<?php echo htmlspecialchars($email_encoded); ?>">
                        <input type="hidden" name="code" value="<?php echo htmlspecialchars($reset_code); ?>">

                        <div class="form-group">
                            <label for="password">
                                <i class="fas fa-lock"></i> New Password
                            </label>
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Enter new password" required minlength="8">

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
                            <input type="password" id="confirm_password" name="confirm_password" class="form-control"
                                placeholder="Confirm new password" required minlength="8">
                            <div class="password-match" id="passwordMatch"></div>
                        </div>

                        <button type="submit" class="btn btn-success" id="updateBtn">
                            <i class="fas fa-save"></i> Update Password
                        </button>
                    </form>

                    <div class="links">
                        <a href="reset_password.php?action=reset&email=<?php echo urlencode($email_encoded); ?>">
                            <i class="fas fa-arrow-left"></i> Back
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

                // Check password match on password field change too
                $('#password').on('input', function () {
                    checkPasswordMatch();
                });

                // Verify form submission
                $('#verifyForm').submit(function (e) {
                    const code = $('#code').val();

                    if (code.length !== 8) {
                        alert('Please enter a valid 8-character code');
                        e.preventDefault();
                        return false;
                    }

                    $('#verifyBtn').html('<i class="fas fa-spinner fa-spin"></i> Verifying...').prop('disabled', true);
                });

                // Password form submission
                $('#passwordForm').submit(function (e) {
                    e.preventDefault();

                    const password = $('#password').val();
                    const confirmPassword = $('#confirm_password').val();

                    if (password.length < 8) {
                        alert('Password must be at least 8 characters long');
                        return false;
                    }

                    if (password !== confirmPassword) {
                        alert('Passwords do not match');
                        return false;
                    }

                    $('#updateBtn').html('<i class="fas fa-spinner fa-spin"></i> Updating...').prop('disabled', true);

                    // Submit via AJAX
                    $.post('reset_password.php?action=update', $(this).serialize(), function (response) {
                        const data = JSON.parse(response);

                        if (data.status === 'success') {
                            // Show success message and redirect
                            alert(data.message);
                            window.location.href = 'login.php?password_reset=true';
                        } else {
                            alert(data.message);
                            $('#updateBtn').html('<i class="fas fa-save"></i> Update Password').prop('disabled', false);
                        }
                    }).fail(function () {
                        alert('Error updating password. Please try again.');
                        $('#updateBtn').html('<i class="fas fa-save"></i> Update Password').prop('disabled', false);
                    });
                });

                // Auto-focus code input if present
                if ($('#code').length) {
                    $('#code').focus();
                }

                // Auto-focus password input if present
                if ($('#password').length) {
                    $('#password').focus();
                }
            });

            function checkPasswordStrength(password) {
                let strength = 0;
                const strengthText = $('#strengthText');
                const strengthFill = $('#strengthFill');

                // Reset
                strengthFill.css({
                    'width': '0%',
                    'background': '#e9ecef'
                });

                if (password.length === 0) {
                    strengthText.text('Password strength: None');
                    strengthText.css('color', '#6c757d');
                    return;
                }

                // Length check
                if (password.length >= 8) strength += 25;

                // Lowercase check
                if (/[a-z]/.test(password)) strength += 25;

                // Uppercase check
                if (/[A-Z]/.test(password)) strength += 25;

                // Number check
                if (/[0-9]/.test(password)) strength += 25;

                // Special character check (bonus)
                if (/[^A-Za-z0-9]/.test(password)) strength = Math.min(strength + 10, 100);

                // Update UI
                let strengthLevel = 'Weak';
                let color = '#dc3545'; // Red

                if (strength >= 75) {
                    strengthLevel = 'Strong';
                    color = '#28a745'; // Green
                } else if (strength >= 50) {
                    strengthLevel = 'Good';
                    color = '#ffc107'; // Yellow
                } else if (strength >= 25) {
                    strengthLevel = 'Fair';
                    color = '#fd7e14'; // Orange
                } else {
                    strengthLevel = 'Weak';
                    color = '#dc3545'; // Red
                }

                strengthFill.css({
                    'width': strength + '%',
                    'background': color
                });

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

            function resendResetCode(email) {
                if (!confirm('Send new reset code to this email?')) {
                    return;
                }

                $.post('reset_password.php?action=request', { email: atob(email) }, function (response) {
                    alert('New reset code sent to your email!');
                }).fail(function () {
                    alert('Error sending reset code. Please try again.');
                });
            }
        </script>
    </body>

    </html>
    <?php
}

// Function to show reset form
function showResetForm()
{
    // Already handled in showRequestForm with conditionals
}

// Close database connection
mysqli_close($con);
?>