<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";


$user=$_SESSION["username"];
$get_user=mysqli_query($con,"SELECT Id FROM administrators WHERE user_name='$user'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$user_idold=$get['Id'];
$date = time();
$new_time=$date;

//$salt="A0007799Wagtreeyty";
//$user_id=$get['Id'];
$innovation=base64_decode($_POST['innovation']);
//$my_innovation=encrypt($innovation, $key);
if($innovation){
//echo $my_pass;
    $assignments="pending";
	$date = time();
	$new_time=$date;
	  $sqldr="SELECT investor_id FROM investor_list";

    $query_runxer=mysqli_query($con,$sqldr) or die($query_runxer."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxer)){
    $investor_id=$row['investor_id'];
      $checkExisted=mysqli_query($con,"SELECT * FROM innovation_investors WHERE investor_id ='$investor_id' and innovation_id='$innovation'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExisted)>=1){
  }else{
    $sql=mysqli_query($con,"INSERT INTO innovation_investors VALUE('',
                                                            '$innovation',
											                '$investor_id',
											                '$assignments',
											                 '$new_time')") or die(mysqli_error($con));
    
 $get_usernew=mysqli_query($con,"SELECT Email,Name,interest FROM investors WHERE Investor_id='$investor_id'") or die(mysqli_error($con));
$getd=mysqli_fetch_assoc($get_usernew);
  $interest=$getd['interest'];
$Name=$getd['Name']; 
$email=$getd['Email']; 



$subject="Innovation Notification";
 $message="Dear ".$Name.", Following your application for innovations in ".$interest.", we wish to present an innovation to you, We will contact you for more information about the innovation, Link https://www.tumcathcom.com/museum";

include "../../../../../modules/mails/general.php";	


 
        
     	
}
}
$update=mysqli_query($con,"UPDATE innovation_stamps SET Forwarding='$new_time',investor_id='$user_idold' WHERE innovation_id='$innovation'") or die(mysqli_error($con));

$Status="implementation";
$update=mysqli_query($con,"UPDATE innovations_table SET Status='$Status' WHERE Innovation_id='$innovation'") or die(mysqli_error($con));

$sqlx="SELECT user_id FROM innovations_table where Innovation_Id='$innovation'";

    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $user_id=$row['user_id'];
      
    }
   $get_usernew=mysqli_query($con,"SELECT Email_address,Last_name,First_name FROM external_users WHERE  User_id='$user_id'") or die(mysqli_error($con));
$getd=mysqli_fetch_assoc($get_usernew);
  $newFirst_name=$getd['First_name'];
$newLast_name=$getd['Last_name']; 
$email=$getd['Email_address']; 



$subject="Innovation Implementation Notification";
 $message="<p>Dear, ".$newFirst_name." ".$newLast_name."</p><p>, Your Innovation has been linked to investors for potential partnership. Kindly login to the portal for more information.</p><p> https://www.tumcathcom.com/museum</p><p>Regards</p><p>NMK Innovation Team</p>";

$message="Dear, ".$newFirst_name." ".$newLast_name.", Your Innovation has successfully passed the evaluation process and is ready for implementation, you will be contacted for more information, thank you. For more information log into https://www.tumcathcom.com/museum";
 $sql=mysqli_query($con,"INSERT INTO notifications VALUE('',
											'$user_id',
											'innovator',
											'$subject',
											'$message',
											'Executive department',
											'new',
											'$date')") or die(mysqli_error($con));
include "../../../../../modules/mails/general.php";	


        
        
        
  
	
//$delete=mysqli_query($con,"DELETE FROM investor_list") or die(mysqli_error($con));
echo "success";
}else{
    echo "An error occured";
}

	







?>