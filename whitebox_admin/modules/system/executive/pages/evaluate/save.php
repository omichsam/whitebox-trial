<?php
session_start();
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";

$userr=base64_decode($_SESSION["username"]);

$user_id=0;
//$salt="A0007799Wagtreeyty";
$user="";
$comments=base64_decode($_POST['coments']);
$new_question=base64_decode($_POST['new_question']);
$field=base64_decode($_POST['field']);
if($userr){
  $user=$userr;
}else{
$user=base64_decode($_POST['user']);
}
$status="executive_comments";
$questions="executive_question";
$get_user=mysqli_query($con,"SELECT * FROM administrators WHERE user_name='$user'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
if($get){

$user_id=$get['Id'];
}else{

}

	$date = time();
	$new_time=$date;
$innovation=base64_decode($_POST['innovation']);
$my_comments=$comments;

$my_question=$new_question;
//$my_innovation=$innovation;
//$status="comments";
//$questions="question";
if($comments && $innovation){
//echo $my_pass;
$checkExist=mysqli_query($con,"SELECT * FROM feedback WHERE Innovation_id='$innovation' and status='$status'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)!=0){
 $update=mysqli_query($con,"UPDATE feedback SET $field='$my_comments' WHERE Innovation_id='$innovation' and status='$status'") or die(mysqli_error($con));
 if($new_question){
$my_question=$new_question;
$checkquestions=mysqli_query($con,"SELECT * FROM feedback WHERE Innovation_id='$innovation' and status='$questions'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkquestions)!=0){

$update=mysqli_query($con,"UPDATE feedback SET $field='$my_question' WHERE Innovation_id='$innovation' and status='$questions'") or die(mysqli_error($con));

 echo "success";
}else{
	$sql=mysqli_query($con,"INSERT INTO feedback VALUE(Null,
											'$user_id',
											'$innovation',
											'',
											'',
											'',
											'',
											'',
											'',
											'',
											'$questions',
											'$new_time')") or die(mysqli_error($con));
	$update=mysqli_query($con,"UPDATE feedback SET $field='$my_question' WHERE Innovation_id='$innovation' and status='$questions'") or die(mysqli_error($con));
echo "success";

}
}else{

$my_question='';
 	
$checkquestions=mysqli_query($con,"SELECT * FROM feedback WHERE Innovation_id='$innovation' and status='$status'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkquestions)!=0){

$update=mysqli_query($con,"UPDATE feedback SET $field='$my_question' WHERE Innovation_id='$innovation' and status='$questions'") or die(mysqli_error($con));

 echo "success";
}else{
echo "success";

}
}

}else{


$sql=mysqli_query($con,"INSERT INTO feedback VALUE(Null,
											'$user_id',
											'$innovation',
											'',
											'',
											'',
											'',
											'',
											'',
											'',
											'$status',
											'$new_time')") or die(mysqli_error($con));
 $update=mysqli_query($con,"UPDATE feedback SET $field='$my_comments' WHERE Innovation_id='$innovation' and status='$status'") or die(mysqli_error($con));
	

 if($new_question){

$checkquestions=mysqli_query($con,"SELECT * FROM feedback WHERE Innovation_id='$innovation' and status='$questions'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkquestions)!=0){

$update=mysqli_query($con,"UPDATE feedback SET $field='$my_question' WHERE Innovation_id='$innovation' and status='$questions'") or die(mysqli_error($con));

 echo "success";
}else{
	$sql=mysqli_query($con,"INSERT INTO feedback VALUE(Null,
											'$user_id',
											'$innovation',
											'',
											'',
											'',
											'',
											'',
											'',
											'',
											'$questions',
											'$new_time')") or die(mysqli_error($con));
	$update=mysqli_query($con,"UPDATE feedback SET $field='$my_question' WHERE Innovation_id='$innovation' and status='$questions'") or die(mysqli_error($con));
echo "success";
}
}else{

$my_question='';
 	
$checkquestions=mysqli_query($con,"SELECT * FROM feedback WHERE Innovation_id='$innovation' and status='$questions'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkquestions)!=0){

$update=mysqli_query($con,"UPDATE feedback SET $field='$my_question' WHERE Innovation_id='$innovation' and status='$questions'") or die(mysqli_error($con));

 echo "success";
}else{
echo "success";

}
}
}

	
}else{


 if($new_question){
$checkquestions=mysqli_query($con,"SELECT * FROM feedback WHERE Innovation_id='$innovation' and status='$questions'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkquestions)!=0){

$update=mysqli_query($con,"UPDATE feedback SET $field='$my_question' WHERE Innovation_id='$innovation' and status='$questions'") or die(mysqli_error($con));

 echo "success";
}else{
$my_question='';
 	
$checkquestions=mysqli_query($con,"SELECT * FROM feedback WHERE Innovation_id='$innovation' and status='$questions'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkquestions)!=0){

$update=mysqli_query($con,"UPDATE feedback SET $field='$my_question' WHERE Innovation_id='$innovation' and status='$questions'") or die(mysqli_error($con));

 echo "success";
}else{
echo "success";

}
}
}else{
echo "Please provide a feedback";	
}










	




}






?>