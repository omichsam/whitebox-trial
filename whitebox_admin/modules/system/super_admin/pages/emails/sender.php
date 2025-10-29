
<?php

include("../functions/security.php");
$message=base64_decode($_POST['message']);
$mails=base64_decode($_POST['my_id']);
$subject=base64_decode($_POST['subject']);
require 'class.smtp.php';
require 'class.phpmailer.php';
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth =true;
$mail->SMTPSecure='ssl';
$mail->Host ='mail.tumcathcom.com';
$mail->Port= '465';
$mail->isHTML(true);
$mail->Username ='coordinator@tumcathcom.com';
$mail->Password = 'A073955@am';
$mail->SetFrom('coordinator@tumcathcom.com');
$mail->Subject=$subject;
$mail->Body =$message;
$mail->AddAddress($mails);

if($mail->Send()){
    
}else{
   echo "Mailer Error: " . $mail->ErrorInfo;
}

	



?>
