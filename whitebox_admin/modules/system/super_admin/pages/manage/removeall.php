<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$user=base64_decode($_POST['user']);
$action=base64_decode($_POST['action']);
$get_user=mysqli_query($con,"SELECT * FROM administrators WHERE user_name='$user'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$host_id=(int)$get['Id'];
$delete=mysqli_query($con,"DELETE FROM notify_tray where action='$action' and Status='new' and host_id='$host_id'") or die(mysqli_error($con));

echo "success";



?>