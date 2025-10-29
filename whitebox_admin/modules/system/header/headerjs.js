/*Navigating menu*/
var noticeIntervals=setInterval(function(){
	refresh_notice_lbls();
},4000);

function refresh_notice_lbls(){
	/*refresh messages counts*/
	  var user=$("#user_email").val();
	  $.post("modules/inbox/refresh_inbox_counts.php",{
	  		user:user
	  },function(data){
	  	if($.trim(data)==0){
	  	 $(".msg_count_lbl").text('');
	  	}else{
	  		//$(".msg_count_lbl").text($.trim(data));
	  	}
	  })
	/*refresh notice counts*/
	/*refresh analytics counts*/
}

function search(value){
		$.get("modules/search/search.php",{
			value:value
		},function(data){
		 $("#popuplevel1").find(".popbody").html(data);
		})
	
}
$(document).ready(function(){
	var loader=$("#loader").html();
	var user=$("#user_id").val();
	/*Menu itecm click events*/
	$("#header_top ul li").click(function(){
		var role=$(this).attr('role');
		var thisele=$(this);
		var title=thisele.attr("title");
		/*close menu if opened*/
		$("#closemenu_btn").click();
		/*On clicking menu icon*/
		$("#header_top ul li").removeClass("whiteactive_btn");
		$(this).addClass("whiteactive_btn");
		if(!role){

		}else{
			if(role=="menuview"){
				$("#menu_page").show().removeClass("slideOutLeft").addClass("animated slideInLeft");
			}else if(role=="search"){
					var searchbox='<input type="text" class="search_input" onkeyup="search(this.value)"><span class="fa fa-search search_icon"></span>';
					$("#popuplevel1").show().find(".popupheadcontent").html(searchbox);
					var loadto=$("#popuplevel1").find(".popbody").html("");

			}else{
				$("#popuplevel1").show().find(".popupheadcontent").html(title);
				var loadto=$("#popuplevel1").find(".popbody");
				loadto.html(loader);
				$.post("modules/"+role+"/"+role+".php",{
					user:user
				},function(data){
					loadto.html(data)
	 			})


			}
		}
	})
	$("#closemenu_btn").click(function(){
		$("#menu_page").removeClass("slideInLeft").addClass("slideOutLeft");
	})

	/*Header bottom page nav*/
	$("#header_bottom ul li").click(function(){
		$("#header_bottom ul li").removeClass("active_btn");
		$(this).addClass("active_btn");
		var loader=$("#loader").html();
		var role=$(this).attr("role");
		if(!role){

		}else{
			/*close menu if opened*/
			$("#closemenu_btn").click();
			/**/
	 		$(".pages").hide();
			$("#"+role).show().html(loader);

			$.post("modules/"+role+"/"+role+".php",{
				user:user
			},function(data){
				$("#"+role).html(data);
			})
		}
	})
})