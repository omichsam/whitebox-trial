
<?php
$filename = $_FILES['file']['name']; 
 $Innovation_id=$_POST['name'];
/* Location */
@mkdir("../../../../../doc/property_attachements/innovation_$Innovation_id");
$location = "../../../../../doc/property_attachements/innovation_$Innovation_id/".$filename; 
$uploadOk = 1; 
  
if($uploadOk == 0){ 
   echo 0; 
}else{ 
   /* Upload file */
   if(move_uploaded_file($_FILES['file']['tmp_name'], $location)){ 
      echo $location; 
   }else{ 
      echo 0; 
   } 
} 

?>