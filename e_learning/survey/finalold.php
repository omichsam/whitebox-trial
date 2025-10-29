<?php
include("../../connect.php"); 
$my_id=mysqli_real_escape_string($con,base64_decode($_POST['my_id']));
$unit_id=mysqli_real_escape_string($con,base64_decode($_POST['unit_id']));

$role=mysqli_real_escape_string($con,base64_decode($_POST['role']));
$get_elerning=mysqli_query($con,"SELECT * FROM e_learning_users WHERE email='$my_id'") or die(mysqli_error($con));
$geter=mysqli_fetch_assoc($get_elerning);
if($geter){
$users_id=$geter['id'];
}else{
$$users_id="";    
}




       $update=mysqli_query($con,"UPDATE  curriculum_exam_area SET test_remarks='completed' WHERE user_id ='$users_id' AND unit_id='$unit_id' AND test_id='$role'") or die(mysqli_error($con));
       echo "success";

   ?>