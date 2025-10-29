<style>
    .my_messages{
    min-height:30px;
    border:1px solid #ccc;
    border-radius:0px 10px 0px 10px;
    
    }
    .modmessages{
      min-height:30px;
    border:1px solid #ccc;
    border-radius:0px 10px 0px 10px; 
    font-size:12px;
    }
    .holder_messages{
        margin-top:5px;
    }
    .time_agos{
        font-size:10px;
    }
    #message_ddf{
        min-height:200px;
       
    }
    #message_send{
        resize:none;
    }
</style>
<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";

 //received data from the post request
$innovation=$_POST['innovation'];
//$user=$_POST['user'];
//end off data declaration
//geting the host involved

    //host id recorded
 $date_added=time();
 $new_date=$date_added;
//echo $my_user."allan";
//echo $User_id;

   // echo $Innovation_Id;
$get_userd=mysqli_query($con,"SELECT * FROM events WHERE Innovation_Id='$innovation' and status='active'") or die(mysqli_error($con));
$getd=mysqli_fetch_assoc($get_userd);
$host_id=$getd['host_id'];
//$InnovationId=$getd['Innovation_Id'];

/*$checkExistd=mysqli_query($con,"SELECT * FROM messages WHERE innovation_id ='$InnovationId' and sender_id='$User_id' and host_id='$host_id' and message='$message'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExistd)>=1){ 
echo "message exists";
}else{

  
}
*/
?>
<div class="col-sm- no_padding col-xs-12" id="message_ddf">
    <?php
    //geting messages from table messages filtered by the innovation id
  $sqlx="SELECT * FROM messages WHERE innovation_id ='$innovation' and host_id='$host_id'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
  $date_added=$row['Date_added'];
  $mesage=$row['message'];
  $account=$row['account'];
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
     $time_d="now";
    }else if($minutes<=60){
      if($minutes==1){

        $time_d="1min";
      }else{
        $time_d="$minutes min";
      }

    }elseif($hours<=24){

   if($hours==1){
    $time_d="1hr";
   }else{
    $time_d="$hours hrs";
   }


    }else if($days<=7){
    if($days==1){
      $time_d="1 day";
    }else{
      $time_d="$days days";
    }


    }else if($weeks<=4.3){
     if($weeks==1){
      $time_d="1 wk";
     }else{
      $time_d="$weeks wks";
     }

    }else if($months<=12){

      if($months==1){
        $time_d="1 month";
      }else{

        $time_d="$months months";
      }
    }else{
  if($years==1){

    $time_d="1 yr";
  }else{
    $time_d="";
  }

    }
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  if($account=="host"){
  //for messages coming from the the host
  
  ?>
 <div class="col-sm-12 no_padding col-xs-12 holder_messages">
    <div class="col-sm-2 no_padding col-xs-2">
    <i class="fa fa-user fa-2x"></i>:me
    </div> 
    <div class="col-sm-8 col-xs-8 my_messages"><?php echo $mesage?></div>
     
   <div class="col-sm-2 col-xs-2 time_agos"><?php echo $time_d?></div>
 </div>   
 <?php
  }else{
      //messeges coming from innovator
  ?>
    <div class="col-sm-12 no_padding col-xs-12 holder_messages">
   <div class="col-sm-2 col-xs-2 time_agos" ><?php echo $time_d?></div>
    <div class="col-sm-8 col-xs-8 modmessages"><?php echo $mesage?></div>
      <div class="col-sm-2 no_padding col-xs-2">
        <i class="fa fa-user fa-2x"></i>:user
    </div> 
 </div> 
 <?php 
      
  }
    }
 ?>
   
</div>
