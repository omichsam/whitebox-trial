<!DOCTYPE html>
<html lang="en">
<?php include 'connect.php'; ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Huduma WhiteBox - Innovation Platform</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="sources/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        // primary: '#000001ff',
                        // secondary: '#3b82f6',
                        // accent: '#10b981',
                        // dark: '#0f172a',
                        // danger: '#bc0203',
                        // light: '#f8fafc'

                        /* primary: '#1e3a8a',  // Dark Blue
                         secondary: '#3b82f6', // Light Blue
                         accent: '#10b981',    // Green
                         dark: '#0f172a',      // Dark Gray/Black
                         light: '#f8fafc' */     // Light Gray/White 
                        /*primary: '#204565',      // Dark blue for primary text
                        secondary: '#4b8ecb',    // Light blue for buttons and accents
                        accent: '#bc0203',       // Red for CTAs and highlights
                        dark: '#0f172a',
                        light: '#f8fafc'*/
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.8s ease-in-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'pulse-slow': 'pulse 3s infinite',
                    }
                }
            }
        }
    </script>

</head>

<body class="bg-gray-50 text-gray-800">

    <!-- Header -->
    <?php include 'sections/header.php'; ?>

    <!-- Hero Section with Carousel -->
    <?php include 'sections/carousel_header.php'; ?>

    <!-- Patent infi  -->
    <!-- Patent Info -->
    <?php include 'sections/patent_link.php'; ?>


    <!-- Key Stats Section with Cards -->
    <?php include 'sections/stats.php'; ?>

    <!-- How It Works Section -->
    <?php include 'sections/stages.php'; ?>

    <!-- Huduma WhiteBox Services Section -->
    <?php include 'sections/service.php'; ?>

    <!-- Viable Innovations Section -->
    <?php include 'sections/innovations.php'; ?>

    <!-- Partners Section with Tabs -->
    <?php include 'sections/patners.php'; ?>

    <!-- Footer -->
    <?php include 'sections/footer.php'; ?>

    <!-- Back to Top Button -->
    <!-- <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
        class="fixed bottom-6 centre-6 w-12 h-12 ml-4 gradient-bg text-white rounded-full shadow-lg flex items-center justify-center hover:shadow-xl transition duration-300 z-40">
        <i class="fas fa-chevron-up"></i>
    </button> -->

    <!-- Chatbot Integration - Minimalistic Design -->
    <!-- Chatbot Toggle Button -->
    <!-- <button id="chatbot-toggle"
        class="w-14 h-14 gradient-bg text-white rounded-full shadow-lg flex items-center justify-center hover:shadow-xl transition duration-300 z-50">
        <i class="fas fa-comment-alt"></i>
    </button> -->

    <!-- Chatbot Container -->
    <?php include 'chatbot.php'; ?>


    <!-- Modal for Patent Guidance -->
    <!-- Property Modal -->
    <?php include 'sections/modals.php'; ?>



    <!-- scripts -->
    <script src="sources/scripts/script.js"></script>

</body>

</html>