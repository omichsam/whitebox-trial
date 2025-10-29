
<?php

include("../../connect.php");
include("../functions/security.php");
$mails=base64_decode($_POST['mmuser']);
$new_mails=encrypt($_POST['mmuser'],$key);
	$chars ="1234567890";

	$code=substr(str_shuffle($chars),0,6);//generate random Key
		$new_code=encrypt($code,$key);

			//$new_code=$code;
 //$update=mysql_query("UPDATE external_users SET user_key='$new_code' WHERE Email_address='$new_mails'") or die(mysql_error());
	   	 //echo "successfull";


	



//Remember to install postfix in linux before using
/*
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
*/
require 'class.smtp.php';
require 'class.phpmailer.php';
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth =false;
$mail->SMTPSecure='ssl';
$mail->Host ='mail.tumcathcom.com';
$mail->Port= '465';
$mail->isHTML(true);
$mail->Username ='info@tumcathcom.com';
$mail->Password = 'A073955@am';
$mail->SetFrom('info@tumcathcom.com');
$mail->Subject='Verification code';
$mail->Body ='Your account verification code is: '.$code;
$mail->AddAddress($mails);

if($mail->Send()){
    echo "success";
}else{
   echo "Mailer Error: " . $mail->ErrorInfo;
}

	



?>
<script type="text/javascript">
	
	$(document).ready(function(){

		var my_key='<?php echo $new_code ?>';
		$("#user_id").val(my_key);
	})
</script>

