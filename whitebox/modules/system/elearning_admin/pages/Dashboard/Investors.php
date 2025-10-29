<style type="text/css">
  #table_headers{
   
    min-height: 30px;
    font-weight: bold;
    font-size: 15px;
    background:#ccc;
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

</style>

<div class="col-sm-12 col-xs-12">
 <div class=" col-sm-12 col-xs-12 no_padding">
  <div class="col-sm-12 col-xs-12 default_header">INVESTORS </div>
  <div class="col-sm-12 no_padding col-xs-12 display_titles" id="table_headers">
  <div class="col-xs-4 col-sm-2  content_h" ><span class="mobile_hidden">&nbsp;&nbsp;&nbsp;&nbsp; </span>NAME</div>
  <div class="col-sm-2 col-xs-1 mobile_hidden" > COMPANY </div>
   <div class="col-xs-2 col-sm-2 mobile_hidden content_h" >INVESTOR TYPE</div>
  <div class="col-sm-2 col-xs-1 mobile_hidden" > INTEREST </div>
  <div class="col-sm-2 col-xs-1 mobile_hidden" > PHONE </div>
    <div class="col-sm-2 col-xs-1 mobile_hidden" > REGISTERED </div>   
</div>

</div>
  <?php 

  include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
 $counter=0;
$delete=mysqli_query($con,"DELETE FROM investor_list") or die(mysqli_error($con));


$sqlx="SELECT * FROM investors ";

    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
  $Name=$row['investorName'];
   $Company=$row['company_name'];
   $investor_type=$row['investor_type'];
   $Contact=$row['PhoneNumber'];
   $sector_id=$row['sector_id'];
   $Date_added=$row['created_at'];


$get_sector=mysqli_query($con,"SELECT name FROM sectors WHERE id='$sector_id'") or die(mysqli_error($con));
$getid=mysqli_fetch_assoc($get_sector);

 $interest=$getid['name'];


if($Name && $Company && $investor_type && $Contact && $interest){



   $investor_id=$row['id'];
  
      $counter=$counter+1;
    
       $time_d="";
    $curenttime=time();
    $time_difference=$curenttime-$Date_added;
    $seconds=$time_difference;
    $minutes=round($seconds/60);//minutes
    $hours=round($seconds/3600);//hours
    $days=round($seconds/86400);//days
    $weeks=round($seconds/604800);//weeks
    $months=round($seconds/2629440);//months
    $years=round($seconds/31553380);//years



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
    $time_d="";
  }

    }
  if($counter % 2 != 0){
    ?>
  <div class="col-sm-12 col-xs-12 row_viewsa table_datas" id="<?php echo $user_id?>">
    <div class="col-xs-4 col-sm-2  content_h" ><?php echo $counter.". ".$Name?></div>
  <div class="col-sm-2 col-xs-2 mobile_hidden" > <?php echo $Company?> </div>
   <div class="col-xs-2 col-sm-2 mobile_hidden" ><?php echo $investor_type?></div>
  <div class="col-sm-2 col-xs-2 mobile_hidden"> <?php echo $interest?> </div>
  <div class="col-sm-2 col-xs-2 mobile_hidden"> <?php echo $Contact?> </div>
    <div class="col-sm-2 col-xs-2 mobile_hidden"> <?php echo $time_d?> </div>
  </div>
  <?php
}else{
  ?>
<div class="col-sm-12 col-xs-12 row_viewsa table_data" id="<?php echo $user_id?>">
  <div class="col-xs-4 col-sm-2  content_h" ><?php echo $counter.". ".$Name?></div>
  <div class="col-sm-2 col-xs-2 mobile_hidden" > <?php echo $Company?> </div>
   <div class="col-xs-2 col-sm-2 mobile_hidden" ><?php echo $investor_type?></div>
  <div class="col-sm-2 col-xs-2 mobile_hidden"> <?php echo $interest?> </div>
  <div class="col-sm-2 col-xs-2 mobile_hidden"> <?php echo $Contact?> </div>
    <div class="col-sm-2 col-xs-2 mobile_hidden"> <?php echo $time_d?> </div>
  </div>



  <?php
  
}
}else{

}
}
?>
</div>
