<style type="text/css">
	#canva_holder{
		min-height: 700px;
		box-shadow: 0 0 2px #ccc;
		 background-size: cover;
		 background-repeat: no-repeat !important;
		 background:url('images/icons/canvas.jpg');
	}
</style>



<div class="col-sm-12 col-xs-12">
<div class="col-sm-12 col-xs-12 no_padding">
<div class="col-sm-1 col-xs-12"></div>
<div class="col-sm-10 col-xs-10"></div>
<div class="col-sm-1 col-xs-2"><span class="btn btn_closecanvas "><i class="  fa fa-close fa-2x"></i></span></div>
	</div>
<div class="col-sm-12 col-xs-12 no_padding" id="canva_holder"></div>
	

</div>

<script type="text/javascript">
	$(document).ready(function(){
		$(".btn_closecanvas").click(function(){
		$(".innovation_pages").hide();
			$("#third_page").show();
		})
	})
</script>