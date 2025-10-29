<?php
include("../../connect.php");
$email=base64_decode($_POST['mmuser']);

	//$chars ="1234567890";
$chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz";
		$code=substr(str_shuffle($chars),0,10);
      $my_code=base64_encode($code);
	$subject="Kippra Acknowledgement";
	$message='<p>Thank you for signing up into the virtual response system,</p><p>Kindly verify your email address with this code : '.$code.'</p><p> link https:www.virtualresponse.kippra.or.ke</p>';
include("general.php");
echo $my_code;
?>
