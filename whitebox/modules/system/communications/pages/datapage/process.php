<?php

//process.php
$doc_id=$_POST['doc_id'];
$connect = new PDO("mysql:host=localhost; dbname=kippra", "root", "");

$query = "SELECT * FROM data_table WHERE doc_id='$doc_id'";

$statement = $connect->prepare($query);

$statement->execute();

echo $statement->rowCount();

?>