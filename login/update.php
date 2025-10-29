<?php
session_start();
include("../connect.php");
//include("security.php");
//$salt="A0007799Wagtreeyty";
$old_user=$_POST['busername'];
$my_user=strtolower(base64_decode($old_user));

if($old_user){
//echo $my_pass;
$checkExist=mysqli_query($con,"SELECT * FROM users WHERE email='$my_user'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)!=0){
      $update=mysqli_query($con,"UPDATE users SET country='KE',county_id='47' WHERE email='$my_user'") or die(mysqli_error($con));
      if(isset($_SESSION["username"]))
{
 $chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz@!#$%&";
$code=substr(str_shuffle($chars),0,15);//generate random Key
 $id=base64_encode($code);
                            // Store data in session variables
$_SESSION["loggedin"] = true;
 $_SESSION["id"] = $id;
$_SESSION["username"] = $old_user;

echo base64_encode("success");

  
}else{
  $chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz@!#$%&";
$code=substr(str_shuffle($chars),0,15);//generate random Key
 $id=base64_encode($code);
                            // Store data in session variables
$_SESSION["loggedin"] = true;
 $_SESSION["id"] = $id;
$_SESSION["username"] = $old_user;

echo base64_encode("success");
 //echo $_SESSION["username"];
}
      
      
      
      
  }else{
      echo base64_encode("Sorry, an error occured!");
  }
}else{
    echo base64_encode("Sorry, an error occured!");
}
  ?>