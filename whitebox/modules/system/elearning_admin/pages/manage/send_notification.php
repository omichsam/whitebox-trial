<style type="text/css">
	.text_dtp{
		min-height: 350px;
	}
</style>
<?php
$action=$_POST['action'];
?>
<div class="col-xs-12 col-sm-12">
<div class="col-xs-12 col-sm-12 default_header">Send notification now</div>
<div class="col-sm-12 col-xs-12 not_shown" id=""></div>
<div class="col-xs-12 col-sm-12 ">
	<div class="col-sm-6 col-xs-12">
		
<div class="col-sm-12 col-xs-12 noty_pages" id="selected_messeges"></div>

	</div>
		<div class="col-sm-6 col-xs-12">


<textarea class="text_dtp col-sm-12 col-xs-12" id="messageid" placeholder="Type Your Message Here"></textarea>
	</div>

</div>
</div>
<div class="col-xs-12 col-sm-12" style="margin-top: 10px;">
	<div class="col-sm-4 col-xs-1"></div>
	<div class="col-sm-4 col-xs-10">
		<span class="btn theme_bg page_send" role="back">
			Back
		</span>
		
		<span class="btn theme_bg page_send" role="submit">
			Send message
		</span>
	</div>
</div>

<div class="col-xs-12 col-sm-12" id="error_msg" style="margin-top: 10px;text-align: center;"></div>
<script type="text/javascript">
	$(document).ready(function(){
    var action='<?php echo $action?>';
      var user=$("#user_email").val();
		      $.post("modules/system/super_admin/pages/manage/list.php",{user:user,action:action},function(responce){
           	$("#selected_messeges").html(responce)

})
$(".page_send").click(function(){
	var myrole=$(this).attr("role");
	if(myrole=="back"){
    
	 $(".notify_alld").show();
	 $("#send_notification").html("").hide();
	}else{
var message=btoa($("#messageid").val());
if(message){
	$("#messageid").css("border","1px solid #000");
	var loader=$("#loader").html();
	$("#error_msg").html(loader).css("color","#000");

	     var user=$("#user_email").val();
		      $.post("modules/system/super_admin/pages/manage/send.php",{user:user,message:message,action:action},function(responce){
           	$("#error_msg").html(responce)
           });
}else{

	$("#error_msg").html("massage required!").css("color","red");
	$("#messageid").css("border","2px solid red");
	}
}
})


	})
</script>