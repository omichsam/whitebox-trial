<script type="text/javascript">
	$(document).ready(function(){
		 $.get("modules/system/callcenter/calender/calender.php",function(data){
       $("#home").html(data)
     })
	})
</script>