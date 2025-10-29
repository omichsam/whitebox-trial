<?php
include "../../../../../connect.php";
$subject=mysqli_real_escape_string($con,base64_decode($_POST['nsubject']));
 $email=mysqli_real_escape_string($con,base64_decode($_POST['nemailaddress']));
$message=mysqli_real_escape_string($con,base64_decode($_POST['form_data']));



include "../../../../../modules/mails/gen.php";

$mail->Subject=$subject;
$mail->Body =$message;
$mail->AddAddress($email);

if($mail->Send()){
    echo "success";
}else{
   echo "Your email could not be sent, kindly check the configuration settings and try again!";
}

 
 

?>