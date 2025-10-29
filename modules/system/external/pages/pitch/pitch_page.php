<?php

include "../../../../../connect.php";
include("../../../../functions/security.php");
//session_start();
 
include("../../../../../base_connect.php");
$user=base64_decode($_SESSION["username"]);
if($user){

}else{
  $user=base64_decode($_POST['my_id']);
  //echo $user;
  $innovation=$_POST['innovation'];
  $get_user=mysqli_query($con,"SELECT * FROM innovations_table WHERE Innovation_Id ='$innovation'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$user_id=$get['user_id'];
}
?>
<style type="text/css">
	#pitch_tops{
		border-bottom: 2px solid #ccc;
		font-weight: bolder;
		text-transform: uppercase;
		background: #ccc;
	}
	.ptch_rows{
		min-height: 30px;
		border-bottom: 1px solid #ccc;
		margin-top: 4px;
	}


.led-green {
  margin: 0 auto;
  width: 24px;
  height: 24px;
  margin-top: -20px;
  background-color: #0dff00;
  border-radius: 50%;
  box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #1a823b 0 -1px 9px, rgba(0, 100, , 0.5) 0 2px 12px;
  -webkit-animation: blinkRed 1.5s infinite;
  -moz-animation: blinkRed 1.5s infinite;
  -ms-animation: blinkRed 1.5s infinite;
  -o-animation: blinkRed 1.5s infinite;
  animation: blinkRed 1.5s infinite;
}

@-webkit-keyframes blinkRed {
    from { background-color: #0dff00; }
    50% { background-color: #00aa2a; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #1a823b 0 -1px 9px, rgba(255, 0, 0, 0.5) 0 2px 0;}
    to { background-color: #0dff00; }
}
@-moz-keyframes blinkRed {
    from { background-color: #0dff00; }
    50% { background-color: #00aa2a; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #1a823b 0 -1px 9px, rgba(255, 0, 0, 0.5) 0 2px 0;}
    to { background-color: #0dff00; }
}
@-ms-keyframes blinkRed {
    from { background-color: #0dff00; }
    50% { background-color: #00aa2a; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #1a823b 0 -1px 9px, rgba(255, 0, 0, 0.5) 0 2px 0;}
    to { background-color: #0dff00; }
}
@-o-keyframes blinkRed {
    from { background-color: #0dff00; }
    50% { background-color: #00aa2a; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #1a823b 0 -1px 9px, rgba(255, 0, 0, 0.5) 0 2px 0;}
    to { background-color: #0dff00; }
}
@keyframes blinkRed {
    from { background-color: #0dff00; }
    50% { background-color: #00aa2a; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #1a823b 0 -1px 9px, rgba(0, 100, 0, 0.5) 0 2px 0;}
    to { background-color: #0dff00; }
}
</style>
<?php
$day=0;
$times=0;
$pitchmode="not_shown";
$fulldate=0;
$Innovation_Id=0;
$time_variant=time();
$contb=1800;
$new_time=$time_variant+$contb;


?>
<div class="col-sm-12 col-xs-12">
	<div class="col-xs-12 col-sm-12 default_header">Pitch sessions available</div>
<div class="col-xs-12 col-sm-12" id="pitch_tops">
	<div class="col-xs-4 col-sm-5">Innovation</div>
	<div class="col-xs-2 col-sm-2">Pitch date</div>
	<div class="col-xs-2 col-sm-2">Modarator</div>
	<div class="col-xs-2 col-sm-2">Status</div>
	<div class="col-xs-2 col-sm-1">Action</div>
</div>
<?php
$offline_data="";
$counter=0;
      $sqlde="SELECT * FROM innovations_table WHERE user_id ='$user_id'";
    $query_runr=mysqli_query($con,$sqlde) or die($query_runr."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runr)){
        $Innovation_Id=$row['Innovation_Id'];
        $Innovation_name=$row['Innovation_name'];

      $sqldek="SELECT * FROM events WHERE Innovation_Id='$Innovation_Id'";
    $query_runrk=mysqli_query($con,$sqldek) or die($query_runrk."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runrk)){
$day=$row['planned_date'];
$times=$row['planned_time'];
$status=$row['status'];
if($status=="active"){
$offline_data="";
}else{
$offline_data="not_shown";
}
$host_id=$row['host_id'];
$counter=$counter+1;
$Name="";
$sqlx="SELECT * FROM administrators where Id='$host_id'";

    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
 
      $Name=$row['Name'];
    }
if($day && $times){

$fulldate=date('m/d/Y H:i:s', $day);
if($time_variant>=$day){
 // $pitchmode=""; 
$superdate=$time_variant-$day;
//echo $superdate." ".$new_time." ".$day;
if($superdate>=$contb){
$pitchmode="not_shown";
}else{
$pitchmode="";  
}
}else{
  $pitchmode=""; 
}

//echo $fulldate;
}else{

}


?>
<div class="col-xs-12 col-sm-12 ptch_rows" id="">
	<div class="col-xs-4 col-sm-5"> <?php echo $counter.". ".$Innovation_name?></div>
	<div class="col-xs-2 col-sm-2"><?php echo $fulldate?></div>
	<div class="col-xs-2 col-sm-2"><?php echo $Name?></div>
	<div class="col-xs-2 col-sm-2">
		<?php echo $status?>
         <div class="led-box <?php echo $offline_data?>">
         	
     <div class="led-green"></div>
  </div>
</div>
	<div class="col-xs-2 col-sm-1 <?php echo $offline_data?>"><span id="<?php echo $Innovation_Id?>" class="btn join_pitch theme_bg" style="background: green;margin-bottom: 2px">Join</span><i id="loading"></i></div>
</div>
<?php
}
}
?>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$(".join_pitch").click(function(){
			var loader=$("#loader").html();
			$("#loading").html(loader);

			     var innovation=$(this).attr("id");
              //alert(innovation)
          $.post("modules/system/external/pages/pitch/pitch.php",{innovation:innovation},function(data){
$("#dashboard_loaders").html("");
$("#loading").html("");
$("#home_display").html(data).show();
$('html, body').animate({scrollTop: '0px'}, 300);
  $(".dashboard_holder").hide();
  $("#content_divesr").html("home_display");
       }) 
		})
	})
</script>