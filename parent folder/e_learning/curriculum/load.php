<?php 
$role=base64_decode($_POST['role']);
include("../../connect.php");
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

  ?>
<div class="col-sm-12 col-xs-12">
    <div class="col-sm-4 col-xs-4"></div>
    <div class="btn col-sm-4 col-xs-4 btn-primary start_test" id="<?php  echo $unit_id?>" role="<?php  echo $id?>">Start test</div>
</div>
  <?php 
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
            $.post("e_learning/survey/survey.php",{role:role,unit_id:unit_id},function(data){
                $("#content_player").html(data);
            })
            //alert(role+" "+unit_id)
        })
    })
</script>