
<div class="col-sm-12 col-xs-12 no_padding">
	GROUP:
				<select class="splashinputs" id="groupselect">
					<option></option>

      <?php

include("../../../../connect.php");
$counter=0;
$dcount=0;
$family_name="";


$sql="SELECT * FROM duty_group";
    $query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
    	$description=$row['description'];
	$get_account=mysqli_query($con,"SELECT * FROM duty_rota where description='$description' and status='waiting'") or die(mysqli_error($con));
	$num=mysqli_num_rows($get_account);
	if($num>=1){

	}else{
		$dcount=$dcount+1;
    	?>

    	<option><?php echo $description?></option>

    	<?php
}
    }?>

				</select>
</div>
<script type="text/javascript">
	$(document).ready(function){
		var couted='<?php echo $dcount?>';
		if(couted==0){
       $("#hodersgroupers").hide();
		}else{
        $("#hodersgroupers").show();
		}

	}
</script>