<?php
include("../../connect.php");
include("security.php");






//$salt="A0007799Wagtreeyty";
$old_user=$_POST['encryptedmail'];
$new_password=$_POST['password'];
//$oldpass=$_POST['nmypsaa'];
//$my_pass=encrypt($oldpass,$key);
$my_user=encrypt($old_user, $key);
$pass=encrypt($new_password, $key);

if($old_user){
//echo $my_pass;
$checkExisted=mysql_query("SELECT Email FROM investors WHERE Email='$my_user'") or die(mysql_error());

  if(mysql_num_rows($checkExisted)!=0){
  	$update=mysql_query("UPDATE investors SET pass_key='$pass' WHERE Email='$my_user'") or die(mysql_error());
  	
 	echo "Password updated successfully";
  }else{
      
$checkExist=mysql_query("SELECT Email_address FROM external_users WHERE Email_address='$my_user'") or die(mysql_error());

  if(mysql_num_rows($checkExist)!=0){

  	$update=mysql_query("UPDATE external_users SET pass_key='$pass' WHERE Email_address='$my_user'") or die(mysql_error());
  	
 	echo "Password updated successfully";
}else{
    
    
    
    
}
}
}
else{
echo"wrong email";
}

?>