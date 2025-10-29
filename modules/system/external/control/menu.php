
<script type="text/javascript">
	function logout(){
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
	}
	$(document).ready(function(){
		$("#closemenu_btn").click(function(){
			$("#menu_page").removeClass("slideInLeft").addClass("slideOutLeft");
		})
	})
	function refresh_picteds(){
	/*refresh messages counts*/
	  var my_id=$("#global_u_email").val();
	  	$.post("modules/system/external/control/refresh.php",{my_id:my_id},function(data){$("#notyholder").html(data)}); 
	  	$.post("modules/system/external/control/check_pitch.php",{my_id:my_id},function(data){$("#show_ptcheds").html(data)}); 
}
</script>
<?php 
/*
include "../../../../connect.php";
$my_user=$_POST['my_user'];
$get_user=mysql_query("SELECT * FROM external_users WHERE Email_address='$my_user'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
$First_name=$get['First_name'];
$Last_name=$get['Last_name'];
 // alert($Last_name);

*/
 ?>
<div class=" float_left s100">
	<i class="fa fa-arrow-left  btn" id="closemenu_btn"></i>
	<br>

	
</div>
<div class="menu_bodys float_left s100">


<div class="col-sm-12 col-xs-12 controls_holders no_padding">
	<div class="col-xs-12 col-sm-12 buton_naves"><?php //echo $first_name
	?></div>
	<div id="menu" class=" no_padding col-sm-12 col-xs-12 ">
	    
	<div class=" nmk_controls   col-xs-12 col-sm-12"   role="Dashboard"><i class="fa fa-dashboard"></i> My Dashboard</div>
	<div class=" nmk_controls   col-xs-12 col-sm-12"   role="profile"><i class="fa fa-user"></i> My profile</div>
    <div class=" nmk_controls    col-xs-12 col-sm-12"   role="check_updates"><i class="fa fa-creative-commons"></i> Innovations</div>
    <div class=" nmk_controls   col-xs-12 col-sm-12"   role="reports"> <i class="fa fa-file"></i> Reports</div>
    <div class=" nmk_controls   col-xs-12 col-sm-12"   role="feedback"> <i class="fa fa-envelope"></i> Feedbacks</div>
    <div class=" nmk_controls   col-xs-12 col-sm-12"   role="notifications"> <i class="fa fa-bell"></i> Notifications <span id="notyholderp"></span></div>
    <div class="col-xs-12 col-sm-12 nmk_controls no_padding" id="show_ptchedsp" role="pitch">pitch</div>
    <div class=" nmk_controls   col-xs-12 col-sm-12"   role="logout"> <i class="fa fa-sign-out"></i> Logout</div>

</div>

</div>

	<!--<div class="float_left s100" id="menu_headliks">
		<h3 style="text-transform:capitalize;">
			<?php echo "$first_name $last_name"; ?>
			<br>
			<span class="btn " onclick="openpages('myprofile','1')"><i class="fa fa-edit"></i> Edit Profile</span>
		</h3>
	</div>-->
</div>

<div class="menu_foot float_left s100">
	
</div>

<script type="text/javascript">
	$(document).ready(function(){
$(".nmk_controls").click(function(){
var loader=$("#loader").html()
var nmk_role=$(this).attr("role");
if(nmk_role=="logout"){

var txt;
  var r = confirm("Do you want to logout?");
  if (r == true) {
    
	$.post("modules/system/external/pages/"+nmk_role+".php",{

	},function(data){
		logout()
$("#home").html(data);
$("#menu_page").removeClass("slideInLeft").addClass("slideOutLeft");

})


  }else{
 
  }



}else if(nmk_role=="check_updates"){
	var my_id=$("#global_u_email").val();
	//alert("myid="+my_id)
$.post("modules/system/external/pages/profile/"+nmk_role+".php",{
my_id:my_id
	},function(data){
		//alert(data)

$("#home").html(data);
$("#menu_page").removeClass("slideInLeft").addClass("slideOutLeft");

})



}else{
var my_id=$("#global_u_email").val();
	//alert("myid="+my_id)
$.post("modules/system/external/pages/"+nmk_role+"/"+nmk_role+".php",{
my_id:my_id
	},function(data){
		//alert(data)

$("#home").html(data);
$("#menu_page").removeClass("slideInLeft").addClass("slideOutLeft");

})
}



	


})


	})

</script>