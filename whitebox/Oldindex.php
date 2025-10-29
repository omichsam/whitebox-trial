<?php
 session_start();
 ?>
<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>WhiteBox Admin</title>
	
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    	
	<script type="text/javascript"  src="js/jquery.js"></script>
	<script type="text/javascript"  src="js/bootstrap.min.js"></script>
	<script type="text/javascript"  src="js/monthly.js"></script>
 	<script type="text/javascript"  src="js/scripts.js"></script>
 	<script type="text/javascript"  src="js/validate.js"></script>
 	<script type="text/javascript"  src="js/custom.js"></script>
 	<script type="text/javascript"  src="minijava.js"></script>
 	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">	
	<link rel="stylesheet" type="text/css" href="css/monthly.css">
	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">

	<link rel="stylesheet" type="text/css" href="modules/system/popup/popupcss.css">
	 <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--
	<link rel="stylesheet" type="text/css" href="modules/inbox/inboxcss.css">
	<link rel="stylesheet" type="text/css" href="modules/system/popup/popupcss.css">
	<link rel="stylesheet" type="text/css" href="modules/newrequest/requestcss.css">
	<link rel="stylesheet" type="text/css" href="modules/accountview/accountviewcss.css"> 
	<link rel="stylesheet" type="text/css" href="modules/pages/myprofile/profileview.css">
	<link rel="stylesheet" type="text/css" href="modules/home/homecss.css">-->
	<link rel="stylesheet" type="text/css" href="modules/system/welcome/splashcss.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">		
	
</head>
<?php
$datab="not_shown";
include "plugins/php_functions/security.php";
include "connect.php";
$checkusere="";
 if(isset($_SESSION["id"])){
  $loginuser=$_SESSION["username"];
 $user=base64_decode($loginuser);


$get_user=mysqli_query($con,"SELECT user_name,Name,Admin_role FROM administrators WHERE user_name='$user'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
if($get){
  $checkusere="found";
}else{

}



 }else{
   $datab="";  
 }
 ?>
<body class="full" >
   <div class="s100 full <?php echo $datab?>  float_left no_padding" id="splashpage">
   			<?php  include "modules/system/welcome/welcome.php";
			?>
   </div>
   <div class="s100 not_shown full float_left no_padding " id="landingpage" >
<?php  //include "landingpage.php";
			?>
   </div>
</body>
<div class="not_shown" id="loader">
    <img src="images/icons/loader.gif" id="loaderimg">
</div>
<div class="not_shown" id="loading">
    <img src="images/loader.gif" id="loaderimg">
</div>
 <?php include "modules/system/popup/popup.php"; ?>
 <?php include "globals.php";?>
</html>
 <script>
    $(document).ready(function(){
      var checkusere='<?php echo $checkusere?>';
      if(checkusere=="found"){
      //gto confirm acc 
      var userd='<?php echo $loginuser?>';
      //alert(loginuser)
      var loginuser=userd;
      if(loginuser){
      set_globals('loginuser');
     $("#user_email").val(btoa('loginuser'));
     //thisele.find("b").html("");
     $("#alertoverly1").show();
     $("#alertoverly1").find('pagewrap').show().html(loader);
     $("#loginloadto").hide();
     $.post("landingpage.php",{
        loginuser:loginuser
    },function(data){
    var user=btoa(loginuser)
     $.post("plugins/php_functions/set_logs.php",{user:user})
$(".overly,#alertoverly1,#splashpage").hide();
 $("#landingpage").show().html(data);
$("#openhomebtn").click();

})
   }
 }else{
  
 }
 });
  </script>