<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Huduma WhiteBox</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="sources/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* .gradient-bg {
            background: linear-gradient(135deg, #008115ff 0%, #3b82f6 100%);
        }

        .chatbot-container {
            position: fixed;
            bottom: 80px;
            right: 20px;
            display: none;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            border-radius: 12px;
            z-index: 50;
            flex-direction: column;
        } */

        .form-input:focus,
        .form-textarea:focus {
            box-shadow: 0 0 0 3px rgba(2, 148, 33, 0.91);
        }

        .contact-card {
            transition: all 0.3s ease;
        }

        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .success-message {
            display: none;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .map-container {
            border-radius: 8px;
            overflow: hidden;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800 font-sans">

    <!-- Header -->
    <?php include 'sections/header.php'; ?>

    <?php include 'sections/modals.php'; ?>

    <!-- Hero Section -->
    <!-- <section class="py-20 gradient-bg text-white">
        <div class="container mx-auto text-center px-6">
            <h1 class="text-4xl md:text-5xl font-bold mb-6 animate-pulse-slow">Get in Touch with Huduma WhiteBox</h1>
            <p class="text-lg md:text-xl max-w-2xl mx-auto mb-8">Have a question or need more information? We're here to
                help. Contact us today and we'll get back to you as soon as possible.</p>
            <div class="flex justify-center space-x-4">
                <a href="#contact-form"
                    class="px-6 py-3 bg-white text-primary font-semibold rounded-lg hover:bg-gray-100 transition duration-300">
                    Send a Message
                </a>
                <a href="#contact-info"
                    class="px-6 py-3 border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-primary transition duration-300">
                    Contact Info
                </a>
            </div>
        </div>
    </section> -->


    <section class="about-hero py-16 text-light">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6 animate-pulse-slow">Get in Touch with Huduma WhiteBox</h1>
            <p class="text-lg md:text-xl max-w-2xl mx-auto mb-8">Have a question or need more information? We're here to
                help. Contact us today and we'll get back to you as soon as possible.</p>

            <!-- <div class="flex justify-center space-x-4">
                <a href="#contact-form"
                    class="px-6 py-3 bg-white text-primary font-semibold rounded-lg hover:bg-gray-100 transition duration-300">
                    Send a Message
                </a>
                <a href="#contact-info"
                    class="px-6 py-3 border-2 border-white text-white font-semibold rounded-lg hover:bg-white hover:text-primary transition duration-300">
                    Contact Info
                </a>
            </div> -->
        </div>
    </section>

    <!-- Contact Us Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12">

                <!-- Contact Form Card -->
                <div
                    class="bg-gray-50 p-8 rounded-xl shadow-md hover:shadow-lg transition-transform transform hover:scale-105 duration-300 animate-fadeIn">
                    <h3 class="text-2xl font-bold text-accent mb-2">Send Us a Message</h3>
                    <p class="text-gray-600 mb-6">Fill out the form below and we'll respond as soon as possible.</p>

                    <!-- Success Message -->
                    <div id="success-message"
                        class="hidden mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-lg text-sm">
                        <i class="fas fa-check-circle mr-2"></i> Thank you! Your message has been sent.
                    </div>

                    <form id="contactForm" method="POST" class="space-y-5">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Name -->
                            <div class="animate-slideInLeft">
                                <label for="name" class="block text-green-700 mb-2 text-sm font-bold">Your Name</label>
                                <input type="text" id="name" name="name"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent focus:outline-none"
                                    required>
                            </div>

                            <!-- Email -->
                            <div class="animate-slideInRight">
                                <label for="email" class="block text-green-700 mb-2 text-sm font-bold">Your Email</label>
                                <input type="email" id="email" name="email"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent focus:outline-none"
                                    required>
                            </div>
                        </div>

                        <!-- Subject -->
                        <div class="animate-fadeIn delay-200">
                            <label for="subject" class="block text-green-700 mb-2 text-sm font-bold">Subject</label>
                            <select id="subject" name="subject"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent focus:outline-none"
                                required>
                                <option value="" disabled selected>Select a subject</option>
                                <option>General Inquiry</option>
                                <option>Technical Support</option>
                                <option>Partnership</option>
                                <option>Feedback</option>
                            </select>
                        </div>

                        <!-- Message -->
                        <div class="animate-fadeIn delay-300">
                            <label for="message" class="block text-green-700 mb-2 text-sm font-bold">Your Message</label>
                            <textarea id="message" name="message" rows="5"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-accent focus:outline-none"
                                required></textarea>
                        </div>

                        <!-- Button -->
                        <button type="submit"
                            class="w-full py-3 px-6 bg-danger text-white font-medium rounded-lg hover:opacity-90 transition transform hover:scale-105 duration-300 flex items-center justify-center">
                            <span id="submit-text">Send Message</span>
                            <span id="loading-spinner" class="hidden ml-2">
                                <i class="fas fa-spinner fa-spin"></i>
                            </span>
                        </button>
                    </form>
                </div>

                <!-- Contact Info Cards -->
                <div class="space-y-6">
                    <h3 class="text-2xl font-bold text-accent my-2 animate-fadeIn">Contact Information</h3>
                    <!-- Info Cards Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Address -->
                        <div
                            class="bg-gray-50 p-6 rounded-xl shadow-md hover:shadow-xl transition-transform transform hover:scale-105 duration-300 animate-slideInUp">
                            <div class="flex items-start text-primary">
                                <i class="fas fa-map-marker-alt text-primary text-xl mr-3"></i>
                                <div>
                                    <h3 class="text-primary-800 font-bold mb-1">Address</h3>
                                    <p class="text-gray-500 text-sm font-semibold">
                                        ICT Authority<br> Telposta Towers, 12th Flr,<br>
                                        Kenyatta Ave., Nairobi<br>
                                        P.O. Box 27150 - 00100
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div
                            class="bg-gray-50 p-6 rounded-xl shadow-md hover:shadow-xl transition-transform transform hover:scale-105 duration-300 animate-slideInUp delay-100">
                            <div class="flex items-start text-primary">
                                <i class="fas fa-phone-alt text-gray-700 text-xl mr-3"></i>
                                <div>
                                    <h4 class="text-gray-800 font-bold mb-1">Telephone</h4>
                                    <p class="text-gray-600 text-sm mt-2 font-semibold">
                                        +254 20 2211960<br> +254 20 2211961
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Email -->
                        <div
                            class="bg-gray-50 p-6 rounded-xl shadow-md hover:shadow-xl transition-transform transform hover:scale-105 duration-300 animate-slideInUp delay-200">
                            <div class="flex items-start text-primary">
                                <i class="fas fa-envelope text-gray-700 text-xl mr-3"></i>
                                <div>
                                    <h4 class="text-gray-800 font-bold mb-1">Email</h4>
                                    <p class="text-gray-600 text-sm mt-2 font-semibold">info@whitebox.go.ke</p>
                                </div>
                            </div>
                        </div>

                        <!-- Hours -->
                        <div
                            class="bg-gray-50 p-6 rounded-xl shadow-md hover:shadow-xl transition-transform transform hover:scale-105 duration-300 animate-slideInUp delay-300">
                            <div class="flex items-start text-primary">
                                <i class="fas fa-clock text-gray-700 text-xl mr-3"></i>
                                <div>
                                    <h4 class="text-gray-800 font-bold mb-1">Working Hours</h4>
                                    <p class="text-gray-600 text-sm mt-2 font-semibold">
                                        Mon - Fri: 8:00 AM - 5:00 PM<br>
                                        Saturday & Sunday : Closed<br>
                                        Public Holidays  : Closed
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Map Card -->
                    <div
                        class="bg-gray-50 p-6 rounded-xl shadow-md hover:shadow-xl transition-transform transform hover:scale-105 duration-300 animate-fadeIn delay-500">
                        <h4 class="text-gray-800 font-bold mb-2 text-primary my-3">Find Us</h4>
                        <div class="rounded-lg overflow-hidden">
                            <!-- <iframe class="w-full h-64 border-0 rounded-lg"
                                src=""
                                loading="lazy" allowfullscreen></iframe> -->
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.8130069197305!2d36.81700337501331!3d-1.286236798701526!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f10d0cb5f39e7%3A0x778459d989e4ae2a!2sTelposta%20Towers!5e0!3m2!1sen!2ske!4v1759762361997!5m2!1sen!2ske" 
                                     allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-full h-64 border-0 rounded-lg"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Partners Section with Tabs -->
    <?php include 'sections/patners.php'; ?>

    <!-- Footer -->
    <?php include 'sections/footer.php'; ?>

    <!-- Back to Top Button -->
    <?php include 'chatbot.php'; ?>




    <script>
        // Back to top button functionality
        // const backToTopButton = document.getElementById('back-to-top');

        // window.addEventListener('scroll', () => {
        //     if (window.pageYOffset > 300) {
        //         backToTopButton.classList.remove('opacity-0', 'invisible');
        //         backToTopButton.classList.add('opacity-100', 'visible');
        //     } else {
        //         backToTopButton.classList.remove('opacity-100', 'visible');
        //         backToTopButton.classList.add('opacity-0', 'invisible');
        //     }
        // });

        // backToTopButton.addEventListener('click', () => {
        //     window.scrollTo({ top: 0, behavior: 'smooth' });
        // });



        // Form submission handling
        const contactForm = document.getElementById('contactForm');
        const successMessage = document.getElementById('success-message');
        const submitText = document.getElementById('submit-text');
        const loadingSpinner = document.getElementById('loading-spinner');

        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();

            // Show loading state
            submitText.classList.add('hidden');
            loadingSpinner.classList.remove('hidden');

            // Simulate form submission
            setTimeout(() => {
                // Hide loading state
                submitText.classList.remove('hidden');
                loadingSpinner.classList.add('hidden');

                // Show success message
                successMessage.style.display = 'block';
                setTimeout(() => {
                    successMessage.style.opacity = '1';
                }, 10);

                // Reset form
                contactForm.reset();

                // Hide success message after 5 seconds
                setTimeout(() => {
                    successMessage.style.opacity = '0';
                    setTimeout(() => {
                        successMessage.style.display = 'none';
                    }, 500);
                }, 5000);
            }, 1500);
        });
    </script>

    <!-- scripts -->
    <script src="sources/scripts/script.js"></script>

</body>

</html>