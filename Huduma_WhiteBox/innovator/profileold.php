<?php 
include("../../base_connect.php");
include("../../connect.php");
 $male="";
 $female="";
 $University_id="";
 $EducationLevel_id="";
 $College="";
 $Certifications="";
 $EducationLevelName="";
 $UniversityName="";
 $SecondarySchool="";
 $PrimarySchool="";
 $county_name="";
$fUniversity_id="";
$countryName="";
$user=base64_decode($_SESSION["username"]);
$get_user=mysqli_query($con,"SELECT * FROM users WHERE email='$user'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
if($get){
$first_name=$get['first_name'];
 $last_name=$get['last_name'];
 $bio=$get['bio'];
 $gender=$get['gender'];
 $user_id=$get['id'];
 $dob=$get['dob'];
 $pic=$get['pic'];
 $country=$get['country'];
 $county_id=$get['county_id'];
 $user_state=$get['user_state'];
 $city=$get['city'];
 $address=$get['address'];
 $postal=$get['postal'];
 $provider=$get['provider'];
 $provider_id=$get['provider_id'];
 $county=$get['county'];
 $phone=$get['phone'];
 $email=$get['email'];

 if($gender=="male"){
  $male="checked";
 }else{
  $female="checked";
 }
 }else{
    
}
$get_education=mysqli_query($con,"SELECT * FROM education WHERE user_id='$user_id'") or die(mysqli_error($con));
$geteducation=mysqli_fetch_assoc($get_education);
if($geteducation){
$fUniversity_id=$geteducation['University_id'];
 $EducationLevel_id=$geteducation['EducationLevel_id'];
 $College=$geteducation['College'];
 $PrimarySchool=$geteducation['PrimarySchool'];
 $SecondarySchool=$geteducation['SecondarySchool'];
 $Certifications=$geteducation['Certifications'];
}else{

}
//get university
$get_university=mysqli_query($con,"SELECT * FROM universities WHERE id='$fUniversity_id'") or die(mysqli_error($con));
$getuniversity=mysqli_fetch_assoc($get_university);
if($getuniversity){


 $UniversityName=$getuniversity['UniversityName'];
}else{
}
 $geteducation_levels=mysqli_query($con,"SELECT * FROM education_levels WHERE id='$EducationLevel_id'") or die(mysqli_error($con));
$geteducationlevels=mysqli_fetch_assoc($geteducation_levels);
if($geteducationlevels){

 $EducationLevelName=$geteducationlevels['EducationLevelName'];
}else{

}

 //country
  $getcountry=mysqli_query($con,"SELECT * FROM countries WHERE sortname='$country'") or die(mysqli_error($con));
$getecountry=mysqli_fetch_assoc($getcountry);
if($getecountry){
 $countryName=$getecountry['name'];
}else{

}
//get counties
  $getccounties=mysqli_query($con,"SELECT * FROM counties WHERE serial_no='$county_id'") or die(mysqli_error($con));
$getcounties=mysqli_fetch_assoc($getccounties);
if($getcounties){

 $county_name=$getcounties['county_name'];
}else{

}

?>
<script type="text/javascript">
    $(document).ready(function(){
       // alert()
        var loader=$("#loader").html();
        $("#save_profile").click(function(){
            $("#profile_erros").html("Saving"+ loader)
        })
    })
</script>
<style type="text/css">
    .require{
        color: red;
    }
</style>
  <script type="text/javascript" src="Huduma_WhiteBox/js/jquery.js"></script>
<div class="col-md-12 no_padding col-xs-12">

<div class="col-md-12 no_padding col-xs-12" style="text-align: center;">
            <h3>My Account</h3>
        </div>
      

                          
                    
                        <form action="modules/system/investor/pages/profile/upload_image.php"  id="update_myprof_form" name="update_myprof_form"  method="POST" accept-charset="UTF-8" class="form-horizontal col-md-12 no_padding" enctype="multipart/form-data">
                        <div class="form-group col-md-4 infor_wrappers no_padding">
                              <h3 class="text-primary"style="text-align:center" id="title">Personal Information </h3>
                            <label class="col-md-3 control-label">&nbsp;</label>
                            <div class="col-md-6" id="pic_loader">
                              

                            </div>
                            <div class="no_padding col-md-12">
                            <label class="col-lg-3 no_padding control-label">
                                First Name:
                                <span class="require">*</span>
                            </label>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <span class="input-group-addon">
                        <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#418bca" data-hc="#418bca" id="livicon-11" style="width: 16px; height: 16px;"></i>
                                    </span>
                                    <input type="text" required placeholder=" " name="first_name" id="uf-name" class="form-control" value="<?php echo $first_name ?>">
                                </div>
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="no_padding col-md-12">
                            <label class="col-lg-3 no_padding control-label">
                                Last Name:
                                <span class="require">*</span>
                            </label>
                            <div class="col-lg-9">
                                <div class="input-group">
                                            <span class="input-group-addon">
                        <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#418bca" data-hc="#418bca" id="livicon-12" style="width: 16px; height: 16px;"></i>
                                            </span>
                                    <input type="text" required placeholder=" " name="last_name" id="ul-name" class="form-control" value="<?php echo $last_name ?>"></div>
                                <span class="help-block"></span>
                            </div>
                        </div>

  <div class="no_padding col-md-12">
                         <label class="col-lg-3 control-label">Gender: </label>
                            <div class="col-lg-9">
                                <div class="radio">
                                    <label>
                                        <div class="iradio_minimal-blue checked" style="position: relative;">
                                            <input type="radio" name="gender" value="male" <?php echo $male?> ></div>
                                        Male
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <div class="iradio_minimal-blue" style="position: relative;">
                                            <input type="radio" name="gender" <?php echo $female?> value="female"></div>
                                        Female
                                    </label>
                                </div>

                            </div>
                    </div>
                     
                     </div>
 <div class="form-group col-md-4 infor_wrappers ">
     

                     <div class="no_padding col-md-12">
                   <label class="col-lg-3 control-label">
                                DOB:
                            </label>
                            <div class="col-lg-9">
                                <div class="input-group">
                                            <span class="input-group-addon">
                        <i class="livicon" data-name="calendar" data-size="16" data-loop="true" data-c="#418bca" data-hc="#418bca" id="livicon-13" style="width: 16px; height: 16px;"></i>
                                            </span>
                                    
                                    
                                                                            <input id="datepicker" class="form-control" data-date-format="YYYY-MM-DD" name="dob" type="date" value="<?php echo $dob?>">
                                                                    </div>
                                <span class="help-block"></span>
                            </div>

                     </div>
                      <div class="col-md-12 no_padding">
        
         <label for="" class="col-lg-3 control-label">Tell us who you are
                                <small>(brief intro):</small>
                            </label>
                            <div class="col-lg-9">
                                            <textarea required="" name="bio" id="bio" class="form-control resize_vertical" rows="4"><?php echo $bio?></textarea>
                            </div>
                            
    </div>
    <div class="col-md-12 no_padding">
<h3 class="text-primary"style="text-align:center" id="title">Education Background </h3>

    </div>

  


       <div class="col-md-12 no_padding">
<label class="control-label  col-lg-3">Highest Level of Education:
                                <span class="require">*</span> </label>
                            <div class="col-lg-9 no_padding">
                            <select required="" class="form-control select2" id="educationlevels" name="EducationLevel_id">

<?php
if($EducationLevelName==""){
$educated="not_shown";
}else{
$educated="";
}
?>

<option class="<?php echo $educated?>"><?php echo $EducationLevelName?></option>

                                <option></option>
                             <?php 
$sql="SELECT * FROM education_levels";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           $EducationLevelName=$row['EducationLevelName'];
            ?>

<option><?php echo $EducationLevelName ?></option>
<?php
}


?>
                        </select>
                            
                                <span class="help-block">
                                </span>
                                <!-- <class
                                ="form-control" value="Allan"> -->
                            </div>
                        </div>
  <div class="col-md-12 no_padding">
          <label class="control-label  col-lg-3">Univerity Attended:
                                <span class="require">*</span></label>
                            <div class="col-lg-9 no_padding">
                           <select required="" class="form-control select2" id="universities" name="University_id">

<?php
if($UniversityName==""){
$euniversityd="not_shown";
}else{
$euniversityd="";
}
?>

<option class="<?php echo $euniversityd?>"><?php echo $UniversityName?></option>
  <option></option>
  <?php 
$sql="SELECT * FROM universities";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           $UniversityName=$row['UniversityName'];
            ?>

<option><?php echo $UniversityName ?></option>
<?php
}


?>


</select>
    </div>
     </div>
  <div class="col-md-12 no_padding">
       <label class="col-lg-3 control-label">
                                Secondary School Attended:
                                <span class="require">*</span>
                            </label>
                            <div class="col-lg-9 no_padding">
                                <div class="input-group">
                                    <span class="input-group-addon">
                        <i class="" data-size="16"></i>
                                    </span>
                        <input type="text" required="" value="<?php echo $SecondarySchool?>" placeholder=" " name="SecondarySchool" id="SecondarySchool" class="form-control">
                                    

                                </div>
                                <span class="help-block"></span>
                            </div>


  </div>
 <div class="col-md-12 no_padding">
       <label class="col-lg-3 control-label">
                                Primary School Attended:
                                <span class="require">*</span>
                            </label>
                            <div class="col-lg-9 no_padding">
                                <div class="input-group">
                                    <span class="input-group-addon">
                        <i class="" data-size="16"></i>
                                    </span>
                        <input type="text" required="" value="<?php echo $PrimarySchool?>" placeholder=" " name="PrimarySchool" id="PrimarySchool" class="form-control">
                                    

                                </div>
                                <span class="help-block"></span>
                            </div>


  </div>

  



    </div>
 <div class="form-group col-md-4 infor_wrappers ">
 <div class="col-md-12 no_padding">
        <label class="col-lg-3 control-label">
                                College:
                                <span class="require">*</span>
                            </label>
                            <div class="col-lg-9 no_padding">
                                <div class="input-group">
                                    <span class="input-group-addon">
                        <i class=" " data-size="16"></i>
                                    </span>
                                 <input type="text" required placeholder=" " value="<?php echo $College?>" name="College" id="College" class="form-control" \>
                                    
                                   
                                </div>
                                <span class="help-block"></span>

                            </div>
   </div>

<div class="col-md-12 no_padding">
<label class="col-lg-3 control-label">
                                Certifications:
                                <span class="require">*</span>
                            </label>
                            <div class="col-lg-9 no_padding">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                     <i class=" " data-size="16"></i>
                                    </span>
                                   <input type="text" required placeholder=" " id="Certifications" value="<?php echo $Certifications?>" name="Certifications" class="form-control">
                                    
                                </div>
                                <span class="help-block"></span>
                            </div>

</div>


    <div class="col-md-12 no_padding">
 <h3 class="text-primary" id="title" style="text-align: center;">Contact: </h3>
</div>
<div class="col-md-12 no_padding">
 <label class="col-lg-3 control-label">
                                Email:
                                <span class="require">*</span>
                            </label>
                            <div class="col-lg-9 no_padding">
                                <div class="input-group">
                                <span class="input-group-addon">
                                <i class="livicon" data-name="mail" data-size="16" data-loop="true" data-c="#418bca" data-hc="#418bca" id="livicon-14" style="width: 16px; height: 16px;"></i>
                                </span>
                                    <input type="text" required placeholder=" " id="email" name="email" class="form-control" value="<?php echo $email?>"></div>
                                <span class="help-block"></span>
                            </div>
    </div>
<div class="col-md-12 no_padding">
     <label class="col-lg-3 control-label">
                                Address:
                            </label>
                            <div class="col-lg-9 no_padding">
                                            <textarea required="" rows="5" cols="30" class="form-control resize_vertical" id="add1" name="address"><?php echo $address?></textarea>
                            </div>
                            <span class="help-block"></span>
</div>
<div class="col-md-12 no_padding">&nbsp;</div>
<div class="col-md-12 no_padding">
    <label class="control-label  col-lg-3">Select Country: </label>
                            <div class="col-lg-9 no_padding">
                                <select required="" class="form-control select2 select2-hidden-accessible" id="countries" name="country" tabindex="-1" aria-hidden="true">




<?php
if($countryName==""){
$dcounty="not_shown";
}else{
$dcounty="";
}
?>

<option class="<?php echo $dcounty?>"><?php echo $countryName?></option>
<option></option>
  <?php 
$sql="SELECT * FROM countries";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           $country_name=$row['name'];
            ?>

<option><?php echo $country_name ?></option>
<?php
}


?>

                                </select>
                            </div>
</div>
<div class="col-md-12 no_padding">
           <label class="control-label  col-lg-3">Select County: </label>
                            <div class="col-lg-9 no_padding">
                                                        <select required="" class="form-control select2" id="counties" name="county_id">
 
<?php
if($county_name==""){
$dcountrty="not_shown";
}else{
$dcountrty="";
}
?>

<option class="<?php echo $dcountrty?>"><?php echo $county_name?></option>
 <option></option>
  <?php 
$sql="SELECT * FROM counties";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           $county_name=$row['county_name'];
            ?>

<option><?php echo $county_name ?></option>
<?php
}


?>

                                                        </select>
                            
                                <span class="help-block"></span>
                            </div>
</div>



 </div>












 </div>
<div class="col-md-12 no_padding col-xs-12">
    <div class="col-lg-offset-2 col-lg-10" style="text-align: center;">
                                <button class="btn btn-primary" id="save_profile">Save Details</button>
                            </div>
</div>
<div class="col-md-12 no_padding col-xs-12" id="profile_erros" style="text-align: center;">&nbsp;</div>
                    </form>
                        
</div>

<script type="text/javascript">
    $(document).ready(function(){
      //  alert()
      $.get("Huduma_WhiteBox/innovator/profile/getpic.php",{

},function(data){
$("#pic_loader").html(data);

}) 
        var loader=$("#loader").html();
        $("#save_profile").click(function(){

   var first_name=$("#uf-name").val()
   var last_name=$("#ul-name").val();
   var datepicker=$("#datepicker").val()
   var universities=$("#universities").val();
   var educationlevels=$("#educationlevels").val();
   var SecondarySchool=$("#SecondarySchool").val();
   var College=$("#College").val();

   var bio=$("#bio").val();
   var PrimarySchool=$("#PrimarySchool").val()
   var Certifications=$("#Certifications").val()
   var email=$("#email").val();
   var add1=$("#add1").val()
   var countries=$("#countries").val();
   var counties=$("#counties").val();

if(first_name && PrimarySchool && last_name && datepicker && universities && educationlevels && SecondarySchool && College && bio && Certifications && email && add1 && counties && counties ){
 $("#profile_erros").html("Saving..."+ loader)
var formData = new FormData($("#update_myprof_form")[0]);
//$("#image_change").html(loader);
    $.ajax({
        url : 'Huduma_WhiteBox/innovator/profile/update_details.php',
        method : 'POST',
        data : formData,
        contentType : false,
        cache : false,
        processData : false,
        success : function (response){
            var dresponce=atob(response);
                        if($.trim(dresponce)=="success"){
                            var fname=$("#uf-name").val();
                             $("#profile_erros").html("")
               $("#home_display").hide().html("");
  $(".dashboard_holder").show(); 
  $("#content_divesr").html("dashboard_holder");
  $("#dashpdrt").html("Welcom "+fname);
  $('html, body').animate({scrollTop: '0px'}, 300);  

        }else{
          $("#profile_erros").html("Sorry, an error occured..."); 
        }
        }
    })




}else{
   $("#profile_erros").html("All fields required!").css("color","red")  
}




           




        })
$("#change_image").click(function(){
$("#pic").click();
})

$("#pic").change(function(){
            var profile=$(this).val()
            var loader=$("#loader").html();
           $("#image_change").css("background-image","url('')");
var formData = new FormData($("#update_myprof_form")[0]);
$("#image_change").html(loader);
    $.ajax({
        url : 'Huduma_WhiteBox/innovator/profile/upload_image.php',
        method : 'POST',
        data : formData,
        contentType : false,
        cache : false,
        processData : false,
        success : function (response){
                        if($.trim(response)=="success"){
              
    var my_id=$("#global_u_email").val();
$.get("Huduma_WhiteBox/innovator/profile/getpic.php",{

},function(data){
$("#pic_loader").html(data);

}) 
        }else{
         // alert(response)  
        }
        }
    })
            
            
            
            
            
        })

    })
</script>