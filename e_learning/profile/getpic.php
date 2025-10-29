<?php

include "../../connect.php";

  $loginuser=base64_decode($_POST['my_id']);

 //$loginuser;
$get_user=mysqli_query($con,"SELECT * FROM e_learning_users WHERE email='$loginuser'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$first_name=$get['first_name'];
$id=$get['id'];
$last_name=$get['Last_name'];
$fullname=mysqli_real_escape_string($con,"userelearner".$id."_".$first_name."_".$last_name);
$new_names=$fullname.".png";
$drc="../../Huduma_WhiteBox/images/innovators/".$new_names;
$image=file_exists($drc);
//echo "the iemage is".$new_names.$image;
$usernames="not_shown";
if($image){
    //$new_pic="Huduma_WhiteBox/images/avatar3.png";
   $new_pic="Huduma_WhiteBox/images/innovators/".$new_names;
   $imageloadd=""; 
   $usernames="";
}else{
    $new_pic="Huduma_WhiteBox/images/avatar3.png";
    $imageloadd="";
    $usernames="not_shown";
}
//echo $drc;

?>

<div class="fileinput col-xs-12 fileinput-new" data-provides="fileinput">
    <div class=" col-sm-12 col-xs-2"></div>
                                    <div class="fileinput-new col-sm-12 col-xs-8 thumbnail" id="image_change" style="max-width: 200px;">
                                        <img src="<?php echo $new_pic ?>" id="imagepage" alt="..." class="img-responsive">
                                    </div>
                               </div>

                                <input type="file" name="upfile" id="pic" style="display: none;">

                                <input type="text" name="userd" id="userd" value="<?php echo $loginuser?>" style="display: none;">
                                <div class="col-sm-12 col-xs-12 <?php echo $usernames?>" style="text-transform: uppercase;font-weight: bold;font-style: italic;text-align: center;"><?php echo $first_name." ".$last_name?></div>
                                <div class="col-sm-12 col-xs-12 <?php echo $imageloadd?>">
                               <span class="btn btn-primary  btn-file">
                              <span class="fileinput-new " id="change_image">Select image</span>
                           </span>
                       </div>
                                <span class="help-block" id="errorimages"></span>
                                <div class="col-sm-12 col-xs-12" style="min-height:30px"></div>

     <script type="text/javascript">
    $(document).ready(function(){
        //alert()
      //  alert()
     
$("#change_image").click(function(){
$("#pic").click();
})

$("#pic").change(function(){

        var ext = $(this).val().split('.').pop();
        if(ext=="PNG" || ext=="JPG" || ext=="png" || ext=="jpg" || ext=="jpeg" || ext=="JPEG"){

       
            var profile=$(this).val()
            var loader=$("#loader").html();
            $("#image_change").html("")
           $("#imagepage").css("background-image","url('')").html(loader);
var formData = new FormData($("#update_myprof_form")[0]);
$("#image_change").html(loader);
    $.ajax({
        url : 'e_learning/profile/upload_image.php',
        method : 'POST',
        data : formData,
        contentType : false,
        cache : false,
        processData : false,
        success : function (response){
                        if($.trim(response)=="success"){
              
  
  var my_id=$("#user_email").val();
$.post("e_learning/profile/getpic.php",{
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