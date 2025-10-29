
<?php
include "../../connect.php";
include("../functions/security.php");
$user=encrypt($_POST['busername'],$key);
$pass=encrypt($_POST['bpass'],$key);	

$account="";
$checkExist=mysql_query("SELECT Email FROM investors WHERE Email='$user' AND pass_key='$pass'") or die(mysql_error());

  if(mysql_num_rows($checkExist)!=0){
/*
$get_user=mysql_query("SELECT * FROM investors WHERE Email='$my_user' AND pass_key='$my_pass'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
$oldname=$get['First_name'];
if($oldname){
$new_old=base64_decode(decrypt($oldname,$key));
}else{

}*/
//$name="";
$account="investor";
}else{
$checkExist=mysql_query("SELECT Email_address FROM external_users WHERE Email_address='$user' AND pass_key='$pass'") or die(mysql_error());

  if(mysql_num_rows($checkExist)!=0){
/*
$get_userd=mysql_query("SELECT * FROM external_users WHERE Email_address='$my_user' AND pass_key='$my_pass'") or die(mysql_error());
$getd=mysql_fetch_assoc($get_userd);
$First_name=$getd['First_name'];
$Last_name=$getd['Last_name'];
if($First_name && $Last_name){
$new_first=base64_decode(decrypt($First_name,$key));
$new_last=base64_decode(decrypt($Last_name,$key));
$name=$new_first." ".$new_last;

}else{

}

*/
$account="external";
}else{
$account="";

}


}

?>
<script type="text/javascript" src="modules/header/headerjs.js"></script>

 <header  style="background-color: #fff; " id="nbsheader_holder"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php // include "modules/system/external/header/header.php";
    ?>
 </header>

 <section id="menu_page"  style="min-height: 100%; max-height: 100%; overflow: auto;">
 	<?php  //include "modules/menu_page/".$new_account.".php";
 	?>
 </section>

<section class="pageswrap"  style="min-height: 100%; max-height: 100%; overflow: auto;">
	<div class=" col-sm-2 col-xs-12 no_padding mobile_hidden" id="div_home_control"></div>
	<div class=" col-sm-10 col-xs-12" id="div_home_display" >
	<div class="col-sm-12 col-xs-12 no_padding" id="home"></div>
	<div class="col-sm-12 col-xs-12 no_padding" id="bello_bb">&nbsp;</div>
    </div>
</section> 
<section class="footer">Herihub</section>
<!--<script type="text/javascript"  src="js/scripts/landing.js"></script>-->

<script type="text/javascript">
	
	$(document).ready(function(){
		//alert()
		var my_user=$("#global_u_email").val();
		var account='<?php echo $account?>';
		//alert(account)
	   // alert(my_user)
		//disabling right clicking
	   $(document).bind("contextmenu",function(e){
        
       // return false;
      //alert("Protected by ICTA!")
       //return false;

}) 
   var my_id=my_user;
		$.post("modules/system/"+account+"/pages/Dashboard/Dashboard.php",{
 my_id:my_id
	},function(data){
		$("#home").html(data)
	})
	$.post("modules/system/"+account+"/control/control.php",{
     my_id:my_id
	},function(data){
	 //alert(data);
		$("#div_home_control").html(data)
		//$("#menu_page").html(data)
	})
	  $.post("modules/system/"+account+"/header/header.php",{
  my_id:my_id
	},function(data){
	 //alert(data);
	 //alert(data)
		$("#nbsheader_holder").html(data)
		
	}) 
$.post("modules/system/"+account+"/control/menu.php",{
 my_id:my_id
	},function(data){
	 //alert(data);
		//$("#div_home_control").html(data)
		$("#menu_page").html(data)
	})
	})

</script>