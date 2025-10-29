
<?php
/*
include "../../../../connect.php";
$counter=0;
$notificationshow="not_shown";
$sqlx="SELECT * FROM notifications where Status='new'";
    $query_runx=mysql_query($sqlx) or die($query_runx."<br/><br/>".mysql_error());
    while($row=mysql_fetch_array($query_runx)){
     $counter=$counter+1;   
    }
    if($counter==0){
        
    }else{
      $notificationshow="";  
    }

$my_user=$_POST['my_user'];
$get_user=mysql_query("SELECT * FROM external_users WHERE Email_address='$my_user'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
$First_name=$get['First_name'];
$Last_name=$get['Last_name'];
 // alert($Last_name);

*/
 ?>
<style>
    .notify{
        min-height:40px;
        min-width:30px;
        border:2px solid #000;
        box-shadow:0 0 2px #ccc;
        color:red;
        border-radius:20px;
        font-size:19px;
        text-align:center;
    }
</style>
<div id="menu" class=" no_padding col-sm-12 col-xs-12 ">
	<div class=" nmk_controlsds   col-xs-12 col-sm-12"   role="Dashboard"><i class="fa fa-dashboard"></i> My Dashboard</div>
	<div class=" nmk_controlsds   col-xs-12 col-sm-12"   role="profile"><i class="fa fa-user"></i> My Profile</div>
    <div class=" nmk_controlsds    col-xs-12 col-sm-12"   role="check_updates"><i class="fa fa-lightbulb-o"></i> Innovations</div>
   
    <div class=" nmk_controlsds   col-xs-12 col-sm-12"   role="feedback"> <i class="fa fa-envelope"></i> Feedbacks</div>
    <div class=" nmk_controlsds   col-xs-12 col-sm-12"   role="notifications"> <i class="fa fa-bell"></i> Notifications <span id="notyholder"></span></div>
    <div class="col-xs-12 col-sm-12 no_padding" id="show_ptcheds"></div>
   
    <div class=" nmk_controlsds   col-xs-12 col-sm-12"   role="logout"> <i class="fa fa-sign-out"></i> Logout</div>
  
</div>
<script type="text/javascript">
	$(document).ready(function(){
	    
	    /*Navigating menu*/
var noticepicted=setInterval(function(){
	refresh_picteds();
},5000);

	    
	    
$(".nmk_controlsds").click(function(){
var loader=$("#loader").html()
var nmk_role=$(this).attr("role");
if(nmk_role=="logout"){

var txt;
  var r = confirm("Do you want to logout?");
  if (r == true) {
    
	$.post("modules/system/external/pages/"+nmk_role+".php",{

	},function(data){
$("#home").html(data);

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

})



}else{
var my_id=$("#global_u_email").val();
	//alert("myid="+my_id)
$.post("modules/system/external/pages/"+nmk_role+"/"+nmk_role+".php",{
my_id:my_id
	},function(data){
		//alert(data)

$("#home").html(data);

})
}



	


})


	})
function refresh_picteds(){
	/*refresh messages counts*/
	  var my_id=$("#global_u_email").val();
	  	$.post("modules/system/external/control/refresh.php",{my_id:my_id},function(data){$("#notyholder").html(data);$("#notyholderp").html(data)}); 
	  	$.post("modules/system/external/control/check_pitch.php",{my_id:my_id},function(data){$("#show_ptcheds").html(data);$("#show_ptchedsp").html(data)}); 
}
</script>