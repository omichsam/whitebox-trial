<?php
include("../../../base_connect.php");
include("../../../connect.php");

// session_start();
  $loginuser=base64_decode($_SESSION["username"]);
//echo $loginuser;

 //	id
$today=date('Y-m-d');
if($loginuser){

}else{
	$loginuser=$_POST['userd'];
}
$first_name=mysqli_real_escape_string($con,$_POST['first_name']);
$last_name=mysqli_real_escape_string($con,$_POST['last_name']);
$gender=mysqli_real_escape_string($con,$_POST['gender']);
$dob=mysqli_real_escape_string($con,$_POST['dob']);
$bio=mysqli_real_escape_string($con,$_POST['bio']);
$universities=mysqli_real_escape_string($con,$_POST['University_id']);
$educationlevels=mysqli_real_escape_string($con,$_POST['EducationLevel_id']);
$SecondarySchool=mysqli_real_escape_string($con,$_POST['SecondarySchool']);
$College=mysqli_real_escape_string($con,$_POST['College']);
$Certifications=mysqli_real_escape_string($con,$_POST['Certifications']);
$email=mysqli_real_escape_string($con,$_POST['email']);
$address=mysqli_real_escape_string($con,$_POST['address']);
$country=mysqli_real_escape_string($con,$_POST['country']);
$county_id=mysqli_real_escape_string($con,$_POST['county_id']);
$education_high=mysqli_real_escape_string($con,$_POST['education_high']);
$PrimarySchool=mysqli_real_escape_string($con,$_POST['PrimarySchool']);
$get_user=mysqli_query($con,"SELECT * FROM users WHERE email='$loginuser'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);

 $user_id=$get['id'];

  $getccounties=mysqli_query($con,"SELECT * FROM counties WHERE county_name='$county_id'") or die(mysqli_error($con));
$getcounties=mysqli_fetch_assoc($getccounties);
 $serial_no=$getcounties['serial_no'];

  $getccountry=mysqli_query($con,"SELECT * FROM countries WHERE name='$country'") or die(mysqli_error($con));
$getcountryd=mysqli_fetch_assoc($getccountry);
 $sortname=$getcountryd['sortname'];
//get university
$get_university=mysqli_query($con,"SELECT * FROM universities WHERE UniversityName='$universities'") or die(mysqli_error($con));
$getuniversity=mysqli_fetch_assoc($get_university);
 $University_id=$getuniversity['id'];

 $geteducation_levels=mysqli_query($con,"SELECT * FROM education_levels WHERE EducationLevelName='$educationlevels'") or die(mysqli_error($con));
$geteducationlevels=mysqli_fetch_assoc($geteducation_levels);
 $Education_id=$geteducationlevels['id'];


//$delete=mysqli_query($con,"DELETE FROM innovators_partners WHERE users='$loginuser'") or die(mysqli_error($con));
$updates=mysqli_query($con,"UPDATE users SET email='$email',first_name='$first_name',last_name='$last_name',gender='$gender',dob='$dob',county_id='$serial_no',country='$sortname',address='$address',bio='$bio' Where id='$user_id'") or die(mysqli_error($con));
$checkExist=mysqli_query($con,"SELECT * FROM education WHERE user_id='$user_id'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)!=0){

echo base64_encode("success");
$updates=mysqli_query($con,"UPDATE education SET University_id='$University_id',PrimarySchool='$PrimarySchool',EducationLevel_id='$Education_id',education_high='$education_high',SecondarySchool='$SecondarySchool',Certifications='$Certifications',College='$College' Where user_id='$user_id'") or die(mysqli_error($con));
}else{


$sql=mysqli_query($con,"INSERT INTO education VALUE(Null,
											'$user_id',
											'$University_id',
											'$Education_id',
											'$education_high',
											'$College',
											'$PrimarySchool',
											'$SecondarySchool',
											'$Certifications',
											'$today',
											'$today')") or die(mysqli_error($con));


echo base64_encode("success");
}


?>