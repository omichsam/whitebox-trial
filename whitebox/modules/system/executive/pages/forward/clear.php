<?php
	include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$delete=mysqli_query($con,"DELETE FROM investor_list") or die(mysqli_error($con));

  if($delete){
      echo "success";
  }else{
  }
?>