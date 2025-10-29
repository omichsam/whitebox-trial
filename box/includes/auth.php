<?php
// Check if user is logged in
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $user_email = $_SESSION['user_email'];
    $user_role = $_SESSION['role'];

    // Verify user still exists in database
    $user = fetch_one(query(
        "SELECT * FROM users WHERE id = ? AND email = ? LIMIT 1",
        [$user_id, $user_email]
    ));

    if (!$user) {
        // User not found, destroy session
        session_unset();
        session_destroy();
        redirect('index.php');
    }

    // Set user-specific variables
    $logged_in = true;
    $dashboard_link = ($user_role === 'admin') ? 'admin/dashboard.php' : 'user/dashboard.php';
} else {
    $logged_in = false;
}

// Check for maintenance mode
$maintenance_mode = false; // Set this from database if needed

if ($maintenance_mode && !(isset($_SESSION['admin']) && $_SESSION['admin'])) {
    include 'maintenance.php';
    exit();
}
?>