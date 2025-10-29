<?php
include"../../../../connect.php";


$adm_no=$_POST['adm_no'];
//echo "this".$adm_no."no";
$faculty=mysqli_real_escape_string($con,$_POST['faculty']);
//$enrol_as=mysqli_real_escape_string($con,$_POST['enrol_as']);
 $families=mysqli_real_escape_string($con,$_POST['families']);
  $year_study=mysqli_real_escape_string($con,$_POST['year_study']);
 $registartion_no=mysqli_real_escape_string($con,$_POST['registartion_no']);
   $fist_name=mysqli_real_escape_string($con,$_POST['fist_name']);
 $middle_name=mysqli_real_escape_string($con,$_POST['middle_name']);
   $last_name=mysqli_real_escape_string($con,$_POST['last_name']);
    $schools=mysqli_real_escape_string($con,$_POST['schools']);
    $gender=mysqli_real_escape_string($con,$_POST['gender']);
   $email_address=mysqli_real_escape_string($con,$_POST['email_address']);
   $phonen=mysqli_real_escape_string($con,$_POST['phonen']);
   $national_id=mysqli_real_escape_string($con,$_POST['national_id']);
   $courses=mysqli_real_escape_string($con,$_POST['courses']);
   
    
$date = date('Y-m-d');
	$sqldp="SELECT * FROM faculty WHERE name='$faculty'";
		$query_rundp=mysqli_query($con,$sqldp)or die($query_rundp."<br/><br/>".mysqli_error($con));
				while($row=mysqli_fetch_array($query_rundp)){
					$faculty_id=$row['id'];

					}
$sqld="SELECT * FROM courses WHERE course_type='$courses'";
		$query_rund=mysqli_query($con,$sqld)or die($query_rund."<br/><br/>".mysqli_error($con));
				while($row=mysqli_fetch_array($query_rund)){
					$course_id=$row['id'];
					}

//if($registartion_no && $fist_name && $last_name && $schools && $gender && $phonen && $enrol_as && $families && $year_study){
	//echo "allan";

$update=mysqli_query($con,"UPDATE register SET fname='$fist_name',mname='$middle_name',lname='$last_name' WHERE adm_no='$adm_no'") or die(mysqli_error($con));
$updated=mysqli_query($con,"UPDATE register SET gender='$gender',faculty='$faculty_id',course_type='$course_id' WHERE adm_no='$adm_no'") or die(mysqli_error($con));
$updatef=mysqli_query($con,"UPDATE register SET School='$schools',Registration_no='$registartion_no',email='$email_address' WHERE adm_no='$adm_no'") or die(mysqli_error($con));
$updatet=mysqli_query($con,"UPDATE register SET phone='$phonen',national_id='$national_id',study_year='$year_study',family='$families' WHERE adm_no='$adm_no'") or die(mysqli_error($con));
if($update && $updated && $updatef && $updatet){


echo "success";

}else{
    
}

?>