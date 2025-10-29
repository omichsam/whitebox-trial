<style type="text/css">
	#h_heade{
border-bottom: 3px solid #000;
text-align: center;
	}
	.register_btns{
		margin-left: 10px;
		background:#ccc;
	}
	#loader_spiner{
		min-height: 60px;
		min-width: 60px;
		margin-top: 160px;
		margin-left: 80px;
		color:red;
		margin-top:-49;
	}
	#to_reg_btns{
	    background:2px solid #ccc;
	    border-radius:10 0 10 0;
	    
		text-align: center;
	}
  #lower_rte{
    min-height: 30px;
  }
</style>




<?php
include("../../../../connect.php");
$adm_no=$_POST['stadm_no'];
$get_user=mysqli_query($con,"SELECT * FROM register WHERE adm_no='$adm_no'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$fname=$get['fname'];
$mname=$get['mname'];
$lname=$get['lname'];
$gender=$get['gender'];
$faculty=$get['faculty'];
$course_type=$get['course_type'];
$School=$get['School'];
$Registration_no=$get['Registration_no'];
$email=$get['email'];
$phone=$get['phone'];
$national_id=$get['national_id'];
$study_year=$get['study_year'];
$family=$get['family'];

$get_fucalty=mysqli_query($con,"SELECT name FROM faculty WHERE id='$faculty'") or die(mysqli_error($con));
$getd=mysqli_fetch_assoc($get_fucalty);
$fuculty_name=$getd['name'];

$get_curse=mysqli_query($con,"SELECT * FROM courses where id='$course_type'") or die(mysqli_error($con));
$gets=mysqli_fetch_assoc($get_curse);
$cursed_name=$gets['course_type'];
?>
<div class="col-sm-12 col-xs-12 no_padding">
<div class="col-sm-2 mobile_hidden no_padding"></div>
<div class="col-sm-8 col-xs-12 no_padding">
<div class="col-sm-12 col-xs-12 no_padding"><h4 id="h_heade">RECORDS AMMENDMENT</h4></div>
<div class="col-sm-6 col-xs-12 no_padding">
<!--<p class="col-sm-12 col-xs-12 ">
ENROL AS:<select required="required" class="splashinputs " id="enrol_as">
  <option>First Year</option>
  <option>Continuing Student</option>
</select>
</p>-->
<p class="col-sm-12 col-xs-12 ">
FIRST NAME:<input type="text" value="<?php echo $fname ?>" maxlength="30" minlength="2" required="required" class="splashinputs " placeholder="" id="fist_name">
</p>
<p class="col-sm-12 col-xs-12 ">
MIDDLE NAME:<input type="text" value="<?php echo $mname ?>" maxlength="30" minlength="2" class="splashinputs " placeholder="" id="middle_name">
</p>

<p class="col-sm-12 col-xs-12">
LAST NAME:<input type="text" value="<?php echo $lname ?>"  maxlength="30" minlength="2" required="required" class="splashinputs " placeholder="" id="last_name">
</p>
<p class="col-sm-12 col-xs-12">
NATIONAL ID:<input type="text" value="<?php echo $national_id ?>" maxlength="8" minlength="8" class="splashinputs " placeholder="" id="national_id">
</p>
<p class="col-sm-12 col-xs-12">
EMAIL ADDRESS:<input type="email" value="<?php echo $email ?>" maxlength="30" minlength="2" required="required" class="splashinputs enrol_inputs" placeholder="Optional" id="email_address">
</p>
<p class="col-sm-12 col-xs-12 continuing ">
YEAR OF STUDY:<select class="splashinputs" id="year_study">
    <option><?php echo $study_year?></option>
    <option></option>
<option>1</option>
<option>2</option>
<option>3</option>
<option>4</option>
<option>5</option>
<option>6</option>
</select>
</p>


</div>
<div class="col-sm-6 col-xs-12 no_padding">
  
  <p class="col-sm-12 col-xs-12 ">
REGISTRATION NO:
<input type="text" maxlength="30" value="<?php echo $Registration_no ?>" minlength="5" required="required" id="registartion_no" class="splashinputs " placeholder="">

</p>
<p class="col-sm-12 col-xs-12">
PHONE:<input type="tel" value="<?php echo $phone?>" maxlength="10" minlength="15" required="required" class="splashinputs " placeholder="" id="phonen">
</p>
<p class="col-sm-12 col-xs-12">
GENDER:
<select class="splashinputs" required="required" id="gender">
  
<option>MALE</option>
<option>FEMALE</option>

</select>
</p>
<p class="col-sm-12 col-xs-12">
SCHOOL/FACULTY:
<select class="splashinputs" required="required" id="faculty">
    <option><?php echo $fuculty_name?></option>
    <option></option>
  <?php
include"../../../../connect.php";
$sql="SELECT * FROM faculty ORDER BY RAND() LIMIT 0, 9";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
            $faculty=$row['name'];
            ?>

<option><?php echo $faculty ?></option>
<?php
}

?>

</select>
</p>
<p class="col-sm-12 col-xs-12">
COURSE TYPE:
<select class="splashinputs" required="required" id="courses">
<option><?php echo $cursed_name ?></option>
<option></option>
<?php
//$faculty=$_POST['faculty'];

include"../../../../connect.php";
        
$sql="SELECT * FROM courses where faculty='1'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
            $school=$row['course_type'];
            ?>

<option><?php echo $school ?></option>
<?php
}

?>
</select>
</p>
<p class="col-sm-12 col-xs-12" id="schoo_select">
COURSE:
<select class="splashinputs" required="required" id="schools">
<option><?php echo $School ?></option>
<option></option>
<?php

include"../../../../connect.php";
          $sqld="SELECT * FROM courses WHERE course_type='Certificate'";
    $query_rund=mysqli_query($con,$sqld)or die($query_rund."<br/><br/>".mysqli_error($con));
        while($row=mysqli_fetch_array($query_rund)){
          $course_id=$row['id'];
          }
$sql="SELECT * FROM schools where course='$course_id'";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
            $school=$row['name'];
            ?>

<option><?php echo $school ?></option>
<?php
}

?>
</select>
</p>
<p class="col-sm-12 col-xs-12 continuing ">
FAMILY:<select class="splashinputs" id="families">
    <option><?php echo $family ?></option>
    <option></option>
  <?php
//include"../../../../connect.php";
$sql="SELECT * FROM families";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
            $school=$row['name'];
            ?>

<option><?php echo $school ?></option>
<?php
}

?>
</select>
</p>
</div>
<p class="col-sm-12 col-xs-12" id="to_reg_btns">
	<span class="btn float_right register_btns" reg_rol="register">SAVE</span>
	<!--<span class="btn float_right register_btns" reg_rol="cancel">CANCEL</span>-->
</p>
<!--<p class="col-sm-12 col-xs-12 spinner not_shown" id="loader_spiner"></p> -->
<p class="col-sm-12 col-xs-12 " id="loader_error"></p>

</div>
<div class="col-sm-2 col-xs-0 no_padding"></div>
<div class="col-sm-12 col-xs-12 no_padding" id="lower_rte"></div>
</div>

<script type="text/javascript">
$(document).ready(function(){
 $("#faculty").change(function(){
    var faculty=$(this).val();
    //alert(faculty)
  $("#courses").html("")
  $.post("modules/system/coordinator/register/faculty.php",{
        faculty:faculty
 
      },function(data){ 
        //alert(data)
        $("#courses").html(data)
      })

  })


   $("#courses").change(function(){
    var my_school=$(this).val();
    var faculty=$("#faculty").val();
     $("#schoo_select").html("")
  $.post("modules/system/coordinator/register/schools.php",{
        my_school:my_school,
        faculty:faculty
 
      },function(data){
        $("#schoo_select").html(data)
      })

  })
  $("#enrol_as").change(function(){
    var enrol=$(this).val();
    //alert(enrol)
    if(enrol=="First Year"){
       // $(".continuing").show();
      $(".continuing").hide();
    }else{
      $(".continuing").show();
    }


  })
$(".enrol_inputs").focus(function(){

//$(this).val("");
})
$(".enrol_inputs").focusout(function(){
var maxvalue=$(this).attr("maxlength");
  var minlength =$(this).attr("minlength");
 var value_length=$(this).val().length;
 var my_id=$(this).attr("id");

  var fist_name="";
  var last_name="";
  var phonen="";
  var email_address="";
  var national_id="";
  var registartion_no="";
  var middle_name="";




//alert(minlength+" "+maxvalue)
 if(value_length>=minlength && value_length<=maxvalue){
//var my_id=$(this).val();
//var fist_name=fist_nam.replace(/^\s+|\s+$/gm,'');
if(my_id=="fist_name"){
  var fist_name=$(this).val();
}else if(my_id=="last_name"){
  var last_name=$(this).val();
}else if(my_id=="phonen"){
  var phonen=$(this).val();
}else if(my_id=="email_address"){
  var email_address=$(this).val();
}else if(my_id=="national_id"){
  var national_id=$(this).val();
}else if(my_id=="registartion_no"){
  var registartion_no=$(this).val();
}else if(my_id=="middle_name"){
var middle_name=$(this).val();
}else{

}

$(this).css('color','#6a8d96');
  }else{
    //$("#loader_error").html("First name Error!");
    $(this).attr("placeholder", "character range "+minlength+" to "+maxvalue).css('color','red');


  }




})

	//buttons
	$(".register_btns").click(function(){
    //var counter=1;
//alert(my_names)
//validate first name
var adm_no='<?php echo $adm_no?>';
var faculty=$("#faculty").val();
var courses=$("#courses").val();
var families=$("#families").val();
var year_study=$("#year_study").val().replace(/(\r\n\s|\n|\r|\s)/gm, '').replace(/\s+/g, "").trim();
var enrol_as=$("#enrol_as").val();
  var fist_name=$("#fist_name").val().replace(/(\r\n\s|\n|\r|\s)/gm, '').replace(/\s+/g, "").trim();
  var last_name=$("#last_name").val().replace(/(\r\n\s|\n|\r|\s)/gm, '').replace(/\s+/g, "").trim();
  var phonen=$("#phonen").val().replace(/(\r\n\s|\n|\r|\s)/gm, '').replace(/\s+/g, "").trim();
  var email_address=$("#email_address").val().replace(/(\r\n\s|\n|\r|\s)/gm, '').replace(/\s+/g, "").trim();
  var national_id=$("#national_id").val().replace(/(\r\n\s|\n|\r|\s)/gm, '').replace(/\s+/g, "").trim();
  var registartion_no=$("#registartion_no").val().replace(/(\r\n\s|\n|\r|\s)/gm, '').replace(/\s+/g, "").trim();
var middle_name=$("#middle_name").val().replace(/(\r\n\s|\n|\r|\s)/gm, '').replace(/\s+/g, "").trim();
var schools=$("#schools").val();
var gender=$("#gender").val().replace(/(\r\n\s|\n|\r|\s)/gm, '').replace(/\s+/g, "").trim();


//alert(fist_name)

      
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if(!emailReg.test(email_address)){
        email_address="";
        $("#email_address").val("");

        $("#email_address").attr("placeholder","Wrong email address format!").css('color','red');
        $("#loader_error").html("Check your email address!").css('color','red');
       // $("#loader_error").html("Check your email Format!");
    } else {

    }
    /*
if(typeof national_id=='number'){

}else{
  $("#national_id").val("")
national_id="";
$("#national_id").attr("placeholder","Wrong Id Number format!").css('color','red');
$("#loader_error").html("Check your You national id number!").css('color','red');
}*/
/*
if(typeof phonen=='number'){
  */


      var phoneno =/^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
  if(phonen.match(phoneno)){
    
  }else{
    $("#phonen").attr("placeholder","Wrong phone number formart!").css('color','red');
    $("#loader_error").html("Check your phone number!").css('color','red');
    phonen="";
    $("#phonen").val("")
  }


/*}else{
  $("#phonen").val("")
phonen="";
$("#phonen").attr("placeholder","Invalid Phone number!").css('color','red');
$("#loader_error").html("Phone number error!").css('color','red');
}
*/



    if(fist_name=="" || last_name=="" || registartion_no=="" || phonen==""){

$("#loader_spiner").hide();
    $("#loader_error").html("Some values are missing!").css('color','red');
    }else{

  $("#loader_spiner").show();
    $("#loader_error").html("Sending..please wait..");
$.post("modules/system/coordinator/view/update_profile.php",{
  faculty:faculty,
  courses:courses,
 registartion_no:registartion_no,
   fist_name:fist_name,
   email_address:email_address,
   phonen:phonen,
 middle_name:middle_name,
   last_name:last_name,
    schools:schools,
      gender:gender,
      enrol_as:enrol_as,
      families:families,
     year_study:year_study,
     national_id:national_id,
     adm_no:adm_no
},function(data){
 // alert(data)
if($.trim(data)=="success"){
 $("#loader_spiner").hide();
    $("#loader_error").html(data);

    /*	$.post("modules/system/coordinator/register/upload.php",{
    		fist_name:fist_name,
 middle_name:middle_name,
   last_name:last_name,
   registartion_no:registartion_no
    	},function(data){
    		$("#home").html(data)
    	})


*/
}else{
   $("#loader_spiner").hide();
    $("#loader_error").html(data);
}
});

}

	});
});	
</script>