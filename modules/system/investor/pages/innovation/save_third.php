<?php
include "../../../../functions/security.php";
include "../../../../../connect.php";



$requirements=$_POST['requirements'];
$busines_model=$_POST['busines_model'];
$target=$_POST['targeteds'];
$research_explain=$_POST['research_explain'];
$Innovation_Id=base64_decode($_POST['Innovation_Id']);
 // $Innovation_Id=base64_decode($_POST['Innovation_Id']);
//echo $Innovation_Id;
$reserch_e="";
if($research_explain){
	$reserch_e=encrypt($research_explain,$key);
}else{

}


//echo $Innovation_Id;
if($Innovation_Id && $busines_model && $target && $requirements){
 $new_requirements=encrypt($requirements, $key);
  $new_target=encrypt($target, $key);
  //$new_research=encrypt($research, $key);
  $new_businesmodel=encrypt($busines_model, $key);
$checkExist=mysql_query("SELECT * FROM Innovations_information WHERE Innovation_Id ='$Innovation_Id'") or die(mysql_error());

  if(mysql_num_rows($checkExist)!=0){

 echo "This innovation exists!";

}else{

$date = date('Y-m-d');
$sql=mysql_query("INSERT INTO Innovations_information VALUE('',
									                      '$Innovation_Id',
									                      '',
									                      '$new_businesmodel',
									                      '$new_target',
									                      '$reserch_e',
									                      '$new_requirements',
									                      '')") or die(mysql_error());
echo "success";
  
}


}else{
  echo "All fields required!";
}


?>