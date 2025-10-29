<?php
//include "../../api/sms/smsGateway.php";
include "../../../plugins/php_functions/php_functions.php";
include "../../../connect.php";
include "../../../plugins/php_functions/security.php";
include "../../../plugins/php_functions/general_functions.php";
$loginuser=$_POST['loginuser'];
$loginpass=$_POST['loginpass'];
//$new_user=$loginuser;
//$new_pass=$loginpass;

$new_user=mysqli_real_escape_string($con,$loginuser);
$passlog=mysqli_real_escape_string($con,$loginpass);

$new_pass=hashword(base64_encode($passlog),$salt);

$statusof="deactivated";
if($loginuser){
	if($loginpass){
		$pass=$loginpass;
 		$checkExist=mysqli_query($con,"SELECT user_name,pass_key FROM e_learning_admin WHERE user_name='$new_user' AND pass_key='$new_pass'") or die(mysqli_error($con));

  		if(mysqli_num_rows($checkExist)!=0){
  		$checkaxtiv=mysqli_query($con,"SELECT user_name,pass_key FROM e_learning_admin WHERE user_name='$new_user' AND pass_key='$new_pass' and status ='$statusof'") or die(mysqli_error($con));

  		if(mysqli_num_rows($checkaxtiv)>=1){
  		  
  		   echo"Sorry, Your account requires technical support from the administrator.!"; 
  		}else{
  		    
  		$get_user=mysqli_query($con,"SELECT * FROM e_learning_admin WHERE user_name='$new_user' AND pass_key='$new_pass'") or die(mysqli_error($con));
            $get=mysqli_fetch_assoc($get_user);
           $status=$get['status'];
           $time_in=$get['time_in'];
           if($status && $time_in){
			  			   echo "admin";
			  			    session_start();
                           $chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz@!#$%&";
	                         $code=substr(str_shuffle($chars),0,15);//generate random Key
	                         $id=base64_encode($code);
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = base64_encode($new_user);
                          
           }else{
               echo "Update_pass";
           }
  		}

			  }else{
			  	echo"Wrong details!";
			  }

	}else{
		echo "Password missing";
	}
}else{
	echo "Email/phone required.";
}
?>