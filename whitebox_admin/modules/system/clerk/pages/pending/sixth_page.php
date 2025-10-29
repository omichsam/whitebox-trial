<style type="text/css">
  .evaluate_simrequirements{
    margin-top: 5px;
  }
</style>

<?php
$innovation=base64_decode($_POST['innovation']);
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php"; 
$check_requirementsd="";
$query_requrements="";
$questions="question";
$clerks_question="clerks_question";
$commments="my_replies";
$evaluate_replys="evaluate_replys";
$sqlxol="SELECT requirements_feedback FROM feedback where Innovation_id='$innovation' and status='$questions'";

$query_runxdol=mysqli_query($con,$sqlxol) or die($query_runxdol."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxdol)){
  $requirements_feedback_question=$row['requirements_feedback'];

$query_requrements=$requirements_feedback_question;
}
if($requirements_feedback_question){
$check_requirementsd="Question";
$sqlx="SELECT * FROM innovations_table where Innovation_Id='$innovation'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
  $date_added=$row['date_added'];

  $busines_model=$row['busines_model'];

    $Innovation_name=$row['Innovation_name'];
$newrequirements_feedback="";
$query_question="";
$requirements_feedback="";
$requirements_feedback="";
$show_question="not_shown";
$requiremededs_feedbackcoments="";
$newrequirques_feedback="";
$sqlxo="SELECT * FROM feedback where Innovation_id='$innovation' and status='$commments'";

    $query_runxd=mysqli_query($con,$sqlxo) or die($query_runxd."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxd)){
  $requirques_feedback=$row['requirements_feedback'];
$Clerk_id=$row['Clerk_id'];
if($requirques_feedback){
$newrequirques_feedback=$requirques_feedback;
}else{

}

}
$sqlxo="SELECT requirements_feedback,Clerk_id FROM feedback where Innovation_id='$innovation' and status='$evaluate_replys'";

    $query_runxd=mysqli_query($con,$sqlxo) or die($query_runxd."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxd)){
  $requirementddss_feedbackcoments=$row['requirements_feedback'];


$get_clerkk=mysqli_query($con,"SELECT Name FROM administrators WHERE Id='$Clerk_id'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_clerkk);
$Name_clerk=$get['Name'];


if($requirementddss_feedbackcoments){
$requiremededs_feedbackcoments=$requirementddss_feedbackcoments;
}else{

}

}
$sqlxol="SELECT requirements_feedback FROM feedback where Innovation_id='$innovation' and status='$clerks_question'";

$query_runxdol=mysqli_query($con,$sqlxol) or die($query_runxdol."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxdol)){
  $requirements_feedback=$row['requirements_feedback'];





if($requirements_feedback){

$query_question="Yes";
$show_question="";
$newrequirements_feedback=$requirements_feedback;
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
<div class="col-sm-12 col-xs-12 evaluate_header" id="">INNOVATION RE-EVALUATION</div>
<div class="col-sm-12 col-xs-12 no_padding">
<div class="col-sm-8 col-xs-12 ">
  <div class="col-sm-12 col-xs-12 innovation_areas" id="innovation_area">
    
  <div class="col-sm-12 col-xs-12 evaluate_header"><?php echo $Innovation_name?></div>

    <div class="col-sm-12 col-xs-12">
  <div class="col-sm-12 colxs-12 default_header">TECHNICAL REQUIREMENTS</div>
  <div class="col-sm-12 col-xs-12" id="innovationneed">
<?php echo $busines_model?>
</div>
<div class="col-sm-12 col-xs-12 no_padding">
  <div class="col-sm-12 col-xs-12 evaluating_dclerks">
  <?php echo $query_requrements?>
</div>
 <div class="col-sm-12 col-xs-12" id="innovationneed">
<?php echo $newrequirques_feedback?>
</div>
</div>
<!--<div class="col-sm-12 col-xs-12">
<div class="col-sm-12 no_padding col-xs-12" id="need_clarify">
  Do you need more clarifications from the innovator?
</div>
  <div class=" no_padding col-sm-12 col-xs-12">
    <select class="col-xs-12 col-sm-3 select_questionssix">
      <option><?php echo $query_question?></option>
      <option>No</option>
      <option>Yes</option>
    </select>
  </div>
  <div class="no_padding my_explainquestions <?php echo $show_question?> col-sm-12 col-xs-12">
    Give a question that you want the innovator to answer.
    <textarea class=" col-sm-12 col-xs-12 questions_hold" id="solution_replythsix" maxlength="200" onkeyup="questionsixss(this.value)" placeholder="E.g Can i get to know more on the need?"><?php echo $newrequirements_feedback?></textarea>
    
    <div class="colsm-12 col-xs-12" style="text-align: center; " id="questionsixss">&nbsp;</div>
  </div>
</div>-->
<!--<div class="col-sm-12 col-xs-12" id="time_display"><strong><?php echo $time_d?> </strong> </div>-->
  </div>

</div>  
</div>
<div class="col-sm-4 col-xs-12 ">
  
<div class="col-sm-12 col-xs-12 innovation_areas" id="comment_area">
  <div class="col-sm-12 col-xs-12 evaluate_header">WRITE FEEDBACK HERE</div>
<textarea id="comrequiremens_solution" maxlength="400" onkeyup="coment_trequre(this.value)" placeholder="Type your coments about the subject here max(400 characters)" class="coments col-sm-12 col-xs-12"><?php echo $requiremededs_feedbackcoments?></textarea>
<div class="colsm-12 col-xs-12" style="text-align: center; " id="targeted_dcmorequire"></div>
</div>

</div>  
</div>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-4 col-xs-12"></div>

<div class="col-sm-4 col-xs-12 "><span class="btn evaluate_simrequirements theme_bg" role="back">Back</span> <!--<span class="btn evaluate_simrequirements theme_bg">Disapprove</span>--> <span class="btn evaluate_simrequirements theme_bg" role="next_page">Next Step</span> &nbsp;</div>

</div>
<div class="col-sm-12 col-xs-12 not_shown process_tm">
  <div class="col-sm-1 col-xs-1 stage_a theme_bg ">1</div>
  <div class="col-sm-1 col-xs-1 stage_b"></div>
  <div class="col-sm-1 col-xs-1 stage_a theme_bg ">2</div>
  <div class="col-sm-1 col-xs-1 stage_b"></div>
   <div class="col-sm-1 col-xs-1 stage_a  theme_bg">3</div>
  <div class="col-sm-1 col-xs-1 stage_b"></div>
  <div class="col-sm-1 col-xs-1 stage_a  theme_bg">4</div>

  <div class="col-sm-1 col-xs-1 stage_b"></div>
  <div class="col-sm-1 col-xs-1 stage_a  theme_bg">5</div>

  <div class="col-sm-1 col-xs-1 stage_b"></div>
  <div class="col-sm-1 col-xs-1 stage_a theme_bg ">6</div>

</div>

<div class="col-sm-12 col-xs-12 " style="text-align: center; " id="displaysixth_error">&nbsp;</div>
<div class="col-sm-12 col-xs-12 id_lowerfoot">
</div>


</div>
<?php
}else{

}

?>
<script type="text/javascript">
  function coment_trequre(str) {
  var lng = str.length;
  document.getElementById("targeted_dcmorequire").innerHTML = lng + ' out of 400 characters';
}
function questionsixss(str) {
  var lng = str.length;
  document.getElementById("questionsixss").innerHTML = lng + ' out of 200 characters';
}
  $(document).ready(function(){
$(".select_questionssix").change(function(){
  //alert()
var waiting=$(this).val()
if(waiting=="Yes"){
$(".my_explainquestions").show()
}else{
$(".my_explainquestions").hide()
}
})



    var loader=$("#loader").html()
    var display="#last_page";
    var folder=".evaluation_class";

    var innovats='<?php echo $innovation?>';
    var innovation=btoa(innovats);

    var url="modules/system/clerk/pages/pending/save.php";
    var urla="modules/system/clerk/pages/pending/last_page.php";
    $(".evaluate_simrequirements").click(function(){
      var my_role=$(this).attr("role");
      var user=$("#user_email").val();
      if(my_role=="next_page"){

  //alert()
var waiting=$(".select_questionssix").val()
if(waiting=="Yes"){
var solution_replythsix=$("#solution_replythsix").val()
if(solution_replythsix){

var new_question=btoa(solution_replythsix)
//when question exists

var comrequiremens_solution=$("#comrequiremens_solution").val()

        if(comrequiremens_solution){
        
    var innovats='<?php echo $innovation?>';
    var innovation=btoa(innovats);
        var coments=btoa(comrequiremens_solution)
          $("#displaysixth_error").html(loader)
          var field=btoa("requirements_feedback");
        //alert()
        //alert(user)
      $("#displaysixth_error").html(loader)
    $.post(""+url+"",{
      field:field,
      coments:coments,
      new_question:new_question,
      innovation:innovation,
      user:user},function(data){
        if($.trim(data)=="success"){
          $("#displaysixth_error").html("")
        $.post(""+urla+"",{innovation:innovation},function(data){$(folder).hide();
        $(display).html(data).show();
      })
          }else{
 

        $("#displaysixth_error").html(data)
        }

      })
       
    }else{
 //var innovation='<?php echo $innovation?>';
 var field=btoa("requirements_feedback");

   //var check_question="modules/system/clerk/pages/pending/check_question.php";
    var check="modules/system/clerk/pages/pending/check_first.php";
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
          $("#displaysixth_error").html("")
        $.post(""+urla+"",{innovation:innovation},function(data){$(folder).hide();
        $(display).html(data).show();
      })
          }else{
 

        $("#displaysixth_error").html(data)
        }

      })



  

      

}else{

      $("#targeted_dcmorequire").html("Say something here").css("color","red");
}

})

    }



































//end of existing question

}else{
 var field=btoa("requirements_feedback");

   var check_question="modules/system/clerk/pages/pending/check_question.php";
    //var check="modules/system/clerk/pages/pending/check_first.php";
   
    var innovats='<?php echo $innovation?>';
    var innovation=btoa(innovats);
$.post(""+check_question+"",{
  innovation:innovation,
 field:field},function(data){
if($.trim(data)=="exist"){
  //var innovation='<?php echo $innovation?>';
 var field=btoa("requirements_feedback");

   //var check_question="modules/system/clerk/pages/pending/check_question.php";
    var check="modules/system/clerk/pages/pending/check_first.php";
   
    var innovats='<?php echo $innovation?>';
    var innovation=btoa(innovats);
$.post(""+check+"",{
  innovation:innovation,
 field:field},function(data){
if($.trim(data)=="exist"){
  $.post(""+urla+"",{innovation:innovation},function(data){$(folder).hide();
        $(display).html(data).show();})


      

}else{

      $("#targeted_dcmorequire").html("Say something here").css("color","red");
}

})
}else{



  //if question does not exist
//$("#displaysixth_error").html("Write a question you need the innovator to answer.").css("color","red");
$("#solution_replythsix").attr("placeholder","Can not be empty!").css("color","red");


}
})

  //end of existing question





      

}
}else{
//NO QUERY











var solution_replythsix="";

var new_question=btoa(solution_replythsix)
//when question exists

var comrequiremens_solution=$("#comrequiremens_solution").val()

        if(comrequiremens_solution){
        
    var innovats='<?php echo $innovation?>';
    var innovation=btoa(innovats);
        var coments=btoa(comrequiremens_solution)
          $("#displaysixth_error").html(loader)
          var field=btoa("requirements_feedback");
        //alert()
        //alert(user)
      $("#displaysixth_error").html(loader)
    $.post(""+url+"",{
      field:field,
      coments:coments,
      new_question:new_question,
      innovation:innovation,
      user:user},function(data){
        if($.trim(data)=="success"){
          $("#displaysixth_error").html("")
        $.post(""+urla+"",{innovation:innovation},function(data){$(folder).hide();
        $(display).html(data).show();
      })
          }else{
 

        $("#displaysixth_error").html(data)
        }

      })
       
    }else{
 //var innovation='<?php echo $innovation?>';
 var field=btoa("requirements_feedback");

   //var check_question="modules/system/clerk/pages/pending/check_question.php";
    var check="modules/system/clerk/pages/pending/check_first.php";
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
          $("#displaysixth_error").html("")
        $.post(""+urla+"",{innovation:innovation},function(data){$(folder).hide();
        $(display).html(data).show();
      })
          }else{
 

        $("#displaysixth_error").html(data)
        }

      })



  

      

}else{

      $("#targeted_dcmorequire").html("Say something here").css("color","red");
}

})

    }

//END NO QUERY
}
        
  }else{
     
    $(".evaluation_class").hide();
    $("#fifth_page").show()



  }
    })
     var check_requirementsd='<?php echo $check_requirementsd?>';
if(check_requirementsd==""){
 var innovats='<?php echo $innovation?>';
    var innovation=btoa(innovats);

    $.post("modules/system/clerk/pages/pending/last_page.php",{innovation:innovation},function(data){
    $(".evaluation_class").hide();
    $("#last_page").html(data).show();
    });

}else{






}
  })
</script>