<?php
	include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$investor=base64_decode($_POST['investor']);
$delete=mysqli_query($con,"DELETE FROM investor_list WHERE investor_id='$investor'") or die(mysqli_error($con));

  if($delete){
      echo "success";
  }else{
  }
?>