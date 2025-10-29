
<?php
include ".../../connect.php";
include("../functions/security.php");
$message=base64_decode($_POST['message']);
$mails=base64_decode($_POST['my_id']);
$subject=base64_decode($_POST['subject']);
$my_email=encrypt(base64_encode($mails),$key);
    $sqlx="SELECT User_id FROM external_users where Email_address='$my_email'";
    $query_runx=mysql_query($sqlx) or die($query_runx."<br/><br/>".mysql_error());
    while($row=mysql_fetch_array($query_runx)){
     $User_id=$row['User_id'];   
    }
 $sql=mysql_query("INSERT INTO notifications VALUE('',
											'$User_id',
											'innovator',
											'Innovation Submission',
											'$message',
											'Innovation department',
											'new',
											'$new_time')") or die(mysql_error()); 
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
