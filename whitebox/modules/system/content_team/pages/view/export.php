<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
/*$filename = "Innovations.xls";     
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$filename");*/
        $timestamp = date('Y-m-d');
        $filename = 'Innovations' . $timestamp . '.xls';
        
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"$filename\"");

//header("Content-Disposition: attachment; filename='file_name_goes_here.xls'");
 
//header("Content-Type: application/vnd.ms-excel");

$post_list = array();
 
//get rows query
$sqlx = "SELECT user_id,sector_id,InnovationBig4Sector,Innovation_name,stage,need,solution,impact,busines_model,target,Research_sources,requirements FROM innovations_table Where Status!='pending'";
  $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    //while($row=mysqli_fetch_array($query_runx)){
//number of rows
$rowCount = mysqli_num_rows($query_runx);
 
$sno = 1;
if($rowCount > 0){
while($row = mysqli_fetch_assoc($query_runx)){

$sector_id=$row['sector_id'];
$InnovationBig4Sector=$row['InnovationBig4Sector'];
$first_name="";
$newsector="";
$bg4id_name="";
$last_name="";
$phone="";
$email="";
$user_id=$row['user_id'];
$get_event=mysqli_query($con,"SELECT * FROM users WHERE id='$user_id'") or die(mysqli_error($con));
$getevent=mysqli_fetch_assoc($get_event);
if($getevent){
$first_name=$getevent['first_name'];
$last_name=$getevent['last_name'];
$phone=$getevent['phone'];
$email=$getevent['email'];
}else{

}

$get_sector=mysqli_query($con,"SELECT name FROM sectors WHERE id='$sector_id'") or die(mysqli_error($con));
$getid=mysqli_fetch_assoc($get_sector);

 $newsector=$getid['name'];
 $get_bigfoursectors=mysqli_query($con,"SELECT Name FROM bigfoursectors WHERE id='$InnovationBig4Sector'") or die(mysqli_error($con));
$getbigid=mysqli_fetch_assoc($get_bigfoursectors);

 $bg4id_name=$getbigid['Name'];



    $post_list[] = array( "No"=>$sno, "INNOVATOR NAME"=>$first_name." ".$last_name, "EMAIL ADDRESS"=>$email, "PHONE NUMBER"=>$phone, "INNOVATION NAME"=>$row["Innovation_name"], "SECTOR"=>$newsector, "BIG FOUR AGENDA"=>$bg4id_name, "STAGE"=>$row["stage"],"GAP IDENTIFIED"=>$row["need"],  "SOLUTION PROVIDED"=>$row["solution"],"INNOVATION IMPACT"=>$row["impact"],  "BUSINESS MODEL"=>$row["busines_model"],"CUSTOMER TARGET"=>$row["target"],  "RESEARCH SOURCES"=>$row["Research_sources"],"TECHNICAL REQUIREMENTS"=>$row["requirements"]);
    $sno++;
  }
}
 
$title_flag = false;
foreach($post_list as $post) {
  if(!$title_flag) {
    // Showing column names 
    echo implode("\t", array_keys($post)) . "\n";
    $title_flag = true;
  }
  // data filtering
  array_walk($post, 'dataFilter');
  echo implode("\t", array_values($post)) . "\n";
 
}
 function dataFilter(&$str_val)
{
  $str_val = preg_replace("/\t/", "\\t", $str_val);
  $str_val = preg_replace("/\r?\n/", "\\n", $str_val);
  if(strstr($str_val, '"')) $str_val = '"' . str_replace('"', '""', $str_val) . '"';
}
 
 ?>
