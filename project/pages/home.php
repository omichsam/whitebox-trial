<!-- Hero Section -->
<section class="relative bg-blue-900 text-white py-20">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-6">Where Government Supports Your Innovation</h1>
            <p class="text-xl mb-8">WhiteBox is a Kenyan Government initiative to catalyze the growth of local ventures to global, world-class status.</p>
            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="#register-modal" class="px-6 py-3 bg-white text-blue-900 font-medium rounded-md hover:bg-gray-100 transition">Get Started</a>
                <a href="?page=about" class="px-6 py-3 border-2 border-white text-white font-medium rounded-md hover:bg-white hover:text-blue-900 transition">Learn More</a>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">What is WhiteBox?</h2>
            <div class="w-20 h-1 bg-blue-600 mx-auto"></div>
        </div>
        
        <div class="grid md:grid-cols-2 gap-8 items-center">
            <div>
                <p class="text-gray-600 mb-6">
                    WhiteBox is an initiative of the Government of Kenya through the Ministry of Information, 
                    Communications and Technology and the ICT Authority, geared towards catalyzing the successful 
                    growth of local ventures to global, world-class status.
                </p>
                <p class="text-gray-600 mb-6">
                    The main objective is to create a channel for anyone who wants to sell/suggest a product/idea 
                    to Government, with priority given to products that focus on the Bottom-Up Economic Transformation 
                    Agenda (BETA) and address Government priorities and challenges.
                </p>
                <a href="?page=about" class="inline-block px-6 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Read More</a>
            </div>
            <div class="rounded-lg overflow-hidden shadow-lg">
                <img src="/assets/images/about-hero.jpg" alt="About WhiteBox" class="w-full h-auto">
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">What We Offer</h2>
            <div class="w-20 h-1 bg-blue-600 mx-auto"></div>
        </div>
        
        <div class="grid md:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
                <div class="text-blue-600 mb-4">
                    <i class="fas fa-lightbulb text-4xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">Support for Innovators</h3>
                <p class="text-gray-600">
                    Get access to resources, mentorship, and funding opportunities to grow your innovation.
                </p>
            </div>
            
            <!-- Feature 2 -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
                <div class="text-blue-600 mb-4">
                    <i class="fas fa-handshake text-4xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">Partnerships</h3>
                <p class="text-gray-600">
                    Connect with industry partners, investors, and government agencies.
                </p>
            </div>
            
            <!-- Feature 3 -->
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition">
                <div class="text-blue-600 mb-4">
                    <i class="fas fa-graduation-cap text-4xl"></i>
                </div>
                <h3 class="text-xl font-semibold mb-3">Capacity Building</h3>
                <p class="text-gray-600">
                    Access training programs and workshops to enhance your skills and knowledge.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Innovations -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800 mb-4">Featured Innovations</h2>
            <div class="w-20 h-1 bg-blue-600 mx-auto"></div>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            // Sample innovation data - in a real app, this would come from a database
            $innovations = [
                [
                    'title' => 'AgriTech Solution',
                    'description' => 'A mobile platform connecting farmers with markets and providing real-time pricing information.',
                    'logo' => '/assets/images/innovation1.jpg',
                    'link' => '#'
                ],
                [
                    'title' => 'Health Monitoring System',
                    'description' => 'Wearable device for remote patient monitoring and health data collection.',
                    'logo' => '/assets/images/innovation2.jpg',
                    'link' => '#'
                ],
                [
                    'title' => 'Renewable Energy Tech',
                    'description' => 'Innovative solar-powered solutions for rural electrification.',
                    'logo' => '/assets/images/innovation3.jpg',
                    'link' => '#'
                ]
            ];
            
            foreach ($innovations as $innovation) {
                echo '
                <div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition transform hover:-translate-y-1">
                    <div class="h-48 bg-gray-200 overflow-hidden">
                        <img src="'.$innovation['logo'].'" alt="'.$innovation['title'].'" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">'.$innovation['title'].'</h3>
                        <p class="text-gray-600 mb-4">'.$innovation['description'].'</p>
                        <a href="'.$innovation['link'].'" class="text-blue-600 font-medium hover:text-blue-800 transition">Learn More</a>
                    </div>
                </div>';
            }
            ?>
        </div>
        
        <div class="text-center mt-10">
            <a href="?page=innovations" class="inline-block px-6 py-2 border-2 border-blue-600 text-blue-600 font-medium rounded-md hover:bg-blue-50 transition">View All Innovations</a>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-16 bg-blue-600 text-white">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl font-bold mb-6">Ready to Submit Your Innovation?</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">Join the WhiteBox platform and get access to government support, funding opportunities, and a network of partners.</p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="#register-modal" class="px-6 py-3 bg-white text-blue-900 font-medium rounded-md hover:bg-gray-100 transition">Register Now</a>
            <a href="?page=about" class="px-6 py-3 border-2 border-white text-white font-medium rounded-md hover:bg-white hover:text-blue-900 transition">Learn How It Works</a>
        </div>
    </div>
</section>