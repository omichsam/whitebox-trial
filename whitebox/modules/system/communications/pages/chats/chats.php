<?php
$message_intervals=$_POST['message_intervals'];

?>
<div class="col-sm-12 col-xs-12"> <span style="float:right" class="btn theme_bg" id="broadcast">Broadcast</span></div>
<div class="col-sm-12 col-xs-12 no_padding massegesarea" id="masterchatsholder">

</div>
<div class="col-sm-12 col-xs-12 no_padding massegesarea" id="masterchatarea">

</div>
<div class="col-sm-12 col-xs-12 no_padding massegesarea" id="broadcastarea">

</div>

<script type="text/javascript">
	$(document).ready(function(){
		$("#broadcast").click(function(){
		
			$.get("modules/system/communications/pages/chats/broadcast.php",function(data){
				$(".massegesarea").hide();
          $("#broadcastarea").html(data).show();
         
         })
		})
   var message_intervals='<?php echo $message_intervals?>';
   if(message_intervals=="no"){

   	var notiIntervals=setInterval(function(){
	refresh_messages();
},10000);
$("#message_intervals").val(notiIntervals);
   }else{

   }
  
$.get("modules/system/communications/pages/chats/refresh.php",function(data){
          $("#masterchatsholder").html(data);
         // alert(data)
         })


	})

   
    
function refresh_messages(){
    
      $.get("modules/system/communications/pages/chats/refresh.php",{
	  },function(data){
	      //alert(data)
	 	$("#masterchatsholder").html(data);
	 var element = document.getElementById("masterchatsholder");
   element.scrollTop = element.scrollHeight - element.clientHeight;
	  }) 
}
</script>