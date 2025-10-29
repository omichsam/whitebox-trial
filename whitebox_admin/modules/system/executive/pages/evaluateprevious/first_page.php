<style type="text/css">
	.evaluate_header{
		text-transform: uppercase;
		text-align: center;
		font-weight: bolder;
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
	.evaluate_need{
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
    box-shadow: 0 0 2px #ccc;
  }
  .stage_b{
    min-height: 20px;
    border-bottom: 4px solid #000;
  }
  .stage_a{
    min-height: 40px;
    border-radius: 15px;
    border:2px solid #000;
    font-weight: bold;
    padding-top: 5px;
    text-align: center;
    font-size: 22px;
  }
  .process_tm{
    margin-top: 5px;
  }
</style>

<?php

include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$innovation=$_POST['innovation'];
$sqlx="SELECT * FROM innovations_table where Innovation_Id='$innovation'";
$counter=0;
    $query_runx=mysql_query($sqlx) or die($query_runx."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runx)){
  $date_added=decrypt($row['date_added'], $key);

    $Innovation_name=base64_decode(decrypt($row['Innovation_name'], $key));

$sqlxo="SELECT need FROM   innovation_details where Innovation_Id='$innovation'";
$counter=0;
    $query_runxd=mysql_query($sqlxo) or die($query_runxd."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runxd)){
  $need=base64_decode(decrypt($row['need'],$key));




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
<div class="col-sm-12 col-xs-12 evaluate_header" id="">EVALUATION STAGE ONE</div>
<div class="col-sm-12 col-xs-12 no_padding">
<div class="col-sm-8 col-xs-12 ">
	<div class="col-sm-12 col-xs-12 innovation_areas" id="innovation_area">
		
	<div class="col-sm-12 col-xs-12 evaluate_header"><?php echo $Innovation_name?></div>

    <div class="col-sm-12 col-xs-12">
	<div class="col-sm-12 colxs-12 default_header">NEED</div>
  <div class="col-sm-12 col-xs-12" id="innovationneed">
<?php echo $need?>
</div>
<div class="col-sm-12 col-xs-12" id="time_display"><strong><?php echo $time_d?> </strong> </div>
	</div>

</div>	
</div>
<div class="col-sm-4 col-xs-12 ">
	
<div class="col-sm-12 col-xs-12 innovation_areas" id="comment_area">
	<div class="col-sm-12 col-xs-12 evaluate_header">WRITE FEEDBACK HERE</div>
<textarea id="needcoments" maxlength="400" onkeyup="charcountupdate(this.value)" placeholder="Type your coments about the subject here max(400 characters)" class="coments col-sm-12 col-xs-12"></textarea>
<div class="colsm-12 col-xs-12" style="text-align: center; " id="counter_ct"></div>
</div>

</div>	
</div>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-4 col-xs-12"></div>

<div class="col-sm-4 col-xs-12 "><span class="btn evaluate_need theme_bg" role="back">Back</span> <!--<span class="btn evaluate_need theme_bg">Disapprove</span>--> <span class="btn evaluate_need theme_bg" role="next_page">Next Step</span> &nbsp;</div>

</div>
<div class="col-sm-12 col-xs-12 " style="text-align: center; " id="display_error">&nbsp;</div>
<div class="col-sm-12 col-xs-12 process_tm">
  <div class="col-sm-1 col-xs-1 stage_a theme_bg ">1</div>
  <div class="col-sm-1 col-xs-1 stage_b"></div>
  <div class="col-sm-1 col-xs-1 stage_a  "></div>
  <div class="col-sm-1 col-xs-1 stage_b"></div>
   <div class="col-sm-1 col-xs-1 stage_a  "></div>
  <div class="col-sm-1 col-xs-1 stage_b"></div>
  <div class="col-sm-1 col-xs-1 stage_a  "></div>

  <div class="col-sm-1 col-xs-1 stage_b"></div>
  <div class="col-sm-1 col-xs-1 stage_a  "></div>

  <div class="col-sm-1 col-xs-1 stage_b"></div>
  <div class="col-sm-1 col-xs-1 stage_a  "></div>

</div>
<div class="col-sm-12 col-xs-12 id_lowerfoot">
</div>


</div>
<script type="text/javascript">
  function charcountupdate(str) {
  var lng = str.length;
  document.getElementById("counter_ct").innerHTML = lng + ' out of 400 characters';
}
  $(document).ready(function(){
    var loader=$("#loader").html()
    var display="#second_page";
    var folder=".evaluation_class";

    var innovats='<?php echo $innovation?>';
    var innovation=btoa(innovats);

    var url="modules/system/clerk/pages/evaluate/save.php";
    var urla="modules/system/clerk/pages/evaluate/second_page.php";
    $(".evaluate_need").click(function(){
      var my_role=$(this).attr("role");
      var user=$("#user_email").val();
      if(my_role=="next_page"){
        var needcoment=$("#needcoments").val()

        if(needcoment){
        
    var innovats='<?php echo $innovation?>';
    var innovation=btoa(innovats);
        var coments=btoa(needcoment)
          $("#display_error").html(loader)
          var field=btoa("need_feedback");
        //alert()
        //alert(user)
      $("#display_error").html(loader)
    $.post(""+url+"",{
      field:field,
      coments:coments,
      innovation:innovation,
      user:user},function(data){
        if($.trim(data)=="success"){
          $("#display_error").html("")
        $.post(""+urla+"",{innovation:innovation},function(data){$(folder).hide();
        $(display).html(data).show();
      })
          }else{
 

        $("#display_error").html(data)
        }

      })
       
    }else{
 //var innovation='<?php echo $innovation?>';
 var field=btoa("need_feedback");
    var check="modules/system/clerk/pages/evaluate/check_first.php";
   
    var innovats='<?php echo $innovation?>';
    var innovation=btoa(innovats);
$.post(""+check+"",{
  innovation:innovation,
 field:field},function(data){
if($.trim(data)=="exist"){

        $.post(""+urla+"",{innovation:innovation},function(data){$(folder).hide();
        $(display).html(data).show();})

}else{

      $("#counter_ct").html("Say something here").css("color","red");
}

})

    }
  }else{
     var innovation='<?php echo $innovation?>';
    var my_url="modules/system/clerk/pages/evaluate/evaluate.php";
$.post(""+my_url+"",{innovation:innovation},function(data){
        $("#home").html(data);})



  }
    })
  
  })
</script>