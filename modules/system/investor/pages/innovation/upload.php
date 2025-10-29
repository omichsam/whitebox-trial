<?php 

//mysqli_close(@msql_connect);

include "../../../../functions/security.php";
include "../../../../../connect.php";
$Innovation_id=mysql_real_escape_string($_POST['name']);

//$new_name=$named."_".$l_lastname."_".$m_middlename."_".$f_fisrtname;
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
       if(isset($_FILES['upfile']['name'])){
       		$picname =$_FILES['upfile']['name'];
			$picsize =$_FILES['upfile']['size'];
			$pictmp =$_FILES['upfile']['tmp_name'];
			//@unlink('../../../../'.$OldprofilePic.'');
			 @mkdir("../../../../../doc/property_attachements/innovation_$Innovation_id");
			 /*upload profile images to  user folders*/		  									  		  
	 		 @move_uploaded_file($pictmp,"../../../../../doc/property_attachements/innovation_$Innovation_id/".$_FILES['upfile']['name'] );
		   	 $doc=encrypt("doc/property_attachements/innovation_$Innovation_id/$picname",$key);

       }else{
       	//$doc=$OlddocPic;
       }
	   	 $update=mysql_query("UPDATE innovations_information SET property_attachement='$doc' WHERE Innovation_Id='$Innovation_id'") or die(mysql_error());
	   	 echo "successfull";
}else{
	echo "error";
}
      ?>