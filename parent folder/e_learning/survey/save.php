<?php
include("../../connect.php");
$my_id=mysqli_real_escape_string($con,base64_decode($_POST['my_id']));
$unit_id=mysqli_real_escape_string($con,base64_decode($_POST['unit_id']));
$question_id=mysqli_real_escape_string($con,base64_decode($_POST['question_id']));
$role=mysqli_real_escape_string($con,base64_decode($_POST['role']));
$answer=mysqli_real_escape_string($con,base64_decode($_POST['answer']));

$get_elerning=mysqli_query($con,"SELECT * FROM e_learning_users WHERE email='$my_id'") or die(mysqli_error($con));
$geter=mysqli_fetch_assoc($get_elerning);
if($geter){
$users_id=$geter['id'];
}else{
$$users_id="";    
}

 $get_account=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE user_id ='$users_id' AND unit_id='$unit_id' AND test_id='$role' AND question_id='$question_id'") or die(mysqli_error($con));
	$num=mysqli_num_rows($get_account);
	if($num>=1){

		$update=mysqli_query($con,"UPDATE curriculum_exam_area SET answer_id='$answer' WHERE user_id ='$users_id' AND unit_id='$unit_id' AND test_id='$role' AND question_id='$question_id'") or die(mysqli_error($con));

echo "success";

	}else{
	
		
$sql=mysqli_query($con,"INSERT INTO curriculum_exam_area VALUE(Null,
	                                        '$unit_id',
											'$role',
											'$users_id',
											'$question_id',
											'$answer',
											'',
								            '$Today')") or die(mysqli_error($con));
echo "success";
}



?>