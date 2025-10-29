<?php
include "../../../../../connect.php";
$menudata=base64_decode($_POST['menudata']);
$unit_id=base64_decode($_POST['unit_id']);
$exixting=mysqli_query($con,"SELECT * FROM curriculum_units_details WHERE unit_field='$menudata' and unit_id ='$unit_id'") or die(mysqli_error($con));

  		if(mysqli_num_rows($exixting)>=1){
echo base64_encode("Data exists");
}else{


$addrecord=mysqli_query($con,"INSERT INTO curriculum_units_details VALUES(NULL,
																    '$unit_id',
																	'$menudata',
																	'',
																	'',
																	'',
																	'',
																	'$Today')")or die(mysqli_error($con));
echo base64_encode("success");

}
?>