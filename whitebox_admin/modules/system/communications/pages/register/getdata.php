  <?php
  include("../../../../connect.php");
		
$national_id =$_POST['idno'];
$sql="SELECT * FROM visitors WHERE national_id='$national_id'";
    $query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
     	$phone=$row['phone'];
	$post_fname=$row['fname'];
	$post_mname=$row['mname'];
	$post_lname=$row['lname'];
	$emailaddress=$row['emailaddress'];
	$gender=$row['gender'];
	$Registration_no=$row['id'];
	if($gender=="male"){
 $male="not_shown";
 $female="";
	}else{
 $female="not_shown";
 $male="";
	}
}?>

<div class="col-sm-6 col-xs-12 no_padding">
  <p class="col-sm-12 col-xs-12 ">
FIRST NAME:<input type="text" maxlength="30" value="<?php echo $post_fname?>" minlength="2" required="required" class="splashinputs enrol_inputs" placeholder="" id="fist_name">
</p>
<p class="col-sm-12 col-xs-12 ">
MIDDLE NAME:<input type="text" maxlength="30" value="<?php echo $post_mname?>" minlength="2" class="splashinputs enrol_inputs" placeholder="Optional" id="middle_name">
</p>

<p class="col-sm-12 col-xs-12">
LAST NAME:<input type="text" maxlength="30" value="<?php echo $post_lname?>" minlength="2" required="required" class="splashinputs enrol_inputs" placeholder="" id="last_name">
</p>
<p class="col-sm-12 col-xs-12">
EMAIL ADDRESS:<input type="email" maxlength="30" value="<?php echo $emailaddress?>" minlength="2" required="required" class="splashinputs enrol_inputs" placeholder="Optional" id="email_address">
</p>







</div>
<div class="col-sm-6 col-xs-12 no_padding">

  
 
<p class="col-sm-12 col-xs-12">
PHONE:<input type="tel" maxlength="10"  value="<?php echo $phone?>" minlength="15" required="required" class="splashinputs enrol_inputs" placeholder="" id="phonen">
</p>
<p class="col-sm-12 col-xs-12">
GENDER:
<select class="splashinputs" required="required" id="gender">
	<option><?php echo $gender?></option>
<option class="<?php echo $male?>">MALE</option>
<option class="<?php echo $female?>">FEMALE</option>

</select>

<p class="col-sm-12 col-xs-12 ">
DESCRIPTION:<textarea style="resize: none;min-height: 100px;" id="description" placeholder="discription e.g a visitor to john " class="splashinputs"></textarea>
  
</p>

</div>
<div class="col-sm-12 col-xs-12 no_padding">
  <p class="col-sm-6 col-xs-12 ">
DEPARTMENT<select required="required" class="splashinputs " id="depart">
 
<?php


$sql="SELECT name FROM departments";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
            $school=$row['name'];
            ?>

<option><?php echo $school ?></option>
<?php
}

?>

  <option>SPECIFIC PERSON</option>
</select>
</p>

<p class="col-sm-6 col-xs-12" >
FROM COUNTY:
<select class="splashinputs" required="required" id="counties">

<?php


$sql="SELECT county_name FROM counties";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
            $school=$row['county_name'];
            ?>

<option><?php echo $school ?></option>
<?php
}

?>
</select>
</p>

<p class="col-sm-12 col-xs-12 specific not_shown " >
VISITOR TO:<input type="text" maxlength="40" minlength="15" required="required" class="splashinputs enrol_inputs"     placeholder="Search here..optional" id="visitorto">
<div class="col-sm-12 col-xs-12 specific no_padding" id='searchresults'>
</div>
  <p class="col-xs-12 col-sm-12"><input type="text" hidden="hidden" name="" id="userid"></p>
</p>
</div>

<p class="col-sm-12 col-xs-12 " style="text-align: center;">
<span class="btn theme_bg register_btns">SUBMIT</span>
  
</p>

<p class="col-sm-12 col-xs-12 " id="loader_error" style="text-align: center;min-height: 100px;color: red"></p>


<script type="text/javascript">
  $(document).ready(function(){
$("#visitorto").keyup(function(){
  var search=$(this).val();

       $.post('modules/system/receptionist/register/search.php',{search:search},function(data){
        $("#searchresults").html(data)
       })
})

  $("#national_id").focusin(function(){
    //$(this).css("background-color", "#FFFFCC");
  });
  $("#validateid").click(function(){
    var loader=$("#loader").html()

             $("#loader_error").html("checking..kindly wait..")
    //$(this).css("background-color", "#FFFFFF");
    var idno=$("#national_id").val()
       $.post('modules/system/receptionist/register/validate.php',{idno:idno},function(data){
        if($.trim(data)=="exist"){
          $("#loader_error").html("")
     $.post('modules/system/receptionist/register/getdata.php',{idno:idno},function(data){
      $("#adddata").html("");
    $("#adddata").html(data).show(); 
 $("#priority").hide();
   $("#loader_error").html("")  
})
        }else{
             $("#adddata").show(); 
             $("#priority").hide();
             $("#loader_error").html("")
 }

       })
 });
});
</script>

<script type="text/javascript">
$(document).ready(function(){
 

$("#depart").change(function(){
    var enrol=$(this).val();
    //alert(enrol)
    if(enrol=="SPECIFIC PERSON"){
       // $(".continuing").show();
      $(".specific").show();
    }else{
      $(".specific").hide();
      $("#searchresults").html("")
    }


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

$(this).val("");
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
var depart=$("#depart").val();
  var fist_name=$("#fist_name").val().replace(/(\r\n\s|\n|\r|\s)/gm, '').replace(/\s+/g, "").trim();
  var last_name=$("#last_name").val().replace(/(\r\n\s|\n|\r|\s)/gm, '').replace(/\s+/g, "").trim();
  var phonen=$("#phonen").val().replace(/(\r\n\s|\n|\r|\s)/gm, '').replace(/\s+/g, "").trim();
  var email_address=$("#email_address").val().replace(/(\r\n\s|\n|\r|\s)/gm, '').replace(/\s+/g, "").trim();
  var national_id=$("#national_id").val().replace(/(\r\n\s|\n|\r|\s)/gm, '').replace(/\s+/g, "").trim();
var middle_name=$("#middle_name").val().replace(/(\r\n\s|\n|\r|\s)/gm, '').replace(/\s+/g, "").trim();
var gender=$("#gender").val().replace(/(\r\n\s|\n|\r|\s)/gm, '').replace(/\s+/g, "").trim();
var description=$("#description").val();
var userid=$("#userid").val();
    //alert(enrol)
    if(depart=="SPECIFIC PERSON"){
       // $(".continuing").show();
     var userid=$("#userid").val()
    }else{
      var userid="";
}
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

var counties=$("#counties").val();

    if(fist_name=="" || last_name=="" || phonen==""){

$("#loader_spiner").hide();
    $("#loader_error").html("Some values are missing!").css('color','red');
    }else{

  $("#loader_spiner").show();
    $("#loader_error").html("Sending..please wait..");
$.post("modules/system/receptionist/register/add.php",{
   fist_name:fist_name,
   email_address:email_address,
   phonen:phonen,
 middle_name:middle_name,
   last_name:last_name,
      gender:gender,
     national_id:national_id,
     description:description,
     userid:userid,
     depart:depart,
     counties:counties
},function(data){
 $("#loader_error").html(data)
});

}

  });
}); 
</script>