<style>
.warning_p{
  text-transform: uppercase;
text-align: center;
min-height: 40px;
background:#ddd;
font-size: 19px;
font-weight: bold;
padding-top: 9px;
}

</style>

<script type="text/javascript" src="js/angular.js"></script>

<div class="col-sm-12 col-xs-12 no_padding">

<div class="col-sm-12 col-xs-12  not_shown" id="invest_disclaimer">

<div class="col-xs-12 col-sm-2 no_padding"></div>
<div class="col-xs-12 col-sm-8 no_padding">
   <h4 id="diaclaimer_header"><strong>Investor Terms and Conditions</strong></h4>
  <p class="col-sm-12 col-xs-12 no_padding">
Herihub wishes to express that the participants privacy is of the utmost concern to Herihub. Herihub guarantees to treat any information received from the participants with the highest level of respect. The information submitted to this portal will be used primarily for the purpose of creating successful matches between Investors and innovators. Any information received is necessary to provide a level of certainty of intent and to maximize credibility. As an investor, on your request only, Herihub will provide your preferred method of contact information to any innovator that you specifically request contact with. Please note that the title and short summary of Innovator ideas will be presented to you once you are matched with innovations that meet your expectation. <br>
The Participants agree to the following terms and conditions which constitute a legally binding agreement between Herihub and the Participants.
Further, the Participants in registering with the Service confirm that they have read and fully understood and accepted these terms and conditions.


 </p>
 <p class="col-sm-12 col-xs-12 no_padding">
  <span class="col-xs-1 col-sm-1">1.</span>
  <span class="col-xs-11 col-sm-11 no_padding">
Herihub is under no obligation to match investors with ideas/innovations presented to them via this portal.

</span>
 </p>
 <p class="col-sm-12 col-xs-12 no_padding">
  <span class="col-xs-1 col-sm-1">2.</span>
  <span class="col-xs-11 col-sm-11 no_padding">
The Participants agree that they are voluntarily engaging with the Innovation Portal and fully understand its mode of operation. Their engagement with the Herihub and the innovators is not compulsory and they can choose to opt out at any given time.

</span>
 </p>
  <p class="col-sm-12 col-xs-12 no_padding">
    <span class="col-xs-1 col-sm-1">3.</span>
  <span class="col-xs-11 col-sm-11 no_padding">
The Participants acknowledge that Herihub is not responsible for any contracts that the Participants may enter with any of the innovators. Any such contractual engagements or dealings are willingly entered by the Participants and they do not create any privity with Herihub.

</span>
 </p>
  <p class="col-sm-12 col-xs-12">
&nbsp;
 </p>
<div class="col-sm-12 col-xs-12">
<div class="col-xs-4 col-sm-8 no_padding">
<label class="input_ipc">
Agree
  <input type="checkbox" id="agreed">
  <span class="checkmark"></span>
  
</label>
</div>
<div class="col-xs-8 col-sm-4">
<span class="btn theme_bg investor_spandisc" role="cancel">Cancel</span>
<span class="btn theme_bg investor_spandisc" id="btn_agreed" role="agree">Next</span>
</div>
</div>
<div class="col-sm-12 col-xs-12 " id="invest_disclaimererror"></div>
</div>

</div>






<div class="col-sm-12 col-xs-12 no_padding " id="invest_overal">
  <div class="col-sm-3 col-xs-12"></div>
  <div class="col-sm-4 col-xs-12 " id="login_wrtped">
  <div class="col-xs-12 col-sm-12 invest_sign" id="investor_login">
    <div class="col-sm-12 no_padding col-xs-12">
      <div class="col-sm-12 col-xs-12 no_padding warning_p " id="">INVESTOR LOGIN</div>
    

      Username:
      <input type="type" id="login_username" class="splashinputs">
            Password:
            <input type="Password" id="login_Password" class="splashinputs">



    </div>
    <div class="col-xs-12 col-sm-12 no_padding">
      
      <span class="theme_bg btn investor_login" role="investor_forgotpass">Forgot Password</span>
      <span class="theme_bg btn investor_login" id="login_nv" role="login_nv">Login</span> or 
      <span class="theme_bg btn investor_login" role="invest_disclaimer">Sign up</span>
  </div>
</div>
<div class="col-xs-12 col-sm-12 not_shown invest_sign" id="investor_sign">

<div class="col-xs-12 col-sm-12 no_padding warning_p">
 Sign up as an investor 
</div>
<div class="col-xs-12 col-sm-12 no_padding">
      Email address:
      <input type="email" id="inve_username" class="splashinputs">
    </div>
    <div class="col-xs-12 col-sm-12 no_padding">
      Interested in?:
      <select class="splashinputs" id="interest">
      <option></option>
      <option>Culture</option>
            <option>Heritage</option>
      </select>
    </div>
      <div class="col-xs-12 col-sm-12 no_padding">
            Password:
            <input type="Password" id="inve_Password" class="splashinputs">
        </div>
        <div class="col-xs-12 col-sm-12 no_padding">
          Repeat password:
            <input type="Password" id="inve_rPassword" class="splashinputs">
      <span class="theme_bg btn investor_login" role="investor_login">Back to Login</span> or 
      <span class="theme_bg btn investor_login" role="investor_confirm">Sign up</span>
    </div>

</div>



<div class="col-xs-12 col-sm-12 not_shown invest_sign" id="investor_forgotpass">
  <div class="col-xs-12 col-sm-12 no_padding warning_p">
  Recover your account here
</div>
      Email address:
      <input type="type" id="username" class="splashinputs">
      <span class="theme_bg btn investor_login" role="investor_login">Back to Login</span> 
      <span class="theme_bg btn investor_login" role="recover_account">Recover</span>
      <!--<span class="theme_bg btn investor_login" role="investor_sign">Sign up</span>-->

    </div>
<div class="col-xs-12 col-sm-12" id="investorerro_display" style="text-align: center;"></div>
</div>
</div>


</div>
<script type="text/javascript">
  
$(document).ready(function(){
  var button_enter="login_nv";
$(".investor_login").click(function(){
var loader=$("#loader").html();
$("#investorerro_display").html(loader)
  var my_role=$(this).attr("role");
  if(my_role=="recover_account"){
    //alert(my_role)
$("#investorerro_display").html("")
  }else if(my_role=="login_nv"){
    //alert()
 var login_Password=btoa($("#login_Password").val())
 var login_username=btoa($("#login_username").val())
 if(login_username && login_Password){
$.post("modules/functions/investor_login.php",{
  login_Password,
  login_username
},function(data){
  if($.trim(data)=="exists"){
    $("#account_type").val("investor");
    var busername=login_username;
$("#global_u_email").val(busername);
  $.post("modules/pages/landingpage.php",{ busername:busername },function(data){$("#loader_display").html("");$("#splashpage").hide();$("#landingpage").show().html(data); })

  }else{
    $("#investorerro_display").html(data)
  }
})
 }else{
  $("#investorerro_display").html("Username and password required!")
 }
///alert("login")
  }else if(my_role=="investor_confirm"){
//alert()
$("#investorerro_display").html(loader)
var email=btoa($("#inve_username").val())
var interest=btoa($("#interest").val())
var inve_Password=btoa($("#inve_Password").val())
var inve_rPassword=btoa($("#inve_rPassword").val())
if(email && interest && inve_Password && inve_rPassword){
if(inve_Password==inve_rPassword){
$.post("modules/functions/investor.php",{
email:email,
interest:interest,
inve_Password:inve_Password
},function(data){
if($.trim(data)=="success"){

}else{
  $("#investorerro_display").html(data)
}
})

}else{
  $("#investorerro_display").html("Passwords missmatch!")
}
}else{
  $("#investorerro_display").html("All fields required!")
}
//alert("investor_confirm")

  }else if(my_role=="invest_disclaimer"){
    button_enter="";
  //var data=$("#invest_disclaimer").html()
  //alert(data)
  $(".invest_sign").hide()
    $("#investorerro_display").html("")
  $("#invest_overal").hide();

  $("#invest_disclaimer").show();

  }else{

$("#investorerro_display").html("")
  $(".invest_sign").hide();
  $("#"+my_role).show();
  }
})


$(".investor_spandisc").click(function(){
  var my_id=$("#global_u_email").val();
var my_role=$(this).attr("role");
//alert(my_role)
if(my_role=="agree"){
  


  if($("#agreed").prop("checked")){

/*
$.post("modules/system/external/pages/submit.php",{
          
    },function(data){
      $("#div_displayer").html(data)
    })
*/
button_enter="confirm_signup";
$("#investorerro_display").html("")
  
$("#invest_disclaimer").hide();
$("#invest_overal").show()
  $("#login_wrtped").show();
  $(".invest_sign").hide();
 $("#investor_sign").show();

  }else{

$("#invest_disclaimererror").html("Agree to the terms and conditions first!").css('color','red');

  }

}else{
 button_enter="login_nv";
$("#investorerro_display").html("")
  
$("#invest_disclaimer").hide();
$("#invest_overal").show()
  $("#login_wrtped").show();
  $(".invest_sign").hide();
 $("#investor_login").show();
} 

})
$(document).keypress(function(e) {
      if(e.which == 13) {
       //alert(button_enter)
$("#"+button_enter+"").click();
}
    });

$("#inve_username").focusin(function(){
  // $(".email_check").hide();
   $("#inve_username").val("");
   $("#investorerro_display").html("").css('color','red');
  });
$("#inve_username").focusout(function(){
    var inve_username=$("#inve_username").val();
               if(inve_username==""){

         //$(".email_check").hide();

                  }else{
//alert()
var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if(!emailReg.test(inve_username)){
        email_address="";
        $("#inve_username").val("");
      //$(".email_check").hide();
        $("#inve_username").attr("placeholder","Wrong email format!");
        $("#investorerro_display").html("Check your email address!").css('color','red');
       // $("#loader_error").html("Check your email Format!");
    }else{
      //alert(email_address)
 //$(".email_check").show();
 $("#investorerro_display").html("").css('color','red');
    }
//$(".cheked_pass").show();

                  }
  });





})


</script>