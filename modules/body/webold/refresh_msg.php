
<?php

include "../../../connect.php";
include("../../functions/security.php");
$chart_email=$_POST['my_id'];

$get_user=mysqli_query($con,"SELECT * FROM chat_users WHERE email='$chart_email' and status='active'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$chart_id=$get['id'];
$fname=base64_decode(decrypt($get['fname'],$key));
$herihub_host=base64_decode(decrypt($get['herihub_host'],$key));
   
   
  $sqlx="SELECT * FROM chartbot WHERE chat_id ='$chart_id'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
  $date_added=decrypt($row['time_added'], $key);
  $mesage=base64_decode(decrypt($row['message'],$key));
  $sender=base64_decode(decrypt($row['sender'],$key));
  $account=$row['sender_type'];
       $time_d="";
    $curenttime=time();
    $time_difference=$curenttime-$date_added;
    $seconds=$time_difference;
    $minutes=round($seconds/60);//minutes
    $hours=round($seconds/3600);//hours
    $days=round($seconds/86400);//days
    $weeks=round($seconds/604800);//weeks
    $months=round($seconds/2629440);//months
    $years=round($seconds/31553380);//years



    if($seconds<=60){
     $time_d="now";
    }else if($minutes<=60){
      if($minutes==1){

        $time_d="1min";
      }else{
        $time_d="$minutes min";
      }

    }elseif($hours<=24){

   if($hours==1){
    $time_d="1hr";
   }else{
    $time_d="$hours hrs";
   }


    }else if($days<=7){
    if($days==1){
      $time_d="1 day";
    }else{
      $time_d="$days days";
    }


    }else if($weeks<=4.3){
     if($weeks==1){
      $time_d="1 wk";
     }else{
      $time_d="$weeks wks";
     }

    }else if($months<=12){

      if($months==1){
        $time_d="1 month";
      }else{

        $time_d="$months months";
      }
    }else{
  if($years==1){

    $time_d="1 yr";
  }else{
    $time_d="";
  }

    }
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  if($account=="user"){
  ?>
  <div class="col-sm-12 no_padding col-xs-12 id_name_holders" id=""><?php echo $sender?></div>
 <div class="col-sm-12 no_padding col-xs-12 holder_messages">
    <div class="col-sm-1 no_padding col-xs-1">
    
    </div> 
    <div class="col-sm-8 col-xs-8 my_messages"><?php echo $mesage?></div>
     
   <div class="col-sm-3 col-xs-3 time_agos"><?php echo $time_d?></div>
 </div>   
 <?php
  }else{
  ?>
    <div class="col-sm-12 no_padding col-xs-12 holder_messages">
        <div class="col-sm-12 no_padding col-xs-12 id_name_holders" style="text-align:right"><?php echo $sender?></div>
   <div class="col-sm-3 col-xs-3 time_agos" ><?php echo $time_d?></div>
    <div class="col-sm-8 col-xs-8 modmessages"><?php echo $mesage?></div>
      <div class="col-sm-1 no_padding col-xs-1">
       
    </div> 
 </div> 
 <?php 
      
  }
    }
 ?>