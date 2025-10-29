<?php
include "../../../../../connect.php";
$notification=base64_decode($_POST['notificationid']);
$my_user=base64_decode($_POST['my_id']);


$get_user=mysqli_query($con,"SELECT id FROM e_learning_users WHERE email='$my_user'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$User_id=$get['id'];

$checkExist=mysqli_query($con,"SELECT * FROM chat_reads WHERE message_id='$notification' and user_id='$User_id'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)>=1){

  	$readtimes = mysqli_query($con,"SELECT * FROM chat_reads WHERE message_id='$notification' and user_id='$User_id'");
$allreadtimes = mysqli_num_rows($readtimes);
$newreadtimes=$allreadtimes+1;

 $update=mysqli_query($con,"UPDATE chat_reads SET read_times='$newreadtimes' WHERE message_id='$notification' and user_id='$User_id'") or die(mysqli_error($con));

    }else{



  $sql=mysqli_query($con,"INSERT INTO chat_reads VALUE(null,
											'$notification',
											'$User_id',
											'broadcast',
											'read',
											'1',
											'$Today')") or die(mysqli_error($con));
}
?>