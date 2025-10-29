<?php 
include("../../base_connect.php");
include("../../connect.php");
$yeard=date('Y');
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
$education_high="";
$user=base64_decode($_SESSION["username"]);
//echo $user."user";
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
 $education_high=$geteducation['education_high'];

 if($education_high){
 $education_d="";
 }else{
$education_d="not_shown";
 }
}else{

}
//echo $College."education college";
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
      

                          
                    
                        <form action=""  id="update_myprof_form" name="update_myprof_form"  method="POST" accept-charset="UTF-8" class="form-horizontal col-md-12 no_padding" enctype="multipart/form-data">
                        <div class="form-group col-md-12 infor_wrappers no_padding">
                          <input type="text" required="" name="fkey" hidden="">
                            <div class="col-md-12" style="border-top:2px dashed #ccc">
                              <h3 class="text-primary"style="text-align:center;margin-top: -5px;" id="title">Personal Information </h3>
                          </div>
                                <div class="form-group col-md-4 infor_wrappers no_padding">
                            <label class="col-md-3 control-label">&nbsp;</label>
                            <div class="col-md-6" id="pic_loader">
                              

                            </div>
                        </div>

                                <div class="form-group col-md-4 infor_wrappers no_padding">
                            <div class="no_padding col-md-12">
                            <label class="col-lg-3 no_padding control-label">
                                First Name:
                                <span class="require">*</span>
                            </label>
                            <div class="col-lg-9">
                                <div class="input-group">
                                    <span class="input-group-addon">
                        <!--<i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#418bca" data-hc="#418bca" id="livicon-11" style="width: 16px; height: 16px;"></i>-->
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
                        <!--<i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#418bca" data-hc="#418bca" id="livicon-12" style="width: 16px; height: 16px;"></i>-->
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
                                DOB:<span class="require">*</span>
                            </label>
                            <div class="col-lg-9">
                                <div class="input-group">
                                            <span class="input-group-addon">
                                            </span>
                                    
                                    
                                                                            <input required="" id="datepicker" class="form-control" data-date-format="YYYY-MM-DD" name="dob" type="date" value="<?php echo $dob?>">
                                                                    </div>
                                <span class="help-block" id="date_error"></span>
                            </div>

                     </div>
                      <div class="col-md-12 no_padding">
        
         <label for="" class="col-lg-3 control-label">Tell us who you are
                                <small>(brief intro):</small>
                            </label>
                            <div class="col-lg-9">
                                            <textarea  name="bio" id="bio" class="form-control resize_vertical" rows="4"><?php echo $bio?></textarea>
                            </div>
                            
    </div>
</div>
    <div class="col-md-12 no_padding" style="border-top:2px dashed #ccc;margin-top: -10px;">
<h3 class="text-primary"style="text-align:center;margin-top: -10px;" id="title">Education Background </h3>

    </div>

   <div class="form-group col-md-4 infor_wrappers no_padding">
   <div class="col-md-12 no_padding">
       <label class="col-lg-3 control-label">
                                Highest Institution Attended:
                                <span class="require">*</span>
                            </label>
                            <div class="col-lg-9 no_padding">
                                <div class="input-group">
                                    <span class="input-group-addon">
                        <i class="" data-size="16"></i>
                                    </span>
                       <select required="" class="form-control select2" id="education_high" name="education_high">
                        <option class="<?php echo $education_d?>"><?php echo $education_high?></option>
                        <option></option>
                        <option>University</option>
                        <option>College</option>
                        <option>Secondary Education</option>
                        <option>Primary Education</option>
                       </select>
                                    

                                </div>
                            </div>


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
           $Educationid=$row['id'];
            ?>

<option id="<?php echo "school_$Educationid"?>"><?php echo $EducationLevelName ?></option>
<?php
}


?>
                        </select>
                            
                                <span class="help-block" id="education_error">
                                </span>
                                <!-- <class
                                ="form-control" value="Allan"> -->
                            </div>
                        </div>

                    </div>

   <div class="form-group col-md-4 infor_wrappers no_padding">
  <div class="col-md-12 no_padding universityg">
          <label class="control-label  col-lg-3">Univesity Attended:
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
  <div class="col-md-12 no_padding high_school">
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
                            </div>


  </div>


  



    </div>
 <div class="form-group col-md-4 infor_wrappers ">
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
 <div class="col-md-12 no_padding colleges">
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

<div class="col-md-12 no_padding colleges">
<label class="col-lg-3 control-label">
                                Certifications:                            </label>
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

</div>
    <div class="col-md-12 no_padding" style="border-top:2px dashed #ccc;margin-top: -12px;">
 <h3 class="text-primary" id="title" style="text-align: center;margin-top: -10px;">Contact: </h3>
</div>

   <div class="form-group col-md-4 infor_wrappers no_padding">
<div class="col-md-12 no_padding">
 <label class="col-lg-3 control-label">
                                Email:
                                <span class="require">*</span>
                            </label>
                            <div class="col-lg-9 no_padding">
                                <div class="input-group">
                                <span class="input-group-addon">
                               <!-- <i class="livicon" data-name="mail" data-size="16" data-loop="true" data-c="#418bca" data-hc="#418bca" id="livicon-14" style="width: 16px; height: 16px;"></i>-->
                                </span>
                                    <input type="text" required placeholder=" " id="email" name="email" class="form-control" value="<?php echo $email?>"></div>
                                <span class="help-block"></span>
                            </div>
    </div>
    <div class="col-md-12 no_padding">&nbsp;</div>
<div class="col-md-12 no_padding">
    <label class="control-label  col-lg-3">Select Country:
                                <span class="require">*</span> </label>
                            <div class="col-lg-9 no_padding">
                                <select required="" class="form-control select2 select2-hidden-accessible" id="countries" name="country" tabindex="-1" aria-hidden="true">




<?php
$show_counted="not_shown";
if($countryName=="Kenya"){
$show_counted="";
}else{
$show_counted="not_shown";
}
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
</div>

   <div class="form-group col-md-4 infor_wrappers no_padding">
<div class="col-md-12 no_padding">
     <label class="col-lg-3 control-label">
                                Address:
                            </label>
                            <div class="col-lg-9 no_padding">
                                            <textarea rows="5" cols="30" class="form-control resize_vertical" id="add1" name="address"><?php echo $address?></textarea>
                            </div>
                            <span class="help-block"></span>
</div>
</div>

   <div class="form-group col-md-4 infor_wrappers no_padding">

<div class="col-md-12 no_padding county_dive <?php echo $countryName?>" >
           <label class="control-label  col-lg-3">Select County:
                                <span class="require">*</span> </label>
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
      $("#countries").change(function(){
        var countries=$("#countries").val();
        //alert(countries)
        if(countries=="Kenya"){
        $(".county_dive").show();
        }else{
        $(".county_dive").hide();
        }
      })
      //  alert()

  var my_id=$("#user_email").val();
      $.post("Huduma_WhiteBox/innovator/profile/getpic.php",{my_id:my_id},function(data){
$("#pic_loader").html(data);

}) 
 var loader=$("#loader").html();
 $("#save_profile").click(function(){

   var first_name=$("#uf-name").val()
   var last_name=$("#ul-name").val();
   var datepicker=$("#datepicker").val()
   var education_high=$("#education_high").val();
   var ready_highlevel="";

    if(education_high){
    if(education_high=="College"){
     
var educationlevels=$("#educationlevels").val();
if(educationlevels=="Certificate" || educationlevels=="Ordinary diploma" || educationlevels=="Other"){
var SecondarySchool=$("#SecondarySchool").val();
var PrimarySchool=$("#PrimarySchool").val();
var College=$("#College").val();
var Certifications=$("#Certifications").val();

if(SecondarySchool && PrimarySchool && College){
ready_highlevel="ready";
 $("#profile_erros").html("").css("color","#000");
 $("#education_error").html("");
}else{
  $("#profile_erros").html("Both College,Secondary School and Primary school required!").css("color","red");
ready_highlevel="";
}

}else{
  $("#education_error").html("Select the corect education level");
ready_highlevel="";
 $("#profile_erros").html("Fields required!").css("color","red");
}






    }else if(education_high=="Secondary Education"){

var educationlevels=$("#educationlevels").val();
if(educationlevels=="Certificate" || educationlevels=="Other"){
var SecondarySchool=$("#SecondarySchool").val();
var PrimarySchool=$("#PrimarySchool").val();

if(SecondarySchool && PrimarySchool){
ready_highlevel="ready";
 $("#profile_erros").html("").css("color","#000");
 $("#education_error").html("");
}else{
  $("#profile_erros").html("Both Secondary School and Primary school required!").css("color","red");
ready_highlevel="";
}

}else{
  $("#education_error").html("Select the corect education level");
ready_highlevel="";
 $("#profile_erros").html("Fields required!").css("color","red");
}

















    
    }else if(education_high=="Primary Education"){

var educationlevels=$("#educationlevels").val();
if(educationlevels=="Certificate" || educationlevels=="Other"){
var PrimarySchool=$("#PrimarySchool").val();

if(PrimarySchool){
ready_highlevel="ready";
 $("#profile_erros").html("").css("color","#000");
 $("#education_error").html("");
}else{
  $("#profile_erros").html("Primary school required!").css("color","red");
ready_highlevel="";
}

}else{
  $("#education_error").html("Select the corect education level");
ready_highlevel="";
 $("#profile_erros").html("Fields required!").css("color","red");
}














  }else if(education_high=="University"){

var educationlevels=$("#educationlevels").val();
if(educationlevels=="Doctor of philosophy(phD)" || educationlevels=="Masters degree" || educationlevels=="Undergraduate degree" || educationlevels=="Postgraduate diploma" || educationlevels=="Ordinary diploma" || educationlevels=="Certificate" || educationlevels=="Other"){
var SecondarySchool=$("#SecondarySchool").val();
var universities=$("#universities").val();
var PrimarySchool=$("#PrimarySchool").val();
//var College=$("#College").val();
//var Certifications=$("#Certifications").val();

if(SecondarySchool && PrimarySchool && universities){
ready_highlevel="ready";
 $("#profile_erros").html("").css("color","#000");
 $("#education_error").html("");
}else{
  $("#profile_erros").html("Both University,Secondary School and Primary school required!").css("color","red");
ready_highlevel="";
}

}else{
  $("#education_error").html("Select the corect education level");
ready_highlevel="";
 $("#profile_erros").html("Fields required!").css("color","red");
}










        
}else{
      

    }


}else{
  
}










   var education_high=$("#education_high").val();
  // alert(education_high)
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

if(first_name && last_name && datepicker && ready_highlevel && education_high && educationlevels && email && countries){
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

$("#education_high").change(function(){
    var myprole=$(this).val();

    if(myprole){
  //  alert(myprole)
    if(myprole=="College"){
        $(".high_school").show();
        $(".colleges").show();
        $(".universityg").hide();
         for(D=1;D<=5;D++){
        $("#school_"+D).show();
}
        for(D=1;D<=4;D++){
        $("#school_"+D).hide();
}
    }else if(myprole=="Secondary Education"){
        $(".colleges").hide();
        $(".universityg").hide();

        $(".high_school").show();
    for(D=1;D<=5;D++){
        $("#school_"+D).hide();
}
    }else if(myprole=="Primary Education"){
        $(".colleges").hide();
        $(".universityg").hide();
        $(".high_school").hide();
 for(D=1;D<=5;D++){
        $("#school_"+D).hide();
}
    }else if(myprole=="University"){
        $(".colleges").hide();
        $(".high_school").show();
         $(".universityg").show();
for(D=1;D<=8;D++){
        $("#school_"+D).show();
}
    }else{
      for(D=1;D<=8;D++){
        $(".colleges").show();
        $("#school_"+D).show();
        $(".high_school").show();
}  
    }
}else{
  $(".high_school").show();
  $(".colleges").show();  
    for(D=1;D<=8;D++){
        $(".colleges").show();
        $("#school_"+D).show();
        $(".high_school").show();
}  
}
})

$("#datepicker").change(function(){
    var oldyeard='<?php echo $yeard?>';
    //alert(oldyeard);
    var mydate=$(this).val();

var d = new Date(mydate);
  var n = d.getFullYear();
var differenced=oldyeard-n;
//alert(differenced);
if(differenced>=18){
//alert("Date of birth Okay");
$("#date_error").html("")
$(this).css("border","1px solid #ccc");
}else{
    $(this).val("")
    $("#date_error").html("Date of birth Must be above 18 years")
    $(this).css("border","2px solid red");
   // alert("Date of birth is bellow 18 years");
}
})

    })
</script>