<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$user=base64_decode($_POST['user']);
$action=base64_decode($_POST['action']);
$get_user=mysqli_query($con,"SELECT * FROM administrators WHERE user_name='$user'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$host_id=(int)$get['Id'];

$date = time();
  $new_time=$date;
$sqlx="SELECT * FROM notify_tray where host_id='$host_id' and Status='new' and action='$action'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $Innovation_name=$row['Innovation_name'];
  $date_added=$row['date_added'];
   $Innovation_Id=$row['Innovation_Id'];
     $user_id=$row['innovator_id'];

  $update=mysqli_query($con,"UPDATE notify_tray SET Status='done' WHERE Innovation_Id='$Innovation_Id' and host_id='$host_id' and Status='new' and action='$action'") or die(mysqli_error($con));

  $update=mysqli_query($con,"DELETE FROM innovations_table WHERE Innovation_Id='$Innovation_Id'") or die(mysqli_error($con));
   $update=mysqli_query($con,"DELETE FROM innovations_reports WHERE Innovation_Id='$Innovation_Id'") or die(mysqli_error($con));
    $update=mysqli_query($con,"DELETE FROM innovation_expectation WHERE Innovation_id='$Innovation_Id'") or die(mysqli_error($con));
       $update=mysqli_query($con,"DELETE FROM innovation_investors WHERE innovation_id='$Innovation_Id'") or die(mysqli_error($con));
        $update=mysqli_query($con,"DELETE FROM innovation_stamps WHERE innovation_id='$Innovation_Id'") or die(mysqli_error($con));
        $update=mysqli_query($con,"DELETE FROM innovators_partners WHERE Innovation_Id='$Innovation_Id'") or die(mysqli_error($con));
         
}
echo "Innovations Successfully deleted";
?>