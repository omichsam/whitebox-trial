<!DOCTYPE html>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | Huduma WhiteBox</title>
    <!--global css starts-->
    <link rel="stylesheet" type="text/css" href="Huduma_WhiteBox/bootstrap.css">
    <link rel="shortcut icon" href="https://www.whitebox.go.ke/assets/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="https://www.whitebox.go.ke/assets/images/favicon.png" type="image/x-icon">
    <!--end of global css-->

    <!--page level css starts-->
    <link type="text/css" rel="stylesheet" href="Huduma_WhiteBox/all.css">
    <link href="Huduma_WhiteBox/bootstrapValidator.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="Huduma_WhiteBox/register.css">
    <!--end of page level css-->
    <link rel="stylesheet" type="text/css" href="Huduma_WhiteBox/modal.css">
</head>
<body>
<div class="container">
    <!--Content Section Start -->
    <div class="row justify-content-center">
        <div class="card animation flipInX col-md-10">
            <div class="card-header">
                <a href="https://www.whitebox.go.ke/home" style="float: left;">Back Home</a>
             
                <a href="https://www.whitebox.go.ke/home"><img src="Huduma_WhiteBox/Whitebox.png" alt="logo" class="logo_position" style="float: right;"></a>
            </div>
            <div class="card-body">
                
            <!-- Notifications -->
            <div id="notific">
                            </div>
            <div class="row justify-content-center ">
                <form action="https://www.whitebox.go.ke/register" method="POST" id="reg_form" novalidate="novalidate" class="bv-form"><button type="submit" class="bv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
                <!-- CSRF Token -->
                <input type="hidden" name="_token" value="eNnPDi4e0Xk3tSgGyNXlTeRLf8ApVzvYPglc13nh">

                <div class=" row">
                    <div class="form-group  col-md-6  col-sm-6">
                        <label class="sr-only"> First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" data-bv-field="first_name">
                        
                    <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="first_name" data-bv-result="NOT_VALIDATED">Name is required</small></div>
                   
 <div class="form-group col-md-6  col-sm-6 ">
                        <label class="sr-only"> Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" data-bv-field="last_name">
                        
                    <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="last_name" data-bv-result="NOT_VALIDATED">Last name is required</small></div>
                    <div class="form-group col-md-6  col-sm-6">
                        <label class="sr-only"> Email</label>
                        <input type="email" class="form-control" id="Email" name="email" placeholder="Email" data-bv-field="email">
                        
                    <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="email" data-bv-result="NOT_VALIDATED">The email address is required</small><small style="display: none;" class="help-block" data-bv-validator="regexp" data-bv-for="email" data-bv-result="NOT_VALIDATED">The input is not a valid email address</small><small style="display: none;" class="help-block" data-bv-validator="emailAddress" data-bv-for="email" data-bv-result="NOT_VALIDATED">Please enter a valid email address</small></div>
                    <div class="form-group col-md-6  col-sm-6">
                        <label class="sr-only"> Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" data-bv-field="phone">
                        
                    <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="phone" data-bv-result="NOT_VALIDATED">The phone number is required</small></div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <label>Gender</label>
                    </div>
                    <div class="form-group col-md-6  col-sm-6">
                        <label class="sr-only">Gender</label>
                        <label class="radio-inline">
                            <div class="iradio_minimal-blue" style="position: relative;"><input type="radio" name="gender" id="inlineRadio1" value="male" style="position: absolute; opacity: 0;" data-bv-field="gender"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div> Male
                        </label>&nbsp;
                        <label class="radio-inline">
                            <div class="iradio_minimal-blue" style="position: relative;"><input type="radio" name="gender" id="inlineRadio2" value="female" style="position: absolute; opacity: 0;" data-bv-field="gender"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div> Female
                        </label>
                        
                    <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="gender" data-bv-result="NOT_VALIDATED">Gender is required</small></div>
                </div>
                 

                <div class="row">
                    <div class="form-group col-md-6  col-sm-6">
                        <label class="sr-only"> Password</label>
                        <input type="password" class="form-control" id="Password1" name="password" placeholder="Password" data-bv-field="password">
                        
                    <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="password" data-bv-result="NOT_VALIDATED">Password is required</small><small style="display: none;" class="help-block" data-bv-validator="different" data-bv-for="password" data-bv-result="NOT_VALIDATED">Password should not match first/last Name</small></div>
                    <div class="form-group col-md-6  col-sm-6 ">
                        <label class="sr-only"> Confirm Password</label>
                        <input type="password" class="form-control" id="Password2" name="password_confirm" placeholder="Confirm Password" data-bv-field="password_confirm">
                        
                    <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="password_confirm" data-bv-result="NOT_VALIDATED">Confirm Password is required</small><small style="display: none;" class="help-block" data-bv-validator="identical" data-bv-for="password_confirm" data-bv-result="NOT_VALIDATED">Please enter the same value</small><small style="display: none;" class="help-block" data-bv-validator="different" data-bv-for="password_confirm" data-bv-result="NOT_VALIDATED">Confirm Password should match with password</small></div>
                    <div class="clearfix"></div>
                   
                    <!--county-->
                    </div>
                    
                <div class="container">

                    <!--  <a href="#modal" class="btn btn-danger purchase-styl pull-left col-md-5 col-sm-5 col-xs-12">Read Terms And Conditions</a>
                 </div> -->
                    <div id="modal">
                        <div class="modal-content">
                            <div class="header">
                                <br>
                                <h2>Terms and Conditions on the use of Whitebox Facility</h2>
                            </div>
                            <div class="copy">
                                <label style="text-align: justify;">
                                    <p>The Participants agree that by submitting their idea, innovation or product to
                                        the Whitebox Facility they agree to the following terms and conditions which
                                        constitute a legally binding agreement between the Government and the
                                        Participants.Further,the Participants in registering with the Facility confirm
                                        that they have read and fully understood and accepted these terms and
                                        conditions.</p>
                                </label>
                                <div style="text-align: justify;">
                                    <ol>
                                        <li>
                                            The Government is under no obligation to take up the idea, innovation or the
                                            product or apply it in any manner whatsoever;

                                        </li>
                                        <li>
                                            The Government is not responsible for the protection of the intellectual
                                            property rights for the idea, innovation or the product and neither does it
                                            guarantee any such protection within the Whitebox Facility. The Participants
                                            are advised to follow through with the appropriate Government bodies for the
                                            protection of their intellectual property rights.

                                        </li>
                                        <li>
                                            The Participants agree that they are voluntarily entering in the Whitebox
                                            Facility and fully understand its mode of operation. Their engagement with
                                            the Government and its partners is not compulsory and they can choose to opt
                                            out at any given time.
                                        </li>
                                        <li>
                                            The Participants acknowledge that the Whitebox Facility is not responsible
                                            for any contracts that the Participants may enter with any of the Facility’s
                                            partners. Any such contractual engagements or dealings are willingly entered
                                            by the Participants and they do not create any privity with the Government.

                                        </li>
                                        <li>
                                            The Participants fully understand the objectives of Whitebox Facility and as
                                            such the Participants have without any inducement or coercion submitted
                                            their ideas, innovations and products to the Facility and this participation
                                            does not create any binding legal obligations with the Government.

                                        </li>


                                    </ol>
                                </div>


                            </div>
                            <div class="cf footer">
                                <a href="#" class="btn">Close</a>
                            </div>
                        </div>
                        <div class="overlay"></div>
                    </div>
                    <!-- <div class="col-md-5 col-sm-5 col-xs-12"><a href="#modal" class="btn btn-warning purchase-styl pull-left">Read Terms & Conditions</a></div>
                </div> -->
                </div>

                <!-- //Panle-group End -->
                <!-- Modal Start -->


                <div class="checkbox">
                    <label>
                        <div class="icheckbox_minimal-blue" style="position: relative;"><input type="checkbox" name="terms" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div> I accept <a href="#modal"> Terms and Conditions</a>
                    </label>
                </div>
                &nbsp;
                <!-- <button type="submit" class="btn btn-block btn-primary">Sign Up</button> -->
                <input type="submit" class="btn btn-block btn-primary" name="SubmitButton" value="Sign Up" onclick="ValidateForm(this.form)">
                      
            </form>
                
            </div>
            
                
            </div>
            <div class="card-footer text-center">
                 <div>Already have an account? Please <a href="https://www.whitebox.go.ke/main_login"> Log In</a></div>
                
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
<script type="text/javascript" src="Huduma_WhiteBox/register_custom.js"></script>
<!--global js end-->
<script type="text/javascript" src="Huduma_WhiteBox/slick.js"></script>
<!--page level js ends-->
<!-- <script type="text/javascript">
    $(document).ready(function(){
        $('.partners-logos').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1000,
            arrows: false,
            dots: false,
                pauseOnHover: false,
                responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 4
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 3
                }
            }]
        });
    });
</script> -->

<script language="JavaScript">
    function ValidateForm(form) {
        ErrorText = "";
        if ((form.terms.checked == false)) {
            alert("Please Accept the Terms and Conditions");
            return false;
        }
        if (ErrorText = "") {
            form.submit()
        }
    }
</script>


</body></html>