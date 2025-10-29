<?php
$innovation=$_POST['innovation'];

?>
<style type="text/css">
  .evaluate_header{
    text-transform: uppercase;
    text-align: center;
    font-weight: bolder;
    border-radius: 10px;
    border-bottom: 2px #ccc solid;
  }
  .innovation_areas{
    min-height: 400px;
    box-shadow: 0 0 2px #ccc;
    background:#fff;
    margin-top: 5px;
  }
  .coments{
    border: 1px solid #ccc;
    resize: none;
    min-height: 340px;
    margin-top: 5px;
    margin-bottom: 5px;
    background: #fbfafa;
  }
  .evaluate_need{
    margin-top: 5px;
  }
  .innovation_photos{
    min-height: 150px;
    box-shadow:0 0 2px #ccc;
  }
  #time_display{
    text-align: right;
  }
  .id_lowerfoot{
    min-height: 50px;
  }
  #innovationneed{
    min-height: 100px;
    box-shadow: 0 0 2px #ccc;
    margin-top: 10px;
  }
  .stage_b{
    min-height: 20px;
    border-bottom: 4px solid #000;
  }
  .stage_a{
    min-height: 40px;
    border-radius: 15px;
    border:2px solid #000;
    font-weight: bold;
    padding-top: 5px;
    text-align: center;
    font-size: 22px;
  }
  .process_tm{
    margin-top: 5px;
  }
  .questions_hold{
       border: 1px solid #ccc;
    resize: none;
    min-height: 80px;
    margin-top: 5px;
    margin-bottom: 5px;
     background: #fbfafa;
  }
  #reply_counter{
    margin-top: 5px;
    text-align: center;
  }
  .evaluating_dclerks{
    font-weight: bolder;
  }
</style>

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

<script type="text/javascript">
  $(document).ready(function(){
    var innovation='<?php echo $innovation ?>'
    var targeted="#first_page";
  //  alert()
   var urlr="modules/system/clerk/pages/pending/first_page.php";
$.post(""+urlr+"",{innovation:innovation},function(data){$(targeted).html(data)})
  })
</script>