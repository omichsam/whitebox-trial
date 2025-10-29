<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
//include "../../../../../modules/mails/multimailer.php"; 
//$salt="A0007799Wagtreeyty";
$first_name=mysqli_real_escape_string($con,base64_decode($_POST['first_name']));
$last_name=mysqli_real_escape_string($con,base64_decode($_POST['last_name']));
$phone=mysqli_real_escape_string($con,base64_decode($_POST['phone']));
$email=mysqli_real_escape_string($con,base64_decode($_POST['email']));
$send_email=$email;
$account_value=mysqli_real_escape_string($con,base64_decode($_POST['account_value']));
//$account_value=base64_encode("super_admin");
$name=$first_name." ".$last_name;
$new_name=$name;
$my_phone=$phone;
$my_email=$email;
$account=$account_value;
if($first_name && $last_name && $phone && $email && $account_value){
//echo $my_pass;
$checkExist=mysqli_query($con,"SELECT user_name FROM e_learning_admin WHERE user_name='$my_email'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)>=1){

 echo "This account exists";

}else{
  $date = time();
  $new_time=$date;
$chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz";
             $code=substr(str_shuffle($chars),0,15);
             $new_password=hashword(base64_encode($code),$salt);
 $query=mysqli_query($con,"INSERT INTO e_learning_admin
           VALUES (null,
                   '$new_name',
                   '$account',
                   '$my_phone',
                   '$my_email',
                   '$new_password',
                   '',
                   '',
                   '',
                   '$new_time',
                   '1')") or die(mysqli_error($con));
         $message="<p>Dear $name</p><p>Your e-learning portal acoount has been created. Kindly access the WhiteBox Innovation portal  via the link: <a href='https://www.whitebox.go.ke/whitebox'>https://www.whitebox.go.ke/whitebox.</a></p><p>Your account cridentials are:</p><p> Username: $send_email </p><p> password: $code</p><p>Regards</p><p>Huduma WhiteBox</p>";  
$subject='Portal Account Credentials';
include "../../../../../modules/mails/general.php";

echo "success";
}

  
}else{


echo "All fields required!";

}






?>