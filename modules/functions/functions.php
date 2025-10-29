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
$checkExist=mysql_query("SELECT Email_address FROM external_users WHERE Email_address='$my_user' AND pass_key='$my_pass'") or die(mysql_error());

  if(mysql_num_rows($checkExist)!=0){
$get_user=mysql_query("SELECT * FROM external_users WHERE Email_address='$my_user' AND pass_key='$my_pass'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
$First_name=$get['First_name'];
$Last_name=$get['Last_name'];
$national_id=$get['national_id'];
$Gender=$get['Gender'];
$County_id=$get['County_id'];
$Phone=$get['Phone'];
$education_level=$get['education_level'];

if($First_name && $Last_name && $national_id && $County_id && $Gender && $Phone && $education_level){



 echo "exists";

}else{
echo "verification";
}


}else{
	$checkExist=mysql_query("SELECT Email FROM investors WHERE Email='$my_user' AND pass_key='$my_pass'") or die(mysql_error());

  if(mysql_num_rows($checkExist)!=0){

$get_user=mysql_query("SELECT * FROM investors WHERE Email='$my_user' AND pass_key='$my_pass'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
$Name=$get['Name'];
$Company=$get['Company'];
$Location=$get['Location'];
$interest=$get['interest'];
$Contact=$get['Contact'];

if($Name && $Company && $Location && $Contact){



 echo "exists";

}else{
echo "verification";
}



}else{
	echo "Wrong details!";
}
}

	
}else{


echo "All fields required!";

}
?>