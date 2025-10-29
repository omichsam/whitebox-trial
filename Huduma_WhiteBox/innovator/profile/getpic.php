<?php
include("../../../base_connect.php");
include("../../../connect.php");

//$salt="A0007799Wagtreeyty";
 //session_start();
  $loginuser=base64_decode($_SESSION["username"]);
if($loginuser){

}else{
  $loginuser=base64_decode($_POST['my_id']);
}
$get_user=mysqli_query($con,"SELECT * FROM users WHERE email='$loginuser'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);

$image=$get['pic'];
if($image){
   $new_pic="Huduma_WhiteBox/images/innovators/".$image; 
}else{
    $new_pic="Huduma_WhiteBox/images/avatar3.png";
}
?>
<div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" id="image_change" style="max-width: 200px;margin-top:-33px">
                                                                                    <img src="<?php echo $new_pic ?>" alt="..." class="img-responsive">
                                                                            </div>
                               </div>

                                <input type="file" name="upfile" id="pic" style="display: none;">

                                <input type="text" name="userd" id="userd" value="<?php echo $loginuser?>" style="display: none;">
                               <span class="btn btn-primary btn-file">
                               <span class="fileinput-new" id="change_image">Select image</span>
                           </span>
                                <span class="help-block" id="errorimages"></span>

     <script type="text/javascript">
    $(document).ready(function(){
      //  alert()
     
$("#change_image").click(function(){
$("#pic").click();
})

$("#pic").change(function(){

        var ext = $(this).val().split('.').pop();
        if(ext=="PNG" || ext=="JPG" || ext=="png" || ext=="jpg" || ext=="jpeg" || ext=="JPEG"){

       
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
              
  
  var my_id=$("#user_email").val();
$.post("Huduma_WhiteBox/innovator/profile/getpic.php",{
my_id:my_id
},function(data){
$("#pic_loader").html(data);

}) 
        }else{
         // alert(response)  
        }
        }
    })
            
            
            
            
          }else{
         $("#errorimages").html("Kindly select an Image,i.e png,jpg,jpeg..only");
        }   
        })

    })
</script>