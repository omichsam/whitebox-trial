<?php
include("connect.php");


 //	id
$today=time();

$investorName=mysqli_real_escape_string($con,$_POST['investorName']);
$Title=mysqli_real_escape_string($con,$_POST['Title']);
$email=mysqli_real_escape_string($con,$_POST['email']);
$PhoneNumber=mysqli_real_escape_string($con,$_POST['PhoneNumber']);
$CompanyName=mysqli_real_escape_string($con,$_POST['CompanyName']);
$Company_type=mysqli_real_escape_string($con,$_POST['Company_type']);
$country=mysqli_real_escape_string($con,$_POST['country']);
$sector_id=mysqli_real_escape_string($con,$_POST['sector_id']);
$investor_type=mysqli_real_escape_string($con,$_POST['investor_type']);
$mentor=mysqli_real_escape_string($con,$_POST['mentor']);
$HearAboutUs=mysqli_real_escape_string($con,$_POST['HearAboutUs']);
/*
$InnovationLevel=mysqli_real_escape_string($con,$_POST['InnovationLevel']);
$Problemidentified=mysqli_real_escape_string($con,$_POST['Problemidentified']);
$ProblemSolution=mysqli_real_escape_string($con,$_POST['ProblemSolution']);
$CommercialModel=mysqli_real_escape_string($con,$_POST['CommercialModel']);
$Feasibility=mysqli_real_escape_string($con,$_POST['Feasibility']);
$HowItWorks=mysqli_real_escape_string($con,$_POST['HowItWorks']);
$intellectual_protection=mysqli_real_escape_string($con,$_POST['intellectual_protection']);
$InnovationWebsite=mysqli_real_escape_string($con,$_POST['InnovationWebsite']);
$YoutubepPortfolioLinks=mysqli_real_escape_string($con,$_POST['YoutubepPortfolioLinks']);
$Affiliations=mysqli_real_escape_string($con,$_POST['Affiliations']);
$PastAssociation=mysqli_real_escape_string($con,$_POST['PastAssociation']);
$terms_and_conditions_2=mysqli_real_escape_string($con,$_POST['terms_and_conditions_2']);*/
//$property="";
if($investorName && $Title && $email && $PhoneNumber && $CompanyName && $Company_type && $country && $sector_id && $investor_type && $HearAboutUs && $mentor){

//get sector
	

$get_sector=mysqli_query($con,"SELECT id FROM sectors WHERE name='$sector_id'") or die(mysqli_error($con));
$getid=mysqli_fetch_assoc($get_sector);

 $newsector_id=$getid['id'];
// get company id

$checkuser=mysqli_query($con,"SELECT * FROM investors WHERE email='$email'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkuser)!=0){
echo base64_encode("user with these details exist");

  }else{
$addVist=mysqli_query($con,"INSERT INTO investors VALUES(NULL,
												  '$investorName',
												  '$email',
												  '$PhoneNumber',
												  '$country',
												  '$Company_type',
												  '$newsector_id',
												  '$investor_type',
												  '$mentor',
												  '$HearAboutUs',
												  '$today',
												  '$today',
												  '$Title',
												  '$CompanyName')") or die(mysqli_error($con));






echo base64_encode("success");
}

   
}else{
	echo base64_encode("all fileds required");
}



?>