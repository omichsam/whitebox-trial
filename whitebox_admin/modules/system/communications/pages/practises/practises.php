<style type="text/css">
  .carbinates{
    min-height: 135px;
    max-height: 135px;
    /*border: 2px solid #ccc;*/
    margin-top: 5px;
    border-radius: 5px;
    background-size: 100% 100% !important;
background-repeat: no-repeat !important;
background-position: center center !important;

  }
  .dheading{
font-size: 20px;
font-weight: bolder;
text-align: center;
font-family: Algerian;

  }
  .cabinatehouser{
    border-bottom: 2px solid #000;
  }
  .button_viewcab{
    margin-bottom: 5px;
  }
  .viewgbtins{
    text-align: center;
  }
  .pageevened{
    min-height: 350px;
    border: 1px solid #ccc;
    padding-bottom: 5px;
    margin-top: 11px;
    border-radius: 10px;
    background: #fff;
  }
  .normal_page{
  min-height: 200px;  
  border-bottom: 2px solid #ccc;
  }
  .display_divsx{
  -webkit-line-clamp: 3;
  white-space: nowrap; 
  overflow: hidden;
  text-overflow: ellipsis; 
  display: -webkit-box;
  -webkit-box-orient: vertical; 
  }

  .hidden_rows{
  }
  .quickholders{
    min-height: 250px;
  }
  .county_gdivs:hover{
background: #ccc;
cursor: pointer;
  }
</style>
</style>
<script type="text/javascript">
   $(document).ready(function(){
    $("#add_landloard").click(function(){
      //alert()
         var user=$("#user_email").val();
     $.post("modules/system/callcenter/practises/register.php",{
      user:user
      },function(data){
        $("#home").html(data);
      })
    })
   })
 </script>
<div class="col-sm-12 col-xs-12 no_padding">
  <div class="col-sm-12 col-xs-12 no_padding">
    <span class="btn online theme_bg">
   <span class="online" >&nbsp;<i class="fa fa-plus" style="color: #fff;"></i>&nbsp;</span> <span class="" id="add_landloard">Add new</span>
</span>
  </div>
  <div class="col-sm-12 col-xs-12 default_header" style="border-bottom: 2px solid #000"><span id="couttth" style="text-transform: uppercase;"></span> COUNTY INITIATIVES</div>
  <div class="col-sm-12 col-xs-12">
    <div class="col-sm-2 no_padding col-xs-12" style="background: #fff; border-radius: 10px;">
      <div class="col-sm-12 col-xs-12"  ><span class="col-sm-12 col-xs-12" style="border-bottom: 1px solid #ccc;">Counties</span></div>
    <?php

include("../../../../connect.php");
$counter=0;
$sql="SELECT * FROM counties where id<48 order by county_name asc";
    $query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
      $county_name=$row['county_name'];
      $logo=$row['logo'];
    $website=$row['website'];
    $serial_no=$row['serial_no'];
?>
  <div class="col-sm-6 col-xs-6 no_padding county_gdivs" id="<?php  echo $county_name?>"><?php  echo $county_name?></div>
    <?php


  }
    ?>

</div>
<div class="col-sm-10 col-xs-12" style="" id="filteredg">


<?php


$pageno=1;
$next_page=$pageno+1;
 $no_of_records_per_page = 10;
        $offset = ($pageno-1) * $no_of_records_per_page;
       $allcounter=0; 
      $sqlx="SELECT * FROM bestpractices ";
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









$sqlx="SELECT * FROM bestpractices ORDER BY rand() LIMIT $offset,$no_of_records_per_page ";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $reference_number=$row['refference_no'];
     // $Category=$row['Category'];
  $article_name=$row['article_name'];
  $department=$row['department'];
  // $Innovation_Id=$row['Innovation_Id'];
   $Author=$row['Author'];
   $volume=$row['volume'];
    $Description=$row['Description'];
   $Pubblished_year=$row['Pubblished_year'];
   $Subject_area=$row['Subject_area'];
   $sourcearea=$row['sourcearea'];
   $add_id=$row['id'];
   $county_area=$row['county_area'];
    $pdf_name=$row['Documet_dir'];
   $dateadded=strtotime($row['dateadded']);

     $time_d="";
    $curenttime=time();
    $time_difference=$curenttime-$dateadded;
    $seconds=$time_difference;
    $minutes=round($seconds/60);//minutes
    $hours=round($seconds/3600);//hours
    $days=round($seconds/86400);//days
    $weeks=round($seconds/604800);//weeks
    $months=round($seconds/2629440);//months
    $years=round($seconds/31553380);//years
    $day=0;
$times=0;
$pitchmode="not_shown";
$pitchhide="";
$fulldate=0;
/*$get_event=mysqli_query($con,"SELECT * FROM events WHERE Innovation_Id='$Innovation_Id'") or die(mysqli_error($con));
$getevent=mysqli_fetch_assoc($get_event);
if($getevent){
$day=$getevent['planned_date'];
$times=$getevent['planned_time'];
$status=$getevent['status'];

}else{
  
}
*/
if($day && $times){

$fulldate=date('m/d/Y H:i:s', $day);
$pitchmode="";
$pitchhide="not_shown";
//echo $fulldate;
}else{

}


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

  $counter=$counter+1;
                $sqlj="SELECT county_name FROM counties where id='$county_area'";

    $query_runll=mysqli_query($con,$sqlj) or die($query_runll."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runll)){
            $county_name=$row['county_name'];

}
$result = mysqli_query($con,"SELECT id FROM article_views where article_id='$add_id'");
$num_rows = mysqli_num_rows($result);

?>
<div class=" col-xs-6 col-sm-6 even_page">
<div class="col-sm-12 col-xs-12 pageevened">
    <h2 class="col-sm-12 col-xs-12" style="font-size: 100%;
margin-top: 10px;
line-height: 1.5;
font-weight: bold;
min-height: 70px;
max-height: 70px;
max-height: 80px;
overflow:hidden;
color: #666666;"><span style="font-family: 'Open Sans Condensed', 'Open Sans' !important;    border-bottom: 1px solid #A31D23;"><?php echo $article_name?></span></h2>
  <div class="row">
 
  <div class="col-sm-12 col-xs-12  text-justify justyfy " id="fulldisplay"  style="color: #545454;
line-height: 1.5;
font-size: 13px;
max-height: 205px;
min-height: 200px;
overflow: hidden;
font-weight: normal;font-family: 'Open Sans', sans-serif !important;">
  <p> <?php echo $Description?></p>

<!--
<div class="row row hidden_rows col-xs-12 col-sm-12 not_shown no_padding" id="<?php echo "hiden".$counter?>"></div>-->

  </div>
   <div class=" col-sm-12 col-xs-12" style="text-transform: capitalize;font-family: Times New Roman, Times, serif;">
    
       
       <!-- <p class="col-sm-12 col-xs-12 no_padding"> 
<embed class="col-xs-12 col-sm-12 no_padding" height="150" name="plugin" src="<?php echo "documents/articles/$pdf_name"?>" type="application/pdf">

        </p>-->
        <p class="col-sm-12 col-xs-12 " style="text-align: center;margin-top: 3px;"><button style="float: center" class="btn theme_bg hover details_btns " role="<?php echo $add_id?>" id="<?php echo $add_id?>"><i class="fa fa-book"></i> Read more..</button></p>
     
  </div>
</div>

</div>
</div>
<?php
}
?>

</div>
</div>



  </div>
<script type="text/javascript">
  $(document).ready(function(){
    $(".county_gdivs").click(function(){
      var filte=$(this).attr("id");
      var filter=btoa(filte);

      $.post("modules/system/callcenter/practises/filter.php",{filter:filter},function(data){
  $("#filteredg").html(data);
  $(".county_gdivs").css("background","white");
  $("#couttth").html(filte);
  $(this).css("background","green")
      })
    })
    $(".button_viewcab").click(function(){
var yeard=btoa($(this).attr("id"));
$.post("modules/system/callcenter/Repositories/view.php",{yeard:yeard},function(data){
  $("#home").html(data);
      })
})
    })
</script>