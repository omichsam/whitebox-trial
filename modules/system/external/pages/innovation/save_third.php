<?php
include "../../../../functions/security.php";
include "../../../../../connect.php";



$requirements=$_POST['requirements'];
$busines_model=$_POST['busines_model'];
$target=$_POST['targeteds'];
$research_explain=$_POST['research_explain'];
$Innovation_Id=base64_decode($_POST['Innovation_Id']);
$date = time();

$new_date=encrypt($date, $key);
 // $Innovation_Id=base64_decode($_POST['Innovation_Id']);
//echo $Innovation_Id;
$reserch_e='';
if($research_explain==""){
	$reserch_e='';
}else{
$reserch_e=encrypt($research_explain,$key);
}


//echo $Innovation_Id;
if($Innovation_Id && $busines_model && $target && $requirements){
 $new_requirements=encrypt($requirements, $key);
  $new_target=encrypt($target, $key);
  //$new_research=encrypt($research, $key);
  $new_businesmodel=encrypt($busines_model, $key);


 $update=mysql_query("UPDATE innovations_table SET busines_model='$new_businesmodel' WHERE Innovation_Id='$Innovation_Id'") or die(mysql_error());
$updated=mysql_query("UPDATE innovations_table SET target='$new_target', Research_sources='$reserch_e' WHERE Innovation_Id='$Innovation_Id'") or die(mysql_error());
$updater=mysql_query("UPDATE innovations_table SET requirements='$new_requirements', date_added='$new_date' WHERE Innovation_Id='$Innovation_Id'") or die(mysql_error());

echo "success";
  



}else{
  echo "All fields required!";
}


?>