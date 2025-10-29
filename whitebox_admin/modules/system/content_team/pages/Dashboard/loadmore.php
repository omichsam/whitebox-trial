<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
        $offset = $_POST['offset'];
       $no_of_records_per_page=10;
  







$sqlx="SELECT * FROM users LIMIT $offset,$no_of_records_per_page";
$counter=$offset;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
  
   $First_name=$row['first_name'];
   $Last_name=$row['last_name'];
   $user_id=$row['id'];
   $Gender=$row['gender'];
 //$County_id=$row['County_id'];
  // $education_level=$row['education_level'];
   $Phone=$row['phone'];
   $County_idn=$row['county_id'];
  $counter=$counter+1;
 $oldstatus="pending";

$innovations=0;
$sqlxrtrt="SELECT * FROM innovations_table where user_id='$user_id' and Status!='pending'";

    $query_runxggg=mysqli_query($con,$sqlxrtrt) or die($query_runxggg."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxggg)){
$innovations=$innovations+1;


}
$sqlxrtrt="SELECT * FROM basic_informations where user_id='$user_id'";

    $query_runxggg=mysqli_query($con,$sqlxrtrt) or die($query_runxggg."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxggg)){
$innovations=$innovations+1;


}
$County_name="";
  $sql="SELECT * FROM counties Where serial_no ='$County_idn'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           $County_name=$row['county_name'];
     


}

$Hiegesteducation="";
  $sql="SELECT * FROM education Where user_id ='$user_id'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           $Hiegesteducation=$row['EducationLevel_id'];
     


}
$educational="";
  $sql="SELECT * FROM education_levels Where id ='$Hiegesteducation'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           $educational=$row['EducationLevelName'];
     


}

  if($counter % 2 != 0){
    ?>
  <div class="col-sm-12 col-xs-12 row_viewsa table_datas" id="<?php echo $user_id?>">
    <div class="col-sm-3 col-xs-4"><?php echo $counter.". ".$First_name." ".$Last_name?></div>
    <!--<div class="col-sm-1 col-xs-2"><?php echo $national_id?></div>-->
    <div class="col-sm-2 mobile_hidden"><?php echo $Phone?></div>
    
    <div class="col-sm-1 col-xs-2"><?php echo $Gender?></div>
    <div class="col-sm-2 mobile_hidden"><?php echo $County_name?></div>
    <div class="col-sm-2 col-xs-3">
      <?php echo $educational?>
</div>
    <div class="col-sm-2 col-xs-1">
      <?php echo $innovations?>
</div>

  </div>
  <?php
}else{
  ?>
<div class="col-sm-12 col-xs-12 row_viewsa table_data" id="<?php echo $user_id?>">
  <div class="col-sm-3 col-xs-4"><?php echo $counter.". ".$First_name." ".$Last_name?></div>
    <!--<div class="col-sm-1 col-xs-2"><?php echo $national_id?></div>-->
    <div class="col-sm-2 mobile_hidden"><?php echo $Phone?></div>
    
    <div class="col-sm-1 col-xs-2"><?php echo $Gender?></div>
    <div class="col-sm-2 mobile_hidden"><?php echo $County_name?></div>
    <div class="col-sm-2 col-xs-3">
      <?php echo $educational?>
</div>
    <div class="col-sm-2 col-xs-1">
      <?php echo $innovations?>
</div>
  </div>



  <?php
  
}
}
?>