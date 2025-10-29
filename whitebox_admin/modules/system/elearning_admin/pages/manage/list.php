<style type="text/css">
  
  #header_innovation{  
text-transform: uppercase;
text-align: center;
border-bottom: 1px solid #ccc;
border-radius:5px;

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
    .innovations_holder{
    min-height: 40px;
    box-shadow: 0 0 2px #ccc;
    margin-top:5px;
    background:#fff;
    overflow: hidden;
    max-height: 30px;
    cursor: pointer;
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
    text-align: center;
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
  .veiw_evaluate{
    cursor: pointer;
  }
 
#filtered_data{
    min-height: 500px;
    max-height: 500px;
    overflow: auto;
    background: #fff;
  }
  #pagination_data{
   min-height: 450px;
    overflow: auto;
    background: #fff;   
  }
</style>
<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$user=base64_decode($_POST['user']);
$action=base64_decode($_POST['action']);
$get_user=mysqli_query($con,"SELECT * FROM administrators WHERE user_name='$user'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$host_id=(int)$get['Id'];
?>

<div class="col-sm-12 no_padding col-xs-12 innovations_headers">
<div class="col-sm-1  col-xs-1">No.</div>
  <div class="col-xs-9 col-sm-9 mobile_hidden content_h overflow_data" ><strong>INNOVATION NAME</strong></div>
   
</div>

<div class="col-sm-12 col-xs-12 no_padding" id="">
<?php
$sqlx="SELECT * FROM notify_tray where host_id='$host_id' and Status='new' and action='$action'";

//$sqlx="SELECT * FROM innovations_table LIMIT $offset,$no_of_records_per_page";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $Innovation_name=$row['Innovation_name'];
     
  $date_added=$row['date_added'];
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
  <div class="col-sm-10 col-xs-10"><?php echo $Innovation_name?></div>

   
</div>


<?php
}else{
  ?>
  <div class="col-sm-12 col-xs-12 even_row no_padding innovations_holder">
<div class="col-sm-1  col-xs-1"><?php echo $counter?></div>
  <div class="col-sm-10 col-xs-10"><?php echo $Innovation_name?></div>

   


</div>
<?php
}
}


?>


</div>

<script type="text/javascript">
  $(document).ready(function(){
  $(".Remove").click(function(){
     var action=btoa('<?php echo $action?>');
      var user=$("#user_email").val();
  		var innovation=btoa($(this).attr("id"));
           $.post("modules/system/super_admin/pages/manage/removepage.php",{action:action,innovation:innovation,user:user},function(responce){
            $.post("modules/system/super_admin/pages/manage/loadpages.php",{action:action,user:user},function(responce){
           	$("#selected_pages").html(responce)

}) 

           })
  
  })
  })
</script>