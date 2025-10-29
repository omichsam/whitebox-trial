<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";






//$salt="A0007799Wagtreeyty";
//decision:decision,innovation:innovation
$decision=base64_decode($_POST['decision']);
//$field=base64_decode($_POST['field']);
/*$user=base64_decode($_POST['user']);
$get_user=mysqli_query($con,"SELECT Id FROM administrators WHERE user_name='$user'") or die(mysqli_error());
$get=mysqli_fetch_assoc($get_user);
$user_id=$get['Id'];*/
$innovation=base64_decode($_POST['innovation']);
$my_decision=$decision;
//$my_innovation=encrypt($innovation, $key);
if($decision && $innovation){
 $update=mysqli_query($con,"UPDATE innovations_table SET Status='$my_decision' WHERE Innovation_Id='$innovation'") or die(mysqli_error($con));
 echo "success";

	
}else{



}






?>