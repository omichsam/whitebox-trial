<?php 
 $innovation=$_POST['innovation'];

 ?>


<div class="col-sm-12 col-xs-12">
	<div class="col-sm-12 col-xs-12 default_header">Select presentation time
	</div>
	<div class="col-sm-3 col-xs-12"></div>
	<div class="col-sm-6 col-xs-12">
		<div class="col-sm-12 col-xs-12 no_padding">
			Select time
		<select class="splashinputs" id="pesent_select">
			
			<option>Now</option>
			<option>Later</option>
		</select>
    </div>
    <div class="col-sm-12 col-xs-12 no_padding time_selectors not_shown" >
			Select date
		<input type="date" id="start_dated" class="splashinputs">
			
    </div>
    <div class="col-sm-12 col-xs-12 no_padding time_selectors not_shown" >
			Select Time
		<input type="time" id="start_time" class="splashinputs">
			
    </div>
    <div class="col-sm-12 col-xs-12 no_padding ">
		<div class="col-sm-4 col-xs-12"></div>
		<div class="col-sm-4 col-xs-12">
		<span class="btn theme_bg present_accepts" role="back"> back</span>	
		<span class="btn theme_bg present_accepts" role="finish"> Finish</span>
	</div>
    </div>
    <div class="col-sm-12 col-xs-12 no_padding " id="time_loadings"></div>
	</div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		var innovation='<?php echo $innovation?>';
	    var loader=$("#loader").html();
		$("#pesent_select").change(function(){
			var presents=$(this).val()
			if(presents=="Now"){
				$(".time_selectors").hide();

			}else{
           $(".time_selectors").show()
			}
		})
		$(".present_accepts").click(function(){
		   
		    $("#time_loadings").html(loader)
			var my_role=$(this).attr("role");
			if(my_role=="finish"){
          var presents=$("#pesent_select").val()
			if(presents=="Now"){
			    
       // var my_time= Date.now(); 
       // var my_time= ""; 
  // Converting the number of millisecond in date string 
         // mynewtime = my_time.toString() 
		 $.post("modules/system/executive/pages/evaluate/save_time.php",{innovation:innovation},function(data){
		 	if($.trim(data=="success")){
		 	    $("#time_loadings").html("")
           $.post("modules/system/executive/pages/evaluate/present.php",{innovation:innovation},function(data){$("#home").html(data)});
		 	}else{
          $("#time_loadings").html(data)
		 	}
		 });
         

			}else{

		    $("#time_loadings").html(loader)
var start_dated=$("#start_dated").val();
var start_time=$("#start_time").val();
//alert(start_time)
 $.post("modules/system/executive/pages/evaluate/save_later.php",{start_dated:start_dated,start_time:start_time,innovation:innovation},function(data){
		 	if($.trim(data=="success")){
		 	    $("#time_loadings").html("")
           $.get("modules/system/executive/pages/view/view.php",function(data){$("#home").html(data)});
		 	}else{
          $("#time_loadings").html(data)
		 	}
		 });



           $("#time_loadings").html("")
			}
			}else{
          $("#time_loadings").html("")
			}
		})
	})
</script>