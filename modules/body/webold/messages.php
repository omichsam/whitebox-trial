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
    #message_ddf{
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
$chart_email=encrypt($_POST['charts_email'],$key);

$main_email=$_POST['charts_email'];

 $date_added=time();
//echo $my_user."allan";
//$my_userde=encrypt($my_user,$key);
$get_user=mysqli_query($con,"SELECT * FROM chat_users WHERE email='$chart_email' and status='active'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$chart_id=$get['id'];
$fname=base64_decode(decrypt($get['fname'],$key));
$host_dd=base64_decode(decrypt($get['herihub_host'],$key));
   // echo $Innovation_Id;

/*$checkExistd=mysqli_query($con,"SELECT * FROM messages WHERE innovation_id ='$InnovationId' and sender_id='$User_id' and host_id='$host_id' and message='$message'") or die(mysqli_error($con));

  if(mysql_num_rows($checkExistd)>=1){ 
echo "message exists";
}else{

  
}
*/
?>
<!--<div class="col-12 col-xs-12"><span style="float:left"><?php echo $fname ?></span> <span style="float:right"><?php echo $host_dd ?></span></div>
--><div class="col-sm-12 no_padding col-xs-12" id="message_ddf">
    <div class="col-sm-12 no_padding col-xs-12" id="refresh_msg">
    <?php
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
   
</div>
<div class="colsm-12 col-xs-12 no_padding" style="margin-top:10px">
 <div class="colsm-10 col-xs-10">   
   <textarea class="colsm-12 col-xs-12 " id="message_send"></textarea>
   </div>
   <div class="colsm-2 col-xs-2 no_padding">
       <span class="btn theme_bg" id="btn_sendmsg"> Send</span>
       </div>
</div>
<div class="colsm-12 col-xs-12 no_padding" style="text-align:center;min-height:15px" id="message_erroes"></div>
<script>
    $(document).ready(function(){
    $("#message_send").keypress(function(){
    var userd='<?php echo $fname ?>';
    $("#heri_hubs").html(userd+" Typing..");
  });
  $("#message_send").focusout(function(){
      $("#heri_hubs").html("HeriHub chat");
  //this code executes when the keyup event occurs
});
        $("#btn_sendmsg").click(function(){
            var loader=$("#loader").html();
        var message=btoa($("#message_send").val());
        if(message){
            $("#message_erroes").html(loader);
             var my_id='<?php echo $chart_email?>';
	  $.post("modules/body/web/save_message.php",{
	  		my_id:my_id,
	  		message:message
	  },function(data){
	     if($.trim(data)=="success"){
	         var charts_email='<?php echo $main_email?>';
	          $.post("modules/body/web/messages.php",{
	  		charts_email:charts_email
	  },function(data){
	      //alert(data)
    var userd='<?php echo $host_dd ?>';
    $("#heri_hubs").html(userd+" Typing..");

	      
	 	$("#message_ereas").html(data).show();
	 	  var element = document.getElementById("message_ereas");
   element.scrollTop = element.scrollHeight - element.clientHeight;
    $.post("modules/body/web/check_reply.php",{
	  		my_id:my_id,
	  		message:message
    })
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
},10000);

    })
    
function refresh_messages(){
    var my_id='<?php echo $chart_email?>';
      $.post("modules/body/web/refresh_msg.php",{
	  		my_id:my_id
	  },function(data){
	      //alert(data)
	      $("#heri_hubs").html("HeriHub chat");
	 	$("#refresh_msg").html(data);
	 /*	var element = document.getElementById("message_ereas");
   element.scrollTop = element.scrollHeight - element.clientHeight;*/
	  }) 
}
</script>