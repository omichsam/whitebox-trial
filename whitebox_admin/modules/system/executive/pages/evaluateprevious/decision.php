<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";






//$salt="A0007799Wagtreeyty";
//decision:decision,innovation:innovation
$decision=base64_decode($_POST['decision']);
//$field=base64_decode($_POST['field']);
$user=base64_decode($_POST['user']);
$get_user=mysql_query("SELECT Id FROM administrators WHERE user_name='$user'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
$user_id=$get['Id'];
$innovation=base64_decode($_POST['innovation']);
$my_decision=encrypt($decision,$key);
//$my_innovation=encrypt($innovation, $key);
if($decision && $innovation){
 $update=mysql_query("UPDATE innovations_table SET Status='$my_decision' WHERE Innovation_Id='$innovation'") or die(mysql_error());
 echo "success";

	
}else{



}






?>