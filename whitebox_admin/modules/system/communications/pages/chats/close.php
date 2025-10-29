<?php
include("../../../../../connect.php");
$chart_id=mysqli_real_escape_string($con,$_POST['chart_id']);

$get_user=mysqli_query($con,"SELECT * FROM chat_users WHERE id='$chart_id'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
//$chart_id=$get['id'];
$email=$get['email'];
$fname=$get['fname'];
$herihub_host=$get['herihub_host'];
$status=$get['status'];
$fname=$get['fname'];
$sname=$get['sname'];
$time_added=$get['time_added'];


$sql=mysqli_query($con,"INSERT INTO  chat_backup VALUE(null,
											'$chart_id',
											'$email',
											'$fname',
											'$sname',
											'$herihub_host',
											'done',
											'$time_added')") or die(mysqli_error($con));



$update=mysqli_query($con,"DELETE FROM chat_users WHERE id='$chart_id'") or die(mysqli_error($con));  
echo "success";
?>