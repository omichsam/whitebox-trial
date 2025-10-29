

<?php
include "../../../../../connect.php";
$notification=$_POST['notificationid'];
include("../../../../functions/security.php");
 $update=mysqli_query($con,"UPDATE notifications SET Status='read' WHERE id='$notification'") or die(mysqli_error($con));

?>