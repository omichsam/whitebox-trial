<?php
$host = "localhost";
$username = "root";
$password = "";
$db_name = "whitebox";

// Create connection
$con = new mysqli($host, $username, $password, $db_name);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Set charset to utf8
$con->set_charset("utf8");

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>