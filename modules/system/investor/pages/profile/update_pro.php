<?php

include "../../../../../connect.php";
$my_user=$_POST['my_id'];
include("../../../../functions/security.php");
//$salt="A0007799Wagtreeyty";

$my_userde=encrypt($my_user, $key);

$phones=$_POST['phone'];
$first_names=$_POST['first_name'];
$last_names=$_POST['last_name'];
$Countys=$_POST['County'];
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





if($phones && $first_names && $last_names && $Countys && $national_ids && $highest_levels && $genders){
$sqlity="SELECT id FROM county_table where County_name ='$County'";
    $query_runity=mysql_query($sqlity) or die($query_runity."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runity)){
    $County_id=$row['id'];
  

   	 $update=mysql_query("UPDATE external_users SET First_name='$first_name',
   	  Last_name='$last_name', County_id='$County_id', national_id='$national_id', education_level='$highest_level', Gender='$gender', Phone='$phone' WHERE Email_address='$my_userde'") or die(mysql_error());
	   	 echo "successfull";

	   	}
}else{
	echo "All values required!";
}

?>