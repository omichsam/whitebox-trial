<?php

include "../../../../functions/security.php";
include "../../../../../connect.php";

//---get the innovation_ID
$innovation_Id=base64_decode($_POST['innovation_Id']);

$submit=encrypt("submission", $key);

//$innovation_Id="224";
//...Upload and save intellectual file....
if ($innovation_Id){

 if (isset($_FILES) && !empty($_FILES['doc'])){
   // $Innovation_Id=($_POST['Innovation_Id']);
 	$file=$_FILES['doc'];

 	//Extension jpg, png, jpeg

 	$fileNameAr = explode('.', $file['name']);
 	$extension = end($fileNameAr);
 	$ext = strtolower($extension);

 	if($ext === 'pdf'
      || $ext === 'docx'
      || $ext === 'xls'
      || $ext === 'xlsb'
      || $ext === 'xlsm'
      || $ext === 'xlsx'
      || $ext === 'png'
      || $ext === 'jpeg'
      || $ext === 'jpg'
      || $ext === 'csv'){
      @mkdir("../../../../../documents/property_attachments/innovation_$innovation_Id");
      	$interlectual = $fileNameAr[0].'_'.time().'.'.$extension;
 		$upload = move_uploaded_file($_FILES['doc']['tmp_name'], '../../../../../documents/property_attachments/innovation_'.$innovation_Id.'/'.$interlectual);


 			$update=mysql_query("UPDATE innovations_information SET property_attachement='$interlectual' WHERE Innovation_Id='$innovation_Id'");


 	
 	}
 }

//Upload and save attached file.....

 if (isset($_FILES) && !empty($_FILES['file'])){
 //	$Innovation_Id=($_POST['Innovation_Id']);
 	$file=$_FILES['file'];

 	//Extension jpg, png, jpeg

 	$fileNameAr = explode('.', $file['name']);
 	$extension = end($fileNameAr);
 	$ext = strtolower($extension);

 	
        @mkdir("../../../../../documents/attachments/innovation_$innovation_Id");
      	$uniqueFileName = $fileNameAr[0].'_'.time().'.'.$extension;
 		$upload = move_uploaded_file($_FILES['file']['tmp_name'], '../../../../../documents/attachments/innovation_'.$innovation_Id.'/'.$uniqueFileName);

 			$update=mysql_query("UPDATE innovations_information SET attachments='$uniqueFileName' WHERE Innovation_Id='$innovation_Id'");

      
       
 	
 }

 if (!empty($_POST['link'])){
 //	$Innovation_Id=($_POST['Innovation_Id']);
 	$link=$_POST['link'];

 			$update=mysql_query("UPDATE innovations_information SET link='$link' WHERE Innovation_Id='$innovation_Id'");

 } 
 $update=mysql_query("UPDATE innovations_table SET Status='$submit' WHERE Innovation_Id='$innovation_Id'");
 echo "success";
}else{
 	
 }

//mysqli_close(@msql_connect);

//include "../../../../functions/security.php";
//include "../../../../../connect.php";
//$Innovation_id=mysql_real_escape_string($_POST['name']);

//allowed file types
/*$arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];
 
if (!(in_array($_FILES['file']['type'], $arr_file_types))) {
    echo "false";
    return;
}
 
if (!file_exists('uploads')) {
    mkdir('uploads', 0777);
}
 
move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file']['name']);
 
echo "success";
die();

*/
/*

$intellectual_property=$_POST['intellectual_property'];
$attach_file=$_POST['attach_file'];
$link=$_POST['link'];
$Innovation_Id=base64_decode($_POST['Innovation_Id']);

//$new_name=$named."_".$l_lastname."_".$m_middlename."_".$f_fisrtname;
if($intellectual_property)
{
       if(isset($_FILES['upfile']['name'])){
       		$picname=$_FILES['upfile']['name'];
			$picsize=$_FILES['upfile']['size'];
			$pictmp=$_FILES['upfile']['tmp_name'];
			//@unlink('../../../../'.$OldprofilePic.'');
			 @mkdir("../../../../../doc/property_attachements/innovation_$Innovation_id");
			 /*upload profile images to  user folders*/		  									  		  
	 		/* @move_uploaded_file($pictmp,"../../../../../doc/property_attachements/innovation_$Innovation_id/".$_FILES['upfile']['name']);
		   	 $doc=encrypt("doc/property_attachements/innovation_$Innovation_id/$picname",$key);

       }*/
       //else{
       	//$doc=$OlddocPic;
       //	echo ("file not found");
       //}
/*	   	 $update=mysql_query("UPDATE innovations_information SET property_attachement='$doc' WHERE Innovation_Id='$Innovation_id'") or die(mysql_error());
	   	 echo "successfull";
}else if ($attach_file){
	if(isset($_FILES['upfile']['name'])){
       		$picname=$_FILES['upfile']['name'];
			$picsize=$_FILES['upfile']['size'];
			$pictmp=$_FILES['upfile']['tmp_name'];
			//@unlink('../../../../'.$OldprofilePic.'');
			 @mkdir("../../../../../doc/property_attachements/innovation_$Innovation_id");
			 /*upload profile images to  user folders*/		  									  		  
	 		/* @move_uploaded_file($pictmp,"../../../../../doc/property_attachements/innovation_$Innovation_id/".$_FILES['upfile']['name']);
		   	 $doc=encrypt("doc/property_attachements/innovation_$Innovation_id/$picname",$key);

       }*/
       //else{
       	//$doc=$OlddocPic;
       //	echo ("file not found");
       //}
/*	   	 $update=mysql_query("UPDATE innovations_information SET attachments='$doc' WHERE Innovation_Id='$Innovation_id'") or die(mysql_error());
	   	 echo "successfull";
}
else if ($link){
	$linkencrypt=encrypt("$link,$key");
	$update=mysql_query("UPDATE innovations_information SET link='$linkencrypt' WHERE Innovation_Id='$Innovation_id'") or die(mysql_error());
}
else{
	echo "error";
}*/
      ?>