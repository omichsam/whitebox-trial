<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
include "../../../../../modules/mails/multimailer.php"; 
  $select_reciever=mysqli_real_escape_string($con,$_POST['select_reciever']);
  $copy_email=mysqli_real_escape_string($con,$_POST['copy_email']);
  $message_box=mysqli_real_escape_string($con,$_POST['message_box']);
  $reciever=mysqli_real_escape_string($con,$_POST['reciever']);
  //$attachment=mysqli_real_escape_string($con,$_POST['attachment']);
  $subject=mysqli_real_escape_string($con,$_POST['subject']);
if($select_reciever=="All Users"){
	$sqlx="SELECT * FROM administrators";

//$sqlx="SELECT * FROM innovations_table LIMIT $offset,$no_of_records_per_page";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $newFirst_name=$row['Name']; 
$email=$row['user_name']; 
$message="<p>Dear ".$newFirst_name.",</p><p>".$message_box."</p>";

$mail->Subject=$subject;
$mail->Body =$message;
$mail->ClearAllRecipients();
 $mail->clearAddresses();
$mail->AddAddress($email);


if($mail->Send()){
    //echo $my_code;
    
}else{
  // echo "Mailer Error: " . $mail->ErrorInfo;
} 

     }
$sqlx="SELECT * FROM users";

//$sqlx="SELECT * FROM innovations_table LIMIT $offset,$no_of_records_per_page";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $newFirst_name=$row['first_name'];
$newLast_name=$row['last_name']; 
$email=$row['email']; 
$message="<p>Dear ".$newFirst_name." ".$newLast_name.",</p><p>".$message_box."</p>";

$mail->Subject=$subject;
$mail->Body =$message;
$mail->ClearAllRecipients();
 $mail->clearAddresses();
$mail->AddAddress($email);


if($mail->Send()){
    //echo $my_code;
    
}else{
  // echo "Mailer Error: " . $mail->ErrorInfo;
} 

     }

}else if($select_reciever=="Innovators Only"){
$sqlx="SELECT * FROM users";

//$sqlx="SELECT * FROM innovations_table LIMIT $offset,$no_of_records_per_page";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $newFirst_name=$row['first_name'];
$newLast_name=$row['last_name']; 
$email=$row['email']; 
$message="<p>Dear ".$newFirst_name." ".$newLast_name.",</p><p>".$message_box."</p>";

$mail->Subject=$subject;
$mail->Body =$message;
$mail->ClearAllRecipients();
 $mail->clearAddresses();
$mail->AddAddress($email);


if($mail->Send()){
    //echo $my_code;
    
}else{
  // echo "Mailer Error: " . $mail->ErrorInfo;
} 

     }


}else if($select_reciever=="Evaluating team Only"){

$sqlx="SELECT * FROM administrators Where Admin_role='clerk'";

//$sqlx="SELECT * FROM innovations_table LIMIT $offset,$no_of_records_per_page";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $newFirst_name=$row['Name']; 
$email=$row['user_name']; 
$message="<p>Dear ".$newFirst_name.",</p><p>".$message_box."</p>";

$mail->Subject=$subject;
$mail->Body =$message;
$mail->ClearAllRecipients();
 $mail->clearAddresses();
$mail->AddAddress($email);


if($mail->Send()){
    //echo $my_code;
    
}else{
  // echo "Mailer Error: " . $mail->ErrorInfo;
} 

     }






}else if($select_reciever=="Executives Only"){
$sqlx="SELECT * FROM administrators Where Admin_role='executive'";

//$sqlx="SELECT * FROM innovations_table LIMIT $offset,$no_of_records_per_page";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $newFirst_name=$row['Name']; 
$email=$row['user_name']; 
$message="<p>Dear ".$newFirst_name.",</p><p>".$message_box."</p>";

$mail->Subject=$subject;
$mail->Body =$message;
$mail->ClearAllRecipients();
 $mail->clearAddresses();
$mail->AddAddress($email);


if($mail->Send()){
    //echo $my_code;
    
}else{
  // echo "Mailer Error: " . $mail->ErrorInfo;
} 

     }






}else if($select_reciever=="Super Admins Only"){

$sqlx="SELECT * FROM administrators Where Admin_role='super_admin'";

//$sqlx="SELECT * FROM innovations_table LIMIT $offset,$no_of_records_per_page";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $newFirst_name=$row['Name']; 
$email=$row['user_name']; 
$message="<p>Dear ".$newFirst_name.",</p><p>".$message_box."</p>";

$mail->Subject=$subject;
$mail->Body =$message;
$mail->ClearAllRecipients();
 $mail->clearAddresses();
$mail->AddAddress($email);


if($mail->Send()){
    //echo $my_code;
    
}else{
  // echo "Mailer Error: " . $mail->ErrorInfo;
} 

     }




}else if($select_reciever=="All Whitebox Members"){
$sqlx="SELECT * FROM administrators";

//$sqlx="SELECT * FROM innovations_table LIMIT $offset,$no_of_records_per_page";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $newFirst_name=$row['Name']; 
$email=$row['user_name']; 
$message="<p>Dear ".$newFirst_name.",</p><p>".$message_box."</p>";

$mail->Subject=$subject;
$mail->Body =$message;
$mail->ClearAllRecipients();
$mail->clearAddresses();
$mail->AddAddress($email);


if($mail->Send()){
    //echo $my_code;
    
}else{
  // echo "Mailer Error: " . $mail->ErrorInfo;
} 

     }




}else if($select_reciever=="one person"){
$mail->Subject=$subject;
$mail->Body =$message_box;
$mail->ClearAllRecipients();
 $mail->clearAddresses();
$mail->AddAddress($reciever);

if($mail->Send()){
    //echo $my_code;
    
}else{
  // echo "Mailer Error: " . $mail->ErrorInfo;
}




}else{

}
if($select_reciever=="one person"){

echo base64_encode(" message successfully sent to ".$reciever);
}else{
echo base64_encode(" message successfully sent to ".$select_reciever);
}
?>