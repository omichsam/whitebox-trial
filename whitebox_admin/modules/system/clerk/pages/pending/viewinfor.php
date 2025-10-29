<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
 //session_start();
 // $loginuser=base64_decode($_SESSION["username"]);

//echo $loginuser;
//echo "<script type='text/javascript'>alert('$loginuser');</script>";
?>
<style type="text/css">
  .holder_otwo{
    min-height: 100px;
    border-top: 2px solid #ccc;
  }
  #holder_one{
    min-height: 100px;
  }
  #bb_holders{
    min-height: 40px;
    border-right: 2px solid #ccc;
    margin-bottom: 5px;
  }
  .theme_bg{
    background:#418bca;
    color:#fff;
  }
   #feedback_disp{
    min-height: 400px;
    box-shadow: 0 0 2px #ccc;
    border-radius:4px;
    background:#fff;

  }
  #header_innovation{
text-transform: uppercase;
text-align: center;
border-bottom: 1px solid #ccc;
border-radius:5px;

  }
  .innovations_holder{
    min-height: 40px;
    box-shadow: 0 0 2px #ccc;
    margin-top:5px;
    background:#fff;
    overflow: hidden;
    max-height: 40px;
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
  .view_process{
    cursor: pointer;
  }
 
#filtered_dd{

    min-height: 500px;
    background: #fff;
    margin-bottom: 20px;
  }
  .upper_display{
    min-height: 94px;
  }
  #reportcontrols{
  height: 50px;
  color: #000;
  cursor: pointer;
  margin-top: 5px;
}
.feedback_dives{
  min-height: 200px;
  box-shadow: 0 0 2px #ccc;
  margin-top:5px;
  padding-bottom: 10px;
}
.top_fb{
  min-height: 20px;
}
.qustion_holder{
  font-weight: bolder;
  text-align: center;
}
.coment_hold{
  color: #e7663c;
}
.intro_head{
  border-bottom: 2px solid #ccc;
  border-radius: 5px;
}
.reply_areas{
        border: 1px solid #ccc;
    resize: none;
    min-height: 80px;
    background: #edf1f5;
    margin-top: 4px;
  }
  .reply_discuss{
    margin-top: 10px;
    font-weight: bolder;
background: #e6b234;
  }
  .data_sends{
    margin-top: 10px;
  }
  #datasendserrordddddd{
    margin-top: 5px;
    margin-bottom: 10px;
    text-align: center;
  }
   .table_rowers{
    min-width: 40px;
  }
  #head_fgt{
      text-transform:uppercase;
      text-align:center;
      font-weight:bolder;
  }
  #innovation_fedheader{
      text-align:center;
      font-size:18px;
      font-weight:bolder;
      text-transform:uppercase;
  }
    .reports_body{
     min-height: 450px;
     box-shadow: 0 0 3px #ccc;
     background-color: #fff;
  }
  .holder_otwo{
    min-height: 100px;
    border-top: 2px solid #ccc;
  }
  #holder_one{
    min-height: 100px;
  }
  .innovations_load{
    min-height: 200px;
    margin-top: 5px;
    max-height: 200px;
    overflow: auto;

  }
  #report_display{
    min-height: 100px;
    box-shadow: 0 0 3px #ccc;
    margin-top: 5px;
  }
  .innovations_bn{
    min-height: 20px;
    cursor: pointer;
    background-color: #ccc;
    margin-top: 3px;
  }
  .reports_dd{
    border: 1px solid #ccc;
    resize: none;
    min-height: 150px;
    margin-top: 5px;
    margin-bottom: 5px;
    background-color: #faf7fd;
  }
  .evaluate_btns{
    margin-top: 10px;
  }
  .innoheaders{
    border-bottom: 2px solid #cccc;
    border-radius: 15px;
  }
  .innovations_load{
    margin-bottom: 5px;
    min-height: 200px;
    box-shadow: 0 0 3px #ccc;
  }
  #holder_one{
    min-height: 100px;
    margin-bottom: 10px;
    border-bottom: 2px solid #ccc;

  }
  #bb_holders{
    min-height: 40px;
    border-right: 2px solid #ccc;
    margin-bottom: 5px;
  }
  #error_reporter{
    text-align: center;
  }
  #container_report{
    margin-top: 20px;
  }
  .rep_headres{
    text-transform: capitalize;
    font-weight: bolder;
    margin-top: 6px;
  }
</style>

<div class="col-sm-12 col-xs-12">
  <div class="col-sm-12 col-xs-12 default_header" id="head_fgt">Feedback</div>
  <div class="col-sm-12 col-xs-12" id="feedback_disp">

<?php

$innovation=base64_decode($_POST['innovation']);


?>
<script type="text/javascript">
    $(document).ready(function(){
      var loader=$("#loader").html();
     $(".close_feedb").click(function(){
        
var innovation='<?php echo $innovation?>';

var url="modules/system/clerk/pages/pending/evaluate.php";
$.post(url,{innovation:innovation},function(data){
 $("#home").html(data);
 /*
$('html, body').animate({scrollTop: '0px'}, 300);
  $(".dashboard_holder").hide();*/
});

    })
   })
  </script>



<?php

//echo $innovation;
$new_implementors="";
$new_innovators="";
$new_funding="";
$new_communities="";
$busireasons_fields="";
$requirements_all="";

$replyneed_reply="";
      $replysolution_reply="";
  $replyimpact_reply="";
  $replybusinessmodel_reply="";
      $replyrequirements_reply="";
  $replyattachments_reply="";
 $replytarget_feedback_reply="";

$status="comments";
$my_replies="my_replies";
$questions="question";

$sqlx="SELECT * FROM innovations_table Where Innovation_Id='$innovation'";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $Innovation_name=$row['Innovation_name'];
     // $Category=$row['Category'];
  $stage=$row['stage'];
  $date_added=$row['date_added'];
   $need=$row['need'];
      $impact=$row['impact'];
  $solution=$row['solution'];
   $target=$row['target'];
  //$
  // $Innovation_Id=$row['Innovation_Id'];
  
}

$sqlt="SELECT * FROM feedback where Innovation_id='$innovation' and status='$status'";

    $query_runrf=mysqli_query($con,$sqlt) or die($query_runrf."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runrf)){
    $need_feedback=$row['need_feedback'];
      $solution_feedback=$row['solution_feedback'];
  $impact_feedback=$row['impact_feedback'];
  $businessmodel_feedback=$row['businessmodel_feedback'];
      $requirements_feedback=$row['requirements_feedback'];
  $reasonscoments_feedback=$row['reasons_feedback'];
  $reasonstarget_feedback=$row['target_feedback'];
  //$date_added=decrypt($row['date_added'], $key);

}
$sqreply="SELECT * FROM feedback where Innovation_id='$innovation' and status='$questions'";

    $query_runrply=mysqli_query($con,$sqreply) or die($query_runrply."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runrply)){
    $need_reply=$row['need_feedback'];
      $solution_reply=$row['solution_feedback'];
  $impact_reply=$row['impact_feedback'];
  $businessmodel_reply=$row['businessmodel_feedback'];
      $requirements_reply=$row['requirements_feedback'];
  $attachments_reply=$row['reasons_feedback'];
 $target_feedback_reply=$row['target_feedback'];
  //$date_added=decrypt($row['date_added'], $key);

}
 $show_butons="not_shown";
$commments="my_replies";
$sqreply="SELECT * FROM feedback where Innovation_id='$innovation' and status='$commments'";

    $query_runrply=mysqli_query($con,$sqreply) or die($query_runrply."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runrply)){
$replyneed_reply=$row['need_feedback'];
      $replysolution_reply=$row['solution_feedback'];
  $replyimpact_reply=$row['impact_feedback'];
  $replybusinessmodel_reply=$row['businessmodel_feedback'];
      $replyrequirements_reply=$row['requirements_feedback'];
  $replyattachments_reply=$row['reasons_feedback'];
 $replytarget_feedback_reply=$row['target_feedback'];
}

/*
      $button_consas="not_shown";
 $show_need="not_shown";
 $show_solution="not_shown";
 $show_impact="not_shown";
 $show_target="not_shown";
 $show_businessmodel="not_shown";
 $show_requirements="not_shown";
  $show_reasons_feedback="not_shown";
*/

        
    
$fields="SELECT * FROM feedback where Innovation_id='$innovation' and status='$questions'";

    $query_runfieldeds=mysqli_query($con,$fields) or die($query_runfieldeds."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runfieldeds)){
    $need_fields=$row['need_feedback'];
      $solution_fields=$row['solution_feedback'];
  $impact_fields=$row['impact_feedback'];
  $businessmodel_fields=$row['businessmodel_feedback'];
      $requirements_fields=$row['requirements_feedback'];
  $target_feedback_fields=$row['target_feedback'];
$reasonsqeu_feedback=$row['reasons_feedback']; 
  }
  //$attachments_fields=$row['reasons_feedback'];
 $show_need="";
 $show_solution="";
 $show_impact="";
 $show_target="";
 $show_businessmodel="";
 $show_requirements="";
  $show_reasons_feedback="";
 if($requirements_fields==""){
  $show_requirements="not_shown";
 }else{
$requirements_fields=$requirements_reply;
 }
 if($need_fields==""){
  $show_need="not_shown";
 }else{
  
    $need_fields=$need_reply;
 }
 if($solution_fields==""){
  $show_solution="not_shown";
 }else{
  
  $solution_fields=$solution_reply;
 }
 if($impact_fields==""){
  $show_impact="not_shown";
 }else{
  
  $impact_fields=$impact_reply;
 }

if($businessmodel_fields==""){
  $show_businessmodel="not_shown";
 }else{
  $businessmodel_fields=$businessmodel_reply;
 }
if($reasonsqeu_feedback==""){
  $show_reasons_feedback="not_shown";
 }else{
  $busireasons_fields=$attachments_reply;
 }
 if($target_feedback_fields==""){
  $show_target="not_shown";
 }else{
  
  $targetss_fields=$target_feedback_reply;
 }

$button_consas="";
 if($show_need && $show_solution && $show_impact && $show_target && $show_businessmodel && $show_requirements && $show_reasons_feedback){
$button_consas="not_shown";
 }else{

 }





  //$date_added=decrypt($row['date_added'], $key);


$sqlinfor="SELECT * FROM innovations_table where Innovation_Id='$innovation'";

    $query_runinfor=mysqli_query($con,$sqlinfor) or die($query_runinfor."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runinfor)){
    $busines_model=$row['busines_model'];
      $target=$row['target'];
  $Research_sources=$row['Research_sources'];
  $requirements=$row['requirements'];
      $attachments=$row['attachments'];

     // reasons_feedback 
 
  //$date_added=decrypt($row['date_added'], $key);
      //for(@g)

}

$sqlinforrr="SELECT * FROM innovation_expectation where Innovation_id='$innovation'";

    $query_runinforrr=mysqli_query($con,$sqlinforrr) or die($query_runinforrr."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runinforrr)){
    $petnership_implementors=$row['petnership_implementors'];
      $patnership_innovators=$row['patnership_innovators'];
  $funding=$row['funding'];
  $communities=$row['communities'];
      
     // reasons_feedback 
 
  //$date_added=decrypt($row['date_added'], $key);
      //for(@g)

}
if($petnership_implementors && $patnership_innovators && $funding && $communities){

  $new_implementors=$petnership_implementors;
  $new_innovators=$patnership_innovators;
  $new_funding=$funding;
  $new_communities=$communities;
  $requirements_all=$new_implementors.", ".$new_innovators.", ".$new_funding.", ".$new_communities;
}else{

}



?>
<div class="col-sm-12 col-xs-12">
  <div class="col-sm-12 col-xs-12" id="reportcontrols">
    <div class="col-sm-8 col-xs-12"></div>
<div class="col-sm-2 col-xs-9">
  <div class="col-sm-4 col-xs-4 printed" role="print" ><i class="fa fa-print fa-2x"></i></div>

  <!--<div class="col-sm-4 col-xs-4 printed" role="export"><i class="fa fa-save fa-2x"></i></div>-->

  <div class="col-sm-4 col-xs-4 printed" role="export"><i class="fa fa-download fa-2x"></i></div>
</div>
<div class="col-sm-2 col-xs-3 no_padding" style="text-align:rigt"><span class=" btn theme_bg close_feedb">Close <i class="fa fa-close"></i></div>
  </div>
<div class="col-sm-12 col-xs-12" id="filtered_dd">
<div class="col-sm-12 col-xs-12 upper_display">
  <div class="col-sm-12 col-xs-12 top_fb"></div>
  <div class="col-sm-12 col-xs-12 default_header" id="innovation_fedheader"><?php echo $Innovation_name?></div>
  <div class="col-sm-12 col-xs-12 top_fb"></div>

  <div class="col-sm-12 col-xs-12 top_fb"> Following the innovation you submited to us, we have evaluated it and here are comments on your innovations.</div>

</div>

<div class="col-sm-12 col-xs-12 feedback_dives" >
  <div class="col-sm-12 col-xs-12 qustion_holder">
  What Gap/need/problem have you identified?
</div>
  <div class="col-sm-8 col-xs-12 narative_side">
    <div class="col-sm-12 col-xs-12 intro_head">Your description on the innovation need</div>
    <div class="col-sm-12 col-xs-12">
<?php echo $need?>
</div>
<div class="col-sm-12 col-xs-12  <?php echo $show_need?>">
  <div class="col-sm-12 col-xs-12 reply_discuss">
    <?php echo $need_fields?>
  </div>
<div class="col-sm-12 col-xs-12 rep_headres no_padding"?>Innovator's reply:</div>
<div class="col-xs-12 col-sm-12 no_padding">
  <?php echo $replyneed_reply?>
  </div>
<!--<textarea minlength="3" maxlength="400" Placeholder="Answer the above question here. (maximum 400 characters)" class="reply_areas col-sm-12 col-xs-12" id="need_reply"></textarea>-->
</div>
  </div>
  <div class="col-sm-4 col-xs-12 comments_side" >
    <div class="col-sm-12 col-xs-12 intro_head">Comments from evaluating team</div>
    <div class="col-sm-12 col-xs-12 coment_hold">
    <?php echo $need_feedback ?>
  </div>
  </div>
</div>

<div class="col-sm-12 col-xs-12 feedback_dives" >
  <div class="col-sm-12 col-xs-12 qustion_holder">
    What solution have you developed to address this gap/need/problem?
  
</div>
  <div class="col-sm-8 col-xs-12 narative_side">
    <div class="col-sm-12 col-xs-12 intro_head">Your description on the innovation solution</div>
    <div class="col-sm-12 col-xs-12">
<?php echo $solution?>
</div>
<div class="col-sm-12 col-xs-12 <?php echo $show_solution?>">
  <div class="col-sm-12 col-xs-12 reply_discuss">
    <?php echo $solution_fields?>
  </div>
<div class="col-sm-12 col-xs-12 rep_headres no_padding"?>Innovator's reply:</div>
<div class="col-xs-12 col-sm-12 no_padding">
  <?php echo $replysolution_reply?>
  </div><!--
<textarea minlength="3" maxlength="400" Placeholder="Answer the above question here. (maximum 400 characters)" class="reply_areas col-sm-12 col-xs-12" id="solution_reply"></textarea>-->
</div>
  </div>
  <div class="col-sm-4 col-xs-12 comments_side" >
    <div class="col-sm-12 col-xs-12 intro_head">Comments from evaluating team</div>
    <div class="col-sm-12 col-xs-12 coment_hold">
    <?php echo $solution_feedback ?>
  </div>
  </div>
</div>
<div class="col-sm-12 col-xs-12 feedback_dives" >
  <div class="col-sm-12 col-xs-12 qustion_holder">
  What is the overall impact of your innovation/solution?
</div>
  <div class="col-sm-8 col-xs-12 narative_side">
    <div class="col-sm-12 col-xs-12 intro_head">Your description on the innovation impact</div>
    <div class="col-sm-12 col-xs-12">
<?php echo $impact?>
</div>
<div class="col-sm-12 col-xs-12 <?php echo $show_impact?>">
  <div class="col-sm-12 col-xs-12 reply_discuss">
    <?php echo $impact_fields?>
  </div>
<div class="col-sm-12 col-xs-12 rep_headres no_padding"?>Innovator's reply:</div>
<div class="col-xs-12 col-sm-12 no_padding">
  <?php echo $replyimpact_reply?>
  </div><!--
<textarea minlength="3" maxlength="400" Placeholder="Answer the above question here. (maximum 400 characters)" class="reply_areas col-sm-12 col-xs-12" id="impactd_reply"></textarea>-->
</div>
  </div>
  <div class="col-sm-4 col-xs-12 comments_side" >
    <div class="col-sm-12 col-xs-12 intro_head">Comments from evaluating team</div>
    <div class="col-sm-12 col-xs-12 coment_hold">
    <?php echo $impact_feedback ?>
  </div>
  </div>
</div>
<div class="col-sm-12 col-xs-12 feedback_dives" >
  <div class="col-sm-12 col-xs-12 qustion_holder">
 Who is the direct consumer/target customer/partners?
</div>
  <div class="col-sm-8 col-xs-12 narative_side">
    <div class="col-sm-12 col-xs-12 intro_head">Your description on the innovation's direct consumer/target customer/partners</div>
    <div class="col-sm-12 col-xs-12">
<?php echo $target?>
</div>
<div class="col-sm-12 col-xs-12 <?php echo $show_target?>">
  <div class="col-sm-12 col-xs-12 reply_discuss">
    <?php echo $targetss_fields?>
  </div>
<div class="col-sm-12 col-xs-12 rep_headres no_padding"?>Innovator's reply:</div>
<div class="col-xs-12 col-sm-12 no_padding">
  <?php echo $replytarget_feedback_reply?>
  </div><!--
<textarea minlength="3" maxlength="400" Placeholder="Answer the above question here. (maximum 400 characters)" class="reply_areas col-sm-12 col-xs-12" id="targeted_reply"></textarea>-->
</div>
  </div>
  <div class="col-sm-4 col-xs-12 comments_side" >
    <div class="col-sm-12 col-xs-12 intro_head">Comments from evaluating team</div>
    <div class="col-sm-12 col-xs-12 coment_hold">
    <?php echo $reasonstarget_feedback ?>
  </div>
  </div>
</div>
<div class="col-sm-12 col-xs-12 feedback_dives" >
  <div class="col-sm-12 col-xs-12 qustion_holder">
  What is the business model/ revenue streams/costs of project?
</div>
  <div class="col-sm-8 col-xs-12 narative_side">
    <div class="col-sm-12 col-xs-12 intro_head">Your description on the innovation busines model</div>
    <div class="col-sm-12 col-xs-12">
<?php echo $busines_model?>
</div>
<div class="col-sm-12 col-xs-12 <?php echo $show_businessmodel?>">
  <div class="col-sm-12 col-xs-12 reply_discuss">
    <?php echo $businessmodel_fields?>
  </div>
<div class="col-sm-12 col-xs-12 rep_headres no_padding"?>Innovator's reply:</div>
<div class="col-xs-12 col-sm-12 no_padding">
  <?php echo $replybusinessmodel_reply?>
  </div><!--
<textarea minlength="3" maxlength="400" Placeholder="Answer the above question here. (maximum 400 characters)" class="reply_areas col-sm-12 col-xs-12" id="businessd_reply"></textarea>-->
</div>
  </div>
  <div class="col-sm-4 col-xs-12 comments_side" >
    <div class="col-sm-12 col-xs-12 intro_head">Comments from evaluating team</div>
    <div class="col-sm-12 col-xs-12 coment_hold">
    <?php echo $businessmodel_feedback ?>
  </div>
  </div>
</div>
<div class="col-sm-12 col-xs-12 feedback_dives" >
  <div class="col-sm-12 col-xs-12 qustion_holder">
  What Resources/ Technical requirements (if any) are required to implement the solution?
</div>
  <div class="col-sm-8 col-xs-12 narative_side">
    <div class="col-sm-12 col-xs-12 intro_head">Your description on the innovation requirements</div>
    <div class="col-sm-12 col-xs-12">
<?php echo $requirements?>
</div>
<div class="col-sm-12 col-xs-12 <?php echo $show_requirements?>">
  <div class="col-sm-12 col-xs-12 reply_discuss">
   <?php echo $requirements_fields?>
  </div>
<div class="col-sm-12 col-xs-12 rep_headres no_padding"?>Innovator's reply:</div>
<div class="col-xs-12 col-sm-12 no_padding">
  <?php echo $replyrequirements_reply?>
  </div><!--
<textarea minlength="3" maxlength="400" Placeholder="Answer the above question here. (maximum 400 characters)" class="reply_areas col-sm-12 col-xs-12" id="requirements_reply"></textarea>-->
</div>
  </div>
  <div class="col-sm-4 col-xs-12 comments_side" >
    <div class="col-sm-12 col-xs-12 intro_head">Comments from evaluating team</div>
    <div class="col-sm-12 col-xs-12 coment_hold">
    <?php echo $requirements_feedback ?>
  </div>
  </div>
</div>
<div class="col-sm-12 col-xs-12 feedback_dives" >
  <div class="col-sm-12 col-xs-12 qustion_holder">
 What are you looking for as an innovator?
</div>
  <div class="col-sm-8 col-xs-12 narative_side">
    <div class="col-sm-12 col-xs-12 intro_head">Your description on what you were looking for</div>
    <div class="col-sm-12 col-xs-12">
  <div class="col-sm-12 col-xs-12 base_inovation">
    
    <?php 


$checkExist=mysqli_query($con,"SELECT * FROM innovation_expectation WHERE Innovation_id='$innovation'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)!=0){
?>


<?php

$datadisplay="";
$counting="";
$sqlxo="SELECT * FROM innovation_expectation where Innovation_id='$innovation'";

    $query_runxd=mysqli_query($con,$sqlxo) or die($query_runxd."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxd)){

      
      $communities=$row['communities'];
      $patnership_innovators=$row['patnership_innovators'];
      $funding=$row['funding'];

      $petnership_implementors=$row['petnership_implementors'];
      if($petnership_implementors){

        $counting=$counting+1;
        $datadisplay=$petnership_implementors;
        ?>
<div class="col-sm-12 col-xs-12 table_rowers">
  <div class="col-sm-1 col-sm-1"><?php echo $counting?></div>
  <div class="col-sm-11 col-sm-11"><?php echo $datadisplay?></div>


</div>

<?php

      }else{
     
      $datadisplay="";
      }
      if($patnership_innovators){

        $counting=$counting+1;
        $datadisplay=$patnership_innovators;
        ?>
<div class="col-sm-12 col-xs-12 table_rowers">
  <div class="col-sm-1 col-sm-1"><?php echo $counting?></div>
  <div class="col-sm-11 col-sm-11"><?php echo $datadisplay?></div>


</div>

<?php

      }else{
      
      $datadisplay="";
      }
       if($funding){

        $counting=$counting+1;
        $datadisplay=$funding;
        ?>
<div class="col-sm-12 col-xs-12 table_rowers">
  <div class="col-sm-1 col-sm-1"><?php echo $counting?></div>
  <div class="col-sm-11 col-sm-11"><?php echo $datadisplay?></div>


</div>

<?php

      }else{
      
      $datadisplay="";
      }
       if($communities){

        $counting=$counting+1;
        $datadisplay=$communities;
        ?>
<div class="col-sm-12 col-xs-12 table_rowers">
  <div class="col-sm-1 col-sm-1"><?php echo $counting?></div>
  <div class="col-sm-11 col-sm-11"><?php echo $datadisplay?></div>


</div>

<?php

      }else{
      
      $datadisplay="";
      }
    }

     



}else{

}

    ?>
  </div>
</div>
<div class="col-sm-12 col-xs-12 <?php echo $show_reasons_feedback?>">
  <div class="col-sm-12 col-xs-12 reply_discuss">
   <?php echo $busireasons_fields?>
  </div>
 <div class="col-sm-12 col-xs-12 rep_headres no_padding"?>Innovator's reply:</div>
 <div class="col-xs-12 col-sm-12 no_padding">
  <?php echo $replyattachments_reply?>
  </div><!--
 <textarea minlength="3" maxlength="400" Placeholder="Answer the above question here. (maximum 400 characters)" class="reply_areas col-sm-12 col-xs-12" id="reasondss_reply"></textarea>-->
</div>
  </div>
  <div class="col-sm-4 col-xs-12 comments_side" >
    <div class="col-sm-12 col-xs-12 intro_head">Comments from evaluating team</div>
    <div class="col-sm-12 col-xs-12 coment_hold">
    <?php echo $reasonscoments_feedback ?>
  </div>
 
  </div>
</div>

<?php
$Name="";
//$innovation=base64_decode($_POST['innovation']);
//$Status=encrypt("second_evaluation",$key);
$sqlx="SELECT * FROM innovations_reports where Innovation_Id='$innovation'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));
    while($row=mysqli_fetch_array($query_runx)){ 
      $clerk_id=$row['clerk_id'];
  $Report=$row['Report'];
  $shown_repotrs="not_shown";
  if($Report){
    $shown_repotrs="";
  }else{
    $shown_repotrs="not_shown";
  }
  $date_added=$row['date_added'];
  //echo $date_added;
    $Innovation_Id=$row['Innovation_Id'];
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



    if($seconds<=60){
     return "Just now";
    }else if($minutes<=60){
      if($minutes==1){

        $time_d="One minute ago";
      }else{
        $time_d="$minutes minutes ago";
      }

    }elseif($hours<=24){

   if($hours==1){
    $time_d="An hour ago";
   }else{
    $time_d="$hours hrs ago";
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
    $time_d="$years years ago";
  }

    }




}

$sqlty="SELECT Name FROM administrators where Id='$clerk_id'";
    $query_runl=mysqli_query($con,$sqlty) or die($query_runl."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runl)){
    $Name=$row['Name'];
}
?>
<div class="col-sm-12 col-xs-12 <?php echo $shown_repotrs?>" id="report_display">

<div class=" col-sm-12 col-xs-12 default_header"><?php echo "GENERAL REPORT"?></div>
<div class="col-sm-12 col-xs-12 " id="holder_one">
  <?php echo $Report?>
    
  </div>
  <div class="col-sm-12 col-xs-12" id="holder_otwo">
    <div class="col-sm-6 col-xs-6" id="bb_holders">
      EVALUATED BY:
      <div class="col-sm-12 col-xs-12" id="">
  <?php echo $Name?>
</div>
    </div>
    <div class="col-sm-6 col-xs-6" id="">
      LAST MODIFICATION:
      <div class="col-sm-12 col-xs-12" id="">
  <?php echo $time_d?>
</div>
    </div>
  </div>
</div>


<div class="col-sm-12 col-xs-12 <?php echo $button_consas?> data_sends" id="">
  <span class="col-sm-4 col-xs-12 "></span>
   <span class="col-sm-4 col-xs-12 ">
    <!--
     <span class="btn theme_bg send_replys" role="back">Back</span> 
     <span class="btn theme_bg send_replys" role="save">Save</span>-->
   </span>
  
</div>
<div class="col-sm-12 col-xs-12 data_sends" id="">
  <div class="col-sm-12 col-xs-12" id="datasendserrordddddd">&nbsp;</div>
</div>
</div>
</div>


  </div>
  </div>
  