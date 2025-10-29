<?php
include "../../../../../connect.php";
$form_data=mysqli_real_escape_string($con,base64_decode($_POST['form_data']));
$role=base64_decode($_POST['role']);
 $activate=mysqli_query($con,"UPDATE curriculum_units_details SET unit_description='$form_data' Where id='$role'") or die(mysqli_error($con));
echo "Information Updated successfully";
 
 

?>