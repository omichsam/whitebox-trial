<?php
 include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$my_user=$_POST['my_id'];
$myrole=$_POST['myrole'];
//$salt="A0007799Wagtreeyty";
$date = time();
	$new_time=encrypt($date, $key);
//$my_userde=encrypt($my_user, $key);
$aggrementstatus=encrypt($myrole, $key);
$update=mysql_query("UPDATE investors SET agrement_status ='$aggrementstatus',Approved_date='$new_time' WHERE Email='$my_user'") or die(mysql_error());
	  
	  if($update){
	   echo "success";   
	  }else{
	      echo "An error occured";
	  }

?>