
<style type="text/css">
#mychartpo{
    min-height:200px;
    border:1px solid #ccc;
}
</style>


<div class="col-sm-12 col-xs-12 no_padding">
  <div class="col-sm-12 col-xs-12 default_header bordered">FURSA IMPORTED LEARNERS VS ACTIVE WHITBOX E-LEARNERS</div>

<?php
include "../../../../../connect.php";
$e_learners=0;
$from_whitebox=0;
$from_fursa=0;
$diect_elerners=0;
 $sqlx="SELECT * FROM e_learning_users where status='active'";
 //$sqlx="SELECT * FROM innovations_table";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
        $email=$row['email'];
    $e_learners++;
    $checkExist=mysqli_query($con,"SELECT * FROM data_table where doc_id ='1' and colm_9='$email'") or die(mysqli_error($con));

        if(mysqli_num_rows($checkExist)!=0){
            $from_fursa++;

        }else{

            $checkdata=mysqli_query($con,"SELECT * FROM users where email='$email'") or die(mysqli_error($con));

        if(mysqli_num_rows($checkdata)!=0){
            $from_whitebox++;

        }else{
       $diect_elerners++;
        }





        }




    }




$importeddata = mysqli_query($con,"SELECT * FROM data_table where doc_id ='1'");
$registerd = mysqli_num_rows($importeddata);
$importeddatac=$registerd-1;
$deferencef=$importeddatac-$from_fursa;



?>
<canvas class="col-sm-12 col-xs-12" id="myChartpo"></canvas>

<script type="text/javascript">
   $(document).ready(function(){
       var registered='<?php echo $e_learners?>';
       var importeddatac='<?php echo $importeddatac?>';
       var deferencef='<?php echo $deferencef?>';
       var from_fursa='<?php echo $from_fursa?>';
       var from_whitebox='<?php echo $from_whitebox?>';
       var diect_elerners='<?php echo $diect_elerners?>';
var ctx = document.getElementById('myChartpo').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'bar',

    // The data for our dataset
    data: {
        labels: ['Total fursa members','Active Fursa members', ' Active Whitebox members', 'Direct Signup members','Fursa inactive members'],
        datasets: [{
            label: 'FURSA IMPORTED LEARNERS VS ACTIVE WHITBOX E-LEARNERS',
            backgroundColor: ['rgb(34, 84, 40, 0.8)',
                               'rgb(54, 162, 235, 0.8)',
                                'rgb(54, 2, 235, 0.8)',
                               'rgb(255, 206, 86, 0.8)',
                               'rgb(255, 0, 0, 0.8)'
                             ],
            borderColor: 'rgb(255, 99, 132)',
               data: [importeddatac, from_fursa, from_whitebox,diect_elerners,deferencef]
        }]
    },

    // Configuration options go here
    options: {}
});
});
</script>
</div>