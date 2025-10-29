<?php
include "../../../../functions/security.php";
include "../../../../../connect.php";

//getting variables
     //$Innovation_Id:Innovation_Id,
     $category=$_POST['innovation_category'];
     $company_name=$_POST['company_name'];
    $Innovation_name=$_POST['Innovation_name'];
     $date = time();
     $disclaimer="agreed";
   $my_user=$_POST['my_id'];
   //echo $my_user;

     $mode=base64_decode($_POST['mode']);
     $status="pending";
//$salt="A0007799Wagtreeyty";
  
$my_userde=encrypt($my_user,$key);
$get_user=mysql_query("SELECT User_id FROM external_users WHERE Email_address='$my_userde'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
$user_id=$get['User_id'];
//echo $user_id;
/*
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
   */
      	//salt adding
        if($company_name){
          $company=encrypt($company_name, $key);
        }else{
          $company="";
        }
      	$new_status=encrypt($status, $key);
      	$new_date=encrypt($date, $key);
      	$new_disclimer=encrypt($disclaimer, $key);
      	$new_category=encrypt($category, $key);

      	
      	$new_innovation=encrypt($Innovation_name, $key);
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
if($mode=="save"){
  $oldstatus="pending";
 $new_status=encrypt($oldstatus, $key);
$cheinnovations=mysql_query("SELECT * FROM innovations_table WHERE user_id='$user_id'") or die(mysql_error());

  if(mysql_num_rows($cheinnovations)>1){

 echo "Soory! you cannot submit more than two innovations";
}else{

$checkExist=mysql_query("SELECT * FROM innovations_table WHERE Innovation_name='$new_innovation' and Category='$new_category' and user_id='$user_id'") or die(mysql_error());

  if(mysql_num_rows($checkExist)!=0){


$checkinno=mysql_query("SELECT * FROM innovations_table WHERE Innovation_name='$new_innovation' and Category='$new_category' and user_id='$user_id' and status='$new_status'") or die(mysql_error());

  if(mysql_num_rows($checkinno)!=0){
$get_innovationd=mysql_query("SELECT * FROM innovations_table WHERE Innovation_name='$new_innovation' and Category='$new_category' and user_id='$user_id' and status='$new_status'") or die(mysql_error());
$get=mysql_fetch_assoc($get_innovationd);
$Innovation_Id=$get['Innovation_Id'];

 $update=mysql_query("UPDATE innovations_table SET Innovation_name='$new_innovation',
      Category='$new_category', Company='$company', date_added='$new_date' WHERE Innovation_Id='$Innovation_Id'") or die(mysql_error());
if($update){
echo "success";
 /*$update=mysql_query("UPDATE innovation_expectation SET petnership_implementors='$new_implement',
      patnership_innovators='$new_patner', funding='$new_fund', communities='$new_commn' WHERE Innovation_id='$Innovation_Id'") or die(mysql_error());*/
}else{

}

}else{
  echo "This innovation exists!";
}


 

}else{
	
$sql=mysql_query("INSERT INTO innovations_table VALUE('',
                              											'$user_id',
                              											'$new_innovation',
                              											'$new_category',
                              											'$company',
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
                              											'$new_disclimer',
                              											'$new_status',
                              											'$new_date')") or die(mysql_error());

$get_innovation=mysql_query("SELECT * FROM innovations_table WHERE Innovation_name='$new_innovation' and Category='$new_category' and user_id='$user_id'") or die(mysql_error());
$get=mysql_fetch_assoc($get_innovation);
$Innovation_Id=$get['Innovation_Id'];
/*
$sql=mysql_query("INSERT INTO innovation_expectation VALUE('',
											'$Innovation_Id',
											'',
											'',
											'',
											'')") or die(mysql_error());

 $update=mysql_query("UPDATE innovation_expectation SET petnership_implementors='$new_implement',
   	  patnership_innovators='$new_patner', funding='$new_fund', communities='$new_commn' WHERE Innovation_id='$Innovation_Id'") or die(mysql_error());
 */

/*if($innovators){

$sql=mysql_query("INSERT INTO innovators_partners VALUE('',
											'$Innovation_Id',
											'$new_innovators')") or die(mysql_error());
}else{

}
*/
echo "success";	
}

}
}else{

    $Innovation_Id=base64_decode($_POST['Innovation_Id']);
 $update=mysql_query("UPDATE innovations_table SET Innovation_name='$new_innovation',
      Category='$new_category', Company='$company', date_added='$new_date' WHERE Innovation_Id='$Innovation_Id'") or die(mysql_error());
if($update){
echo "success";
 /*$update=mysql_query("UPDATE innovation_expectation SET petnership_implementors='$new_implement',
      patnership_innovators='$new_patner', funding='$new_fund', communities='$new_commn' WHERE Innovation_id='$Innovation_Id'") or die(mysql_error());*/
}else{

}


}

?>