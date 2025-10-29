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

<div class="col-sm-12 col-xs-12">
	<div class="col-sm-12 col-xs-12 default_header" style="border-bottom:2px solid #000">Closed chats</div>

<?php
include("../../../../../connect.php");
?>

<div class="col-sm-12 col-xs-12 no_padding" style="max-height: 200px;overflow: auto;min-height: 120px;">
<?php

$sqlxo="SELECT * FROM chat_backup where status='done' GROUP BY email";
    $query_runxl=mysqli_query($con,$sqlxo) or die($query_runxl."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxl)){
  $chart_idn=$row['chart_id'];
   $fname=$row['fname'];
    $sname=$row['sname'];
    $email=$row['email'];
    $allcaths=0;
    if($fname){
$caths = mysqli_query($con,"SELECT * FROM chat_backup where email='$email' ");
$allcaths = mysqli_num_rows($caths);

?>
<div class="col-sm-3 col-xs-6">
<div class="col-sm-12 col-xs-12 basic_opc">
<div class="col-sm-12 col-xs-12 charts_kichwad">
		<!--<div class="led-box">
     <div class="led-green"></div>
  </div>-->	<?php echo $fname." (".$allcaths.")"?> <span class="take_over btn theme_bg" style="float:right;" id="<?php echo $email?>">View</span>


		</div>
</div>	
</div>
<?php
}else{

}

}
?>
</div>
<div class="col-sm-12 col-xs-12" id="masterchatarea"></div>

<script type="text/javascript">
  $(document).ready(function(){
  	$(".take_over").click(function(){
      let chart_id=btoa($(this).attr("id"))
      //alert(chart_id)

   var user=$("#user_email").val();
   $.post("modules/system/communications/pages/closed_chats/userchats.php",{chart_id:chart_id,user:user},function(data){
          $("#home").html(data);
           $("#masterchatsholder").hide();
        
         })
    })
  })
</script>