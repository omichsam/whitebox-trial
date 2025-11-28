<?php
session_start();
include("../connect.php");

function generateActivationToken()
{
    return bin2hex(random_bytes(32));
}

function hashPassword($password, $salt = "A073955@am")
{
    return crypt(base64_encode($password), '$1$' . $salt . '$');
}

function sendActivationEmail($email, $first_name, $last_name, $activation_token)
{
    // Close connection to free resources
    if (isset($GLOBALS['con'])) {
        mysqli_close($GLOBALS['con']);
    }

    ignore_user_abort(true);

    $activation_link = "http://whitebox.go.ke/activate.php?token=" . urlencode($activation_token);
    
    $subject = "Activate Your WhiteBox Account";
    $message = "
    <html>
    <head>
        <title>Account Activation</title>
    </head>
    <body>
        <h2>Welcome to WhiteBox, $first_name!</h2>
        <p>Thank you for registering. Please activate your account by clicking the link below:</p>
        <p><a href='$activation_link' style='background-color: #4CAF50; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Activate Account</a></p>
        <p>Or copy and paste this link in your browser:<br>
        <code>$activation_link</code></p>
        <p>This activation link will expire in 24 hours.</p>
        <br>
        <p>Best regards,<br>WhiteBox Team</p>
    </body>
    </html>";

    // Email headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: no-reply@whitebox.go.ke" . "\r\n";

    // Send email
    return mail($email, $subject, $message, $headers);
}

// Main execution
header('Content-Type: application/json');

// Get and validate input
$required_fields = ['first_name', 'last_name', 'email', 'phone', 'gender', 'newpassword'];
foreach ($required_fields as $field) {
    if (empty($_POST[$field])) {
        echo base64_encode(json_encode([
            'status' => 'error',
            'message' => 'All fields are required'
        ]));
        exit;
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
    echo base64_encode(json_encode([
        'status' => 'error',
        'message' => 'Invalid email format'
    ]));
    exit;
}

if (strlen($password) < 8) {
    echo base64_encode(json_encode([
        'status' => 'error',
        'message' => 'Password must be at least 8 characters long'
    ]));
    exit;
}

// Check if email already exists
$check_email = mysqli_query($con, "SELECT id FROM users WHERE email = '$email'");
if (mysqli_num_rows($check_email) > 0) {
    echo base64_encode(json_encode([
        'status' => 'error',
        'message' => 'This email is already registered'
    ]));
    exit;
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
    $user_id = mysqli_insert_id($con);
    
    // Send activation email
    $email_sent = sendActivationEmail($email, $first_name, $last_name, $activation_token);
    
    // Return success with activation token (encoded for security)
    $response = [
        'status' => 'success',
        'message' => 'Registration successful. Please check your email to activate your account.',
        'activation_sent' => $email_sent,
        'token' => base64_encode($activation_token)
    ];
    
    echo base64_encode(json_encode($response));
} else {
    echo base64_encode(json_encode([
        'status' => 'error',
        'message' => 'Registration failed. Please try again.'
    ]));
}

mysqli_close($con);
?>