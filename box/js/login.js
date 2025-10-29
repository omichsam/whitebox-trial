$(document).ready(function () {
    // Switch between login and register forms
    $('#show-register').click(function (e) {
        e.preventDefault();
        $('#loginmodal').modal('hide');
        $('#registermodal').modal('show');
    });

    $('#show-login').click(function (e) {
        e.preventDefault();
        $('#registermodal').modal('hide');
        $('#loginmodal').modal('show');
    });

    // Accept terms button
    $('#accept-terms').click(function () {
        $('#terms').prop('checked', true);
        $('#termsModal').modal('hide');
    });

    // Login form submission
    $('#login-form').submit(function (e) {
        e.preventDefault();

        var form = $(this);
        if (form[0].checkValidity() === false) {
            e.stopPropagation();
            form.addClass('was-validated');
            return;
        }

        var email = $('#login-email').val();
        var password = $('#login-password').val();
        var remember = $('#remember-me').is(':checked');

        $.ajax({
            url: 'includes/login_process.php',
            type: 'POST',
            data: {
                email: email,
                password: password,
                remember: remember
            },
            beforeSend: function () {
                $('#login-notification').html('<div class="alert alert-info">Logging in...</div>');
            },
            success: function (response) {
                if (response.success) {
                    $('#login-notification').html('<div class="alert alert-success">Login successful! Redirecting...</div>');
                    window.location.href = response.redirect;
                } else {
                    $('#login-notification').html('<div class="alert alert-danger">' + response.message + '</div>');
                }
            },
            error: function () {
                $('#login-notification').html('<div class="alert alert-danger">An error occurred. Please try again.</div>');
            }
        });
    });

    // Registration form submission
    $('#register-form').submit(function (e) {
        e.preventDefault();

        var form = $(this);
        if (form[0].checkValidity() === false) {
            e.stopPropagation();
            form.addClass('was-validated');
            return;
        }

        var firstName = $('#first-name').val();
        var lastName = $('#last-name').val();
        var email = $('#register-email').val();
        var phone = $('#phone').val();
        var password = $('#register-password').val();
        var confirmPassword = $('#confirm-password').val();

        if (password !== confirmPassword) {
            $('#register-notification').html('<div class="alert alert-danger">Passwords do not match</div>');
            return;
        }

        $.ajax({
            url: 'includes/register_process.php',
            type: 'POST',
            data: {
                first_name: firstName,
                last_name: lastName,
                email: email,
                phone: phone,
                password: password
            },
            beforeSend: function () {
                $('#register-notification').html('<div class="alert alert-info">Registering your account...</div>');
            },
            success: function (response) {
                if (response.success) {
                    $('#register-notification').html('<div class="alert alert-success">Registration successful! Please check your email to verify your account.</div>');
                    setTimeout(function () {
                        $('#registermodal').modal('hide');
                        $('#loginmodal').modal('show');
                    }, 3000);
                } else {
                    $('#register-notification').html('<div class="alert alert-danger">' + response.message + '</div>');
                }
            },
            error: function () {
                $('#register-notification').html('<div class="alert alert-danger">An error occurred. Please try again.</div>');
            }
        });
    });

    // Forgot password link
    $('#forgot-password-link').click(function (e) {
        e.preventDefault();
        $('#loginmodal').modal('hide');
        alert('Password reset functionality coming soon!');
    });
});