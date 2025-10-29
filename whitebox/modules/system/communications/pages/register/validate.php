<?php
include"../../../../connect.php";

$idno=mysqli_real_escape_string($con,$_POST['idno']);
if($idno){
$get_account=mysqli_query($con,"SELECT * FROM visitors WHERE national_id ='$idno'") or die(mysqli_error($con));
	$num=mysqli_num_rows($get_account);
	if($num>=1){echo "exist";
}else{
echo "noexist";


//mysqli_close(@mysqli_connect);
}
}else{

}
