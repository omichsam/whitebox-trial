<?php
 
//echo $my_user."allan";
include "../../../../../connect.php";
include("../../../../functions/security.php");

include("../../../../../base_connect.php");
// $my_user=$_POST['my_id'];
$innovation=base64_decode($_POST['innovation']);
$message=mysqli_real_escape_string($con,base64_decode($_POST['message']));
 $date_added=time();
 $new_date=$date_added;
//echo $my_user."allan";
//$user=base64_decode($_SESSION["username"]);
$get_user=mysqli_query($con,"SELECT * FROM innovations_table where Innovation_Id='$innovation'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$User_id=$get['user_id'];
//echo $User_id;
    
   // echo $Innovation_Id;
$get_userd=mysqli_query($con,"SELECT * FROM events WHERE Innovation_Id='$innovation' and status='active'") or die(mysqli_error($con));
$getd=mysqli_fetch_assoc($get_userd);
$host_id=$getd['host_id'];


      $sql=mysqli_query($con,"INSERT INTO messages VALUE(Null,
											'$innovation',
											'$User_id',
											'inovator',
											'$host_id',
											'$message',
											'new',
											'$new_date')") or die(mysqli_error($con));
											echo "success";
  


?>