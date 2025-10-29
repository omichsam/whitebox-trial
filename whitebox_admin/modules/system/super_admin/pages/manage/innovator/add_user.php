
<div class="col-sm-12 col-xs-12">
	Manage innovators
</div>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-2 col-xs-3 ">
<div class="col-sm-12 col-xs-12 btn btn-primary innovate_btn" role="add_user">
	Add user 
</div>
</div>

<div class="col-sm-2 col-xs-3 ">
<div class="col-sm-12 col-xs-12 btn btn-primary innovate_btn" role="password">
	Reset Password 
</div>
</div>
<div class="col-sm-2 col-xs-3 ">
<div class="col-sm-12 col-xs-12 btn btn-primary innovate_btn " role="notify">
	Notify users
</div>
</div>
<div class="col-sm-2 col-xs-3 ">
<div class="col-sm-12 col-xs-12 btn btn-primary innovate_btn " role="homes">
	users
</div>
</div>
</div>
<div class="col-sm-12 col-xs-12" style="text-transform: uppercase;text-align: center;font-weight: bold">
	Add new innovator from here.
</div>
<style type="text/css">
    .pancityd{
        opacity: 1 !important;
        color: #000 !important;

    }
    .required{
    color: red;
    }
</style>
<div class="row" style="width: 100%; overflow: none">
	<div class="col-sm-3 col-xs-12"></div>
        <div class="animation  logins  col-sm-6 col-xs12" id="register_page">
            <!--<div class="card-header">
             
                <a href=""><img src="../../../../../../Huduma_WhiteBox/Whitebox.png" alt="logo" class="logo_positiondd" style="float: right;"></a>
            </div>-->
            <div class="card-body col-md-12">
                
            <!-- Notifications -->
            <div id="notific"> </div>
            <div class="row justify-content-center ">
                <form action="" method="POST" id="reg_form" novalidate="novalidate" class="bv-form" ><button type="submit" class="bv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
                <!-- CSRF Token -->
                <input type="hidden" name="_token" value="eNnPDi4e0Xk3tSgGyNXlTeRLf8ApVzvYPglc13nh">

                <div class=" row">
                    <div class="form-group  col-md-12  col-sm-12">
                        <label class="sr-only"> First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First Name" data-bv-field="first_name">
                        
                    <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="first_name" data-bv-result="NOT_VALIDATED">Name is required</small></div>
                   
 <div class="form-group col-md-12  col-sm-12 ">
                        <label class="sr-only"> Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Last Name" data-bv-field="last_name">
                        
                    <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="last_name" data-bv-result="NOT_VALIDATED">Last name is required</small></div>
                    <div class="form-group col-md-12  col-sm-12">
                        <label class="sr-only"> Email</label>
                        <input type="email" class="form-control" id="Email" name="email" placeholder="Email" data-bv-field="email">
                        
                    <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="email" data-bv-result="NOT_VALIDATED">The email address is required</small><small style="display: none;" class="help-block" data-bv-validator="regexp" data-bv-for="email" data-bv-result="NOT_VALIDATED">The input is not a valid email address</small><small style="display: none;" class="help-block" data-bv-validator="emailAddress" data-bv-for="email" data-bv-result="NOT_VALIDATED">Please enter a valid email address</small></div>
                    <div class="form-group col-md-12  col-sm-12">
                        <label class="sr-only"> Phone Number</label>
                        <input type="phone" class="form-control" id="phone" name="phone" maxlength="13" placeholder="Phone Number" data-bv-field="phone">
                        
                    <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="phone" data-bv-result="NOT_VALIDATED">The phone number is required</small></div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    
                    <div class="form-group col-md-12  col-sm-12">
                        
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

                    <div class="form-group col-md-12  col-sm-12" ng-app="myapp" >
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
                    <!--<div class="form-group col-md-12  col-sm-12 " ng-app="dmyapp" >
                     <div class="col-sm-12 no_padding" ng-controller="dPasswordController">
                        <label class="sr-only"> Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Confirm Password" data-bv-field="password_confirm" ng-change="analyzed(password_confirm)">
                        
                    <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="password_confirm" data-bv-result="NOT_VALIDATED">Confirm Password is required</small><small style="display: none;" class="help-block" data-bv-validator="identical" data-bv-for="password_confirm" data-bv-result="NOT_VALIDATED">Please enter the same value</small><small style="display: none;" class="help-block" data-bv-validator="different" data-bv-for="password_confirm" data-bv-result="NOT_VALIDATED">Confirm Password should match with password</small>

                  
                       <div class="col-xs-12 col-sm-12">
    <div class="col-sm-12 col-xs-12 not_shown" id="pass_t">Password strength:<span id="dstr_stregnth"></span></div>
<div class="col-xs-12 col-sm-12 " id="dstrengthmeter" ng-style="dpasswordStrength"></div>
    </div>
</div>
                </div>-->
                    <div class="clearfix"></div>
                   
                    <!--county-->
                    </div>
                    
                

                <!-- //Panle-group End -->
                <!-- Modal Start -->


                <div class="not_shown" id="termsholder">
                    <label class="checkbox-inline" id="termsagree">
                                                    <input required="" checked="true" class="pancityd" id="termsabd" name="termsa" type="checkbox" style="opacity: 1 !important" > I accept <a href="#modal"> Terms and Conditions</a>
                    </label>
                </div>
                &nbsp;
                <!-- <button type="submit" class="btn btn-block btn-primary">Sign Up</button> -->
                <span class="btn btn-block btn-success" name="SubmitButton" id="SubmitButton" >Register innovator</span>
                      
            </form>
                <div class="col-md-12" style="text-align: center;" id="sign_uperror"></div>

                <div class="col-md-12" style="" id="">
         
                </div>
            </div>
            
                
            </div>
            
            
        </div>
    </div>
        <script type="text/javascript">
        	$(document).ready(function(){

              
      $(".innovate_btn").click(function(){
      	var myrole=$(this).attr("role");
      if(myrole=="notify"){
 $.post("modules/system/super_admin/pages/manage/notify.php",function(data){
 	$("#maininnovate").html(data);
 })
      }else if(myrole=="homes"){
      	 $.post("modules/system/super_admin/pages/innovator/innovator.php",function(data){
 	$("#home").html(data);
 })
      }else{
 	 $.post("modules/system/super_admin/pages/innovator/"+myrole+".php",function(data){
 	$("#home").html(data);
 })
      }
      })
    

        		})
        </script>
        
<script>
    $(document).ready(function(){
         $(document).bind("contextmenu",function(e){
        
//return false;
        
    })  
    
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





        }else if($.trim(ddata)=="Sorry, wrong username or password!"){
            //$("#error_data").html(ddata);
            
            $("#error_data").html(ddata);
              }else if($.trim(ddata)=="Wrong Password, Check the password sent to your email, the first letter is in uppercase"){
            $("#error_data").html(ddata);


    }else if($.trim(ddata)=="Wrong username or password, kindly try again or sign up"){
            $("#error_data").html(ddata);
       

     }else if($.trim(ddata)=="All fields required!"){
            $("#error_data").html(ddata);
          
    }else if($.trim(ddata)=="new_password"){
            
      $("#emailsets").val($("#username").val())
      $("#password-field").prop("placeholder","Input new Password");
      $("#password-field").val("");
      $("#error_data").html("");
        //$("#error_data").html(ddata);
               // keycode=response;
                 //$("#loginview").click();
           //$(".logins").hide();
           $(".recover_dives").hide();
           $("#forgot_pwd_title").click();
           $("#newnow_pass").show();
               $(".recover_dives").hide();
            $("#newnow_pass").show();//uncomment for password verification

              // $(".recover_dives").hide();
              // $("#newnow_pass").show();
              $("#confirm_error").html("").css("color","black");
              $("#recovery_error").html("").css("color","black");
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

$("#error_data").html("Username and Password Required!");
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
//var password2=$("#password_confirm").val();
var password2=password1;
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
        url : 'modules/system/super_admin/pages/innovator/validate.php',
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
            	$("#sign_uperror").html("Account successifully created, let the user check his/her email and proceed").css("color","black");  
               /*   $("#secret_key").val($.trim(response));

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
                  */
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
