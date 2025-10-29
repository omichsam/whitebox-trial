<?php
include("../../base_connect.php");
include("../../connect.php");
$user=base64_decode($_SESSION["username"]);
if($user){

}else{
  $user=base64_decode($_POST["my_id"]);
}
$now_time=time();
$today=date('Y-m-d');
$historypage=base64_decode($_POST['historypage']);
$get_user=mysqli_query($con,"SELECT * FROM users WHERE email='$user'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$user_id=$get['id'];

$checkuser=mysqli_query($con,"SELECT * FROM page_history Where user_id='$user_id' and status='active' and date_added='$today'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkuser)!=0){


$update=mysqli_query($con,"UPDATE page_history set status='oldpage' Where user_id='$user_id' and status='previous' and date_added='$today'");
$update=mysqli_query($con,"UPDATE page_history set status='previous' Where user_id='$user_id' and status='active' and date_added='$today'");

$addVist=mysqli_query($con,"INSERT INTO page_history VALUES(
												  NULL,
												  '$user_id',
												  '$historypage',
												  'active',
												  '$now_time',
												  '$today')") or die(mysqli_error($con));
}else{

$addVist=mysqli_query($con,"INSERT INTO page_history VALUES(
												  NULL,
												  '$user_id',
												  '$historypage',
												  'active',
												  '$now_time',
												  '$today')") or die(mysqli_error($con));
}

?>