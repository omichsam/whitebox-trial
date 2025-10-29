<?php
include("../../../../connect.php");
$emeded=$_POST['emeded'];
?>
<div class="col-sm-12 col-xs-12">
	<div class="colsm-12 col-xs-12"><button class="button hvr-hover close_p" style="background: red; color:#fff;float: right;">Close</button></div>
<embed width="100%" height="720px" name="plugin" src="<?php echo "../documents/articles/$emeded"?>" type="application/pdf">
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$(".close_p").click(function(){

      $(".hidden_rows").hide();
		})
		//$("#user_id").val("")
	})
</script>