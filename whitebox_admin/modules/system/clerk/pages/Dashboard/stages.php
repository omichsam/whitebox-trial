
<style type="text/css">
#mychart{
    min-height:200px;
    border:1px solid #ccc;
}
</style>


<div class="col-sm-12 col-xs-12 no_padding">
	<div class="col-sm-12 col-xs-12 default_header bordered">Innovations By Stages</div>

<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$data_status="pending";

    $Ideation=0;
    $Incubation=0;
    $Growth=0;
    $Scale=0;
$sqlxe="SELECT * FROM innovations_table Where status!='$data_status'";
$query_runxe=mysqli_query($con,$sqlxe) or die($query_runxe."<br/><br/>".mysqli_error($con));
    while($row=mysqli_fetch_array($query_runxe)){
      $stage=$row['stage'];

//$counter= $counter+1;
   if($stage=="Ideation"){
    $Ideation=$Ideation+1;
   }else if($stage=="Incubation"){
    $Incubation=$Incubation+1;
   }else if($stage=="Growth"){
    $Growth=$Growth+1;
   }else if($stage=="Scale"){
    $Scale=$Scale+1;
   }else{
   // echo $other;
   }
   
    
 
    }
    $sqlxe="SELECT * FROM basic_informations";
$query_runxe=mysqli_query($con,$sqlxe) or die($query_runxe."<br/><br/>".mysqli_error($con));
    while($row=mysqli_fetch_array($query_runxe)){
      $InnovationLevel=$row['InnovationLevel'];
//$counter= $counter+1;
   if($InnovationLevel=="Ideation"){
    $Ideation=$Ideation+1;
   }else if($InnovationLevel=="Incubation"){
    $Incubation=$Incubation+1;
   }else if($InnovationLevel=="Growth"){
    $Growth=$Growth+1;
   }else if($InnovationLevel=="Scale"){
    $Scale=$Scale+1;
   }else{
   // echo $other;
   }
    
 
    }
?>
<canvas class="col-sm-12 col-xs-12" id="stagesbdt"></canvas>

<script type="text/javascript">
var stagesd = document.getElementById('stagesbdt').getContext('2d');
     var Ideation ='<?php echo $Ideation?>';
    var Incubation ='<?php echo $Incubation?>';
    var Growth ='<?php echo $Growth?>';
    var Scale ='<?php echo $Scale?>';
  //  var counter='<?php echo $counter?>';
   // alert(counter)
var stagetr= new Chart(stagesd, {
    // The type of chart we want to create
    type: 'pie',

    // The data for our dataset
    data: {
        labels: ['Ideation', 'Incubation', 'Growth', 'Scale'],
        
        datasets: [{
            label: 'Innovations',
            backgroundColor: ['rgb(255, 99, 132, 0.8)',
                               'rgb(154, 162, 235, 0.8)',
                               'rgb(255, 206, 86, 0.8)',
                               'rgb(72, 192, 192, 0.8)',
                             ],
            borderColor: 'rgb(255, 0, 0)',
            data: [Ideation, masters, Growth,Scale]
        }]
    },


    // Configuration options go here
    options: {}
});

</script>
</div>