<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
        $offset = $_POST['offset'];
       $no_of_records_per_page=10;
  
      $counter=$offset;
$sqlx="SELECT * FROM basic_informations LIMIT $offset,$no_of_records_per_page";

//$sqlx="SELECT * FROM innovations_table LIMIT $offset,$no_of_records_per_page";
//$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $Innovation_name=$row['innovationName'];
     // $Category=$row['Category'];
  $stage=$row['InnovationLevel'];
  $date_added=$row['created_at'];
   $Innovation_Id=$row['id'];
   /*  $time_d="";
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
  	$time_d="";
  }

    }



$image='';
/*
  if($Category=="Culture"){
$image='images/icons/culture.jpg';
  }else{
  	$image='images/icons/heritage.jpg';
  }
  */
  $counter=$counter+1;
  if($counter % 2 != 0){ 

?>
<div class="col-sm-12 no_padding col-xs-12 innovations_holder">
<div class="col-sm-1  col-xs-1"><?php echo $counter?></div>
  <div class="col-sm-7 col-xs-9"><?php echo $Innovation_name?></div>

  <div class="col-sm-2 mobile_hidden no_padding col-xs-2"><strong><?php echo $date_added?> </strong> </div>
   
  <div class="col-sm-2 col-xs-1"><strong><span id="<?php echo $Innovation_Id ?>" class=" veiw_evaluategk "><i class="fa fa-eye "></i><span class="mobile_hidden"> View</span></span> </strong> </div>
</div>


<?php
}else{
	?>
	<div class="col-sm-12 col-xs-12 even_row no_padding innovations_holder">
<div class="col-sm-1  col-xs-1"><?php echo $counter?></div>
  <div class="col-sm-7 col-xs-9"><?php echo $Innovation_name?></div>

  <div class="col-sm-2 mobile_hidden no_padding col-xs-2"><strong><?php echo $date_added?> </strong> </div>
   
  <div class="col-sm-2 col-xs-1"><strong><span id="<?php echo $Innovation_Id ?>" class=" veiw_evaluategk "><i class="fa fa-eye "></i><span class="mobile_hidden"> View</span></span> </strong> </div>

</div>
<?php
}
}


?>
<script type="text/javascript">
	$(document).ready(function(){
		var view_evaluate=".veiw_evaluategk";
var target="#infor_datas";
$(view_evaluate).click(function(){
  var innovation=$(this).attr("id");
var url="modules/system/content_team/pages/view/information.php";
$.post(url,{innovation:innovation},function(data){$("#filtered_data").hide();$(target).html(data);$(target).show()});
})
	})
</script>