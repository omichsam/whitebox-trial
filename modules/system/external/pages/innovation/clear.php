<?php
include "../../../../functions/security.php";
include "../../../../../connect.php";

//getting variables
        $date = time();
       //$disclaimer="agreed";
     $my_user=$_POST['my_id'];
     //$status="submission";
//$salt="A0007799Wagtreeyty";
     // $new_status="ks6VO975R6FKi9S0NPqJ6qo6XXDviV+892cYPyhcCkA=";
 $oldstatus="pending";
 $and=encrypt($oldstatus, $key);
// echo $and;
//echo $new_status;
//$old=decrypt($new_status, $key);
//echo $old;
$my_userde=encrypt($my_user,$key);
$get_user=mysql_query("SELECT User_id FROM external_users WHERE Email_address='$my_userde'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
$user_id=$get['User_id'];
$sqlx="SELECT * FROM innovations_table where user_id='$user_id' and Status='$and'" ;

    $query_runx=mysql_query($sqlx) or die($query_runx."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runx)){
     $Innovation_Id=$row['Innovation_Id'];
          $status=$row['Status'];
//echo $status;
 }

$delete_innovation=mysql_query("DELETE FROM innovations_table WHERE Innovation_Id='$Innovation_Id'") or die(mysql_error());
$delete_patners=mysql_query("DELETE FROM innovators_partners WHERE Innovation_Id='$Innovation_Id'") or die(mysql_error());
$delete_expectations=mysql_query("DELETE FROM innovation_expectation WHERE Innovation_Id='$Innovation_Id'") or die(mysql_error());


echo "success";


?>