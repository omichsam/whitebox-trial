<?php
include "../../../../../connect.php";
$my_user=$_POST['my_id'];
include("../../../../functions/security.php");
//$salt="A0007799Wagtreeyty";

$my_userde=encrypt($my_user, $key);

$role_interest=$_POST['role_interest'];
$interested=$_POST['interested'];
$contact=$_POST['phone'];
$first_names=$_POST['first_name'];
$company=$_POST['company'];
$location=$_POST['location'];

$new_interest=encrypt($interested,$key);
$newrole_interest=encrypt($role_interest,$key);
$phone=encrypt($_POST['phone'],$key);
$first_name=encrypt($_POST['first_name'],$key);
$company=encrypt($_POST['company'],$key);
$location=encrypt($_POST['location'],$key);




if($contact && $company && $location && $first_names && $interested){

   	 $update=mysql_query("UPDATE investors SET Name='$first_name',role='$newrole_interest', interest='$new_interest', Company='$company', Location='$location', Contact='$phone' WHERE Email='$my_userde'") or die(mysql_error());
	   	 echo "successfull";

	   	
}else{
	echo "All values required!";
}

?>