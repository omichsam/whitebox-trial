<?php

include "../../../../../connect.php";

  $Innovation_Id=$_POST['Innovation_Id'];
  $new_solution=$_POST['new_solution'];
  $new_expalin=$_POST['new_expalin'];
  $new_impact=$_POST['new_impact'];
  $Innovation_Id=$_POST['Innovation_Id'];

$username=$my_user.$salt;
$new_username=sha1($username);
$my_userde=md5($new_username);


if($Feasibility && $Busines_model && $Market_potential && $Relevance){

$checkExist=mysql_query("SELECT * FROM innovation_details WHERE Market_potential ='$Market_potential' and  	Busines_model ='$Busines_model' and Feasibility ='$Feasibility' and Relevance ='$Relevance'") or die(mysql_error());

  if(mysql_num_rows($checkExist)!=0){

 echo "This innovation exists!";

}else{

$get_user_id=mysql_query("SELECT * FROM external_users WHERE Email_address='$my_userde'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user_id);
$User_id=$get['User_id'];









	$date = date('Y-m-d');
$sql=mysql_query("INSERT INTO innovations_table VALUE('',
											'$User_id',
											'$innovation_name',
											'$innovation_category',
											'$innovation_need',
											'$about_innovationd',
											'accepted',
											'Submition',
											'$date')") or die(mysql_error());
echo "success";
	
}


}else{
	echo "All fields required!";
}

?>