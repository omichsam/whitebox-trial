$(document).ready(function(){
	$(".poppageback_btn").click(function(){
		$(this).parent().parent().hide();
	});
})

function close_page(page){
  $("#"+page).parent().parent().hide();
}
/*function load bunner file*/


var loadbannerFile = function(event,load_to) {
      var output = document.getElementById(load_to);
       $("#"+load_to).css({"background-image":"url('"+URL.createObjectURL(event.target.files[0])+"')"});
    };
    /*end of bunner file */
/*function to display required sections on mobile and desktops*/
function device_responsive(mobilehide,mobileshow){
  	 var scrwW=$(window).width();
			if(scrwW>768){
				/*if desktop*/
			}else{
				/*if mobile*/
				$(''+mobilehide+'').hide();
				$(''+mobileshow+'').show();
			}

  }
  /*opens page overview to load content*/
function get_overview(layer){
	if(!layer){
		layer="1";
	}else{}

	var loader=$("#loader").html();
	$("#alertoverly"+layer).show();
	$("#alertcontainer").hide();
	$("#alertoverly"+layer).find('pagewrap').show().html(loader);;
	
 }	 

function gotosendmessage(sender,me,layer){
  	get_overview(layer);
	$.post("modules/inbox/getchats.php",{
		sender:sender,
		me:me
	},function(data){
		$("#alertoverly"+layer).find('pagewrap').html(data)
	})
}

function gotoviewprofile(userid,role,layer){

	var user=$("#user_id").val();
	get_overview(layer);
	$.post("modules/profileview/profileview.php",{
		userid:userid,
		role:role
	},function(data){
		$("#alertoverly"+layer).find('pagewrap').html(data)
	})
}

function openpages(page,layer){
	var user=$("#user_id").val();
	get_overview(layer);
	$.post("modules/pages/"+page+"/"+page+".php",{
		user:user
	},function(data){
		$("#alertoverly"+layer).find('pagewrap').html(data)
	})
}
// function openpages(page,layer){
//  	var user=$("#user_id").val();
//   	get_overview(layer)
//   	var url="modules/pages/"+page+"/"+page+".php";
// 	var params='&user='+user+'&em=';
// 	var return_to=$("#alertoverly"+layer).find('pagewrap');
// 	get_data(url,params,return_to);
// }
function borrow(userid,layer){
	var user=$("#user_id").val();
	get_overview(layer);

		if(userid){
		/*For member*/
			$.post("modules/borrow/borrow_from_member.php",{
				userid:userid
			},function(data){
				$("#alertoverly"+layer).find('pagewrap').html(data)
			})
		 }else{ 
		 	/*dor non members*/
		 	$.post("modules/borrow/borrow.php",{
		 		user:user
			},function(data){
				$("#alertoverly"+layer).find('pagewrap').html(data)
			})
		 }

	
	
}

function lend(userid,layer){
	var user=$("#user_id").val();
	get_overview(layer);
	if(userid){
		/*For member*/
		$.post("modules/lend/lend_to_member.php",{
			user:user
		},function(data){
			$("#alertoverly"+layer).find('pagewrap').html(data)
		})
	 }else{ 
	 	/*For someone not yet joned*/
	 	$.post("modules/lend/lend.php",{
	 		user:user
		},function(data){
			$("#alertoverly"+layer).find('pagewrap').html(data)
		})
	 }	
}

function lend_from_request(borrower_id,lender_id,amount,interest,layer){
	/*For member*/
	var user=$("#user_id").val();
	get_overview(layer);
		$.post("modules/lend/lend_to_request.php",{
			borrower_id:borrower_id,
			lender_id:lender_id,
			amount:amount,
			interest:interest,
			user:user
		},function(data){
			$("#alertoverly"+layer).find('pagewrap').html(data)
		})
}

/*deposit or widraw btn clicks*/
function mpesa_actions(action,layer){
	var user=$("#user_id").val();
	get_overview(layer);
		$.post("modules/"+action+"/"+action+".php",{
			 
		},function(data){
			$("#alertoverly"+layer).find('pagewrap').html(data)
		})
}

function show_alert(title,url,params){
		var loader=$("#loader").html();
		$("#alertcontainer").hide();
		$("#alertoverly,#alertcontainer").fadeIn();
		$("#alertoverly"+layer).find('pagewrap').hide();
		$("#alert_title").text(title);
		$("#alert_body").html(loader);
		data=JSON.stringify(params );
 		$.ajax({
			type:'GET',
			data:data,
			cache:false,
			url:url,
		 success:function(data){
			$("#alert_body").html(data);
		}
		})
		 
}
/*Open Invite Page*/
function open_invite(layer){
	var user=$("#user_id").val();
	get_overview(layer);
		$.post("modules/invite/inviteform.php",{
			 user:user
		},function(data){
			$("#alertoverly"+layer).find('pagewrap').html(data)
		})
}
/*send sms*/
function send_sms(sender,subject,receiver,message,layer){
	$.post("modules/sms/sms.php",{
		sender:sender,
		subject:subject,
		receiver:receiver,
		message:message,
	},function(data){
		alert(data)
	})
}
/*Process Debt Cancellation*/
function process_debt_cancellation(borrower_id,myid,amount,debt_id){
  var loader=$("#loader").html();
   $("#alert_title").text("Processing Cancellation");
   $("#alert_body").html(loader);
   $.post("modules/home/process_debt_cancellation.php",{
		borrower_id:borrower_id,
		myid:myid,
		amount:amount,
		debt_id:debt_id
	},function(data){
		 $("#alert_body").html(data);
	})
}
/*open payment page */
function open_payment(lender_id,lender_name,layer){
	var title="Paying your loan";
	var url="modules/home/payment_page.php";
	var myid="1001";
	var params='&myid='+myid+'&lender_id='+lender_id+'&lender_name='+lender_name+'&em=';
	show_alert(title,url,params)
 	 
}
/*process payments*/
function process_payment(lender_id,myid){
		var amount=$("#amount_topay").val();
		var loader=$("#loader").html();
		var password=$("#payloanconfirmpass").val();

		$("#alert_body").html(loader);
		$.post("modules/home/processpayment.php",{
			lender_id:lender_id,
			myid:myid,
			amount:amount,
			password:password
		},function(data){
			$("#alert_body").html(data);
		})
	}


function send_message(receiver,load_to){
	 var sender='admin';
	 var message=$("#message_input").val();
	 var sender_name=$("#user_name").val();
	 var thread='<div class="outchat s80 chat"><div class="float_left s100 chathead"><div class="float_left chatname">'+sender_name+'</div><div class="float_right timeago">seconds ago  </div></div><div class="s100 float_left"><div class="chatmessage s100 float_left">'+message+'</div><div class="s10  sendstatuslbl"><img src="images/loader1.gif" class="msgloading"></div></div></div>';
	 $("#"+load_to).children().last().find(".sendstatuslbl").html("");
	 $("#"+load_to).append(thread);
	 $("#message_input").val("");
	 $.post("modules/inbox/send_message.php",{
	 	sender:sender,
	 	receiver:receiver,
	 	sender_name:sender_name,
	 	message:message
	 },function(data){
	 	dataVal=$.trim(data);
	 	if($.trim(dataVal)=="sent"){
	 		$("#"+load_to).children().last().find(".sendstatuslbl").addClass('sent_success_err').html('<i title="sent" class="glyphicon glyphicon-ok"></i>');
	 	}else{
	 		$("#"+load_to).children().last().find(".sendstatuslbl").addClass('not_sent_err').html('<i title="'+dataVal+'" class="fa fa-warning"></i>');
	 	}
	 });
}