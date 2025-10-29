<?php
include "../../../../../connect.php";
$questionsnewb=mysqli_real_escape_string($con,base64_decode($_POST['questionsnewb']));

$questionoption=mysqli_real_escape_string($con,base64_decode($_POST['questionoption']));
$compliction="";
$maxcompliction="";
$rangefrom="";
$rangeto="";
$optopnb="";
if($questionoption=='Range of answers. e.g 1-10'){
$compliction="Not at all useful";
$maxcompliction="Extremely useful";
$rangefrom="1";
$rangeto="10";
$optopnb="range";
}else if($questionoption=='Yes/No options'){
$optopnb="Yes/No";
}else if($questionoption=='Open ended'){
$optopnb="open";
}else{

}



$unit_id=base64_decode($_POST['unit_id']);







  $sql="SELECT * FROM curriculum_test Where unit_id='$unit_id' and type='feedback'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           //$unit_field=$row['unit_field'];
           $test_name =$row['test_name'];
           $test_id=$row['id'];
           
       }
$modquery = mysqli_query($con,"SELECT * FROM curriculum_test_questions Where  test_id ='$test_id'");
$modqueryulen = mysqli_num_rows($modquery);
$newp=$modqueryulen+1;
$newq=$newp.".  ".$questionsnewb;
$exixting=mysqli_query($con,"SELECT * FROM curriculum_test_questions WHERE question='$newq' and unit_id ='$unit_id' and test_id='$test_id'") or die(mysqli_error($con));

  		if(mysqli_num_rows($exixting)>=1){
echo base64_encode("Data exists");
}else{


$addrecord=mysqli_query($con,"INSERT INTO curriculum_test_questions VALUES(NULL,
																    '$unit_id',
																	'$test_id',
																	'$newq',
																	'$optopnb',
																	'$rangefrom',
																	'$rangeto',
																	'$compliction',
																	'$maxcompliction',
																	'$Today')")or die(mysqli_error($con));
echo base64_encode("success");

}
?>