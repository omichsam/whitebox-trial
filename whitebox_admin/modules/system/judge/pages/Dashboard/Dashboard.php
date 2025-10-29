<style type="text/css">
	.data_dvsz{
		min-height: 100px;
		margin-top: 10px;
		box-shadow: 2px 2px 2px #ddd;
		background:#ddd;
		border-radius: 5px;
      cursor: pointer;

		margin-bottom: 5px;

	}
	.data_dvsz:hover{
		box-shadow: 0 0 15px #000;

	}
	.innovation_data{
		min-height: 10px;

	}
	.count_holder{
min-height: 20px;
border-radius: 5px;
text-align: center;
font-size: 42px;
font-weight:bolder;
	}
	.button_viewinno{
		cursor: pointer;
		text-align: right;
		text-transform: uppercase;
		font-weight: bold;
		color: #e7663c;

	}
	.data_outer{
		border-radius: 5px;
		border:#e6b234  solid 2px;
	}
	.lower_datas{
    border-right: 2px solid #ccc;
		margin-top: 5px;
		box-shadow: 0 0 3px #ccc;
		min-height: 200px;
		text-align: center;
		padding-top: 10px;
    margin-bottom: 5px;
	}
  #common_analyzer{
   margin-top: 5px;
   box-shadow: 0 0 3px #ccc; 
   border-right: 2px solid #ccc;
   
  }
  .style_data{
  }
  .dash_hold{
  	margin-top: 10px;
  	border:dashed #ccc 3px;
  	padding-bottom: 5px; 
  }
</style>
<?php



include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$learners = mysqli_query($con,"SELECT * FROM e_learning_users");
$alllearners = mysqli_num_rows($learners);
$prcticals = mysqli_query($con,"SELECT * FROM curriculum_practicles");
$userspract = mysqli_num_rows($prcticals);
$tests = mysqli_query($con,"SELECT * FROM curriculum_tests_done");
$testdone = mysqli_num_rows($tests);
?>
<div class="col-sm-12 col-xs-12 default_header" id="main_welcomd">
WELCOME TO THE DASHBOARD
</div>
<div class="col-sm-12 no_padding col-xs-12" id="dash_sambet">

<div class="col-sm-4 col-xs-4 ">
	<div class="col-sm-12 col-xs-12 no_padding data_dvsz" role="external_users" id="external_users">
		<div class="col-sm-12 no_padding col-xs-12 data_outer">
		<div class="col-sm-8 col-xs-8 default_header">
		    <span class="mobile_hidden">Registered</span> Learners
		</div>
		<div class="col-sm-4 col-xs-4 default_header">
		    
		</div>
		<div class="col-sm-12 col-xs-12 no_padding innovation_data"></div>
		
		
		<div class="col-sm-8 col-xs-6 no_padding count_holder" id="count_holder"><?php echo $alllearners?>
		</div>	

			<div class="col-sm-2 col-xs-4 no_padding " ><i class="fa fa-users fa-4x"></i>
		</div>
		<div class="col-sm-12 col-xs-12 no_padding">
		<div class="col-sm-4 col-xs-4 no_padding">	

		</div>
		<div class="col-sm-4 col-xs-4 no_padding ">
		</div>	
       <div class="col-sm-4 col-xs-4 no_padding ">
       	<span class="button_viewinno">View </span>
		</div>
		</div>
	</div>
</div>



</div>

<div class="col-sm-4 col-xs-4 ">
	<div class="col-sm-12 col-xs-12 no_padding data_dvsz" role="innovations" id="innovations">
		<div class="col-sm-12 no_padding col-xs-12 data_outer">
		<div class="col-sm-8 col-xs-8 default_header">
		    Practicals Recieved
		</div>
		<div class="col-sm-4 col-xs-4 default_header">
		    
		</div>
		<div class="col-sm-12 col-xs-12 no_padding innovation_data"></div>
		
		
		<div class="col-sm-8 col-xs-6 no_padding count_holder" id="count_holder"><?php echo $userspract?>
		</div>	

			<div class="col-sm-4 col-xs-2 no_padding " ><i class="fa fa-lightbulb-o fa-4x"></i>
		</div>
		<div class="col-sm-12 col-xs-12 no_padding">
		<div class="col-sm-4 col-xs-4 no_padding">	

		</div>
		<div class="col-sm-4 col-xs-4 no_padding ">
		</div>	
       <div class="col-sm-4 col-xs-4 no_padding ">
       	<span class="button_viewinno"> view</span>
		</div>
		</div>
	</div>
</div>



</div>

<div class="col-sm-4 col-xs-4 ">
	<div class="col-sm-12 col-xs-12 no_padding data_dvsz" role="innovations" id="innovations">
		<div class="col-sm-12 no_padding col-xs-12 data_outer">
		<div class="col-sm-8 col-xs-8 default_header">
		    Practicals Evaluated
		</div>
		<div class="col-sm-4 col-xs-4 default_header">
		    
		</div>
		<div class="col-sm-12 col-xs-12 no_padding innovation_data"></div>
		
		
		<div class="col-sm-8 col-xs-6 no_padding count_holder" id="count_holder"><?php echo $innovations?>
		</div>	

			<div class="col-sm-4 col-xs-2 no_padding " ><i class="fa fa-lightbulb-o fa-4x"></i>
		</div>
		<div class="col-sm-12 col-xs-12 no_padding">
		<div class="col-sm-4 col-xs-4 no_padding">	

		</div>
		<div class="col-sm-4 col-xs-4 no_padding ">
		</div>	
       <div class="col-sm-4 col-xs-4 no_padding ">
       	<span class="button_viewinno"> view</span>
		</div>
		</div>
	</div>
</div>



</div>
</div>
<script type="text/javascript">
$('.count_holder').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 3000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});

</script>
<div class="col-sm-12 col-xs-12 default_header">
&nbsp;
</div>
<div class="col-sm-12 col-xs-12 default_header" id="sammary_headers">
A SUMMARY OF SUBMITED PRACTICALS
</div>
<div class="col-sm-12 col-xs-12">
	<div class=" col-sm-6 col-xs-12" id="genders">

	</div>
</div>

<script type="text/javascript">
$(document).ready(function(){
//alert()
    	   $.get("modules/system/judge/pages/Dashboard/gender.php",function(data){
         	$("#genders").html(data);
    	   })
	
	})
</script>