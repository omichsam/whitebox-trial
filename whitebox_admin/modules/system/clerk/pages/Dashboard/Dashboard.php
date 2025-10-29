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
$innovators=0;
$innovations=0;
$data_status="pending";
$sqlx="SELECT * FROM users";

    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
/*

  $First_named=$row['First_name'];
   $Last_named=$row['Last_name'];
   $national_idn=$row['national_id'];
   $Genderd=$row['Gender'];
   $County_idn=$row['County_id'];
   $education_leveln=$row['education_level'];
   $Phonem=$row['Phone'];

if($First_named && $Last_named && $national_idn && $Genderd && $County_idn && $education_leveln && $Phonem){

*/

        $innovators=$innovators+1;
/*
}else{

}
*/

    }
    
$sqlxr="SELECT * FROM innovations_table Where status!='$data_status'";
    $query_runxr=mysqli_query($con,$sqlxr) or die($query_runxr."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxr)){
        $innovations=$innovations+1;
    }
    $sqlxr="SELECT * FROM basic_informations";
    $query_runxr=mysqli_query($con,$sqlxr) or die($query_runxr."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxr)){
        $innovations=$innovations+1;
    }
?>
<div class="col-sm-12 col-xs-12 default_header" id="main_welcomd">
WELCOME TO THE DASHBOARD
</div>
<div class="col-sm-12 no_padding col-xs-12" id="dash_sambet">

<div class="col-sm-6 col-xs-6 ">
	<div class="col-sm-12 col-xs-12 no_padding data_dvsz" role="external_users" id="external_users">
		<div class="col-sm-12 no_padding col-xs-12 data_outer">
		<div class="col-sm-8 col-xs-8 default_header">
		    <span class="mobile_hidden">Registered</span> Innovators
		</div>
		<div class="col-sm-4 col-xs-4 default_header">
		    
		</div>
		<div class="col-sm-12 col-xs-12 no_padding innovation_data"></div>
		
		
		<div class="col-sm-8 col-xs-6 no_padding count_holder" id="count_holder"><?php echo $innovators?>
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


<div class="col-sm-6 col-xs-6 ">
	<div class="col-sm-12 col-xs-12 no_padding data_dvsz" role="innovations" id="innovations">
		<div class="col-sm-12 no_padding col-xs-12 data_outer">
		<div class="col-sm-8 col-xs-8 default_header">
		    Innovations
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
A SUMMARY OF THE INNOVATIONS
</div>
<div class="col-sm-12 col-xs-12 no_padding" id="common_analyzer">
<div class="col-sm-6 col-xs-12"><div class=" col-sm-12 lower_datas col-xs-12 " id="first_evaluation"></div></div>
<!--<div class="col-sm-6 col-xs-12"><div class=" col-sm-12 lower_datas col-xs-12 " id="covid_evaluation"></div></div>-->

<div class="col-sm-6 col-xs-12"><div class=" col-sm-12 lower_datas col-xs-12 " id="second_evaluation"></div></div>

<div class="col-sm-6 col-xs-12"><div class=" col-sm-12 lower_datas col-xs-12 " id="sammary_stages"></div></div>
<div class="col-sm-6 col-xs-12"><div class=" col-sm-12 lower_datas col-xs-12 " id="Investor_analytics"></div></div>
<div class="col-sm-6 col-xs-12"><div class=" col-sm-12 lower_datas col-xs-12 " id="educationr"></div></div>

</div>
<script type="text/javascript">
$(document).ready(function(){
//alert()
    	   $.get("modules/system/clerk/pages/Dashboard/innovations.php",function(data){
         	$("#first_evaluation").html(data);
    	   })
    	    /*$.get("modules/system/clerk/pages/Dashboard/covid_innovations.php",function(data){
         	$("#covid_evaluation").html(data);
    	   })*/
    	     $.get("modules/system/clerk/pages/Dashboard/categories.php",function(data){
         	$("#second_evaluation").html(data);
	})
         $.get("modules/system/clerk/pages/Dashboard/education.php",function(data){
             //alert(data)
         	$("#educationr").html(data);
	})
           $.get("modules/system/clerk/pages/Dashboard/stages.php",function(data){
             //alert(data)
         	$("#sammary_stages").html(data);
	})
       $.get("modules/system/clerk/pages/Dashboard/gender.php",function(data){
         	$("#Investor_analytics").html(data);
	})

	var my_id=$("#user_email").val();
		$("#external_users").click(function(){
     var my_role=btoa($(this).attr("role"));
		//alert(my_role)
		   $.post("modules/system/clerk/pages/Dashboard/external_users.php",{my_role:my_role,my_id:my_id},function(data){
         	$("#common_analyzer").html(data);
         	$("#sammary_headers").html("");
	})
	})
			$("#innovations").click(function(){
     var my_role=btoa($(this).attr("role"));
		//alert(my_role)
		   $.post("modules/system/clerk/pages/Dashboard/reports.php",{my_role:my_role,my_id:my_id},function(data){
         	$("#common_analyzer").html(data);
         	$("#sammary_headers").html("");
	})
	})
	
	})
</script>