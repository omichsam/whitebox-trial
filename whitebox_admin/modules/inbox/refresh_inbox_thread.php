<?php
include "../../connect.php";
include "../../plugins/php_functions/php_functions.php";
include "../../plugins/php_functions/general_functions.php";
$ME="admin";

$getMesg=mysql_query("SELECT * FROM messages_tbl WHERE    receiver='$ME' GROUP BY sender ORDER BY message_id  DESC" ) or die(mysql_error());
$num_count=mysql_num_rows($getMesg);

if($num_count==0){
	echo "<span class='not_found_lbl'> <i class='fa fa-comments-o'></i> No messages </span>";
}else{
while($get=mysql_fetch_assoc($getMesg)){
	$id=$get['message_id'];
	$sender_name=$get['sender_name'];
	$sender=$get['sender'];
 			$getLastMsg=mysql_query("SELECT * FROM messages_tbl WHERE receiver='$ME' AND sender='$sender'  ORDER BY message_id  DESC ") or die(mysql_error());
			$row=mysql_fetch_assoc($getLastMsg);
			$message=$row['message'];
			$timeago=get_timeago($row['date_sent']);
			$status=$row['status'];
			$user_prof=get_user_prof($sender);
			$getUnreads=mysql_query("SELECT * FROM messages_tbl WHERE receiver='$ME' AND sender='$sender'  AND status='new' ORDER BY message_id  DESC ") or die(mysql_error());
			$unread_counts=mysql_num_rows($getUnreads);
			$counts="";
			if($unread_counts==0){
				$counts='';
			}else{
				$counts='<span class="msgcounter">'.$unread_counts.'</span>';
			}

	if($status=="new"){
		$threadstatus="newmsg";
	}else{
		$threadstatus="readmsg";
	}
 ?>		 <div class="thread_card <?php echo $threadstatus;?>" pimg="<?php echo "../$user_prof";?>" onclick="open_thread('<?php echo "$sender";?>','<?php echo $ME;?>','1')"> 
		 	   <div class="s10 threadhead bgimage float_left" style="background-image:url('<?php echo "../$user_prof";?>')">

		 	   </div>
		 	   <div class="s80 threadbody float_left">
		 	   	 <div class="threadtitles">
			 	   	 <strong class="usernamelbl float_left"><?php echo $sender_name;?></strong>
			 	   	 <b class="timeago float_right"><?php echo $timeago;?></b>
		 	   	 </div>
		 	   	 <div class="threadmesage">
		 	   	   <?php echo $message;?>
		 	   	 </div>
		 	   	 <?php echo "$counts";?>
		 	   </div>

		 	  </div>
		 	<?php
		 }
		 } ?>