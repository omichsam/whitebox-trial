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
$learners = mysqli_query($con,"SELECT * FROM e_learning_users");
$alllearners = mysqli_num_rows($learners);
$Modulesd = mysqli_query($con,"SELECT * FROM curriculum_units");
$Modules = mysqli_num_rows($Modulesd);
$tests = mysqli_query($con,"SELECT * FROM curriculum_tests_done");
$testdone = mysqli_num_rows($tests);

$feedback=0;

 $sqlx="SELECT * FROM e_learning_users where status='active'";
 //$sqlx="SELECT * FROM innovations_table";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
        $userid=$row['id'];
        for($d=1;$d<=7;$d++){
        	
        	  $get_partic=mysqli_query($con,"SELECT * FROM curriculum_test where unit_id ='$d' and type='feedback'") or die(mysqli_error($con));
                        $partic=mysqli_fetch_assoc($get_partic);
                        if($partic){
                      $test_id=$partic['id'];

                        }else{
                       $test_id="";
                        }
    $checkExist=mysqli_query($con,"SELECT * FROM curriculum_exam_area where unit_id ='$d' and test_remarks='completed' and user_id='$userid' and test_id='$test_id'") or die(mysqli_error($con));

        if(mysqli_num_rows($checkExist)!=0){
            $feedback++;

        }else{
        }
    }
    }
    
    



?>
<div class="col-sm-12 col-xs-12 default_header" id="main_welcomd">
WELCOME TO THE DASHBOARD
</div>
<div class="col-sm-12 no_padding col-xs-12" id="dash_sambet">

<div class="col-sm-3 col-xs-6 ">
	<div class="col-sm-12 col-xs-12 no_padding data_dvsz" role="external_users" id="external_users">
		<div class="col-sm-12 no_padding col-xs-12 data_outer">
		<div class="col-sm-8 col-xs-8 default_header">
		    Learners
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


<div class="col-sm-3 col-xs-6 ">
	<div class="col-sm-12 col-xs-12 no_padding data_dvsz" role="modulesh" id="modulesh">
		<div class="col-sm-12 no_padding col-xs-12 data_outer">
		<div class="col-sm-8 col-xs-8 default_header">
		    Modules
		</div>
		<div class="col-sm-4 col-xs-4 default_header">
		    
		</div>
		<div class="col-sm-12 col-xs-12 no_padding innovation_data"></div>
		
		
		<div class="col-sm-8 col-xs-6 no_padding count_holder" id="count_holder"><?php echo $Modules?>
		</div>	

			<div class="col-sm-4 col-xs-2 no_padding " ><i class="fa fa-book fa-4x"></i>
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



<div class="col-sm-3 col-xs-6 ">
	<div class="col-sm-12 col-xs-12 no_padding data_dvsz" role="tests" id="tests">
		<div class="col-sm-12 no_padding col-xs-12 data_outer">
		<div class="col-sm-8 col-xs-8 default_header">
		    SURVEY
		</div>
		<div class="col-sm-4 col-xs-4 default_header">
		    
		</div>
		<div class="col-sm-12 col-xs-12 no_padding innovation_data"></div>
		
		
		<div class="col-sm-8 col-xs-6 no_padding count_holder" id="count_holder"><?php echo $testdone?>
		</div>	

			<div class="col-sm-4 col-xs-2 no_padding " ><i class="fa fa-file  fa-4x"></i>
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

<div class="col-sm-3 col-xs-6 ">
	<div class="col-sm-12 col-xs-12 no_padding data_dvsz" role="feedbackbutton" id="feedbackbutton">
		<div class="col-sm-12 no_padding col-xs-12 data_outer">
		<div class="col-sm-8 col-xs-8 default_header">
		    Feedback
		</div>
		<div class="col-sm-4 col-xs-4 default_header">
		    
		</div>
		<div class="col-sm-12 col-xs-12 no_padding innovation_data"></div>
		
		
		<div class="col-sm-8 col-xs-6 no_padding count_holder feeddata" id="count_holder"><?php echo $feedback?>
		</div>	

			<div class="col-sm-4 col-xs-2 no_padding " ><i class="fa fa-comments fa-4x"></i>
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
A SUMMARY OF REGISTERED USERS
</div>
<div class="col-sm-12 col-xs-12 no_padding" id="common_analyzer">
<div class="col-sm-6 col-xs-12"><div class=" col-sm-12 lower_datas col-xs-12 " id="modules"></div></div>
<div class="col-sm-6 col-xs-12"><div class=" col-sm-12 lower_datas col-xs-12 " id="genderhold"></div></div>
<div class="col-sm-6 col-xs-12"><div class=" col-sm-12 lower_datas col-xs-12 " id="reminder"></div></div>

</div>
<script type="text/javascript">
$(document).ready(function(){
	//alert()
	var loader=$("#loader").html();


	$("#modules").html(loader);
	$("#reminder").html(loader);
	$("#genderhold").html(loader);
    	   $.get("modules/system/content_team/pages/Dashboard/modules.php",function(data){
         	$("#modules").html(data);
    	   })
    
       $.get("modules/system/content_team/pages/Dashboard/gender.php",function(data){
         	$("#genderhold").html(data);
	})
  $.get("modules/system/content_team/pages/Dashboard/reminder.php",function(data){
         	$("#reminder").html(data);
	})
	var my_id=$("#user_email").val();
		$("#external_users").click(function(){
     var my_role=btoa($(this).attr("role"));
		//alert(my_role)
		   $.post("modules/system/content_team/pages/view/view.php",{my_role:my_role,my_id:my_id},function(data){
         	$("#common_analyzer").html(data);
         	$("#sammary_headers").html("");
	})
	})
	

			
					$("#tests").click(function(){
     var my_role=btoa($(this).attr("role"));
		//alert(my_role)
		   $.post("modules/system/content_team/pages/tests/tests.php",{my_role:my_role,my_id:my_id},function(data){
         	$("#home").html(data);
	})
	})
				$("#modulesh").click(function(){
     var my_role=btoa($(this).attr("role"));
		//alert(my_role)
		   $.post("modules/system/content_team/pages/content/content.php",{my_role:my_role,my_id:my_id},function(data){
         	$("#home").html(data);
	})
	})
	
	$("#feedbackbutton").click(function(){
     var my_role=btoa($(this).attr("role"));
		//alert(my_role)
		   $.post("modules/system/content_team/pages/feedback/feedback.php",{my_role:my_role,my_id:my_id},function(data){
         	$("#home").html(data);
	})
	})
	})
</script>