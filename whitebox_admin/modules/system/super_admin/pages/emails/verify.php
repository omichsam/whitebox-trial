
<?php

include("../../connect.php");
include("../functions/security.php");
//$mails=base64_decode($_POST['mmuser']);
$my_code=encrypt(base64_decode($_POST['code']),$key);
echo $my_code;
$checkExist=mysql_query("SELECT user_key FROM external_users WHERE user_key='$my_code'") or die(mysql_error());

  if(mysql_num_rows($checkExist)!=0){
  	echo "exist";
  }else{

  }

?>