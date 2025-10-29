<div class="col-sm-12 col-xs-12 default_header">Moderator</div> 
<?php
include "../../../../../connect.php";
include("../../../../../base_connect.php");
include("../../../../functions/security.php");
//include("../connect.php");
$innovation=$_POST['innovation'];
//$user=base64_decode($_SESSION["username"]);
$get_user=mysqli_query($con,"SELECT * FROM innovations_table where Innovation_Id='$innovation'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$User_id=$get['user_id'];
//echo $my_user."allan";
//echo $User_id;
      //echo $Innovation_Id;
$get_userd=mysqli_query($con,"SELECT * FROM events WHERE Innovation_Id='$innovation' and status='active'") or die(mysqli_error($con));
$getd=mysqli_fetch_assoc($get_userd);
$host_id=$getd['host_id'];
$event_id=$getd['id'];
$sqlx="SELECT * FROM administrators where Id='$host_id'";

    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
 
      $Name=$row['Name'];
    }
	?>
	<div class="col-xs-12 col-sm-12 no_padding">
			<div class="col-sm-12 col-xs-12 invite_holders ">
            <p><?php echo $Name?></p>
            <video id="video"  autoplay class="video col-sm-12 col-xs-12 no_padding" style="min-height:150px;min-width:150px;margin-bottom:5px;"></video>
            <!--<p style="text-align: center;">
            <i class="fa fa-user fa-5x"></i>
           </p>-->
       <!-- <p> <span class="<?php echo $microphone?> micro_buttons <?php echo $microphonedd?>" id="<?php echo $userdid ?>" role="off" style="color: green">
            <i class="fa  fa-microphone "></i></span> 
           <span class="<?php echo $microphonemute?> micro_buttons <?php echo $microphonemutedd?>" id="<?php echo $userdid ?>" role="on" style="color: red">
          	<i class="fa  fa-microphone-slash"></i> </span>

<span class="<?php echo $camera?> video_buttons <?php echo $cameradd?>" id="<?php echo $userdid ?>" role="off" style="color: green">
  <i class="fa fa-video-camera "></i>
</span> 
<span class=" <?php echo $cameramute?> video_buttons <?php echo $cameramutedd?>" id="<?php echo $userdid ?>" role="on" style="color: red">
 <i class="fa fa-video-camera "></i>
 </span>






          	 </p>-->
			</div>


		</div>


<div class="col-sm-12 col-xs-12 default_header" style=" border-top:2px dashed #000; margin-top: 5px;">Innovator</div>
 <?php
//echo $event_id;
  $sqlxd="SELECT * FROM presentation where account_type='Innovator' and user_id='$User_id' and event_id='$event_id'";
   //and status='active'
    $query_runxed=mysqli_query($con,$sqlxd) or die($query_runxed."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxed)){
      $user_id=$row['user_id'];
      $micro_presenter=$row['micro_user'];
      $cam_presenter=$row['cam_user'];
       $userdid=$row['id'];
       $microphone="";
 $microphonemute="";
$camera="";
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
         
$sqlx="SELECT * FROM users where id='$user_id'";

    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
 
   $Name=$row['first_name']." ".$row['last_name'];
    //}
   
  ?>
  <div class="col-xs-12 col-sm-12 no_padding">
      <div class="col-sm-12 col-xs-12 invite_holders">
            <p><?php echo $Name?></p>
            <video id="user_video"  autoplay class=" video col-sm-12 col-xs-12 no_padding" style="min-height:150px;min-width:150px;margin-bottom:5px;"></video>
            
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
}}


?>
<div class="col-sm-12-col-xs-12" id="lower_present">&nbsp;</div>


<script type="text/javascript">
  $(document).ready(function(){
      //var user='<?php echo $my_user?>';
      //alert(user)
    //var field="";
$(".micro_buttons").click(function(){
  var my_role=$(this).attr("role");
  var role=btoa(my_role);
  var targeted=$(this).attr("id");
  var target=btoa(targeted);
 field=btoa("micro_user ");


$.post("modules/system/external/pages/pitch/media.php",{field:field,role:role,target:target},function(data){
 if($.trim(data=="success")){
  if(my_role=="on"){
      var user_id='<?php echo $User_id?>';
   $.post("modules/system/external/pages/pitch/check_vid.php",{   
      user_id:user_id
   },function(data){
       if($.trim(data)=="on"){
         var vid="true";  
       }else{
         var vid="false"  
       }
  
      
    $(".microphone"+targeted).show();
    $(".microphonemute"+targeted).hide();
    
         var video = document.getElementById('user_video'); 
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
    try {
     localStream.getAudioTracks()[0].stop();
} catch (ex) {
    // This fails in some older versions of chrome. Nothing we can do about it.
}
   
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
 field=btoa("cam_user");

$.post("modules/system/external/pages/pitch/media.php",{field:field,role:role,target:target},function(data){
 if($.trim(data=="success")){
  if(my_role=="on"){
           var user_id='<?php echo $User_id?>';
   $.post("modules/system/external/pages/pitch/check_mic.php",{   
      user_id:user_id
   },function(data){
       if($.trim(data)=="on"){
         var aud="true";  
       }else{
         var aud="false"  
       }
 // alert(aud)
      
      
      
     var video = document.getElementById('user_video'); 
navigator.mediaDevices.getUserMedia({
      audio: aud,
      video: true
    }).then(stream => {
      window.localStream = stream;
        //video.src = window.URL.createObjectURL(stream);
        video.srcObject = stream;
        video.play();
    });

    
    /*
audio.onclick = function() {
  localStream.getAudioTracks()[0].stop();
}
video.onclick = function() {
  localStream.getVideoTracks()[0].stop();
}
/*
both.onclick = function() {
  localStream.getTracks().forEach((track) => {
    track.stop();
  })
}  
*/
      
      
      
      
      
      
/*
var video = document.getElementById('user_video');

// Get access to the camera!
if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    // Not adding `{ audio: true }` since we only want video now
    navigator.mediaDevices.getUserMedia({ video: true,audio:true }).then(function(stream) {
        //video.src = window.URL.createObjectURL(stream);
        video.srcObject = stream;
        video.play();
    });
   // window.localStream = stream;
      //document.querySelector('video').src = URL.createObjectURL(stream);
}    */
      
    
      
    $(".camera"+targeted).show();
    $(".cameramute"+targeted).hide();
   });
  }else{
         $(".cameramute"+targeted).show();
    $(".camera"+targeted).hide();
 // alert(my_role)
//  localStream.getVideoTracks()[0].stop();
     localStream.getVideoTracks()[0].stop();
   video.srcObject = stream;
        video.stop();
 
  }
}else{

}
  

})


})




  })
 
</script>
<script>
/*
navigator.getUserMedia = navigator.getUserMedia || navigetor.webkitgetUserMedia || navigator.msGetUserMedia || navigator.ogetUserMedia || navigator.mozGetUserMedia;
if(navigator.getUserMedia){
    var video=$("#video").attr("id");
	navigator.getUserMedia({video:true},streamWebcam, throwerror);
//alert(video)
}
function streamWebcam(stream){
    video.src= window.URL.createObjectURL(stream);
    video.play();
  alert(video)
 
}
function throwerror(){
    
}
*/

var microphonemute='<?php echo $micro_presenter?>';
var cam_presenter='<?php echo $cam_presenter?>';
if(cam_presenter=="on" && microphonemute=="on"){
   // alert("both")
    //alert("all")
     var video = document.getElementById('user_video'); 
navigator.mediaDevices.getUserMedia({
      audio: true,
      video: true
    }).then(stream => {
      window.localStream = stream;
         try {
     localStream.getAudioTracks()[0].stop();
} catch (ex) {
    // This fails in some older versions of chrome. Nothing we can do about it.
}
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
     var video = document.getElementById('user_video'); 
navigator.mediaDevices.getUserMedia({
      audio: false,
      video: true
    }).then(stream => {
      window.localStream = stream;
         try {
     localStream.getAudioTracks()[0].stop();
} catch (ex) {
    // This fails in some older versions of chrome. Nothing we can do about it.
}
        //video.src = window.URL.createObjectURL(stream);
        video.srcObject = stream;
        video.play();
    }); 
     
}else if(cam_presenter=="off" && microphonemute=="on"){
       // alert("micro only")
     var video = document.getElementById('user_video'); 
navigator.mediaDevices.getUserMedia({
      audio: true,
      video: false
    }).then(stream => {
      window.localStream = stream;
         try {
     localStream.getAudioTracks()[0].stop();
} catch (ex) {
    // This fails in some older versions of chrome. Nothing we can do about it.
}
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
