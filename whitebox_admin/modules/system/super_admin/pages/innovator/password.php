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
<div class="col-sm-12 col-xs-12">
	<div class="col-sm-2 col-xs-12">
	
</div>
<div class="col-sm-8 col-xs-12">
	<div class="col-sm-12 col-xs-12">
	user Email:
	<input class="col-sm-12 col-sm-12 splashinputs" id="remail" type="email" placeholder="add user email">
</div>
<div class="col-sm-12 col-xs-12 " >
	<div class="col-sm-4 col-xs-12"></div>
	<div class="col-sm-4 col-xs-12 btn-success btn" id="sendrecovery">Send</div>
	
	</div>

	<div class="col-sm-12 col-xs-12 " id="recovererrors" style="text-align: center;">
	
	</div>
</div>


</div>

<script type="text/javascript">
	$(document).ready(function(){

		$("#sendrecovery").click(function(){
		var nremail=$("#remail").val();
		var errorsb="";
if(nremail){


var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if(!emailReg.test(nremail)){
        $("#remail").val("");
  
   var errorsb="";
       $("#remail").prop("placeholder","Wrong email format!");
        //$("#sign_uperror").html("Check your email address!").css('color','red');

$("#recovererrors").html("Check your email address!")
$("#remail").css("border","2px solid red");
       // $("#loader_error").html("Check your email Format!");
    }else{
        $("#remail").css("border","1px solid #ccc");
      //$("#sign_uperror").html(email_address)
 //$(".email_check").show();
// $(this).css('color','red');
var errorsb="ready";
 $("#recovererrors").html("")
    
    }
}else{
	var errorsb="";
}


if(errorsb=="ready"){


	  var txt;
  var r = confirm("you are about to send a password recovery link to '"+nremail+"', click OK to complete or CANCEL to stop?");
  if (r == true) {
  var remail=btoa(nremail)
var loader=$("#loader").html();
	$("#recovererrors").html("Sending..please wait.."+loader)
				 $.post("modules/system/super_admin/pages/innovator/recover.php",{remail:remail},function(data){
				 	if($.trim(atob(data))=="success"){
                    $("#recovererrors").html("A password recovery link has been shared to the innovators email account, let the user check his/her email and proceed with passord recovery")
				 	}else{
$("#recovererrors").html("you have an error, kindly check your email and try again")
				 	}
 
 	
 })

}else{

}


}else{
		$("#recovererrors").html("You have an error, kindly check your email and try again")
}



	

		})







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

   $("#remail").focusout(function(){
    var email=$("#remail").val();
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

$("#recovererrors").html("Check your email address!")
$(this).css("border","2px solid red");
       // $("#loader_error").html("Check your email Format!");
    }else{
        $(this).css("border","1px solid #ccc");
      //$("#sign_uperror").html(email_address)
 //$(".email_check").show();
// $(this).css('color','red');

 $("#recovererrors").html("")
    
    }
//$(".cheked_pass").show();

                  }
  });

</script>