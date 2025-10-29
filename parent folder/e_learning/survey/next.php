<style type="text/css">
    .examcheck{
        font-size: 110% !important;
  display: inline !important;
  margin-bottom: 4px !important;
}
</style>

<?php 
$role=base64_decode($_POST['role']);
$unit_id=base64_decode($_POST['unit_id']);
//unit_id
include("../../connect.php");
	$sql="SELECT * FROM  curriculum_test Where unit_id='$unit_id'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           //$unit_field=$row['unit_field'];
           $test_name =$row['test_name'];
           $test_id=$row['id'];
           
       }
       $counter=0;
$sql="SELECT * FROM curriculum_test_questions Where unit_id='$unit_id'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           //$unit_field=$row['unit_field'];
           $question =$row['question'];
           $question_id=$row['id'];
           $next_question="";

           
       

?>
<div class="col-sm-12 no_padding col-xs-12">
  <div class="col-sm-12 no_padding col-xs-12" style="font-size:25px;font-weight:bold;"><?php echo $test_name?></div> 
<div class="col-sm-12 no_padding col-xs-12" style="font-size: 20px;text-align: justify;">
<div class="col-sm-12 col-xs-12"><?php echo $question?></div>
<div class="col-sm-12 col-xs-12" style="margin-top:5px"></div>
<?php
$sql="SELECT * FROM curriculum_test_answers Where test_id='$test_id' and question_id='$question_id'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
        $answer=$row['test_answer'];
        $test_option_name=$row['test_option_name'];
        $option_id=$row['id'];
        $counter=$counter+1;




?>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-12 col-xs-12"><div class="col-sm-12 col-xs-12">

 <label style="font-weight: initial !important" class="submit_radiosd">

                                                <input type="checkbox"  id="<?php echo "question_$counter"?>" value="<?php echo $option_id?>" name="Answer"  class=" examcheck <?php echo "answer_$counter"?>" role="<?php echo $option_id?>">
                                                  <span class="checkmarkd"></span>
                                                     <?php echo "$test_option_name: $answer"?>
                                                   </label>

   
        


   </div>
</div>

</div>
<?php
}
}
?>
</div>
 </div>
 <div class="col-sm-12 col-xs-12">
     <div class="col-sm-4 col-xs-4"></div>

         <div class="col-sm-4 col-xs-4" >
         <div class="col-sm-5 col-xs-5 btn btn-danger" id="button_back">Back</div>

         <div class="col-sm-2 col-xs-2"></div>
         <div class="col-sm-5 col-xs-5 btn btn-primary" id="button_send">Save</div>

     </div>

 </div>
 <div class="col-sm-12 col-xs-12" id="error_report" style="text-align:center;"></div>

 <script type="text/javascript">
     $(document).ready(function(){
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
  $.post("e_learning/survey/save.php",{my_id:my_id,unit_id:unit_id,question_id:question_id,role:role,answer:answer},function(data){
                //$("#content_player").html(data);
                 $("#error_report").html(data)
            })

   
//alert("ready");
}else{
$("#error_report").html(error)
}
            
        })
     })
 </script>