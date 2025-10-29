<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";





    $date = time();
	$new_time=encrypt($date, $key);
//$salt="A0007799Wagtreeyty";
//decision:decision,innovation:innovation
//$field=base64_decode($_POST['field']);
/*$user=base64_decode($_POST['user']);
$get_user=mysql_query("SELECT Id FROM administrators WHERE user_name='$user'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
$user_id=$get['Id'];*/
$innovation=base64_decode($_POST['innovation']);

//$my_innovation=encrypt($innovation, $key);
if($innovation){
    $sqlx="SELECT user_id FROM innovations_table where Innovation_Id='$innovation'";

    $query_runx=mysql_query($sqlx) or die($query_runx."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runx)){
    $user_id=$row['user_id'];
      
    }
   $get_user=mysql_query("SELECT Email_address,Last_name,First_name FROM external_users WHERE  User_id='$user_id'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
  $newFirst_name=base64_decode(decrypt($get['First_name'],$key));
$newLast_name=base64_decode(decrypt($get['Last_name'],$key)); 
$Email_address=base64_decode(decrypt($get['Email_address'],$key));
   
  $message="Dear, ".$newFirst_name." ".$newLast_name.", Your Innovation to The National Museum Of Kenya has successfully gone through the first evaluation proccess, kindly log into your portal account for more information, thank you";
	
}else{



}

?>
<script type="text/javascript">
$(document).ready(function(){
var my_id=btoa('<?php echo $Email_address?>');
 var subject=btoa("Innovation Evaluation Notification");
  var message=btoa('<?php echo $message?>');
$.post("modules/mails/sender.php",{my_id:my_id,message:message,subject:subject});

    

})
</script>

