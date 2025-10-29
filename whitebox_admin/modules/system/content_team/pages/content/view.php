<style type="text/css">
	.open_course{
		min-height: 30px;
		cursor: pointer;
		text-align: left;
	}
	.other_chapters{
		min-height: 30px;
		cursor: pointer;
		text-align: left;
		font-weight: bolder;
		text-transform: uppercase;
	}
</style>


<?php 
$role=base64_decode($_POST['role']);
include "../../../../../connect.php";
	$sql="SELECT * FROM curriculum_units Where id='$role'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           $unit_name=$row['unit_name'];
           $description =$row['description'];
           $more_information  =$row['more_information'];
           $id=$row['id'];

       }
?>
<div class=" col-sm-12 no_padding col-xs-12">
	<div class=" col-sm-12 col-xs-12 header_details" style=" border-bottom: 1 px solid #ccc;text-align: center;font-weight: bold;font-size: 32px;"><?php echo "$unit_name: $description"?></div>
	<div class=" col-sm-3 no_padding col-xs-12" style="min-height: 400px;border-right: 2px solid #ccc !important;">
		<div class="col-sm-12 col-xs-12 no_padding" id="coursepage">
			<!--
		<div class="col-sm-12 col-xs-12" style="text-align: left;font-weight: bold;font-size: 20px;">Course Outline</div>
<?php

$counter=0;
$sql="SELECT * FROM curriculum_units_details Where unit_id='$role'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
 $unit_field =$row['unit_field'];
  $courseoutline_id =$row['id'];
  $counter=$counter+1;
    	?>
    	<div class=" col-sm-12 col-xs-12 open_course" id="<?php echo $courseoutline_id?>"><?php echo "$role.$counter: $unit_field"?></div>
<?php
}
?>-->
</div>
<div class="col-sm-12 col-xs-12 "> <div class="col-sm-12 col-xs-12 btn btn-primary" id="add_menu">Add subtopic</div>
<div class="col-sm-12 col-xs-12 not_shown " id="new_menupage">
	Input unit name:
	<input type="text" name="new_page" id="new_submenu" placeholder="e.g Introduction" minlength="3" maxlength="100" class="splashinputs">

	<div class="col-sm-6 col-xs-12"><div class="col-sm-12 col-xs-12 btn btn-danger" id="closepaged">Close</div></div>
	<div class="col-sm-6 col-xs-12 "><div class="col-sm-12 col-xs-12 btn btn-primary" id="saveunit">Save</div></div>
	<div class=" col-sm-12 col-xs-12" style="text-align:center;color: :red;" id="error_menu"></div>	
     
</div>

	</div>
	<div class="col-sm-12 col-xs-12">&nbsp;</div>
<div class="col-sm-12 col-xs-12 "> <div class="col-sm-12 col-xs-12 btn btn-primary" id="add_questionaire">Add Test</div>
<div class="col-sm-12 col-xs-12 not_shown " id="new_questionaire">
	Select test type:
	<select type="text" name="testp" id="testp"  minlength="3" maxlength="100" class="splashinputs">
		<option></option>
		<option>feedback</option>
		<!--<option>Survey</option>-->
	</select>

	<div class="col-sm-6 col-xs-12"><div class="col-sm-12 col-xs-12 btn btn-danger" id="closepagedtest">Close</div></div>
	<div class="col-sm-6 col-xs-12 "><div class="col-sm-12 col-xs-12 btn btn-primary" id="savetest">Save</div></div>
	<div class=" col-sm-12 col-xs-12" style="text-align:center;color: :red;" id="erroertest"></div>	
     
</div>

	</div>

<div class="col-sm-12 col-xs-12" style="text-align: left;font-weight: bold;font-size: 20px;margin-top: 20px;">Other Modules</div>
<?php


$sql="SELECT * FROM curriculum_units Where id !='$role'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           $unit_name=$row['unit_name'];
           $description =$row['description'];
          // $more_information  =$row['more_information'];
           $id=$row['id'];

           ?>
           <div class=" col-sm-12 col-xs-12 other_chapters" id="<?php echo $id?>"><?php echo "$unit_name: $description"?></div>

           <?php
       }
?>
		
	</div>
	<div class=" col-sm-9 col-xs-12" id="content_player" style="text-align:left;"><?php echo $more_information ?>
		
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#add_questionaire").click(function(){
	$("#new_questionaire").show();
	$(this).hide();
		$("#new_menupage").hide()
		$("#add_menu").hide()

})
		var loader=$("#loader").html();
		var unit_id=btoa('<?php echo $role?>');
		var modulename=btoa('<?php echo $name?>');
		var description=btoa('<?php echo $description?>');

$.post("modules/system/content_team/pages/content/loadmenu.php",{unit_id:unit_id},function(data){
 	             $("#coursepage").html(data);
 	         })


		$("#saveunit").click(function(){

			var menudata=btoa($("#new_submenu").val());
			if(menudata){
				$("#error_menu").html("Saving.."+loader);
				$.post("modules/system/content_team/pages/content/savedata.php",{menudata:menudata,unit_id:unit_id},function(data){
					if($.trim(atob(data))=="success"){
						$("#error_menu").html("Data saved..redirecting.."+loader);
                       $.post("modules/system/content_team/pages/content/loadmenu.php",{unit_id:unit_id},function(data){
 	             $("#coursepage").html(data);
 	             $("#error_menu").html("");
 	             $("#new_submenu").val("").prop("placeholder","e.g Introduction")
 	            // alert(data)
                   })
					}else{
						  $("#error_menu").html("Sorry an error occured!");
					}

				});

			}else{
             $("#error_menu").html("field required!");
			}

		})

$("#savetest").click(function(){
	var testopt=btoa($("#testp").val())
	if(testopt){
				$("#erroertest").html("Saving.."+loader);
				$.post("modules/system/content_team/pages/content/savetest.php",{testopt:testopt,unit_id:unit_id},function(data){
					if($.trim(atob(data))=="success"){
						$("#error_menu").html("Data saved..redirecting.."+loader);
                       $.post("modules/system/content_team/pages/content/loadmenu.php",{unit_id:unit_id},function(data){
 	             $("#coursepage").html(data);
 	             $("#erroertest").html("");
 	             $("#new_submenu").val("").prop("placeholder","e.g Introduction")
 	            // alert(data)
                   })
	

	}else{
		 $("#erroertest").html(atob(data));
	}

})
			}else{
				 $("#erroertest").html("Kindly select a test type!");
			}
})


		$("#add_menu").click(function(){
			//alert()
			$("#new_menupage").show()
			$(this).hide()
			$("#new_questionaire").hide();
			$("#add_questionaire").hide()
		})
		$("#closepaged").click(function(){
			$("#add_menu").show()
			$("#new_menupage").hide()
			$("#add_questionaire").show();
			$("#new_submenu").val("").prop("placeholder","e.g Introduction")
		})
           $("#closepagedtest").click(function(){
			$("#add_menu").show()
			$("#new_menupage").hide()
			$("#new_questionaire").hide()
			
			$("#add_questionaire").show();
			$("#new_submenu").val("").prop("placeholder","e.g Introduction")
		})





		$(".open_course").click(function(){
var roleg=btoa($(this).attr("id"));

			$.post("modules/system/content_team/pages/content/load.php",{role:roleg},function(data){
				$("#content_player").html(data);
			});

		})

		$(".other_chapters").click(function(){
var roleg=btoa($(this).attr("id"));

			$.post("modules/system/content_team/pages/content/view.php",{role:roleg},function(data){
				$("#home").html(data);
			});

		})
		
	})
</script>