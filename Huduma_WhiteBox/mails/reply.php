<?php

require 'class.smtp.php';
require 'class.phpmailer.php';
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth =true;
$mail->SMTPSecure='TLS';
$mail->Host ='smtp.office365.com';
$mail->Port= '587';
$mail->isHTML(true);
$mail->Username ='amboti@kippra.or.ke';
$mail->Password = 'A073955@am';
$mail->SetFrom($email);
$mail->Subject=$subject;
$mail->Body =$message;
$mail->AddAddress('virtualresponse@kippra.or.ke');
$mail->AddCC('amboti@kippra.or.ke');
if($mail->Send()){
    //echo $my_code;
    
}else{
   echo "Mailer Error: " . $mail->ErrorInfo;
}	
?>