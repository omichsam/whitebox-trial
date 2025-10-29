
<?php

include("../../connect.php");
include("../functions/security.php");


	$phone=base64_decode($_POST['phone']);
	$message=base64_decode($_POST['message']);
	$name=base64_decode($_POST['name']);
    $mails=base64_decode($_POST['email']);


         $get_account=mysqli_query($con,"SELECT * FROM mails WHERE address='$mails' AND date_added='$Today' AND message='$message'") or die(mysqli_error($con));
	$num=mysqli_num_rows($get_account);
	if($num>=1){


echo "Message already sent";
	}else{
	
		
$sql=mysqli_query($con,"INSERT INTO mails VALUE(Null,
											'$mails',
											'$name',
											'$phone',
											'$message',
											'new',
								            '$Today')") or die(mysqli_error($con));
$subject="Email from ".$name;
include("reply.php");
	
	
echo "Success";
}



?>
