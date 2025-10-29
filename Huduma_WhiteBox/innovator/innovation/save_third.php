<?php
include("../../../base_connect.php");
include("../../../connect.php");

// session_start();
  $loginuser=base64_decode($_SESSION["username"]);

 //	id
$today=time();
if($loginuser){


$get_user=mysqli_query($con,"SELECT * FROM users WHERE email='$loginuser'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$first_name=$get['first_name'];
$user_id=$get['id'];
$last_name=$get['last_name'];
$fullname=mysqli_real_escape_string($con,"user".$user_id."_".$first_name."_".$last_name."_".$today);
 
$requirements=mysqli_real_escape_string($con,$_POST['requirements']);
$targeted=mysqli_real_escape_string($con,$_POST['targeted']);
$busines_model=mysqli_real_escape_string($con,$_POST['busines_model']);
$research_letter=mysqli_real_escape_string($con,$_POST['research_letter']);
$research=mysqli_real_escape_string($con,$_POST['research']);

if($requirements && $targeted && $busines_model && $research_letter && $research){

$update=mysqli_query($con,"UPDATE innovations_table SET target='$targeted',requirements='$requirements',busines_model='$busines_model',research='$research',Research_sources='$research_letter'WHERE user_id='$user_id' and status='pending'") or die(mysqli_error($con));

echo base64_encode("success");
}else{
	//echo "error";
}
   
}else{

}





?>