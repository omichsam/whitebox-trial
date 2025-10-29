<?php
//include "../../api/sms/smsGateway.php";
include "../../../plugins/php_functions/php_functions.php";
include "../../../connect.php";
include "../../../plugins/php_functions/security.php";
include "../../../plugins/php_functions/general_functions.php";
$loginuser=mysqli_real_escape_string($con,$_POST['loginuser']);
$loginpass=mysqli_real_escape_string($con,$_POST['loginpass']);
$new_user=encrypt(base64_encode($loginuser),$key);
$new_pass=encrypt(base64_encode($loginpass),$key);

if($loginuser){
	if($loginpass){
		$pass=$loginpass;
 		$checkExist=mysqli_query($con,"SELECT user_name,pass_key FROM e_learning_admin WHERE user_name='$new_user' AND pass_key='$new_pass'") or die(mysqli_error($con));

  		if(mysqli_num_rows($checkExist)!=0){
  			$get=mysqli_fetch_assoc($checkExist);
  			$user_name=$get['user_name'];
  			$pass_key=$get['pass_key'];
  		

 	  			  	  /* if($ukey=='')
	  			  	   {
	  			  	   	   //generate and send random key to given email for confirmation 
 							$confirmation_key=generate_key();
	  			  	        $updateKey=mysql_query("UPDATE admin_tbl SET user_id='$confirmation_key' WHERE email='$loginuser' OR phone='$loginuser' ") or die(mysql_error());
	  			  	    }
	  			  	    else{}*/

	  			  	  /* $ChekIfActive=mysql_query("SELECT id FROM admin_tbl WHERE email='$loginuser' AND status='active' OR phone='$loginuser' AND status='active' ")or die(mysql_error());
  						  if(mysql_num_rows($ChekIfActive)!=0)
  						  {
			  			      //*if account exist and  active
			  			         //updateAccessCounts
			  			         	$last_seen=mysql_query("UPDATE admin_tbl SET  last_seen='$DateTime'  WHERE user_id='$ukey'")or die(mysql_error());
									echo "available";
			  			   }
			  			   else
			  			   {

			  					//if account exist but  not active
			  					send_activation($uname,$uemail,$uphone,$ukey);
 			  					?>
	  								<script>
						 				$(document).ready(function(){
						 					$(".splashpages").hide();
     										$(".overly,#confirm_account").removeClass("fadeOutDown").addClass("fadeInUp").show();
										    $("#confirm_ac_loadto").show().html("Account exists but not yet verified");
						 				});
						 			</script>
			  					<?php

			  			   }*/
			  			   echo "admin";
			  			    session_start();
                           $chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz";
	                         $code=substr(str_shuffle($chars),0,10);//generate random Key
	                         $id=encrypt(base64_encode($code),$key);
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $new_user;

			  }else{
			  	echo"no user with such credentials";
			  }

	}else{
		echo "Password missing";
	}
}else{
	echo "Email/phone required.";
}
?>