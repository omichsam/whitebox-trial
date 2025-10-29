<?php
include("../../../../../connect.php");
$chart_id=mysqli_real_escape_string($con,$_POST['chart_id']);
$user=mysqli_real_escape_string($con,base64_decode($_POST['user']));
$message=mysqli_real_escape_string($con,$_POST['callmessege']);
 $date_added=time();
 $new_date=$date_added;
$get_user=mysqli_query($con,"SELECT * FROM chat_users WHERE id='$chart_id'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
//$chart_id=$get['id'];
$email=$get['email'];
$fname=$get['fname'];
$herihub_host=$get['herihub_host'];
$County_id="";
//echo $User_id;
$get_userp=mysqli_query($con,"SELECT * FROM external_users WHERE Email_address='$email'") or die(mysqli_error($con));
$getr=mysqli_fetch_assoc($get_userp);
if($getr){
$County_id=$getr['County_id'];
}else{

}
$get_admin=mysqli_query($con,"SELECT * FROM e_learning_admin WHERE user_name='$user'") or die(mysqli_error($con));
$getadm=mysqli_fetch_assoc($get_admin);
if($getadm){
$faname=$getadm['Name'];
}else{
$faname="a contact person";
}
$sql=mysqli_query($con,"INSERT INTO chartbot VALUE(null,
											'$chart_id',
											'$message',
											'admin',
											'$faname',
											'callcenter',
											'$user',
											'',
											'angaded',
											'$new_date')") or die(mysqli_error($con));
											echo "success";
?>