<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Huduma WhiteBox - Innovation Platform</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="sources/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>


</head>

<body class="bg-gray-50 text-gray-800">

    <!-- Header -->
    <?php include 'sections/header.php'; ?>

    <?php include 'sections/modals.php'; ?>

    <!-- About Hero Section -->
    <section class="about-hero py-16 text-white">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">About Huduma WhiteBox</h1>
            <p class="text-xl max-w-3xl mx-auto">A Government of Kenya initiative to catalyze local innovation and
                support the Bottom-Up Economic Transformation Agenda</p>
        </div>
    </section>

    <!-- Vertical Tabs Section -->
    <!-- Vertical Tabs Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row max-w-6xl mx-auto">
                <!-- Tab Buttons (Horizontal Layout for All Screens) -->
                <div
                    class="w-full flex md:w-auto justify-start md:flex-col md:items-start space-x-6 md:space-x-0 md:space-y-4 mb-6 md:mb-0">
                    <button
                        class="tab-button active flex items-center gap-3 px-4 py-3 text-left text-gray-800 bg-gray-100 rounded-lg hover:bg-gray-200 transition duration-300"
                        data-tab="who-we-are">
                        <i class="fas fa-info-circle text-danger"></i>
                        <span>Who We Are</span>
                    </button>
                    <button
                        class="tab-button flex items-center gap-3 px-4 py-3 text-left text-gray-800 bg-gray-100 rounded-lg hover:bg-gray-200 transition duration-300"
                        data-tab="what-to-expect">
                        <i class="fas fa-list-alt text-danger"></i>
                        <span>What To Expect</span>
                    </button>
                    <button
                        class="tab-button flex items-center gap-3 px-4 py-3 text-left text-gray-800 bg-gray-100 rounded-lg hover:bg-gray-200 transition duration-300"
                        data-tab="vision-mission">
                        <i class="fas fa-bullseye text-danger"></i>
                        <span>Vision & Mission</span>
                    </button>


                    <!-- <button
                        class="tab-button flex items-center gap-3 px-4 py-3 text-left text-gray-800 bg-gray-100 rounded-lg hover:bg-gray-200 transition duration-300"
                        data-tab="target-group" hidden>
                        <i class="fas fa-users"></i>
                        <span>Target Group</span>
                    </button> -->

                </div>

                <!-- Tab Content -->
                <div class="w-full md:w-3/4">
                    <!-- Who We Are Tab -->
                    <div class="tab-pane active  mx-2 px-2" id="who-we-are">
                        <h2 class="text-2xl font-bold text-accent mb-6 text-center">Who We Are</h2>
                        <div class="prose prose-lg max-w-none  mx-2 px-2">
                            <p class="ext-gray-700  mb-6">
                                WhiteBox is an initiative of the Government of Kenya through the Ministry of
                                Information, Communications and Technology and the ICT Authority, geared towards
                                catalyzing the successful growth of local ventures to global, world-class status. The
                                main objective of this initiative is to create a channel for anyone who wants to
                                sell/suggest a product/idea to Government, priority will be given to products that focus
                                on the Bottom-Up Economic Transformation Agenda (BETA) and address Government priorities
                                and challenges.
                            </p>

                            <p class="text-gray-700 mb-6">
                                The program is a one-stop-shop for anyone who wants to present/share/sell an idea idea,
                                innovation, invention or solution. The WhiteBox facility will addresss submissions on a
                                need, and case by case basis whilst creating opportunities for financial support, office
                                facilities, technical support, advisory services, access to market, networking
                                opportunities and access to incubation and accelerator facilities/programs through the
                                extensive partner ecosystem.
                            </p>

                            <p class="text-gray-700 mb-6">
                                The WhiteBox initiative offers a window into Government wide initiatives; staffed with
                                subject matter Government officers who will offer guidance on the program activities,
                                selection criteria as well as insights into Government programs that the public can
                                leverage on to grow their businesses.
                            </p>

                            <p class="text-gray-700">
                                We welcome entrepreneurs and businesses at all stages of growth, from ideation to scale
                                and aim to build a collaborative community of entrepreneurs and innovators who will
                                mutually benefit from sharing knowledge and establishing necessary partnerships for
                                success.
                            </p>
                        </div>
                    </div>

                    <!-- What To Expect Tab -->
                    <div class="tab-pane mx-2 px-2" id="what-to-expect">
                        <h2 class="text-2xl font-bold text-accent mb-6 text-center">What To Expect</h2>
                        <div class="prose prose-lg max-w-none mx-2 px-2">
                            <ol class="list-decimal pl-5 mb-6 text-gray-700 space-y-3 ">
                                <li class="pl-2">To grow local innovations addressing Government priorities and needs
                                </li>
                                <li class="pl-2">To grow local innovations and solutions/products to be ready for the
                                    local and international market</li>
                                <li class="pl-2">Through our partner ecosystem, provide an instructive and supportive
                                    environment in all stages of invention, innovations and product/solution design
                                    through the provision of the following support;
                                    <ul class="list-[lower-roman] pl-8 mt-3 space-y-2 italic">
                                        <li class="pl-2">Access to marketing services</li>
                                        <li class="pl-2">Access to legal guidance</li>
                                        <li class="pl-2">Linkage with research institutions and universities</li>
                                        <li class="pl-2">Linkage with innovation hubs and centers</li>
                                        <li class="pl-2">Linkage with investors and mentors</li>
                                        <li class="pl-2">Linkage with appropriate industry players and</li>
                                        <li class="pl-2">Linkage with relevant Government institutions</li>
                                    </ul>
                                </li>
                            </ol>
                        </div>
                    </div>

                    <!-- Vision & Mission Tab -->
                    <div class="tab-pane mx-2 px-2" id="vision-mission">
                        <h2 class="text-2xl font-bold text-accent mb-6 text-center">Vision & Mission</h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mx-2 px-2">
                            <div class="bg-blue-50 p-6 rounded-lg">
                                <div
                                    class="w-14 h-14 gradient-bgb bg-danger rounded-full flex items-center justify-center mb-4">
                                    <i class="fas fa-eye text-white text-xl"></i>
                                </div>
                                <h3 class="text-xl font-semibold text-accent mb-3">Vision</h3>
                                <p class="text-gray-700">Kenya as a globally competitive knowledge based economy</p>
                            </div>
                            <div class="bg-red-50 p-6 rounded-lg">
                                <div
                                    class="w-14 h-14 gradient-bgg bg-danger  rounded-full flex items-center justify-center mb-4">
                                    <i class="fas fa-bullseye text-white text-xl"></i>
                                </div>
                                <h3 class="text-xl font-semibold text-accent mb-3">Mission</h3>
                                <p class="text-gray-700">Support and enable the development of a robust and sustainable
                                    technology entrepreneurship ecosystem</p>

                            </div>
                            <div class="bg-green-50 p-6 rounded-lg">
                                <div
                                    class="w-14 h-14 gradient-bgg bg-danger  rounded-full flex items-center justify-center mb-4">
                                    <i class="fas fa-users text-white text-xl"></i>
                                </div>
                                <h3 class="text-xl font-semibold text-accent mb-3">Target Group</h3>
                                <p class="text-gray-700">The program will receive innovations and solutions/products
                                    that are targeted towards
                                    addressing Government priorities and challenges.</p>

                            </div>
                        </div>
                    </div>

                    <!-- Target Group Tab -->
                    <!-- <div class="tab-pane mx-2 px-2" id="target-group">
                        <h2 class="text-2xl font-bold text-primary mb-6 text-center">Target Group</h2>
                        <div class="prose prose-lg max-w-none mx-2 px-2">
                            <p class="text-gray-700">
                                The program will receive innovations and solutions/products that are targeted towards
                                addressing Government priorities and challenges.
                            </p>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <?php include 'chatbot.php'; ?>


    <!-- Partners Section with Tabs -->
    <?php include 'sections/patners.php'; ?>

    <!-- Footer -->
    <?php include 'sections/footer.php'; ?>

    <!-- Back to Top Button -->
    <!-- <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
        class="fixed bottom-6 right-6 w-12 h-12 gradient-bg text-white rounded-full shadow-lg flex items-center justify-center hover:shadow-xl transition duration-300 z-40">
        <i class="fas fa-chevron-up"></i>
    </button> -->



    <!-- scripts -->
    <script src="sources/scripts/script.js"></script>

    <script>
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabContents = document.querySelectorAll('.tab-pane');

        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove 'active' class from all tabs and content
                tabButtons.forEach(btn => btn.classList.remove('active'));
                tabContents.forEach(content => content.classList.remove('active'));

                // Add 'active' class to clicked tab and corresponding content
                button.classList.add('active');
                const targetTab = button.getAttribute('data-tab');
                document.getElementById(targetTab).classList.add('active');
            });
        });
    </script>


</body>

</html>