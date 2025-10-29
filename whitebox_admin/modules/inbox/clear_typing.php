<?php
/*check typing status*/
include "../../connect.php";
$receiver=$_POST['user_typing'];
$me='admin';
	$updateTyping=mysql_query("UPDATE typing SET status='false' WHERE receiver='$receiver' AND sender='$me' ") or die(mysql_error());
	
?>