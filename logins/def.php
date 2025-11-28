<script>
    $(document).ready(function(){
         $(document).bind("contextmenu",function(e){
        
return false;
        
    })  
    
        var email='';
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
    var oldyeard='2021';
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