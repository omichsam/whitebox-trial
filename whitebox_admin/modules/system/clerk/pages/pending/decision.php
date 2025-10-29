<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";


    $date = time();
	$new_time=$date;

//$salt="A0007799Wagtreeyty";
//decision:decision,innovation:innovation
$decision=base64_decode($_POST['decision']);
//$field=base64_decode($_POST['field']);
/*$user=base64_decode($_POST['user']);
$get_user=mysqli_query($con,"SELECT Id FROM administrators WHERE user_name='$user'") or die(mysqli_error($con));
$get=mysql_fetch_assoc($get_user);
$user_id=$get['Id'];*/
$innovation=base64_decode($_POST['innovation']);
$my_decision=$decision;
//$my_innovation=$innovation, $key);
if($decision && $innovation){
 $update=mysqli_query($con,"UPDATE innovations_table SET Status='$my_decision' WHERE Innovation_Id='$innovation'") or die(mysqli_error($con));
 if($update){
 echo "success";

}else{
	
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
 $subject="Evaluation of Responce";
 $message="<p>Dear ".$newFirst_name." ".$newLast_name.",</p><p>Thank you for the responce you gave us on the questions we asked, we have evaluated it and a decission has been made.</p><p>Kindly log into your portal account and check the progress.</p><p>Link https://www.whitebox.go.ke</p><p>&nbsp;</p><p>Regards,</p><p>WhiteBox Innovation Team</p>";
 $sql=mysqli_query($con,"INSERT INTO notifications VALUE(null,
											'$user_id',
											'innovator',
											'Evaluation of Responce',
											'$message',
											'WhiteBox team',
											'new',
											'$date')") or die(mysqli_error($con));
include "../../../../../modules/mails/general.php";	

}else{



}






?><?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";


    $date = time();
	$new_time=$date;

//$salt="A0007799Wagtreeyty";
//decision:decision,innovation:innovation
$decision=base64_decode($_POST['decision']);
//$field=base64_decode($_POST['field']);
/*$user=base64_decode($_POST['user']);
$get_user=mysqli_query($con,"SELECT Id FROM administrators WHERE user_name='$user'") or die(mysqli_error($con));
$get=mysql_fetch_assoc($get_user);
$user_id=$get['Id'];*/
$innovation=base64_decode($_POST['innovation']);
$my_decision=$decision;
//$my_innovation=$innovation, $key);
if($decision && $innovation){
 $update=mysqli_query($con,"UPDATE innovations_table SET Status='$my_decision' WHERE Innovation_Id='$innovation'") or die(mysqli_error($con));
 if($update){
 echo "success";

}else{
	
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
 $subject="Evaluation of Responce";
 $message="<p>Dear ".$newFirst_name." ".$newLast_name.",</p><p>Thank you for the responce you gave us on the questions we asked, we have evaluated it and a decission has been made.</p><p>Kindly log into your portal account and check the progress.</p><p>Link https://www.whitebox.go.ke</p><p>&nbsp;</p><p>Regards,</p><p>WhiteBox Innovation Team</p>";
 $sql=mysqli_query($con,"INSERT INTO notifications VALUE(null,
											'$user_id',
											'innovator',
											'Evaluation of Responce',
											'$message',
											'WhiteBox team',
											'new',
											'$date')") or die(mysqli_error($con));
include "../../../../../modules/mails/general.php";	

}else{



}






?>