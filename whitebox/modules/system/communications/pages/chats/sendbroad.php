<?php
include("../../../../../connect.php");

$user=mysqli_real_escape_string($con,$_POST['user']);
$message=mysqli_real_escape_string($con,base64_decode($_POST['message']));
$date_added=time();
 $new_date=$date_added;
$sql=mysqli_query($con,"INSERT INTO chartbot VALUE(null,
											'',
											'$message',
											'admin',
											'communications',
											'callcenter',
											'$user',
											'',
											'general',
											'$new_date')") or die(mysqli_error($con));
											echo base64_encode("Message sent");



?>