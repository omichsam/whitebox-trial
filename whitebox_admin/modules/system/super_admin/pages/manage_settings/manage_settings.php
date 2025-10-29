<style type="text/css">
	.btnsettings{
		margin-top: 5px;
	}
	.btnsettings:hover{
		background: green;
		cursor: pointer;
	}
</style>

<div class="col-sm-12 col-xs-12" style="text-align: center;font-weight: bold;border-bottom: 1px solid #ccc">
	Manage settings
</div>
<div class="col-sm-12 col-xs-12" style="margin-top: 5px">
	<div class="col-sm-2 col-xs-12" style="background: #ccc">
	<div class="col-sm-12 btn btn-primary col-xs-12 btnsettings" role="mails">
	Emails <i class="fa fa-envelope"></i>
</div>
<div class="col-sm-12 btn btn-primary col-xs-12 btnsettings" role="themes">
	Themes <i class=" fa fa-tint"></i>
</div>
<!-- <div class="col-sm-12 btn btn-primary col-xs-12 btnsettings" role="emails">
	Emails <i class="fa fa-envelope"></i>
</div>
<div class="col-sm-12 btn btn-primary col-xs-12 btnsettings" role="emails">
	Emails <i class="fa fa-envelope"></i>
</div> -->
</div>
<div class="col-sm-10 col-xs-12" style="" id="manageseiings"></div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$(".btnsettings").click(function(){
			 var user=$("#user_email").val();
			var myrole=$(this).attr("role");
				 $.post("modules/system/super_admin/pages/manage_settings/"+myrole+".php",{user:user},function(data){
 	$("#manageseiings").html(data);
		})
	})
	})
</script>