<style type="text/css">
	#header_innovations{
		text-align: center;
		border-bottom: 1px solid #ccc;
		font-weight: bolder;
		text-transform: uppercase;
	}
	#innovation_wrapper{
		min-height: 200px;
		border-radius: 5px;
		box-shadow: 0 0 1px #ccc; 
	}
	#lower_foot{
		min-height: 100px;
	}
	#submit_innovation_holder{
		text-align: center;
		margin-top: 10px;
	}
	.textarea_p{
		border: 1px solid #ccc;
		resize: none;
		min-height: 100px;
	}
	#error_displaye{
		text-align: center;
	}
	.level_grows{
		min-height: 30px;
		border:2px solid #ccc;
		margin-top: 10px;
		border-radius: 50px;
	}
	.arro_grows{
		min-height: 30px;
		border-bottom: 5px solid #ccc;
	}
	.attachments{
		min-height: 100px;
box-shadow: 8px 5px 9px #000;
border-radius: 5px;
background-size: contain;
background-image: url('images/icons/attach.jpg');
background-repeat: no-repeat;
background-position: center;
border: 1px solid #ccc;
cursor: pointer;
	}
</style>
<?php
/*
include "../../../../connect.php";
  $innovation_need=$_POST['innovation_need'];
  $innovation_category=$_POST['innovation_category'];
  $innovation_srole=$_POST['innovation_srole'];
  $innovation_name=$_POST['innovation_name'];
  $about_innovationd=$_POST['about_innovationd'];
  $my_user=$_POST['my_user'];
$salt="A0007799Wagtreeyty";
$username=$my_user.$salt;
$new_username=sha1($username);
$my_userde=md5($new_username);
$get_innovation=mysql_query("SELECT * from innovations_table WHERE Innovation_name='$innovation_name' and Category='$innovation_category' and Need='$innovation_need' and About_innovations='$about_innovationd'") or die(mysql_error());
$get=mysql_fetch_assoc($get_innovation);
$User_id=$get['user_id'];
$Innovation_Id=$get['Innovation_Id'];
*/
?>
<div class="col-sm-12 col-xs-12 " id="displayer">
<div class="col-sm-12 col-xs-12 no_padding">
	<div class="col-sm-4 col-xs-12"></div>
	<div class="col-sm-4 col-xs-12" id="header_innovations"><span class="">ADD MORE DETAILS ON <?php //echo $innovation_name ?></span></div>

</div>
<div class="col-sm-12 col-xs-12 no_padding" id="level_submition">
	<div class="col-xs-1 col-sm-3"></div>
	<div class="col-xs-11 col-sm-6">
	<div class="col-sm-1 col-xs-1 level_grows theme_bg">1</div>
	<div class="col-sm-2 col-xs-2 arro_grows"></div>
    <div class="col-sm-1 col-xs-1 level_grows theme_bg">2</div>
    <div class="col-sm-2 col-xs-2 arro_grows"></div>
    <div class="col-sm-1 col-xs-1 level_grows theme_bg">3</div>
    <div class="col-sm-2 col-xs-2 arro_grows"></div>
    <div class="col-sm-1 col-xs-1 level_grows theme_bg">4</div>
</div>
</div>
<div class="col-xs-12 col-sm-3"></div>
	<div class="col-xs-12 col-sm-6 no_padding">
<div class="col-sm-12 col-xs-12 no_padding" id="innovation_wrapper">
	
	<div class="col-sm-12 col-xs-12">
		Does your idea/innovation have intellectual property protection? Yes /no
		<select id="protection" class="splashinputs">
			<option></option>
			<option>Yes</option>
			<option>No</option>
		</select>
	</div>
<div class="col-sm-12 col-xs-12 not_shown" id="attachment_cover">
		A an intellectual property protection document.
	 <form method="post" action="" enctype="multipart/form-data"
                id="myform"> 
		<input type="text" id="" value="<?php echo $Innovation_Id ?>" id="name" name="name" style="display: none;">
		<input type="file" name="file" id="file" >
	</form>
	</div>
	<div class="col-sm-12 col-xs-12">
		Please include any other links and attachments of any supporting material or documents.
		<div class="col-sm-12 no_padding col-xs-12">
			
			
			<div class=" col-sm-6 col-xs-12">
				Attach a file:
				<input type="file" id="attach_file" name="" >
			</div>
			<div class="col-sm-6 col-xs-12"> Or give a link:
            <input type="text" class="splashinputs"id="link">
			 </div>
		</div>
	</div>
	
	
	<div class="col-sm-12 col-xs-12" id="submit_innovation_holder">
		<span class="btn theme_bg" id="previous_third">Previous</span>
		<span class="btn theme_bg" id="submit_now">Submit</span>
	</div>
	<div class="col-sm-12 col-xs-12" id="error_displaye"></div>
	<div class="col-sm-12 col-xs-12" id="lower_foot">
		
	</div>
	
</div>

</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
$("#previous_third").click(function(){
	$(".innovation_pages").hide()
	 $("#third_page").show();
})
$("#protection").change(function(){
			var protection=$(this).val()
			if(protection=="Yes"){
				$("#attachment_cover").show()

			}else{
               $("#attachment_cover").hide()
			}
		})

$(".attachments").click(function(){
	//alert()
	$("#attach_file").click()
})


	})
</script>
