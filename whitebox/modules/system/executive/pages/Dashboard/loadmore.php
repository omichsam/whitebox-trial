<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
//$substatus=$_POST['my_role'];
$data_status="pending";
//$Status_data=base64_decode($substatus);

 $Status_data = $_POST['Status_data'];
$submission=$Status_data;

$operators="=";
$more_header="";
  $time_d="";
  $data_query="";
  $report_view="not_shown";
  $about_status="";
 // $approved=
  $approved="approved";
  $disapproved="disapproved";
  $implementation="implementation";
  
    if($Status_data=="evaluation"){
      $submission="submission";
      $operators="!=";
      $data_query="SELECT * FROM innovations_table Where status!='$data_status'";
    $more_header="Innovations At First evaluation";
  }else if($Status_data=="second_evaluation"){

   $data_query="SELECT * FROM innovations_table where Status='$submission' or Status='$approved' or Status='$implementation' or Status='$disapproved'"; 
$more_header="Approved Innovations At First evaluation";
  }else if($Status_data=="approved"){
    $data_query="SELECT * FROM innovations_table where Status='$submission' or Status='$implementation'";
$more_header="Approved Innovations At Second evaluation";
  }else if($Status_data=="disapproved"){
    $data_query="SELECT * FROM innovations_table where Status='$submission'";
    $more_header="Disapproved Innovations At Second evaluation";
  }else if($Status_data=="first_disapproved"){
    $data_query="SELECT * FROM innovations_table where Status='$submission'"; 
$more_header="Disapproved Innovations At First evaluation";
  }else if($Status_data=="implementation"){
    $data_query="SELECT * FROM innovations_table where Status='$submission'";
$more_header="Innovations Under implementation";
  }else{

  }
        $offset = $_POST['offset'];
       $no_of_records_per_page=10;


  
$sqlx="$data_query LIMIT $offset,$no_of_records_per_page";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $Innovation_name=$row['Innovation_name'];
     // $Category=$row['Category'];
  $stage=$row['stage'];
  $date_added=$row['date_added'];
   $Innovation_Id=$row['Innovation_Id'];
  $Added_status=$row['Status'];
$get_clerkde=mysqli_query($con,"SELECT * FROM innovation_stamps WHERE innovation_id ='$Innovation_Id'") or die(mysqli_error($con));
$getttt=mysqli_fetch_assoc($get_clerkde);
$Clerk_id=$getttt['Clerk_id'];
$first_evaluation=$getttt['first_evaluation'];
$Second_evaluation=$getttt['Second_evaluation'];
$Forwarding=$getttt['Forwarding'];
$Implimentation=$getttt['Implimentation'];


if($Clerk_id){

}else{

$get_clerkdei=mysqli_query($con,"SELECT clerk_id FROM innovations_reports WHERE Innovation_Id ='$Innovation_Id'") or die(mysqli_error($con));
$getttti=mysqli_fetch_assoc($get_clerkdei);
$Clerk_id=$getttti['clerk_id'];
}

$get_clerkkde=mysqli_query($con,"SELECT Name FROM administrators WHERE Id='$Clerk_id'") or die(mysqli_error($con));
$gett=mysqli_fetch_assoc($get_clerkkde);
$Name_clerk=$gett['Name'];
if($Added_status=="submission"){
    $report_view="not_shown";
$about_status="Submission";
  }else if($Added_status=="waiting"){
    $about_status="Pending";
$report_view="";
  }else if($Added_status=="evaluation"){
 $about_status="1st evaluation";
  }else if($Added_status=="second_evaluation"){
$report_view="";
$about_status="2nd evaluation";
  }else if($Added_status=="approved"){
$report_view="";
$about_status="Accepted";
  }else if($Added_status=="first_disapproved"){
$report_view="";
$about_status="Declined 1st";
  }else if($Added_status=="disapproved"){
$report_view="";
$about_status="Declined 2nd";
  }else if($Added_status=="implementation"){
$report_view="";
$about_status="Implimented";
  }else{

  }
 


 $Clerk_id="";
   $first_evaluation="";

$sqlclerk="SELECT Clerk_id,first_evaluation FROM innovation_stamps where innovation_id='$Innovation_Id'";
    $query_runclerk=mysqli_query($con,$sqlclerk) or die($query_runclerk."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runclerk)){
    
   $Clerk_id=$row['Clerk_id'];
   $first_evaluation=$row['first_evaluation'];
 }
  $data_date=$first_evaluation;
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

/*

$Name="";
$sqlperson="SELECT Name FROM administrators where Id='$Clerk_id'";
    $query_runpersonel=mysqli_query($con,$sqlperson) or die($query_runpersonel."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runpersonel)){
    
   $Name=$row['Name'];

}

*/
   $counter=$counter+1;
  if($counter % 2 != 0){ 
?>
<div class="col-xs-12 col-sm-12 odd_rows ">
<div class="col-sm-6 col-xs-6 overflow_data"><?php echo $counter.". ".$Innovation_name?></div>

<div class="col-sm-2 col-xs-2"><?php echo $Name_clerk?></div>
<div class="col-sm-2 col-xs-2"><?php echo $time_d?>
  
   </div>
   <div class="col-sm-2 col-xs-2">
     <strong><?php echo $about_status?> <span id="<?php echo $Innovation_Id ?>" class="view_evaluation <?php echo $report_view?> "><i class="fa fa-file-pdf-o "></i><span class="mobile_hidden"></span></span> </strong>
</div>

</div>
<?php
}else{
  ?>
  <div class="col-xs-12 col-sm-12 even_rows ">
<div class="col-sm-6 col-xs-6 overflow_data"><?php echo $counter.". ".$Innovation_name?></div>

<div class="col-sm-2 col-xs-2"><?php echo $Name_clerk?></div>
<div class="col-sm-2 col-xs-2"><?php echo $time_d?> 

 </div>
 <div class="col-sm-2 col-xs-2">
     <strong><?php echo $about_status?> <span id="<?php echo $Innovation_Id ?>" class="view_evaluation <?php echo $report_view?> "><i class="fa fa-file-pdf-o "></i><span class="mobile_hidden"></span></span> </strong>
</div>

</div>
<?php
}
}


?>
<script type="text/javascript">
  $(document).ready(function(){
      
   
      
   // alert()
 
    $(".view_evaluation").click(function(){

var innovation=$(this).attr("id");
//alert(innovation)
//alert(innovation)
   //alert(innovation);
  //alert(innovation);
//var url="modules/system/executive/pages/Dashboard/feedback_view.php";
$.post("modules/system/executive/pages/Dashboard/report_view.php",{innovation:innovation},function(data){
//  alert(data)
$("#main_dashbod").hide();
  $("#main_datashows").html(data).show();
  //alert(data);

})
  })

  })
</script>