
<?php 
/*
include "../../../../connect.php";

$my_userde=encrypt($my_user,$key);
$get_user=mysql_query("SELECT * FROM external_users WHERE Email_address='$my_userde'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
$First_name=$get['First_name'];
$Last_name=$get['Last_name'];
 // alert($Last_name);

*/
 ?>

<div id="menu" class=" no_padding col-sm-12 col-xs-12 ">
	<div class=" nmk_controlsds   col-xs-12 col-sm-12"   role="Dashboard"><i class="fa fa-dashboard"></i> My Dashboard</div>
	<div class=" nmk_controlsds   col-xs-12 col-sm-12"   role="profile"><i class="fa fa-user"></i> My profile</div>
    <div class=" nmk_controlsds    col-xs-12 col-sm-12"   role="check_updates"><i class="fa fa-creative-commons"></i> Innovations</div>
    <!--<div class=" nmk_controlsds   col-xs-12 col-sm-12"   role="reports"> <i class="fa fa-file"></i> Reports</div>-->
    <div class=" nmk_controlsds   col-xs-12 col-sm-12"   role="logout"> <i class="fa fa-sign-out"></i> Logout</div>
  
</div>
<script type="text/javascript">
	$(document).ready(function(){
$(".nmk_controlsds").click(function(){
var loader=$("#loader").html()
var nmk_role=$(this).attr("role");
if(nmk_role=="logout"){

var txt;
  var r = confirm("Do you want to logout?");
  if (r == true) {
    
	$.post("modules/system/investor/pages/"+nmk_role+".php",{

	},function(data){
$("#home").html(data);

})


  }else{
 
  }



}else if(nmk_role=="check_updates"){
	var my_id=$("#global_u_email").val();
	//alert("myid="+my_id)
$.post("modules/system/investor/pages/profile/"+nmk_role+".php",{
my_id:my_id
	},function(data){
		//alert(data)

$("#home").html(data);

})



}else{
var my_id=$("#global_u_email").val();
	//alert("myid="+my_id)
$.post("modules/system/investor/pages/"+nmk_role+"/"+nmk_role+".php",{
my_id:my_id
	},function(data){
		//alert(data)

$("#home").html(data);

})
}



	


})


	})

</script>