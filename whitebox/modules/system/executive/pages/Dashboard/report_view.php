
<style type="text/css">
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
  margin-top: 5px;
    min-height: 100px;
    box-shadow: 0 0 3px #ccc;
  }
  #bb_holders{
    min-height: 40px;
    border-right: 2px solid #ccc;
    margin-bottom: 5px;
  }
</style>

<div class="col-sm-12 col-xs-12">
  <div class="col-sm-12 col-xs-12 default_header" id="head_fgt">First evaluation report</div>
  <div class="col-sm-12 col-xs-12" id="feedback_disp">

<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
//$my_user=$_POST['my_id'];
$innovation=$_POST['innovation'];
$new_implementors="";
$new_innovators="";
$new_funding="";
$new_communities="";
$busireasons_fields="";
$requirements_all="";

$status="comments";
$my_replies="my_replies";
$questions="question";
//$my_userde=encrypt($my_user,$key);

$sqlx="SELECT * FROM innovations_table where Innovation_Id='$innovation'";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $Innovation_name=$row['Innovation_name'];
      //$Category=$row['Category'];
  $stage=$row['stage'];
  $date_added=$row['date_added'];
   $need=$row['need'];
      $impact=$row['impact'];
  $solution=$row['solution'];
   $target=$row['target'];
   $user_id=$row['user_id'];
  //$
  // $Innovation_Id=$row['Innovation_Id'];
  
}
/*$get_user=mysqli_query($con,"SELECT User_id FROM external_users WHERE Email_address='$my_userde'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$User_id=$get['User_id'];
*/
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
 $Clerk_id=$row['Clerk_id'];

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
$requirements_fields=$row['requirements_feedback'];
 }
 if($need_fields==""){
  $show_need="not_shown";
 }else{
  
    $need_fields=$row['need_feedback'];
 }
 if($solution_fields==""){
  $show_solution="not_shown";
 }else{
  
  $solution_fields=$row['solution_feedback'];
 }
 if($impact_fields==""){
  $show_impact="not_shown";
 }else{
  
  $impact_fields=$row['impact_feedback'];
 }

if($businessmodel_fields==""){
  $show_businessmodel="not_shown";
 }else{
  $businessmodel_fields=$row['businessmodel_feedback'];
 }
if($reasonsqeu_feedback==""){
  $show_reasons_feedback="not_shown";
 }else{
  $busireasons_fields=$row['reasons_feedback'];
 }
 if($target_feedback_fields==""){
  $show_target="not_shown";
 }else{
  
  $targetss_fields=$row['target_feedback'];
 }

$button_consas="";
 if($show_need && $show_solution &&$show_impact && $show_target && $show_businessmodel && $show_requirements && $show_reasons_feedback){
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
  <div class="col-sm-4 col-xs-4 printed" role="print" id="print_repoy" ><i class="fa fa-print fa-2x"></i></div>

  <!--<div class="col-sm-4 col-xs-4 printed" role="export"><i class="fa fa-save fa-2x"></i></div>-->

  <!--<div class="col-sm-4 col-xs-4 printed" role="export"><i class="fa fa-download fa-2x"></i></div>-->
</div>
<div class="col-sm-2 col-xs-3 no_padding" style="text-align:rigt"><span class=" btn theme_bg close_feedb">Close <i class="fa fa-close"></i></div>
  </div>
<div class="col-sm-12 col-xs-12" id="filtered_dd">
<div class="col-sm-12 col-xs-12 upper_display">
  <div class="col-sm-12 col-xs-12 top_fb"></div>
  <div class="col-sm-12 col-xs-12 default_header" id="innovation_fedheader"><?php echo $Innovation_name?></div>
  <div class="col-sm-12 col-xs-12 top_fb"></div>

  <div class="col-sm-12 col-xs-12 top_fb"> </div>

</div>

<div class="col-sm-12 col-xs-12 feedback_dives" >
  <div class="col-sm-12 col-xs-12 qustion_holder">
  What Gap/need/problem have you identified?
</div>
  <div class="col-sm-8 col-xs-12 narative_side">
    <div class="col-sm-12 col-xs-12 intro_head">Innovator's description on the innovation need</div>
    <div class="col-sm-12 col-xs-12">
<?php echo $need?>
</div>

<!--<div class="col-sm-12 col-xs-12  <?php echo $show_need?>">
  <div class="col-sm-12 col-xs-12 reply_discuss">
    <?php echo $need_fields?>
  </div>
Reply here:
<textarea minlength="3" maxlength="400" Placeholder="Answer the above question here. (maximum 400 characters)" class="reply_areas col-sm-12 col-xs-12" id="need_reply"></textarea>
</div>-->
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
    <div class="col-sm-12 col-xs-12 intro_head">Innovator's description on the innovation solution</div>
    <div class="col-sm-12 col-xs-12">
<?php echo $solution?>
</div>
<!--<div class="col-sm-12 col-xs-12 <?php echo $show_solution?>">
  <div class="col-sm-12 col-xs-12 reply_discuss">
    <?php echo $solution_fields?>
  </div>
Reply here:
<textarea minlength="3" maxlength="400" Placeholder="Answer the above question here. (maximum 400 characters)" class="reply_areas col-sm-12 col-xs-12" id="solution_reply"></textarea>
</div>-->
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
    <div class="col-sm-12 col-xs-12 intro_head">Innovator's description on the innovation impact</div>
    <div class="col-sm-12 col-xs-12">
<?php echo $impact?>
</div>
<!--<div class="col-sm-12 col-xs-12 <?php echo $show_impact?>">
  <div class="col-sm-12 col-xs-12 reply_discuss">
    <?php echo $impact_fields?>
  </div>
Reply here:
<textarea minlength="3" maxlength="400" Placeholder="Answer the above question here. (maximum 400 characters)" class="reply_areas col-sm-12 col-xs-12" id="impactd_reply"></textarea>
</div>-->
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
    <div class="col-sm-12 col-xs-12 intro_head">Innovator's description on the innovation's direct consumer/target customer/partners</div>
    <div class="col-sm-12 col-xs-12">
<?php echo $target?>
</div>
<!--<div class="col-sm-12 col-xs-12 <?php echo $show_target?>">
  <div class="col-sm-12 col-xs-12 reply_discuss">
    <?php echo $targetss_fields?>
  </div>
Reply here:
<textarea minlength="3" maxlength="400" Placeholder="Answer the above question here. (maximum 400 characters)" class="reply_areas col-sm-12 col-xs-12" id="targeted_reply"></textarea>
</div>-->
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
    <div class="col-sm-12 col-xs-12 intro_head">Innovator's description on the innovation busines model</div>
    <div class="col-sm-12 col-xs-12">
<?php echo $busines_model?>
</div>
<!--<div class="col-sm-12 col-xs-12 <?php echo $show_businessmodel?>">
  <div class="col-sm-12 col-xs-12 reply_discuss">
    <?php echo $businessmodel_fields?>
  </div>
Reply here:
<textarea minlength="3" maxlength="400" Placeholder="Answer the above question here. (maximum 400 characters)" class="reply_areas col-sm-12 col-xs-12" id="businessd_reply"></textarea>
</div>-->
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
    <div class="col-sm-12 col-xs-12 intro_head">Innovator's description on the innovation requirements</div>
    <div class="col-sm-12 col-xs-12">
<?php echo $requirements?>
</div>
<!--<div class="col-sm-12 col-xs-12 <?php echo $show_requirements?>">
  <div class="col-sm-12 col-xs-12 reply_discuss">
   <?php echo $requirements_fields?>
  </div>
Reply here:
<textarea minlength="3" maxlength="400" Placeholder="Answer the above question here. (maximum 400 characters)" class="reply_areas col-sm-12 col-xs-12" id="requirements_reply"></textarea>
</div>-->
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
    <div class="col-sm-12 col-xs-12 intro_head">Innovator's description on user expectations</div>
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
<!--<div class="col-sm-12 col-xs-12 <?php echo $show_reasons_feedback?>">
  <div class="col-sm-12 col-xs-12 reply_discuss">
   <?php echo $busireasons_fields?>
  </div>
 Reply here:
 <textarea minlength="3" maxlength="400" Placeholder="Answer the above question here. (maximum 400 characters)" class="reply_areas col-sm-12 col-xs-12" id="reasondss_reply"></textarea>
</div>-->
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
$status="submission";
//$Status=encrypt("second_evaluation",$key);
$sqlx="SELECT * FROM innovations_reports where Innovation_Id='$innovation' and status='$status'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));
    while($row=mysqli_fetch_array($query_runx)){
      $clerk_id=$row['clerk_id'];
  $Report=$row['Report'];
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
$sqlrd="SELECT * FROM innovations_table where Innovation_Id='$innovation'";
    $query_run=mysqli_query($con,$sqlrd) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
    $Innovation_name=$row['Innovation_name'];
}
$sqlty="SELECT Name FROM administrators where Id='$Clerk_id'";
    $query_runl=mysqli_query($con,$sqlty) or die($query_runl."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runl)){
    $Name=$row['Name'];
}





 ?>




<div class="col-sm-12 col-xs-12" id="report_display">
<div class="col-sm-12 col-xs-12 default_header">GENERAL REPORT AND RECOMMANDATIONS</div>
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
<!--
<div class="col-sm-12 col-xs-12 <?php echo $button_consas?> data_sends" id="">
  <span class="col-sm-4 col-xs-12 "></span>
   <span class="col-sm-4 col-xs-12 ">
     <span class="btn theme_bg send_replys" role="back">Back</span> 
     <span class="btn theme_bg send_replys" role="save">Save</span>
   </span>
  
</div>
<div class="col-sm-12 col-xs-12 data_sends" id="">
  <div class="col-sm-12 col-xs-12" id="datasendserrordddddd">&nbsp;</div>
</div>-->
</div>
</div>


  </div>
  </div>
  <script type="text/javascript">
   $(document).ready(function(){
      /* var loader=$("#loader").html();
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
$("#datasendserrordddddd").html
var innovation=btoa('<?php echo $innovation?>')
var new_targeted_reply=btoa($("#targeted_reply").val());
var newneed_reply=btoa($("#need_reply").val());
var newsolution_reply=btoa($("#solution_reply").val());
var newimpactd_reply=btoa($("#impactd_reply").val());
var newbusinessd_reply=btoa($("#businessd_reply").val());
var newrequirements_reply=btoa($("#requirements_reply").val());
var newreasondss_reply=btoa($("#reasondss_reply").val());

$.post("modules/system/external/pages/feedback/save.php",{
    innovation:innovation,
    newneed_reply:newneed_reply,
    newsolution_reply:newsolution_reply,
    newimpactd_reply:newimpactd_reply,
    newbusinessd_reply:newbusinessd_reply,
    newrequirements_reply:newrequirements_reply,
    newreasondss_reply:newreasondss_reply,
    new_targeted_reply:new_targeted_reply
},function(data){
    if($.trim(data)=="success"){
        $("#datasendserrordddddd").html("")
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
     */
     $(".close_feedb").click(function(){
       // alert();
  //alert(innovation);

$("#main_dashbod").show();
  $("#main_datashows").html("").hide();
})

$("#print_repoy").click(function(){
    PrintElem()
})



    })

function PrintElem(elem)
{
    var mywindow = window.open('', 'PRINT', 'height=400,width=600','center');

    mywindow.document.write('<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">');
    mywindow.document.write("<link href=\"css/bootstrap.min.css\" rel=\"stylesheet\"><link href=\"css/reports.css\" rel=\"stylesheet\">")
    mywindow.document.write('</head><body >');
    mywindow.document.write(document.getElementById('filtered_dd').innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/


    setTimeout(function () {
    mywindow.print();
    mywindow.close();
    }, 1000)
    return true;
}
  </script>
 