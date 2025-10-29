<?php
include"../../../../connect.php";


$description=mysqli_real_escape_string($con,$_POST['description']);
$department=mysqli_real_escape_string($con,$_POST['depart']);
   $fist_name=mysqli_real_escape_string($con,$_POST['fist_name']);
 $middle_name=mysqli_real_escape_string($con,$_POST['middle_name']);
   $last_name=mysqli_real_escape_string($con,$_POST['last_name']);
     $gender=mysqli_real_escape_string($con,$_POST['gender']);
   $email_address=mysqli_real_escape_string($con,$_POST['email_address']);
   $phonen=mysqli_real_escape_string($con,$_POST['phonen']);
   $national_id=mysqli_real_escape_string($con,$_POST['national_id']);
  $userid=mysqli_real_escape_string($con,$_POST['userid']);
    $counties=mysqli_real_escape_string($con,$_POST['counties']);
  
$get_account=mysqli_query($con,"SELECT * FROM visitors WHERE fname='$fist_name' AND mname='$middle_name' AND lname='$last_name' OR national_id='$national_id'") or die(mysqli_error($con));
	$num=mysqli_num_rows($get_account);
	if($num>=1){
		
$sql=mysqli_query($con,"INSERT INTO visitors_visits VALUE(Null,
											'$national_id',
											'$counties',
											'$department',
											'$description',
											'$userid',
											'$DateTime',
											'new')") or die(mysqli_error($con));

	
echo "success";
}else{
$sql=mysqli_query($con,"INSERT INTO visitors VALUE(Null,
											'$national_id',
											'$fist_name',
											'$middle_name',
											'$last_name',
											'$phonen',
											'$email_address',
											'$gender',
											'$DateTime')") or die(mysqli_error($con));

$sql=mysqli_query($con,"INSERT INTO visitors_visits VALUE(Null,
											'$national_id',
											'$counties',
											'$department',
											'$description',
											'$userid',
											'$DateTime',
											'new')") or die(mysqli_error($con));

	
echo "success";
}