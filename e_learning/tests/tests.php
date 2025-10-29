
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


</style>
<?php
include "../../connect.php";
?>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-12 col-xs-12" id="header_innovation"><h4 id="filter_headers">My tests </h4></div>  

<div class="col-sm-12 col-xs-12" id="filtered_data">

<div class="col-sm-12 no_padding col-xs-12 innovations_headers">
  <div class="col-xs-4 col-sm-7 mobile_hidden content_h overflow_data" ><strong>TEST</strong></div>
  <div class="col-sm-2 mobile_hidden no_padding col-xs-2"><strong>SUBMITTED </strong> </div>
   
  <div class="col-sm-3 col-xs-1"><strong>ACTION </strong> </div>
</div>

<div class="col-sm-12 col-xs-12 no_padding" id="pagination_data">	
<?php
$my_id=mysqli_real_escape_string($con,base64_decode($_POST['my_id']));
//echo $my_id;
$get_elerning=mysqli_query($con,"SELECT * FROM e_learning_users WHERE email='$my_id'") or die(mysqli_error($con));
$geter=mysqli_fetch_assoc($get_elerning);
if($geter){
$users_id=$geter['id'];
}else{
$users_id="";    
}




$test_id="";
$test_ida="";


$sqlx="SELECT * FROM  curriculum_tests_done where user_id ='$users_id'";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
 $test_id=$row['test_id'];
  $unit_id=$row['unit_id'];
$date_added=strtotime($row['date_added']);
  $select_test=mysqli_query($con,"SELECT * FROM curriculum_units WHERE id='$unit_id'") or die(mysqli_error($con));
$test=mysqli_fetch_assoc($select_test);
if($test){
$unit_name=$test['unit_name'];
$description =$test['description'];



}else{ 
  $unit_name="";
$description ="";
}


     $time_d="";
    $curenttime=time();
    $time_difference=$curenttime-$date_added;
    $seconds=$time_difference;
    $minutes=round($seconds/60);//minutes
    $hours=round($seconds/3600);//hours
    $days=round($seconds/86400);//days
    $weeks=round($seconds/604800);//weeks
    $months=round($seconds/2629440);//months
    $years=round($seconds/31553380);//years
    $day=0;



    if($seconds<=60){
        $time_d="Today";
     //$time_d="Just now";
    }else if($minutes<=60){
      if($minutes==1){
            $time_d="Today";
        //$time_d="One minute ago";
      }else{
          $time_d="Today";
       // $time_d="$minutes minutes ago";
      }

    }elseif($hours<=24){

   if($hours==1){
      $time_d="Today";
    //$time_d="An hour ago";
   }else{
     //$time_d="$hours hrs ago";
    $time_d="Today";
   }


    }else if($days<=7){
    if($days==1){
      $time_d="Yesterday";
    }else{
      $time_d="$days days ago";
    }


    }else if($weeks<=4.3){
     if($weeks==1){
      $time_d="A week ago";
     }else{
      $time_d="$weeks weeks ago";
     }

    }else if($months<=12){

      if($months==1){
        $time_d="A month ago";
      }else{

        $time_d="$months months ago";
      }
    }else{
  if($years==1){

    $time_d="A year ago";
  }else{
    $time_d="";
  }

    }



























  $select_test=mysqli_query($con,"SELECT * FROM curriculum_test WHERE id='$unit_id' and unit_id='$unit_id' and test_name='Survey'") or die(mysqli_error($con));
$test=mysqli_fetch_assoc($select_test);
if($test){
$test_name=$test['test_name'];
$test_description =$test['test_description'];



}else{ 
}

//get score
$sqlpok="SELECT * FROM curriculum_test_questions Where unit_id='$unit_id' and test_id='$test_id'";
    $query_runpok=mysqli_query($con,$sqlpok) or die($query_runpok."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runpok)){
           //$unit_field=$row['unit_field'];
           $question =$row['question'];
           $question_id=$row['id'];
           $next_question="";
        $questions= $questions+1;
      
            $get_account=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE user_id ='$users_id' AND unit_id='$unit_id' AND test_id='$test_id' AND question_id='$question_id'") or die(mysqli_error($con));
    $num=mysqli_num_rows($get_account);
    if($num>=1){
$sqlp="SELECT * FROM curriculum_exam_area WHERE user_id ='$users_id' AND unit_id='$unit_id' AND test_id='$role' AND question_id='$question_id'";
    $query_runl=mysqli_query($con,$sqlp) or die($query_runl."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runl)){
        $myoption=$row['answer_id'];
    }

    }else{
$myoption="";
    }



$sql="SELECT * FROM curriculum_test_answers Where test_id='$test_id' and question_id='$question_id'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
        $answer=$row['test_answer'];
        $test_option_name=$row['test_option_name'];
        $option_id=$row['id'];
        $status=$row['status'];
       

if($myoption==$option_id){

if($status=='Correct'){
  $corectanswers=$corectanswers+1;

}else{

}
}
}


}
$correct_answers=$corectanswers."/".$questions;
//echo $correct_answers;
//end of score





  $counter=$counter+1;
  if($counter % 2 != 0){ 

?>
<div class="col-sm-12 no_padding col-xs-12 innovations_holder">
 <div class="col-sm-7 col-xs-10"><?php echo $counter." ".$test_name.".  ".$unit_name?></div>

  <div class="col-sm-2 mobile_hidden no_padding col-xs-2"><strong><?php echo $time_d?> </strong> </div>
  <div class="col-sm-3 col-xs-2"><span class="btn viewtests" id="<?php echo $test_id?>" role="<?php echo $unit_id?>"> View</span></div>
   

</div>


<?php
}else{
  ?>
  <div class="col-sm-12 col-xs-12 even_row no_padding innovations_holder">
 <div class="col-sm-7 col-xs-10"><?php echo $counter." ".$test_name.".  ".$unit_name?></div>

  <div class="col-sm-2 mobile_hidden no_padding col-xs-2"><strong><?php echo $time_d?> </strong> </div>
  <div class="col-sm-3 col-xs-2"><span class="btn viewtests" id="<?php echo $test_id?>" role="<?php echo $unit_id?>"> View</span></div>
   
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
      $.post("e_learning/tests/view.php",{test_id:test_id,unit_id:unit_id,my_id:my_id},function(data){
        $("#learning_area").html(data)
      })
    })
  })
</script>