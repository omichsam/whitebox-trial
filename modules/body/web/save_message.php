<?php
include "../../../connect.php";
include("../../functions/security.php");
$chart_email=$_POST['my_id'];
 $date_added=time();
 $new_date=$date_added;
 $message=base64_decode($_POST['message']);
//echo $my_user."allan";
$get_user=mysqli_query($con,"SELECT * FROM chat_users WHERE email='$chart_email' and status='active'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$chart_id=$get['id'];
$fname=$get['fname'];
$herihub_host=$get['herihub_host'];
$County_id="";
//echo $User_id;
$get_userp=mysqli_query($con,"SELECT * FROM external_users WHERE Email_address='$chart_email'") or die(mysqli_error($con));
$getr=mysqli_fetch_assoc($get_userp);
if($getr){
$County_id=$getr['County_id'];
}else{

}
//if($chart_id && $fname){

$checkExist=mysqli_query($con,"SELECT * FROM chartbot WHERE chat_id='$chart_id' and chat_type='callcenter'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)>=1){
 $sql=mysqli_query($con,"INSERT INTO chartbot VALUE(null,
											'$chart_id',
											'$message',
											'user',
											'$fname',
											'callcenter',
											'',
											'$County_id',
											'',
											'$new_date')") or die(mysqli_error($con));
											echo "callcenter";
    }else{
      $sql=mysqli_query($con,"INSERT INTO chartbot VALUE(null,
											'$chart_id',
											'$message',
											'user',
											'$fname',
											'system',
											'',
											'$County_id',
											'',
											'$new_date')") or die(mysqli_error($con));
											echo "system";
  }

//}else{
  //  echo "An error occured";
////}
?>