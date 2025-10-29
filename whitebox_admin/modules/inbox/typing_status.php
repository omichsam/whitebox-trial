<?php
/*check typing status*/
include "../../connect.php";
$receiver=$_POST['receiver'];
$me='admin';

$check_exist=mysql_query("SELECT id FROM typing WHERE receiver='$receiver' AND sender='$me'") or die(mysql_error());
if(mysql_num_rows($check_exist)==0){
	$insert=mysql_query("INSERT INTO typing VALUES(NULL,'$me','$receiver','true')") or die(mysql_error());
}else{
	$updateTyping=mysql_query("UPDATE typing SET status='true' WHERE receiver='$receiver' AND sender='$me' ") or die(mysql_error());
}	
?>