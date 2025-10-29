<?php

//import.php

header('Content-type: text/html; charset=utf-8');
header("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");

set_time_limit(100);

ob_implicit_flush(1);

session_start();

if(isset($_SESSION['csv_file_name'])){
include("../../../../connect.php");
$filename=$_SESSION['csv_file_name'];
$get_userp=mysqli_query($con,"SELECT * FROM data_docs WHERE file_name='$filename'") or die(mysqli_error($con));
$getr=mysqli_fetch_assoc($get_userp);
if($getr){
$doc_id=$getr['id'];
}else{
$doc_id='';
}


$file_data = fopen('../../../../../documents/articles/' . $_SESSION['csv_file_name'], 'r');


 while($row = fgetcsv($file_data)){
     $field1=mysqli_real_escape_string($con,$row[0]);
     $field2=mysqli_real_escape_string($con,$row[1]);
     $field3=mysqli_real_escape_string($con,$row[2]);
     $field4=mysqli_real_escape_string($con,$row[3]);
     $field5=mysqli_real_escape_string($con,$row[4]);
     $field6=mysqli_real_escape_string($con,$row[5]);
     $field7=mysqli_real_escape_string($con,$row[6]);
     $field8=mysqli_real_escape_string($con,$row[7]);
     $field9=mysqli_real_escape_string($con,$row[8]);
     $field10=mysqli_real_escape_string($con,$row[9]);
     $field11=mysqli_real_escape_string($con,$row[10]);
     $field12=mysqli_real_escape_string($con,$row[11]);
     $field13=mysqli_real_escape_string($con,$row[12]);
     $field14=mysqli_real_escape_string($con,$row[13]);
     $field15=mysqli_real_escape_string($con,$row[14]);
     $field16=mysqli_real_escape_string($con,$row[15]);
     $field17=mysqli_real_escape_string($con,$row[16]);
     $field18=mysqli_real_escape_string($con,$row[17]);
     $field19=mysqli_real_escape_string($con,$row[18]);
      $field20=mysqli_real_escape_string($con,$row[19]);
     $field21=mysqli_real_escape_string($con,$row[20]);

  $query=mysqli_query($con,"INSERT INTO data_table VALUE(Null,
                                                          '$doc_id',
                                                          '$field1',
                                                          '$field2',
                                                          '$field3',
                                                          '$field4',
                                                          '$field5',
                                                          '$field6',
                                                          '$field7',
                                                          '$field8',
                                                          '$field9',
                                                          '$field10',
                                                          '$field11',
                                                          '$field12',
                                                          '$field13',
                                                          '$field14',
                                                          '$field15',
                                                          '$field16',
                                                          '$field17',
                                                          '$field18',
                                                          '$field19',
                                                          '$field21')") or die(mysqli_error($con));
  // use exec() because no results are returned
  //$connect->exec($sql);
  //echo "New record created successfully";
 

  sleep(1);

  if(ob_get_level() > 0)
  {
   ob_end_flush();
  }
 }



 unset($_SESSION['csv_file_name']);
}



?>

