<style type="text/css">
	#found_users_lbl,#distr_err_lbl{
		text-align: center;
font-weight: 100;
background: #ffffdc;
	color:green;
	}
	.recent{
		background: #fffbc9;
	}
	.sendind_progress{
		float: right;
position: absolute;
bottom: 3px;
right: 3px;

	}
</style>
<script type="text/javascript">
$(document).ready(function(){
	var scrw=$(window).width();
	if(scrw>768){
		//$("#email_group_notifier_wrap").parent().addClass('pc_custom');
	}else{}
   $("#distrbution_option").change(function(){
   		var loading='<img src="images/loading.gif">';
   		$("#found_users_lbl").html(loading);
   		var option=$(this).val();
   		$.post("modules/inbox/feltch_users.php",{
   			option:option,
   			type:'email'
   		},function(data){
   			$("#found_users_lbl").html(data);
   		})
   })
	 
});

function Distribute(type){
	var option=$.trim($("#distrbution_option").val());
	var subject=$.trim($("#distr_subject").val());
	var msg=$.trim($("#composesmsbox").val());
	var loading='<img src="images/loading.gif">';
	var title=subject;
	var timeago="few seconds ago";

	var receipients=$("#recipients_counts_lbl").text();
    var thread='<div class="col-sm-12 col-xs-12  mobipdless"><div class="col-sm-12 col-xs-12 distribution_wrap mobipdless recent"><div class="col-sm-12 col-xs-12 distribution_head no_padding"><div class="distr_heading">'+title+'</div><div class="distr_metas"><b>'+receipients+' receipients.</b> <span class="timeago float_right">'+timeago+'</span></div></div><div class="col-sm-12 col-xs-12 distribution_body no_padding">'+msg+'</div><span class="sendind_progress"></span></div></div>';

	if(option){
		if(subject){
			if(msg){
				$("#compose_wrap").append(thread);
				$("#compose_wrap").children().last().find('.sendind_progress').html(loading);
				scroll_botton_of('compose_wrap');
				$("#distr_err_lbl").show().html(loading);
				$.post("modules/inbox/send_distribution.php",{
					option:option,
					subject:subject,
					msg:msg,
					type:'email'
				},function(data){
						if($.trim(data)=="sent"){
					 		$("#compose_wrap").children().last().find(".sendind_progress").addClass('sent_success_err').html('<i title="sent" class="glyphicon glyphicon-ok"></i>');
					 	}else{
					 		$("#compose_wrap").children().last().find(".sendind_progress").addClass('not_sent_err').html('<i title="'+data+'" class="fa fa-warning"></i>');
					 	}
						$("#distr_err_lbl").show().html(data);
				});
			}else{
				$("#distr_err_lbl").show().text("Type message");
			}
		}else{
			$("#distr_err_lbl").show().text("Enter subject");
		}
	}else{
		$("#distr_err_lbl").show().text("Select Option");
	}
}

</script>
<div class="col-sm-12 col-xs-12 no_padding animated  slideInLeft custombg" id="email_group_notifier_wrap">
	<div class="s100 float_left full no_padding " id="chatsection">
		<div class="s100 float_left pagebox_head" id="pagebox_head">
			<i class="btn   fa fa-arrow-left close_chatbtn float_left"   onclick="close_page('email_group_notifier_wrap')"></i>
			 <div class="float_left col-sm-3 col-xs-8 no_padding">
				 <strong class="pageboxview_lbl float_left">EmailS group notifier</strong>				 
			 </div>
 		</div>

		<div class="s100 float_left pagebox_body no_padding full" id="pagebox_body" style="overflow:auto;">
			 <div class="col-sm-5 col-xs-12 full no_padding" style="border-right:1px solid #ccc;overflow:hidden;">
			 		<div class="float_left col-sm-12 col-xs-12 no_padding distr_header">
						 <strong class="pageboxview_lbl float_left">Compose New Distribution  <i class="fa fa-edit"></i></strong>				 
					</div>
					<div class="col-sm-12 col-xs-12 no_padding compose_wrap" style="">
						<div class="s100  mobipdless  inputwraps" style="padding-bottom: 0px;">
						<br> 
							Select User Groups  <i class="fa fa-users"></i>
							<select  class="splashinputs" id="distrbution_option" style="margin: 0px;">
								<option value="">..select..</option>
								<option value="ActiveUsers">Active Users</option>
								<option value="Inactive">Inactive Users</option>
								<option value="Borrowers">Borrowers</option>
								<option value="Lenders">Lenders</option>
								<option value="All">All Users</option>
							</select>
						</div>
						<div class="s100  mobipdless  inputwraps" id="found_users_lbl">

						</div>
						<div class="s100  mobipdless  inputwraps">
							 Message Subject <i class="fa fa-eye"></i>
							 <input type="text" class="splashinputs" id="distr_subject">
						</div>
						<div class="s100  mobipdless  inputwraps" style="margin:0px; padding-bottom:0px;">
							  Compose Your SMS <i class="fa fa-edit"></i>
							 <textarea class="splashinputs" id="composesmsbox" style="background:#fff;margin:0px; padding-bottom:0px;"></textarea>
						</div>
						<div class="s100  mobipdless  inputwraps not_shown" id="distr_err_lbl" style="color:red;">

						</div>
						<div class="s100  mobipdless  inputwraps">
							 <p class="calltoactionbtn  btn col-sm-12 col-xs-12" style="margin:0px;" onclick="Distribute('sms')"> Send Message </p>
						</div>
					</div>
			 </div>

			 <div class="col-sm-7 col-xs-12 full no_padding" style="">
			 		<div class="float_left col-sm-12 col-xs-12 no_padding distr_header">
						 <strong class="pageboxview_lbl float_left">Previously Sent <i class="fa fa-envelope-o"></i></strong>				 
					</div>
					<div class="col-sm-12 col-xs-12 no_padding compose_wrap" id="compose_wrap">
							<?php
								for ($i=1; $i < 6; $i++) { 
									?>
									<div class="col-sm-12 col-xs-12  mobipdless">
										<div class="col-sm-12 col-xs-12 distribution_wrap mobipdless">
											<div class="col-sm-12 col-xs-12 distribution_head no_padding">
												<div class="distr_heading">
													You will find intergarted with your template
												</div>
												<div class="distr_metas">
												    <b>30+ receipients.</b> <span class="timeago float_right">10 days ago</span>
												</div>
											</div>
											<div class="col-sm-12 col-xs-12 distribution_body no_padding">
												You will find intergarted with your template Font Awesome, an pictographic ..You will find intergarted with your template Font Awesome, an pictographic ..You will find intergarted with your template Font Awesome, an pictographic ..You will find intergarted with your template Font Awesome, an pictographic ..
											</div>
										</div>
									</div>
									<?php
								}
							 ?>
					</div>
			 </div>  
		</div>
	</div>
</div>
 