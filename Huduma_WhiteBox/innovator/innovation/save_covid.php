<?php
include("../../../base_connect.php");
include("../../../connect.php");

 //session_start();
  $loginuser=base64_decode($_SESSION["username"]);

$get_user=mysqli_query($con,"SELECT * FROM users WHERE email='$loginuser'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$first_name=$get['first_name'];
$user_id=$get['id'];
$last_name=$get['last_name'];
$today=time();
$Status="submission";
//$fullname=mysqli_real_escape_string($con,"user".$user_id."_".$first_name."_".$last_name."_".$today);

$need=mysqli_real_escape_string($con,$_POST['need']);
$solution=mysqli_real_escape_string($con,$_POST['solution']);
$select_category=mysqli_real_escape_string($con,$_POST['select_category']);
$matured=mysqli_real_escape_string($con,$_POST['matured']);
$beneficiaries=mysqli_real_escape_string($con,$_POST['beneficiaries']);
$implementation=mysqli_real_escape_string($con,$_POST['implementation']);
$progess=mysqli_real_escape_string($con,$_POST['progess']);
$innovation_options=mysqli_real_escape_string($con,$_POST['innovation_options']);
$collaborate=mysqli_real_escape_string($con,$_POST['collaborate']);
$relevance=mysqli_real_escape_string($con,$_POST['relevance']);
$terms=mysqli_real_escape_string($con,$_POST['terms']);
$innovation_options=mysqli_real_escape_string($con,$_POST['innovation_options']);

$checkuser=mysqli_query($con,"SELECT * FROM covid19_innovations WHERE user_id='$user_id' and Status='pending'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkuser)!=0){

$update=mysqli_query($con,"UPDATE covid19_innovations SET need='$need',solution='$solution',sector='$select_category',maturity='$matured',beneficiaries ='$beneficiaries',implementation_plan='$implementation',success_indicators='$progess',innovator_Identity='$innovation_options',collaborations='$collaborate' WHERE user_id='$user_id' and Status='pending'") or die(mysqli_error($con));

//echo base64_encode("Innovation exist");


   
echo base64_encode("success");
}else{
	$addVist=mysqli_query($con,"INSERT INTO covid19_innovations VALUES(
												  NULL,
												  '$user_id',
												  '$need',
												  '$solution',
												  '$select_category',
												  '$matured',
												  '$beneficiaries',
												  '$implementation',
												  '$progess',
												  '$innovation_options',
 												  '$collaborate',
												  '$relevance',
												  'terms',
												  '$Status',
												  '$today')") or die(mysqli_error($con));

echo base64_encode("success");
}


?>