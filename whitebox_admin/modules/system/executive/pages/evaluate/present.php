<style type="text/css">
	#presentation_place{
		min-height: 500px;
		max-height: 560px;
		overflow: auto;
		box-shadow: 0 0 2px #ccc;
		background: #fff;
	}
	.dviewers_area{
	   	min-height: 450px;
		max-height: 540px;
		overflow: auto;
		box-shadow: 0 0 2px #ccc;
		background: #fff; 
	}
	
	.invite_holders{
    min-height: 130px;
    box-shadow: 0 0 5px #ccc;
    margin-top: 4px;
border:3px solid #ccc;
border-radius: 5px;
	}
	#lower_present{
		min-height: 50px;
	}
	.micro_buttons{
		cursor: pointer;
	}
	.video_buttons{
		cursor: pointer;
	}
	#social_presentas{
 background: #fff;
min-height: 100px;
right:0px;
min-width: 350px;
max-width: 350px;
position: absolute;
z-index: 99;
top:0%;
box-shadow: -11px 0px 18px #000;
border-right: 1px solid #ebf1f3;

}
#open_presentas{
   background: #fff;
min-height: 50px;
right:0px;
min-width: 50px;
position: absolute;
z-index: 99;
top:4%;
box-shadow: -11px 0px 18px #000;
border-right: 1px solid #ebf1f3;  
border-radius:40px 0 0 40px;
}
.btn_chats{
    float:center !important;
}
#messagearea{
 min-height:300px;
}
</style>
<?php
$innovation=$_POST['innovation'];
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";


?>
<div class="col-sm-12 col-xs-12 no_padding">
	<!--<div class="col-sm-12 col-xs-12 default_header">Presentation area</div>-->
		<div class="col-sm-12 col-xs-12 presentation_divsz " id="presentation_place"></div>
   
            	<div class="not_shown" id="open_presentas">
            	    <span class="btn " id="open_pres" style="color:green;cursor:pointer;" > <i class="fa fa-plus fa-2x"></i></span>
            	</div>
		<div class="not_shown" id="social_presentas">
		    
		  <span class="btn " id="pin_pres" style="color:green;cursor:pointer;" >	<span class=" btn_chats" id="open_message"><i class="fa fa-envelope"></i></span> <span class="btn_chats not_shown" id="close_message"><i class="fa fa-camera"></i></i></span>
</span>
		  
		  
		  
		    <span class="btn " id="close_pres" style="color:red;cursor:pointer;float:right;" >Close <i class="fa fa-times"></i></span>
		<div class="col-sm-12 col-xs-12 presentation_divsz dviewers_area" id="viewers_area">
		
		</div>
		<div class="col-sm-12 col-xs-12 no_padding presentation_divsz dviewers_area not_shown" id="messageareadd">
		    <div class="col-sm-12 col-xs-12 no_padding" id="messagearea"></div>
		<div class="colsm-12 col-xs-12 no_padding">
 <div class="colsm-10 col-xs-10">  
 <!--
 field for geting message
 -->
   <textarea class="colsm-12 col-xs-12 " id="message_send"></textarea>
   </div>
   <div class="colsm-2 col-xs-2 no_padding">
       
       <!--
       Button for sending the message
       -->
       <span class="btn theme_bg" id="btn_sendmsg"> Send</span>
       </div>
</div>
<div class="colsm-12 col-xs-12 no_padding" style="text-align:center;min-height:10px" id="message_erroes"></div>

		</div>
			</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
   clearInterval(closeIntervals);
   var closeIntervals=0;
    $("#btn_sendmsg").click(function(){
            var loader=$("#loader").html();
        var message=btoa($("#message_send").val());
        if(message){
            $("#message_erroes").html(loader);
            var innovation='<?php echo $innovation?>';
             //var my_id=$("#global_u_email").val();
	  $.post("modules/system/executive/pages/evaluate/save_message.php",{
	  		innovation:innovation,
	  		message:message
	  },function(data){
	     if($.trim(data)=="success"){
	          $.post("modules/system/executive/pages/evaluate/message.php",{
	  		innovation:innovation
	  },function(data){
	      //alert(data)
	 	$("#messagearea").html(data);
	 $("#message_erroes").html("");
	  })
	     }else{
	         $("#message_erroes").html("Sorry message not sent"); 
	     }
	  })
        }else{
            $("#message_erroes").html("Message required");
        }
        })
    
    
    
    
    $("#open_message").click(function(){
     $(".dviewers_area").hide();   
     $("#messageareadd").show();
     $(this).hide();
      $("#close_message").show();
    })
    $("#close_message").click(function(){
        $(this).hide();
        $("#open_message").show();
     $(".dviewers_area").hide();   
     $("#viewers_area").show();
    })
    //$.post("modules/system/executive/pages/evaluate/",{});
    
    var loader=$("#loader").html();
    $("#presentation_place").html(loader);
    var user=$("#user_email").val();
    var innovation='<?php echo $innovation?>';
    $.post("modules/system/executive/pages/evaluate/message.php",{innovation:innovation},function(data){$("#messagearea").html(data)});
    var startdata=btoa("need");
    var url="modules/system/executive/pages/evaluate/view.php";
    var urlt="modules/system/executive/pages/evaluate/evaluation.php";
    $.post(""+url+"",{innovation:innovation,user:user},function(data){$("#presentation_place").html(data)})
    $.post(""+urlt+"",{innovation:innovation,user:user})
    $.post("modules/system/executive/pages/evaluate/savepresent.php",{innovation:innovation,user:user,startdata:startdata});
    
    
    
    
    
    
    
    
    

    $("#close_pres").click(function(){
        
       // $("#menu_page").show().removeClass("slideOutLeft").addClass("animated slideInLeft");
        $("#social_presentas").removeClass("slideInRight").addClass("animated slideOutRight");
        $("#open_presentas").show();
$("#social_presentas").hide();
        })
        $("#open_pres").click(function(){
            
       $("#social_presentas").show().removeClass("slideOutRight").addClass("animated slideInRight");
        //$("#social_presentas").removeClass("slideInRight").addClass("slideOutRight").hide();
          $("#open_presentas").hide();  
           
       // var desinged=setInterval(close_df, 7000);
        })
        var innovation='<?php echo $innovation?>';
       // alert(innovation)
$.post("modules/system/executive/pages/evaluate/viewers.php",{innovation:innovation},function(data){$("#viewers_area").html(data)
    //alert(data)
})
$("#social_presentas").show().removeClass("slideOutRight").addClass("animated slideInRight");
 //var desinged=setInterval(close_df, 7000);
    //setTimeout(data_b, 5000);
 /*
        $("#pin_pres").click(function(){
       clearInterval(desinged);
        //alert()
         $("#unpinpin_pres").show()
         $(this).hide();
    })
     $("#unpinpin_pres").click(function(){
       var desinged=setInterval(close_df, 7000);
       $(this).hide();
         $("#pin_pres").show();
        //alert()
        
    })
    */
    /*Navigating menu*/
var closeIntervals=setInterval(function(){
	refresh_messages();
},6000);

    
    
  })
  function refresh_messages(){
var user=$("#user_email").val();
var innovation='<?php echo $innovation?>';
       $.post("modules/system/executive/pages/evaluate/message.php",{
	  		innovation:innovation
	  },function(data){
	      //alert(data)
	 	$("#messagearea").html(data);
	 	//$("#message_erroes").html("");
	  })
  //$.post("modules/system/executive/pages/evaluate/viewers.php",{user:user},function(data){$("#viewers_area").html(data)})
}
 function close_df(){
$("#close_pres").click()
}
	


</script>
<script>
/*


var video=document.getElementById('video');

navigator.getUserMedia = navigator.getUserMedia || navigetor.webkitgetUserMedia || navigator.msGetUserMedia || navigator.ogetUserMedia || navigator.mozGetUserMedia;
if(navigator.getUserMedia){
	navigator.getUserMedia({video:true,audio:true},streamWebcam,throwerror);

}
function streamWebcam(stream){
    video.src= window.URL.createObjectURL(stream);
    video.play();
 
}
function throwerror(){
    
}
*/

</script>