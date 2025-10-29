<?php
include "../../../../../connect.php";
$my_user=$_POST['my_id'];
include("../../../../functions/security.php");
//$salt="A0007799Wagtreeyty";
$date = time();
	$new_time=encrypt($date, $key);
$my_userde=encrypt($my_user, $key);
$aggrement=encrypt(base64_encode("agreed"), $key);
$aggrementstatus=encrypt(base64_encode("new"), $key);
$update=mysql_query("UPDATE investors SET aggrement='$aggrement',agrement_date='$new_time',agrement_status ='$aggrementstatus' WHERE Email='$my_userde'") or die(mysql_error());
	  
	  if($update){
	   echo "success";   
	  }else{
	      echo "An error occured";
	  }

?>