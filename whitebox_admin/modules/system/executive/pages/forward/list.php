<?php
	include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$investor=base64_decode($_POST['investor']);
$checkExist=mysqli_query($con,"SELECT * FROM investor_list WHERE investor_id='$investor'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)!=0){
      echo "Already added";
  }else{
      $sql=mysqli_query($con,"INSERT INTO investor_list VALUE(Null,
											'$investor')") or die(mysqli_error($con));
											echo "success";
  }
?>