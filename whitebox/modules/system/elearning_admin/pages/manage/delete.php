<style type="text/css">
	.noty_pages{
		margin-top: 5px;
		min-height: 350px;
		max-height: 350px;
		box-shadow: 0 0 2px #ccc;
		overflow: auto;
	}
	#control_housed{
		margin-top: 10px;
	}
</style>
<?php
$user=base64_decode($_POST['user']);

include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$user=base64_decode($_POST['user']);
 //session_start();
$date = time();
	$new_time=$date;
$get_user=mysqli_query($con,"SELECT * FROM administrators WHERE user_name='$user'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$host_id=(int)$get['Id'];

$delete=mysqli_query($con,"DELETE FROM notify_tray where action='delete' and Status='new' and host_id='$host_id'") or die(mysqli_error($con));


?>
<div class="col-xs-12 col-sm-12">
<div class="col-xs-12 col-sm-12 default_header">Delete innovations</div>
<div class="col-sm-12 col-xs-12 not_shown" id="send_notification"></div>
<div class="col-xs-12 col-sm-12 notify_alld">
	<div class="col-sm-6 col-xs-12">

	<div class="col-sm-12 col-xs-12">
		Search innovations here:
		<input type="text" id="search_field" class="splashinputs" name="" placeholder="e.g mobi serve">
</div>
<div class="col-sm-12 col-xs-12 noty_pages" id="noty_pages"></div>

	</div>
		<div class="col-sm-6 col-xs-12">

	<div class="col-sm-12 col-xs-12 mobile_hidden" style="min-height: 56px">
</div>
<div class="col-sm-12 col-xs-12 noty_pages" id="selected_pages"></div>

	</div>

</div>
<div class="col-xs-12 col-sm-12 notify_alld" id="control_housed">
	<div class="col-sm-4 col-xs-1"></div>
	<div class="col-sm-4 col-xs-10">
		<span class="btn theme_bg page_bntg" role="back">
			Back
		</span>
		<span class="btn theme_bg page_bntg" role="clear">
			<i id="count_counterd"></i> Clear list
		</span>
		<span class="btn theme_bg page_bntg" role="submit">
			Submit
		</span>
	</div>
</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
$(".page_bntg").click(function(){
      var action=btoa("delete");
      var user=$("#user_email").val();
	var role=$(this).attr("role");
	if(role=="clear"){

           $.post("modules/system/super_admin/pages/manage/removeall.php",{user:user,action:action},function(responce){
	var search=btoa($("#search_field").val());
			//alert(search)
			if(search){
           $.post("modules/system/super_admin/pages/manage/search.php",{search:search,action:action},function(responce){
            
           	$("#selected_pages").html("")
           	$("#noty_pages").html(responce)

       })
       }else{
      $("#selected_pages").html("")
       	$("#noty_pages").html("")
       }

       })
	}else if(role=="submit"){
	      $.post("modules/system/super_admin/pages/manage/getcheck.php",{user:user,action:action},function(data){
       if($.trim(data)=="success"){
	      $.post("modules/system/super_admin/pages/manage/confirm_delete.php",{user:user,action:action},function(responce){
            $(".notify_alld").hide();
	      	$("#send_notification").html(responce).show();
	      })
}else{

}
	  })

	}else{
 $.get("modules/system/super_admin/pages/manage/manage.php",function(data){
            $("#home").html(data);})
	}
})

		$("#search_field").keyup(function(){
			var search=btoa($(this).val());
			var action=btoa("delete");
			//alert(search)
			if(search){
           $.post("modules/system/super_admin/pages/manage/search.php",{search:search,action:action},function(responce){$("#noty_pages").html(responce)})
       }else{
       	$("#noty_pages").html("")
       }
		})
	})
</script>