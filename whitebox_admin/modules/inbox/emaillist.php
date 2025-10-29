<style type="text/css">
.pc_custom {
	max-width: ;
 }
</style>
<script type="text/javascript">
$(document).ready(function(){
	var scrw=$(window).width();
	if(scrw>768){
		$("#pageboxwrap").parent().addClass('pc_custom');
	}else{} 
});
</script>
<?php
/*menu page dont need to connect to db*/
include "../../connect.php";
include "../../plugins/php_functions/php_functions.php";
include "../../plugins/php_functions/general_functions.php";
$ME="admin";
?>
<div class="col-sm-12 col-xs-12 no_padding animated  slideInLeft" id="pageboxwrap">
	<div class="s100 float_left full " id="chatsection">
		<div class="s100 float_left pagebox_head" id="pagebox_head">
			<i class="btn   fa fa-arrow-left close_chatbtn float_left"   onclick="close_page('pageboxwrap')"></i>
			 <div class="float_left col-sm-3 col-xs-8 no_padding">
				 <strong class="pageboxview_lbl float_left">Contact Lists</strong>				 
			 </div>
 		</div>

		<div class="s100 float_left pagebox_body  full" id="pagebox_body" style=" overflow:hidden;">
			<div class="col-sm-12 col-xs-12 mobipdless" style=" height:40px;overflow:hidden;margin-top:2px;">
				<input type="text" class="contact_list_search_input" onkeyup="searchcontact(this.value)">
				<i class="fa fa-search search_icon" style="padding: 8px;"></i> 
			</div>
			<div class="col-sm-12 col-xs-12 mobipdless" style="margin-top:10px; height:89%;overflow:auto;">
				<?php
				$getUsers=mysql_query("SELECT * FROM users ") or die(mysql_error());
				$num=mysql_num_rows($getUsers);
				while($get=mysql_fetch_assoc($getUsers)){
					$id=$get['id'];
					$user_id=$get['user_id'];
					$fname=$get['first_name'];
					$lname=$get['last_name'];
					$phone=$get['phone'];
					$email=$get['email'];
					$prof="";
					$pic_dir=$get['prof_dir'];
					$pic_name=$get['prof_name'];
					if($pic_name==""){
						$prof="../images/default_user.png";
					}else{
						$prof="../$pic_dir/$pic_name";
					}
						?>
							<div class="badge contact_badge">
								 <div class="bgimage  contact_head" style="background-image:url('<?php echo $prof;?>');">

								 </div>
								 <div class="contact_name">
								 	<?php echo "$fname $lname";?><br>
								 	<span><?php echo "$email";?></span>
								 </div>
								 <div class="float_left">
									 <div class="btn cont_btns" onclick="gotoviewprofile('<?php echo $user_id;?>','admin','2')">
								 			<i class="fa fa-eye"></i>
								 		</div>
								 		<div class="btn cont_btns" onclick="gotosendmessage('<?php echo $user_id;?>','admin','2')">
								 			<i class="fa fa-envelope-o"></i>
								 		</div>
								 		<a href="mailto:<?php echo $email;?>">
								 		<div class="btn cont_btns">
								 			<i class="fa fa-phone"></i>
								 		</div>
								 	    </a>	
								 	</div>
							</div>

						<?php
					}
				?>
			</div>	  
		</div>
	</div>
</div>