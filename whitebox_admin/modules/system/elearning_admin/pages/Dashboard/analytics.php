<style type="text/css">
  #table_headers{
    font-style: 11px;
    min-height: 30px;
    font-weight: bold;
    font-size: 19px;
    background:#ccc;
  }
  .table_datas{
    font-size: 11px;
   min-height: 30px;
   border-bottom: 2px solid #ccc;
   background: #fff;
   margin-top: 5px;
  }
  
  .table_dataedv{
    font-size: 11px;
   min-height: 30px;
   border-bottom: 2px solid #ccc;
   margin-top: 5px;
  }
  .container {
  background-size: cover;
  background: rgb(226,226,226); /* Old browsers */
  background: -moz-linear-gradient(top,  rgba(226,226,226,1) 0%, rgba(219,219,219,1) 50%, rgba(209,209,209,1) 51%, rgba(254,254,254,1) 100%); /* FF3.6+ */
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(226,226,226,1)), color-stop(50%,rgba(219,219,219,1)), color-stop(51%,rgba(209,209,209,1)), color-stop(100%,rgba(254,254,254,1))); /* Chrome,Safari4+ */
  background: -webkit-linear-gradient(top,  rgba(226,226,226,1) 0%,rgba(219,219,219,1) 50%,rgba(209,209,209,1) 51%,rgba(254,254,254,1) 100%); /* Chrome10+,Safari5.1+ */
  background: -o-linear-gradient(top,  rgba(226,226,226,1) 0%,rgba(219,219,219,1) 50%,rgba(209,209,209,1) 51%,rgba(254,254,254,1) 100%); /* Opera 11.10+ */
  background: -ms-linear-gradient(top,  rgba(226,226,226,1) 0%,rgba(219,219,219,1) 50%,rgba(209,209,209,1) 51%,rgba(254,254,254,1) 100%); /* IE10+ */
  background: linear-gradient(to bottom,  rgba(226,226,226,1) 0%,rgba(219,219,219,1) 50%,rgba(209,209,209,1) 51%,rgba(254,254,254,1) 100%); /* W3C */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e2e2e2', endColorstr='#fefefe',GradientType=0 ); /* IE6-9 */
  padding: 20px;
}

.led-box {
  height: 30px;
  width: 25%;
  
  float: left;
}


.led-green {
  margin: 0 auto;
  width: 24px;
  height: 24px;
  background-color: #0dff00;
  border-radius: 50%;
  box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #1a823b 0 -1px 9px, rgba(0, 100, , 0.5) 0 2px 12px;
  -webkit-animation: blinkRed 1.5s infinite;
  -moz-animation: blinkRed 1.5s infinite;
  -ms-animation: blinkRed 1.5s infinite;
  -o-animation: blinkRed 1.5s infinite;
  animation: blinkRed 1.5s infinite;
}

@-webkit-keyframes blinkRed {
    from { background-color: #0dff00; }
    50% { background-color: #00aa2a; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #1a823b 0 -1px 9px, rgba(255, 0, 0, 0.5) 0 2px 0;}
    to { background-color: #0dff00; }
}
@-moz-keyframes blinkRed {
    from { background-color: #0dff00; }
    50% { background-color: #00aa2a; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #1a823b 0 -1px 9px, rgba(255, 0, 0, 0.5) 0 2px 0;}
    to { background-color: #0dff00; }
}
@-ms-keyframes blinkRed {
    from { background-color: #0dff00; }
    50% { background-color: #00aa2a; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #1a823b 0 -1px 9px, rgba(255, 0, 0, 0.5) 0 2px 0;}
    to { background-color: #0dff00; }
}
@-o-keyframes blinkRed {
    from { background-color: #0dff00; }
    50% { background-color: #00aa2a; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #1a823b 0 -1px 9px, rgba(255, 0, 0, 0.5) 0 2px 0;}
    to { background-color: #0dff00; }
}
@keyframes blinkRed {
    from { background-color: #0dff00; }
    50% { background-color: #00aa2a; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #1a823b 0 -1px 9px, rgba(0, 100, 0, 0.5) 0 2px 0;}
    to { background-color: #0dff00; }
}

</style>

<div class="col-sm-12 col-xs-12">
  <div class="col-sm-12 col-xs-12 default_header">REAL TIME ANALYTICS</div>
<div class="col-sm-12 col-xs-12" id="table_headers">
    <div class="col-sm-1 col-xs-1">No.</div>
    <div class="col-sm-3 col-xs-4">NAME</div>
    <div class="col-sm-2 mobile_hidden">ACCOUNT</div>
    <div class="col-sm-2 col-xs-4">TIME IN</div>
    <div class="col-sm-2 mobile_hidden">TIME OUT</div>
    <div class="col-sm-2 col-xs-3">STATUS</div>
  </div>
  <?php 
  include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$status="online";
$admin="super_admin";

$sqlx="SELECT * FROM e_learning_admin where Status='$status'";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $status=$row['status'];
      $Name=$row['Name'];
  $Admin_role=$row['Admin_role'];
  $time_in=$row['time_in'];
  $time_out=$row['time_out'];
   if($Admin_role=="clerk"){
    $old_category="Evaluator";
 }else{
    $old_category=$Admin_role; 
 }
     $time_d="";
    $curenttime=time();
    $time_difference=$curenttime-$time_in;
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


$time_dout="";
    $curenttime=time();
    $time_doutifference=$curenttime-$time_out;
    $seconds=$time_doutifference;
    $minutes=round($seconds/60);//minutes
    $hours=round($seconds/3600);//hours
    $days=round($seconds/86400);//days
    $weeks=round($seconds/604800);//weeks
    $months=round($seconds/2629440);//months
    $years=round($seconds/31553380);//years



    if($seconds<=60){
     $time_dout="Just now";
    }else if($minutes<=60){
      if($minutes==1){

        $time_dout="One minute ago";
      }else{
        $time_dout="$minutes minutes ago";
      }

    }elseif($hours<=24){

   if($hours==1){
    $time_dout="An hour ago";
   }else{
    $time_dout="$hours hrs ago";
   }


    }else if($days<=7){
    if($days==1){
      $time_dout="Yesterday";
    }else{
      $time_dout="$days days ago";
    }


    }else if($weeks<=4.3){
     if($weeks==1){
      $time_dout="A week ago";
     }else{
      $time_dout="$weeks weeks ago";
     }

    }else if($months<=12){

      if($months==1){
        $time_dout="A month ago";
      }else{

        $time_dout="$months months ago";
      }
    }else{
  if($years==1){

    $time_dout="A year ago";
  }else{
    $time_dout="";
  }

    }







  $counter=$counter+1;
  if($counter % 2 != 0){
    ?>
  <div class="col-sm-12 col-xs-12 table_datas" id="">
    <div class="col-sm-1 col-xs-1"><?php echo $counter?></div>
    <div class="col-sm-3 col-xs-4"><?php echo $Name?></div>
    <div class="col-sm-2 mobile_hidden"><?php echo $old_category?></div>
    
    <div class="col-sm-2 col-xs-4"><?php echo $time_d?></div>
    <div class="col-sm-2 mobile_hidden"><?php echo $time_dout?></div>
    <div class="col-sm-2 col-xs-3">
       <span class="mobile_hidden">Online</span> <div class="led-box">
     <div class="led-green"></div>
  </div>
</div>
  </div>
  <?php
}else{
  ?>
<div class="col-sm-12 col-xs-12 table_dataedv" id="">
      <div class="col-sm-1 col-xs-1"><?php echo $counter?></div>
    <div class="col-sm-3 col-xs-4"><?php echo $Name?></div>
    <div class="col-sm-2 mobile_hidden"><?php echo $old_category?></div>
    
    <div class="col-sm-2 col-xs-4"><?php echo $time_d?></div>
    <div class="col-sm-2 mobile_hidden"><?php echo $time_dout?></div>
    <div class="col-sm-2 col-xs-3">
       <span class="mobile_hidden">Online</span> 
       <div class="led-box">
     <div class="led-green"></div>
  </div>
</div>
  </div>



  <?php
}
}
?>
</div>
<script type="text/javascript">
$(document).ready(function(){
    setTimeout(get_analytics, 10000);
  })
  function get_analytics(){

  //$.get("modules/system/super_admin/pages/Dashboard/analytics.php",function(data){$("#lower_analytics").html(data)})
}

</script>