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

$educate=mysqli_query($con,"SELECT * FROM education Where user_id='$user_id'") or die(mysqli_error($con));
$getp=mysqli_fetch_assoc($educate);
if($getp){
$University_id=$getp['University_id'];
$PrimarySchool=$getp['PrimarySchool'];
$EducationLevel_id=$getp['EducationLevel_id'];
$education_high=$getp['education_high'];
$College=$getp['College'];
}else{
$University_id="";
$PrimarySchool="";
$EducationLevel_id="";
$education_high="";
$College="";
}
if($first_name && $last_name && $dob && $gender && $EducationLevel_id && $education_high){
 echo base64_encode("active");   
}else{
	//echo base64_encode("active"); 
  echo base64_encode("notactive");    
}

   

?>