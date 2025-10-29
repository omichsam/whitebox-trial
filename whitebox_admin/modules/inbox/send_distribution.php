<?php
include "../../connect.php";
include "../../api/sms/smsGateway.php";
include "../../plugins/php_functions/general_functions.php";

$option=mysql_real_escape_string($_POST['option']);
$subject=mysql_real_escape_string($_POST['subject']);
$msg=mysql_real_escape_string($_POST['msg']);
$type=mysql_real_escape_string($_POST['type']);

if($option){
  if($subject){ 
  		if($msg){
  				
    			 if($type=="sms"){
    			 	$contactlist=get_contact_list($option,'sms');
  				 	send_groupsms($contactlist,$subject,$msg);
  				 }else  if($type=="email"){
  				 	$contactlist=get_contact_list($option,'email');
  				 	send_groupemail($contactlist,$subject,$msg);
  				 }else{
  				 	$contactlist=get_contact_list($option,'sms');
  				 	$maillist=get_contact_list($option,'email');
  				 	send_group_emails_and_sms($contactlist,$maillist,$subject,$msg);
  				 }
  				 echo "sent";
  		}else{
  			echo "Message required";
  		}
  }else{
  	echo "Subject required";
  }
}else{
	echo "option required";
}
?>