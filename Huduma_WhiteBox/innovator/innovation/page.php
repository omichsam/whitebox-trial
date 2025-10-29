<?php
include("../../../base_connect.php");
include("../../../connect.php");

 //session_start();
  $loginuser=base64_decode($_SESSION["username"]);
if($loginuser){
 //	id

  $loginuser=base64_decode($_POST["my_id"]);
}else{

}
$today=time();
if($loginuser){


$get_user=mysqli_query($con,"SELECT * FROM users WHERE email='$loginuser'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$first_name=$get['first_name'];
$user_id=$get['id'];
$last_name=$get['last_name'];


$get_pending=mysqli_query($con,"SELECT Innovation_Id FROM innovations_table WHERE user_id='$user_id' and status='pending'") or die(mysqli_error($con));
$getpending=mysqli_fetch_assoc($get_pending);
$Innovation_Id=$getpending['Innovation_Id'];



$update=mysqli_query($con,"UPDATE innovations_table SET accepts_terms_2='Yes',Status='submission',date_added='$today' WHERE user_id='$user_id' and Innovation_Id='$Innovation_Id'") or die(mysqli_error($con));

echo base64_encode("success");
}else{
	//echo "error";
}
   






?>