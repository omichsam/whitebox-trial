
<style type="text/css">
#mychart{
    min-height:200px;
    border:1px solid #ccc;
}
</style>


<div class="col-sm-12 col-xs-12 no_padding">
	<div class="col-sm-12 col-xs-12 default_header bordered">Innovations By Education Level</div>

<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$data_status="pending";

    $phd=0;
    $masters=0;
    $bachelors=0;
    $diploma=0;
    $certificate=0;
    $higher_diploma=0;
    $primary=0;
    $other=0;
    $counter=0;
$sqlxe="SELECT * FROM innovations_table Where status!='$data_status'";
$query_runxe=mysqli_query($con,$sqlxe) or die($query_runxe."<br/><br/>".mysqli_error($con));
    while($row=mysqli_fetch_array($query_runxe)){
      $user_id=$row['user_id'];



      $get_bigfoursectors=mysqli_query($con,"SELECT * FROM education where user_id='$user_id'") or die(mysqli_error($con));
$getbigid=mysqli_fetch_assoc($get_bigfoursectors);
if($getbigid){
 $education_level=$getbigid['EducationLevel_id'];
}else{

}
//$counter= $counter+1;
   if($education_level=="1"){
    $phd=$phd+1;
   }else if($education_level=="2"){
    $masters=$masters+1;
   }else if($education_level=="3"){
    $bachelors=$bachelors+1;
   }else if($education_level=="5"){
    $diploma=$diploma+1;
   }else if($education_level=="6"){
    $certificate=$certificate+1;
   }else if($education_level=="4"){
    $higher_diploma=$higher_diploma+1;
   }else{
    $other=$other+1;
   // echo $other;
   }
   
    
 
    }
    $sqlxe="SELECT * FROM basic_informations";
$query_runxe=mysqli_query($con,$sqlxe) or die($query_runxe."<br/><br/>".mysqli_error($con));
    while($row=mysqli_fetch_array($query_runxe)){
      $user_id=$row['user_id'];



      $get_bigfoursectors=mysqli_query($con,"SELECT * FROM education where user_id='$user_id'") or die(mysqli_error($con));
$getbigid=mysqli_fetch_assoc($get_bigfoursectors);
if($getbigid){
 $education_level=$getbigid['EducationLevel_id'];
}else{

}
//$counter= $counter+1;
   if($education_level=="1"){
    $phd=$phd+1;
   }else if($education_level=="2"){
    $masters=$masters+1;
   }else if($education_level=="3"){
    $bachelors=$bachelors+1;
   }else if($education_level=="5"){
    $diploma=$diploma+1;
   }else if($education_level=="6"){
    $certificate=$certificate+1;
   }else if($education_level=="4"){
    $higher_diploma=$higher_diploma+1;
   }else{
    $other=$other+1;
   // echo $other;
   }
   
    
 
    }
?>
<canvas class="col-sm-12 col-xs-12" id="educationnal"></canvas>

<script type="text/javascript">
var ctxft = document.getElementById('educationnal').getContext('2d');
     var phd ='<?php echo $phd?>';
    var masters ='<?php echo $masters?>';
    var bachelors ='<?php echo $bachelors?>';
    var diploma ='<?php echo $diploma?>';
    var certificate ='<?php echo $certificate?>';
    var higher_diploma ='<?php echo $higher_diploma?>';
    var primary ='<?php echo $primary?>';
    var other ='<?php echo $other?>';
  //  var counter='<?php echo $counter?>';
   // alert(counter)
var chartft = new Chart(ctxft, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['Phd', 'Masters', 'Bachelors', 'Postgraduate diploma','Ordinary diploma','Certificate','Others'],
        
        datasets: [{
            label: 'Innovations',
            backgroundColor: [/*'rgb(255, 99, 132, 0.8)',
                               'rgb(54, 162, 235, 0.8)',
                               'rgb(255, 206, 86, 0.8)',
                               'rgb(72, 192, 192, 0.8)',
                               'rgb(255, 99, 132, 0.8)',
                               'rgb(54, 162, 235, 0.8)',
                               'rgb(255, 206, 86, 0.8)',*/
                               'rgb(238, 227, 255, 0.01)'
                             ],
            borderColor: 'rgb(255, 0, 0)',
            data: [phd, masters, bachelors,higher_diploma, diploma,certificate,other]
        }]
    },


    // Configuration options go here
    options: {}
});

</script>
</div>