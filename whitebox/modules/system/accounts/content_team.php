<style>
    #menu{
  margin-top: 55px;
  background:#d3c2bd;
}
.nmk_clerskdf:hover{
font-size:14px;
text-transform: uppercase;
background:#ccc;

  }
.nmk_clerskdf{
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
$(".nmk_clerskdf").click(function(){
	var loader=$("#loader").html()

	var role=$(this).attr("role")

		var my_id=$("#user_email").val();

	if(role=="Controlpanel"){

				$("#menu_page").show().removeClass("slideOutLeft").addClass("animated slideInLeft");
			}else if(role=="viewold"){
	$.post("modules/system/content_team/pages/view/"+role+".php",{
    my_id:my_id
	},function(data){

		$("#home").html(data)
		
	})
			}else{
$("#page_loader").html("Loading data.. "+loader)
	$.post("modules/system/content_team/pages/"+role+"/"+role+".php",{
    my_id:my_id
	},function(data){

		$("#home").html(data)
		$("#page_loader").html("")
		
	})
}
	})
})
</script>

<div id="menu" class=" no_padding col-sm-12 col-xs-12 ">
	<div class=" nmk_controlsds nmk_clerskdf   col-xs-12 col-sm-12"   role="Dashboard"><i class="fa fa-dashboard"></i>  My Dashboard</div>
   <div class=" nmk_controlsds nmk_clerskdf    col-xs-12 col-sm-12"   role="view"><i class="fa fa-users"></i>  Registered members</div>
    <div class=" nmk_controlsds nmk_clerskdf col-xs-12 col-sm-12"   role="content"><i class="fa fa-list"></i>  Content </div>
    <div class=" nmk_clerskdf nmk_controlsds   col-xs-12 col-sm-12"   role="tests"><i class="fa fa-line-chart"></i>  Tests/Surveys</div>
     <div class=" nmk_clerskdf nmk_controlsds   col-xs-12 col-sm-12"   role="performance"><i class="fa fa-line-chart"></i>  Perfomence</div>
      <div class=" nmk_clerskdf nmk_controlsds   col-xs-12 col-sm-12"   role="feedback"><i class="fa fa-comments"></i>  Feedback</div>

      <div class=" nmk_clerskdf nmk_controlsds   col-xs-12 col-sm-12"   role="caverage"><i class="fa fa-bar-chart  "></i>  Module coverage</div>
      <div class=" nmk_clerskdf nmk_controlsds   col-xs-12 col-sm-12"   role="practicles"><i class="fa fa-lightbulb-o  "></i> Practicals</div>
       <div class=" nmk_clerskdf nmk_controlsds   col-xs-12 col-sm-12"   role="calender"><i class="fa fa-calendar  "></i> Calendar</div>
      
  <!--<div class=" nmk_clerskdf nmk_controlsds   col-xs-12 col-sm-12"   role="pending"><i class="fa fa-comment"></i>  FeedBack</div>-->
    <div class=" nmk_clerskdf   col-xs-12 col-sm-12"   role="logout" onclick="logout()"> <i class="fa fa-sign-out"></i>  Logout</div>
    <div class="col-sm-12 col-xs-12" id="page_loader"></div>
  
</div>

