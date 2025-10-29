<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
//recieved data from the message form
$date=time();
$new_date=$date;
$innovation=$_POST['innovation'];
$message=base64_decode($_POST['message']);
//geting the innovator account

$sqlxd="SELECT * FROM innovations_table where Innovation_Id='$innovation'";

    $query_runxs=mysqli_query($con,$sqlxd) or die($query_runxs."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxs)){
      $user_id=$row['user_id'];
      
      
    }
//innovator recieved

//geting host 

$get_userd=mysqli_query($con,"SELECT * FROM events WHERE Innovation_Id='$innovation' and status='active'") or die(mysqli_error($con));
$getd=mysqli_fetch_assoc($get_userd);
$host_id=$getd['host_id'];

//now that we have all the required data; we save
      $sql=mysqli_query($con,"INSERT INTO messages VALUE(Null,
											'$innovation',
											'$user_id',
											'host',
											'$host_id',
											'$message',
											'new',
											'$new_date')") or die(mysqli_error($con));
											echo "success";
  //done


?>