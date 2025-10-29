<style type="text/css">
    #h_heade{
border-bottom: 3px solid #000;
text-align: center;
  }
</style>
<div class="col-sm-12 col-xs-12 no_padding">
<div class="col-sm-2 mobile_hidden no_padding"></div>
<div class="col-sm-8 col-xs-12 no_padding">
<div class="col-sm-12 col-xs-12 no_padding"><h4 id="h_heade">RAISE AN ISSUE</h4></div>

<div class="col-sm-12 col-xs-12" id="adddata">
  
  <p class="col-sm-6 col-xs-12 ">
DEPARTMENT<select required="required" class="splashinputs " id="depart">
  
<?php


include"../../../../connect.php";

$sql="SELECT name FROM departments";
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

<p class="col-sm-6 col-xs-12" >
PRIORITY:<select class="splashinputs" required="required" id="criticality">

<option>Critical</option>
<option>High</option>
<option>Mediam</option>
<option>low</option>

</select>
</p>

<p class="col-sm-6 col-xs-12 specific not_shown " >
PROBLEM WITH:<select class="splashinputs" required="required" id="devivesd">

<option>Computer</option>
<option>Monitor</option>
<option>Phone</option>
<option>Printer</option>
<option>Scanner</option>
<option>Projector</option>
<option>Laptop</option>
<option>Network</option>
<option>Other</option>

</select>
</p>
	<p class="col-xs-12 col-sm-6 specific not_shown">SERIAL NO.<input type="text" class="splashinputs" placeholder="e.g K01000"  name="" id="tagno"></p>

 
<p class="col-sm-12 col-xs-12">
	DESCRIPTION:
<textarea class=" col-sm-12 col-xs-12" id="description" style="resize: none;" placeholder="Describe the problem. e.g my computer can not power on."></textarea>
	</p>
	<p class="col-sm-12 col-xs-12" style="text-align: center;margin-top: 10px;margin-bottom: 5px;"><span id="sendraise" class="btn theme_bg">Submit</span></p>
	<p class="col-xs-12 col-sm-12" id="errored" style="color: red;text-align: center;min-height: 100px;"></p>
</div>

</div>
</div>



<script type="text/javascript">
$(document).ready(function(){
 

$("#devivesd").change(function(){
	var devicetype=$(this).val()
	if(devicetype=="Network"){
$("#tagno").prop("disabled", true)
	}else{
$("#tagno").prop("disabled", false)
	}
})
$("#depart").change(function(){
    var enrol=$(this).val();
    //alert(enrol)
    if(enrol=="ICT"){
       // $(".continuing").show();
      $(".specific").show();
    }else{
      $(".specific").hide();
      $("#searchresults").html("")
    }


  })

$("#sendraise").click(function(){
	var has_erroe="";
	var depart=$("#depart").val();
	var devivesd=$("#devivesd").val();
	var criticality=$("#criticality").val();
	var tagno=$("#tagno").val()
	var description=$("#description").val();

	if(depart=="ICT"){
if(devivesd=="Network"){
var has_erroe="ready";
}else{
if(tagno){

	if(description){
var has_erroe="ready";
}else{
var has_erroe="";	
}



}else{
var has_erroe="";
}
}
	}else{
			if(description){
var has_erroe="ready";
}else{
var has_erroe="";	
}

	}
	if(has_erroe=="ready"){
var user=btoa($("#user_email").val());
$.post('modules/system/receptionist/raiseissue/save.php',{
description:description,
tagno:tagno,
devivesd:devivesd,
depart:depart,
user:user,
criticality:criticality
},function(data){

$("#errored").html(data);
})


$("#errored").html("sending..kindly wait..");
	}else{
		$("#errored").html("Some fields are empty");
	}
})

}); 
</script>