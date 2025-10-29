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
        margin-top:10px;
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
    .my_messages:before{
       /* content: '';
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
border-bottom: 1px solid #ccc;
*/
    }
</style>
<?php
include "../../../../../connect.php";
include("../../../../functions/security.php");

include("../../../../../base_connect.php");

$innovation=$_POST['innovation'];

?>
<div class="col-sm-12 no_padding col-xs-12" id="message_ddf">
    <div class="col-sm-12 no_padding col-xs-12" id="refresh_msg">
    <?php
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
         Mode
    </div> 
 </div> 
 <?php 
      
  }
    }
 ?>
   
</div>
<div class="colsm-12 col-xs-12 no_padding">
 <div class="colsm-10 col-xs-10">   
   <textarea class="colsm-12 col-xs-12 " id="message_send"></textarea>
   </div>
   <div class="colsm-2 col-xs-2 no_padding">
       <span class="btn theme_bg" id="btn_sendmsg"> Send</span>
       </div>
</div>
<div class="colsm-12 col-xs-12 no_padding" style="text-align:center;min-height:10px" id="message_erroes"></div>
<script>
    $(document).ready(function(){
        $(document).keypress(function(e) {
      if(e.which == 13) {
          //listens to enter keyboard button
       // $("#error_display").html(buttonclick)
$("#btn_sendmsg").click();
}
    });
        $("#btn_sendmsg").click(function(){
            var loader=$("#loader").html();
            var innovation=btoa('<?php echo $innovation?>');
        var message=btoa($("#message_send").val());
        if(message){
            $("#message_erroes").html(loader);
            // var my_id=$("#global_u_email").val();
	  $.post("modules/system/external/pages/pitch/save_message.php",{
	  		innovation:innovation,
	  		message:message
	  },function(data){
	     if($.trim(data)=="success"){
           var innovation='<?php echo $innovation?>';
	          $.post("modules/system/external/pages/pitch/messages.php",{
	  	innovation:innovation
	  },function(data){
	      //alert(data)
	 	$("#message_ereas").html(data);
	  })
	     }else{
	         $("#message_erroes").html("Sorry message not sent"); 
	     }
	  })
        }else{
            $("#message_erroes").html("Message required");
        }
        })
        var notiIntervals=setInterval(function(){
	refresh_messages();
},4000);

    })
    
function refresh_messages(){
    //var my_id=$("#global_u_email").val();
    var innovation=btoa('<?php echo $innovation?>');
      $.post("modules/system/external/pages/pitch/refresh_msg.php",{
	  	innovation:innovation
	  },function(data){
	      //alert(data)
	 	$("#refresh_msg").html(data);
	  }) 
}
</script>