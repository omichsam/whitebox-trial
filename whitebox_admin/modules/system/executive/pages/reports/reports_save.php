<?php
session_start();
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$user="";
$date = time();
$new_time=$date;
//$salt="A0007799Wagtreeyty";
//decision:decision,innovation:innovation
$decision_made=base64_decode($_POST['decision']);
$final_decission=$decision_made;
$decision=base64_decode($_POST['decision']);
$executive_report=base64_decode($_POST['executive_report']);
//$field=base64_decode($_POST['field']);

$userrr=base64_decode($_SESSION["username"]);
if($userrr){
    $user=$userrr;
}else{
$user=base64_decode($_POST['user']);
}
$get_user=mysqli_query($con,"SELECT Id FROM administrators WHERE user_name='$user'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$user_id=$get['Id'];
$innovation=base64_decode($_POST['innovation']);
$my_report=$executive_report;
$status="coment";
if($executive_report && $innovation){
$update=mysqli_query($con,"UPDATE innovation_stamps SET Second_evaluation='$new_time',Executive_id='$user_id' WHERE Innovation_Id='$innovation'") or die(mysqli_error($con));

$update=mysqli_query($con,"UPDATE innovations_table SET Status='$final_decission' WHERE Innovation_Id='$innovation'") or die(mysqli_error($con));



	$checkExist=mysqli_query($con,"SELECT * FROM innovations_reports WHERE Innovation_Id='$innovation' and clerk_id='$user_id' and status='$status'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)!=0){
 $update=mysqli_query($con,"UPDATE innovations_reports SET Report='$my_report', decision='$decision', date_added='$new_time' WHERE Innovation_Id='$innovation' and clerk_id='$user_id' and status='$status'") or die(mysqli_error($con));
 echo "success";
}else{
$sql=mysqli_query($con,"INSERT INTO innovations_reports VALUE(Null,
											'$user_id',
											'$innovation',
											'$my_report',
											'$decision',
											'$status',
											'$new_time')") or die(mysqli_error($con));
echo "success";

}

 $sqlx="SELECT user_id FROM innovations_table where Innovation_Id='$innovation'";

    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $user_id=$row['user_id'];
      
    }
      $get_user=mysqli_query($con,"SELECT email,last_name,first_name FROM users WHERE id='$user_id'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
  $newFirst_name=$get['first_name'];
$newLast_name=$get['last_name']; 
$email=$get['email']; 



$subject="Second Evaluation";
 $message="<p>Dear ".$newFirst_name." ".$newLast_name.",</p><p>Your Innovation has successfully gone through the Second level Evaluation.</p><p>Link https://www.whitebox.go.ke</p><p>&nbsp;</p><p>Regards</p><p>Huduma WhiteBox</p>";
 $sql=mysqli_query($con,"INSERT INTO notifications VALUE(Null,
											'$user_id',
											'innovator',
											'Second Evaluation',
											'$message',
											'WhiteBox team',
											'new',
											'$date')") or die(mysqli_error($con));
include "../../../../../modules/mails/general.php";	





	
}else{



}






?>