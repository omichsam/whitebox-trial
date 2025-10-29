<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";






//$salt="A0007799Wagtreeyty";
$investor=$_POST['investor'];
//$user_id=$get['Id'];
$innovation=$_POST['innovation'];
//$my_innovation=encrypt($innovation, $key);
if($investor && $innovation){
//echo $my_pass;
$checkExist=mysql_query("SELECT * FROM innovatio_investor WHERE innovation_id='$innovation' and Investor_id='$investor'") or die(mysql_error());

  if(mysql_num_rows($checkExist)!=0){

 echo "Innovation already assigned!";

}else{
	$date = time();
	$new_time=encrypt($date, $key);



$sql=mysql_query("INSERT INTO innovatio_investor VALUE('',
											'$innovation',
											'$investor',
											'$new_time')") or die(mysql_error());
$Status=encrypt("implementation", $key);
$update=mysql_query("UPDATE innovations_table SET Status='$Status' WHERE Innovation_id='$innovation'") or die(mysql_error());
	

echo "success";
}

	
}else{


echo "An error occured!";

}






?>