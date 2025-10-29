
<?php 
include("../../../base_connect.php");
include("../../../connect.php");
$data="";
$datab="not_shown";
$dated=time();
 //session_start();
  $loginuser=base64_decode($_SESSION["username"]);
  //echo $loginuser;
if($loginuser){
$loginuser=$_POST['userd'];
}else{

}
$get_user=mysqli_query($con,"SELECT * FROM users WHERE email='$loginuser'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$first_name=$get['first_name'];
$id=$get['id'];
$last_name=$get['last_name'];
$fullname=mysqli_real_escape_string($con,"user".$id."_".$first_name."_".$last_name."_".$dated);


$new_name=$loginuser."_innovator_";
if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
{
       if(isset($_FILES['upfile']['name'])){
       		$picname =$_FILES['upfile']['name'];
         

			$picsize =$_FILES['upfile']['size'];
			$pictmp =$_FILES['upfile']['tmp_name'];
		//	@unlink('../../../../'.$OldprofilePic.'');
			 //@mkdir("../../images/innovators/");
			 /*upload profile images to  user folders*/		  									  		  
	 		 @move_uploaded_file($pictmp,"../../images/innovators/".$_FILES['upfile']['name']);
	 		  rename("../../images/innovators/".$_FILES['upfile']['name'],"../../images/innovators/".$fullname.".png");
		   // $profile="im$new_names;
	 		 $new_names=$fullname.".png";
$update=mysqli_query($con,"UPDATE users SET pic='$new_names' WHERE email='$loginuser'") or die(mysqli_error($con));
	   	if($update){
    echo "success";
	   	}else{

	   	}
       }else{
       	//$profile=$OldprofilePic;
       }
	   	 
}else{
	echo "error";
}
      ?>
      
      
      