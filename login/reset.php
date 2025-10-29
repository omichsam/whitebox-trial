<?php
include("../connect.php");
$password_n=mysqli_real_escape_string($con,$_POST['password_n']);
$new_passworn=mysqli_real_escape_string($con,$_POST['new_passworn']);
$emailset=mysqli_real_escape_string($con,$_POST['emailsets']);
//$emailset=

$salt="A073955@am";
function hashword($string,$salt){
      $string=crypt($string,'$1$'.$salt.'$');
      return $string;
}
if($password_n && $new_passworn && $emailset){
$cheinnovations=mysqli_query($con,"SELECT * FROM e_learning_users WHERE email='$emailset'") or die(mysqli_error($con));

  if(mysqli_num_rows($cheinnovations)!=0){
$newpass=hashword(base64_encode($password_n),$salt);
$update=mysqli_query($con,"UPDATE e_learning_users SET password='$newpass' WHERE email='$emailset'") or die(mysqli_error($con));
$update=mysqli_query($con,"UPDATE users SET password='$newpass' WHERE email='$emailset'") or die(mysqli_error($con));


echo base64_encode("success");


}else{

$cheinnovations=mysqli_query($con,"SELECT * FROM users WHERE email='$emailset'") or die(mysqli_error($con));

  if(mysqli_num_rows($cheinnovations)!=0){
$newpass=hashword(base64_encode($password_n),$salt);

$update=mysqli_query($con,"UPDATE users SET password='$newpass' WHERE email='$emailset'") or die(mysqli_error($con));


echo base64_encode("success");


}else{
echo base64_encode("An error occurred!");

}
}
}else{

	base64_encode("All fields required");
}

?>