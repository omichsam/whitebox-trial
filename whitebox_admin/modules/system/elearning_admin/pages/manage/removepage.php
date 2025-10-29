<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$user=base64_decode($_POST['user']);
$action=base64_decode($_POST['action']);
 //session_start();
$date = time();
	$new_time=$date;
  $innovation=base64_decode($_POST["innovation"]);
$get_user=mysqli_query($con,"SELECT * FROM administrators WHERE user_name='$user'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$host_id=(int)$get['Id'];

$checkExist=mysqli_query($con,"SELECT * FROM notify_tray where Innovation_Id='$innovation' and action='$action' and Status='new'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)!=0){
$delete=mysqli_query($con,"DELETE FROM notify_tray where Innovation_Id='$innovation' and action='$action' and Status='new' and host_id='$host_id'") or die(mysqli_error($con));

echo "success";
  }else{

echo "success";
  }


?>