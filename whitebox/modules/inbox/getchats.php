<style type="text/css">
	.pc_custom{
		max-width:900px;
 		right: 0px !important;
		height: 100%;
	}

</style>
<script type="text/javascript">
$(document).ready(function(){
	var scrw=$(window).width();
	scroll_botton_of('chatboxbody');
	if(scrw>768){
		//$("#chatinboxbody").parent().parent().addClass('pc_custom');
	}else{}

 

	$('#message_input').keydown(function (e){
	    if(e.keyCode == 13){
	    	 $("#sendmessage_btn").click();
	    	 clear_typing();
	    	 scroll_botton_of('chatboxbody');
	    }else{

	    }
	});
	 


});


</script>

<?php
/*menu page dont need to connect to db*/
include "../../connect.php";
include "../../plugins/php_functions/php_functions.php";
@$SentBy=$_POST['sender'];
$get_user=mysql_query("SELECT first_name,last_name,email,phone,user_id,prof_dir,prof_name FROM users WHERE user_id='$SentBy' OR phone='$SentBy' OR email='$SentBy' ") or die(mysql_error());

$get=mysql_fetch_assoc($get_user);
$user_id=$get['user_id'];
$first_name=$get['first_name'];
$last_name=$get['last_name'];
$prof_dir=$get['prof_dir'];
$prof_name=$get['prof_name'];
$prof="";
if($prof_name==""){
	$prof="images/default_user.jpg";
}else{
	$prof="$prof_dir/$prof_name";
}	
?>
<div class="col-sm-12 col-xs-12 no_padding animated  slideInLeft inboxbody" id="chatinboxbody">
	<div class="s100 float_left full " id="chatsection">
		<div class="s100 float_left chatboxhead" id="chatboxhead">
			<i class="btn   fa fa-arrow-left close_chatbtn float_left" onclick="close_page('chatinboxbody')"></i>
			 <div class="float_left col-sm-3 col-xs-8 no_padding">
				 <strong class="usernamelbl float_left"><?php echo "$first_name"; ?></strong>
				 	<br><b class="typingstatus_lbl float_left green" id="typingstatus_lbl"  sender="<?php echo $SentBy;?>">  </b>
				 
			 </div>
			<div class="float_right bgimage  threadhead chatboxheadpic" style="background-image:url('<?php echo $prof; ?>');"></div>
		</div>
		<div class="s100 float_left chatboxbody" id="chatboxbody">
			<div class="col-sm-12 col-xs-12" id="chat_lists_wrap">
<?php

$getMsgs=mysql_query("SELECT * FROM messages_tbl WHERE sender='$SentBy' AND receiver='admin' OR  receiver='$SentBy' AND sender='admin' " ) or die(mysql_error());
while($get=mysql_fetch_assoc($getMsgs)){
	$id=$get['message_id'];
	$sender_name=$get['sender_name'];
	$sender=$get['sender'];
	$receiver=$get['receiver'];
	$message=$get['message'];
	$timeago=get_timeago($get['date_sent']);
	$status=$get['status'];

if($sender!="admin"){
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
}else{
?>
				<div class="outchat s80 chat">
					<div class="float_left s100 chathead">
						<div class="float_left chatname"><?php echo $sender_name;?></div>
						<div class="float_right timeago"> <?php echo $timeago;?> </div>
					</div>
					<div class="s100 float_left">
						<div class="chatmessage s100 float_left"><?php echo $message;?></div>
						<div class="s10  sendstatuslbl">
 						</div>
					</div>
				</div>
				<?php
				} 
			}
				?>
			</div>
		</div>
		<div class="s100 float_left chatboxfoot" id="chatboxfoot">
			<input type="hidden" id="chat_reciver" value="<?php echo $SentBy;?>">
			<input type="text"   class="messageinput s80" placeholder="type message here" id="message_input" onkeydown="updatetyping('<?php echo $SentBy;?>')" onkeyup="clear_typing()">
			<div class="btn sendbtn s20" onclick="send_message('<?php echo $SentBy;?>','chat_lists_wrap')" id="sendmessage_btn">
					<i class="fa fa-location-arrow"></i>
			</div>
		</div>
	</div>
</div>