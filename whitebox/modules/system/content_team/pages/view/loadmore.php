<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
        $offset = $_POST['offset'];
       $no_of_records_per_page=10;
  

      $counter=$offset;
$sqlx="SELECT * FROM e_learning_users where status='active' LIMIT $offset,$no_of_records_per_page";


//$sqlx="SELECT * FROM innovations_table LIMIT $offset,$no_of_records_per_page";

    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $Username=$row['first_name']." ".$row['Last_name'];
   $phone=$row['phone'];
  $Gender=$row['Gender'];
  $email=$row['email'];
  
  $date_added=$row['date_added'];
   $Innovation_Id=$row['id'];




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
   <div class="col-sm-4 col-xs-3"><?php echo $counter." ".$Username?></div>

  <div class="col-sm-3 mobile_hidden no_padding col-xs-2"><strong><?php echo $email?> </strong> </div>
   <div class="col-sm-2 mobile_hidden no_padding col-xs-2"><strong><?php echo $phone?> </strong> </div> <div class="col-sm-2 mobile_hidden no_padding col-xs-2"><strong><?php echo $Gender?> </strong> </div>
   
  <div class="col-sm-1 col-xs-1"><!--<strong><span id="<?php echo $Innovation_Id ?>" class=" veiw_evaluate "><i class="fa fa-eye "></i><span class="mobile_hidden"> View</span></span> </strong> --></div>

</div>


<?php
}else{
  ?>
  <div class="col-sm-12 col-xs-12 even_row no_padding innovations_holder">

    <div class="col-sm-4 col-xs-3"><?php echo $counter." ".$Username?></div>

  <div class="col-sm-3 mobile_hidden no_padding col-xs-2"><strong><?php echo $email?> </strong> </div>
   <div class="col-sm-2 mobile_hidden no_padding col-xs-2"><strong><?php echo $phone?> </strong> </div> <div class="col-sm-2 mobile_hidden no_padding col-xs-2"><strong><?php echo $Gender?> </strong> </div>
   
  <div class="col-sm-1 col-xs-1"><!--<strong><span id="<?php echo $Innovation_Id ?>" class=" veiw_evaluate "><i class="fa fa-eye "></i><span class="mobile_hidden"> View</span></span> </strong> --></div>


</div>
<?php
}
}


?>


<script type="text/javascript">
  $(document).ready(function(){
    
      
$(".filter_fields").change(function(){
var filter_role=$(this).attr("role");
var filter_value=$(this).val();

if(filter_value==""){

}else{
  var loader=$("#loader").html();
  var my_role=btoa(filter_role);
  var my_value=btoa(filter_value);
  var header_data="";
  if(filter_role=="county"){
header_data="innovations recieved from "+filter_value+" county";
  }else if(filter_role=="gender"){
header_data="innovations Submited by "+filter_value+" gender";
  }else if(filter_role=="category"){
header_data="innovations in "+filter_value+" category";
  }else{
header_data="innovations submited by "+filter_value+" holders";
  }
$("#filter_headers").html(header_data);
  $("#filtered_data").html(loader)
$.post("modules/system/content_team/pages/view/filter.php",{
my_role:my_role,
my_value:my_value
},function(data){
$("#filtered_data").html(data)
})
}

})

var view_evaluate=".veiw_evaluate";
var target="#home";
$(view_evaluate).click(function(){
  var innovation=$(this).attr("id");
var url="modules/system/content_team/pages/evaluate/evaluate.php";
$.post(url,{innovation:innovation},function(data){$(target).html(data)});
})
  })
</script>