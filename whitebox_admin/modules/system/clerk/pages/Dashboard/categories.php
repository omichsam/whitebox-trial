
<style type="text/css">
#mychart{
    min-height:200px;
    border:1px solid #ccc;
}
</style>


<div class="col-sm-12 col-xs-12 no_padding">
	<div class="col-sm-12 col-xs-12 default_header bordered">Innovations By Big 4 Agenda </div>

<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";

$data_status="pending";
    $Housing=0;
    $Food_Security=0;
    $Healthcare=0;
    $Manufacturing=0;
    $others=0;
$sqlx="SELECT * FROM innovations_table Where status!='$data_status'";
$query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error());
    while($row=mysqli_fetch_array($query_runx)){
      $InnovationBig4Sector=$row['InnovationBig4Sector'];
      //echo $InnovationBig4Sector;
   // $Status="disapproved";
   if($InnovationBig4Sector=="1"){
     $Healthcare=$Healthcare+1;  
   }else if($InnovationBig4Sector=="2"){
       $Housing=$Housing+1;
   }else if($InnovationBig4Sector=="3"){
   $Food_Security=$Food_Security+1;
   }else if($InnovationBig4Sector=="4"){
   $Manufacturing=$Manufacturing+1;
   }else if($InnovationBig4Sector=="5"){
 $others=$others+1;
   }else{

   }
    }

    $sqlx="SELECT * FROM basic_informations";
$query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error());
    while($row=mysqli_fetch_array($query_runx)){
      $InnovationBig4Sector=$row['InnovationBig4Sector'];
      //echo $InnovationBig4Sector;
   // $Status="disapproved";
   if($InnovationBig4Sector=="Universal and Affordable Healthcare"){
     $Healthcare=$Healthcare+1;  
   }else if($InnovationBig4Sector=="Affordable Housing"){
       $Housing=$Housing+1;
   }else if($InnovationBig4Sector=="Food Security"){
   $Food_Security=$Food_Security+1;
   }else if($InnovationBig4Sector=="Manufacturing"){
   $Manufacturing=$Manufacturing+1;
   }else if($InnovationBig4Sector=="Other"){
 $others=$others+1;
   }else{

   }
    }

?>
<canvas class="col-sm-12 col-xs-12" id="categoryse"></canvas>

<script type="text/javascript">
   $(document).ready(function(){
   // alert()
   
    var housing='<?php echo $Housing ?>';

    var Healthcare='<?php echo $Healthcare ?>';
    var Food_Security='<?php echo $Food_Security ?>';
    var Manufacturing='<?php echo $Manufacturing ?>';
    var others='<?php echo $others ?>';
var ctxrt = document.getElementById('categoryse').getContext('2d');
var chartdd = new Chart(ctxrt, {
    // The type of chart we want to create
    type: 'pie',

    // The data for our dataset
    data: {
        labels: ['Universal Healthcare', 'Affordable Housing','Food Security','Manufacturing','Other'],
        datasets: [{
            label: 'Innovations By Big 4 agenda',
            backgroundColor: ['rgb(54, 162, 235, 0.8)',
                               'rgb(34, 84, 40, 0.8)',
                               'rgb(255, 206, 86, 0.8)',
                               'rgb(255, 0, 0, 0.8)'
                             ],
            borderColor: 'rgb(255, 99, 132)',
            data: [Healthcare, housing,Food_Security,Manufacturing,others]
        }]
    },

    // Configuration options go here
    options: {}
});
});
</script>
</div>