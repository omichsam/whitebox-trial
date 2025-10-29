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
<div class="col-xs-12 col-sm-12 default_header">Move now</div>
<div class="col-sm-12 col-xs-12 not_shown" id=""></div>
<div class="col-xs-12 col-sm-12 ">
	<div class="col-sm-6 col-xs-12">
		
<div class="col-sm-12 col-xs-12 noty_pages" id="selected_messeges"></div>

	</div>
		<div class="col-sm-6 col-xs-12">
Select Stage: 
<select class="splashinputs" id="select_option">
	<option></option>
	<option>Submission</option>
	<option>Pending</option>
	<option>Second Evaluation</option>
	<option>Accepted</option>
	<option>Declined</option>
	<option>Implementation</option>






</select>
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
			Save
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
var select_optioned=$("#select_option").val();
if(select_optioned){
if(select_optioned=="Submission"){
select_option=btoa("submission")
}else if(select_optioned=="Pending"){
select_option=btoa("waiting")
}else if(select_optioned=="Second Evaluation"){
select_option=btoa("second_evaluation")
}else if(select_optioned=="Accepted"){
select_option=btoa("approved")
}else if(select_optioned=="Declined"){
select_option=btoa("disapproved")
}else if(select_optioned=="Implementation"){
select_option=btoa("implementation")
}else{
	
}
checksecurity()


	
}else{

	$("#error_msg").html("Select stage!").css("color","red");
	$("#messageid").css("border","2px solid red");
	}
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
var select_optioned=$("#select_option").val();
if(select_optioned=="Submission"){
select_option=btoa("submission")
}else if(select_optioned=="Pending"){
select_option=btoa("waiting")
}else if(select_optioned=="Second Evaluation"){
select_option=btoa("second_evaluation")
}else if(select_optioned=="Accepted"){
select_option=btoa("approved")
}else if(select_optioned=="Declined"){
select_option=btoa("disapproved")
}else if(select_optioned=="Implementation"){
select_option=btoa("implementation")
}else{
	
}

      var action='<?php echo $action?>';
      var user=$("#user_email").val();
$("#select_option").css("border","1px solid #000");
	var loader=$("#loader").html();
	$("#error_msg").html(loader).css("color","#000");

	     var user=$("#user_email").val();
		      $.post("modules/system/super_admin/pages/manage/save_stages.php",{user:user,select_option:select_option,action:action},function(responce){
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