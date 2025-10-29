<?php


include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$innovation=$_POST['innovation'];
$Status=encrypt("evaluation",$key);
if($innovation){
	 $update=mysql_query("UPDATE innovations_table SET Status='$Status' WHERE Innovation_Id='$innovation'") or die(mysql_error());
	  

	   	}else{

	   	}

   ?>