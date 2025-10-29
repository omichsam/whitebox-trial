<?php
include "../../api/sms/smsGateway.php";
include "../../connect.php";
include "../../plugins/php_functions/general_functions.php";
$sender=mysql_real_escape_string($_POST['sender']);
$receiver=mysql_real_escape_string($_POST['receiver']);
$sender_name=mysql_real_escape_string($_POST['sender_name']);
$messg=mysql_real_escape_string($_POST['message']);

if($sender){
	if($receiver){
		$send=mysql_query("INSERT INTO messages_tbl VALUES(NULL,'$sender_name','$sender','$receiver','$messg','','$DateTime','new')") or die(mysql_error());
		$sender_email="support@bursary.com";
		$receiver_email=get_email('user',''.$receiver.'');
		$receiver_phone=get_phone('user',''.$receiver.'');
		$message=mysql_real_escape_string("MESSAGE FROM $sender_name:   $messg ");
		send_single_sms($receiver_phone, $message);
		send_email($receiver_email,'bursary',$sender_email,'NEW MESSAGE FROM BURSARY ',$message);
		echo "sent" ;

	}else{
		echo "failed:Invalid receipient $receiver";
	}
}else{
	echo "failed: No Sender ";
}
?>