<?php
include("../../connect.php");
include("security.php");
//$salt="A0007799Wagtreeyty";
$old_user=$_POST['busername'];
$oldpass=$_POST['bpass'];

$my_pass=encrypt($oldpass,$key);
$my_user=encrypt($old_user,$key);
if($oldpass && $old_user){
//echo $my_pass;


	$checkExist=mysql_query("SELECT Email FROM investors WHERE Email='$my_user' AND pass_key='$my_pass'") or die(mysql_error());

  if(mysql_num_rows($checkExist)!=0){

  	echo "exists";
  }else{
$checkExist=mysql_query("SELECT Email_address FROM external_users WHERE Email_address='$my_user' AND pass_key='$my_pass'") or die(mysql_error());

  if(mysql_num_rows($checkExist)!=0){


 echo "exists";


}else{


	echo "Wrong details!";
}
}

	
}else{


echo "All fields required!";

}
?>