<style type="text/css">
	.reports_body{
     min-height: 450px;
     box-shadow: 0 0 3px #ccc;
     background-color: #fff;
	}
	.innovations_load{
		min-height: 200px;
		margin-top: 5px;
		max-height: 200px;
		overflow: auto;

	}
	.innovations_bn{
		min-height: 20px;
		cursor: pointer;
		margin-top: 4px;
		box-shadow: 0 0 3px #ccc;

	}
	.coment_d{
		border: 1px solid #ccc;
		resize: none;
		min-height: 420px;
		margin-top: 5px;
		margin-bottom: 5px;
	}
	.evaluate_btns{
		margin-top: 10px;
	}
	#approved_part{
		text-align: center;
		margin-top: 100px;
	}
	.error_datas{
		text-align: center;
	}
</style>
<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$innovation=base64_decode($_POST['innovation']);
?>
<div class="col-sm-12 col-xs-12" id="approved_part">
	<span class="btn theme_bg approve_btns " role="disapproved">Disapprove</span> 
    <span class="btn theme_bg approve_btns" role="approved">Approve</span> 
</div>
<div class="col-sm-12 col-xs-12 not_shown" id="approved_disaprove">
<div class=" col-sm-12 col-xs-12 default_header">WRITE REPORT</div>
<div class="col-sm-12 col-xs-12">
	<div class="col-sm-12 col-xs-12">
	<div class="col-sm-12 col-xs-12 reports_body">
		
<div class=" col-sm-12 col-xs-12 default_header" id="dynamic_header"></div>

<div class=" col-sm-12 col-xs-12 ">
	
<textarea id="report_datadb" class="coment_d col-sm-12 col-xs-12"  maxlength="700" onkeyup="comme_report(this.value)" placeholder="Type your report here about the subject here max(700 characters)"></textarea>



</div>

<div class="colsm-12 col-xs-12" style="text-align: center; " id="report_dcount">&nbsp;</div>
	</div>	


	</div>
	<!--<div class="col-sm-3 col-xs-12 reports_body" id="innovations_gradients">



	</div>-->

</div>


<div class="col-sm-4 col-xs-12 "></div>
<div class="col-sm-4 col-xs-12 "><span class="btn evaluate_btns theme_bg" id="back_to">Back</span> <span class="btn evaluate_btns theme_bg" id="send_button">Send</span> </div>

<div class="col-sm-12 col-xs-12 error_datas" ></div>
</div>
<script type="text/javascript">
	  function comme_report(str) {
  var lng = str.length;
  document.getElementById("report_dcount").innerHTML = lng + ' out of 700 characters';
}
	$(document).ready(function(){
   $("#send_button").click(function(){

      var user=$("#user_email").val();
   	var innovation=btoa('<?php echo $innovation ?>');
   	var update="modules/system/executive/pages/evaluate/save_report.php";
   	var next_destination="modules/system/executive/pages/view/view.php";
 var report_datadb=btoa($("#report_datadb").val())
 if(report_datadb){
$("#report_datadb").css("border","1px solid #ccc");
$.post(""+update+"",{user:user,innovation:innovation,report_datadb:report_datadb},function(data){
	if($.trim(data)=="success"){
   $.post(""+next_destination+"",{},function(data){
   	$("#home").html(data);
   })
	}else{

	}
})
 }else{
 	$("#report_datadb").css("border","2px solid red");
 	$(".error_datas").html("Please provide a comment").css('color','red');
 }
   })






		$("#back_to").click(function(){
         
          
    $(".evaluation_class").hide();
    $("#sixth_page").show();
		})


$(".approve_btns").click(function(){

    var innovats='<?php echo $innovation?>';
    var innovation=btoa(innovats);
	var decision_url="modules/system/executive/pages/evaluate/decision.php";
	var query_less="modules/system/executive/pages/evaluate/list.php";
	var rolet=$(this).attr("role");
	var decision="";
 
	if(rolet=="approved"){
    decision=btoa("approved");
    $("#dynamic_header").html("Give a reason for approving")
	}else{
     $("#dynamic_header").html("Give a reason for disapproving")
    decision=btoa("disapproved");
	}
$.post(""+decision_url+"",{decision:decision,innovation:innovation},function(data){
	if($.trim(data)=="success"){
 $.post(""+query_less+"",{innovation:innovation},function(data){
     $("#innovations_gradients").html(data);
	$("#approved_part").hide();
	$("#approved_disaprove").show();
})
	}else{

	}
})
	
})

	})
</script>