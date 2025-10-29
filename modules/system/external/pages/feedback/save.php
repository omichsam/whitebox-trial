<?php
include "../../../../../connect.php";
include("../../../../functions/security.php");
$my_replies=base64_encode(encrypt("my_replies",$key));
$innovation=base64_decode($_POST['innovation']);
$newneed_reply=base64_decode($_POST['newneed_reply']);
$newsolution_reply=base64_decode($_POST['newsolution_reply']);
$newimpactd_reply=base64_decode($_POST['newimpactd_reply']);
$newbusinessd_reply=base64_decode($_POST['newbusinessd_reply']);
$newrequirements_reply=base64_decode($_POST['newrequirements_reply']);
$newreasondss_reply=base64_decode($_POST['newreasondss_reply']);
$new_targeted_reply=base64_decode($_POST['new_targeted_reply']);
  $date = time();
  $new_time=encrypt($date, $key);
$need_reply="";
$solution_reply="";
$impactd_reply="";
$businessd_reply="";
$target_reply="";
$requirements_reply="";
$reasoncerep_reply="";
$target="";
$get_user=mysql_query("SELECT user_id FROM innovations_table WHERE Innovation_Id='$innovation'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
$User_id=$get['user_id'];
$neu_userss="user".$User_id;
if($newneed_reply){
$need_reply=encrypt(base64_encode($newneed_reply),$key);
}else{

}
if($newsolution_reply){
$solution_reply=encrypt(base64_encode($newsolution_reply),$key);
}else{

}
if($newimpactd_reply){
$impactd_reply=encrypt(base64_encode($newimpactd_reply),$key);
}else{

}
if($newbusinessd_reply){
$businessd_reply=encrypt(base64_encode($newbusinessd_reply),$key);
}else{

}
if($newrequirements_reply){
$requirements_reply=encrypt(base64_encode($newrequirements_reply),$key);
}else{

}
if($newreasondss_reply){
$reasoncerep_reply=encrypt(base64_encode($newreasondss_reply),$key);
}else{

}
if($new_targeted_reply){
$target_reply=encrypt(base64_encode($new_targeted_reply),$key);
}else{

}


$checkquestions=mysql_query("SELECT * FROM feedback WHERE Innovation_id='$innovation' and status='$my_replies'");

  if(mysql_num_rows($checkquestions)>=1){

$update=mysql_query("UPDATE feedback SET need_feedback='$need_reply',Clerk_id='$neu_userss',solution_feedback='$solution_reply',target_feedback='$target_reply',businessmodel_feedback='$businessd_reply',requirements_feedback='$requirements_reply',reasons_feedback ='$reasoncerep_reply',date_added='$new_time' WHERE Innovation_id='$innovation' and status='$my_replies' ") or die(mysql_error());
echo "success";
}else{
  $sql=mysql_query("INSERT INTO feedback VALUE('',
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
                      '$new_time')") or die(mysql_error());
                      echo "success";
}





?>