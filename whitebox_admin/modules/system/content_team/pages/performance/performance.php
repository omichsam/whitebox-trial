
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

</style>
<?php
include "../../../../../connect.php";
?>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-12 col-xs-12" id="header_innovation"><h4 id="filter_headers">PERFOMANCE</h4></div>  

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
     <div class="col-sm-1  no_padding marksholdered col-xs-1"><strong>TOTAL </strong> </div>
      <div class="col-sm-1  no_padding marksholdered col-xs-1"><strong>PERCENTAGE </strong> </div>

     <div class="col-sm-1  no_padding marksholdered col-xs-1"><strong>REMARKS </strong> </div>
   
</div>

<div class="col-sm-12 col-xs-12 no_padding" id="pagination_data">	
<?php

 $sqlx="SELECT * FROM e_learning_users where status='active'";
 $scored=0;
$total_scores=0;
$total_questions=0;

 //$sqlx="SELECT * FROM innovations_table";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
 $user_id=$row['id'];
 $name=$row['first_name']." ".$row['Last_name'];
$Gender=$row['Gender'];
$phone=$row['phone'];
$email=$row['email'];
$not_scored="";
  $select_test=mysqli_query($con,"SELECT * FROM curriculum_units WHERE id='$unit_id'") or die(mysqli_error($con));
$test=mysqli_fetch_assoc($select_test);
if($test){
$unit_name=$test['unit_name'];
$description =$test['description'];



}else{ 
  $unit_name="";
$description ="";
}




$tests = mysqli_query($con,"SELECT * FROM curriculum_tests_done WHERE unit_id='$unit_id' and test_id='$test_id'");
$testdone = mysqli_num_rows($tests);





  $counter=$counter+1;
  if($counter % 2 != 0){ 

?>
<div class="col-sm-12 no_padding col-xs-12 innovations_holder">
 <div class="col-sm-2  col-xs-4" style="text-transform:uppercase;"><?php echo $counter.". ".$name?></div>

<?php
$scored=0;
$total_scores=0;
$total_questions=0;
for($a=1;$a<=7;$a++){
	$unit_id=$a;


$questions="";
$test_id="";
$test="";

$marks="";
$getresuslts=mysqli_query($con,"SELECT * FROM  curriculum_tests_done WHERE unit_id='$unit_id' and user_id='$user_id'") or die(mysqli_error($con));
$getusertest=mysqli_fetch_assoc($getresuslts);
if($getusertest){

	$marks=$getusertest['test_score'];
	$total_scores=$total_scores+$marks;
	$questions=$getusertest['questions'];
	$testresults=$marks."/".$questions;
	$total_questions=$total_questions+$questions;
	


}else{

}

if($marks>=0 && $questions>0){
$testresults=$marks."/".$questions;
}else{
$testresults="";
}


if($total_scores){
$scored=number_format($total_scores/$total_questions*100,1);
$not_scored=$scored."%";
}else{
$not_scored="";
}


?>

 <div class="col-sm-1  no_padding marksholders col-xs-1"> <?php echo $testresults?></div>
<?php

}

?>




     <div class="col-sm-1  no_padding marksholders col-xs-1"> <?php echo $total_scores."/".$total_questions?></div>
      <div class="col-sm-1  no_padding marksholders col-xs-1"><?php echo $not_scored?> </div>

       <div class="col-sm-1  no_padding marksholders col-xs-1"> </div>

  
   

</div>


<?php
}else{
  ?>
  <div class="col-sm-12 col-xs-12 even_row no_padding innovations_holder">
 <div class="col-sm-2 col-xs-4" style="text-transform:uppercase;"><?php echo $counter." ".$name?></div>
<?php
$scored=0;
$total_scores=0;
$total_questions=0;
for($a=1;$a<=7;$a++){
	$unit_id=$a;


$questions="";
$test_id="";
$test="";

$marks="";
$getresuslts=mysqli_query($con,"SELECT * FROM  curriculum_tests_done WHERE unit_id='$unit_id' and user_id='$user_id'") or die(mysqli_error($con));
$getusertest=mysqli_fetch_assoc($getresuslts);
if($getusertest){

	$marks=$getusertest['test_score'];
	$total_scores=$total_scores+$marks;
	$questions=$getusertest['questions'];
	$testresults=$marks."/".$questions;
	$total_questions=$total_questions+$questions;
	


}else{

}

if($marks){
$testresults=$marks."/".$questions;
}else{
$testresults="";
}


if($total_scores){
$scored=number_format($total_scores/$total_questions*100,1);
$not_scored=$scored."%";
}else{
$not_scored="";
}


?>

 <div class="col-sm-1  no_padding marksholders col-xs-1"> <?php echo $testresults?></div>
<?php

}

?>




     <div class="col-sm-1  no_padding marksholders col-xs-1"> <?php echo $total_scores."/".$total_questions?></div>
      <div class="col-sm-1  no_padding marksholders col-xs-1"><span class=""><?php echo $not_scored?></span> </div>

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
  })
</script>