<style type="text/css">
    .examcheck{
        font-size: 110% !important;
  display: inline !important;
  margin-bottom: 4px !important;
}
</style>

<?php 
include "../../../../../connect.php";
$unit_id=mysqli_real_escape_string($con,base64_decode($_POST['role']));


    $sql="SELECT * FROM  curriculum_test Where unit_id='$unit_id' and type='feedback'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           //$unit_field=$row['unit_field'];
           $test_name =$row['test_name'];
           $test_id=$row['id'];
           
       }
       //echo $test_id." mn";


       ?>
 <div class="col-sm-12 no_padding col-xs-12" style="font-size:25px;font-weight:bold;"><?php echo $test_name?></div> 
       <?php
       $counter=0;
$sql="SELECT * FROM curriculum_test_questions Where test_id='$test_id'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           //$unit_field=$row['unit_field'];
           $question =$row['question'];
           $question_id=$row['id'];
           $test_remarks=$row['test_remarks'];
           $test_ranges_from =$row['test_ranges_from'];
           $Test_range_to=$row['Test_range_to'];
           $compliment_from=$row['compliment_from'];
           $Compliment_to=$row['Compliment_to'];
           
       
   

       ?>

      
<div class="col-sm-12 no_padding col-xs-12" style="font-size: 20px;text-align: justify;">
<div class="col-sm-12 col-xs-12" style="font-weight:bold;"><?php echo $question?></div>
</div>

<div class="col-sm-12 no_padding col-xs-12">
<div class="col-sm-12 col-xs-12" style="margin-top:5px"></div>
<?php
if($test_remarks=="range"){




    ?>
<div class="col-sm-12 col-sm-12 col-xs-12">
    <div class="col-sm-2 col-xs-2"><?php echo $compliment_from?></div>
    <div class="col-sm-8 col-xs-8">
        <?php
for($a=$test_ranges_from;$a<=$Test_range_to;$a++){

if($myoption==$a){
$myoptionn="checked";
}else{
$myoptionn="";
}


        ?>
        <div class="col-sm-1 col-xs-1 no_padding">

 <label style="font-weight: initial !important" class="submit_radiosd">
 <input type="checkbox"  id="<?php echo "range_$a"?>" <?php echo $myoptionn?> value="<?php echo $a?>" name="Answer"  class="examcheckrange <?php echo "survey_$a"?>" role="<?php echo $option_id?>">
                                                  <span class="checkmarkd"></span>
                                                     <?php echo "$a"?>
                                                   </label>
                                               </div>
                                           
        <?php
}
        ?>
        
</div>
       
    <div class="col-sm-2 col-xs-2"><?php echo $Compliment_to?></div>


</div>
<?php
}elseif($test_remarks=="Yes/No"){



?>
<div class="col-sm-4 col-xs-12"></div>
<div class="col-sm-4 col-xs-12">
     <div class="col-sm-6 col-xs-6">

 <label style="font-weight: initial !important" class="submit_radiosd">
       <input type="checkbox"  id="<?php echo "rangeyes_2"?>" <?php echo $myno?> value="No" name="yes_no"  class=" yesnoanswer " role="">
                                                  <span class="checkmarkd"></span>
                                                     <?php echo "No"?>
                                                   </label>

                                               </div>
                                               
    <div class="col-sm-6 col-xs-6">

 <label style="font-weight: initial !important" class="submit_radiosd">
 <input type="checkbox"  id="<?php echo "rangeyes_1"?>" <?php echo $myyes?> value="yes" name="yes_no"  class=" yesnoanswer" role="">
                                                  <span class="checkmarkd"></span>
                                                     <?php echo "Yes"?>
                                                   </label>
                                               </div>
                                           </div>







                                       
<?php

}elseif($test_remarks=="open"){
    

?>
<div class="col-sm-12 col-xs-12">
     <div class="col-sm-1 col-xs-12"></div>
      <div class="col-sm-10 col-xs-12">
        <textarea class="col-sm-12 col-xs-12 " onkeyup="businessupdate(this.value)" id="textareab" minlength="2" maxlength="1000" style="min-height:200px;resize: none;"><?php echo $myoption?></textarea>

      </div>
 </div>
 <div class="col-sm-12 col-xs-12">
     <label class="counter col-sm-12 col-xs-12" id="business_counter" style="float: right; text-align: right;">0/1000</label>
 </div>












    <?php
}else{

 

}
}
?>
</div>

 <div class=" col-xs-12 col-sm-12">
     <div class="col-sm-4 col-xs-2"></div>
     <div class="col-sm-4 col-xs-10 btn btn-primary" id="newquetions">Add new question</div></div>
<div class=" col-sm-12 col-xs-12 not_shown" id="newquestionpage">
    <div class="col-sm-12 col-xs-12">
    Type the question:
    <textarea class="splashinputs col-sm-12 col-xs-12" style="resize:none" maxlength="1000" minlength="3" id="questionsnewb"></textarea>
</div>
 <div class="col-sm-12 col-xs-12">
    Select option:
    <select class=" splashinputs" id="questionoption">
        <option></option>
        <option>Range of answers. e.g 1-10</option>
        <option>Yes/No options</option>
        <option>Open ended</option>
    </select>
</div>
    <div class="col-sm-12 col-xs-12">
      <div class="col-sm-1 col-xs-1"></div>
     <div class="col-sm-4 col-xs-5 btn btn-danger" id="cancelnew">Cancel</div>
     <div class="col-sm-2 col-xs-1"></div>
     <div class="col-sm-4 col-xs-5 btn btn-primary" id="submitnew">Submit</div>

 </div>
 </div>

 
 <!--<div class="col-sm-12 col-xs-12">
     <div class="col-sm-4 col-xs-12"></div>

         <div class="col-sm-4 col-xs-12" >
         <div class="col-sm-5 col-xs-5 btn btn-danger back_btns" id="button_back">Back</div>

         <div class="col-sm-2 col-xs-2"></div>
         <div class="col-sm-5 col-xs-5 btn btn-primary" id="button_send">Save</div>

     </div>

 </div>-->
 <div class="col-sm-12 col-xs-12" id="newquerry_error" style="text-align:center;color: red;"></div>

  <script type="text/javascript">
    function businessupdate(str) {
  var lng = str.length;
  document.getElementById("business_counter").innerHTML = lng + '/1000';
}
     $(document).ready(function(){
        var loader=$("#loader").html();
     var my_id=$("#user_email").val();
     var unit_id=btoa('<?php echo $unit_id?>');
     var unit_idy= parseInt('<?php echo $unit_id?>');
     var nextpage=unit_idy+1;
     //var question=btoa()
    $("#submitnew").click(function(){
        var questionsnewb=btoa($("#questionsnewb").val());
        var questionoption=btoa($("#questionoption").val());
        if(questionsnewb && questionoption){
var r = confirm("Do you wish to clear the information?, click OK to proceed or CANCEL to stop?");
  if (r == true) {

            $("#newquerry_error").html("Saving... "+loader);

            $("#error_menu").html("Saving.."+loader);
                $.post("modules/system/content_team/pages/content/savequestion.php",{questionsnewb:questionsnewb,unit_id:unit_id,questionoption:questionoption},function(data){
                    if($.trim(atob(data))=="success"){

                      $.post("modules/system/content_team/pages/content/feedback.php",{role:unit_id},function(data){
                $("#content_player").html(data);
            });

                    }
                })

  }else{





}
        }else{
      $("#newquerry_error").html("Kindly type your question and select an option");
        }
    })




     $("#newquetions").click(function(){
        //alert();
        $("#newquestionpage").show();
        $(this).hide()
     })

     $("#cancelnew").click(function(){
        //alert();
        $("#newquestionpage").hide();
        $("#newquetions").show()
     })
     var role=btoa('<?php echo $test_id?>')
     var question_id=btoa('<?php echo $question_id?>')
    
        $(".examcheckrange").click(function(){
         
            
            $(".examcheckrange").prop("checked",false);
            $(this).prop("checked",true);
        
            
        })
        $("#button_send").click(function(){
            var answer="";
            var code=0;
            var error="No answer selected";
            var counter='<?php echo $counter?>';

            for(count=1;count<=counter;count++){
                if($("#question_"+count).prop("checked")){
                    var answer=btoa($("#question_"+count).val());
                code=code+1;
                }else{
                
                }
            }
if(code>=1){
    var loader=$("#loader").html();
     var my_id=$("#user_email").val();
     var unit_id=btoa('<?php echo $unit_id?>');
     //var question=btoa()
     
     var role=btoa('<?php echo $test_id?>')
     var question_id=btoa('<?php echo $question_id?>')
  $.post("e_learning/survey/save.php",{my_id:my_id,unit_id:unit_id,question_id:question_id,role:role,answer:answer},function(data){
    if($.trim(atob(data))=="success"){
                //$("#content_player").html(data);
 $.post("e_learning/survey/next.php",{my_id:my_id,unit_id:unit_id,question_id:question_id,role:role},function(data){
                //$("#content_player").html(data);

$("#content_player").html(data);
            })

                }else{

                 $("#error_report").html(data)
             }
            })

   
//alert("ready");
}else{
$("#error_report").html(error)
}
            
        })



$("#button_range").click(function(){
   var answer="";
    var ready=0;
    var testrange='<?php echo $test_ranges_from?>';
     var Testrangeto='<?php echo $Test_range_to?>';
     for(d=testrange;d<=Testrangeto;d++){
        if($("#range_"+d).prop("checked")){
ready=ready+1;
answer=btoa(d);

        }else{

        }

     }
     if(ready>=1){
     $("#error_report").html("sending.."+loader);

    $.post("e_learning/survey/save_feedback.php",{my_id:my_id,unit_id:unit_id,question_id:question_id,role:role,answer:answer},function(data){
        if($.trim(atob(data))=="success"){
             $("#error_report").html("Redirecting.."+loader);
            $.post("e_learning/survey/feedback_next.php",{my_id:my_id,unit_id:unit_id,question_id:question_id,role:role,answer:answer},function(data){ 

    $("#error_report").html("");
    $("#content_player").html(data);
});
        }else{
          $("#error_report").html("");  
        }


    })

     }else{
$("#error_report").html("Question not answered!")
     }

})

$(".yesnoanswer").click(function(){

            $(".yesnoanswer").prop("checked",false);
            $(this).prop("checked",true);
         
})


$("#button_yes").click(function(){
    var answer="";
    var new_answer="";
    if($("#rangeyes_1").prop("checked")){
    new_answer="ready";
     answer=btoa("Yes")
    }else if($("#rangeyes_2").prop("checked")){
answer=btoa("No")
 new_answer="ready";
    }else{
new_answer="";
    }
    
if(new_answer=="ready"){
 $.post("e_learning/survey/save_feedback.php",{my_id:my_id,unit_id:unit_id,question_id:question_id,role:role,answer:answer},function(data){
        if($.trim(atob(data))=="success"){
             $("#error_report").html("Redirecting.."+loader);
            $.post("e_learning/survey/feedback_next.php",{my_id:my_id,unit_id:unit_id,question_id:question_id,role:role,answer:answer},function(data){ 

    $("#error_report").html("");
    $("#content_player").html(data);
});
        }else{
          $("#error_report").html("");  
        }


    })



}else{
    $("#error_report").html("No answer selected!"); 
}

})

$("#button_open").click(function(){
    var answer=btoa($("#textareab").val());
if(answer){
$("#textareab").css("border","1px solid #ccc");  
 $.post("e_learning/survey/save_feedback.php",{my_id:my_id,unit_id:unit_id,question_id:question_id,role:role,answer:answer},function(data){
        if($.trim(atob(data))=="success"){
             $("#error_report").html("Redirecting.."+loader);
            $.post("e_learning/survey/feedback_next.php",{my_id:my_id,unit_id:unit_id,question_id:question_id,role:role,answer:answer},function(data){ 

    $("#error_report").html("");
    $("#content_player").html(data);
});
        }else{
          $("#error_report").html("");  
        }


    })
}else{
  $("#error_report").html("Answer required!");
  $("#textareab").css("border","2px solid red");   
}
})
$("#button_Submit").click(function(){
$.post("e_learning/survey/final.php",{my_id:my_id,unit_id:unit_id,role:role},function(data){

unit_id=btoa(nextpage);

    $.post("e_learning/curriculum/view.php",{role:unit_id},function(data){
           $("#learning_area").html(data);
                $("#error_report").html("")
            })
                
            })
})
$(".back_btns").click(function(){
    var question_idc='<?php echo $question_id?>';
    var question_id=btoa(question_idc-2);
          $.post("e_learning/survey/feedback_next.php",{my_id:my_id,unit_id:unit_id,question_id:question_id,role:role},function(data){ 

    $("#error_report").html("");
    $("#content_player").html(data);
});
})

     })
 </script>