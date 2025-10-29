
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
</style>
<?php

 //if($_SESSION["id"]){
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
?>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-12 col-xs-12" id="header_innovation"><h4 id="filter_headers">PENDING INNOVATIONS</h4></div>  

<div class="col-sm-12 col-xs-12" id="filtered_data">
    

<?php

$questions="question";
$my_decision="waiting";


    $date = time();
  $new_time=$date;

$new_query="";
  
  //echo $Admin_role;
 
//echo $new_query;
 //echo "user is".$user_id;
/*
$checkquestions=mysqli_query($con,$new_query) or die(mysqli_error($con));

  if(mysqli_num_rows($checkquestions)>=1){
*/
?>
<div class="col-sm-12 no_padding col-xs-12 innovations_headers">
<div class="col-sm-1  col-xs-1">No.</div>
  <div class="col-xs-3 col-sm-7 mobile_hidden content_h overflow_data" ><strong>INNOVATION NAME</strong></div>
  <div class="col-sm-2 mobile_hidden no_padding col-xs-2"><strong>SUBMITTED </strong> </div>
   
  <div class="col-sm-2 col-xs-1"><strong>ACTION <span class="btn " id="export_innovationsd"><a>Export <i class="fa fa-download"></i></a> </span></strong> </div>
</div>
<?php
/*
}else{

}
*/
?>
<div class="col-sm-12 col-xs-12 no_padding" id="pagination_data">
<?php

$pageno=1;
$next_page=$pageno+1;
 $no_of_records_per_page = 10;
        $offset = ($pageno-1) * $no_of_records_per_page;
       $allcounter=0; 
    $query_runx=mysqli_query($con,"SELECT Innovation_Id FROM innovations_table WHERE Status='waiting'") or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){

$Innovation_id=$row['Innovation_Id'];
//echo $Innovation_id;
$Status="";
  $get_user=mysqli_query($con,"SELECT * FROM feedback WHERE status='$questions' and Innovation_id='$Innovation_id'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
if($get){
 


 $allcounter=$allcounter+1;

}else{
}
       
    }
    $total_pages = ceil($allcounter / $no_of_records_per_page); 
    
//echo $allcounter;
$counter=0;
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


$image='';


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


</div>
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








<?php
//}
?>
<script type="text/javascript">
  $(document).ready(function(){
       $(".next_paged").click(function(){
        var my_id=$("#user_email").val();
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
        $.post("modules/system/clerk/pages/pending/loadmore.php",{
            offset:offset,
            my_id:my_id
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
      var my_id=$("#user_email").val();
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
        $.post("modules/system/clerk/pages/pending/loadmore.php",{
            offset:offset,
            my_id:my_id
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
      
    $("#search_innovation").keyup(function(){
      var Selected=btoa($(this).val());
      if(Selected){
 $.post("modules/system/clerk/pages/pending/search.php",{Selected:Selected},function(data){
  $("#filtered_data").html(data);
 });
}else{
   $.post("modules/system/clerk/pages/pending/pending.php",function(data){
  $("#home").html(data);
 });
}

})/*
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
$.post("modules/system/clerk/pages/view/filter.php",{
my_role:my_role,
my_value:my_value
},function(data){
$("#filtered_data").html(data)
})
}

})
*/

//var view_evaluate="";
//var target="#home";
$(".veiw_evaluate").click(function(){
  var innovation=$(this).attr("id");
  //alert(innovation)
var url="modules/system/clerk/pages/pending/evaluate.php";
$.post(url,{innovation:innovation},function(data){$("#home").html(data)});
})



$("#export_innovationsd").click(function(){
 var url="modules/system/clerk/pages/pending/exportone.php";
 var target="#home";
$.post(""+url+"",function(data){
//alert(data)
 $(target).html(data)
})
})

//alert()

  })
</script>