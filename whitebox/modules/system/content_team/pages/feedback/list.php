
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
include "../../../../../connect.php";
$unit_id=mysqli_real_escape_string($con,base64_decode($_POST['unit_id']));
$test_id=mysqli_real_escape_string($con,base64_decode($_POST['test_id']));


$deleteed=mysqli_query($con,"DELETE FROM exports_tbl") or die(mysqli_error($con));

  $select_test=mysqli_query($con,"SELECT * FROM curriculum_test WHERE id='$test_id' and unit_id='$unit_id'") or die(mysqli_error($con));
$test=mysqli_fetch_assoc($select_test);
if($test){
$test_name=$test['test_name'];
$test_description =$test['test_description'];



}else{ 
}
?>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-12 col-xs-12" id="header_innovation"><h4 id="filter_headers">Feedback Recieved--> <?php echo "unit:".$unit_id?></h4></div>  

<div class="col-sm-12 col-xs-12" id="filtered_data">

<div class="col-sm-12 no_padding col-xs-12 innovations_headers">
  <div class="col-xs-10 col-sm-9 mobile_hidden content_h overflow_data" ><strong>NAME</strong></div>
   
  <div class="col-sm-3 col-xs-2"><strong>ACTION </strong> <span style="float:right;" class="btn theme_bg" id="export_feed"><i class="fa fa-download"></i> Export</span></div>
</div>

<div class="col-sm-12 col-xs-12 no_padding" id="pagination_data">	
<?php
$counter=0;

$sqlx="SELECT * FROM e_learning_users where status='active'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
 $userid=$row['id'];
$name=$row['first_name']." ".$row['Last_name'];
$Gender=$row['Gender'];
$phone=$row['phone'];
$email=$row['email'];

$questionb1="";
$questionb2="";
$questionb3="";
$questionb4="";
$questions=0;
  //echo $my_pass;
$checkExist=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE unit_id='$unit_id' and test_id='$test_id' and user_id='$userid'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)!=0){

    $sqlpok="SELECT * FROM curriculum_test_questions Where unit_id='$unit_id' and test_id='$test_id'";
    $query_runpok=mysqli_query($con,$sqlpok) or die($query_runpok."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runpok)){
           //$unit_field=$row['unit_field'];
           $question =$row['question'];
           $question_id=$row['id'];
           $next_question="";
        $questions= $questions+1;
     // echo $question_id;
            
$sqlp="SELECT * FROM curriculum_exam_area WHERE user_id ='$userid' AND question_id='$question_id' and unit_id='$unit_id'";
    $query_runl=mysqli_query($con,$sqlp) or die($query_runl."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runl)){
      if($questions==1){
        $questionb1=$row['answer_id'];

      }elseif($questions==2){
$questionb2=$row['answer_id'];
      }elseif($questions==3){
        $questionb3=$row['answer_id'];

          }elseif($questions==4){
            $questionb4=$row['answer_id'];


          }else{

          }


}
}
   

   $addlist=mysqli_query($con,"INSERT INTO exports_tbl VALUES(
                          NULL,
                          '$name',
                          '$Gender',
                          '$phone',
                          '$email',
                          '$questionb1',
                          '$questionb2',
                          '$questionb3',
                          '$questionb4',
                          '',
                          '',
                          '',
                          '',
                          '',
                          '',
                          '',
                          '',
                          '',
                          '',
                          '',
                          '')");



//$time_d="user";




//if($myoption){
$counter++;

  if($counter % 2 != 0){ 

?>
<div class="col-sm-12 <?php echo $myoption?> no_padding col-xs-12 innovations_holder">
 <div class="col-sm-9 col-xs-10"><?php echo $counter.". ".$name?></div>

  <div class="col-sm-3 col-xs-2"><span class="btn viewtests" title="<?php echo $userid?>" id="<?php echo $test_id?>" role="<?php echo $unit_id?>"> View</span></div>
   

</div>


<?php
}else{
  ?>
  <div class="col-sm-12 col-xs-12 <?php echo $myoption?>  even_row no_padding innovations_holder">
 <div class="col-sm-9 col-xs-10"><?php echo $counter.". ".$name?></div>

  <div class="col-sm-3 col-xs-2"><span class="btn viewtests" title="<?php echo $userid?>" id="<?php echo $test_id?>" role="<?php echo $unit_id?>"> View</span></div>
   
   
</div>
<?php
}

}else{
  
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

     var my_id=btoa($(this).attr('title'));
      $.post("modules/system/content_team/pages/feedback/view.php",{test_id:test_id,unit_id:unit_id,my_id:my_id},function(data){
        $("#home").html(data)
      })

    })
    $("#export_feed").click(function(){
      var test_id=btoa('<?php echo $test_id?>');
      var unit_id=btoa('<?php echo $unit_id?>');
     $.post("modules/system/content_team/pages/feedback/export.php",{test_id:test_id,unit_id:unit_id},function(data){
        $("#home").html(data)
      })
    })
  })
</script>