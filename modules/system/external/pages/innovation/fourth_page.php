<style type="text/css">
	#header_innovations{
		text-align: center;
		border-bottom: 1px solid #ccc;
		font-weight: bolder;
		text-transform: uppercase;
	}
	#innovation_wrapper{
		min-height: 200px;
		border-radius: 5px;
		box-shadow: 0 0 1px #ccc; 
	}
	#infor_submiter{
		min-height: 100px;
	}
	#submit_innovation_holder{
		text-align: center;
		margin-top: 10px;
	}
	.textarea_p{
		border: 1px solid #ccc;
		resize: none;
		min-height: 100px;
	}
	#error_displaye{
		text-align: center;
	}
	.level_grows{
		min-height: 30px;
		border:2px solid #ccc;
		margin-top: 10px;
		border-radius: 50px;
	}
	.arro_grows{
		min-height: 30px;
		border-bottom: 5px solid #ccc;
	}
	.attachments{
		min-height: 100px;
box-shadow: 8px 5px 9px #000;
border-radius: 5px;
background-size: contain;
background-image: url('images/icons/attach.jpg');
background-repeat: no-repeat;
background-position: center;
border: 1px solid #ccc;
cursor: pointer;
	}
	#fouthr_displaye{
		text-align: center;
	}
</style>
<?php

$innovation_Id=$_POST['Innovation_Id'];
//$innovation_Id="224";
?>

<div class="col-sm-12 col-xs-12 " id="displayer">
<div class="col-sm-12 col-xs-12 no_padding">
	<div class="col-sm-4 col-xs-12"></div>
	<div class="col-sm-4 col-xs-12" id="header_innovations"><span class="">ADD MORE DETAILS <?php //echo $innovation_name ?></span></div>

</div>
<div class="col-sm-12 col-xs-12 no_padding" id="level_submition">
	<div class="col-xs-1 col-sm-3"></div>
	<div class="col-xs-11 col-sm-6">
	<div class="col-sm-1 col-xs-1 level_grows theme_bg">1</div>
	<div class="col-sm-2 col-xs-2 arro_grows"></div>
    <div class="col-sm-1 col-xs-1 level_grows theme_bg">2</div>
    <div class="col-sm-2 col-xs-2 arro_grows"></div>
    <div class="col-sm-1 col-xs-1 level_grows theme_bg">3</div>
    <div class="col-sm-2 col-xs-2 arro_grows"></div>
    <div class="col-sm-1 col-xs-1 level_grows theme_bg">4</div>
</div>
</div>
<div class="col-xs-12 col-sm-3"></div>
	<div class="col-xs-12 col-sm-6 no_padding">

<div class="col-sm-12 col-xs-12 no_padding" id="innovation_wrapper">

	<form method="post" action="" enctype="multipart/form-data"
                id="file-upload">	
	<div class="col-sm-12 col-xs-12">
		Have you worked with any partners (individuals or institutions) on this innovation/project before?
		<select id="partners_involved" class="splashinputs">
			<option></option>
			<option>Yes</option>
			<option>No</option>
		</select>
	</div>
<div class="col-sm-12 col-xs-12 not_shown" id="partners_number" >
		How many are they?
		<select id="number_partners" class="splashinputs">
			<?php for($i=0;$i<=5;$i++){
				?>
			<option><?php echo $i?></option>
			<?php
		}
			?>
		</select>
	</div>
<div class="col-sm-12 col-xs-12 not_shown" id="partnership_holders" >
	
</div>
<div class="col-sm-12 col-xs-12">
		<div class="col-sm-12 col-xs-12 no_padding">
		What are you looking for as an innovator? select all that apply.<div id="alert_user"></div>
	</div>
		<div class="col-sm-1 mobile_hidden"></div>
		<div class="col-sm-10 col-xs-12 no_padding">
		<div class="col-sm-12 col-xs-12">

			<label style="font-weight: initial !important" class="submit_radiosd">
           Partnership with implementers
        <input type="checkbox"  id="implementers"  class="innovations_radio" role="implementers">
          <span class="checkmarkd"></span>
		   </label>
		</div>
	    <div class="col-sm-12 col-xs-12">


       <label style="font-weight: initial !important" class="submit_radiosd">
           Partnership with other innovators
        <input type="checkbox"  id="patnership"  class="innovations_radio" role="patnership">
          <span class="checkmarkd"></span>
		   </label>
	    </div>
		<div class="col-sm-12 col-xs-12">

      <label style="font-weight: initial !important" class="submit_radiosd">
           Funding
        <input type="checkbox"  id="funding"  class="innovations_radio" role="funding">
          <span class="checkmarkd"></span>
		   </label>

	   </div>
	   <div class="col-sm-12 col-xs-12">

	   	<label style="font-weight: initial !important" class="submit_radiosd">
	   		Other
        <input type="checkbox"  id="Others"  class="innovations_radio" role="Communities">
          <span class="checkmarkd"></span>
		   </label>
       </div>
       <div class="col-sm-12 col-xs-12 not_shown" id="user_check">
       	Specify here
       	<input type="text" id="user_defined" class="splashinputs">
       </div>
	   </div>
	 </div>
<div class="col-sm-12 col-xs-12">
		Does your idea/innovation have intellectual property protection? Yes/No
		<select id="protection" class="splashinputs">
			<option></option>
			<option>Yes</option>
			<option>No</option>
		</select>
	</div>
<div class="col-sm-12 col-xs-12 not_shown" id="attachment_cover">
		A an intellectual property protection document.
	<!--<form method="post" action="" enctype="multipart/form-data"
                id="file-upload">-->		
		<input type="file" name="doc" id="file" class="property_protection">
	<!--</form>-->
</div>
	<!--<form method="post" action="" enctype="multipart/form-data">-->
		Please include any link and/or attachment of any supporting material or document. <span id="error_pagesd"></span>
		<div class="col-sm-12 no_padding col-xs-12" id="link_datachments">
			<div class=" col-sm-6 col-xs-12">
				Attach a file:
				<input type="file" id="attach_file" name="file" class="attach_document" >
			</div>
			<div class="col-sm-6 col-xs-12"> Or give a link:
            <input type="text" class="splashinputs"id="link" class="attachment_link" name="link">
			</div>
		</div>
	

<input type="text" name="innovation_Id" value="<?php echo $innovation_Id; ?>" hidden="">
</form>
	</div>
	<div class="col-sm-12 col-xs-12" id="submit_innovation_holder">
		<span class="btn theme_bg" id="previous_third">Previous</span>
		<span class="btn theme_bg" id="submit_now">Submit</span>
	</div>
	<div class="col-sm-12 col-xs-12" id="fouthr_displaye"></div>
	<div class="col-sm-12 col-xs-12" id="infor_submiter">
		
	</div>
	
</div>

</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	var loader=$("#loader").html();
	$("#Others").change(function(){
if($("#Others").prop("checked")){
$("#user_check").show()
}else{
$("#user_check").hide()
}
	})
	var loader=$("#loader").html()
$("#previous_third").click(function(){
	$(".innovation_pages").hide()
	 $("#third_page").show();
});
$("#protection").change(function(){
			var protection=$(this).val()

				$(this).css("border","1px solid #ccc")
               if(protection==""){

              $("#fouthr_displaye").html("Required")
              $(this).css("border","2px solid red")
               }else{
               $(this).css("border","1px solid #ccc")

			if(protection=="Yes"){
				$("#attachment_cover").show()

			}else{
               $("#attachment_cover").hide()
			}
		}
		});
$("#partners_involved").change(function(){

				$(this).css("border","1px solid #ccc")
			var partners_involved=$(this).val()
			//$("#partnership_holders").html("").hide();
			if(partners_involved=="Yes"){

				$("#partners_number").show()


			}else{
				$("#partnership_holders").html("").hide()
               $("#partners_number").hide()
			}
		});
$("#number_partners").change(function(){
			var number_partners=$(this).val()
			if(number_partners==0){
				
        $(this).css("border","2px solid red")
              $("#fouthr_displaye").html("Select a value greater than 0")
              $("#partnership_holders").html("").hide()
			}else{
				$(this).css("border","1px solid #ccc")
				var numbers=btoa(number_partners)
              $("#fouthr_displaye").html(loader)
              $.post("modules/system/external/pages/innovation/get_fields.php",{
             numbers:numbers
              },function(data){
              	$("#fouthr_displaye").html("")
              	$("#partnership_holders").html(data).show()
              })
			}
		});

$("#submit_now").click(function(){
var attach_file=$("#attach_file").val();
 var new_link=$("#link").val()
var partners_involved=$("partners_involved").val();

	var innovation_Id='<?php echo $innovation_Id; ?>';
	var partners_involved=$("#partners_involved").val();
	if(partners_involved==""){
 
     $("#partners_involved").css("border","2px solid red")
        $("#fouthr_displaye").html("Required")
      }else if(partners_involved=="Yes"){

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
//commn=user_defined;











///

}else{
	$("#fouthr_displaye").html("Required")
	$("#alert_user").html("select atleast one option!").css("color","red");
}



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

//code new



//end code new

}


}


      }else{




		
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
            
             }else{
			  $("#error_pagesd").html("Attach a file or add a link or add both").css("color","red")
              $("#link_datachments").css("border","2px solid red")
             }
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
//commn=user_defined;

}else{
	$("#fouthr_displaye").html("Required")
	$("#alert_user").html("select atleast one option!").css("color","red");
}
      $("#partners_involved").css("border","1px solid #ccc")
        $("#fouthr_displaye").html("")
	     }

if(fund || commn || implement || patner){
$.post("modules/system/external/pages/innovation/add_information.php",{
    		fund:fund,
      	commn:user_defined,
      	patner:patner,
      	implement:implement,
    		innovation_Id:innovation_Id
    	},function(data){


          
    		})


var attach_file=$("#attach_file").val()
var new_link=$("#link").val()
if(attach_file || new_link && partners_involved){
var formData = new FormData($("#file-upload")[0]);
  var txt;
  var r = confirm("Are you sure you want to submit? Click OK to proceed or CANCEL to stop?");
  if (r == true) {
$("#infor_submiter").html(loader);
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
 // var mailing="modules/system/mails/sender.php";
 var subject=btoa("Innovation submission acknowledgement");
  var message=btoa("<p>You have successfully submitted an innovation to The National Museum of Kenya.</p><p>Your Innovation will be evaluated and you will receive feedback once the process has been completed. The current status of your innovation will be displayed on your portal</p><p>&nbsp;</p><p>Regards,</p><p>NMK Innovation Team</p>");
//var url="modules/system/external/pages/innovation/innovations.php";
$.post("modules/mails/sender.php",{my_id:my_id,message:message,subject:subject});
//$.post("modules/system/external/pages/innovation/save_notifications.php",{my_id:my_id,message:message,subject:subject});
$.post("modules/system/external/pages/innovation/innovations.php",{my_id:my_id},function(data){$(target).html(data)});

 

			}else{

			}
		}
	})
}else{

}



}else{
	
}


}else{

}







	 })
})
</script>
