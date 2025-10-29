<style type="text/css">
    .prepeirebtn{
        margin-top: 10px;
        min-height: 30px;
        font-weight: bolder;
        font-size: 20px;
    }
</style>

<?php 
include("../../connect.php");

$unitnext=base64_decode($_POST['role']);
$role=$unitnext-1;
//echo $role;
$my_id=mysqli_real_escape_string($con,base64_decode($_POST['my_id']));

$get_elerning=mysqli_query($con,"SELECT * FROM e_learning_users WHERE email='$my_id'") or die(mysqli_error($con));
$geter=mysqli_fetch_assoc($get_elerning);
if($geter){
$users_id=$geter['id'];
}else{
$$users_id="";    
}
$contentb="";
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
           
       }


   if($unit_field){   
$no_module="";
if($unit_field){
$existed="exists";
}else{
$existed="";
}



?>
<div class="col-sm-12 col-xs-12 not_shown" id="disclaimerp" style="border:1px solid #ccc;font-size: 20px;">
	<div class="col-sm-12 col-xs-12" style="text-align:center;text-transform:uppercase;font-size: 50px;font-weight: bold;color: red;">IMPORTANT INFORMATION</div>
	<div class="col-sm-12 col-xs-12">To access unit <?php echo $unitnext?>, <strong>You must!</strong>.</div>
	<div class="col-sm-12 col-xs-12">1. Have read <strong>content</strong> in Module <?php echo $role?> and any module below it.</div>
	<div class="col-sm-12 col-xs-12">2. Have done a <strong>test</strong> in Module <?php echo $role?> if provided and any other test in the other modules before this mudule if provided.</div>
	<div class="col-sm-12 col-xs-12">3. Have filled a <strong>feedback form</strong> in Module <?php echo $role?> if provided any any provided feedback forms below this module.</div>
	<div class="col-sm-12 col-xs-12">3. Have done  a <strong>practical</strong> in Module <?php echo $role?> if provided and any give practicals in the modules before this</div>

</div>

<?php

  $sqlplio="SELECT * FROM  curriculum_test Where unit_id='$role' and type='normal'";
    $query_runvbn=mysqli_query($con,$sqlplio) or die($query_runvbn."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runvbn)){
           $test_id=$row['id'];

       }





  
if($test_id){


//get number of questions
$noquestions = mysqli_query($con,"SELECT * FROM  curriculum_test_questions WHERE test_id='$test_id'");
$allnoquestions = mysqli_num_rows($noquestions);


    //
$checkexams=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE test_remarks='completed' and user_id ='$users_id' AND unit_id='$role' and test_id='$test_id'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkexams)>=$allnoquestions){
$button_g="not_shown";
$contentb="completed";
  }else{
    $button_g="";
  }
/*
$get_elerning=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE test_remarks='completed' and user_id ='$users_id' AND unit_id='$role' and test_id='$test_id'") or die(mysqli_error($con));
$geter=mysqli_fetch_assoc($get_elerning);
if($geter){
$button_g="not_shown";
$contentb="completed";
}else{
$button_g="";   
}
*/

if($test_id && $button_g){
$suveyed="";
}else{
$suveyed="Not_done";
}





  ?>
<div class="col-sm-12 col-xs-12 <?php echo $button_g?>">
    <div class="col-sm-2 col-xs-12"></div>
    <div class="btn col-sm-8 col-xs-12 btn-primary prepeirebtn start_test" id="<?php  echo $unit_id?>" role="<?php  echo $unit_id?>">Back to module <?php echo $role?> to start test</div>
</div>
<p>&nbsp;</p>
  <?php 

$sqlplig="SELECT * FROM  curriculum_test Where unit_id='$role' and type='feedback'";
    $query_runcn=mysqli_query($con,$sqlplig) or die($query_runcn."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runcn)){
           $test_idd=$row['id'];

       }
if($test_idd){

$fedds = mysqli_query($con,"SELECT * FROM curriculum_test_questions WHERE test_id='$test_idd'");
$allfedds = mysqli_num_rows($fedds);

    //
$checkfeeds=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE test_remarks='completed' and user_id ='$users_id' AND unit_id='$role' and test_id='$test_idd'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkfeeds)>=$allfedds){
$button_gk="not_shown";
$contentb="completed";
  }else{
    $button_gk=""; 
  }
/*




$get_elerning=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE test_remarks='completed' and user_id ='$users_id' AND unit_id='$role' and test_id='$test_idd'") or die(mysqli_error($con));
$getery=mysqli_fetch_assoc($get_elerning);
if($getery){
$button_gk="not_shown";
$contentb="completed";
}else{
$button_gk="";   
}
*/
if($test_idd && $button_gk){
$feedbacked="";
}else{
$feedbacked="Not_done";
}






  ?>
<div class="col-sm-12 col-xs-12 <?php echo $button_gk?>">
    <div class="col-sm-2 col-xs-12"></div>
    <div class="btn col-sm-8 col-xs-12 btn-primary prepeirebtn start_feedback" id="<?php  echo $unit_id?>" role="<?php  echo $unit_id?>">Back to module <?php echo $role?> to give your feedback</div>
</div>
  <?php 
  }else{
	$contentb="completed";
  }






























}else{
  $sqlplig="SELECT * FROM  curriculum_test Where unit_id='$role' and type='feedback'";
    $query_runcn=mysqli_query($con,$sqlplig) or die($query_runcn."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runcn)){
           $test_id=$row['id'];

       }
if($test_idy){
/*

$get_elerning=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE test_remarks='completed' and user_id ='$users_id' AND unit_id='$role' and test_id='$test_id'") or die(mysqli_error($con));
$getert=mysqli_fetch_assoc($get_elerning);
if($getert){
$button_gk="not_shown";
$contentb="completed";
}else{
$button_gk="";   
}
*/
$feddsg = mysqli_query($con,"SELECT * FROM curriculum_test_questions WHERE test_id='$test_idy'");
$allfeddsg = mysqli_num_rows($feddsg);

    //
$checkfeeds=mysqli_query($con,"SELECT * FROM curriculum_exam_area WHERE test_remarks='completed' and user_id ='$users_id' AND unit_id='$role' and test_id='$test_idy'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkfeeds)>=$allfeddsg){
$button_gk="not_shown";
$contentb="completed";
  }else{
  $button_gk="";  
  }




if($test_idy && $button_gk){
$feedbacked="";
}else{
$feedbacked="Not_done";
}





  ?>
<div class="col-sm-12 col-xs-12 <?php echo $button_gk?>">
    <div class="col-sm-2 col-xs-12"></div>
    <div class="btn col-sm-8 col-xs-12 btn-primary prepeirebtn start_feedback" id="<?php  echo $unit_id?>" role="<?php  echo $unit_id?>">Back to module <?php echo $role?> to give your feedback</div>
</div>
  <?php 
  }else{

  	$contentb="completed";

  }








}







}else{
    $no_module="not_found";
}



?>

<script type="text/javascript">
    $(document).ready(function(){
        var rolec =parseInt('<?php echo $unitnext?>');
    	var contentb='<?php echo $contentb?>';
var modulecheck='<?php echo $no_module?>';




    	var existed='<?php echo $existed?>';
    	var my_id=$("#user_email").val();
    	var nextb=rolec-1;
        if(nextb<=0){
       nextb=nextb+1;
       var previous=btoa(nextb);
        }else{

        var previous=btoa(nextb);
        }
    	var role=btoa(rolec);
    	
/*if(nextb==1){
$.post("e_learning/curriculum/load.php",{role:nextb,my_id:my_id},function(data){
				$("#content_player").html(data);
				//$("#errorpage").show();
			})	
}else{

}
*/
if(existed){

}else{
 $.post("e_learning/curriculum/load.php",{role:previous,my_id:my_id},function(data){
                $("#content_player").html(data);
                //alert(data)
                //$("#errorpage").show();
            })  
}
if(contentb){
$.post("e_learning/curriculum/load.php",{role:role,my_id:my_id},function(data){
				$("#content_player").html(data);
				//alert(data)
				//$("#errorpage").show();
			})
	

}else{
	$("#disclaimerp").show();

			
}




        $(".start_test").click(function(){
            var role=btoa($(this).attr("role"));
            var unit_id=btoa($(this).attr("id"));
             var my_id=$("#user_email").val();
            $.post("e_learning/curriculum/check.php",{role:unit_id,my_id:my_id},function(data){
                $("#content_player").html(data);
                $(".header_details").html("");
                
            })
            //alert(role+" "+unit_id)
        })

$(".start_feedback").click(function(){
  var role=btoa($(this).attr("role"));
            var unit_id=btoa($(this).attr("id"));
             var my_id=$("#user_email").val();
            $.post("e_learning/curriculum/check.php",{role:unit_id,my_id:my_id},function(data){
                $("#content_player").html(data);
                $(".header_details").html("");
            })
})


    })
</script>