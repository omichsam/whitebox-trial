  <div id="lower_table " class="no_padding col-sm-12 col-xs-12" style="text-transform: uppercase;font-weight: bold;background: #ccc;">


      <div id="lower_table_header" class="no_padding col-sm-2 col-xs-5" > No. Subject</div>

      <div id="lower_table_header" class="no_padding col-sm-7 " > description</div>

      <div id="lower_table_header" class="no_padding col-sm-1  mobile_hidden" > County</div>
      <div id="lower_table_header" class="no_padding col-sm-2 col-xs-3" >Date<span style="float: right;"> Action</span></div>
      </div>
      <?php

include("../../../../connect.php");
$counter=0;
$sql="SELECT * FROM county_issues where status='closed'";
    $query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){

      $subject=$row['subject'];
      $Registration_no=$row['id'];
     $other_subject=$row['other_subject'];
$description=$row['description'];
$attachement=$row['attachement'];

$countyid=$row['countyid'];
$date_added =$row['date_added'];
$status=$row['status'];
if($attachement){
  $view_pdf="";
}else{
  $view_pdf="not_shown";
}
if($subject==="other"){
$newsubject=$other_subject;
}else{
$newsubject=$subject;
}
$counter=$counter+1;
  $get_user=mysqli_query($con,"SELECT county_name FROM counties WHERE id='$countyid'") or die(mysqli_error($con));

$get=mysqli_fetch_assoc($get_user);
if($get){
  $county_name=$get['county_name'];
}else{
$county_name="";
}
        ?>
<div id="lower_table " class=" table_display no_padding col-sm-12 col-xs-12" role="<?php echo $Registration_no ?>" >
  
      <div id="lower_table display_views_data" class="no_padding col-sm-2 col-xs-5" ><?php echo "$counter. $newsubject"; ?> </div>

      <div id="lower_table display_views_data" class="no_padding col-sm-7"> <?php echo "$description"; ?></div>
      <div id="lower_table display_views_data" class="no_padding col-sm-1 col-xs-3" > <?php echo "$county_name"; ?></div>
            <div id="lower_table display_views_data" class="no_padding col-sm-2 col-xs-3" > <?php echo "$date_added"; ?>


         <span class="btn view_page" style="float: right;" id="<?php echo $Registration_no?>"><i class="fa fa-eye"></i></span>
            <span class="pdf_reading <?php echo $view_pdf?> btn" id="<?php echo $attachement?>" style="float: right;"><i class="fa fa-file-pdf-o"></i></span> 
          </div>
      
      </div>
        <?php
      }
      ?>