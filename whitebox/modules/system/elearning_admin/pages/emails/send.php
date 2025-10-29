<?php
include("../../../../../connect.php");
$sterpageno=(int)$_POST['sterpageno'];
//$noper_page=$_POST['noper_page'];
//$ofset=$pageno*$noper_page;
$send_to=$_POST['send_to'];

$endpoitd=$sterpageno+5;
$copy_email=$_POST['copy_email'];
//$message_box=$_POST['message_box'];
$user_email=$_POST['user_email'];
 // attachment:attachment,
$subject=$_POST['subject'];
$mails="";
$date = time();

require '../../../../mails/gen.php';

///$mail->AddAttachment('Break Away Group Programme 2021.pdf');
///$mail->AddAttachment('KIPPRA Conference Programme 2021.pdf');
if($send_to=="All"){
 $counter=0;
$sql="SELECT * FROM data_table LIMIT $sterpageno,30";
        $query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));
                while($row=mysqli_fetch_array($query_run)){
        $email=$row['colm_9'];
    $post_fname=$row['colm_4'];
$chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz@!#$%&";
$code=substr(str_shuffle($chars),0,15);//generate random Key
//echo base64_encode($code);
$codeb=base64_encode($code);
  $keyb=base64_encode($email);



//  $post_mname=$row['mname'];
    //$post_lname=$row['lastname'];
    
     //echo $email;
 $message="<p>Dear $post_fname, </p><p>We write to invite you to our whitebox e-learning portal</p><p> Kindly click the link to proceed, link :<a href='https://www.whitebox.go.ke/default.php?code=$codeb & key=$keyb'>https://www.whitebox.go.ke/default.php?code=$codeb</a> </p><p>Regards,</p><p>WhiteBox Innovations secretariat</p>";
$mail->Subject=$subject;
$mail->Body =$message;
$mail->AddAddress($email);

if($mail->Send()){
    //echo $my_code;
    
}else{
   echo "Mailer Error: " . $mail->ErrorInfo;
}   



 $mail->clearAddresses();

}


   echo $endpoitd; 
    
}else if($send_to=="Delegate"){
$sql="SELECT * FROM wp_registered Where email!='' and participation='1'";
        $query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));
                while($row=mysqli_fetch_array($query_run)){
        $email=$row['email'];
    $post_fname=$row['firstname'];
//  $post_mname=$row['mname'];
    $post_lname=$row['lastname'];
    $title=$row['title'];

     //echo $email;
      $message="Dear $title $post_fname $post_lname, $message_box";
 
$mail->Subject=$subject;
$mail->Body =$message;
$mail->AddAddress($email);

if($mail->Send()){
    //echo $my_code;
    
}else{
   echo "Mailer Error: " . $mail->ErrorInfo;
}   



 $mail->clearAddresses();

} 
 echo "email sent";   
}else if($send_to=="Moderator"){
$sql="SELECT * FROM wp_registered Where email!='' and participation='2'";
        $query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));
                while($row=mysqli_fetch_array($query_run)){
        $email=$row['email'];
    $post_fname=$row['firstname'];
//  $post_mname=$row['mname'];
    $post_lname=$row['lastname'];
    $title=$row['title'];
     //echo $email;
      $message="Dear $title $post_fname $post_lname, $message_box";
 
$mail->Subject=$subject;
$mail->Body =$message;
$mail->AddAddress($email);

if($mail->Send()){
    //echo $my_code;
    
}else{
   echo "Mailer Error: " . $mail->ErrorInfo;
}   



 $mail->clearAddresses();

} 




 echo "email sent";   
}else if($send_to=="Presenter"){
 $sql="SELECT * FROM wp_registered Where email!='' and participation='3'";
        $query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));
                while($row=mysqli_fetch_array($query_run)){
        $email=$row['email'];
    $post_fname=$row['firstname'];
//  $post_mname=$row['mname'];
    $post_lname=$row['lastname'];
    $title=$row['title'];
     //echo $email;
      $message="Dear $title $post_fname $post_lname, $message_box";
 
$mail->Subject=$subject;
$mail->Body =$message;
$mail->AddAddress($email);

if($mail->Send()){
    //echo $my_code;
    
}else{
   echo "Mailer Error: " . $mail->ErrorInfo;
}   



 $mail->clearAddresses();

} 

echo "email sent";
}else if($send_to=="Panelist"){
 $sql="SELECT * FROM wp_registered Where email!='' and participation='4'";
        $query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));
                while($row=mysqli_fetch_array($query_run)){
        $email=$row['email'];
    $post_fname=$row['firstname'];
//  $post_mname=$row['mname'];
    $post_lname=$row['lastname'];
    $title=$row['title'];
     //echo $email;
      $message="Dear $title $post_fname $post_lname, $message_box";
 
$mail->Subject=$subject;
$mail->Body =$message;
$mail->AddAddress($email);

if($mail->Send()){
    //echo $my_code;
    
}else{
   echo "Mailer Error: " . $mail->ErrorInfo;
}   



 $mail->clearAddresses();

} 
echo "email sent";

    }else if($send_to=="Chair"){
 $sql="SELECT * FROM wp_registered Where email!='' and participation='5'";
        $query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));
                while($row=mysqli_fetch_array($query_run)){
        $email=$row['email'];
    $post_fname=$row['firstname'];
//  $post_mname=$row['mname'];
    $post_lname=$row['lastname'];
    $title=$row['title'];
     //echo $email;
      $message="Dear $title $post_fname $post_lname, $message_box";
 
$mail->Subject=$subject;
$mail->Body =$message;
$mail->AddAddress($email);

if($mail->Send()){
    //echo $my_code;
    
}else{
   echo "Mailer Error: " . $mail->ErrorInfo;
}   



 $mail->clearAddresses();

} 


echo "email sent";
        }else if($send_to=="Facilitator"){
             $sql="SELECT * FROM wp_registered Where email!='' and participation='7'";
        $query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));
                while($row=mysqli_fetch_array($query_run)){
        $email=$row['email'];
    $post_fname=$row['firstname'];
//  $post_mname=$row['mname'];
    $post_lname=$row['lastname'];
    $title=$row['title'];
     //echo $email;
      $message="Dear $title $post_fname $post_lname, $message_box";
 
$mail->Subject=$subject;
$mail->Body =$message;
$mail->AddAddress($email);

if($mail->Send()){
    //echo $my_code;
    
}else{
   echo "Mailer Error: " . $mail->ErrorInfo;
}   



 $mail->clearAddresses();

} 

echo "email sent";
            }else if($send_to=="MC"){
$sql="SELECT * FROM wp_registered Where email!='' and participation='8'";
        $query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));
                while($row=mysqli_fetch_array($query_run)){
        $email=$row['email'];
    $post_fname=$row['firstname'];
//  $post_mname=$row['mname'];
    $post_lname=$row['lastname'];
    $title=$row['title'];
     //echo $email;
      $message="Dear $title $post_fname $post_lname, $message_box";
 
$mail->Subject=$subject;
$mail->Body =$message;
$mail->AddAddress($email);

if($mail->Send()){
    //echo $my_code;
    
}else{
   echo "Mailer Error: " . $mail->ErrorInfo;
}   



 $mail->clearAddresses();

} 

  echo "email sent"; 
}else if($send_to=="One person"){
    //echo $user_email;
   if($user_email){
       $email=$user_email;
//$message=$message_box;
//include("modules/mails/general.php");



 $chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz@!#$%&";
$code=substr(str_shuffle($chars),0,15);//generate random Key
//echo base64_encode($code);
$codeb=base64_encode($code);
  $keyb=base64_encode($email);


   $message="<p>Dear Freyja, </p><p>We write to invite you to our whitebox e-learning portal</p>
<p>You will be required to setup your password once you land to the portal.</p><p>
   <p> Kindly click the link to proceed, link :<a href='https://www.whitebox.go.ke/default.php?code=$codeb & key=$keyb'>https://www.whitebox.go.ke/default.php?code=$codeb</a> </p><p>Regards,</p><p>WhiteBox Innovations secretariat</p>";
//$mail->AddAttachment('Chair and Panelist Guiding Questions.pdf');
$mail->Subject=$subject;
$mail->Body =$message;
$mail->AddAddress($email);

if($mail->Send()){
    //echo $my_code;
    
}else{
   echo "Mailer Error: " . $mail->ErrorInfo;
}   



 $mail->clearAddresses();

    }else{
        
    } 
    echo "email sent";
}else{
   echo "email not sent"; 
}

            
?>