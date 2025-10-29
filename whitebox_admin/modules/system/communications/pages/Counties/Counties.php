<style type="text/css">
  .carbinates{
    min-height: 135px;
    max-height: 135px;
    /*border: 2px solid #ccc;*/
    margin-top: 5px;
    border-radius: 5px;
    background-size: 100% 100% !important;
background-repeat: no-repeat !important;
background-position: center center !important;

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
    margin-top: 3px;
  }
  .viewgbtins{
    text-align: center;
  }
</style>
<div class="col-sm-12 col-xs-12 no_padding">
  <div class="col-sm-12 col-xs-12 default_header" style="border-bottom: #000 solid 2px;">KENYAN COUNTIES</div>
  <div class="col-sm-12 col-xs-12">
    <?php

include("../../../../connect.php");
$counter=0;
$sql="SELECT * FROM counties where id<48 order by county_name asc";
    $query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
       $county_id=$row['id'];
      $county_name=$row['county_name'];
      $logo=$row['logo'];
    $website=$row['website'];
    $serial_no=$row['serial_no'];

    ?>
      <div class="col-sm-2 col-xs-3 cabinatehouser">
    <div class="col-sm-12 col-xs-12 dheading" style="font-size: 11px !important;"><?php echo /*"0".$serial_no." ".*/$county_name?></div>
          <div class="col-sm-12 col-xs-12 carbinates"         style="background:url('<?php echo "images/logo/".$logo?>')" ></div>

        <div class="col-sm-12 col-xs-12 viewgbtins "><span class="button_viewcab btn theme_bg" id="<?php echo $county_id?>">Open <i class="fa fa-folder-open"></i></span></div>
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
$.post("modules/system/callcenter/Counties/view.php",{yeard:yeard},function(data){
  $("#home").html(data);
      })
})
    })
</script>