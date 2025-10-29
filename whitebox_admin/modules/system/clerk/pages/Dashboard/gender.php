
<style type="text/css">
#mychart{
    min-height:200px;
    border:1px solid #ccc;
}
</style>


<div class="col-sm-12 col-xs-12 no_padding">
	<div class="col-sm-12 col-xs-12 default_header bordered">Innovations By Gender</div>

<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$data_status="pending";

    $male=0;
    $female=0;
$sqlxe="SELECT * FROM innovations_table Where status!='$data_status'";
$query_runxe=mysqli_query($con,$sqlxe) or die($query_runxe."<br/><br/>".mysqli_error($con));
    while($row=mysqli_fetch_array($query_runxe)){
      $user_id=$row['user_id'];
 
 $sqlx="SELECT * FROM users where id='$user_id'";

    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){

   $Genderd=$row['gender'];
   if($Genderd=="female"){
     
    $female=$female+1;
      
   }else{
     $male=$male+1;  
   }
    }
    
 
 
 
 
 
    }
    $sqlxe="SELECT * FROM basic_informations";
$query_runxe=mysqli_query($con,$sqlxe) or die($query_runxe."<br/><br/>".mysqli_error($con));
    while($row=mysqli_fetch_array($query_runxe)){
      $user_id=$row['user_id'];
 
 $sqlx="SELECT * FROM users where id='$user_id'";

    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){

   $Genderd=$row['gender'];
   if($Genderd=="female"){
     
    $female=$female+1;
      
   }else{
     $male=$male+1;  
   }
    }
    
 
 
 
 
 
    }
?>
<canvas class="col-sm-12 col-xs-12" id="genders"></canvas>

<script type="text/javascript">
   
var ctxd = document.getElementById('genders').getContext('2d');
var male='<?php echo $male?>';
 var female='<?php echo $female?>';
var chartd = new Chart(ctxd, {
    // The type of chart we want to create
    type: 'doughnut',

    // The data for our dataset
    data: {
        labels: ['Male', 'Female'],
        datasets: [{
            label: 'Innovations By Gender',
            backgroundColor: ['rgb(54, 162, 235, 0.8)',
                               'rgb(255, 99, 132, 0.8)'
                             ],
            borderColor: 'rgb(255, 99, 132)',
            data: [male, female]
        }]
    },

    // Configuration options go here
    options: {}
});

</script>
</div>