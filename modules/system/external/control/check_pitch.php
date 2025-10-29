
<?php
include "../../../../connect.php";
$counter=0;
$notificationshow="not_shown";
include("../../../functions/security.php");

 $my_user=$_POST['my_id'];
//echo $my_user."allan";
$my_userde=encrypt($my_user,$key);
$get_user=mysql_query("SELECT * FROM external_users WHERE Email_address='$my_userde'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
$User_id=$get['User_id'];
//echo $User_id;
$pitc_show="not_shown";
$sqlxd="SELECT * FROM innovations_table where user_id='$User_id'";

    $query_runxs=mysql_query($sqlxd) or die($query_runxs."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runxs)){
      $event_id=$row['id'];
      $Innovation_Id=$row['Innovation_Id'];
      //echo $Innovation_Id;

         $checkExistd=mysql_query("SELECT host_id FROM events WHERE Innovation_Id='$Innovation_Id' and status='active'") or die(mysql_error());

  if(mysql_num_rows($checkExistd)>=1){ 
      $pitc_show="";
}else{
    
}
    }

    ?>
    <div class=" nmk_controlsds pitch_btn <?php echo $pitc_show?>   col-xs-12 col-sm-12"   role="pitch"> <i class="fa fa-television"></i> Pitch </div>
    <script type="text/javascript">
	$(document).ready(function(){

	    
$(".pitch_btn").click(function(){

	var my_id=$("#global_u_email").val();
	//alert("myid="+my_id)
$.post("modules/system/external/pages/pitch/pitch.php",{
my_id:my_id
	},function(data){
		//alert(data)

$("#home").html(data);
//alert(data)
})




	})
	})
	</script>
   