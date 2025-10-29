
<?php 

//mysqli_close(@msql_connect);
include "../../../../../connect.php";
include("../../../../functions/security.php");
$data="";
$named=base64_decode(mysql_real_escape_string($_POST['name']));
$new_name=$named."_investor_user_";
$mail=encrypt(mysql_real_escape_string($_POST['name']),$key);
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
       if(isset($_FILES['upfile']['name'])){
       		$picname =$_FILES['upfile']['name'];
			$picsize =$_FILES['upfile']['size'];
			$pictmp =$_FILES['upfile']['tmp_name'];
		//	@unlink('../../../../'.$OldprofilePic.'');
			 @mkdir("../../../../../images/invesors/investor_$new_name");
			 /*upload profile images to  user folders*/		  									  		  
	 		 @move_uploaded_file($pictmp,"../../../../../images/invesors/investor_$new_name/".$_FILES['upfile']['name'] );
		   	 $profile=encrypt(base64_encode("images/invesors/investor_$new_name/$picname"),$key);
$update=mysql_query("UPDATE investors SET image='$profile' WHERE Email='$mail'") or die(mysql_error());
	   	
       }else{
       	//$profile=$OldprofilePic;
       }
	   	 echo "success";
}else{
	echo "error";
}
      ?>
      
      
      