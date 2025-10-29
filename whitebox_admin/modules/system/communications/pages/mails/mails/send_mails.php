<?php
include("../../connect.php");
//include("../functions/security.php");
include "../../plugins/php_functions/security.php";
$new_message=base64_decode($_POST['new_message']);
$new_mail=base64_decode($_POST['new_mail']);
$new_subject=base64_decode($_POST['new_subject']);
$sqlx="SELECT * FROM external_users WHERE  User_id='$new_mail'";

    $query_runx=mysql_query($sqlx) or die($query_runx."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runx)){
    $newFirst_name=base64_decode(decrypt($row['First_name'], $key));
    $newLast_name=base64_decode(decrypt($row['Last_name'],$key)); 
$email=base64_decode(decrypt($row['Email_address'],$key)); 
    }
//echo $newLast_name;
$message='<p>Dear, '.$newFirst_name.' '.$newLast_name.' ,</p><p>'.$new_message.'</p>';
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
$mail->Subject=$new_subject;
$mail->Body =$message;
$mail->AddAddress($email);

if($mail->Send()){
 echo "success";
}else{
    echo "An error occured";
  // echo "Mailer Error: " . $mail->ErrorInfo;
}

	



?>
