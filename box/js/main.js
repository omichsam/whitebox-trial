// Document ready
$(document).ready(function () {
    // Initialize tooltips
    $('[data-toggle="tooltip"]').tooltip();

    // Initialize popovers
    $('[data-toggle="popover"]').popover();

    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn();
        } else {
            $('.back-to-top').fadeOut();
        }
    });

    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 800);
        return false;
    });

    // Smooth scrolling for anchor links
    $('a[href*="#"]').on('click', function (e) {
        e.preventDefault();

        $('html, body').animate(
            {
                scrollTop: $($(this).attr('href')).offset().top - 70,
            },
            500,
            'linear'
        );
    });

    // Mobile menu toggle
    $('.navbar-toggler').click(function () {
        $(this).toggleClass('active');
    });

    // Close mobile menu when clicking a link
    $('.navbar-nav>li>a').on('click', function () {
        $('.navbar-collapse').collapse('hide');
    });

    // Page loading animation
    $('body').addClass('fade-in');

    // Initialize all carousels
    $('.owl-carousel').each(function () {
        $(this).owlCarousel({
            loop: true,
            margin: 20,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });
    });

    // Form validation
    $('form.needs-validation').on('submit', function (e) {
        if (!this.checkValidity()) {
            e.preventDefault();
            e.stopPropagation();
        }
        $(this).addClass('was-validated');
    });

    // Dynamic content loading
    $('[data-load]').click(function (e) {
        e.preventDefault();
        var target = $(this).data('load');
        $('.dynamic-content').load('includes/' + target + '.php');
    });

    // Logout functionality
    $('#logout-btn').click(function (e) {
        e.preventDefault();
        $.post('includes/logout.php', function () {
            window.location.href = 'index.php';
        });
    });
});