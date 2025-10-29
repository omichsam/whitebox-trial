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
  width: 350px;
  height: 150px;
  /*line-height: 150px;
  text-align: center;
  */
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
        min-height: 120px;
        max-height: 140px !important;
        border-radius: 30px;
        border:3px solid #e6b234;;
        margin-top: 5px;
        background: #ccc;
        background-position: center !important;
        background-size: contain !important;
        background-repeat: no-repeat !important;

    }
     .inno_process:hover{
     box-shadow: 0 2px 13px #000;
     }
    .arrowed{

        min-height: 160px;
        margin-top: 1px;
        background-position: center !important;
        background-size: contain !important;
        background-repeat: no-repeat !important;
        background:url("images/icons/arrows.jpg");
    }
    .process_po{
      text-align: center;
      font-weight: bolder;
      font-size: 25px;
      color:#e7663c;
      margin-top: 45px;
      padding-left: -10px;
      text-transform: uppercase;
    }
    .pops_innovation{
      cursor: pointer;
    }
    .hh_processes{
      font-weight: bolder;
      text-align: center;
      text-transform: uppercase;
      border-bottom: 1px solid #ccc;
    }
      </style>




      <div id="process-slide">
        <div class="process-slide--wrap">
          <ul id="process-slide--list" class="clearfix">
              <li class="col-sm-2 pops_innovation">
                <span class="inno_process col-sm-12" > 
                  <span id="Submission" class="process_po no_padding col-sm-12 col-xs-12">Submission</span>
                   </span>
                 </li>
               <li class="col-sm-2 ">
                <span class="arrowed col-sm-12"></span>
              </li>
                <li class="col-sm-2 pops_innovation ">
                  <span class="inno_process col-sm-12" >
                    <span id="First_Evaluation " class="process_po no_padding col-sm-12 col-xs-12">First Evaluation</span>
                  </span>
                </li>
               <li class="col-sm-2 ">
                <span class="arrowed col-sm-12"></span>
              </li>
              <li class="col-sm-2 pops_innovation">
                  <span class="inno_process col-sm-12" >
                    <span id="Second_Evaluation " class="process_po no_padding col-sm-12 col-xs-12">Second Evaluation</span>
                  </span>
                </li>
                <li class="col-sm-2 ">
                <span class="arrowed col-sm-12"></span>
              </li>
              <li class="col-sm-2 pops_innovation">
                <span class="inno_process col-sm-12">
                  <span id="Implementation" class="process_po no_padding col-sm-12 col-xs-12">Implementation</span>
                </span>
              </li>

              <li class="col-sm-2 "><span class=" col-sm-12"></span></li>
                <li class="col-sm-4 font_justified ">
                  <div class="col-sm-12  col-xs-12 no_padding hh_processes">Submission</div>
                  <div class="col-sm-12  col-xs-12 no_padding">1. Innovations is submited through forms</div>
                  <div class="col-sm-12  col-xs-12 no_padding">2. All questions given must be answered</div>
                  <div class="col-sm-12  col-xs-12 no_padding">3. Innovation is conveyed to evaluating team upon submission</div>
                </li>
              <li class="col-sm-4 font_justified ">
                  <div class="col-sm-12  col-xs-12 no_padding hh_processes">First evaluation</div>
                  <div class="col-sm-12  col-xs-12 no_padding">1. Innovation submited is recieved</div>
                  <div class="col-sm-12  col-xs-12 no_padding">2. Evaluation is done and comments given</div>
                  <div class="col-sm-12  col-xs-12 no_padding">3. A decision whether it preceeds or not is given</div>
                  <div class="col-sm-12  col-xs-12 no_padding">4. A report on the innovation is written</div>
                </li>
               <li class="col-sm-4 font_justified ">
                  <div class="col-sm-12  col-xs-12 no_padding hh_processes">Second evalutiaon</div>
                  <div class="col-sm-12  col-xs-12 no_padding">1. Innovations from first evaluation are recieved</div>
                  <div class="col-sm-12  col-xs-12 no_padding">2. Evaluation is done again and comments given</div>
                  <div class="col-sm-12  col-xs-12 no_padding">3. A decision whether it preceeds or not is given</div>
                   <div class="col-sm-12  col-xs-12 no_padding">4. A report from first evaluation are reviewed</div>
                </li>
                <li class="col-sm-4 font_justified ">
                  <div class="col-sm-12  col-xs-12 no_padding hh_processes">Implementation</div>
                  <div class="col-sm-12  col-xs-12 no_padding">1. Successful innovations from second evaluation are forwarded to investors for implementations </div>
                </li>
              <li class="col-sm-2 "><span class=" col-sm-12"></span></li>
              <li class="col-sm-2 "><span class=" col-sm-12"></span></li>
              <li class="col-sm-2 "><span class=" col-sm-12"></span></li>
          </ul>
        </div>
</div>
   
<script type="text/javascript">
  $(function(){
  var $slider = $('#process-slide--list');
  var sizeImage = 350;
  var items = $slider.children().length;
  var itemswidth = (items * sizeImage); // 140px width for each client item 
  $slider.css('width',itemswidth);
  
  var rotating = true;
  var sliderspeed = 0;
  var seeitems = setInterval(rotateSlider, sliderspeed);
  
  $(document).on({
    mouseenter: function(){
      rotating = false; 
  // document.getElementById('id01').style.display='block';
      // turn off rotation when hovering
    },
    mouseleave: function(){
      rotating = true;
     // document.getElementById('id01').style.display='none';
    }
  }, '#process-slide');
  
  function rotateSlider() {
    if(rotating != false) {
      var $first = $('#process-slide--list li:first');
      $first.animate({ 'margin-left': '-'+sizeImage+'px' }, 4500, "linear", function() {
        $first.remove().css({ 'margin-left': '0px' });
        $('#process-slide--list li:last').after($first);
      });
    }else{
      $first.stop();
    }
  }
});



</script>