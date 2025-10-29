<style type="text/css">
  .evaluate_header{
    text-transform: uppercase;
    text-align: center;
    font-weight: bolder;
    border-radius: 10px;
    border-bottom: 2px #ccc solid;
  }
  .innovation_areas{
    min-height: 400px;
    box-shadow: 0 0 2px #ccc;
    background:#fff;
    margin-top: 5px;
  }
  .coments{
    border: 1px solid #ccc;
    resize: none;
    min-height: 340px;
    margin-top: 5px;
    margin-bottom: 5px;
  }
  .evaluate_model{
    margin-top: 5px;
  }
  .innovation_photos{
    min-height: 150px;
    box-shadow:0 0 2px #ccc;
  }
  #time_display{
    text-align: right;
  }
  .id_lowerfoot{
    min-height: 50px;
  }
  #innovationneed{
    min-height: 200px;
  }
</style>

<?php

include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$innovation=base64_decode($_POST['innovation']);
$sqlx="SELECT * FROM innovations_table where Innovation_Id='$innovation'";
$counter=0;
    $query_runx=mysql_query($sqlx) or die($query_runx."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runx)){
  $date_added=decrypt($row['date_added'], $key);

    $Innovation_name=base64_decode(decrypt($row['Innovation_name'], $key));

$sqlxo="SELECT busines_model FROM innovations_information where Innovation_Id='$innovation'";
$counter=0;
    $query_runxd=mysql_query($sqlxo) or die($query_runxd."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runxd)){
  $busines_model=base64_decode(decrypt($row['busines_model'],$key));




}
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
     return "Just now";
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





}

?>
<div class="col-sm-12 col-xs-12 no_padding">
<div class="col-sm-12 col-xs-12 evaluate_header" id="">EVALUATION STAGE FOUR</div>
<div class="col-sm-12 col-xs-12 no_padding">
<div class="col-sm-8 col-xs-12 ">
  <div class="col-sm-12 col-xs-12 innovation_areas" id="innovation_area">
    
  <div class="col-sm-12 col-xs-12 evaluate_header"><?php echo $Innovation_name?></div>

    <div class="col-sm-12 col-xs-12">
  <div class="col-sm-12 colxs-12 default_header">BUSINESS MODEL</div>
  <div class="col-sm-12 col-xs-12" id="innovationneed">
<?php echo $busines_model?>
</div>
<div class="col-sm-12 col-xs-12" id="time_display"><strong><?php echo $time_d?> </strong> </div>
  </div>

</div>  
</div>
<div class="col-sm-4 col-xs-12 ">
  
<div class="col-sm-12 col-xs-12 innovation_areas" id="comment_area">
  <div class="col-sm-12 col-xs-12 evaluate_header">WRITE FEEDBACK HERE</div>
<textarea id="comment_model" onkeyup="modeldupdate(this.value)" class="coments col-sm-12 col-xs-12"></textarea>
<div class="colsm-12 col-xs-12" style="text-align: center; " id="model_check"></div>
</div>

</div>  
</div>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-4 col-xs-12"></div>

<div class="col-sm-4 col-xs-12 "><span class="btn evaluate_model theme_bg" role="back">Back</span> <!--<span class="btn evaluate_model theme_bg">Disapprove</span>--> <span class="btn evaluate_model theme_bg" role="fifth_page">Next Step</span> </div>

</div>

<div class="col-sm-12 col-xs-12 " style="text-align: center; " id="fourth_error">&nbsp;</div>

<div class="col-sm-12 col-xs-12 process_tm">
  <div class="col-sm-1 col-xs-1 stage_a theme_bg ">1</div>
  <div class="col-sm-1 col-xs-1 stage_b"></div>
  <div class="col-sm-1 col-xs-1 stage_a theme_bg ">2</div>
  <div class="col-sm-1 col-xs-1 stage_b"></div>
   <div class="col-sm-1 col-xs-1 stage_a theme_bg ">3</div>
  <div class="col-sm-1 col-xs-1 stage_b"></div>
  <div class="col-sm-1 col-xs-1 stage_a theme_bg ">4</div>

  <div class="col-sm-1 col-xs-1 stage_b"></div>
  <div class="col-sm-1 col-xs-1 stage_a  "></div>

  <div class="col-sm-1 col-xs-1 stage_b"></div>
  <div class="col-sm-1 col-xs-1 stage_a  "></div>

</div>
<div class="col-sm-12 col-xs-12 id_lowerfoot">
</div>


</div>
<script type="text/javascript">
    function modeldupdate(str) {
  var lng = str.length;
  document.getElementById("model_check").innerHTML = lng + ' out of 400 characters';
}
  $(document).ready(function(){
    var loader=$("#loader").html()
    var display="#third_error";
    var fouth_target="#fifth_page";
    var folder=".evaluation_class";
    var innovation=btoa('<?php echo $innovation?>');
    var urlfourth_save="modules/system/clerk/pages/evaluate/save.php";
    var urlfifth="modules/system/clerk/pages/evaluate/fifth_page.php";
    $(".evaluate_model").click(function(){
      var user=$("#user_email").val();
      var my_role=$(this).attr("role");
      if(my_role=="fifth_page"){
        var comment_model=$("#comment_model").val()
        if(comment_model){
          
 var field=btoa("businessmodel_feedback");
    var innovats='<?php echo $innovation?>';
    var innovation=btoa(innovats);
        var coments=btoa(comment_model);

        //alert()
      $(display).html(loader);
    $.post(""+urlfourth_save+"",{field:field,innovation:innovation,coments:coments,user:user},function(data){ if($.trim(data)=="success"){$.post(""+urlfifth+"",{innovation:innovation},function(data){$(folder).hide();$(display).html("");$(fouth_target).show().html(data);})}else{$(display).html(data);}})
  }else{
    //alert()
 var field=btoa("businessmodel_feedback");
    var check="modules/system/clerk/pages/evaluate/check_first.php";
   
    var innovats='<?php echo $innovation?>';
    var innovation=btoa(innovats);
$.post(""+check+"",{
  innovation:innovation,
 field:field},function(data){
if($.trim(data)=="exist"){

        $.post(""+urlfifth+"",{innovation:innovation},function(data){$(folder).hide();
        $(fouth_target).html(data).show();})

}else{
//alert()
      $("#model_check").html("Say something here").css("color","red");
}

})

















  }
  }else{
          
    $(".evaluation_class").hide();
    $("#third_page").show()
        }
    })

  
  })
</script>