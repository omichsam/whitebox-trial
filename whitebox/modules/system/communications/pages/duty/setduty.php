<style type="text/css">
	#checkpoint{
		min-height: 250px;
		box-shadow: 0 0 2px #ccc;
		background-color: #fff;
max-height: 500px;
overflow: auto;
	}
</style>

<div class="col-sm-12 col-xs-12">
	<div class="col-sm-12 col-xs-12 default_header">ADD A NEW DUTY ROTA</div>
	<div class="col-xs-12 col-sm-12">
		<div class="col-sm-6 col-xs-12" >
			<div class="col-sm-12 col-xs-12 no_padding" id="hodersgroupers">
			<div class="col-xs-12 col-sm-12" id="grouploaders">
				
			</div>
			<div class="col-sm-6 col-xs-6">
				FROM:
				<input type="date" class="splashinputs" name="" id="starttdate">
			</div>
			<div class="col-sm-6 col-xs-6">
				TO:
				<input type="date" class="splashinputs" name="" id="enddate">
			</div>
		
		<div class="col-sm-12 col-xs-12" style="text-align: center;">
			<span class="btn theme_bg" id="savedatap">SAVE</span>
		</div>
		<div class="col-sm-12 col-xs-12" style="text-align: center;" id="loadererror">
		
	</div>
</div>
</div>
	<div class="col-xs-12 col-sm-6" >
	<div class="col-xs-12 col-sm-12" id="checkpoint"></div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$.get("modules/system/coordinator/duty/getgroup.php",function(data){
             $("#grouploaders").html(data);
            })
		$.get("modules/system/coordinator/duty/select.php",function(data){
             $("#checkpoint").html(data);
            })
		$("#savedatap").click(function(){
            $("#loadererror").html("").css("color","red");
			var group=$("#groupselect").val();
			var starttdate=$("#starttdate").val();
			var enddate=$("#enddate").val();
			if(group && starttdate && enddate){

            var loader=$("#loader").html();
            $("#loadererror").html(loader);
            $.post("modules/system/coordinator/duty/add.php",{
             group:group,
			starttdate:starttdate,
			enddate:enddate
            },function(data){
            	if($.trim(data)=="success"){
$("#checkpoint").html(loader);
$("#loadererror").html("").css("color","red");
                $("#checkpoint").html(data); 
            $.get("modules/system/coordinator/duty/select.php",function(data){
             $("#checkpoint").html(data);
            })
        	$.get("modules/system/coordinator/duty/getgroup.php",function(data){
             $("#grouploaders").html(data);
            })}else{

				$("#loadererror").html(data).css("color","red");
            }
            })

			}else{
				$("#loadererror").html("All fields required!").css("color","red");
			}
		})
	})
</script>