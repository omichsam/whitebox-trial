<style type="text/css">
	#external_header{
		min-height: 40px;
	}
	#external_uper{
		min-height: 4px;
		background:#e6b234;
	}
	#nmk_logo{
		min-height: 40px;
		background-position: center !important;
		background-size: contain !important;
		background-repeat: no-repeat !important;
		background:url('images/logo.png');
		border-radius:20px;
	}
	#pr_prof{
		height: 50px;
        width: 50px;
		box-shadow: #ccc 0 0 2px;
	}
	.header_baers{
		cursor: pointer;
	}
	.heade_app{
		text-align: center;
		text-transform: uppercase;
		font-weight: bolder;
		margin-top: 10px;
	}
</style>
<?php
include "../../../../connect.php";

$my_user=$_POST['my_id'];
include("../../../functions/security.php");
//$salt="A0007799Wagtreeyty";

$newFirst_name="";
$newLast_name="";
$newnational_id="";
$newGender="";
//$County_id=$get['County_id'];
$newPhone="";
$neweducation_level="";
$my_userde=encrypt($my_user,$key);
$get_user=mysql_query("SELECT * FROM investors WHERE Email='$my_userde'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
$Name=$get['Name'];
$company=$get['Company'];

if($Name && $company){
$First_name=base64_decode(decrypt($Name,$key));
$new_company=base64_decode(decrypt($company,$key));
    
}else{ 
    
}

 // alert($Last_name);


 ?>





<div class="col-sm-12 col-xs-12 no_padding" id="external_header">
	<div class="col-xs-12 col-sm-12 no_padding" id="external_uper"></div>
	<div class="col-sm-12 col-xs-12">
<div class="col-sm-1 col-xs-2" id="nmk_logo">
</div>
<div class="col-sm-11 col-xs-10 no_padding"> 

<div class="col-sm-8 col-xs-8 ">

	<div class="col-sm-10  mobile_hidden no_padding heade_app">INVESTORS' PANEL</div>
	<div class="col-sm-12 col-xs-12 desktop_hidden no_padding heade_app">INVESTOR'S PANEL</div>
	
</div>

<div class="col-sm-2 col-xs-2"><i class="desktop_hidden"><?php echo $First_name ?></i></div>
	<div class="col-sm-2 col-xs-2 "><i class="mobile_hidden"><?php echo $First_name?></i><i class="fa fa-bars desktop_hidden btn header_baers" ></i>
</div>
</div>
</div>
<script type="text/javascript">
	
$(document).ready(function(){
	var loader=$("#loader").html();
	var user=$("#user_id").val();
	/*Menu itecm click events*/
	$(".header_baers").click(function(){
			
				$("#menu_page").show().removeClass("slideOutLeft").addClass("animated slideInLeft");
			})

	$("#closemenu_btn").click(function(){
	$("#menu_page").removeClass("slideInLeft").addClass("slideOutLeft");
	})

})
</script>