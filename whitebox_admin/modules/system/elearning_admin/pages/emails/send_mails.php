<?php
include("../../connect.php");
$new_time=time();
require 'class.smtp.php';
require 'class.phpmailer.php';
$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth =true;


$mail->SMTPSecure='TLS';
$mail->Host ='smtp.office365.com';
$mail->Port= '587';
$mail->isHTML(true);
$mail->Username ='virtualresponse@kippra.or.ke';
$mail->Password = 'Project2021';
$mail->SetFrom('virtualresponse@kippra.or.ke');

$new_message=mysqli_real_escape_string($con,base64_decode($_POST['new_message']));
$new_mail=base64_decode($_POST['new_mail']);
$new_subject=mysqli_real_escape_string($con,base64_decode($_POST['new_subject']));
$eventid=base64_decode($_POST['eventid']);
$user=base64_decode($_POST['user']);

$get_userk=mysqli_query($con,"SELECT * FROM users WHERE email='$user'") or die(mysqli_error($con));
$getk=mysqli_fetch_assoc($get_userk);
$userid=$getk['id'];

$checkquestions=mysqli_query($con,"SELECT * FROM eventstbl WHERE eventsid='$eventid'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkquestions)!=0){

  }else{
$sql=mysqli_query($con,"INSERT INTO eventstbl VALUE(null,
											'$eventid',
											'$userid',
											'',
											'',
											'new',
											'$new_time')") or die(mysqli_error($con));
  }

if($new_mail=="All County Users"){
$sqlx="SELECT * FROM external_users";
$query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
   
    $user_id=$row['User_id'];
    $email=$row['Email_address'];
   $mail->AddAddress($email);
    $checkquestions=mysqli_query($con,"SELECT * FROM presentation WHERE event_id='$eventid' and user_id='$user_id' and account_type='county'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkquestions)!=0){

  }else{
$sql=mysqli_query($con,"INSERT INTO presentation VALUE(null,
											'$eventid',
											'$user_id',
											'county',
											'new',
											'off',
											'off',
											'off',
											'off')") or die(mysqli_error($con));
  }


    }	
}else{

}


$mail->Subject=$new_subject;
$mail->Body =$new_message;

if($mail->Send()){
 echo "success";
}else{
    echo "An error occured";
 
}


	?>




