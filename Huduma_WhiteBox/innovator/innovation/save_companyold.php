<?php
include("../../../base_connect.php");
include("../../../connect.php");

 //session_start();
  $loginuser=base64_decode($_SESSION["username"]);

 //	id
$today=time();
if($loginuser){


$get_user=mysqli_query($con,"SELECT * FROM users WHERE email='$loginuser'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$first_name=$get['first_name'];
$user_id=$get['id'];
$last_name=$get['last_name'];
$fullname=mysqli_real_escape_string($con,"user".$user_id."_".$first_name."_".$last_name."_".$today);

$company_name=mysqli_real_escape_string($con,$_POST['company_name']);
$company_registration_no=mysqli_real_escape_string($con,$_POST['company_registration_no']);
$kra_pin=mysqli_real_escape_string($con,$_POST['kra_pin']);
$company_type=mysqli_real_escape_string($con,$_POST['company_type']);
if($company_name && $company_registration_no && $kra_pin && $company_type){


$checkuser=mysqli_query($con,"SELECT * FROM company WHERE company_name='$company_name' and company_registration_no='$company_registration_no' and kra_pin='$kra_pin'") or die(mysqli_error($con));

  if(mysql_num_rows($checkuser)!=0){

echo base64_encode("Sorry, a company with the details you provided exists");

  }else{
$addVist=mysqli_query($con,"INSERT INTO company VALUES(
												  NULL,
												  '$user_id',
												  '$company_name',
												  '$company_registration_no',
												  '$kra_pin',
												  '$company_type',
												  '',
												  '$today',
												  '$today')") or die(mysqli_error($con));


echo base64_encode("success");

}

}else{
    echo base64_encode("All Fields required!");
}





}else{
?>
<script type="text/javascript">
// location.replace("index.php");
</script>
<?php

}


?>