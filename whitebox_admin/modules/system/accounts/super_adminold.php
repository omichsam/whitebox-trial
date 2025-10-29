<style>
    #menu{
  margin-top: 55px;
  background:#d3c2bd;
}
.nmk_controlsds:hover{
font-size:14px;
text-transform: uppercase;
background:#ccc;

  }
.nmk_controlsds{
  cursor:pointer;
  background-image: -webkit-linear-gradient(-90deg,rgba(255,255,255,0),rgba(37,37,37,0.13));
border-width: 1px;
border-style: solid;
border-color: #7e675c #755c50 #63493d #755c50;
border-radius: 0px;
-moz-border-radius: 0px;
-webkit-border-radius: 0px;
-moz-transition: all 0.5s;
-webkit-transition: all 0.5s;
-o-transition: all 0.5s;
padding: 13px 10px;
color: #000;
text-shadow: 0 1px 2px #000000;
}

.incactive_button:hover{
font-size:14px;
text-transform: uppercase;
background:#ccc;

  }
.incactive_button{
  cursor:pointer;
  background-image: -webkit-linear-gradient(-90deg,rgba(255,255,255,0),rgba(37,37,37,0.13));
border-width: 1px;
border-style: solid;
border-color: #7e675c #755c50 #63493d #755c50;
border-radius: 0px;
-moz-border-radius: 0px;
-webkit-border-radius: 0px;
-moz-transition: all 0.5s;
-webkit-transition: all 0.5s;
-o-transition: all 0.5s;
padding: 13px 10px;
color: #000;
text-shadow: 0 1px 2px #000000;
}
</style>
<script type="text/javascript">
  $(document).ready(function(){
    var loader=$("#loader").html()
$(".nmk_controlsdz").click(function(){

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
  })
}
  })
$(".nmk_clerskdf").click(function(){

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
    
  })
}
  })


$(".nmk_adminsd").click(function(){

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
    
  })
}
  })
$(".communicates").click(function(){

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
    
  })
}
  })
$(".divecon").click(function(){

  var divcon=$(this).attr("role");
    $(".menu_kkdives").hide();
  $(".menu_kkdivesm").hide();
  $("#"+divcon).show();
  if(divcon=="e_learning"){
    $("#superadmin_divdh").show()

  }else{

  }

})
$(".diveconb").click(function(){
  var divcon=$(this).attr("role");
  $(".menu_kkdivesm").hide();
  $("#"+divcon).show();
})


})
</script>

<div id="menu" class=" no_padding col-sm-12 col-xs-12 ">



  
    <div class=" nmk_controlsds divecon  col-xs-12 col-sm-12" role="evaluating_divd" style="background:#000 !important;color:#fff !important;" >Evaluating Team</div>
     <div class="col-xs-12 col-sm-12 no_padding not_shown menu_kkdives" id="evaluating_divd">
    <div class=" nmk_controlsds nmk_clerskdf   col-xs-12 col-sm-12"   role="Dashboard"><i class="fa fa-dashboard"></i>  My Dashboard</div>
   <div class=" nmk_controlsds nmk_clerskdf    col-xs-12 col-sm-12"   role="view"><i class="fa fa-lightbulb-o"></i>  Received Innovations</div>
    <div class=" nmk_controlsds nmk_clerskdf col-xs-12 col-sm-12"   role="viewold"><i class="fa fa-lightbulb-o"></i>  Old system's Innovations </div>
  <!--<div class=" nmk_clerskdf nmk_controlsds   col-xs-12 col-sm-12"   role="covid"><i class="fa fa-ambulance" style="color:red;"></i>  COVID 19 innovations</div>-->
  <div class=" nmk_clerskdf nmk_controlsds   col-xs-12 col-sm-12"   role="pending"><i class="fa fa-lightbulb-o"></i>  Pending Innovations</div>
  
    
  <div class=" nmk_clerskdf nmk_controlsds   col-xs-12 col-sm-12"   role="generate"> <i class="fa fa-book"></i> Generate Report</div>
</div>
    <div class=" nmk_controlsds divecon  col-xs-12 col-sm-12" role="executive_divd" style="background:#000 !important;color:#fff !important;" >Executive's menu</div>
    <div class="col-xs-12 col-sm-12 no_padding not_shown menu_kkdives" id="executive_divd">
    <div class=" nmk_controlsds nmk_controlsdz   col-xs-12 col-sm-12"   role="Dashboard"><i class="fa fa-dashboard"></i>  My Dashboard</div>
  <div class=" nmk_controlsds nmk_controlsdz  col-xs-12 col-sm-12"   role="view"><i class="fa fa-lightbulb-o"></i>  Received Innovations</div>
   <div class=" nmk_controlsds  nmk_controlsdz  col-xs-12 col-sm-12"   role="pending"><i class="fa fa-clock-o"></i>  Evaluating team's Data</div>
   <div class=" nmk_controlsds nmk_controlsdz   col-xs-12 col-sm-12"   role="forward"><i class="fa fa-forward"></i>  Forward Innovations</div>
</div>
     <div class=" nmk_controlsds divecon  col-xs-12 col-sm-12" role="superadmin_divd" style="background:#000 !important;color:#fff !important;" >Super admin's menu</div>
 <div class="col-xs-12 col-sm-12 no_padding menu_kkdives" id="superadmin_divd">
  <div class=" nmk_controlsds nmk_adminsd col-xs-12 col-sm-12"   role="Dashboard"><i class="fa fa-dashboard"></i> My Dashboard</div>
  <div class=" nmk_controlsds nmk_adminsd col-xs-12 col-sm-12"   role="view"><i class="fa fa-users"></i> Manage Users</div>
  <div class=" nmk_controlsds nmk_adminsd  col-xs-12 col-sm-12"   role="innovations"><i class="fa fa-file"></i> Innovations</div>

  <div class=" nmk_controlsds nmk_adminsd  col-xs-12 col-sm-12"   role="manage"><i class="fa fa-pencil fa-fw"></i> Manage Innovations</div>
   <div class=" nmk_controlsds nmk_adminsd  col-xs-12 col-sm-12"   role="datapage"><i class="fa fa-file"></i> Manage data</div>

  <div class=" nmk_controlsds nmk_adminsd  col-xs-12 col-sm-12"   role="messages"><i class="fa fa-envelope"></i> Emails</div>

</div>



<div class=" nmk_controlsds divecon  col-xs-12 col-sm-12" role="e_learning" style="background:#000 !important;color:#fff !important;" >E-learning Menu</div>
     <div class="col-xs-12 col-sm-12 no_padding not_shown menu_kkdives" id="e_learning">

<div class=" nmk_controlsds diveconb  col-xs-12 col-sm-12" role="content_divd" style="background:#775e5e !important;color:#fff !important;" >Content Team</div>
     <div class="col-xs-12 col-sm-12 no_padding not_shown menu_kkdivesm" id="content_divd">
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
    <div class=" nmk_controlsds diveconb  col-xs-12 col-sm-12" role="communicate_divd" style="background:#775e5e !important;color:#fff !important;" >Communications Team</div>
    <div class="col-xs-12 col-sm-12 no_padding not_shown menu_kkdivesm" id="communicate_divd">
    <div class=" nmk_controlsds communicates   col-xs-12 col-sm-12"   role="Dashboard"><i class="fa fa-dashboard"></i>  My Dashboard</div>
  <div class=" nmk_controlsds communicates    col-xs-12 col-sm-12"   role="chats"><i class="fa fa-comments"></i> Online chats</div>
   <div class=" nmk_controlsds communicates    col-xs-12 col-sm-12"   role="closed_chats"><i class="fa fa-comments"></i> Closed chats</div>
   <!--<div class=" nmk_controlsds communicates   col-xs-12 col-sm-12"   role="forward"><i class="fa fa-forward"></i>  Forward Innovations</div>-->
</div>
     <div class=" nmk_controlsds diveconb  col-xs-12 col-sm-12" role="superadmin_divdh" style="background:#775e5e !important;color:#fff !important;" >Admin's menu</div>
 <div class="col-xs-12 col-sm-12 no_padding menu_kkdivesm" id="superadmin_divdh">
  <div class=" nmk_controlsds elearnb col-xs-12 col-sm-12"   role="Dashboard"><i class="fa fa-dashboard"></i> My Dashboard</div>
  <div class=" nmk_controlsds elearnb col-xs-12 col-sm-12"   role="view"><i class="fa fa-users"></i> Manage Internal Users</div>
 
   <div class=" nmk_controlsds elearnb  col-xs-12 col-sm-12"   role="datapage"><i class="fa fa-file"></i> Manage Learners</div>


</div>
















     </div>






     
   <!--
   <div class=" nmk_controlsds    col-xs-12 col-sm-12"   role="disclosure"><i class="fa fa-handshake-o"></i>  Non-disclosure Agreements</div>-->
   <!--<div class=" incactive_button   col-xs-12 col-sm-12"   role="generate"> <i class="fa fa-book"></i> Generate Report</div>-->
    <div class=" nmk_controlsds nmk_controlsdz  col-xs-12 col-sm-12"   role="logout" onclick="logout()"> <i class="fa fa-sign-out"></i> Logout</div>
  <div class="col-xs-12 col-sm-12"></div>
 <div class="col-xs-12 col-sm-12" id="menuloader"></div>
  
</div>
