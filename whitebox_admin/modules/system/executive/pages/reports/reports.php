<style type="text/css">
	.reports_body{
     min-height: 450px;
     box-shadow: 0 0 3px #ccc;
     background-color: #fff;
	}
	.holder_otwo{
		min-height: 100px;
		border-top: 2px solid #ccc;
	}
	#holder_one{
		min-height: 100px;
	}
	.innovations_load{
		min-height: 200px;
		margin-top: 5px;
		max-height: 200px;
		overflow: auto;

	}
	#report_display{
		min-height: 100px;
		box-shadow: 0 0 3px #ccc;
	}
	.innovations_bn{
		min-height: 20px;
		cursor: pointer;
		background-color: #ccc;
		margin-top: 3px;
	}
	.reports_dd{
		border: 1px solid #ccc;
		resize: none;
		min-height: 150px;
		margin-top: 5px;
		margin-bottom: 5px;
		background-color: #faf7fd;
	}
	.evaluate_btns{
		margin-top: 10px;
	}
	.innoheaders{
		border-bottom: 2px solid #cccc;
		border-radius: 15px;
	}
	.innovations_load{
		margin-bottom: 5px;
		min-height: 200px;
		box-shadow: 0 0 3px #ccc;
	}
	#holder_one{
		min-height: 100px;
		margin-bottom: 10px;
		border-bottom: 2px solid #ccc;

	}
	#bb_holders{
		min-height: 40px;
		border-right: 2px solid #ccc;
		margin-bottom: 5px;
	}
	#error_reporter{
		text-align: center;
	}
	#container_report{
		margin-top: 20px;
	}
</style>
<div class="col-sm-12 col-xs-12">
<div class=" col-sm-12 col-xs-12 default_header">REPORTS</div>
<div class="col-sm-12 col-xs-12">
	<div class="col-sm-12 col-xs-12">
	<div class="col-sm-12 col-xs-12 reports_body" id="innovationr_reports">
		


	</div>	


	</div>
<!--	<div class="col-sm-3 col-xs-12 reports_body">

<div class="default_header innoheaders">Approved innovations</div>
		<div class="col-sm-12 col-xs-12 innovations_load">
			<?php	
$innovationnd=base64_decode($_POST['innovation']);
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";

         $approved="second_evaluation";
			$sqlx="SELECT * FROM innovations_table where status='$approved'";

    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $Innovation_name=$row['Innovation_name'];
   $Innovation_Id=$row['Innovation_Id'];
				?>
        <div class="col-sm-12 col-xs-12 innovations_bn" id="<?php echo $Innovation_Id?>"><?php echo $Innovation_name?></div>
<?php
			}
			?>

		</div>
<div class="default_header innoheaders">Disaproved innovations</div>
		<div class="col-sm-12 col-xs-12 innovations_load">
		<?php
         $disapproved="first_disapproved";
			$sqlxy="SELECT * FROM innovations_table where status='$disapproved'";

    $query_runxd=mysqli_query($con,$sqlxy) or die($query_runxd."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxd)){
    $Innovation_name=$row['Innovation_name'];
   $Innovation_Id=$row['Innovation_Id'];
				?>
        <div class="col-sm-12 col-xs-12 innovations_bn" id="<?php echo $Innovation_Id?>"><?php echo $Innovation_name?></div>
          <?php
			}
			?>

		</div>


	</div>-->

</div>


<div class="col-sm-4 col-xs-12 "></div>
<div class="col-sm-4 col-xs-12 not_shown" id="innovation_spans"><span class="btn evaluate_btns theme_bg" role="disapprove">Decline Innovation</span> <span class="btn evaluate_btns theme_bg" role="approve">Accept Innovation</span> </div>


</div>
<script type="text/javascript">
	$(document).ready(function(){

var innovation=btoa('<?php echo $innovationnd?>');
$.post("modules/system/executive/pages/reports/view.php",{innovation:innovation},function(data){ $("#innovationr_reports").html(data);$("#innovation_spans").show()})




		$(".innovations_bn").click(function(){
			var innovation=btoa($(this).attr("id"));
			$.post("modules/system/executive/pages/reports/view.php",{innovation:innovation},function(data){ $("#innovationr_reports").html(data);$("#innovation_spans").show()})
		})
  


  $(".evaluate_btns").click(function(){
      var loader=$("#loader").html();
  	var executive_report=btoa($("#executive_report").val());
  	var role=$(this).attr("role");
  	var innovation=btoa($("#innovation").val());
  	if(role=="approve"){
  	var	decision=btoa("approved");
  	}else{
   var decision=btoa("disapproved");
  	}
//alert(role)
if(executive_report){
      var txt;
  var r = confirm("Would you like to Submit?, click OK to proceed or CANCEL to stop ?");
  if (r == true){
      $("#error_reporter").html(loader);
	var user=$("#user_email").val();
  	$.post("modules/system/executive/pages/reports/reports_save.php",{user:user,decision:decision,executive_report:executive_report,innovation:innovation},function(data){
  	    if($.trim(data)=="success"){
  	        $.get("modules/system/executive/pages/view/view.php",function(data){$("#home").html(data)})
  	        
  	        
  	    }else{
  	    
  	    $("#error_reporter").html(data)
  	}
  
  	})
  }else{
  	    
  	}
  }else{
$("#error_reporter").html("Required!")
$("#executive_report").css("border","2px solid red");

//$("#executive_report").attr("placeholder")="Write a report here first";
  }
  })



	})
</script>