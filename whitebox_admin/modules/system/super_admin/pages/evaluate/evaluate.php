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
	.evaluate_btns{
		margin-top: 5px;
	}
	.innovation_photos{
		min-height: 150px;
		box-shadow:0 0 2px #ccc;
	}
	#time_display{
		text-align: right;
	}
	.id_lowerfoot{
		min-height: 50px;
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
<div class="col-sm-8 col-xs-12 ">
	<div class="col-sm-12 col-xs-12 innovation_areas" id="innovation_area">
		
	<div class="col-sm-12 col-xs-12 evaluate_header"><?php echo $Innovation_name?></div>

    <div class="col-sm-12 col-xs-12">
	<div class="col-sm-4 col-xs-6 ">
		<div class="col-xs-12 col-sm-12 innovation_photos" style="background:url(<?php echo $image?>);"></div>
	</div>
	National Museums of Kenya Innovation Portal is a product of National Museums of Kenya. It is a platform that seeks to bridge the gap between innovators and implementers. The portal identifies innovations and ideas that have high potential impact and links them to implementers who are seeking sustainable solutions.
	National Museums of Kenya Innovation Portal is a product of National Museums of Kenya. It is a platform that seeks to bridge the gap between innovators and implementers. The portal identifies innovations and ideas that have high potential impact and links them to implementers who are seeking sustainable solutions.
	National Museums of Kenya Innovation Portal is a product of National Museums of Kenya. It is a platform that seeks to bridge the gap between innovators and implementers. The portal identifies innovations and ideas that have high potential impact and links them to implementers who are seeking sustainable solutions.
	National Museums of Kenya Innovation Portal is a product of National Museums of Kenya. It is a platform that seeks to bridge the gap between innovators and implementers. The portal identifies innovations and ideas that have high potential impact and links them to implementers who are seeking sustainable solutions.
</div>
<div class="col-sm-12 col-xs-12" id="time_display"><strong><?php echo $time_d?> </strong> </div>
	</div>

</div>	

<div class="col-sm-4 col-xs-12 ">
	
<div class="col-sm-12 col-xs-12 innovation_areas" id="comment_area">
	<div class="col-sm-12 col-xs-12 evaluate_header">WRITE FEEDBACK HERE</div>
<textarea id="innovation_need" class="coments col-sm-12 col-xs-12"></textarea>
</div>

</div>	
</div>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-4 col-xs-12"></div>

<div class="col-sm-4 col-xs-12 "><span class="btn evaluate_btns theme_bg">Back</span> <span class="btn evaluate_btns theme_bg">Disapprove</span> <span class="btn evaluate_btns theme_bg">Approve</span> </div>

</div>

<div class="col-sm-12 col-xs-12 id_lowerfoot">
</div>


</div>