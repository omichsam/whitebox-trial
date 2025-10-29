<?php
require 'class.smtp.php';
require 'class.phpmailer.php';
$mail = new PHPMailer();
$mail->isSMTP();
$mail->isHTML(true);
$mail->SMTPAuth =true;
$mail->Host='smtp.gmail.com';
$mail->Port=587;
$mail->SMTPAuth=true;
$mail->SMTPSecure='tls';
$mail->Username='whitebox@ict.go.ke';
$mail->Password='nicsmwwallyodxjr';
//$mail->Password='nics mwwa llyo dxjr';//spacced;
$mail->setFrom('whitebox@ict.go.ke');
//$mail->addAddress('');

$mail->AddReplyTo('whitebox@ict.go.ke');

$mail->Subject=$subject;
$mail->Body =$message;
$mail->AddAddress($email);

if($mail->Send()){
    //echo $my_code;
    
}else{
   echo "Mailer Error: " . $mail->ErrorInfo;
}	


?>