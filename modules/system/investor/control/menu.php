
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
</script>
<?php 
/*
include "../../../../connect.php";
$my_user=$_POST['my_id'];
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

<?php $datem = date('m');
$datey = date('Y');
//$datem = date('m');
$dated = date('d ');

 ?>
<script type="text/javascript">
	$(document).ready(function(){
$(".buton_naves").click(function(){

	var datem='<?php echo $datem ?>' ;
	var datey='<?php echo $datey ?>' ;
	var dated='<?php echo $dated ?>' ;
	var role=$(this).attr("role")
	if(role=="Controlpanel"){

				$("#menu_page").show().removeClass("slideOutLeft").addClass("animated slideInLeft");
			}else if(role=="shamsiya"){
				$.post("modules/system/"+role+"/cashflow.php",{
				datem:datem,
				datey:datey,
				dated:dated
	},function(data){
		$("#home").html(data)
		
	})
			}else{
		$("#menu_page").removeClass("slideInLeft").addClass("slideOutLeft");
	$.post("modules/system/"+role+"/"+role+".php",{
                datem:datem,
				datey:datey,
				dated:dated
	},function(data){
		

		$("#home").html(data);
	})
}
	})
})
</script>
<div class="col-sm-12 col-xs-12 controls_holders no_padding">
	<div class="col-xs-12 col-sm-12 buton_naves"><?php //echo $first_name
	?></div>
	<div id="menu" class=" no_padding col-sm-12 col-xs-12 ">
	    <div class=" nmk_controls   col-xs-12 col-sm-12"   role="Dashboard"><i class="fa fa-dashboard"></i> My Dashboard</div>
	<div class=" nmk_controls   col-xs-12 col-sm-12"   role="profile"><i class="fa fa-user"></i> My profile</div>
    <div class=" nmk_controls    col-xs-12 col-sm-12"   role="innovations"><i class="fa fa-creative-commons"></i> Innovations</div>
   <!-- <div class=" nmk_controls   col-xs-12 col-sm-12"   role="reports"> <i class="fa fa-file"></i> Reports</div>-->
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
    
	$.post("modules/system/investor/pages/"+nmk_role+".php",{

	},function(data){
$("#home").html(data);
$("#menu_page").removeClass("slideInLeft").addClass("slideOutLeft");

})


  }else{
 
  }



}else{
	$("#menu_page").removeClass("slideInLeft").addClass("slideOutLeft");
	var my_id=$("#global_u_email").val();
	//alert("myid="+my_id)
$.post("modules/system/investor/pages/"+nmk_role+".php",{
my_id:my_id
	},function(data){
		//alert(data)

$("#home").html(data);



})



}



	


})


	})

</script>