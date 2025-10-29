<?php
session_start();
//import.php

header('Content-type: text/html; charset=utf-8');
header("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");

set_time_limit(400);

ob_implicit_flush(1);



if(isset($_SESSION['csv_file_name'])){
include "../../../../../connect.php";
$filename=$_SESSION['csv_file_name'];
$get_userp=mysqli_query($con,"SELECT * FROM data_docs WHERE file_name='$filename'") or die(mysqli_error($con));
$getr=mysqli_fetch_assoc($get_userp);
if($getr){
$doc_id=$getr['id'];
}else{
$doc_id='';
}


$file_data = fopen('../../../../../uploads/' . $_SESSION['csv_file_name'], 'r');


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
     $field22=mysqli_real_escape_string($con,$row[21]);
     $field23=mysqli_real_escape_string($con,$row[22]);
     $field24=mysqli_real_escape_string($con,$row[23]);
     $field25=mysqli_real_escape_string($con,$row[24]);
     $field26=mysqli_real_escape_string($con,$row[25]);
     $field27=mysqli_real_escape_string($con,$row[26]);
     $field28=mysqli_real_escape_string($con,$row[27]);
     $field29=mysqli_real_escape_string($con,$row[28]);
     $field30=mysqli_real_escape_string($con,$row[29]);
     $field31=mysqli_real_escape_string($con,$row[30]);
     $field32=mysqli_real_escape_string($con,$row[31]);
     $field33=mysqli_real_escape_string($con,$row[32]);
     $field34=mysqli_real_escape_string($con,$row[33]);
     $field35=mysqli_real_escape_string($con,$row[34]);
     $field36=mysqli_real_escape_string($con,$row[35]);
     $field37=mysqli_real_escape_string($con,$row[36]);
     $field38=mysqli_real_escape_string($con,$row[37]);
     $field39=mysqli_real_escape_string($con,$row[38]);
     $field40=mysqli_real_escape_string($con,$row[39]);
     $field41=mysqli_real_escape_string($con,$row[40]);
     $field42=mysqli_real_escape_string($con,$row[41]);

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
                                                          '$field20',
                                                          '$field21',
                                                          '$field22',
                                                          '$field23',
                                                          '$field24',
                                                          '$field25',
                                                          '$field26',
                                                          '$field27',
                                                          '$field28',
                                                          '$field29',
                                                          '$field30',
                                                          '$field31',
                                                          '$field32',
                                                          '$field33',
                                                          '$field34',
                                                          '$field35',
                                                          '$field36',
                                                          '$field37',
                                                          '$field38',
                                                          '$field39',
                                                          '$field40')") or die(mysqli_error($con));
 
 

  sleep(1);

  if(ob_get_level() > 0)
  {
   ob_end_flush();
  }
 }



 unset($_SESSION['csv_file_name']);
}



?>

