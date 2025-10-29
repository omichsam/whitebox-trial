
<?php

include("../../connect.php");
include("../functions/security.php");
$mails=base64_decode($_POST['mmuser']);
//$new_mails=encrypt($_POST['mmuser'],$key);
	//$chars ="1234567890";
$chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz";
		$code=substr(str_shuffle($chars),0,10);//generate random Key
 		 
	//$code=substr(str_shuffle($chars),0,6);//generate random Key
		//$new_code=encrypt($code,$key);
      $my_code=base64_encode($code);
			//$new_code=$code;
 //$update=mysql_query("UPDATE external_users SET user_key='$new_code' WHERE Email_address='$new_mails'") or die(mysql_error());
	   	 //echo "successfull";


	



//Remember to install postfix in linux before using
/*
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
*/
require 'class.smtp.php';
require 'class.phpmailer.php';
$subject="kippra virtual responce system account recovery";
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth =true;


$mail->SMTPSecure='TLS';
$mail->Host ='smtp.office365.com';
$mail->Port= '587';
$mail->isHTML(true);
$mail->Username ='virtualresponse@kippra.or.ke';
$mail->Password = 'Project2021';
$mail->SetFrom('virtualresponse@kippra.or.ke');
$mail->Subject=$subject;
$mail->Body =$message;
$mail->AddAddress($email);
$mail->AddCC('amboti@kippra.or.ke');
$mail->Body ='<p>We have received a password reset request for your Innovation portal account.</p><p> Kindly verify account recovery using this code:&nbsp; '.$code.'</p>
<p>Please ignore this email if you did not make the request. Your password will not change until you use the code above and create a new password. </p><p> Kind Regards, Director </p><p>virtual response system</p>'; 

$mail->AddAddress($mails);

if($mail->Send()){
    echo $my_code;
    ?>
  
<?php
}else{
   echo "Mailer Error: " . $mail->ErrorInfo;
}

	



?>
