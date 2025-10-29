<?php
$numbers=base64_decode($_POST['numbers']);
for($base=1;$base<=$numbers;$base++){


	if($base==1){
		$user_n='James macharia Or Tech c solutions';
		$role_bs='Reseach';
	}else if($base==2){
		$user_n='Mary Muliatsi Or Jumbo plc';
		$role_bs='Marketing';
	}else if($base==3){
		$user_n='Denis Otieno Or Jay solutions';
		$role_bs='Development';
	}else if($base==4){
		$user_n='Mwende Kyalo Or S-pac foundation ltd';
		$role_bs='Graphic design';
	}else if($base==5){
		$user_n='Abdi muhammed Or Swahili Smart ltd';
		$role_bs='Data analysis';
	}else{

	}
	?>
<div class="col-sm-12 col-xs-12 no_padding">
<div class="col-sm-7 col-xs-7 ">
	<div class="col-sm-12 col-xs-12 no_padding">
	 <?php echo $base?> Name/company
		<input type="text" placeholder="E.g <?php echo $user_n?>" id="<?php echo "Member_".$base?>" name="<?php echo "Member_".$base?>" class="splashinputs">
	</div>
</div>
<div class="col-sm-5 col-xs-5 ">
	<div class="col-sm-12 col-xs-12 no_padding">
		Role
		<input type="text" placeholder="E.g <?php echo $role_bs?>" id="<?php echo "role_".$base?>" name="<?php echo "role_".$base?>" class="splashinputs">
	</div>
</div>
</div>

	<?php
}

?>