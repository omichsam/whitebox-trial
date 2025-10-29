<style type="text/css">
.view_evaluation{
    cursor:pointer;
    float:right;
}
  .data_dvsz{
    min-height: 100px;
    margin-top: 10px;
    box-shadow: 2px 2px 2px #ddd;
    background:#ddd;
    border-radius: 5px;
      cursor: pointer;

    margin-bottom: 5px;

  }
  .data_dvsz:hover{
    box-shadow: 0 0 15px #000;

  }
  .innovation_data{
    min-height: 10px;

  }
  .count_holder{
min-height: 20px;
box-shadow: 0 0 2px #ccc;
border-radius: 5px;
text-align: center;
font-size: 32px;
font-weight:bolder;
  }
  .button_viewinno{
    cursor: pointer;
    text-align: right;
    text-transform: uppercase;
    font-weight: bold;
    color: #e7663c;

  }
  .data_outer{
    border-radius: 5px;
    border:#e6b234  solid 2px;
  }
  .lower_datas{
    border-right: 2px solid #ccc;
    margin-top: 5px;
    box-shadow: 0 0 3px #ccc;
    min-height: 200px;
    text-align: center;
    padding-top: 10px;
    margin-bottom: 5px;
  }
  #common_analyzer{
   margin-top: 5px;
   box-shadow: 0 0 3px #ccc; 
   border-right: 2px solid #ccc;
  }
  .style_data{
  }
  .dash_hold{
    margin-top: 10px;
    border:dashed #ccc 3px;
    padding-bottom: 5px; 
  }
</style>

<div class="col-sm-12 no_padding col-xs-12" id="main_dashbod" >
<div class="col-sm-12 col-xs-12 default_header" id="main_welcomd">
WELCOME TO THE DASHBOARD
</div>
<div class="col-sm-12 no_padding col-xs-12" id="dash_sambet">
  <?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$my_user=$_POST['my_id'];
$data_status="pending";
$my_userde=$my_user;
$get_user=mysqli_query($con,"SELECT Id FROM administrators WHERE user_name='$my_userde'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
if($get){
  $User_id=$get['Id'];
}else{
  
}
 $sqlxe="SELECT * FROM basic_informations";
$query_runxe=mysqli_query($con,$sqlxe) or die($query_runxe."<br/><br/>".mysqli_error($con));
    while($row=mysqli_fetch_array($query_runxe)){
      $submistion=$submistion+1;
    }

$approved=$submistion;
    $implementation=0;
    $disapproved=0;
    $evaluation=0;
    //$submistion=0;
    $first_disapproved=0;
    $second_evaluation=$submistion;
    
    
$sqlx="SELECT * FROM innovations_table  Where status!='$data_status'";
//$counter=0;

    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $Innovation_name=$row['Innovation_name'];
   $Status=$row['Status'];
   // $Status="disapproved";
    
$submistion=$submistion+1;
  if($Status=="evaluation"){
    $evaluation=$evaluation+1;
  }else if($Status=="second_evaluation"){
$evaluation=$evaluation+1;
$second_evaluation=$second_evaluation+1;
  }else if($Status=="approved"){
    $second_evaluation=$second_evaluation+1;
$approved=$approved+1;
  }else if($Status=="disapproved"){
    $second_evaluation=$second_evaluation+1;
    $disapproved=$disapproved+1;
  }else if($Status=="first_disapproved"){
$first_disapproved=$first_disapproved+1;
  }else if($Status=="implementation"){
    $second_evaluation=$second_evaluation+1;
$implementation=$implementation+1;
$approved=$approved+1;
  }else{

  }
 }
 


$header="";
$innovation_count=0;
$style_data="";
for($data=1;$data<=2;$data++){
  if($data==1){
  $style_data="style_data"; 
  $evaluation_gdata="FIRST EVALUATION";
}else{
  $style_data="";
  $evaluation_gdata="SECOND EVALUATION";
}



  ?>
<div class="col-sm-6 col-xs-12 no_padding dash_hold <?php echo $style_data?>">
<div class="col-sm-12 col-xs-12 default_header"><?php echo $evaluation_gdata?></div>
  <?php

    if($data==1){
for($div=1;$div<=3;$div++){
  if($div=="1"){
$my_role="evaluation";
$header="SUBMITTED";
$innovation_count=$submistion;
  }else if($div=="2"){
      $header="Accepted";
$my_role="second_evaluation";

$innovation_count=$second_evaluation;
  }else if($div=="3"){
$header="Declined";
$my_role="first_disapproved";
$innovation_count=$first_disapproved;
  }else {
  }

?>
<div class="col-sm-4 col-xs-6 ">
  <div class="col-sm-12 col-xs-12 no_padding data_dvsz" role="<?php echo $my_role?>">
    <div class="col-sm-12 no_padding col-xs-12 data_outer">
    <div class="col-sm-12 col-xs-12 default_header"><?php echo $header?></div>
    <div class="col-sm-12 col-xs-12 no_padding innovation_data"></div>
    <div class="col-sm-12 col-xs-12 no_padding">
    <div class="col-sm-4 col-xs-4 no_padding">  

    </div>
    <div class="col-sm-4 col-xs-4 no_padding count_holder" id="count_holder"><?php echo $innovation_count?>
    </div>  

    </div>
    <div class="col-sm-12 col-xs-12 no_padding">
    <div class="col-sm-4 col-xs-4 no_padding">  

    </div>
    <div class="col-sm-4 col-xs-4 no_padding ">
    </div>  
       <div class="col-sm-4 col-xs-4 no_padding ">
        <span class="button_viewinno">View </span>
    </div>
    </div>
  </div>
</div>



</div>
<?php
}
}else{

for($div=1;$div<=3;$div++){
  if($div=="1"){
      
      $header="Accepted";
$my_role="approved";  
$innovation_count=$approved;

  }else if($div=="2"){
$my_role="disapproved";   
$header="Declined";
$innovation_count=$disapproved;
  }else {
  $my_role="implementation";
    $header="Implemented";
$innovation_count=$implementation;
  }

?>
<div class="col-sm-4 col-xs-6 ">
  <div class="col-sm-12 col-xs-12 no_padding data_dvsz" role="<?php echo $my_role?>">
    <div class="col-sm-12 no_padding col-xs-12 data_outer">
    <div class="col-sm-12 col-xs-12 default_header"><?php echo $header?></div>
    <div class="col-sm-12 col-xs-12 no_padding innovation_data"></div>
    <div class="col-sm-12 col-xs-12 no_padding">
    <div class="col-sm-4 col-xs-4 no_padding">  

    </div>
    <div class="col-sm-4 col-xs-4 no_padding count_holder" id="count_holder"><?php echo $innovation_count?>
    </div>  

    </div>
    <div class="col-sm-12 col-xs-12 no_padding">
    <div class="col-sm-4 col-xs-4 no_padding">  

    </div>
    <div class="col-sm-4 col-xs-4 no_padding ">
    </div>  
       <div class="col-sm-4 col-xs-4 no_padding ">
        <span class="button_viewinno">View </span>
    </div>
    </div>
  </div>
</div>



</div>
<?php
}
}


  ?>
</div>
<?php
}
?>

</div>
<script type="text/javascript">
$('.count_holder').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 3000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});

</script>
<div class="col-sm-12 col-xs-12 default_header">
&nbsp;
</div>
<div class="col-sm-12 col-xs-12 default_header">
A SUMMARY OF THE INNOVATIONS
</div>
<div class="col-sm-12 col-xs-12 no_padding" id="common_analyzer">
<div class="col-sm-6 col-xs-12"><div class=" col-sm-12 lower_datas col-xs-12 " id="first_evaluation"></div></div>
<div class="col-sm-6 col-xs-12"><div class=" col-sm-12 lower_datas col-xs-12 " id="second_evaluation"></div></div>
<!--<div class="col-sm-6 col-xs-12"><div class=" col-sm-12 lower_datas col-xs-12 " id="Investor_analytics"></div></div>-->

</div>
</div>
<div class="col-sm-12 no_padding col-xs-12 not_shown" id="main_datashows" >
</div>
<script type="text/javascript">
$(document).ready(function(){

         $.get("modules/system/executive/pages/Dashboard/first_evaluation.php",function(data){
          $("#first_evaluation").html(data);
         })
         $.get("modules/system/executive/pages/Dashboard/second_evaluation.php",function(data){
          $("#second_evaluation").html(data);
  })
       /*$.get("modules/system/executive/pages/Dashboard/Investor_analytics.php",function(data){
          $("#Investor_analytics").html(data);
  })
       */
    
  var my_id=$("#user_email").val();
    $(".data_dvsz").click(function(){
     var my_role=btoa($(this).attr("role"));
    //alert(my_role)
       $.post("modules/system/executive/pages/Dashboard/more.php",{my_role:my_role,my_id:my_id},function(data){
          $("#common_analyzer").html(data);
  })
  })
  })
</script>