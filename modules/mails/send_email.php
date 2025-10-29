
<?php

include("../../connect.php");
include("../functions/security.php");


	$phone=base64_decode($_POST['phone']);
	$message=base64_decode($_POST['message']);
	$name=base64_decode($_POST['name']);
$mails=base64_decode($_POST['email']);
//$new_mails=encrypt($_POST['mmuser'],$key);
	//$chars ="1234567890";
//$chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz";
		//$code=substr(str_shuffle($chars),0,10);//generate random Key
 		 
	//$code=substr(str_shuffle($chars),0,6);//generate random Key
		//$new_code=encrypt($code,$key);
      //$my_code=base64_encode($code);
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
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth =false;
$mail->SMTPSecure='tls';
$mail->Host ='smtp.gmail.com';
$mail->Port= '587';
$mail->isHTML(true);
$mail->Username ='whitebox@ict.go.ke';
$mail->Password = 'fhsqahlqjswdcfqu';
$mail->SetFrom($email, $name);
$mail->Subject='Website message';
$mail->Body =$message;
$mail->AddAddress('whitebox@ict.go.ke');

if($mail->Send()){
    echo "Success";
    
}else{
   echo "Mailer Error: " . $mail->ErrorInfo;
}

	



?>
