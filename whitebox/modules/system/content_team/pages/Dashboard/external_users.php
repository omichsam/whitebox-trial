<style type="text/css">
  #table_headers{
   
    min-height: 30px;
    font-weight: bold;
    font-size: 15px;
    background:#ccc;
  }
  .table_datas{
    font-size: 11px;
   min-height: 30px;
   border-bottom: 2px solid #ccc;
   background: #fff;
   margin-top: 5px;
   cursor: pointer;
  }
  .table_data{
    font-size: 11px;
   min-height: 30px;
   border-bottom: 2px solid #ccc;
   margin-top: 5px;
   cursor: pointer;
  }
</style>

<div class="col-sm-12 col-xs-12">
  <div class="col-sm-12 col-xs-12 default_header">REGISTERED USERS <span style="float:right"><span class="btn" id="expand_win"><i class="fa fa-expand"></i></span><span class="btn not_shown" id="minimise_win"><i class="fa fa-window-minimize"></i></span></span></div>
<div class="col-sm-12 col-xs-12" id="table_headers">
    
    <div class="col-sm-3 col-xs-4">NAME</div>
    <div class="col-sm-2 mobile_hidden">PHONE</div>
    <div class="col-sm-1 col-xs-2 ">GENDER</div>
    <div class="col-sm-2 mobile_hidden">COUNTY</div>
    <div class="col-sm-2 col-xs-2">EDUCATION LEVEL</div>
    <div class="col-sm-2 col-xs-2">INNOVATIONS</div>
  </div>
  <?php 

  include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
  $First_name="";
   $Last_name="";
   $national_id="";
   $Gender="";
 $County_id="";
   $education_level="";
   $Phone="";

$pageno=1;
$next_page=$pageno+1;
 $no_of_records_per_page = 10;
        $offset = ($pageno-1) * $no_of_records_per_page;
       $allcounter=0; 
      $sqlx="SELECT * FROM users";
 //$sqlx="SELECT * FROM innovations_table";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
        $allcounter=$allcounter+1;
    }
    $total_pages = ceil($allcounter / $no_of_records_per_page);  




  ?>
  <div class="col-sm-12 col-xs-12 no_padding" id="pagination_data">
  <?php
  









$sqlx="SELECT * FROM users LIMIT $offset,$no_of_records_per_page";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
   $national_id="";

   $First_name=$row['first_name'];
   $Last_name=$row['last_name'];
   $user_id=$row['id'];
   $Gender=$row['gender'];
 //$County_id=$row['County_id'];
   //$user_id=$row['id'];
   $Phone=$row['phone'];
   $County_idn=$row['county_id'];
  $counter=$counter+1;
 $oldstatus="pending";

$innovations=0;
  $get_bigfoursectors=mysqli_query($con,"SELECT * FROM education where user_id='$user_id'") or die(mysqli_error($con));
$getbigid=mysqli_fetch_assoc($get_bigfoursectors);
if($getbigid){
 $education_level=$getbigid['EducationLevel_id'];
}else{

}
$EducationLevelName="";
 $sql="SELECT * FROM education_levels where id ='$education_level'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           $EducationLevelName=$row['EducationLevelName'];
     

}
$sqlxrtrt="SELECT * FROM innovations_table where user_id='$user_id' and Status!='pending'";

    $query_runxggg=mysqli_query($con,$sqlxrtrt) or die($query_runxggg."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxggg)){
$innovations=$innovations+1;


}


$sqlxrtrt="SELECT * FROM basic_informations where user_id='$user_id'";

    $query_runxggg=mysqli_query($con,$sqlxrtrt) or die($query_runxggg."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxggg)){
$innovations=$innovations+1;


}
$County_name="";
  $sql="SELECT * FROM counties Where serial_no ='$County_idn'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           $County_name=$row['county_name'];
     


}

$Hiegesteducation="";
  $sql="SELECT * FROM education Where user_id ='$user_id'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           $Hiegesteducation=$row['EducationLevel_id'];
     


}
$educational="";
  $sql="SELECT * FROM education_levels Where id ='$Hiegesteducation'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           $educational=$row['EducationLevelName'];
     


}

  if($counter % 2 != 0){
    ?>
  <div class="col-sm-12 col-xs-12 row_viewsa table_datas" id="<?php echo $user_id?>">
    <div class="col-sm-3 col-xs-4"><?php echo $counter.". ".$First_name." ".$Last_name?></div>
    <div class="col-sm-2 mobile_hidden"><?php echo $Phone?></div>
    
    <div class="col-sm-1 col-xs-2"><?php echo $Gender?></div>
    <div class="col-sm-2 mobile_hidden"><?php echo $County_name?></div>
    <div class="col-sm-2 col-xs-3">
      <?php echo $educational?>
</div>
    <div class="col-sm-2 col-xs-1">
      <?php echo $innovations?>
</div>

  </div>
  <?php
}else{
  ?>
<div class="col-sm-12 col-xs-12 row_viewsa table_data" id="<?php echo $user_id?>">
  <div class="col-sm-3 col-xs-4"><?php echo $counter.". ".$First_name." ".$Last_name?></div>
    <div class="col-sm-2 mobile_hidden"><?php echo $Phone?></div>
    
    <div class="col-sm-1 col-xs-2"><?php echo $Gender?></div>
    <div class="col-sm-2 mobile_hidden"><?php echo $County_name?></div>
    <div class="col-sm-2 col-xs-3">
      <?php echo $educational?>
</div>
    <div class="col-sm-2 col-xs-1">
      <?php echo $innovations?>
</div>
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
$("#expand_win").click(function(){
    $("#dash_sambet").hide();
    $("#minimise_win").show();
      $("#main_welcomd").hide();
    $(this).hide();
})
$("#minimise_win").click(function(){
    $("#dash_sambet").show();
    $("#expand_win").show();
    $("#main_welcomd").show();
    
    $(this).hide();
})


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
        $.post("modules/system/content_team/pages/Dashboard/loadmore.php",{
            offset:offset
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
        $.post("modules/system/content_team/pages/Dashboard/loadmore.php",{
            offset:offset
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