<?php
//use phpmailer\phpmailer;
/*
$select_reciever=$_POST['select_reciever'];
  $copy_email=$_POST['copy_email'];
  $message_box=$_POST['message_box'];
  $reciever=$_POST['reciever'];
  $attachment=$_POST['attachment'];
  $subject=$_POST['subject'];
*/


//Server settings
require 'SMTP.php';
require 'Exception.php';
require 'PHPMailerAutoload.php';
$mail = new PHPMailer; //$mail->SMTPDebug = 3;      // Enable verbose debug output
$mail->isSMTP();     // Set mailer to use SMTP
$mail->Host = 'pid101.truehost.co.ke';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;   // Enable SMTP authentication
$mail->Username = "info@tumcathcom.com";     // SMTP username
$mail->Password = "A073955@am";              // SMTP password
$mail->SMTPSecure = 'tls';        // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;      // TCP port to connect to or 25 for non secure
$mail->setFrom('info@tumcathcom.com', 'Tum');
$mail->addAddress('allanmboti@gmail.com', 'allan');     // Add a recipient
//$mail->addAddress(‘ellen@example.com’);               // Name is optional
//$mail->addReplyTo(‘info@example.com’, ‘Information’);
//$mail->addCC(‘cc@example.com’);
//$mail->addBCC(‘bcc@example.com’);
//$mail->addAttachment(‘/var/tmp/file.tar.gz’);         // Add attachments
//$mail->addAttachment(‘/tmp/image.jpg’, ‘new.jpg’);    // Optional name
$mail->isHTML(true);            // Set email format to HTML
$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
if(!$mail->send()) {    echo 'Message could not be sent.';    echo 'Mailer Error: ' .
$mail->ErrorInfo;} else {    echo 'Message has been sent';}
