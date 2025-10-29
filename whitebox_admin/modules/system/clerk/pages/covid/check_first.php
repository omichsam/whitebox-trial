<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";

$questions="question";
$innovation=base64_decode($_POST['innovation']);
$field=base64_decode($_POST['field']);
$get_user=mysqli_query($con,"SELECT $field FROM covid_feedback WHERE Innovation_id='$innovation' and status='questions'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$feedback=$get[$field];
if($feedback){
echo "exist";
}else{
	echo "empty";
}






?>