<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";

  $user=base64_decode($_POST['user']);
$get_user=mysqli_query($con,"SELECT Id FROM administrators WHERE user_name='$user'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$user_idold=$get['Id'];
$date = time();
$new_time=$date;

//$salt="A0007799Wagtreeyty";
//$user_id=$get['Id'];
$innovation=base64_decode($_POST['innovation']);
//$my_innovation=encrypt($innovation, $key);
if($innovation){
//echo $my_pass;
    $assignments="pending";
  $date = time();
  $new_time=$date;
    $sqldr="SELECT investor_id FROM investor_list";

    $query_runxer=mysqli_query($con,$sqldr) or die($query_runxer."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxer)){
    $investor_id=$row['investor_id'];
      $checkExisted=mysqli_query($con,"SELECT * FROM innovation_investors WHERE investor_id ='$investor_id' and innovation_id='$innovation'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExisted)>=1){
  }else{
    $sql=mysqli_query($con,"INSERT INTO innovation_investors VALUE(Null,
                                                            '$innovation',
                                      '$investor_id',
                                      '$assignments',
                                       '$new_time')") or die(mysqli_error($con));
    
 $get_usernew=mysqli_query($con,"SELECT * FROM investors WHERE id='$investor_id'") or die(mysqli_error($con));
$getd=mysqli_fetch_assoc($get_usernew);
 /* $interest=$getd['sector'];
$Name=$getd['Name']; 
$email=$getd['Email']; */

  $Name=$getd['investorName'];
     // $Category=$getd['Category'];
  $Company=$getd['company_name'];
  $email=$getd['email'];
   $interest=$getd['sector_id'];
   $get_sector=mysqli_query($con,"SELECT name FROM sectors WHERE id='$interest'") or die(mysqli_error($con));
$getid=mysqli_fetch_assoc($get_sector);
 $newsector=$getid['name'];


$subject="Innovation Notification";
 $message="Dear ".$Name.", Following your application for innovations in ".$newsector.", we wish to present an innovation to you, We will contact you for more information about the innovation, Link https://www.whitebox.go.ke";

include "../../../../../modules/mails/general.php"; 


 
        
      
}
}
$update=mysqli_query($con,"UPDATE innovation_stamps SET Forwarding='$new_time',investor_id='$user_idold' WHERE innovation_id='$innovation'") or die(mysqli_error($con));

$Status="implementation";
$update=mysqli_query($con,"UPDATE innovations_table SET Status='$Status' WHERE Innovation_id='$innovation'") or die(mysqli_error($con));

$sqlx="SELECT user_id FROM innovations_table where Innovation_Id='$innovation'";

    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $user_id=$row['user_id'];
      
    }
   $get_usernew=mysqli_query($con,"SELECT * FROM users WHERE id='$user_id'") or die(mysqli_error($con));
$getd=mysqli_fetch_assoc($get_usernew);
  $newFirst_name=$getd['first_name'];
$newLast_name=$getd['last_name']; 
$email=$getd['email']; 



$subject="Innovation Implementation Notification";
 $message="<p>Dear, ".$newFirst_name." ".$newLast_name."</p><p>, Your Innovation has been linked to investors for potential partnership. Kindly login to the portal for more information.</p><p> https://www.whitebox.go.ke</p><p>Regards</p><p>Whitebox Innovation Team</p>";

$message="Dear, ".$newFirst_name." ".$newLast_name.", Your Innovation has successfully passed the evaluation process and is ready for implementation, you will be contacted for more information, thank you. For more information log into https://www.whitebox.go.ke";
 $sql=mysqli_query($con,"INSERT INTO notifications VALUE(Null,
                      '$user_id',
                      'innovator',
                      '$subject',
                      '$message',
                      'Executive department',
                      'new',
                      '$date')") or die(mysqli_error($con));
include "../../../../../modules/mails/general.php"; 


        
        
        
  
  
//$delete=mysqli_query($con,"DELETE FROM investor_list") or die(mysqli_error($con));
echo "success";
}else{
    echo "An error occured";
}

  







?>