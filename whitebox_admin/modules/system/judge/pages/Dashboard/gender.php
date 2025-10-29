



<style type="text/css">
#mychart{
    min-height:200px;
    border:1px solid #ccc;
}
</style>


<div class="col-sm-12 col-xs-12 no_padding">
	<div class="col-sm-12 col-xs-12 default_header bordered">Practicals submited by gender</div>

<?php
include "../../../../../connect.php";
$male=0;
$female=0;
$sqlx="SELECT * FROM e_learning_users where status='active'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
 $user_id=mysqli_real_escape_string($con,$row['id']);
 $name=mysqli_real_escape_string($con,$row['first_name'])." ".mysqli_real_escape_string($con,$row['Last_name']);
$Gender=mysqli_real_escape_string($con,$row['Gender']);
$phone=mysqli_real_escape_string($con,$row['phone']);
$email=mysqli_real_escape_string($con,$row['email']);
$not_scored="";
 
$checkprct=mysqli_query($con,"SELECT * FROM curriculum_practicles WHERE email='$email'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkprct)>0){
  	if($Gender){
$female++;
  	}else{
$male++;
  	}

  }else{

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