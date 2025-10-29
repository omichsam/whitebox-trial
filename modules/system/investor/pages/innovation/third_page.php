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

  $Innovation_Id=base64_decode($_POST['Innovation_Id']);

?>
<div class="col-sm-12 col-xs-12 " id="displayer">
<div class="col-sm-12 col-xs-12 no_padding">
	<div class="col-sm-4 col-xs-12"></div>
	<div class="col-sm-4 col-xs-12" id="header_innovations"><span class="">ADD MORE DETAILS ON <?php //echo $innovation_name ?></span></div>

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
		What Resources/ Technical requirements (if any) are required to implement the solution?
		<textarea id="requirements" class="textarea_p col-sm-12 col-xs-12"></textarea>
	</div>

	<div class="col-sm-12 col-xs-12">
		Have you carried out the necessary background research on your project?
		<select id="research" class="splashinputs">
			<option></option>
			<option>Yes</option>
			<option>No</option>
		</select>
	</div>
	<div class="col-sm-12 col-xs-12 not_shown" id="research_explain">
		Have explain how you did the research.
		<textarea id="explain_research" class="textarea_p col-sm-12 col-xs-12"></textarea>
	</div>
	<div class="col-sm-12 col-xs-12">
		Who is the direct consumer/target customer/partners/ potential implementers/users of the innovation /Solution?
		<textarea id="targeted" class="textarea_p col-sm-12 col-xs-12"></textarea>
	</div>
	<div class="col-sm-12 col-xs-12">

	<div class="col-sm-12 col-xs-12 no_padding"></div>
		What is the business model/ revenue streams/costs of project?See sample <span class=" view_model btn theme_bg mobile_hidden" >here</span>

	<div class="col-sm-12 col-xs-12 no_padding">
		<textarea id="busines_model" class="textarea_p col-sm-12 col-xs-12"></textarea>
	</div>
	</div>
	
	<div class="col-sm-12 col-xs-12" id="submit_innovation_holder">
		<span class="btn theme_bg" id="previous_final">Previous</span>
		<span class="btn theme_bg" id="proceedto_final">Save and Proceed</span>
		<span class="btn theme_bg not_shown" id="next_fouth">Next Page</span>
	</div>
	<div class="col-sm-12 col-xs-12" id="error_displayded"></div>
	<div class="col-sm-12 col-xs-12" id="lower_foot">
		
	</div>
	
</div>

</div>
</div>
<script type="text/javascript">
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

research_explain=btoa($("#research_explain").val());
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
	$("#proceedto_final").hide();
	$("#next_fouth").show()
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
