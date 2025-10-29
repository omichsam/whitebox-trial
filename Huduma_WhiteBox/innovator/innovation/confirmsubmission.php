<?php
include("../../../base_connect.php");
include("../../../connect.php");

 //session_start();
  $loginuser=base64_decode($_POST["my_id"]);

 //	id
$today=time();
if($loginuser){




$get_user=mysqli_query($con,"SELECT * FROM users WHERE email='$loginuser'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$first_name=$get['first_name'];
$user_id=$get['id'];
$last_name=$get['last_name'];
}else{

}

$email=$loginuser;
$subject="Innovation submission";
$message="<p>Dear $first_name $last_name,</p><p>Your innovation has been successfully submitted to whitebox, our team will evaluate it and give feedback.</p><p>Thank you</p><p>Regards.</p><p>Huduma WhiteBox</p>";
include("../../../Huduma_WhiteBox/mails/general.php");
//echo $email." ".$subject." ".$message;

?>