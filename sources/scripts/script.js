

// <script>
// DOM Ready function
document.addEventListener('DOMContentLoaded', function () {
    // Mobile menu functionality
    // const mobileMenuButton = document.getElementById('mobile-menu-button');
    // const closeMobileMenu = document.getElementById('close-mobile-menu');
    // const mobileMenu = document.getElementById('mobile-menu');

    // if (mobileMenuButton && mobileMenu) {
    //     mobileMenuButton.addEventListener('click', () => {
    //         mobileMenu.classList.add('open');
    //         document.body.style.overflow = 'hidden';
    //     });
    // }

    // if (closeMobileMenu && mobileMenu) {
    //     closeMobileMenu.addEventListener('click', () => {
    //         mobileMenu.classList.remove('open');
    //         document.body.style.overflow = 'auto';
    //     });
    // }

    // Close mobile menu when clicking on links
    // const mobileMenuLinks = document.querySelectorAll('#mobile-menu a');
    // mobileMenuLinks.forEach(link => {
    //     link.addEventListener('click', () => {
    //         mobileMenu.classList.remove('open');
    //         document.body.style.overflow = 'auto';
    //     });
    // });

    // Mobile menu functionality
    // DOM Ready function 

    // Mobile menu functionality
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const closeMobileMenu = document.getElementById('close-mobile-menu');
    const mobileMenu = document.getElementById('mobile-menu');
    const overlay = document.getElementById('overlay');

    function toggleMobileMenu() {
        mobileMenu.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
        document.body.classList.toggle('overflow-hidden');
    }

    // Check if mobile menu elements exist and attach event listeners
    if (mobileMenuButton && closeMobileMenu && mobileMenu && overlay) {
        mobileMenuButton.addEventListener('click', toggleMobileMenu);
        closeMobileMenu.addEventListener('click', toggleMobileMenu);
        overlay.addEventListener('click', toggleMobileMenu);
    }

    // Close mobile menu when clicking on links
    const mobileMenuLinks = document.querySelectorAll('#mobile-menu a');
    mobileMenuLinks.forEach(link => {
        link.addEventListener('click', () => {
            mobileMenu.classList.remove('open');
            document.body.style.overflow = 'auto';
        });
    });

    // Simulated modal function
    function openModal() {
        alert('Login modal would open here!');
    }

    // Carousel functionality
    const carousel = document.querySelector('.carousel');
    const carouselInner = document.querySelector('.carousel-inner');
    const carouselItems = document.querySelectorAll('.carousel-item');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
    const indicators = document.querySelectorAll('.carousel-indicator');

    let currentIndex = 0;
    const totalItems = carouselItems.length;

    // Function to update carousel
    function updateCarousel() {
        carouselInner.style.transform = `translateX(-${currentIndex * 100}%)`;

        // Update indicators
        indicators.forEach((indicator, index) => {
            if (index === currentIndex) {
                indicator.classList.add('active');
            } else {
                indicator.classList.remove('active');
            }
        });
    }

    // Next slide
    function nextSlide() {
        currentIndex = (currentIndex + 1) % totalItems;
        updateCarousel();
    }

    // Previous slide
    function prevSlide() {
        currentIndex = (currentIndex - 1 + totalItems) % totalItems;
        updateCarousel();
    }

    // Add event listeners
    if (nextBtn && prevBtn) {
        nextBtn.addEventListener('click', nextSlide);
        prevBtn.addEventListener('click', prevSlide);
    }

    // Add click events to indicators
    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => {
            currentIndex = index;
            updateCarousel();
        });
    });

    // Auto slide every 5 seconds
    setInterval(nextSlide, 5000);

    // Chatbot functionality
    const chatbotToggle = document.getElementById('chatbot-toggle');
    const chatbotContainer = document.getElementById('chatbot-container');
    const chatbotClose = document.getElementById('chatbot-close');

    // Handle opening and closing the chatbot when the toggle button is clicked
    if (chatbotToggle && chatbotContainer) {
        chatbotToggle.addEventListener('click', () => {
            // Toggle the 'open' class to show/hide the chatbot
            chatbotContainer.classList.toggle('open');

            // Change the toggle button's icon based on whether the chatbot is open or closed
            const icon = chatbotToggle.querySelector('i');
            if (chatbotContainer.classList.contains('open')) {
                icon.classList.remove('fa-comment-alt');
                icon.classList.add('fa-times'); // Show the "close" icon
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-comment-alt'); // Show the "chat bubble" icon
            }
        });
    }

    // Handle closing the chatbot when the close button inside the chatbot is clicked
    if (chatbotClose && chatbotContainer) {
        chatbotClose.addEventListener('click', () => {
            // Remove the 'open' class to hide the chatbot
            chatbotContainer.classList.remove('open');

            // Reset the toggle button's icon to the "chat bubble"
            const icon = chatbotToggle.querySelector('i');
            icon.classList.remove('fa-times');
            icon.classList.add('fa-comment-alt');
        });
    }

    // Tab functionality
    const tabBtns = document.querySelectorAll('.tab-btn');
    const tabContents = document.querySelectorAll('.tab-content');

    tabBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const tabId = btn.getAttribute('data-tab');

            // Update active tab button
            tabBtns.forEach(btn => btn.classList.remove('bg-danger', 'text-white'));
            tabBtns.forEach(btn => btn.classList.add('bg-white', 'text-gray-700'));
            btn.classList.add('bg-danger', 'text-white');
            btn.classList.remove('bg-white', 'text-gray-700');

            // Show active tab content
            tabContents.forEach(content => content.classList.remove('active'));
            document.getElementById(`${tabId}-content`).classList.add('active');
        });
    });


    // coloring for the chatbot
    // tailwind.config = {
    //     theme: {
    //         extend: {
    //             colors: {
    //                 whatsapp: {
    //                     green: '#128C7E',
    //                     light: '#ECE5DD',
    //                     chatbg: '#E5DDD5',
    //                     sent: '#DCF8C6',
    //                     received: '#FFFFFF',
    //                     menubg: '#F0F2F5',
    //                 }
    //             }
    //         }
    //     }
    // }

    // Scroll animations
    const scrollElements = document.querySelectorAll('.animate-on-scroll');

    const elementInView = (el, dividend = 1) => {
        const elementTop = el.getBoundingClientRect().top;
        return (
            elementTop <= (window.innerHeight || document.documentElement.clientHeight) / dividend
        );
    };

    const displayScrollElement = (element) => {
        element.classList.add('is-visible');
    };

    const handleScrollAnimation = () => {
        scrollElements.forEach((el) => {
            if (elementInView(el, 1.2)) {
                displayScrollElement(el);
            }
        });
    };

    window.addEventListener('scroll', () => {
        handleScrollAnimation();
    });

    // Initial check on page load
    handleScrollAnimation();

    // Counter animation for stats
    const counters = document.querySelectorAll('.progress-fill');
    const statNumbers = document.querySelectorAll('[id$="-count"]');
    const hasCounted = {};

    const startCounter = (entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !hasCounted[entry.target.id]) {
                hasCounted[entry.target.id] = true;

                // Animate progress bars
                counters.forEach(counter => {
                    const target = counter.getAttribute('data-target');
                    counter.style.width = target + '%';
                });

                // Animate numbers (from PHP)
                const duration = 2000; // ms
                const frameRate = 30; // fps
                const totalFrames = Math.round(duration / (1000 / frameRate));

                statNumbers.forEach(stat => {
                    const target = numberTargets[stat.id]; // <-- comes from PHP
                    let current = 0;
                    const increment = target / totalFrames;

                    const timer = setInterval(() => {
                        current += increment;
                        if (current >= target) {
                            stat.textContent = target.toLocaleString();
                            clearInterval(timer);
                            return;
                        }
                        stat.textContent = Math.round(current).toLocaleString();
                    }, 1000 / frameRate);
                });

                observer.unobserve(entry.target);
            }
        });
    };


    const statsSection = document.getElementById('stats');
    const options = {
        root: null,
        threshold: 0.3,
        rootMargin: '0px'
    };

    if (statsSection) {
        const observer = new IntersectionObserver(startCounter, options);
        observer.observe(statsSection);
    }

    // Vertical tabs functionality
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabPanes = document.querySelectorAll('.tab-pane');

    tabButtons.forEach(button => {
        button.addEventListener('click', () => {
            const tabId = button.getAttribute('data-tab');

            // Remove active class from all buttons and panes
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabPanes.forEach(pane => pane.classList.remove('active'));

            // Add active class to clicked button and corresponding pane
            button.classList.add('active');
            document.getElementById(tabId).classList.add('active');
        });
    });
});
{/* </script> */ }


// <!-- Patent Modal -->
// <script>
// Simple focus trap
let ipPreviouslyFocused = null;

function openIPModal() {
    const modal = document.getElementById('ipModal');
    const backdrop = document.getElementById('ipBackdrop');
    const dialog = document.getElementById('ipDialog');
    const closeBtn = document.getElementById('ipCloseBtn');

    ipPreviouslyFocused = document.activeElement;

    modal.classList.remove('hidden');
    // animate in
    requestAnimationFrame(() => {
        backdrop.classList.remove('opacity-0');
        backdrop.classList.add('opacity-100');
        dialog.classList.remove('opacity-0', 'scale-95');
        dialog.classList.add('opacity-100', 'scale-100');
    });

    // focus first focusable
    setTimeout(() => closeBtn.focus(), 50);

    // ESC to close
    document.addEventListener('keydown', ipEscHandler);
    // backdrop click to close
    backdrop.addEventListener('click', closeIPModal);
    // trap focus
    document.addEventListener('focus', ipFocusTrap, true);
}

function closeIPModal() {
    const modal = document.getElementById('ipModal');
    const backdrop = document.getElementById('ipBackdrop');
    const dialog = document.getElementById('ipDialog');

    // animate out
    backdrop.classList.remove('opacity-100');
    backdrop.classList.add('opacity-0');
    dialog.classList.remove('opacity-100', 'scale-100');
    dialog.classList.add('opacity-0', 'scale-95');

    // wait for transition then hide
    setTimeout(() => {
        modal.classList.add('hidden');
        document.removeEventListener('keydown', ipEscHandler);
        document.removeEventListener('focus', ipFocusTrap, true);
        document.getElementById('ipBackdrop').removeEventListener('click', closeIPModal);
        if (ipPreviouslyFocused) ipPreviouslyFocused.focus();
    }, 150);
}

function ipEscHandler(e) {
    if (e.key === 'Escape') closeIPModal();
}

function ipFocusTrap(e) {
    const modal = document.getElementById('ipModal');
    if (modal.classList.contains('hidden')) return;

    const focusables = modal.querySelectorAll(
        'a[href], button, textarea, input, select, summary, [tabindex]:not([tabindex="-1"])'
    );
    if (!focusables.length) return;

    if (!modal.contains(e.target)) {
        e.stopPropagation();
        focusables[0].focus();
    }
}

// Close button
document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('ipCloseBtn');
    if (btn) btn.addEventListener('click', closeIPModal);
});




// Fetch current Year
document.addEventListener("DOMContentLoaded", () => {
    const yearSpan = document.getElementById("year");
    if (yearSpan) {
        yearSpan.textContent = new Date().getFullYear();
    }
});

// Web colors
tailwind.config = {
    theme: {
        extend: {
            colors: {
                // primary: '#2d73e3ff',
                // secondary: '#8b5cf6',
                // accent: '#ec4899',
                // dark: '#1f2937',
                // light: '#f9fafb'

                // primary: '#1e3a8a',
                primary: '#000000ff',
                secondary: '#0056B3',
                secondary_light: '#007BFF',
                accent: '#006600',
                dark: '#0f172a',
                danger: '#DE2910',
                light: '#f8fafc',
                'black': '#000000',
                // 'kenya-red': '#DE2910',
                // 'kenya-green': '#006600',
                // 'kenya-blue': '#0056B3',
                // 'kenya-light-blue': '#007BFF',
            },
            animation: {
                'slide-in-right': 'slideInRight 0.5s ease-out',
                'slide-in-left': 'slideInLeft 0.5s ease-out',
                'fade-in': 'fadeIn 0.5s ease-out',
                'bounce-in': 'bounceIn 0.6s ease-out',

                // 'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                // 'bounce-gentle': 'bounce 1.5s infinite',
                // 'wiggle': 'wiggle 1s ease-in-out infinite',
                // 'float': 'bounce 2s infinite',
            },
            keyframes: {
                slideInRight: {
                    '0%': { transform: 'translateX(100%)', opacity: '0' },
                    '100%': { transform: 'translateX(0)', opacity: '1' }
                },
                slideInLeft: {
                    '0%': { transform: 'translateX(-100%)', opacity: '0' },
                    '100%': { transform: 'translateX(0)', opacity: '1' }
                },
                fadeIn: {
                    '0%': { opacity: '0' },
                    '100%': { opacity: '1' }
                },
                // bounceIn: {
                //     '0%': { transform: 'scale(0.95)', opacity: '0' },
                //     '50%': { transform: 'scale(1.02)', opacity: '1' },
                //     '100%': { transform: 'scale(1)', opacity: '1' }
                // },
                // 'wiggle': {
                //     '0%, 100%': { transform: 'rotate(-3deg)' },
                //     '50%': { transform: 'rotate(3deg)' },
                // }
            }
        }
    }
}


   

// Back to top button functionality
const backToTopButton = document.getElementById('back-to-top');

window.addEventListener('scroll', () => {
    if (window.pageYOffset > 300) {
        backToTopButton.classList.remove('opacity-0', 'invisible');
        backToTopButton.classList.add('opacity-100', 'visible');
    } else {
        backToTopButton.classList.remove('opacity-100', 'visible');
        backToTopButton.classList.add('opacity-0', 'invisible');
    }
});

backToTopButton.addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
});