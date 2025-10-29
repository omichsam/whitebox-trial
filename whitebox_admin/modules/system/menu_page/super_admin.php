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
    var loader=$("#loader").html()
$(".nmk_controlsdzmob").click(function(){

  var role=$(this).attr("role")
        var loader=$("#loader").html();
        
    var my_id=$("#user_email").val();

  if(role=="Controlpanel"){

      }else if(role=="logout"){
          //$("#menu_page").show().removeClass("slideOutLeft").addClass("animated slideInLeft");
          $("#time_top").show()
       $("#loading_top").html("")
          }else{
    $("#loading_top").html("Processing data..kindly wait.. "+loader).show()
    $("#time_top").hide()
  $.post("modules/system/executive/pages/"+role+"/"+role+".php",{
    my_id:my_id
  },function(data){

   $("#loading_top").html("").hide();
$("#time_top").show()
    $("#home").html(data)

$("#menu_page").removeClass("slideInLeft").addClass("slideOutLeft");  })
}
  })
$(".nmk_clerskdfmob").click(function(){

  var role=$(this).attr("role")

    var my_id=$("#user_email").val();

  if(role=="Controlpanel"){
        $("#loading_top").html("")
        $("#menu_page").show().removeClass("slideOutLeft").addClass("animated slideInLeft");
        $("#time_top").show()
      }else if(role=="viewold"){
        $("#loading_top").html("Processing data..kindly wait.. "+loader).show()
        $("#time_top").hide()
  $.post("modules/system/clerk/pages/view/"+role+".php",{
    my_id:my_id
  },function(data){
    $("#loading_top").html("").hide();
$("#time_top").show()
    $("#home").html(data)

$("#menu_page").removeClass("slideInLeft").addClass("slideOutLeft");    
  })
      }else{
$("#loading_top").html("Processing data..kindly wait.. "+loader).show()
$("#time_top").hide()
  $.post("modules/system/clerk/pages/"+role+"/"+role+".php",{
    my_id:my_id
  },function(data){
$("#loading_top").html("").hide();
$("#time_top").show()
    $("#home").html(data)

$("#menu_page").removeClass("slideInLeft").addClass("slideOutLeft");    
  })
}
  })

$(".contentem").click(function(){

  var role=$(this).attr("role")

    var my_id=$("#user_email").val();

  if(role=="Controlpanel"){
    $("#loading_top").html("")

        $("#menu_page").show().removeClass("slideOutLeft").addClass("animated slideInLeft");
        $("#time_top").show()
      }else if(role=="viewold"){
        $("#loading_top").html("Processing data..kindly wait.. "+loader).show()
        $("#time_top").hide()
  $.post("modules/system/content_team/pages/view/"+role+".php",{
    my_id:my_id
  },function(data){
   $("#loading_top").html("").hide();
$("#time_top").show()
    $("#home").html(data)

$("#menu_page").removeClass("slideInLeft").addClass("slideOutLeft");    
  })
      }else{
$("#loading_top").html("Processing data..kindly wait.. "+loader).show()
$("#time_top").hide()
  $.post("modules/system/content_team/pages/"+role+"/"+role+".php",{
    my_id:my_id
  },function(data){
$("#loading_top").html("").hide();
$("#time_top").show()
    $("#home").html(data)

$("#menu_page").removeClass("slideInLeft").addClass("slideOutLeft");    
  })
}
  })


$(".nmk_adminsdmob").click(function(){

  var role=$(this).attr("role")
    var my_id=$("#user_email").val();
  if(role=="Controlpanel"){
$("#loading_top").html("")
        $("#menu_page").show().removeClass("slideOutLeft").addClass("animated slideInLeft");
        $("#time_top").show()
      }else{
$("#loading_top").html("Processing data..kindly wait.. "+loader).show()
$("#time_top").hide()
  $.post("modules/system/super_admin/pages/"+role+"/"+role+".php",{
     my_id:my_id
  },function(data){
$("#loading_top").html("").hide();
$("#time_top").show()
    $("#home").html(data)

$("#menu_page").removeClass("slideInLeft").addClass("slideOutLeft");    
  })
}
  })
$(".communicatesmob").click(function(){

  var role=$(this).attr("role")
    var my_id=$("#user_email").val();
  if(role=="Controlpanel"){
$("#loading_top").html("")
        $("#menu_page").show().removeClass("slideOutLeft").addClass("animated slideInLeft");
        $("#time_top").hide()
      }else{
$("#loading_top").html("Processing data..kindly wait.. "+loader).show()
$("#time_top").hide()
  $.post("modules/system/communications/pages/"+role+"/"+role+".php",{
     my_id:my_id
  },function(data){
    $("#loading_top").html("")

    $("#home").html(data)

$("#menu_page").removeClass("slideInLeft").addClass("slideOutLeft");    
  })
}
  })


$(".elearnb").click(function(){

  var role=$(this).attr("role")
    var my_id=$("#user_email").val();
  if(role=="Controlpanel"){
$("#loading_top").html("")
        $("#menu_page").show().removeClass("slideOutLeft").addClass("animated slideInLeft");
        $("#time_top").show()
      }else{
$("#loading_top").html("Processing data..kindly wait.. "+loader).show()
$("#time_top").hide()
  $.post("modules/system/elearning_admin/pages/"+role+"/"+role+".php",{
     my_id:my_id
  },function(data){
$("#loading_top").html("").hide();
$("#time_top").show()
    $("#home").html(data)

$("#menu_page").removeClass("slideInLeft").addClass("slideOutLeft");    
  })
}
  })
$(".diveconmob").click(function(){

  var divcon=$(this).attr("role");
    $(".menu_kkdiveskmob").hide();
  $(".menu_kkdivesmpo").hide();
  $("#"+divcon).show();
  if(divcon=="e_learningmob"){
    $("#superadmin_divdmobhop").show()

  }else{

  }

})
$(".diveconmobbp").click(function(){
  var divconp=$(this).attr("role");
  $(".menu_kkdivesmpo").hide();
  $("#"+divconp).show();
})


})































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
	$.post("modules/system/super_admin/pages/"+role+"/"+role+".php",{
                
	},function(data){
		

		$("#home").html(data);
		$("#menu_page").removeClass("slideInLeft").addClass("slideOutLeft");
	})
}
	})
})
</script>
<div class="col-sm-12 col-xs-12  controls_holders no_padding">
	
   

    <div class=" nmk_controlsds diveconmob  col-xs-12 col-sm-12" role="evaluating_divdmob" style="background:#000 !important;color:#fff !important;" >Evaluating Team</div>
     <div class="col-xs-12 col-sm-12 no_padding not_shown menu_kkdiveskmob" id="evaluating_divdmob">
    <div class=" nmk_controlsds nmk_clerskdfmob   col-xs-12 col-sm-12"   role="Dashboard"><i class="fa fa-dashboard"></i>  My Dashboard</div>
   <div class=" nmk_controlsds nmk_clerskdfmob    col-xs-12 col-sm-12"   role="view"><i class="fa fa-lightbulb-o"></i>  Received Innovations</div>
    <div class=" nmk_controlsds nmk_clerskdfmob col-xs-12 col-sm-12"   role="viewold"><i class="fa fa-lightbulb-o"></i>  Old system's Innovations </div>
  <!--<div class=" nmk_clerskdfmob nmk_controlsds   col-xs-12 col-sm-12"   role="covid"><i class="fa fa-ambulance" style="color:red;"></i>  COVID 19 innovations</div>-->
  <div class=" nmk_clerskdfmob nmk_controlsds   col-xs-12 col-sm-12"   role="pending"><i class="fa fa-lightbulb-o"></i>  Pending Innovations</div>
  
    
  <div class=" nmk_clerskdfmob nmk_controlsds   col-xs-12 col-sm-12"   role="generate"> <i class="fa fa-book"></i> Generate Report</div>
</div>
    <div class=" nmk_controlsds diveconmob  col-xs-12 col-sm-12" role="executive_divdmob" style="background:#000 !important;color:#fff !important;" >Executive's menu</div>
    <div class="col-xs-12 col-sm-12 no_padding not_shown menu_kkdiveskmob" id="executive_divdmob">
    <div class=" nmk_controlsds nmk_controlsdzmob   col-xs-12 col-sm-12"   role="Dashboard"><i class="fa fa-dashboard"></i>  My Dashboard</div>
  <div class=" nmk_controlsds nmk_controlsdzmob  col-xs-12 col-sm-12"   role="view"><i class="fa fa-lightbulb-o"></i>  Received Innovations</div>
   <div class=" nmk_controlsds  nmk_controlsdzmob  col-xs-12 col-sm-12"   role="pending"><i class="fa fa-clock-o"></i>  Evaluating team's Data</div>
   <div class=" nmk_controlsds nmk_controlsdzmob   col-xs-12 col-sm-12"   role="forward"><i class="fa fa-forward"></i>  Forward Innovations</div>
</div>
     <div class=" nmk_controlsds diveconmob  col-xs-12 col-sm-12" role="superadmin_divdmob" style="background:#000 !important;color:#fff !important;" >Super admin's menu</div>
 <div class="col-xs-12 col-sm-12 no_padding menu_kkdiveskmob" id="superadmin_divdmob">
  <div class=" nmk_controlsds nmk_adminsdmob col-xs-12 col-sm-12"   role="Dashboard"><i class="fa fa-dashboard"></i> My Dashboard</div>
  <div class=" nmk_controlsds nmk_adminsdmob col-xs-12 col-sm-12"   role="view"><i class="fa fa-users"></i> Manage Users</div>
  <div class=" nmk_controlsds nmk_adminsdmob  col-xs-12 col-sm-12"   role="innovations"><i class="fa fa-file"></i> Innovations</div>

  <div class=" nmk_controlsds nmk_adminsdmob  col-xs-12 col-sm-12"   role="manage"><i class="fa fa-pencil fa-fw"></i> Manage Innovations</div>
   <div class=" nmk_controlsds nmk_adminsdmob  col-xs-12 col-sm-12"   role="datapage"><i class="fa fa-file"></i> Manage data</div>

  <div class=" nmk_controlsds nmk_adminsdmob  col-xs-12 col-sm-12"   role="messages"><i class="fa fa-envelope"></i> Emails</div>

</div>



<div class=" nmk_controlsds diveconmob  col-xs-12 col-sm-12" role="e_learningmob" style="background:#000 !important;color:#fff !important;" >E-learning Menu</div>
     <div class="col-xs-12 col-sm-12 no_padding not_shown menu_kkdiveskmob" id="e_learningmob">

<div class=" nmk_controlsds diveconmobbp  col-xs-12 col-sm-12" role="content_divdmob" style="background:#775e5e !important;color:#fff !important;" >Content Team</div>
     <div class="col-xs-12 col-sm-12 no_padding not_shown menu_kkdivesmpo" id="content_divdmob">
    <div class=" nmk_controlsds contentem   col-xs-12 col-sm-12"   role="Dashboard"><i class="fa fa-dashboard"></i>  My Dashboard</div>
    <div class=" nmk_controlsds contentem    col-xs-12 col-sm-12"   role="view"><i class="fa fa-users"></i>  Registered members</div>
     <div class=" nmk_controlsds contentem col-xs-12 col-sm-12"   role="content"><i class="fa fa-list"></i>  Content </div>
    <div class=" contentem nmk_controlsds   col-xs-12 col-sm-12"   role="tests"><i class="fa fa-line-chart"></i>  Tests/Surveys</div>
     <div class=" contentem nmk_controlsds   col-xs-12 col-sm-12"   role="performance"><i class="fa fa-line-chart"></i>  Perfomence</div>
      <div class=" contentem nmk_controlsds   col-xs-12 col-sm-12"   role="feedback"><i class="fa fa-comments"></i>  Feedback</div>

      <div class=" contentem nmk_controlsds   col-xs-12 col-sm-12"   role="caverage"><i class="fa fa-bar-chart  "></i>  Module coverage</div>
      <div class="contentem nmk_controlsds   col-xs-12 col-sm-12"   role="practicles"><i class="fa fa-lightbulb-o  "></i> Practicals</div>
      <div class=" contentem nmk_controlsds   col-xs-12 col-sm-12"   role="certificates"><i class="fa fa-certificate  "></i> Certificates</div>
       <div class=" contentem nmk_controlsds   col-xs-12 col-sm-12"   role="calender"><i class="fa fa-calendar  "></i> Calendar</div>
</div>
    <div class=" nmk_controlsds diveconmobbp  col-xs-12 col-sm-12" role="communicate_divdmob" style="background:#775e5e !important;color:#fff !important;" >Communications Team</div>
    <div class="col-xs-12 col-sm-12 no_padding not_shown menu_kkdivesmpo" id="communicate_divdmob">
    <div class=" nmk_controlsds communicatesmob   col-xs-12 col-sm-12"   role="Dashboard"><i class="fa fa-dashboard"></i>  My Dashboard</div>
  <div class=" nmk_controlsds communicatesmob    col-xs-12 col-sm-12"   role="chats"><i class="fa fa-comments"></i> Online chats</div>
   <div class=" nmk_controlsds communicatesmob    col-xs-12 col-sm-12"   role="closed_chats"><i class="fa fa-comments"></i> Closed chats</div>
   <!--<div class=" nmk_controlsds communicatesmob   col-xs-12 col-sm-12"   role="forward"><i class="fa fa-forward"></i>  Forward Innovations</div>-->
</div>
     <div class=" nmk_controlsds diveconmobbp  col-xs-12 col-sm-12" role="superadmin_divdmobhop" style="background:#775e5e !important;color:#fff !important;" >Admin's menu</div>
 <div class="col-xs-12 col-sm-12 no_padding menu_kkdivesmpo" id="superadmin_divdmobhop">
  <div class=" nmk_controlsds elearnb col-xs-12 col-sm-12"   role="Dashboard"><i class="fa fa-dashboard"></i> My Dashboard</div>
  <div class=" nmk_controlsds elearnb col-xs-12 col-sm-12"   role="view"><i class="fa fa-users"></i> Manage Internal Users</div>
 
   <div class=" nmk_controlsds elearnb  col-xs-12 col-sm-12"   role="datapage"><i class="fa fa-file"></i> Manage Learners</div>


</div>
















     </div>






















    <div class=" nmk_controls   col-xs-12 col-sm-12"   role="logout" onclick="logout()"> <i class="fa fa-sign-out"></i> Logout</div>
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
