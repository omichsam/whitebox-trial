<style type="text/css">
	.chart_kubwa{
		min-height: 250px;
		max-height: 250px;
		overflow: auto;
		box-shadow: 0px 0px 2px #ccc;
		border-radius:10px;
		margin-top: 10px;
		background: #fff;
		padding-top: 10px;
		padding-bottom: 10px;
	}
	.chart_ndogo{
min-height: 50px;
		max-height: 50px;
		overflow: auto;
		box-shadow: 0px 0px 2px #ccc;
		border-radius:10px;
		margin-top: 10px;
		background: #fff;
	}
	.charts_kichwa{
		text-align: center;
		text-transform: uppercase;
		font-weight: bold;
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
   .my_messages{
    min-height:30px;
    border:1px solid #ccc;
    
    border-radius:0px 10px 10px 10px;
    
    }
    .modmessages{
      min-height:30px;
    border:1px solid #ccc;
    border-radius:10px 0px 10px 10px; 
    font-size:12px;
    }
    .holder_messages{
        margin-top:5px;
    }
    .time_agos{
        font-size:10px;
    }
    #message_ddf{
        min-height:200px;
       
    }
    #message_send{
        resize:none;
    }
    .id_name_holders{
        margin-top:5px;
        min-height:10px;
    }
    .my_messages:before{
        /*content: '';
position: absolute;
height: 15px;
width: 15px;
z-index: -4;
left: -9px;
top: 2px;
transform: rotate;
transform: rotate;
rotate: 45deg;
border-left: 1px solid #ccc;
border-bottom: 1px solid #ccc; */
    }
    .basic_opc{
    	min-height: 50px;
    	box-shadow: 0 0 2px #ccc;
    	border-radius: 10px;
    	margin-top: 2px;

    }

	.charts_kichwad{
		text-align: center;
		text-transform: uppercase;
		font-weight: bold;
		margin-top: 5px;
	}

</style>


<?php
include("../../../../../connect.php");
$chart_id=$_POST['chart_id'];


 
?>

	<div class="col-sm-12 col-xs-12 no_padding" style="color:#000">


<?php
//$chart_email=$_POST['my_id'];
$chechactiveness="";

   
   
  $sqlx="SELECT * FROM chartbot WHERE chat_id='$chart_id' or Status='general'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
  $date_added=$row['time_added'];
  $mesage=$row['message'];
  $sender=$row['sender'];
  $account=$row['sender_type'];
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


 $mysound="";
    if($seconds<=60){

 if($seconds<=10){


     $time_d="now";
     $mysound="now";
   }else{

   }
    }else if($minutes<=60){
      if($minutes==1){

        $time_d="1min";
      }else{
if($minutes<=5){
$chechactiveness="";
}else{
$chechactiveness="outoftime";
}



        $time_d="$minutes min";
      }

    }elseif($hours<=24){

   if($hours==1){
    $time_d="1hr";
   }else{
    $time_d="$hours hrs";
   }


    }else if($days<=7){
    if($days==1){
      $time_d="1 day";
    }else{
      $time_d="$days days";
    }


    }else if($weeks<=4.3){
     if($weeks==1){
      $time_d="1 wk";
     }else{
      $time_d="$weeks wks";
     }

    }else if($months<=12){

      if($months==1){
        $time_d="1 month";
      }else{

        $time_d="$months months";
      }
    }else{
  if($years==1){

    $time_d="1 yr";
  }else{
    $time_d="";
  }

    }
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  if($account=="user"){
    $soundtab="no";
  ?>
  
  <div class="col-sm-12 no_padding col-xs-12 id_name_holders" id=""><?php echo $sender?></div>
 <div class="col-sm-12 no_padding col-xs-12 holder_messages">
  <div class="row">
    <div class="col-sm-1 no_padding col-xs-1">
    
    </div> 
    <div class="col-sm-8 col-xs-8 my_messages"><?php echo $mesage?></div>
     
   <div class="col-sm-3 col-xs-3 time_agos"><?php echo $time_d?></div>
 </div>  
 </div> 
 <?php
  }else{
     $soundtab="ok";
  ?>
    <div class="col-sm-12 no_padding col-xs-12 holder_messages">
        <div class="col-sm-12 no_padding col-xs-12 id_name_holders" style="text-align:right"><?php echo $sender?></div>
        <div class="row">
   <div class="col-sm-3 col-xs-3 time_agos" ><?php echo $time_d?></div>
    <div class="col-sm-8 col-xs-8 modmessages"><?php echo $mesage?></div>
      <div class="col-sm-1 no_padding col-xs-1">
       
    </div> </div>
 </div> 
 <?php 
      
  }
    }
 ?>








</div>

	
   