 <?php
 
 include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
  $online="";
  $offline_data="";
$statusof="deactivated";
//$admin=encrypt(base64_encode("super_admin"),$key);
$users=$_POST['User_id'];
//echo $users;
if($users){
$update=mysqli_query($con,"UPDATE administrators SET status='$statusof' WHERE Id='$users'") or die(mysqli_error($con));
if($update){
 echo "success";
}else{
    echo "An error occoured";
}
}else{
    echo "An error occoured";
}
?>