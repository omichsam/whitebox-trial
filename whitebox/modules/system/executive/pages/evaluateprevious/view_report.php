
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
    min-height: 200px;
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
.basic_footer{
	min-height: 100px;
}
</style>

<div class="col-sm-12 col-xs-12">
	<div class="col-sm-12 col-xs-12 default_header" id="">Feedback</div>
	<div class="col-sm-12 col-xs-12" id="feedback_disp">

<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$innovation=$_POST['innovation'];
$sqlx="SELECT * FROM innovations_table where Innovation_Id='$innovation'";
$counter=0;
    $query_runx=mysql_query($sqlx) or die($query_runx."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runx)){
    $Innovation_name=base64_decode(decrypt($row['Innovation_name'], $key));
      $Category=base64_decode(decrypt($row['Category'], $key));
  $stage=base64_decode(decrypt($row['stage'], $key));
  $date_added=decrypt($row['date_added'], $key);
  // $Innovation_Id=$row['Innovation_Id'];
  
}
$sqly="SELECT * FROM innovation_details where innovation_id='$innovation'";

    $query_run=mysql_query($sqly) or die($query_run."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_run)){
    $need=base64_decode(decrypt($row['need'], $key));
      $impact=base64_decode(decrypt($row['impact'], $key));
  $solution=base64_decode(decrypt($row['solution'], $key));
  //$date_added=decrypt($row['date_added'], $key);

}
$sqlt="SELECT * FROM feedback where Innovation_id='$innovation'";

    $query_runrf=mysql_query($sqlt) or die($query_runrf."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runrf)){
    $need_feedback=base64_decode(decrypt($row['need_feedback'], $key));
      $solution_feedback=base64_decode(decrypt($row['solution_feedback'], $key));
  $impact_feedback=base64_decode(decrypt($row['impact_feedback'], $key));
  $businessmodel_feedback=base64_decode(decrypt($row['businessmodel_feedback'], $key));
      $requirements_feedback=base64_decode(decrypt($row['requirements_feedback'], $key));
  $attachments_feedback=base64_decode(decrypt($row['attachments_feedback'], $key));
 
  //$date_added=decrypt($row['date_added'], $key);

}
$sqlinfor="SELECT * FROM innovations_information where Innovation_Id='$innovation'";

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

  <div class="col-sm-12 col-xs-12 top_fb"> Following the innovation you submited to us, we have evaluated it and here are comments on your innovations.</div>

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
  What is the business model/ revenue streams/costs of project?
</div>
  <div class="col-sm-8 col-xs-12 narative_side">
    <div class="col-sm-12 col-xs-12 intro_head">Innovator's description on the innovation busines model</div>
    <div class="col-sm-12 col-xs-12">
<?php echo $busines_model?>
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
    <div class="col-sm-12 col-xs-12 intro_head">Innovator's description on the innovation requirements</div>
    <div class="col-sm-12 col-xs-12">
<?php echo $requirements?>
</div>
  </div>
  <div class="col-sm-4 col-xs-12 comments_side" >
    <div class="col-sm-12 col-xs-12 intro_head">Comments from evaluating team</div>
    <div class="col-sm-12 col-xs-12 coment_hold">
    <?php echo $requirements_feedback ?>
  </div>
  </div>
</div>
</div>
</div>

	</div>
<div class="col-sm-12 col-xs-12 " style="text-align: center; margin-top: 10px;">
	<span class="btn theme_bg forward_span" role="back">Back</span>  
  <span class="btn theme_bg forward_span" role="disaprove">Disapprove</span> 
	<span class="btn theme_bg forward_span" role="approve">Approve</span>
</div>
	</div>

<div class="col-sm-12 col-xs-12 basic_footer" id=""></div>
<script type="text/javascript">
	$(document).ready(function(){
		var innovation='<?php echo $innovation ?>';
		$(".forward_span").click(function(){
			var my_role=$(this).attr("role");
			if(my_role=="approve"){
				var url_forward="modules/system/executive/pages/evaluate/forward.php";
                $.post(""+url_forward+"",{innovation:innovation},function(data){
                	$("#home").html(data)
                })
           //$.post("")
			}else{
           var my_url="modules/system/executive/pages/view/view.php";
$.post(""+my_url+"",function(data){
        $("#home").html(data);})

			}
		})
	})
</script>