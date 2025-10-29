<?php
require 'class.smtp.php';
require 'class.phpmailer.php';
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth =true;
$mail->SMTPSecure='ssl';
$mail->Host ='mail.tumcathcom.com';
$mail->Port= '465';
$mail->isHTML(true);
$mail->Username ='ruth@tumcathcom.com';
$mail->Password = 'A073955@am';
$mail->SetFrom('ruth@tumcathcom.com');
$mail->Subject=$subject;
$mail->Body =$message;
$mail->AddAddress($mails);

if($mail->Send()){
    echo $mails."message sent";
    
}else{
   echo "Mailer Error: " . $mail->ErrorInfo;
}	


?>