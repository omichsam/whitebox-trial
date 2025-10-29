<?php
require_once 'includes/config.php';
require_once 'includes/auth.php';

// Set default page
$page = isset($_GET['page']) ? clean_input($_GET['page']) : 'home';
$allowed_pages = ['home', 'about', 'innovations', 'investors', 'contact', 'partners', 'faq', 'library', 'news', 'launch', 'login'];

// Validate page request
if (!in_array($page, $allowed_pages)) {
    $page = 'home';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Huduma WhiteBox - <?php echo ucfirst($page); ?></title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Favicon -->
    <link rel="icon" href="assets/images/favicon.ico">
</head>

<body>
    <?php include 'includes/header.php'; ?>

    <main class="main-content">
        <?php include "includes/$page.php"; ?>
    </main>

    <?php include 'includes/footer.php'; ?>

    <!-- JavaScript -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/carousel.js"></script>
    <script src="js/forms.js"></script>
    <script src="js/animations.js"></script>

    <?php if ($page === 'login'): ?>
        <script src="js/login.js"></script>
    <?php endif; ?>
</body>

</html>