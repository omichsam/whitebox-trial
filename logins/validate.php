<?php
session_start();
include("../connect.php");

function generateActivationToken() {
    return bin2hex(random_bytes(32));
}

function hashPassword($password, $salt = "A073955@am") {
    return crypt(base64_encode($password), '$1$' . $salt . '$');
}

function sendWelcomeEmail($email, $first_name, $last_name, $activation_token) {
    // Close connection to free resources
    if (isset($GLOBALS['con'])) {
        mysqli_close($GLOBALS['con']);
    }

    ignore_user_abort(true);
    
    $activation_link = "http://whitebox.go.ke/activate.php?token=" . urlencode($activation_token);
    $keyb = base64_encode($email);
    
    $subject = "Welcome to WhiteBox - Activate Your Account";
    $message = "
    <html>
    <head>
        <title>Welcome to WhiteBox</title>
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
                <p>Thank you for registering with WhiteBox! We're excited to have you on board.</p>
                <p>To get started, please activate your account by clicking the button below:</p>
                
                <div style='text-align: center;'>
                    <a href='$activation_link' class='button'>Activate My Account</a>
                </div>
                
                <p>Or copy and paste this link in your browser:</p>
                <div style='background: #f4f4f4; padding: 10px; border-radius: 5px; margin: 10px 0;'>
                    <code>$activation_link</code>
                </div>
                
                <p><strong>Manual Activation Code:</strong><br>
                You can also use this code on the activation page:</p>
                <div class='token-box'>
                    $activation_token
                </div>
                
                <p><strong>This activation link will expire in 24 hours.</strong></p>
                
                <p>If you have any questions, feel free to contact our support team.</p>
            </div>
            <div class='footer'>
                <p>Welcome aboard!<br><strong>The WhiteBox Team</strong></p>
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
    // Get and validate input
    $required_fields = ['first_name', 'last_name', 'email', 'phone', 'gender', 'newpassword'];
    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            throw new Exception('All fields are required');
        }
    }

    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $email = strtolower(mysqli_real_escape_string($con, $_POST['email']));
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $password = $_POST['newpassword'];

    // Validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception('Invalid email format');
    }

    if (strlen($password) < 8) {
        throw new Exception('Password must be at least 8 characters long');
    }

    // Check if email already exists
    $check_email = mysqli_query($con, "SELECT id FROM users WHERE email = '$email'");
    if (mysqli_num_rows($check_email) > 0) {
        throw new Exception('This email is already registered');
    }

    // Generate activation token and hash password
    $activation_token = generateActivationToken();
    $token_expires = date('Y-m-d H:i:s', strtotime('+24 hours'));
    $hashed_password = hashPassword($password);
    $current_time = date('Y-m-d H:i:s');

    // Insert user into database
    $sql = "INSERT INTO users (
        email, password, first_name, last_name, gender, phone, 
        token, token_type, token_expires_at, created_at, updated_at
    ) VALUES (
        '$email', '$hashed_password', '$first_name', '$last_name', '$gender', '$phone',
        '$activation_token', 'activation', '$token_expires', '$current_time', '$current_time'
    )";

    if (mysqli_query($con, $sql)) {
        // Send welcome email using your existing system
        sendWelcomeEmail($email, $first_name, $last_name, $activation_token);
        
        $response = [
            'status' => 'success',
            'message' => 'Registration successful! Please check your email to activate your account.',
            'token' => base64_encode($activation_token)
        ];
        
        echo base64_encode(json_encode($response));
    } else {
        throw new Exception('Registration failed. Please try again.');
    }

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