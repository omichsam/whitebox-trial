$(document).ready(function() {
    // Navigation handling
    $(".nav-link").on("click", function(e) {
        e.preventDefault();
        const target = $(this).attr("href");
        $("html, body").animate({
            scrollTop: $(target).offset().top - 80
        }, 800);
    });
    
    // Smooth scrolling for anchor links
    $('a[href*="#"]').on('click', function(e) {
        e.preventDefault();
        $('html, body').animate(
            { scrollTop: $($(this).attr('href')).offset().top - 80 },
            500,
            'linear'
        );
    });
    
    // Carousel initialization
    $('#carousel-example-generic').carousel({
        interval: 5000,
        pause: "hover"
    });
    
    // Modal handling
    $('.modal').on('shown.bs.modal', function() {
        $(this).find('input[type="text"]').first().focus();
    });
    
    // Back to top button
    $(window).scroll(function() {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    
    $('.back-to-top').click(function(e) {
        e.preventDefault();
        $('html, body').animate({scrollTop: 0}, 800);
        return false;
    });
    
    // Form validation initialization
    initializeFormValidation();
    
    // Page specific handlers
    initializePageHandlers();
});

function initializeFormValidation() {
    // Initialize form validation for all forms
    $('form').each(function() {
        $(this).validate({
            errorClass: 'error',
            validClass: 'valid',
            errorPlacement: function(error, element) {
                error.insertAfter(element).addClass('text-danger small');
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass(errorClass).removeClass(validClass);
                $(element).closest('.form-group').addClass('has-error');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass(errorClass).addClass(validClass);
                $(element).closest('.form-group').removeClass('has-error');
            }
        });
    });
}

function initializePageHandlers() {
    // About Us click handler
    $("#about_us").click(function() {
        $(".home_pages").hide();
        $(".parentsd").hide();
        $(".about_uspages").show();
        $(".innovations_pages").hide();
    });

    // E-learning click handlers
    $("#open_elerning, #e_learningp").click(function() {
        $("#login_headers").html("SIGN UP TO E-LEARNING");
        $(".logins").hide();
        $("#elearning_page").show();
    });

    // Home page click handler
    $("#home_pagedd").click(function() {
        $(".parentsd").hide();
        $(".home_pages").show();
        $(".innovations_pages").hide();
        $(".about_uspages").hide();
    });

    // Login/Register navigation handlers
    $("#back_tologin, #backlogins").click(function() {
        $(".logins").hide();
        $("#login_page").show();
        $("#login_headers").html("LOGIN HERE");
    });

    $("#back_toregister").click(function() {
        $("#login_headers").html("SIGN UP HERE");
        $(".logins").hide();
        $("#register_page").show();
    });

    // Password reset handler
    $("#forgot_pwd_title").click(function() {
        $("#login_headers").html("RESET PASSWORD");
        $(".logins").hide();
        $("#pass_resetpage").show();
    });

    // Menu buttons handler
    $(".menubtns").click(function() {
        var my_role = $(this).attr("role");
        $(".home_pages").hide();
        $(".modal-backdrop").hide();
        $('body').removeClass("modal-open");
        $("#mainMenu").modal("hide").removeData();
        $(".parentsd").hide();
        $("." + my_role).show();
    });

    // Login view buttons handler
    $(".loginview_btns").click(function() {
        $(".logins").hide();
        $("#login_page").show();
        $("#login_headers").html("LOGIN HERE");
    });

    // handler for innovations link
    $("#innovations_pages").click(function() {
        $(".home_pages").hide();
        $(".parentsd").hide();
        $(".about_uspages").hide();
        $(".innovations_pages").show();
    });
}