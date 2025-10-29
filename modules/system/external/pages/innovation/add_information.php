<?php
include "../../../../functions/security.php";
include "../../../../../connect.php";

//getting variables
     $Innovation_Id=base64_decode($_POST['innovation_Id']);
     $status="pending";
//$salt="A0007799Wagtreeyty";

        $fund="";
        $commn="";
        $patner="";
        $implement="";
        $innovators="";
       $fund=$_POST['fund'];
      	$commn=$_POST['commn'];
      	$patner=$_POST['patner'];
      	$implement=$_POST['implement'];
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


$checkExist=mysql_query("SELECT * FROM innovation_expectation WHERE Innovation_id='$Innovation_Id'") or die(mysql_error());

  if(mysql_num_rows($checkExist)!=0){

 $update=mysql_query("UPDATE innovation_expectation SET petnership_implementors='$new_implement',
   	  patnership_innovators='$new_patner', funding='$new_fund', communities='$new_commn' WHERE Innovation_id='$Innovation_Id'") or die(mysql_error());

}else{

$sql=mysql_query("INSERT INTO innovation_expectation VALUE('',
											'$Innovation_Id',
											'',
											'',
											'',
											'')") or die(mysql_error());

 $update=mysql_query("UPDATE innovation_expectation SET petnership_implementors='$new_implement',
   	  patnership_innovators='$new_patner', funding='$new_fund', communities='$new_commn' WHERE Innovation_id='$Innovation_Id'") or die(mysql_error());


}

?>