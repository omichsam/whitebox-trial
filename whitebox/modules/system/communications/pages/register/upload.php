
<style type="text/css">
	#uploading_wraper{
box-shadow: 0 0 2px #ccc;
min-height: 200px;
margin-top: 20px;
border-radius: 5px solid #ccc;
background-repeat: no-repeat;
background-size: cover;
	}
	#uplo_image{
		text-align: center;
		font-size: 24px;
	}
	#uplo_wraper{
		min-height: 50px;
		background-color: #ccc;
	}
	#up_buttons_image{
		text-align: center;
		margin-top: 10px;
	}
</style>


<?php 
 
include"../../../../connect.php";
   $fist_name=$_POST['fist_name'];
 $registartion_no=$_POST['registartion_no'];
   $last_name=$_POST['last_name'];
$sql="SELECT * FROM register WHERE fname='$fist_name' AND Registration_no='$registartion_no' AND lname='$last_name'";
		$query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

		while($row=mysqli_fetch_array($query_run)){
   			
			$studentprofile=$row['picture'];
            $updateadm_no=$row['adm_no'];
			if($studentprofile==""){
			 	$profile="images/students/user.jpg"; 
			 }else{
			 	$profile=$studentprofile;
			 }

?>
<div class="col-sm-12 col-xs-12">
<form action="modules/system/coordinator/register/image_upload.php"  id="update_myprof_form" name="update_myprof_form" class="col-sm-12 col-xs-12 no_padding"  method="POST" enctype="multipart/form-data">
	
<div class="col-sm-12 col-xs-12">
<div class="col-sm-12 col-xs-12" id="uplo_wraper"><h3 id="uplo_image">UPLOAD AN IMAGE TO CONTINUE</h3></div>
<div class="col-sm-4 col-xs-12"></div>
<input type="text" value="<?php echo $updateadm_no ?>" id="name" name="name" style="display: none;">
<input type="file" name="upfile" id="newprofpic" style="display: none;" onchange="loadbannerFile(event,'uploading_wraper')">
<div class="col-sm-4 col-xs-12" id="uploading_wraper" style="background-image: url('<?php echo $profile;?>'"></div>
<div class="col-sm-4 col-xs-12"></div>
<div class="col-sm-12 col-xs-12" id="up_buttons_image"><span class="theme_bg btn down_image" id="up_image_confirm">UPLOAD</span>&nbsp;
<span class="theme_bg btn down_image" id="Skip_confirm">SKIP</span>
	<span id="upload_im_loader"></span></div>
</div>
</form>
</div>
<?php
}
?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#uploading_wraper").click(function(){
		$("#newprofpic").click();
		});	
		$("#up_image_confirm").click(function(){

 $("#update_myprof_form").ajaxForm(
				                  {


				                  target:'#upload_im_loader'
				                  }).submit();
 var newdata=$("#upload_im_loader").text();
 //alert(newdata)
 if(newdata==""){

 $("#home").html("");
 var stadm_no='<?php echo $updateadm_no?>';
$.post("modules/system/coordinator/register/prepairesms.php",{
stadm_no:stadm_no
},function(data){
$.post("modules/system/coordinator/register/prepareid.php",{
stadm_no:stadm_no
},function(data){
$("#home").html(data);
});
	
});

}else{

}


//$(".overlay").hide();

	})

		//});

	$("#Skip_confirm").click(function(){
	    $.post("modules/system/coordinator/register/register.php",{

},function(data){
$("#home").html(data);
});
/*
 $("#home").html("");
 var stadm_no='<?php echo $updateadm_no?>';
$.post("modules/system/coordinator/register/prepairesms.php",{
stadm_no:stadm_no
},function(data){
$.post("modules/system/coordinator/register/prepareid.php",{
stadm_no:stadm_no
},function(data){
$("#home").html(data);
});
	
});
*/

		})
		
	});
</script>