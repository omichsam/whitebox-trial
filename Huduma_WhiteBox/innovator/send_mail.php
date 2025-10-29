<?php
include("../../connect.php");
$loginuser=base64_decode($_POST['my_id']);
$email=$loginuser;
$get_user=mysqli_query($con,"SELECT * FROM users WHERE email='$loginuser'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$first_name=$get['first_name'];
 $last_name=$get['last_name'];
 $user_id=$get['id'];
$date = time();
  $new_time=$date;
 $subject="Innovation Submission Notification";
 $message="<p>Dear ".$first_name." ".$last_name.",</p><p>Your have successfully submitted an innovation to the whitebox portal, Our whitebox team will evaluate it and give feedback to you, Thank you.<p>Regards,</p><p>Huduma WhiteBox</p>";

include "../mails/general.php"; 

$addVist=mysqli_query($con,"INSERT INTO notifications VALUES(null,
                      '$user_id',
                      'WhiteBox',
                      'Innovation Submission Notification',
                      '$message',
                      'WhiteBox',
                      'new',
                      '$new_time')") or die(mysqli_error($con));

       
?>