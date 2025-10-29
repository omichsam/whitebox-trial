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
  $displaymembers="not_shown";
$checkquestions=mysqli_query($con,"SELECT * FROM innovators_partners WHERE Innovation_Id='$innovation'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkquestions)!=0){
$displaymembers="";
}else{
$displaymembers="not_shown";
}
$sqlx="SELECT * FROM innovations_table where Innovation_Id='$innovation'";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $Innovation_name=$row['Innovation_name'];
      //$Category=$row['Category'];
  $stage=$row['stage'];
  $date_added=$row['date_added'];
   $Innovation_Id=$row['Innovation_Id'];
  $sector_id=$row['sector_id'];


  $InnovationBig4Sector=$row['InnovationBig4Sector'];

$get_sector=mysqli_query($con,"SELECT name FROM sectors WHERE id='$sector_id'") or die(mysqli_error($con));
$getid=mysqli_fetch_assoc($get_sector);

 $newsector=$getid['name'];
 $get_bigfoursectors=mysqli_query($con,"SELECT Name FROM bigfoursectors WHERE id='$InnovationBig4Sector'") or die(mysqli_error($con));
$getbigid=mysqli_fetch_assoc($get_bigfoursectors);

 $bg4id_name=$getbigid['Name'];


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
<div class="col-sm-12 col-xs-12 evaluate_header" id="">EVALUATE INNOVATIONS HERE</div>
<div class="col-sm-12 col-xs-12 no_padding">
<div class="col-sm-12 col-xs-12 ">
  <div class="col-sm-12 col-xs-12 innovation_areas" id="innovation_area">
    
  <div class="col-sm-12 col-xs-12 evaluate_header">INNOVATION DETAILS <span class="btn theme_bg view_moredetails" id="<?php echo $Innovation_Id?>" style="float: right;">view Details</span></div>
 <div class="col-sm-12 col-xs-12 innovation_td">
   <div class="col-xs-12 col-sm-12 no_padding table_data ">
  <div class="col-xs-2 col-sm-2 table_data table_header">Name</div>

  <div class="col-xs-10 col-sm-10 table_data "><?php echo $Innovation_name?></div>
</div>
   <div class="col-xs-12 col-sm-12 no_padding table_data ">
  <div class="col-xs-2 col-sm-2 table_data table_header">Sector</div>

  <div class="col-xs-10 col-sm-10 table_data "><?php echo $newsector?></div>
</div>
 <div class="col-xs-12 col-sm-12 no_padding table_data ">
  <div class="col-xs-2 col-sm-2 table_data table_header">Big 4 Agenda</div>

  <div class="col-xs-10 col-sm-10 table_data "><?php echo $bg4id_name?></div>
</div>
 <div class="col-xs-12 col-sm-12 no_padding table_data ">
  <div class="col-xs-2 col-sm-2 table_data table_header">Stage</div>

  <div class="col-xs-10 col-sm-10 table_data "><?php echo $stage?></div>
</div>
</div>

<div class="col-sm-6 col-xs-12 <?php echo $displaymembers?>">
<div class="col-sm-12 col-xs-12 evaluate_header">MEMBERS/COMPANIES INVOLVED</div>
 <div class="col-sm-12 col-xs-12 base_inovation">

    <?php 


$checkExist=mysqli_query($con,"SELECT * FROM innovators_partners WHERE Innovation_Id='$innovation'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)!=0){
?>
<div class="col-sm-12 col-xs-12 table_header">
  <div class="col-sm-1 col-sm-1"></div>
  <div class="col-sm-7 col-sm-7">Member/company</div>

  <div class="col-sm-3 col-sm-3">Role</div>

</div>

<?php


$counting=0;
$sqlxo="SELECT * FROM innovators_partners where Innovation_Id='$innovation'";

    $query_runxd=mysqli_query($con,$sqlxo) or die($query_runxd."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxd)){
      $counting=$counting+1;
      $member_role=$row['member_role'];
  $member_name=$row['member_name'];
?>
<div class="col-sm-12 col-xs-12 table_rowers">
  <div class="col-sm-1 col-sm-1"><?php echo $counting?></div>
  <div class="col-sm-7 col-sm-7"><?php echo $member_name?></div>

  <div class="col-sm-3 col-sm-3"><?php echo $member_role?></div>

</div>

<?php


}

}else{

}

    ?>
  </div>
</div>

<div class="col-sm-6 col-xs-12">
<div class="col-sm-12 col-xs-12 evaluate_header">INNOVATORS' EXPECTATIONS</div>
  <div class="col-sm-12 col-xs-12 base_inovation">
    
    <?php 


$checkExist=mysqli_query($con,"SELECT * FROM innovation_expectation WHERE Innovation_id='$innovation'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)!=0){
?>
<div class="col-sm-12 col-xs-12 table_header">
  <div class="col-sm-1 col-sm-1"></div>
  <div class="col-sm-11 col-sm-11">Reasons for Submission</div>


</div>

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
    $(".view_moredetails").click(function(){
      var innovation=$(this).attr("id");
       $.post("modules/system/clerk/pages/evaluate/view_information.php",{innovation:innovation},function(data){
       $("#home").html(data);
       });
    })
    var user=$("#user_email").val();
    var loader=$("#loader").html()
    var display="#home";
    var innovation='<?php echo $innovation?>';
    var url="modules/system/clerk/pages/evaluate/view.php";
    var urlt="modules/system/clerk/pages/evaluate/evaluation.php"
    $(".evaluate_butn").click(function(){
      var my_role=$(this).attr("role");
      if(my_role=="evaluate"){
        //alert()
      $(display).html(loader)
    $.post(""+url+"",{innovation:innovation},function(data){$(display).html(data)})
    $.post(""+urlt+"",{innovation:innovation,user:user})
  }else{

// var innovation='<?php echo $innovation?>';
    var my_url="modules/system/clerk/pages/view/view.php";
$.post(""+my_url+"",function(data){
        $("#home").html(data);})


  }
    })
  
  })
</script>