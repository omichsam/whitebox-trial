
<style type="text/css">
	.invite_holders{
    min-height: 130px;
    box-shadow: 0 0 5px #ccc;
    margin-top: 4px;
border:3px solid #ccc;
border-radius: 5px;
	}
	.left_headers{
		text-align: left;
		text-transform: uppercase;
	}
	.all_headears{

		border-bottom: 1px solid #ccc;
	}
	#Presentationerror{
		text-align: center;
	}



	 .container {
  background-size: cover;
  background: rgb(226,226,226); /* Old browsers */
  background: -moz-linear-gradient(top,  rgba(226,226,226,1) 0%, rgba(219,219,219,1) 50%, rgba(209,209,209,1) 51%, rgba(254,254,254,1) 100%); /* FF3.6+ */
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(226,226,226,1)), color-stop(50%,rgba(219,219,219,1)), color-stop(51%,rgba(209,209,209,1)), color-stop(100%,rgba(254,254,254,1))); /* Chrome,Safari4+ */
  background: -webkit-linear-gradient(top,  rgba(226,226,226,1) 0%,rgba(219,219,219,1) 50%,rgba(209,209,209,1) 51%,rgba(254,254,254,1) 100%); /* Chrome10+,Safari5.1+ */
  background: -o-linear-gradient(top,  rgba(226,226,226,1) 0%,rgba(219,219,219,1) 50%,rgba(209,209,209,1) 51%,rgba(254,254,254,1) 100%); /* Opera 11.10+ */
  background: -ms-linear-gradient(top,  rgba(226,226,226,1) 0%,rgba(219,219,219,1) 50%,rgba(209,209,209,1) 51%,rgba(254,254,254,1) 100%); /* IE10+ */
  background: linear-gradient(to bottom,  rgba(226,226,226,1) 0%,rgba(219,219,219,1) 50%,rgba(209,209,209,1) 51%,rgba(254,254,254,1) 100%); /* W3C */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e2e2e2', endColorstr='#fefefe',GradientType=0 ); /* IE6-9 */
  padding: 20px;
}

.led-box {
  height: 30px;
  width: 25%;
  
  float: left;
}


.led-green {
  margin: 0 auto;
  width: 24px;
  height: 24px;
  background-color: #0dff00;
  border-radius: 50%;
  box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #1a823b 0 -1px 9px, rgba(0, 100, , 0.5) 0 2px 12px;
  -webkit-animation: blinkRed 1.5s infinite;
  -moz-animation: blinkRed 1.5s infinite;
  -ms-animation: blinkRed 1.5s infinite;
  -o-animation: blinkRed 1.5s infinite;
  animation: blinkRed 1.5s infinite;
}

@-webkit-keyframes blinkRed {
    from { background-color: #0dff00; }
    50% { background-color: #00aa2a; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #1a823b 0 -1px 9px, rgba(255, 0, 0, 0.5) 0 2px 0;}
    to { background-color: #0dff00; }
}
@-moz-keyframes blinkRed {
    from { background-color: #0dff00; }
    50% { background-color: #00aa2a; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #1a823b 0 -1px 9px, rgba(255, 0, 0, 0.5) 0 2px 0;}
    to { background-color: #0dff00; }
}
@-ms-keyframes blinkRed {
    from { background-color: #0dff00; }
    50% { background-color: #00aa2a; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #1a823b 0 -1px 9px, rgba(255, 0, 0, 0.5) 0 2px 0;}
    to { background-color: #0dff00; }
}
@-o-keyframes blinkRed {
    from { background-color: #0dff00; }
    50% { background-color: #00aa2a; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #1a823b 0 -1px 9px, rgba(255, 0, 0, 0.5) 0 2px 0;}
    to { background-color: #0dff00; }
}
@keyframes blinkRed {
    from { background-color: #0dff00; }
    50% { background-color: #00aa2a; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #1a823b 0 -1px 9px, rgba(0, 100, 0, 0.5) 0 2px 0;}
    to { background-color: #0dff00; }
}

</style>

<div class="col-sm-12 col-xs-12">
	<div class="col-sm-12 col-xs-12 default_header"> Invitation to Presentation</div>
	<?php
/*
?>
	<div class="col-xs-12 col-sm-12 no_padding">
	<div class="col-sm-12 col-xs-12 all_headears"><div class=" col-sm-10 col-xs-10 left_headers">Executive team</div>

	<div class=" col-sm-2 col-xs-2 ">Check all <input type="checkbox" id="check_allExecutive"></div>	
</div>
	<?php
*/
//session_start();

	$innovation=$_POST['innovation'];
	
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
 /* $online="";
  $offline_data="";
$statusof=base64_encode(encrypt("online",$key));
$admin=encrypt(base64_encode("executive"),$key);
	$user=encrypt($_POST['user'],$key);





$get_user=mysqli_query($con,"SELECT Id FROM administrators WHERE user_name='$user'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$host_Id=$get['Id'];
//echo $user;

$sqlxsd="SELECT * FROM innovations_table where Innovation_Id='$innovation'";

    $query_runxrt=mysqli_query($con,$sqlxsd) or die($query_runxrt."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxrt)){
      $Category=$row['Category'];
      $innovator=$row['user_id'];
$new_Category=base64_decode(decrypt($row['Category'], $key));
}


$sqlx="SELECT * FROM administrators where Admin_role='$admin' and Id!='$host_Id'";
$executived=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    	$executived=$executived+1;
    $status=$row['status'];
  $executive_id=$row['Id'];
      $Name=base64_decode(decrypt($row['Name'], $key));
        if($status==$statusof){
  $online="Online";
$offline_data="";
}else{
  $online="Offline";
  $offline_data="not_shown";
}
		?>

		<div class="col-xs-6 col-sm-2">
			<div class="col-sm-12 col-xs-12 invite_holders">
            <p><?php echo $Name?></p>
            <p style="text-align: center;">
            <i class="fa fa-user fa-5x"></i>
           </p>
  <p class="col-sm-12 col-xs-12">
      <div class="led-box <?php echo $offline_data?>">
     <div class="led-green"></div>
    </div>
  </p>
			</div>

        
  <input type="checkbox" role="<?php echo $executive_id?>" id="Executive_<?php echo $executived?>" class="check_executives">


		</div>
		<?php

	}
?>
	</div>


	<div class="col-xs-12 col-sm-12 no_padding">
	<div class="col-sm-12 col-xs-12 all_headears"><div class=" col-sm-10 col-xs-10 left_headers">clerks team</div>

	<div class=" col-sm-2 col-xs-2 ">Check all <input type="checkbox" id="check_allclerks"></div>	
</div>
	<?php
  $online="";
  $offline_data="";
$statusof=base64_encode(encrypt("online",$key));
$admin=encrypt(base64_encode("clerk"),$key);

$sqlx="SELECT * FROM administrators where Admin_role='$admin'";
$clerksa=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $status=$row['status'];
   $clerks_id=$row['Id'];
    $clerksa=$clerksa+1;
      $Name=base64_decode(decrypt($row['Name'], $key));
        if($status==$statusof){
  $online="Online";
$offline_data="";
}else{
  $online="Offline";
  $offline_data="not_shown";
}
		?>

		<div class="col-xs-6 col-sm-2">
			<div class="col-sm-12 col-xs-12 invite_holders">
            <p><?php echo $Name?></p>
            <p style="text-align: center;">
            <i class="fa fa-user fa-5x"></i>
           </p>
  <p class="col-sm-12 col-xs-12">
      <div class="led-box <?php echo $offline_data?>">
     <div class="led-green"></div>
    </div>
  </p>
			</div>

        
  <input type="checkbox" role="<?php echo $clerks_id?>" id="clerks_<?php echo $clerksa?>" class="check_executives">


		</div>
		<?php

	}
?>
	</div>




	<div class="col-xs-12 col-sm-12 no_padding">
	<div class="col-sm-12 col-xs-12 all_headears"><div class=" col-sm-10 col-xs-10 left_headers">Investors team interested in <?php echo $new_Category?></div>

	<div class=" col-sm-2 col-xs-2 ">Check all <input type="checkbox" id="check_allinvestors"></div>	
</div>
	<?php
  $online="";
  $offline_data="";
$statusof=base64_encode(encrypt("online",$key));
$admin=encrypt(base64_encode("clerk"),$key);

$sqlxh="SELECT * FROM investors where interest='$Category'";
$investorsd=0;
    $query_runxpo=mysqli_query($con,$sqlxh) or die($query_runxpo."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxpo)){
  $Name=$row['Name'];
   $Company=$row['Company'];
   $Location=$row['Location'];
   $Contact=$row['Contact'];
   $interest=$row['interest'];

if($Name && $Company && $Location && $Contact && $interest){
$investorsd=$investorsd+1;
    $status=$row['status'];
   $Investor_id=$row['Investor_id'];
      $Name=base64_decode(decrypt($row['Name'], $key));
     $new_interest=base64_decode(decrypt($row['interest'], $key));
		?>

		<div class="col-xs-6 col-sm-2">
			<div class="col-sm-12 col-xs-12 invite_holders">
            <p><?php echo $Name?></p>
            <p style="text-align: center;">
            <i class="fa fa-user fa-5x"></i>
           </p>

			</div>

        
  <input type="checkbox" role="<?php echo $Investor_id?>" id="investor_<?php echo $investorsd?>" class="check_executives">


		</div>
		<?php

	}else{

	}
}
?>
	</div>
<?php
*/
?>
	<div class="col-xs-12 col-sm-12 no_padding">
	<div class="col-sm-12 col-xs-12 all_headears"><div class=" col-sm-10 col-xs-10 left_headers">innovators</div>

	<div class=" col-sm-2 col-xs-2 ">Check all <input type="checkbox" id="check_allinnovators"></div>	
</div>
	<?php
	$sqlxsd="SELECT * FROM innovations_table where Innovation_Id='$innovation'";

    $query_runxrt=mysqli_query($con,$sqlxsd) or die($query_runxrt."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxrt)){
      $Category=$row['Category'];
      $innovator=$row['user_id'];
$new_Category=base64_decode(decrypt($row['Category'], $key));
}

  $online="";
  $offline_data="";
$statusof=base64_encode(encrypt("online",$key));
$admin=encrypt(base64_encode("clerk"),$key);

$sqlx="SELECT * FROM external_users where User_id='$innovator'";
$innovator_d=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    
      $Name=base64_decode(decrypt($row['First_name'], $key))." ".base64_decode(decrypt($row['Last_name'], $key));
     $innovator_d=$innovator_d+1;
        $externaluser_id=$row['User_id'];
     
		?>

		<div class="col-xs-6 col-sm-2">
			<div class="col-sm-12 col-xs-12 invite_holders">
            <p><?php echo $Name?></p>
            <p style="text-align: center;">
            <i class="fa fa-user fa-5x"></i>
           </p>
  
			</div>

        
  <input type="checkbox" role="<?php echo $externaluser_id?>" id="innovator_<?php echo $innovator_d?>" class="check_executives">


		</div>
		<?php

	}
?>
	</div>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-4 col-xs-12">
	

</div>
<div class="col-sm-4 col-xs-12">
<span class="btn invite_present theme_bg" role="back" >Back</span> 	
<span class="btn invite_present theme_bg" role="invite">Invite</span> 
</div>
</div>
<div class="col-sm-12 col-xs-12" id="Presentationerror"></div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
    var confirmed="";
$("#check_allExecutive").change(function(){
if($(this).prop("checked")){

var executived='<?php echo $executived?>';
for(d=1;d<=executived;d++){
document.getElementById("Executive_"+d).checked = true;
//$("#Executive_"+executived).checked=true;
//alert()
}
	//alert("checked")
}else{

	var executived='<?php echo $executived?>';
for(d=1;d<=executived;d++){
document.getElementById("Executive_"+d).checked = false;
//$("#Executive_"+executived).checked=true;
//alert()
}
//$(".check_executives").checked = false;
}
})


$("#check_allclerks").change(function(){
if($(this).prop("checked")){

var clerks_d='<?php echo $clerksa?>';
for(d=1;d<=clerks_d;d++){
document.getElementById("clerks_"+d).checked = true;
//$("#Executive_"+executived).checked=true;
//alert()
}
	//alert("checked")
}else{

var clerks_d='<?php echo $clerksa?>';
for(d=1;d<=clerks_d;d++){
document.getElementById("clerks_"+d).checked = false;
//$("#Executive_"+executived).checked=true;
//alert()
}
//$(".check_executives").checked = false;
}
})







$("#check_allinvestors").change(function(){
if($(this).prop("checked")){

var invest_d='<?php echo $investorsd?>';
for(d=1;d<=invest_d;d++){
document.getElementById("investor_"+d).checked = true;
//$("#Executive_"+executived).checked=true;
//alert()
}
	//alert("checked")
}else{

var invest_d='<?php echo $investorsd?>';
for(d=1;d<=invest_d;d++){
document.getElementById("investor_"+d).checked = false;
//$("#Executive_"+executived).checked=true;
//alert()
}
//$(".check_executives").checked = false;
}
})




$("#check_allinnovators").change(function(){
if($(this).prop("checked")){

var innovator_d='<?php echo $innovator_d?>';
for(d=1;d<=innovator_d;d++){
document.getElementById("innovator_"+d).checked = true;
//$("#Executive_"+executived).checked=true;
//alert()
}
	//alert("checked")
}else{

var innovator_d='<?php echo $innovator_d?>';
for(d=1;d<=innovator_d;d++){
document.getElementById("innovator_"+d).checked = false;
//$("#Executive_"+executived).checked=true;
//alert()
}
//$(".check_executives").checked = false;
}
})



$(".invite_present").click(function(){
var role=$(this).attr("role");
if(role=="invite"){
    var loader=$("#loader").html();
    $("#Presentationerror").html(loader);
//add executives
var innovation=btoa('<?php echo $innovation?>');
/*var executived='<?php echo $executived?>';
var account_type=btoa("Executive");
var host_Id=btoa('<?php echo $host_Id?>');
for(d=1;d<=executived;d++){

	if($("#Executive_"+d).prop("checked")){

var executive_no=btoa($("#Executive_"+d).attr("role"));
var urlre="modules/system/executive/pages/evaluate/add_members.php";
$.post(""+urlre+"",{innovation:innovation,executive_no:executive_no,account_type:account_type,host_Id:host_Id},function(data){
$("#Presentationerror").html(data);
confirmed=1;

})


//alert(executive_no)
//$("#Executive_"+executived).checked=true;
//alert()
}else{

	//alert("checked")
}

}

*/

//end of executives

//add clerks
//var innovation=btoa('<?php echo $innovation?>');
/*var executived='<?php echo $clerksa?>';
var account_type=btoa("Clerk");
//var host_Id=btoa('<?php echo $host_Id?>');
for(d=1;d<=executived;d++){

	if($("#clerks_"+d).prop("checked")){

var executive_no=btoa($("#clerks_"+d).attr("role"));
var urlre="modules/system/executive/pages/evaluate/add_members.php";
$.post(""+urlre+"",{innovation:innovation,executive_no:executive_no,account_type:account_type,host_Id:host_Id},function(data){
$("#Presentationerror").html(data);
confirmed=1;

})


//alert(executive_no)
//$("#Executive_"+executived).checked=true;
//alert()
}else{

	//alert("checked")
}
}
*/


//end of clerks

//add investors
//var innovation=btoa('<?php echo $innovation?>');
/*var executived='<?php echo $investorsd?>';
var account_type=btoa("Investor");
//var host_Id=btoa('<?php echo $host_Id?>');
for(d=1;d<=executived;d++){

	if($("#investor_"+d).prop("checked")){

var executive_no=btoa($("#investor_"+d).attr("role"));
var urlre="modules/system/executive/pages/evaluate/add_members.php";
$.post(""+urlre+"",{innovation:innovation,executive_no:executive_no,account_type:account_type,host_Id:host_Id},function(data){
$("#Presentationerror").html(data);
confirmed=1;

})


//alert(executive_no)
//$("#Executive_"+executived).checked=true;
//alert()
}else{

	//alert("checked")
}
}

*/

//end of investors



//end of clerks

//add innovators
//var innovation=btoa('<?php echo $innovation?>');
var executived='<?php echo $innovator_d?>';
var account_type=btoa("Innovator");
//var host_Id=btoa('<?php echo $host_Id?>');
for(d=1;d<=executived;d++){

  if($("#innovator_"+d).prop("checked")){

var executive_no=btoa($("#innovator_"+d).attr("role"));
var urlre="modules/system/executive/pages/evaluate/add_members.php";
$.post(""+urlre+"",{innovation:innovation,executive_no:executive_no,account_type:account_type,host_Id:host_Id},function(data){

confirmed=1;
})


//alert(executive_no)
//$("#Executive_"+executived).checked=true;
//alert()
}else{

  //alert("checked")
}
}

if(confirmed==1){
$.post("modules/system/executive/pages/evaluate/select_time.php",function(data){$("#home").html(data)})

//end of innovators
}else{
  
}








}else{
	  var innovation='<?php echo $innovation?>';
    var my_url="modules/system/executive/pages/evaluate/evaluate.php";
$.post(""+my_url+"",{innovation:innovation},function(data){
        $("#home").html(data);})


}



})
	})
</script>