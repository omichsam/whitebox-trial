// Password strength indicator
function checkPasswordStrength(password) {
    let strength = 0;

    // Length check
    if (password.length >= 8) strength++;
    if (password.length >= 12) strength++;

    // Contains both lower and uppercase characters
    if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength++;

    // Contains numbers
    if (password.match(/([0-9])/)) strength++;

    // Contains special characters
    if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength++;

    return strength;
}

// Initialize password strength indicator
$("#newpassword, #passwordw1").on("keyup", function () {
    const password = $(this).val();
    const strength = checkPasswordStrength(password);
    const strengthBar = $(this).siblings(".strength-meter");

    strengthBar.removeClass("weak medium strong");

    if (strength <= 2) {
        strengthBar.addClass("weak").css("width", "40%");
    } else if (strength <= 4) {
        strengthBar.addClass("medium").css("width", "70%");
    } else {
        strengthBar.addClass("strong").css("width", "100%");
    }
});

// Email validation
function validateEmail(email) {
    const re = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    return re.test(String(email).toLowerCase());
}

// Form submission handlers
$("#login_btn").click(handleLogin);
$("#SubmitButton").click(handleRegistration);
$("#Submitelerning").click(handleElearningRegistration);

function handleLogin() {
    const email = $("#username").val();
    const password = $("#password-field").val();

    if (!email || !password) {
        showError("error_data", "All fields are required");
        return;
    }

    if (!validateEmail(email)) {
        showError("error_data", "Please enter a valid email address");
        return;
    }

    // AJAX login request
    $.ajax({
        url: 'login/login.php',
        method: 'POST',
        data: {
            busername: btoa(email),
            bpass: btoa(password)
        },
        success: function (response) {
            const data = atob(response);
            handleLoginResponse(data, email);
        },
        error: function () {
            showError("error_data", "An error occurred. Please try again.");
        }
    });
}

function handleLoginResponse(response, email) {
    if (response === "e_learning") {
        // Handle e-learning login
        loadDashboard("e_learning", email);
    } else if (response === "portal") {
        // Handle portal login
        loadDashboard("dashboard", email);
    } else {
        // Show error message
        showError("error_data", response);
    }
}

function loadDashboard(type, email) {
    $.post(`mydashboard/${type}.php`, { model: email }, function (data) {
        $(".modal-backdrop").hide();
        $('body').removeClass("modal-open");
        $("#home_pagedata").hide().html("");
        $("#loginmodal").modal("hide").removeData();
        $("#landing_page").show().html(data);
    });
}

function showError(elementId, message) {
    $(`#${elementId}`).text(message).css("color", "red");
}