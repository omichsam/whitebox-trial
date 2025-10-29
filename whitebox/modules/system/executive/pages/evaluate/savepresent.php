<?php
session_start();
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
//$my_time=$_POST['my_time'];
$innovation=base64_decode($_POST['innovation']);

$startdata=base64_decode($_POST['startdata']);

$userr=base64_decode($_SESSION["username"]);
$sqlx="SELECT id FROM events where Innovation_Id='$innovation'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
$event_id=$row['id'];

}

//echo $userr;
//$salt="A0007799Wagtreeyty";
$user="";
if($userr){
  $user=$userr;
}else{
$user=base64_decode($_POST['user']);
}
$sqlx="SELECT * FROM administrators where user_name='$user'";

    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
          $Id=$row['Id'];
    }
    
    $checkExist=mysqli_query($con,"SELECT * FROM pitch WHERE host_id='$Id'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)!=0){
    
$update=mysqli_query($con,"UPDATE pitch SET page='$startdata' Where host_id='$Id'") or die(mysqli_error($con));
//  echo "success";
}else{
      $sql=mysqli_query($con,"INSERT INTO pitch VALUE(Null,
                      '$Id',
                      '$startdata',
                      '$event_id')") or die(mysqli_error($con));
  
}

?>