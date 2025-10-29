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
$(".nmk_controlsdz").click(function(){

  var role=$(this).attr("role")
        var loader=$("#loader").html();
        
    var my_id=$("#user_email").val();

  if(role=="Controlpanel"){

      }else if(role=="logout"){
          //$("#menu_page").show().removeClass("slideOutLeft").addClass("animated slideInLeft");
           $("#time_top").show();
       $("#menuloader").html("")
       $("#loading_top").html("")
          }else{
            $("#loading_top").html("Processing data..kindly wait.. "+loader).show()
             $("#time_top").hide();
    $("#menuloader").html(loader)
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
         $("#time_top").show();
      }else{
$("#loading_top").html("Processing data..kindly wait.. "+loader).show()
 $("#time_top").hide();
  $.post("modules/system/clerk/pages/"+role+"/"+role+".php",{
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
         $("#time_top").show();
      }else{
$("#loading_top").html("Processing data..kindly wait.. "+loader).show()
 $("#time_top").hide();
  $.post("modules/system/super_admin/pages/"+role+"/"+role+".php",{
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
  $("#"+divcon).show();
})


})
</script>

<div id="menu" class=" no_padding col-sm-12 col-xs-12 ">
  
    <div class=" nmk_controlsds divecon  col-xs-12 col-sm-12" role="evaluating_divd" style="background:#000 !important;color:#fff !important;" >Evaluating Team</div>
     <div class="col-xs-12 col-sm-12 no_padding not_shown menu_kkdives" id="evaluating_divd">
    <div class=" nmk_controlsds nmk_clerskdf   col-xs-12 col-sm-12"   role="Dashboard"><i class="fa fa-dashboard"></i>  My Dashboard</div>
<div class=" nmk_clerskdf nmk_controlsds   col-xs-12 col-sm-12"   role="view"><i class="fa fa-lightbulb-o"></i>  Received Innovations</div>
  <!--<div class=" nmk_clerskdf nmk_controlsds   col-xs-12 col-sm-12"   role="covid"><i class="fa fa-ambulance" style="color:red;"></i>  COVID 19 innovations</div>-->
  <div class=" nmk_clerskdf nmk_controlsds   col-xs-12 col-sm-12"   role="pending"><i class="fa fa-lightbulb-o"></i>  Pending Innovations</div>
  
    
  <div class=" nmk_clerskdf nmk_controlsds   col-xs-12 col-sm-12"   role="generate"> <i class="fa fa-book"></i> Generate Report</div>
</div>
    <div class=" nmk_controlsds divecon  col-xs-12 col-sm-12" role="executive_divd" style="background:#000 !important;color:#fff !important;" >Executive's menu</div>
    <div class="col-xs-12 col-sm-12 no_padding menu_kkdives" id="executive_divd">
    <div class=" nmk_controlsds nmk_controlsdz   col-xs-12 col-sm-12"   role="Dashboard"><i class="fa fa-dashboard"></i>  My Dashboard</div>
  <div class=" nmk_controlsds nmk_controlsdz  col-xs-12 col-sm-12"   role="view"><i class="fa fa-lightbulb-o"></i>  Received Innovations</div>
   <div class=" nmk_controlsds  nmk_controlsdz  col-xs-12 col-sm-12"   role="pending"><i class="fa fa-clock-o"></i>  Evaluating team's Data</div>
   <div class=" nmk_controlsds nmk_controlsdz   col-xs-12 col-sm-12"   role="forward"><i class="fa fa-forward"></i>  Forward Innovations</div>
</div>
    <!-- <div class=" nmk_controlsds divecon  col-xs-12 col-sm-12" role="superadmin_divd" style="background:#000 !important;color:#fff !important;" >Super admin's menu</div>
 <div class="col-xs-12 col-sm-12 no_padding menu_kkdives" id="superadmin_divd">
  <div class=" nmk_controlsds nmk_adminsd col-xs-12 col-sm-12"   role="Dashboard"><i class="fa fa-dashboard"></i> My Dashboard</div>
  <div class=" nmk_controlsds nmk_adminsd col-xs-12 col-sm-12"   role="view"><i class="fa fa-users"></i> Manage Users</div>
  <div class=" nmk_controlsds nmk_adminsd  col-xs-12 col-sm-12"   role="innovations"><i class="fa fa-file"></i> Innovations</div>

</div>-->






     
   <!--
   <div class=" nmk_controlsds    col-xs-12 col-sm-12"   role="disclosure"><i class="fa fa-handshake-o"></i>  Non-disclosure Agreements</div>-->
   <!--<div class=" incactive_button   col-xs-12 col-sm-12"   role="generate"> <i class="fa fa-book"></i> Generate Report</div>-->
    <div class=" nmk_controlsds nmk_controlsdz  col-xs-12 col-sm-12"   role="logout" onclick="logout()"> <i class="fa fa-sign-out"></i> Logout</div>
  <div class="col-xs-12 col-sm-12"></div>
 <div class="col-xs-12 col-sm-12" id="menuloader"></div>
  
</div>
