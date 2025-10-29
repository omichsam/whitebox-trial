<?php
$numbers=base64_decode($_POST['numbers']);
for($base=1;$base<=$numbers;$base++){
	?>
<div class="col-sm-12 col-xs-12 no_padding" style="margin-top: 5px;">
<div class="col-sm-7 col-xs-7 ">
	<div class="col-sm-12 col-xs-12 no_padding">
	 <?php echo $base?> Name/company
		<input type="text" placeholder="E.g Jonh muthengi" id="<?php echo "Member_".$base?>" class="splashinputs">
	</div>
</div>
<div class="col-sm-5 col-xs-5 ">
	<div class="col-sm-12 col-xs-12 no_padding">
		Role
		<input type="text" placeholder="E.g Research" id="<?php echo "role_".$base?>" class="splashinputs">
	</div>
</div>
</div>

	<?php
}

?>