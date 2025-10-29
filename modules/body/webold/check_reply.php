<?php
include "../../../connect.php";
include("../../functions/security.php");
$chart_email=$_POST['my_id'];
 $date_added=time();
 $new_date=encrypt($date_added,$key);
 $message=base64_decode($_POST['message']);
 //$sub_message = $message;

//echo $my_user."allan";
$get_user=mysqli_query($con,"SELECT * FROM chat_users WHERE email='$chart_email' and status='active'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$chart_id=$get['id'];
$fname=base64_decode(decrypt($get['fname'],$key));
$herihub_host=$get['herihub_host'];
 $count=str_word_count($message);
 if($count>1){
$data=(explode(" ",$message));
 for($d=0;$d<=$count;$d++){

$keywod=$data[$d];


$sql="SELECT * FROM chart_results WHERE key_words='$keywod' LIMIT 1";
    $query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
     $replys=$row['Answer'];  
    }
    if($replys){
        $d=$count+2;
    }else{
        
    }
 }}else{
    $sql="SELECT * FROM chart_results WHERE key_words='$message' LIMIT 1";
    $query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
     $replys=$row['Answer'];  
    } 
 }


if($replys){
    $get_query=mysqli_query($con,"SELECT * FROM  chart_results WHERE key_words='$message'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_query);
$times_asked=$get['times_asked']+1;
   $update=mysqli_query($con,"UPDATE chart_results SET times_asked='$times_asked',last_asked='$new_date' WHERE key_words='$message'") or die(mysqli_error($con));  
    
$rowsb=encrypt(base64_encode($replys),$key);



//echo $User_id;

//if($chart_id && $fname){
      $sql=mysqli_query($con,"INSERT INTO chartbot VALUE('',
											'$chart_id',
											'$rowsb',
											'admin',
											'$herihub_host',
											'$new_date')") or die(mysqli_error($con));
											//echo "success";
  
}else{
    $rowsb=encrypt(base64_encode("Sorry $fname, I did not get it quit clear, could you kindly be clear"),$key);
    $sql=mysqli_query($con,"INSERT INTO chartbot VALUE('',
											'$chart_id',
											'$rowsb',
											'admin',
											'$herihub_host',
											'$new_date')") or die(mysqli_error($con));
}
//}else{
  //  echo "An error occured";
////}
?>