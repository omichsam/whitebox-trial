<style type="text/css">
  .evaluate_header{
    text-transform: uppercase;
    text-align: center;
    font-weight: bolder;
  }
  .innovation_areas{
    min-height: 400px;
    box-shadow: 0 0 2px #ccc;
    background:#fff;
    margin-top: 5px;
  }
  .coments{
    border: 1px solid #ccc;
    resize: none;
    min-height: 370px;
    margin-top: 5px;
    margin-bottom: 5px;
  }
  .evaluate_butn{
    margin-top: 5px;
  }
  .innovation_photos{
    min-height: 200px;
    box-shadow:0 0 2px #ccc;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
      }
  #time_display{
    text-align: right;
  }
  .id_lowerfoot{
    min-height: 50px;
  }
  .innovationbackground{
    min-height: 50px;
    box-shadow: 2px 2px 2px #ccc;
    border-radius: 5px;
    border:1px solid #ccc; 
    margin-top: 3px;
    font-weight: bold;
    padding-top: 5px;
  }
  .innovation_td{
    text-shadow: transparent;
    font-weight: bold;
    font-style: italic;

  }
  .table_data{
    box-shadow: 0 0 2px #ddd;
    min-height: 40px;

  }
  .table_header{
    margin-top: 4px;
    background:#edf1f5;
    font-weight: bolder;
    text-transform: uppercase;
    box-shadow: 0 0 2px #ddd;
  }
  .base_inovation{
    min-height: 200px;
    margin-top: 20px;
    box-shadow: 0 0 2px #ccc;
    margin-bottom: 20px;
  }
  .table_rowers{
    min-width: 40px;
    border-bottom: 1px solid #ccc;
  }
</style>

<?php

include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$innovation=$_POST['innovation'];
$sqlx="SELECT * FROM covid19_innovations where id='$innovation'";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $Innovation_name=$row['sector'];
  $need=$row['need'];
  $stage=$row['maturity'];
  $date_added=$row['date_added'];
   $Innovation_Id=$row['id'];
   $bg4id_name=$row['beneficiaries'];
   $newsector=$row['innovator_Identity'];
   $solution=$row['solution'];
/*
$update=mysqli_query($con,"UPDATE covid19_innovations SET need='$need',solution='$solution',sector='$select_category',maturity='$matured',beneficiaries ='$beneficiaries',implementation_plan='$implementation',success_indicators='$progess',innovator_Identity='$innovation_options',collaborations='$collaborate' WHERE user_id='$user_id' and Status='pending'") or die(mysqli_error($con));*/
/*
  $sector_id=$row['sector_id'];
  $InnovationBig4Sector=$row['InnovationBig4Sector'];

$get_sector=mysqli_query($con,"SELECT name FROM sectors WHERE id='$sector_id'") or die(mysqli_error($con));
$getid=mysqli_fetch_assoc($get_sector);

 $newsector=$getid['name'];
 $get_bigfoursectors=mysqli_query($con,"SELECT Name FROM bigfoursectors WHERE id='$InnovationBig4Sector'") or die(mysqli_error($con));
$getbigid=mysqli_fetch_assoc($get_bigfoursectors);

 $bg4id_name=$getbigid['Name'];
*/

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



$image='';


}

?>
<div class="col-sm-12 col-xs-12 no_padding">
<div class="col-sm-12 col-xs-12 evaluate_header" id="">EVALUATE INNOVATIONS HERE <span style="float: right;" id="<?php echo $innovation?>" class=" btn theme_bg Viewinford">View</span></div>
<div class="col-sm-12 col-xs-12 no_padding">
<div class="col-sm-12 col-xs-12 ">
  <div class="col-sm-12 col-xs-12 innovation_areas" id="innovation_area">
    
  <div class="col-sm-12 col-xs-12 evaluate_header">INNOVATION DETAILS</div>
 <div class="col-sm-12 col-xs-12 innovation_td">
   <div class="col-xs-12 col-sm-12 no_padding table_data ">
  <div class="col-xs-2 col-sm-2 table_data table_header">Innovation Sector</div>

  <div class="col-xs-10 col-sm-10 table_data "><?php echo $Innovation_name?></div>
</div>
   <div class="col-xs-12 col-sm-12 no_padding table_data ">
  <div class="col-xs-2 col-sm-2 table_data table_header">Innovator type</div>

  <div class="col-xs-10 col-sm-10 table_data "><?php echo $newsector?></div>
</div>
 <div class="col-xs-12 col-sm-12 no_padding table_data ">
  <div class="col-xs-2 col-sm-2 table_data table_header">Beneficiaries</div>

  <div class="col-xs-10 col-sm-10 table_data "><?php echo $bg4id_name?></div>
</div>
 <div class="col-xs-12 col-sm-12 no_padding table_data ">
  <div class="col-xs-2 col-sm-2 table_data table_header">Stage</div>

  <div class="col-xs-10 col-sm-10 table_data "><?php echo $stage?></div>
</div>
</div>

<div class="col-sm-6 col-xs-12">
<div class="col-sm-12 col-xs-12 evaluate_header">GAP IDENTIFIED</div>
 <div class="col-sm-12 col-xs-12 base_inovation">

<div class="col-sm-12 col-xs-12 table_header">
  <div class="col-sm-1 col-sm-1"></div>
  <div class="col-sm-7 col-sm-7">Innovation need</div>

  <div class="col-sm-3 col-sm-3"></div>

</div>

<div class="col-sm-12 col-xs-12 ">
  <?php echo $need;?>
 
</div>

  </div>
</div>

<div class="col-sm-6 col-xs-12">
<div class="col-sm-12 col-xs-12 evaluate_header">SOLUTION PROVIDED</div>
  <div class="col-sm-12 col-xs-12 base_inovation">
    

<div class="col-sm-12 col-xs-12 table_header">
  <div class="col-sm-1 col-sm-1"></div>
  <div class="col-sm-11 col-sm-11">Innovation Solution</div>


</div>

<div class="col-sm-12 col-xs-12 ">
  <div class="col-sm-12 col-sm-12"><?php echo $solution?></div>


</div>

  </div>
</div>
</div>
</div>
    
  




<div class="col-sm-12 col-xs-12">
<div class="col-sm-4 col-xs-12"></div>

<div class="col-sm-4 col-xs-12 "><span class="btn evaluate_butn theme_bg" role="back">Back</span> <span class="btn evaluate_butn theme_bg" role="evaluate">Evaluate</span> </div>

</div>

<div class="col-sm-12 col-xs-12 id_lowerfoot">
</div>

</div>
</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    var user=$("#user_email").val();
    var loader=$("#loader").html()
    var display="#home";
    var innovation='<?php echo $innovation?>';
    var url="modules/system/clerk/pages/covid/view.php";
    var urlt="modules/system/clerk/pages/covid/evaluation.php"
    $(".evaluate_butn").click(function(){
      var my_role=$(this).attr("role");
      if(my_role=="evaluate"){
        //alert()
      $(display).html(loader)
    $.post(""+url+"",{innovation:innovation},function(data){$(display).html(data)})
    $.post(""+urlt+"",{innovation:innovation,user:user})
  }else{

// var innovation='<?php echo $innovation?>';
    var my_url="modules/system/clerk/pages/covid/covid.php";
$.post(""+my_url+"",function(data){
        $("#home").html(data);})


  }
    })
  $(".Viewinford").click(function(){
    var innovation=$(this).attr("id");
        var my_url="modules/system/clerk/pages/covid/view_infor.php";
$.post(""+my_url+"",{innovation:innovation},function(data){
        $("#home").html(data);})
  })
  })
</script>