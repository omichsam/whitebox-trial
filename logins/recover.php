<?php
include("../connect.php");

function generateResetToken() {
    return bin2hex(random_bytes(32));
}

function sendPasswordResetEmail($email, $first_name, $last_name, $reset_token) {
    // Close connection to free resources
    if (isset($GLOBALS['con'])) {
        mysqli_close($GLOBALS['con']);
    }

    ignore_user_abort(true);
    
    $reset_link = "http://whitebox.go.ke/reset_password.php?token=" . urlencode($reset_token);
    $keyb = base64_encode($email);
    
    $subject = "Reset Your WhiteBox Password";
    $message = "
    <html>
    <head>
        <title>Password Reset</title>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background: linear-gradient(135deg, #085c02ff 0%, #861616a0 100%); color: white; padding: 20px; text-align: center; border-radius: 10px 10px 0 0; }
            .content { background: #f9f9f9; padding: 30px; border-radius: 0 0 10px 10px; }
            .button { background-color: #dc3545; color: white; padding: 12px 30px; text-decoration: none; border-radius: 5px; display: inline-block; margin: 20px 0; }
            .token-box { background: #fff; border: 2px dashed #dc3545; padding: 15px; margin: 15px 0; border-radius: 5px; font-family: monospace; text-align: center; font-size: 16px; font-weight: bold; }
            .footer { margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd; color: #666; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h1>Password Reset Request</h1>
            </div>
            <div class='content'>
                <h2>Hello $first_name $last_name,</h2>
                <p>We received a request to reset your password. Click the button below to reset it:</p>
                
                <div style='text-align: center;'>
                    <a href='$reset_link' class='button'>Reset Password</a>
                </div>
                
                <p>Or copy and paste this link in your browser:</p>
                <div style='background: #f4f4f4; padding: 10px; border-radius: 5px; margin: 10px 0;'>
                    <code>$reset_link</code>
                </div>
                
                <p><strong>Manual Reset Code:</strong><br>
                If the link doesn't work, you can use this code on the reset page:</p>
                <div class='token-box'>
                    $reset_token
                </div>
                
                <p><strong>This reset link will expire in 1 hour.</strong></p>
                
                <p>If you didn't request a password reset, please ignore this email.</p>
            </div>
            <div class='footer'>
                <p>Best regards,<br><strong>The WhiteBox Team</strong></p>
            </div>
        </div>
    </body>
    </html>";

    // Buffer and clean any output
    if (ob_get_level()) {
        ob_end_clean();
    }

    // Start output buffering again
    ob_start();

    // Include your existing mail system
    include("../Huduma_WhiteBox/mails/general.php");

    // Clean the buffer without sending
    ob_end_clean();

    return true;
}

// Main execution
header('Content-Type: application/json');

try {
    // Check if email is provided
    if (!isset($_POST['remail']) || empty($_POST['remail'])) {
        throw new Exception('Email address is required');
    }

    $email = strtolower(mysqli_real_escape_string($con, $_POST['remail']));

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Invalid email format');
    }

    // Check if user exists and is activated
    $user_query = mysqli_query($con, "SELECT id, first_name, last_name FROM users WHERE email = '$email' AND country IS NOT NULL AND county_id IS NOT NULL");
    if (mysqli_num_rows($user_query) == 0) {
        throw new Exception('Email not found or account not activated');
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

    if (!mysqli_query($con, $sql)) {
        throw new Exception('Failed to process reset request');
    }

    // Send reset email using your existing system
    sendPasswordResetEmail($email, $user['first_name'], $user['last_name'], $reset_token);

    $response = [
        'status' => 'success',
        'message' => 'Password reset instructions sent to your email',
        'email_sent' => true,
        'token' => base64_encode($reset_token)
    ];

    echo base64_encode(json_encode($response));

} catch (Exception $e) {
    $error_response = [
        'status' => 'error',
        'message' => $e->getMessage()
    ];
    echo base64_encode(json_encode($error_response));
} finally {
    mysqli_close($con);
}
?>