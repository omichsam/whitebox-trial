<?php

include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
//$my_time=$_POST['my_time'];

$field=base64_decode($_POST['field']);
$role=base64_decode($_POST['role']);
$target=base64_decode($_POST['target']);

$update=mysqli_query($con,"UPDATE presentation SET $field='$role' Where id='$target'") or die(mysqli_error());
if($update){
	echo "success";
}else{
	
}
?>