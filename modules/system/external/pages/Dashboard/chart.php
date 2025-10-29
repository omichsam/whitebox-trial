<style type="text/css">
  .process_show{
    background: #ddd;
border-radius: 50px;
margin-top: 5px;
margin-bottom: 5px;
min-height: 84px;
border:20px;
box-shadow: 0 0 3px #e7663c;
padding-top: 21px;
font-weight: bold;
padding-left: 5px;
font-size: 11px;
  }
   
  .arrowb{
    min-height: 84px;
    background-position: center !important;
    background-size: contain !important;
    background-repeat: no-repeat !important;
    background:url('images/icons/arrow.jpg');
  }
  .branched{
    min-height: 84px;
    background-position: center !important;
    background-size: contain !important;
    background-repeat: no-repeat !important;
    background:url('images/icons/branched.jpg');
  }
  .branch{
    min-height: 84px;
    background-position: center !important;
    background-size: contain !important;
    background-repeat: no-repeat !important;
    background:url('images/icons/branch.png');
  }
  @-webkit-keyframes argh-my-eyes {
    0%   { background-color: #fff; }
    49% { background-color: #fff; }
    50% { background-color: #fff; }
    99% { background-color: #fff; }
    100% { background-color: #e6b234; }
  }
  @-moz-keyframes argh-my-eyes {
    0%   { background-color: #e6b234; }
    49% { background-color: #e6b234; }
    50% { background-color: #fff; }
    99% { background-color: #fff; }
    100% { background-color: #e6b234; }
  }
  @keyframes argh-my-eyes {
    0%   { background-color: #e6b234; }
    49% { background-color: #e6b234; }
    50% { background-color: #fff; }
    99% { background-color: #fff; }
    100% { background-color: #e6b234; }
  }
  .process_now {
  -webkit-animation: argh-my-eyes 2.5s infinite;
  -moz-animation:    argh-my-eyes 2.5s infinite;
  animation:         argh-my-eyes 2.5s infinite;
}
.reviewed{
  background:#000;
  color:#fff;
}
</style>

<?php
include "../../../../../connect.php";
$my_user=$_POST['my_id'];
$innovation=$_POST['innovation'];
include("../../../../functions/security.php");
$my_userde=encrypt($my_user,$key);
$get_user=mysql_query("SELECT User_id FROM external_users WHERE Email_address='$my_userde'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
$User_id=$get['User_id'];
$sqlx="SELECT * FROM innovations_table where user_id='$User_id' and Innovation_Id='$innovation'";
$counter=0;
    $query_runx=mysql_query($sqlx) or die($query_runx."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runx)){
    $Innovation_name=base64_decode(decrypt($row['Innovation_name'], $key));
   $Status=decrypt($row['Status'], $key);
   // $Status="disapproved";
    $approved="";
    $implementation="";
    $disapproved="";
    $submistion="";
    $evaluation="";
    $second_evaluation="";
    $first_disapproved="";
    $wait="";
  if($Status=="submission"){
$submistion="process_now";
  }else if($Status=="waiting"){
$evaluation="process_now";
$submistion="reviewed"; 
$Status="first evaluation";
  }else if($Status=="evaluation"){
$evaluation="process_now";
$submistion="reviewed";
  }else if($Status=="second_evaluation"){
$evaluation="reviewed";
$submistion="reviewed";
$second_evaluation="process_now";

  }else if($Status=="approved"){
$approved="process_now";
$evaluation="reviewed";
$submistion="reviewed";
$second_evaluation="reviewed";
  }else if($Status=="first_disapproved"){
$first_disapproved="process_now";
$evaluation="reviewed";
$submistion="reviewed";

  }else if($Status=="disapproved"){
$disapproved="process_now";
$evaluation="reviewed";
$submistion="reviewed";
$second_evaluation="reviewed";
  }else if($Status=="implementation"){
$implementation="process_now";
$approved="reviewed";
$evaluation="reviewed";
$submistion="reviewed";
$second_evaluation="reviewed";
  }else{

  }
 }
 ?>
<div class="col-sm-12 col-xs-12 no_padding mobile_hidden">
  <div class="col-sm-12 col-xs-12 default_header"><?php echo $Innovation_name." at ".$Status." stage"?></div>
  <div class="col-sm-12 col-xs-12">&nbsp;</div>
<div class="col-sm-12 no_padding col-xs-12 ">
  <div class="col-sm-1 col-xs-1 "></div>
  <div class="col-sm-1 col-xs-1 "></div>
  <div class="col-sm-1 col-xs-1 "></div>
  <div class="col-sm-1 col-xs-1 "></div>
  <div class="col-sm-1 col-xs-1 <?php echo $first_disapproved?> process_show" role="Innnovation Declined at first evaluation stage">Declined</div>
  <div class="col-sm-1 col-xs-1 "></div>  
  <div class="col-sm-1 col-xs-1 "></div> 

  <div class="col-sm-1 col-xs-1 <?php echo $disapproved?> process_show" role="Innnovation Declined at second evaluation stage">Declined</div>
  <div class="col-sm-1 col-xs-1 "></div>
  <div class="col-sm-1 col-xs-1 "></div>  
  <div class="col-sm-1 col-xs-1 "></div>
  <div class="col-sm-1 col-xs-1 "></div>
</div>
<div class="col-sm-12 no_padding col-xs-12 ">

  
   <div class="col-sm-1 col-xs-1 <?php echo $submistion?>  process_show" role="Innovation submited has been recieved for evaluation">Submission Stage</div>
  <div class="col-sm-1 col-xs-1 arrowb"></div>
<div class="col-sm-1 col-xs-1 process_show <?php echo $evaluation?> " role="Innnovation is at first evalualtion stage ">1st Evaluation Stage</div>
  <div class="col-sm-2 col-xs-2 branch"></div>
  <div class="col-sm-1 col-xs-1 process_show <?php echo $second_evaluation?> " role="Innnovation is at Seccond evalualtion stage">2nd Evaluation Stage</div>
  <div class="col-sm-2 col-xs-2 branch "></div>   
  <div class="col-sm-1 col-xs-1  <?php echo $approved?> process_show " role="Innnovation is Succesfully accepted at second evaluation">Accepted</div>
  <div class="col-sm-2 col-xs-2 arrowb"></div> 
  <div class="col-sm-1 col-xs-1 <?php echo $implementation?>   process_show" role="Innnovation is at implementation stage">Implemetation Stage</div> 

</div>
<!--<div class="col-sm-12 col-xs-12 ">
  <div class="col-sm-1 col-xs-1 "></div>
  <div class="col-sm-1 col-xs-1 "></div>
  <div class="col-sm-1 col-xs-1 "></div>
  <div class="col-sm-1 col-xs-1 "></div>
  <div class="col-sm-2 col-xs-2 "></div>   
  <div class="col-sm-1 col-xs-1 "></div>
  <div class="col-sm-1 col-xs-1 "></div>
  <div class="col-sm-1 col-xs-1  <?php echo $approved?> process_show ">Approved</div>
  <div class="col-sm-2 col-xs-2 arrowb"></div> 
  <div class="col-sm-1 col-xs-1 <?php echo $implementation?>   process_show">Implemetation Stage</div> 
</div>-->



</div>

<script>
    $(document).ready(function(){
        $(".process_show").hover(function(){
            var data=$(this).attr("role");
        })
    })
</script>