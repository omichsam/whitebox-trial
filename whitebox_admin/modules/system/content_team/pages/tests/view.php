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
include "../../../../../connect.php"; 
$unit_id=mysqli_real_escape_string($con,base64_decode($_POST['unit_id']));
$role=mysqli_real_escape_string($con,base64_decode($_POST['test_id']));
$user_id=mysqli_real_escape_string($con,base64_decode($_POST['my_id']));




//unit_id

    $sql="SELECT * FROM  curriculum_test Where unit_id='$unit_id'  and type='normal'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           //$unit_field=$row['unit_field'];
           $test_name =$row['test_name'];
           $test_type =$row['type'];
           $test_id=$row['id'];
           
       }
/*$sqlxpo="SELECT * FROM  curriculum_tests_done WHERE test_id='$role' and unit_id='$unit_id'";
$counter=0;
    $query_runxpo=mysqli_query($con,$sqlxpo) or die($query_runxpo."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxpo)){
 $user_id=$row['user_id'];

}
*/
$get_elerning=mysqli_query($con,"SELECT * FROM e_learning_users WHERE id='$user_id'") or die(mysqli_error($con));
$geter=mysqli_fetch_assoc($get_elerning);
if($geter){
$name=$geter['first_name']." ".$geter['Last_name'];
$Gender=$geter['Gender'];
$phone=$geter['phone'];
$email=$geter['email'];
    
}else{
$name="";
$Gender="";
$phone="";
$email="";  
}


       //echo "success";
       ?>
        <div class="col-sm-12 col-xs-12" style="font-size:25px;font-weight:bold;"><?php echo $test_name?></div> 
         <div class="col-sm-12 col-xs-12" style="box-shadow: 0 0 2px #ccc;">
            <div class="col-sm-12 col-xs-12">LEARNER'S DETAILS</div>
             <div class="col-sm-3 col-xs-6">NAME: <?php echo $name?></div>
              <div class="col-sm-3 col-xs-6">GENDER: <?php echo $Gender?></div>
               <div class="col-sm-3 col-xs-6">PHONE: <?php echo $phone?></div>
              <div class="col-sm-3 col-xs-6">EMAIL: <?php echo $email?></div>

         </div> 
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
     // echo $question_id;
            $get_account=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE user_id ='$user_id' AND unit_id='$unit_id' AND test_id='$role' AND question_id='$question_id'") or die(mysqli_error($con));
    $num=mysqli_num_rows($get_account);
    if($num>=1){
$sqlp="SELECT * FROM curriculum_exam_area WHERE user_id ='$user_id' AND unit_id='$unit_id' AND test_id='$role' AND question_id='$question_id'";
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
$newcorect="";
$sql="SELECT * FROM curriculum_test_answers Where test_id='$test_id' and question_id='$question_id'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
        $answer=$row['test_answer'];
        $test_option_name=$row['test_option_name'];
        $option_id=$row['id'];
        $status=$row['status'];
        $counter=$counter+1;
        
        if($status=='Correct'){
        $newcorect=$test_option_name;
        }else{
   
        }

if($myoption==$option_id){
$checks="checked";
if($status=='Correct'){
    $corectanswers=$corectanswers+1;
$corect="correct";
}else{
$corect="not correct";
}
$new_status=$corect;
if($new_status=="correct"){
$statusb="<div class='col-sm-12 col-xs-12' style='color: green'>Status: $corect <i class='fa fa-check fa-X5'></i></div>";
}else{
$statusb="<div class='col-sm-12 col-xs-12' style='color: red'>Status: $corect <i class='fa fa-times fa-X5'></i>, The correct answer is: $newcorect </div>";
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

 <script type="text/javascript">
     $(document).ready(function(){
        $("#button_back").click(function(){
     var test_id=btoa('<?php echo $role?>');
      var unit_id=btoa('<?php echo $unit_id?>');

     var my_id=$("#user_email").val();
      $.post("modules/system/content_team/pages/tests/list.php",{test_id:test_id,unit_id:unit_id,my_id:my_id},function(data){
        $("#home").html(data)
      })

        })
      
     })
 </script>