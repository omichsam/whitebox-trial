<?php
include("../connect.php");

function generateResetToken()
{
    return bin2hex(random_bytes(32));
}

function sendPasswordResetEmail($email, $first_name, $reset_token)
{
    ignore_user_abort(true);

    $reset_link = "http://whitebox.go.ke/reset_password.php?token=" . urlencode($reset_token);
    
    $subject = "Password Reset Request - WhiteBox";
    $message = "
    <html>
    <head>
        <title>Password Reset</title>
    </head>
    <body>
        <h2>Password Reset Request</h2>
        <p>Dear $first_name,</p>
        <p>We received a request to reset your password. Click the button below to reset it:</p>
        <p><a href='$reset_link' style='background-color: #dc3545; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Reset Password</a></p>
        <p>Or copy and paste this link in your browser:<br>
        <code>$reset_link</code></p>
        <p>This reset link will expire in 1 hour.</p>
        <p>If you didn't request a password reset, please ignore this email.</p>
        <br>
        <p>Best regards,<br>WhiteBox Team</p>
    </body>
    </html>";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: no-reply@whitebox.go.ke" . "\r\n";

    return mail($email, $subject, $message, $headers);
}

// Main execution
header('Content-Type: application/json');

if (!isset($_POST['remail'])) {
    echo base64_encode(json_encode([
        'status' => 'error',
        'message' => 'Email address required'
    ]));
    exit;
}

$email = strtolower(mysqli_real_escape_string($con, $_POST['remail']));

// Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo base64_encode(json_encode([
        'status' => 'error',
        'message' => 'Invalid email format'
    ]));
    exit;
}

// Check if user exists and is activated
$user_query = mysqli_query($con, "SELECT id, first_name FROM users WHERE email = '$email' AND country IS NOT NULL AND county_id IS NOT NULL");
if (mysqli_num_rows($user_query) == 0) {
    echo base64_encode(json_encode([
        'status' => 'error',
        'message' => 'Email not found or account not activated'
    ]));
    exit;
}

$user = mysqli_fetch_assoc($user_query);

// Generate reset token
$reset_token = generateResetToken();
$token_expires = date('Y-m-d H:i:s', strtotime('+1 hour'));
$current_time = date('Y-m-d H:i:s');

// Store reset token
$sql = "UPDATE users SET 
        token = '$reset_token',
        token_type = 'reset',
        token_expires_at = '$token_expires',
        updated_at = '$current_time'
        WHERE email = '$email'";

if (mysqli_query($con, $sql)) {
    // Send reset email
    $email_sent = sendPasswordResetEmail($email, $user['first_name'], $reset_token);
    
    $response = [
        'status' => 'success',
        'message' => 'Password reset instructions sent to your email',
        'email_sent' => $email_sent,
        'token' => base64_encode($reset_token)
    ];
    
    echo base64_encode(json_encode($response));
} else {
    echo base64_encode(json_encode([
        'status' => 'error',
        'message' => 'Failed to process reset request'
    ]));
}

mysqli_close($con);
?>