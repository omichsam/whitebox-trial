 <?php
 session_start();
include("connect.php");
$d = explode('Physical Address. . . . . . . . .',shell_exec ("ipconfig/all"));  
$d1 = explode(':',$d[1]);  
$d2 = explode(' ',$d1[1]); 


$IP = $_SERVER['REMOTE_ADDR']; 
$mac="";
$updet=mysqli_query($con,"ALTER TABLE `analytics` CHANGE `date_visited` `date_visited` TEXT NOT NULL"); 
@$device_type=$_POST[''];
@$page=$_POST['page'];
@$ScrW=$_POST['ScrW'];
@$ScrH=$_POST['ScrH'];
@$device=$_POST['device'];
@$device_type=$_POST['device_type'];

@$public_ip=$IP;
//@$public_ip="208.98.23.7";  
@$country=$mack;

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
	
$chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz@!#$%&";
$code=substr(str_shuffle($chars),0,15);//generate random Key
 if (isset($_SESSION["id"])){

 }else{
 	
//$_SESSION["username"] = $code;
 }
//echo $d;
   $addVist=mysqli_query($con,"INSERT INTO analytics VALUES(Null,
												  '$code',
												  '$code',
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
												  '$status',
												  'Kenya')") or die(mysqli_error($con));

			 // echo $New_Visit_key;
	
?>