<?php
$innovation=base64_decode($_POST['innovation']); 
$doc=base64_decode($_POST['doc_data']);
$page=base64_decode($_POST['page']);
$document="../Huduma_WhiteBox/documents/supportdocs/".$doc;

 ?>    
  
<div class="col-sm-12 col-xs-12"><span style="float:right;" class="btn theme_bg closedocuments" >Close</span></div>
   <embed class="col-sm-12 col-xs-12" id="pdf_shows" src="<?php echo $document?>" type="application/pdf" width="100%" height="550px" />
    	<!--<iframe src="<?php echo $document?>" width="100%" height="600px">
</iframe>
-->
<!--<iframe src="<?php echo $document?>" id="documentfremaes" width="100%" height="600px">-->
  	<script type="text/javascript">
    		$(document).ready(function(){
    			$(".closedocuments").click(function(){
   var innovation=btoa('<?php echo $innovation?>');
   var page='<?php echo $page?>';
var url="modules/system/executive/pages/"+page+"/full_statement.php";
$.post(url,{innovation:innovation},function(data){$("#home").html(data)});

    			})
    		})
    	</script>