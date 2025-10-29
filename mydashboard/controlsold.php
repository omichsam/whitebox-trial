<style type="text/css">
.buton_naves{
    color: #a1b6b9;
    font-size: 18px;
    cursor: pointer;
    margin-top: 10px;
    text-align: left;
    min-height: 31px;
}
}
.buton_naves:hover{
	
	background-color: #1A2226;
	}
.buton_n{
	min-height: 30px;
	background-color: #1A2226;
	color: #a1b6b9;
}
.controls_holders{
	min-height: 630px;
	    margin-top: 0px;
    background-color: #222d32;
    border-radius:4px;
}
}
.online{
	min-height: 2px;
	border-radius:9px;
	background-color: green;
}

.led-box {
  height: 30px;
  width: 25%;
  float: left;
}


.led-green {
  margin: 0 auto;
  width: 24px;
  height: 24px;
  background-color: #0dff00;
  border-radius: 50%;
  box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #1a823b 0 -1px 9px, rgba(0, 100, , 0.5) 0 2px 12px;
  -webkit-animation: blinkRed 1.5s infinite;
  -moz-animation: blinkRed 1.5s infinite;
  -ms-animation: blinkRed 1.5s infinite;
  -o-animation: blinkRed 1.5s infinite;
  animation: blinkRed 1.5s infinite;
}

@-webkit-keyframes blinkRed {
    from { background-color: #0dff00; }
    50% { background-color: #00aa2a; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #1a823b 0 -1px 9px, rgba(255, 0, 0, 0.5) 0 2px 0;}
    to { background-color: #0dff00; }
}
@-moz-keyframes blinkRed {
    from { background-color: #0dff00; }
    50% { background-color: #00aa2a; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #1a823b 0 -1px 9px, rgba(255, 0, 0, 0.5) 0 2px 0;}
    to { background-color: #0dff00; }
}
@-ms-keyframes blinkRed {
    from { background-color: #0dff00; }
    50% { background-color: #00aa2a; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #1a823b 0 -1px 9px, rgba(255, 0, 0, 0.5) 0 2px 0;}
    to { background-color: #0dff00; }
}
@-o-keyframes blinkRed {
    from { background-color: #0dff00; }
    50% { background-color: #00aa2a; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #1a823b 0 -1px 9px, rgba(255, 0, 0, 0.5) 0 2px 0;}
    to { background-color: #0dff00; }
}
@keyframes blinkRed {
    from { background-color: #0dff00; }
    50% { background-color: #00aa2a; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #1a823b 0 -1px 9px, rgba(0, 100, 0, 0.5) 0 2px 0;}
    to { background-color: #0dff00; }
}
</style>

<?php 
include("../connect.php");
$model=base64_decode($_POST['model']);
//echo $model;
$get_elerning=mysqli_query($con,"SELECT * FROM e_learning_users WHERE email='$model'") or die(mysqli_error($con));
$geter=mysqli_fetch_assoc($get_elerning);
if($geter){
$user=$geter['first_name'];
}else{
$user="";    
}
$get_user=mysqli_query($con,"SELECT * FROM users WHERE email='$model'") or die(mysqli_error($con));
$geteruser=mysqli_fetch_assoc($get_user);
if($geter){
$geteruser="";
}else{
$geteruser="not_shown";    
}



 ?>
<script type="text/javascript">
	$(document).ready(function(){
		var my_id=$("#user_email").val();
			$.post("e_learning/Dashboard/Dashboard.php",{my_id:my_id},function(data){
		$("#learning_area").html(data)
		
	})
$(".buton_naves").click(function(){
	var role=$(this).attr("role")

	
	if(role=="Controlpanel"){
 //$("#menu_page").show().removeClass("slideOutLeft").addClass("animated slideInLeft");
 $("#menu_page").removeClass("slideInLeft").addClass("slideOutLeft");
				//$("#menu_page").show().removeClass("slideOutLeft").addClass("animated slideInLeft");
			}else if(role=="innovation"){
				var model=$("#user_email").val();
				$.post("mydashboard/dashboard.php",{
				model:model
	},function(data){
		$("#landing_page").show().html(data);
		$("#menu_page").removeClass("slideInLeft").addClass("slideOutLeft");
		//$("#menu_page").show().removeClass("slideOutLeft").addClass("animated slideInLeft");
		
	})
			}else{
	$.post("e_learning/"+role+"/"+role+".php",{
my_id:my_id
	},function(data){
		$("#menu_page").removeClass("slideInLeft").addClass("slideOutLeft");
		//$("#menu_page").show().removeClass("slideOutLeft").addClass("animated slideInLeft");
		$("#learning_area").html(data)
		
	})
}
	})
})
			function logout(){


			var txt;
  var r = confirm("Do you want to logout?");
  if (r == true) {
   $.post("login/logout.php",function(data){
                var ddata=atob(data)
                if(ddata=="success"){
             location.replace("index.php");
                }else{

                }
            });
    //$("#menu_page").removeClass("slideInLeft").addClass("slideOutLeft");
}else{

    $("#menu_page").removeClass("slideInLeft").addClass("slideOutLeft");
}
		
		  
	}
</script>
<div class="col-sm-12 col-xs-12 controls_holders no_padding">
	<div class="col-xs-10 col-sm-10 buton_naves"><?php echo "Welcome: ".$user
	?></div>
	<div class="col-xs-2 col-sm-2 buton_naves">
		<div class="led-box ">
     <div class="led-green"></div>
</div>
 </div>
<div class="col-xs-12 col-sm-12 buton_n ">E-LEARNING PORTAL</div>
<div class="col-xs-12 col-sm-12 buton_naves" role="Dashboard"><i class="fa fa-dashboard"></i> Dashboard</div>
<div class="col-xs-12 col-sm-12 buton_naves" role="curriculum"><i class="fa fa-list"></i> Modules</div>
<div class="col-xs-12 col-sm-12 buton_naves" role="tests"><i class="fa fa-line-chart"></i> My scores</div>

<div class="col-xs-12 col-sm-12 buton_naves" role="chats"><i class="fa fa-comments"></i> Chats</div>
<div class="col-xs-12 col-sm-12 buton_naves" role="calender"><i class="fa fa-calendar"></i> Events Calendar</div>
<div class="col-xs-12 col-sm-12 buton_naves" role="profile"><i class="fa fa-user"></i> My Profile</div>
<!--<div class="col-xs-12 col-sm-12 buton_naves" role="curriculum"><i class="fa fa-files-o"></i> Curriculum</div>
<div class="col-xs-12 col-sm-12 buton_naves" role="members"><i class="fa fa-comment"></i> Notifications</div>
<div class="col-xs-12 col-sm-12 buton_naves" role="leaders"><i class="fa fa-user"></i> Profile</div>-->
<!--<div class="col-xs-12 col-sm-12 buton_naves <?php echo $e_learning?>" role="innovation"><i class="fa fa-lightbulb-o"></i> Innovation Portal</div>-->
<div class="col-xs-12 col-sm-12 buton_naves" role=""><li onclick="logout()"><i class="fa fa-sign-out"></i> Log Out</li></div>

</div>
