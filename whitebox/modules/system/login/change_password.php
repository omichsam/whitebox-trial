<?php
include "../../../plugins/php_functions/php_functions.php";
include "../../../connect.php";
include "../../../plugins/php_functions/security.php";
include "../../../plugins/php_functions/general_functions.php";
$passlog=mysqli_real_escape_string($con,base64_decode($_POST['password']));
$pass1=hashword(base64_encode($passlog),$salt);
$username=mysqli_real_escape_string($con,base64_decode($_POST['new_user']));
 $date = time();
  $new_time=$date;
  $status="offline";
 $checkExist=mysqli_query($con," SELECT * FROM e_learning_admin WHERE user_name='$username'") or die(mysqli_error($con));
	  if(mysqli_num_rows($checkExist)==0){
	     	echo "Username not yet registered";
	  }else{
	  		 $activate=mysqli_query($con,"UPDATE e_learning_admin SET pass_key='$pass1',status='$status',time_in='$new_time' WHERE user_name='$username'") or die(mysqli_error($con));
 
 	echo "success";
	  	
}
?>			 