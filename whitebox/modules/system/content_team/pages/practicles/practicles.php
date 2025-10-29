
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
  .content_ino{
    min-height: 10px;
    box-shadow: 0 0 2px #ccc;
  }
  .header_innov{
    min-height: 10px;
    box-shadow: 0 0 2px #ccc;
  }
  .in_headers{
    text-transform: uppercase;
    border-bottom: 1px solid #ccc;
  }
  .content_h{

    text-transform: uppercase;
    font-weight: bolder;
    text-align: center;
  }
  .innovation_attachements{
    min-height: 180px;
    background-size: cover !important;
    background-repeat: no-repeat !important;
    background-position: center !important;

  }
  .even_row{
    background: #e3edf0;
  }
  .viewed{
background: #ccc;
  }
  .veiw_evaluate{
    cursor: pointer;
  }
 
#filtered_data{
    min-height: 500px;
    max-height: 500px;
    overflow: auto;
    background: #fff;
  }
 /* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
   border-radius:10px;
  position: relative;
  background-color: #fefefe;
  margin: auto;
  padding: 0;
  border: 1px solid #888;
  width: 40%;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
  -webkit-animation-name: animatetop;
  -webkit-animation-duration: 0.4s;
  animation-name: animatetop;
  animation-duration: 0.4s
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
.close {
  color: #000;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

.modal-header {
 text-align:center;
 border-radius:10px 10px 0px 0px;
  padding: 2px 16px;
  color:#000;
}

.modal-body {
    text-align:center;
    padding: 2px 16px;}
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

$deleteed=mysqli_query($con,"DELETE FROM exports_tbl") or die(mysqli_error($con));
?>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-12 col-xs-12" id="header_innovation"><h4 id="filter_headers">Module Coverage per Learner with Pitch Videos <span class="btn theme_bg" id="export_files" style="float: right;"><i class="fa fa-download" ></i> Export</span></h4></div>  

<div class="col-sm-12 col-xs-12" id="filtered_data">

<div class="col-sm-12 no_padding col-xs-12 innovations_headers">
  <div class="col-xs-2 col-sm-2  content_h overflow_data" ><strong>NAME</strong></div>
  <div class="col-sm-1  no_padding marksholdered col-xs-1"><strong>MODULE 1 </strong> </div>
   <div class="col-sm-1  no_padding marksholdered col-xs-1"><strong>MODULE 2 </strong> </div>
    <div class="col-sm-1  no_padding marksholdered col-xs-1"><strong>MODULE 3 </strong> </div>
     <div class="col-sm-1  no_padding marksholdered col-xs-1"><strong>MODULE 4 </strong> </div>

    <div class="col-sm-1  no_padding marksholdered col-xs-1"><strong>MODULE 5 </strong> </div>
     <div class="col-sm-1  no_padding marksholdered col-xs-1"><strong>MODULE 6 </strong> </div>

     <div class="col-sm-1  no_padding marksholdered col-xs-1"><strong>MODULE 7 </strong> </div>
     <div class="col-sm-1  no_padding marksholdered col-xs-1"><strong>PRACTICAL 1 </strong> </div>
      <div class="col-sm-1  no_padding marksholdered col-xs-1"><strong> </strong> </div>

     <div class="col-sm-1  no_padding marksholdered col-xs-1"><strong>REMARKS </strong> </div>
   
</div>

<div class="col-sm-12 col-xs-12 no_padding" id="pagination_data">	
<?php
$counter=0;
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
    
$videosource="videoplayer";
//$videosource="<i class='fa fa-television fa-3x' style='text-align:center'><i class='fa fa-youtube-play fa-1x'></i></i>";
$vid="found";
$module1="";
$module2="";
$module3="";
$module4="";
$module5="";
$module6="";
$module7="";
 $practicle1="submited";
  $counter=$counter+1;
  if($counter % 2 != 0){ 

?>
<div class="col-sm-12 no_padding col-xs-12 innovations_holder">
 <div class="col-sm-2  col-xs-4" style="text-transform:uppercase;"><?php echo $counter.". ".$name?></div>

<?php

for($a=1;$a<=7;$a++){
	$unit_id=$a;



$sqlxp="SELECT * FROM  curriculum_test where type='feedback' and unit_id='$unit_id'";

    $query_runxpz=mysqli_query($con,$sqlxp) or die($query_runxpz."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxpz)){
$test_id=$row['id'];


    }

$contentb="";
    $checkexams=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE test_remarks='completed' and user_id ='$user_id' AND unit_id='$unit_id' and test_id='$test_id'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkexams)>=4){

$contentb="completed";
  }else{
   $contentb="";
  }
if($a==1){
  $module1=$contentb;

}else if($a==2){
  $module2=$contentb;
  $module1=$contentb;

  }else if($a==3){
    $module1=$contentb;
    $module2=$contentb;
    $module3=$contentb;
    }else if($a==4){
      $module2=$contentb;
      $module1=$contentb;
      $module4=$contentb;
      $module3=$contentb;
      }else if($a==5){
        $module5=$contentb;
        }else if($a==6){
          $module6=$contentb;
          }else if($a==7){
            $module7=$contentb;

          }else{

          }




?>

 <div class="col-sm-1  no_padding marksholders <?php echo $contentb?> col-xs-1"> </div>
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

for($a=1;$a<=7;$a++){
	$unit_id=$a;



$sqlxp="SELECT * FROM  curriculum_test where type='feedback' and unit_id='$unit_id'";

    $query_runxpz=mysqli_query($con,$sqlxp) or die($query_runxpz."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxpz)){
$test_id=$row['id'];


    }

$contentb="";
    $checkexams=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE test_remarks='completed' and user_id ='$user_id' AND unit_id='$unit_id' and test_id='$test_id'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkexams)>=4){

$contentb="completed";
  }else{
   $contentb="";
  }

if($a==1){
  $module1=$contentb;

}else if($a==2){
  $module2=$contentb;
  $module1=$contentb;

  }else if($a==3){
    $module1=$contentb;
    $module2=$contentb;
    $module3=$contentb;
    }else if($a==4){
      $module2=$contentb;
      $module1=$contentb;
      $module4=$contentb;
      $module3=$contentb;
      }else if($a==5){
        $module5=$contentb;
        }else if($a==6){
          $module6=$contentb;
          }else if($a==7){
            $module7=$contentb;

          }else{

          }




?>

 <div class="col-sm-1  no_padding marksholders <?php echo $contentb?> col-xs-1"> </div>
<?php

}

 
?>




     <div class="col-sm-1  no_padding marksholders videoaccess <?php echo $videosource?> col-xs-1" id='<?php echo $email?>' role='<?php echo $vid?>'></div>
      <div class="col-sm-1  no_padding marksholders col-xs-1"><span class=""></span> </div>

       <div class="col-sm-1  no_padding marksholders col-xs-1"> </div>
   
</div>
<?php
}

 $addlist=mysqli_query($con,"INSERT INTO exports_tbl VALUES(
                          NULL,
                          '$name',
                          '$Gender',
                          '$phone',
                          '$email',
                          '$module1',
                          '$module2',
                          '$module3',
                          '$module4',
                          '$module5',
                          '$module6',
                          '$module7',
                          '',
                          '$practicle1',
                          '',
                          '',
                          '',
                          '',
                          '',
                          '',
                          '')");



 }else{
   $videosource="";
   $vid="";
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