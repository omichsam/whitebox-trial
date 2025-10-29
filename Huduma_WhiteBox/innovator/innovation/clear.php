<?php
include("../../../base_connect.php");
include("../../../connect.php");

 //session_start();
  $loginuser=base64_decode($_SESSION["username"]);

 //	id
$today=time();
if($loginuser){


$get_user=mysqli_query($con,"SELECT * FROM users WHERE email='$loginuser'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$first_name=$get['first_name'];
$user_id=$get['id'];
$last_name=$get['last_name'];
}

$sqlx="SELECT * FROM innovations_table where user_id='$user_id' and Status='pending'" ;

    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
     $Innovation_Id=$row['Innovation_Id'];
          $status=$row['Status'];
//echo $status;
 }

$delete_innovation=mysqli_query($con,"DELETE FROM innovations_table WHERE Innovation_Id='$Innovation_Id'") or die(mysqli_error($con));
$delete_patners=mysqli_query($con,"DELETE FROM innovators_partners WHERE Innovation_Id='$Innovation_Id'") or die(mysqli_error($con));
$delete_expectations=mysqli_query($con,"DELETE FROM innovation_expectation WHERE Innovation_Id='$Innovation_Id'") or die(mysqli_error($con));


echo base64_encode("success");


?>