<?php 
$role=base64_decode($_POST['role']);
include "../../../../../connect.php";
	 $activate=mysqli_query($con,"UPDATE curriculum_units SET status='offline' Where id='$role'") or die(mysqli_error($con));
echo base64_encode("success");
?>