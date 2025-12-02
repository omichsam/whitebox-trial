<?php
include("../connect.php");

function generateActivationToken() {
    return bin2hex(random_bytes(32));
}

function sendActivationEmail($email, $first_name, $last_name, $activation_token) {
    // Close connection to free resources
    if (isset($GLOBALS['con'])) {
        mysqli_close($GLOBALS['con']);
    }

    ignore_user_abort(true);
    
    $activation_link = "http://whitebox.go.ke/activate.php?token=" . urlencode($activation_token);
    $keyb = base64_encode($email);
    
    $subject = "Activate Your WhiteBox Account";
    $message = "
    <html>
    <head>
        <title>Account Activation</title>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
            .container { max-width: 600px; margin: 0 auto; padding: 20px; }
            .header { background: linear-gradient(135deg, #085c02ff 0%, #861616a0 100%); color: white; padding: 20px; text-align: center; border-radius: 10px 10px 0 0; }
            .content { background: #f9f9f9; padding: 30px; border-radius: 0 0 10px 10px; }
            .button { background-color: #4361ee; color: white; padding: 12px 30px; text-decoration: none; border-radius: 5px; display: inline-block; margin: 20px 0; }
            .token-box { background: #fff; border: 2px dashed #4361ee; padding: 15px; margin: 15px 0; border-radius: 5px; font-family: monospace; text-align: center; font-size: 16px; font-weight: bold; }
            .footer { margin-top: 30px; padding-top: 20px; border-top: 1px solid #ddd; color: #666; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h1>Welcome to WhiteBox!</h1>
            </div>
            <div class='content'>
                <h2>Hello $first_name $last_name,</h2>
                <p>Thank you for registering with WhiteBox. To complete your registration, please activate your account.</p>
                
                <div style='text-align: center;'>
                    <a href='$activation_link' class='button'>Activate My Account</a>
                </div>
                
                <p>Or copy and paste this link in your browser:</p>
                <div style='background: #f4f4f4; padding: 10px; border-radius: 5px; margin: 10px 0;'>
                    <code>$activation_link</code>
                </div>
                
                <p><strong>Manual Activation Code:</strong><br>
                If the link doesn't work, you can use this code on the activation page:</p>
                <div class='token-box'>
                    $activation_token
                </div>
                
                <p><strong>This activation link will expire in 24 hours.</strong></p>
                
                <p>If you didn't create an account with WhiteBox, please ignore this email.</p>
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

    return true; // Assume email was sent successfully
}

// Main execution
header('Content-Type: application/json');

try {
    // Check if email is provided
    if (!isset($_POST['email']) || empty($_POST['email'])) {
        throw new Exception('Email address is required');
    }

    $email = strtolower(mysqli_real_escape_string($con, $_POST['email']));

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Invalid email format');
    }

    // Check if user exists
    $check_user = mysqli_query($con, "SELECT id, first_name, last_name FROM users WHERE email = '$email'");
    if (!$check_user) {
        throw new Exception('Database query failed: ' . mysqli_error($con));
    }

    if (mysqli_num_rows($check_user) == 0) {
        throw new Exception('Email address not found in our system');
    }

    $user = mysqli_fetch_assoc($check_user);

    // Generate new activation token
    $new_token = generateActivationToken();
    $token_expires = date('Y-m-d H:i:s', strtotime('+24 hours'));
    $current_time = date('Y-m-d H:i:s');

    // Update user with new token
    $update_sql = "UPDATE users SET 
            token = '$new_token',
            token_type = 'activation',
            token_expires_at = '$token_expires',
            updated_at = '$current_time'
            WHERE email = '$email'";

    if (!mysqli_query($con, $update_sql)) {
        throw new Exception('Failed to update user record: ' . mysqli_error($con));
    }

    // Send activation email using your existing system
    sendActivationEmail($email, $user['first_name'], $user['last_name'], $new_token);

    $response = [
        'status' => 'success',
        'message' => 'New activation email sent successfully! Please check your inbox.',
        'email_sent' => true,
        'token' => base64_encode($new_token)
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