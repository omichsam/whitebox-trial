<?php
include "../../../../../connect.php";

$name=mysqli_real_escape_string($con,base64_decode($_POST['modulename']));
$description=mysqli_real_escape_string($con,base64_decode($_POST['description']));

if($name && $description){


$checkExist=mysqli_query($con,"SELECT * FROM curriculum_units WHERE description='$name' and more_information='$description'") or die(mysqli_error($con));
	if(mysqli_num_rows($checkExist)!=0){
    echo base64_encode("Data Exists");

	}else{
$units = mysqli_query($con,"SELECT * FROM curriculum_units");
$allunits = mysqli_num_rows($units);
$allunits=$allunits+1;
$unitsd="MODULE ".$allunits;

$addrecord=mysqli_query($con,"INSERT INTO curriculum_units VALUES(NULL,
																    '$unitsd',
																	'$name',
																	'$description',
																	'None',
																	'$Today')")or die(mysqli_error($con));
		echo base64_encode("success");

	}


}else{
	echo base64_encode("All Fields Required!");
}


?>