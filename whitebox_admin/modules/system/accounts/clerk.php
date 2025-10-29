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
var loader=$("#loader").html();
	var role=$(this).attr("role")

		var my_id=$("#user_email").val();

	if(role=="Controlpanel"){
$("#loading_top").html("").hide();
$("#time_top").show()
				$("#menu_page").show().removeClass("slideOutLeft").addClass("animated slideInLeft");
			}else if(role=="viewold"){
				$("#loading_top").html("Processing data..kindly wait.. "+loader).show()
				$("#time_top").hide();
	$.post("modules/system/clerk/pages/view/"+role+".php",{
    my_id:my_id
	},function(data){
$("#loading_top").html("").hide();
$("#time_top").show()
		$("#home").html(data)
		
	})
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
})
</script>

<div id="menu" class=" no_padding col-sm-12 col-xs-12 ">
	<div class=" nmk_clerskdf   col-xs-12 col-sm-12"   role="Dashboard"><i class="fa fa-dashboard"></i>  My Dashboard</div>
	<div class=" nmk_clerskdf   col-xs-12 col-sm-12"   role="view"><i class="fa fa-lightbulb-o"></i>  Received Innovations</div>
		<div class=" nmk_clerskdf   col-xs-12 col-sm-12"   role="viewold"><i class="fa fa-lightbulb-o"></i>  Old system's Innovations </div>
	<!--<div class=" nmk_clerskdf   col-xs-12 col-sm-12"   role="covid"><i class="fa fa-ambulance" style="color:red;"></i>  COVID 19 innovations</div>
	--><div class=" nmk_clerskdf   col-xs-12 col-sm-12"   role="pending"><i class="fa fa-lightbulb-o"></i>  Pending Innovations</div>
  
    
  <div class=" nmk_clerskdf   col-xs-12 col-sm-12"   role="generate"> <i class="fa fa-book"></i> Generate Report</div>
    <div class=" nmk_clerskdf   col-xs-12 col-sm-12"   role="logout" onclick="logout()"> <i class="fa fa-sign-out"></i>  Logout</div>
  
</div>
