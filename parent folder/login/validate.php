<?php
include("../connect.php");
$salt="A073955@am";
function hashword($string,$salt){
      $string=crypt($string,'$1$'.$salt.'$');
      return $string;
}
$day=date('y-m-d');
$DateTime=date('Y-m-d H:i:s',time());
$first_name=mysqli_real_escape_string($con,$_POST['first_name']);
$last_name=mysqli_real_escape_string($con,$_POST['last_name']);
$email=mysqli_real_escape_string($con,$_POST['email']);
$gender=mysqli_real_escape_string($con,$_POST['gender']);
$newpassword=mysqli_real_escape_string($con,$_POST['newpassword']);
$password_confirm=mysqli_real_escape_string($con,$_POST['password_confirm']);
$termsa=mysqli_real_escape_string($con,$_POST['termsa']);
$phone=mysqli_real_escape_string($con,$_POST['phone']);
$pass=hashword(base64_encode($newpassword),$salt);
$today=time();



if($last_name && $newpassword && $password_confirm && $termsa && $email && $first_name && $gender && $phone){

$cheinnovations=mysqli_query($con,"SELECT * FROM users WHERE email='$email'") or die(mysqli_error($con));

  if(mysqli_num_rows($cheinnovations)>0){
echo base64_encode("This account exists");
}else{
$addVist=mysqli_query($con,"INSERT INTO users VALUES(NULL,
												  '$email',
												  '$pass',
												  '',
												  '$DateTime',
												  '$first_name',
												  '$last_name',
												  '$DateTime',
												  '$DateTime',
												   '$DateTime',
												   '',
												    '$gender',
												    '$day', 
												    '',
												    '', 
												    '1',
												    '', 
												    '',
												    '', 
												    '',
												    '', 
												    '',
												    '',
												    '',
												    '$phone')") or die(mysqli_error($con));



$chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz@!#$%&";
$code=substr(str_shuffle($chars),0,15);//generate random Key
echo base64_encode($code);
$codeb=base64_encode($code);
  $keyb=base64_encode($email);
  $tmimer=base64_encode(strtotime("+15 minutes"));
$subject="Activate your WhiteBox Account";
$message="<p>Dear $first_name $last_name,</p><p>Welcome to the Huduma WhiteBox Platform! To Activate your account please  please Click here: <a href='www.whitebox.go.ke/activate_new.php?code=$codeb & key=$keyb' & Qr=$tmimer>www.whitebox.go.ke/activate.php?code=$codeb</a> or use this code:$code</p> <p>Regards.</p><p>Huduma WhiteBox</p>";
include("../Huduma_WhiteBox/mails/general.php");
//echo base64_encode("sucess");
}
}else{
	//echo base64_encode("All field required!");
}
?>