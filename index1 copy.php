<?php
session_start();
?>
<!DOCTYPE html>

<?php
$id = "";
$datab = "not_shown";

if (isset($_SESSION["id"])) {

    $loginuser = $_SESSION["username"];

    $user = base64_decode($loginuser);
    //echo $user;

    include("connect.php");
    $user_not = "";



    $checkExist = mysqli_query($con, "SELECT * FROM users WHERE email='$user'") or die(mysqli_error($con));

    if (mysqli_num_rows($checkExist) != 0) {

        $user_not = "dashboard";

    } else {

        $checkExist = mysqli_query($con, "SELECT * FROM e_learning_users WHERE email='$user'") or die(mysqli_error($con));

        if (mysqli_num_rows($checkExist) != 0) {

            $user_not = "e_learning";

        } else {
            $_SESSION = array();

            // Destroy the session.
            session_destroy();
            //echo base64_encode("success");
            ?>
            <script type="text/javascript">
                location.replace("index.php");
            </script>
            <?php
        }



    }

} else {
    $datab = "";
}
//echo $_SESSION["username"];
?>

<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">


     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* Base Styles */
        /* * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

            background-size: cover;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        } */

        /* background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), 
                        url('Huduma_WhiteBox/images/background.jpg') no-repeat center center fixed; */
        /* .auth-container {
            width: 100%;

        } */

        .auth_space {
            width: 50%;
            margin: 0 auto;
        }

        .logins {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            padding: 30px;
            width: 100%;
            transition: all 0.3s ease;
        }

        .card-header {
            text-align: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }

        .card-header h2 {
            color: #333;
            font-weight: 600;
            margin-top: 10px;
        }

        .back-home {
            display: inline-flex;
            align-items: center;
            color: #6c757d;
            text-decoration: none;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .back-home:hover {
            color: #007bff;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #555;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            transition: all 0.3s;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
            outline: none;
        }

        .password-field-container {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6c757d;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-outline {
            background-color: transparent;
            border: 1px solid #007bff;
            color: #007bff;
        }

        .btn-outline:hover {
            background-color: #007bff;
            color: white;
        }

        .card-footer {
            text-align: center;
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #eee;
            font-size: 14px;
            color: #6c757d;
        }

        .card-footer a {
            color: #007bff;
            text-decoration: none;
        }

        .card-footer a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: #dc3545;
            font-size: 14px;
            margin-top: 10px;
            text-align: center;
        }

        .checkbox-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .checkbox-container input {
            margin-right: 10px;
        }

        .password-strength {
            margin-top: 8px;
        }

        .strength-meter {
            height: 5px;
            border-radius: 5px;
            margin-bottom: 5px;
            transition: all 0.3s;
        }

        .strength-text {
            font-size: 12px;
            color: #6c757d;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            margin: 0 -10px;
        }

        .col-md-6 {
            flex: 0 0 50%;
            max-width: 50%;
            padding: 0 10px;
        }

        /* Animation classes */
        .animation {
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .not_shown {
            display: none;
        }

        /* Responsive adjustments */
        @media all and (max-width:768px) {
            .mobile_hidden {
                display: none !important;
            }

            .mobipdless {
                padding: 4px !important;
            }

            .col-md-6 {
                flex: 0 0 100%;
                max-width: 100%;
            }

            .logins {
                padding: 20px;
            }

            body {
                padding: 15px;
            }
        }

        @media all and (min-width: 768px) {
            .desktop_hidden {
                display: none !important;
            }
        }

        @media all and (max-width: 480px) {
            .logins {
                padding: 15px;
            }

            .card-header h2 {
                font-size: 1.5rem;
            }
        }

        /* Loader */
        /* #loader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 9999;
        } */

        #loaderimg {
            width: 80px;
            height: 80px;
        }

        .default_header {
            text-align: center;
            text-transform: uppercase;
            font-weight: bolder;
        }
    </style>
    <?php include('links.php');
    ?>
</head>



<body class="nno_padding container-fluid" id="bodysd_full">
    <input type="hidden" class="splashinputs" id="user_email">
    <div class="containerfluid- no_padding not_shown" id="home_pagedata"></div>
    <div class="container-fluid no_padding" id="landing_page"> 


        <!-- <div class="container no_padding">
            <div class="container no_padding"> -->


                <!-- Login Section -->
                <div class="logins" id="login_page">
                    <div class="card-header">
                        <a class="back-home" href="index.php">
                            <i class="fas fa-arrow-left"></i> Back Home
                        </a>
                        <h2>LOGIN HERE</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <button class="btn btn-outline" id="open_elerning">
                                <i class="fas fa-graduation-cap"></i> Sign-up to e-learning
                            </button>
                        </div>

                        <div id="notific"></div>
                        <form class="omb_loginForm bv-form" autocomplete="off" method="POST" novalidate="novalidate">
                            <div class="form-group">
                                <label for="username">Email</label>
                                <input type="email" id="username" class="form-control" name="email"
                                    placeholder="Enter your email" required>
                            </div>
                            <div class="form-group">
                                <label for="password-field">Password</label>
                                <input id="password-field" type="password" class="form-control"
                                    placeholder="Enter your password" name="password" required>
                                <span class="password-toggle" id="togglePassword">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                            <button type="button" class="btn btn-primary" id="login_btn">
                                <i class="fas fa-sign-in-alt"></i> Login to WhiteBox
                            </button>
                        </form>
                        <div class="error-message" id="error_data"></div>
                    </div>
                    <div class="card-footer">
                        <a class="resete_pass" id="forgot_pwd_title" style="cursor: pointer;">
                            <i class="fas fa-key"></i> Forgot Password?
                        </a>
                        <div style="margin-top: 10px;">Don't have an account?
                            <a id="back_toregister" style="cursor:pointer"><strong> Sign Up</strong></a>
                        </div>
                    </div>
                </div>

                <!-- Password Reset Section -->
                <div class="animation not_shown logins" id="pass_resetpage">
                    <div class="card-header">
                        <a class="back-home" href="index.php">
                            <i class="fas fa-arrow-left"></i> Back Home
                        </a>
                        <h2>RESET PASSWORD</h2>
                    </div>

                    <div class="card-body">
                        <div class="recover_dives" id="rec_ver">
                            <p>Enter your email to reset your password</p>
                            <form id="recover_form" class="omb_loginForm bv-form" autocomplete="off" method="POST"
                                novalidate="novalidate">
                                <div class="form-group">
                                    <label for="remail">Email</label>
                                    <input type="email" class="form-control email" id="remail" name="remail"
                                        placeholder="Enter your email" required>
                                </div>
                                <button type="button" id="recover_now" class="btn btn-primary">
                                    <i class="fas fa-redo"></i> Reset Your Password
                                </button>
                            </form>
                            <div class="error-message" id="recovery_error"></div>
                        </div>

                        <div class="not_shown recover_dives" id="new_pass">
                            <p>Check your email for confirmation key</p>
                            <form id="recovernew_form" class="omb_loginForm bv-form" autocomplete="off" method="POST"
                                novalidate="novalidate">
                                <div class="form-group">
                                    <label for="code">Confirmation Key</label>
                                    <input type="text" class="form-control email" id="code" name="code"
                                        placeholder="Enter confirmation key" required>
                                </div>
                                <button type="button" id="confirm_now" class="btn btn-primary">
                                    <i class="fas fa-check"></i> Confirm Code
                                </button>
                            </form>
                            <div class="error-message" id="confirm_error"></div>
                        </div>

                        <div class="not_shown recover_dives" id="confirm_mcodes">
                            <p>Check your email for confirmation key</p>
                            <form id="recovernew_form" class="omb_loginForm bv-form" autocomplete="off" method="POST"
                                novalidate="novalidate">
                                <div class="form-group">
                                    <label for="conf_codes">Confirmation Key</label>
                                    <input type="text" class="form-control email" id="conf_codes" name="code"
                                        placeholder="Enter confirmation key" required>
                                </div>
                                <button type="button" id="confirm_codesd" class="btn btn-primary">
                                    <i class="fas fa-check"></i> Confirm
                                </button>
                            </form>
                            <div class="error-message" id="confirm_dderror"></div>
                        </div>

                        <div class="not_shown recover_dives" id="newnow_pass">
                            <p>Create new password</p>
                            <form id="new_passset" class="omb_loginForm bv-form" autocomplete="off" method="POST"
                                novalidate="novalidate">
                                <input name="emailsets" id="emailsets" type="hidden" value="">
                                <div class="form-group">
                                    <label for="password_n">New Password</label>
                                    <input type="password" class="form-control email" id="password_n" name="password_n"
                                        placeholder="New Password" required>
                                    <span class="password-toggle" id="toggleNewPassword">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label for="new_passworn">Confirm Password</label>
                                    <input type="password" class="form-control email" id="new_passworn"
                                        name="new_passworn" placeholder="Repeat Password" required>
                                    <span class="password-toggle" id="toggleConfirmPassword">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                                <button type="button" id="create_newpass" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save Password
                                </button>
                            </form>
                            <div class="error-message" id="createerror"></div>
                        </div>
                    </div>
                    <div class="card-footer">
                        Back to login page? <a id="backlogins" style="cursor: pointer;">Click here</a>
                    </div>
                </div>

                <!-- Registration Section -->
                <div class="animation not_shown logins" id="register_page">
                    <div class="card-header">
                        <a class="back-home" href="index.php">
                            <i class="fas fa-arrow-left"></i> Back Home
                        </a>
                        <h2>SIGN UP</h2>
                    </div>
                    <div class="card-body">
                        <div id="notific"> </div>
                        <form method="POST" id="reg_form" novalidate="novalidate" class="bv-form">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control" id="first_name" name="first_name"
                                        placeholder="First Name" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control" id="last_name" name="last_name"
                                        placeholder="Last Name" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="Email">Email</label>
                                    <input type="email" class="form-control" id="Email" name="email" placeholder="Email"
                                        required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" maxlength="13"
                                        placeholder="Phone Number" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" id="gender" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="form-group" ng-app="myapp">
                                <div ng-controller="PasswordController">
                                    <label for="newpassword">Password</label>
                                    <input type="password" class="form-control" id="newpassword" name="newpassword"
                                        placeholder="Password" ng-model="newpassword" ng-change="analyze(newpassword)"
                                        required>
                                    <span class="password-toggle" id="toggleRegPassword">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                    <div class="password-strength">
                                        <div class="strength-meter" id="strengthmeter" ng-style="passwordStrength">
                                        </div>
                                        <div class="strength-text" id="pass_t">
                                            Password strength: <span id="str_stregnth"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password_confirm">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirm"
                                    name="password_confirm" placeholder="Confirm Password" required>
                                <span class="password-toggle" id="toggleRegConfirmPassword">
                                    <i class="fas fa-eye"></i>
                                </span>
                            </div>
                            <div class="checkbox-container">
                                <input required checked class="pancityd" id="termsabd" name="termsa" type="checkbox">
                                <label for="termsabd">I accept <a href="#modal">Terms and Conditions</a></label>
                            </div>
                            <button type="button" class="btn btn-primary" id="SubmitButton">
                                <i class="fas fa-user-plus"></i> Sign Up
                            </button>
                        </form>
                        <div class="error-message" id="sign_uperror"></div>
                    </div>
                    <div class="card-footer">
                        <div>Already have an account? <a style="cursor:pointer;" id="back_tologin">Log In</a></div>
                    </div>
                </div>

                <!-- E-learning Section -->
                <div class="animation not_shown logins" id="elearning_page">
                    <div class="card-header">
                        <a class="back-home" href="index.php">
                            <i class="fas fa-arrow-left"></i> Back Home
                        </a>
                        <h2>E-LEARNING SIGN UP</h2>
                    </div>
                    <div class="card-body">
                        <div id="notific"> </div>
                        <form method="POST" id="commentForm" novalidate="novalidate" class="bv-form">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="fname">First Name <span class="required">*</span></label>
                                    <input type="text" name="fname" id="fname" class="splashinputs" minlength="3"
                                        maxlength="100" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="sname">Last Name <span class="required">*</span></label>
                                    <input type="text" name="sname" id="sname" class="splashinputs" minlength="3"
                                        maxlength="100" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="genderb">Gender <span class="required">*</span></label>
                                    <select class="splashinputs" name="genderb" id="genderb" required>
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="DateOfBirth">Date of Birth <span class="required">*</span></label>
                                    <input type="date" name="DateOfBirth" id="DateOfBirth" class="splashinputs"
                                        required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="emaile">Your Email <span class="required">*</span></label>
                                    <input type="email" name="emaile" id="emaile" class="splashinputs" minlength="3"
                                        maxlength="100" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phoneb">Phone No <span class="required">*</span></label>
                                    <input type="text" name="phoneb" id="phoneb" class="splashinputs" minlength="10"
                                        maxlength="13" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="passwordw1">Password <span class="required">*</span></label>
                                    <input type="password" name="passwordw1" id="passwordw1" class="splashinputs"
                                        minlength="3" maxlength="100" required>
                                    <span class="password-toggle" id="toggleElearningPassword">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="passwordw2">Repeat Password <span class="required">*</span></label>
                                    <input type="password" name="passwordw2" id="passwordw2" class="splashinputs"
                                        minlength="3" maxlength="100" required>
                                    <span class="password-toggle" id="toggleElearningConfirmPassword">
                                        <i class="fas fa-eye"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="checkbox-container">
                                <input type="checkbox" checked id="termsbs" value="termsbs" name="termsbs"
                                    class="pancityd" role="termsbs" required>
                                <label for="termsbs">I agree to the terms and conditions <span
                                        class="required">*</span></label>
                            </div>
                            <button type="button" class="btn btn-primary" id="Submitelerning">
                                <i class="fas fa-graduation-cap"></i> Sign Up
                            </button>
                        </form>
                        <div class="error-message" id="errorreport"></div>
                    </div>
                    <div class="card-footer">
                        <div>Already have an account? <a style="cursor:pointer;"
                                onclick='$("#back_tologin").click()'>Log
                                In</a></div>
                    </div>
                </div>
            <!-- </div>
        </div> -->

        <input type="hidden" class="splashinputs" id="secret_key">
    </div>
    <div class=" col-sm-12 col-xs-12 not_shown" id="loader">
        <img src="Huduma_WhiteBox/images/loader1.gif" id="loaderimg">
    </div>
    <script type="text/javascript" src="Huduma_WhiteBox/js/jquery.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!--global js starts-->
    <script>
        // Your existing JavaScript code remains exactly the same
        <?php
        include("connect.php");
        $yeard = date('Y');
        $code = isset($_GET['code']) ? mysqli_real_escape_string($con, base64_decode($_GET['code'])) : '';
        $email = isset($_GET['key']) ? mysqli_real_escape_string($con, base64_decode($_GET['key'])) : '';
        ?>

        $(document).ready(function () {
            // Initialize page state
            $(".logins").hide();
            $("#login_page").show();

            // Get email from URL parameters if exists
            var email = '<?php echo isset($_GET["key"]) ? mysqli_real_escape_string($con, base64_decode($_GET["key"])) : ""; ?>';
            var recoversource = email ? "linking" : "";

            // Navigation handlers
            $("#back_toregister").click(function (e) {
                e.preventDefault();
                $(".logins").hide();
                $("#register_page").show();
            });

            $("#back_tologin, #backlogins").click(function (e) {
                e.preventDefault();
                $(".logins").hide();
                $(".recover_dives").hide();
                $("#login_page").show();
            });

            $("#forgot_pwd_title").click(function (e) {
                e.preventDefault();
                $(".logins").hide();
                $("#pass_resetpage").show();
                $(".recover_dives").hide();
                $("#rec_ver").show();
            });

            $("#open_elerning").click(function (e) {
                e.preventDefault();
                $(".logins").hide();
                $("#elearning_page").show();
            });

            // Email validation function
            function validateEmail(email) {
                var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                return emailReg.test(email);
            }

            // Password strength validation
            function validatePassword(password) {
                return password && password.length >= 8;
            }

            // Show/hide loader
            function showLoader(element) {
                element.html("Processing... <i class='fa fa-spinner fa-spin'></i>").css("color", "black");
            }

            function hideLoader(element) {
                element.html("");
            }

            // E-learning form validation and submission
            $("#emaile").focusout(function () {
                var email = $(this).val();
                if (!email) return;

                if (!validateEmail(email)) {
                    $(this).val("").css("border", "2px solid red");
                    $("#errorreport").html("Check your email address!");
                } else {
                    $(this).css("border", "1px solid #ccc");
                    $("#errorreport").html("");
                }
            });

            $("#DateOfBirth").focusout(function () {
                var oldyeard = '<?php echo date("Y"); ?>';
                var mydate = $(this).val();
                var d = new Date(mydate);
                var n = d.getFullYear();
                var differenced = oldyeard - n;

                if (differenced < 18) {
                    $(this).val("");
                    $("#errorreport").html("Date of birth Must be above 18 years");
                    $(this).css("border", "2px solid red");
                } else {
                    $("#errorreport").html("");
                    $(this).css("border", "1px solid #ccc");
                }
            });

            $("#Submitelerning").click(function () {
                var error = "";
                var requiredFields = [
                    $("#fname"), $("#sname"), $("#genderb"), $("#DateOfBirth"),
                    $("#emaile"), $("#phoneb"), $("#passwordw1"), $("#passwordw2")
                ];

                // Check all required fields
                for (var i = 0; i < requiredFields.length; i++) {
                    if (!requiredFields[i].val()) {
                        error = "All mandatory fields required!";
                        break;
                    }
                }

                // Validate email
                if (!error && !validateEmail($("#emaile").val())) {
                    error = "Invalid email format!";
                }

                // Validate passwords
                if (!error && $("#passwordw1").val() !== $("#passwordw2").val()) {
                    error = "Passwords do not match!";
                }

                // Validate password strength
                if (!error && !validatePassword($("#passwordw1").val())) {
                    error = "Password must be at least 8 characters long!";
                }

                if (error) {
                    $("#errorreport").html(error);
                    return;
                }

                var r = confirm("Are you sure you want to submit this information? Click OK to proceed or CANCEL to stop.");
                if (!r) return;

                showLoader($("#errorreport"));
                $("#innov_next_button").addClass("hidden");

                var formData = new FormData($("#commentForm")[0]);
                $.ajax({
                    url: 'login/signup.php',
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (response) {
                        var responsed = atob(response);
                        if ($.trim(responsed) === "This account exists") {
                            $("#errorreport").html("This account exists");
                        } else {
                            $("#errorreport").html("");
                            $("#secret_key").val($.trim(response));

                            $(".logins").hide();
                            $("#login_page").show();
                            $("#login_headers").html("ACCOUNT VERIFICATION");
                            $(".logins").hide();
                            $("#pass_resetpage").show();
                            $(".recover_dives").hide();
                            $("#confirm_mcodes").show();
                        }
                    },
                    error: function () {
                        $("#errorreport").html("Error submitting form. Please try again.");
                    }
                });
            });

            $("#termsbs").click(function () {
                $(this).prop("checked", !$(this).prop("checked"));
            });

            // Registration form validation
            $("#newpassword, #password_confirm").focusout(function () {
                var password = $(this).val();
                if (!validatePassword(password)) {
                    $("#sign_uperror").html("Password must be at least 8 characters long").css("color", "red");
                } else {
                    $("#sign_uperror").html("").css("color", "black");
                }
            });

            $("#Email").focusout(function () {
                var email = $(this).val();
                if (!email) return;

                if (!validateEmail(email)) {
                    $(this).val("");
                    $("#sign_uperror").html("Check your email address!").css('color', 'red');
                } else {
                    $("#sign_uperror").html("").css('color', 'black');
                }
            });

            // Login functionality
            $("#login_btn").click(function () {
                var busername = btoa($("#username").val());
                var bpass = btoa($("#password-field").val());

                if (!busername || !bpass) {
                    $("#error_data").html("Username and Password Required!");
                    return;
                }

                showLoader($("#error_data"));

                $.post("login/login.php", { busername: busername, bpass: bpass }, function (response) {
                    var ddata = atob(response);

                    if (recoversource) {
                        location.replace("index.php");
                        return;
                    }

                    switch ($.trim(ddata)) {
                        case "e_learning":
                            handleSuccessfulLogin(busername, "mydashboard/e_learning.php");
                            break;
                        case "portal":
                            handleSuccessfulLogin(busername, "mydashboard/dashboard.php");
                            break;
                        case "Sorry, wrong username or password!":
                        case "Wrong Password, Check the password sent to your email, the first letter is in uppercase":
                        case "Wrong username or password, kindly try again or sign up":
                        case "All fields required!":
                            $("#error_data").html(ddata);
                            break;
                        case "new_password":
                            $("#emailsets").val($("#username").val());
                            $("#password-field").prop("placeholder", "Input new Password").val("");
                            $("#error_data").html("");
                            $(".recover_dives").hide();
                            $("#forgot_pwd_title").click();
                            $("#newnow_pass").show();
                            break;
                        case "":
                            $("#error_data").html("");
                            break;
                        default:
                            $("#secret_key").val($.trim(response));
                            $("#login_headers").html("ACCOUNT VERIFICATION");
                            $(".logins").hide();
                            $("#pass_resetpage").show();
                            $(".recover_dives").hide();
                            $("#confirm_mcodes").show();
                            $("#error_data").html("");
                    }
                }).fail(function () {
                    $("#error_data").html("Error connecting to server. Please try again.");
                });
            });

            function handleSuccessfulLogin(username, dashboardUrl) {
                $("#user_email").val(username);
                $.post(dashboardUrl, { model: username }, function (data) {
                    $(".modal-backdrop").hide();
                    $('body').removeClass("modal-open");
                    $("#error_data").html("");
                    $("#home_pagedata").hide().html("");
                    $("#loginmodal").modal("hide").removeData();
                    $("#landing_page").show().html(data);
                }).fail(function () {
                    $("#error_data").html("Error loading dashboard. Please try again.");
                });
            }

            // Registration form submission
            $("#SubmitButton").click(function () {
                var first_name = $("#first_name").val();
                var last_name = $("#last_name").val();
                var email = $("#Email").val();
                var phone = $("#phone").val();
                var gender = $("#gender").val();
                var password1 = $("#newpassword").val();
                var password2 = $("#password_confirm").val();

                // Validate required fields
                if (!first_name || !last_name || !email || !phone || !gender) {
                    $("#sign_uperror").html("All Fields Required!").css("color", "red");
                    return;
                }

                // Validate email
                if (!validateEmail(email)) {
                    $("#sign_uperror").html("Invalid email format!").css("color", "red");
                    return;
                }

                // Validate passwords
                if (!password1) {
                    $("#sign_uperror").html("Password Required!").css("color", "red");
                    return;
                }

                if (!validatePassword(password1)) {
                    $("#sign_uperror").html("Password must be at least 8 characters long").css("color", "red");
                    return;
                }

                if (!password2) {
                    $("#sign_uperror").html("Confirmation Password Required!").css("color", "red");
                    return;
                }

                if (password1 !== password2) {
                    $("#sign_uperror").html("Passwords do not match").css("color", "red");
                    return;
                }

                showLoader($("#sign_uperror"));

                var formData = new FormData($("#reg_form")[0]);
                $.ajax({
                    url: 'login/validate.php',
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (response) {
                        var responsed = atob(response);
                        if ($.trim(responsed) === "This account exists") {
                            $("#sign_uperror").html(responsed).css("color", "black");
                        } else {
                            $("#secret_key").val($.trim(response));
                            $(".logins").hide();
                            $("#login_page").show();
                            $("#login_headers").html("ACCOUNT VERIFICATION");
                            $(".logins").hide();
                            $("#pass_resetpage").show();
                            $(".recover_dives").hide();
                            $("#confirm_mcodes").show();
                        }
                    },
                    error: function () {
                        $("#sign_uperror").html("Error submitting form. Please try again.").css("color", "red");
                    }
                });
            });

            // Password recovery functionality
            $("#remail").focusout(function () {
                var email = $(this).val();
                if (!email) return;

                if (!validateEmail(email)) {
                    $("#recovery_error").html("Check your email address!").css('color', 'red');
                } else {
                    $("#recovery_error").html("").css('color', 'black');
                }
            });

            $("#recover_now").click(function () {
                var rcover_email = $("#remail").val();

                if (!rcover_email) {
                    $("#recovery_error").html("Email required!").css("color", "red");
                    return;
                }

                if (!validateEmail(rcover_email)) {
                    $("#recovery_error").html("Check your email address!").css('color', 'red');
                    return;
                }

                showLoader($("#recovery_error"));

                var formData = new FormData($("#recover_form")[0]);
                $.ajax({
                    url: 'login/recover.php',
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (response) {
                        var responsed = atob(response);
                        if (responsed === "Email does not exist") {
                            $("#recovery_error").html(responsed).css("color", "black");
                        } else {
                            $("#secret_key").val($.trim(response));
                            $("#emailsets").val($.trim(rcover_email));
                            $(".recover_dives").hide();
                            $("#new_pass").show();
                            $("#confirm_error").html("").css("color", "black");
                            $("#recovery_error").html("").css("color", "black");
                        }
                    },
                    error: function () {
                        $("#recovery_error").html("Error processing request. Please try again.").css("color", "red");
                    }
                });
            });

            // Confirmation code validation
            $("#confirm_now").click(function () {
                var code = $("#code").val();
                var keycode = $("#secret_key").val();

                if (!code) {
                    $("#confirm_error").html("Input confirmation code").css("color", "red");
                    return;
                }

                var new_code = btoa(code);
                if (new_code === keycode) {
                    $(".recover_dives").hide();
                    $("#newnow_pass").show();
                    $("#confirm_error").html("").css("color", "black");
                } else {
                    $("#confirm_error").html("Wrong confirmation code, try again!").css("color", "red");
                }
            });

            $("#confirm_codesd").click(function () {
                var coded = $("#conf_codes").val();
                var keycode = $("#secret_key").val();

                if (!coded) {
                    $("#confirm_dderror").html("Input confirmation code").css("color", "red");
                    return;
                }

                var new_coded = btoa(coded);
                if (new_coded === keycode) {
                    var busername = btoa($("#username").val()) || btoa($("#Email").val());

                    showLoader($("#confirm_dderror"));

                    $.post("login/update.php", { busername: busername }, function (response) {
                        var ddata = atob(response);
                        if ($.trim(ddata) === "success") {
                            $("#user_email").val(busername);
                            showLoader($("#confirm_dderror"));
                            loadDashboard(busername);
                        } else {
                            $("#confirm_dderror").html(ddata).css("color", "red");
                        }
                    }).fail(function () {
                        $("#confirm_dderror").html("Error verifying account. Please try again.").css("color", "red");
                    });
                } else {
                    $("#confirm_dderror").html("Wrong confirmation code, try again!").css("color", "red");
                }
            });

            function loadDashboard(username) {
                $.post("mydashboard/dashboard.php", { model: username }, function (data) {
                    $(".modal-backdrop").hide();
                    $('body').removeClass("modal-open");
                    $("#error_data").html("");
                    $("#home_pagedata").hide().html("");
                    $("#loginmodal").modal("hide").removeData();
                    $("#landing_page").show().html(data);
                    $("#confirm_dderror").html("").css("color", "black");
                }).fail(function () {
                    $("#confirm_dderror").html("Error loading dashboard. Please try again.").css("color", "red");
                });
            }

            // New password creation
            $("#password_n, #new_passworn").focusout(function () {
                var password = $(this).val();
                if (!validatePassword(password)) {
                    $("#createerror").html("Password must be at least 8 characters long").css("color", "red");
                } else {
                    $("#createerror").html("").css("color", "black");
                }
            });

            $("#create_newpass").click(function () {
                var password = $("#password_n").val();
                var conf_pass = $("#new_passworn").val();

                if (!password || !conf_pass) {
                    $("#createerror").html("All fields required!").css("color", "red");
                    return;
                }

                if (password !== conf_pass) {
                    $("#createerror").html("Passwords do not match!").css("color", "red");
                    return;
                }

                if (!validatePassword(password)) {
                    $("#createerror").html("Password must be at least 8 characters long").css("color", "red");
                    return;
                }

                showLoader($("#createerror"));

                var formData = new FormData($("#new_passset")[0]);
                $.ajax({
                    url: 'login/reset.php',
                    method: 'POST',
                    data: formData,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (response) {
                        var responsed = atob(response);
                        if (responsed === "success") {
                            $(".logins").hide();
                            $("#login_page").show();
                            $("#login_headers").html("LOGIN WITH THE NEW PASSWORD");
                            $("#createerror").html("").css("color", "black");
                        } else {
                            $("#createerror").html(responsed).css("color", "black");
                        }
                    },
                    error: function () {
                        $("#createerror").html("Error resetting password. Please try again.").css("color", "red");
                    }
                });
            });

            // Password toggle functionality
            $(".password-toggle").click(function () {
                var input = $(this).siblings('input');
                var icon = $(this).find('i');

                if (input.attr('type') === 'password') {
                    input.attr('type', 'text');
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    input.attr('type', 'password');
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });

            // Disable right-click context menu
            $(document).bind("contextmenu", function (e) {
                return false;
            });
        });

        // AngularJS Password Strength Controller
        var myApp = angular.module("myapp", []);
        myApp.controller("PasswordController", function ($scope) {
            var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
            var mediumRegex = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})");

            $scope.passwordStrength = {
                "float": "left",
                "height": "10px",
                "margin-top": "5px",
                "border-radius": "4px"
            };

            $scope.analyze = function (value) {
                if (!value) {
                    $("#pass_t").hide();
                    $("#strengthmeter").hide();
                    return;
                }

                $("#pass_t").show();
                $("#strengthmeter").show();

                if (strongRegex.test(value)) {
                    $scope.passwordStrength["background-color"] = "green";
                    $scope.passwordStrength["width"] = "100%";
                    $("#str_stregnth").html("100%").css("color", "green");
                } else if (mediumRegex.test(value)) {
                    $scope.passwordStrength["background-color"] = "orange";
                    $scope.passwordStrength["width"] = "70%";
                    $("#str_stregnth").html("70%").css("color", "orange");
                } else {
                    $scope.passwordStrength["background-color"] = "red";
                    $scope.passwordStrength["width"] = "40%";
                    $("#str_stregnth").html("40%").css("color", "red");
                }
            };
        });
    </script>



    <!--page level js ends-->
    <script type="text/javascript">

        $('.count').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 4000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            //var recoversource="";
            // alert()
            $("#loginmodaldd").click(function () {
                //alert()

            })
            $("#about_us").click(function () {
                $(".about_uspages").show();
                $("#home_page").hide();
            })
            $("#home_pagedd").click(function () {

                $("#home_page").show();
                $(".about_uspages").hide();
            })
            $("#back_tologin").click(function () {
                $(".logins").hide();
                $("#login_page").show();
                $("#login_headers").html("LOGIN HERE")
            })
            $("#back_toregister").click(function () {
                $("#login_headers").html("SIGN UP HERE")
                $(".logins").hide();
                $("#register_page").show();
            })
            $("#back_toelearning").click(function () {
                $("#login_headers").html("SIGN UP TO E-LEARNING")
                $(".logins").hide();
                $("#elearning_page").show();
            })


            //gto confirm acc 
            var loginuser = '<?php echo $loginuser ?>';
            //alert(loginuser)
            if (loginuser) {
                var user_not = '<?php echo $user_not ?>';

                //  var busername=btoa('<?php echo $user ?>');
                // alert(busername)
                $("#user_email").val(loginuser);

                $.post("mydashboard/" + user_not + ".php", { model: loginuser }, function (data) {
                    $(".modal-backdrop").hide();
                    $('body').removeClass("modal-open");
                    $("#error_data").html("");

                    $("#home_pagedata").hide().html("");
                    $("#home_pagedata").html("");
                    $("#loginmodal").modal("hide").removeData();
                    $("#landing_page").show().html(data);

                    $("#confirm_dderror").html("").css("color", "black");

                    //body.style.removeProperty('padding-right');


                    //$("#home_page").hide();
                    $("#error_data").html("");


                })
            } else {

            }

        });
    </script>
    <!-- end page level js -->
    <script type="text/javascript" src="minijava.js"></script>
    <script type="text/javascript" src="Huduma_WhiteBox/jquery.js"></script>
    <script type="text/javascript" src="Huduma_WhiteBox/bootstrap.js"></script>
    <script src="Huduma_WhiteBox/bootstrapValidator.js" type="text/javascript"></script>
    <script type="text/javascript" src="Huduma_WhiteBox/icheck.js"></script>
    <script type="text/javascript" src="Huduma_WhiteBox/register_custom.js"></script>
    <!--global js end-->
    <script type="text/javascript" src="Huduma_WhiteBox/slick.js"></script>

    <script language="JavaScript">
        $(document).ready(function () {
            $(document).bind("contextmenu", function (e) {

                return false;

            })


        })


    </script>


</body>

</html>