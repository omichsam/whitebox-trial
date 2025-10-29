<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";

//$salt="A0007799Wagtreeyty";
$first_name=base64_decode($_POST['first_name']);
$last_name=base64_decode($_POST['last_name']);
$phone=base64_decode($_POST['phone']);
$email=base64_decode($_POST['email']);
$user=base64_decode($_POST['User_id']);
$send_email=$email;
$account_value=base64_decode($_POST['account_value']);
//$account_value=base64_encode("super_admin");
$name=$first_name." ".$last_name;
$new_name=$name;
$my_phone=$phone;
$my_email=$email;
$account=$account_value;
if($first_name && $last_name && $phone && $email && $account_value){
//echo $my_pass;
$update=mysqli_query($con,"UPDATE administrators SET Name='$new_name',Admin_role='$account',phone='$phone',user_name='$email' WHERE Id='$user'") or die(mysqli_error($con));
echo 'success';
}else{
echo "All fields required!";

}






?>