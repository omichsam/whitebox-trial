<style type="text/css">
	#dashbord_h{
		text-transform: uppercase;
		text-align: center;
	}
.dashboards{
	min-height: 100px;
box-shadow: 3px 4px 6px #ccc;
border-radius: 5px;
border: 2px solid #ccc;
margin-top: 4px;
}
#graph{
	min-height: 300px;
	margin-top: 20px;
	box-shadow: 0 0 3px #ccc;
	text-align: center;
}

</style>

<?php

include "../../../../../connect.php";
$my_user=$_POST['my_id'];
include("../../../../functions/security.php");
//$salt="A0007799Wagtreeyty";

     $oldstatus="pending";
 $new_status=encrypt($oldstatus, $key);
$submit=encrypt("submission", $key);
$approve=encrypt("approved", $key);
$diasapproved=encrypt("disapproved", $key);
$implemented=encrypt("implementation", $key);
$implemented=encrypt("waiting", $key);
$submitted=0;
$diasapprove=0;
$implement=0;
$waiting=0;
$evaluated=0;
$approved=0;
$subcount=0;
$my_userde=encrypt($my_user, $key);
$get_user=mysql_query("SELECT User_id FROM external_users WHERE Email_address='$my_userde'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
$user_id=$get['User_id'];
//echo $user_id;
$counter=0;
$shown_submit="";
$sqlx="SELECT * FROM innovations_table where user_id='$user_id' and Status!='$new_status'";

    $query_runx=mysql_query($sqlx) or die($query_runx."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runx)){
$counter=$counter+1;
	$submitted=$submitted+1;
	$status=$row['Status'];
if($status==$submit){
	$subcount=$subcount+1;
}else if($status==$approve){
	$approved=$approved+1;
}else if($status==$diasapproved){
	$diasapprove=$diasapprove+1;
}else if($status==$implemented){
	$implement=$implement+1;
}else{

}
   
/*

    $Innovation_name=base64_decode(decrypt($row['Innovation_name'], $key));
      $Category=base64_decode(decrypt($row['Category'], $key));
  $stage=base64_decode(decrypt($row['stage'], $key));
  $date_added=decrypt($row['date_added'], $key);


  */

}
if($counter>=2){
    $shown_submit="not_shown";
}else{
    $shown_submit="";
}
$evaluated=$approved+$diasapprove;
$waiting=$approved-$implement;
if($subcount>1){
$hidden="not_shown";
}else{
$hidden="";
}






?>


<div class="col-sm-12 col-xs-12">
<div class="col-sm-12 col-xs-12 no_padding " id="graph">
	<div class="col-sm-12 col-xs-12" id="graph_data"></div>

<div class="col-sm-12 <?php echo $hidden." ".$shown_submit?> col-xs-12" id="submitted_new" style="text-align: center;"><span class="btn theme_bg" >Submit Innovation </span></div>
	<div class="col-sm-12 col-xs-12 mobile_hidden" id="graph_table"></div>


</div>


</div>
<script type="text/javascript">
$(document).ready(function(){
	var count='<?php echo $submitted  ?>'
	if(count>=1){
var my_id=$("#global_u_email").val();
var graph="modules/system/external/pages/Dashboard/innovations.php";
var paged="#graph_data";
$.post(""+graph+"",{my_id:my_id},function(data){$(paged).html(data)})


}else{
var sumbit="modules/system/external/pages/innovation/submit.php";
var home="#home";
$.post(""+sumbit+"",function(data){ $(home).html(data)})

}
$("#submitted_new").click(function(){
	var loader=$("#loader").html();
var innova="modules/system/external/pages/innovation/submit.php";
var datad="#home";
$(datad).html(loader)
$.post(""+innova+"",function(data){$(datad).html(data)})
	})
})
</script>