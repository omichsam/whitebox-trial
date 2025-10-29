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
	#errorsecond_page{
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
	.words_count{
		text-align: center;
		font-weight: bolder;
		color: #e7663c;
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
  $show_text="not_shown";
$new_need="";
$new_stage="";
$new_solution="";
$new_originality="";
$new_originalityexplanation="";
$new_originality="";
$new_impact="";
  if($mode=="edit"){
$Innovation_Id=base64_decode($_POST['Innovation_Id']);
$my_user=$_POST['my_id'];
$status="pending";
	$new_status=encrypt($status, $key);
	


//$new_status="6b7336564f3937355236464b693953304e50714a36716f365858447669562b383932635950796863436b413d";
$my_userde=encrypt($my_user, $key);
$get_user=mysql_query("SELECT User_id FROM external_users WHERE Email_address='$my_userde'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
$user_id=$get['User_id'];
//echo $user_id;

 /* $new_stage="";
   $petnership_implementors="";
    $patnership_innovators="";
    $funding="";
    $communities="";
    $named="";
	$part="";

$check_implement="";
$check_partner="";
$check_fund="";
$check_other="";
*/

$sqlu="SELECT * FROM innovations_table where Innovation_Id='$Innovation_Id'";

    $query_runz=mysql_query($sqlu) or die($query_runz."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runz)){
  $need=$row['need'];
  $stage=$row['stage'];
  $solution=$row['solution'];
  $impact=$row['impact'];
  $originality=$row['originality'];
  $originality_explanation=$row['originality_explanation'];

}
if($need && $solution && $impact && $originality && $originality_explanation && $stage){
$new_need=base64_decode(decrypt($need, $key));
$new_stage=base64_decode(decrypt($stage, $key));
$new_solution=base64_decode(decrypt($solution, $key));
$new_originality=decrypt($originality, $key);
$new_originalityexplanation=base64_decode(decrypt($originality_explanation, $key));
$new_impact=base64_decode(decrypt($impact, $key));
if($new_originality=="Yes"){
$show_text="";
}else{
$show_text="not_shown";
}

}else{

}



}else{


//$salt="A0007799Wagtreeyty";
$username=$_POST['my_id'];
$my_userde=encrypt($username, $key);
$get_user=mysql_query("SELECT User_id FROM external_users WHERE Email_address='$my_userde'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
$user_id=$get['User_id'];


      	$category=encrypt($_POST['innovation_category'],$key);
      	//$staged=encrypt($_POST['staged'],$key);
      	$inno_name=encrypt($_POST['Innovation_name'],$key);
      	

  $sqlx="SELECT Innovation_Id FROM  innovations_table WHERE Innovation_name='$inno_name' and Category='$category' and user_id='$user_id'";
    $query_runx=mysql_query($sqlx) or die($query_runx."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runx)){
    $Innovation_Id=$row['Innovation_Id'];
  
}
}

?>
<div class="col-sm-12 col-xs-12 " id="displayer">
	
<div class="col-sm-12 col-xs-12 no_padding">
	<div class="col-sm-4 col-xs-12"></div>
	<div class="col-sm-4 col-xs-12" id="header_innovations"><span class="">ADD MORE DETAILS AND PROCEED</span></div>

</div>
<div class="col-sm-12 col-xs-12 no_padding" id="level_submition">
	<div class="col-xs-1 col-sm-3"></div>
	<div class="col-xs-11 col-sm-6">
	<div class="col-sm-1 col-xs-1 level_grows theme_bg">1</div>
	<div class="col-sm-2 col-xs-2 arro_grows"></div>
    <div class="col-sm-1 col-xs-1 level_grows theme_bg">2</div>
    <div class="col-sm-2 col-xs-2 arro_grows"></div>
    <div class="col-sm-1 col-xs-1 level_grows"></div>
    <div class="col-sm-2 col-xs-2 arro_grows"></div>
    <div class="col-sm-1 col-xs-1 level_grows"></div>
</div>
</div>
<div class="col-xs-12 col-sm-3"></div>
	<div class="col-xs-12 col-sm-6 no_padding">
<div class="col-sm-12 col-xs-12 no_padding" id="innovation_wrapper">
	<div class="col-sm-12 col-xs-12">
		What Gap/need/problem have you identified?
		<textarea id="need" placeholder="Please enter the gap/need/problem have you identified here" onkeyup="needupdate(this.value)" minlength="10" maxlength="400" class="textarea_p col-sm-12 col-xs-12"><?php echo $new_need?></textarea>
		<div class="col-sm-12 col-xs-12 words_count" id="need_update" >&nbsp;</div>
	</div>
<div class="col-sm-12 col-xs-12">
		What solution have you developed to address this gap/need/problem?  
		<textarea id="solution" placeholder="Please enter the solution you have developed here" onkeyup="solutionupdate(this.value)" maxlength="400" minlength="10" class="textarea_p col-sm-12 col-xs-12"><?php echo $new_solution?></textarea>

		<div class="col-sm-12 col-xs-12 words_count" id="solution_update" >&nbsp;</div>
	</div>

	<div class="col-sm-12 col-xs-12">
		What is the overall impact of your innovation/solution? 
		<textarea id="impact" placeholder="Please enter the overall impact of your innovation/solution here" minlength="10" maxlength="400" onkeyup="impactnupdate(this.value)" class="textarea_p col-sm-12 col-xs-12"><?php echo $new_impact ?></textarea>
		<div class="col-sm-12 col-xs-12 words_count" id="impact_update" >&nbsp;</div>
	</div>
	<div class="col-sm-12 col-xs-12">
		Is this your original idea?
		<select id="idea" class="splashinputs">
			<option><?php echo $new_originality ?></option>
			<option>Yes</option>
			<option>No</option>
		</select>
	</div>
<div class="col-sm-12 col-xs-12 <?php echo $show_text?>" id="explanation">
		<div class="col-sm-12 col-xs-12 no_padding" id="idea_questions"></div>
		<textarea id="Explain" onkeyup="expalinupdate(this.value)" maxlength="400" minlength="10" class="textarea_p col-sm-12 col-xs-12"><?php echo $new_originalityexplanation ?></textarea>
		<div class="col-sm-12 col-xs-12 words_count" id="explain_update" >&nbsp;</div>
	</div>
	<div class="col-sm-12 col-xs-12 ">
		What stage is the innovation at? I.e Ideation or Incubation e.t.c Click <span class="theme_bg btn mobile_hidden view_stages">View sample</span> to learn more about these stages.
	<select class="splashinputs" id="stage">
		<option><?php echo $new_stage?></option>
		<option>Ideation</option>
		<option>Incubation</option>
		<option>Scale</option>
		<option>Growth</option>
	</select>
</div>
	
	
	<div class="col-sm-12 col-xs-12" id="submit_innovation_holder">
		<span class="btn theme_bg" id="previous_innovation" role="first_page">Previous</span>
		<span class="btn theme_bg" id="next_innovation">Save and proceed</span>
	</div>
	<div class="col-sm-12 col-xs-12" id="errorsecond_page"></div>
	<div class="col-sm-12 col-xs-12" id="lower_foot">
		
	</div>
	
</div>

</div>
</div>
<script type="text/javascript">
	 function needupdate(str) {
  var lng = str.length;
  document.getElementById("need_update").innerHTML = lng + ' out of 400 characters';
}
	 function solutionupdate(str) {
  var lng = str.length;
  document.getElementById("solution_update").innerHTML = lng + ' out of 400 characters';
}
	 function expalinupdate(str) {
  var lng = str.length;
  document.getElementById("explain_update").innerHTML = lng + ' out of 400 characters';
}
	 function impactnupdate(str) {
  var lng = str.length;
  document.getElementById("impact_update").innerHTML = lng + ' out of 400 characters';
}

	$(document).ready(function(){
		$(".view_stages").click(function(){
            $(".innovation_pages").hide()
            

			$("#canvas_stage").show();

			
			
		})
		$("#previous_innovation").click(function(){
	
	 $(".innovation_pages").hide()
	 $("#first_page").show();
})
$("#next_pages").click(function(){
	
	 $(".innovation_pages").hide()
	 $("#third_page").show();
})

		var btnclick="#next_innovation";
		$(btnclick).click(function(){
			var Innovation_Id=btoa('<?php echo $Innovation_Id?>');
			var need=$("#need").val()
			var solution=$("#solution").val()
			var explain=$("#Explain").val()
			var impact=$("#impact").val()
            var stage=$("#stage").val()
            var mode=btoa('<?php echo $mode?>');
			if(need && solution && impact && stage){
			//alert(Innovation_Id)
			//alert(need+"................."+solution+"...................."+impact)
			
var new_need=btoa(need);
var new_solution=btoa(solution);
var new_expalin=btoa(explain);
var new_impact=btoa(impact);
var new_stage=btoa(stage);
var loader=$("#loader").html()
var urlsecond="modules/system/external/pages/innovation/save_second.php";
var urldsecone="modules/system/external/pages/innovation/third_page.php";
var targetsecond="#third_page";
var errorsecond="#errorsecond_page";
$("#errorsecond_page").html(loader)
$.post(""+urlsecond+"",{
Innovation_Id:Innovation_Id,
new_solution:new_solution,
new_expalin:new_expalin,
new_impact:new_impact,
new_need:new_need,
new_stage:new_stage,
mode:mode
},function(data){
if($.trim(data)=="success"){
	var my_id='<?php echo $username?>';
$.post(""+urldsecone+"",{
	mode:mode,
	Innovation_Id:Innovation_Id,
	my_id:my_id
},function(data){
	$("#errorsecond_page").html("")
     $(".innovation_pages").hide(data)
      		//$("#second_page").html(data).show()
	$(""+targetsecond+"").html(data).show();
})
}else{
$("#errorsecond_page").html(data)
}
})


//alert();
}else{
	
	$("#errorsecond_page").html("All fields required!")
}
})



		$("#idea").change(function(){
          var idea=$(this).val();
         // alert(implementsp)
          if(idea=="Yes"){
          	//alert()
          $("#explanation").show()
           $("#idea_questions").html("Please give more information");
          }else if(idea=="No"){
         $("#explanation").show()
         $("#idea_questions").html("Please give more information");
          }else{
            $("#explanation").hide()  
          }
		})
		/*$("#next_innovation").click(function(){
			var Innovation_Id='<?php echo $Innovation_Id ?>';
			var loader=$("#loader").html()
			var my_user=$("#global_u_email").val();
			
	}) */
	})

</script>
