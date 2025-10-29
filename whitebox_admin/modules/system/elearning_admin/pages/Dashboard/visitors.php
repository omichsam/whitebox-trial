<style type="text/css">
  #visitors_header{
    min-height: 20px;
    font-weight: bold;
    font-size: 11px;
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
  .rows_data:hover{
    box-shadow: 0 0 7px;
    background:#e6b234;
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

<div class="col-sm-12 no_padding col-xs-12">
  <div class="col-sm-12 col-xs-12 default_header">All visitors to this portal</div>
<div class="col-sm-12 col-xs-12" id="visitors_header">
    <div class="col-sm-2 col-xs-2">No. Session_id</div>
    <div class="col-sm-1 col-xs-1">IP</div>
    <div class="col-sm-1 col-xs-1">type</div>
    <div class="col-sm-2 col-xs-2">Date visited</div>
    <div class="col-sm-4 col-xs-4">page visited</div>
    <div class="col-sm-1 col-xs-1">browser</div>
    <div class="col-sm-1 col-xs-1">Country</div>
  </div>
  <?php 

  include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
  $online="";
  $offline_data="";

$sqlx="SELECT * FROM analytics";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $visitor_id=$row['visitor_id'];
    $session_id=$row['session_id'];
    $country=$row['country'];
    $country_ip=$row['country_ip'];
    $device=$row['device'];
    $device_type=$row['device_type'];
    $device_width=$row['device_width'];
    $device_height=$row['device_height'];
    $browser=$row['browser'];
    $date_visited=$row['date_visited'];
    $page_visited=$row['page_visited'];
    $userid=$row['userid'];
    $repeat_status=$row['repeat_status'];
    $status=$row['status'];
    $from=$row['from'];
     /* $Name=base64_decode(decrypt($row['Name'], $key));
  $Admin_role=base64_decode(decrypt($row['Admin_role'], $key));
  $time_in=decrypt($row['time_in'], $key);
  $time_out=decrypt($row['time_out'], $key);
  if($status==$statusof){
  $online="Online";
$offline_data="";
}else{
  $online="Offline";
  $offline_data="not_shown";
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
    $time_d="$years years ago";
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
    $time_dout="$years years ago";
  }

    }



*/



  $counter=$counter+1;
  if($counter % 2 != 0){
    ?>
  <div class="col-sm-12 col-xs-12 rows_data table_datas" id="">
    <div class="col-sm-2 col-xs-2"><?php echo $counter.".  ".$session_id?></div>
    <div class="col-sm-1 col-xs-1"><?php echo $country_ip?></div>
    <div class="col-sm-1 col-xs-1"><?php echo $device_type?></div>
    <div class="col-sm-2 col-xs-2"><?php echo $date_visited ?></div>
    <div class="col-sm-4 col-xs-4"><?php echo $page_visited?></div>
    <div class="col-sm-1 col-xs-1"><?php echo $browser?></div>
    <div class="col-sm-1 col-xs-1"><?php echo $from?></div>
  </div>
  <?php
}else{
  ?>
<div class="col-sm-12 col-xs-12 rows_data table_data" id="">
    <div class="col-sm-2 col-xs-2"><?php echo $counter.".  ".$session_id?></div>
    <div class="col-sm-1 col-xs-1"><?php echo $country_ip?></div>
    <div class="col-sm-1 col-xs-1"><?php echo $device_type?></div>
    <div class="col-sm-2 col-xs-2"><?php echo $date_visited ?></div>
    <div class="col-sm-4 col-xs-4"><?php echo $page_visited?></div>
    <div class="col-sm-1 col-xs-1"><?php echo $browser?></div>
    <div class="col-sm-1 col-xs-1"><?php echo $from?></div>
  </div>



  <?php
}
}
?>
</div>
<script type="text/javascript">
$(document).ready(function(){
    setTimeout(data_visitors, 30000);
  })
  function data_visitors(){

  $.get("modules/system/elearning_admin/pages/Dashboard/visitors.php",function(data){$("#visitors").html(data)})
}

</script>