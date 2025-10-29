<?php 
include "../../../../../connect.php";
$userid=$_POST['usersid'];
$user=base64_decode($_POST['user']);
 $get_partic=mysqli_query($con,"SELECT * FROM e_learning_admin where user_name ='$user'") or die(mysqli_error($con));
  $partic=mysqli_fetch_assoc($get_partic);
  $useradmin= $partic['Id'];
   $checkExist=mysqli_query($con,"SELECT * FROM deleted_content WHERE content_id='$userid'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)!=0){
  	  $activate=mysqli_query($con,"UPDATE  e_learning_users SET status='deleted' WHERE id='$userid'") or die(mysqli_error());
 $activate=mysqli_query($con,"UPDATE  deleted_content  SET status='new' WHERE content_id='$userid'") or die(mysqli_error());
  echo "success";
  }else{

 $activate=mysqli_query($con,"UPDATE  e_learning_users SET status='deleted' WHERE id='$userid'") or die(mysqli_error());

    $addVist=mysqli_query($con,"INSERT INTO deleted_content VALUES(NULL,
                                                  'learner',
                                                  '$userid',
                                                  '$useradmin',
                                                  'deleted from the system',
                                                  '',
                                                  '',
                                                  'new',
                                                  '$DateTime')") or die(mysqli_error($con));
    echo "success";
}

?>