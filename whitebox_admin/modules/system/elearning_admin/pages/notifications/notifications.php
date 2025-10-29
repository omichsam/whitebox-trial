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
  <div class="col-sm-12 col-xs-12 default_header">INVESTORS/IMPLEMENTERS/PARTNERS PENDING APPROVAL FOR THE NON-DISCLOSURE AGREEMENT </div>
  <div class="col-sm-12 no_padding col-xs-12 display_titles" id="table_headers">
  <div class="col-xs-4 col-sm-2  content_h" ><span class="mobile_hidden">&nbsp;&nbsp;&nbsp;&nbsp; </span>NAME</div>
  <div class="col-sm-2 col-xs-4 " > COMPANY </div>
   <div class="col-xs-2 col-sm-2  content_h" >LOCATION</div>
  <div class="col-sm-1 col-xs-1 mobile_hidden" > OPTION </div>
  <div class="col-sm-2 col-xs-1 mobile_hidden" > PHONE </div>
    <div class="col-sm-3 col-xs-2 " > REGISTERED <span style="float:right">View</span></div>   
</div>

</div>
  <?php 

  include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
 $counter=0;
$delete=mysql_query("DELETE FROM investor_list") or die(mysql_error());

$aggrement=encrypt(base64_encode("agreed"), $key);
$aggrementstatus=encrypt(base64_encode("new"), $key);
$sqlx="SELECT * FROM investors Where aggrement='$aggrement' and agrement_status ='$aggrementstatus'";

    $query_runx=mysql_query($sqlx) or die($query_runx."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runx)){
  $Name=$row['Name'];
   $Company=$row['Company'];
   $Location=$row['Location'];
   $Contact=$row['Contact'];
   $interest=$row['interest'];

if($Name && $Company && $Location && $Contact && $interest){



   $investor_id=$row['Investor_id'];
  
      $counter=$counter+1;
    
         $Name=base64_decode(decrypt($row['Name'], $key));
     // $Category=$row['Category'];
  $Company=base64_decode(decrypt($row['Company'], $key));
  $Contact=base64_decode(decrypt($row['Contact'], $key));
  $Location=base64_decode(decrypt($row['Location'], $key));
   $interest=base64_decode(decrypt($row['interest'], $key));
   $Date_added=decrypt($row['Date_added'], $key);
   	$Email=$row['Email'];
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
  <div class="col-sm-2 col-xs-4 " > <?php echo $Company?> </div>
   <div class="col-xs-2 col-sm-2 " ><?php echo $Location?></div>
  <div class="col-sm-1 col-xs-2 mobile_hidden"> <?php echo $interest?> </div>
  <div class="col-sm-2 col-xs-2 mobile_hidden"> <?php echo $Contact?> </div>
    <div class="col-sm-3 col-xs-2 "> <?php echo $time_d?> <span class="open_disclosure" style="float:right" id="<?php echo $Email?>"><i class="fa fa-file-pdf-o"></i></span></div>
  </div>
  <?php
}else{
  ?>
<div class="col-sm-12 col-xs-12 row_viewsa table_data" id="<?php echo $user_id?>">  
<div class="col-xs-4 col-sm-2  content_h" ><?php echo $counter.". ".$Name?></div>
  <div class="col-sm-2 col-xs-4 " > <?php echo $Company?> </div>
   <div class="col-xs-2 col-sm-2 " ><?php echo $Location?></div>
  <div class="col-sm-1 col-xs-2 mobile_hidden"> <?php echo $interest?> </div>
  <div class="col-sm-2 col-xs-2 mobile_hidden"> <?php echo $Contact?> </div>
    <div class="col-sm-3 col-xs-2 "> <?php echo $time_d?> <span class="open_disclosure" style="float:right" id="<?php echo $Email?>"><i class="fa fa-file-pdf-o"></i></span></div>
 
  </div>



  <?php
  
}
}else{

}
}
?>
</div>
<div class="col-sm-12 col-xs-12 " style="text-align:center;margin-top:10px" id="disclo_loader"></div>
<script>
    $(document).ready(function(){
        $(".open_disclosure").click(function(){
            var loader=$("#loader").html();
            $("#disclo_loader").html(loader)
            var user=$(this).attr("id");
            //alert(user)
            $.post("modules/system/elearning_admin/pages/notifications/disclosure.php",{user:user},function(data){
                $("#home").html(data);
            })
        })
    })
</script>
