<style type="text/css">
  .evaluate_simmodels{
    margin-top: 5px;
  }
</style>

<?php

include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$innovation=base64_decode($_POST['innovation']);
$sqlx="SELECT * FROM covid19_innovations where id='$innovation'";
$counter=0;
$commments="comments";
$questions="question";
$collabo="";
$show_collabo="not_shown";
$collaborations="";
$sqlx="SELECT * FROM covid19_innovations where id='$innovation'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
  $date_added=$row['date_added'];

  $sector=$row['sector'];
    $maturity=$row['maturity'];
    $beneficiaries=$row['beneficiaries'];
    $innovator_Identity=$row['innovator_Identity'];
  $collaborations=$row['collaborations'];
  if($collaborations){
    $collabo=$collaborations;
    $show_collabo="";
  }else{

  }
   // $busines_model=$row['sector'];
    $Innovation_name="COVID 19 Innovation";
$newtarmodel_feedback="";
$newmodels_question="";
$query_questiond="";
$businessmodel_feedback="";
$models_question="";
$show_question="not_shown";
$sqlxo="SELECT businessmodel_feedback FROM covid_feedback where Innovation_id='$innovation' and status='$commments'";

    $query_runxd=mysqli_query($con,$sqlxo) or die($query_runxd."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxd)){
  $businessmodel_feedback=$row['businessmodel_feedback'];

if($businessmodel_feedback){
$newtarmodel_feedback=$businessmodel_feedback;
}else{

}

}
$sqlxol="SELECT businessmodel_feedback FROM covid_feedback where Innovation_id='$innovation' and status='$questions'";

$query_runxdol=mysqli_query($con,$sqlxol) or die($query_runxdol."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxdol)){
  $models_question=$row['businessmodel_feedback'];





if($models_question){

$query_questiond="Yes";
$show_question="";
$newmodels_question=$models_question;
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
  <div class="col-sm-12 colxs-12 default_header">INNOVATION DETAILS</div>
  <div class="col-sm-12 col-xs-12" id="innovationneed">
<?php// echo $busines_model
?>
<table>
   <tr><th>SECTOR</th><td>: <?php echo $sector?></td></tr>
    <tr><th>STAGE</th><td>: <?php echo $maturity?></td></tr>
     <tr><th>BENEFICIARIES</th><td>: <?php echo $beneficiaries?></td></tr>
      <tr><th>INNOVATOR TYPE</th><td>: <?php echo $innovator_Identity?></td></tr>
      <tr class="<?php echo $show_collabo?>"><th>COLLABORATION TYPE</th><td>: <?php echo $collabo?></td></tr>
</table>


</div>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-12 no_padding col-xs-12" id="need_clarify">
  Do you need more clarifications from the innovator?
</div>
  <div class=" no_padding col-sm-12 col-xs-12">
    <select class="col-xs-12 col-sm-3 select_questionsfive">
      <option><?php echo $query_questiond?></option>
      <option>No</option>
      <option>Yes</option>
    </select>
  </div>
  <div class="no_padding my_explainquestions <?php echo $show_question?> col-sm-12 col-xs-12">
    Give a question that you want the innovator to answer.
    <textarea class=" col-sm-12 col-xs-12 questions_hold" id="solution_replythfive" maxlength="200" onkeyup="questionfive(this.value)" placeholder="E.g Can i get to know more on the need?"><?php echo $newmodels_question?></textarea>
    
    <div class="colsm-12 col-xs-12" style="text-align: center; " id="questionfive">&nbsp;</div>
  </div>
</div>
<!--<div class="col-sm-12 col-xs-12" id="time_display"><strong><?php echo $time_d?> </strong> </div>-->
  </div>

</div>  
</div>
<div class="col-sm-4 col-xs-12 ">
  
<div class="col-sm-12 col-xs-12 innovation_areas" id="comment_area">
  <div class="col-sm-12 col-xs-12 evaluate_header">WRITE FEEDBACK HERE</div>
<textarea id="comment_businessmod" maxlength="400" onkeyup="coment_tmodel(this.value)" placeholder="Type your coments about the subject here max(400 characters)" class="coments col-sm-12 col-xs-12"><?php echo $newtarmodel_feedback?></textarea>
<div class="colsm-12 col-xs-12" style="text-align: center; " id="targem_dcmodel"></div>
</div>

</div>  
</div>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-4 col-xs-12"></div>

<div class="col-sm-4 col-xs-12 "><span class="btn evaluate_simmodels theme_bg" role="back">Back</span> <!--<span class="btn evaluate_simmodels theme_bg">Disapprove</span>--> <span class="btn evaluate_simmodels theme_bg" role="next_page">Next Step</span> &nbsp;</div>

</div>
<div class="col-sm-12 col-xs-12 process_tm">
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
  <div class="col-sm-1 col-xs-1 stage_a  "></div>

</div>

<div class="col-sm-12 col-xs-12 " style="text-align: center; " id="displayfive_error">&nbsp;</div>
<div class="col-sm-12 col-xs-12 id_lowerfoot">
</div>


</div>
<script type="text/javascript">
  function coment_tmodel(str) {
  var lng = str.length;
  document.getElementById("targem_dcmodel").innerHTML = lng + ' out of 400 characters';
}
function questionfive(str) {
  var lng = str.length;
  document.getElementById("questionfive").innerHTML = lng + ' out of 200 characters';
}
  $(document).ready(function(){
$(".select_questionsfive").change(function(){
  //alert()
var waiting=$(this).val()
if(waiting=="Yes"){
$(".my_explainquestions").show()
}else{
$(".my_explainquestions").hide()
}
})



    var loader=$("#loader").html()
    var display="#sixth_page";
    var folder=".evaluation_class";

    var innovats='<?php echo $innovation?>';
    var innovation=btoa(innovats);

    var url="modules/system/clerk/pages/covid/save.php";
    var urla="modules/system/clerk/pages/covid/sixth_page.php";
    $(".evaluate_simmodels").click(function(){
      var my_role=$(this).attr("role");
      var user=$("#user_email").val();
      if(my_role=="next_page"){

  //alert()
var waiting=$(".select_questionsfive").val()
if(waiting=="Yes"){
var solution_replythfive=$("#solution_replythfive").val()
if(solution_replythfive){

var new_question=btoa(solution_replythfive)
//when question exists

var comment_businessmod=$("#comment_businessmod").val()

        if(comment_businessmod){
        
    var innovats='<?php echo $innovation?>';
    var innovation=btoa(innovats);
        var coments=btoa(comment_businessmod)
          $("#displayfive_error").html(loader)
          var field=btoa("businessmodel_feedback");
        //alert()
        //alert(user)
      $("#displayfive_error").html(loader)
    $.post(""+url+"",{
      field:field,
      coments:coments,
      new_question:new_question,
      innovation:innovation,
      user:user},function(data){
        if($.trim(data)=="success"){
          $("#displayfive_error").html("")
        $.post(""+urla+"",{innovation:innovation},function(data){$(folder).hide();
        $(display).html(data).show();
      })
          }else{
 

        $("#displayfive_error").html(data)
        }

      })
       
    }else{
 //var innovation='<?php echo $innovation?>';
 var field=btoa("businessmodel_feedback");

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
          $("#displayfive_error").html("")
        $.post(""+urla+"",{innovation:innovation},function(data){$(folder).hide();
        $(display).html(data).show();
      })
          }else{
 

        $("#displayfive_error").html(data)
        }

      })



  

      

}else{

      $("#targem_dcmodel").html("Please give a feedback").css("color","red");
}

})

    }



































//end of existing question

}else{
 var field=btoa("businessmodel_feedback");

   var check_question="modules/system/clerk/pages/covid/check_question.php";
    //var check="modules/system/clerk/pages/covid/check_first.php";
   
    var innovats='<?php echo $innovation?>';
    var innovation=btoa(innovats);
$.post(""+check_question+"",{
  innovation:innovation,
 field:field},function(data){
if($.trim(data)=="exist"){
  //var innovation='<?php echo $innovation?>';
 var field=btoa("businessmodel_feedback");

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

      $("#targem_dcmodel").html("Please give a feedback").css("color","red");
}

})
}else{



  //if question does not exist
//$("#displayfive_error").html("Write a question you need the innovator to answer.").css("color","red");
$("#solution_replythfive").attr("placeholder","Can not be empty!").css("color","red");


}
})

  //end of existing question





      

}
}else{
//NO QUERY











var solution_replythfive="";

var new_question=btoa(solution_replythfive)
//when question exists

var comment_businessmod=$("#comment_businessmod").val()

        if(comment_businessmod){
        
    var innovats='<?php echo $innovation?>';
    var innovation=btoa(innovats);
        var coments=btoa(comment_businessmod)
          $("#displayfive_error").html(loader)
          var field=btoa("businessmodel_feedback");
        //alert()
        //alert(user)
      $("#displayfive_error").html(loader)
    $.post(""+url+"",{
      field:field,
      coments:coments,
      new_question:new_question,
      innovation:innovation,
      user:user},function(data){
        if($.trim(data)=="success"){
          $("#displayfive_error").html("")
        $.post(""+urla+"",{innovation:innovation},function(data){$(folder).hide();
        $(display).html(data).show();
      })
          }else{
 

        $("#displayfive_error").html(data)
        }

      })
       
    }else{
 //var innovation='<?php echo $innovation?>';
 var field=btoa("businessmodel_feedback");

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
          $("#displayfive_error").html("")
        $.post(""+urla+"",{innovation:innovation},function(data){$(folder).hide();
        $(display).html(data).show();
      })
          }else{
 

        $("#displayfive_error").html(data)
        }

      })



  

      

}else{

      $("#targem_dcmodel").html("Please give a feedback").css("color","red");
}

})

    }

//END NO QUERY
}
        
  }else{
     
    $(".evaluation_class").hide();
    $("#fourth_page").show()



  }
    })
  
  })
</script>