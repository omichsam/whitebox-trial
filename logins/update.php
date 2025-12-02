<?php
session_start();
include("../connect.php");

// Main execution
header('Content-Type: application/json');

if (!isset($_POST['busername'])) {
    echo base64_encode(json_encode([
        'status' => 'error',
        'message' => 'Username required'
    ]));
    exit;
}

$username = $_POST['busername'];
$email = base64_decode($username);

// Update user last login and session
$current_time = date('Y-m-d H:i:s');
$sql = "UPDATE users SET last_login = '$current_time' WHERE email = '$email'";

if (mysqli_query($con, $sql)) {
    echo base64_encode(json_encode([
        'status' => 'success',
        'message' => 'Login updated successfully'
    ]));
} else {
    echo base64_encode(json_encode([
        'status' => 'error',
        'message' => 'Failed to update login information'
    ]));
}

mysqli_close($con);
?>