
<style type="text/css">
#mychart{
    min-height:200px;
    border:1px solid #ccc;
}
</style>


<div class="col-sm-12 col-xs-12 no_padding">
	<div class="col-sm-12 col-xs-12 default_header bordered">COVID 19 Innovations</div>

<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";

    $approved=0;
    $implementation=0;
    $disapproved=0;
    $evaluation=0;
    $submistion=0;
    $first_disapproved=0;
    $second_evaluation=0;
    $pending=0;
    $Culture=0;
    $Heritage=0;
$data_status="pending";
    
$sqlx="SELECT * FROM covid19_innovations Where status!='$data_status'";
//$counter=0;

    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
   // $Innovation_name=$row['Innovation_name'];
     // $Category=base64_decode(decrypt($row['Category'], $key));
   // $Status="disapproved";
   $Status=$row['Status'];
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
  $second_evaluation=$second_evaluation+1;
    $disapproved=$disapproved+1;
  }else if($Status=="first_disapproved"){
$first_disapproved=$first_disapproved+1;
  }else if($Status=="waiting"){
//$pending=$pending+1;
  }else if($Status=="implementation"){
$implementation=$implementation+1;
$second_evaluation=$second_evaluation+1;
  }else{
      
  }
 }
 $new_pending=$submistion-$second_evaluation-$first_disapproved;
?>
<canvas class="col-sm-12 col-xs-12" id="covid_canvas"></canvas>

<script type="text/javascript">
   $(document).ready(function(){
       var submistion='<?php echo $submistion?>';
       var second_evaluation='<?php echo $second_evaluation?>';
       var first_disapproved='<?php echo $first_disapproved?>';
       var pending='<?php echo $new_pending?>';
var ctx = document.getElementById('covid_canvas').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ['Submitted', 'Accepted', 'Under Evaluation', 'Declined'],
        datasets: [{
            label: 'First evaluation process',
            backgroundColor: ['rgb(54, 162, 235, 0.8)',
                               'rgb(34, 84, 40, 0.8)',
                               'rgb(255, 206, 86, 0.8)',
                               'rgb(255, 0, 0, 0.8)'
                             ],
            borderColor: 'rgb(255, 99, 132)',
               data: [submistion, second_evaluation, pending,first_disapproved ]
        }]
    },

    // Configuration options go here
    options: {}
});
});
</script>
</div>