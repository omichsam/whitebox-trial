<?php


include("../../../../connect.php");
  $text_reaason=mysqli_real_escape_string($con,base64_decode($_POST['text_reaason']));
  $reg_no=mysqli_real_escape_string($con,base64_decode($_POST['reg_no']));
  $user=mysqli_real_escape_string($con,base64_decode($_POST['user']));
  //echo $user;

$get_user=mysqli_query($con,"SELECT * FROM users WHERE email='$user'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
if($get){

$userid=$get['id'];

}else{

$userid="";
}


$get_account=mysqli_query($con,"SELECT * FROM filtered_issues WHERE issue_id ='$reg_no'") or die(mysqli_error($con));
	$num=mysqli_num_rows($get_account);
	if($num>=1){


echo base64_encode("Record already filtered");
	}else{
	


$sql=mysqli_query($con,"INSERT INTO filtered_issues VALUE(Null,
											'$reg_no',
											'$text_reaason',
											'$userid',
											'new',
								            '$Today',
								            '',
								            '')") or die(mysqli_error($con));

	

$update=mysqli_query($con,"UPDATE county_issues SET status='filtered' where id ='$reg_no'") or die(mysqli_error($con));
echo  base64_encode("success");
}
?>