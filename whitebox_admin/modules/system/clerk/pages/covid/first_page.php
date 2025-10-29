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
</style>

<?php

include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$innovation=$_POST['innovation'];
$commments="comments";
$questions="question";
$sqlx="SELECT * FROM covid19_innovations where id='$innovation'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
  $date_added=$row['date_added'];

  $need=$row['need'];

    $Innovation_name="COVID 19 Innovation";
$newneed_feedback="";
$newneed_question="";
$query_question="";
$need_feedback="";
$need_question="";
$show_question="not_shown";
$sqlxo="SELECT need_feedback FROM covid_feedback where Innovation_id='$innovation' and status='$commments'";

    $query_runxd=mysqli_query($con,$sqlxo) or die($query_runxd."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxd)){
  $need_feedback=$row['need_feedback'];

if($need_feedback){
$newneed_feedback=$need_feedback;
}else{

}

}
$sqlxol="SELECT need_feedback FROM covid_feedback where Innovation_id='$innovation' and status='$questions'";

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
<div class="col-sm-12 col-xs-12 evaluate_header" id="">EVALUATION</div>
<div class="col-sm-12 col-xs-12 no_padding">
<div class="col-sm-8 col-xs-12 ">
  <div class="col-sm-12 col-xs-12 innovation_areas" id="innovation_area">
    
  <div class="col-sm-12 col-xs-12 evaluate_header"><?php echo $Innovation_name?></div>

    <div class="col-sm-12 col-xs-12">
  <div class="col-sm-12 colxs-12 default_header">NEED</div>
  <div class="col-sm-12 col-xs-12" id="innovationneed">
<?php echo $need?>
</div>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-12 no_padding col-xs-12" id="need_clarify">
  Do you need more clarifications from the innovator?
</div>
  <div class=" no_padding col-sm-12 col-xs-12">
    <select class="col-xs-12 col-sm-3 select_questions">
      <option><?php echo $query_question?></option>
      <option>No</option>
      <option>Yes</option>
    </select>
  </div>
  <div class="no_padding my_explainquestions <?php echo $show_question?> col-sm-12 col-xs-12">
    Give a question that you want the innovator to answer.
    <textarea class=" col-sm-12 col-xs-12 questions_hold" id="need_reply" maxlength="200" onkeyup="questionone(this.value)" placeholder="E.g Can i get to know more on the need?"><?php echo $newneed_question?></textarea>
    
    <div class="colsm-12 col-xs-12" style="text-align: center; " id="questionone">&nbsp;</div>
  </div>
</div>
<!--<div class="col-sm-12 col-xs-12" id="time_display"><strong><?php echo $time_d?> </strong> </div>-->
  </div>

</div>  
</div>
<div class="col-sm-4 col-xs-12 ">
  
<div class="col-sm-12 col-xs-12 innovation_areas" id="comment_area">
  <div class="col-sm-12 col-xs-12 evaluate_header">WRITE FEEDBACK HERE</div>
<textarea id="needcoments" maxlength="400" onkeyup="charcountupdate(this.value)" placeholder="Type your coments about the subject here max(400 characters)" class="coments col-sm-12 col-xs-12"><?php echo $newneed_feedback?></textarea>
<div class="colsm-12 col-xs-12" style="text-align: center; " id="counter_ct"></div>
</div>

</div>  
</div>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-4 col-xs-12"></div>

<div class="col-sm-4 col-xs-12 "><span class="btn evaluate_need theme_bg" role="back">Back</span> <!--<span class="btn evaluate_need theme_bg">Disapprove</span>--> <span class="btn evaluate_need theme_bg" role="next_page">Next Step</span> &nbsp;</div>

</div>
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

<div class="col-sm-12 col-xs-12 " style="text-align: center; " id="display_error">&nbsp;</div>
<div class="col-sm-12 col-xs-12 id_lowerfoot">
</div>


</div>
<script type="text/javascript">
  function charcountupdate(str) {
  var lng = str.length;
  document.getElementById("counter_ct").innerHTML = lng + ' out of 400 characters';
}
function questionone(str) {
  var lng = str.length;
  document.getElementById("questionone").innerHTML = lng + ' out of 200 characters';
}
  $(document).ready(function(){
$(".select_questions").change(function(){
  //alert()
var waiting=$(this).val()
if(waiting=="Yes"){
$(".my_explainquestions").show()
}else{
$(".my_explainquestions").hide()
}
})



    var loader=$("#loader").html()
    var display="#second_page";
    var folder=".evaluation_class";

    var innovats='<?php echo $innovation?>';
    var innovation=btoa(innovats);

    var url="modules/system/clerk/pages/covid/save.php";
    var urla="modules/system/clerk/pages/covid/second_page.php";
    $(".evaluate_need").click(function(){
      var my_role=$(this).attr("role");
      var user=$("#user_email").val();
      if(my_role=="next_page"){

  //alert()
var waiting=$(".select_questions").val()
if(waiting=="Yes"){
var need_reply=$("#need_reply").val()
if(need_reply){

var new_question=btoa(need_reply)
//when question exists

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
      new_question:new_question,
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

   //var check_question="modules/system/clerk/pages/covid/check_question.php";
    var check="modules/system/clerk/pages/covid/check_first.php";
   var coments="";
    var innovats='<?php echo $innovation?>';
    var innovation=btoa(innovats);
$.post(""+check+"",{
  innovation:innovation,
 field:field},function(data){
if($.trim(data)=="exist"){
    $.post(""+url+"",{
      field:field,
      coments:coments,
      new_question:new_question,
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

      $("#counter_ct").html("Say something here").css("color","red");
}

})

    }



































//end of existing question

}else{
 var field=btoa("need_feedback");

   var check_question="modules/system/clerk/pages/covid/check_question.php";
    //var check="modules/system/clerk/pages/covid/check_first.php";
   
    var innovats='<?php echo $innovation?>';
    var innovation=btoa(innovats);
$.post(""+check_question+"",{
  innovation:innovation,
 field:field},function(data){
if($.trim(data)=="exist"){
  //var innovation='<?php echo $innovation?>';
 var field=btoa("need_feedback");

   //var check_question="modules/system/clerk/pages/covid/check_question.php";
    var check="modules/system/clerk/pages/covid/check_first.php";
   
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
}else{



  //if question does not exist
//$("#display_error").html("Write a question you need the innovator to answer.").css("color","red");
$("#need_reply").attr("placeholder","Can not be empty!").css("color","red");


}
})

  //end of existing question





      

}
}else{
//NO QUERY











var need_reply="";

var new_question=btoa(need_reply)
//when question exists

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
      new_question:new_question,
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

   //var check_question="modules/system/clerk/pages/covid/check_question.php";
    var check="modules/system/clerk/pages/covid/check_first.php";
   var coments="";
    var innovats='<?php echo $innovation?>';
    var innovation=btoa(innovats);
$.post(""+check+"",{
  innovation:innovation,
 field:field},function(data){
if($.trim(data)=="exist"){
    $.post(""+url+"",{
      field:field,
      coments:coments,
      new_question:new_question,
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

      $("#counter_ct").html("Say something here").css("color","red");
}

})

    }

//END NO QUERY
}
        
  }else{
     var innovation='<?php echo $innovation?>';
    var my_url="modules/system/clerk/pages/covid/evaluate.php";
$.post(""+my_url+"",{innovation:innovation},function(data){
        $("#home").html(data);})



  }
    })
  
  })
</script>