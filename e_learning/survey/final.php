<?php
include("../../connect.php"); 
$my_id=mysqli_real_escape_string($con,base64_decode($_POST['my_id']));
$unit_id=mysqli_real_escape_string($con,base64_decode($_POST['unit_id']));

$role=mysqli_real_escape_string($con,base64_decode($_POST['role']));
$get_elerning=mysqli_query($con,"SELECT * FROM e_learning_users WHERE email='$my_id'") or die(mysqli_error($con));
$geter=mysqli_fetch_assoc($get_elerning);
if($geter){
$users_id=$geter['id'];
$name=mysqli_real_escape_string($con,$geter['first_name']." ".$geter['Last_name']);
$Gender=mysqli_real_escape_string($con,$geter['Gender']);
$phone=mysqli_real_escape_string($con,$geter['phone']);
$email=mysqli_real_escape_string($con,$geter['email']);







}else{
$$users_id="";  
$name="";
$Gender="";
$phone="";
$email="";

}




       $update=mysqli_query($con,"UPDATE  curriculum_exam_area SET test_remarks='completed' WHERE user_id ='$users_id' AND unit_id='$unit_id' AND test_id='$role'") or die(mysqli_error($con));

 $pagec=$unit_id+4;

  $colm='colm_'.$pagec;
  //echo  "this is dynamic".$colm;
  
        $mud="completed ".$Today;
      
 $pages=mysqli_query($con,"SELECT * FROM curriculum_coverage WHERE colm_4='$my_id'") or die(mysqli_error($con));

      if(mysqli_num_rows($pages)>=1){


 
 $update=mysqli_query($con,"UPDATE curriculum_coverage SET $colm='$mud' WHERE colm_4='$my_id'") or die(mysqli_error($con));

}else{
   $addlist=mysqli_query($con,"INSERT INTO curriculum_coverage VALUES(
                          NULL,
                          '$name',
                          '$Gender',
                          '$phone',
                          '$my_id',
                          '',
                          '',
                          '',
                          '',
                          '',
                          '',
                          '',
                          '',
                          '',
                          '',
                          '',
                          '',
                          '',
                          '',
                          '',
                          '')");
    $update=mysqli_query($con,"UPDATE curriculum_coverage SET $colm='$mud' WHERE colm_4='$my_id'") or die(mysqli_error($con));
 }
if($update){
echo "success";
}else{
echo "not success";
}
       

   ?>