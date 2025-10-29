<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";






//$salt="A0007799Wagtreeyty";

$comments=$_POST['coments'];
$field=base64_decode($_POST['field']);
$user=base64_decode($_POST['user']);
$get_user=mysql_query("SELECT Id FROM administrators WHERE user_name='$user'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
$user_id=$get['Id'];
$innovation=base64_decode($_POST['innovation']);
$my_comments=encrypt($comments,$key);
//$my_innovation=encrypt($innovation, $key);
if($comments && $innovation){
//echo $my_pass;
$checkExist=mysql_query("SELECT * FROM feedback WHERE Innovation_id='$innovation'") or die(mysql_error());

  if(mysql_num_rows($checkExist)!=0){
 $update=mysql_query("UPDATE feedback SET $field='$my_comments' WHERE Innovation_id='$innovation'") or die(mysql_error());
 echo "success";

}else{
	$date = time();
	$new_time=encrypt($date, $key);



$sql=mysql_query("INSERT INTO feedback VALUE('',
											'$user_id',
											'$innovation',
											'$my_comments',
											'',
											'',
											'',
											'',
											'',
											'',
											'$new_time')") or die(mysql_error());
	

echo "success";
}

	
}else{


echo "All fields required!";

}






?>