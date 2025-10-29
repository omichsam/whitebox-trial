<style type="text/css">
	
	#header_innovation{
text-transform: uppercase;
text-align: center;
border-bottom: 1px solid #ccc;
border-radius:5px;

	}
	.innovations_holder{
		min-height: 40px;
		box-shadow: 0 0 2px #ccc;
		margin-top:5px;
		background:#fff;
    overflow: hidden;
    max-height: 30px;
    cursor: pointer;
    border-bottom:2px #ccc solid;
	}
    .innovations_headers{
    min-height: 40px;
    box-shadow: 0 0 2px #ccc;
    margin-top:5px;
    background:#fff;
    overflow: hidden;
    max-height: 30px;
    background:#ccc;
    font-weight: bolder;
  }
	.content_ino{
		min-height: 10px;
		box-shadow: 0 0 2px #ccc;
	}
	.header_innov{
		min-height: 10px;
		box-shadow: 0 0 2px #ccc;
	}
	.in_headers{
		text-transform: uppercase;
		border-bottom: 1px solid #ccc;
	}
	.content_h{

		text-transform: uppercase;
		font-weight: bolder;
	}
	.innovation_attachements{
		min-height: 180px;
		background-size: cover !important;
		background-repeat: no-repeat !important;
		background-position: center !important;

	}
  .even_row{
    background: #e3edf0;
  }
  .viewed{
background: #ccc;
  }
  .view_process{
    cursor: pointer;
  }
 
#filtered_data{
    min-height: 100px;
    max-height: 145px;
    overflow: auto;
    background: #fff;
  }
</style>
<?php
include "../../../../../connect.php";
$my_user=$_POST['my_id'];
include("../../../../functions/security.php");
$my_userde=encrypt($my_user,$key);

?>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-12 col-xs-12" id="header_innovation"><h4 id="filter_headers">INNOVATIONS ASSIGNED</h4></div>	

<div class="col-sm-12 col-xs-12" id="filtered_data">


<?php
$my_userde=encrypt($my_user,$key);
$get_user=mysql_query("SELECT * FROM investors WHERE Email='$my_userde'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
$User_id=$get['Investor_id'];

?>
<div class="col-sm-12 no_padding col-xs-12 innovations_headers">
<div class="col-sm-1  col-xs-1">No.</div>
  <div class="col-xs-3 col-sm-7 mobile_hidden content_h overflow_data" ><strong>INNOVATION NAME</strong></div>
  <div class="col-sm-2 mobile_hidden no_padding col-xs-2"><strong>RECIEVED </strong> </div>
   
  <div class="col-sm-2 col-xs-1"><strong>ACTION </strong> </div>
</div>
<?php
$counter=0;
$statusdd=encrypt("implementation",$key);
$sqlxg="SELECT * FROM innovation_investors where investor_id='$User_id'";

    $query_runxk=mysql_query($sqlxg) or die($query_runxk."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runxk)){
 $Innovation_Id=$row['innovation_id'];






$sqlx="SELECT * FROM innovations_table where Innovation_Id='$Innovation_Id' and Status='$statusdd'";

    $query_runx=mysql_query($sqlx) or die($query_runx."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runx)){
    $Innovation_name=base64_decode(decrypt($row['Innovation_name'], $key));
    $Category=base64_decode(decrypt($row['Category'], $key));
      $solution=base64_decode(decrypt($row['solution'], $key));
  $stage=base64_decode(decrypt($row['stage'], $key));
  $date_added=decrypt($row['date_added'], $key);
   $Innovation_Id=$row['Innovation_Id'];
     $time_d="";
    $curenttime=time();
    $time_difference=$curenttime-$Forwarding;
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



$image='';

  if($Category=="Culture"){
$image='images/icons/culture.jpg';
  }else{
  	$image='images/icons/heritage.jpg';
  }
  $counter=$counter+1;
  if($counter % 2 != 0){ 

?>
<div class="col-sm-12 no_padding col-xs-12 innovations_holder" id="<?php echo $Innovation_Id ?>">
<div class="col-sm-1  col-xs-1"><?php echo $counter?></div>
  <div class="col-xs-3 col-sm-7 mobile_hidden content_h overflow_data" ><?php echo $Innovation_name?> </div>

  <div class="col-sm-2 mobile_hidden no_padding col-xs-2"><strong><?php echo $time_d?> </strong> </div>
   
  <div class="col-sm-2 col-xs-1"><strong><span id="<?php echo $Innovation_Id ?>" class="view_process "><i class="fa fa-eye "></i><span class="mobile_hidden"> View</span></span> </strong> </div>
</div>


<?php
}else{
	?>
	<div class="col-sm-12 col-xs-12 even_row no_padding innovations_holder" id="<?php echo $Innovation_Id ?>">
<div class="col-sm-1  col-xs-1"><?php echo $counter?></div>
  <div class="col-xs-3 col-sm-7 mobile_hidden content_h overflow_data"><?php echo $Innovation_name?> </div>


  <div class="col-sm-2 mobile_hidden no_padding col-xs-2"><strong><?php echo $time_d?> </strong> </div>
   
  <div class="col-sm-2 col-xs-1"><strong><span id="<?php echo $Innovation_Id ?>" class="view_process "><i class="fa fa-eye "></i><span class="mobile_hidden"> View</span></span> </strong> </div>

</div>

<?php
}
}
}

?>



</div>
<div class="col-xs-12 col-sm-12 no_padding" id="graph_table"></div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
var view_evaluate=".innovations_holder";
var target="#home";
$(view_evaluate).click(function(){
var my_id=$("#global_u_email").val();
  var innovation=$(this).attr("id");
  //alert(innovation);
var url="modules/system/investor/pages/Dashboard/chart.php";
$.post(url,{innovation:innovation,
my_id:my_id},function(data){$(target).html(data)});
})
  })
</script>