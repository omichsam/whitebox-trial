<?php
session_start(); 
$_SESSION = array();
 
// Destroy the session.
session_destroy();
echo base64_encode("success");
?>