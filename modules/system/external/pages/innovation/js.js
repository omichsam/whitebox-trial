	var innovation_Id='<?php echo $innovation_Id; ?>';
	var partners_involved=$("#partners_involved").val();
	if(partners_involved==""){
$("#partners_involved").css("border","2px solid red")
        $("#fouthr_displaye").html("Required")
	}else{

$("#partners_involved").css("border","1px solid #ccc")
        $("#fouthr_displaye").html("")
	if(partners_involved=="Yes"){
		var number_partners=$("#number_partners").val()
		if(number_partners==0){
        $("#number_partners").css("border","2px solid red")
        $("#fouthr_displaye").html("Select a value greater than 0")
		}else{
    $("#number_partners").css("border","1px solid #ccc")
        $("#fouthr_displaye").html("")

   
var user_names=1;
    for(user_names=1;user_names<=number_partners;user_names++){
    	var user_name="Member_"+user_names;
        var users=btoa(user_names);
        var members=btoa(number_partners)
    	var rolei="role_"+user_names;
    	var role=btoa($("#"+rolei).val());
    	var member_name="name_"+user_names;
    	var member_named=btoa($("#"+user_name).val());
    	//alert(member_name+" "+member_named)
    	if(member_named){
    		$("#Member_"+user_names).css("border","1px solid #ccc")
    		if(role){
    		 $("#role_"+user_names).css("border","1px solid #ccc")
    		
        $("#fouthr_displaye").html("")
    	$.post("modules/system/external/pages/innovation/add_members.php",{
    		members:members,
    		users:users,
    		member_name:member_named,
    		role:role,
    		innovation_Id:innovation_Id
    	},function(data){










          
    		})

//get other values
            var fund="";
            var commn="";
            var patner="";
            var implement="";

            var Communities="";
             if($("#implementers").prop("checked")){
               var  implementers="implementers";
               var implement=btoa(implementers)
             }else{

             }
             if($("#patnership").prop("checked")){
               var  patnership="patnership";
               var patner=btoa(patnership);
             }else{

             }
             if($("#funding").prop("checked")){
               var  funding="funding";
               var fund=btoa(funding);
             }else{

             }
             if($("#Others").prop("checked")){
             	var commn="Others";
               var  Others=$("#user_defined").val();
               if(Others){
               	$("#user_defined").css("border","1px solid #ccc")
               var commnd=btoa(Others);
           }else{
           	$("#user_defined").css("border","2px solid red")

            $("#fouthr_displaye").html("Required")
           }
             }else{

             }
             
	if(fund || commn || implement || patner){
      var user_defined="";
		 if($("#Others").prop("checked")){
               var  user_defined=$("#user_defined").val();
               if(user_defined){

























               	//alert()
               	$("#user_defined").css("border","1px solid #ccc")
              
      var protection=$("#protection").val()

				$("#protection").css("border","1px solid #ccc")
               if(protection==""){

              $("#fouthr_displaye").html("Required")
              $("#protection").css("border","2px solid red")
               }else{
               $("#protection").css("border","1px solid #ccc")

			if(protection=="Yes"){
				var property_file=$(".property_protection").val()
				if(property_file){
               
//check links

             var attach_document=$("#attach_file").val();

             var attachment_link=$("#link").val();
             if(attach_document || attachment_link){
             	//alert()
              $("#error_pagesd").html("")
              $("#link_datachments").css("border","0px solid black")

            $("#fouthr_displaye").html(loader);
            //alert()
    
//full action here

var formData = new FormData($("#file-upload")[0]);


	$.ajax({
		url : 'modules/system/external/pages/innovation/uploads.php',
		method : 'POST',
		data : formData,
		contentType : false,
		cache : false,
		processData : false,
		success : function (response){
			//console.log(response);
			if($.trim(response)=="success"){
            
var target="#home";
var my_id=$("#global_u_email").val();
  //var innovation=$(this).attr("id");
  //alert(innovation);
var url="modules/system/external/pages/innovation/innovations.php";
$.post(url,{my_id:my_id},function(data){$(target).html(data)});

 

			}else{

			}
		}
	})








             }else{
			  $("#error_pagesd").html("Attach a file or add a link or add both").css("color","red")
              $("#link_datachments").css("border","2px solid red")
             }










//end of links


			  $("#fouthr_displaye").html("")
              $(".property_protection").css("border","0px solid #ccc")
				}else{
			  $("#fouthr_displaye").html("Required")
              $(".property_protection").css("border","2px solid red")
				}

			}else{
              // $("#attachment_cover").hide()
			}
		    }






           }else{
           	$("#user_defined").css("border","2px solid red")

            $("#fouthr_displaye").html("Required")
           }
             }else{

             }

	$("#fouthr_displaye").html("")
	$("#alert_user").html("").css("color","black");
		
//sending data
commn=user_defined;
$.post("modules/system/external/pages/innovation/add_information.php",{
    		fund:fund,
      	commn:user_defined,
      	patner:patner,
      	implement:implement,
    		innovation_Id:innovation_Id
    	},function(data){










          
    		})










///

}else{
	$("#fouthr_displaye").html("Required")
	$("#alert_user").html("select atleast one option!").css("color","red");
}
//property protection

             
		    //end of property protection
     


///end







    }else{
   
        $("#role_"+user_names).css("border","2px solid red")
        $("#fouthr_displaye").html("Required")
    }
    	}else{

	if(role){
    		 $("#role_"+user_names).css("border","1px solid #ccc")
    		
        $("#fouthr_displaye").html("")
    	
    }else{
   
        $("#role_"+user_names).css("border","2px solid red")
        $("#fouthr_displaye").html("Required")
    }





        $("#Member_"+user_names).css("border","2px solid red")
        $("#fouthr_displaye").html("Required")
    	}

    }





		}

	}else{
alert()
	}
}