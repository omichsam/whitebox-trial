<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$innovation=$_POST['innovation'];
$user=base64_decode($_POST['user']);
$date = time();
  $new_time=$date;
$get_user=mysqli_query($con,"SELECT Id FROM administrators WHERE user_name='$user'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$user_id=$get['Id'];
$Status="second_evaluation";
if($innovation){

$checkExist=mysqli_query($con,"SELECT * FROM innovation_stamps WHERE innovation_id='$innovation'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)!=0){
$update=mysqli_query($con,"UPDATE innovation_stamps SET Second_evaluation='$new_time', Executive_id='$user_id' WHERE innovation_id='$innovation'") or die(mysqli_error($con));


}else{
 $query=mysqli_query($con,"INSERT INTO innovation_stamps
           VALUES (null,
                   '$innovation',
                   '',
                   '$user_id',
                   '',
                   '',
                   '$new_time',
                   '',
                   '')") or die(mysqli_error($con));
}


   $update=mysqli_query($con,"UPDATE innovations_table SET Status='$Status' WHERE Innovation_Id='$innovation'") or die(mysqli_error($con));
    

      }else{

      }

   ?>