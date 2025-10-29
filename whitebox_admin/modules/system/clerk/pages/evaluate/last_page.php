<style type="text/css">
  .evaluate_simlast{
    margin-top: 5px;
  }
</style>

<?php

include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$innovation=base64_decode($_POST['innovation']);
$counter=0;
$commments="comments";
$questions="question";
$sqlx="SELECT * FROM innovations_table where Innovation_Id='$innovation'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
  //$date_added=$row['date_added'];


    $Innovation_name=$row['Innovation_name'];
$newreasons_feedback="";
$newneed_reasonlast="";
$query_question="";
$reasons_feedback="";
$need_reason="";
$show_question="not_shown";
$sqlxo="SELECT reasons_feedback FROM feedback where Innovation_id='$innovation' and status='$commments'";

    $query_runxd=mysqli_query($con,$sqlxo) or die($query_runxd."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxd)){
  $reasons_feedback=$row['reasons_feedback'];

if($reasons_feedback){
$newreasons_feedback=$reasons_feedback;
}else{

}

}
$sqlxol="SELECT reasons_feedback FROM feedback where Innovation_id='$innovation' and status='$questions'";

$query_runxdol=mysqli_query($con,$sqlxol) or die($query_runxdol."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxdol)){
  $need_reasond=$row['reasons_feedback'];





if($need_reasond){

$query_question="Yes";
$show_question="";
$newneed_reasondlast=$need_reasond;
}else{

}
}



}

?>
<div class="col-sm-12 col-xs-12 no_padding">
<div class="col-sm-12 col-xs-12 evaluate_header" id="">FIRST EVALUATION</div>
<div class="col-sm-12 col-xs-12 no_padding">
<div class="col-sm-8 col-xs-12 ">
  <div class="col-sm-12 col-xs-12 innovation_areas" id="innovation_area">
    
  <div class="col-sm-12 col-xs-12 evaluate_header"><?php echo $Innovation_name?></div>

    <div class="col-sm-12 col-xs-12">
  <div class="col-sm-12 colxs-12 default_header">REASONS FOR SUBMISTION</div>
  <div class="col-sm-12 col-xs-12" id="innovationneed">
 <?php 


$checkExist=mysqli_query($con,"SELECT * FROM innovation_expectation WHERE Innovation_id='$innovation'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)!=0){
?>
<div class="col-sm-12 col-xs-12 table_header">
  <div class="col-sm-1 col-sm-1"></div>
  <div class="col-sm-11 col-sm-11">Looking for:</div>


</div>

<?php

$datadisplay="";
$counting=0;
$sqlxo="SELECT * FROM innovation_expectation where Innovation_id='$innovation'";

    $query_runxd=mysqli_query($con,$sqlxo) or die($query_runxd."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxd)){

      
      $communities=$row['communities'];
      $patnership_innovators=$row['patnership_innovators'];
      $funding=$row['funding'];

      $petnership_implementors=$row['petnership_implementors'];
      if($petnership_implementors){

        $counting=$counting+1;
        $datadisplay=$petnership_implementors;
        ?>
<div class="col-sm-12 col-xs-12 table_rowers">
  <div class="col-sm-1 col-sm-1"><?php echo $counting?></div>
  <div class="col-sm-11 col-sm-11"><?php echo $datadisplay?></div>


</div>

<?php

      }else{
     
      $datadisplay="";
      }
      if($patnership_innovators){

        $counting=$counting+1;
        $datadisplay=$patnership_innovators;
        ?>
<div class="col-sm-12 col-xs-12 table_rowers">
  <div class="col-sm-1 col-sm-1"><?php echo $counting?></div>
  <div class="col-sm-11 col-sm-11"><?php echo $datadisplay?></div>


</div>

<?php

      }else{
      
      $datadisplay="";
      }
       if($funding){

        $counting=$counting+1;
        $datadisplay=$funding;
        ?>
<div class="col-sm-12 col-xs-12 table_rowers">
  <div class="col-sm-1 col-sm-1"><?php echo $counting?></div>
  <div class="col-sm-11 col-sm-11"><?php echo $datadisplay?></div>


</div>

<?php

      }else{
      
      $datadisplay="";
      }
       if($communities){

        $counting=$counting+1;
        $datadisplay=$communities;
        ?>
<div class="col-sm-12 col-xs-12 table_rowers">
  <div class="col-sm-1 col-sm-1"><?php echo $counting?></div>
  <div class="col-sm-11 col-sm-11"><?php echo $datadisplay?></div>


</div>

<?php

      }else{
      
      $datadisplay="";
      }
    }

     



}else{

}

    ?>
</div>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-12 no_padding col-xs-12" id="need_clarify">
  Do you need more clarifications from the innovator?
</div>
  <div class=" no_padding col-sm-12 col-xs-12">
    <select class="col-xs-12 col-sm-3 select_questionslastdf">
      <option><?php echo $query_question?></option>
      <option>No</option>
      <option>Yes</option>
    </select>
  </div>
  <div class="no_padding my_explainquestions <?php echo $show_question?> col-sm-12 col-xs-12">
    Give a question that you want the innovator to answer.
    <textarea class=" col-sm-12 col-xs-12 questions_hold" id="solution_repreasons" maxlength="200" onkeyup="questionfilast(this.value)" placeholder="E.g Can i get to know more on the need?"><?php echo $newneed_reasondlast?></textarea>
    
    <div class="colsm-12 col-xs-12" style="text-align: center; " id="questionfilast">&nbsp;</div>
  </div>
</div>
<!--<div class="col-sm-12 col-xs-12" id="time_display"><strong><?php echo $time_d?> </strong> </div>-->
  </div>

</div>  
</div>
<div class="col-sm-4 col-xs-12 ">
  
<div class="col-sm-12 col-xs-12 innovation_areas" id="comment_area">
  <div class="col-sm-12 col-xs-12 evaluate_header">WRITE FEEDBACK HERE</div>
<textarea id="comment_slast" maxlength="400" onkeyup="coment_tlast(this.value)" placeholder="Type your coments about the subject here max(400 characters)" class="coments col-sm-12 col-xs-12"><?php echo $newreasons_feedback?></textarea>
<div class="colsm-12 col-xs-12" style="text-align: center; " id="targeted_dcmodel"></div>
</div>

</div>  
</div>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-4 col-xs-12"></div>

<div class="col-sm-4 col-xs-12 "><span class="btn evaluate_simlast theme_bg" role="back">Back</span> <!--<span class="btn evaluate_simlast theme_bg">Disapprove</span>--> <span class="btn evaluate_simlast theme_bg" role="next_page">Finish</span> &nbsp;</div>

</div>
<div class="col-sm-12 col-xs-12 " style="text-align: center; " id="displayfive_last">&nbsp;</div>
<div class="col-sm-12 col-xs-12 process_tm">
  <div class="col-sm-1 col-xs-1 stage_a theme_bg ">7</div>

</div>
<div class="col-sm-12 col-xs-12 id_lowerfoot">
</div>


</div>
<script type="text/javascript">
  function coment_tlast(str) {
  var lng = str.length;
  document.getElementById("targeted_dcmodel").innerHTML = lng + ' out of 400 characters';
}
function questionfilast(str) {
  var lng = str.length;
  document.getElementById("questionfilast").innerHTML = lng + ' out of 200 characters';
}
  $(document).ready(function(){
$(".select_questionslastdf").change(function(){
  //alert()
var waiting=$(this).val()
if(waiting=="Yes"){
$(".my_explainquestions").show()
}else{
$(".my_explainquestions").hide()
}
})



    var loader=$("#loader").html()
    var display="#decide";
    var folder=".evaluation_class";

    var innovats='<?php echo $innovation?>';
    var innovation=btoa(innovats);

    var url="modules/system/clerk/pages/evaluate/save.php";
    var urla="modules/system/clerk/pages/evaluate/decide.php";
    $(".evaluate_simlast").click(function(){
      var my_role=$(this).attr("role");
      var user=$("#user_email").val();
      if(my_role=="next_page"){

  //alert()
var waiting=$(".select_questionslastdf").val()
if(waiting=="Yes"){
var solution_repreasons=$("#solution_repreasons").val()
if(solution_repreasons){

var new_question=btoa(solution_repreasons)
//when question exists

var comment_slast=$("#comment_slast").val()

        if(comment_slast){
        
    var innovats='<?php echo $innovation?>';
    var innovation=btoa(innovats);
        var coments=btoa(comment_slast)
          $("#displayfive_last").html(loader)
          var field=btoa("reasons_feedback");
        //alert()
        //alert(user)
      $("#displayfive_last").html(loader)
    $.post(""+url+"",{
      field:field,
      coments:coments,
      new_question:new_question,
      innovation:innovation,
      user:user},function(data){
        if($.trim(data)=="success"){
          $("#displayfive_last").html("")
        $.post(""+urla+"",{innovation:innovation},function(data){$(folder).hide();
        $(display).html(data).show();
      })
          }else{
 

        $("#displayfive_last").html(data)
        }

      })
       
    }else{
 var field=btoa("reasons_feedback");

   //var check_question="modules/system/clerk/pages/evaluate/check_question.php";
    var check="modules/system/clerk/pages/evaluate/check_first.php";
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
          $("#displayfive_last").html("")
        $.post(""+urla+"",{innovation:innovation},function(data){$(folder).hide();
        $(display).html(data).show();
      })
          }else{
 

        $("#displayfive_last").html(data)
        }

      })



  

      

}else{

      $("#targeted_dcmodel").html("Please give a feedback").css("color","red");
}

})

    }



































//end of existing question

}else{
 var field=btoa("reasons_feedback");

   var check_question="modules/system/clerk/pages/evaluate/check_question.php";
    //var check="modules/system/clerk/pages/evaluate/check_first.php";
   
    var innovats='<?php echo $innovation?>';
    var innovation=btoa(innovats);
$.post(""+check_question+"",{
  innovation:innovation,
 field:field},function(data){
if($.trim(data)=="exist"){
  //var innovation='<?php echo $innovation?>';
 var field=btoa("reasons_feedback");

   //var check_question="modules/system/clerk/pages/evaluate/check_question.php";
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

      $("#targeted_dcmodel").html("Please give a feedback").css("color","red");
}

})
}else{



  //if question does not exist
//$("#displayfive_last").html("Write a question you need the innovator to answer.").css("color","red");
$("#solution_repreasons").attr("placeholder","Can not be empty!").css("color","red");


}
})

  //end of existing question





      

}
}else{
//NO QUERY



var solution_repreasons="";

var new_question=btoa(solution_repreasons)
//when question exists

var comment_slast=$("#comment_slast").val()

        if(comment_slast){
        
    var innovats='<?php echo $innovation?>';
    var innovation=btoa(innovats);
        var coments=btoa(comment_slast)
          $("#displayfive_last").html(loader)
          var field=btoa("reasons_feedback");
        //alert()
        //alert(user)
      $("#displayfive_last").html(loader)
    $.post(""+url+"",{
      field:field,
      coments:coments,
      new_question:new_question,
      innovation:innovation,
      user:user},function(data){
        if($.trim(data)=="success"){
          $("#displayfive_last").html("")
        $.post(""+urla+"",{innovation:innovation},function(data){$(folder).hide();
        $(display).html(data).show();
      })
          }else{
 

        $("#displayfive_last").html(data)
        }

      })
       
    }else{
 //var innovation='<?php echo $innovation?>';
 var field=btoa("reasons_feedback");

   //var check_question="modules/system/clerk/pages/evaluate/check_question.php";
    var check="modules/system/clerk/pages/evaluate/check_first.php";
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
          $("#displayfive_last").html("")
        $.post(""+urla+"",{innovation:innovation},function(data){$(folder).hide();
        $(display).html(data).show();
      })
          }else{
 

        $("#displayfive_last").html(data)
        }

      })



  

      

}else{

      $("#targeted_dcmodel").html("Please give a feedback").css("color","red");
}

})

    }

//END NO QUERY
}
        
  }else{
     
    $(".evaluation_class").hide();
    $("#sixth_page").show()



  }
    })
  
  })
</script>