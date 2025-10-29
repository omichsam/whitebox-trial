<?php
include "../../../../functions/security.php";
include "../../../../../connect.php";

//getting variables
        $date = time();
       $disclaimer="agreed";
     $my_user=$_POST['my_user'];
     $status="Submition";
//$salt="A0007799Wagtreeyty";
    ;
$my_userde=encrypt($my_user,$key);
$get_user=mysql_query("SELECT User_id FROM external_users WHERE Email_address='$my_userde'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
$user_id=$get['User_id'];

        $fund="";
        $commn="";
        $patner="";
        $implement="";
        $innovators="";
      	$category=$_POST['category'];
       $fund=$_POST['fund'];
      	$commn=$_POST['commn'];
      	$patner=$_POST['patner'];
      	$implement=$_POST['implement'];
      	$staged=$_POST['staged'];
      	$inno_name=$_POST['inno_name'];
      	$innovators=$_POST['innovators'];
      	$md_implement="";
      	 $new_fund="";
      	  $new_commn="";
      	  $md_patners="";
          $new_patner="";
          $new_implement="";
          $new_innovators="";
      	if($fund==""){
      
      	}else{
         $new_fund=encrypt($fund, $key);
         
      	}
      	if($commn==""){

      	}else{
        $new_commn=encrypt($commn, $key);
    
      	}

      	if($patner==""){
        
      	}else{
      		$new_patner=encrypt($patner, $key);
      	
      	}
      	if($implement==""){

      	}else{
      		$new_implement=encrypt($implement, $key);
      		
      	}
      	if($innovators==""){


      	}else{
      		$new_innovators=encrypt($innovators, $key);
      	  
      	}
   
      	//salt adding
      	$new_status=encrypt($status, $key);
      	$new_date=encrypt($date, $key);
      	$new_disclimer=encrypt($disclaimer, $key);
      	$new_category=encrypt($category, $key);
      	$new_staged=encrypt($staged, $key);
      	$new_innovation=encrypt($inno_name, $key);
      	/*
      	//sha1 encryption
      	$shar_satatus=sha1($new_status);
        $shar_date=sha1($new_date);
        $shar_disclaimer=sha1($new_disclimer);
        $shar_category=sha1($new_category);
      	$shar_stage=sha1($new_staged);
      	$shar_inno_name=sha1($new_innovation);
      	
      	//md5 encription
      	
      	$md_status=md5($shar_satatus);
      	$md_date=md5($shar_date);
      	$md_category=md5($shar_category);
        $md_stage=md5($shar_stage);
        $md_innovationname=md5($shar_inno_name);
        $md_discliamer=md5($shar_disclaimer);
*/



$checkExist=mysql_query("SELECT * FROM innovations_table WHERE Innovation_name='$new_innovation' and Category='$new_category' and stage='$new_staged' and user_id='$user_id'") or die(mysql_error());

  if(mysql_num_rows($checkExist)!=0){

 echo "This innovation exists!";

}else{

	
$sql=mysql_query("INSERT INTO innovations_table VALUE('',
											'$user_id',
											'$new_innovation',
											'$new_category',
											'$new_staged',
											'$new_disclimer',
											'$new_status',
											'$new_date')") or die(mysql_error());

$get_innovation=mysql_query("SELECT * FROM innovations_table WHERE Innovation_name='$new_innovation' and Category='$new_category' and stage='$new_staged' and user_id='$user_id'") or die(mysql_error());
$get=mysql_fetch_assoc($get_innovation);
$Innovation_Id=$get['Innovation_Id'];

$sql=mysql_query("INSERT INTO innovation_expectation VALUE('',
											'$Innovation_Id',
											'',
											'',
											'',
											'')") or die(mysql_error());

 $update=mysql_query("UPDATE innovation_expectation SET petnership_implementors='$new_implement',
   	  patnership_innovators='$new_patner', funding='$new_fund', communities='$new_commn' WHERE Innovation_id='$Innovation_Id'") or die(mysql_error());

if($innovators){

$sql=mysql_query("INSERT INTO innovators_partners VALUE('',
											'$Innovation_Id',
											'$new_innovators')") or die(mysql_error());
}else{

}

echo "success";	
}




?>