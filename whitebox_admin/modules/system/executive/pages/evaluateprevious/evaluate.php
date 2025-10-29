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
    text-transform: uppercase;
    font-weight: bold;
    font-style: italic;

  }
  .table_data{
    box-shadow: 0 0 2px #ddd;
    min-height: 40px;
    text-align: center;
  }
  .table_header{
    background:#edf1f5;
    margin-top: 5px;
  }
  .base_inovation{
    min-height: 200px;
    margin-top: 8px;
    box-shadow: 0 0 2px #ccc;
  }
</style>

<?php

include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$innovation=$_POST['innovation'];
$sqlx="SELECT * FROM innovations_table where Innovation_Id='$innovation'";
$counter=0;
    $query_runx=mysql_query($sqlx) or die($query_runx."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runx)){
    $Innovation_name=base64_decode(decrypt($row['Innovation_name'], $key));
      $Category=base64_decode(decrypt($row['Category'], $key));
  $stage=base64_decode(decrypt($row['stage'], $key));
  $date_added=decrypt($row['date_added'], $key);
   $Innovation_Id=$row['Innovation_Id'];

$sqlxo="SELECT * FROM   innovation_details where Innovation_Id='$innovation'";
$counter=0;
    $query_runxd=mysql_query($sqlxo) or die($query_runxd."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runxd)){
  $need=base64_decode(decrypt($row['need'],$key));
  $solution=base64_decode(decrypt($row['solution'],$key));




}



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

  if($Category=="Culture"){
$image='images/icons/culture.jpg';
  }else{
  	$image='images/icons/heritage.jpg';
  }

}

?>
<div class="col-sm-12 col-xs-12 no_padding">
<div class="col-sm-12 col-xs-12 evaluate_header" id="">EVALUATE INNOVATIONS HERE</div>
<div class="col-sm-12 col-xs-12 no_padding">
<div class="col-sm-12 col-xs-12 ">
	<div class="col-sm-12 col-xs-12 innovation_areas" id="innovation_area">
		
	<div class="col-sm-12 col-xs-12 evaluate_header">INNOVATION DETAILS</div>
 <div class="col-sm-12 col-xs-12 innovation_td no_padding">
   <div class="col-xs-12 col-sm-4 no_padding table_data ">
  <div class="col-xs-12 col-sm-12 table_data table_header">Name</div>

  <div class="col-xs-12 col-sm-12 table_data "><?php echo $Innovation_name?></div>
</div>
   <div class="col-xs-12 col-sm-4 no_padding table_data ">
  <div class="col-xs-12 col-sm-12 table_data table_header">Category</div>

  <div class="col-xs-12 col-sm-12 table_data "><?php echo $Category?></div>
</div>
 <div class="col-xs-12 col-sm-4 no_padding table_data ">
  <div class="col-xs-12 col-sm-12 table_data table_header">Stage</div>

  <div class="col-xs-12 col-sm-12 table_data "><?php echo $stage?></div>
</div>
</div>

<div class="col-sm-6 col-xs-12">
<div class="col-sm-12 col-xs-12 evaluate_header">INNOVATION NEED</div>
 <div class="col-sm-12 col-xs-12 base_inovation">
    <?php echo $need?>
  </div>
</div>

<div class="col-sm-6 col-xs-12">
<div class="col-sm-12 col-xs-12 evaluate_header">INNOVATION SOLUTION</div>
  <div class="col-sm-12 col-xs-12 base_inovation">
    <?php echo $solution?>
  </div>
</div>
</div>
</div>
    
  




<div class="col-sm-12 col-xs-12">
<div class="col-sm-4 col-xs-12"></div>

<div class="col-sm-4 col-xs-12 "><span class="btn evaluate_butn theme_bg" role="back">Back</span> <span class="btn evaluate_butn theme_bg" role="evaluate">View Report</span> </div>

</div>

<div class="col-sm-12 col-xs-12 id_lowerfoot">
</div>

</div>
</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    var loader=$("#loader").html()
    var display="#home";
    var innovation='<?php echo $innovation?>';
   // var url="modules/system/executive/pages/evaluate/view.php";
    var urlt="modules/system/executive/pages/evaluate/view_report.php"
    $(".evaluate_butn").click(function(){
      var my_role=$(this).attr("role");
      if(my_role=="evaluate"){
        //alert()
      $(display).html(loader)
    $.post(""+urlt+"",{innovation:innovation},function(data){$(display).html(data)})
    //$.post(""+urlt+"",{innovation:innovation})
  }else{

// var innovation='<?php echo $innovation?>';
    var my_url="modules/system/executive/pages/view/view.php";
$.post(""+my_url+"",function(data){
        $("#home").html(data);})


  }
    })
  
  })
</script>