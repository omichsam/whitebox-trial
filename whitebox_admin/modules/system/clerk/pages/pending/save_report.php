<?php
session_start();
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$date = time();
	$new_time=$date;
	$user=base64_decode($_SESSION["username"]);
	if($user){

	}else{
		$user=base64_decode($_POST['user']);
	}
//$salt="A0007799Wagtreeyty";
//decision:decision,innovation:innovation
$report_datadb=base64_decode($_POST['report_datadb']);
//$field=base64_decode($_POST['field']);
//$user=base64_decode($_POST['user']);
$get_user=mysqli_query($con,"SELECT Id FROM administrators WHERE user_name='$user'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$user_id=$get['Id'];
$innovation=base64_decode($_POST['innovation']);
$my_report=$report_datadb;
$status="submission";
if($report_datadb && $innovation){
	$checkExist=mysqli_query($con,"SELECT * FROM innovations_reports WHERE Innovation_Id='$innovation' and clerk_id='$user_id' and status='$status'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)!=0){
 $update=mysqli_query($con,"UPDATE innovations_reports SET Report='$my_report', date_added='$new_time' WHERE Innovation_Id='$innovation' and clerk_id='$user_id' and status='$status'") or die(mysqli_error($con));

  $update=mysqli_query($con,"UPDATE innovation_stamps SET Clerk_id='$user_id', first_evaluation='$new_time' WHERE innovation_id='$innovation'") or die(mysqli_error($con));
 echo "success";
}else{

$sql=mysqli_query($con,"INSERT INTO innovations_reports VALUE(null,
											'$user_id',
											'$innovation',
											'$my_report',
											'$status',
											'$status',
											'$new_time')") or die(mysqli_error($con));

  $update=mysqli_query($con,"UPDATE innovation_stamps SET Clerk_id='$user_id', first_evaluation='$new_time' WHERE innovation_id='$innovation'") or die(mysqli_error($con));
echo "success";

}
	
}else{



}






?>