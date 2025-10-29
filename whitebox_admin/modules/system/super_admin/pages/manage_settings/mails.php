<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$useremail=$_POST['user'];
$informations=mysqli_query($con,"SELECT * FROM settings_mailer WHERE status='active'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($informations);
if($get){
$email=$get['email'];
 $email_sender=$get['email_sender'];
 $reply_to_email=$get['reply_to_email'];
 $bcc_email=$get['bcc_email'];
 $Password=base64_decode($get['Password']);
 $hostb=$get['host_mail'];

$html_enabled=$get['html_enabled'];
 $Port=$get['Port_mail'];
 $SMTPSecure=$get['SMTPSecure'];
 $mail_engine=$get['mail_engine'];
 $Passwordupdated_by=$get['updated_by'];
 $status=$get['status'];
 $date_created=$get['date_created'];
 $date_updated=$get['date_updated'];
  $dataid=base64_encode($get['id']);
}else{
$email="";
 $email_sender="";
 $reply_to_email="";
 $bcc_email="";
 $Password="";
 $hostb="";

$html_enabled="";
 $Port="";
 $SMTPSecure="";
 $mail_engine="";
 $Passwordupdated_by="";
 $status="";
 $date_created="";
 $date_updated="";
  $dataid="";
}

$get_user=mysqli_query($con,"SELECT Name FROM administrators WHERE Id='$Passwordupdated_by'")or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
if($get){
$Name=$get['Name'];
}else{
$Name="";	
}
if($Passwordupdated_by){
	$updated_by=$Name." On ".$date_updated;
}else{
$updated_by="";
}

?>



<style type="text/css">
	.setholders{
		text-align: left;
		
		min-height: 40px;
		margin-top: 3px;
		margin-bottom: 2px;
		background: #fff;
		border:1px solid #ccc;
	}
	.setleaders{
		padding-top:10px;
		text-align: left;
		text-transform: uppercase;
			min-height: 40px;
		
		background: #ccc;
		border:1px solid #ccc;
	}
	.setcontents{
		
		padding-top:10px;

	}
	.setheadrs{
	padding-top:10px;
		text-align: left;
		text-transform: uppercase;
			min-height: 40px;
		
		background: #627073;;
		border:1px solid #ccc;
		padding-top: 10px;
		color:#fff;
		margin-bottom: -10px	
	}
	.editsettinginputs{
		background: #ccc;
		min-height: 40px;
		padding-top: 3px;
	}
	.hidesettings{
min-height: 40px;
		padding-top: 3px;
	}
	#formData{
		text-align: center;
		font-weight: bold;
		border-radius: 10px ;
		border:1px solid #ccc;
		min-height: 300px;
	}
</style>

<div class="col-sm-12 col-xs-12" style="text-align: center;font-weight: bold">
	manage mailer settings
</div>
<form class="col-sm-12 col-xs-12" id="formData">
	<div class="col-sm-12 col-xs-12" id="editpagesetting">Current settings</div>
	<div class="col-sm-12 col-xs-12 setheadrs ">
<div class="col-sm-3 col-xs-6 ">Field</div>
<div class="col-sm-9 col-xs-6 ">DATA</div>

	</div>
	<div class="col-sm-12 col-xs-12 setheadrs not_shown " id="updateheaderp">
<div class="col-sm-3 col-xs-6 ">Field</div>
<div class="col-sm-9 col-xs-6 ">INPUT FIELD</div>

	</div>
	<div class="col-sm-12 col-xs-12 setholders no_padding">
<div class="col-sm-3 col-xs-6 setleaders">USERNAME</div>
<div class="col-sm-9 col-xs-6 no_padding setcontents">
	<div class="col-sm-12 no_padding col-xs-12 not_shown editsettinginputs">
		<input type="text" name="emailp" class="splashinputs" value="<?php echo $email?>" id="emailp">
		<input type="text" name="useremail" hidden="" class="splashinputs" value="<?php echo $useremail?>" id="useremail">
			<input type="text" name="dataid" hidden="" class="splashinputs" value="<?php echo $dataid?>" id="dataid">
	</div>
	<div class="col-sm-12 col-xs-12 hidesettings"><?php echo $email?></div>
		
	</div>
	</div>
	<div class="col-sm-12 col-xs-12 setholders no_padding">
<div class="col-sm-3 col-xs-6 setleaders">Password</div>
<div class="col-sm-9 col-xs-6 no_padding setcontents">
	<div class="col-sm-12 no_padding col-xs-12 not_shown editsettinginputs">
		<input type="text" name="passwordem" class="splashinputs" value="<?php echo $Password?>" id="passwordem"></div>
	<div class="col-sm-12 col-xs-12 hidesettings"><?php echo $Password?></div>
		
	</div>

	</div>
	<div class="col-sm-12 col-xs-12 setholders no_padding">
<div class="col-sm-3 col-xs-6 setleaders">Send Email as</div>
<div class="col-sm-9 col-xs-6 no_padding setcontents">
	<div class="col-sm-12 no_padding col-xs-12 not_shown editsettinginputs">
		<input type="text" name="email_senderp" class="splashinputs" value="<?php echo $email_sender?>" id="email_senderp"></div>
	<div class="col-sm-12 col-xs-12 hidesettings"><?php echo $email_sender?></div>
		
	</div>
	</div>
	<div class="col-sm-12 col-xs-12 setholders no_padding">
<div class="col-sm-3 col-xs-6 setleaders">Reply To email</div>
<div class="col-sm-9 col-xs-6 no_padding setcontents">
	<div class="col-sm-12 no_padding col-xs-12 not_shown editsettinginputs">
		<input type="text" name="reply_to_email" class="splashinputs" value="<?php echo $reply_to_email?>" id="reply_to_email"></div>
	<div class="col-sm-12 col-xs-12 hidesettings"><?php echo $reply_to_email?></div>
		
	</div>
	</div>
	<div class="col-sm-12 col-xs-12 setholders no_padding">
<div class="col-sm-3 col-xs-6 setleaders">cc/bcc email</div>
<div class="col-sm-9 col-xs-6 no_padding setcontents">
	<div class="col-sm-12 no_padding col-xs-12 not_shown editsettinginputs">
		<input type="text" name="bcc_email" class="splashinputs" value="<?php echo $bcc_email?>" id="bcc_email"></div>
	<div class="col-sm-12 col-xs-12 hidesettings"><?php echo $bcc_email?></div>
		
	</div>
	</div>
	
		<div class="col-sm-12 col-xs-12 setholders no_padding">
<div class="col-sm-3 col-xs-6 setleaders">Html anabled</div>
<div class="col-sm-9 col-xs-6 no_padding setcontents">
	<div class="col-sm-12 no_padding col-xs-12 not_shown editsettinginputs">
		<select type="text" name="html_enabled" class="splashinputs"  id="html_enabled">
			<option><?php echo $html_enabled?></option>
			<option></option>
			<option>true</option>
			<option>false</option>
</select>
		</div>
	<div class="col-sm-12 col-xs-12 hidesettings"><?php echo $html_enabled?></div>
		
	</div>







	</div>
	<div class="col-sm-12 col-xs-12 setholders no_padding">
<div class="col-sm-3 col-xs-6 setleaders">Mail engine</div>
<div class="col-sm-9 col-xs-6 no_padding setcontents">
	<div class="col-sm-12 no_padding col-xs-12 not_shown editsettinginputs">
		<select type="text" name="mail_engine" class="splashinputs"  id="mail_engine">
			<option><?php echo $mail_engine?></option>
			<option></option>
			<option>smtp</option>
			<option>imap</option>
</select>
		</div>
	<div class="col-sm-12 col-xs-12 hidesettings"><?php echo $mail_engine?></div>
		
	</div>
	</div>
	<div class="col-sm-12 col-xs-12 setholders no_padding">
<div class="col-sm-3 col-xs-6 setleaders">mail Host</div>
<div class="col-sm-9 col-xs-6 no_padding setcontents">
	<div class="col-sm-12 no_padding col-xs-12 not_shown editsettinginputs">
		<input type="text" name="hostb" class="splashinputs" value="<?php echo $hostb?>" id="hostb"></div>
	<div class="col-sm-12 col-xs-12 hidesettings"><?php echo $hostb?></div>
		
	</div>

	</div>
	<div class="col-sm-12 col-xs-12 setholders no_padding">
<div class="col-sm-3 col-xs-6 setleaders">Protocol</div>
<div class="col-sm-9 col-xs-6 no_padding setcontents">
	<div class="col-sm-12 no_padding col-xs-12 not_shown editsettinginputs">
		<select type="text" name="SMTPSecure" class="splashinputs"  id="SMTPSecure">
			<option><?php echo $SMTPSecure?></option>
			<option></option>
			<option>ssl</option>
			<option>tls</option>
</select>
		</div>
	<div class="col-sm-12 col-xs-12 hidesettings"><?php echo $SMTPSecure?></div>
		
	</div>
	</div>
	<div class="col-sm-12 col-xs-12 setholders no_padding">
<div class="col-sm-3 col-xs-6 setleaders">Port allowed</div>
<div class="col-sm-9 col-xs-6 no_padding setcontents">
	<div class="col-sm-12 no_padding col-xs-12 not_shown editsettinginputs">
		<input type="text" name="Portb" class="splashinputs" value="<?php echo $Port?>" id="Portb"></div>
	<div class="col-sm-12 col-xs-12 hidesettings"><?php echo $Port?></div>
		
	</div>
	</div>
	<div class="col-sm-12 col-xs-12 setholders no_padding no_editp">
<div class="col-sm-3 col-xs-6 setleaders">Uppdated by </div>
<div class="col-sm-9 col-xs-6 setcontents"><?php echo $updated_by?></div>

	</div>


	<div class="col-sm-12 col-xs-12  no_padding" style="text-transform: uppercase;margin-top: 10px;margin-bottom: 10px">
		<div class="col-sm-12 col-xs-12 edit_activate  no_padding">
<div class="col-sm-1 col-xs-1 "></div>
<div class="col-sm-4 col-xs-4 btn btn-primary" id="edit_activate">Edit <i class="fa fa-edit"></i></div>

<div class="col-sm-2 col-xs-2 "></div>
<div class="col-sm-4 col-xs-4 btn btn-success" id="edit_testmail">Send Test email <i class="fa fa-envelope"></i>
</div>
</div>
<div class="col-sm-12 col-xs-12 edit_activates not_shown no_padding">
	<div class="col-sm-1 col-xs-1 "></div>
<div class="col-sm-4 col-xs-4 btn  btn-danger edit_update" id="edit_cancels">Cancel <i class="fa fa-undo"></i></div>
<div class="col-sm-2 col-xs-2 "></div>
<div class="col-sm-4 col-xs-4 btn  btn-success edit_update" id="edit_update">Save <i class="fa fa-save"></i></div>
</div>
	</div>
	<div class="col-sm-12 col-xs-12  no_padding" style="margin-top: 4px;margin-bottom: 10px;color:red; text-align:center;" id="errosettings"></div>
</form>

<div class="col-xs-12 col-xs-12 not_shown testmailer">
	<div class="colsm-12 col-xs-12" style="text-align: center;text-transform: uppercase;">Send a test email with the configurations available</div>
	<div class="col-xs-12 col-sm-12" id="mailtested">
		
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
$.post("modules/system/super_admin/pages/manage_settings/test_email.php",{},function(data){
 	$("#mailtested").html(data);
		})

$("#edit_testmail").click(function(){
$(".testmailer").show();
$("#formData").hide()
})
		$("#edit_update").click(function(){
        var emailp=$("#emailp").val();
        var email_senderp=$("#email_senderp").val();
        var reply_to_email=$("#reply_to_email").val();
        var bcc_email=$("#bcc_email").val();
        var passwordem=$("#passwordem").val();
        var html_enabled=$("#html_enabled").val();
        var mail_engine=$("#mail_engine").val();
        var SMTPSecure=$("#SMTPSecure").val();
        var Portb=$("#Portb").val();
        var hostb=$("#hostb").val();
var pemail='<?php echo $email?>'
 var pemail_sender='<?php echo $email_sender?>'
 var preply_to_email='<?php echo $reply_to_email?>'
 var pbcc_email='<?php echo $bcc_email?>'
 var pPassword='<?php echo $Password?>'
 var phostb='<?php echo $hostb?>'

var phtml_enabled='<?php echo $html_enabled?>'
 var pPort='<?php echo $Port?>'
 var pSMTPSecure='<?php echo $SMTPSecure?>'
 var pmail_engine='<?php echo $mail_engine?>'

if(emailp && email_senderp && reply_to_email && bcc_email && passwordem && html_enabled && mail_engine && SMTPSecure && Portb && hostb){
$("#errosettings").html("");
if(emailp==pemail && email_senderp==pemail_sender && reply_to_email==preply_to_email && bcc_email==pbcc_email && passwordem==pPassword && html_enabled==phtml_enabled && mail_engine==pmail_engine && hostb==phostb && SMTPSecure==pSMTPSecure && Portb==pPort){
$("#errosettings").html("You have not done any changes, kindly adjust the fields and try again");





}else{
 var r = confirm("Are you sure you want to submit this information?, click OK to proceed or CANCEL to stop ?");
  if (r == true) {

var loader=$("#loader").html();
 $("#errosettings").html("Submiting data, kindly wait.."+loader).css("color","black")
var formData = new FormData($("#formData")[0]);
    $.ajax({
        url : 'modules/system/super_admin/pages/manage_settings/saveemail.php',
        method : 'POST',
        data : formData,
        contentType : false,
        cache : false,
        processData : false,
        success : function (response){
            var responsed=atob(response);
if($.trim(responsed)=="success"){
$("#errosettings").html("").css("color","black")
var user=$("#user_email").val();
		 $.post("modules/system/super_admin/pages/manage_settings/mails.php",{user:user},function(data){
 	$("#manageseiings").html(data);
		})



}else{
 
}
}
})

}else{

}







}



}else{
$("#errosettings").html("Error!, some fields are empty!")
}


		})



		$("#edit_activate").click(function(){
          $(".hidesettings").hide();
          $(".editsettinginputs").show();
          $(".setheadrs").hide();
          $("#editpagesetting").html("Edit the settings below")
          $("#formData").css('background','#ccc')
          $("#updateheaderp").show();
          $(".edit_activate").hide()
          $(".edit_activates").show()
          $(".no_editp").hide()
           $("#errosettings").html("").show()
		})
$("#edit_cancels").click(function(){
          $(".hidesettings").show();
          $(".editsettinginputs").hide();
          $(".setheadrs").show();
          $("#editpagesetting").html("Current settings")
          $("#formData").css('background','#fff')
          $("#updateheaderp").hide();
          $(".edit_activate").show()
          $(".edit_activates").hide()
          $(".no_editp").show()
          $("#errosettings").html("").hide()
})
	})
</script>