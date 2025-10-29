<?php
include"../../../../connect.php";
$send_to=$_POST['send_to'];
$copy_email=$_POST['copy_email'];
$message_box=$_POST['message_box'];
$user_email=$_POST['user_email'];
 // attachment:attachment,
$subject=$_POST['subject'];
$mails="";
$date = time();
if($send_to=="All"){
 $counter=0;
$sql="SELECT email,fname,lname FROM register Where email!=''";
		$query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));
				while($row=mysqli_fetch_array($query_run)){
		$mails=$row['email'];
	$post_fname=$row['fname'];
//	$post_mname=$row['mname'];
	$post_lname=$row['lname'];
     
      $message=$message_box."\r\n Kindly log into your portal account for more information.\r\n https://portal.tumcathcom.com \r\n Regards\r\n TumCathCom Secretary";
 
 ?>
     <script>
     var emails='<?php echo $mails?>';
        var subject='<?php echo $subject?>'; 
         var message='<?php echo $message?>';
         $.post("modules/system/coordinator/mails/send_mail.php",{subject:subject,message:message,emails:emails});
         
     </script>
     <?php

$sql=mysqli_query($con,"INSERT INTO mails VALUE(Null,
											'$mails',
											'$message',
											'new',
											'$date')") or die(mysqli_error($con));


      $counter= $counter+1;
     // echo $counter.", ".$mails."\r\n";
      
	}
echo "Email Sent";

    
    
    
}else if($send_to=="Main Office"){
    
}else if($send_to=="Council members"){
    
}else if($send_to=="Family leaders"){
    
}else if($send_to=="One person"){
    //echo $user_email;
   if($user_email){
       $mails=$user_email;
       echo "Email Sent";
$message=$message_box."\r\n Kindly log into your portal account for more information.\r\n https://portal.tumcathcom.com \r\n Regards\r\n TumCathCom Secretary";
 include"mails/general.php"; 
	}else{
	    
	} 
}else{
    
}

          	
?>