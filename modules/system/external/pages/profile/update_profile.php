<?php
include "../../../../../connect.php";
$my_user=$_POST['my_id'];
include("../../../../functions/security.php");
//$salt="A0007799Wagtreeyty";

$my_userde=encrypt($my_user, $key);

$phones=$_POST['phone'];
$first_names=$_POST['first_name'];
$last_names=$_POST['last_name'];
$Countys=base64_decode($_POST['County']);
$national_ids=$_POST['national_id'];
$highest_levels=$_POST['highest_level'];
$genders=$_POST['gender'];


$phone=encrypt($_POST['phone'],$key);
$first_name=encrypt($_POST['first_name'],$key);
$last_name=encrypt($_POST['last_name'],$key);
$County=encrypt($_POST['County'],$key);
$national_id=encrypt($_POST['national_id'],$key);
$highest_level=encrypt($_POST['highest_level'],$key);
$gender=encrypt($_POST['gender'],$key);




if($phones && $last_names && $national_ids && $Countys && $national_ids && $highest_levels && $first_names){
   // echo "no".$Countys."no";
$sqlity="SELECT id FROM county_table where County_name='$Countys'";
    $query_runity=mysqli_query($con,$sqlity) or die($query_runity."<br/><br/>".mysqli_error($con));
    while($row=mysqli_fetch_array($query_runity)){
    $County_id=$row['id'];
    }
   // echo $County_id;
if($County_id){
   	 $update=mysqli_query($con,"UPDATE external_users SET First_name='$first_name',
   	  Last_name='$last_name', County_id='$County_id', national_id='$national_id', education_level='$highest_level', Gender='$gender', Phone='$phone' WHERE Email_address='$my_userde'") or die(mysqli_error($con));
	   	 echo "successfull";
}else{
    
}
	   	
}else{
	echo "All values required!";
}

?>