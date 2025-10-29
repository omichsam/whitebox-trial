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
  .image_holders{
      min-height:150px;
      box-shadow:0 0 2px #ccc;
      border-radius:5px;
      margin-top:10px;
      background-repeat:no-repeat !important;
      background-size:100% 100% !important;
      background-position:center center !important;
  }
  #image_change{
      cursor:pointer;
  }
</style>
<?php 
include "../../../../../connect.php";
$my_user=$_POST['my_id'];
include("../../../../functions/security.php");
//$salt="A0007799Wagtreeyty";
$new_First_name="";
$new_company="";
$new_Location="";
$new_contact="";
$new_interest="";
$prof_rolesd="";
$my_userde=encrypt($my_user,$key);
$get_user=mysql_query("SELECT * FROM investors WHERE Email='$my_userde'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
$First_name=$get['Name'];
$company=$get['Company'];
$Location=$get['Location'];
$contact=$get['Contact'];
$interest=$get['interest'];
$introle=$get['role'];
 // alert($company);
$profile_edit="";
$shown_div="";
$my_heading="";
if($First_name && $company && $Location && $contact && $interest && $introle){
$new_First_name=base64_decode(decrypt($get['Name'],$key));
$new_company=base64_decode(decrypt($get['Company'],$key));
$new_Location=base64_decode(decrypt($get['Location'],$key));
$new_contact=base64_decode(decrypt($get['Contact'],$key));
$new_interest=base64_decode(decrypt($get['interest'],$key));
$prof_rolesd=base64_decode(decrypt($get['role'],$key));
$image=$get['image'];
if($image){
   $new_pic=base64_decode(decrypt($image,$key)); 
}else{
    $new_pic="images/user.jpg";
}

  $profile_edit="not_shown";
$my_heading="My profile details";

}else{
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
NAME:
<input type="text" disabled="" value="<?php echo $new_First_name ?>" class="splashinputs">
</div>
 <div class="col-xs-12 col-sm-12">
COMPANY NAME:
<input type="text" disabled="" value="<?php echo $new_company ?>" class="splashinputs">
</div>
<div class="col-xs-12 col-sm-12">
AREA OF INTEREST:
<input type="text" disabled="" value="<?php echo $new_interest ?>" class="splashinputs">
</div>
</div>
<div class="col-xs-12 col-sm-6">
<div class="col-xs-12 col-sm-12">
ROLE:
<input type="text" disabled="" value="<?php echo $prof_rolesd ?>" class="splashinputs">
</div>
 <div class="col-xs-12 col-sm-12">
LOCATION
<input type="text" disabled="" value="<?php echo $new_Location ?>" class="splashinputs">
</div>
<div class="col-xs-12 col-sm-12">
CONTACT
<input type="text" disabled="" value="<?php echo $new_contact ?>" class="splashinputs">
</div>

</div>
<div class="col-xs-12 col-sm-12">
<div class="col-xs-12 col-sm-4">
  

</div>
<div class="col-xs-12 col-sm-4 image_holders" id="image_holders" style="background:url('<?php echo $new_pic;?>')">
  
</div>
</div>

<div class="col-xs-12 col-sm-12">
<div class="col-xs-12 col-sm-3">
  

</div>
<div class="col-xs-12 col-sm-6" id="cok_holder">
  
<span class="btn theme_bg" id="edit_proft">Edit <i class="fa fa-edit fa-2x"></i></span>
</div>
</div>
</div>

</div>

<div class="col-xs-12 col-sm-12 no_padding">
<div class="col-xs-12 col-sm-2"></div>
<div class="col-sm-8 col-xs-12 profile_display <?php echo $profile_edit?>" id="profile_edit">
  
<div class="col-xs-12 col-sm-6">
  <div class="col-xs-12 col-sm-12">
NAME:
<input type="text" id="first_name" value="<?php echo $new_First_name ?>" minlength="2" maxlength="20" placeholder="E.g John"   class="splashinputs update_inputs">
</div>
 <div class="col-xs-12 col-sm-12">
COMPANY
<input type="text" id="company" value="<?php echo $new_company ?>" minlength="2" placeholder="E.g Kenya park plc" maxlength="20"   class="splashinputs update_inputs">
</div>
<div class="col-xs-12 col-sm-12">
AREA OF INTEREST

<select class="splashinputs" id="area_interest">
    <option></option>
    <option>Culture</option>
    <option>Heritage</option>
</select>
</div>
</div>
<div class="col-xs-12 col-sm-6">
<div class="col-xs-12 col-sm-12">
ROLE

<select class="splashinputs" id="role_interest">
    <option>Partnership</option>
    <option>Investor</option>
    <option>Implementer</option>
    <option>Other</option>
</select>
</div>
 <div class="col-xs-12 col-sm-12">
LOCATION
<input type="text" id="location" value="<?php echo $new_Location?>" minlength="2" placeholder="E.g Dandora" maxlength="15"    class="splashinputs update_inputs">
</div>
<div class="col-xs-12 col-sm-12">
CONTACT
<input type="text"  value="<?php echo $new_contact?>" minlength="10" id="phone_number" placeholder="E.g 0712345678" maxlength="15" class="splashinputs">
</div>
</div>
<div class="col-xs-12 col-sm-12">
    <div class="col-xs-12 col-sm-12">Click the image to change</div>
<div class="col-xs-12 col-sm-4">


</div>
<div class="col-xs-12 col-sm-4 no_padding  family_displays" id="family_displays">
 <div class="col-xs-12 col-sm-12 image_holders " id="image_change" style="background:url('<?php echo $new_pic;?>')">
 </div>
   <form action="modules/system/investor/pages/profile/upload_image.php"  id="update_myprof_form" name="update_myprof_form" class="not_shown col-sm-12 col-xs-12 no_padding"  method="POST" enctype="multipart/form-data">
<input type="text" value="<?php echo $my_user ?>" id="name" name="name" style="display: none;">
<input type="file" name="upfile" id="newprofpic" style="display: none;">
 <span id="upload_im_loader"></span>
							</form>
</div>
</div>
<div class="col-xs-12 col-sm-12">
<div class="col-xs-12 col-sm-3"></div>

<div class="col-xs-12 col-sm-6" id="cok_holder">
 
<span class="btn theme_bg" id="save_updates">Save <i class="fa fa-save fa-2x"></i></span>

</div>
 <div  class="col-sm-12 col-xs-12" id="update_error"></div>
</div>
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
   //var interested="";
   
 var interest=$("#area_interest").val();
 //alert(interest)
var phone=btoa($("#phone_number").val())
var first_name=btoa($("#first_name").val())
var company=btoa($("#company").val())
var location=btoa($("#location").val())
var target="#home";
  var url="modules/system/investor/pages/profile/update_profile.php";
  if(interest==""){
     $("#update_error").html("Select an area of interest!")
     $("#interest").css("border","2px solid red");
  }else{
    var role_interest=btoa($("#role_interest").val());  
  //  alert(role_interest)
  var interested=btoa(interest);
  $.post(""+url+"",{
role_interest:role_interest,
interested:interested,
my_id:my_id,
phone:phone,
first_name:first_name,
company:company,
location:location
},function(data){
 // alert(data)
  //alert(data)
  if($.trim(data)=="successfull"){
    $.post("modules/system/investor/pages/profile/ceck_agrement.php",{
my_id:my_id  
    },function(data){
     
$("#home").html(data);


})
//$("#save_updates").hide();
//$("#submit_iknoo").show()
$("#update_error").html("")
  }else{
     $("#update_error").html(data)
   }
})
}
})

/*$("#submit_iknoo").click(function(){

$.post("modules/system/investor/pages/innovation/innovations.php",{
my_id:my_id
  },function(data){
    //alert(data)

$("#home").html(data);

})


})*/
$("#image_change").click(function(){
	        $("#newprofpic").click();
	    })
$("#newprofpic").change(function(){
	        var profile=$(this).val()
	        var loader=$("#loader").html();
	       $("#image_change").css("background-image","url('')");
var formData = new FormData($("#update_myprof_form")[0]);
$("#image_change").html(loader);
	$.ajax({
		url : 'modules/system/investor/pages/profile/upload_image.php',
		method : 'POST',
		data : formData,
		contentType : false,
		cache : false,
		processData : false,
		success : function (response){
		                if($.trim(response)=="success"){
              
    var my_id=$("#global_u_email").val();
$.post("modules/system/investor/pages/profile/getpic.php",{
my_id:my_id
},function(data){
$("#family_displays").html(data);

}) 
		}else{
		 // alert(response)  
		}
		}
	})
	        
	        
	        
	        
	        
	    })

  })
</script>