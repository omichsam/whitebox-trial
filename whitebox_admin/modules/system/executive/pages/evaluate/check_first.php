<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";

$innovation=base64_decode($_POST['innovation']);
$field=base64_decode($_POST['field']);
$get_user=mysqli_query($con,"SELECT $field FROM feedback WHERE Innovation_id='$innovation'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$feedback=$get[$field];
if($feedback){
echo "exist";
}else{
	echo "empty";
}






?>