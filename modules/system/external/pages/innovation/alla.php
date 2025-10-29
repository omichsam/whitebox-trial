<style type="text/css">
	#header_innovations{
		text-align: center;
		border-bottom: 1px solid #ccc;
		font-weight: bolder;
	}
	#innovation_wrapper{
		min-height: 200px;
		border-radius: 5px;
		box-shadow: 0 0 1px #ccc; 
	}
	#lower_foot{
		min-height: 100px;
	}
	#submit_innovation_holder{
		text-align: center;
		margin-top: 10px;
	}
	.textarea_p{
		border: 1px solid #ccc;
		resize: none;
		min-height: 50px;
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
.submit_radiosd {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.submit_radiosd input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmarkd {
  opacity: 1;
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #fff;
  border: 1px solid #000;
}

/* On mouse-over, add a grey background color */
.submit_radiosd:hover input ~ .checkmarkd {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.submit_radiosd input:checked ~ .checkmarkd {
  background-color: #2196F3;
}

/* Create the checkmarkd/indicator (hidden when not checked) */
.checkmarkd:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmarkd when checked */
.submit_radiosd input:checked ~ .checkmarkd:after {
  display: block;
}

/* Style the checkmarkd/indicator */
.submit_radiosd .checkmarkd:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
</style>
<?php
include "../../../../../connect.php";
$my_user=$_POST['my_id'];
include("../../../../functions/security.php");
//$salt="A0007799Wagtreeyty";
//$submit=encrypt("submission", $key);
 $oldstatus="pending";
 $new_status=encrypt($oldstatus, $key);
 // $new_status="6b7336564f3937355236464b693953304e50714a36716f365858447669562b383932635950796863436b413d";
$my_userde=encrypt($my_user, $key);
$get_user=mysql_query("SELECT User_id FROM external_users WHERE Email_address='$my_userde'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
$user_id=$get['User_id'];
//echo $user_id;

     $new_Innovation="";
      $new_Category="";
  $new_stage="";
   $petnership_implementors="";
    $patnership_innovators="";
    $funding="";
    $communities="";
    $named="";
	$part="Individual";

$check_implement="";
$check_partner="";
$check_fund="";
$check_other="";


$sqlx="SELECT * FROM innovations_table where user_id='$user_id' and Status='$new_status'";

    $query_runx=mysql_query($sqlx) or die($query_runx."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runx)){
  $Innovation_name=$row['Innovation_name'];
  $Category=$row['Category'];
  $stage=$row['stage'];
  //$date_added='date_added'];

	
   $Innovation_Id=$row['Innovation_Id'];
if($Category && $stage && $Innovation_name){
     $new_Innovation=base64_decode(decrypt($Innovation_name, $key));
      $new_Category=base64_decode(decrypt($Category, $key));
  $new_stage=base64_decode(decrypt($stage, $key));

$sqly="SELECT * FROM innovators_partners where Innovation_Id='$Innovation_Id'";
$query_runy=mysql_query($sqly) or die($query_runy."<br/><br/>".mysql_error());
    while($row=mysql_fetch_array($query_runy)){

    $names=$row['names'];
    if($names){
    	$part="Partnership";
    $named=base64_decode(decrypt($names, $key));
    }else{
	$named="";
	$part="";
     }

}
$sqld="SELECT * FROM innovation_expectation where Innovation_id='$Innovation_Id'";
$query_rund=mysql_query($sqld) or die($query_rund."<br/><br/>".mysql_error());
    while($row=mysql_fetch_array($query_rund)){
    $petnership_implementors=$row['petnership_implementors'];
    $patnership_innovators=$row['patnership_innovators'];
    $funding=$row['funding'];
    $communities=$row['communities'];
if($petnership_implementors){
$check_implement="checked";
}else{

}
if($patnership_innovators){
	$check_partner="checked";
}else{

}
if($funding){
	$check_fund="checked";
}else{

}

if($communities){
	$check_other="checked";
}else{

}
}













$mode="edit";
//$innovation=
}else{
$mode="save";
 $Innovation_Id="";
}
}
?>
<div class="col-sm-12 col-xs-12 " id="displayer">
<div class="col-sm-12 col-xs-12 no_padding">
	<div class="col-sm-4 col-xs-12"></div>
	<div class="col-sm-4 col-xs-12" id="header_innovations"><span class="">SUBMIT YOUR INNOVATION HERE</span></div>

</div>
<div class="col-sm-12 col-xs-12 no_padding" id="level_submition">
	<div class="col-xs-1 col-sm-3"></div>
	<div class="col-xs-11 col-sm-6">
	<div class="col-sm-1 col-xs-1 level_grows theme_bg">1</div>
	<div class="col-sm-2 col-xs-2 arro_grows"></div>
    <div class="col-sm-1 col-xs-1 level_grows"></div>
    <div class="col-sm-2 col-xs-2 arro_grows"></div>
    <div class="col-sm-1 col-xs-1 level_grows"></div>
    <div class="col-sm-2 col-xs-2 arro_grows"></div>
    <div class="col-sm-1 col-xs-1 level_grows"></div>
</div>
</div>
<div class="col-sm-3 col-xs-12"></div>,
<div class="col-sm-6 col-xs-12 no_padding" id="innovation_wrapper">
	<div class="col-sm-12 col-xs-12">
		Name of innovation
		<input type="text" placeholder="e.g: waste management max(70 characters)" value="<?php echo $new_Innovation?>" maxlength="70" id="innovation_name" class="splashinputs col-sm-12 col-xs-12">
	</div>

<div class="col-sm-12 col-xs-12">
Innovation category
		<select id="innovation_category" class="splashinputs">
		<option><?php echo $new_Category?></option>
       <option>Culture</option>
       <option>Heritage</option>
		</select>
	</div>
	<div class="col-sm-12 col-xs-12">
      Name of innovator/innovators 
		<select id="innovator_partners" class="splashinputs">
		<option><?php echo $part?></option>
       <option>Individual</option>
       <option>Company</option>
		</select>
	</div>
	
	<div class="col-sm-12 col-xs-12 not_shown" id="innovators_frt">
		Name the company involved.
		<textarea id="innovators_name" value="<?php echo $named ?>" placeholder="e.g : Powercard limited" class="textarea_p col-sm-12 col-xs-12"></textarea>
	</div>
	<!--
	<div class="col-sm-12 col-xs-12">
		What stage is the innovation at?

	 </div>
	<div class="col-sm-12 col-xs-12 ">
	<select class="splashinputs" id="stage">
		<option><?php echo $new_stage?></option>
		<option>Idea/concept</option>
		<option>Pilot stage</option>
		<option>In the market ready to expand</option>
	</select>
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
        <input type="checkbox" <?php echo $check_implement?>  id="implementers"  class="innovations_radio" role="implementers">
          <span class="checkmarkd"></span>
		   </label>
		</div>
	    <div class="col-sm-12 col-xs-12">


       <label style="font-weight: initial !important" class="submit_radiosd">
           Partnership with other innovators
        <input type="checkbox" <?php echo $check_partner?> id="patnership"  class="innovations_radio" role="patnership">
          <span class="checkmarkd"></span>
		   </label>
	    </div>
		<div class="col-sm-12 col-xs-12">

      <label style="font-weight: initial !important" class="submit_radiosd">
           Funding
        <input type="checkbox" <?php echo $check_fund ?> id="funding"  class="innovations_radio" role="funding">
          <span class="checkmarkd"></span>
		   </label>

	   </div>
	   <div class="col-sm-12 col-xs-12">

	   	<label style="font-weight: initial !important" class="submit_radiosd">
	   		Other
        <input type="checkbox" <?php echo $check_other ?> id="Communities"  class="innovations_radio" role="Communities">
          <span class="checkmarkd"></span>
		   </label>
       </div>
       -->
	   </div>
	 </div>
	
	
	<div class="col-sm-12 col-xs-12" id="submit_innovation_holder">
		<!--<span class="btn theme_bg not_shown " id="edit">Edit</span>-->
		<span class="btn theme_bg not_shown " id="next">Next Page</span>
		<span class="btn theme_bg <?php echo $savebton?>" id="save_innovation">Save and Proceed</span>
		<!--<span class="btn theme_bg <?php echo $editbuton?>" id="edit_innovation">Edit and Proceed</span>-->
	</div>
	<div class="col-sm-12 col-xs-12" id="error_displaye"></div>
	<div class="col-sm-12 col-xs-12" id="lower_foot">
		
	</div>
	
</div>


</div>
<!--<script type="text/javascript" src="js/scripts/save.js">
	
</script>-->
<script type="text/javascript">
	$(document).ready(function(){
$("#next").click(function(){
	$(".innovation_pages").hide()
	 $("#second_page").show();
})
	
$("#save_innovation").click(function(){
			 var loader=$("#loader").html()
			 var my_user=$("#global_u_email").val();
			 var stage=$("#stage").val()
			 var innovation_name=$("#innovation_name").val()
			 var innovators_name=$("#innovators_name").val()
			 var innovation_category=$("#innovation_category").val()
			 var inno_name=btoa(innovation_name);
			 var innovators=btoa(innovators_name);
			 var category=btoa(innovation_category);
			 var staged=btoa(stage);
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
             if($("#Communities").prop("checked")){
               var  Communities="Communities";
               var commn=btoa(Communities);
             }else{

             }
        
if(stage && innovation_name && innovation_category){

	if(fund || commn || implement || patner){
		  $("#error_displaye").html(loader)
      var mode=btoa('<?php echo $mode?>');
      var Innovation_Id=btoa('<?php echo $Innovation_Id?>');
      $.post("modules/system/external/pages/innovation/save_first.php",{
      	fund:fund,
      	commn:commn,
      	patner:patner,
      	implement:implement,
      	staged:staged,
      	inno_name:inno_name,
      	innovators:innovators,
      	category:category,
      	my_user:my_user,
        mode:mode,
        Innovation_Id:Innovation_Id
      },function(data){
     if($.trim(data)=="success"){
       $.post("modules/system/external/pages/innovation/second_page.php",{
      	fund:fund,
      	commn:commn,
      	patner:patner,
      	implement:implement,
      	staged:staged,
      	inno_name:inno_name,
      	innovators:innovators,
      	category:category,
      	my_user:my_user,
        mode:mode,
        Innovation_Id:Innovation_Id
      	},function(data){
      		$(".innovation_pages").hide(data)
      		$("#second_page").html(data).show()
      		$("#error_displaye").html("")
      		$("#next").show();
      		$("#save_innovation").hide()
      	})
     }else{
    $("#error_displaye").html(data)
     }

      })
}else{
	$("#error_displaye").html("")
	$("#alert_user").html("select atleast one option!").css("color","red");
}

}else{
	$("#error_displaye").html("Some fields are empty")
}
			
		})
		$("#innovator_partners").change(function(){
			var innovator_partners=$(this).val()
			if(innovator_partners=="Company"){
				$("#innovators_frt").show()

			}else{
               $("#innovators_frt").hide()
			}
		})
	})
</script>
