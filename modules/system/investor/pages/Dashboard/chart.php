
<style type="text/css">
   #feedback_disp{
    min-height: 400px;
    box-shadow: 0 0 2px #ccc;
    border-radius:4px;
    background:#222;

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
  color: #ddd;
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
  }
  .reply_discuss{
    margin-top: 10px;
    font-weight: bolder;
background: #e6b234;
  }
  .data_sends{
    margin-top: 10px;
  }
  #datasendserror{
    margin-top: 5px;
    margin-bottom: 10px;
    text-align: center;
  }
</style>

<div class="col-sm-12 col-xs-12">
  <div class="col-sm-12 col-xs-12 default_header" id="">INNOVATION DETAILS</div>
  <div class="col-sm-12 col-xs-12" id="feedback_disp">

<?php
include "../../../../../connect.php";
$my_user=$_POST['my_id'];
$innovation=$_POST['innovation'];

include("../../../../functions/security.php");
$my_userde=encrypt($my_user,$key);

$status=base64_encode(encrypt("comments",$key));
$questions=base64_encode(encrypt("question",$key));
$my_userde=encrypt($my_user,$key);

$sqlx="SELECT * FROM innovations_table where Innovation_Id='$innovation'";
$counter=0;
    $query_runx=mysql_query($sqlx) or die($query_runx."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runx)){
    $Innovation_name=base64_decode(decrypt($row['Innovation_name'], $key));
      $Category=base64_decode(decrypt($row['Category'], $key));
  $stage=base64_decode(decrypt($row['stage'], $key));
  $date_added=decrypt($row['date_added'], $key);
   $need=base64_decode(decrypt($row['need'], $key));
      $impact=base64_decode(decrypt($row['impact'], $key));
  $solution=base64_decode(decrypt($row['solution'], $key));
  // $Innovation_Id=$row['Innovation_Id'];
  
}

$sqlt="SELECT * FROM feedback where Innovation_id='$innovation' and status='$status'";

    $query_runrf=mysql_query($sqlt) or die($query_runrf."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runrf)){
    $need_feedback=base64_decode(decrypt($row['need_feedback'], $key));
      $solution_feedback=base64_decode(decrypt($row['solution_feedback'], $key));
  $impact_feedback=base64_decode(decrypt($row['impact_feedback'], $key));
  $businessmodel_feedback=base64_decode(decrypt($row['businessmodel_feedback'], $key));
      $requirements_feedback=base64_decode(decrypt($row['requirements_feedback'], $key));
  $reasons_feedback=base64_decode(decrypt($row['reasons_feedback'], $key));
 
  //$date_added=decrypt($row['date_added'], $key);

}
$sqreply="SELECT * FROM feedback where Innovation_id='$innovation' and status='$questions'";

    $query_runrply=mysql_query($sqreply) or die($query_runrply."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runrply)){
    $need_reply=base64_decode(decrypt($row['need_feedback'], $key));
      $solution_reply=base64_decode(decrypt($row['solution_feedback'], $key));
  $impact_reply=base64_decode(decrypt($row['impact_feedback'], $key));
  $businessmodel_reply=base64_decode(decrypt($row['businessmodel_feedback'], $key));
      $requirements_reply=base64_decode(decrypt($row['requirements_feedback'], $key));
  $attachments_reply=base64_decode(decrypt($row['reasons_feedback'], $key));
 
  //$date_added=decrypt($row['date_added'], $key);

}
$fields="SELECT * FROM feedback where Innovation_id='$innovation' and status='$questions'";

    $query_runfieldeds=mysql_query($fields) or die($query_runfieldeds."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runfieldeds)){
    $need_fields=$row['need_feedback'];
      $solution_fields=$row['solution_feedback'];
  $impact_fields=$row['impact_feedback'];
  $businessmodel_fields=$row['businessmodel_feedback'];
      $requirements_fields=$row['requirements_feedback'];
  $attachments_fields=$row['reasons_feedback'];

  
  //$attachments_fields=base64_decode(decrypt($row['reasons_feedback'], $key));
 $show_need="";
 $show_solution="";
 $show_impact="";
 $show_businessmodel="";
 $show_requirements="";
 if($requirements_fields==""){
  $show_requirements="not_shown";
 }else{
$requirements_fields=base64_decode(decrypt($row['requirements_feedback'], $key));
 }
 if($need_fields==""){
  $show_need="not_shown";
 }else{
  
    $need_fields=base64_decode(decrypt($row['need_feedback'], $key));
 }
 if($solution_fields==""){
  $show_solution="not_shown";
 }else{
  
  $solution_fields=base64_decode(decrypt($row['solution_feedback'], $key));
 }
 if($impact_fields==""){
  $show_impact="not_shown";
 }else{
  
  $impact_fields=base64_decode(decrypt($row['impact_feedback'], $key));
 }

if($businessmodel_fields==""){
  $show_businessmodel="not_shown";
 }else{
  $businessmodel_fields=base64_decode(decrypt($row['businessmodel_feedback'], $key));
 }










  //$date_added=decrypt($row['date_added'], $key);

}
$sqlinfor="SELECT * FROM innovations_table where Innovation_Id='$innovation'";

    $query_runinfor=mysql_query($sqlinfor) or die($query_runinfor."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runinfor)){
    $busines_model=base64_decode(decrypt($row['busines_model'], $key));
      $target=base64_decode(decrypt($row['target'], $key));
  $Research_sources=base64_decode(decrypt($row['Research_sources'], $key));
  $requirements=base64_decode(decrypt($row['requirements'], $key));
      $attachments=base64_decode(decrypt($row['attachments'], $key));
 
  //$date_added=decrypt($row['date_added'], $key);
      //for(@g)

}
?>
<div class="col-sm-12 col-xs-12">
  <div class="col-sm-12 col-xs-12" id="reportcontrols">
    <div class="col-sm-9 col-xs-12"></div>
<div class="col-sm-3 col-xs-12">
  <div class="col-sm-4 col-xs-4 printed" role="print" ><i class="fa fa-print fa-2x"></i></div>

  <!--<div class="col-sm-4 col-xs-4 printed" role="export"><i class="fa fa-save fa-2x"></i></div>-->

  <div class="col-sm-4 col-xs-4 printed" role="export"><i class="fa fa-download fa-2x"></i></div>
</div>

  </div>
<div class="col-sm-12 col-xs-12" id="filtered_dd">
<div class="col-sm-12 col-xs-12 upper_display">
  <div class="col-sm-12 col-xs-12 top_fb"></div>
  <div class="col-sm-12 col-xs-12 default_header"><?php echo $Innovation_name?></div>
  <div class="col-sm-12 col-xs-12 top_fb"></div>

  <div class="col-sm-12 col-xs-12 top_fb"> Innovation details</div>

</div>

<div class="col-sm-12 col-xs-12 feedback_dives" >
  <div class="col-sm-12 col-xs-12 qustion_holder">
  The Gap/need/problem this innovation identified
</div>
  <div class="col-sm-12 col-xs-12 narative_side">
    <div class="col-sm-12 col-xs-12">
<?php echo $need?>
</div>
  </div>
</div>

<div class="col-sm-12 col-xs-12 feedback_dives" >
  <div class="col-sm-12 col-xs-12 qustion_holder">
    The solution developed to address this gap/need/problem
  
</div>
  <div class="col-sm-12 col-xs-12 narative_side">
    <div class="col-sm-12 col-xs-12">
<?php echo $solution?>
</div>

</div>
</div>
<div class="col-sm-12 col-xs-12 feedback_dives" >
  <div class="col-sm-12 col-xs-12 qustion_holder">
  The overall impact of this innovation/solution
</div>
  <div class="col-sm-12 col-xs-12 narative_side">
    <div class="col-sm-12 col-xs-12">
<?php echo $impact?>
</div>

  </div>
  
</div>
<div class="col-sm-12 col-xs-12 feedback_dives" >
  <div class="col-sm-12 col-xs-12 qustion_holder">
  The business model/ revenue streams/costs of this innovation
</div>
  <div class="col-sm-12 col-xs-12 narative_side">
    <div class="col-sm-12 col-xs-12">
<?php echo $busines_model?>
</div>

  </div>
 
</div>
<div class="col-sm-12 col-xs-12 feedback_dives" >
  <div class="col-sm-12 col-xs-12 qustion_holder">
  Resources/ Technical requirements required to implement this solution
</div>
  <div class="col-sm-12 col-xs-12 narative_side">
    <div class="col-sm-12 col-xs-12">
<?php echo $requirements?>
</div>

  </div>
 
</div>
<div class="col-sm-12 col-xs-12 data_sends" id="">
  <span class="col-sm-4 col-xs-12 "></span>
   <span class="col-sm-4 col-xs-12 ">
     <span class="btn theme_bg send_replys" role="approved">Decline</span> 
     <span class="btn theme_bg send_replys" role="implementation">Accept</span>
   </span>
  
</div>
<div class="col-sm-12 col-xs-12 data_sends" id="">
  <div class="col-sm-12 col-xs-12" id="datasendserror">&nbsp;</div>
</div>
</div>
</div>

  </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function(){
        var loader=$("#loader").html();
     $(".send_replys").click(function(){
      var my_id=$("#global_u_email").val();
      var innovation=btoa('<?php echo $innovation?>');
      var save_role=btoa($(this).attr("role"));
        var txt;
  var r = confirm("Are you sure you want to proceed?, click OK to proceed or CANCEL to stop ?");
  if (r == true) {
       $("#datasendserror").html(loader);
      $.post("modules/system/investor/pages/Dashboard/reply.php",{innovation:innovation,save_role:save_role,my_id:my_id},function(data){
     if($.trim(data)=="success"){
     $.post("modules/system/investor/pages/Dashboard/Dashboard.php",{},function(data){
      
       $("#datasendserror").html("");
      $("#home").html(data)
     })
     }else{
      $("#datasendserror").html(data);
     }
      })
      
}else{

}
     })
    })
  </script>