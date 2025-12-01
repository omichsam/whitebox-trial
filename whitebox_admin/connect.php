<?php
$host="localhost";
$username="root";
$password="A073955@amk77";
$db_name="live2022whiteboxmay10mega";

$Today=date("Y-m-d");
$y=date("Y");
$Y=date("Y");
$M=date("m");
$m=date("m");
$d=date("d");
$Timezone=date_default_timezone_set('Africa/Nairobi');
$NOW=date('H:i:s a',time());
$DateTime=date('Y-m-d H:i:s a',time());

$con = mysqli_connect($host,$username,$password,$db_name);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

?> 

