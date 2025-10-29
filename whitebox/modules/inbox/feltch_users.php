<?php
include "../../connect.php";
include "../../plugins/php_functions/general_functions.php";

$option=$_POST['option'];
$type=$_POST['type'];
$str=get_contact_list($option,$type);
$array=explode(",",$str);
$num=count($array);
echo "<b id='recipients_counts_lbl'>$num</b> Receipients <i class='fa fa-eye' title='$str'> view </i>";
?>