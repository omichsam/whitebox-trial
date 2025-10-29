<style type="text/css">
    .pancityd{
        opacity: 1 !important;
        color: #000 !important;

    }
    .required{
    color: red;
    }
</style>
<?php
  include("connect.php");
  $yeard=date('Y');
  $code=mysqli_real_escape_string($con,base64_decode($_GET['code']));
$email=mysqli_real_escape_string($con,base64_decode($_GET['key']));
//if()
?>
<script type="text/javascript" src="Huduma_WhiteBox/js/angular.js"></script>

<input type="hidden" class="splashinputs" id="secret_key">

<div class="container">
<div class="modal animation  flipInX" id="loginmodal">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-title text-center">
<h4 id="login_headers">LOGIN HERE</h4>
</div>
<div class="modal-body">
<!--//login  -->


        <div class="col-md-12 logins " id="login_page">
            <div class="card-header">
             
                    <a data-dismiss="modal"  style="cursor:pointer;float: left;">Back Home</a>
             
           
                <a data-dismiss="modal"  style="cursor:pointer;"><img src="Huduma_WhiteBox/Whitebox.png" alt="logo" class="logo_positiondd" style="float: right;"></a>

               <!--  <img src="https://www.whitebox.go.ke/assets/images/Whitebox.logo.png" alt="logo" class="" width="150px" style="float: right;" > -->
            </div>
<span id="open_elerning" class="btn " style="float: left;cursor:pointer"> &nbsp;&nbsp;Sign-up to e-learning</span>
       
            
            <div class="card-body">
                 <div id="notific">
                                </div>
                <form action="" class="omb_loginForm bv-form" autocomplete="off" method="POST" novalidate="novalidate"><button type="submit" class="bv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
                    <input type="hidden" name="_token" value="IDD7x8m4AK25TsTkycsQYz5FIifr1wLTdXyI0Yf8">

                    <div class="form-group ">
                        <label class="sr-only">Email</label>
                        <input type="email" id="username" class="form-control" name="email" placeholder="Email" data-bv-field="email">
                    <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="email" data-bv-result="NOT_VALIDATED">The email address is required</small>
                    <small style="display: none;" class="help-block" data-bv-validator="emailAddress" data-bv-for="email" data-bv-result="NOT_VALIDATED">The input is not a valid email address</small>
                </div>
                    <span class="help-block"></span>

                    <div class="form-group ">
                                                <!--  -->
                        <input id="password-field" type="password" class="form-control" placeholder="Password" name="password" data-bv-field="password">                        
             <!-- <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>-->
                    <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="password" data-bv-result="NOT_VALIDATED">Password is required</small>


                    <small style="display: none;" class="help-block" data-bv-validator="different" data-bv-for="password" data-bv-result="NOT_VALIDATED">Password should not match user Name</small></div>
                    <span class="help-block"></span>
                    <div class="checkbox"> 
                       <!-- <label>
                            <div class="icheckbox_minimal-blue" style="position: relative;">
                                <input type="checkbox" style="position: absolute; opacity: 1;">
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;">
                                    
                                </ins></div> Remember Password
                        </label>-->

                    </div>
                    <span class="btn btn-block btn-primary" id="login_btn">Login to WhiteBox</span>
                    <div style="text-align: center;" id="error_data"></div>
                    <!--<input type="submit" class="btn btn-block btn-primary" value="Log In">-->
                    
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
            <a class="resete_pass" id="forgot_pwd_title" style="cursor: pointer;">Forgot Password?</a>
            <div>Don't have an account? <a id="back_toregister" style="cursor:pointer"><strong> Sign Up</strong></a></div>
        </div>
        </div>
   



        <div class="animation not_shown logins  col-md-12" id="pass_resetpage">
        <div class=" col-sm-12 no_padding ">
            <div class="card-header">
             <a data-dismiss="modal"  style="float: left;cursor:pointer">Back Home</a>
             
                <a href=""><img src="Huduma_WhiteBox/Whitebox.png" alt="logo" class="logo_positiondd" style="float: right;"></a>
            </div>
            
            
            <div class="recover_dives card-body" id="rec_ver">
            <p>Enter your email to reset your password</p>
            
            <form action="" id="recover_form" class="omb_loginForm bv-form" autocomplete="off" method="POST" novalidate="novalidate"><button type="submit" class="bv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
                <input name="_token" type="hidden" value="Tj49UXnOvOaG5RNZ8U2dBFE8LO4DCdJfUus178OX">
                <div class="form-group">
                    <label class="sr-only"></label>
                    <input type="email" class="form-control email" id="remail" name="remail" placeholder="Email" data-bv-field="remail">
                    <span class="help-block"></span>
                <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="email" data-bv-result="NOT_VALIDATED">The email address is required</small><small style="display: none;" class="help-block" data-bv-validator="emailAddress" data-bv-for="email" data-bv-result="NOT_VALIDATED">The input is not a valid email address</small></div>
                <div class="form-group">
                    <span id="recover_now" class="form-control btn btn-primary btn-block" >Reset Your Password</span>

                </div>
            </form>
            <div class="col-sm-12" id="recovery_error" style="text-align: center;"></div>
        </div>

<div class="card-body not_shown recover_dives" id="new_pass">
            <p>Check your email for confirmation key</p>
            
            <form action="" id="recovernew_form" class="omb_loginForm bv-form" autocomplete="off" method="POST" novalidate="novalidate"><button type="submit" class="bv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
                <input name="_token" type="hidden" value="Tj49UXnOvOaG5RNZ8U2dBFE8LO4DCdJfUus178OX">
                <div class="form-group">
                    <label class="sr-only"></label>
                    <input type="text" class="form-control email" id="code" name="code" placeholder="confirmation key" data-bv-field="remail">
                    <span class="help-block"></span></div>
                <div class="form-group">
                    <span id="confirm_now" class="form-control btn btn-primary btn-block" >Confirm code</span>

                </div>
            </form>
            <div class="col-sm-12" id="confirm_error" style="text-align: center;"></div>
        </div>

        <div class="card-body not_shown recover_dives" id="confirm_mcodes">
            <p>Check your email for confirmation key</p>
            
            <form action="" id="recovernew_form" class="omb_loginForm bv-form" autocomplete="off" method="POST" novalidate="novalidate"><button type="submit" class="bv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
                <input name="_token" type="hidden" value="Tj49UXnOvOaG5RNZ8U2dBFE8LO4DCdJfUus178OX">
                <div class="form-group">
                    <label class="sr-only"></label>
                    <input type="text" class="form-control email" id="conf_codes" name="code" placeholder="confirmation key" data-bv-field="remail">
                    <span class="help-block"></span></div>
                <div class="form-group">
                    <span id="confirm_codesd" class="form-control btn btn-primary btn-block" >Confirm</span>

                </div>
            </form>
            <div class="col-sm-12" id="confirm_dderror" style="text-align: center;"></div>
        </div>

<div class="card-body not_shown recover_dives" id="newnow_pass">
            <p>Create new password</p>
            
            <form action="" id="new_passset" class="omb_loginForm bv-form" autocomplete="off" method="POST" novalidate="novalidate"><button type="submit" class="bv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
                <input name="emailsets" id="emailsets" type="hidden" value="">
                <div class="form-group col-md-12">
                    <div class="col-md-6" style="margin-top: 5px;">
                        <label class="sr-only">New Password</label>
                    <input type="password" class="form-control email" id="password_n" name="password_n" placeholder="New Password" data-bv-field="remail">
                </div>
                <div class="col-md-6" style="margin-top: 5px;">
                    <label class="sr-only">Confirm Password</label>
                    <input type="password" class="form-control email" id="new_passworn" name="new_passworn" placeholder="Repeat Password" data-bv-field="remail">
                </div>
              </div>
                <div class="form-group col-md-12">
                    
                    <span id="create_newpass" class="form-control btn btn-primary btn-block" >Save Password</span>

                </div>
            </form>
            <div class="col-sm-12" id="createerror" style="text-align: center;"></div>
        </div>





        <div class="card-footer col-md-12">

            Back to login page?<a id="backlogins" style="cursor: pointer;"> Click here</a>
        </div>
        </div>
    </div>

















        <div class="animation not_shown logins  col-md-12" id="register_page">
            <div class="card-header">
                <a data-dismiss="modal"  style="float: left;cursor:pointer">Back Home</a>
             
                <a href=""><img src="Huduma_WhiteBox/Whitebox.png" alt="logo" class="logo_positiondd" style="float: right;"></a>
            </div>
            <div class="card-body col-md-12">
                
            <!-- Notifications -->
            <div id="notific"> </div>
            <div class="row justify-content-center ">
                <form action="" method="POST" id="reg_form" novalidate="novalidate" class="bv-form" ><button type="submit" class="bv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
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
                        <input type="phone" class="form-control" id="phone" name="phone" maxlength="13" placeholder="Phone Number" data-bv-field="phone">
                        
                    <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="phone" data-bv-result="NOT_VALIDATED">The phone number is required</small></div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <label>Gender</label>
                    </div>
                    <div class="form-group col-md-6  col-sm-6">
                        
                     <select class="form-control" id="gender" name="gender">
                       <option>male</option>
                       <option>female</option>  
                     </select>

                   
                        <!--<label class="sr-only">Gender</label>
                        <label class="radio-inline">
                            <div class="iradio_minimal-blue" style="position: relative;">

                               <input type="radio" class="pancityd"  style="opacity: 1 !important"  name="gender" id="inlineRadio1" value="male" style="position: absolute; " data-bv-field="gender">
                            </div> Male
                        </label>&nbsp;
                        <label class="radio-inline">
                            <div class="iradio_minimal-blue" style="position: relative;"><input type="radio" class="pancityd"  style="opacity: 1 !important"  name="gender" id="inlineRadio2" value="female" style="position: absolute; " data-bv-field="gender"></div> Female
                        </label>-->
                        
                    <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="gender" data-bv-result="NOT_VALIDATED">Gender is required</small>




                </div>
                </div>
                 

                <div class="row" >
                    <div class="form-group col-md-6  col-sm-6" ng-app="myapp" >
                        <div class="col-sm-12 no_padding"  ng-controller="PasswordController">
                        <label class="sr-only"> Password</label>
                        <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="Password" data-bv-field="newpassword" ng-model="newpassword" ng-change="analyze(newpassword)">
                        
                    <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="password" data-bv-result="NOT_VALIDATED">Password is required</small><small style="display: none;" class="help-block" data-bv-validator="different" data-bv-for="password" data-bv-result="NOT_VALIDATED">Password should not match first/last Name</small>


                       <div class="col-xs-12 col-sm-12">
    <div class="col-sm-12 col-xs-12 not_shown" id="pass_t">Password strength:<span id="str_stregnth"></span></div>
<div class="col-xs-12 col-sm-12 " id="strengthmeter" ng-style="passwordStrength"></div>
    </div>
</div>
                </div>
                    <div class="form-group col-md-6  col-sm-6 " ng-app="dmyapp" >
                     <div class="col-sm-12 no_padding" ng-controller="dPasswordController">
                        <label class="sr-only"> Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirm Password" data-bv-field="password_confirm" ng-change="analyzed(password_confirm)">
                        
                    <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="password_confirm" data-bv-result="NOT_VALIDATED">Confirm Password is required</small><small style="display: none;" class="help-block" data-bv-validator="identical" data-bv-for="password_confirm" data-bv-result="NOT_VALIDATED">Please enter the same value</small><small style="display: none;" class="help-block" data-bv-validator="different" data-bv-for="password_confirm" data-bv-result="NOT_VALIDATED">Confirm Password should match with password</small>

                  
                       <div class="col-xs-12 col-sm-12">
    <div class="col-sm-12 col-xs-12 not_shown" id="pass_t">Password strength:<span id="dstr_stregnth"></span></div>
<div class="col-xs-12 col-sm-12 " id="dstrengthmeter" ng-style="dpasswordStrength"></div>
    </div>
</div>
                </div>
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


                <div class="" id="termsholder">
                    <label class="checkbox-inline" id="termsagree">
                                                    <input required="" checked="true" class="pancityd" id="termsabd" name="termsa" type="checkbox" style="opacity: 1 !important" > I accept <a href="#modal"> Terms and Conditions</a>
                    </label>
                </div>
                &nbsp;
                <!-- <button type="submit" class="btn btn-block btn-primary">Sign Up</button> -->
                <span class="btn btn-block btn-primary" name="SubmitButton" id="SubmitButton" >Sign Up</span>
                      
            </form>
                <div class="col-md-12" style="text-align: center;" id="sign_uperror"></div>

                <div class="col-md-12" style="" id="">
         
                </div>
            </div>
            
                
            </div>
            <div class="card-footer text-center">
                 <div>Already have an account? Please <a style="cursor:pointer;" id="back_tologin"> Log In</a></div>
                <!-- <div>Signup to e-learning<a style="cursor:pointer;" id="back_toelearning"> E-learning</a></div>-->
                
            </div>
            
        </div>
        












<!--start of register>-->
   





        <div class="animation not_shown logins  col-md-12" id="elearning_page">
            <div class="card-header">
                <a data-dismiss="modal"  style="float: left;cursor:pointer">Back Home</a>
                 <a href=""><img src="Huduma_WhiteBox/Whitebox.png" alt="logo" class="logo_positiondd" style="float: right;"></a>
            </div>
            <div class="card-body col-md-12">
                
            <!-- Notifications -->
            <div id="notific"> </div>
            <div class="row justify-content-center ">
                <form action="" method="POST" id="commentForm" novalidate="novalidate" class="bv-form" >
              <div class="row">
                  <div class="col-sm-12 col-xs-12">&nbsp;</div>
              </div>
               <div class="row" style="margin-top:3px">
                <div class="col-sm-6 col-sm-12">
                    First Name:<span class="required">*</span>
                    <input type="text" name="fname" id="fname" class="splashinputs" minlength="3" maxlength="100">
                    
                </div>
                <div class="col-sm-6 col-sm-12">
                    Last Name:<span class="required">*</span>
                    <input type="text" name="sname" id="sname" class="splashinputs" minlength="3" maxlength="100">
                    
                </div>
               </div>

                 <div class="row" style="margin-top:3px">
                <div class="col-sm-6 col-sm-12">
                    Gender:<span class="required">*</span>
                    <select class="splashinputs" minlength="3" maxlength="100" name="genderb" id="genderb">
                        <option></option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                    
                </div>
                <div class="col-sm-6 col-sm-12">
                    Date of Birth:<span class="required">*</span>
                    <input type="date" name="DateOfBirth" data-date-format="YYYY-MM-DD" id="DateOfBirth" class="splashinputs" minlength="3" maxlength="100">
                    
                    
                </div>

               </div>
               <div class="row" style="margin-top:3px">
                <div class="col-sm-6 col-sm-12">
                     Your Email:<span class="required">*</span>
                   <input type="email" name="emaile" id="emaile" class="splashinputs" minlength="3" maxlength="100">
                    
                </div>
                <div class="col-sm-6 col-sm-12">
                     Phone No:<span class="required">*</span>
                    <input type="text" name="phoneb" id="phoneb" class="splashinputs" minlength="10" maxlength="13">
                    
                </div>
               </div>
               <div class="row" style="margin-top:3px">
                <div class="col-sm-6 col-sm-12">
                     County:<span class="required">*</span>
                     <select class="splashinputs" minlength="3" maxlength="100" name="county" id="county">
                    
                     <option></option>
  <?php 

$sql="SELECT * FROM counties where id<48";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           $county_name=$row['county_name'];
            ?>

<option><?php echo $county_name ?></option>
<?php
}


?></select>
                </div>
                <div class="col-sm-6 col-sm-12">
                      Education background:<span class="required">*</span>
                    <select name="education" id="education" class="splashinputs" minlength="3" maxlength="100">
                    <option></option>
                    <option>Primary School</option>
                    <option>High school</option>
                    <option>College</option>
                    <option>University graduate</option>
                 </select>
    
                </div>
               </div>






  <div class="row" style="margin-top:3px">
                <div class="col-sm-6 col-sm-12">
                   Name of Startup/Innovation (if any)
                    <input type="text" name="Innovation" id="Innovation" placeholder="Optional" class="splashinputs" minlength="3" maxlength="100">
                    
                </div>
                <div class="col-sm-6 col-sm-12">
                    Stage of Innovation:
                    <select name="stage" id="stage" class="splashinputs" minlength="3" maxlength="100">
                    <option></option>
                    <option>Ideation</option>
                    <option>Ideation</option>
                    <option>Growth</option>
                    <option>Scale</option>
                 </select>
                    
                </div>
               </div>

                <div class="row" style="margin-top:3px">
                <div class="col-sm-6 col-sm-12">
                   Is your innovation registered with Whitebox?
                     <select name="submission" id="submission" class="splashinputs" minlength="3" maxlength="100">
                        <option></option>
                    <option>Yes</option>
                    <option>No</option>>
                </select>
                </div>
                <div class="col-sm-6 col-sm-12">
                     In which Industry is your innovation?
                    <select name="Industry" id="Industry" class="splashinputs" minlength="3" maxlength="100">
                    <option></option>
                    <option>Health</option>
                    <option>Environment</option>
                    <option>Technology</option>
                    <option>Manufacturing</option>
                    <option>Agriculture</option>
                    <option>Education</option>
                    <option>Enterprise Development</option>
                 </select>
                    
                </div>
               </div>
               <div class="row" style="margin-top:3px">
                <div class="col-sm-6 col-sm-12">
                   
Previous training attended on entrepreneurship or innovation
                     <input type="text" name="training" id="training" placeholder="Optional" class="splashinputs" minlength="3" maxlength="100">
                    
                </div>
                <div class="col-sm-6 col-sm-12">
                    Name of institution/organization where training was attended?
                    <input type="text" name="institution" id="institution" placeholder="Optional" class="splashinputs" minlength="3" maxlength="100">
                    
                </div>
               </div>
                <div class="row" style="margin-top:3px">
                <div class="col-sm-6 col-sm-12">
                   
Password:<span class="required">*</span>
                     <input type="password" name="passwordw1" id="passwordw1" class="splashinputs" minlength="3" maxlength="100">
                    
                </div>
                <div class="col-sm-6 col-sm-12">
                    Repeat-Password:<span class="required">*</span>
                    <input type="password" name="passwordw2" id="passwordw2" class="splashinputs" minlength="3" maxlength="100">
                    
                </div>
               </div>
                 <div class="row" style="margin-top:3px">
                <div class="col-sm-12 col-sm-12">

                     <label style="font-weight: initial !important; color: #000;opacity: 1 !important;" class="submit_radiosd">
                               <div class="col-sm-1 col-xs-1">
                                                <input type="checkbox" checked="true" style="opacity: 1 !important;"  id="termsbs" value="termsbs" name="termsbs"  class="pancityd" role="termsbs">
                                                  <span class="checkmarkd"></span>
                                                   </div>
                                                   <div class="col-sm-10 col-xs-10" >
                                                    &nbsp;I agree to the terms and conditions<span class="required">*</span></div>
                                                   </label>
                </div>
               </div>
                <span class="btn btn-block btn-primary" name="SubmitButton" id="Submitelerning" >Sign Up</span>


<div class="col-sm-12 col-xs-12" id="errorreport" style="color: red;text-align: center;"></div>



                      
            </form>
                <div class="col-md-12" style="text-align: center;" id="sign_uperror"></div>

                <div class="col-md-12" style="" id="">
         
                </div>
            </div>
            
                
            </div>
            <div class="card-footer text-center">
                 <div>Already have an account? Please <a style="cursor:pointer;" onclick='$("#back_tologin").click()' id=""> Log In</a></div>
                
            </div>
            
        </div>



<!--end of signup-->













<!-- end of login -->

<div class="modal-footer">
<!--<a  class="btn bg-primary" data-dismiss="modal" id="close_modals" style="color: #fff;">Close</a>-->
</div>
</div>
</div>
</div>
<!-- <div class="col-md-5 col-sm-5 col-xs-12"><a href="#modal" class="btn btn-warning purchase-styl pull-left">Read Terms & Conditions</a></div>
</div> -->
</div>
</div>
<script>
    $(document).ready(function(){
        var email='<?php echo $email?>';
        if(email){
        var recoversource="linking";
        }else{
        var recoversource="";
        }

   $("#emaile").focusout(function(){
    var email=$("#emaile").val();
               if(email==""){


         //$(".email_check").hide();


                  }else{
//$("#error_display").html()
var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if(!emailReg.test(email)){
        $("#emaile").val("");
   //   $(".email_check").hide();
       $(this).prop("placeholder","Wrong email format!");
        //$("#sign_uperror").html("Check your email address!").css('color','red');

$("#errorreport").html("Check your email address!")
$(this).css("border","2px solid red");
       // $("#loader_error").html("Check your email Format!");
    }else{
        $(this).css("border","1px solid #ccc");
      //$("#sign_uperror").html(email_address)
 //$(".email_check").show();
// $(this).css('color','red');

 $("#errorreport").html("")
    
    }
//$(".cheked_pass").show();

                  }
  });



$("#DateOfBirth").focusout(function(){
    var oldyeard='<?php echo $yeard?>';
    //alert(oldyeard);
    var mydate=$(this).val();

var d = new Date(mydate);
  var n = d.getFullYear();
var differenced=oldyeard-n;
//alert(differenced);
if(differenced>=18){
//alert("Date of birth Okay");
$("#errorreport").html("")
$(this).css("border","1px solid #ccc");
}else{
    $(this).val("")
    $("#errorreport").html("Date of birth Must be above 18 years")
    $(this).css("border","2px solid red");
   // alert("Date of birth is bellow 18 years");
}
})
$("#Submitelerning").click(function(){

var error="";
var fname=$("#fname").val();
var sname=$("#sname").val();
var genderb=$("#genderb").val();
var DateOfBirth=$("#DateOfBirth").val();
var emaile=$("#emaile").val();
var phoneb=$("#phoneb").val();
var county=$("#county").val();
var education=$("#education").val();
var Innovation=$("#Innovation").val();
var stage=$("#stage").val();
var submission=$("#submission").val();
var Industry=$("#Industry").val();
var training=$("#training").val();
var institution=$("#institution").val();
var passwordw2=$("#passwordw2").val();
var passwordw1=$("#passwordw1").val();






if(fname && sname && genderb && DateOfBirth && emaile && phoneb && county && education && fname && passwordw2 && passwordw1){
if(passwordw2==passwordw1){
error="";
}else{
    error="Passwords do not match";
 // $("#errorreport").html("");
}
if(error==""){
            var r = confirm("Are you sure you want to submit this information?, click OK to proceed or CANCEL to stop ?");
  if (r == true) {

var loader=$("#loader").html();
 $("#errorreport").html("Submiting data, kindly wait.."+loader).css("color","black")
  $("#innov_next_button").addClass("hidden")
var formData = new FormData($("#commentForm")[0]);
    $.ajax({
        url : 'login/signup.php',
        method : 'POST',
        data : formData,
        contentType : false,
        cache : false,
        processData : false,
        success : function (response){
            var responsed=atob(response);
if($.trim(responsed)=="This account exists"){
$("#errorreport").html("This account exists");
}else{
     $("#errorreport").html("");
$("#secret_key").val($.trim(response));

               $(".logins").hide();
               $("#login_page").show();
               //$("#login_headers").html("LOGIN WITH THE NEW PASSWORD")
              $("#createerror").html("").css("color","black");
              //uncomment for email veryfication;
                  $("#login_headers").html("ACCOUNT VERIFICATION")
                    $(".logins").hide();
                    $("#pass_resetpage").show();
                  $(".recover_dives").hide();
                  $("#confirm_mcodes").show();
            $("#errorreport").html("");
}
}
})

}

}else{
   $("#errorreport").html(error); 
}




}else{
    $("#errorreport").html("All Mandatory fileds required!"); 
}


})
        $("#termsbs").click(function(){
            if($(this).prop("checked")==true){
 $(this).prop("checked")==false;

            }else{
$(this).prop("checked")==true;
            }
        })
var keycode="";
 $("#newpassword").focusout(function(){
    var newpassword=$("#newpassword").val();
     var str = newpassword;
  var n = str.length;
 // alert(n)
  if(n<8){
   // alert(n)
$("#sign_uperror").html("Passwords too short").css("color","red"); 

    }else{
        $("#sign_uperror").html("").css("color","black"); 
    }

})
 $("#password_confirm").focusout(function(){
    var password_confirm=$("#password_confirm").val();
     var str = password_confirm;
  var n = str.length;
 // alert(n)
  if(n<8){
   // alert(n)
$("#sign_uperror").html("Passwords too short").css("color","red"); 

    }else{
        $("#sign_uperror").html("").css("color","black"); 
    }

})




        $("#Email").focusout(function(){
    var email=$("#Email").val();
               if(email==""){


         //$(".email_check").hide();


                  }else{
//$("#error_display").html()
var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if(!emailReg.test(email)){
        $("#Email").val("");
   //   $(".email_check").hide();
       // $("#newpassword").attr("placeholder","Wrong email format!");
        $("#sign_uperror").html("Check your email address!").css('color','red');
       // $("#loader_error").html("Check your email Format!");
    }else{
      //$("#sign_uperror").html(email_address)
 //$(".email_check").show();
 $("#sign_uperror").html("").css('color','red');
    }
//$(".cheked_pass").show();

                  }
  });
        $(".pancityd").css("opacity","");
       // alert()
        var loader=$("#loader").html();
        //alert()
        $("#login_btn").click(function(){
            var busername=btoa($("#username").val());
            var bpass=btoa($("#password-field").val());
           // alert(bpass)
if(busername && bpass){
$("#error_data").html(loader);
    $.post("login/login.php",{busername:busername,bpass:bpass},function(responce){
        var ddata=atob(responce);
if(recoversource){

              location.replace("index.php");
               }else{
        if($.trim(ddata)=="e_learning"){



            $("#user_email").val(busername)
$.post("mydashboard/e_learning.php",{model:busername},function(data){
$(".modal-backdrop").hide();
    $('body').removeClass("modal-open");
            $("#error_data").html("");

$("#home_pagedata").hide().html("");
$("#home_pagedata").html("");
    $("#loginmodal").modal("hide").removeData();
    $("#landing_page").show().html(data);

//body.style.removeProperty('padding-right');


    //$("#home_page").hide();
    $("#error_data").html("");
})
        }else if($.trim(ddata)=="portal"){
      
            $("#user_email").val(busername)
$.post("mydashboard/dashboard.php",{model:busername},function(data){
$(".modal-backdrop").hide();
    $('body').removeClass("modal-open");
            $("#error_data").html("");

$("#home_pagedata").hide().html("");
$("#home_pagedata").html("");
    $("#loginmodal").modal("hide").removeData();
    $("#landing_page").show().html(data);

//body.style.removeProperty('padding-right');


    //$("#home_page").hide();
    $("#error_data").html("");
})





        }else if($.trim(ddata)=="No user with such details"){
            //$("#error_data").html(ddata);
            
            $("#error_data").html(ddata);
            
        }else if($.trim(ddata)==""){
            $("#error_data").html(ddata);
        }else{
          
            $("#secret_key").val($.trim(responce));
                  $("#login_headers").html("ACCOUNT VERIFICATION")
                    $(".logins").hide();
                    $("#pass_resetpage").show();
                    $(".recover_dives").hide();
                    $("#confirm_mcodes").show();
                    $("#error_data").html("");
          
            
        }
    }

    })

}else{


}
           // alert()
        })
//register button
$("#SubmitButton").click(function(){
    //alert()
    var first_name=$("#first_name").val();
    var last_name=$("#last_name").val();
    var email=$("#Email").val();
    var phone=$("#phone").val();
    //var gender =$("#inlineRadio1").val();

/*
    var password1=$("#password1").val();
    var password2=$("#password2").val();
    var gender="";
if($("#inlineRadio1").prop("checked")){
gender="ready";
}else if($("#inlineRadio2").prop("checked")){
gender="ready";
}else{
 gender=""; 

} */
if(first_name && last_name && email && phone){
    var gender=$("#gender").val();
//var gender="";
/*if($("#inlineRadio1").prop("checked")){
gender="ready";
}else if($("#inlineRadio2").prop("checked")){
gender="ready";
}else{
gender="";
}*/
if(gender){
var password1=$("#newpassword").val();
//alert(password1)
var password2=$("#password_confirm").val();
if(password1){
    var str = password1;
  var n = str.length;
 // alert(n)
  if(n<8){
   // alert(n)
$("#sign_uperror").html("Passwords too short").css("color","red"); 

    }else{
    

if(password2){
if(password1==password2){
//if($("#termsabd").prop("checked")){

    var loader=$("#loader").html();

$("#sign_uperror").html("Sending data.... "+loader).css("color","black");
var formData = new FormData($("#reg_form")[0]);
    $.ajax({
        url : 'login/validate.php',
        method : 'POST',
        data : formData,
        contentType : false,
        cache : false,
        processData : false,
        success : function (response){
            var responsed=atob(response)
            if($.trim(responsed)=="This account exists"){
            
              $("#sign_uperror").html(responsed).css("color","black");  
            }else{
                  $("#secret_key").val($.trim(response));

               $(".logins").hide();
               $("#login_page").show();
               $("#login_headers").html("LOGIN WITH THE NEW PASSWORD")
              $("#createerror").html("").css("color","black");
              //uncomment for email veryfication;
                  $("#login_headers").html("ACCOUNT VERIFICATION")
                    $(".logins").hide();
                    $("#pass_resetpage").show();
                  $(".recover_dives").hide();
                  $("#confirm_mcodes").show();
                  
              //$("#sign_uperror").html(responsed).css("color","black");  
            }
        }
    })













//$("#sign_uperror").html("").css("color","black");
}else{

$("#sign_uperror").html("Passwords do not match").css("color","red"); 
}





}else{

$("#sign_uperror").html("Confirmation Password Required!").css("color","red");   
}
}
}else{
$("#sign_uperror").html("Password Required!").css("color","red");
}
}else{


}





//$("#sign_uperror").html("ready").css("color","black");
}else{
      //  alert(first_name+last_name+email+phone)
$("#sign_uperror").html("All Fields Required!").css("color","red");
}

})





/*
   $("#phone").focusout(function(){
    var phoned=$("#phone").val();
    alert(phoned)
               if(phoned==""){


         //$(".email_check").hide();


                  }else{
//$("#error_display").html()
var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
  if(phoned.match(phoneno)){
$("#recovery_error").html("").css('color','red');
  }else{
        $("#phone").val("");
  
   //   $(".email_check").hide();
       // $("#newpassword").attr("placeholder","Wrong email format!");
        $("#recovery_error").html("Check your email address!").css('color','red');
       // $("#loader_error").html("Check your email Format!");
    }

                  }
  });

*/



















      $("#remail").focusout(function(){
    var email=$("#remail").val();
               if(email==""){


         //$(".email_check").hide();


                  }else{
//$("#error_display").html()
var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if(!emailReg.test(email)){
        $("#Email").val("");
   //   $(".email_check").hide();
       // $("#newpassword").attr("placeholder","Wrong email format!");
        $("#recovery_error").html("Check your email address!").css('color','red');
       // $("#loader_error").html("Check your email Format!");
    }else{
      //$("#sign_uperror").html(email_address)
 //$(".email_check").show();
 $("#recovery_error").html("").css('color','red');
    }
//$(".cheked_pass").show();

                  }
  });
$("#recover_now").click(function(){

var rcover_email=$("#remail").val();
if(rcover_email){
var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if(!emailReg.test(rcover_email)){
        $("#Email").val("");
   //   $(".email_check").hide();
       // $("#newpassword").attr("placeholder","Wrong email format!");
        $("#recovery_error").html("Check your email address!").css('color','red');
       // $("#loader_error").html("Check your email Format!");
    }else{



    var loader=$("#loader").html();

$("#recovery_error").html("Sending data.... "+loader).css("color","black");
var formData = new FormData($("#recover_form")[0]);
    $.ajax({
        url : 'login/recover.php',
        method : 'POST',
        data : formData,
        contentType : false,
        cache : false,
        processData : false,
        success : function (response){
            var responsed=atob(response)
            if(responsed=="Email does not exist"){
            
              $("#recovery_error").html(responsed).css("color","black");
            }else{  
                $("#secret_key").val($.trim(response));
                $("#emailsets").val($.trim(rcover_email))
               // keycode=response;
               $(".recover_dives").hide();
            $("#new_pass").show();//uncomment for password verification

              // $(".recover_dives").hide();
              // $("#newnow_pass").show();
              $("#confirm_error").html("").css("color","black");
              $("#recovery_error").html("").css("color","black");

            }
        }
    })





      //$("#sign_uperror").html(email_address)
 //$(".email_check").show();
// $("#recovery_error").html("").css('color','red');
    }





}else{
    $("#recovery_error").html("Email required!").css("color","red");
}


})

$("#confirm_now").click(function(){
    var code=$("#code").val();
  var keycode=$("#secret_key").val();
    var new_code=btoa(code);
//alert("="+keycode+"="+new_code+"=")
    if(new_code==keycode){

               $(".recover_dives").hide();
               $("#newnow_pass").show();
              $("#confirm_error").html("").css("color","black");

     // $("#confirm_error").html("correct!").css("color","red"); 

    }else{
      $("#confirm_error").html("Wrong confirmation code, try again!").css("color","red"); 
    }
   // alert(code)
   if(code==""){
  $("#confirm_error").html("Input confirmation code").css("color","red");
   }else{

   }
})

$("#confirm_codesd").click(function(){
    var coded=$("#conf_codes").val();
  var keycode=$("#secret_key").val();
    var new_coded=btoa(coded);
//alert("="+keycode+"="+new_code+"=")
    if(new_coded==keycode){
        var busername=btoa($("#username").val());
        if(busername){

        }else{
            busername=btoa($("#Email").val());
        }
        var loader=$("#loader").html();
        $("#confirm_dderror").html("verifying.."+loader).css("color","black");
            $.post("login/update.php",{busername:busername},function(responce){
        var ddata=atob(responce);

        if($.trim(ddata)=="success"){
       $("#user_email").val(busername)
        $("#confirm_dderror").html("Redirecting.."+loader).css("color","black");
               $.post("mydashboard/dashboard.php",{model:busername},function(data){
$(".modal-backdrop").hide();
    $('body').removeClass("modal-open");
            $("#error_data").html("");

$("#home_pagedata").hide().html("");
$("#home_pagedata").html("");
    $("#loginmodal").modal("hide").removeData();
    $("#landing_page").show().html(data);

        $("#confirm_dderror").html("").css("color","black");

//body.style.removeProperty('padding-right');


    //$("#home_page").hide();
    $("#error_data").html("");
})
          }else{
            $("#confirm_dderror").html(ddata).css("color","red"); 
          }
})
     // $("#confirm_dderror").html("correct!").css("color","red"); 

    }else{
      $("#confirm_dderror").html("Wrong confirmation code, try again!").css("color","red"); 
    }
   // alert(code)
   if(coded==""){
  $("#confirm_dderror").html("Input confirmation code").css("color","red");
   }else{

   }
})




$("#create_newpass").click(function(){
    var password=$("#password_n").val();
    var conf_pass=$("#new_passworn").val();
    if(password && conf_pass){
  if(password==conf_pass){


    var password_confirm=$("#password_n").val();
     var str = password_confirm;
  var n = str.length;
 // alert(n)
  if(n<8){
   // alert(n)
$("#createerror").html("Passwords too short").css("color","red"); 

    }else{
    

    var loader=$("#loader").html();

$("#createerror").html("Sending data.... "+loader).css("color","black");
var formData = new FormData($("#new_passset")[0]);
    $.ajax({
        url : 'login/reset.php',
        method : 'POST',
        data : formData,
        contentType : false,
        cache : false,
        processData : false,
        success : function (response){
            var responsed=atob(response)
            if(responsed=="success"){
            
               // $("#secret_key").val($.trim(response));
               // keycode=response;
               //alert(recoversource)
               
               $(".logins").hide();
               $("#login_page").show();
               $("#login_headers").html("LOGIN WITH THE NEW PASSWORD")
              $("#createerror").html("").css("color","black");



            }else{  
                $("#createerror").html(responsed).css("color","black");

            }
        }
    })


       // $("#createerror").html("").css("color","black"); 
    }


  }else{
    $("#createerror").html("password do not match!").css("color","red");
  }


    }else{
$("#createerror").html("field required!").css("color","red");
    }
})


 $("#password_n").focusout(function(){
    var password_confirm=$("#password_n").val();
     var str = password_confirm;
  var n = str.length;
 // alert(n)
  if(n<8){
   // alert(n)
$("#createerror").html("Passwords too short").css("color","red"); 

    }else{
        $("#createerror").html("").css("color","black"); 
    }

})
  $("#new_passworn").focusout(function(){
    var password_confirm=$("#new_passworn").val();
     var str = password_confirm;
  var n = str.length;
 // alert(n)
  if(n<8){
   // alert(n)
$("#createerror").html("Passwords too short").css("color","red"); 

    }else{
        $("#createerror").html("").css("color","black"); 
    }

})

    })

</script>
<script type="text/javascript">

            var myApp = angular.module("myapp", []);

            myApp.controller("PasswordController", function($scope) {

                var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
                var mediumRegex = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})");
                $scope.passwordStrength = {
                    "float": "left",
                    "height": "10px",
                    "margin-top": "5px"
                };

                $scope.analyze = function(value) {

                  var password=$("#newpassword").val();
                 // alert(password)
                  if(password==""){
                $("#pass_t").hide();
                $("#strengthmeter").hide();
                  }else{
                    $("#pass_t").show();
                    $("#strengthmeter").show();
                    if(strongRegex.test(value)){
                    
                        $scope.passwordStrength["background-color"] = "green";
                        $scope.passwordStrength["width"] = "100%";
                        $("#str_stregnth").html("100%");
                    } else if(mediumRegex.test(value)) {
                      
                        $scope.passwordStrength["background-color"] = "orange";
                        $scope.passwordStrength["width"] = "70%";
                        $("#str_stregnth").html("70%");
                    } else {
                      
                        $scope.passwordStrength["background-color"] = "red";
                        $scope.passwordStrength["width"] = "40%";
                        $("#str_stregnth").html("40%");
                    }
                }
                };

            });
/*
       var dmyApp = angular.module("dmyapp", []);
            dmyApp.controller("dPasswordController", function($scope) {

                var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
                var mediumRegex = new RegExp("^(((?=.*[a-z])(?=.*[A-Z]))|((?=.*[a-z])(?=.*[0-9]))|((?=.*[A-Z])(?=.*[0-9])))(?=.{6,})");
                $scope.dpasswordStrength = {
                    "float": "left",
                    "height": "10px",
                    "margin-top": "5px"
                };

                $scope.analyzed = function(value) {

                  var password=$("#password_confirm").val();
                 // alert(password)
                  if(password==""){
                $("#pass_t").hide();
                $("#dstrengthmeter").hide();
                  }else{
                    $("#pass_t").show();
                    $("#dstrengthmeter").show();
                    if(strongRegex.test(value)){
                    
                        $scope.dpasswordStrength["background-color"] = "green";
                        $scope.dpasswordStrength["width"] = "100%";
                        $("#dstr_stregnth").html("100%");
                    } else if(mediumRegex.test(value)) {
                      
                        $scope.dpasswordStrength["background-color"] = "orange";
                        $scope.dpasswordStrength["width"] = "70%";
                        $("#dstr_stregnth").html("70%");
                    } else {
                      
                        $scope.dpasswordStrength["background-color"] = "red";
                        $scope.dpasswordStrength["width"] = "40%";
                        $("#dstr_stregnth").html("40%");
                    }
                }
                };

            });
*/

</script>