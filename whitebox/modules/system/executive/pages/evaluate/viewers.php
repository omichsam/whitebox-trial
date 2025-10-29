<?php
session_start();
?>
<div class="col-sm-12 col-xs-12 default_header">Moderator</div> 
      <?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$userrr=base64_decode($_SESSION["username"]);
$innovation=$_POST['innovation'];
//echo $innovation;
//$user_name="";
if($userrr){
    $user=$userrr;
}else{
$user=base64_decode($_POST['user']);
}
$get_event=mysqli_query($con,"SELECT * FROM events WHERE Innovation_Id='$innovation'") or die(mysqli_error($con));
$geted=mysqli_fetch_assoc($get_event);
if($geted){
$eventeid=$geted['id'];
$host_Idd=$geted['host_id'];
}else{

$eventeid="";;
$host_Idd="";
}
$get_user=mysqli_query($con,"SELECT Id FROM administrators WHERE user_name='$user'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$host_Id=$get['Id'];

         
$sqlx="SELECT * FROM administrators where Id='$host_Idd'";

    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
 
      $Name=$row['Name'];
      
    }
    //echo $Name;
        $sqlxd="SELECT * FROM presentation where account_type='moderator' and user_id='$host_Idd' and event_id='$eventeid'";
   //and status='active'
    $query_runxed=mysqli_query($con,$sqlxd) or die($query_runxed."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxed)){
      $user_id=$row['user_id'];
      $modearote=$user_id;
      $micro_presenter=$row['micro_presenter'];
      $cam_presenter=$row['cam_presenter'];
       $userdid=$row['id'];
       $microphone="";
 $microphonemute="";
$cam_presenterr="";
$cameramute="";
    
         if($micro_presenter=="off"){
           $microphone="not_shown";
        }else{
          $microphonemute="not_shown";
        }

        if($cam_presenter=="off"){
           $camera="not_shown";
        }else{
          $cameramute="not_shown";
        }
        $cameradd="camera".$userdid;
        $cameramutedd="cameramute".$userdid;
        $microphonedd="microphone".$userdid;
        $microphonemutedd="microphonemute".$userdid;
  ?>
  <div class="col-xs-12 col-sm-12 no_padding" id="video_datas">
      <div class="col-sm-12 col-xs-12 invite_holders ">
            <p><?php echo $Name?></p>
            <video id="video"  autoplay class="video col-sm-12 col-xs-12 no_padding" style="min-height:150px;min-width:150px;margin-bottom:5px;"></video>
            <!--<p style="text-align: center;">
            <i class="fa fa-user fa-5x"></i>
           </p>-->
         <p> <span class="<?php echo $microphone?> micro_buttons <?php echo $microphonedd?>" id="<?php echo $userdid ?>" role="off" style="color: green">
            <i class="fa  fa-microphone "></i></span> 
           <span class="<?php echo $microphonemute?> micro_buttons <?php echo $microphonemutedd?>" id="<?php echo $userdid ?>" role="on" style="color: red">
            <i class="fa  fa-microphone-slash"></i> </span>

<span class="<?php echo $camera?> video_buttons <?php echo $cameradd?>" id="<?php echo $userdid ?>" role="off" style="color: green">
  <i class="fa fa-video-camera "></i>
</span> 
<span class=" <?php echo $cameramute?> video_buttons <?php echo $cameramutedd?>" id="<?php echo $userdid ?>" role="on" style="color: red">
 <i class="fa fa-video-camera "></i>
 </span>






             </p>
      </div>


    </div>
<?php

}

?>

<div class="col-sm-12 col-xs-12 default_header" style=" border-top:2px dashed #000; margin-top: 5px;">Innovators</div>
 <?php

  $sqlxd="SELECT * FROM presentation where account_type='Innovator' and event_id='$eventeid'";
   //and status='active'
    $query_runxed=mysqli_query($con,$sqlxd) or die($query_runxed."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxed)){
      $user_id=$row['user_id'];
      $micro_presenteruser=$row['micro_user'];
      $cam_presenteruser=$row['cam_user'];
       $userdid=$row['id'];
       $microphoneuser="";
 $microphonemuteuser="";
$cam_presenteruser="";
$cameramuteuser="";
      
         if($micro_presenteruser=="off"){
           $microphoneuser="not_shown";
        }else{
          $microphonemuteuser="not_shown";
        }

        if($cam_presenteruser=="off"){
           $camerauser="not_shown";
        }else{
          $cameramuteuser="not_shown";
        }
        $cameradd="camerauser".$userdid;
        $cameramutedd="cameramuteuser".$userdid;
        $microphonedd="microphoneuser".$userdid;
        $microphonemutedd="microphonemuteuser".$userdid;
         
$sqlx="SELECT * FROM users where id='$user_id'";

    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
 
   $Name=$row['first_name']." ".$row['last_name'];
  ?>
  <div class="col-xs-12 col-sm-12 no_padding">
      <div class="col-sm-12 col-xs-12 invite_holders">
            <p><?php echo $Name?></p>
            <video id="user_video"  autoplay class=" video col-sm-12 col-xs-12 no_padding" style="min-height:150px;min-width:150px;margin-bottom:5px;"></video>
            
            <!--<p style="text-align: center;">
            <i class="fa fa-user fa-5x"></i>
           </p>-->
          <p> <span class="<?php echo $microphone?> micro_buttonsuser <?php echo $microphonedd?>" id="<?php echo $userdid ?>" role="off" style="color: green">
            <i class="fa  fa-microphone "></i></span> 
           <span class="<?php echo $microphonemute?> micro_buttonsuser <?php echo $microphonemutedd?>" id="<?php echo $userdid ?>" role="on" style="color: red">
            <i class="fa  fa-microphone-slash"></i> </span>

<span class="<?php echo $camera?> video_buttonsuser <?php echo $cameradd?>" id="<?php echo $userdid ?>" role="off" style="color: green">
  <i class="fa fa-video-camera "></i>
</span> 
<span class=" <?php echo $cameramute?> video_buttonsuser <?php echo $cameramutedd?>" id="<?php echo $userdid ?>" role="on" style="color: red">
 <i class="fa fa-video-camera "></i>
 </span>






             </p>
      </div>


    </div>
<?php

}
}
?>
<div class="col-sm-12-col-xs-12" id="lower_present">&nbsp;</div>


<script type="text/javascript">
  $(document).ready(function(){
    var sent_messages=$("#video").html();
   // alert(sent_messages);
$.post("socket/client.php",{sent_messages:sent_messages},function(data){

});
    var field="";
    $(".micro_buttons").click(function(){
  var my_role=$(this).attr("role");
  var role=btoa(my_role);
  var targeted=$(this).attr("id");
  var target=btoa(targeted);
 field=btoa("micro_presenter");


$.post("modules/system/executive/pages/evaluate/media.php",{field:field,role:role,target:target},function(data){
 if($.trim(data=="success")){
  if(my_role=="on"){
  var user_id='<?php echo $modearote?>';
   $.post("modules/system/executive/pages/evaluate/check_vid.php",{   
      user_id:user_id
   },function(data){
       if($.trim(data)=="on"){
         var vid="true";  
       }else{
         var vid="false"  
       }
      
    $(".microphone"+targeted).show();
    $(".microphonemute"+targeted).hide();
    
           var video = document.getElementById('video'); 
navigator.mediaDevices.getUserMedia({
      audio: true,
      video: vid
    }).then(stream => {
      window.localStream = stream;
        //video.src = window.URL.createObjectURL(stream);
        video.srcObject = stream;
        video.play();
    });
   });
    
    
    
  }else{
$(".microphonemute"+targeted).show();
    $(".microphone"+targeted).hide();
    localStream.getAudioTracks()[0].stop();
  }
}else{

}
  

})


})


 
$(".video_buttons").click(function(){
  var my_role=$(this).attr("role");
  var role=btoa(my_role);
  var targeted=$(this).attr("id");
  var target=btoa(targeted);
 field=btoa("cam_presenter");

$.post("modules/system/executive/pages/evaluate/media.php",{field:field,role:role,target:target},function(data){
 if($.trim(data=="success")){
  if(my_role=="on"){
      var user_id='<?php echo $modearote?>';
      $.post("modules/system/executive/pages/evaluate/check_mic.php",{   
      user_id:user_id
   },function(data){
          if($.trim(data)=="on"){
         var aud="true";  
       }else{
         var aud="false"  
       }
 // alert(aud)
      
      
 
      
    $(".camera"+targeted).show();
    $(".cameramute"+targeted).hide();
    
          
     var video = document.getElementById('video'); 
navigator.mediaDevices.getUserMedia({
      audio: aud,
      video: true
    }).then(stream => {
      window.localStream = stream;
        //video.src = window.URL.createObjectURL(stream);
        video.srcObject = stream;
        video.play();
    });
   }); 

    
  }else{
    $(".cameramute"+targeted).show();
    $(".camera"+targeted).hide();
    localStream.getVideoTracks()[0].stop();
   video.srcObject = stream;
        video.stop();
  }
}else{

}
  

})


})

   
    
    
    
    
    
    
    
    
$(".micro_buttonsuser").click(function(){
  var my_role=$(this).attr("role");
  var role=btoa(my_role);
  var targeted=$(this).attr("id");
  var target=btoa(targeted);
 field=btoa("micro_user");


$.post("modules/system/executive/pages/evaluate/media.php",{field:field,role:role,target:target},function(data){
 if($.trim(data=="success")){
  if(my_role=="on"){
    $(".microphoneuser"+targeted).show();
    $(".microphonemuteuser"+targeted).hide();
  }else{
$(".microphonemuteuser"+targeted).show();
    $(".microphoneuser"+targeted).hide();
  }
}else{

}
  

})


})



$(".video_buttonsuser").click(function(){
  var my_role=$(this).attr("role");
  var role=btoa(my_role);
  var targeted=$(this).attr("id");
  var target=btoa(targeted);
 field=btoa("cam_user");

$.post("modules/system/executive/pages/evaluate/media.php",{field:field,role:role,target:target},function(data){
 if($.trim(data=="success")){
  if(my_role=="on"){
    $(".camerauser"+targeted).show();
    $(".cameramuteuser"+targeted).hide();
  }else{
    $(".cameramuteuser"+targeted).show();
    $(".camerauser"+targeted).hide();
  }
}else{

}
  

})


})




   // setTimeout(data_b, 15000);
  })
 /* function data_b(){
var user=$("#user_email").val();
  $.post("modules/system/executive/pages/evaluate/viewers.php",{user:user},function(data){$("#viewers_area").html(data)})
}
*/
</script>
<script>

var microphonemute='<?php echo $micro_presenter?>';
var cam_presenter='<?php echo $cam_presenter?>';
if(cam_presenter=="on" && microphonemute=="on"){
   // alert("both")
    //alert("all")
     var video = document.getElementById('video'); 
navigator.mediaDevices.getUserMedia({
      audio: true,
      video: true
    }).then(stream => {
      window.localStream = stream;
        //video.src = window.URL.createObjectURL(stream);
        video.srcObject = stream;
        video.play();
    });   
    
    
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
     var video = document.getElementById('video'); 
navigator.mediaDevices.getUserMedia({
      audio: false,
      video: true
    }).then(stream => {
      window.localStream = stream;
        //video.src = window.URL.createObjectURL(stream);
        video.srcObject = stream;
        video.play();
    }); 
     
}else if(cam_presenter=="off" && microphonemute=="on"){
       // alert("micro only")
     var video = document.getElementById('video'); 
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
