<?php
include("../../connect.php");
include("security.php");






//$salt="A0007799Wagtreeyty
$registered=base64_decode($_POST['register']);

$old_user=$_POST['mmuser'];
$oldpass=$_POST['nmypsaa'];
$my_pass=encrypt($oldpass,$key);
$my_user=encrypt($old_user, $key);
$date = time();
	$new_time=encrypt($date, $key);
if($oldpass && $old_user){
	if($registered=="Investor"){



//echo $my_pass;
$checkExist=mysql_query("SELECT Email FROM investors WHERE Email='$my_user'") or die(mysql_error());

  if(mysql_num_rows($checkExist)!=0){

 echo "Email address already in use";

}else{

$checkuser=mysql_query("SELECT Email_address FROM external_users WHERE Email_address='$my_user'") or die(mysql_error());

  if(mysql_num_rows($checkuser)!=0){
 echo "Your are already registered as an inovator";

}else{
	



$sql=mysql_query("INSERT INTO investors VALUE('',
											'',
											'',
											'',
											'',
											'',
											'',
											'',
											'',
											'',
											'$my_user',
											'$my_pass',
											'',
											'',
											'$new_time')") or die(mysql_error());
	

echo "success";
}

}



	}else{
//echo $my_pass;
$checkExist=mysql_query("SELECT Email_address FROM external_users WHERE Email_address='$my_user'") or die(mysql_error());

  if(mysql_num_rows($checkExist)!=0){

 echo "This account exists";

}else{
	$date = time();
	$new_time=encrypt($date, $key);



$sql=mysql_query("INSERT INTO external_users VALUE('',
											'',
											'',
											'',
											'',
											'',
											'',
											'$my_user',
											'$my_pass',
											'',
											'',
											'$new_time')") or die(mysql_error());
	

echo "success";
}
}
	
}else{


echo "All fields required!";

}






?>