<div class="col-sm-12 col-xs-12" style="text-align: center;">Broadcast message here</div>



<textarea class=" col-sm-12 col-xs-12" onkeyup="businessupdate(this.value)" maxlength="1000" placeholder="Type your broadcast message here!" id="messaging" style=" resize: none;min-height:300px"></textarea>
<div class="col-sm-12 col-xs-12" id="message_counter" style="text-align:right;color:red;font-size: 20PX;font-weight: bold;">0/1000</div>



<div class=" col-sm-12 col-xs-12" style="text-align:center;margin-top: 5px;">
	<span class="btn " id="back_to_mainb" style="background:red;color:#ffff;">Back</span> <span id="senddata" class="btn theme_bg">Send</span></div>



<div class="col-sm-12 col-xs-12" id="message_errors" style="text-align:center;color: red;margin-top: 5px;"></div>
<script type="text/javascript">
	  function businessupdate(str) {
  var lng = str.length;
  document.getElementById("message_counter").innerHTML = lng + '/1000';
}
	$(document).ready(function(){
		$("#back_to_mainb").click(function(){
			$(".massegesarea").hide();
			$("#masterchatsholder").show();
		})
		$("#senddata").click(function(){
			var loader=$("#loader").html()
			var message=btoa($("#messaging").val());
			var user=$("#user_email").val();
			if(message){
				$("#messaging").css("border","1px solid #ccc")
				$("#message_errors").html("Sending Message.."+loader);
				 $.post("modules/system/communications/pages/chats/sendbroad.php",{message:message,user:user},function(data){
				 	if($.trim(atob(data)=="Message sent")){
                     $("#messaging").val("").prop("placeholder","Type your broadcast message here!")

           
           $("#message_errors").html("Message sent");
				 	}else{
           $("#message_errors").html("Sorry, an error occured!, kindly try again");
				 	}
          
     

         })
			}else{
           $("#messaging").css("border","2px solid red")
           $("#message_errors").html("Message required!")
			}
		})
	})
</script>