
<?php
$loadord=$_POST['loadord'];
?>
          <?php 
        include("../../../../connect.php");


$sql="SELECT * FROM duty_rota where family_id='$loadord' ";
    $query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
      $semester_id=$row['semester_id'];
      $yearid=$row['yearid'];
      }
      $sql="SELECT * FROM study_years where id='$yearid'";
    $query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
      $yearname=$row['name'];
      }
      $sql="SELECT * FROM launch_semesters where id='$semester_id'";
    $query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
      $semester_name=$row['name'];
      }

          ?>

        </div>
        <div class="col-sm-12 col-xs-12 default_header"> <h3 style="text-align:center;text-transform: uppercase;">TUMCATHCOM DUTY ROTA <?php echo "$semester_name, $yearname" ?></h3>
      </div>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-9 col-xs-12"></div>
<div class="col-sm-3 col-xs-12" id="nmkg_logo"></div>
</div>
       <div id="lower_table" class="no_padding col-sm-12 col-xs-12" >
  <div id="lower_table " class="no_padding col-sm-12 col-xs-12" style="background-color: #ccc;text-transform: uppercase;font-weight: bold;font-size: 14px;">

      <div id="lower_table_header" class="no_padding col-sm-4 col-xs-4" > GROUP</div>
        <div id="lower_table_header" class="no_padding col-sm-3 col-xs-3" > STARTING</div>
      <div id="lower_table_header" class="no_padding col-sm-3 col-xs-3" > ENDING</div>
      <div id="lower_table_header" class="no_padding col-sm-2  col-xs-2" > STATUS</div>
      </div>
      <?php

$counter=0;
$family_name="";

$sql="SELECT * FROM duty_rota where family_id='$loadord' order by id ASC";
    $query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
         $family_id="";
      $family_id=$row['family_id'];
    $description=$row['description'];
  $date_from=$row['date_from'];
  $date_to =$row['date_to'];
  $Status=$row['Status'];
  $new_status="";
  $class_d="";
  if($Status=="active"){
      $new_status="This Week";
      $class_d="inservice";
  }else{
      
  }
  $counter=$counter+1;
     
      $family_name= $description;
 
        ?>
<div id="lower_table " class=" table_display no_padding <?php echo $class_d?> col-sm-12 col-xs-12" role="" >
 
      <div id="lower_table display_views_data" class="no_padding col-sm-4 col-xs-4" ><?php echo "$counter $family_name"; ?> </div>
        <div id="lower_table display_views_data" class="no_padding col-sm-3 col-xs-3"> <?php echo "$date_from"; ?></div>
      <div id="lower_table display_views_data" class="no_padding col-sm-3 col-xs-3"> <?php echo "$date_to"; ?></div>
      
      <div id="lower_table display_views_data" class="no_padding col-sm-2 col-xs-2" > <?php echo "$new_status"; ?></div>
     
      
      </div>
        <?php
      }
      ?>
      </div>