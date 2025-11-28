<?php
include("../connect.php");

function hashPassword($password, $salt = "A073955@am")
{
    return crypt(base64_encode($password), '$1$' . $salt . '$');
}

function validateResetToken($token, $con)
{
    $current_time = date('Y-m-d H:i:s');
    $sql = "SELECT id, email, token_expires_at FROM users 
            WHERE token = '$token' AND token_type = 'reset'";
    
    $result = mysqli_query($con, $sql);
    
    if (mysqli_num_rows($result) == 0) {
        return ['status' => 'error', 'message' => 'Invalid reset token'];
    }

    $user = mysqli_fetch_assoc($result);
    
    // Check if token is expired
    if (strtotime($user['token_expires_at']) < time()) {
        return ['status' => 'error', 'message' => 'Reset token has expired'];
    }

    return ['status' => 'success', 'user' => $user];
}

// Main execution
header('Content-Type: application/json');

if (!isset($_POST['password_n']) || !isset($_POST['new_passworn']) || !isset($_POST['emailsets'])) {
    echo base64_encode(json_encode([
        'status' => 'error',
        'message' => 'All fields are required'
    ]));
    exit;
}

$password = $_POST['password_n'];
$confirm_password = $_POST['new_passworn'];
$email = strtolower(mysqli_real_escape_string($con, $_POST['emailsets']));

// Validate passwords
if (strlen($password) < 8) {
    echo base64_encode(json_encode([
        'status' => 'error',
        'message' => 'Password must be at least 8 characters long'
    ]));
    exit;
}

if ($password !== $confirm_password) {
    echo base64_encode(json_encode([
        'status' => 'error',
        'message' => 'Passwords do not match'
    ]));
    exit;
}

// Get reset token from headers or form data
$reset_token = '';
if (isset($_POST['reset_token'])) {
    $reset_token = mysqli_real_escape_string($con, $_POST['reset_token']);
} elseif (isset($_POST['code'])) {
    // For backward compatibility with existing frontend
    $reset_token = base64_decode(mysqli_real_escape_string($con, $_POST['code']));
}

// Validate reset token
$token_validation = validateResetToken($reset_token, $con);
if ($token_validation['status'] !== 'success') {
    echo base64_encode(json_encode($token_validation));
    exit;
}

$user_id = $token_validation['user']['id'];
$hashed_password = hashPassword($password);
$current_time = date('Y-m-d H:i:s');

// Update password and clear reset token
$sql = "UPDATE users SET 
        password = '$hashed_password',
        token = NULL,
        token_type = NULL,
        token_expires_at = NULL,
        updated_at = '$current_time'
        WHERE id = $user_id";

if (mysqli_query($con, $sql)) {
    echo base64_encode(json_encode([
        'status' => 'success',
        'message' => 'Password reset successfully'
    ]));
} else {
    echo base64_encode(json_encode([
        'status' => 'error',
        'message' => 'Failed to reset password'
    ]));
}

mysqli_close($con);
?>