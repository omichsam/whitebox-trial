

<div class="col-sm-12 col-sm-12 no_padding innovation_pages" id="first_page">
	
</div>
<div class="col-sm-12 col-sm-12 no_padding not_shown innovation_pages" id="second_page">
	
</div>
<div class="col-sm-12 col-sm-12 no_padding not_shown innovation_pages" id="third_page">
	
</div>
<div class="col-sm-12 col-sm-12 no_padding not_shown innovation_pages" id="fourth_page">
	
</div>
<div class="col-sm-12 col-sm-12 no_padding not_shown innovation_pages" id="canvas_model">
	
</div>
<div class="col-sm-12 col-sm-12 no_padding not_shown innovation_pages" id="canvas_stage">
	
</div>
<script type="text/javascript">
	$(document).ready(function(){

var my_id=$("#global_u_email").val();
      $.post("modules/system/external/pages/innovation/get_check.php",{
         my_id:my_id
		},function(data){
			//alert(data)
			var div=$.trim(data);
			if(div=="first_page"){
             $.post("modules/system/external/pages/innovation/first_page.php",{
          my_id:my_id
		},function(data){
			$("#first_page").html(data)
		})

		 $.get("modules/system/external/pages/innovation/stages.php",{

		},function(data){
			$("#canvas_stage").html(data)
			//alert(data)
		}) 

		$.get("modules/system/external/pages/innovation/canvas.php",{

		},function(data){
			$("#canvas_model").html(data)
			//alert(data)
		})
			}else{
          var txt;
  var r = confirm("You did not complete innovation submission the last session, click OK to complete or CANCEL to start afresh?");
  if (r == true) {
	$.post("modules/system/external/pages/innovation/pending.php",{
        my_id:my_id
		},function(data){

		var Innovation_Id=$.trim(data);
        var mode=btoa("edit");
         $.get("modules/system/external/pages/innovation/stages.php",{

		},function(data){
			$("#canvas_stage").html(data)
			//alert(data)
		}) 

		$.get("modules/system/external/pages/innovation/canvas.php",{

		},function(data){
			$("#canvas_model").html(data)
			//alert(data)
		})
	if(div=="fourth_page"){
			$.post("modules/system/external/pages/innovation/"+div+".php",{
        Innovation_Id:Innovation_Id,
        my_id:my_id,
        mode:mode
		},function(data){

			$("#"+div).html(data).show()
		})
			$.post("modules/system/external/pages/innovation/first_page.php",{
       Innovation_Id:Innovation_Id,
           my_id:my_id,
            mode:mode

		},function(data){
			$("#first_page").html(data).hide()
		})
				$.post("modules/system/external/pages/innovation/second_page.php",{
             Innovation_Id:Innovation_Id,
                  my_id:my_id,
                   mode:mode
		},function(data){
			$("#second_page").html(data)
		})
					$.post("modules/system/external/pages/innovation/third_page.php",{
            Innovation_Id:Innovation_Id,
                  my_id:my_id,
                   mode:mode
		},function(data){
			$("#third_page").html(data).hide()
		})

		}else if(div=="third_page"){
      $.post("modules/system/external/pages/innovation/third_page.php",{
         Innovation_Id:Innovation_Id,
        my_id:my_id,
        mode:mode
		},function(data){
			$("#third_page").html(data).show()
		})
      $.post("modules/system/external/pages/innovation/first_page.php",{
        Innovation_Id:Innovation_Id,
        my_id:my_id,
        mode:mode
		},function(data){
			$("#first_page").html(data).hide()
		})
				$.post("modules/system/external/pages/innovation/second_page.php",{
          Innovation_Id:Innovation_Id,
        my_id:my_id,
        mode:mode
		},function(data){
			$("#second_page").html(data)
		})

         }else if(div=="second_page"){
      $.post("modules/system/external/pages/innovation/second_page.php",{
            Innovation_Id:Innovation_Id,
            my_id:my_id,
            mode:mode
		},function(data){
			$("#second_page").html(data).show()
		})
      $.post("modules/system/external/pages/innovation/first_page.php",{
           Innovation_Id:Innovation_Id,
            my_id:my_id,
            mode:mode
		},function(data){
			$("#first_page").html(data).hide()
		})
				

         }else{
         	$.post("modules/system/external/pages/innovation/first_page.php",{
           my_id:my_id,
		},function(data){
			$("#first_page").html(data)
		})
         }
})

  }else{
      $.post("modules/system/external/pages/innovation/clear.php",{
         my_id:my_id
		},function(data){
			if($.trim(data)=="success"){
		$.post("modules/system/external/pages/innovation/first_page.php",{
			my_id:my_id
		},function(data){
			$("#first_page").html(data)
		})
       }else{

       }
	})

  		
 
  }
			}
			/*if(div=="fourth_page"){
			$.post("modules/system/external/pages/innovation/"+div+".php",{

		},function(data){

			$("#"+div).html(data).show()
		})
			$.post("modules/system/external/pages/innovation/first_page.php",{

		},function(data){
			$("#first_page").html(data).hide()
		})
				$.post("modules/system/external/pages/innovation/second_page.php",{

		},function(data){
			$("#second_page").html(data)
		})
					$.post("modules/system/external/pages/innovation/third_page.php",{

		},function(data){
			$("#third_page").html(data).hide()
		})
		}else if(div=="third_page"){
      $.post("modules/system/external/pages/innovation/third_page.php",{

		},function(data){
			$("#third_page").html(data).show()
		})
      $.post("modules/system/external/pages/innovation/first_page.php",{

		},function(data){
			$("#first_page").html(data).hide()
		})
				$.post("modules/system/external/pages/innovation/second_page.php",{

		},function(data){
			$("#second_page").html(data)
		})

         }else if(div=="second_page"){
      $.post("modules/system/external/pages/innovation/second_page.php",{

		},function(data){
			$("#second_page").html(data).show()
		})
      $.post("modules/system/external/pages/innovation/first_page.php",{

		},function(data){
			$("#first_page").html(data).hide()
		})
				

         }else{
         	$.post("modules/system/external/pages/innovation/first_page.php",{

		},function(data){
			$("#first_page").html(data)
		})
         }
			//$("#first_page").html(data)
		
		})
      /*
		$.post("modules/system/external/pages/innovation/first_page.php",{

		},function(data){
			$("#first_page").html(data)
		})

		$.get("modules/system/external/pages/innovation/canvas.php",{

		},function(data){
			$("#canvas_model").html(data)
			//alert(data)
		})
	*/
})
		
	})
</script>