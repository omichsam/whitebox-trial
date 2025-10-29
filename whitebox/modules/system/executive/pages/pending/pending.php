<style type="text/css">
  
  #header_innovation{
text-transform: uppercase;
text-align: center;
border-bottom: 1px solid #ccc;
border-radius:5px;

  }
  .innovations_headers{
    min-height: 40px;
    box-shadow: 0 0 2px #ccc;
    margin-top:5px;
    background:#fff;
    overflow: hidden;
    max-height: 30px;
    background:#ccc;
    font-weight: bolder;
  }
    .innovations_holder{
    min-height: 40px;
    box-shadow: 0 0 2px #ccc;
    margin-top:5px;
    background:#fff;
    overflow: hidden;
    max-height: 30px;
    cursor: pointer;
  }
  .content_ino{
    min-height: 10px;
    box-shadow: 0 0 2px #ccc;
  }
  .header_innov{
    min-height: 10px;
    box-shadow: 0 0 2px #ccc;
  }
  .in_headers{
    text-transform: uppercase;
    border-bottom: 1px solid #ccc;
  }
  .content_h{

    text-transform: uppercase;
    font-weight: bolder;
  }
  .innovation_attachements{
    min-height: 180px;
    background-size: cover !important;
    background-repeat: no-repeat !important;
    background-position: center !important;

  }
  .even_row{
    background: #e3edf0;
  }
  .viewed{
background: #ccc;
  }
  .veiw_evaluate{
    cursor: pointer;
  }
 
#filtered_data{
    min-height: 500px;
    max-height: 500px;
    overflow: auto;
    background: #fff;
  }
  .toatal{
    background: #ccc;  
    color:red;
    cursor: pointer;
    border-top:2px solid #ccc;
  }
</style>
<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$counter=0;
?>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-12 col-xs-12" id="header_innovation"><h4 id="filter_headers">ANALYSIS</h4></div> 

<div class="col-sm-12 col-xs-12" id="filtered_data">
    

<?php


 
//$user=base64_decode($_SESSION["username"]);
$questions="question";
$my_decision="waiting";

//$Admin_role="clerk";

    $date = time();
  $new_time=$date;



?>
<div class="col-sm-12 no_padding col-xs-12 innovations_headers">
  <div class="col-xs-4 col-sm-4  content_h overflow_data" ><strong> NO. NAME</strong></div>
  <div class="col-xs-2 col-sm-2  content_h overflow_data" ><strong> EVALUATIONS</strong></div>
  <div class="col-xs-2 col-sm-2  content_h overflow_data" ><strong> ACCEPTED</strong></div>
  <div class="col-xs-2 col-sm-2  content_h overflow_data" ><strong> PENDING</strong></div>
  <div class="col-xs-2 col-sm-2  content_h overflow_data" ><strong> DECLINED</strong></div>
</div>
<?php
$totalapproved=0;
    $totalevaluations=0;
    $totaldisapproved=0;;
    $totalpendings=0;
$sqlx="SELECT * FROM administrators";
    $query_runxe=mysqli_query($con,$sqlx) or die($query_runxe."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxe)){
        $counter=$counter+1;
         $approved=0;
    $evaluations=0;
    $disapproved=0;;
    $pendings=0;
     $Name=$row['Name'];
  $user_id=$row['Id']; 
$sqlxds="SELECT Innovation_id From feedback WHERE Clerk_id='$user_id'";

    $query_runxjkh=mysqli_query($con,$sqlxds) or die($query_runxjkh."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxjkh)){
        $Innovation_id=$row['Innovation_id'];
$sqlxre="SELECT Status FROM innovations_table where Innovation_Id='$Innovation_id'";

    $query_runxdwe=mysqli_query($con,$sqlxre) or die($query_runxdwe."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxdwe)){
        $Status=$row['Status'];
   $evaluations=$evaluations+1;
  if($Status=="submission"){
      
  }else if($Status=="waiting"){
 $pendings=$pendings+1;
  }else if($Status=="evaluation"){
$pendings=$pendings+1;
  }else if($Status=="second_evaluation"){
$approved=$approved+1;
  }else if($Status=="approved"){
$approved=$approved+1;
  }else if($Status=="first_disapproved"){
$disapproved=$disapproved+1;
  }else if($Status=="disapproved"){
$approved=$approved+1;
  }else if($Status=="implementation"){
$approved=$approved+1;
  }else{

  }
      
        
        
        
        
        
    }
     
    }
    $totalapproved=$totalapproved+$approved;
    $totalevaluations=$totalevaluations+$evaluations;
    $totaldisapproved=$totaldisapproved+$disapproved;
    $totalpendings=$totalpendings+$pendings; 
  if($counter % 2 != 0){      
?>
<div class="col-sm-12 no_padding col-xs-12 innovations_holder">
  <div class="col-sm-4 col-xs-4"><?php echo $counter.".  ".$Name?></div>
  <div class="col-sm-2 col-xs-2"><?php echo $evaluations?></div>
  <div class="col-sm-2 col-xs-2"><?php echo $approved?></div>
  <div class="col-sm-2 col-xs-2"><?php echo $pendings?></div>
  <div class="col-sm-2 col-xs-2"><?php echo $disapproved?></div>
</div>
<?php
}else{
    ?>
    
<div class="col-sm-12 even_row no_padding col-xs-12 innovations_holder">
  <div class="col-sm-4 col-xs-4"><?php echo $counter.".  ".$Name?></div>
  <div class="col-sm-2 col-xs-2"><?php echo $evaluations?></div>
  <div class="col-sm-2 col-xs-2"><?php echo $approved?></div>
  <div class="col-sm-2 col-xs-2"><?php echo $pendings?></div>
  <div class="col-sm-2 col-xs-2"><?php echo $disapproved?></div>
</div>
    
    
    <?php
}
}
?>

<div class="col-sm-12 toatal no_padding col-xs-12 innovations_holder">
  <div class="col-sm-4 col-xs-4"><?php echo "TOTAL"?></div>
  <div class="col-sm-2 col-xs-2"><?php echo $totalevaluations?></div>
  <div class="col-sm-2 col-xs-2"><?php echo $totalapproved?></div>
  <div class="col-sm-2 col-xs-2"><?php echo $totalpendings?></div>
  <div class="col-sm-2 col-xs-2"><?php echo $totaldisapproved?></div>
</div>

</div>
</div>
