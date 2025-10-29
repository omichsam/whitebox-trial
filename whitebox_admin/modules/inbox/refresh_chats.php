<?php
/*menu page dont need to connect to db*/
include "../../connect.php";
include "../../plugins/php_functions/php_functions.php";
 @$sender=$_POST['receiver'];
 

$get_shop_id=mysql_query("SELECT * FROM messages_tbl WHERE  receiver='admin' AND sender='$sender' AND status='new'" ) or die(mysql_error());
while($get=mysql_fetch_assoc($get_shop_id)){
	$id=$get['message_id'];
	$sender_name=$get['sender_name'];
	$sender=$get['sender'];
 	$message=$get['message'];
	$timeago=get_timeago($get['date_sent']);
	$status=$get['status'];

 ?>
				<div class="inchat s80 chat">
					<div class="float_left s100 chathead">
						<div class="float_left chatname"> <?php echo $sender_name;?> </div>
						<div class="float_right timeago"> <?php echo $timeago;?></div>
					</div>
					<div class="s100 float_left">
						<div class="chatmessage s100 float_left"><?php echo $message;?></div>
			 		</div>
				</div>
 
	<?php
 
}
$update=mysql_query("UPDATE messages_tbl SET status='read' WHERE sender='$sender' AND receiver='admin'  ") or die(mysql_error());
	?>