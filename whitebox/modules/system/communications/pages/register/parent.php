<style type="text/css">
	#h3_parents{
		text-align: center;
		border-bottom: 2px solid #000;
	}
#s_btn_finish{
	text-align: center;
}
</style>
<?php 
$adm_st=$_POST['adm_st'];
 ?>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-3 col-xs-3"></div>
<div class="col-sm-6 col-xs-6">
	<h3 id="h3_parents">PARENTS PANEL</h3>
<p>FIRST NAME<input type="text" id="parent_fname"  class="inputs">
</p>
<p>MIDDLE NAME<input type="text" id="parent_mname" class="inputs">
</p>
<p>LAST NAME<input type="text" id="parent_lname" class="inputs">
</p>
<p>NATIONAL ID NUMBER<input type="number" id="parent_id_number" class="inputs">
</p>
<p>EMAIL<input type="email" id="parent_email" class="inputs">
</p>
<p>PHONE NUMBER<input type="text" id="parent_phone" class="inputs">
</p>
<p>RESIDENCE<input type="text" id="parent_rasidence" class="inputs">
</p>
<p id="s_btn_finish"><Span class="btn theme_bg" id="send_parent">FINISH</Span></p>
<p class="spinner spinner_home not_shown" id="sp_home"></p>
<p id="parents_sp_loeding"></p>
</div>
<div class="col-sm-3 col-xs-3"></div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		var stadm_no='<?php echo $adm_st?>';
		$("#send_parent").click(function(){
			$("#sp_home").show();
      $("#parents_sp_loeding").html("Sending data...please wait..")
			var parent_fname=$("#parent_fname").val();
			var parent_mname=$("#parent_mname").val();
			var parent_lname=$("#parent_lname").val();
			var parent_id_number=$("#parent_id_number").val();
			var parent_phone=$("#parent_phone").val();
			var parent_rasidence=$("#parent_rasidence").val();
			var parent_email=$("#parent_email").val();
                $.post("modules/admin/root/registrar/body/register/parent_send.php",{
                 parent_fname:parent_fname,
                 parent_mname:parent_mname,
                 parent_lname:parent_lname,
                 parent_id_number:parent_id_number,
                 parent_phone:parent_phone,
                 parent_rasidence:parent_rasidence,
                 parent_email:parent_email,
                 stadm_no:stadm_no
                },function(data){
               if($.trim(data)=="success"){
               	$("#modal_body").html("");
					$.post("modules/admin/root/registrar/body/register/prepareid.php",{
					stadm_no:stadm_no
					},function(data){
					$("#modal_body").html(data);
					});
               }else{
               	$("#sp_home").hide();
                  $("#parents_sp_loeding").html(data);
               }
               
                })
      
		})
	})




</script>