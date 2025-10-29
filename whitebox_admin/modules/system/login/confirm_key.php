<?php 
  include("../../connect.php");
  include("../../plugins/php_functions/general_functions.php");
@$thisKey=$_GET['confirmation_id'];
@$thisUser=$_GET['username'];

$checkExist=mysqli_query($con," SELECT user_id FROM  admin_tbl WHERE email='$thisUser' OR  phone='$thisUser' ") or die(mysqli_error());
	  if(mysqli_num_rows($checkExist)==0){
	  		echo "email not registered yet";
	  }else{
	  		$get=mysql_fetch_assoc($checkExist);
 	  		 $user_id=$get['user_id'];
	  		 $activate=mysqli_query($con,"UPDATE admin_tbl SET account_status='active' WHERE email='$thisEmail' ") or die(mysqli_error());
 			//add notice here
 		 ?>

			<script>
			 $(document).ready(function(){
			 	$(".back_to_login_btn").click();
			 	$("#user_email").val('<?php echo $thisEmail;?>');
			 	$("#user_pass").val('<?php echo $password;?>');
			 	$("#myloginbtn").click();
			 });
			 </script>
<?php
}
?>			 