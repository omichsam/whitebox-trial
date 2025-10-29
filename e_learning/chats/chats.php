<?php
$myid=$_POST['my_id'];


?>



<script type="text/javascript">
	$(document).ready(function(){
		var my_id='<?php echo $myid?>';
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