<?php
include "../../../../../connect.php";
$my_user=$_POST['my_id'];
include("../../../../functions/security.php");
//$salt="A0007799Wagtreeyty";

$my_userde=encrypt($my_user, $key);
$get_user=mysqli_query($con,"SELECT * FROM external_users WHERE Email_address='$my_userde'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$First_name=$get['First_name'];
$Last_name=$get['Last_name'];
$national_id=$get['national_id'];
$Gender=$get['Gender'];
$County_id=$get['County_id'];
$Phone=$get['Phone'];
$education_level=$get['education_level'];

 // alert($Last_name);
$sqlx="SELECT County_name FROM county_table where id='$County_id'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $County=$row['County_name'];
  
}
if($First_name && $Last_name && $national_id && $County_id && $Gender && $Phone && $education_level){

?>
<script type="text/javascript">
	$(document).ready(function(){

		var my_id=$("#global_u_email").val();
	
	//alert("myid="+my_id)
$.post("modules/system/external/pages/innovation/innovations.php",{
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
$.post("modules/system/external/pages/profile/profile.php",{
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



