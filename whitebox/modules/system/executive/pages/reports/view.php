
<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";


$Name="";
$status="submission";
$innovation=base64_decode($_POST['innovation']);
//$Status=encrypt("second_evaluation",$key);
$sqlx="SELECT * FROM innovations_reports where Innovation_Id='$innovation' and status='$status'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));
    while($row=mysqli_fetch_array($query_runx)){
      $clerk_id=$row['clerk_id'];
  $Report=$row['Report'];
  $date_added=$row['date_added'];
  //echo $date_added;
    $Innovation_Id=$row['Innovation_Id'];
    $time_d="";
    $curenttime=time();
    $time_difference=$curenttime-$date_added;
    $seconds=$time_difference;
    $minutes=round($seconds/60);//minutes
    $hours=round($seconds/3600);//hours
    $days=round($seconds/86400);//days
    $weeks=round($seconds/604800);//weeks
    $months=round($seconds/2629440);//months
    $years=round($seconds/31553380);//years



    if($seconds<=60){
     return "Just now";
    }else if($minutes<=60){
      if($minutes==1){

        $time_d="One minute ago";
      }else{
        $time_d="$minutes minutes ago";
      }

    }elseif($hours<=24){

   if($hours==1){
    $time_d="An hour ago";
   }else{
    $time_d="$hours hrs ago";
   }


    }else if($days<=7){
    if($days==1){
      $time_d="Yesterday";
    }else{
      $time_d="$days days ago";
    }


    }else if($weeks<=4.3){
     if($weeks==1){
      $time_d="A week ago";
     }else{
      $time_d="$weeks weeks ago";
     }

    }else if($months<=12){

      if($months==1){
        $time_d="A month ago";
      }else{

        $time_d="$months months ago";
      }
    }else{
  if($years==1){

    $time_d="A year ago";
  }else{
    $time_d="$years years ago";
  }

    }




}
$sqlrd="SELECT * FROM innovations_table where Innovation_Id='$innovation'";
    $query_run=mysqli_query($con,$sqlrd) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
    $Innovation_name=$row['Innovation_name'];
}
$sqlty="SELECT Name FROM administrators where Id='$clerk_id'";
    $query_runl=mysqli_query($con,$sqlty) or die($query_runl."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runl)){
    $Name=$row['Name'];
}
?>

<div class=" col-sm-12 col-xs-12 default_header"><?php echo $Innovation_name?> REPORT</div>
<div class="col-sm-12 col-xs-12" id="report_display">

<div class="col-sm-12 col-xs-12 " id="holder_one">
  <?php echo $Report?>
    
  </div>
  <div class="col-sm-12 col-xs-12" id="holder_otwo">
    <div class="col-sm-6 col-xs-6" id="bb_holders">
      EVALUATED BY:
      <div class="col-sm-12 col-xs-12" id="">
  <?php echo $Name?>
</div>
    </div>
    <div class="col-sm-6 col-xs-6" id="">
      LAST MODIFICATION:
      <div class="col-sm-12 col-xs-12" id="">
  <?php echo $time_d?>
</div>
    </div>
  </div>
</div>
<input type="text" value="<?php echo $innovation?>" id="innovation" class="not_shown" disabled="disabled" name="">
<div class=" col-sm-12 col-xs-12 " id="container_report">
  Type your Report/comments here;
<textarea id="executive_report" maxlength="400" onkeyup="executivewrite(this.value)" placeholder="Type your report/comments here" class="reports_dd col-sm-12 col-xs-12"></textarea>

<div class=" col-sm-12 col-xs-12 " id="error_reporter">&nbsp;</div>


</div>
<script type="text/javascript">
  
    function executivewrite(str) {
  var lng = str.length;
  document.getElementById("error_reporter").innerHTML = lng + ' out of 400 characters';
}
</script>