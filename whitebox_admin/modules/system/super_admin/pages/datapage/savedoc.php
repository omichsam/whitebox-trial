<?php
include "../../../../../connect.php";
//export.php  
 if(!empty($_FILES["excel_file"]))  
 {   
      $file_array = explode(".", $_FILES["excel_file"]["name"]);  
    
           include("Classes/PHPExcel.php");  
           
           $object = PHPExcel_IOFactory::load($_FILES["excel_file"]["tmp_name"]);  
           echo $object;
      
 }  

?>