<?php
require_once 'config/database.php';
require_once 'config/constants.php';
require_once 'includes/functions.php';
require_once 'includes/security.php';

// Redirect to dashboard if already logged in
if (Security::isLoggedIn()) {
    redirect('dashboard/');
}

$page = isset($_GET['page']) ? $_GET['page'] : 'login';
$csrf_token = Security::generateCSRFToken();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WhiteBox - Authentication</title>
    <link rel="stylesheet" href="assets/css/auth.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-background"></div>
        
        <div class="auth-card">
            <!-- Dynamic content will be loaded here -->
            <div id="auth-content">
                <?php
                switch($page) {
                    case 'register':
                        include 'auth/register.php';
                        break;
                    case 'activate':
                        include 'auth/activate.php';
                        break;
                    case 'reset':
                        include 'auth/reset_password.php';
                        break;
                    default:
                        include 'auth/login.php';
                }
                ?>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/auth.js"></script>
</body>
</html>