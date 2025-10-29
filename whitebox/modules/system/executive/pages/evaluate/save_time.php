<?php

include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
//$my_time=$_POST['my_time'];
$date = time();
$innovation=$_POST['innovation'];
$my_date=Date('Y-m-d');
$update=mysqli_query($con,"UPDATE events SET planned_date='$date',planned_time='$date',date_added='$my_date', status='active' where Innovation_Id='$innovation'") or die(mysqli_error($con));
$get_userd=mysqli_query($con,"SELECT * FROM events WHERE Innovation_Id='$innovation'") or die(mysqli_error($con));
$getd=mysqli_fetch_assoc($get_userd);
$host_id=$getd['host_id'];
$event_id=$getd['id'];
$update=mysqli_query($con,"UPDATE pitch SET event_id='$event_id' where host_id='$host_id'") or die(mysqli_error($con));
if($update){
	echo "success";
}else{
	
}
?>