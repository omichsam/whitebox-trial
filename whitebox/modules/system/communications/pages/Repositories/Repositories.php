<style type="text/css">
  .carbinates{
    min-height: 200px;
    max-height: 200px;
    /*border: 2px solid #ccc;*/
    margin-top: 5px;
    background-size: contain !important;
background-repeat: no-repeat !important;
background-position: center center !important;
background:url('images/carbinates.jpg');
  }
  .dheading{
font-size: 20px;
font-weight: bolder;
text-align: center;
font-family: Algerian;

  }
  .cabinatehouser{
    border-bottom: 2px solid #000;
  }
  .button_viewcab{
    margin-bottom: 5px;
  }
  .viewgbtins{
    text-align: center;
  }
  .bluesd{
  color: blue;
  cursor: pointer;
}
</style>
 <script type="text/javascript">
   $(document).ready(function(){
    $("#add_landloard").click(function(){
     $.post("modules/system/callcenter/register/register.php",{

      },function(data){
        $("#home").html(data);
      })
    })
   })
 </script>
<div class="col-sm-12 col-xs-12 no_padding">
  <div class="col-sm-12 col-xs-12 no_padding">
    <span class="btn online theme_bg">
   <span class="online" >&nbsp;<i class="fa fa-plus" style="color: #fff;"></i>&nbsp;</span> <span class="" id="add_landloard">Add File</span>
</span>
  </div>
  <div class="col-sm-12 col-xs-12 default_header">OUR REPOSITORY</div>
  <div class="col-sm-12 col-xs-12">
    <?php
    $years=date('Y');
    for($d=$years;$d>=2018;$d--){

    ?>
      <div class="col-sm-2 col-xs-3 cabinatehouser">
        <div class="col-sm-12 col-xs-12 dheading"><?php echo $d?></div>
          <div class="col-sm-12 col-xs-12 carbinates"  ></div>

        <div class="col-sm-12 col-xs-12 viewgbtins "><span class="button_viewcab btn theme_bg" id="<?php echo $d?>">Open <i class="fa fa-folder-open"></i></span></div>
      </div>
      <?php
    }
      ?>
  </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $(".button_viewcab").click(function(){
var yeard=btoa($(this).attr("id"));
$.post("modules/system/callcenter/Repositories/view.php",{yeard:yeard},function(data){
  $("#home").html(data);
      })
})
    })
</script>