<?php
include "../../../functions/security.php";
include "../../../../../connect.php";
$salt="A0007799Wagtreeyty";
//getting variables
        $date = date('Y-m-d');
       $disclaimer="agreed";
     $my_user=$_POST['my_user'];
     $status="Submition";
//$salt="A0007799Wagtreeyty";
$username=$my_user.$salt;
$new_username=sha1($username);
$my_userde=md5($new_username);
$get_user=mysql_query("SELECT User_id FROM external_users WHERE Email_address='$my_userde'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
$user_id=$get['User_id'];



      	$category=$_POST['category'];
       $fund=$_POST['fund'];
      	$commn=$_POST['commn'];
      	$patner=$_POST['patner'];
      	$implement=$_POST['implement'];
      	$staged=$_POST['staged'];
      	$inno_name=$_POST['inno_name'];
      	$innovators=$_POST['innovators'];
      	$md_implement="";
      	 $md_fund="";
      	  $md_commn="";
      	  $md_patners="";
      	if($fund==""){
      
      	}else{
         $new_fund=$fund.$salt;
         $shar_fund=sha1($new_fund);
         $md_fund=md5($shar_fund);
      	}
      	if($commn==""){

      	}else{
        $new_commn=$commn.$salt;
        $sharcommn=sha1($new_commn);
        $md_commn=md5($sharcommn);
      	}

      	if($patner==""){
        
      	}else{
      		$new_patner=$patner.$salt;
      		$shar_patners=sha1($new_patner);
      		$md_patners=md5($shar_patners);
      	}
      	if($implement==""){

      	}else{
      		$new_implement=$implement.$salt;
      		$shar_implement=sha1($new_implement);
      		$md_implement=md5($shar_implement);
      	}
      	if($innovators==""){


      	}else{
      		$new_innovators=$innovators.$salt;
      		$shar_innovators=sha1($new_innovators);
      	    $md_innovators=md5($shar_innovators);
      	}
      	//salt adding
      	$new_status=$status.$salt;
      	$new_date=$date.$salt;
      	$new_disclimer=$disclaimer.$salt;
      	$new_category=$category.$salt;
      	$new_staged=$staged.$salt;
      	$new_innovation=$inno_name.$salt;
      	
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




$checkExist=mysql_query("SELECT * FROM innovations_table WHERE Innovation_name='$md_innovationname' and Category='$md_category' and stage='$md_stage' and user_id='$user_id'") or die(mysql_error());

  if(mysql_num_rows($checkExist)!=0){

 echo "This innovation exists!";

}else{

	
$sql=mysql_query("INSERT INTO innovations_table VALUE('',
											'$user_id',
											'$md_innovationname',
											'$md_category',
											'$md_stage',
											'$md_discliamer',
											'$md_status',
											'$md_date')") or die(mysql_error());

$get_innovation=mysql_query("SELECT * FROM innovations_table WHERE Innovation_name='$md_innovationname' and Category='$md_category' and stage='$md_stage' and user_id='$user_id'") or die(mysql_error());
$get=mysql_fetch_assoc($get_innovation);
$Innovation_Id=$get['Innovation_Id'];

$sql=mysql_query("INSERT INTO innovation_expectation VALUE('',
											'$Innovation_Id',
											'',
											'',
											'',
											'')") or die(mysql_error());

 $update=mysql_query("UPDATE innovation_expectation SET petnership_implementors='$md_implement',
   	  patnership_innovators='$md_patners', funding='$md_fund', communities='$md_commn' WHERE Innovation_id='$Innovation_Id'") or die(mysql_error());

if($innovators){

$sql=mysql_query("INSERT INTO innovators_partners VALUE('',
											'$Innovation_Id',
											'$md_innovators')") or die(mysql_error());
}else{

}

echo "success";	
}




?>