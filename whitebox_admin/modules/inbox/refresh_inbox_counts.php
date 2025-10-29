<?php 
include "../../connect.php";
$user=base64_decode($_POST['user']);

$new_id=0;
$date = time();
$online_counter=0;

$get_user=mysqli_query($con,"SELECT * FROM administrators WHERE user_name='$user'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$category=$get['Admin_role'];
    $update=mysqli_query($con,"UPDATE administrators SET online_counter='0' WHERE user_name='$user'") or die(mysqli_error($con));
if($category=="super_admin"){

   $sqlxo="SELECT * FROM administrators where status='online' and user_name!='$user'";

    $query_runxd=mysqli_query($con,$sqlxo) or die($query_runxd."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxd)){ 
    $old_id=$row['Id'];
    $user_name=$row['user_name'];
    $online_counter=(int)$row['online_counter'];
   
    if($online_counter){

    }else{
      $online_counter=0;
    }
    if($online_counter>=10){
           
      $update=mysqli_query($con,"UPDATE administrators SET online_counter='0',time_out='$date',status='Offline' WHERE Id='$old_id'") or die(mysqli_error($con));    
      echo "susccess";
      
    }else{
       $new_id=$online_counter+1;
      $update=mysqli_query($con,"UPDATE administrators SET online_counter='$new_id' WHERE Id='$old_id'") or die(mysqli_error($con));  
      echo "susccess";
          
      //$update=mysqli_query($con,"UPDATE administrators SET user_id='0',status='Offline' WHERE id='$old_id'") or die(mysqli_error($con));    
        
        
    }
    
    
  
    }
    
}else{
    

$checkExist=mysqli_query($con,"SELECT * FROM administrators WHERE user_name='$user' and status='online'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)>=1){
      $update=mysqli_query($con,"UPDATE administrators SET online_counter='0' WHERE user_name='$user'") or die(mysqli_error($con));
      
}else{
    
}
}

?>