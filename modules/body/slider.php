<style type="text/css">
  #slideshow { 
    
    min-height: 320px;
    max-height: 320px;
    overflow: hidden;
    /*box-shadow: 0 0 20px rgba(0,0,0,0.4); */
}
.slider_imagesd{
  min-height: 320px;
    max-height: 320px;
    background-repeat: no-repeat !important;
    background-size: cover!important;
    background-position: center!important;
}


</style>


<div class="col-sm-12 col-xs-12 no_padding" id="slideshow">
   <div class="col-sm-12 col-xs-12 slider_imagesd" style="background:url('images/slider/slider1.jpg');">
     <img src="">
   </div>
   <div class="col-sm-12 col-xs-12 slider_imagesd"  style="background:url('images/slider/slider2.jpg');">
    
   </div >
   <div class="col-sm-12 col-xs-12 slider_imagesd"  style="background:url('images/slider/slider3.jpg');">

   </div>
</div>
<script type="text/javascript">
  



$("#slideshow > div:gt(0)").hide();

setInterval(function() {
  $('#slideshow > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow');
}, 8000);




</script>