<?php 

//mysqli_close(@msql_connect);

include "../../../../connect.php";
$named=mysqli_real_escape_string($con,$_POST['name']);
$getPicDir=mysqli_query($con,"SELECT * FROM register WHERE adm_no='$named'") or die(mysqli_error($con));
$row=mysqli_fetch_assoc($getPicDir);
$OldprofilePic=$row['picture'];
$f_fisrtname=$row['fname'];
$m_middlename=$row['mname'];
$l_lastname=$row['lname'];
$new_name=$named."_".$l_lastname."_".$m_middlename."_".$f_fisrtname;
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
       if(isset($_FILES['upfile']['name'])){
       		$picname =$_FILES['upfile']['name'];
			$picsize =$_FILES['upfile']['size'];
			$pictmp =$_FILES['upfile']['tmp_name'];
			@unlink('../../../../'.$OldprofilePic.'');
			 @mkdir("../../../../images/students/student_$new_name");
			 /*upload profile images to  user folders*/		  									  		  
	 		 @move_uploaded_file($pictmp,"../../../../images/students/student_$new_name/".$_FILES['upfile']['name'] );
		   	 $profile="images/students/student_$new_name/$picname";

       }else{
       	$profile=$OldprofilePic;
       }
	   	 $update=mysqli_query($con,"UPDATE register SET picture='$profile' WHERE adm_no='$named'") or die(mysqli_error($con));
	   	 echo "successfull";
}else{
	echo "error";
}
      ?>