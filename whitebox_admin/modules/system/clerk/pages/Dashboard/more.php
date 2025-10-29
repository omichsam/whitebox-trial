<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$substatus=$_POST['my_role'];
$Status_data=base64_decode($substatus);
$submission=$Status_data;
$operators="=";
$more_header="";
  $time_d="";
    if($Status_data=="evaluation"){
      $submission="submission";
      $operators="!=";
    $more_header="Innovations At First evaluation";
  }else if($Status_data=="second_evaluation"){
$more_header="Approved Innovations At First evaluation";
  }else if($Status_data=="approved"){
$more_header="Approved Innovations At Second evaluation";
  }else if($Status_data=="disapproved"){
    $more_header="Disapproved Innovations At Second evaluation";
  }else if($Status_data=="first_disapproved"){
$more_header="Disapproved Innovations At First evaluation";
  }else if($Status_data=="implementation"){
$more_header="Innovations Under implementation";
  }else{

  }

?>

<div class="col-sm-12 col-xs-12 ">
	<div class="col-sm-12 col-xs-12 default_header bordered"><?php echo $more_header?></div>

<?php

//$submission=encrypt("first_disapproved",;
//$submission=encrypt($role,;
$my_user=$_POST['my_id'];
$my_userde=encrypt($my_user,$key);
$get_user=mysql_query("SELECT Id FROM administrators WHERE user_name='$my_userde'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
$User_id=$get['Id'];

$checkExist=mysql_query("SELECT * FROM innovations_table WHERE status$operators'$submission'") or die(mysql_error());

  if(mysql_num_rows($checkExist)!=0){
?>
<div class="col-xs-12 col-sm-12 dtittle_holders ">
<div class="col-sm-1 col-xs-1">No.</div>
<div class="col-sm-6 col-xs-6">Innovation name</div>
<div class="col-sm-2 col-xs-2">Clerk</div>
<div class="col-sm-2 col-xs-2">Last modification</div>

</div>




<?php

$sqlxp="SELECT * FROM innovation_stamps WHERE Clerk_id='$User_id'";

    $query_runxp=mysql_query($sqlxp) or die($query_runxp."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runxp)){
    $Innovation_Id=$row['innovation_id'];
$sqlx="SELECT * FROM innovations_table where status$operators'$submission' and Innovation_Id='$Innovation_Id' ORDER BY RAND()";
$counter=0;
    $query_runx=mysql_query($sqlx) or die($query_runx."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runx)){
    $Innovation_name=$row['Innovation_name'], $key));
      $Category=$row['Category'], $key));
  //$stage=$row['stage'], $key));
  $date_added=$row['date_added'], ;
   $Innovation_Id=$row['Innovation_Id'];
$sqlclerk="SELECT Clerk_id,first_evaluation FROM innovation_stamps where innovation_id='$Innovation_Id'";
    $query_runclerk=mysql_query($sqlclerk) or die($query_runclerk."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runclerk)){
    
   $Clerk_id=$row['Clerk_id'];
   $first_evaluation=$row['first_evaluation'];
 }
   if($first_evaluation){
  $data_date=$first_evaluation;
    $curenttime=time();
    $time_difference=$curenttime-$data_date;
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


  
}else{

}
$sqlperson="SELECT Name FROM administrators where Id='$Clerk_id'";
    $query_runpersonel=mysql_query($sqlperson) or die($query_runpersonel."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runpersonel)){
    
   $Name=$row['Name'];

}


   $counter=$counter+1;
  if($counter % 2 != 0){ 
?>
<div class="col-xs-12 col-sm-12 odd_rows ">
<div class="col-sm-1 col-xs-1"><?php echo $counter?></div>
<div class="col-sm-6 col-xs-6 overflow_data"><?php echo $Innovation_name?></div>

<div class="col-sm-2 col-xs-2"><?php echo $Name?></div>
<div class="col-sm-2 col-xs-2"><?php echo $time_d?></div>

</div>
<?php
}else{
	?>
	<div class="col-xs-12 col-sm-12 even_rows ">
<div class="col-sm-1 col-xs-1"><?php echo $counter?></div>
<div class="col-sm-6 col-xs-6 overflow_data"><?php echo $Innovation_name?></div>

<div class="col-sm-2 col-xs-2"><?php echo $Name?></div>
<div class="col-sm-2 col-xs-2"><?php echo $time_d?></div>

</div>
<?php
}
}
}
}
?>



</div>
<script type="text/javascript">
	$(document).ready(function(){
		$(".more_innovations").click(function(){
       var my_role=$(this).attr("role");
       $.post("modules/system/clerk/pages/dashboard/more.php",{my_role:my_role},function(data){
       	$("#common_analyzer").html(data)
       })
		})
	})
</script>