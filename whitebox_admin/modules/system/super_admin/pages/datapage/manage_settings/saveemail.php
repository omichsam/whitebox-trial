<?php
include "../../../../../connect.php";
$emailp=strtolower(mysqli_real_escape_string($con,$_POST['emailp']));
$email_senderp=strtolower(mysqli_real_escape_string($con,$_POST['email_senderp']));
$reply_to_email=strtolower(mysqli_real_escape_string($con,$_POST['reply_to_email']));
$bcc_email=strtolower(mysqli_real_escape_string($con,$_POST['bcc_email']));
$passwordem=base64_encode(mysqli_real_escape_string($con,$_POST['passwordem']));
$html_enabled=mysqli_real_escape_string($con,$_POST['html_enabled']);
$mail_engine=mysqli_real_escape_string($con,$_POST['mail_engine']);
$SMTPSecure=mysqli_real_escape_string($con,$_POST['SMTPSecure']);
$Portb=mysqli_real_escape_string($con,$_POST['Portb']);
$hostb=mysqli_real_escape_string($con,$_POST['hostb']);
$dataid=mysqli_real_escape_string($con,base64_decode($_POST['dataid']));
$useremail=mysqli_real_escape_string($con,base64_decode($_POST['useremail']));

$today=time();
$get_user=mysqli_query($con,"SELECT Id FROM administrators WHERE user_name='$useremail'")or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
if($get){
$user_id=$get['Id'];
}else{
$user_id="";	
}
$update= mysqli_query($con,"UPDATE settings_mailer SET status='done',date_updated='$DateTime' WHERE id='$dataid'")or die(mysqli_error($con));


	$sql=mysqli_query($con,"INSERT INTO settings_mailer VALUE(Null,
											'$emailp',
											'$email_senderp',
											'$reply_to_email',
											'$bcc_email',
											'$passwordem',
											'$hostb',
											'$html_enabled',
											'$Portb',
											'$SMTPSecure',
											'$mail_engine',
											'$user_id',
											'active',
											'$DateTime',
											'$DateTime')") or die(mysqli_error($con));
	echo base64_encode("success");
?>