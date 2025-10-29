
<style type="text/css">
#mychart{
    min-height:200px;
    border:1px solid #ccc;
}
</style>


<div class="col-sm-12 col-xs-12 no_padding">
	<div class="col-sm-12 col-xs-12 default_header bordered">FIRST EVALUATION REPORT PER MONTH</div>

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
$data_status=encrypt("pending",$key);
    
$sqlx="SELECT * FROM innovations_table Where status!='$data_status'";
//$counter=0;

    $query_runx=mysql_query($sqlx) or die($query_runx."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runx)){
    $Innovation_name=base64_decode(decrypt($row['Innovation_name'], $key));
   $Status=decrypt($row['Status'], $key);
      $Category=base64_decode(decrypt($row['Category'], $key));
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
<canvas class="col-sm-12 col-xs-12" id="mypermonth"></canvas>

<script type="text/javascript">
   $(document).ready(function(){
       var submistion='<?php echo $submistion?>';
       var second_evaluation='<?php echo $second_evaluation?>';
       var first_disapproved='<?php echo $first_disapproved?>';
       var pending='<?php echo $new_pending?>';
var ctx = document.getElementById('mypermonth').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['Jan', 'Feb', 'MAR','APR','MAY','Jun','JUL','AUG','SEP','OCT','NOV','DEC'],
        datasets: [{
            label: 'Submitted',
            backgroundColor: 'rgb(238, 227, 255, 0.01)',
                             
            borderColor: 'rgb(255, 99, 132)',
               data: [submistion, second_evaluation, pending,first_disapproved,submistion, second_evaluation, pending,first_disapproved,submistion, second_evaluation, pending,first_disapproved ]
        },{
            label: 'Evaluated',
            backgroundColor: 'rgb(238, 227, 255, 0.01)',
            borderColor: 'rgb(255, 99, 0)',
            data: [second_evaluation, pending,submistion, second_evaluation,submistion, pending,first_disapproved,submistion, second_evaluation,submistion,first_disapproved,pending ]
   
                
        },{
            label: 'Accepted',
            backgroundColor: 'rgb(238, 227, 255, 0.01)',
            borderColor: 'rgb(230, 99, 50)',
            data: [pending,submistion, second_evaluation,submistion,second_evaluation, submistion,pending,first_disapproved, second_evaluation,submistion,first_disapproved,pending ]
   
                
        },{
            label: 'Declined',
            backgroundColor: 'rgb(238, 227, 255, 0.01)',
            borderColor: 'rgb(35, 99, 50)',
            data: [pending,second_evaluation,submistion,submistion,second_evaluation,pending, second_evaluation,submistion,first_disapproved,first_disapproved,submistion,pending ]
   
                
        }
        
        
        ]
    },

    // Configuration options go here
    options: {}
});
});
</script>
</div>