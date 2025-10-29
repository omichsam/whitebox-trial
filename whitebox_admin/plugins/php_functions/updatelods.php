<?php
session_start();
include "../../connect.php";
include "../../plugins/php_functions/security.php";
$user=base64_decode($_POST['user']);
 $date = time();
  $new_time=$date;
$status="offline";

$my_session=$_SESSION["id"];
$time_dd=$NOW;
$new_date=$Today;
$update=mysqli_query($con,"UPDATE administrators SET status='$status', time_out='$new_time' WHERE user_name='$user'") or die(mysql_errori($con));
$update=mysqli_query($con,"UPDATE analytics_logs SET time_out='$time_dd' WHERE session_id='$my_session'") or die(mysqli_error($con));
//echo "success";
// Unset all of the session variables
$_SESSION = array();
 
// Destroy the session.
session_destroy();

?>