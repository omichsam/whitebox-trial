<?php
include("../connect.php");
$user=base64_decode($_POST["model"]);
$today=date('Y-m-d');
$get_elerning="not_shown";

$sql="SELECT * FROM users WHERE email='$user'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){


$first_name=$row['first_name'];
 $last_name=$row['last_name'];
 $bio=$row['bio'];
 $gender=$row['gender'];
 $dob=$row['dob'];
 $pic=$row['pic'];
 $country=$row['country'];
 $county_id=$row['county_id'];
 $user_state=$row['user_state'];
 $city=$row['city'];
 $address=$row['address'];
 $postal=$row['postal'];
 $provider=$row['provider'];
 $provider_id=$row['provider_id'];
 $county=$row['county'];
 $phone=$row['phone'];
$password=$row['password'];



}
$sql="SELECT * FROM counties WHERE serial_no='$county_id'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
    	$county_name=$row['county_name'];

    }

$cheinnovations=mysqli_query($con,"SELECT * FROM e_learning_users WHERE email='$user'") or die(mysqli_error($con));

  if(mysqli_num_rows($cheinnovations)>0){
echo base64_encode("success");
}else{
$addVist=mysqli_query($con,"INSERT INTO e_learning_users VALUES(NULL,
												  '$first_name',
												  '$last_name',
												  '$gender',
												  '$phone',
												  '$user',
												  '$dob',
												  '$county_name',
												  '',
												   '',
												   '',
												    '',
												    '', 
												    '',
												    '', 
												    '$password',
												    'I agree', 
												    'active',
												    '$today')") or die(mysqli_error($con));
echo base64_encode("success");
}

