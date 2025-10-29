      <style type="text/css">
        #process-slide {
  display: block;
 margin: 0px -49px 2px -50px;

}
#process-slide .process-slide--wrap {
  display: block;
  width: 95%;
  margin: 0 auto;
  overflow: hidden;
}
#process-slide .process-slide--wrap ul {
  display: block;
  list-style: none;
  position: relative;
  margin-left: auto;
  margin-right: auto;
}
#process-slide .process-slide--wrap ul li {
  display: block;
  float: left;
  position: relative;
  width: 200px;
  height: 200px;
  line-height: 200px;
  text-align: center;
}
#process-slide .process-slide--wrap ul li span {
  vertical-align: middle;
  max-width: 100%;
  max-height: 100%;
  -webkit-transition: 0 linear left;
  -moz-transition: 0 linear left;
  transition: 0 linear left;
  opacity: 1.65;
}
#process-slide .process-slide--wrap ul li span:hover {
  opacity: 1;

}
 .inno_process{
        min-height: 160px;
        border-radius: 30px;
        border:1px solid #000;
        margin-top: 5px;
        background-position: center !important;
        background-size: contain !important;
        background-repeat: no-repeat !important;

    }
    .arrowed{

        min-height: 160px;
        margin-top: 5px;
        background-position: center !important;
        background-size: contain !important;
        background-repeat: no-repeat !important;
        background:url("images/icons/arrows.jpg");
    }
      </style>




      <div id="process-slide">
        <div class="process-slide--wrap">
          <ul id="process-slide--list" class="clearfix">
              <li class="col-sm-2 ">
              	<span class="inno_process col-sm-12" style="
        background:url('images/icons/submit.jpg');"> </span></li>
                <li class="col-sm-2 "><span class="inno_process col-sm-12" style="
        background:url('images/icons/evaluate.jpg');"></span></li>
              <li class="col-sm-2 "><span class="inno_process col-sm-12" style="
        background:url('images/icons/approve.jpg');"></span></li>
              <li class="col-sm-2 "><span class="inno_process col-sm-12" style="
        background:url('images/icons/implement.jpg');"></span></li>

          </ul>
        </div>
</div>
<script type="text/javascript">
  $(function(){
  var $slider = $('#process-slide--list');
  var sizeImage = 200;
  var items = $slider.children().length;
  var itemswidth = (items * sizeImage); // 140px width for each client item 
  $slider.css('width',itemswidth);
  
  var rotating = true;
  var sliderspeed = 0;
  var seeitems = setInterval(rotateSlider, sliderspeed);
  
  $(document).on({
    mouseenter: function(){
      rotating = false; // turn off rotation when hovering
    },
    mouseleave: function(){
      rotating = true;
    }
  }, '#process-slide');
  
  function rotateSlider() {
    if(rotating != false) {
      var $first = $('#process-slide--list li:first');
      $first.animate({ 'margin-left': '-'+sizeImage+'px' }, 3000, "linear", function() {
        $first.remove().css({ 'margin-left': '0px' });
        $('#process-slide--list li:last').after($first);
      });
    }else{
      $first.stop();
    }
  }
});

</script>