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
 
#filtered_datadd{
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
?>

<div class="col-sm-12 col-xs-12 not_shown" id="innovation_reports"></div>
<div class="col-sm-12 col-xs-12" id="primary_dinvo">
<div class="col-sm-12 col-xs-12" id="header_innovation"><h4 id="filter_headers">INNOVATIONS SUBMITTED TO WHITEBOX</h4></div>  
<!--<div class="col-sm-12 col-xs-12 mobile_hidden">
  <div class="col-sm-3 col-xs-12">
<div class="col-sm-12 col-xs-12">
  Filter by Category
    <select class="splashinputs filter_fields" role="category">
  
<option></option>
<option>Culture</option>
<option>Heritage</option>
 
</select>
</div>




    </div>
  <div class="col-sm-3 col-xs-12">
<div class="col-sm-12 col-xs-12">
  Filter by county
    <select class="splashinputs filter_fields" role="county">
  <option></option>
  <?php 
$sql="SELECT * FROM county_table ORDER BY County_name ASC";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           $County_name=$row['County_name'];
            ?>

<option><?php echo $County_name ?></option>
<?php
}


?>
</select>
</div>
  </div>
    <div class="col-sm-3 col-xs-12">

<div class="col-sm-12 col-xs-12">
  Filter by gender
    <select class="splashinputs filter_fields" role="gender">
  
 <option></option>
<option>MALE</option>
<option>FEMALE</option>
<option>OTHER</option>
</select>
</div>

    </div>
    <div class="col-sm-3 col-xs-12">
<div class="col-sm-12 col-xs-12">
  Filter by Education level
    <select class="splashinputs filter_fields" role="education">
  <option></option>
  <option>PhD</option>
<option>Masters</option>
<option>Bachelors</option>
<option>Diploma</option>
<option>Certificate</option>
<option>Secondary education</option>
<option>Primary education</option>
<option>Other</option>
</select>
</div>




    </div>


</div>-->

<div class="col-sm-12 col-xs-12" id="filtered_datadd">
    

<?php

$submission="submission";
$cheinnovations=mysqli_query($con,"SELECT * FROM innovations_table") or die(mysqli_error($con));

  if(mysqli_num_rows($cheinnovations)>=1){

?>
<div class="col-sm-12 no_padding col-xs-12 innovations_headers">
  <div class="col-xs-2 col-sm-2 mobile_hidden content_h overflow_data" ><strong>INNOVATOR</strong></div>
  <div class="col-xs-3 col-sm-3 mobile_hidden content_h overflow_data" ><strong>EMAIL</strong></div>

  <div class="col-xs-2 col-sm-1 mobile_hidden " ><strong>PHONE</strong></div>
  <div class="col-sm-3 mobile_hidden  col-xs-2"><strong>INNOVATION</strong> </div>
   
  <div class="col-sm-1 mobile_hidden  col-xs-2"><strong>STATUS</strong> </div>

  <div class="col-sm-2 mobile_hidden  col-xs-2"><strong>SUBMITED</strong> </div>
 <!-- <div class="col-sm-1 col-xs-1"><strong> <span class="btn " id="export_innovations"><a href="modules/system/clerk/pages/view/export.php#" target="_blank">Export <i class="fa fa-download"></i></a> </span></strong> </div>-->
</div>
<?php

}else{

}
?>

<div class="col-sm-12 col-xs-12 no_padding" id="pagination_data">
<?php
$pageno=1;
$next_page=$pageno+1;
 $no_of_records_per_page = 10;
        $offset = ($pageno-1) * $no_of_records_per_page;
       $allcounter=0; 
      $sqlx="SELECT * FROM innovations_table";
 //$sqlx="SELECT * FROM innovations_table";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
        $allcounter=$allcounter+1;
    }
    $total_pages = ceil($allcounter / $no_of_records_per_page); 
    //$buttons=$total_pages-1;
    //echo $buttons;
   // echo $total_pages;
   //$total_pages=5;
   //$allcounter=55;
        
$sqlx="SELECT * FROM innovations_table LIMIT $offset,$no_of_records_per_page";

//$sqlx="SELECT * FROM innovations_table LIMIT $offset,$no_of_records_per_page";
$counter=0;
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
    $(".next_paged").click(function(){
        var loader=$("#loader").html()
        $("#loadingdd").html("").show();
        var allcounter='<?php echo $allcounter?>';
        var records_perpage='<?php echo $no_of_records_per_page?>';
        var next_page="";
        var next_page=parseInt($(this).attr("role"));
        var new_page=next_page+1;
        var endpages=parseInt($("#endpages").html());
        var offset=endpages;
       // alert(offset)
        $.post("modules/system/super_admin/pages/innovations/loadmore.php",{
            offset:offset
        },function(data){
            $("#pagination_data").html(data);
            $("#loadingdd").html("").hide();
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
        $("#loadingdd").html("").show();
        var allcounter='<?php echo $allcounter?>';
        var records_perpage='<?php echo $no_of_records_per_page?>';
        var next_page="";
        var next_page=parseInt($(this).attr("role"));
        var new_page=next_page-1;
        // var newn_page=next_page;
        var endpages=parseInt($("#startpages").html());
        var offset=new_page*records_perpage;
       // alert(offset)
        $.post("modules/system/super_admin/pages/innovations/loadmore.php",{
            offset:offset
        },function(data){
            $("#pagination_data").html(data);
            $("#loadingdd").html("").hide();
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
  $("#filtered_datadd").html(loader)
$.post("modules/system/clerk/pages/view/filter.php",{
my_role:my_role,
my_value:my_value
},function(data){
$("#filtered_datadd").html(data)
})
}

})

var view_evaluate=".veiw_evaluate";
var target="#home";
$(view_evaluate).click(function(){
  var innovation=$(this).attr("id");
var url="modules/system/clerk/pages/evaluate/evaluate.php";
$.post(url,{innovation:innovation},function(data){$(target).html(data)});
})
/*
$("#export_innovations").click(function(){
 var url="modules/system/clerk/pages/view/export.php";
 var target="#loadingdd";
$.post(""+url+"",function(data){
//alert(data)
  $(target).html(data)})
})*/

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