
<?php
 session_start();
 if($_SESSION["id"]){

include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
?>
<div class="col-sm-12 col-xs-12">

    

<?php

 $Selected=encrypt($Selected,$key);	
 
$user=$_SESSION["username"];
$questions=base64_encode(encrypt("question",$key));
$my_decision=encrypt("waiting",$key);
$my_searchdata=encrypt($_POST['Selected'],$key);

    $date = time();
  $new_time=encrypt($date, $key);


   $get_user=mysql_query("SELECT Id FROM administrators WHERE  user_name='$user'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
  $user_id=$get['Id']; 
$checkquestions=mysql_query("SELECT Innovation_id FROM feedback WHERE Clerk_id='$user_id' and status='$questions' ") or die(mysql_error());

  if(mysql_num_rows($checkquestions)>=1){

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
$counter=0;

$checkExist=mysql_query("SELECT Innovation_id From feedback WHERE Clerk_id='$user_id' and status='$questions' and need_feedback like '%$Selected%' or Clerk_id='$user_id' and status='$questions' and solution_feedback like '%$Selected%' or Clerk_id='$user_id' and status='$questions' and businessmodel_feedback like '%$Selected%' or Clerk_id='$user_id' and status='$questions' and requirements_feedback like '%$Selected%'") or die(mysql_error());

  if(mysql_num_rows($checkExist)!=0){
  	$sqlxds="SELECT Innovation_id From feedback WHERE Clerk_id='$user_id' and status='$questions'";
    $query_runxjkh=mysql_query($sqlxds) or die($query_runxjkh."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runxjkh)){

$Innovation_id=$row['Innovation_id'];
$sqlx="SELECT * FROM innovations_table where Innovation_Id='$Innovation_id'";

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
<div class="col-sm-12 no_padding col-xs-12 innovations_holder">
<div class="col-sm-1  col-xs-1"><?php echo $counter?></div>
  <div class="col-sm-7 col-xs-9"><?php echo $Innovation_name?></div>

  <div class="col-sm-2 mobile_hidden no_padding col-xs-2"><strong><?php echo $time_d?> </strong> </div>
   
  <div class="col-sm-2 col-xs-1"><strong><span id="<?php echo $Innovation_Id ?>" class=" veiw_evaluate "><i class="fa fa-eye "></i><span class="mobile_hidden"> View Details</span></span> </strong> </div>
</div>


<?php
}else{
	?>
	<div class="col-sm-12 col-xs-12 even_row no_padding innovations_holder">
<div class="col-sm-1  col-xs-1"><?php echo $counter?></div>
  <div class="col-sm-7 col-xs-9"><?php echo $Innovation_name?></div>

  <div class="col-sm-2 mobile_hidden no_padding col-xs-2"><strong><?php echo $time_d?> </strong> </div>
   
  <div class="col-sm-2 col-xs-1"><strong><span id="<?php echo $Innovation_Id ?>" class=" veiw_evaluate "><i class="fa fa-eye "></i><span class="mobile_hidden"> View Details</span></span> </strong> </div>

</div>
<?php
}
}
}
}else{
echo "No record found";
}

?>

</div>

<?php
}
?>