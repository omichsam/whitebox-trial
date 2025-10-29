<?php

//process.php
$doc_id=$_POST['doc_id'];
include "../../../../../connected.php";

$query = "SELECT * FROM data_table WHERE doc_id='$doc_id'";

$statement = $connect->prepare($query);

$statement->execute();

echo $statement->rowCount();

?>