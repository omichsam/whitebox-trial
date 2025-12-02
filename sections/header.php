<style>
    /* animated icon on the menu */
    .icon-container {
        /* display: inline-flex;
        align-items: center; */
        cursor: pointer;
        margin-left: 8px;
        /* Space between the icon and the text */
    }

    .icon {
        width: 30px;
        /* Adjust the size of the icon */
        height: 30px;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: repeat(2, 1fr);
        gap: 3px;
        padding: 5px;
    }

    .icon div {
        background-color: #060d1eff;
        /* width: 100%;
        height: 100%; */
        opacity: 1;
    }

    /* Animate only on hover */
    .icon-container:hover .icon div {
        animation: fade 1.2s linear infinite;
    }

    /* Clockwise sequence */
    .icon-container:hover .icon div:nth-child(1) {
        animation-delay: 0s;
    }

    .icon-container:hover .icon div:nth-child(2) {
        animation-delay: 0.3s;
    }

    .icon-container:hover .icon div:nth-child(4) {
        animation-delay: 0.6s;
    }

    .icon-container:hover .icon div:nth-child(3) {
        animation-delay: 0.9s;
    }

    @keyframes fade {

        0%,
        100% {
            opacity: 1;
        }

        50% {
            opacity: 0.2;
        }
    }

    /* <style> */
    .modal {
        transition: opacity 0.3s ease;
    }

    .modal-content {
        transition: transform 0.3s ease, opacity 0.3s ease;
    }

    .animate-slide-in-right {
        animation: slideInRight 0.3s forwards;
    }

    .animate-slide-in-left {
        animation: slideInLeft 0.3s forwards;
    }

    .animate-fade-in {
        animation: fadeIn 0.3s forwards;
    }

    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }

        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slideInLeft {
        from {
            transform: translateX(-100%);
            opacity: 0;
        }

        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    .success-message {
        transition: all 0.5s ease;
    }

    .success-message.show {
        opacity: 1;
        transform: translateY(0);
    }

    .btn-submit {
        background: linear-gradient(to right, #4f46e5, #ec4899);
    }

    .btn-submit:hover {
        background: linear-gradient(to right, #4338ca, #db2777);
    }
</style>

<header class="gradient-light text-primary py-4 shadow-lg sticky top-0 z-50">
    <div class="container mx-auto flex justify-between items-center px-4 text-dark">
        <!-- Left Logo -->
        <div class="flex items-center">
            <div
                class="w-32 md:w-40 h-20 md:h-12 bg-whitea rounded-lg flex items-center justify-center mr-3 overflow-hidden">
                <img src="sources/images/logo/Whitebox.png" alt="Whitebox Logo" class="w-full h-full object-contain p-1"
                    height="150px">
            </div>
            <div class="hidden md:block">
                <!-- <h1 class="text-md font-semibold italics">Innovation Platform</h1> -->
                <!-- <h1 class="text-lg font-bold">Huduma WhiteBox</h1>
                <p class="text-xs opacity-80">Innovation Platform</p> -->
            </div>
        </div>

        <!-- Desktop Navigation -->
        <nav class="hidden lg:block">
            <ul class="flex space-x-4 xl:space-x-6 font-bold">
                <li><a href="index.php"
                        class="text-primary  hover:text-accent transition duration-300 font-bold text-sm xl:text-base">HOME</a>
                </li>
                <li><a href="about.php"
                        class="text-primary hover:text-accent transition duration-300 font-bold text-sm xl:text-base">WHO WE
                        ARE</a></li>
                <!-- <li><a href="index.php#partners"
                        class="hover:text-accent transition duration-300 font-semibold text-sm xl:text-base">PARTNERS</a>
                </li> -->
                <!-- Icon Menu -->
                <li class="flex items-center">
                    <a href="javascript:void(0)" onclick="openModal('infoModal')"
                        class="text-accent hover:text-accent transition duration-300 font-bold text-sm xl:text-base">
                        <div class="icon-container">
                            <div class="icon hover:text-accent">
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                    </a>
                </li>

                <li><a href="contact.php"
                        class="text-primary hover:text-accent transition duration-300 font-bold text-sm xl:text-base">CONTACT</a>
                </li>
                <li><a href="#e-learning"
                        class="text-primary hover:text-accent transition duration-300 font-bold text-sm xl:text-base"
                        onclick="openModal('redirectModal')">E-LEARNING</a>
                </li>
                <!-- <button onclick="openModal('confirmModal')"
  class="px-6 py-3 bg-primary text-white rounded-lg hover:bg-primary/90 transition">
  Open Confirmation
</button> -->


                <!-- Login Button -->
                <li>
                    <a href="index1.php"  ooonclick="openModal('authModal', 'loginForm')"
                        class="px-4 py-2 xl:px-6 xl:py-2 bg-danger border-danger text-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:from-danger/90 hover:to-danger/90 font-medium text-sm xl:text-base">
                        Login <i class="ml-2 fa fa-sign-in 2x"></i>
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Right Logo -->
        <div class="hidden md:flex items-center">
            <div
                class="w-12 md:w-16 h-10 md:h-12 rounded-xl flex items-center justify-center ml-3 overflow-hidden ">
                <img src="sources/images/logo/Coat_of_arms_of_Kenya.svg.png" alt="Government Logo"
                    class="w-full h-full object-contain bg-white/30 p-1">
            </div>
        </div>

        <!-- Mobile Menu Button -->
        <button id="mobile-menu-button" class="lg:hidden text-2xl text-primary bg-white/10 p-2 rounded-lg">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- Mobile Menu (initially hidden) -->
    <div id="mobile-menu"
        class="fixed inset-0 z-50 gradient-light  text-primary  transform -translate-x-full transition-transform duration-300 lg:hidden">
        <div class="flex justify-between items-center p-4 border-b border-gray-700">
            <div class="flex items-center">
                <div
                    class="w-auto h-10 gradient-light rounded-lg flex items-center justify-center mr-3 overflow-hidden">
                    <img src="sources/images/logo/Whitebox.png" alt="Whitebox Logo"
                        class="w-full h-full object-contain p-1" height="150px">
                </div>
                <h1 class="text-lg font-bold text-primary">Huduma WhiteBox</h1>
            </div>
            <button id="close-mobile-menu" class="text-2xl text-primary bg-accent/10 p- rounded-lg">
                <i class="fas fa-times fa-2xx"></i>
            </button>
        </div>
        <nav class="p-6 flex-1 overflow-y-auto  text-primary">
            <ul class="space-y-6 text-primary">
                <li><a href="index.php" class="block  hover:text-accent transition duration-300 font-bold py-2">HOME</a>
                </li>
                <li><a href="about.php" class="block hover:text-accent transition duration-300 font-bold py-2">WHO WE
                        ARE</a></li>
                <!-- Icon Menu -->
                <li class="flex items-center">
                    <a href="javascript:void(0)" onclick="openModal('infoModal')"
                        class="hover:text-accent transition duration-300 font-semibold text-sm xl:text-base">
                        <div class="icon-container">
                            <div class="icon hover:text-accent">
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                    </a>
                </li>
                <li><a href="index.php#partners"
                        class="block hover:text-accent transition duration-300 font-bold py-2">PARTNERS</a></li>
                <li><a href="contact.php"
                        class="block hover:text-accent transition duration-300 font-bold py-2">CONTACT</a></li>
                <li><a href="#e-learning"
                        class="block hover:text-accent transition duration-300 font-bold py-2">E-LEARNING</a></li>
                <li class="pt-4">
                    <a href="index1.php" ooonclick="openModal('authModal', 'loginForm')"
                        class="inline-block px-6 py-3 bg-gradient-to-r from-dark to-danger text-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 hover:from-primary/90 hover:to-secondary/90 font-medium">
                        Login <i class="ml-2 fa fa-sign-in 2x"></i>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Overlay for mobile menu -->
    <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden"></div>
</header>