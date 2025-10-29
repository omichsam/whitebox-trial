<?php
include "../../../../../connect.php";
$my_user=$_POST['my_id'];
include("../../../../functions/security.php");
//$salt="A0007799Wagtreeyty";

$my_userde=encrypt($my_user,$key);
$get_user=mysql_query("SELECT * FROM investors WHERE Email='$my_userde'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);

$image=$get['image'];
if($image){
   $new_pic=base64_decode(decrypt($image,$key)); 
}else{
    $new_pic="images/user.jpg";
}
?>
 <div class="col-xs-12 col-sm-12 image_holders " id="image_change" style="background:url('<?php echo $new_pic;?>')">
 </div>
   <form action="modules/system/investor/pages/profile/upload_image.php"  id="update_myprof_form" name="update_myprof_form" class="not_shown col-sm-12 col-xs-12 no_padding"  method="POST" enctype="multipart/form-data">
<input type="text" value="<?php echo $my_user ?>" id="name" name="name" style="display: none;">
<input type="file" name="upfile" id="newprofpic" style="display: none;">
 <span id="upload_im_loader"></span>
							</form>
 <script>
     $(document).ready(function(){
         $("#image_change").click(function(){
	        $("#newprofpic").click();
	    })
$("#newprofpic").change(function(){
	        var profile=$(this).val()
	        var loader=$("#loader").html();
	        $("#image_change").html(loader);
	       $("#image_change").css("background-image","url('')");
	        $("#update_myprof_form").ajaxForm(
				                  {


				                  target:'#upload_im_loader'
				                  }).submit();
	        
	         var newdata=$("#upload_im_loader").text();

	        
	        
	        
	        
	        
	    })
     })
 </script>