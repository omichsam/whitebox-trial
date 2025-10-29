
<style type="text/css">
#mychart{
    min-height:200px;
    border:1px solid #ccc;
}
</style>


<div class="col-sm-12 col-xs-12 no_padding">
	<div class="col-sm-12 col-xs-12 default_header bordered">Investor Behaviour</div>

<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$assignments="pending";
$accepted="accepted";
$declined="declined";
$innovationsdaa=0;
$rejects=0;
$pendings=0;
$accepts=0;
 $datavalues="";
      $sqlxd="SELECT * FROM innovation_investors";

    $query_runxd=mysqli_query($con,$sqlxd) or die($query_runxd."<br/><br/>".mysqli_error($con));

    while($rowed=mysqli_fetch_array($query_runxd)){
      
        $status=$rowed['status'];
        if($status==$assignments){
            $pendings=$pendings+1;
         $innovationsdaa=$innovationsdaa+1;   
        }else if($status==$accepted){
            $accepts=$accepts+1;
         $innovationsdaa=$innovationsdaa+1;   
        }else if($status==$declined){
            $rejects=$rejects+1;
           $innovationsdaa=$innovationsdaa+1; 
        }else{
            
        }
        
    }
?>
<canvas class="col-sm-12 col-xs-12" id="investor_chart"></canvas>

<script type="text/javascript">
   
var ctxr = document.getElementById('investor_chart').getContext('2d');




var innovationsdaa='<?php echo $innovationsdaa?>';
var rejects='<?php echo $rejects?>';
var pendings='<?php echo $pendings?>';
var accepts='<?php echo $accepts?>';

var chartr = new Chart(ctxr, {
    // The type of chart we want to create
    type: 'pie',

    // The data for our dataset
    data: {
        labels: ['Accepted', 'Pending', 'Declined'],
        datasets: [{
            label: 'Investor behaviour',
            backgroundColor: ['rgb(34, 84, 40, 0.8)',
                               'rgb(255, 206, 86, 0.8)',
                               'rgb(255, 0, 0, 0.8)'],
            borderColor: 'rgb(255, 99, 132)',
            data: [accepts, pendings, rejects]
        }]
    },

    // Configuration options go here
    options: {}
});

</script>
</div>