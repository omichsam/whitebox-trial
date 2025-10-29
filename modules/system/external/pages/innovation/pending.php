<?php
include "../../../../functions/security.php";
include "../../../../../connect.php";

//getting variables
        $date = time();
       //$disclaimer="agreed";
     $my_user=$_POST['my_id'];
     //$status="submission";
//$salt="A0007799Wagtreeyty";
       $status="pending";
       $new_status=encrypt($status, $key);
    ;
$my_userde=encrypt($my_user,$key);
$get_user=mysql_query("SELECT User_id FROM external_users WHERE Email_address='$my_userde'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
$user_id=$get['User_id'];
$sqlx="SELECT * FROM innovations_table where user_id='$user_id' and Status='$new_status'";
$counter=0;
    $query_runx=mysql_query($sqlx) or die($query_runx."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runx)){
     $Innovation_Id=base64_encode($row['Innovation_Id']);
     echo $Innovation_Id;
    }





?>