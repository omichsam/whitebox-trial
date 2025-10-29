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

	var role=$(this).attr("role")

		var my_id=$("#user_email").val();

	if(role=="Controlpanel"){

				$("#menu_page").show().removeClass("slideOutLeft").addClass("animated slideInLeft");
			}else if(role=="viewold"){
	$.post("modules/system/communications/pages/view/"+role+".php",{
    my_id:my_id
	},function(data){

		$("#home").html(data)
		
	})
			}else{

	$.post("modules/system/communications/pages/"+role+"/"+role+".php",{
    my_id:my_id
	},function(data){

		$("#home").html(data)
		
	})
}
	})
})
</script>

<div id="menu" class=" no_padding col-sm-12 col-xs-12 ">
	<div class=" nmk_controlsds nmk_clerskdf   col-xs-12 col-sm-12"   role="Dashboard"><i class="fa fa-dashboard"></i>  My Dashboard</div>
   <div class=" nmk_controlsds nmk_clerskdf    col-xs-12 col-sm-12"   role="chats"><i class="fa fa-comments"></i> Online chats</div>

   <div class=" nmk_controlsds nmk_clerskdf    col-xs-12 col-sm-12"   role="closed_chats"><i class="fa fa-comments"></i> Closed chats</div>
    <div class=" nmk_clerskdf   col-xs-12 col-sm-12"   role="logout" onclick="logout()"> <i class="fa fa-sign-out"></i>  Logout</div>
  
</div>
