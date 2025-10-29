<?php
include("../../base_connect.php");
include("../../connect.php");
 //session_start();
  $loginuser=base64_decode($_SESSION["username"]);
if($loginuser){

}else{
  $loginuser=base64_decode($_POST['my_id']);
}
//echo $loginuser;
//echo "<script type='text/javascript'>alert('$loginuser');</script>";
?>
<style type="text/css">
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
</style>

<div class="col-sm-12 col-xs-12">
  <div class="col-sm-12 col-xs-12 default_header" id="head_fgt">Feedback</div>
  <div class="col-sm-12 col-xs-12" id="feedback_disp">

<?php


 // id
//$today=time();
if($loginuser){


$get_user=mysqli_query($con,"SELECT * FROM users WHERE email='$loginuser'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$first_name=$get['first_name'];
$user_id=$get['id'];
$last_name=$get['last_name'];

}else{

}
$innovation=base64_decode($_POST['innovation']);
$new_implementors="";
$new_innovators="";
$new_funding="";
$new_communities="";
$busireasons_fields="";
$requirements_all="";


$status="comments";
$my_replies="my_replies";
$questions="question";

$sqlx="SELECT * FROM innovations_table where user_id='$user_id' and Innovation_Id='$innovation'";
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
$checkExist=mysqli_query($con,"SELECT * FROM feedback where Innovation_id='$innovation' and status='$commments'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)!=0){
      $button_consas="not_shown";
 $show_need="not_shown";
 $show_solution="not_shown";
 $show_impact="not_shown";
 $show_target="not_shown";
 $show_businessmodel="not_shown";
 $show_requirements="not_shown";
  $show_reasons_feedback="not_shown";
    }else{
        
    
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
  <!--<div class="col-sm-4 col-xs-4 printed" role="print" ><i class="fa fa-print fa-2x"></i></div>-->

  <!--<div class="col-sm-4 col-xs-4 printed" role="export"><i class="fa fa-save fa-2x"></i></div>-->

 <!-- <div class="col-sm-4 col-xs-4 printed" role="export"><i class="fa fa-download fa-2x"></i></div>-->
</div>
<div class="col-sm-2 col-xs-3 no_padding" style="text-align:rigt"><span style="color:#fff !important;background-color: red !important;" class=" btn close_feedb">Close <i class="fa fa-close"></i></div>
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
Reply here:
<textarea minlength="3" maxlength="400" Placeholder="Answer the above question here. (maximum 400 characters)" class="reply_areas col-sm-12 col-xs-12" id="need_reply"></textarea>
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
Reply here:
<textarea minlength="3" maxlength="400" Placeholder="Answer the above question here. (maximum 400 characters)" class="reply_areas col-sm-12 col-xs-12" id="solution_reply"></textarea>
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
Reply here:
<textarea minlength="3" maxlength="400" Placeholder="Answer the above question here. (maximum 400 characters)" class="reply_areas col-sm-12 col-xs-12" id="impactd_reply"></textarea>
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
Reply here:
<textarea minlength="3" maxlength="400" Placeholder="Answer the above question here. (maximum 400 characters)" class="reply_areas col-sm-12 col-xs-12" id="targeted_reply"></textarea>
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
Reply here:
<textarea minlength="3" maxlength="400" Placeholder="Answer the above question here. (maximum 400 characters)" class="reply_areas col-sm-12 col-xs-12" id="businessd_reply"></textarea>
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
Reply here:
<textarea minlength="3" maxlength="400" Placeholder="Answer the above question here. (maximum 400 characters)" class="reply_areas col-sm-12 col-xs-12" id="requirements_reply"></textarea>
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
$counting=0;
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
 Reply here:
 <textarea minlength="3" maxlength="400" Placeholder="Answer the above question here. (maximum 400 characters)" class="reply_areas col-sm-12 col-xs-12" id="reasondss_reply"></textarea>
</div>
  </div>
  <div class="col-sm-4 col-xs-12 comments_side" >
    <div class="col-sm-12 col-xs-12 intro_head">Comments from evaluating team</div>
    <div class="col-sm-12 col-xs-12 coment_hold">
    <?php echo $reasonscoments_feedback ?>
  </div>
 
  </div>
</div>



<div class="col-sm-12 col-xs-12 <?php echo $button_consas?> data_sends" id="">
  <span class="col-sm-4 col-xs-12 "></span>
   <span class="col-sm-4 col-xs-12 ">
     <span class="btn theme_bg send_replys" role="back">Back</span> 
     <span class="btn theme_bg send_replys" role="save">Save</span>
   </span>
  
</div>
<div class="col-sm-12 col-xs-12 data_sends" id="">
  <div class="col-sm-12 col-xs-12" id="datasendserrordddddd">&nbsp;</div>
</div>
</div>
</div>


  </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function(){
      var loader=$("#loader").html();
     $(".send_replys").click(function(){
      var save_role=$(this).attr("role");
   
      if(save_role=="save"){
        //check need field
   var need_check="";
var need_reply=$("#need_reply").val();
var need_fields='<?php echo $show_need?>';
if(need_fields=="not_shown"){
need_check="1";

}else{
if(need_reply==""){
$("#need_reply").css("border","2px solid red");
$("#datasendserrordddddd").html("Fields required!");
}else{
$("#need_reply").css("border","1px solid #ccc");
need_check="1";
$("#datasendserrordddddd").html("");
}
}
//end of need field check

//check customer target field
var targets_check="";
var targeted_reply=$("#targeted_reply").val();
var show_target='<?php echo $show_target?>';
if(show_target=="not_shown"){
targets_check="1";

}else{
if(targeted_reply==""){
$("#targeted_reply").css("border","2px solid red");
$("#datasendserrordddddd").html("Fields required!");
}else{
$("#targeted_reply").css("border","1px solid #ccc");
targets_check="1";
$("#datasendserrordddddd").html("");
}
}
//end of customer target field check


       //check solution field
var solutoion_check="";
var solution_reply=$("#solution_reply").val();
var show_solution='<?php echo $show_solution?>';
if(show_solution=="not_shown"){
solutoion_check="1";

}else{
if(solution_reply==""){
$("#solution_reply").css("border","2px solid red");
$("#datasendserrordddddd").html("Fields required!");
}else{
$("#solution_reply").css("border","1px solid #ccc");
solutoion_check="1";
$("#datasendserrordddddd").html("");
}
}
//end of solution field check

     //check impact field
var solimpact_check="";
var impactd_reply=$("#impactd_reply").val();
var show_impact='<?php echo $show_impact?>';
if(show_impact=="not_shown"){
solimpact_check="1";

}else{
if(impactd_reply==""){
$("#impactd_reply").css("border","2px solid red");
$("#datasendserrordddddd").html("Fields required!");
}else{
$("#impactd_reply").css("border","1px solid #ccc");
solimpact_check="1";
$("#datasendserrordddddd").html("");
}
}
//end of impact field check


//check business model field
var solbusiness_check="";
var businessd_reply=$("#businessd_reply").val();
var show_businessmodel='<?php echo $show_businessmodel?>';
if(show_businessmodel=="not_shown"){
solbusiness_check="1";

}else{
if(businessd_reply==""){
$("#businessd_reply").css("border","2px solid red");
$("#datasendserrordddddd").html("Fields required!");
}else{
$("#businessd_reply").css("border","1px solid #ccc");
solbusiness_check="1";
$("#datasendserrordddddd").html("");
}
}
//end of business model field check

//check business model field
var showd_requirements="";
var requirements_reply=$("#requirements_reply").val();
var show_requirements='<?php echo $show_requirements?>';
if(show_requirements=="not_shown"){
showd_requirements="1";

}else{
if(requirements_reply==""){
$("#requirements_reply").css("border","2px solid red");
$("#datasendserrordddddd").html("Fields required!");
}else{
$("#requirements_reply").css("border","1px solid #ccc");
showd_requirements="1";
$("#datasendserrordddddd").html("");
}
}
//end of business model field check

//check reasons field
var reasonsme_feedback="";
var reasondss_reply=$("#reasondss_reply").val();
var show_reasons_feedback='<?php echo $show_reasons_feedback?>';
if(show_reasons_feedback=="not_shown"){
reasonsme_feedback="1";

}else{
if(reasondss_reply==""){
$("#reasondss_reply").css("border","2px solid red");
$("#datasendserrordddddd").html("Fields required!");
}else{
$("#reasondss_reply").css("border","1px solid #ccc");
reasonsme_feedback="1";
$("#datasendserrordddddd").html("");
}
}
//end of reasons field check

if(reasonsme_feedback && showd_requirements && solbusiness_check && solimpact_check && need_check && solutoion_check && targets_check){
//data reciever
$("#datasendserrordddddd").html(loader);
var my_id=$("#user_email").val();
var innovation=btoa('<?php echo $innovation?>')
var new_targeted_reply=btoa($("#targeted_reply").val());
var newneed_reply=btoa($("#need_reply").val());
var newsolution_reply=btoa($("#solution_reply").val());
var newimpactd_reply=btoa($("#impactd_reply").val());
var newbusinessd_reply=btoa($("#businessd_reply").val());
var newrequirements_reply=btoa($("#requirements_reply").val());
var newreasondss_reply=btoa($("#reasondss_reply").val());

$.post("Huduma_WhiteBox/innovator/save_feedback.php",{
    innovation:innovation,
    newneed_reply:newneed_reply,
    newsolution_reply:newsolution_reply,
    newimpactd_reply:newimpactd_reply,
    newbusinessd_reply:newbusinessd_reply,
    newrequirements_reply:newrequirements_reply,
    newreasondss_reply:newreasondss_reply,
    new_targeted_reply:new_targeted_reply,
    my_id:my_id
},function(data){
    if($.trim(data)=="success"){
       // var my_id=$("#global_u_email").val();
        var innovation=btoa('<?php echo $innovation?>');
        $.post("Huduma_WhiteBox/innovator/feedback.php",{
            innovation:innovation
        },function(data){
         $("#home_display").html(data).show();
$('html, body').animate({scrollTop: '0px'}, 300);
  $(".dashboard_holder").hide();
        })
    }else{
        
    }
})



//data reciever

}else{
$("#datasendserrordddddd").html("Required!")
}


      }else{
$(".close_feedb").click()
      }

     })
     $(".close_feedb").click(function(){
        
 var my_id=$("#user_email").val();
//alert(my_id)
  //alert(innovation);
$.post("Huduma_WhiteBox/innovator/innovations.php",{my_id:my_id},function(data){
 $("#home_display").html(data).show();
$('html, body').animate({scrollTop: '0px'}, 300);
  $(".dashboard_holder").hide();});
})
    })
  </script>