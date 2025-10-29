<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | WhiteBox</title>
    <!--global css starts-->
    <link rel="stylesheet" type="text/css" href="Huduma_WhiteBox/bootstrap.css">
    <link rel="shortcut icon" href="https://www.whitebox.go.ke/assets/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="https://www.whitebox.go.ke/assets/images/favicon.png" type="image/x-icon">
    <!--end of global css-->
    <link rel="stylesheet" type="text/css" href="Huduma_WhiteBox/devicon.css">
    <link rel="stylesheet" type="text/css" href="Huduma_WhiteBox/devicon-colors.css">
    <link rel="stylesheet" type="text/css" href="Huduma_WhiteBox/animate.css">
    <!--page level css starts-->
    <link type="text/css" rel="stylesheet" href="Huduma_WhiteBox/all.css">
    <link href="Huduma_WhiteBox/bootstrapValidator.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Huduma_WhiteBox/login.css">
    <link rel="stylesheet" href="Huduma_WhiteBox/font-awesome.css">
    <!--end of page level css-->


</head>
<body>
<div class="container">
    <!--Content Section Start -->
    <div class="row justify-content-center">
        <div class="card  animation flipInX col-md-6">
            <div class="card-header">
             
                    <a href="index.php" style="float: left;">Back Home</a>
             
                <a href="index.php"><img src="Huduma_WhiteBox/Whitebox.png" alt="logo" class="logo_position" style="float: right;"></a>

               <!--  <img src="https://www.whitebox.go.ke/assets/images/Whitebox.logo.png" alt="logo" class="" width="150px" style="float: right;" > -->
            </div>

       
            
            <div class="card-body">
                 <div id="notific">
                                </div>
                <form action="https://www.whitebox.go.ke/main_login" class="omb_loginForm bv-form" autocomplete="off" method="POST" novalidate="novalidate"><button type="submit" class="bv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
                    <input type="hidden" name="_token" value="eNnPDi4e0Xk3tSgGyNXlTeRLf8ApVzvYPglc13nh">

                    <div class="form-group ">
                        <label class="sr-only">Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" data-bv-field="email">
                    <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="email" data-bv-result="NOT_VALIDATED">The email address is required</small><small style="display: none;" class="help-block" data-bv-validator="emailAddress" data-bv-for="email" data-bv-result="NOT_VALIDATED">The input is not a valid email address</small></div>
                    <span class="help-block"></span>

                    <div class="form-group ">
                                                <!--  -->
                        <input id="password-field" type="password" class="form-control" placeholder="Password" name="password" data-bv-field="password">                        
              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="password" data-bv-result="NOT_VALIDATED">Password is required</small><small style="display: none;" class="help-block" data-bv-validator="different" data-bv-for="password" data-bv-result="NOT_VALIDATED">Password should not match user Name</small></div>
                    <span class="help-block"></span>
                    <div class="checkbox">
                        <label>
                            <div class="icheckbox_minimal-blue" style="position: relative;"><input type="checkbox" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div> Remember Password
                        </label>

                    </div>
                    <input type="submit" class="btn btn-block btn-primary" value="Log In">
                    
                </form>
                
            </div>
            
            
                <!-- Notifications -->
          
                <!-- <div class="text-center">
                    <p>--OR--</p>
                    <p>Login with</p>
                    <a href="https://www.whitebox.go.ke/facebook" class="social"><i class=" fa fa-facebook"></i> Facebook</a>

                    <a href="https://www.whitebox.go.ke/google" class="social text-danger"><i class=" fa fa-google-plus"></i> Google</a>

                    

                   
                </div> -->

            
            <br>
        <div class="card-footer bg-light animation flipInX text-center">
            <a href="https://www.whitebox.go.ke/forgot-password" id="forgot_pwd_title">Forgot Password?</a>
            <div>Don't have an account? <a href="https://www.whitebox.go.ke/register"><strong> Sign Up</strong></a></div>
        </div>
        </div>
    </div>
    <!-- //Content Section End -->
</div>
<!--global js starts-->
<script type="text/javascript" src="Huduma_WhiteBox/jquery.js"></script>
<script type="text/javascript" src="Huduma_WhiteBox/bootstrap.js"></script>
<script src="Huduma_WhiteBox/bootstrapValidator.js" type="text/javascript"></script>
<script type="text/javascript" src="Huduma_WhiteBox/icheck.js"></script>
<script type="text/javascript" src="Huduma_WhiteBox/login_custom.js"></script>
<!--global js end-->



</body></html>