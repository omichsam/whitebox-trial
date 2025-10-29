<?php
include("../../connect.php");
include("security.php");
//$salt="A0007799Wagtreeyty";

$old_user=$_POST['login_username'];
$oldpass=$_POST['login_Password'];

$my_pass=encrypt($oldpass,$key);
$my_user=encrypt($old_user,$key);
if($oldpass && $old_user){
//echo $my_pass;
$checkExist=mysql_query("SELECT Email FROM investors WHERE Email='$my_user' AND pass_key='$my_pass'") or die(mysql_error());

  if(mysql_num_rows($checkExist)!=0){

 echo "exists";

}else{
	echo "Wrong details!";
}

	
}else{


echo "All fields required!";

}
?>