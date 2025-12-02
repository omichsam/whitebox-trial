<?php
session_start();
include("../connect.php");
//include("security.php");
//$salt="A0007799Wagtreeyty";
$old_user=$_POST['busername'];
$oldpass=$_POST['bpass'];

$my_pass=mysqli_real_escape_string($con,base64_decode($oldpass));
$my_user=strtolower(mysqli_real_escape_string($con,base64_decode($old_user)));
$email=$my_user;

$salt="A073955@am";
function hashword($string,$salt){
      $string=crypt($string,'$1$'.$salt.'$');
      return $string;
}
$pass=hashword(base64_encode($my_pass),$salt);





if($oldpass && $old_user){



















  //echo $my_pass;
$checkExist=mysqli_query($con,"SELECT * FROM users WHERE email='$my_user' AND password='$pass'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)!=0){
  
$get_user=mysqli_query($con,"SELECT * FROM users WHERE email='$my_user'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$first_name=$get['first_name'];
$last_name=$get['last_name'];
$country=$get['country'];
$county_id=$get['county_id'];
$county_name=$get['county_name'];

if($country && $county_id){


if(isset($_SESSION["username"]))
{
 //echo base64_encode("success");
  $chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz@!#$%&";
$code=substr(str_shuffle($chars),0,15);//generate random Key
 $id=base64_encode($code);
                            // Store data in session variables
$_SESSION["loggedin"] = true;
 $_SESSION["id"] = $id;
$_SESSION["username"] = $old_user;

 echo base64_encode("portal");
}else{
  $chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz@!#$%&";
$code=substr(str_shuffle($chars),0,15);//generate random Key
 $id=base64_encode($code);
                            // Store data in session variables
$_SESSION["loggedin"] = true;
 $_SESSION["id"] = $id;
$_SESSION["username"] = $old_user;
 echo base64_encode("portal");
 //echo $_SESSION["username"];
}

}else{
$chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz@!#$%&";
$code=substr(str_shuffle($chars),0,15);//generate random Key
echo base64_encode($code);
$codeb=base64_encode($code);
  $keyb=base64_encode($email);
$subject="Account Verification";
$message="<p>Dear,</p><p>$first_name $last_name</p><p>Your account is not activated yet. Kinldy  please Click here: <a href='http://whitebox.go.ke/activate.php?code=$codeb & key=$keyb'>http://whitebox.go.ke/activate.php?code=$codeb</a> or use this code:$code to activate it</p> ";
include("../Huduma_WhiteBox/mails/general.php");
}


}else{

//echo $my_pass;
$checkExist=mysqli_query($con,"SELECT * FROM  e_learning_users  WHERE email='$my_user' AND Password ='$pass'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)!=0){
  
$get_user=mysqli_query($con,"SELECT * FROM e_learning_users WHERE email='$my_user'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$first_name=$get['first_name'];
$last_name=$get['Last_name'];
$status=$get['status'];

if($status=="active"){


if(isset($_SESSION["username"]))
{
 
 //echo base64_encode("success");
  $chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz@!#$%&";
$code=substr(str_shuffle($chars),0,15);//generate random Key
 $id=base64_encode($code);
                            // Store data in session variables
$_SESSION["loggedin"] = true;
 $_SESSION["id"] = $id;
$_SESSION["username"] = $old_user;

 echo base64_encode("e_learning");
}else{
  $chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz@!#$%&";
$code=substr(str_shuffle($chars),0,15);//generate random Key
 $id=base64_encode($code);
                            // Store data in session variables
$_SESSION["loggedin"] = true;
 $_SESSION["id"] = $id;
$_SESSION["username"] = $old_user;
 echo base64_encode("e_learning");
 //echo $_SESSION["username"];
}

}else{
$chars ="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz@!#$%&";
$code=substr(str_shuffle($chars),0,15);//generate random Key
echo base64_encode($code);
$codeb=base64_encode($code);
  $keyb=base64_encode($email);
$subject="Account Verification";
$message="<p>Dear,</p><p>$first_name $last_name</p><p>Your account is not activated yet. Kinldy  please Click here: <a href='http://whitebox.go.ke/activate.php?code=$codeb & key=$keyb'>http://whitebox.go.ke/activate.php?code=$codeb</a> or use this code:$code to activate it</p> ";
include("../Huduma_WhiteBox/mails/general.php");
}


}else{
 
$cheinnovations=mysqli_query($con,"SELECT * FROM data_table WHERE colm_9='$my_user'") or die(mysqli_error($con));

  if(mysqli_num_rows($cheinnovations)>=1){
    if($my_pass=="Password123"){

     $sqlop="SELECT * FROM data_table WHERE colm_9='$my_user'";
    $query_runop=mysqli_query($con,$sqlop) or die($query_runop."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runop)){
        $first_name=mysqli_real_escape_string($con,$row['colm_4']);
        $gender=mysqli_real_escape_string($con,$row['colm_5']);
        $phone=mysqli_real_escape_string($con,$row['colm_10']);
        $DateOfBirth=mysqli_real_escape_string($con,$row['colm_6']);

        $pieces = explode(" ", $first_name);
$fname=$pieces[0]; // piece1
$sname=$pieces[1];
    }
    $cheinnovations=mysqli_query($con,"SELECT * FROM e_learning_users WHERE email='$my_user'") or die(mysqli_error($con));

  if(mysqli_num_rows($cheinnovations)>=1){
    if($my_pass=="Password123"){

echo base64_encode("new_password");



    }else{
echo base64_encode("new_login");
//success login;

    }
  }else{

    $addVist=mysqli_query($con,"INSERT INTO e_learning_users VALUES(Null,
                                                  '$fname',
                                                  '$sname',
                                                  '$gender',
                                                  '$phone',
                                                  '$my_user',
                                                  '$DateOfBirth',
                                                  'Nairobi',
                                                  '',
                                                   '',
                                                   '',
                                                    '',
                                                    '', 
                                                    '',
                                                    '', 
                                                    'Password123',
                                                    'I agree', 
                                                    'active',
                                                    '$DateTime')") or die(mysqli_error($con));
    echo base64_encode("new_password");
  }




   }else{
    echo base64_encode("Wrong Password, Check the password sent to your email, the first letter is in uppercase");
   }

}else{
  
echo base64_encode("Wrong username or password, kindly try again or sign up");

}




























}
}


}else{


echo base64_encode("All fields required!");

}
?>