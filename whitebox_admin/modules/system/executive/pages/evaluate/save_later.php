<?php

include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
//$my_time=$_POST['my_time'];
$date = time();
$innovation=$_POST['innovation'];
$start_dated=$_POST['start_dated'];
$start_time=$_POST['start_time'];
$new_time=strtotime($start_dated." ".$start_time);
$my_date=Date('Y-m-d');
$update=mysqli_query($con,"UPDATE events SET planned_date='$new_time',planned_time='$new_time',date_added='$my_date', status='inactive' where Innovation_Id='$innovation'") or die(mysqli_error($con));
if($update){
	echo "success";
}else{
	
}
?>