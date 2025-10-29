<?php
include "../../../connect.php";
include("../../functions/security.php");
 session_start();
$date=time();
$new_date=encrypt($date,$key);
$user=$_SESSION["username"];
$chart_fname=encrypt($_POST['chart_fname'],$key);
$chart_sname=encrypt($_POST['chart_sname'],$key);
$olde_user=base64_decode($_POST['chart_fname'])." ".base64_decode($_POST['chart_sname']);
$chart_email=encrypt($_POST['charts_email'],$key);
$checkExist=mysqli_query($con,"SELECT * FROM chat_users WHERE email='$chart_email' and status='active'") or die(mysqli_error($con));

  if(mysql_num_rows($checkExist)>=1){
      
     	$get_user=mysqli_query($con,"SELECT * FROM chat_users WHERE email='$chart_email' and status='active'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$chart_id=$get['id'];
$hostd=$get['herihub_host'];
$herihub_host=base64_decode(decrypt($hostd,$key));
	$message=encrypt(base64_encode("Welcome back $olde_user,This is $herihub_host from Huduma WhiteBox, Thank you for reaching to us again, Lets proceed"),$key);
	 $sql=mysqli_query($con,"INSERT INTO chartbot VALUE('',
											'$chart_id',
											'$message',
											'admin',
											'$hostd',
											'$new_date')") or die(mysqli_error($con));
										
echo "success";
      
  }else{
      $new_hostd="";
      $new_herihub="";
      $sqlW="SELECT * FROM chat_users";
		$query_runW=mysqli_query($con,$sqlW)or die($query_runW."<br/><br/>".mysqli_error($con));
				while($row=mysqli_fetch_array($query_runW)){
		
		
	$herihub_user=base64_decode(decrypt($row['herihub_host'],$key));
	}

if($herihub_user=="Patrick"){
	$new_herihub="Susan";

}else if($herihub_user=="Susan"){

$new_herihub="Jane";

}else if($herihub_user=="Jane"){

$new_herihub="John";
}else if($herihub_user=="John"){
$new_herihub="Ann";
}else if($herihub_user=="Ann"){
	$new_herihub="michael";
}else if($herihub_user=="Michael"){
	$new_herihub="Lucy";
}else if($herihub_user=="Lucy"){
	$new_herihub="Milly";
}else if($herihub_user=="Milly"){
	$new_herihub="Nimo";
}else if($herihub_user=="Nimo"){
	$new_herihub="Patrick";
}else{
$new_herihub="Nimo";
}

     $new_hostd=encrypt(base64_encode($new_herihub),$key); 
      
      
      	$sql=mysqli_query($con,"INSERT INTO chat_users VALUE('',
											'$chart_email',
											'$chart_fname',
											'$chart_sname',
											'$new_hostd',
											'active',
											'$new_date')") or die(mysqli_error($con));
											
	$get_user=mysqli_query($con,"SELECT * FROM chat_users WHERE email='$chart_email' and status='active'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$chart_id=$get['id'];		
	$message=encrypt(base64_encode("Welcome $olde_user,This is $new_herihub from Huduma WhiteBox, Thank you for reaching to us, How can i help?"),$key);
	 $sql=mysqli_query($con,"INSERT INTO chartbot VALUE('',
											'$chart_id',
											'$message',
											'admin',
											'$new_hostd',
											'$new_date')") or die(mysqli_error($con));
										
echo "success";
      
  }



?>