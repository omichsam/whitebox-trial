<?php
include "../../../../functions/security.php";
include "../../../../../connect.php";


  
  $new_stage=$_POST['new_stage'];
  $mode=$_POST['mode'];
  $new_need=$_POST['new_need'];
  $new_solution=$_POST['new_solution'];
  $new_expalin=$_POST['new_expalin'];
  $new_impact=$_POST['new_impact'];
  $Innovation_Id=base64_decode($_POST['Innovation_Id']);
  $originality=encrypt("no",$key);
  $expalin="";

//echo $Innovation_Id;
if($Innovation_Id && $new_solution && $new_impact && $new_need){
  if($new_expalin){
$originality=encrypt("Yes",$key);
  $expalin=encrypt($new_expalin, $key);

  }else{

  }
   $date = time();
   $stage=encrypt($new_stage, $key);
  $need=encrypt($new_need, $key);
  $impact=encrypt($new_impact, $key);
  $solution=encrypt($new_solution, $key);
$new_date=encrypt($date, $key);
$update=mysql_query("UPDATE innovations_table SET need='$need', solution='$solution' WHERE Innovation_Id='$Innovation_Id'") or die(mysql_error());
  $updated=mysql_query("UPDATE innovations_table SET impact='$impact', stage='$stage' WHERE Innovation_Id='$Innovation_Id'") or die(mysql_error());
   $updates=mysql_query("UPDATE innovations_table SET originality_explanation='$expalin' WHERE Innovation_Id='$Innovation_Id'") or die(mysql_error());
  $updateds=mysql_query("UPDATE innovations_table SET originality='$originality',date_added='$new_date' WHERE Innovation_Id='$Innovation_Id'") or die(mysql_error());

echo "success";


}else{
  echo "All fields required!";
}


?>