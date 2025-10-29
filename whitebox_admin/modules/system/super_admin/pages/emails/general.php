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
$mail->Username ='conference@kippra.or.ke';
$mail->Password = 'Password21';
$mail->SetFrom('conference@kippra.or.ke');
$mail->Subject=$subject;
$mail->Body =$message;
$mail->AddAddress($email);

if($mail->Send()){
    //echo $my_code;
    
}else{
   echo "Mailer Error: " . $mail->ErrorInfo;
}	


?>