<?php
$innovation=base64_decode($_POST['innovation']);
?>

<script type="text/javascript">
 
  $(document).ready(function(){
     var urla="modules/system/clerk/pages/covid/decide.php";
var innovats='<?php echo $innovation?>';
    var innovation=btoa(innovats);
       var display="#decide";
           var folder=".evaluation_class";
      $.post(""+urla+"",{innovation:innovation},function(data){$(folder).hide();
        $(display).html(data).show();
      })
</script>