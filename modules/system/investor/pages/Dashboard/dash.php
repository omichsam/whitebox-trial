<style type="text/css">
	#dashbord_h{
		text-transform: uppercase;
		text-align: center;
	}
.dashboards{
	min-height: 100px;
box-shadow: 3px 4px 6px #ccc;
border-radius: 5px;
border: 2px solid #ccc;
margin-top: 4px;
}
#graph{
	min-height: 300px;
	margin-top: 20px;
	box-shadow: 0 0 3px #ccc;
	text-align: center;
}

</style>

<div class="col-sm-12 col-xs-12">
<div class="col-sm-12 col-xs-12" id="dashbord_h"><h5>My dashboard</h5></div>
<div class="col-xs-12 col-xs-12">

<div class="col-sm-1 col-xs-12"></div>
<div class="col-sm-11 col-xs-12 mobile_hidden" id="graph">



</div>
</div>


</div>
<script type="text/javascript">
$(document).ready(function(){
var my_id=$("#global_u_email").val();
var graph="modules/system/investor/pages/Dashboard/innovations.php";
paged="#graph";
$.post(""+graph+"",{my_id:my_id},function(data){$(paged).html(data)})

	})
</script>