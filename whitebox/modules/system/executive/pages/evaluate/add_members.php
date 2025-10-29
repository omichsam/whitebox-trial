<?php
session_start();
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";

/*
$userrr=base64_decode($_SESSION["username"]);
if($userrr){
    $user=$userrr;
}else{
$user=base64_decode($_POST['user'];
}


$get_user=mysqli_query($con,"SELECT Id FROM administrators WHERE user_name='$user'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$host_Id=$get['Id'];
if($host_Id){

}else{
  */
  $host_Id=base64_decode($_POST['host_Id']);


  $date = time();
  $new_time=date('Y-m-d');


//$salt="A0007799Wagtreeyty";
$innovation=base64_decode($_POST['innovation']);
$executive_no=base64_decode($_POST['executive_no']);
$account_type=base64_decode($_POST['account_type']);
//$host_Id=base64_decode($_POST['host_Id']);
//echo $host_Id;
//$delete_innovation=mysqli_query($con,"DELETE FROM presentation") or die(mysqli_error($con));
//$delete_innovation=mysqli_query($con,"DELETE FROM events") or die(mysqli_error($con));
//$delete_innovation=mysqli_query($con,"DELETE FROM pitch") or die(mysqli_error($con));
$checkinnovation=mysqli_query($con,"SELECT user_id FROM presentation WHERE user_id='$executive_no'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkinnovation)>=1){
      
  }else{

$checkExist=mysqli_query($con,"SELECT user_id FROM presentation WHERE user_id='$executive_no'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)>=1){

 

}else{


$checkExisted=mysqli_query($con,"SELECT id FROM events where Innovation_Id='$innovation'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExisted)>=1){
   
$sqlx="SELECT id FROM events where Innovation_Id='$innovation'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
$event_id=$row['id'];

}

 $query=mysqli_query($con,"INSERT INTO presentation
           VALUES (Null,
                   '$event_id',
                   '$executive_no',
                   '$account_type',
                    'inactive',
                    'off',
                    'off',
                    'off',
                    'off')") or die(mysqli_error($con));
  $query=mysqli_query($con,"INSERT INTO presentation
                       VALUES (Null,
                   '$event_id',
                   '$host_Id',
                   'moderator',
                    'inactive',
                    'off',
                    'off',
                    'off',
                    'off')") or die(mysqli_error($con));


}else{
$query=mysqli_query($con,"INSERT INTO events
           VALUES (Null,
                   '$innovation',
                   '$host_Id',
                   '',
                   '',
                   '',
                   '$new_time')") or die(mysqli_error($con));
$sqlx="SELECT id FROM events where Innovation_Id='$innovation'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
$event_id=$row['id'];

}

 $query=mysqli_query($con,"INSERT INTO presentation
         VALUES (Null,
                   '$event_id',
                   '$executive_no',
                   '$account_type',
                    'inactive',
                    'off',
                    'off',
                    'off',
                    'off')") or die(mysqli_error($con)); 
    $query=mysqli_query($con,"INSERT INTO presentation
                       VALUES (Null,
                   '$event_id',
                   '$host_Id',
                   'moderator',
                    'inactive',
                    'off',
                    'off',
                    'off',
                    'off')") or die(mysqli_error($con));


}




  }
}

?>