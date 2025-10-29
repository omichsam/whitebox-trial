<?php
include "../../../../../connect.php";
include("../../../../functions/security.php");

include("../../../../../base_connect.php");
// $my_user=$_POST['my_id'];
 $date_added=time();
 $new_date=$date_added;
//echo $my_user."allan";
$innovation=base64_decode($_POST["innovation"]);
$get_user=mysqli_query($con,"SELECT * FROM innovations_table WHERE Innovation_Id='$innovation'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$user_id=$get['user_id'];

//checking media

  $sqlxd="SELECT * FROM presentation where account_type='Innovator' and user_id='$user_id'";
   //and status='active'
    $query_runxed=mysqli_query($con,$sqlxd) or die($query_runxed."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxed)){
     // $user_id=$row['user_id'];
      $micro_presenter=$row['micro_presenter'];
      $cam_presenter=$row['cam_presenter'];
}


  $sqlx="SELECT * FROM messages WHERE innovation_id='$innovation'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
  $date_added=$row['Date_added'];
  $mesage=$row['message'];
  $account=$row['account'];
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
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  if($account=="inovator"){
  
  
  ?>
 <div class="col-sm-12 no_padding col-xs-12 holder_messages">
    <div class="col-sm-2 no_padding col-xs-2">
    Me
    </div> 
    <div class="col-sm-8 col-xs-8 my_messages"><?php echo $mesage?></div>
     
   <div class="col-sm-2 col-xs-2 time_agos"><?php echo $time_d?></div>
 </div>   
 <?php
  }else{
  ?>
    <div class="col-sm-12 no_padding col-xs-12 holder_messages">
   <div class="col-sm-2 col-xs-2 time_agos" ><?php echo $time_d?></div>
    <div class="col-sm-8 col-xs-8 modmessages"><?php echo $mesage?></div>
      <div class="col-sm-2 no_padding col-xs-2">
        mode
    </div> 
 </div> 
 <?php 
      
  }
    }
 ?>
 
 
 
 
 
 
 
 
 
 
 <script>
  
var microphonemute='<?php echo $micro_presenter?>';
var cam_presenter='<?php echo $cam_presenter?>';
if(cam_presenter=="on" && microphonemute=="on"){
   // alert("both")
    //alert("all")
    var data=$("#user_video").attr("src");
    if(data==""){
     var video = document.getElementById('user_video'); 
navigator.mediaDevices.getUserMedia({
      audio: true,
      video: true
    }).then(stream => {
      window.localStream = stream;
        //video.src = window.URL.createObjectURL(stream);
        video.srcObject = stream;
        video.play();
    });   
    }else{
        
    }
    
/*
// Grab elements, create settings, etc.

var video = document.getElementById('user_video');

// Get access to the camera!
if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    // Not adding `{ audio: true }` since we only want video now
    navigator.mediaDevices.getUserMedia({ video: true,audio:true }).then(function(stream) {
        //video.src = window.URL.createObjectURL(stream);
        video.srcObject = stream;
        video.play();
    });
}

*/
}else if(cam_presenter=="on" && microphonemute=="off"){
    //alert("cam alone")
     var data=$("#user_video").attr("src");
    if(data==""){
     var video = document.getElementById('user_video'); 
navigator.mediaDevices.getUserMedia({
      audio: false,
      video: true
    }).then(stream => {
      window.localStream = stream;
        //video.src = window.URL.createObjectURL(stream);
        video.srcObject = stream;
        video.play();
    }); 
    }else{
        
    }
}else if(cam_presenter=="off" && microphonemute=="on"){
       // alert("micro only")
     var video = document.getElementById('user_video'); 
navigator.mediaDevices.getUserMedia({
      audio: true,
      video: false
    }).then(stream => {
      window.localStream = stream;
        //video.src = window.URL.createObjectURL(stream);
        video.srcObject = stream;
        video.stop();
    }); 
}else{
    
  localStream.getTracks().forEach((track) => {
    track.stop();
  })
}



   
 </script>