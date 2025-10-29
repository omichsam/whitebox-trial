 <?php
 session_start();
 if($_SESSION["id"]){
 }else{
 
$session=$_POST['SESSION_id'];

if($session){
$_SESSION["loggedin"] = true;
$_SESSION["id"] = $session;
      }else{
          
      }  
      }                   
 ?>
