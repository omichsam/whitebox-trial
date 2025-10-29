<?php
include("../../connect.php");
include("security.php");




//$salt="A0007799Wagtreeyty";
$email=$_POST['email'];
$interest=$_POST['interest'];
$inve_Password=$_POST['inve_Password'];
$my_email=encrypt($email,$key);
$my_interest=encrypt($interest, $key);
$my_Password=encrypt($inve_Password, $key);
if($email && $interest && $inve_Password){
//echo $my_pass;
$checkExist=mysql_query("SELECT Email FROM investors WHERE Email='$my_email'") or die(mysql_error());

  if(mysql_num_rows($checkExist)!=0){

 echo "This account exists";

}else{

$checkuser=mysql_query("SELECT Email_address FROM external_users WHERE Email_address='$my_email'") or die(mysql_error());

  if(mysql_num_rows($checkuser)!=0){
 echo "Your are already registered as an inovator";

}else{
	$date = time();
	$new_time=encrypt($date, $key);



$sql=mysql_query("INSERT INTO investors VALUE('',
											'',
											'',
											'',
											'',
											'$my_interest',
											'$my_email',
											'$my_Password',
											'',
											'$new_time')") or die(mysql_error());
	

echo "success";
}

}

	
}else{


echo "All fields required!";

}






?>