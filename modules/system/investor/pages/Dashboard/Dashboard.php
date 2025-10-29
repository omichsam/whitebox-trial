
<script type="text/javascript">
	$(document).ready(function(){

    var my_id=$("#global_u_email").val();
var graph="modules/system/investor/pages/Dashboard/check.php";
paged="#home";
$.post(""+graph+"",{my_id:my_id},function(data){$(paged).html(data)})

	})
</script>