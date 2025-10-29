<?php
require 'class.smtp.php';
require 'class.phpmailer.php';
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth =true;
$mail->SMTPSecure='tls';
$mail->Host ='smtp.gmail.com';
$mail->Port= '587';
$mail->isHTML(true);
$mail->Username ='whitebox@ict.go.ke';
$mail->Password = 'fhsqahlqjswdcfqu';
$mail->SetFrom('whitebox@ict.go.ke');
$mail->Subject=$subject;
$mail->Body =$message;
$mail->AddAddress($email);

if($mail->Send()){
    //echo $my_code;
    
}else{
   echo "Mailer Error: " . $mail->ErrorInfo;
}	


?>
