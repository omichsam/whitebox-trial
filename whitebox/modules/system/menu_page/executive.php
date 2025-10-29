
<script type="text/javascript">
		function logout(){


			var txt;
  var r = confirm("Do you want to logout?");
  if (r == true) {
   var user=$("#user_email").val();
		$.post("plugins/php_functions/updatelods.php",{user:user},function(data){
        
     $("#splashpage").show();
		  $(".overly").show();

		  $("#loginbox").show();
		  
          $("#landingpage").hide();
          $(".splashinputs").val('');
          setCookie('user_id',"",90);
		  setCookie('user_email',"",90);
		  setCookie('user_name',"",90);
		  setCookie('user_phone',"",90);
		  setCookie('status',"logedout",90);
		})
    //$("#menu_page").removeClass("slideInLeft").addClass("slideOutLeft");
}else{

    $("#menu_page").removeClass("slideInLeft").addClass("slideOutLeft");
}
		
		  
	}
	$(document).ready(function(){
		$("#closemenu_btn").click(function(){
			$("#menu_page").removeClass("slideInLeft").addClass("slideOutLeft");
		})
	})
</script>

<div class=" float_left s100">
	<i class="fa fa-arrow-left  btn" id="closemenu_btn"></i>
	<br>

	
</div>
<div class="menu_bodys float_left s100">

<script type="text/javascript">
	$(document).ready(function(){
   $(".nmk_controls").click(function(){

	var role=$(this).attr("role")
	if(role=="logout"){

    logout()
    //$("#menu_page").removeClass("slideInLeft").addClass("slideOutLeft");



			}else{
		$("#menu_page").removeClass("slideInLeft").addClass("slideOutLeft");
	$.post("modules/system/executive/pages/"+role+"/"+role+".php",{
                
	},function(data){
		

		$("#home").html(data);
	})
}
	})
})
</script>
<div class="col-sm-12 col-xs-12 controls_holders no_padding">
	<div id="menu" class=" no_padding col-sm-12 col-xs-12 ">
	<div class=" nmk_controls   col-xs-12 col-sm-12"   role="Dashboard"><i class="fa fa-dashboard"></i> My Dashboard</div>
    <div class=" nmk_controls    col-xs-12 col-sm-12"   role="view"><i class="fa fa-lightbulb-o"></i> Received Innovations</div>
    <div class=" nmk_controls    col-xs-12 col-sm-12"   role="pending"><i class="fa fa-clock-o"></i>  Evaluating team's Data</div>
   <div class=" nmk_controls    col-xs-12 col-sm-12"   role="forward"><i class="fa fa-forward"></i>  Forward Innovations</div>
      <div class=" nmk_controls   col-xs-12 col-sm-12"   role="logout"> <i class="fa fa-sign-out"></i> Logout</div>
</div>

</div>

	<!--<div class="float_left s100" id="menu_headliks">
		<h3 style="text-transform:capitalize;">
			<?php echo "$Name"; ?>
			<br>
			<span class="btn " onclick="openpages('myprofile','1')"><i class="fa fa-edit"></i> Edit Profile</span>
		</h3>
	</div>-->
</div>

<div class="menu_foot float_left s100">
	
</div>
