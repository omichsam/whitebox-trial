<div class="col-sm-12 col-xs-12 no_padding">
<div class="col-sm-12 col-xs-12 no_padding evaluation_class" id="first_page"></div>
<div class="col-sm-12 col-xs-12 no_padding evaluation_class not_shown" id="second_page"></div>
<div class="col-sm-12 col-xs-12 no_padding evaluation_class not_shown" id="third_page"></div>
<div class="col-sm-12 col-xs-12 no_padding evaluation_class not_shown" id="fourth_page"></div>
<div class="col-sm-12 col-xs-12 no_padding evaluation_class not_shown" id="fifth_page"></div>
<div class="col-sm-12 col-xs-12 no_padding evaluation_class not_shown" id="sixth_page"></div>
<div class="col-sm-12 col-xs-12 no_padding evaluation_class not_shown" id="last_page"></div>
<div class="col-sm-12 col-xs-12 no_padding evaluation_class not_shown" id="decide"></div>
</div>
<?php
$innovation=$_POST['innovation'];

?>
<script type="text/javascript">
  $(document).ready(function(){
    var innovation='<?php echo $innovation ?>'
    var targeted="#first_page";
  //  alert()
   var urlr="modules/system/executive/pages/evaluate/first_page.php";
$.post(""+urlr+"",{innovation:innovation},function(data){$(targeted).html(data)})
  })
</script>