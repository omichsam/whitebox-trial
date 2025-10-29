<?php
include("../../../base_connect.php");
include("../../../connect.php");
//getting variables
 // session_start();
  $loginuser=base64_decode($_SESSION["username"]);

 // id
$today=time();
if($loginuser){


$get_user=mysqli_query($con,"SELECT * FROM users WHERE email='$loginuser'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$first_name=$get['first_name'];
$user_id=$get['id'];
$last_name=$get['last_name'];
}
       //$new_status="6b7336564f3937355236464b693953304e50714a36716f365858447669562b383932635950796863436b413d";
       //$new_status=encrypt($status, $key);
 $solution="";
     $impact="";
     $need="";
      $busines_model="";
     $target="";
     $requirements="";
        $property_attachement="";
     $attachments="";
//$my_userde=encrypt($my_user,$key);
//echo base64_encode($new_status;


$cheinnovations=mysqli_query($con,"SELECT * FROM innovations_table WHERE user_id='$user_id' and Status='pending'") or die(mysqli_error($con));

  if(mysqli_num_rows($cheinnovations)>0){

$sqlx="SELECT * FROM innovations_table where user_id='$user_id' and Status='pending'";

    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
     $Innovation_Id=$row['Innovation_Id'];
     $solution=$row['solution'];
     $impact=$row['impact'];
     $need=$row['need'];
     $busines_model=$row['busines_model'];
     $target=$row['target'];
     $requirements=$row['requirements'];
     $property_attachement=$row['property_attachement'];
     $attachments=$row['attachments'];
     $accepts_terms_1=$row['accepts_terms_1'];
    $intellectual_protection=$row['intellectual_protection'];


     $Innovation_name=$row['Innovation_name'];
     $sector_id=$row['sector_id'];
     $InnovationBig4Sector=$row['InnovationBig4Sector'];
     $innovator_type=$row['innovator_type'];
 }
if($intellectual_protection && $intellectual_protection){

if($Innovation_name &&  $sector_id && $InnovationBig4Sector && $innovator_type){

if($solution && $impact && $need){


     //$requirements=$row['requirements'];
if($busines_model && $target && $requirements){

    if($busines_model && $requirements){


    
if($property_attachement && $attachments){
	echo base64_encode("first_page");
}else{
	echo base64_encode("sixth_page");
}

}else{
	echo base64_encode("fifth_page");
}

}else{
echo base64_encode("fourth_page");
}



}else{
echo base64_encode("third_page");
}
}else{
  echo base64_encode("second_page");  
}
    
}else{
  echo base64_encode("first_page");  
}


}else{
	
echo base64_encode("first_page");	
}




?>