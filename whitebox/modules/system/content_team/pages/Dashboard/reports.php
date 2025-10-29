<style type="text/css">
  #table_headers{
   
    min-height: 30px;
    font-weight: bold;
    font-size: 15px;
    background:#ccc;
    max-height:300px;
    overflow:auto;
  }
  .table_datas{
    font-size: 11px;
   min-height: 30px;
   border-bottom: 2px solid #ccc;
   background: #fff;
   margin-top: 5px;
   cursor: pointer;
  }
  .table_data{
    font-size: 11px;
   min-height: 30px;
   border-bottom: 2px solid #ccc;
   margin-top: 5px;
   cursor: pointer;
  }
  #main_hhpp{
      min-height:200px;
      max-height:281px;
      overflow:auto;
  }
  .inneranalytics{
      min-height:60px;
      box-shadow:0 0 2px #ccc;
      
  }
</style>

<div class="col-sm-12 col-xs-12" id='main_hhpp'>
  <div class="col-sm-12 col-xs-12 default_header">ALL INNOVATIONS</div>
<div class="col-sm-12 col-xs-12" id="table_headers">
    
    <div class="col-sm-6 col-xs-6">INNOVATION NAME</div>
    <div class="col-sm-2 col-xs-2">STAGE</div>
    <div class="col-sm-2 col-xs-2">STATUS</div>
    <div class="col-sm-2 mobile_hidden">SUBMITED</div>
  </div>
  <?php 

  include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$oldstate='pending';
$sqlx="SELECT * FROM innovations_table where Status!='$oldstate'";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $Innovation_name=$row['Innovation_name'];
    //  $Category=$row['Category'];
  $stage=$row['stage'];
  $date_added=$row['date_added'];
   $Innovation_Id=$row['Innovation_Id'];
  $Added_status=$row['Status'];

if($Added_status=="submission"){
$about_status="Submission";
  }else if($Added_status=="waiting"){
    $about_status="Pending";
$report_view="";
  }else if($Added_status=="evaluation"){
 $about_status="1st evaluation";
  }else if($Added_status=="second_evaluation"){
$report_view="";
$about_status="2nd evaluation";
  }else if($Added_status=="approved"){
$report_view="";
$about_status="Accepted";
  }else if($Added_status=="first_disapproved"){
$report_view="";
$about_status="Declined 1st";
  }else if($Added_status=="disapproved"){
$report_view="";
$about_status="Declined 2nd";
  }else if($Added_status=="implementation"){
$report_view="";
$about_status="Implimented";
  }else{

  }
  
  $curenttime=time();
    $time_difference=$curenttime-$date_added;
    $seconds=$time_difference;
    $minutes=round($seconds/60);//minutes
    $hours=round($seconds/3600);//hours
    $days=round($seconds/86400);//days
    $weeks=round($seconds/604800);//weeks
    $months=round($seconds/2629440);//months
    $years=round($seconds/31553380);//years


   $time_d="";
    if($seconds<=60){
     $time_d="Just now";
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


  
  
  
  
  
  
  
  
  
  
  
  
  
 $counter=$counter+1;

  if($counter % 2 != 0){
    ?>
  <div class="col-sm-12 col-xs-12 row_viewsa table_datas" id="<?php echo $user_id?>">
    <div class="col-sm-6 col-xs-6"><?php echo $counter." ".$Innovation_name?></div>
    <div class="col-sm-2 mobile_hidden"><?php echo $stage?></div>
    
    <div class="col-sm-2 col-xs-4"><?php echo $about_status?></div>
    <div class="col-sm-2 mobile_hidden"><?php echo $time_d?></div>
    
  </div>
  <?php
}else{
  ?>
<div class="col-sm-12 col-xs-12 row_viewsa table_data" id="<?php echo $user_id?>">
    <div class="col-sm-6 col-xs-6"><?php echo $counter." ".$Innovation_name?></div>
    <div class="col-sm-2 col-xs-4"><?php echo $stage?></div>
    
    <div class="col-sm-2 col-xs-4"><?php echo $about_status?></div>
    <div class="col-sm-2 mobile_hidden"><?php echo $time_d?></div>
  
  </div>



  <?php
  
}

}
?>
</div>
<!--<div class="col-sm-12 col-xs-12 no_padding">
    <?php
    for($d=1;$d<=6;$d++){
    ?>
    <div class="col-sm-2 col-xs-4">
        <div class="col-sm-12 col-xs-12 inneranalytics" >
            
        </div>
    </div>
    
    
    <?php
    
    }
    
    ?>
</div>-->

<style type="text/css">
.view_evaluation{
    cursor:pointer;
    float:right;
}
  .data_dvsz{
    min-height: 73px;
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
border-radius: 5px;
text-align: center;
font-size: 32px;
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
    min-height: 100px;
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

<div class="col-sm-12 no_padding col-xs-12">
  <?php

$my_user=$_POST['my_id'];
$data_status="pending";
$my_userde=$my_user;
$get_user=mysqli_query($con,"SELECT Id FROM administrators WHERE user_name='$my_userde'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
if($get){
$User_id=$get['Id'];
}else{

}
$approved=0;
    $implementation=0;
    $disapproved=0;
    $evaluation=0;
    $submistion=0;
    $first_disapproved=0;
    $second_evaluation=0;

    
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
    <!--<div class="col-sm-12 col-xs-12 no_padding">
    <div class="col-sm-4 col-xs-4 no_padding">  

    </div>
    <div class="col-sm-4 col-xs-4 no_padding ">
    </div>  
       <div class="col-sm-4 col-xs-4 no_padding ">
        <span class="button_viewinno">View </span>
    </div>
    </div>-->
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
    <!--<div class="col-sm-12 col-xs-12 no_padding">
    <div class="col-sm-4 col-xs-4 no_padding">  

    </div>
    <div class="col-sm-4 col-xs-4 no_padding ">
    </div>  
       <div class="col-sm-4 col-xs-4 no_padding ">
        <span class="button_viewinno">View </span>
    </div>
    </div>-->
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

