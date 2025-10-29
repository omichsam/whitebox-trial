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
    background: #fbfafa;
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
  .questions_hold{
       border: 1px solid #ccc;
    resize: none;
    min-height: 80px;
    margin-top: 5px;
    margin-bottom: 5px;
    background: #fbfafa;
  }
  #reply_counter{
    margin-top: 5px;
    text-align: center;
  }
	#presentation_place{
		min-height: 500px;
		max-height: 560px;
		overflow: auto;
		box-shadow: 0 0 2px #ccc;
		background: #fff;
	}
	#viewers_area{
	   	min-height: 500px;
		max-height: 500px;
		overflow: auto;
		box-shadow: 0 0 2px #ccc;
		background: #fff; 
	}
	.invite_holders{
    min-height: 130px;
    box-shadow: 0 0 5px #ccc;
    margin-top: 4px;
border:3px solid #ccc;
border-radius: 5px;
	}
	#lower_present{
		min-height: 50px;
	}
	.micro_buttons{
		cursor: pointer;
	}
	.video_buttons{
		cursor: pointer;
	}
	#social_presentas{
 background: #fff;
min-height: 100px;
right:0px;
min-width: 250px;
max-width: 250px;
position: absolute;
z-index: 99;
top:4%;
box-shadow: -11px 0px 18px #000;
border-right: 1px solid #ebf1f3;

}
#open_presentas{
   background: #fff;
min-height: 50px;
right:0px;
min-width: 50px;
position: absolute;
z-index: 99;
top:4%;
box-shadow: -11px 0px 18px #000;
border-right: 1px solid #ebf1f3;  
border-radius:40px 0 0 40px;
}
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
    background: #fbfafa;
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
  .questions_hold{
       border: 1px solid #ccc;
    resize: none;
    min-height: 80px;
    margin-top: 5px;
    margin-bottom: 5px;
    background: #fbfafa;
  }
  #reply_counter{
    margin-top: 5px;
    text-align: center;
  }
  #open_presentas{
   background: #fff;
min-height: 50px;
right:0px;
min-width: 50px;
position: absolute;
z-index: 99;
top:4%;
box-shadow: -11px 0px 18px #000;
border-right: 1px solid #ebf1f3;  
border-radius:40px 0 0 40px;
}
	#social_presentas{
 background: #fff;
min-height: 100px;
right:0px;
min-width: 350px;
max-width: 350px;
position: absolute;
z-index: 99;
top:4%;
overflow:auto;
box-shadow: -11px 0px 18px #000;
border-right: 1px solid #ebf1f3;

}
#message_ereas{
    min-height:250px;
    max-height:300px;
    overflow:auto;
}
</style>

<?php

include "../../../../../connect.php";
include("../../../../functions/security.php");
$innovation=$_POST['innovation'];
$commments="comments";
$questions="question";
$sqlx="SELECT * FROM innovations_table where Innovation_Id='$innovation'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
  $date_added=$row['date_added'];

  $need=$row['need'];

    $Innovation_name=$row['Innovation_name'];
$newneed_feedback="";
$newneed_question="";
$query_question="";
$need_feedback="";
$need_question="";
$show_question="not_shown";
$sqlxo="SELECT need_feedback FROM feedback where Innovation_id='$innovation' and status='$commments'";

    $query_runxd=mysqli_query($con,$sqlxo) or die($query_runxd."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxd)){
  $need_feedback=$row['need_feedback'];

if($need_feedback){
$newneed_feedback=$need_feedback;
}else{

}

}
$sqlxol="SELECT need_feedback FROM feedback where Innovation_id='$innovation' and status='$questions'";

$query_runxdol=mysqli_query($con,$sqlxol) or die($query_runxdol."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxdol)){
  $need_question=$row['need_feedback'];





if($need_question){

$query_question="Yes";
$show_question="";
$newneed_question=$need_question;
}else{

}
}
/*
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

*/



}

?>
<div class="col-sm-12 col-xs-12 no_padding">
<div class="col-sm-12 col-xs-12 evaluate_header" id="">WELCOME TO PITCH</div>
<div class="col-sm-12 col-xs-12 no_padding">
<div class="" id="open_presentas">
 <span class="btn " id="open_pres" style="color:green;cursor:pointer;" > <i class="fa fa-plus fa-2x"></i></span>
	</div>
		<div class="not_shown" id="social_presentas">
		     <!--<span class="btn not_shown" id="unpinpin_pres" style="color:red;cursor:pointer;" >Pin <i class="fa fa-thumb-tack"></i></span>
		  
		  <span class="btn " id="pin_pres" style="color:green;cursor:pointer;" >Pin <i class="fa fa-thumb-tack"></i></span>-->
		    <span class="btn " id="close_pres" style="color:red;cursor:pointer;float:right;" >Close <i class="fa fa-times"></i></span>
		<div class="col-sm-12 col-xs-12 presentation_divs" id="message_ereas">
		
		</div>
	</div>
	</div>
<div class="col-sm-12 col-xs-12 no_padding">
<div class="col-sm-9 col-xs-12 ">
<div class="col-sm-12 col-xs-12  innovation_areas" id="innovation_area">
    

</div>
</div>
<div class="col-sm-3 col-xs-12 ">
  
<div class="col-sm-12 col-xs-12 innovation_areas" id="comment_area">
</div>

</div>  
</div>

<div class="col-sm-12 col-xs-12 id_lowerfoot">
</div>


</div>
<script type="text/javascript">
  $(document).ready(function(){
      var innovation='<?php echo $innovation?>';
    $("#close_pres").click(function(){
        
       // $("#menu_page").show().removeClass("slideOutLeft").addClass("animated slideInLeft");
        $("#social_presentas").removeClass("slideInRight").addClass("animated slideOutRight");
        $("#open_presentas").show();
//$("#social_presentas").hide();
        })
        $("#open_pres").click(function(){
            
       $("#social_presentas").show().removeClass("slideOutRight").addClass("animated slideInRight");
        //$("#social_presentas").removeClass("slideInRight").addClass("slideOutRight").hide();
          $("#open_presentas").hide();  
           
       // var desinged=setInterval(close_df, 7000);
        })
     
      //alert(my_id)
      $.post('modules/system/external/pages/pitch/viewers.php',{innovation:innovation},function(data){
          //alert(data)
         $("#comment_area").html(data); 
      })
       $.post("modules/system/external/pages/pitch/page.php",{
	innovation:innovation
	  },function(data){
	      //alert(data)
		$("#innovation_area").html(data);
	  })
	    $.post("modules/system/external/pages/pitch/messages.php",{
        innovation:innovation
	  },function(data){
	      //alert(data)
	 	$("#message_ereas").html(data);
	  })
      /*Navigating menu*/
var innovationIntervals=setInterval(function(){
	refresh_innovate_lbls();
},5000);


  })
  
function refresh_innovate_lbls(){
	/*refresh messages counts*/
	  
      var innovation='<?php echo $innovation?>';
	  $.post("modules/system/external/pages/pitch/page.php",{
	  		innovation:innovation
	  },function(data){
	      //alert(data)
	 	$("#innovation_area").html(data);
	  })
	 /*
	    $.post('modules/system/external/pages/pitch/viewers.php',{my_id:my_id},function(data){
        $("#comment_area").html(data); 
      })*/
	/*refresh notice counts*/
	/*refresh analytics counts*/
}
</script>