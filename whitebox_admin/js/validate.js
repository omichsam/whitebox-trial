$(document).ready(function(){
		/* validate inputs as you enter them  some function available here are in liniacle.js*/

		$(".validate").keyup(function(ev){
			var role=$( this ).attr("role");
			var status=$( this ).attr("status");
			var thisVal=$.trim($(this).val());
			var err_lbl=$(this).parent().find("span");
			var btns=$( this ).attr("formbtnid");
			// activated when user inputs are valid.

          	if(!role){
          		return false;
			}else{
			      if(role=="validate_name"){
					if(check_special_chars(thisVal)){
						$( this ).addClass("err");
						err_lbl.text("remove special characters");
					    $( this ).attr("status","false");
					    return false;
					}else if(has_number(thisVal)){
						$( this ).addClass("err");
						err_lbl.text("remove numbers")
						$( this ).attr("status","false");
						return false;
					}else if(thisVal.length<3){
						$( this ).addClass("err");
						err_lbl.text("too short");
						$( this ).attr("status","false");
						return false;
					}else{
						$( this ).removeClass("err");
						err_lbl.text("nice name ").css({"color":"green"});
						$( this ).attr("status","true");
						
					}

				}else if(role=="validate_pass"){
					    var pass_1=$("#new_pass").val();
			    	    var pass_2=$("#new_confirm_pass").val();
					if(thisVal.length<5 ){
						$( this ).addClass("err");
						err_lbl.text("too short");
						$( this ).attr("status","false");
						return false;
					}else if(pass_1!=pass_2){
						$(".pass_inputs").addClass("err");
						$(".pass_err_lbls").text("not matching");
						return false;
					}else{
						$( this ).removeClass("err");
						$(".pass_inputs").removeClass("err");
						$(".pass_err_lbls").text("good").css({"color":"green"});;
						$( this ).attr("status","true");
						
		
					}
				}else if(role=="validate_email"){
					if(!validateEmail(thisVal)){
						$( this ).addClass("err");
						err_lbl.text("invalid");
						$( this ).attr("status","false");
						return false;
					}else if(thisVal.length<1){
						$( this ).addClass("err");
						err_lbl.text("too short")
						$( this ).attr("status","false");
						return false;
					}else{
						$( this ).removeClass("err");
						err_lbl.text("! wow ! correct ").css({"color":"green"});
						$( this ).attr("status","true");
						
					}
				}else if(role=="validate_idno"){
					if(check_special_chars(thisVal)){
						$( this ).addClass("err");
						err_lbl.text("remove special characters");
						$( this ).attr("status","false");
						return false;
					}else if(!has_number(thisVal)){
						$( this ).addClass("err");
						err_lbl.text("remove texts")
						$( this ).attr("status","false");
						return false;
					}else if(thisVal.length<7){
						$( this ).addClass("err");
						err_lbl.text("too short");
						$( this ).attr("status","false");
						return false;
					}else{
						$( this ).removeClass("err");
						err_lbl.text("")
						err_lbl.text("nice one").css({"color":"green"});
						$( this ).attr("status","true");
						
					}
				}else if(role=="validate_contact"){
					if(check_special_chars(thisVal)){
						$( this ).addClass("err");
						err_lbl.text("remove special characters");
						$( this ).attr("status","false");
						return false;
					}else if(!has_number(thisVal)){
						$( this ).addClass("err");
						err_lbl.text("remove texts")
						$( this ).attr("status","false");
						return false;
					}else if(thisVal.length<10){
						$( this ).addClass("err");
						err_lbl.text("too short");
						$( this ).attr("status","false");
						return false;
					}else if(thisVal.length>10){
						$( this ).addClass("err");
						err_lbl.text("too long");
						$( this ).attr("status","false");
						return false;
					}
					else{
						$( this ).removeClass("err");
						err_lbl.text("good ").css({"color":"green"});
						$( this ).attr("status","true");
						
					}
				/*can add more inputs values here*/
					
				}else if(role=="validate_empty"){
					
					if(thisVal.length<1)
					{
						$( this ).addClass("err");
						err_lbl.text("required ");
						$( this ).attr("status","false");
						return false;
					}else{
						$( this ).removeClass("err");
						err_lbl.text("")
		
						$( this ).attr("status","true");
											}

				} 
				 
		   }
		});
});