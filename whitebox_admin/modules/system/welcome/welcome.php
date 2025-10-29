<script type="text/javascript" src="js/validate.js"></script>
<script type="text/javascript" src="modules/system/welcome/splash.js"></script>
<style>
.btn_homescreen{
  background-color: #fff;
}
</style>
<script type="text/javascript">
  $(document).ready(function(){
$(".btn_homescreen").click(function(){
  var role=$(this).attr("role");
  if(role=="signup"){
    $.post("landingpage",{

    },function(data){
      $("#splashpage").hide();
$("#landingpage").html(data).show();
//alert(data)

})
  }else{


  }

})

  })



</script>
<img src="modules/system/welcome/welcome.png" class="splashimg splashdeskop ">
<img src="modules/system/welcome/welcommobile.png" class="splashimg splashmobile not_shown">

  <div class="col-sm-6 col-xs-12 startbox" >
  		<p class="align_center">
  			<!--<span class="btn  splashbtns btn_homescreen" role="signup"> <i class="fa fa-sign-in "></i> Test</span>-->
        <span class="btn splashbtns btn_homescreen" role="loginbox"> <i class="fa fa-sign-in"></i> sign in</span>
        <!-- <span class="btn splashbtns" role="recover_password" id="forgot_passwordbtn">Forgot your password ?</span>-->
  		<span class="btn not_shown splashbtns" role="reset_password" id="resetpasswordbtn">Set pass</span>
  	
  		</p>
  </div>
 
  <!-- Login  form-->
 <div class="overly not_shown" >
  <div class="col-sm-4 col-xs-12 splashpages animated not_shown" style="background-color: #fff;" id="loginbox">
  	<div class="s100 float_left">
  		<h2 class="align_center">
  			<span class="btn splashbackbtn float_left"><i class="fa fa-arrow-left"></i></span> 
  			Log In 
  		</h2>
  	</div>
    <form id="login_form" method="post" action="modules/system/login/login.php">
    	 <div class="col-sm-12 col-xs-12 inputwraps" style="color: #000;">
    			 Username
    			 <input type="text" name="loginuser" id="loginuser" class="splashinputs">
    		</div>
    		<div class="col-sm-12 col-xs-12 inputwraps" style="color: #000;">
    			 Password
    			 <input type="password" name="loginpass"  id="loginpass" class="splashinputs">
    		</div>
    		 <div class="warning align_center not_shown" id="loginloadto"></div>
    		<p class=" float_left align_center s100 mobipdless" style="padding-top:40px;">
    		    
         <span class="btn splashbtns" role="recover_password" id="forgot_passwordbtn">Forgot your password ?</span>
    			<span class="btn loginbtn" id="loginbtn"><i class="fa fa-sign-in"></i> Log In <b></b></span>
    			
    		</p>

    		<!--<p class=" float_left align_center s100 mobipdless">
    			<a class="btn splashbtns" role="recover_password" id="forgot_passwordbtn">Forgot your password ?</a>
    		</p>-->
      </form>
  </div>
 <!-- end login form-->

<!-- recover password form-->
 <div class="col-sm-4 col-xs-12 splashpages animated not_shown" style="background-color: #fff;" id="recover_password">
  	<div class="s100 float_left">
  		<h2 class="align_center">
  			<span class="btn splashbackbtn float_left"><i class="fa fa-arrow-left"></i></span> 
  			Recover your password
  		</h2>
  	</div>
  		<div class="col-sm-12 col-xs-12 inputwraps">
  			 Email/Phone 
  			 <input type="text" id="recoverusername" class="splashinputs">
  		</div>
      <div class="warning align_center not_shown" id="recover_pass_loadto"></div>
  		<p class=" float_left align_center s100 mobipdless" style="padding-top:40px;">
  			<span class="btn signupbtn" id="recover_passowrd"><i class="fa fa-sign-in"></i> Continue <b></b></span>
  		</p>
  </div>
<!-- end recover pass form-->
<!-- recover password form-->
 <div class="col-sm-4 col-xs-12 splashpages animated not_shown" style="background-color: #fff;" id="create_new_password">
    <div class="s100 float_left">
      <h2 class="align_center">
        <span class="btn splashbackbtn float_left"><i class="fa fa-arrow-left"></i></span> 
        Create New Password
      </h2>
    </div>
      <div class="col-sm-12 col-xs-12 inputwraps">
         User Email/Phone
         <input type="text" name="newest_pass_email"   id="newest_pass_email"  class="splashinputs" disabled="disabled">
      </div>
      <div class="col-sm-12 col-xs-12 inputwraps">
         New Password
         <input type="password" name="newest_pass" id="newest_pass" class="splashinputs">
      </div>
      <div class="col-sm-12 col-xs-12 inputwraps">
         Confirm Password
         <input type="password" name="confirm_newest_pass" id="confirm_newest_pass" class="splashinputs">
      </div>
       <div class="warning align_center not_shown" id="create_pass_loadto"></div>
      <p class=" float_left align_center s100 mobipdless" style="padding-top:40px;">
        <span class="btn signupbtn" id="save_new_pass_btn"><i class="fa fa-sign-in"></i> Finish <b></b></span>
      </p>
  </div>
  
  <!-- password-->
  
   <div class="col-sm-4 col-xs-12 splashpages animated not_shown" style="background-color: #fff;" id="reset_password">
    <div class="s100 float_left">
      <h2 class="align_center">
        <span class="btn splashbackbtn float_left"><i class="fa fa-arrow-left"></i></span> 
        Create New Password
      </h2>
    </div>
      <!--<div class="col-sm-12 col-xs-12 inputwraps">
         User Email/Phone
         <input type="text" name="newest_pass_email"   id="newest_pass_email"  class="splashinputs" disabled="disabled">
      </div>-->
      <div class="col-sm-12 col-xs-12 inputwraps">
         New Password
         <input type="password" name="nereset_pass" id="nereset_pass" class="splashinputs">
      </div>
      <div class="col-sm-12 col-xs-12 inputwraps">
         Confirm Password
         <input type="password" name="confirm_nereset_pass" id="confirm_nereset_pass" class="splashinputs">
      </div>
       <div class="warning align_center not_shown" id="createreset_pass_loadto"></div>
      <p class=" float_left align_center s100 mobipdless" style="padding-top:40px;">
        <span class="btn signupbtn" id="save_reset_pass_btn"><i class="fa fa-sign-in"></i> Save <b></b></span>
      </p>
  </div>
<!-- end recover pass form-->

<!-- recover password form-->
 <div class="col-sm-4 col-xs-12 splashpages animated not_shown" style="background-color: #fff;" id="confirm_account">
    <div class="s100 float_left">
      <h2 class="align_center">
        <span class="btn splashbackbtn float_left"><i class="fa fa-arrow-left"></i></span> 
          Account Verification
      </h2>
    </div>
      <div class="col-sm-12 col-xs-12 inputwraps" style="text-align:center !important;">
         Input verification code:<br>
      </div>
      <div class="col-sm-12 col-xs-12 inputwraps">
          <input type="text" id="confirmation_id" class="splashinputs" placeholder="Enter the code here">
      </div>
      <input type="text"  id="confirmkeyrole" style="display:none">
       <div class="warning align_center not_shown" id="confirm_key_loadto"></div>
      <p class=" float_left align_center s100 mobipdless" style="padding-top:40px;">
        <span class="btn  signupbtn" id="confirm_key_btn" role="new_pass_form"><i class="fa fa-sign-in"></i> Confirm !<b></b></span>
      </p>
  </div>
<!-- end recover pass form-->


<!-- signup  form-->
 
 
</div>
<!-- endsignup form-->

 