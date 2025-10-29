<style type="text/css">
  .side_m_btns{
text-transform: uppercase;
letter-spacing: 0.05px !important;
color: #5f6064;
padding: 1em 1.4em 1em !important;
font-size: 14px !important;
font-weight: 700;
line-height: 1.3em;
cursor: pointer;
  }
   .side_m_btns:hover{
   font-weight: 16px;
    background:#000;
    color:#fff;
  }
    .sidebtn_web{
      cursor: pointer;
text-transform: uppercase;
letter-spacing: 0.05px !important;
color: #5f6064;
padding: 1em 1.4em 1em !important;
font-size: 14px !important;
font-weight: 700;
line-height: 1.3em;
  }
   .sidebtn_web:hover{
   font-weight: 16px;
    background:#000;
    color:#fff;
  }
  .close_menu{
    cursor: pointer;
  }
#nav_disps{

/*
  z-index: 2;
font-size: 17px;
background-color: #5f5f5f;
color: #f1f1f1;
width: 100%;
padding: 0;
letter-spacing: 1px;
font-family: "Segoe UI",Arial,sans-serif;
*/
}
</style>


<div class="col-xs-12 no_padding" id="nav_disps">
  
<div class="col-xs-12 no_padding "  style="text-align: right;"><i class="fa fa-close btn close_menu fa-2x"></i></div>

<div class="col-xs-12 no_padding  side_m_btns" role="home"> <div class="col-xs-2"></div><div class="col-xs-10"><i class="fa fa-home">  Home </i></div></div>
<div class="col-xs-12 no_padding side_m_btns" role="innovations"><div class="col-xs-2"></div><div class="col-xs-10"><i class=" fa fa-creative-commons">  Innovations </i></div></div>
<div class="col-xs-12 no_padding  side_m_btns" role="investor"><div class="col-xs-2"></div><div class="col-xs-10"><i class="fa fa-briefcase">  Investors </i></div></div>
<!--<div class="col-xs-12 no_padding  sidebtn_web
"  role="website"><div class="col-xs-2"></div><div class="col-xs-10"><i class="fa fa-globe"></i>  Our website </div></div>-->
<div class="col-xs-12 no_padding side_m_btns" role="contacts"><div class="col-xs-2"></div><div class="col-xs-10"><i class="fa fa-phone">  Contacts </i></div></div>
<div class="col-xs-12 no_padding  side_m_btns" role="login"><div class="col-xs-2"></div><div class="col-xs-10"><i class="fa fa-lock">  Login </i></div></div>
<div class="col-xs-12 no_padding  side_m_btns"  role="faq"><div class="col-xs-2"></div><div class="col-xs-10"><i class="fa fa-question-circle"></i>  Faqs </div></div>



</div>
<script type="text/javascript">
  
  $(document).ready(function(){



    $(".sidebtn_web").click(function(){
window.open('https://www.museums.or.ke')
$(".side_menu").css("min-height","0px").removeClass("slideInLeft").addClass("animated slideOutLeft");
      $(".side_menu").addClass("mobile_hidden");
    })
  $(".side_m_btns").click(function(){

      var directions=$(this).attr("role")
      $(".home_parents").hide();
      $("#"+directions+"_holder").show()
      //alert("under construction");
      $(".side_menu").css("min-height","0px").removeClass("slideInLeft").addClass("animated slideOutLeft");
      $(".side_menu").addClass("mobile_hidden");
    })




$(".close_menu").click(function(){
  //
  $(".side_menu").css("min-height","0px").removeClass("slideInLeft").addClass("animated slideOutLeft");
$(".side_menu").addClass("mobile_hidden");

})


  })
</script>