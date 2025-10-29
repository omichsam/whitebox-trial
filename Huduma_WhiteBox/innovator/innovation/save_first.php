<?php
include("../../../base_connect.php");
include("../../../connect.php");
$loginuser=base64_decode($_SESSION["username"]);
$today=time();
$new_companyid=0;
if($loginuser){
$get_user=mysqli_query($con,"SELECT * FROM users WHERE email='$loginuser'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$first_name=$get['first_name'];
$user_id=$get['id'];
$last_name=$get['last_name'];
$fullname=mysqli_real_escape_string($con,"user".$user_id."_".$first_name."_".$last_name."_".$today);
$interlect_ip=mysqli_real_escape_string($con,$_POST['ip']);
$terms_and_conditions=mysqli_real_escape_string($con,$_POST['terms_and_conditions']);
$innovator_type=mysqli_real_escape_string($con,$_POST['innovator_type']);
$innovationName=mysqli_real_escape_string($con,$_POST['innovationName']);
$company_id=mysqli_real_escape_string($con,$_POST['company_id']);
$company_name=mysqli_real_escape_string($con,$_POST['company_name']);
$company_registration_no=mysqli_real_escape_string($con,$_POST['company_registration_no']);
$kra_pin=mysqli_real_escape_string($con,$_POST['kra_pin']);
$company_type=mysqli_real_escape_string($con,$_POST['company_type']);
$sector_id=mysqli_real_escape_string($con,$_POST['sector_id']);
$InnovationBig4Sector=mysqli_real_escape_string($con,$_POST['InnovationBig4Sector']);
/*
$InnovationLevel=mysqli_real_escape_string($con,$_POST['InnovationLevel']);
$Problemidentified=mysqli_real_escape_string($con,$_POST['Problemidentified']);
$ProblemSolution=mysqli_real_escape_string($con,$_POST['ProblemSolution']);
$CommercialModel=mysqli_real_escape_string($con,$_POST['CommercialModel']);
$Feasibility=mysqli_real_escape_string($con,$_POST['Feasibility']);
$HowItWorks=mysqli_real_escape_string($con,$_POST['HowItWorks']);
$intellectual_protection=mysqli_real_escape_string($con,$_POST['intellectual_protection']);
$InnovationWebsite=mysqli_real_escape_string($con,$_POST['InnovationWebsite']);
$YoutubepPortfolioLinks=mysqli_real_escape_string($con,$_POST['YoutubepPortfolioLinks']);
$Affiliations=mysqli_real_escape_string($con,$_POST['Affiliations']);
$PastAssociation=mysqli_real_escape_string($con,$_POST['PastAssociation']);
$terms_and_conditions_2=mysqli_real_escape_string($con,$_POST['terms_and_conditions_2']);*/
$property="";
if($interlect_ip && $terms_and_conditions && $innovator_type && $innovationName && $sector_id && $InnovationBig4Sector){

//get sector
$get_sector=mysqli_query($con,"SELECT id FROM sectors WHERE name='$sector_id'") or die(mysqli_error($con));
$getid=mysqli_fetch_assoc($get_sector);

 $newsector_id=$getid['id'];
 $get_bigfoursectors=mysqli_query($con,"SELECT id FROM bigfoursectors WHERE Name='$InnovationBig4Sector'") or die(mysqli_error($con));
$getbigid=mysqli_fetch_assoc($get_bigfoursectors);

 $bg4id_id=$getbigid['id'];
// get company id

 if($company_id){

 $get_bigcompanysectors=mysqli_query($con,"SELECT id FROM company WHERE company_name='$company_id'") or die(mysqli_error($con));
$getbivid=mysqli_fetch_assoc($get_bigcompanysectors);

 $new_companyid=$getbivid['id'];
}else{
$new_companyid=0;
}


if($innovator_type=="Company" && $company_name && $company_registration_no && $kra_pin && $company_type){

$checkuser=mysqli_query($con,"SELECT * FROM company WHERE company_name='$company_name' and company_registration_no='$company_registration_no' and kra_pin='$kra_pin'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkuser)!=0){

 $get_bigcompanysectors=mysqli_query($con,"SELECT id FROM company WHERE company_name='$company_name' and company_registration_no='$company_registration_no' and kra_pin='$kra_pin'") or die(mysqli_error($con));
$getbivid=mysqli_fetch_assoc($get_bigcompanysectors);

 $new_companyid=$getbivid['id'];

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


 $get_bigcompanysectors=mysqli_query($con,"SELECT id FROM company WHERE company_name='$company_name' and company_registration_no='$company_registration_no' and kra_pin='$kra_pin' and user_id='$user_id'") or die(mysqli_error($con));
$getbivid=mysqli_fetch_assoc($get_bigcompanysectors);

 $new_companyid=$getbivid['id'];



  }




}else{

}












/*

if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
       if(isset($_FILES['InnovationAttachment']['name'])){
       		$atachment =$_FILES['InnovationAttachment']['name'];
         

			$picsize =$_FILES['InnovationAttachment']['size'];
			$pictmp =$_FILES['InnovationAttachment']['tmp_name'];
		//	@unlink('../../../../'.$OldprofilePic.'');
			 //@mkdir("../../images/innovators/");	  									  		  
	 		 @move_uploaded_file($pictmp,"../../documents/propertyatachments/".$_FILES['InnovationAttachment']['name']);
	 		 if($atachment){
	 		  rename("../../documents/propertyatachments/".$_FILES['InnovationAttachment']['name'],"../../documents/propertyatachments/".$fullname.".pdf");
	 		}else{

	 		}
		   // $profile="im$new_names;
	 		 $new_names=$fullname.".pdf";
//$update=mysqli_query($con,"UPDATE users SET pic='$new_names' WHERE email='$loginuser'") or die(mysqli_error($con));
	   	
	   	}
	   	$property=$new_names;

       }else{
       	//$profile=$OldprofilePic;
       }
	   	*/
$checkuser=mysqli_query($con,"SELECT * FROM innovations_table WHERE user_id='$user_id' and Status='pending'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkuser)!=0){




$update=mysqli_query($con,"UPDATE innovations_table SET Innovation_name='$innovationName',sector_id='$newsector_id',InnovationBig4Sector='$bg4id_id',innovator_type='$innovator_type',company_id='$new_companyid' WHERE user_id='$user_id' and status='pending'") or die(mysqli_error($con));

//echo base64_encode("Innovation exist");


   
echo base64_encode("success");
}else{
	$addVist=mysqli_query($con,"INSERT INTO innovations_table VALUES( NULL,
		'$user_id',
		'$innovationName',
		'$newsector_id',
		'$bg4id_id',
		'$innovator_type',
		'$new_companyid',
		'',
		'',
		'',
		'',
		'',
		'',
		'',
		'',
		'',
		'',
		'',
		'',
		'',
		'',
		'pending',
		'$terms_and_conditions',
		'',
		'$interlect_ip',
		'$today')") or die(mysqli_error($con));

echo base64_encode("success");
}






}else{
	//echo "error";
}
   









}else{
?>
<script type="text/javascript">
// location.replace("index.php");
</script>
<?php

}


?>