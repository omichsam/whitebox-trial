<style type="text/css">
	.text_dtp{
		min-height: 350px;
	}
</style>
<?php
$user=base64_decode($_POST['user']);
$action=$_POST['action'];
?>
<div class="col-xs-12 col-sm-12">
<div class="col-xs-12 col-sm-12 default_header">Delete now</div>
<div class="col-sm-12 col-xs-12 not_shown" id=""></div>
<div class="col-xs-12 col-sm-12 ">

	<div class="col-sm-3 col-xs-12"></div>
	<div class="col-sm-6 col-xs-12">
		
<div class="col-sm-12 col-xs-12 noty_pages" id="selected_messeges"></div>

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
			Cornfirm Delete
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
	var select_option="";
	var myrole=$(this).attr("role");
	if(myrole=="back"){
    
	 $(".notify_alld").show();
	 $("#send_notification").html("").hide();
	}else{ 
		checksecurity()
		  

}
})


	})
	function checksecurity() {
  var txt;
  var person = prompt("Secret key:", "");
  if (person == null || person == "") {
    $("#error_msg").html("Secret key required")


  } else {
    var secret="2020@whiteboxlive";
    if(person==secret){

      var action='<?php echo $action?>';
      var user=$("#user_email").val();
  var loader=$("#loader").html();
	        $("#error_msg").html(loader).css("color","#000");
            // var user=$("#user_email").val();
            //alert(action)
		      $.post("modules/system/super_admin/pages/manage/deleteall.php",{user:user,action:action},function(responce){
           	$("#error_msg").html(responce)
           });
  //  txt = "Hello " + person + "! How are you today?";
}else{

    $("#error_msg").html(" Secret key not valid").css("color","red")
}
  }
  //document.getElementById("demo").innerHTML = txt;
}

</script>