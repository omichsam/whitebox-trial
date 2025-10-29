<?php
include("../../connect.php");
include("security.php");






//$salt="A0007799Wagtreeyty";
$old_user=$_POST['recovery_email'];
//$new_password=$_POST['password'];
//$oldpass=$_POST['nmypsaa'];
//$my_pass=encrypt($oldpass,$key);
$my_user=encrypt($old_user, $key);
if($old_user){
//echo $my_pass;
$checkExist=mysql_query("SELECT Email FROM investors WHERE Email='$my_user'") or die(mysql_error());

  if(mysql_num_rows($checkExist)!=0){
      echo "exists";
  }else{
$checkExist=mysql_query("SELECT Email_address FROM external_users WHERE Email_address='$my_user'") or die(mysql_error());

  if(mysql_num_rows($checkExist)!=0){

 echo "exists";

}else{
	echo "email does not exist";
	
}
}
}else{
echo"Cannot receive recovery email";
}

//if($new_password){
	//$update=mysql_query("UPDATE external_users SET pass_key='$new_password' WHERE Email_address='$old_user'") or die(mysql_error());
//}



?>