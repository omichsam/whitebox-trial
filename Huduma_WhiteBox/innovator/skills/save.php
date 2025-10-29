<?php
include("../../../base_connect.php");
include("../../../connect.php");
  $loginuser=base64_decode($_SESSION["username"]);

 //	id
$today=time();
if($loginuser){


$get_user=mysqli_query($con,"SELECT * FROM users WHERE email='$loginuser'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$first_name=$get['first_name'];
$user_id=$get['id'];
$last_name=$get['last_name'];
//$fullname=mysql_real_escape_string("user".$id."_".$first_name."_".$last_name."_".$today);
$b=0;
$c=0;
for($a=1;$a<=30;$a++){
$new_skill="";
$new_skill=mysqli_real_escape_string($con,$_POST['skills'.$a]);
if($new_skill==""){

}else{
$checkuser=mysqli_query($con,"SELECT * FROM skills WHERE user_id='$user_id' and skill='$new_skill'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkuser)!=0){
  	$updates=mysqli_query($con,"UPDATE skills SET updated_at='$today' Where user_id='$user_id' and skill='$new_skill'") or die(mysqli_error($con));

$c=$c+1;
  }else{

$addVist=mysqli_query($con,"INSERT INTO skills VALUES(
												  NULL,
												  '$user_id',
												  '$new_skill',
												  '$today',
												  '$today')") or die(mysqli_error($con));

$b=$b+1;
  }






}
}
echo base64_encode("success");
}else{

}
?>