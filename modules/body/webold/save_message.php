<?php
include "../../../connect.php";
include("../../functions/security.php");
$chart_email=$_POST['my_id'];
 $date_added=time();
 $new_date=encrypt($date_added,$key);
 $message=encrypt($_POST['message'],$key);
//echo $my_user."allan";
$get_user=mysqli_query($con,"SELECT * FROM chat_users WHERE email='$chart_email' and status='active'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$chart_id=$get['id'];
$fname=$get['fname'];
$herihub_host=$get['herihub_host'];
//echo $User_id;

//if($chart_id && $fname){
      $sql=mysqli_query($con,"INSERT INTO chartbot VALUE('',
											'$chart_id',
											'$message',
											'user',
											'$fname',
											'$new_date')") or die(mysqli_error($con));
											echo "success";
  

//}else{
  //  echo "An error occured";
////}
?>