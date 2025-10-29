<?php
include "../../../../../connect.php";
$my_user=$_POST['my_id'];
include("../../../../functions/security.php");
//$salt="A0007799Wagtreeyty";

$my_userde=encrypt($my_user, $key);
$get_user=mysql_query("SELECT * FROM investors WHERE Email='$my_userde'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
$First_name=$get['Name'];
$company=$get['Company'];
$Location=$get['Location'];
$contact=$get['Contact'];

 // alert($Last_name);

if($First_name && $company && $contact && $Location ){

?>
<script type="text/javascript">
	$(document).ready(function(){

		var my_id=$("#global_u_email").val();
	
	//alert("myid="+my_id)
$.post("modules/system/investor/pages/Dashboard/dash.php",{
my_id:my_id
	},function(data){
		//alert(data)

$("#home").html(data);
})
})
</script>


<?php
}else{
?>
<script type="text/javascript">
	$(document).ready(function(){

		var my_id=$("#global_u_email").val();
	
	//alert("myid="+my_id)
$.post("modules/system/investor/pages/profile/profile.php",{
my_id:my_id
	},function(data){
		//alert(data)

$("#home").html(data);
})
})
</script>
	<?php
}
?>



