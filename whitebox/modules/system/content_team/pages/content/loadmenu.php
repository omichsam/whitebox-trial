<div class="col-sm-12 col-xs-12" style="text-align: left;font-weight: bold;font-size: 20px;">Course Outline</div>
<?php
include "../../../../../connect.php";
$unit_id=base64_decode($_POST['unit_id']);
$counter=0;
$sql="SELECT * FROM curriculum_units_details Where unit_id='$unit_id'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
 $unit_field =$row['unit_field'];
  $courseoutline_id =$row['id'];
  $counter=$counter+1;
    	?>
    	<div class=" col-sm-12 col-xs-12 open_course" id="<?php echo $courseoutline_id?>"><?php echo "$unit_id.$counter: $unit_field"?></div>
<?php
}
?>
<script type="text/javascript">
	$(document).ready(function(){
		$(".open_course").click(function(){
var roleg=btoa($(this).attr("id"));

			$.post("modules/system/content_team/pages/content/load.php",{role:roleg},function(data){
				$("#content_player").html(data);
			});

		})
	})
</script>