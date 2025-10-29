
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
  <div class="col-sm-12 col-xs-12 default_header" id="head_fgt">FULL REPORT</div>
  <div class="col-sm-12 col-xs-12" id="feedback_disp">

<?php

include("../../../../connect.php");
//$my_user=$_POST['my_id'];
$reg_no=$_POST['reg_no'];
$new_implementors="";
$new_innovators="";
$new_funding="";
$new_communities="";
$busireasons_fields="";
$requirements_all="";
//$my_userde=$my_user;
$requirements_fields="";
$status="comments";
$my_replies="my_replies";
$questions="question";
//$my_userde=($my_user;
    $need_fields="";
      $solution_fields="";
  $impact_fields="";
  $businessmodel_fields="";
      $requirements_fields="";
  $target_feedback_fields="";
$reasonsqeu_feedback=""; 
$Report="";
$time_d="";
$petnership_implementors="";
$sqlx="SELECT * FROM county_issues where id='$reg_no'";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $Innovation_name=$row['Innovation_name'];
      
   $subject=$row['subject'];
      $Registration_no=$row['id'];
     $other_subject=$row['other_subject'];
$description=$row['description'];
$attachement=$row['attachement'];

$countyid=$row['countyid'];
$date_added =$row['date_added'];
$status=$row['status'];
if($attachement){
  $view_pdf="";
}else{
  $view_pdf="not_shown";
}
if($subject==="other"){
$newsubject=$other_subject;
}else{
$newsubject=$subject;
}
$counter=$counter+1;

  //$
  // $Innovation_Id=$row['Innovation_Id'];
  
}
  $get_user=mysqli_query($con,"SELECT county_name FROM counties WHERE id='$countyid'") or die(mysqli_error($con));

$get=mysqli_fetch_assoc($get_user);
if($get){
  $county_name=$get['county_name'];
}else{
$county_name="";
}
  //$
  // $Innovation_Id=$row['Innovation_Id'];






$getp_usero=mysqli_query($con,"SELECT * FROM departments WHERE id='$department_id'") or die(mysqli_error($con));
$getp=mysqli_fetch_assoc($getp_usero);
if($getp){

$departname=$getp['name'];

}else{

$departname="";
}


?>
<div class="col-sm-12 col-xs-12">
  <div class="col-sm-12 col-xs-12" id="reportcontrols">
    <div class="col-sm-6 col-xs-12"></div>
<div class="col-sm-2 col-xs-6">
<div class="col-sm-4 col-xs-4 printed" role="print" id="print_repoy" ><i class="fa fa-print fa-2x"></i></div>

  <!--<div class="col-sm-4 col-xs-4 printed" role="export"><i class="fa fa-save fa-2x"></i></div>-->

  <!--<div class="col-sm-4 col-xs-4 printed" role="export"><i class="fa fa-download fa-2x"></i></div>-->
</div>
<div class="col-sm-4 col-xs-6 no_padding" style="text-align:rigt">


 <span class=" btn theme_bg filter">Filter Out <i class="fa fa-trash"></i></span>

  <span class=" btn theme_bg forward">Re-forward <i class="fa fa-share"></i></span>
  <span class=" btn close_feedb"  style="background: red">Close <i class="fa fa-close"></i></span>

</div>
  </div>
<div class="col-sm-12 col-xs-12" id="filtered_dd">
<!--<div class="col-sm-12 col-xs-12 upper_display">
  <div class="col-sm-12 col-xs-12 top_fb"></div>
  <div class="col-sm-12 col-xs-12 default_header" id="innovation_fedheader"><?php echo $Innovation_name?></div>
  <div class="col-sm-12 col-xs-12 top_fb"></div>

  <div class="col-sm-12 col-xs-12 top_fb"> </div>

</div>--->

<div class="col-sm-12 col-xs-12 feedback_dives" >
  <div class="col-sm-12 col-xs-12 ">
    <div class="col-sm-12 col-xs-12 ">
    <div class="colsm-1 col-xs-2">
    SUBJECT: </div>
     <div class="colsm-11 col-xs-10">
  <?php echo $subject?>
</div>
</div>
 <div class="col-sm-12 col-xs-12 ">
    <div class="colsm-1 col-xs-2">
   ASSIGNED TO: </div>
     <div class="colsm-11 col-xs-10">

  <?php

$sqlxk="SELECT * FROM assigned_issues WHERE issue_id ='$reg_no'";

    $query_runxp=mysqli_query($con,$sqlxk) or die($query_runxp."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxp)){
    $department_id=$row['department_id'];

$getp_usero=mysqli_query($con,"SELECT * FROM departments WHERE id='$department_id'") or die(mysqli_error($con));
$getp=mysqli_fetch_assoc($getp_usero);
if($getp){

$departname=$getp['name'];

}else{

$departname="";
}
  
   echo $departname.".  ";



}
   ?>




</div>
</div>
  <div class="col-sm-12 col-xs-12 narative_side">
    <div class="col-sm-1 col-xs-2 ">CONTENT:</div>
    <div class="col-sm-11 col-xs-11">
 <?php echo $description?>
</div>

  </div>
 
</div>
     </div>
    
   </div>
 </div>
</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
      var reg_no='<?php echo $reg_no?>';
  
     $(".forward").click(function(){
       $.post("modules/system/callcenter/view/reforward.php",{reg_no:reg_no
       },function(data){
        $("#home").html(data);

       })
     })

     $(".filter").click(function(){
       $.post("modules/system/callcenter/view/filterout.php",{reg_no:reg_no
       },function(data){
        $("#home").html(data);

       })
     })
    $(".close_feedb").click(function(){
       $.post("modules/system/callcenter/view/view.php",{
       },function(data){
        $("#home").html(data);

       })
    })
  })
</script>