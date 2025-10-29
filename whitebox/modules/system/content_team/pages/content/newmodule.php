<div class="col-sm-12 col-xs-12">
	<div class="col-sm-12 col-sm-12 default_header">Add and new module here</div>
	<div class="col-sm-12 col-xs-12">
		<div class="col-sm-3 col-xs-12"></div>
			<div class="col-sm-6 col-xs-12">
				Module name:
				<input type="text" name="module_name" id="module_name" placeholder="e.g Business modelling" class="splashinputs">
				Module description:
				<textarea name="module_description" id="module_description" placeholder="e.g This topic will focus on helping the budding entrepeneur to quickly put down thier idea in a simplified version and have a basis from which the idea can be refined as they interact with more content on the Whitebox Platform.
" class="splashinputs" style="resize:none;min-height: 200px;"></textarea>
				<div class="col-sm-2 col-xs-12"></div>
				<div class="col-sm-8 col-xs-12 btn btn-primary" id="save_module">Save</div>
				<div class="col-sm-12 col-xs-12" style="color: red;text-align: center;" id="module_erros"></div>

			</div>
		
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		var loader=$("#loader").html();
        
		$("#save_module").click(function(){
			
			var modulename=btoa($("#module_name").val());
			var module_description=btoa($("#module_description").val());
			if(module_description && modulename){
				 var txt;
  var r = confirm("Do you wish to submit?, click OK to proceed or CANCEL to stop?");
  if (r == true) {

				  $("#module_erros").html("Saving data.."+loader)
				    $.post("modules/system/content_team/pages/content/savemodule.php",{modulename:modulename,description:module_description},function(data){
if($.trim(atob(data))=="success"){
$("#module_erros").html("Data saved..redirecting.."+loader)
 $.post("modules/system/content_team/pages/content/details.php",{modulename:modulename,description:module_description},function(data){
 	$("#home").html(data);
 })




}else{
	$("#module_erros").html(atob(data))
}


      })
				}else{

				}

			}else{
            $("#module_erros").html("All Fields Required!")
			}
		})
	})
</script>