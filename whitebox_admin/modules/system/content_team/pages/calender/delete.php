<?php

//delete.php

if(isset($_POST["id"]))
{
include "../../../../../connected.php";
 $query = "
 DELETE from calendar_events WHERE id=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':id' => $_POST['id']
  )
 );
}

?>
