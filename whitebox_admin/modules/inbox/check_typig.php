<?php
/*update typing stattus*/
include "../../connect.php";
$me='admin';
$user_typing=$_POST['user_typing'];

$check_exist=mysql_query("SELECT status FROM typing WHERE receiver='$me' AND sender='$user_typing'") or die(mysql_error());

/*
if(mysql_num_rows($check_exist)==0){
	$insert=mysql_query("INSERT INTO typing VALUES(NULL,'$me','$user_typing','true')") or die(mysql_error());
}else{
	$updateTyping=mysql_query("UPDATE typing SET status='true' WHERE receiver='$user_typing' AND sender='$me' ") or die(mysql_error());
}
*/
$row=mysql_fetch_assoc($check_exist);
$status=$row['status'];
if($status=="true"){
	echo "true";
}else{
	echo "false";
}	
?>