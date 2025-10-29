<?php

include "../../../../../connect.php";


 $offset = $_POST['offset'];
$questions="question";
$my_decision="waiting";

$my_decision="waiting";


    $date = time();
  $new_time=$date;

$new_query="";
  
//$new_query="SELECT * FROM feedback WHERE status='$questions' LIMIT $offset,10";
  
//echo $new_query;

       $no_of_records_per_page=10;
  
      $counter=$offset; 
      $query_runxxx=mysqli_query($con,"SELECT * FROM innovations_table WHERE Status='waiting' LIMIT $offset,$no_of_records_per_page") or die($query_runxxx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxxx)){


$Innovation_idd=$row['Innovation_Id'];

      $new_status=$row['Status'];
 
    $Innovation_name=$row['Innovation_name'];

  $stage=$row['stage'];
  $date_added=$row['date_added'];
     $time_d="";
//echo $Innovation_idd;

$sqlx="SELECT * FROM feedback WHERE status='$questions' and Innovation_id='$Innovation_idd'";

    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    

    $curenttime=time();
    $time_difference=$curenttime-$date_added;
    $seconds=$time_difference;
    $minutes=round($seconds/60);//minutes
    $hours=round($seconds/3600);//hours
    $days=round($seconds/86400);//days
    $weeks=round($seconds/604800);//weeks
    $months=round($seconds/2629440);//months
    $years=round($seconds/31553380);//years
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

 


  $counter=$counter+1;
  if($counter % 2 != 0){ 

?>
<div class="col-sm-12 no_padding col-xs-12 innovations_holder">
<div class="col-sm-1  col-xs-1"><?php echo $counter?></div>
  <div class="col-sm-7 col-xs-9"><?php echo $Innovation_name?></div>

  <div class="col-sm-2 mobile_hidden no_padding col-xs-2"><strong><?php echo $time_d?> </strong> </div>
   
  <div class="col-sm-2 col-xs-1"><strong><span id="<?php echo $Innovation_idd ?>" class="veiw_evaluate"><i class="fa fa-eye "></i><span class="mobile_hidden"> View Details</span></span> </strong> </div>
</div>


<?php
}else{
  ?>
  <div class="col-sm-12 col-xs-12 even_row no_padding innovations_holder">
<div class="col-sm-1  col-xs-1"><?php echo $counter?></div>
  <div class="col-sm-7 col-xs-9"><?php echo $Innovation_name?></div>

  <div class="col-sm-2 mobile_hidden no_padding col-xs-2"><strong><?php echo $time_d?> </strong> </div>
   
  <div class="col-sm-2 col-xs-1"><strong><span id="<?php echo $Innovation_idd ?>" class="veiw_evaluate"><i class="fa fa-eye "></i><span class="mobile_hidden"> View Details</span></span> </strong> </div>

</div>
<?php
}

}
}
?>


<script type="text/javascript">
  $(document).ready(function(){
     $(".veiw_evaluate").click(function(){
  var innovation=$(this).attr("id");
  //alert(innovation)
var url="modules/system/clerk/pages/pending/evaluate.php";
$.post(url,{innovation:innovation},function(data){$("#home").html(data)});
})

  })
</script>
