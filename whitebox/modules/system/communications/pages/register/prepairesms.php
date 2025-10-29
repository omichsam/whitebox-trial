<?php


include"../../../../connect.php";
$adm_no=$_POST['stadm_no'];
$sql="SELECT * FROM register WHERE adm_no='$adm_no'";
		$query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));
				while($row=mysqli_fetch_array($query_run)){
		$phone=$row['phone'];
		$mails=$row['email'];
	$post_fname=$row['fname'];
	$post_mname=$row['mname'];
	$post_lname=$row['lname'];
	$post_image=$row['picture'];
	$post_adm_no=$row['Registration_no'];
	$School=$row['School'];
	$Registration_no=$row['Registration_no'];
	$family=$row['family'];
	
	$registered_date=$row['registered_date'];
	
		
				}
        
       /*
        $from = "tumcathcom.com";
        $to = $mails;
        $subject = "TumCathcom enrolment";
        $message = $sms="Confirmed, you are now fully registered as a TumCathcom member.\r\nDetails\r\n--------------------\r\n Name:".$post_fname." ".$post_mname." ".$post_lname.",\r\n Reg no:".$post_adm_no.",\r\n Family:".$family.",\r\n--------------------\r\n Technical university of mombasa.\r\nRegards:Coordinator";
        $headers = "From:" . $from;
        mail($to,$subject,$message, $headers);

       // echo "The email message was sent.";

$to = $mails;
$subject = "TumCathcom enrolment";
$txt = $sms="Confirmed, you are now fully registered as a TumCathcom member.\r\nDetails\r\n--------------------\r\n Name:".$post_fname." ".$post_mname." ".$post_lname.",\r\n Reg no:".$post_adm_no.",\r\n Family:".$family.",\r\n--------------------\r\n Technical university of mombasa.\r\nRegards:Coordinator";
$headers = "From: info@tumcathcom.com" . "\r\n" .
"CC: allanmboti@gmail.com";

mail($to,$subject,$txt,$headers);

*/



				$date=date("y-m-d");
				$year=$date+3;
				$sms="Confirmed, you are now fully registered as a TumCathcom member.\r\nDetails\r\n--------------------\r\n Name:".$post_fname." ".$post_mname." ".$post_lname.",\r\n Reg no:".$post_adm_no.",\r\n Family:".$family.",\r\n--------------------\r\n Technical university of mombasa.\r\nRegards:Coordinator";
//echo $sms;


			// Be sure to include the file you've just downloaded
require_once('AfricasTalkingGateway.php');
// Specify your login credentials
$username   = "allanmboti";
$apikey     = "1fa3c14cdb68b88642192006da87eed975e388b725d9fccafa1f10b919942d44";
// NOTE: If connecting to the sandbox, please use your sandbox login credentials
// Specify the numbers that you want to send to in a comma-separated list
// Please ensure you include the country code (+254 for Kenya in this case)
$recipients = $phone;
// And of course we want our recipients to know what we really do
$message    =$sms;
// Create a new instance of our awesome gateway class
$gateway    = new AfricasTalkingGateway($username, $apikey);
// NOTE: If connecting to the sandbox, please add the sandbox flag to the constructor:
/*************************************************************************************
             ****SANDBOX****
$gateway    = new AfricasTalkingGateway($username, $apiKey, "sandbox");
**************************************************************************************/
// Any gateway error will be captured by our custom Exception class below, 
// so wrap the call in a try-catch block
try 
{ 
  // Thats it, hit send and we'll take care of the rest. 
  $results = $gateway->sendMessage($recipients, $message);
            
  foreach($results as $result) {
    // status is either "Success" or "error message"
    echo " Number: " .$result->number;
    echo " Status: " .$result->status;
    echo " MessageId: " .$result->messageId;
    echo " Cost: "   .$result->cost."\n";
  }
}
catch ( AfricasTalkingGatewayException $e )
{
  echo "Encountered an error while sending: ".$e->getMessage();
}

if($mails){
    $date = time();
    $message="<p>Confirmed, you are now fully registered as a TumCathcom member.</P><p>Details</><p>--------------------</p><p> Name:".$post_fname." ".$post_mname." ".$post_lname.",</p><p> Reg no:".$post_adm_no.",</p><p> Family:".$family.",</p><p>--------------------</p><p> Technical university of mombasa.</p><p>Log into https://portal.tumcathcom.com for more information</p><p>Regards:Coordinator</p><p> website:https://www.tumcathcom.com</p>";

    $subject="TumCathCom Member Registration";
    $sql=mysqli_query($con,"INSERT INTO mails VALUE('',
											'$mails',
											'$message',
											'new',
											'$date')") or die(mysqli_error($con));
											
include"../mails/general.php"; 
}else{
    
}
?>