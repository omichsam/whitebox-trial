<?php

 session_start();
?>
<style type="text/css">
#div_home_control{
	min-height: 100%;

	background-color: #e4e4e4;
}
#div_home_display{
	min-height: 100%;
}
#home{
margin-top: 55px;
min-height: 580px;
max-height: 598px;
overflow: auto;
}
.footer{
   text-align: center;
   font-weight: bold;

}
#lower_table{
	min-height: 100% !important;
	
}
#default_footers{
	min-height: 35px;
}
</style>


<script type="text/javascript" src="modules/system/header/headerjs.js"></script>
<?php
/*menu page dont need to connect to db*/

include "plugins/php_functions/security.php";
include "connect.php";
$Name="";
$user=base64_decode($_POST['loginuser']);
//$pass=base64_encode($_POST['loginpass']);	
$get_user=mysqli_query($con,"SELECT user_name,Name,Admin_role FROM administrators WHERE user_name='$user'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
if($get){
$user_name=$get['user_name'];

 $Nameds=$get['Name'];
 if($Nameds){
 $Name=$get['Name'];
 }else{
   $Name="";  
 }
 $iselearn="";
 $Admin_name="";
 $Admin_role=$get['Admin_role'];
//echo $Admin_role;
if($Admin_role=="clerk"){
    $Admin_name="Evaluating team";
}else if($Admin_role=="content_team"){
    $Admin_name="Content team";
    $iselearn="elearn";
}else if($Admin_role=="elearning_admin"){
	 $iselearn="elearn";
    $Admin_name="Super admin";
}else if($Admin_role=="super_admin"){
    $Admin_name="Super admin";
    $iselearn="elearn";
}else{

  $Admin_name= $Admin_role; 
}
  }else{

  } 
?>


 <header style="background:#fff;"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <?php  include "modules/system/header/header.php";?>
 </header>

 <section id="menu_page"   style="min-height: 100%; max-height: 100%; overflow: auto;">
 	<?php  include "modules/system/menu_page/".$Admin_role.".php";?>
 </section>

<section class="pageswrap"  style="min-height: 100%; max-height: 100%; overflow: auto;">
	<div class=" col-sm-2 col-xs-12 no_padding mobile_hidden" id="div_home_control"></div>
	<div class=" col-sm-10 col-xs-12" id="div_home_display" style="min-height: 100%; max-height: 100%; overflow: auto;" >
	<div class="col-sm-12 col-xs-12 no_padding" id="home" style="min-height: 80%; max-height: 80%; overflow: auto;"></div>
 <div class="col-sm-12 col-xs-12 no_padding not_shown" id="clock_data" style="text-align:center;margin-top: 55px;background:#fff;"></div>
    <div class="col-sm-12 col-xs-12 no_padding" id="default_footers"></div>
    </div>
</section> 
<section class="footer">WhiteBox Innovation Portal</section>
<script type="text/javascript">
	$(document).ready(function(){
		var iselearn='<?php echo $iselearn?>';
		if(iselearn){
			
			$.post("modules/system/content_team/pages/caverage/covd.php",function(data){
         	//$("#home").html(data);
          $.post("modules/system/content_team/pages/caverage/covuser.php",function(data){
    	   })
    	   })
		}else{
			
		}
	    
	    var loader=$("#loader").html();
	    $("#home").html(loader);
	    $("#div_home_control").html(loader)
	    $.get("clock.php",function(data){
	        $("#clock_data").html(data);
	    })
	    // disabling right clicking
	    /* $(document).bind("contextmenu",function(e){
        
return false;
        
    })  
	    
	    */
	    //end of right clicking



        
		var my_id=$("#user_email").val();
		var account='<?php echo $Admin_role ?>';
		    
		 $.post("modules/system/"+account+"/pages/Dashboard/Dashboard.php",{
        my_id:my_id
	},function(data){
		$("#home").html(data)
	})
		
			$.post("modules/system/accounts/"+account+".php",{
 
	},function(data){
	  //  alert(data);
		$("#div_home_control").html(data)
		
	})
	//section end
	})
</script>
