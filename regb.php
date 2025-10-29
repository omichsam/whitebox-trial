

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
                        <!--
                     <select class="form-control" id="gender" name="gender">
                       <option>male</option>
                       <option>female</option>  
                     </select>

                   -->
                        <label class="sr-only">Gender</label>
                        <label class="radio-inline">
                            <div class="iradio_minimal-blue" style="position: relative;">

                               <input type="radio" class="pancityd"  style="opacity: 1 !important"  name="gender" id="inlineRadio1" value="male" style="position: absolute; " data-bv-field="gender">
                            </div> Male
                        </label>&nbsp;
                        <label class="radio-inline">
                            <div class="iradio_minimal-blue" style="position: relative;"><input type="radio" class="pancityd"  style="opacity: 1 !important"  name="gender" id="inlineRadio2" value="female" style="position: absolute; " data-bv-field="gender"></div> Female
                        </label>
                        
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


                <div class="">
                    <label class="checkbox-inline">
                                                    <input required="" class="pancityd" id="termsagree" name="termsa" type="checkbox" style="opacity: 1 !important"  id="termsa"> I accept <a href="#modal"> Terms and Conditions</a>
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
                
            </div>
            
        </div>
        