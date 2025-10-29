<?php
include("../../../base_connect.php");
include("../../../connect.php");

 //session_start();
  $loginuser=base64_decode($_SESSION["username"]);

 //	id
$today=$Today;
if($loginuser){


$get_user=mysqli_query($con,"SELECT * FROM users WHERE email='$loginuser'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);

$user_id=$get['id'];


$company_name=mysqli_real_escape_string($con,$_POST['company_name']);
$company_registration_no=mysqli_real_escape_string($con,$_POST['company_registration_no']);
$kra_pin=mysqli_real_escape_string($con,$_POST['kra_pin']);
$company_type=mysqli_real_escape_string($con,$_POST['company_type']);
if($company_name && $company_registration_no && $kra_pin && $company_type){


$checkuser=mysqli_query($con,"SELECT * FROM company WHERE user_id='$user_id'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkuser)!=0){
$update=mysqli_query($con,"UPDATE company SET company_name='$company_name', company_registration_no='$company_registration_no', company_type='$company_type',kra_pin='$kra_pin' WHERE user_id='$user_id'");
//echo base64_encode("Sorry, a company with the details you provided exists");
echo base64_encode("success");
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