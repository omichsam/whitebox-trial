<?php
include "../../connect.php";
$loginuser=mysqli_real_escape_string($con,$_POST['loginuser']);
$session_id=mysqli_real_escape_string($con,$_POST['session_id']);

$getuser=mysqli_query($con,"SELECT * FROM admin_tbl WHERE email='$loginuser' OR phone='loginuser' ") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($getuser);
$user_name=isset($get['fname']);
$email=isset($get['email']);
$phone=isset($get['phone']);
$user_id=isset($get['user_id']);

$updateanalystics=mysqli_query($con,"UPDATE analytics SET userid='$user_id' WHERE session_id='$session_id' AND userid<>'$user_id' ") or die(mysqli_error($con));
?>
<script type="text/javascript">
	$(document).ready(function(){
		  $("#user_id").val("<?php  echo $user_id;?>");
		  $("#user_email").val("<?php  echo $email;?>");
		  $("#user_name").val("<?php  echo $user_name;?>");
		  $("#user_phone").val("<?php  echo $phone;?>");

		  setCookie('user_id',"<?php echo $user_id;?>",90);
		  setCookie('user_email',"<?php echo $email;?>",90);
		  setCookie('user_name',"<?php echo $user_name;?>",90);
		  setCookie('user_phone',"<?php echo $phone;?>",90);
		  setCookie('status',"loggedin",90);

	})
</script>



