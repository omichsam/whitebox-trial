<?php
session_start();
 if(isset($_SESSION["username"])) 
{

$loginuser=base64_decode($_SESSION["username"]);
$user=base64_decode($_SESSION["username"]);
//echo $user;
//echo $_SESSION["username"];
}else{
$_SESSION = array(); 
// Destroy the session.
session_destroy();
}
 ?>
