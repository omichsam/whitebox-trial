<?php
include("../connect.php");
$email=mysqli_real_escape_string($con,$_POST['remail']);

$cheinnovations=mysqli_query($con,"SELECT * FROM e_learning_users WHERE email='$email'") or die(mysqli_error($con));

  if(mysqli_num_rows($cheinnovations)>0){



    $keyb=base64_encode($email);

$get_user=mysqli_query($con,"SELECT * FROM e_learning_users WHERE email='$email'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$first_name=$get['first_name'];
 $last_name=$get['Last_name '];

$chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz@!#$%&";
$code=substr(str_shuffle($chars),0,15);//generate random Key
echo base64_encode($code);
$codeb=base64_encode($code);
$subject="Reset Account Password";
$message="<p>Hello!!</p><p>$first_name $last_name</p><p>Someone has requested a link to change your password. To proceed, Click here: <a href='www.whitebox.go.ke/recover.php?code=$codeb & key=$keyb'>www.whitebox.go.ke/recover.php?code=$codeb</a> or use this code:$code </p><p>If you didn't request this, please ignore this email. Your password won't change until you access the link above and create a new one.</p><p>Regards.</p><p>Huduma WhiteBox</p> ";
include("../Huduma_WhiteBox/mails/general.php");

}else{


$cheinnovations=mysqli_query($con,"SELECT * FROM users WHERE email='$email'") or die(mysqli_error($con));

  if(mysqli_num_rows($cheinnovations)>0){



    $keyb=base64_encode($email);

$get_user=mysqli_query($con,"SELECT * FROM users WHERE email='$email'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$first_name=$get['first_name'];
 $last_name=$get['last_name'];

$chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz@!#$%&";
$code=substr(str_shuffle($chars),0,15);//generate random Key
echo base64_encode($code);
$codeb=base64_encode($code);
$subject="Reset Account Password";
$message="<p>Hello!!</p><p>$first_name $last_name</p><p>Someone has requested a link to change your password. To proceed, Click here: <a href='www.whitebox.go.ke/recover.php?code=$codeb & key=$keyb'>www.whitebox.go.ke/recover.php?code=$codeb</a> or use this code:$code </p><p>If you didn't request this, please ignore this email. Your password won't change until you access the link above and create a new one.</p><p>Regards.</p><p>Huduma WhiteBox</p> ";
include("../Huduma_WhiteBox/mails/general.php");

}else{




echo base64_encode("Email does not exist or try to reset your password");

}
}
?>