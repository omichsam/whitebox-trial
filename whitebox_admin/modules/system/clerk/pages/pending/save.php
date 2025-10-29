<?php
session_start();
$user=base64_decode($_SESSION["username"]);

include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";


//$salt="A0007799Wagtreeyty";

$comments=base64_decode($_POST['coments']);
$new_question=base64_decode($_POST['new_question']);
$field=base64_decode($_POST['field']);

$status="evaluate_replys";
$questions="clerks_question";
$get_user=mysqli_query($con,"SELECT Id FROM administrators WHERE user_name='$user'") or die(mysqli_error($con));
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
//$my_innovation=$innovation, $key);
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
	$sql=mysqli_query($con,"INSERT INTO feedback VALUE(null,
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


$sql=mysqli_query($con,"INSERT INTO feedback VALUE(null,
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
$sql=mysqli_query($con,"INSERT INTO feedback VALUE(null,
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
echo "feedback field required!";	
}



}

//}else{

//}




?>