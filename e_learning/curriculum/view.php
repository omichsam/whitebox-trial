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
include("../../connect.php");
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
	<div class=" col-sm-12 col-xs-12 header_details" style=" border-bottom: 1 px solid #ccc;"><?php echo "$unit_name: $description"?></div>
	<div class=" col-sm-3 mobile_hidden no_padding col-xs-12" style="min-height: 400px;border-right: 2px solid #ccc !important;">
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
    	<div class=" col-sm-12 col-xs-12 open_course" id="<?php echo $role?>"><?php echo "$role.$counter: $unit_field"?></div>
<?php
}
?>
<div class="col-sm-12 col-xs-12" style="text-align: left;font-weight: bold;font-size: 20px;margin-top: 20px;">Other Modules</div>
<?php


$sql="SELECT * FROM curriculum_units Where id !='$role' and status='active'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           $unit_name=$row['unit_name'];
           $description =$row['description'];
           $more_information  =$row['more_information'];
           $id=$row['id'];

           ?>
           <div class=" col-sm-12 col-xs-12 other_chapters" id="<?php echo $id?>"><?php echo "$unit_name: $description"?></div>

           <?php
       }
?>
		
	</div>
	<div class=" col-sm-9 col-xs-12" id="content_player" style="text-align:left;margin-bottom: 20px;"><?php echo $more_information ?>
		
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
var my_id=$("#user_email").val();
var roleg=btoa('<?php echo $role?>');
$.post("e_learning/curriculum/check.php",{role:roleg,my_id:my_id},function(data){
				$("#content_player").html(data);
			



		})

		$(".open_course").click(function(){
			var role=btoa($(this).attr("id"));
			$.post("e_learning/curriculum/check.php",{role:roleg,my_id:my_id},function(data){
				$("#content_player").html(data);
			});
		})
		$(".other_chapters").click(function(){
			var role=btoa($(this).attr("id"));
			$.post("e_learning/curriculum/view.php",{role:role},function(data){
				$("#learning_area").html(data);
			})
		})
		
	})
</script>