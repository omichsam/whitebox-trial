<style>
    /* @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap'); */

    /* body {
        font-family: 'Inter', sans-serif;
        background: linear-gradient(to bottom, #f8fafc, #e2e8f0);
        min-height: 100vh;
    } */

    .timeline-arrow::after {
        content: '';
        position: absolute;
        top: 50%;
        width: 0;
        height: 0;
        border-top: 12px solid transparent;
        border-bottom: 12px solid transparent;
    }

    .timeline-right .timeline-arrow::after {
        left: 100%;
        border-left: 12px solid white;
    }

    .timeline-left .timeline-arrow::after {
        right: 100%;
        border-right: 12px solid white;
    }

    .animate-on-scroll {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }

    .animate-on-scroll.visible {
        opacity: 1;
        transform: translateY(0);
    }

    .timeline-card {
        transition: all 0.3s ease;
        position: relative;
        width: auto !important;
    }

    .timeline-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.15);
    }

    @media (max-width: 768px) {
        .timeline-arrow::after {
            display: none;
        }
    }
</style>

<section id="how-it-works" class="w-full max-w-4xl mx-auto px-4">
    <div class="text-center mb-10">
        <h2 class="text-3xl md:text-4xl font-bold text-accent mb-3">Our Process</h2>
        <p class="text-gray-600 max-w-2xl mx-auto">From idea to implementation - how we support innovation at every
            stage</p>
    </div>

    <!-- Compact Timeline with Arrows -->
    <div class="relative">
        <!-- Timeline line -->
        <div
            class="absolute left-4 md:left-1/2 md:-translate-x-1/2 h-full w-1 bg-gradient-to-b from-primary to-secondary">
        </div>

        <!-- Timeline Items -->
        <div class="space-y-6 pl-12 md:pl-0">
            <!-- Stage 1 -->
            <div class="animate-on-scroll flex flex-col md:flex-row timeline-right">
                <div class="md:w-1/2 md:pr-8 flex">
                    <div class="timeline-card bg-white p-3 rounded-xl shadow-md w-full timeline-arrow">
                        <div class="flex items-start mb-2">
                            <div
                                class="bg-gradient-to-br from-primary to-secondary w-12 h-12 rounded-full flex items-center justify-center text-white text-lg mr-4 flex-shrink-0">
                                <i class="fas fa-user-circle"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-primary">Tell Us Who You Are</h3>
                                <div
                                    class="bg-slate-100 inline-block px-2 py-1 rounded-full text-xs font-medium text-primary mt-1">
                                    Stage 1
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600 text-md">Create an account, tell us about your innovation, and submit
                            the details of your product or solution.</p>
                    </div>
                </div>
                <div class="hidden md:block md:w-1/2"></div>
            </div>

            <!-- Stage 2 -->
            <div class="animate-on-scroll flex flex-col md:flex-row timeline-left">
                <div class="hidden md:block md:w-1/2 md:pr-8"></div>
                <div class="md:w-1/2 md:pl-8 flex">
                    <div class="timeline-card bg-white p-2 rounded-xl shadow-md w-full timeline-arrow">
                        <div class="flex items-start mb-3">
                            <div
                                class="bg-gradient-to-br from-primary to-secondary w-12 h-12 rounded-full flex items-center justify-center text-white text-lg mr-4 flex-shrink-0">
                                <i class="fas fa-clipboard-check"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-primary">Evaluation</h3>
                                <div
                                    class="bg-slate-100 inline-block px-2 py-1 rounded-full text-xs font-medium text-primary mt-1">
                                    Stage 2
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600 text-md">
                            Your innovation will be evaluated to determine its viability and the support required
                            Priority will be given to products that focus on the Bottom-Up Economic Transformation
                            Agenda (BETA).</p>
                    </div>
                </div>
            </div>

            <!-- Stage 3 -->
            <div class="animate-on-scroll flex flex-col md:flex-row timeline-right">
                <div class="md:w-1/2 md:pr-8 flex">
                    <div class="timeline-card bg-white p-2 rounded-xl shadow-md w-full timeline-arrow">
                        <div class="flex items-start mb-2">
                            <div
                                class="bg-gradient-to-br from-primary to-secondary w-12 h-12 rounded-full flex items-center justify-center text-white text-lg mr-4 flex-shrink-0">
                                <i class="fas fa-cogs"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-primary">Development & Growth</h3>
                                <div
                                    class="bg-slate-100 inline-block px-2 py-1 rounded-full text-xs font-medium text-primary mt-1">
                                    Stage 3
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600 text-md">Viable innovations are considered for further development into
                            products or services.</p>
                    </div>
                </div>
                <div class="hidden md:block md:w-1/2"></div>
            </div>

            <!-- Stage 4 -->
            <div class="animate-on-scroll flex flex-col md:flex-row timeline-left">
                <div class="hidden md:block md:w-1/2 md:pr-8"></div>
                <div class="md:w-1/2 md:pl-8 flex">
                    <div class="timeline-card bg-white p-2 rounded-xl shadow-md w-full timeline-arrow">
                        <div class="flex items-start mb-2">
                            <div
                                class="bg-gradient-to-br from-primary to-secondary w-12 h-12 rounded-full flex items-center justify-center text-white text-lg mr-4 flex-shrink-0">
                                <i class="fas fa-rocket"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-primary">Scale & Transformation</h3>
                                <div
                                    class="bg-slate-100 inline-block px-2 py-1 rounded-full text-xs font-medium text-primary mt-1">
                                    Stage 4
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600 text-md">Scale & Transformation
                            Stage 4
                            Work with the Huduma Whitebox team and partners to role out approved products or services
                            guided by Government procurement law</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-12 mb-4 text-center">
        <a onclick="openModal('loginForm')"
            class="inline-flex items-center bg-gradient-to-r from-primary to-secondary text-white px-5 py-2.5 rounded-lg font-semibold hover:opacity-90 transition duration-300 shadow-md hover:shadow-lg">
            <span>Start Your Innovation Journey</span>
            <i class="fas fa-arrow-right ml-2"></i>
        </a>
    </div>
</section>

<script>
    // Simple scroll animation for timeline items
    document.addEventListener('DOMContentLoaded', function () {
        const timelineItems = document.querySelectorAll('.animate-on-scroll');

        function checkScroll() {
            timelineItems.forEach(item => {
                const position = item.getBoundingClientRect();

                // If item is in viewport
                if (position.top < window.innerHeight - 100) {
                    item.classList.add('visible');
                }
            });
        }

        // Initial check
        checkScroll();

        // Check on scroll
        window.addEventListener('scroll', checkScroll);
    });
</script>