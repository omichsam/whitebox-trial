$(document).ready(function(){
		var loader=$("#loader").html();
		var scrw=$(window).width();
		$(".thread_card").click(function(){
			if(scrw>768)
			{
 			$("#inboxbody").html(loader);
			$.post("modules/inbox/getchats.php",{

			},function(data){
				$("#inboxbody").html(data);
			});
		}else{
			gotosendmessage('sender','receiver','1')
		}

		})
		 
	});

function open_sms_groupnotifier(layer){
	get_overview(layer);
	$.post("modules/inbox/sms_groupnotifier.php",{

	},function(data){
		$("#alertoverly"+layer).find('pagewrap').show().html(data)
	})
}
function open_email_groupnotifier(layer){
	get_overview(layer);
	$.post("modules/inbox/email_groupnotifier.php",{

	},function(data){
		$("#alertoverly"+layer).find('pagewrap').show().html(data)
	})
}
function open_contactlist(layer){
get_overview(layer);
	$.post("modules/inbox/contactlist.php",{

	},function(data){
		$("#alertoverly"+layer).find('pagewrap').show().html(data)
	})
}
function open_emaillist(layer){
	get_overview(layer);
	$.post("modules/inbox/emaillist.php",{

	},function(data){
		$("#alertoverly"+layer).find('pagewrap').show().html(data)
	})
}


function open_thread(sender,Me,layer){
		var loader=$("#loader").html();
		var scrw=$(window).width();
		if(scrw>768)
			{
 			$("#inboxbody").html(loader);
			$.post("modules/inbox/getchats.php",{
				sender:sender,
				Me:Me
			},function(data){
				$("#inboxbody").html(data);
				scroll_botton_of('chatboxbody');
			});
		}else{
			gotosendmessage(sender,Me,layer);
		}
}	

var IboxInterval=setInterval(function(){
	refresh_chats();
	refresh_inbox_thread();
	check_typig();
 },3000);
 

function refresh_chats(){
	var user=$("#user_id").val();
	var receiver=$("#chat_reciver").val();
 	$.post("modules/inbox/refresh_chats.php",{
		sender:user,
		receiver:receiver
	},function(data){
 		if($.trim(data)==""){

		}else{
			$("#chat_lists_wrap").append(data);
			scroll_botton_of('chatboxbody');
		}
	});
}
function refresh_inbox_thread(){
		var user=$("#user_id").val();
 		$.post("modules/inbox/refresh_inbox_thread.php",{
			user:user
		},function(data){
				$("#threadslist").html(data);
 		});

}

function updatetyping(){
	var receiver=$("#typingstatus_lbl").attr("sender")
	var me='admin';
 	$.post("modules/inbox/typing_status.php",{
      receiver:receiver,
      me:me
	},function(data){

	});
 
}

function check_typig(){
	var me='admin';
	var user_typing=$("#typingstatus_lbl").attr("sender")
	$.post("modules/inbox/check_typig.php",{
      user_typing:user_typing,
      me:me
	},function(data){
      	
		if($.trim(data)=="true"){
			$("#typingstatus_lbl").text("..typing....");
		}else{
			$("#typingstatus_lbl").text("");
		}
	});
}

function clear_typing(){
	var receiver='$("#user_id").val()';
	var sender=$("#typingstatus_lbl").attr("sender")
	$.post("modules/inbox/clear_typing.php",{
      user_typing:sender,
      me:receiver
	},function(data){
 	});
}