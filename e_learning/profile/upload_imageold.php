
<?php 
include "../../connect.php";
$data="";
$datab="not_shown";
$dated=time();
 //session_start();

$loginuser=$_POST['userd'];

$get_user=mysqli_query($con,"SELECT * FROM e_learning_users WHERE email='$loginuser'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$first_name=$get['first_name'];
$id=$get['id'];
$last_name=$get['Last_name'];
$fullname=mysqli_real_escape_string($con,"user".$id."_".$first_name."_".$last_name."_".$dated);
$fullnamed=mysqli_real_escape_string($con,"user".$id."_".$first_name."_".$last_name);

$new_names=$fullnamed.".png";
$new_name=$loginuser."_innovator_";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
       if(isset($_FILES['upfile']['name'])){
       		$picname =$_FILES['upfile']['name'];
         

			$picsize =$_FILES['upfile']['size'];
			$pictmp =$_FILES['upfile']['tmp_name'];
		//	@unlink('../../../../'.$OldprofilePic.'');
			 //@mkdir("../../images/");
			 /*upload profile images to  user folders*/
			 (unlink($new_names)) ;
			// rename("../images/".$new_names,"../images/".$fullname.".png");		  									  		  
	 		 @move_uploaded_file($pictmp,"../images/".$_FILES['upfile']['name']);
	 		  rename("../images/".$_FILES['upfile']['name'],"../images/".$fullnamed.".png");
		   // $profile="im$new_names;
	 		 echo "success";
/**$update=mysqli_query($con,"UPDATE e_learning_users SET colm_39='$new_names' WHERE colm_9='$loginuser'") or die(mysqli_error($con));
	   	if($update){
    echo "success";
	   	}else{

	   	}
	   	*/
       }else{
       	//$profile=$OldprofilePic;
       }
	   	 
}else{
	echo "error";
}
      ?>
      
      
      