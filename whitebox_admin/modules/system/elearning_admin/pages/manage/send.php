<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
include "../../../../../modules/mails/multimailer.php"; 
$user=base64_decode($_POST['user']);
$messaged=base64_decode($_POST['message']);
$action=base64_decode($_POST['action']);
$get_user=mysqli_query($con,"SELECT * FROM administrators WHERE user_name='$user'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$host_id=(int)$get['Id'];

$date = time();
  $new_time=$date;
$sqlx="SELECT * FROM notify_tray where host_id='$host_id' and Status='new' and action='$action'";

//$sqlx="SELECT * FROM innovations_table LIMIT $offset,$no_of_records_per_page";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $Innovation_name=$row['Innovation_name'];
  $date_added=$row['date_added'];
   $Innovation_Id=$row['Innovation_Id'];
     $user_id=$row['innovator_id'];

 $get_user=mysqli_query($con,"SELECT email,last_name,first_name FROM users WHERE id='$user_id'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
  $newFirst_name=$get['first_name'];
$newLast_name=$get['last_name']; 
$email=$get['email']; 
 $subject="Notification From Whitebox";
 $message="<p>Dear ".$newFirst_name." ".$newLast_name.",</p><p>".$messaged."</p><p>Link https://www.whitebox.go.ke</p><p>&nbsp;</p><p>Regards,</p><p>WhiteBox Innovation Team</p>";
 $sql=mysqli_query($con,"INSERT INTO notifications VALUE(null,
                      '$user_id',
                      'innovator',
                      'Whitebox',
                      '$message',
                      'WhiteBox Team',
                      'new',
                      '$date')") or die(mysqli_error($con));
  $update=mysqli_query($con,"UPDATE notify_tray SET Status='done' WHERE innovator_id='$user_id' and host_id='$host_id' and Status='new' and action='$action'") or die(mysqli_error($con));
$mail->Subject=$subject;
$mail->Body =$message;
 $mail->clearAddresses();
$mail->AddAddress($email);

if($mail->Send()){
    //echo $my_code;
    
}else{
   echo "Mailer Error: " . $mail->ErrorInfo;
} 
}
echo "Message successfully sent";
?>