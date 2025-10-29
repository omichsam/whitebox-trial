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
<div class="col-sm-12 col-xs-12" id="header_innovation"><h4 id="filter_headers">MY INNOVATIONS</h4></div>	

<div class="col-sm-12 col-xs-12" id="filtered_data">


<?php
$my_userde=encrypt($my_user,$key);
$get_user=mysql_query("SELECT User_id FROM external_users WHERE Email_address='$my_userde'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
$User_id=$get['User_id'];
$oldstatus="pending";
 $new_status=encrypt($oldstatus, $key);
$cheinnovations=mysql_query("SELECT * FROM innovations_table where user_id='$User_id' and Status!='$new_status'") or die(mysql_error());

  if(mysql_num_rows($cheinnovations)>1){

?>
<div class="col-sm-12 no_padding col-xs-12 innovations_headers">
<div class="col-sm-1  col-xs-1">No.</div>
  <div class="col-xs-3 col-sm-7 mobile_hidden content_h overflow_data" ><strong>INNOVATION NAME</strong></div>
  <div class="col-sm-2 mobile_hidden no_padding col-xs-2"><strong>SUBMITTED </strong> </div>
   
  <div class="col-sm-2 col-xs-1"><strong>ACTION </strong> </div>
</div>
<?php

}else{

}

$sqlx="SELECT * FROM innovations_table where user_id='$User_id' and Status!='$new_status'";
$counter=0;
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
    $time_difference=$curenttime-$date_added;
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
  <div class="col-xs-3 col-sm-7  overflow_data" style="text-align:left"><?php echo $Innovation_name?> </div>

  <div class="col-sm-2 mobile_hidden no_padding col-xs-2"><?php echo $time_d?></div>
   
  <div class="col-sm-2 mobile_hidden col-xs-1"><span id="<?php echo $Innovation_Id ?>" class="view_process "><i class="fa fa-eye "></i><span class=""> View Progress</span></span>  </div>
</div>


<?php
}else{
	?>
	<div class="col-sm-12 col-xs-12 even_row no_padding innovations_holder" id="<?php echo $Innovation_Id ?>">
<div class="col-sm-1  col-xs-1"><?php echo $counter?></div>
  <div class="col-xs-3 col-sm-7 overflow_data" style="text-align:left"><?php echo $Innovation_name?> </div>


  <div class="col-sm-2 mobile_hidden no_padding col-xs-2"><?php echo $time_d?> </div>
   
  <div class="col-sm-2 mobile_hidden col-xs-1"><span id="<?php echo $Innovation_Id ?>" class="view_process "><i class="fa fa-eye "></i><span class="mobile_hidden"> View Progress</span></span>  </div>

</div>

<?php
}
}


?>



</div>
<div class="col-xs-12 col-sm-12 no_padding" id="graph_table"></div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
var view_evaluate=".innovations_holder";
var target="#graph_table";
$(view_evaluate).click(function(){
var my_id=$("#global_u_email").val();
  var innovation=$(this).attr("id");
  //alert(innovation);
var url="modules/system/external/pages/Dashboard/chart.php";
$.post(url,{innovation:innovation,
my_id:my_id},function(data){$(target).html(data)});
})
  })
</script>