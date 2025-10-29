
<?php

include("../../connect.php");
include("../functions/security.php");

$name=base64_decode($_POST['name']);
$mails=base64_decode($_POST['email']);
$subject="Virtual responce team";
$message="Dear ".$name.", Your email is well recieved, Our team is working on it and will turn up to you soon, thank you";


include("general.php");
echo "Success";



?>
