<?php

include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
//$my_time=$_POST['my_time'];

$field=base64_decode($_POST['field']);
$role=base64_decode($_POST['role']);
$target=base64_decode($_POST['target']);
$sqlxd="SELECT * FROM presentation where id='$target'";
   //and status='active'
    $query_runxed=mysqli_query($con,$sqlxd) or die($query_runxed."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxed)){
      $account=$row['account_type'];
}

if($account=="Innovator"){
   if($field=="micro_user"){
         $update=mysqli_query($con,"UPDATE presentation SET $field='$role',micro_presenter='$role' Where id='$target'") or die(mysqli_error($con));

	echo "success";

   }else{
       $update=mysqli_query($con,"UPDATE presentation SET $field='$role',cam_presenter='$role' Where id='$target'") or die(mysqli_error($con));
	echo "success";
 
   }
   
    
}else{
   $update=mysqli_query($con,"UPDATE presentation SET $field='$role' Where id='$target'") or die(mysqli_error($con));

	echo "success";

}

?>