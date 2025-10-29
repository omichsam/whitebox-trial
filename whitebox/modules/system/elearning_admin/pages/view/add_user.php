<style type="text/css">
	#sample_parts{
		background: url("images/icons/excel.PNG");
		min-height: 300px;
		background-size: cover;
		background-position: center;
		background-repeat: no-repeat;
	}
</style>


<div class="col-sm-12 col-xs-12">

<div class="col-sm-12 col-xs-12 default_header" id="sample_headers">Add an new user</div>
<div class="col-sm-3 col-xs-12 default_header"></div>
<div class="col-sm-6 col-xs-12 "><span class="btn theme_bg bulkdata">Bulk upload</span>
</div>
<div class="col-sm-12 col-xs-12 " id="single_up">
	<div class="col-sm-3 col-xs-12 default_header"></div>
<div class="col-sm-6 col-xs-12 ">
<div class="col-sm-12 col-xs-12">
	First name:
	<input type="text" class="splashinputs" id="first_name">
</div>
<div class="col-sm-12 col-xs-12">
	Last name:
	<input type="text" class="splashinputs" id="last_name">
</div>
<div class="col-sm-12 col-xs-12">
	Email address:
	<input type="text" class="splashinputs" id="email">
</div>
<div class="col-sm-12 col-xs-12">
	phone number:
	<input type="text" class="splashinputs" id="phone">
</div>
<div class="col-sm-12 col-xs-12">
	Account type:
	<select class="splashinputs" id="account">
		<option>Content team</option>
		<option>Communications</option>
	    <option>elearning_admin</option>
	</select>
</div>
<div class="col-sm-12 col-xs-12" style="text-align: center;">
	<span role="cancel" class="btn adduser_btns theme_bg">Back</span>
	<span role="save" class="btn adduser_btns theme_bg">Save</span>
</div>
</div>
</div>


<div class="col-sm-12 col-xs-12 not_shown" id="bulkup">
	<div class="col-sm-3 col-xs-12 default_header"></div>
<div class="col-sm-6 col-xs-12 ">
<div class="col-sm-12 col-xs-12">

	<div class="col-sm-4 col-xs-12">
	Add an excel file:

 <form id="upload_csv" class="col-xs-12 col-sm-12" method="post" enctype="multipart/form-data">
	<input type="file" class="" id="csv_file" name="csv_file">
	<input type="submit" name="upload" id="upload" value="Upload"  style="margin-top:10px;" class="btn btn-info not_shown" />
</form>
</div>
<div class="col-sm-4 col-xs-12">
	
</div>
<div class="col-sm-4 col-xs-12">
	<span class="btn theme_bg" id="sample_file">View sample file</span>
</div>
</div>

<div class="col-sm-12 col-xs-12" style="text-align: center;">
	<span role="cancel" class="btn bulk_btns theme_bg">back</span>
	<span role="save" class="btn bulk_btns theme_bg">Save</span>
</div>
</div>
</div>
<div class="col-sm-12 col-xs-12 not_shown " id="sample_datas">
<div class="col-sm-10 col-xs-10 " id="">A sample excel file</div>
<div class="col-sm-2 col-xs-2 " id=""><span class="btn theme_bg close_sample">Close <i class="fa fa-close"></i></span></div>
<div class="col-sm-12 col-xs-12 " id="sample_parts">	


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
            var first_name=btoa($("#first_name").val());
            var last_name=btoa($("#last_name").val());
            var email=btoa($("#email").val());
            var Account=$("#account").val();
            var account_value="";
            var phone=btoa($("#phone").val());
            if(Account=="Content team"){
            account_value=btoa("clerk");
            }else{
          
            account_value=btoa(Account);
            }
        if(first_name && last_name && email && account_value && phone){
             $("#error_place").html(loader)
          $.post("modules/system/elearning_admin/pages/view/add.php",{
          first_name:first_name,
           last_name:last_name,
           phone:phone,
           email:email,
           account_value:account_value
          },function(data){
            if($.trim(data)=="success"){
          $.get("modules/system/elearning_admin/pages/view/view.php",function(responce){$("#home").html(responce)})
            }else{

        $("#error_place").html(data)
            }
          })
        }else{
        	$("#error_place").html("All fields required")
        }

            
			}else{
$.get("modules/system/elearning_admin/pages/view/view.php",function(responce){$("#home").html(responce)})

				//$(".splashinputs").val("")
			}
		})
		$('#upload_csv').on('submit', function(event){
		    var loader=$("#loader").html();
		   $("#error_place").html(loader) 
     //alert()
  event.preventDefault();
  $.ajax({
   url:"modules/system/elearning_admin/pages/view/bulk.php",
   method:"POST",
   data:new FormData(this),
   dataType:'json',
   contentType:false,
   cache:false,
   processData:false,
   success:function(jsonData)
   {
    $('#csv_file').val('');
 $.get("modules/system/elearning_admin/pages/view/view.php",function(responce){$("#home").html(responce)})
 
		   $("#error_place").html("") 
   }
  });
 });
	})
</script>