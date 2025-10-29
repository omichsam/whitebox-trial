<div class="col-sm-12 col-xs-12">

<script type="text/javascript" src="../../js/jquery.js"> </script>


<div class="row">
<div class="col-sm-12 col-xs-12">

</div>
<div class="col-sm-12 col-xs-12">
allan
</div>
<div class="col-sm-12 col-xs-12" id="home">
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
	
	var target="#home";
	var url="login.php";
	$.get(""+url+"",(function(data){$(target).html(data)}))
	})

    

</script>