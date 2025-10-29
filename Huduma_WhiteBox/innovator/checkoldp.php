<?php
include("../../base_connect.php");
include("../../connect.php");
//getting variables
 // session_start();
  $loginuser=base64_decode($_SESSION["username"]);
if($loginuser){

 // id
}else{
	$loginuser=base64_decode($_POST['my_id']);
}
$today=time();



$get_user=mysqli_query($con,"SELECT * FROM users WHERE email='$loginuser'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$first_name=$get['first_name'];
$user_id=$get['id'];
$last_name=$get['last_name'];
$bio=$get['bio'];
$county_id=$get['county_id'];
$dob=$get['dob'];
$gender=$get['gender'];

if($first_name && $last_name && $dob && $gender){
 echo base64_encode("active");   
}else{
	//echo base64_encode("active"); 
  echo base64_encode("notactive");    
}

   

?>