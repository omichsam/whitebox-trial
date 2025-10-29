<?php
session_start();
include("includes/connect.php");
include("includes/header.php");

// Your PHP logic here
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WhiteBox - Innovation Platform</title>
    
    <!-- CSS Links -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <link rel="stylesheet" href="assets/css/animations.css">
    
    <!-- Favicon -->
    <link rel="icon" href="images/favicon.ico">
</head>
<body>
    <!-- Header is included from header.php -->
    
    <main class="main-content">
        <!-- Home Section -->
        <section id="home" class="hero-section">
            <!-- Carousel content -->
        </section>
        
        <!-- About Section -->
        <section id="about" class="about-section">
            <!-- About content -->
        </section>
        
        <!-- Innovations Section -->
        <section id="innovations" class="innovations-section">
            <!-- Innovations content -->
        </section>
        
        <!-- Contact Section -->
        <section id="contact" class="contact-section">
            <!-- Contact form -->
        </section>
    </main>
    
    <!-- Footer is included from footer.php -->
    <?php include("includes/footer.php"); ?>
    
    <!-- JavaScript Files -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/animations.js"></script>
    <script src="assets/js/form-validation.js"></script>
</body>
</html>