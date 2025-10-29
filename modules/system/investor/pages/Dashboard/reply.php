<?php
include "../../../../../connect.php";
$my_user=$_POST['my_id'];
//$innovation=$_POST['innovation'];
$accepted="";
//$empted=encrypt("declined",$key);
include("../../../../functions/security.php");
$my_userde=encrypt($my_user,$key);
$save_role=base64_decode($_POST['save_role']);

$innovation=base64_decode($_POST['innovation']);
 $get_usernew=mysql_query("SELECT * FROM investors WHERE  Email='$my_userde'") or die(mysql_error());
$getd=mysql_fetch_assoc($get_usernew);
  $interest=base64_decode(decrypt($getd['interest'],$key));
$Name=base64_decode(decrypt($getd['Name'],$key)); 
$emaild=base64_decode(decrypt($getd['Email'],$key)); 
$Investor_id=$getd['Investor_id']; 

   $get_executive=mysql_query("SELECT Executive_id FROM innovation_stamps WHERE  innovation_id='$innovation'") or die(mysql_error());
$getexecutive=mysql_fetch_assoc($get_executive);
  $Executive_id=$getexecutive['Executive_id'];

   $get_details=mysql_query("SELECT Name,user_name FROM administrators WHERE  Id='$Executive_id'") or die(mysql_error());
$getdetails=mysql_fetch_assoc($get_details);
$Nameexecutive=base64_decode(decrypt($getdetails['Name'],$key)); 
$user_name=base64_decode(decrypt($getdetails['user_name'],$key));

//$user_id=$get['Id'];
//$my_innovation=encrypt($innovation, $key);
if($save_role && $innovation){
//echo $my_pass;

	$date = time();
	$new_time=encrypt($date, $key);



//$sql=mysql_query("DELETE from innovatio_investor WHERE innovation_id='$innovation'") or die(mysql_error());

if($save_role=="implementation"){
$accepted=encrypt("accepted",$key);
//$update=mysql_query("UPDATE innovation_stamps SET Implimentation='$new_time' WHERE innovation_id='$innovation'") or die(mysql_error());
$updater=mysql_query("UPDATE innovation_investors SET status='$accepted' WHERE innovation_id='$innovation' and investor_id='$Investor_id'") or die(mysql_error());
for($data=1;$data<=2;$data++){
	if($data==1){
$subject="Innovation Notification";
 $message="Dear, ".$Nameexecutive.", The innovation you assiged ".$Name." for implemetation has been Accepted, get more information from the investor";
 $email=$user_name;
}else{
	 $email=$emaild;
$subject="Innovation Notification";
 $message="Dear, ".$Name.", We appreciate your acceptance to implement the innovation assigned by ".$Nameexecutive.", thank you";

}
include "../../../../mails/general.php";
	

}

if($updater){
    echo "success";
}else{
    
}
}else{
$empty="";
$declined=encrypt("declined",$key);
$Status=encrypt("approved", $key);
//$update=mysql_query("UPDATE innovation_stamps SET Implimentation='$empty', investor_id='$empty', Forwarding='$empty' WHERE innovation_id='$innovation'") or die(mysql_error());
$updated=mysql_query("UPDATE innovation_investors SET status='$declined' WHERE innovation_id='$innovation' and investor_id='$Investor_id'") or die(mysql_error());

//$update=mysql_query("UPDATE innovations_table SET Status='$Status' WHERE Innovation_id='$innovation'") or die(mysql_error());
for($data=1;$data<=2;$data++){
	if($data==1){
		$email=$user_name;
$subject="Innovation Notification";
 $message="Dear, ".$Nameexecutive.", The innovation You assiged ".$Name." for implemetation has been rejected, kindly assign it to another investor";

	    
	}else{
	$email=$emaild;
$subject="Innovation Notification";
 $message="Dear, ".$Name.", Your objection to the innovation assigned by ".$Nameexecutive." has been recieved successfully, thank you";

}	
include "../../../../mails/general.php";
}

if($updated){
    echo "success";
}else{
    
}
}
//echo "success";
}else{
	echo "an error occured";
}