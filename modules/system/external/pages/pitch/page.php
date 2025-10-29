<?php
include "../../../../../connect.php";
include("../../../../../base_connect.php");
//include("../connect.php");
$innovation=$_POST['innovation'];
$get_user=mysqli_query($con,"SELECT * FROM innovations_table where Innovation_Id='$innovation'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$user_id=$get['user_id'];
//echo $User_id;

    
   // echo $Innovation_Id;
$get_userd=mysqli_query($con,"SELECT * FROM events WHERE Innovation_Id='$innovation' and status='active'") or die(mysqli_error($con));
$getd=mysqli_fetch_assoc($get_userd);
$host_id=$getd['host_id'];
$InnovationId=$getd['Innovation_Id'];
$event_id=$getd['id'];


//echo $InnovationId;
$get_page=mysqli_query($con,"SELECT * FROM pitch WHERE host_id='$host_id' and event_id='$event_id'") or die(mysqli_error($con));
$getdde=mysqli_fetch_assoc($get_page);
$page=$getdde['page'];
//echo $page;
 //echo $page;
 if($page=="done"){
     ?>
     <script>
     localStream.getTracks().forEach((track) => {
    track.stop();
  })
     </script>
     <?php
     
    echo "We have come to the end of this session, thank you for your participation";
}else if($page=="start"){
    echo "Pitch Session well be on shortly, Good luck";
}else{
 if($page=="reasons"){
     
      $sqlx="SELECT * FROM innovations_table where Innovation_Id='$innovation'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error());

    while($row=mysqli_fetch_array($query_runx)){
  //$date_added=$row[$page];

  //$data_page=$row[$page];
$Innovation_name=$row['Innovation_name'];
}
     ?>
       <div class="col-sm-12 col-xs-12 evaluate_header"><?php echo $Innovation_name?></div>

    <div class="col-sm-12 col-xs-12">
  <div class="col-sm-12 colxs-12 default_header">REASONS FOR SUBMISSION</div>
  <div class="col-sm-12 col-xs-12" id="innovationneed">
 <?php 


$checkExist=mysqli_query($con,"SELECT * FROM innovation_expectation WHERE Innovation_id='$innovation'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)!=0){
?>
<div class="col-sm-12 col-xs-12 table_header">
  <div class="col-sm-1 col-sm-1"></div>
  <div class="col-sm-11 col-sm-11">Looking for:</div>


</div>

<?php

$datadisplay="";
$counting="";
$sqlxo="SELECT * FROM innovation_expectation where Innovation_id='$innovation'";

    $query_runxd=mysqli_query($con,$sqlxo) or die($query_runxd."<br/><br/>".mysqli_error());

    while($row=mysqli_fetch_array($query_runxd)){

      
      $communities=$row['communities'];
      $patnership_innovators=$row['patnership_innovators'];
      $funding=$row['funding'];

      $petnership_implementors=$row['petnership_implementors'];
      if($petnership_implementors){

        $counting=$counting+1;
        $datadisplay=$petnership_implementors;
        ?>
<div class="col-sm-12 col-xs-12 table_rowers">
  <div class="col-sm-1 col-sm-1"><?php echo $counting?></div>
  <div class="col-sm-11 col-sm-11"><?php echo $datadisplay?></div>


</div>

<?php

      }else{
     
      $datadisplay="";
      }
      if($patnership_innovators){

        $counting=$counting+1;
        $datadisplay=$patnership_innovators;
        ?>
<div class="col-sm-12 col-xs-12 table_rowers">
  <div class="col-sm-1 col-sm-1"><?php echo $counting?></div>
  <div class="col-sm-11 col-sm-11"><?php echo $datadisplay?></div>


</div>

<?php

      }else{
      
      $datadisplay="";
      }
       if($funding){

        $counting=$counting+1;
        $datadisplay=$funding;
        ?>
<div class="col-sm-12 col-xs-12 table_rowers">
  <div class="col-sm-1 col-sm-1"><?php echo $counting?></div>
  <div class="col-sm-11 col-sm-11"><?php echo $datadisplay?></div>


</div>

<?php

      }else{
      
      $datadisplay="";
      }
       if($communities){

        $counting=$counting+1;
        $datadisplay=$communities;
        ?>
<div class="col-sm-12 col-xs-12 table_rowers">
  <div class="col-sm-1 col-sm-1"><?php echo $counting?></div>
  <div class="col-sm-11 col-sm-11"><?php echo $datadisplay?></div>


</div>

<?php

      }else{
      
      $datadisplay="";
      }
    }

     



}else{

}

    ?>
</div>

  </div>
     
     
     
     
     <?php
     
      
     
 }else{
 $sqlx="SELECT * FROM innovations_table where Innovation_Id='$innovation'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error());

    while($row=mysqli_fetch_array($query_runx)){
  //$date_added=$row[$page];

  $data_page=$row[$page];
$Innovation_name=$row['Innovation_name'];
}

   
    
?>
  <div class="col-sm-12 col-xs-12 evaluate_header"><?php echo $Innovation_name?></div>

    <div class="col-sm-12 col-xs-12">
  <div class="col-sm-12 colxs-12 default_header" style="text-align: center;text-transform: uppercase;font-weight: bold"><?php echo $page?></div>
  <div class="col-sm-12 col-xs-12" id="innovationneed">
<?php echo $data_page?>
</div>
</div>
<?php
}
}


?>