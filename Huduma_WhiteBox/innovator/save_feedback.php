<?php
include("../../base_connect.php");
include("../../connect.php");
  $loginuser=base64_decode($_SESSION["username"]);

 // id
//$today=time();
if($loginuser){

}else{
  $loginuser=base64_decode($_POST['my_id']);
}
$email=$loginuser;
$get_user=mysqli_query($con,"SELECT * FROM users WHERE email='$loginuser'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$first_name=$get['first_name'];
$user_id=$get['id'];
$last_name=$get['last_name'];



$my_replies="my_replies";
$innovation=mysqli_real_escape_string($con,base64_decode($_POST['innovation']));
$newneed_reply=mysqli_real_escape_string($con,base64_decode($_POST['newneed_reply']));
$newsolution_reply=mysqli_real_escape_string($con,base64_decode($_POST['newsolution_reply']));
$newimpactd_reply=mysqli_real_escape_string($con,base64_decode($_POST['newimpactd_reply']));
$newbusinessd_reply=mysqli_real_escape_string($con,base64_decode($_POST['newbusinessd_reply']));
$newrequirements_reply=mysqli_real_escape_string($con,base64_decode($_POST['newrequirements_reply']));
$newreasondss_reply=mysqli_real_escape_string($con,base64_decode($_POST['newreasondss_reply']));
$new_targeted_reply=mysqli_real_escape_string($con,base64_decode($_POST['new_targeted_reply']));
  $date = time();
  $new_time=$date;
$need_reply="";
$solution_reply="";
$impactd_reply="";
$businessd_reply="";
$target_reply="";
$requirements_reply="";
$reasoncerep_reply="";
$target="";
$get_user=mysqli_query($con,"SELECT user_id FROM innovations_table WHERE Innovation_Id='$innovation'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$User_id=$get['user_id'];
$neu_userss="user".$User_id;
if($newneed_reply){
$need_reply=$newneed_reply;
}else{

}
if($newsolution_reply){
$solution_reply=$newsolution_reply;
}else{

}
if($newimpactd_reply){
$impactd_reply=$newimpactd_reply;
}else{

}
if($newbusinessd_reply){
$businessd_reply=$newbusinessd_reply;
}else{

}
if($newrequirements_reply){
$requirements_reply=$newrequirements_reply;
}else{

}
if($newreasondss_reply){
$reasoncerep_reply=$newreasondss_reply;
}else{

}
if($new_targeted_reply){
$target_reply=$new_targeted_reply;
}else{

}


$checkquestions=mysqli_query($con,"SELECT * FROM feedback WHERE Innovation_id='$innovation' and status='$my_replies'");

  if(mysqli_num_rows($checkquestions)>=1){

$update=mysqli_query($con,"UPDATE feedback SET need_feedback='$need_reply',Clerk_id='$neu_userss',solution_feedback='$solution_reply',target_feedback='$target_reply',businessmodel_feedback='$businessd_reply',requirements_feedback='$requirements_reply',reasons_feedback ='$reasoncerep_reply',date_added='$new_time' WHERE Innovation_id='$innovation' and status='$my_replies' ") or die(mysqli_error($con));
echo "success";
}else{
  $sql=mysqli_query($con,"INSERT INTO feedback VALUE(null,
                      '$neu_userss',
                      '$innovation',
                      '$need_reply',
                      '$solution_reply',
                      '$impactd_reply',
                      '$target_reply',
                      '$businessd_reply',
                      '$requirements_reply',
                      '$reasoncerep_reply',
                      '$my_replies',
                      '$new_time')") or die(mysqli_error($con));
                      echo "success";
}
$date = time();
  $new_time=$date;
 $subject="Responce Submission";
 $message="<p>Dear ".$first_name." ".$last_name.",</p><p>Your responce to the evaluating team has been successfully submited, the team will look into it and get back to you, Thank you.<p>Regards,</p><p>Huduma WhiteBox</p>";

include "../mails/general.php"; 

 $sql=mysqli_query($con,"INSERT INTO notifications VALUE(null,
                      '$user_id',
                      'WhiteBox',
                      'Responce Submission',
                      '$message',
                      'WhiteBox',
                      'new',
                      '$new_time')") or die(mysqli_error($con));




?>