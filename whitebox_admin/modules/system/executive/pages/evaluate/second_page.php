<style type="text/css">
  .evaluate_solution{
    margin-top: 5px;
  }
</style>

<?php

include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$innovation=base64_decode($_POST['innovation']);
$sqlx="SELECT * FROM innovations_table where Innovation_Id='$innovation'";

$questions="executive_question";
$status="executive_comments";
$commments="comments";
//$questions="question";
$sqlx="SELECT * FROM innovations_table where Innovation_Id='$innovation'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
  $date_added=$row['date_added'];

  $solution=$row['solution'];

    $Innovation_name=$row['Innovation_name'];
    $exenewsolution_feedback="";
$newsolution_feedback="";
$newneed_question="";
$query_question="";
$solution_feedback="";
$need_question="";
$show_question="not_shown";
$sqlxo="SELECT solution_feedback FROM feedback where Innovation_id='$innovation' and status='$status'";

    $query_runxd=mysqli_query($con,$sqlxo) or die($query_runxd."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxd)){
  $exsolution_feedback=$row['solution_feedback'];

if($exsolution_feedback){
$exenewsolution_feedback=$exsolution_feedback;
}else{

}

$sqlxo="SELECT solution_feedback,Clerk_id FROM feedback where Innovation_id='$innovation' and status='$commments'";

    $query_runxd=mysqli_query($con,$sqlxo) or die($query_runxd."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxd)){
  $solution_feedbackcoments=$row['solution_feedback'];
//$Clerk_id=$row['Clerk_id'];

$get_clerkde=mysqli_query($con,"SELECT Clerk_id FROM innovation_stamps WHERE innovation_id ='$innovation'") or die(mysqli_error($con));
$getttt=mysqli_fetch_assoc($get_clerkde);
$Clerk_id=$getttt['Clerk_id'];
if($Clerk_id){

}else{

$get_clerkdei=mysqli_query($con,"SELECT clerk_id FROM innovations_reports WHERE Innovation_Id ='$innovation'") or die(mysqli_error($con));
$getttti=mysqli_fetch_assoc($get_clerkdei);
$Clerk_id=$getttti['clerk_id'];
}
$get_clerkk=mysqli_query($con,"SELECT Name FROM administrators WHERE Id='$Clerk_id'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_clerkk);
$Name_clerk=$get['Name'];


if($solution_feedbackcoments){
$newneedc_feedback=$solution_feedbackcoments;
}else{

}
}
$sqlxo="SELECT solution_feedback FROM feedback where Innovation_id='$innovation' and status='$commments'";

    $query_runxd=mysqli_query($con,$sqlxo) or die($query_runxd."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxd)){
  $solution_feedback=$row['solution_feedback'];

if($solution_feedback){
$newsolution_feedback=$solution_feedback;
}else{

}

}
$sqlxol="SELECT solution_feedback FROM feedback where Innovation_id='$innovation' and status='$questions'";

$query_runxdol=mysqli_query($con,$sqlxol) or die($query_runxdol."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxdol)){
  $need_question=$row['solution_feedback'];





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
}
?>
<div class="col-sm-12 col-xs-12 no_padding">
<div class="col-sm-12 col-xs-12 evaluate_header" id="">SECOND EVALUATION</div>
<div class="col-sm-12 col-xs-12 no_padding">
<div class="col-sm-8 col-xs-12 ">
  <div class="col-sm-12 col-xs-12 innovation_areas" id="innovation_area">
    
  <div class="col-sm-12 col-xs-12 evaluate_header"><?php echo $Innovation_name?></div>

    <div class="col-sm-12 col-xs-12">
  <div class="col-sm-12 colxs-12 default_header">SOLUTION</div>
  <div class="col-sm-12 col-xs-12" id="innovationneed">
<?php echo $solution?>
</div>
<div class="col-sm-12 col-xs-12 no_padding">
  <div class="col-sm-12 col-xs-12 evaluating_dclerks">
  Comments from evaluator (<?php echo $Name_clerk?>)
</div>
 <div class="col-sm-12 col-xs-12" id="innovationneed">
<?php echo $newsolution_feedback?>
</div>
</div>
<!--<div class="col-sm-12 col-xs-12">
<div class="col-sm-12 no_padding col-xs-12" id="need_clarify">
  Do you need more clarifications from the innovator?
</div>
  <div class=" no_padding col-sm-12 col-xs-12">
    <select class="col-xs-12 col-sm-3 select_questiontwo">
      <option><?php echo $query_question?></option>
      <option>No</option>
      <option>Yes</option>
    </select>
  </div>
  <div class="no_padding my_explainquestions <?php echo $show_question?> col-sm-12 col-xs-12">
    Please provide a question for innovator to clarify.
    <textarea class=" col-sm-12 col-xs-12 questions_hold" id="solution_replytwo" maxlength="200" onkeyup="questiontwo(this.value)" placeholder="E.g Can i get to know more on the need?"><?php echo $newneed_question?></textarea>
    
    <div class="colsm-12 col-xs-12" style="text-align: center; " id="questiontwo">&nbsp;</div>
  </div>
</div>-->
<!--<div class="col-sm-12 col-xs-12" id="time_display"><strong><?php echo $time_d?> </strong> </div>-->
  </div>

</div>  
</div>
<div class="col-sm-4 col-xs-12 ">
  
<div class="col-sm-12 col-xs-12 innovation_areas" id="comment_area">
  <div class="col-sm-12 col-xs-12 evaluate_header">WRITE FEEDBACK HERE</div>
<textarea id="comment_solution" maxlength="400" onkeyup="coment_solution(this.value)" placeholder="Type your coments about the subject here max(400 characters)" class="coments col-sm-12 col-xs-12"><?php echo $exenewsolution_feedback?></textarea>
<div class="colsm-12 col-xs-12" style="text-align: center; " id="solution_dc"></div>
</div>

</div>  
</div>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-4 col-xs-12"></div>

<div class="col-sm-4 col-xs-12 "><span class="btn evaluate_solution theme_bg" role="back">Back</span> <!--<span class="btn evaluate_solution theme_bg">Disapprove</span>--> <span class="btn evaluate_solution theme_bg" role="next_page">Next Step</span> &nbsp;</div>

</div>
<div class="col-sm-12 col-xs-12 process_tm">
  <div class="col-sm-1 col-xs-1 stage_a theme_bg ">1</div>
  <div class="col-sm-1 col-xs-1 stage_b"></div>
  <div class="col-sm-1 col-xs-1 stage_a theme_bg ">2</div>
  <div class="col-sm-1 col-xs-1 stage_b"></div>
   <div class="col-sm-1 col-xs-1 stage_a  "></div>
  <div class="col-sm-1 col-xs-1 stage_b"></div>
  <div class="col-sm-1 col-xs-1 stage_a  "></div>

  <div class="col-sm-1 col-xs-1 stage_b"></div>
  <div class="col-sm-1 col-xs-1 stage_a  "></div>

  <div class="col-sm-1 col-xs-1 stage_b"></div>
  <div class="col-sm-1 col-xs-1 stage_a  "></div>

</div>

<div class="col-sm-12 col-xs-12 " style="text-align: center; " id="displaysec_error">&nbsp;</div>
<div class="col-sm-12 col-xs-12 id_lowerfoot">
</div>


</div>
<script type="text/javascript">
  function coment_solution(str) {
  var lng = str.length;
  document.getElementById("solution_dc").innerHTML = lng + ' out of 400 characters';
}
function questiontwo(str) {
  var lng = str.length;
  document.getElementById("questiontwo").innerHTML = lng + ' out of 200 characters';
}
  $(document).ready(function(){
$(".select_questiontwo").change(function(){
  //alert()
var waiting=$(this).val()
if(waiting=="Yes"){
$(".my_explainquestions").show()
}else{
$(".my_explainquestions").hide()
}
})



    var loader=$("#loader").html()
    var display="#third_page";
    var folder=".evaluation_class";

    var innovats='<?php echo $innovation?>';
    var innovation=btoa(innovats);

    var url="modules/system/executive/pages/evaluate/save.php";
    var urla="modules/system/executive/pages/evaluate/third_page.php";
    $(".evaluate_solution").click(function(){
      var my_role=$(this).attr("role");
      var user=$("#user_email").val();
      if(my_role=="next_page"){

  //alert()
var waiting=$(".select_questiontwo").val()
if(waiting=="Yes"){
var solution_replytwo=$("#solution_replytwo").val()
if(solution_replytwo){

var new_question=btoa(solution_replytwo)
//when question exists

var comment_solution=$("#comment_solution").val()

        if(comment_solution){
        
    var innovats='<?php echo $innovation?>';
    var innovation=btoa(innovats);
        var coments=btoa(comment_solution)
          $("#displaysec_error").html(loader)
          var field=btoa("solution_feedback");
        //alert()
        //alert(user)
      $("#displaysec_error").html(loader)
    $.post(""+url+"",{
      field:field,
      coments:coments,
      new_question:new_question,
      innovation:innovation,
      user:user},function(data){
        if($.trim(data)=="success"){
          $("#displaysec_error").html("")
        $.post(""+urla+"",{innovation:innovation},function(data){$(folder).hide();
        $(display).html(data).show();
        var user=$("#user_email").val();
        var startdata=btoa("impact");
   $.post("modules/system/executive/pages/evaluate/savepresent.php",{
       innovation:innovation,
                  user:user,
                  startdata:startdata
        });
      })
      
          }else{
 

        $("#displaysec_error").html(data)
        }

      })
       
    }else{
 //var innovation='<?php echo $innovation?>';
 var field=btoa("solution_feedback");

   //var check_question="modules/system/executive/pages/evaluate/check_question.php";
    var check="modules/system/executive/pages/evaluate/check_first.php";
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
          $("#displaysec_error").html("")
        $.post(""+urla+"",{innovation:innovation},function(data){$(folder).hide();
        $(display).html(data).show();
        var user=$("#user_email").val();
        var startdata=btoa("impact");
   $.post("modules/system/executive/pages/evaluate/savepresent.php",{
       innovation:innovation,
                  user:user,
                  startdata:startdata
        });
      })
          }else{
 

        $("#displaysec_error").html(data)
        }

      })



  

      

}else{

      $("#solution_dc").html("Please give a feedback").css("color","red");
}

})

    }



































//end of existing question

}else{
 var field=btoa("solution_feedback");

   var check_question="modules/system/executive/pages/evaluate/check_question.php";
    //var check="modules/system/executive/pages/evaluate/check_first.php";
   
    var innovats='<?php echo $innovation?>';
    var innovation=btoa(innovats);
$.post(""+check_question+"",{
  innovation:innovation,
 field:field},function(data){
if($.trim(data)=="exist"){
  //var innovation='<?php echo $innovation?>';
 var field=btoa("solution_feedback");

   //var check_question="modules/system/executive/pages/evaluate/check_question.php";
    var check="modules/system/executive/pages/evaluate/check_first.php";
   
    var innovats='<?php echo $innovation?>';
    var innovation=btoa(innovats);
$.post(""+check+"",{
  innovation:innovation,
 field:field},function(data){
if($.trim(data)=="exist"){
  $.post(""+urla+"",{innovation:innovation},function(data){$(folder).hide();
        $(display).html(data).show();
      
      var user=$("#user_email").val();
        var startdata=btoa("impact");
   $.post("modules/system/executive/pages/evaluate/savepresent.php",{
       innovation:innovation,
                  user:user,
                  startdata:startdata
        });
  })


      

}else{

      $("#solution_dc").html("Please give a feedback").css("color","red");
}

})
}else{



  //if question does not exist
//$("#displaysec_error").html("Write a question you need the innovator to answer.").css("color","red");
$("#solution_replytwo").attr("placeholder","Can not be empty!").css("color","red");


}
})

  //end of existing question





      

}
}else{
//NO QUERY











var solution_replytwo="";

var new_question=btoa(solution_replytwo)
//when question exists

var comment_solution=$("#comment_solution").val()

        if(comment_solution){
        
    var innovats='<?php echo $innovation?>';
    var innovation=btoa(innovats);
        var coments=btoa(comment_solution)
          $("#displaysec_error").html(loader)
          var field=btoa("solution_feedback");
        //alert()
        //alert(user)
      $("#displaysec_error").html(loader)
    $.post(""+url+"",{
      field:field,
      coments:coments,
      new_question:new_question,
      innovation:innovation,
      user:user},function(data){
        if($.trim(data)=="success"){
          $("#displaysec_error").html("")
        $.post(""+urla+"",{innovation:innovation},function(data){$(folder).hide();
        $(display).html(data).show();
        var user=$("#user_email").val();
        var startdata=btoa("impact");
   $.post("modules/system/executive/pages/evaluate/savepresent.php",{
       innovation:innovation,
                  user:user,
                  startdata:startdata
        });
      })
          }else{
 

        $("#displaysec_error").html(data)
        }

      })
       
    }else{
 //var innovation='<?php echo $innovation?>';
 var field=btoa("solution_feedback");

   //var check_question="modules/system/executive/pages/evaluate/check_question.php";
    var check="modules/system/executive/pages/evaluate/check_first.php";
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
          $("#displaysec_error").html("")
        $.post(""+urla+"",{innovation:innovation},function(data){$(folder).hide();
        $(display).html(data).show();
        var user=$("#user_email").val();
        var startdata=btoa("impact");
   $.post("modules/system/executive/pages/evaluate/savepresent.php",{
       innovation:innovation,
                  user:user,
                  startdata:startdata
        });
      })
          }else{
 

        $("#displaysec_error").html(data)
        }

      })



  

      

}else{

      $("#solution_dc").html("Please give a feedback").css("color","red");
}

})

    }

//END NO QUERY
}
        
  }else{
     $(".evaluation_class").hide();
    $("#first_page").show()
     var innovation='<?php echo $innovation?>';
  var user=$("#user_email").val();
var startdata=btoa("need");
   $.post("modules/system/executive/pages/evaluate/savepresent.php",{
       innovation:innovation,
                  user:user,
                  startdata:startdata
        });

}
})
  
  })
</script>