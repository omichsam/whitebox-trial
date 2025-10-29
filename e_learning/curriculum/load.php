<?php 
include("../../connect.php");
$role=base64_decode($_POST['role']);
$my_id=mysqli_real_escape_string($con,base64_decode($_POST['my_id']));
//echo $my_id;
$get_elerning=mysqli_query($con,"SELECT * FROM e_learning_users WHERE email='$my_id'") or die(mysqli_error($con));
$geter=mysqli_fetch_assoc($get_elerning);
if($geter){
$users_id=$geter['id'];
}else{
$users_id="";    
}
	$sql="SELECT * FROM curriculum_units_details Where unit_id='$role'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           $unit_field=$row['unit_field'];
           $unit_description =$row['unit_description'];

           $content_outher  =$row['content_outher'];
           $supporting_link  =$row['supporting_link'];
           $resource_type=$row['resource_type'];
           $id=$row['id'];
           $unit_id=$row['unit_id'];
           
       

?>
<div class="col-sm-12 no_padding col-xs-12" style="margin-top: 10px">
  <div class="col-sm-12 no_padding col-xs-12" style="font-size:25px;font-weight:bold;"><?php echo $unit_field?></div> 
<div class="col-sm-12 no_padding col-xs-12" style="font-size: 20px;text-align: justify;"><?php echo $unit_description?></div> 


  <?php
  if($resource_type=="video"){

       ?>
    <iframe class="col-sm-12 col-xs-12" height="400" src="<?php echo $supporting_link?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    

       <?php
      
  }else if($resource_type=="test"){ 

    $sqlplio="SELECT * FROM  curriculum_test Where unit_id='$role' and type='normal'";
    $query_runvbn=mysqli_query($con,$sqlplio) or die($query_runvbn."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runvbn)){
           $test_id=$row['id'];

       }


  
if($test_id){


$get_elerning=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE test_remarks='completed' and user_id ='$users_id' AND unit_id='$role' and test_id='$test_id'") or die(mysqli_error($con));
$geter=mysqli_fetch_assoc($get_elerning);
if($geter){
$button_g="not_shown";
}else{
$button_g="";   
}







  ?>
<div class="col-sm-12 col-xs-12 <?php echo $button_g?>">
    <div class="col-sm-4 col-xs-4"></div>
    <div class="btn col-sm-4 col-xs-4 btn-primary start_test" id="<?php  echo $unit_id?>" role="<?php  echo $id?>">Start test</div>
</div>
<p>&nbsp;</p>
  <?php 

$sqlplig="SELECT * FROM  curriculum_test Where unit_id='$role' and type='feedback'";
    $query_runcn=mysqli_query($con,$sqlplig) or die($query_runcn."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runcn)){
           $test_idd=$row['id'];

       }
if($test_idd){


$get_elerning=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE test_remarks='completed' and user_id ='$users_id' AND unit_id='$role' and test_id='$test_idd'") or die(mysqli_error($con));
$geter=mysqli_fetch_assoc($get_elerning);
if($geter){
$button_gk="not_shown";
}else{
$button_gk="";   
}







  ?>
<div class="col-sm-12 col-xs-12 <?php echo $button_gk?>">
    <div class="col-sm-4 col-xs-4"></div>
    <div class="btn col-sm-4 col-xs-4 btn-primary start_feedback" id="<?php  echo $unit_id?>" role="<?php  echo $id?>">Give your feedback</div>
</div>
  <?php 
  }else{

  }






























}else{
  $sqlplig="SELECT * FROM  curriculum_test Where unit_id='$role' and type='feedback'";
    $query_runcn=mysqli_query($con,$sqlplig) or die($query_runcn."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runcn)){
           $test_id=$row['id'];

       }
if($test_id){


$get_elerning=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE test_remarks='completed' and user_id ='$users_id' AND unit_id='$role' and test_id='$test_id'") or die(mysqli_error($con));
$geter=mysqli_fetch_assoc($get_elerning);
if($geter){
$button_gk="not_shown";
}else{
$button_gk="";   
}







  ?>
<div class="col-sm-12 col-xs-12 <?php echo $button_gk?>">
    <div class="col-sm-4 col-xs-4"></div>
    <div class="btn col-sm-4 col-xs-4 btn-primary start_feedback" id="<?php  echo $unit_id?>" role="<?php  echo $id?>">Give your feedback</div>
</div>
  <?php 
  }else{

  }








}









}else{

}
  ?>   




</div>
<?php
}
?>
<script type="text/javascript">
    $(document).ready(function(){
        $(".start_test").click(function(){
            var role=btoa($(this).attr("role"));
            var unit_id=btoa($(this).attr("id"));
             var my_id=$("#user_email").val();
            $.post("e_learning/survey/survey.php",{role:role,unit_id:unit_id,my_id:my_id},function(data){
                $("#content_player").html(data);
            })
            //alert(role+" "+unit_id)
        })

$(".start_feedback").click(function(){
  var role=btoa($(this).attr("role"));
            var unit_id=btoa($(this).attr("id"));
             var my_id=$("#user_email").val();
            $.post("e_learning/survey/feedback.php",{role:role,unit_id:unit_id,my_id:my_id},function(data){
                $("#content_player").html(data);
            })
})


    })
</script>