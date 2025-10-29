<style type="text/css">
	#sample_parts{
		background: url("images/icons/excel.PNG");
		min-height: 300px;
		background-size: cover;
		background-position: center;
		background-repeat: no-repeat;
	}
</style>

<?php
include "../../../../../connect.php";
$User_id=base64_decode($_POST['User_id']);
$sqlx="SELECT * FROM administrators where Id='$User_id'";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
        $old_category="";
        $clerk="";
        $super_admin="";
        $executive="";
    $status=$row['status'];
      $Name=$row['Name'];
      $phone=$row['phone'];
      $pieces = explode(" ", $Name);
$fname=$pieces[0]; // piece1
$sname=$pieces[1]; // piece2
  $Admin_role=$row['Admin_role'];
$email=$row['user_name'];
  $time_in=$row['time_in'];
  $time_out=$row['time_out'];
 $stdstatus=$row['status'];
  if($Admin_role=="clerk"){
    $old_category="Evaluating Team";
    $clerk="not_shown";
 }else if($Admin_role=="super_admin"){
 $old_category="Super admin";
 $super_admin="not_shown";
 }else if($Admin_role=="elearning_admin"){
 $old_category="E-learning admin";
 $elearning_admin="not_shown";


 }else if($Admin_role=="content_team"){
 $old_category="content team";
 $content_team="not_shown";

 }else if($Admin_role=="communications"){
 $old_category="communications";
 $communications="not_shown";


 }else if($Admin_role=="executive"){
$old_category="Executive"; 
  $executive="not_shown";
 }else{

 }
}
?>
<div class="col-sm-12 col-xs-12">

<div class="col-sm-12 col-xs-12 default_header" id="sample_headers">Edit user details</div>

<div class="col-sm-12 col-xs-12 " id="single_up">
	<div class="col-sm-3 col-xs-12 default_header"></div>
<div class="col-sm-6 col-xs-12 ">
<div class="col-sm-12 col-xs-12">
	First name:
	<input type="text" class="splashinputs" value="<?php echo $fname?>" id="first_name">
</div>
<div class="col-sm-12 col-xs-12">
	Last name:
	<input type="text" class="splashinputs" value="<?php echo $sname?>" id="last_name">
</div>
<div class="col-sm-12 col-xs-12">
	Email address:
	<input type="email" class="splashinputs" value="<?php echo $email?>" id="email">
</div>
<div class="col-sm-12 col-xs-12">
	phone number:
	<input type="phone" class="splashinputs" value="<?php echo $phone?>" id="phone">
</div>
<div class="col-sm-12 col-xs-12">
	Account type:
	<select class="splashinputs" id="account">
    <option><?php echo $old_category?></option>
		<option class="<?php echo $clerk?>">Evaluating Team</option>
		<option class="<?php echo $executive?>">Executive</option>



    <option class="<?php echo $content_team?>">Content Team</option>
    <option class="<?php echo $communications?>">Communications</option>

    <option class="<?php echo $elearning_admin?>">E-learning admin</option>

	<option class="<?php echo $super_admin?>">Super admin</option>
	</select>
</div>
<div class="col-sm-12 col-xs-12" style="text-align: center;">
	<span role="cancel" class="btn adduser_btns theme_bg">Back</span>
	<span role="save" class="btn adduser_btns theme_bg">Save</span>
</div>
</div>
</div>

<div class="col-sm-12 col-xs-12" style="text-align: center;" id="error_place"></div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
     $(".bulkdata").click(function(){
     	$("#bulkup").show();
     	$("#single_up").hide();
     	$(this).hide();
     	$("#error_place").html("")
     	$("#sample_headers").html(" Bulk Upload users here")
     })
 $("#sample_file").click(function(){
     	$("#sample_datas").show();
     	$("#bulkup").hide();
     	$("#single_up").hide();
     	$(".bulkdata").hide()
     	$(this).hide();
     })
 $(".close_sample").click(function(){
     	$("#sample_datas").hide();
     	$("#bulkup").show();
     	$("#single_up").hide();
     	$("#sample_file").show()
     })


$(".bulk_btns").click(function(){
			var my_role=$(this).attr("role");
			if(my_role=="save"){
			    var bulkdata=$("#csv_file").val();
			    if(bulkdata==""){
			       $("#error_place").html("Select a csv file");   
			    }else{
				$("#upload").click();
			    }
			}else{
		$("#error_place").html("")
		$("#bulkup").hide();
     	$("#single_up").show();
     	$(".bulkdata").show()

     	$("#sample_headers").html("Add an new user")
			}
		})
		$(".adduser_btns").click(function(){
			var loader=$("#loader").html();
			var my_role=$(this).attr("role");
			if(my_role=="save"){
            var User_id=btoa('<?php echo $User_id?>');
            var first_name=btoa($("#first_name").val());
            var last_name=btoa($("#last_name").val());
            var email=btoa($("#email").val());
            var Account=$("#account").val();
            var account_value="";
            var phone=btoa($("#phone").val());
            if(Account=="Executive"){
            account_value=btoa("executive");
            }else if(Account=="Super admin"){
              account_value=btoa("super_admin");

          }else if(Account=="E-learning admin"){
              account_value=btoa("elearning_admin");
           }else if(Account=="Communications"){
              account_value=btoa("Communications");

               }else if(Account=="Content team"){
              account_value=btoa("content_team");

          }else{
            account_value=btoa("clerk");
            }
        if(first_name && last_name && email && account_value && phone){
             $("#error_place").html(loader)
          $.post("modules/system/super_admin/pages/Dashboard/add_edit.php",{
          first_name:first_name,
           last_name:last_name,
           phone:phone,
           email:email,
          User_id:User_id,
           account_value:account_value
          },function(data){
            if($.trim(data)=="success"){

        $("#error_place").html("Data successfuly saved");
            }else{

        $("#error_place").html(data)
            }
          })
        }else{
        	$("#error_place").html("All fields required")
        }

            
			}else{
//$.get("modules/system/super_admin/pages/view/view.php",function(responce){$("#home").html(responce)})

				//$(".splashinputs").val("")
$("#hide_previous").show();
  $("#hide_previouses").show();
  $("#pre_edits").html("").hide();
  $(".edit_manager").show();
			}
		})
		$('#upload_csv').on('submit', function(event){
		    var loader=$("#loader").html();
		   $("#error_place").html(loader) 
     //alert()
  event.preventDefault();
  $.ajax({
   url:"modules/system/super_admin/pages/view/bulk.php",
   method:"POST",
   data:new FormData(this),
   dataType:'json',
   contentType:false,
   cache:false,
   processData:false,
   success:function(jsonData)
   {
    $('#csv_file').val('');
 $.get("modules/system/super_admin/pages/view/view.php",function(responce){$("#home").html(responce)})
 
		   $("#error_place").html("") 
   }
  });
 });
	})
</script>