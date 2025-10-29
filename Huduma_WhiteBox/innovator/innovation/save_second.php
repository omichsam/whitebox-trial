<?php
include("../../../base_connect.php");
include("../../../connect.php");

 //session_start();
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

$ProblemSolution=mysqli_real_escape_string($con,$_POST['ProblemSolution']);
$Problemidentified=mysqli_real_escape_string($con,$_POST['Problemidentified']);
$impact=mysqli_real_escape_string($con,$_POST['impact']);
$InnovationLevel=mysqli_real_escape_string($con,$_POST['InnovationLevel']);
$ideas=mysqli_real_escape_string($con,$_POST['ideas']);
$Explain=mysqli_real_escape_string($con,$_POST['Explain']);
if($ProblemSolution && $Problemidentified && $impact && $InnovationLevel && $ideas && $Explain){

$update=mysqli_query($con,"UPDATE innovations_table SET need='$Problemidentified',solution='$ProblemSolution',impact='$impact',originality='$ideas',originality_explanation='$Explain',stage='$InnovationLevel' WHERE user_id='$user_id' and status='pending'") or die(mysqli_error($con));

echo base64_encode("success");
}else{
	//echo "error";
}
   
}else{

}





?>