<script type="text/javascript" src="modules/inbox/messagesjs.js"></script>
<?php
/*menu page dont need to connect to db*/
include "../../connect.php";
include "../../plugins/php_functions/php_functions.php";
include "../../plugins/php_functions/general_functions.php";
$ME="admin";
?>
<div class="col-sm-12 col-xs-12 full no_padding" style="overflow:hidden;">
	<div class="col-sm-3 col-xs-12 no_padding" id="inboxthread">
		 <div class="threadmenu no_padding" id="threadmenu">
			 <div class="float_left s100 msgstatusbar no_padding">
			 	<div class="s70 float_left msgstatusbarbody">
			 		<strong style=" font-size:15px;">Distribite Notification !</strong>
			 		<p class="co-sm-12 col-xs-12 mobipdless">
			 			<span class="btn s100" onclick="open_sms_groupnotifier('1')"> <i class="fa fa-envelope-o"></i> SMS Group Notifier</span>
			 			<span class="btn s100" onclick="open_email_groupnotifier('1')"> <i class="fa fa-phone"></i> Email Group Notifier</span>
 			 		</p>
			 	</div>
			 	<div class="msgstatusbarhead float_right">
			 		<div class="btn contact_list_btn float_left s100 " onclick="open_contactlist('1')">	
			 			<i class="fa fa-users"></i>
			 			<div>Contact List</div>
			 		</div>
			 		<div class="btn contact_list_btn float_left s100 " onclick="open_emaillist('1')">	
			 			<i class="fa fa-envelope-o"></i>
			 			<div>Email List</div>
			 		</div>
			 	</div>	
			 </div>
		 </div>
		 <div class="threadslist mobipdless" id="threadslist">
 				<p style="text-align:center;"><img src="images/loading.gif"> Loading inbox</p>
		 </div>
	</div>

	<div class="col-sm-9 col-xs-12 no_padding" id="inboxbody">
  	
  	</div>
</div>	