<?php
session_start();
include("../connect.php");

function generateSessionCode()
{
    $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz@!#$%&";
    return base64_encode(substr(str_shuffle($chars), 0, 15));
}

function setupUserSession($username, $user_id)
{
    $_SESSION["loggedin"] = true;
    $_SESSION["id"] = $user_id;
    $_SESSION["username"] = $username;
    $_SESSION["session_code"] = generateSessionCode();
}

function checkAccountStatus($user_data)
{
    // Check if account is activated (has country and county_id set)
    if (!empty($user_data['country']) && !empty($user_data['county_id'])) {
        return 'activated';
    }
    
    // Check if activation token exists and is valid
    if (!empty($user_data['token']) && $user_data['token_type'] == 'activation') {
        if (strtotime($user_data['token_expires_at']) > time()) {
            return 'pending_activation';
        } else {
            return 'activation_expired';
        }
    }
    
    return 'not_activated';
}

function updateLastLogin($user_id, $con)
{
    $current_time = date('Y-m-d H:i:s');
    mysqli_query($con, "UPDATE users SET last_login = '$current_time' WHERE id = $user_id");
}

// Main execution
header('Content-Type: application/json');

if (!isset($_POST['busername']) || !isset($_POST['bpass'])) {
    echo base64_encode(json_encode([
        'status' => 'error',
        'message' => 'All fields required!'
    ]));
    exit;
}

$old_user = $_POST['busername'];
$oldpass = $_POST['bpass'];

$my_pass = mysqli_real_escape_string($con, base64_decode($oldpass));
$my_user = strtolower(mysqli_real_escape_string($con, base64_decode($old_user)));

// Input validation
if (empty($my_user) || empty($my_pass)) {
    echo base64_encode(json_encode([
        'status' => 'error',
        'message' => 'Email and password are required'
    ]));
    exit;
}

if (!filter_var($my_user, FILTER_VALIDATE_EMAIL)) {
    echo base64_encode(json_encode([
        'status' => 'error',
        'message' => 'Invalid email format'
    ]));
    exit;
}

// Check if user exists
$checkExist = mysqli_query($con, "SELECT * FROM users WHERE email='$my_user'") 
    or die(json_encode(['status' => 'error', 'message' => 'Database error']));

if (mysqli_num_rows($checkExist) == 0) {
    echo base64_encode(json_encode([
        'status' => 'error',
        'message' => 'Invalid email or password'
    ]));
    exit;
}

// Get user data
$user_data = mysqli_fetch_assoc($checkExist);
$user_id = $user_data['id'];

// Verify password
$salt = "A073955@am";
function hashword($string, $salt)
{
    return crypt($string, '$1$' . $salt . '$');
}
$hashed_input = hashword(base64_encode($my_pass), $salt);

if ($hashed_input !== $user_data['password']) {
    echo base64_encode(json_encode([
        'status' => 'error',
        'message' => 'Invalid email or password'
    ]));
    exit;
}

// Check account status
$account_status = checkAccountStatus($user_data);

switch ($account_status) {
    case 'activated':
        // Successful login
        setupUserSession($old_user, $user_id);
        updateLastLogin($user_id, $con);
        
        echo base64_encode(json_encode([
            'status' => 'success',
            'message' => 'Login successful',
            'redirect' => 'portal'
        ]));
        break;
        
    case 'pending_activation':
        echo base64_encode(json_encode([
            'status' => 'error',
            'message' => 'Account not activated. Please check your email for activation link.',
            'code' => 'pending_activation'
        ]));
        break;
        
    case 'activation_expired':
        // Generate new activation token
        include('resend_activation.php');
        $result = resendActivationToken($my_user, $con);
        
        echo base64_encode(json_encode([
            'status' => 'error',
            'message' => 'Activation link expired. A new activation email has been sent.',
            'code' => 'activation_expired'
        ]));
        break;
        
    case 'not_activated':
    default:
        // Send activation email
        include('resend_activation.php');
        $result = resendActivationToken($my_user, $con);
        
        echo base64_encode(json_encode([
            'status' => 'error',
            'message' => 'Account activation required. Activation email has been sent.',
            'code' => 'not_activated'
        ]));
        break;
}

mysqli_close($con);
?>