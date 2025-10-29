 <?php
 
 include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
  $online="";
  $offline_data="";
$statusof="Offline";
//$admin=encrypt(base64_encode("super_admin"),$key);
$users=$_POST['User_id'];
//echo $users;
if($users){
$update=mysqli_query($con,"UPDATE e_learning_admin SET status='$statusof' WHERE Id='$users'") or die(mysqli_error($con));
if($update){
 echo "success";
}else{
    echo "An error occoured";
}
}else{
    echo "An error occoured";
}
?>