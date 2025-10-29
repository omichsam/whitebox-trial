<link rel="stylesheet" type="text/css" href="modules/system/external/popup/popupcss.css">
<script type="text/javascript">
  $(document).ready(function(){
    $("#close_alert_btn").click(function(){
        $("#alertoverly").hide();
       
    });
    $(".poppageback_btn").click(function(){
      clearInterval(IboxInterval);
    })
  })


</script>
<section class="popuppages_wrap" id="popuplevel1">
	 <div class="theme_bg popupheads">
	 	<i class="fa fa-arrow-left btn   float_left poppageback_btn"></i>
	 	<div class="float_right s80 popupheadcontent">
	 				Messages inbox
	 	</div>  
	 </div>
	 <div class="float_left popbody">
	 	
	 </div>
</section>

<section id="alertoverly1" class="not_shown pageoverly">
      <div class="float_left full s100 not_shown" id="alertcontainer">
        <div class="col-sm-4 col-xs-12"></div>
        <div class="col-sm-4 col-xs-12" id="alert_wrap">
            <div id="alert_head">
              <span class="float_left btn" id="close_alert_btn"> <i class="fa fa-arrow-left"></i></span>
              <span id="alert_title">Tittle goes here </span>
            </div>
             <div id="alert_body">

            </div>
        </div>
        <div class="col-sm-4 col-xs-12"></div>
      </div>
      <pagewrap class="float_left full s100 not_shown">

      </pagewrap>
</section>

<section id="alertoverly2" class="not_shown pageoverly">
      <pagewrap class="float_left full s100 not_shown">

      </pagewrap>
</section>

<section id="alertoverly3" class="not_shown pageoverly">
      <pagewrap class="float_left full s100 not_shown">

      </pagewrap>
</section>