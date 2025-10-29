<?php


include("../../../../connect.php");
  $selectdepartment=mysqli_real_escape_string($con,base64_decode($_POST['selectdepartment']));
  $duedate=mysqli_real_escape_string($con,base64_decode($_POST['duedate']));
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

$getp_usero=mysqli_query($con,"SELECT * FROM departments WHERE name='$selectdepartment'") or die(mysqli_error($con));
$getp=mysqli_fetch_assoc($getp_usero);
if($getp){

$departid=$getp['id'];

}else{

$departid="";
}

$get_account=mysqli_query($con,"SELECT * FROM assigned_issues WHERE issue_id ='$reg_no'") or die(mysqli_error($con));
	$num=mysqli_num_rows($get_account);
	if($num>=1){


echo base64_encode("Record already exists");
	}else{
	


$sql=mysqli_query($con,"INSERT INTO assigned_issues VALUE(Null,
											'$reg_no',
											'$departid',
											'new',
											'$userid',
											'$duedate',
								            '$Today')") or die(mysqli_error($con));

	

$update=mysqli_query($con,"UPDATE county_issues SET status='assigned' where id ='$reg_no'") or die(mysqli_error($con));
echo  base64_encode("success");
}
?>