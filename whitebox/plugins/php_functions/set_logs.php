<?php
session_start();
include "../../connect.php";
include "../../plugins/php_functions/security.php";
$user=base64_decode($_POST['user']);
 $date = time();
  $new_time=$date;
$my_session=$_SESSION["id"];

$time_dd=$NOW;
$new_date=$Today;
$status="online";
$sqlx="SELECT Id FROM e_learning_admin WHERE user_name='$user'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    	$my_id=$row['Id'];
    	}
$update=mysqli_query($con,"UPDATE e_learning_admin SET status='$status', time_in='$new_time' WHERE user_name='$user'") or die(mysqli_error($con));
 $addVist=mysqli_query($con,"INSERT INTO analytics_elearnes_admin VALUES(NULL,
 	                                              '$my_id',
 												  '$my_session',
												  '$time_dd',
												  '',
												  '$new_date')");



?>