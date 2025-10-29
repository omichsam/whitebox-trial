<?php

//delete.php

if(isset($_POST["id"]))
{
include("../../../../connectpdo.php");
 $query = "
 DELETE from events WHERE id=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':id' => $_POST['id']
  )
 );
}

?>
