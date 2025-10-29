
<style type="text/css">
#mychart{
    min-height:200px;
    border:1px solid #ccc;
}
</style>


<div class="col-sm-12 col-xs-12 no_padding">
  <div class="col-sm-12 col-xs-12 default_header bordered">Modules coverage</div>

<?php
include "../../../../../connect.php";

$module1=0;
$module2=0;
$module3=0;
$module4=0;
$module5=0;
$module6=0;
$module7=0;

$sqlx="SELECT * FROM e_learning_users";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
 $email=mysqli_real_escape_string($con,$row['email']);
 $sqlxp="SELECT * FROM  curriculum_module_coverage where colm_4='$email'";

    $query_runxpz=mysqli_query($con,$sqlxp) or die($query_runxpz."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxpz)){
$colm_5=$row['colm_5'];
$colm_6=$row['colm_6'];
$colm_7=$row['colm_7'];
$colm_8=$row['colm_8'];
$colm_9=$row['colm_9'];
$colm_10=$row['colm_10'];
$colm_11=$row['colm_11'];

if($colm_5){
$module1++;
}else{

}
if($colm_6){
$module2++;
}else{
    
}
if($colm_7){
$module3++;
}else{
    
}
if($colm_8){
$module4++;
}else{
    
}
if($colm_9){
$module5++;
}else{
    
}
if($colm_10){
$module6++;
}else{
    
}
if($colm_11){
$module7++;
}else{
    
}

    }

}


/*
 $sqlx="SELECT * FROM e_learning_users";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
 $user_id=mysqli_real_escape_string($con,$row['id']);


for($a=1;$a<=7;$a++){
  $unit_id=$a;



$sqlxp="SELECT * FROM  curriculum_test where type='feedback' and unit_id='$unit_id'";

    $query_runxpz=mysqli_query($con,$sqlxp) or die($query_runxpz."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxpz)){
$test_id=$row['id'];


    }

$contentb="";
if($a==1){
$checkexams=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE user_id ='$user_id' AND unit_id='$unit_id' and test_id='1'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkexams)>=1){
$contentb="completed";
  }else{

$checkexam=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE user_id ='$user_id' AND unit_id='$unit_id' and test_id='$test_id'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkexam)>=1){

$contentb="completed";

}else{


  }
}
}elseif($a==3){
$checkexams=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE user_id ='$user_id' AND unit_id='$unit_id' and test_id='4'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkexams)>=1){

$contentb="completed";
  }else{

$checkexam=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE user_id ='$user_id' AND unit_id='$unit_id' and test_id='5'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkexam)>=1){

$contentb="completed";

}else{



   $contentb="";
  }
}
}else{
 $checkexams=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE user_id ='$user_id' AND unit_id='$unit_id' and test_id='$test_id'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkexams)>=1){

$contentb="completed";
  }else{
   $contentb="";
  } 
}




    
if($a==1){

    if($contentb){

       $module1++;

   }else{

   }
 
  

}else if($a==2){


if($contentb){
 $module2++;
}else{

}


  }else if($a==3){
    if($contentb){
     $module3++;

  }else{

  }



    }else if($a==4){
if($contentb){
 $module4++;

}else{

}


      }else if($a==5){
        if($contentb){
 $module5++;

}else{

}
        }else if($a==6){
          
          if($contentb){
 $module6++;

}else{

}
          }else if($a==7){
            if($contentb){
 $module7++;

}else{

}

          }else{

          }


}
}
*/
?>
<canvas class="col-sm-12 col-xs-12" id="myChart"></canvas>

<script type="text/javascript">
   $(document).ready(function(){
       var moduleone='<?php echo $module1?>';
       var moduletwo='<?php echo $module2?>';
       var modulethree='<?php echo $module3?>';
       var modulefour='<?php echo $module4?>';
       var modulefive='<?php echo $module5?>';;
       var modulesix='<?php echo $module6?>';;
       var moduleseven='<?php echo $module7?>';;
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['Module One', 'Module Two', 'Module Three', 'Module Four','Module Five','Module Six','Module Seven'],
        datasets: [{
            label: 'Modules Coverage',
            backgroundColor: [/*'rgb(255, 99, 132, 0.8)',
                               'rgb(54, 162, 235, 0.8)',
                               'rgb(255, 206, 86, 0.8)',
                               'rgb(72, 192, 192, 0.8)',
                               'rgb(255, 99, 132, 0.8)',
                               'rgb(54, 162, 235, 0.8)',
                               'rgb(255, 206, 86, 0.8)',*/
                               'rgb(238, 227, 255, 0.01)'
                             ],
            borderColor: 'rgb(255, 99, 132)',
               data: [moduleone, moduletwo, modulethree,modulefour,modulefive,modulesix,moduleseven ]
        }]
    },

    // Configuration options go here
    options: {}
});
});
</script>
</div>