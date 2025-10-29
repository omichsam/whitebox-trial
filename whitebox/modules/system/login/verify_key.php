<?php
include "../../api/sms/smsGateway.php";
include "../../plugins/functions/php_functions.php";
include "../../connect.php";
include "../../plugins/functions/general_functions.php";

$thisKey=mysqli_real_escape_string($con,$_POST['thisKey']);
$thisUser=mysqli_real_escape_string($con,$_POST['thisUser']);
$role=mysqli_real_escape_string($con,$_POST['role']);

 
$ValidateKey=mysqli_query($con,"SELECT user_id,fname,email,phone FROM admin_tbl WHERE email='$thisUser' AND user_id='$thisKey' OR phone='$thisUser' AND user_id='$thisKey'") or die(mysqli_error($con));
if(mysqli_num_rows($ValidateKey)==0){
	echo "Invalid Key.";

}else{
	if($role=="recover_pass"){
	?>
				<script>
				$(document).ready(function(){
					$(".splashpages").hide();
					$(".overly,#create_new_password").removeClass("fadeOutDown").addClass("fadeInUp").show();
			   	    $("#newest_pass_email").val("<?php echo $thisUser;?>");
			   	    $("#loginuser").val("<?php echo $thisUser;?>");
			   	    $("#loginpass").val("");
				});
			</script>

	<?php
	}else if($role=="confirm_account"){
		$get=mysqli_fetch_assoc($ValidateKey);
 	  		 $user_id=$get['user_id'];
 	  		 $fname=$get['fname'];
 	  		 $email=$get['email'];
 	  		 $phone=$get['phone'];

	  		 $activate=mysqli_query($con,"UPDATE admin_tbl SET status='active' WHERE email='$thisUser' OR phone='$thisUser' ") or die(mysqli_error($con));


	  		 $notice_msg="WELCOME $fname. Your account has been created successfully and is now active. Thank you for choosing us";
			 $notice_message=mysqli_real_escape_string($con,$notice_msg);
			 $subject="Subject of notice";
			 //@send_usernotifictions($fname,$email,$phone,$message,$subject);
 			 ?>

			<script>
 				$(document).ready(function(){
 					$(".splashpages").hide();
				 		$(".overly,#loginbox").removeClass("fadeOutDown").addClass("fadeInUp").show();
				 		$("#loginuser").val("<?php echo $thisUser;?>");
			   	   		 $("#loginpass").val("");
 				});
 			</script>
			 <?php
	}else{
		echo "User with that email or phone does not exist";
	}
}

?>