<?php

$useremail = $_POST['user'];
$informations = mysqli_query($con, "SELECT * FROM settings_mailer WHERE status='active'") or die(mysqli_error($con));
$get = mysqli_fetch_assoc($informations);
if ($get) {
   $usernemail = $get['email'];
   $email_sender = $get['email_sender'];
   $reply_to_email = $get['reply_to_email'];
   $bcc_email = $get['bcc_email'];
   $Password = base64_decode($get['Password']);
   $hostb = $get['host_mail'];

   $html_enabled = $get['html_enabled'];
   $Portm = $get['Port_mail'];
   $SMTPSecure = $get['SMTPSecure'];
   $mail_engine = $get['mail_engine'];
} else {
   $email = "";
   $email_sender = "";
   $reply_to_email = "";
   $bcc_email = "";
   $Password = "";
   $hostb = "";

   $html_enabled = "";
   $Port = "";
   $SMTPSecure = "";
   $mail_engine = "";
   $Passwordupdated_by = "";
   $status = "";
   $date_created = "";
   $date_updated = "";
   $dataid = "";
}

require 'class.' . $mail_engine . '.php';
require 'class.phpmailer.php';
$mail = new PHPMailer();
$mail->isSMTP();
$mail->isHTML($html_enabled);
$mail->SMTPAuth = true;
$mail->Host = $hostb;
$mail->Port = $Portm;
$mail->SMTPSecure = $SMTPSecure;


$mail->Username = $usernemail;
$mail->Password = $Password;
$mail->setFrom($email_sender);
$mail->AddReplyTo($reply_to_email);

$mail->Subject = $subject;
$mail->Body = $message;
$mail->AddAddress($email);

if ($mail->Send()) {

} else {
   echo "Mailer Error: " . $mail->ErrorInfo;
}


?>