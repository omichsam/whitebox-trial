<?php


            $fname=$_POST['fname'];
			$lname=$_POST['lname'];
			$idno=$_POST['idno'];
			$phone=$_POST['phone'];
			$location=$_POST['location'];
			$date=date('y-m-d');
			$ujumbe="Dear, $fname $lname\n You are fully registered as a landlord to Kitai Real Estate";
			include("../../sms/send.php");

?>