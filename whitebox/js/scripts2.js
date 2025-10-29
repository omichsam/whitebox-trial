$(document).ready(function(){
	$(".poppageback_btn").click(function(){
		$(this).parent().parent().hide();
	});
})

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
function get_overview(){
	var loader=$("#loader").html();
	$("#alertoverly,#overlaycontainer").show();
	$("#alertcontainer").hide();
	$("#overlaycontainer").html(loader);
}	 

function gotosendmessage(sender,receiver){
	get_overview();
	$.post("modules/inbox/getchats.php",{

	},function(data){
		$("#overlaycontainer").html(data)
	})
}

function gotoviewprofile(userid){
	get_overview();
	$.post("modules/profileview/profileview.php",{

	},function(data){
		$("#overlaycontainer").html(data)
	})
}

function openpages(page){
	get_overview();
	$.post("modules/pages/"+page+"/"+page+".php",{

	},function(data){
		$("#overlaycontainer").html(data)
	})
}
function borrow(userid){
	get_overview();

		if(userid){
		/*For member*/
			$.post("modules/borrow/borrow_from_member.php",{
				userid:userid
			},function(data){
				$("#overlaycontainer").html(data)
			})
		 }else{ 
		 	/*dor non members*/
		 	$.post("modules/borrow/borrow.php",{

			},function(data){
				$("#overlaycontainer").html(data)
			})
		 }

	
	
}

function lend(userid){
	get_overview();
	if(userid){
		/*For member*/
		$.post("modules/lend/lend_to_member.php",{
			userid:userid
		},function(data){
			$("#overlaycontainer").html(data)
		})
	 }else{ 
	 	/*For someone not yet joned*/
	 	$.post("modules/lend/lend.php",{

		},function(data){
			$("#overlaycontainer").html(data)
		})
	 }	
}

function lend_from_request(borrower_id,lender_id,amount,interest){
	/*For member*/
	get_overview();
		$.post("modules/lend/lend_to_request.php",{
			borrower_id:borrower_id,
			lender_id:lender_id,
			amount:amount,
			interest:interest
		},function(data){
			$("#overlaycontainer").html(data)
		})
}

/*deposit or widraw btn clicks*/
function mpesa_actions(action){
	get_overview();
		$.post("modules/"+action+"/"+action+".php",{
			 
		},function(data){
			$("#overlaycontainer").html(data)
		})
}

function show_alert(title,url,params){
		var loader=$("#loader").html();
		$("#alertcontainer").hide();
		$("#alertoverly,#alertcontainer").fadeIn();
		$("#overlaycontainer").hide();
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
function open_invite(){
	get_overview();
		$.post("modules/invite/inviteform.php",{
			 
		},function(data){
			$("#overlaycontainer").html(data)
		})
}
/*send sms*/
function send_sms(sender,subject,receiver,message){
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
function open_payment(lender_id,lender_name){
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