 <?php 
 /*session_start();

if(isset($_SESSION["messagebox"]))
{
 $messagechecker="found";
}else{

$_SESSION["messagebox"] = "no";
$messagechecker="no";
}


*/

 ?>

<style>
    .my_messages{
    min-height:30px;
    border:1px solid #ccc;
    
    border-radius:0px 10px 10px 10px;
    
    }
    .modmessages{
      min-height:30px;
    border:1px solid #ccc;
    border-radius:10px 0px 10px 10px; 
    font-size:12px;
    }
    .holder_messages{
        margin-top:5px;
    }
    .time_agos{
        font-size:10px;
    }
    #message_ddfpot{
        min-height:200px;
       
    }
    #message_send{
        resize:none;
    }
    .id_name_holders{
        margin-top:5px;
        min-height:10px;
    }
    .my_messages:before{
        /*content: '';
position: absolute;
height: 15px;
width: 15px;
z-index: -4;
left: -9px;
top: 2px;
transform: rotate;
transform: rotate;
rotate: 45deg;
border-left: 1px solid #ccc;
border-bottom: 1px solid #ccc; */
    }
</style>
<?php

include "../../../connect.php";
include("../../functions/security.php");
$chart_email=base64_decode($_POST['charts_email']);

//echo $chart_email;
$main_email=$chart_email;

 $date_added=time();
  $sqlxo="SELECT * FROM chat_backup WHERE email='$chart_email' and status='done'";
    $query_runxpo=mysqli_query($con,$sqlxo) or die($query_runxpo."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxpo)){

$chart_id=$row['id'];
$fname=$row['fname'];
$host_dd=$row['herihub_host'];


?>

<div class="col-sm-12 no_padding col-xs-12" id="message_ddfpot">
    <div class="col-sm-12 no_padding col-xs-12" id="refresh_msgpo">
    <?php
  $sqlx="SELECT * FROM chartbot WHERE chat_id ='$chart_id'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
  $date_added=$row['time_added'];
  $mesage=$row['message'];
  $sender=$row['sender'];
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
  <div class="col-sm-12 no_padding col-xs-12 id_name_holders" id="" style="text-align: left !important;"><?php echo $sender?></div>
 <div class="col-sm-12 no_padding col-xs-12 holder_messages">
  <div class="row">
    <div class="col-sm-1 no_padding col-xs-1">
    
    </div> 
    <div class="col-sm-8 col-xs-8 my_messages"><?php echo $mesage?></div>
     
   <div class="col-sm-3 col-xs-3 time_agos"><?php echo $time_d?></div>
 </div>  
 </div> 
 <?php
  }else{
  ?>
    <div class="col-sm-12 no_padding col-xs-12 holder_messages">
        <div class="col-sm-12 no_padding col-xs-12 id_name_holders" style="text-align:right"><?php echo $sender?></div>
        <div class="row">
   <div class="col-sm-3 col-xs-3 time_agos" ><?php echo $time_d?></div>
    <div class="col-sm-8 col-xs-8 modmessages"><?php echo $mesage?></div>
      <div class="col-sm-1 no_padding col-xs-1">
       
    </div> </div>
 </div> 
 <?php 
      
  }
    }

 ?>
   
</div>
<?php

}
?>
