<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
/*$update=mysqli_query($con,"UPDATE administrators SET Admin_role='super_admin' WHERE user_name='kanyanjua.elijah@gmail.com'") or die(mysqli_error($con));*/
        $offset = $_POST['offset'];
       $no_of_records_per_page=10;
  
$submission="submission";
      $counter=$offset;

$sqlx="SELECT * FROM innovations_table LIMIT $offset,$no_of_records_per_page";

//$sqlx="SELECT * FROM innovations_table LIMIT $offset,$no_of_records_per_page";

    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $Innovation_name=$row['Innovation_name'];
     // $Category=$row['Category'];
     $statusd="";
  $stage=$row['Status'];
  if($stage=="waiting"){
  $statusd="Pending";
  }else if($stage=="second_evaluation"){
   $statusd="2nd evaluation";
  }else if($stage=="first_disapproved"){
   $statusd="Declined";
  }else{
    $statusd=$stage;
  }
  $date_added=$row['date_added'];
   $Innovation_Id=$row['Innovation_Id'];

   $user_id=$row['user_id'];

$get_user=mysqli_query($con,"SELECT * FROM users WHERE id='$user_id'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$first_name=$get['first_name'];
$last_name=$get['last_name'];
$emails=$get['email'];
$Phone=$get['phone'];

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
  <div class="col-sm-2 col-xs-9"><?php echo $counter.". ".$first_name." ".$last_name?></div>
  <div class="col-sm-3 col-xs-9"><?php echo $emails?></div>

  <div class="col-sm-1 mobile_hidden col-xs-2"><?php echo $Phone?>  </div>
  <div class="col-sm-3 mobile_hidden col-xs-2"> <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$Innovation_name?>  </div>

  <div class="col-sm-1 mobile_hidden col-xs-2"><?php echo $statusd?>  </div>
   
  <div class="col-sm-2 mobile_hidden col-xs-2"><?php echo $time_d?> <span class="view_rep" style="float:right;" id="<?php echo $Innovation_Id?>"><i class="fa fa-file-pdf-o"></i></span> </div>
 <!-- <div class="col-sm-1 col-xs-1"><span id="<?php echo $Innovation_Id ?>" class=" veiw_evaluate "><i class="fa fa-eye "></i><span class="mobile_hidden"> View</span></span>  </div>-->
</div>


<?php
}else{
  ?>
  <div class="col-sm-12 col-xs-12 even_row no_padding innovations_holder">
  <div class="col-sm-2 col-xs-9"><?php echo $counter.". ".$first_name." ".$last_name?></div>
  <div class="col-sm-3 col-xs-9"><?php echo $emails?></div>

  <div class="col-sm-1 mobile_hidden col-xs-2"><?php echo $Phone?>  </div>
  <div class="col-sm-3 mobile_hidden col-xs-2"> <?php echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$Innovation_name?>  </div>

  <div class="col-sm-1 mobile_hidden col-xs-2"><?php echo $statusd?>  </div>
   
  <div class="col-sm-2 mobile_hidden col-xs-2"><?php echo $time_d?> <span class="view_rep" style="float:right;" id="<?php echo $Innovation_Id?>"><i class="fa fa-file-pdf-o"></i></span> </div>
 <!-- <div class="col-sm-1 col-xs-1"><strong><span id="<?php echo $Innovation_Id ?>" class=" veiw_evaluate "><i class="fa fa-eye "></i><span class="mobile_hidden"> View</span></span>  </div>-->

</div>
<?php
}
}


?>


</div>
</div>
<div class="col-sm-12 col-xs-12" style="text-align:center" id="loadingdd"></div>


<script type="text/javascript">
  $(document).ready(function(){
   $(".view_rep").click(function(){
var innovation=$(this).attr("id");
 $.post("modules/system/super_admin/pages/innovations/view_infor.php",{
            innovation:innovation
        },function(data){
          $("#primary_dinvo").hide();
          $("#innovation_reports").html(data).show();
          $("#innovation_reports").show();
        })
})
  })
</script>