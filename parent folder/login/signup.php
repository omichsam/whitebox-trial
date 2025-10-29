<?php
include("../connect.php");
$salt="A073955@am";
function hashword($string,$salt){
      $string=crypt($string,'$1$'.$salt.'$');
      return $string;
}
$day=date('y-m-d');
$DateTime=date('Y-m-d H:i:s',time());
$first_name=mysqli_real_escape_string($con,$_POST['fname']);
$last_name=mysqli_real_escape_string($con,$_POST['sname']);
$Innovation=mysqli_real_escape_string($con,$_POST['Innovation']);
$gender=mysqli_real_escape_string($con,$_POST['genderb']);
$email=mysqli_real_escape_string($con,$_POST['emaile']);
$phone=mysqli_real_escape_string($con,$_POST['phoneb']);
$county=mysqli_real_escape_string($con,$_POST['county']);
$education=mysqli_real_escape_string($con,$_POST['education']);
$Industry=mysqli_real_escape_string($con,$_POST['Industry']);
$stage=mysqli_real_escape_string($con,$_POST['stage']);
$submission=mysqli_real_escape_string($con,$_POST['submission']);
$training=mysqli_real_escape_string($con,$_POST['training']);
$termsbs=mysqli_real_escape_string($con,$_POST['termsbs']);
$institution=mysqli_real_escape_string($con,$_POST['institution']);
$DateOfBirth=mysqli_real_escape_string($con,$_POST['DateOfBirth']);
$passwordw2=mysqli_real_escape_string($con,$_POST['passwordw2']);
$passwordw1=mysqli_real_escape_string($con,$_POST['passwordw1']);

$pass=hashword(base64_encode($passwordw1),$salt);
$today=time();


if($last_name && $passwordw1 && $passwordw2 && $termsbs && $email && $first_name && $gender && $phone && $DateOfBirth && $county){

$cheinnovations=mysqli_query($con,"SELECT * FROM e_learning_users WHERE email='$email'") or die(mysqli_error($con));

  if(mysqli_num_rows($cheinnovations)>0){
echo base64_encode("This account exists");
}else{
$addVist=mysqli_query($con,"INSERT INTO e_learning_users VALUES(NULL,
												  '$first_name',
												  '$last_name',
												  '$gender',
												  '$phone',
												  '$email',
												  '$DateOfBirth',
												  '$county',
												  '$education',
												   '$Innovation',
												   '$stage',
												    '$submission',
												    '$Industry', 
												    '$training',
												    '$institution', 
												    '$pass',
												    'I agree', 
												    'new',
												    '$DateTime')") or die(mysqli_error($con));



$chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz@!#$%&";
$code=substr(str_shuffle($chars),0,15);//generate random Key
echo base64_encode($code);
$codeb=base64_encode($code);
  $keyb=base64_encode($email);
$subject="Activate your WhiteBox Account";
$message="<p>Dear $first_name $last_name,</p><p>Welcome to Whitebox E-learning Platform. To Activate your account please Click here: <a href='www.whitebox.go.ke/activate.php?code=$codeb & key=$keyb'>www.whitebox.go.ke/activate.php?code=$codeb</a> or use this code:$code</p> <p>Regards.</p><p>Huduma WhiteBox</p>";
include("../Huduma_WhiteBox/mails/general.php");
//echo base64_encode("sucess");
}
}else{
	//echo base64_encode("All field required!");
}
?>