<?php

include("../../../../connect.php");

	$get_account=mysqli_query($con,"DELETE FROM duty_rota where status='waiting'") or die(mysqli_error($con));
echo "success";
	?>