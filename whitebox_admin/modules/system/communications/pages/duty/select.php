<style type="text/css">
	.prevbheader{
		text-transform: uppercase;
		font-weight: bold;
	}
</style>
<div class="col-sm-12 no_padding col-xs-12">
	<div class="col-sm-12 col-xs-12 default_header">PREVIEW</div>
	<div class="col-xs-12 no_padding col-sm-12" style="background-color: #ccc;">
		<div class="col-sm-6 col-xs-6 prevbheader">
			No. Group
		</div>
		<div class="col-sm-3 col-xs-3 prevbheader">
			FROM
		</div>
		<div class="col-sm-3 col-xs-3 prevbheader">
			TO
		</div>
	</div>
<?php
$cont=0;
include("../../../../connect.php");
$sql="SELECT * FROM duty_rota where status='waiting'";
    $query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
    	$cont=$cont+1;
    	$group=$row['description'];
    	$startdate=$row['date_from'];
    	$date_to=$row['date_to'];
    	
 if($cont % 2 != 0){ 
    	?>
<div class="col-xs-12 no_padding col-sm-12" style="border-bottom: 2px solid #ccc;background:#edf1f5;margin-top: 5px;">
		<div class="col-sm-6 col-xs-6 ">
			<?php echo $cont." ".$group?>
		</div>
		<div class="col-sm-3 col-xs-3 ">
			<?php echo $startdate?>
		</div>
		<div class="col-sm-3 col-xs-3 ">
			<?php echo $date_to?>
		</div>
	</div>


    <?php
}else{
?>
<div class="col-xs-12 no_padding col-sm-12" style="border-bottom: 2px solid #ccc;margin-top: 5px;">
		<div class="col-sm-6 col-xs-6">
			<?php echo $cont." ".$group?>
		</div>
		<div class="col-sm-3 col-xs-3 ">
			<?php echo $startdate?>
		</div>
		<div class="col-sm-3 col-xs-3 ">
			<?php echo $date_to?>
		</div>
	</div>

<?php

     }

 }
 $databtns="not_shown";
if($cont>=1){
          $databtns="";
    	}else{
       $databtns="not_shown";
    	}
 ?>




</div>
<div class="col-sm-12 colxs-12 <?php echo $databtns?>" style="text-align: center;margin-top: 10px;margin-bottom: 20px;">

	<span class="btn " style="background: red;color:#fff;" id="cleardata"> Clear</span>
	<span class="btn " style="background: green;color:#fff;" id="confirm_rota">Confirm</span>
</div>

<div class="col-sm-12 colxs-12" style="text-align: center;" id="error_msg">
<script type="text/javascript">
	$(document).ready(function(){
$("#confirm_rota").click(function(){

	checksecurityconfirm();
})



		$("#cleardata").click(function(){
	
	checksecurity();
		})
	})
		function checksecurity() {

  var txt;
  var person = prompt("Secret key:", "");
  if (person == null || person == "") {
    $("#error_msg").html("Secret key required")


  } else {
    var secret="2020@tumcathcom";
    if(person==secret){
  var loader=$("#loader").html();
	        $("#error_msg").html(loader).css("color","#000");
            // var user=$("#user_email").val();
            //alert(action)
		      $.post("modules/system/coordinator/duty/deleteall.php",{},function(responce){
		      	if($.trim(responce)=="success"){

 
            $.get("modules/system/coordinator/duty/select.php",function(data){
             $("#checkpoint").html(data);
            })
        	$.get("modules/system/coordinator/duty/getgroup.php",function(data){
             $("#grouploaders").html(data);
})
		      	}else{

           	$("#error_msg").html(responce)
		      	}
           });
  //  txt = "Hello " + person + "! How are you today?";
}else{

    $("#error_msg").html(" Secret key not valid").css("color","red")
}
  }
  //document.getElementById("demo").innerHTML = txt;
}
function checksecurityconfirm(){

  var txt;
  var person = prompt("Secret key:", "");
  if (person == null || person == "") {
    $("#error_msg").html("Secret key required")


  } else {
    var secret="2020@tumcathcom";
    if(person==secret){
  var loader=$("#loader").html();
	        $("#error_msg").html(loader).css("color","#000");
            // var user=$("#user_email").val();
            //alert(action)
		      $.post("modules/system/coordinator/duty/Confirm.php",{},function(responce){
		      	if($.trim(responce)=="success"){

 
            $.get("modules/system/coordinator/duty/select.php",function(data){
             $("#checkpoint").html(data);
            })
        	$.get("modules/system/coordinator/duty/getgroup.php",function(data){
             $("#grouploaders").html(data);
})
		      	}else{

           	$("#error_msg").html(responce)
		      	}
           });
  //  txt = "Hello " + person + "! How are you today?";
}else{

    $("#error_msg").html(" Secret key not valid").css("color","red")
}
  }
}
</script>