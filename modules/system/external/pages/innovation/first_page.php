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
#update_company{
color:#e7663c;
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
 $mode="save";
 $Innovation_Id="";

     $new_Innovation="";
      $new_Category="";
       $new_Company="";
       $old_Company="";
       $named="";
       $company_names="not_shown";
 // $new_status="6b7336564f3937355236464b693953304e50714a36716f365858447669562b383932635950796863436b413d";
$my_userde=encrypt($my_user, $key);
$get_user=mysql_query("SELECT User_id FROM external_users WHERE Email_address='$my_userde'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
$user_id=$get['User_id'];
//echo $user_id;

 /* $new_stage="";
   $petnership_implementors="";
    $patnership_innovators="";
    $funding="";
    $communities="";
    $named="";
	$part="";

$check_implement="";
$check_partner="";
$check_fund="";
$check_other="";
*/

$sqlx="SELECT * FROM innovations_table where user_id='$user_id' and Status='$new_status'";

    $query_runx=mysql_query($sqlx) or die($query_runx."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runx)){
  $Innovation_name=$row['Innovation_name'];
  $Category=$row['Category'];
  $Company=$row['Company'];
  //$date_added='date_added'];

	
   $Innovation_Id=$row['Innovation_Id'];
if($Category && $Innovation_name){
     $new_Innovation=base64_decode(decrypt($Innovation_name, $key));
      $new_Category=base64_decode(decrypt($Category, $key));
 
  if($Company){
  $new_Company="Company";
  $company_names="";
   $named=decrypt($Company, $key);
  }else{
$new_Company="Individual";
  }
/*
$sqly="SELECT * FROM innovators_partners where Innovation_Id='$Innovation_Id'";
$query_runy=mysql_query($sqly) or die($query_runy."<br/><br/>".mysql_error());
    while($row=mysql_fetch_array($query_runy)){

    $names=$row['names'];
    if($names){
    	$part="Partnership";
    $named=base64_decode(decrypt($names, $key));
    }else{
	$named="";
	$part="Individual";
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

*/











$mode="edit";
//$innovation=
}else{
$mode="save";
 $Innovation_Id="";
  $new_Company="";
  $new_Innovation="";
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
		<input type="text" placeholder="e.g: waste management max(150 characters)" value="<?php echo $new_Innovation?>" maxlength="150" id="innovation_name" class="splashinputs col-sm-12 col-xs-12">
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
		<option><?php echo $new_Company?></option>
       <option>Individual</option>
       <option>Company</option>
		</select>
	</div>
	
	<div class="col-sm-12 col-xs-12 <?php echo $company_names ?>" id="innovators_frt">
		Name the company involved.
		<textarea id="company_name" onkeyup="uppdatecompany(this.value)" maxlength="200" minlength="3" value="<?php echo $named ?>" placeholder="e.g : Powercard limited" class="textarea_p col-sm-12 col-xs-12"><?php echo $named ?></textarea>

    <div class="col-sm-12 col-xs-12 words_count" id="update_company" >&nbsp;</div>
	</div>
</div>
	 </div>
	
	
	<div class="col-sm-12 col-xs-12" id="submit_innovation_holder">
		<span class="btn theme_bg not_shown " id="next">Next Page</span>
		<span class="btn theme_bg <?php echo $savebton?>" id="save_innovation">Save and Proceed</span>
</div>
	<div class="col-sm-12 col-xs-12" id="error_displaye"></div>
	<div class="col-sm-12 col-xs-12" id="lower_foot">
		
	</div>
	
</div>


</div>
<!--<script type="text/javascript" src="js/scripts/save.js">
	
</script>-->
<script type="text/javascript">
   function uppdatecompany(str) {
  var lng = str.length;
  document.getElementById("update_company").innerHTML = lng + ' out of 200 characters';
}
	$(document).ready(function(){
    var my_id=$("#global_u_email").val();
   var mode='<?php echo $mode ?>';

    var Innovation_id="";
    Innovation_Id=btoa('<?php echo $Innovation_Id ?>');
    if(Innovation_Id){

    }else{
     // alert()
    }
    //alert(Innovation_Id)
$("#next").click(function(){
	$(".innovation_pages").hide()
	 $("#second_page").show();
})
	
$("#save_innovation").click(function(){
			var loader=$("#loader").html();
      var company_name="";
      $("#error_displaye").html(loader);
      var innovator_partners=$("#innovator_partners").val()
      if(innovator_partners=="Company"){
      company_name=$("#company_name").val()
        if(company_name){
        
        }else{
      $("#innovators_name").attr("placeholder","can not be empty!").css("color","red")
      $("#error_displaye").html("Name the company involved.")
        }
      }else{

      }
    var innovation_name=btoa($("#innovation_name").val());
      var innovation_category=btoa($("#innovation_category").val())
      if(innovation_name && innovation_category && innovator_partners){
      var my_id=$("#global_u_email").val();
   var mode=btoa('<?php echo $mode ?>');

    var Innovation_id=btoa('<?php echo $Innovation_Id ?>');
   /* if(mode){

    }else{
      mode="save";
    }
    if(Innovation_Id){

    }else{
      Innovation_Id="";
    }
*/
    var save_first="modules/system/external/pages/innovation/save_first.php";
    var second_url="modules/system/external/pages/innovation/second_page.php";
    var my_id=$("#global_u_email").val();
      var new_mode=btoa(mode);

     $.post(""+save_first+"",{
 
    mode:mode,
    Innovation_Id:Innovation_Id,
    my_id:my_id,
     innovation_category:innovation_category,
     company_name:company_name,
     Innovation_name:innovation_name

     },function(data){
      if($.trim(data)=="success"){

      

      $.post(""+second_url+"",{
     mode:mode,
    Innovation_Id:Innovation_Id,
    my_id:my_id,
     innovation_category:innovation_category,
     company_name:company_name,
     Innovation_name:innovation_name
      },function(data){
     $("#second_page").html(data).show()
     $("#first_page").hide();
     $("#error_displaye").html("")
      })
     }else{
      $("#error_displaye").html(data)
    }
     })





      }else{
        $("#error_displaye").html("All fields required!");
      }



		})

		$("#innovator_partners").change(function(){
			var innovator_partners=$(this).val()
			if(innovator_partners=="Company"){
				$("#innovators_frt").show();

			}else{
        $("#innovators_frt").hide();
			}
		})
	})
</script>
