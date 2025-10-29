<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Process Timeline</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
            /* Reduced padding */
        }

        .text-center {
            text-align: center;
        }

        .text-primary {
            color: #2563eb;
        }

        .text-gray-600 {
            color: #6b7280;
        }

        .font-bold {
            font-weight: 700;
        }

        .font-semibold {
            font-weight: 600;
        }

        .text-xl {
            font-size: 1.125rem;
            /* Slightly reduced size */
        }

        .text-3xl {
            font-size: 1.625rem;
            /* Reduced size */
        }

        .text-lg {
            font-size: 1rem;
            /* Slightly reduced size */
        }

        .mb-3 {
            margin-bottom: 0.5rem;
            /* Reduced margin */
        }

        .mb-4 {
            margin-bottom: 0.75rem;
            /* Reduced margin */
        }

        .mb-12 {
            margin-bottom: 2rem;
            /* Reduced margin */
        }

        .mt-16 {
            margin-top: 3rem;
            /* Reduced margin */
        }

        .py-16 {
            padding-top: 3rem;
            /* Reduced padding */
            padding-bottom: 3rem;
            /* Reduced padding */
        }

        .px-4 {
            padding-left: 0.75rem;
            /* Reduced padding */
            padding-right: 0.75rem;
            /* Reduced padding */
        }

        .px-6 {
            padding-left: 1.25rem;
            /* Reduced padding */
            padding-right: 1.25rem;
            /* Reduced padding */
        }

        .py-3 {
            padding-top: 0.5rem;
            /* Reduced padding */
            padding-bottom: 0.5rem;
            /* Reduced padding */
        }

        .bg-white {
            background-color: #fff;
        }

        .rounded-xl {
            border-radius: 0.5rem;
            /* Slightly reduced radius */
        }

        .rounded-lg {
            border-radius: 0.375rem;
            /* Slightly reduced radius */
        }

        .shadow-md {
            box-shadow: 0 3px 5px -1px rgba(0, 0, 0, 0.1), 0 1px 3px -1px rgba(0, 0, 0, 0.06);
            /* Reduced shadow */
        }

        .flex {
            display: flex;
        }

        .items-center {
            align-items: center;
        }

        .justify-center {
            justify-content: center;
        }

        .inline-flex {
            display: inline-flex;
        }

        .ml-2 {
            margin-left: 0.25rem;
            /* Reduced margin */
        }

        .max-w-2xl {
            max-width: 40rem;
            /* Reduced max-width */
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto;
        }

        .hover\:opacity-90:hover {
            opacity: 0.9;
        }

        .transition {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
            transition-duration: 150ms;
        }

        .duration-300 {
            transition-duration: 300ms;
        }

        /* Gradient background */
        .gradient-bg {
            background: linear-gradient(135deg, #2563eb 0%, #7c3aed 100%);
        }

        /* Minimal timeline styles */
        .timeline {
            position: relative;
            max-width: 1000px;
            /* Reduced max-width */
            margin: 0 auto;
            padding: 30px 0;
            /* Reduced padding */
        }

        .timeline::before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            width: 2px;
            background: #e5e7eb;
            transform: translateX(-50%);
        }

        .timeline-item {
            display: flex;
            margin-bottom: 10px;
            /* Reduced margin */
            position: relative;
            width: 100%;
        }

        .timeline-item:last-child {
            margin-bottom: 0;
        }

        .timeline-content {
            width: 40%;
            padding: 10px;
            /* Reduced padding */
            background: white;
            border-radius: 10px;
            /* Reduced border radius */
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            /* Reduced shadow */
            border: 1px solid #f3f4f6;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .timeline-content:hover {
            transform: translateY(-3px);
            /* Slightly reduced hover effect */
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            /* Reduced shadow on hover */
        }

        .timeline-item:nth-child(odd) {
            justify-content: flex-start;
        }

        .timeline-item:nth-child(even) {
            justify-content: flex-end;
        }

        .timeline-dot {
            position: absolute;
            top: 25px;
            /* Reduced position */
            left: 50%;
            width: 14px;
            /* Reduced size */
            height: 14px;
            /* Reduced size */
            background: #2563eb;
            border-radius: 50%;
            transform: translateX(-50%);
            z-index: 2;
        }

        .timeline-number {
            width: 36px;
            /* Reduced size */
            height: 36px;
            /* Reduced size */
            border-radius: 50%;
            background: linear-gradient(135deg, #2563eb 0%, #7c3aed 100%);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            position: absolute;
            top: 15px;
            /* Reduced position */
            left: 50%;
            transform: translateX(-50%);
            z-index: 3;
        }
                                   
    </style>
</head>

<body>
    <!-- How It Works Section -->
    <section id="how-it-works" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center text-primary mb-4">Our Process</h2>
            <p class="text-lg text-gray-600 text-center mb-12 max-w-2xl mx-auto">From idea to implementation - how we
                support innovation at every stage</p>

            <!-- Minimal Timeline -->
            <div class="timeline">
                <div class="timeline-item animate-on-scroll"> 
                    <div class="timeline-number">1</div>  
                    <div class="timeline-dot"></div>
                    <div class="timeline-content"> 
                        <h3 class="text-xl font-semibold text-primary mb-3">Tell Us Who You Are</h3>
                        <p class="text-gray-600">Create an account, tell us about your innovation, and submit the
                            details of your product or solution.</p>
                    </div>
                </div>

                <div class="timeline-item animate-on-scroll">
                    <div class="timeline-number">2</div>
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <h3 class="text-xl font-semibold text-primary mb-3">Evaluation</h3>
                        <p class="text-gray-600">Your innovation will be evaluated to determine its viability and the
                            support required.</p>
                    </div>
                </div>

                <div class="timeline-item animate-on-scroll">
                    <div class="timeline-number">3</div>
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <h3 class="text-xl font-semibold text-primary mb-3">Development & Growth</h3>
                        <p class="text-gray-600">Viable innovations are considered for further development into products
                            or services.</p>
                    </div>
                </div>

                <div class="timeline-item animate-on-scroll">
                    <div class="timeline-number">4</div>
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <h3 class="text-xl font-semibold text-primary mb-3">Scale & Transformation</h3>
                        <p class="text-gray-600">Work with our team and partners to roll out approved products or
                            services.</p>
                    </div>
                </div>
            </div>

            <div class="mt-16 text-center">
                <a href="#login"
                    class="inline-flex items-center gradient-bg text-white px-6 py-3 rounded-lg font-semibold hover:opacity-90 transition duration-300">
                    <span>Start Your Innovation Journey</span>
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <script>
        // Animation on scroll
        document.addEventListener('DOMContentLoaded', function () {
            const animatedElements = document.querySelectorAll('.animate-on-scroll');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, {
                threshold: 0.1
            });

            animatedElements.forEach(element => {
                observer.observe(element);
            });
        });
    </script>
</body>

</html>



<!-- Modal Background -->
    <div id="ipModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <!-- Modal Content -->
        <div class="bg-white max-w-3xl w-full p-6 rounded-lg shadow-lg overflow-y-auto max-h-[90vh] relative">
            <!-- Close Button -->
            <button onclick="document.getElementById('ipModal').classList.add('hidden')"
                class="absolute top-3 right-3 text-gray-600 hover:text-red-500 text-xl font-bold">
                &times;
            </button>

            <h2 class="text-2xl font-semibold text-primary mb-4">Protect Your Intellectual Property</h2>

            <div class="space-y-4 text-gray-700 text-sm leading-relaxed">
                <div>
                    <strong>1. Do I need to have intellectual property protection?</strong>
                    <p>
                        Yes. It is recommended that you apply for the protection of your intellectual property before
                        you
                        submit the same to Whitebox. It is important to safeguard your intellectual property rights to
                        secure your creativity and inventiveness and prevent the information contained in your
                        submission
                        from being appropriated by a third party.
                    </p>
                </div>

                <div>
                    <strong>2. When should I protect my intellectual property?</strong>
                    <p>
                        You should take steps to protect your intellectual property at the earliest possible juncture.
                        It is
                        recommended that you should not disclose any information regarding your intellectual property if
                        you
                        have not registered it or applied for registration. Disclosing such information before
                        registration
                        may lead to the appropriation of the information by a third party and hinder your ability to
                        subsequently file for registration.
                    </p>
                </div>

                <div>
                    <strong>3. What forms of protection are available for my intellectual property?</strong>
                    <p>
                        Intellectual property may be protected using Patents, Trademarks, and Copyrights. You can
                        protect
                        your intellectual property by registering with the relevant government agency. Ownership can be
                        by a
                        natural person or registered legal entity.
                    </p>
                </div>

                <div>
                    <strong>4. What are the benefits of protecting my intellectual property?</strong>
                    <p>
                        Intellectual property is a business asset and therefore securing it is essential to your
                        business
                        and brand. Secured intellectual property rights exclude third parties from appropriating your
                        rights
                        thus adding value to your business and giving you a competitive edge.
                    </p>
                </div>

                <div>
                    <p>
                        <strong>Patents</strong> afford protection to inventions in the technological or industrial
                        sector.
                        The Kenya Industrial Property Institute undertakes the registration of patents. The requirement
                        for
                        the registration of a patent can be found <a href="https://www.kipi.go.ke/index.php/patents"
                            class="text-blue-600 underline">here</a>.
                    </p>
                    <p>
                        <strong>Copyright</strong> affords protection to artistic works of musical, audiovisual,
                        literary,
                        and artistic nature. To acquire copyright, the Copyright Act does not require registration.
                        However,
                        registration is recommended to claim exclusive rights. Registration of copyright is done by the
                        Kenya Copyright Board. The process of registering copyright can be found <a
                            href="https://nrr.copyright.go.ke/" class="text-blue-600 underline">here</a>.
                    </p>
                    <p>
                        <strong>Trademarks</strong> afford protection to brand names, marks, signs, and logos associated
                        with certain goods and services. Registration is handled by the Kenya Industrial Property
                        Institute.
                        The requirements for registration can be found <a href="https://www.kipi.go.ke/trade-marks"
                            class="text-blue-600 underline">here</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>



    make this vertical tabs to be aligned with the tailwind <!-- Vertical Tabs Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="vertical-tabs max-w-6xl mx-auto">
                <div class="tab-buttons">
                    <button class="tab-button active" data-tab="who-we-are">
                        <i class="fas fa-info-circle"></i>
                        <span>Who We Are</span>
                    </button>
                    <button class="tab-button" data-tab="what-to-expect">
                        <i class="fas fa-list-alt"></i>
                        <span>What To Expect</span>
                    </button>
                    <button class="tab-button" data-tab="vision-mission">
                        <i class="fas fa-bullseye"></i>
                        <span>Vision & Mission</span>
                    </button>
                    <button class="tab-button" data-tab="target-group">
                        <i class="fas fa-users"></i>
                        <span>Target Group</span>
                    </button>
                </div>
                
                <div class="tab-content">
                    <!-- Who We Are Tab -->
                    <div class="tab-pane active" id="who-we-are">
                        <h2 class="text-2xl font-bold text-primary mb-6">Who We Are</h2>
                        <div class="prose prose-lg max-w-none">
                            <p class="text-dark mb-6">
                                WhiteBox is an initiative of the Government of Kenya through the Ministry of Information, Communications and Technology and the ICT Authority, geared towards catalyzing the successful growth of local ventures to global, world-class status. The main objective of this initiative is to create a channel for anyone who wants to sell/suggest a product/idea to Government, priority will be given to products that focus on the Bottom-Up Economic Transformation Agenda (BETA) and address Government priorities and challenges.
                            </p>
                            
                            <p class="text-gray-700 mb-6">
                                The program is a one-stop-shop for anyone who wants to present/share/sell an idea idea, innovation, invention or solution. The WhiteBox facility will addresss submissions on a need, and case by case basis whilst creating opportunities for financial support, office facilities, technical support, advisory services, access to market, networking opportunities and access to incubation and accelerator facilities/programs through the extensive partner ecosystem.
                            </p>
                            
                            <p class="text-gray-700 mb-6">
                                The WhiteBox initiative offers a window into Government wide initiatives; staffed with subject matter Government officers who will offer guidance on the program activities, selection criteria as well as insights into Government programs that the public can leverage on to grow their businesses.
                            </p>
                            
                            <p class="text-gray-700">
                                We welcome entrepreneurs and businesses at all stages of growth, from ideation to scale and aim to build a collaborative community of entrepreneurs and innovators who will mutually benefit from sharing knowledge and establishing necessary partnerships for success.
                            </p>
                        </div>
                    </div>
                    
                    <!-- What To Expect Tab -->
                    <div class="tab-pane" id="what-to-expect">
                        <h2 class="text-2xl font-bold text-primary mb-6">What To Expect</h2>
                        <div class="prose prose-lg max-w-none">
                            <ol class="list-decimal pl-5 mb-6 text-gray-700 space-y-3">
                                <li class="pl-2">To grow local innovations addressing Government priorities and needs</li>
                                <li class="pl-2">To grow local innovations and solutions/products to be ready for the local and international market</li>
                                <li class="pl-2">Through our partner ecosystem, provide an instructive and supportive environment in all stages of invention, innovations and product/solution design through the provision of the following support;
                                    <ol class="list-decimal pl-8 mt-3 space-y-2">
                                        <li class="pl-2">Access to marketing services</li>
                                        <li class="pl-2">Access to legal guidance</li>
                                        <li class="pl-2">Linkage with research institutions and universities</li>
                                        <li class="pl-2">Linkage with innovation hubs and centers</li>
                                        <li class="pl-2">Linkage with investors and mentors</li>
                                        <li class="pl-2">Linkage with appropriate industry players and</li>
                                        <li class="pl-2">Linkage with relevant Government institutions</li>
                                    </ol>
                                </li>
                            </ol>
                        </div>
                    </div>
                    
                    <!-- Vision & Mission Tab -->
                    <div class="tab-pane" id="vision-mission">
                        <h2 class="text-2xl font-bold text-primary mb-6">Vision & Mission</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div class="bg-blue-50 p-6 rounded-lg">
                                <div class="w-14 h-14 gradient-bg rounded-full flex items-center justify-center mb-4">
                                    <i class="fas fa-eye text-white text-xl"></i>
                                </div>
                                <h3 class="text-xl font-semibold text-primary mb-3">Vision</h3>
                                <p class="text-gray-700">Kenya as a globally competitive knowledge based economy</p>
                            </div>
                            
                            <div class="bg-green-50 p-6 rounded-lg">
                                <div class="w-14 h-14 gradient-bg rounded-full flex items-center justify-center mb-4">
                                    <i class="fas fa-bullseye text-white text-xl"></i>
                                </div>
                                <h3 class="text-xl font-semibold text-primary mb-3">Mission</h3>
                                <p class="text-gray-700">Support and enable the development of a robust and sustainable technology entrepreneurship ecosystem</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Target Group Tab -->
                    <div class="tab-pane" id="target-group">
                        <h2 class="text-2xl font-bold text-primary mb-6">Target Group</h2>
                        <div class="prose prose-lg max-w-none">
                            <p class="text-gray-700">
                                The program will receive innovations and solutions/products that are targeted towards addressing Government priorities and challenges.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>