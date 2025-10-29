<script type="text/javascript">
	$(document).ready(function(){
		var my_id=$("#user_email").val();
        //alert(my_id)
		 $.post("modules/body/web/contacts.php",{
                     my_id:my_id  
                    },function(data){
                        $("#learning_area").html(data).show();
                        var element = document.getElementById("learning_area");
   element.scrollTop = element.scrollHeight - element.clientHeight;
                    })
	})
</script>