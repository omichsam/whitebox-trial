<div class="col-sm-12 col-xs-12 no_padding">
  <div class="col-sm-12 col-xs-12 default_header bordered">Innovations Implemented</div>

<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$submission="implementation";
//$submission=encrypt("approved",$key);
$my_user=$_POST['my_id'];
$my_userde=$my_user;
$get_user=mysqli_query($con,"SELECT Id FROM administrators WHERE user_name='$my_userde'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$User_id=$get['Id'];








$checkExist=mysqli_query($con,"SELECT * FROM innovations_table WHERE status='$submission'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)!=0){
?>
<div class="col-xs-12 col-sm-12 dtittle_holders ">
<div class="col-sm-1 col-xs-1">No.</div>
<div class="col-sm-10 col-xs-10">Name</div>

</div>




<?php

$sqlxp="SELECT * FROM innovation_stamps WHERE Clerk_id='$User_id'";

    $query_runxp=mysqli_query($con,$sqlxp) or die($query_runxp."<br/><br/>".mysqli_error($con));

    while($row=mysql_fetch_array($query_runxp)){
    $Innovation_Id=$row['innovation_id'];
$sqlx="SELECT * FROM innovations_table where Status='$submission' and Innovation_Id='$Innovation_Id' ORDER BY RAND() LIMIT 0, 4";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysql_fetch_array($query_runx)){
    $Innovation_name=base64_decode(decrypt($row['Innovation_name'], $key));
      $Category=base64_decode(decrypt($row['Category'], $key));
  $stage=base64_decode(decrypt($row['stage'], $key));
  $date_added=decrypt($row['date_added'], $key);
   $Innovation_Id=$row['Innovation_Id'];
   $counter=$counter+1;
  if($counter % 2 != 0){ 
?>
<div class="col-xs-12 col-sm-12 odd_rows ">
<div class="col-sm-1 col-xs-1"><?php echo $counter?></div>
<div class="col-sm-10 col-xs-10 overflow_data"><?php echo $Innovation_name?></div>

</div>
<?php
}else{
  ?>
  <div class="col-xs-12 col-sm-12 even_rows ">
<div class="col-sm-1 col-xs-1"><?php echo $counter?></div>
<div class="col-sm-10 col-xs-10 overflow_data"><?php echo $Innovation_name?></div>

</div>
<?php
}
}
}
?>
<div class="col-xs-12 col-sm-12" style="text-align: right;"><span class="btn theme_bg more_innovations" role="implementation">View All</span></div>
<?php



}else{
  
}
?>



</div>
<script type="text/javascript">
  $(document).ready(function(){
    var my_id=$("#user_email").val();
    $(".more_innovations").click(function(){
       var my_role=btoa($(this).attr("role"));
       $.post("modules/system/content_team/pages/dashboard/more.php",{my_role:my_role,my_id:my_id},function(data){
        $("#common_analyzer").html(data)
       })
    })
  })
</script>