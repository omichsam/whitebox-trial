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
$search=base64_decode($_POST['search']);
$action=$_POST['action'];
?>

<div class="col-sm-12 no_padding col-xs-12 innovations_headers">
<div class="col-sm-1  col-xs-1">No.</div>
  <div class="col-xs-8 col-sm-8 mobile_hidden content_h overflow_data" ><strong>INNOVATION NAME</strong></div>
   
  <div class="col-sm-2 col-xs-2">SELECT </div>
</div>

<div class="col-sm-12 col-xs-12 no_padding" id="">
<?php
$sqlx="SELECT * FROM innovations_table where Innovation_name like '%$search%'";

//$sqlx="SELECT * FROM innovations_table LIMIT $offset,$no_of_records_per_page";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $Innovation_name=$row['Innovation_name'];
     // $Category=$row['Category'];
  $stage=$row['stage'];
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
  <div class="col-sm-9 col-xs-9"><?php echo $Innovation_name?></div>

   
  <div class="col-sm-2 col-xs-1"><strong>
  	<input type="checkbox" class="checkboxed" id="<?php echo $Innovation_Id ?>"></strong>

   </div>
</div>


<?php
}else{
  ?>
  <div class="col-sm-12 col-xs-12 even_row no_padding innovations_holder">
<div class="col-sm-1  col-xs-1"><?php echo $counter?></div>
  <div class="col-sm-9 col-xs-9"><?php echo $Innovation_name?></div>

   
  <div class="col-sm-2 col-xs-1"><strong>
  	<input type="checkbox" class="checkboxed" id="<?php echo $Innovation_Id ?>"></strong>

   </div>

</div>
<?php
}
}


?>


</div>

<script type="text/javascript">
  $(document).ready(function(){
  $(".checkboxed").change(function(){
 var action='<?php echo $action ?>';
      var user=$("#user_email").val();
  	if($(this).prop("checked")){
  		var innovation=btoa($(this).attr("id"));
           $.post("modules/system/super_admin/pages/manage/add_page.php",{action:action,innovation:innovation,user:user},function(responce){
            $.post("modules/system/super_admin/pages/manage/loadpages.php",{user:user,action:action},function(responce){
           	$("#selected_pages").html(responce)

})
           })
  	}else{
       var innovation=btoa($(this).attr("id"));
           $.post("modules/system/super_admin/pages/manage/removepage.php",{action:action,innovation:innovation,user:user},function(responce){
            $.post("modules/system/super_admin/pages/manage/loadpages.php",{user:user,action:action},function(responce){
           	$("#selected_pages").html(responce)
           })
        })
  	}
  })
  })
</script>