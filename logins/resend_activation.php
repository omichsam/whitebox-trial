<?php
include("../connect.php");

function resendActivationToken($email, $con)
{
    // Generate new activation token
    $new_token = bin2hex(random_bytes(32));
    $token_expires = date('Y-m-d H:i:s', strtotime('+24 hours'));
    $current_time = date('Y-m-d H:i:s');

    // Update user with new token
    $sql = "UPDATE users SET 
            token = '$new_token',
            token_type = 'activation',
            token_expires_at = '$token_expires',
            updated_at = '$current_time'
            WHERE email = '$email'";

    if (mysqli_query($con, $sql)) {
        // Get user details for email
        $user_query = mysqli_query($con, "SELECT first_name, last_name FROM users WHERE email = '$email'");
        $user = mysqli_fetch_assoc($user_query);
        
        // Send activation email
        $email_sent = sendActivationEmail($email, $user['first_name'], $user['last_name'], $new_token);
        
        return [
            'status' => 'success',
            'message' => 'Activation email sent successfully',
            'email_sent' => $email_sent,
            'token' => base64_encode($new_token)
        ];
    } else {
        return [
            'status' => 'error',
            'message' => 'Failed to resend activation email'
        ];
    }
}

function sendActivationEmail($email, $first_name, $last_name, $activation_token)
{
    ignore_user_abort(true);

    $activation_link = "http://whitebox.go.ke/activate.php?token=" . urlencode($activation_token);
    
    $subject = "Activate Your WhiteBox Account";
    $message = "
    <html>
    <head>
        <title>Account Activation</title>
    </head>
    <body>
        <h2>Activate Your WhiteBox Account</h2>
        <p>Dear $first_name $last_name,</p>
        <p>You requested a new activation link. Please click the button below to activate your account:</p>
        <p><a href='$activation_link' style='background-color: #4CAF50; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Activate Account</a></p>
        <p>Or copy and paste this link in your browser:<br>
        <code>$activation_link</code></p>
        <p>This activation link will expire in 24 hours.</p>
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

if (isset($_POST['email'])) {
    $email = strtolower(mysqli_real_escape_string($con, $_POST['email']));
    
    // Check if user exists
    $check_user = mysqli_query($con, "SELECT id FROM users WHERE email = '$email'");
    if (mysqli_num_rows($check_user) == 0) {
        echo base64_encode(json_encode([
            'status' => 'error',
            'message' => 'Email not found'
        ]));
        exit;
    }

    $result = resendActivationToken($email, $con);
    echo base64_encode(json_encode($result));
} else {
    echo base64_encode(json_encode([
        'status' => 'error',
        'message' => 'Email address required'
    ]));
}

mysqli_close($con);
?>