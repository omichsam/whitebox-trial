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
		background-color: #ccc;
		margin-top: 3px;
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
	<div class="col-sm-9 col-xs-12">
	<div class="col-sm-12 col-xs-12 reports_body">
		
<div class=" col-sm-12 col-xs-12 default_header" id="dynamic_header"></div>

<div class=" col-sm-12 col-xs-12 ">
	
<textarea id="innovation_need" class="coment_d col-sm-12 col-xs-12"></textarea>



</div>

	</div>	


	</div>
	<div class="col-sm-3 col-xs-12 reports_body">

<div class="default_header">Approved innovations</div>
		<div class="col-sm-12 col-xs-12 innovations_load">
			<?php

			for($number=1;$number<30;$number++){
				?>
        <div class="col-sm-12 col-xs-12 innovations_bn"></div>
<?php
			}
			?>

		</div>
<div class="default_header">Disaproved innovations</div>
		<div class="col-sm-12 col-xs-12 innovations_load">
			
<?php

			for($number=1;$number<30;$number++){
				?>
        <div class="col-sm-12 col-xs-12 innovations_bn"></div>
<?php
			}
			?>

		</div>


	</div>

</div>


<div class="col-sm-4 col-xs-12 "></div>
<div class="col-sm-4 col-xs-12 "><span class="btn evaluate_btns theme_bg" id="back_to">Back</span> <span class="btn evaluate_btns theme_bg">Send</span> </div>


</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#back_to").click(function(){
         
          
    $(".evaluation_class").hide();
    $("#sixth_page").show();
		})


$(".approve_btns").click(function(){

    var innovats='<?php echo $innovation?>';
    var innovation=btoa(innovats);
	var decision_url="modules/system/clerk/pages/evaluate/decision.php";
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
	$("#approved_part").hide();
	$("#approved_disaprove").show();
})
	
})

	})
</script>