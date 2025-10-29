<?php
$contact_name=mysqli_real_escape_string($con,$_POST['contactname']);
$email=mysqli_real_escape_string($con,$_POST['contactemail']);
$msage=mysqli_real_escape_string($con,$_POST['contactmsg']);

//echo $contact_name;

$subject="Message from $contact_name";
$message=$msage;
if($contact_name && $email && $msage){
 
//include("../Huduma_WhiteBox/mails/generala.php");
$message="";
$message="<p>Hello!!</p><p>$contact_name</p><p>Your message has been successfully delivered to WhiteBox, We will process it and reply back.</p><p>Thank you</p> ";
$subject="Delivery report";
include("../Huduma_WhiteBox/mails/general.php");
 echo base64_encode("success");  
    
    
    
    
}else{
    echo base64_encode("All fields required!");
}

?>