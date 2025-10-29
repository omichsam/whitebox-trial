<?php
// Start session
session_start();

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'whitebox');

// Base URL
define('BASE_URL', 'http://localhost/whitebox/box/');

// Include helper functions
require 'functions/helpers.php';   //C:\xampp\htdocs\whitebox\box\functions

// Create database connection
require_once 'functions/database.php';
$con = connect_db();

// Check connection
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Auto-load classes
spl_autoload_register(function ($class_name) {
    include '../classes/' . $class_name . '.php';
});
?>