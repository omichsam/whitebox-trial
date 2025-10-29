<?php
$key=md5("museum");
$salt=md5("national");

$salt="A073955@am";
function hashword($string,$salt){
      $string=crypt($string,'$1$'.$salt.'$');
      return $string;
}

?>