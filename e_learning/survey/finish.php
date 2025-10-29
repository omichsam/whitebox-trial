<style type="text/css">
    .examcheck{
        font-size: 110% !important;
  display: inline !important;
  margin-bottom: 4px !important;
}
.correct{
	color: green !important;
}
.wrong{
	color: red !important;
}
.testsamary{
	border-bottom: 1px dashed #ccc;
	font-size: 22px;
	font-weight: bolder;
}
</style>

<?php
include("../../connect.php"); 
$my_id=mysqli_real_escape_string($con,base64_decode($_POST['my_id']));
$unit_id=mysqli_real_escape_string($con,base64_decode($_POST['unit_id']));
$question_id=mysqli_real_escape_string($con,base64_decode($_POST['question_id']));
$role=mysqli_real_escape_string($con,base64_decode($_POST['role']));
$get_elerning=mysqli_query($con,"SELECT * FROM e_learning_users WHERE email='$my_id'") or die(mysqli_error($con));
$geter=mysqli_fetch_assoc($get_elerning);
if($geter){
$users_id=$geter['id'];
}else{
$users_id="";    
}





//unit_id

	$sql="SELECT * FROM  curriculum_test Where unit_id='$unit_id'  and type='normal'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           //$unit_field=$row['unit_field'];
           $test_name =$row['test_name'];
           $test_type =$row['type'];
           $test_id=$row['id'];
           
       }
        $update=mysqli_query($con,"UPDATE  curriculum_exam_area SET test_remarks='completed' WHERE user_id ='$users_id' AND unit_id='$unit_id' AND test_id='$test_id'") or die(mysqli_error($con));





       //echo "success";
       ?>
        <div class="col-sm-12 col-xs-12" style="font-size:25px;font-weight:bold;"><?php echo $test_name?></div> 
       <?php
       $counter=0;
       $corectanswers=0;
       $questions=0;
$sqlpok="SELECT * FROM curriculum_test_questions Where unit_id='$unit_id' and test_id='$test_id'";
    $query_runpok=mysqli_query($con,$sqlpok) or die($query_runpok."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runpok)){
           //$unit_field=$row['unit_field'];
           $question =$row['question'];
           $question_id=$row['id'];
           $next_question="";
        $questions= $questions+1;
      
            $get_account=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE user_id ='$users_id' AND unit_id='$unit_id' AND test_id='$role' AND question_id='$question_id'") or die(mysqli_error($con));
    $num=mysqli_num_rows($get_account);
    if($num>=1){
$sqlp="SELECT * FROM curriculum_exam_area WHERE user_id ='$users_id' AND unit_id='$unit_id' AND test_id='$role' AND question_id='$question_id'";
    $query_runl=mysqli_query($con,$sqlp) or die($query_runl."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runl)){
        $myoption=$row['answer_id'];
    }

    }else{
$myoption="";
    }
       

?>
<div class="col-sm-12 no_padding col-xs-12">
 
<div class="col-sm-12 no_padding col-xs-12" style="font-size: 20px;text-align: justify;">
<div class="col-sm-12 col-xs-12" style="font-weight:bold;"><?php echo $question?></div>
<div class="col-sm-12 col-xs-12" style="margin-top:5px"></div>
<?php
$sql="SELECT * FROM curriculum_test_answers Where test_id='$test_id' and question_id='$question_id'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
        $answer=$row['test_answer'];
        $test_option_name=$row['test_option_name'];
        $option_id=$row['id'];
        $status=$row['status'];
        $counter=$counter+1;

if($myoption==$option_id){
$checks="checked";
if($status=='Correct'){
	$corectanswers=$corectanswers+1;
$corect="correct";
}else{
$corect="wrong";
}
$new_status=$corect;
if($new_status=="correct"){
$statusb="<div class='col-sm-12 col-xs-12' style='color: green'>Status: $corect <i class='fa fa-check fa-X5'></i></div>";
}else{
$statusb="<div class='col-sm-12 col-xs-12' style='color: red'>Status: $corect <i class='fa fa-times fa-X5'></i></div>";
}

}else{
$checks="";
$corect="";
}


?>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-12 col-xs-12"><div class="col-sm-12 col-xs-12">

 <label style="font-weight: initial !important" class="submit_radiosd <?php echo $corect?>">

                                                <input type="checkbox" disabled="true" id="<?php echo "question_$counter"?>" <?php echo $checks?> value="<?php echo $option_id?>" name="Answer"  class=" examcheck <?php echo "answer_$counter"?> " role="<?php echo $option_id?>">
                                                  <span class="checkmarkd"></span>
                                                     <?php echo "$test_option_name: $answer"?>
                                                   </label>

   
        


   </div>
</div>

</div>

<?php
}
?>

<div class="col-sm-12 col-xs-12 " style="margin-top:5px;margin-bottom: 10px;"><?php echo $statusb?></div>
<?php
}
?>
</div>
 </div>
 <div class="col-sm-12 col-xs-12">
 	<div class="col-sm-12 col-xs-12"> Sammary</div>
 	 <div class="col-sm-12 col-xs-12">
 	 	<div class="col-sm-4 col-xs-4">
 	 		<div class="col-sm-12 col-xs-12 testsamary">Score</div>
             <div class="col-sm-12 col-xs-12"><?php echo "$corectanswers / $questions"?></div>

 	 	</div>
 	 	<div class="col-sm-4 col-xs-4">
 	 		<div class="col-sm-4 col-xs-12">
 	 		<div class="col-sm-12 col-xs-12 testsamary">Percentage</div>
 	 		
<div class="col-sm-12 col-xs-12">
<?php
	$scored=$corectanswers/$questions*100;
	echo $scored. "%";
		
?>
	</div>

 	 	</div>


 	 	</div>
 	 	<div class="col-sm-4 col-xs-4">
 	 		<div class="col-sm-12 col-xs-12 testsamary">Status</div>
 	 		<div class="col-sm-12 col-xs-12">
<?php
	$scored=$corectanswers/$questions*100;
	if($scored>1 && $scored<=25){
		$get_status="Tried";

	}else if($scored>25 && $scored<=50){
		$get_status="Average";


	}else if($scored>50 && $scored<=75){
		$get_status="Good";


		}else if($scored>75 && $scored<=100){
			$get_status="Excellent";


			}else{
$get_status="Failed";

					}
					echo $get_status;



		
?>
	</div>
 	 		

 	 	</div>
 	 </div>
 </div>

  <div class="col-sm-12 col-xs-12 ">
     <div class="col-sm-4 col-xs-4"></div>

         <div class="col-sm-4 col-xs-12" >
         	  <div class="col-sm-3 col-xs-3"></div>
         <div class="col-sm-6 col-xs-6 btn btn-danger" id="button_back">Close</div>

       
         

     </div>

 </div>
 <div class="col-sm-12 col-xs-12" id="error_report" style="text-align:center;"></div>
<?php

                     $get_account=mysqli_query($con,"SELECT * FROM curriculum_tests_done  WHERE user_id ='$users_id' AND unit_id='$unit_id' AND test_id='$role'") or die(mysqli_error($con));
    $num=mysqli_num_rows($get_account);
    if($num>=1){


    }else{
    
        
$sql=mysqli_query($con,"INSERT INTO curriculum_tests_done VALUE(Null,
                                            '$users_id',
                                            '$role',
                                            '$unit_id',
                                            '$test_type',
                                            '$corectanswers',
                                            '$questions',
                                            'completed',
                                            '$Today')") or die(mysqli_error($con));

}


?>
 <script type="text/javascript">
     $(document).ready(function(){
     	var loader=$("#loader").html();
        $(".examcheck").click(function(){
            
            $(".examcheck").prop("checked",false);
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
     $("#error_report").html("Sending.."+loader)
  $.post("e_learning/survey/save.php",{my_id:my_id,unit_id:unit_id,question_id:question_id,role:role,answer:answer},function(data){
                 if($.trim(atob(data))=="success"){
                 	$("#error_report").html("Redirecting.."+loader)
                //$("#content_player").html(data);
 $.post("e_learning/survey/next.php",{my_id:my_id,unit_id:unit_id,question_id:question_id,role:role},function(data){
 	$("#error_report").html("")
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
$("#submit_exam").click(function(){

    var loader=$("#loader").html();

     var unit_id=btoa('<?php echo $unit_id?>');
     //var question=btoa()
     
     var role=btoa('<?php echo $test_id?>')
     var question_id=btoa('<?php echo $question_id?>')
      $.post("e_learning/survey/finish.php",{my_id:my_id,unit_id:unit_id,question_id:question_id,role:role},function(data){
                //$("#content_player").html(data);

$("#content_player").html(data);
            })

})
$("#button_back").click(function(){
		$("#error_report").html("Redirecting.."+loader)
	var role=btoa('<?php echo $unit_id?>')
	var loader=$("#loader").html();
     var my_id=$("#user_email").val();
     var unit_id=btoa('<?php echo $unit_id?>');
     //var question=btoa()
     
     var role=btoa('<?php echo $test_id?>')
/*
$.post("e_learning/survey/feedback.php",{role:role,unit_id:unit_id,my_id:my_id},function(data){
            $("#content_player").html(data);
                $("#error_report").html("")
            })
*/

$.post("e_learning/survey/final.php",{my_id:my_id,unit_id:unit_id,role:role},function(data){



	$.post("e_learning/survey/feedback.php",{role:role,unit_id:unit_id,my_id:my_id},function(data){
			$("#content_player").html(data);
				$("#error_report").html("")
			})
				
			})
})
     })
 </script>