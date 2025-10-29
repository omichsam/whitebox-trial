<?php
include "../../../../functions/security.php";
include "../../../../../connect.php";



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
$originality=encrypt("yes",$key);
  $expalin=encrypt($new_expalin, $key);

  }else{

  }
  $need=encrypt($new_need, $key);
  $impact=encrypt($new_impact, $key);
  $solution=encrypt($new_solution, $key);
$checkExist=mysql_query("SELECT * FROM innovation_details WHERE solution ='$solution' and impact ='$impact' and need ='$need'") or die(mysql_error());

  if(mysql_num_rows($checkExist)!=0){

 echo "This innovation exists!";

}else{

$date = date('Y-m-d');
$sql=mysql_query("INSERT INTO innovation_details VALUE('',
                      '$Innovation_Id',
                      '$solution',
                      '$impact',
                      '$originality',
                      '$expalin',
                      '$need')") or die(mysql_error());
echo "success";
  
}


}else{
  echo "All fields required!";
}


?>