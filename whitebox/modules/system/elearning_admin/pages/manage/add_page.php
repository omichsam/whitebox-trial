<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$user=base64_decode($_POST['user']);
$action=base64_decode($_POST['action']);
 //session_start();
$date = time();
	$new_time=$date;
  $innovation=base64_decode($_POST["innovation"]);
$get_user=mysqli_query($con,"SELECT * FROM administrators WHERE user_name='$user'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$host_id=(int)$get['Id'];

$checkExist=mysqli_query($con,"SELECT * FROM notify_tray where Innovation_Id='$innovation' and action='$action' and Status='new'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)!=0){
echo "success";
  }else{
  	$sqlx="SELECT * FROM innovations_table where Innovation_Id='$innovation'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));
    while($row=mysqli_fetch_array($query_runx)){
    $Innovation_name=$row['Innovation_name'];
    $user_id=$row['user_id'];
  $stage=$row['stage'];
}
  		$sql=mysqli_query($con,"INSERT INTO notify_tray VALUE(null,
											'$innovation',
											'$Innovation_name',
											'$action',
											'$user_id',
											'$host_id',
											'new',
											'$new_time')") or die(mysqli_error($con));

echo "success";
  }


?>