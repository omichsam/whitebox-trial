<?php
include "../../connect.php";
$loginuser=base64_decode($_POST['my_id']);

//echo $loginuser;
$get_user=mysqli_query($con,"SELECT * FROM e_learning_users WHERE email='$loginuser'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);

$first_name=$get['first_name'];
$id=$get['id'];
$last_name=$get['Last_name'];
$Gender=$get['Gender'];
$phone=$get['phone'];
$email=$get['email'];
//$county=$get['county'];

$get_details=mysqli_query($con,"SELECT * FROM data_table WHERE colm_9='$loginuser'") or die(mysqli_error($con));
$getd=mysqli_fetch_assoc($get_details);

if($getd){
$dateofbirth=$getd['colm_6'];
$agegroup=$getd['colm_7'];
$idnumber=$getd['colm_8'];
$county=$getd['colm_11'];
$location=$getd['colm_12'];
$inschool=$getd['colm_13'];
$institution=$getd['colm_14'];
$bussiness=$getd['colm_15'];
$fieldinterest=$getd['colm_16'];
$companyage=$getd['colm_20'];
$revenue=$getd['colm_21'];


}else{
$dateofbirth="";
$agegroup="";
$idnumber="";
$county="";
$location="";
$inschool="";
$institution="";
$bussiness="";
$fieldinterest="";
$companyage="";
$revenue="";

}
 
?>
<style type="text/css">
	.mainprofile_box{
		min-height: 450px;
		box-shadow: 0 10px 10px #ccc;
		border: 1px solid #ccc;
	}
    .mainrofile_box{
        min-height: 100px;
        box-shadow: 0 10px 10px #ccc;
        border: 1px solid #ccc;
    }
    .boxedcontainer{
        min-height: 50px;
        border-top: 2px solid #ccc;
        margin-bottom: 3px;
    }
    .detailscontainers{
        min-height: 30px;
        margin-top: 5px;
        text-transform: uppercase;
    font-weight: bolder;
    }
    .boxleads{
        text-align: left;
        min-height: 37px;
        background: #ccc;
    }
    .penholders{
        min-height: 37px;
        border: 1px solid #ccc;
        text-align:left ;
    }
</style>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-12 col-xs-12 default_header">My Profile</div>
<div class="col-sm-12 col-xs-12 no_padding">
	<div class="col-sm-3 col-xs-12">
	<div class="col-sm-12 col-xs-12 mainrofile_box">
		

                        <form action=""  id="update_myprof_form" name="update_myprof_form"  method="POST" accept-charset="UTF-8" class="form-horizontal col-md-12 no_padding" enctype="multipart/form-data">
                        <div class="col-sm-12 col-xs-12" style="min-height:50px"></div>
                            <div class="col-md-12" id="pic_loader">
                              

                            </div>
                       
                    </form>



	</div>	
	</div>
	<div class="col-sm-9 col-xs-12 ">
		<div class="col-sm-12 col-xs-12 mainprofile_box">
             <div class="col-sm-12 col-xs-12 default_header" style="text-align:left;">BASIC DETAILS</div>

      <div class="col-sm-12 col-xs-12 boxedcontainer">
        <div class="col-sm-6 col-xs-12 detailscontainers">
           <div class="col-sm-4 boxleads col-xs-12"> FIRST NAME:</div>
            <div class="col-sm-8 penholders col-xs-12"><?php echo $first_name?></div>
        </div>
 <div class="col-sm-6 col-xs-12 detailscontainers">
           <div class="col-sm-4 boxleads col-xs-12"> LAST NAME:</div>
            <div class="col-sm-8 penholders col-xs-12"><?php echo $last_name?></div>
        </div>
         <div class="col-sm-6 col-xs-12 detailscontainers">
           <div class="col-sm-4 boxleads col-xs-12"> GENDER:</div>
            <div class="col-sm-8 penholders col-xs-12"> <?php echo $Gender?></div>
        </div>
         <div class="col-sm-6 col-xs-12 detailscontainers">
           <div class="col-sm-4 boxleads col-xs-12"> EMAIL:</div>
            <div class="col-sm-8 penholders col-xs-12"><?php echo $email?></div>
        </div>
         <div class="col-sm-6 col-xs-12 detailscontainers">
           <div class="col-sm-4 boxleads col-xs-12"> PHONE:</div>
            <div class="col-sm-8 penholders col-xs-12"><?php echo $phone?></div>
        </div>
         <div class="col-sm-6 col-xs-12 detailscontainers">
           <div class="col-sm-4 boxleads col-xs-12"> COUNTY:</div>
            <div class="col-sm-8 penholders col-xs-12"><?php echo $county?></div>
        </div>
      </div>
<div class="col-sm-12 col-xs-12 default_header" style="text-align:left;margin-top: 20px;">OTHER DETAILS</div>

  <div class="col-sm-12 col-xs-12 boxedcontainer">
        <div class="col-sm-6 col-xs-12 detailscontainers">
           <div class="col-sm-4 boxleads col-xs-12"> BIRTH:</div>
            <div class="col-sm-8 penholders col-xs-12"><?php echo $dateofbirth?></div>
        </div>
 <div class="col-sm-6 col-xs-12 detailscontainers">
           <div class="col-sm-4 boxleads col-xs-12"> AGE BRACKET:</div>
            <div class="col-sm-8 penholders col-xs-12"><?php echo $agegroup?></div>
        </div>
         <div class="col-sm-6 col-xs-12 detailscontainers">
           <div class="col-sm-4 boxleads col-xs-12"> ID NUMBER:</div>
            <div class="col-sm-8 penholders col-xs-12"> <?php echo $idnumber?></div>
        </div>
         <div class="col-sm-6 col-xs-12 detailscontainers">
           <div class="col-sm-4 boxleads col-xs-12"> LOCATION:</div>
            <div class="col-sm-8 penholders col-xs-12"><?php echo $location?></div>
        </div>
        <div class="col-sm-6 col-xs-12 detailscontainers">
           <div class="col-sm-4 boxleads col-xs-12"> IN SCHOOL:</div>
            <div class="col-sm-8 penholders col-xs-12"><?php echo $inschool?></div>
        </div>
 <div class="col-sm-6 col-xs-12 detailscontainers">
           <div class="col-sm-4 boxleads col-xs-12"> INSTITUTION:</div>
            <div class="col-sm-8 penholders col-xs-12"><?php echo $institution?></div>
        </div>
         
      </div>


<div class="col-sm-12 col-xs-12 default_header" style="text-align:left;margin-top: 20px;">BUSINESS DETAILS</div>

  <div class="col-sm-12 col-xs-12 boxedcontainer">
        <div class="col-sm-6 col-xs-12 detailscontainers">
           <div class="col-sm-4 boxleads col-xs-12"> BUSINESS:</div>
            <div class="col-sm-8 penholders col-xs-12"><?php echo $bussiness?></div>
        </div>
 <div class="col-sm-6 col-xs-12 detailscontainers">
           <div class="col-sm-4 boxleads col-xs-12"> FIELD:</div>
            <div class="col-sm-8 penholders col-xs-12"><?php echo $fieldinterest?></div>
        </div>
         <div class="col-sm-6 col-xs-12 detailscontainers">
           <div class="col-sm-4 boxleads col-xs-12"> COMPANY AGE:</div>
            <div class="col-sm-8 penholders col-xs-12"> <?php echo $companyage?></div>
        </div>
         <div class="col-sm-6 col-xs-12 detailscontainers">
           <div class="col-sm-4 boxleads col-xs-12"> REVENUE:</div>
            <div class="col-sm-8 penholders col-xs-12"><?php echo $revenue?></div>
        </div>
         
      </div>
        </div>
	

</div>	
</div>
<script type="text/javascript">
	$(document).ready(function(){
          var my_id=btoa('<?php echo $loginuser?>');
          //alert(my_id)
		$.post("e_learning/profile/getpic.php",{my_id:my_id

},function(data){
$("#pic_loader").html(data);

})
        /*
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
        url : 'e_learning/profile/upload_image.php',
        method : 'POST',
        data : formData,
        contentType : false,
        cache : false,
        processData : false,
        success : function (response){
                        if($.trim(response)=="success"){
              
    var my_id=$("#global_u_email").val();
$.get("e_learning/profile/getpic.php",{

},function(data){
$("#pic_loader").html(data);

}) 
        }else{
         // alert(response)  
        }
        }
    })
            
            
            
            
            
        })
        */

	})
</script>