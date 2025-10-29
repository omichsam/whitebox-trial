<?php
//include "../../api/sms/smsGateway.php";
include "../../../connect.php";
/*include "../../../plugins/php_functions/security.php";
include "../../../plugins/php_functions/general_functions.php";*/
$thisUser=mysqli_real_escape_string($con,$_POST['username']);



$statusof="deactivated";
$check_exists=mysqli_query($con,"SELECT user_name,Name FROM administrators WHERE user_name='$thisUser'") or die(mysqli_error($con));
if(mysqli_num_rows($check_exists)>=1){
    
    	$checkaxtiv=mysqli_query($con,"SELECT user_name,pass_key FROM administrators WHERE user_name='$thisUser' and status ='$statusof'") or die(mysqli_error($con));

  		if(mysqli_num_rows($checkaxtiv)>=1){
  		  
  		   echo"Sorry, Your account requires technical support from the administrator.!"; 
  		}else{
    
    
    
	$get=mysqli_fetch_assoc($check_exists);
	$email=$get['user_name'];
	$Name=$get['Name'];
$chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz@!#$%&";
$code=substr(str_shuffle($chars),0,15);//generate random Key
     $id=base64_encode($code);
     $subject="Password Reset request";
 $message="Dear ".$Name.", You requested for a password resset, Kindly verify with this code: <srtong> ".$code."</strong> and continue. Thank you";
	include "../../../modules/mails/general.php";
	
	//send_activation($name,$email,$phone,$userid);
		?>
			<script>
			 $(document).ready(function(){
			     var code='<?php echo $id?>';
			      $("#user_email").val(code);
			 	  $(".splashpages").hide();
					$(".overly,#confirm_account").removeClass("fadeOutDown").addClass("fadeInUp").show();
			   	    $("#confirmkeyrole").val("recover_pass");
			   	    $("#confirm_key_loadto").show().addClass('success').html("Check your email for confirmation code.");
			   	    
			   	    
			 });
			 </script>
		<?php

  		}			
}else{
    echo "User with that email does not exist";
}
?>