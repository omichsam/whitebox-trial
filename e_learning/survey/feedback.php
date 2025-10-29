<style type="text/css">
    .examcheck{
        font-size: 110% !important;
  display: inline !important;
  margin-bottom: 4px !important;
}
</style>

<?php 
include("../../connect.php");
$role=mysqli_real_escape_string($con,base64_decode($_POST['role']));
$unit_id=mysqli_real_escape_string($con,base64_decode($_POST['unit_id']));
$my_id=mysqli_real_escape_string($con,base64_decode($_POST['my_id']));
//unit_id
$get_elerning=mysqli_query($con,"SELECT * FROM e_learning_users WHERE email='$my_id'") or die(mysqli_error($con));
$geter=mysqli_fetch_assoc($get_elerning);
if($geter){
$users_id=$geter['id'];
}else{
$$users_id="";    
}
//echo $role;

	$sql="SELECT * FROM  curriculum_test Where unit_id='$unit_id' and type='feedback'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           //$unit_field=$row['unit_field'];
           $test_name =$row['test_name'];
           $test_id=$row['id'];
           
       }
       //echo $test_id." mn";
       $counter=0;
$sql="SELECT * FROM curriculum_test_questions Where test_id='$test_id' LIMIT 0,1";
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
           
       }
       //echo $test_remarks." mm";

if($question){

       ?>

       <div class="col-sm-12 no_padding col-xs-12" style="font-size:25px;font-weight:bold;"><?php echo $test_name?></div> 
<div class="col-sm-12 no_padding col-xs-12" style="font-size: 20px;text-align: justify;">
<div class="col-sm-12 col-xs-12" style="font-weight:bold;"><?php echo $question?></div>
</div>
<?php
 if($test_remarks==""){

 



     $get_account=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE user_id ='$users_id' AND unit_id='$unit_id' AND test_id='$test_id' AND question_id='$question_id'") or die(mysqli_error($con));
    $num=mysqli_num_rows($get_account);
    if($num>=1){
$sqlp="SELECT * FROM curriculum_exam_area WHERE user_id ='$users_id' AND unit_id='$unit_id' AND test_id='$test_id' AND question_id='$question_id'";
    $query_runl=mysqli_query($con,$sqlp) or die($query_runl."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runl)){
        $myoption=$row['answer_id'];
    }

    }else{
$myoption="";
    }
        
       

?>
<div class="col-sm-12 no_padding col-xs-12">
<div class="col-sm-12 col-xs-12" style="margin-top:5px"></div>
<?php
$sql="SELECT * FROM curriculum_test_answers Where test_id='$test_id' and question_id='$question_id'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
        $answer=$row['test_answer'];
        $test_option_name=$row['test_option_name'];
        $option_id=$row['id'];
        $counter=$counter+1;

if($myoption==$option_id){
$checks="checked";
}else{
$checks="";
}

?>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-12 col-xs-12"><div class="col-sm-12 col-xs-12">

 <label style="font-weight: initial !important" class="submit_radiosd">

                                                <input type="checkbox"  id="<?php echo "question_$counter"?>" <?php echo $checks?> value="<?php echo $option_id?>" name="Answer"  class=" examcheck <?php echo "answer_$counter"?>" role="<?php echo $option_id?>">
                                                  <span class="checkmarkd"></span>
                                                     <?php echo "$test_option_name: $answer"?>
                                                   </label>

   
        


   </div>
</div>

</div>
</div>
<?php
}
}elseif($test_remarks=="range"){

$sqlp="SELECT * FROM curriculum_exam_area WHERE user_id ='$users_id' AND unit_id='$unit_id' AND test_id='$test_id' AND question_id='$question_id'";
    $query_runl=mysqli_query($con,$sqlp) or die($query_runl."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runl)){
        $myoption=$row['answer_id'];
    }



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

<div class="col-sm-12 col-xs-12">
    

<div class="col-sm-12 col-xs-12">
     <div class="col-sm-4 col-xs-12"></div>

         <div class="col-sm-4 col-xs-12" >
         <div class="col-sm-5 col-xs-5 btn btn-danger back_btns" id="button_back">Back</div>

         <div class="col-sm-2 col-xs-2"></div>
         <div class="col-sm-5 col-xs-5 btn btn-primary" id="button_range">Save</div>

     </div>

 </div>


</div>
</div>
<?php
}elseif($test_remarks=="Yes/No"){


    $sqlp="SELECT * FROM curriculum_exam_area WHERE user_id ='$users_id' AND unit_id='$unit_id' AND test_id='$test_id' AND question_id='$question_id'";
    $query_runl=mysqli_query($con,$sqlp) or die($query_runl."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runl)){
        $myoption=$row['answer_id'];
    }

      if($myoption=="Yes"){
$myyes="checked";
$myno="";
    }else if($myoption=="No"){
$myyes="";
$myno="checked";
    }else{
$myyes="";
$myno="";
    }

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



<div class="col-sm-12 col-xs-12">
    

<div class="col-sm-12 col-xs-12">
     <div class="col-sm-4 col-xs-12"></div>

         <div class="col-sm-4 col-xs-12" >
         <div class="col-sm-5 col-xs-5 btn btn-danger back_btns" id="button_back">Back</div>

         <div class="col-sm-2 col-xs-2"></div>
         <div class="col-sm-5 col-xs-5 btn btn-primary" id="button_yes">Save</div>

     </div>

 </div>


</div>



                                       
<?php

}elseif($test_remarks=="open"){
     $sqlp="SELECT * FROM curriculum_exam_area WHERE user_id ='$users_id' AND unit_id='$unit_id' AND test_id='$test_id' AND question_id='$question_id'";
    $query_runl=mysqli_query($con,$sqlp) or die($query_runl."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runl)){
        $myoption=$row['answer_id'];
    }

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


<div class="col-sm-12 col-xs-12">
    

<div class="col-sm-12 col-xs-12">
     <div class="col-sm-4 col-xs-12"></div>

         <div class="col-sm-4 col-xs-12" >
         <div class="col-sm-5 col-xs-5 btn btn-danger back_btns" id="button_back">Back</div>

         <div class="col-sm-2 col-xs-2"></div>
         <div class="col-sm-5 col-xs-5 btn btn-primary" id="button_open">Save</div>

     </div>

 </div>


</div>









	<?php
}else{

   ?>
  <div class="col-sm-12 col-xs-12">Thank you for finding time to give us feedback.Click submit to submit the survey, thank you.</div> 
<div class="col-sm-12 col-xs-12">
    

<div class="col-sm-12 col-xs-12">
     <div class="col-sm-4 col-xs-12"></div>

         <div class="col-sm-4 col-xs-12" >
         <div class="col-sm-5 col-xs-5 btn btn-danger back_btns" id="button_back">Back</div>

         <div class="col-sm-2 col-xs-2"></div>
         <div class="col-sm-5 col-xs-5 btn btn-primary" id="button_Submit">Submit</div>

     </div>

 </div>


</div>
   <?php

}
?>
</div>
 </div>
  <?php
}else{
    
   ?>
  <div class="col-sm-12 col-xs-12">Thank you for finding time to give us feedback.Click submit to submit the survey, thank you.</div> 
<div class="col-sm-12 col-xs-12">
    

<div class="col-sm-12 col-xs-12">
     <div class="col-sm-4 col-xs-12"></div>

         <div class="col-sm-4 col-xs-12" >
         <div class="col-sm-5 col-xs-5 btn btn-danger back_btns" id="button_back">Back</div>

         <div class="col-sm-2 col-xs-2"></div>
         <div class="col-sm-5 col-xs-5 btn btn-primary" id="button_Submit">Submit</div>

     </div>

 </div>


</div>
   <?php
}

 ?>
 <!--<div class="col-sm-12 col-xs-12">
     <div class="col-sm-4 col-xs-12"></div>

         <div class="col-sm-4 col-xs-12" >
         <div class="col-sm-5 col-xs-5 btn btn-danger back_btns" id="button_back">Back</div>

         <div class="col-sm-2 col-xs-2"></div>
         <div class="col-sm-5 col-xs-5 btn btn-primary" id="button_send">Save</div>

     </div>

 </div>-->
 <div class="col-sm-12 col-xs-12" id="error_report" style="text-align:center;"></div>

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