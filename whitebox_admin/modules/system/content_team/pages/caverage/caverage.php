
<style type="text/css">
  
  #header_innovation{
text-transform: uppercase;
text-align: center;
border-bottom: 1px solid #ccc;
border-radius:5px;

  }
  .innovations_headers{
    min-height: 40px;
    box-shadow: 0 0 2px #ccc;
    margin-top:5px;
    background:#fff;
    overflow: hidden;
    max-height: 30px;
    background:#ccc;
    font-weight: bolder;
  }
    .innovations_holder{
    min-height: 40px;
    box-shadow: 0 0 2px #ccc;
    margin-top:5px;
    background:#fff;
    overflow: hidden;
    max-height: 30px;
    cursor: pointer;
  }
  
  
 
  .content_h{

    text-transform: uppercase;
    font-weight: bolder;
    text-align: center;
  }
 
  .even_row{
    background: #e3edf0;
  }
  
  
#filtered_data{
    min-height: 500px;
    max-height: 500px;
    overflow: auto;
    background: #fff;
  }


/* Add Animation */
@-webkit-keyframes animatetop {
  from {top:-300px; opacity:0} 
  to {top:0; opacity:1}
}

@keyframes animatetop {
  from {top:-300px; opacity:0}
  to {top:0; opacity:1}
}

/* The Close Button */



    .marksholders{
      border-right: 1px solid #ccc;
      border-left: 1px solid #ccc;
       min-height: 40px;
       text-align: center;
    }
.marksholdered{
  border-right: 1px solid #000;
      border-left: 1px solid #000;
       min-height: 40px;
       text-align: center;
}
.completed{
    background-repeat: no-repeat !important;
  background-position: center center !important;
  background-size:contain !important;
  background:url('images/tick.jpg');
  
}
.videoplayer{
   background-repeat: no-repeat !important;
  background-position: center center !important;
  background-size:contain !important;
  background:url('images/video.png');
}
</style>
<?php
include "../../../../../connect.php";
$Modulesd = mysqli_query($con,"SELECT * FROM curriculum_units where status='active'");
$Modules = mysqli_num_rows($Modulesd);
//$deleteed=mysqli_query($con,"DELETE FROM exports_tbl") or die(mysqli_error($con));
?>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-12 col-xs-12" id="header_innovation"><h4 id="filter_headers">Module Coverage per Learner <span class="btn theme_bg" id="export_files" style="float: right;"><i class="fa fa-download" ></i> Export</span></h4> </div>  

<div class="col-sm-12 col-xs-12" id="filtered_data">

<div class="col-sm-12 no_padding col-xs-12 innovations_headers">
  <div class="col-xs-2 col-sm-2  content_h overflow_data" ><strong>NAME</strong></div>


  <?php
  for($n=1;$n<=$Modules;$n++){

  ?>
  <div class="col-sm-1  no_padding marksholdered col-xs-1"><strong><?php echo "MODULE $n"?> </strong> </div>
  <?php
}
?>




     <div class="col-sm-1  no_padding marksholdered col-xs-1"><strong>PRACTICAL 1 </strong> </div>
      <div class="col-sm-1  no_padding marksholdered col-xs-1"><strong> </strong> </div>

     <div class="col-sm-1  no_padding marksholdered col-xs-1"><strong>REMARKS </strong> </div>
   
</div>

<div class="col-sm-12 col-xs-12 no_padding" id="pagination_data"> 
<?php
$counter=0;

 $sqlx="SELECT * FROM curriculum_coverage Where id>='2'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
 $name=mysqli_real_escape_string($con,$row['colm_1']);
$Gender=mysqli_real_escape_string($con,$row['colm_2']);
$phone=mysqli_real_escape_string($con,$row['colm_3']);
$email=mysqli_real_escape_string($con,$row['colm_4']);

 $module1=mysqli_real_escape_string($con,$row['colm_5']);
 $module2=mysqli_real_escape_string($con,$row['colm_6']);
 $module3=mysqli_real_escape_string($con,$row['colm_7']);
 $module4=mysqli_real_escape_string($con,$row['colm_8']);
 $module5=mysqli_real_escape_string($con,$row['colm_9']);
 $module6=mysqli_real_escape_string($con,$row['colm_10']);
 $module7=mysqli_real_escape_string($con,$row['colm_11']);
 $practicle=mysqli_real_escape_string($con,$row['colm_13']);

if($practicle){
 $videosource="videoplayer";


$vid="found";
$practicle1="submited";
  }else{
   $videosource="";
   $vid="";
   $practicle1="";
  }

  $counter++;
  if($counter % 2 != 0){ 

?>
<div class="col-sm-12 no_padding col-xs-12 innovations_holder">
 <div class="col-sm-2  col-xs-4" style="text-transform:uppercase;"><?php echo $counter.". ".$name?></div>

<?php

for($a=1;$a<=$Modules;$a++){
if(${'module'.$a}){

$modulepah='completed';
  }else{
    $modulepah='';
  }
?>
 <div class="col-sm-1  no_padding marksholders <?php echo $modulepah?> col-xs-1"> </div>
 <?php

}

 ?>




     <div class="col-sm-1  no_padding marksholders videoaccess <?php echo $videosource?> col-xs-1" id='<?php echo $email?>' role='<?php echo $vid?>'></div>
      <div class="col-sm-1  no_padding marksholders col-xs-1"></div>

       <div class="col-sm-1  no_padding marksholders col-xs-1"> </div>

  
   

</div>


<?php
}else{
  ?>
  <div class="col-sm-12 col-xs-12 even_row no_padding innovations_holder">
 <div class="col-sm-2 col-xs-4" style="text-transform:uppercase;"><?php echo $counter." ".$name?></div>
<?php

for($a=1;$a<=$Modules;$a++){
if(${'module'.$a}){

$modulepah='completed';
  }else{
    $modulepah='';
  }
?>
 <div class="col-sm-1  no_padding marksholders <?php echo $modulepah?> col-xs-1"> </div>
 <?php

}

 ?>


     <div class="col-sm-1  no_padding marksholders videoaccess <?php echo $videosource?> col-xs-1" id='<?php echo $email?>' role='<?php echo $vid?>'></div>
      <div class="col-sm-1  no_padding marksholders col-xs-1"><span class=""></span> </div>

       <div class="col-sm-1  no_padding marksholders col-xs-1"> </div>
   
</div>
<?php
}


}

?>
</div>

</div>


<script type="text/javascript">
  $(document).ready(function(){
    $(".viewtests").click(function(){
      
      var test_id=btoa($(this).attr("id"));
      var unit_id=btoa($(this).attr("role"));

     var my_id=$("#user_email").val();
      $.post("modules/system/content_team/pages/tests/list.php",{test_id:test_id,unit_id:unit_id,my_id:my_id},function(data){
        $("#home").html(data)
      })
    })
    $(".videoaccess").click(function(){
      var user=btoa($(this).attr('id'))
      var role=$(this).attr('role');
      if(role){
      $.post("modules/system/content_team/pages/caverage/play.php",{user:user},function(data){
        $("#home").html(data)
      })
    }else{

      }
    })
    
     $("#export_files").click(function(){
     $.post("modules/system/content_team/pages/caverage/export.php",{},function(data){
        $("#home").html(data)
      })
    })
  })
</script>