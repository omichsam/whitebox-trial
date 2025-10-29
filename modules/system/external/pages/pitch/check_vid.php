<?php
include "../../../../../connect.php";
include("../../../../functions/security.php");
$user_id=$_POST['user_id'];

$sqlxd="SELECT * FROM presentation where user_id='$user_id'";
   //and status='active'
    $query_runxed=mysqli_query($sqlxd) or die($query_runxed."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxed)){
      $cam_user=$row['cam_user'];
    }
    echo $cam_user;
?>