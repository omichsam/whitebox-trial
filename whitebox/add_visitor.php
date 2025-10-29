<?php
include("connect.php");
@$device_type=$_POST[''];
@$page=$_POST['page'];
@$ScrW=$_POST['ScrW'];
@$ScrH=$_POST['ScrH'];
@$device=$_POST['device'];
@$device_type=$_POST['device_type'];
@$country=$_POST['country'];
@$public_ip=$_POST['public_ip'];
@$browser=$_POST['browser'];
@$user_session_id=$_POST['user_session_id'];
@$user_email=$_POST['user_email'];

 

	if ($user_session_id==""){
		$chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz";
		$New_Visit_key=substr(str_shuffle($chars),0,10);//generate random Key
 		 
		$status='New';
	}else{
		$New_Visit_key=$user_session_id;
		$status='repeat';
	}
   $addVist=mysqli_query($con,"INSERT INTO analytics VALUES(
												  NULL,
												  '$New_Visit_key',
												  '$country',
												  '$public_ip',
												  '$device',
												  '$device_type',
												  '$ScrW',
												  '$ScrH',
												  '$browser',
												  '$DateTime',
 												  '$page',
												  '$user_email',
												  '$status',
												  'new',
												  'Kenya'

												  )");

			  echo $New_Visit_key;
	
?>