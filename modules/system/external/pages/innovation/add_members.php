<?php

include "../../../../functions/security.php";
include "../../../../../connect.php";
	
			$number_partners=base64_decode($_POST['members']);
    		$ser_names=base64_decode($_POST['users']);
    		$member_name=encrypt($_POST['member_name'],$key);
    		$role=encrypt($_POST['role'],$key);

    		$innovation_Id=base64_decode($_POST['innovation_Id']);
    		if($ser_names==1){
    			//echo "success";
$delete=mysql_query("DELETE FROM innovators_partners WHERE Innovation_Id='$innovation_Id'") or die(mysql_error());

                
$sql=mysql_query("INSERT INTO innovators_partners VALUE('',
          											   '$innovation_Id',
          											   '$ser_names',
          											   '$member_name',
          											    '$role')") or die(mysql_error());
}else{
	$sql=mysql_query("INSERT INTO innovators_partners VALUE('',
          											'$innovation_Id',
          											'$ser_names',
          											'$member_name',
          											'$role')") or die(mysql_error());
}

?>