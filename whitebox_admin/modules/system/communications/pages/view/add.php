<?php
include("../../../connect.php");
			$fname=$_POST['fname'];
			$lname=$_POST['lname'];
			$idno=$_POST['idno'];
			$phone=$_POST['phone'];
			$location=$_POST['location'];
			$date=date('y-m-d');
if($fname && $lname && $idno && $phone && $location){
$get_account=mysqli_query($con,"SELECT * FROM landloard WHERE fname='$fname' AND lname='$lname' AND phone='$phone'") or die(mysqli_error($con));
	$num=mysqli_num_rows($get_account);
	if($num>=1){
		echo "user with same data exist!";
	}
else{
		$sql=mysqli_query($con,"INSERT INTO landloard VALUE(Null,
			                                      '$fname',
			                                      '$lname',
			                                      '$phone',
			                                      '$idno',
			                                      '$location',
			                                      '$date')") or die(mysqli_error($con));
		
		echo "success";
	}
}else{
	echo "All fields required";
}
?>