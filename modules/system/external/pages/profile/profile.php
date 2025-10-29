<style type="text/css">
  #profile_header{
    text-transform: uppercase;
    text-align: center;
    border-radius: 4px;
    border-bottom: 1px double #ccc;
  }
  .profile_display{
    box-shadow: 0 0 3px #ccc;
background: #f2f2f2;
    min-height: 200px;
    margin-top: 5px;
    border-radius:5px;
    padding-bottom: 10px;
  }
  #cok_holder{
    text-align: center;
    padding-top: 5px;
  }
  #update_error{
    text-align: center;
  }
  #submit_iknoo{
    margin-top: 5px;
  }
  #prot_hest{
    text-transform: uppercase;
    font-weight: bolder;
  }
</style>
<?php 
include "../../../../../connect.php";

$my_user=$_POST['my_id'];
include("../../../../functions/security.php");
//$salt="A0007799Wagtreeyty";

$newFirst_name="";
$newLast_name="";
$newnational_id="";
$newGender="";
//$County_id=$get['County_id'];
$newPhone="";
$neweducation_level="";
$my_userde=encrypt($my_user,$key);
$get_user=mysqli_query($con,"SELECT * FROM external_users WHERE Email_address='$my_userde'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);

$First_name=$get['First_name'];
$Last_name=$get['Last_name'];
$national_id=$get['national_id'];
$Gender=$get['Gender'];
$County_id=$get['County_id'];
$Phone=$get['Phone'];
$education_level=$get['education_level'];

if($First_name && $Last_name && $national_id && $Gender && $County_id && $Phone && $education_level){


$newFirst_name=base64_decode(decrypt($get['First_name'],$key));
$newLast_name=base64_decode(decrypt($get['Last_name'],$key));
$newnational_id=base64_decode(decrypt($get['national_id'],$key));
$newGender=base64_decode(decrypt($get['Gender'],$key));
//$County_id=$get['County_id'];
$newPhone=base64_decode(decrypt($get['Phone'],$key));
$neweducation_level=base64_decode(decrypt($get['education_level'],$key));
}else{

 // alert($Last_name);
}
$profile_edit="";
$shown_div="";
$my_heading="";
if($County_id){


$sqlx="SELECT County_name FROM county_table where id='$County_id'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $County=$row['County_name'];
  $profile_edit="not_shown";
$my_heading="My profile details";
}
}else{
 $County="";
 $my_heading="Update your profile details first";
$shown_div="not_shown";
  }

 ?>


<div class="col-sm-12 col-xs-12 no_padding">
<div class="col-sm-12 col-xs-12" >
<div class="col-sm-4 col-xs-12"></div>
<div class="col-sm-4 col-xs-12" id="profile_header">
  <span id="prot_hest"><?php echo $my_heading?></span>
</div>
</div>
<div class="col-xs-12 col-sm-12 no_padding " id="home_profd">
<div class="col-xs-12 col-sm-2"></div>
<div class="col-sm-8 col-xs-12 profile_display <?php echo $shown_div?>" id="profile_display">
<div class="col-xs-12 col-sm-6">
  <div class="col-xs-12 col-sm-12">
FIRST NAME:
<input type="text" disabled="" value="<?php echo $newFirst_name ?>" class="splashinputs">
</div>
 <div class="col-xs-12 col-sm-12">
LAST NAME:
<input type="text" disabled="" value="<?php echo $newLast_name ?>" class="splashinputs">
</div>
 <div class="col-xs-12 col-sm-12">
NATIONAL ID:
<input type="text" disabled="" value="<?php echo $newnational_id ?>" class="splashinputs">
</div>



</div>
<div class="col-xs-12 col-sm-6">
 <div class="col-xs-12 col-sm-6">
PHONE NUMBER:
<input type="text" disabled="" value="<?php echo $newPhone ?>" class="splashinputs">
</div>
 <div class="col-xs-12 col-sm-6">
GENDER:
<input type="text" disabled="" value="<?php echo $newGender ?>" class="splashinputs">
</div>
 <div class="col-xs-12 col-sm-12">
COUNTY:
<input type="text" disabled="" value="<?php echo $County ?>" class="splashinputs">
</div>
 
<div class="col-xs-12 col-sm-12">
HIGHEST EDUCATION LEVEL:
<input type="text" id="" minlength="10" disabled="" value="<?php echo $neweducation_level?>" maxlength="15" class="splashinputs">
</div>
</div>
<div class="col-xs-12 col-sm-6">
  

</div>
<div class="col-xs-12 col-sm-6" id="cok_holder">
  
<span class="btn theme_bg" id="edit_proft">Edit <i class="fa fa-edit fa-2x"></i></span>
</div>
</div>

</div>

<div class="col-xs-12 col-sm-12 no_padding">
<div class="col-xs-12 col-sm-2"></div>
<div class="col-sm-8 col-xs-12 profile_display <?php echo $profile_edit?>" id="profile_edit">
<div class="col-xs-12 col-sm-6">
  <div class="col-xs-12 col-sm-12">
FIRST NAME:
<input type="text" id="first_name" minlength="2" maxlength="20" value="<?php echo $newFirst_name?>"   class="splashinputs update_inputs">
</div>
 <div class="col-xs-12 col-sm-12">
LAST NAME:
<input type="text" id="last_name" minlength="2" value="<?php echo $newLast_name?>" maxlength="20"   class="splashinputs update_inputs">
</div>
<div class="col-xs-12 col-sm-12">
NATIONAL ID:
<input type="text" id="national_id" minlength="8" value="<?php echo $newnational_id?>" maxlength="15"    class="splashinputs update_inputs">
</div>


</div>
<div class="col-xs-12 col-sm-6">
  <div class="col-xs-12 col-sm-6">
PHONE NUMBER:
<input type="text"  minlength="10" id="phone_number" value="<?php echo $newPhone?>" maxlength="15" class="splashinputs">
</div>
 <div class="col-xs-12 col-sm-6">

GENDER:
<select type="text" id="gender"   class="splashinputs">
<option><?php echo $newGender?></option>
<option>MALE</option>
<option>FEMALE</option>
<option>OTHER</option>
</select>
</div>
 <div class="col-xs-12 col-sm-12">
COUNTY:
<select type="text" id="county"  class="splashinputs">
  <option><?php echo $County ?></option>
  <?php 
$sql="SELECT * FROM county_table where County_name!='$County' ORDER BY County_name ASC";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           $County_name=$row['County_name'];
            ?>

<option><?php echo $County_name ?></option>
<?php
}


?>


</select>
</div>
 <div class="col-xs-12 col-sm-12">
HIGHEST EDUCATION LEVEL:
<select type="text" id="highest_level" minlength="10"   maxlength="15" class="splashinputs">
  <option><?php echo $neweducation_level?></option>
<option>PhD</option>
<option>Masters</option>
<option>Bachelors</option>
<option>Diploma</option>
<option>Certificate</option>
<option>Secondary education</option>
<option>Primary education</option>
<option>Other</option>
</select>

</div>
</div>
<div class="col-xs-12 col-sm-6">
  

</div>
<div class="col-xs-12 col-sm-6" id="cok_holder">
 <span class="btn theme_bg not_shown" id="submit_iknoo">Click to Submit innovation </span>
 
<span class="btn theme_bg" id="save_updates">Save <i class="fa fa-save fa-2x"></i></span>

</div>
 <div  class="col-sm-12 col-xs-12" id="update_error"></div>
</div>

</div>


</div>

<script type="text/javascript">
  $(document).ready(function(){
    var my_id=$("#global_u_email").val();
    var loader=$("#loader").html()
    var new_headert="Update details";
$("#edit_proft").click(function(){

$("#prot_hest").html(new_headert)
$("#profile_edit").show();
$("#profile_display").hide();

})
$("#save_updates").click(function(){
  $("#update_error").html(loader)
   
  
var phone=btoa($("#phone_number").val())
var first_name=btoa($("#first_name").val())
var last_name=btoa($("#last_name").val())
var County=btoa($("#county").val())
var national_id=btoa($("#national_id").val())
var highest_level=btoa($("#highest_level").val())
var gender=btoa($("#gender").val())
var target="#home";
  var url="modules/system/external/pages/profile/update_profile.php";
  $.post(""+url+"",{
my_id:my_id,
phone:phone,
first_name:first_name,
last_name:last_name,
County:County,
national_id:national_id,
highest_level:highest_level,
gender:gender
},function(data){
 // alert(data)
  //alert(data)
  if($.trim(data)=="successfull"){
$("#save_updates").hide();
$("#submit_iknoo").show()
$("#update_error").html("")
  }else{
     $("#update_error").html(data)
   }
})

})

$("#submit_iknoo").click(function(){

$.post("modules/system/external/pages/innovation/innovations.php",{
my_id:my_id
  },function(data){
    //alert(data)

$("#home").html(data);

})


})

  })
</script>