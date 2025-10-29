<?php 
session_start();
$chattings=$_SESSION['chattype'];

?>

<style type="text/css">
    .my_messages{
    min-height:30px;
    border:1px solid #ccc;
    
    border-radius:0px 10px 10px 10px;
    text-align: left;
    
    }
    .modmessages{
      min-height:30px;
    border:1px solid #ccc;
    border-radius:10px 0px 10px 10px; 
    font-size:12px;
    text-align: left;
    }
    .holder_messages{
        margin-top:5px;
    }
    .time_agos{
        font-size:10px;
    }
    #message_ddf{
        min-height:200px;
       
    }
    #message_send{
        resize:none;
    }
    .id_name_holders{
        margin-top:5px;
        min-height:10px;
        text-align: left;
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
$chart_email=$_POST['my_id'];
$chechactiveness="";
$get_user=mysqli_query($con,"SELECT * FROM chat_users WHERE email='$chart_email' and status='active'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$chart_id=$get['id'];
$fname=$get['fname'];
$herihub_host=$get['herihub_host'];
   if($chart_id){
   
  $sqlx="SELECT * FROM chartbot WHERE chat_id ='$chart_id' or Status='general'";
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


 $mysound="";
    if($seconds<=60){

 if($seconds<=5){


     $time_d="now";
     $mysound="now";
   }else{

   }
    }else if($minutes<=60){
      if($minutes==1){

        $time_d="1min";
      }else{
if($minutes<10){
$chechactiveness="";
}else{
$chechactiveness="outoftime";
}



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
    $soundtab="no";
  ?>
  
  <div class="col-sm-12 no_padding col-xs-12 id_name_holders" id=""><?php echo $sender?></div>
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
     $soundtab="ok";
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

if($chechactiveness){
  //echo $chechactiveness;
//$update=mysqli_query($con,"UPDATE chat_users SET status='done' WHERE id='$chart_id'") or die(mysqli_error($con)); 

$get_user=mysqli_query($con,"SELECT * FROM chat_users WHERE id='$chart_id'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
//$chart_id=$get['id'];
$email=$get['email'];
$fname=$get['fname'];
$herihub_host=$get['herihub_host'];
$status=$get['status'];
$fname=$get['fname'];
$sname=$get['sname'];
$time_added=$get['time_added'];


$sql=mysqli_query($con,"INSERT INTO  chat_backup VALUE(null,
                      '$chart_id',
                      '$email',
                      '$fname',
                      '$sname',
                      '$herihub_host',
                      'done',
                      '$time_added')") or die(mysqli_error($con)); 

$update=mysqli_query($con,"DELETE FROM chat_users WHERE id='$chart_id'") or die(mysqli_error($con));



}else{

}

}else{

if($chattings){

}else{



  ?>
<script type="text/javascript">
  $("#message_ereas").hide();
  $("#message_stater").show()
 $("#error_div").html("Chat closed").css("color","red");

</script>

  <?php
}
}
 ?>
 <script type="text/javascript">
   var player='<?php echo $mysound?>';
   var playit='<?php echo $soundtab?>';
   if(player=='now' && playit=='ok'){
var x = document.getElementById("myAudio"); 
                         x.play(); 
}else{
}



var chechactiveness='<?php echo $chechactiveness?>';
 if(chechactiveness){
  
 //$("#message_boxse").hide();
 clearTimeout(notiIntervals);

}else{

}

 </script>

