
<style type="text/css">
#mychart{
    min-height:200px;
    border:1px solid #ccc;
}
</style>


<div class="col-sm-12 col-xs-12 no_padding">
	<div class="col-sm-12 col-xs-12 default_header bordered">Second evaluation</div>

<?php

include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
     $sqlxe="SELECT * FROM basic_informations";
$query_runxe=mysqli_query($con,$sqlxe) or die($query_runxe."<br/><br/>".mysqli_error($con));
    while($row=mysqli_fetch_array($query_runxe)){
      $waiting=$waiting+1;
    }
$data_status="pending";
$pend=0;
    $approved=$waiting;
    $implementation=0;
    $disapproved=0;
    $evaluation=0;
    $submistion=0;
    $first_disapproved=0;
    $second_evaluation=$waiting;
    $pending=0;
    $d_wait=0;
    
$sqlx="SELECT * FROM innovations_table  Where status!='$data_status'";
//$counter=0;

    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $Innovation_name=$row['Innovation_name'];
   $Status=$row['Status'];
   // $Status="disapproved";
    
$submistion=$submistion+1;
  if($Status=="evaluation"){
    $evaluation=$evaluation+1;
  }else if($Status=="second_evaluation"){
$evaluation=$evaluation+1;
$second_evaluation=$second_evaluation+1;
  }else if($Status=="approved"){
      $second_evaluation=$second_evaluation+1;
$approved=$approved+1;
  }else if($Status=="disapproved"){
    $disapproved=$disapproved+1;
    $second_evaluation=$second_evaluation+1;
  }else if($Status=="first_disapproved"){
$first_disapproved=$first_disapproved+1;
  }else if($Status=="waiting"){
//$pending=$pending+1;
  }else if($Status=="implementation"){
$implementation=$implementation+1;
$second_evaluation=$second_evaluation+1;
$approved=$approved+1;
  }else{
      
  }
 }
 $pend=($second_evaluation-$approved)-$disapproved;
 if($pend>0){
    $new_pending=$pend;
 }else{
    $new_pending=0; 
 }
 
 $d_wait=($approved-$implementation);
?>
<canvas class="col-sm-12 col-xs-12" id="second_chart"></canvas>

<script type="text/javascript">
      $(document).ready(function(){
       var approved='<?php echo $approved?>';
       var second_evaluation='<?php echo $second_evaluation?>';
       var disapproved='<?php echo $disapproved?>';
       var pending='<?php echo $new_pending?>';
       var implementation='<?php echo $implementation?>';
       var dawaiting='<?php echo $d_wait?>';
       //alert(awaiting)
var ctxy = document.getElementById('second_chart').getContext('2d');
var charty = new Chart(ctxy, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ['Recieved', 'Accepted', 'Declined', 'Evaluation','Implemented','Awaiting'],
        datasets: [{
            label: 'Second evaluation process',
            backgroundColor: ['rgb(54, 162, 235, 0.8)',
                               'rgb(34, 84, 40, 0.8)',
                               'rgb(255, 0, 0, 0.8)',
                               'rgb(255, 206, 86, 0.8)',
                               'rgb(255, 199, 132, 0.8)',
                               'rgb(154, 162, 235, 0.8)'],
            borderColor: 'rgb(255, 99, 132)',
            data: [second_evaluation, approved, disapproved, pending,implementation,dawaiting,0]
        }]
    },
    

    // Configuration options go here
    options: {}
});
});
</script>
</div>