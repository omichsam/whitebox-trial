<?php
include "../../../../../connect.php";
$menudata=base64_decode($_POST['testopt']);
$unit_id=base64_decode($_POST['unit_id']);
$exixting=mysqli_query($con,"SELECT * FROM curriculum_test WHERE test_name='$menudata' and unit_id ='$unit_id'") or die(mysqli_error($con));

  		if(mysqli_num_rows($exixting)>=1){
echo base64_encode("Data exists");
}else{


$addrecord=mysqli_query($con,"INSERT INTO curriculum_test VALUES(NULL,
																    '$unit_id',
																	'$menudata',
																	'This quick quiz section is set up to gauge your understanding of the material that has been presented. Take a few minutes to test yourself and see if you have really grasped the material presented about business planning and the lean canvas.',
																	'',
																	'',
																	'$menudata',
																	'$Today')")or die(mysqli_error($con));
echo base64_encode("success");

}
?>