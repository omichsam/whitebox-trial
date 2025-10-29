<?php
/*
$key=md5("museum");
$salt=md5("national");

//encrypt function
function encrypt($string, $key){
	$string=rtrim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256,$key,$string, MCRYPT_MODE_ECB)));
	return $string;
}
function decrypt($string,$key){
	$string=rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,$key,base64_decode($string), MCRYPT_MODE_ECB));
	return $string;
}
function hashword($string,$salt){
      $string=crypt($string,'$1$'.$salt.'$');
      return $string;
}
*/


?>