<style>
    .faqs_holders{
        margin-top:4px;
        min-height:205px !important;
    }
    .holding_faqs{
      margin-top:10px;
    }
    .faq_headers{
        font-weight:bolder;
        border-bottom:1px solid #000;
    }
    #apendix{
        margin-top:5px;
        background:url('images/apendix.PNG');
        background-repeat:no-repeat;
        background-size:contain;
        background-position:center center;
        min-height:800px;
    }
    #apendixed{
        background:url('images/apendix.PNG');
        background-repeat:no-repeat;
        background-size:100% 100%;
        background-position:center center;
        min-height:800px; 
    }
</style>
<div class="col-sm-12 col-xs-12 default_header" >
    
    FREQUENTLY ASKED QUESTIONS
</div>
<div class="col-sm-12 col-xs-12 no_padding">
<?php
include "../../../connect.php";
include("../../functions/security.php");
$all_questions=0;
 $sqlx="SELECT * FROM chart_results WHERE category!='greetings' and category!='endings' ORDER BY times_asked DESC";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
        $all_questions=$all_questions+1;
    }
    $offsets=ceil($all_questions/2)-1;
    $new_offset=$offsets+1;
    ?>
    
<div class="col-sm-6 col-xs-12 faqs_holders" >
    <?php

  $sqlx="SELECT * FROM chart_results WHERE category!='greetings' and category!='endings' ORDER BY times_asked DESC LIMIT 0,$offsets";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
$questions =$row['questions'];
$answer=$row['Answer'];
?>
    <div class="col-sm-12 col-xs-12 holding_faqs">
      <div class="col-sm-2 col-xs-3">Question:</div>
      <div class="col-sm-10 no_padding col-xs-9 faq_headers">
        <?php echo $questions?>
        </div>
    </div>
    <div class="col-sm-12 col-xs-12">
        <div class="col-sm-12 no_padding col-xs-12 ">
      <div class="col-sm-2 col-xs-3">Answer:</div>
      <div class="col-sm-10 no_padding col-xs-9 ">
       <?php echo $answer?> 
        </div>
        </div>
    </div>
    


<?php


}

?>
</div>
<div class="col-sm-6 col-xs-12 faqs_holders" >
    <?php
  $sqlx="SELECT * FROM chart_results WHERE category!='greetings' and category!='endings' ORDER BY times_asked DESC LIMIT $new_offset,$all_questions";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
$questions =$row['questions'];
$answer=$row['Answer'];
?>
    <div class="col-sm-12 col-xs-12 holding_faqs ">
      <div class="col-sm-2 col-xs-3">Question:</div>
      <div class="col-sm-10 no_padding col-xs-9 faq_headers">
        <?php echo $questions?>
        </div>
    </div>
    <div class="col-sm-12 col-xs-12">
        <div class="col-sm-12 no_padding col-xs-12 ">
      <div class="col-sm-2 col-xs-3">Answer:</div>
      <div class="col-sm-10 no_padding col-xs-9 ">
       <?php echo $answer?> 
        </div>
        </div>
    </div>
    


<?php


}

?>
</div>
</div>
<div class="col-sm-12 col-xs-12 default_header" style="margin-top:5px">
    &nbsp;
</div>