<?php
include "../../../connect.php";
include("../../functions/security.php");
 session_start();
$date=time();
$new_date=$date;
//$user=base64_decode($_SESSION["username"]);

$user=base64_decode($_POST['user']);
if($user){
//echo $user;
$get_user=mysqli_query($con,"SELECT * FROM external_users WHERE Email_address='$user'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);

$First_name=$get['First_name'];
$Last_name=$get['Last_name'];
$national_id=$get['national_id'];
$Gender=$get['Gender'];
$County_id=$get['County_id'];
$Phone=$get['Phone'];

$olde_user=$First_name." ".$Last_name;
$chart_email=$user;
$checkExist=mysqli_query($con,"SELECT * FROM chat_users WHERE email='$chart_email' and status='active'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)>=1){
      
     	$get_user=mysqli_query($con,"SELECT * FROM chat_users WHERE email='$chart_email' and status='active'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$chart_id=$get['id'];
$hostd=$get['herihub_host'];
$herihub_host=$hostd;
	$message="Welcome back $olde_user,This is $herihub_host from ICT-Authority, Thank you for reaching to us again, Lets proceed";
	 $sql=mysqli_query($con,"INSERT INTO chartbot VALUE(null,
											'$chart_id',
											'$message',
											'admin',
											'$hostd',
											'system',
											'',
											'$County_id',
											'',
											'$new_date')") or die(mysqli_error($con));
										
echo "success";
      
  }else{
      $new_hostd="";
      $new_chartuser="";
      $sqlW="SELECT * FROM chat_users";
		$query_runW=mysqli_query($con,$sqlW)or die($query_runW."<br/><br/>".mysqli_error($con));
				while($row=mysqli_fetch_array($query_runW)){
		
		
	$herihub_user=$row['herihub_host'];
	}

/*
if($herihub_user=="Patrick"){
	$new_chartuser="Susan";

}else if($herihub_user=="Susan"){

$new_chartuser="Jane";

}else if($herihub_user=="Jane"){

$new_chartuser="John";
}else if($herihub_user=="John"){
$new_chartuser="Ann";
}else if($herihub_user=="Ann"){
	$new_chartuser="michael";
}else if($herihub_user=="Michael"){
	$new_chartuser="Lucy";
}else if($herihub_user=="Lucy"){
	$new_chartuser="Milly";
}else if($herihub_user=="Milly"){
	$new_chartuser="Nimo";
}else if($herihub_user=="Nimo"){
	$new_chartuser="Patrick";
}else{
$new_chartuser="Nimo";
}
*/
     $new_hostd="Whitebox"; 
      
      
      	$sql=mysqli_query($con,"INSERT INTO chat_users VALUE(null,
											'$chart_email',
											'$First_name',
											'$Last_name',
											'$new_hostd',
											'active',
											'$new_date')") or die(mysqli_error($con));
											
	$get_user=mysqli_query($con,"SELECT * FROM chat_users WHERE email='$chart_email' and status='active'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$chart_id=$get['id'];		
	$message="Welcome $olde_user,This is $new_chartuser from ICT-Authority, Thank you for reaching to us, How can i help?";
	 $sql=mysqli_query($con,"INSERT INTO chartbot VALUE(null,
											'$chart_id',
											'$message',
											'admin',
											'$new_hostd',
											'system',
											'',
											'$County_id',
											'',
											'$new_date')") or die(mysqli_error($con));
										
echo "success";
      
  }

}else{




$chart_fname=mysqli_real_escape_string($con,base64_decode($_POST['chart_fname']));
$chart_sname=mysqli_real_escape_string($con,base64_decode($_POST['chart_sname']));
$olde_user=mysqli_real_escape_string($con,base64_decode($_POST['chart_fname'])." ".base64_decode($_POST['chart_sname']));
$chart_email=mysqli_real_escape_string($con,base64_decode($_POST['charts_email']));
$checkExist=mysqli_query($con,"SELECT * FROM chat_users WHERE email='$chart_email' and status='active'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)>=1){
      
     	$get_user=mysqli_query($con,"SELECT * FROM chat_users WHERE email='$chart_email' and status='active'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$chart_id=$get['id'];
$hostd=$get['herihub_host'];
$herihub_host=$hostd;
	$message="Welcome back $olde_user, Thank you for reaching to us again, how can we assist you?";
	 $sql=mysqli_query($con,"INSERT INTO chartbot VALUE(null,
											'$chart_id',
											'$message',
											'admin',
											'$hostd',
											'system',
											'',
											'',
											'',
											'$new_date')") or die(mysqli_error($con));
										
echo "success";
      
  }else{
      $new_hostd="";
      $new_chartuser="";
      $sqlW="SELECT * FROM chat_users";
		$query_runW=mysqli_query($con,$sqlW)or die($query_runW."<br/><br/>".mysqli_error($con));
				while($row=mysqli_fetch_array($query_runW)){
		
		
	$herihub_user=$row['herihub_host'];
	}
/*
if($herihub_user=="Patrick"){
	$new_chartuser="Susan";

}else if($herihub_user=="Susan"){

$new_chartuser="Jane";

}else if($herihub_user=="Jane"){

$new_chartuser="John";
}else if($herihub_user=="John"){
$new_chartuser="Ann";
}else if($herihub_user=="Ann"){
	$new_chartuser="michael";
}else if($herihub_user=="Michael"){
	$new_chartuser="Lucy";
}else if($herihub_user=="Lucy"){
	$new_chartuser="Milly";
}else if($herihub_user=="Milly"){
	$new_chartuser="Nimo";
}else if($herihub_user=="Nimo"){
	$new_chartuser="Patrick";
}else{
$new_chartuser="Nimo";
}
*/

     $new_hostd="Whitebox"; 
      
      
      	$sql=mysqli_query($con,"INSERT INTO chat_users VALUE(null,
											'$chart_email',
											'$chart_fname',
											'$chart_sname',
											'$new_hostd',
											'active',
											'$new_date')") or die(mysqli_error($con));
											
	$get_user=mysqli_query($con,"SELECT * FROM chat_users WHERE email='$chart_email' and status='active'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$chart_id=$get['id'];		
	$message="Welcome $olde_user, Thank you for reaching to us, How can we assist you?";
	 $sql=mysqli_query($con,"INSERT INTO chartbot VALUE(null,
											'$chart_id',
											'$message',
											'admin',
											'$new_hostd',
											'system',
											'',
											'',
											'',
											'$new_date')") or die(mysqli_error($con));
										
echo "success";
      
  }


}

?>