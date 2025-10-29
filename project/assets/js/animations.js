// Initialize animations on scroll
$(window).on('load scroll', function () {
    $('.animate-on-scroll').each(function () {
        const elementTop = $(this).offset().top;
        const elementBottom = elementTop + $(this).outerHeight();
        const viewportTop = $(window).scrollTop();
        const viewportBottom = viewportTop + $(window).height();

        if (elementBottom > viewportTop && elementTop < viewportBottom) {
            $(this).addClass('animated');
        }
    });
});

// Carousel animations
$('.carousel').on('slide.bs.carousel', function (e) {
    const $next = $(e.relatedTarget);
    const nextIndex = $next.index();

    $('.carousel-indicators li').removeClass('active');
    $('.carousel-indicators li[data-slide-to="' + nextIndex + '"]').addClass('active');

    // Add animation class to the next slide
    $next.addClass('pre-animate');
    setTimeout(function () {
        $next.removeClass('pre-animate');
    }, 50);
});

// Modal entrance animations
$('.modal').on('show.bs.modal', function () {
    $(this).find('.modal-content').addClass('modal-pre-animate');
    setTimeout(() => {
        $(this).find('.modal-content').removeClass('modal-pre-animate');
    }, 10);
});

// Page transition animations
function navigateToPage(url) {
    $('body').addClass('page-exit');
    setTimeout(() => {
        window.location.href = url;
    }, 500);
}

// Smooth page transitions
$('a:not([href^="#"]):not([target="_blank"])').on('click', function (e) {
    if ($(this).attr('href') && !$(this).hasClass('no-transition')) {
        e.preventDefault();
        navigateToPage($(this).attr('href'));
    }
});