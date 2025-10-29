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
  .text_pagesd{
  	padding-left: 1.5em;
    text-indent:-1.5em;
  }
</style>
<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";

$role=base64_decode($_POST['role']);
$page_header="";
if($role=="move"){
$page_header="Innovations Moved from one stage to another";
}else if($role=="delete"){
$page_header="Innovations Deleted from the system";
}else if($role=="notify"){
$page_header="Innovators notified on their innovations";
}else{

}
?>

<div class="col-sm-12 no_padding col-xs-12 default_header"><?php echo $page_header ?> <span class="btn theme_bg" style="float:right;" id="close_dmanage">Close</span></div>
<div class="col-sm-12 no_padding col-xs-12 innovations_headers">
  <div class="col-xs-6 col-sm-6 mobile_hidden content_h overflow_data" ><strong>NO INNOVATION NAME</strong></div>
    <div class="col-xs-2 col-sm-2 mobile_hidden  overflow_data" ><strong>INNOVATOR</strong></div>
     <div class="col-xs-2 col-sm-2 mobile_hidden  overflow_data" ><strong>DONE BY</strong></div>
  <div class="col-sm-2 col-xs-2">TIME </div>
</div>

<div class="col-sm-12 col-xs-12 no_padding" id="pagination_data">
<?php
$pageno=1;
$next_page=$pageno+1;
 $no_of_records_per_page = 10;
        $offset = ($pageno-1) * $no_of_records_per_page;
       $allcounter=0; 
      $sqlx="SELECT * FROM notify_tray where Status='done' and action='$role'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
        $allcounter=$allcounter+1;
    }
    $total_pages = ceil($allcounter / $no_of_records_per_page); 
$counter=0;
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


</div>
<div class="col-sm-12 col-xs-12" style="text-align:center" id="loadingdd"></div>
<div class="col-sm-12 col-xs-12" id="pagination_controls" style="text-align:center;margin-top:4px;">
   <?php
   for($bd=1;$bd<$total_pages;$bd++){
        
        ?>
        
    <span class="btn theme_bg not_shown back_paged " id="<?php echo "back_paged".$bd?>" role="<?php echo $bd?>"><i class="fa fa-arrow-left"></i></span>
    <?php
    
   }
   ?>
    
    <span id="records_display">Page <span id="numberring">1</span> <span id="recordsd">record no. <span id="startpages">1</span> to <span id="endpages">10</span></span></span>
    <?php
    
    for($fd=1;$fd<$total_pages;$fd++){
        //echo "all valeus".$fd;
        if($fd>1){
            
            $hide_pagesd="not_shown";
        }else{
            $hide_pagesd="";
        }
        ?>
    <span class="btn theme_bg next_paged <?php echo $hide_pagesd?>" id="<?php echo "next_paged".$fd?>" role="<?php echo $fd?>"><i class="fa fa-arrow-right"></i></span>
    <?php
    } 
    ?>
    
</div>
<script type="text/javascript">
  $(document).ready(function(){
  	var role='<?php echo $role?>';
    $(".next_paged").click(function(){
        var loader=$("#loader").html()
        $("#loadingdd").html(loader);
        var allcounter='<?php echo $allcounter?>';
        var records_perpage='<?php echo $no_of_records_per_page?>';
        var next_page="";
        var next_page=parseInt($(this).attr("role"));
        var new_page=next_page+1;
        var endpages=parseInt($("#endpages").html());
        var offset=endpages;
       // alert(offset)
        $.post("modules/system/super_admin/pages/manage/loadmore.php",{
            offset:offset,
            role:role
        },function(data){
            $("#pagination_data").html(data);
            $("#loadingdd").html("");
        var new_start=endpages+1;
        
        var new_endpages=records_perpage*new_page;
        var recodes="";
        if(new_endpages>allcounter){
            recodes=allcounter;
        }else{
            recodes=new_endpages;
        }
       // alert(recodes);
        $(".next_paged").hide();
        $("#next_paged"+new_page).show();
        $(".back_paged").hide();
        $("#back_paged"+next_page).show();
       
      $("#numberring").html(new_page);
        $("#endpages").html(recodes);
        $("#startpages").html(new_start);
        });
    })  
      
     $(".back_paged").click(function(){
        var loader=$("#loader").html()
        $("#loadingdd").html(loader);
        var allcounter='<?php echo $allcounter?>';
        var records_perpage='<?php echo $no_of_records_per_page?>';
        var next_page="";
        var next_page=parseInt($(this).attr("role"));
        var new_page=next_page-1;
        // var newn_page=next_page;
        var endpages=parseInt($("#startpages").html());
        var offset=new_page*records_perpage;
       // alert(offset)
        $.post("modules/system/super_admin/pages/manage/loadmore.php",{
            offset:offset,
            role:role
        },function(data){
            $("#pagination_data").html(data);
            $("#loadingdd").html("");
        var new_start=offset+1;
        
        var new_endpages=records_perpage*next_page;
        var recodes="";
        if(new_endpages>allcounter){
            recodes=allcounter;
        }else{
            recodes=new_endpages;
        }
       // alert(recodes);
        $(".next_paged").hide();
        $("#next_paged"+next_page).show();
        $(".back_paged").hide();
        $("#back_paged"+new_page).show();
       
      $("#numberring").html(next_page);
        $("#endpages").html(recodes);
        $("#startpages").html(new_start);
        });
    })    
      
      
    



  })
</script>
<script type="text/javascript">
  $(document).ready(function(){
  $("#close_dmanage").click(function(){
  $.get("modules/system/super_admin/pages/manage/manage.php",function(responce){
  $("#home").html(responce)
  })
  })
})
</script>