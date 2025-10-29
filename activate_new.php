<?php
session_start();
include("connect.php");
$code=mysqli_real_escape_string($con,base64_decode($_GET['code']));
$email=mysqli_real_escape_string($con,base64_decode($_GET['key']));
$old_user=base64_encode($email);


if($email){
$checkExist=mysqli_query($con,"SELECT * FROM users WHERE email='$email'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)!=0){
      $update=mysqli_query($con,"UPDATE users SET country='KE',county_id='47' WHERE email='$email'") or die(mysqli_error($con));

?>

 <script type="text/javascript">
      location.replace("index.php");
 </script>
<?php

  $chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz@!#$%&";
$code=substr(str_shuffle($chars),0,15);//generate random Key
 $id=base64_encode($code);
                            // Store data in session variables
$_SESSION["loggedin"] = true;
 $_SESSION["id"] = $id;
$_SESSION["username"] = $old_user;


?>

 <script type="text/javascript">
      location.replace("index.php");
 </script>
<?php
      
      
      
      
  }else{
      echo base64_encode("Sorry, an error occured!");
  }






}else{

}

?>