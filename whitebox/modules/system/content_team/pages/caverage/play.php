<?php
include "../../../../../connect.php";
$user=base64_decode($_POST['user']);
$sqlx="SELECT * FROM  curriculum_practicles where email='$user'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
 $user_id=mysqli_real_escape_string($con,$row['id']);
 $name=mysqli_real_escape_string($con,$row['name']);
$bussiness_idea=mysqli_real_escape_string($con,$row['bussiness_idea']);
$phone=mysqli_real_escape_string($con,$row['phone']);
$email=mysqli_real_escape_string($con,$row['email']);


$county=mysqli_real_escape_string($con,$row['county']);
 $serial_no=mysqli_real_escape_string($con,$row['serial_no']);
$video=mysqli_real_escape_string($con,$row['video']);
$judge_1=mysqli_real_escape_string($con,$row['judge_1']);
$judge_2=mysqli_real_escape_string($con,$row['judge_2']);
$judge_3=mysqli_real_escape_string($con,$row['judge_3']);
$total_score=mysqli_real_escape_string($con,$row['total_score']);
$aggregate_score=mysqli_real_escape_string($con,$row['aggregate_score']);
}
?>



<div class="col-sm-12 col-xs-12">
<div class="col-sm-12 col-xs-12 default_header">PRACTICAL 1: PITCH VIDEO</div>	
<div class="col-sm-12 col-xs-12" style="min-height:30px;box-shadow: 0 0 2px #ccc;background: #fff;margin-bottom: 3px;font-weight: bold;">
	<div class="col-sm-3 col-xs-3">Name:<?php echo $name?></div>
	<div class="col-sm-2 col-xs-2">Phone:<?php echo $phone?></div>
	<div class="col-sm-3 col-xs-3">Email:<?php echo $email?></div>
	<div class="col-sm-2 col-xs-2">county:<?php echo $county?></div>
	<div class="col-sm-2 col-xs-2">Business idea:<?php echo $bussiness_idea?></div>
</div>

<iframe class="col-sm-12 col-xs-12" height="455" src="<?php echo $video?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
<div class="col-sm-12 col-xs-12" style="min-height:30px;box-shadow: 0 0 2px #ccc;background: #fff;margin-bottom: 3px;margin-top: 5px; font-weight: bold;">
	<div class="col-sm-12 col-xs-12 default_header">SCORES</div>
	<div class="col-sm-3 col-xs-3">1st Judge :<?php echo $judge_1?></div>
	<div class="col-sm-2 col-xs-2">2nd Judge :<?php echo $judge_2?></div>
	<div class="col-sm-3 col-xs-3">3rd Judge :<?php echo $judge_3?></div>
	<div class="col-sm-2 col-xs-2">Total:<?php echo $total_score?></div>
	<div class="col-sm-2 col-xs-2">aggregate:<?php echo $aggregate_score?></div>
</div>

</div>