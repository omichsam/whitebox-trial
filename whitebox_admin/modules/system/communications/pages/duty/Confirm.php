<?php

include("../../../../connect.php");

	$get_account=mysqli_query($con,"UPDATE duty_rota set Status='Done' where Status!='waiting'") or die(mysqli_error($con));
	$get_account=mysqli_query($con,"UPDATE duty_rota set Status='Ready' where Status='waiting'") or die(mysqli_error($con));

			$sql=mysqli_query($con,"INSERT INTO dutycount VALUE(Null,
														'',
														'',
														'')") or die(mysqli_error($con));
echo "success";
	?>