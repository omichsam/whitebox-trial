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
$role=str_replace(' ', '', mysqli_real_escape_string($con,base64_decode($_POST['test_id'])));
$user_id=mysqli_real_escape_string($con,base64_decode($_POST['my_id']));




//unit_id

    $sql="SELECT * FROM  curriculum_test Where unit_id='$unit_id'  and type='feedback'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           //$unit_field=$row['unit_field'];
           $test_name =$row['test_name'];
           $test_type =$row['type'];
           $test_id=$row['id'];
           
       }

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
            
$sqlp="SELECT * FROM curriculum_exam_area WHERE user_id ='$user_id' AND question_id='$question_id'";
    $query_runl=mysqli_query($con,$sqlp) or die($query_runl."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runl)){
        $myoption=$row['answer_id'];

    }

       

?>
<div class="col-sm-12 no_padding col-xs-12">
 
<div class="col-sm-12 no_padding col-xs-12" style="font-size: 20px;text-align: justify;">
<div class="col-sm-12 col-xs-12" style="font-weight:bold;"><?php echo $question?></div>
<div class="col-sm-12 col-xs-12" style="margin-top:5px"></div>
<?php

?>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-12 col-xs-12"><div class="col-sm-12 col-xs-12">

<div class="col-sm-12 col-xs-12" style="min-height:50px;margin-top: 5px;margin-bottom: 5px;background: #fff;color:green" ><?php echo $myoption?></div>

   
        


   </div>
</div>

</div>

<?php
}
?>
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
         var test_id=btoa($.trim('<?php echo $role?>'));
      var unit_id=btoa($.trim('<?php echo $unit_id?>'));
     var my_id=$("#user_email").val();
      $.post("modules/system/content_team/pages/feedback/list.php",{test_id:test_id,unit_id:unit_id},function(data){
        $("#home").html(data)
      })

        })
      
     })
 </script>