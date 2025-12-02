<?php
session_start();
include("../connect.php");

function activateUserAccount($token, $con)
{
    // Validate token format
    if (empty($token) || strlen($token) !== 64) {
        return ['status' => 'error', 'message' => 'Invalid activation token'];
    }

    // Get user with valid activation token
    $current_time = date('Y-m-d H:i:s');
    $sql = "SELECT id, first_name, email, token_expires_at FROM users 
            WHERE token = '$token' AND token_type = 'activation'";
    
    $result = mysqli_query($con, $sql);
    
    if (mysqli_num_rows($result) == 0) {
        return ['status' => 'error', 'message' => 'Invalid or expired activation token'];
    }

    $user = mysqli_fetch_assoc($result);
    
    // Check if token is expired
    if (strtotime($user['token_expires_at']) < time()) {
        return ['status' => 'error', 'message' => 'Activation token has expired'];
    }

    // Activate user account (set default country and county_id)
    $update_sql = "UPDATE users SET 
                    country = 'Kenya',
                    county_id = 1,
                    token = NULL,
                    token_type = NULL,
                    token_expires_at = NULL,
                    updated_at = '$current_time'
                  WHERE id = {$user['id']}";
    
    if (mysqli_query($con, $update_sql)) {
        return [
            'status' => 'success', 
            'message' => 'Account activated successfully! You can now login.',
            'user_email' => base64_encode($user['email'])
        ];
    } else {
        return ['status' => 'error', 'message' => 'Activation failed. Please try again.'];
    }
}

// Main execution
header('Content-Type: application/json');

if (isset($_POST['activation_code'])) {
    // API activation
    $activation_code = mysqli_real_escape_string($con, $_POST['activation_code']);
    $result = activateUserAccount($activation_code, $con);
    echo base64_encode(json_encode($result));
} elseif (isset($_GET['token'])) {
    // Direct link activation
    $token = mysqli_real_escape_string($con, $_GET['token']);
    $result = activateUserAccount($token, $con);
    
    // Display result as HTML page
    if ($result['status'] === 'success') {
        header('Location: ../activation_success.html');
    } else {
        header('Location: ../activation_error.html?error=' . urlencode($result['message']));
    }
} else {
    echo base64_encode(json_encode([
        'status' => 'error',
        'message' => 'Activation token required'
    ]));
}

mysqli_close($con);
?>