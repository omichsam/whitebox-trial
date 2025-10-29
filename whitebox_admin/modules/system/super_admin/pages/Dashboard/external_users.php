<style type="text/css">
  #table_headers{
   
    min-height: 30px;
    font-weight: bold;
    font-size: 15px;
    background:#ccc;
  }
  .table_datas{
    font-size: 11px;
   min-height: 30px;
   border-bottom: 2px solid #ccc;
   background: #fff;
   margin-top: 5px;
   cursor: pointer;
  }
  .table_data{
    font-size: 11px;
   min-height: 30px;
   border-bottom: 2px solid #ccc;
   margin-top: 5px;
   cursor: pointer;
  }
</style>

<div class="col-sm-12 col-xs-12">
  <div class="col-sm-12 col-xs-12 default_header">REGISTERED USERS <span style="float: right;" class="btn " id="export_innovations"><a>Export <i class="fa fa-download"></i></a> </span></div>
<div class="col-sm-12 col-xs-12" id="table_headers">
    
    <div class="col-sm-4 col-xs-4">NAME</div>
    <div class="col-sm-2 col-xs-4">PHONE</div>
    <div class="col-sm-2 mobile_hidden">GENDER</div>
    <div class="col-sm-2 mobile_hidden">COUNTY</div>
    <div class="col-sm-2 col-xs-3">EDUCATION</div>
  </div>
  <?php 

  include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
  $First_name="";
   $Last_name="";
   $dob="";
   $Gender="";
 $County_id="";
   $education_level="";
   $Phone="";
$sqlx="SELECT * FROM users ";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
  

  $First_named=$row['first_name'];
   $Last_named=$row['last_name'];
   $dobn=$row['dob'];
   $Genderd=$row['gender'];
   $County_idn=$row['county_id'];
   $user_id=$row['id'];
   $Phonem=$row['phone'];
   if($dobn=="0000-00-00"){
$dobnd="";
   }else{
    $dobnd=$dobn;
   }
 

  $counter=$counter+1;

  $sql="SELECT * FROM county_table where id ='$County_idn'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           $County_name=$row['County_name'];
     


}
$EducationLevel_id="";
  $sql="SELECT * FROM education where user_id ='$user_id'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           $EducationLevel_id=$row['EducationLevel_id'];
     

}
$EducationLevelName="";
 $sql="SELECT * FROM education_levels where id ='$EducationLevel_id'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           $EducationLevelName=$row['EducationLevelName'];
     

}


  if($counter % 2 != 0){
    ?>
  <div class="col-sm-12 col-xs-12 row_viewsa table_datas" id="<?php echo $user_id?>">
    <div class="col-sm-4 col-xs-2"><?php echo $counter.". ".$First_named." ".$Last_named?></div>
    <div class="col-sm-2 mobile_hidden"><?php echo $Phonem?></div>
    
    <div class="col-sm-2 col-xs-4"><?php echo $Genderd?></div>
    <div class="col-sm-2 mobile_hidden"><?php echo $County_name?></div>
    <div class="col-sm-2 col-xs-3">
      <?php echo $EducationLevelName?>
</div>
  </div>
  <?php
}else{
  ?>
<div class="col-sm-12 col-xs-12 row_viewsa table_data" id="<?php echo $user_id?>">
    <div class="col-sm-4 col-xs-2"><?php echo $counter.". ".$First_named." ".$Last_named?></div>
    <div class="col-sm-2 mobile_hidden"><?php echo $Phonem?></div>
    
    <div class="col-sm-2 col-xs-4"><?php echo $Genderd?></div>
    <div class="col-sm-2 mobile_hidden"><?php echo $County_name?></div>
    <div class="col-sm-2 col-xs-3">
      <?php echo $EducationLevelName?>
</div>
  </div>



  <?php
  
}

}
?>
</div>

<script type="text/javascript">
  $(document).ready(function(){
$("#export_innovations").click(function(){
 var url="modules/system/super_admin/pages/Dashboard/exportone.php";
 var target="#home";
$.post(""+url+"",function(data){
//alert(data)
 $(target).html(data)
})
}) 
  })

</script>