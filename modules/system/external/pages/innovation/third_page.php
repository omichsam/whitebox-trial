<style type="text/css">
	#header_innovations{
		text-align: center;
		border-bottom: 1px solid #ccc;
		font-weight: bolder;
		text-transform: uppercase;
	}
	#innovation_wrapper{
		min-height: 200px;
		border-radius: 5px;
		box-shadow: 0 0 1px #ccc; 
	}
	#lower_foot{
		min-height: 100px;
	}
	#submit_innovation_holder{
		text-align: center;
		margin-top: 10px;
	}
	.textarea_p{
		border: 1px solid #ccc;
		resize: none;
		min-height: 100px;
	}
	#error_displayded{
		text-align: center;
	}
	.level_grows{
		min-height: 30px;
		border:2px solid #ccc;
		margin-top: 10px;
		border-radius: 50px;
	}
	.arro_grows{
		min-height: 30px;
		border-bottom: 5px solid #ccc;
	}
	#canvas_model{
		height: 700px;
		box-shadow: 0 0 2px #ccc;
		background-size: cover;
		background-repeat: no-repeat;


	}
</style>
<?php
include "../../../../functions/security.php";
include "../../../../../connect.php";
//$salt="A0007799Wagtreeyty";
//getting variables

        $date = date('Y-m-d');
  $mode=base64_decode($_POST['mode']);
  //echo $mode;
  $show_resources="not_shown";
$new_busines="";
$new_Researchsources="";
$new_requirements="";
$new_target="";
$new_impact="";
$resource_select="";

  if($mode=="edit"){
$Innovation_Id=base64_decode($_POST['Innovation_Id']);
$my_user=$_POST['my_id'];
$status="pending";
	$new_status=encrypt($status, $key);
	


$sqlu="SELECT * FROM innovations_table where Innovation_Id='$Innovation_Id'";

    $query_runz=mysql_query($sqlu) or die($query_runz."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runz)){
  $busines_model=$row['busines_model'];
  $Research_sources=$row['Research_sources'];
  $target=$row['target'];
  $requirements=$row['requirements'];
}
if($busines_model && $requirements && $target){
$new_busines=base64_decode(decrypt($busines_model, $key));
$new_requirements=base64_decode(decrypt($requirements, $key));
$new_target=base64_decode(decrypt($target, $key));
if($Research_sources){
	
$new_Researchsources=base64_decode(decrypt($Research_sources, $key));
$show_resources="";
$resource_select="Yes";
}else{
$show_resources="not_shown";
$resource_select="No";
}

}else{

}



}else{

  $Innovation_Id=base64_decode($_POST['Innovation_Id']);
}

?>
<div class="col-sm-12 col-xs-12 " id="displayer">
<div class="col-sm-12 col-xs-12 no_padding">
	<div class="col-sm-4 col-xs-12"></div>
	<div class="col-sm-4 col-xs-12" id="header_innovations"><span class="">ADD MORE DETAILS <?php //echo $innovation_name ?></span></div>

</div>
<div class="col-sm-12 col-xs-12 no_padding" id="level_submition">
	<div class="col-xs-1 col-sm-3"></div>
<div class="col-xs-11 col-sm-6">
	<div class="col-sm-1 col-xs-1 level_grows theme_bg">1</div>
	<div class="col-sm-2 col-xs-2 arro_grows"></div>
    <div class="col-sm-1 col-xs-1 level_grows theme_bg">2</div>
    <div class="col-sm-2 col-xs-2 arro_grows"></div>
    <div class="col-sm-1 col-xs-1 level_grows theme_bg">3</div>
    <div class="col-sm-2 col-xs-2 arro_grows"></div>
    <div class="col-sm-1 col-xs-1 level_grows "></div>
</div>
</div>
<div class="col-xs-12 col-sm-3"></div>
	<div class="col-xs-12 col-sm-6 no_padding">
<div class="col-sm-12 col-xs-12 no_padding" id="innovation_wrapper">
	<div class="col-sm-12 col-xs-12">
		Have you carried out the necessary background research on your project?
		<select id="research" class="splashinputs">
			<option><?php echo $resource_select?></option>
			<option>Yes</option>
			<option>No</option>
		</select>
	</div>
	<div class="col-sm-12 col-xs-12 <?php echo $show_resources ?>" id="research_explain">
		<div class="col-sm-12 col-xs-12 no_padding " id="research_letter"></div>
		<textarea id="explain_research" onkeyup="uppdatereserch(this.value)" minlength="3" maxlength="400" class="textarea_p col-sm-12 col-xs-12"><?php echo $new_Researchsources?></textarea>

    <div class="col-sm-12 col-xs-12 words_count" id="explaincresearch" >&nbsp;</div>
	</div>
	<div class="col-sm-12 col-xs-12">
		Who is the direct consumer/target customer/partners/ potential implementers/users of the innovation /solution?
		<textarea id="targeted" placeholder="e.g The government" onkeyup="target_count(this.value)" maxlength="400" minlength="3" class="textarea_p col-sm-12 col-xs-12"><?php echo $new_target?></textarea>
		<div class="col-sm-12 col-xs-12 words_count" id="target_count" >&nbsp;</div>
	</div>
	<div class="col-sm-12 col-xs-12">

	<div class="col-sm-12 col-xs-12 no_padding"></div>
		What is the business model/revenue streams/costs of project? &nbsp;&nbsp; <span class=" view_model btn theme_bg mobile_hidden" >See sample</span>

	<div class="col-sm-12 col-xs-12 no_padding">
		<textarea id="busines_model" placeholder="e.g What are Your Key Partners?" onkeyup="model_count(this.value)" maxlength="800" minlength="3" class="textarea_p col-sm-12 col-xs-12"><?php echo $new_busines?></textarea>

		<div class="col-sm-12 col-xs-12 words_count" id="model_count" >&nbsp;</div>
	</div>
	</div>
	
<div class="col-sm-12 col-xs-12">
		What resources/technical requirements (if any) are required to implement the solution?
		<textarea id="requirements" onkeyup="reqiurements_count(this.value)" maxlength="400" minlength="3" class="textarea_p col-sm-12 col-xs-12"><?php echo $new_requirements?></textarea>

		<div class="col-sm-12 col-xs-12 words_count" id="reqiurements_count" >&nbsp;</div>
	</div>

	
	
	
	
	<div class="col-sm-12 col-xs-12" id="submit_innovation_holder">
		<span class="btn theme_bg" id="previous_final">Previous</span>
		<span class="btn theme_bg" id="proceedto_final">Save and Proceed</span>
		<!--<span class="btn theme_bg not_shown" id="next_fouth">Next Page</span>-->
	</div>
	<div class="col-sm-12 col-xs-12" id="error_displayded"></div>
	<div class="col-sm-12 col-xs-12" id="lower_foot">
		
	</div>
	
</div>

</div>
</div>
<script type="text/javascript">
		  function uppdatereserch(str) {
  var lng = str.length;
  document.getElementById("explaincresearch").innerHTML = lng + ' out of 400 characters';
}
	  function target_count(str) {
  var lng = str.length;
  document.getElementById("target_count").innerHTML = lng + ' out of 400 characters';
}
  function model_count(str) {
  var lng = str.length;
  document.getElementById("model_count").innerHTML = lng + ' out of 800 characters';
}
function reqiurements_count(str) {
  var lng = str.length;
  document.getElementById("reqiurements_count").innerHTML = lng + ' out of 400 characters';
}

	$(document).ready(function(){
	
		$("#next_fouth").click(function(){
        $(".innovation_pages").hide()
	    $("#fourth_page").show()
		})
		$(".view_model").click(function(){
            $(".innovation_pages").hide()
            

			$("#canvas_model").show();

			
			
		})
    $("#previous_final").click(function(){
	$(".innovation_pages").hide()
	 $("#second_page").show();
})
$("#protection").change(function(){
			var protection=$(this).val()
			if(protection=="Yes"){
				$("#attachment_cover").show()

			}else{
               $("#attachment_cover").hide()
			}
		})
$("#research").change(function(){
			var research=$(this).val()
			if(research=="Yes"){
				$("#research_explain").show()
                $("#research_letter").html("Please provide more information on the research.");
			}else if(research=="No"){
               $("#research_explain").show();
                $("#research_letter").html("Please provide more information");
			}else{
			    $("#research_explain").hide() 
			}
		})
$("#proceedto_final").click(function(){
	var loader=$("#loader").html();
	$("#error_displayded").html(loader);
var Innovation_Id=btoa('<?php echo $Innovation_Id?>');
//var protection=$("#protection").val();
var requirements=btoa($("#requirements").val());
var busines_model=btoa($("#busines_model").val());
var targeteds=btoa($("#targeted").val());
var research=$("#research").val();
var research_explain="";
if(research=="Yes"){

research_explain=btoa($("#explain_research").val());
}else if(research=="No"){
    research_explain=btoa($("#explain_research").val());
    
    }else{

}
if(targeteds && busines_model && requirements && research){

//alert()

$.post("modules/system/external/pages/innovation/save_third.php",{
targeteds:targeteds,
busines_model:busines_model,
research_explain:research_explain,
Innovation_Id:Innovation_Id,
requirements:requirements
},function(data){
if($.trim(data)=="success"){
$.post("modules/system/external/pages/innovation/fourth_page.php",{
Innovation_Id:Innovation_Id
},function(data){
	//alert(data)
	$("#error_displayded").html("");
	
	$(".innovation_pages").hide()
	$("#fourth_page").html(data).show();
})
}else{
	$("#error_displayded").html(data);
}
})








}else{
$("#error_displayded").html("all fields required!");	
}
})


	})
</script>
