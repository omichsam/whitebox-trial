<?php
include "../../../../functions/security.php";
include "../../../../../connect.php";

//getting variables
        $date = time();
       //$disclaimer="agreed";
     $my_user=$_POST['my_id'];
     //$status="submission";
//$salt="A0007799Wagtreeyty";
     $oldstatus="pending";
 $new_status=encrypt($oldstatus, $key);
       //$new_status="6b7336564f3937355236464b693953304e50714a36716f365858447669562b383932635950796863436b413d";
       //$new_status=encrypt($status, $key);
 $solution="";
     $impact="";
     $need="";
      $busines_model="";
     $target="";
     $requirements="";
        $property_attachement="";
     $attachments="";
$my_userde=encrypt($my_user,$key);
//echo $new_status;
$get_user=mysql_query("SELECT User_id FROM external_users WHERE Email_address='$my_userde'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
$user_id=$get['User_id'];

$cheinnovations=mysql_query("SELECT * FROM innovations_table WHERE user_id='$user_id' and Status='$new_status'") or die(mysql_error());

  if(mysql_num_rows($cheinnovations)>0){

$sqlx="SELECT * FROM innovations_table where user_id='$user_id' and Status='$new_status'";

    $query_runx=mysql_query($sqlx) or die($query_runx."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runx)){
     $Innovation_Id=$row['Innovation_Id'];
     $solution=$row['solution'];
     $impact=$row['impact'];
     $need=$row['need'];
     $busines_model=$row['busines_model'];
     $target=$row['target'];
     $requirements=$row['requirements'];
     $property_attachement=$row['property_attachement'];
     $attachments=$row['attachments'];
 }

if($solution && $impact && $need){


     //$requirements=$row['requirements'];
if($busines_model && $target && $requirements){
if($property_attachement && $attachments){
	echo "first_page";
}else{
	echo "fourth_page";
}

}else{
	echo "third_page";
}





}else{
echo "second_page";
}

    



}else{
	
echo "first_page";	
}




?>