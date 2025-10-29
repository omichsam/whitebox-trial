<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
        $offset = $_POST['offset'];
        $role = $_POST['role'];
       $no_of_records_per_page=10;
  
$submission="submission";
      $counter=$offset;
$sqlx="SELECT * FROM notify_tray where Status='done' and action='$role' LIMIT $offset,$no_of_records_per_page";
 $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $Innovation_name=$row['Innovation_name'];
    $date_added=$row['date_added'];
   $Innovation_Id=$row['Innovation_Id'];
   $innovator_id=$row['innovator_id'];
   $host_id=$row['host_id'];
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



$get_user=mysqli_query($con,"SELECT * FROM users WHERE id='$Innovation_Id'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$innovator=$get['first_name']." ".$get['last_name'];
$image='';
$get_host=mysqli_query($con,"SELECT * FROM administrators WHERE Id='$host_id'") or die(mysqli_error($con));
$getd=mysqli_fetch_assoc($get_host);
$host=$getd['Name'];
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
  <div class="col-sm-6 col-xs-6 text_pagesd"><?php echo $counter." ".$Innovation_name?></div>
 <div class="col-sm-2 col-xs-2"><?php echo $innovator?></div>
 <div class="col-sm-2 col-xs-2"><?php echo $host?></div>
<div class="col-sm-2 col-xs-2"><?php echo $time_d?></div>

</div>


<?php
}else{
  ?>
  <div class="col-sm-12 col-xs-12 even_row no_padding innovations_holder">
<div class="col-sm-6 col-xs-6 text_pagesd"><?php echo $counter.". ".$Innovation_name?></div>
 <div class="col-sm-2 col-xs-2"><?php echo $innovator?></div>
  <div class="col-sm-2 col-xs-2"><?php echo $host?></div>

  <div class="col-sm-2 col-xs-2"><?php echo $time_d?></div>

</div>
<?php
}
}


?>

