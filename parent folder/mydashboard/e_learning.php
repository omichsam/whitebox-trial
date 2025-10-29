<?php
session_start();
//include("../base_connect.php");
include("../connect.php");

  $user=base64_decode($_POST["model"]);


//echo $user;
//echo "<script type='text/javascript'>alert('$user');</script>";
?>

<script type="text/javascript">
    $(document).ready(function(){
        $("#back_dashb").click(function(){
       $("#menu_page").show().removeClass("slideOutLeft").addClass("animated slideInLeft");
   })
     var historypage="";

         var my_id=$("#user_email").val();
         if(my_id){

         }else{
             var my_id=btoa('<?php echo $user?>');
             $("#user_email").val(my_id)
         }
       // alert(my_id)
 /*$.get("clock.php",function(data){
            $("#clock_data").html(data);
        })
 */
$(".notificationbtn").click(function(){
  var my_id=$("#user_email").val();
   var historypage=btoa("notifications");
  $.post("Huduma_WhiteBox/innovator/updatepage.php",{my_id:my_id,historypage:historypage},function(data){});
      $.post("modules/system/external/pages/notifications/notifications.php",{my_id:my_id},function(data){
$("#dashboard_loaders").html("");
$("#home_display").html(data).show();
$('html, body').animate({scrollTop: '0px'}, 300);
  $(".dashboard_holder").hide();
  $("#content_divesr").html("home_display");
     

      }); 
})

var my_id=btoa('<?php echo $user?>');
//var my_id="";
      $.post("modules/system/external/control/refresh.php",{my_id:my_id},function(data){$(".notyholderp").html(data)}); 

        $(".user_btns").click(function(){
            var my_role=$(this).attr("role");
            var loader=$("#loader").html();
            $("#dashboard_loaders").html("Loading..."+loader);

             if(my_role=="pitch"){
              var innovation=$(this).attr("name");
              //alert(innovation)
              var my_id=$("#user_email").val();
          $.post("modules/system/external/pages/pitch/pitch_page.php",{my_id:my_id,innovation:innovation},function(data){
$("#dashboard_loaders").html("");
$("#home_display").html(data).show();
$('html, body').animate({scrollTop: '0px'}, 300);
  $(".dashboard_holder").hide();
  $("#content_divesr").html("home_display");
       }) 
            }else if(my_role=="profile"){
           var historypage=btoa("profile");
            $.post("Huduma_WhiteBox/innovator/updatepage.php",{my_id:my_id,historypage:historypage},function(data){})
          $.post("Huduma_WhiteBox/innovator/profile.php",{my_id:my_id},function(data){
$("#dashboard_loaders").html("");
$("#home_display").html(data).show();
$('html, body').animate({scrollTop: '0px'}, 300);
  $(".dashboard_holder").hide();
  $("#content_divesr").html("home_display");
       }) 
            }else if(my_role=="innovations"){
var my_id=$("#user_email").val();
//alert(my_id)
            var historypage=btoa("innovations");
 $.post("Huduma_WhiteBox/innovator/updatepage.php",{my_id:my_id,historypage:historypage},function(data){});
          $.post("Huduma_WhiteBox/innovator/innovations.php",{my_id:my_id},function(data){
$("#dashboard_loaders").html("");
$("#home_display").html(data).show();
$('html, body').animate({scrollTop: '0px'}, 300);
  $(".dashboard_holder").hide();
  $("#content_divesr").html("home_display");
})
            }else{
            var my_id=$("#user_email").val();
            $.post("Huduma_WhiteBox/innovator/check.php",{my_id:my_id},function(data){
                var dadat=atob(data);
                if(dadat=="active"){
             var historypage=btoa(my_role);
$.post("Huduma_WhiteBox/innovator/updatepage.php",{my_id:my_id,historypage:historypage},function(data){});
            $.post("Huduma_WhiteBox/innovator/"+my_role+".php",{my_id:my_id},function(data){
$("#dashboard_loaders").html("");
$("#home_display").html(data).show();
$('html, body').animate({scrollTop: '0px'}, 300);
  $(".dashboard_holder").hide();
  $("#content_divesr").html("home_display");
            })
            }else{
              var txt;
  var r = confirm("You have not updated your profile details, press Ok to update or Cancel to stop?");
  if (r == true) {
            var historypage=btoa("profile");
$.post("Huduma_WhiteBox/innovator/updatepage.php",{my_id:my_id,historypage:historypage},function(data){});
       $.post("Huduma_WhiteBox/innovator/profile.php",{my_id:my_id},function(data){
$("#dashboard_loaders").html("");
$("#home_display").html(data).show();
$('html, body').animate({scrollTop: '0px'}, 300);
  $(".dashboard_holder").hide();
  $("#content_divesr").html("home_display");
       }) 
  }else{
    $("#dashboard_loaders").html("");  
  }
            }
           
            })
        }
        })

$("#back_dashb").click(function(){
   var my_id=$("#user_email").val();
   var historypage=btoa("Dashboard");
$.post("Huduma_WhiteBox/innovator/updatepage.php",{my_id:my_id,historypage:historypage},function(data){});
    $("#home_display").hide().html("");
  $(".dashboard_holder").show(); 
  $("#content_divesr").html("dashboard_holder");
  $('html, body').animate({scrollTop: '0px'}, 300);  
})

        $("#backtoDashboard").click(function(){

   var my_id=$("#user_email").val();
   var historypage=btoa("Dashboard");
$.post("Huduma_WhiteBox/innovator/updatepage.php",{my_id:my_id,historypage:historypage},function(data){});

         $("#home_display").hide().html("");
  $(".dashboard_holder").show(); 
  $("#content_divesr").html("dashboard_holder");
  $('html, body').animate({scrollTop: '0px'}, 300);  
        })
        $("#logout").click(function(){
            
            var txt;
  var r = confirm("Do you wish to logout?");
  if (r == true) {
            
   var my_id=$("#user_email").val();
   var historypage=btoa("Dashboard");
$.post("Huduma_WhiteBox/innovator/updatepage.php",{my_id:my_id,historypage:historypage},function(data){});
            $.post("login/logout.php",function(data){

                var ddata=atob(data)
                if(ddata=="success"){
             location.replace("index.php");
                }else{

                }
            });
  }else{
      
  }
        })

           /*setInterval(function(){
          check_session();
        }, 10000); */ //10000 means 10 seconds
 });  
    
       /*  function check_session()
       {
          $.ajax({
            url:"mydashboard/session.php",
            method:"POST",
            success:function(data)
            {
              if(data == '1')
              {




                //alert('Your session has been expired!');  
                window.location.href="index.php";
              }
            }
          })
var my_id=$("#user_email").val();
      $.post("modules/system/external/control/refresh.php",{my_id:my_id},function(data){$(".notyholderp").html(data)}); 
      
       }*/


</script>
<style type="text/css">
.header_details{
    font-size: 24px;
    font-weight: bolder;
    text-transform: uppercase;
    text-align: center;
}
    .notyholderp{
      color:red;
    }
    .not_shown{
        display: none;
    }
    .user_btns{
        cursor: pointer;
    }
    #home_display{
        min-height: 300px;
        background: #f5efed;
        min-width:100% !important;
    }
    .menu_dtz{
        cursor: pointer;
    }
    .timer_span {
  display: inline-block;
  font-size: 1.0em;
  list-style-type: none;
  padding: 1em;
  text-transform: uppercase;
}

.timer_span_li {
  display: block;
  font-size: 2.5rem;
color: #5F0000;
}
#menu_page{
    background: #fff;
height: 100%;
min-width: 300px;
max-width: 300px;
position: absolute;
z-index: 99;
display: none;
box-shadow: -11px 0px 18px #000;
border-right: 1px solid #ebf1f3;
}
</style>

<?php


?>



<!--global css starts-->

<link rel="stylesheet" type="text/css" href="Huduma_WhiteBox/css/lib.css">
<link href="Huduma_WhiteBox/css/app.css" rel="stylesheet" type="text/css">
<!--  -->

<!--end of global css-->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
<!--page level css-->


    <link rel="stylesheet" href="Huduma_WhiteBox/css/animate.css">
    <link rel="stylesheet" href="Huduma_WhiteBox/css/only_dashboard.css">
    <link rel="stylesheet" href="Huduma_WhiteBox/css/morris.css">
<!--end of page level css-->

    <script type="text/javascript" src="Huduma_WhiteBox/js/jquery.js"></script>
<script charset="utf-8" src="Huduma_WhiteBox/css/momenttimelinetweet.js"></script><script charset="utf-8" src="Huduma_WhiteBox/css/timeline.js"></script>
    <!-- Header Start -->

        <!-- Icon Section Start -->

        <!-- //Icon Section End -->
        <!-- Nav bar Start -->
        <nav class="navbar navbar-default container-fluid" style="max-height: 77px !important">
            <div class="navbar-header" style="max-height: 66px !important">
                <button type="button" id="back_dashb" class="navbar-toggle collapsed" >
                    <span><a href="#"><i class="livicon" data-name="responsive-menu" data-size="25" data-loop="true" data-c="#757b87" data-hc="#ccc" id="livicon-1" style="width: 25px; height: 25px;"></i>
                    </a></span>
                </button>
                <a class="menu_dtz"  class="navbar-brand" ><img src="Huduma_WhiteBox/Whitebox.png" alt="logo" class="logo_positiondd">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="collapse">

                <ul class="nav navbar-nav navbar-right">
                   
<li>
<a class="menu_dtz btn notificationbtn" id="" ><i class="fa fa-bell bell_hides no-radius"></i><i class="notyholderp"></i></a> 
</li>


<li><a class="menu_dtz" id="logout">Logout</a>
</li>
    <!--<a class="menu_dtz"  href="#mainMenu" data-toggle="modal"> <i class="livicon" data-name="thumbnails-big" data-size="18" data-loop="true" data-c="#757b87" data-hc="#418BCA" id="livicon-2" style="width: 18px; height: 18px;"></i></a>
-->
 <a class="navbar-brand "><img src="Huduma_WhiteBox/moict.png" alt="logo" class="logo_position"> </a></li>
<!-- The Modal -->
<div class="modal" id="mainMenu">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
              <!--    -->
                <hr class="text-warning" style="border: solid 1px;">



                <!-- Modal body -->
               <div class="modal-body">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4 text-center">
                    <a href="https://www.whitebox.go.ke/advisory">
                        <i class="livicon" data-name="comments" data-size="40" data-loop="true" data-c="green" data-hc="#BC0000" id="livicon-3" style="width: 40px; height: 40px;"></i>
                    <p style="text-align: center;">Advisory Council </p>
                    </a>                    
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4 text-center">
                    <a href="https://www.whitebox.go.ke/SecTeam">
                        <i class="livicon" data-name="users" data-size="40" data-loop="true" data-c="brown" data-hc="black" id="livicon-4" style="width: 40px; height: 40px;"></i>
                    <p style="text-align: center;">Secretariat</p>
                    </a>                    
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4 text-center">
                    <a href="https://www.whitebox.go.ke/investors" >
                        <i class="livicon" data-name="briefcase" data-size="40" data-loop="true" data-c="purple" data-hc="orange" id="livicon-5" style="width: 40px; height: 40px;"></i>
                    <p style="text-align: center;">Investors</p>
                    </a>                    
                </div>                              

                
            </div>

            <hr class="text-primary">

            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4 text-center">
                    <a href="https://www.whitebox.go.ke/contact">
                        <i class="livicon" data-name="tablet" data-size="40" data-loop="true" data-c="#757b87" data-hc="#5BC0DE" id="livicon-6" style="width: 40px; height: 40px;"></i>
                    <p style="text-align: center;">Talk to us </p>
                    </a>                    
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4 text-center">
                    <a href="https://www.whitebox.go.ke/partners">
                        <i class="livicon" data-name="link" data-size="40" data-loop="true" data-c="#ffad4e" data-hc="black" id="livicon-7" style="width: 40px; height: 40px;"></i>
                    <p style="text-align: center;">Partners</p>
                    </a>                    
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4 text-center">
                    <a href="https://www.whitebox.go.ke/faq">
                        <i class="livicon" data-name="question" data-size="40" data-loop="true" data-c="#FC936D" data-hc="#4483cb" id="livicon-8" style="width: 40px; height: 40px;"></i>
                    <p style="text-align: center;">FAQs </p>
                    </a>                    
                </div>
                <!-- <div class="col-md-4 col-sm-4 col-xs-4 text-center">
                    <a href="https://www.whitebox.go.ke/ict_players">
                        <i class="livicon" data-name="flag" data-size="40" data-loop="true" data-c="#3d5c5c" data-hc="#6662b0"></i>
                    <p style="text-align: center;">CIH</p>
                    </a>                    
                </div> -->

                
            </div>
            <hr class="text-primary">

            <div class="row">
                
                <div class="col-md-4 col-sm-4 col-xs-4 text-center">
                    <a href="https://goo.gl/pqfuzq" target="_blank">
                        <i class="livicon" data-name="desktop" data-size="40" data-loop="true" data-c="#88b0dd" data-hc="#44cecb" id="livicon-9" style="width: 40px; height: 40px;"></i>
                    <p style="text-align: center;">Virtual Library</p>
                    </a>                    
                </div>
                <div class="col-md-4 col-sm-4 col-xs-4 text-center">
                    <a href="https://www.whitebox.go.ke/eventcalender">
                        <i class="livicon" data-name="clapboard" data-size="40" data-loop="true" data-c="#4d79ff" data-hc="#ff1a1a" id="livicon-10" style="width: 40px; height: 40px;"></i>
                    <p style="text-align: center;">Media </p>
                    </a>                    
                </div>
                

                
            </div>
            <hr class="text-primary">

            <!--  -->
            
      
        </div>

                <!-- Modal footer -->


            </div>
        </div>
    </div>
</div></ul>
</div>
</nav>
<!-- Nav bar End -->
</header>
<!-- //Header End -->

<!-- slider / breadcrumbs section -->

<!-- Content -->
    <div class="ribbon">
    </div>
  
    <!--<section class="content-header dashboard_holder">
        
        <p>
            <h3 id="dashpdrt"><?php echo $error_message?> <span class="hidden-xs header_info" id="dashboard_loaders"></span><a class="btn desktop_hidden btn-danger" id="log_touter" style="color: #fff;cursor: pointer;float: right;">Logout</a><a class="notificationbtn btn menu_dtz desktop_hidden" style="float: right;" id="notifications" ><i class="fa fa-bell not_shown bell_hides"></i><i class="notyholderp"></i></a></h3> 
       </p>
       

       
    </section>-->
    <!-- <section class="col-md-12 container-fluid not_shown no_padding" id="content_divesr">
       
    </section>
    <section class="col-md-12 container-fluid not_shown no_padding" id="home_display">
        


    </section>-->
     <section class="col-md-12 container-fluid not_shown  no_padding" id="clock_holders" style="text-align: center;background: #fff" >
        <div class="row">
       <div class="col-sm-3"></div>
      <!-- <div class="col-xs-12 col-sm-6" id="clock_data" style="float:center !important;"></div> -->

</div>
    </section>

    <!--  -->

 <section id="menu_page" class="desktop_hidden"   style="min-height: 100%; max-height: 100%; overflow: auto;background: #222d32;">
    
 </section>
    <section class="content no_padding dashboard_holder">
        
        <div class="row no_padding">

        	<div class="col-sm-2 col-xs-12 mobile_hidden" id="controlsarea"></div>
        	<div class="col-sm-10 col-xs-12" id="learning_area" style="min-height:530px;max-height: 530px;overflow: auto;box-shadow: 0 0 2px #ccc;background: #fff;"></div>
        </div>
    </section>

        <!--  -->

        
<!-- Footer Section Start -->
<?php
//include("../footer.php");
?>

    <!-- Footer Section Start -->
    <footer>
        <div class="container-fluid footer-text">
            <!-- About Us Section Start -->
            <div class="col-sm-4">
                <h4>About Us</h4>
                <p>
                    The program is a one-stop-shop for anyone who wants 
to present/share/sell an idea, innovation, invention or solution. 
The WhiteBox facility will addresss submissions on a need, and case by 
case basis whilst creating opportunities for financial support, office 
facilities, technical support, advisory services, access to market, 
networking opportunities and access to incubation and accelerator 
facilities/programs through the extensive partner ecosystem.
                </p>
                &nbsp;


                <div><h4>Follow Us</h4>
                <ul class="list-inline">
                    <!--<li>
                        <a href="https://www.facebook.com/Whitebox-981156722045221/?modal=admin_todo_tour"> <i class="livicon" data-name="facebook" data-size="18" data-loop="true" data-c="#fff" ata-hc="#ababab" id="livicon-14" style="width: 18px; height: 18px;">
                        </i> </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/Whitebox_Ke"> <i class="livicon" data-name="twitter" data-size="18" data-loop="true" data-c="#fff" data-hc="#ababab" id="livicon-15" style="width: 18px; height: 18px;"></i> </a>
                    </li>-->

                    <li>
                        <a href="https://plus.google.com/u/1/"> <i class="livicon" data-name="google-plus" data-size="18" data-loop="true" data-c="#fff" data-hc="#ababab" id="livicon-16" style="width: 18px; height: 18px;"></i>                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/whitebox_ke/"> <i class="livicon" data-name="instagram" data-size="18" data-loop="true" data-c="#fff" data-hc="#ababab" id="livicon-17" style="width: 18px; height: 18px;"></i>  </a>
                    </li>
                      
                </ul>
            </div>
                <hr id="hr_border2">
               
            </div>
            <div class="col-sm-4">
                <h4>Contact Us</h4>
                <ul class="list-unstyled">
                <li>ICT Authority,</li>
                <li>Teleposta Towers, 12th Flr,</li>
                <li>Kenyatta Ave., Nairobi, Kenya.</li>
                <br>
                <li>P.O. Box 27150 - 00100,</li>
                <li>Nairobi, Kenya.</li>
                </ul>
                <li><i class="livicon icon4 icon3" data-name="cellphone" data-size="18" data-loop="true" data-c="#ccc" data-hc="#ccc" id="livicon-18" style="width: 18px; height: 18px;"></i>Phone:<br>
                    +254 20 2211960<br>
                    +254 20 2211961
                </li>

                <li><i class="livicon icon3" data-name="mail-alt" data-size="20" data-loop="true" data-c="#ccc" data-hc="#ccc" id="livicon-19" style="width: 20px; height: 20px;"></i> Email:<span class="text-primary" style="cursor: pointer;">
               whitebox@ict.go.ke</span>
                </li>
                <hr id="hr_border">
                
            </div>
            <!-- //Contact Section End -->
            <!-- Recent post Section Start -->
            <div class="col-sm-4">
<a class="twitter-timeline" data-height="310" href="https://twitter.com/Whitebox_Ke?ref_src=twsrc%5Etfw">Tweets by Whitebox_Ke</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> 

            </div>
            <!-- //Recent Post Section End -->
        </div>
    </footer>
    <!-- //Footer Section End -->

<!-- //Footer Section End -->
<div class="copyright">
    <div class="container">
        <p>Copyright © Huduma WhiteBox, <?php echo date('Y')?> </p>
    </div>
</div>
<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
    <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white" id="livicon-22" style="width: 18px; height: 18px;"></i>
</a>
<!--global js starts-->
<script type="text/javascript" src="Huduma_WhiteBox/css/lib.js"></script>
<script type="text/javascript" src="Huduma_WhiteBox/css/bootstrap.js"></script>

<!--global js end-->

<!-- begin page level js -->
    <script type="text/javascript" src="Huduma_WhiteBox/css/moment.js"></script>
    <!--for calendar-->
    <script src="Huduma_WhiteBox/css/moment.js" type="text/javascript"></script>
    <!-- Back to Top-->
    <script type="text/javascript" src="Huduma_WhiteBox/css/countUp.js"></script>
    
    <script src="Huduma_WhiteBox/css/morris.js"></script>
   
<!-- end page level js -->




<i title="Raphaël Colour Picker" style="display: none; color: purple;"></i><iframe scrolling="no" allowtransparency="true" src="Huduma_WhiteBox/css/widget_iframe.html" title="Twitter settings iframe" style="display: none;" frameborder="0"></iframe><iframe id="rufous-sandbox" scrolling="no" allowtransparency="true" allowfullscreen="true" style="position: absolute; visibility: hidden; display: none; width: 0px; height: 0px; padding: 0px; border: medium none;" title="Twitter analytics iframe" frameborder="0"></iframe>



    <script type="text/javascript" src="Huduma_WhiteBox/js/jquery.js"></script>
<script type="text/javascript">
   $(document).ready(function(){
   var my_id=$.trim($("#user_email").val().replace(/^\s+|\s+$/gm,''));
   	$.post("mydashboard/controls.php",{model:my_id},function(data){
   		$("#controlsarea").html(data);
         //$("#menu_page").html(data);

   	})
    $.post("mydashboard/menu.php",{model:my_id},function(data){
        //$("#controlsarea").html(data);
         $("#menu_page").html(data);

    })



   var loader=$("#loader").html();
   var history='<?php echo $new_page?>'; 
   var my_id=$.trim($("#user_email").val().replace(/^\s+|\s+$/gm,''));
   if(history==""){

   }else if(history=="Dashboard"){

   }else if(history=="notifications"){
    $("#dashboard_loaders").html("Retreaving pages..."+loader);
    $.post("modules/system/external/pages/notifications/notifications.php",{my_id:my_id},function(data){
$("#dashboard_loaders").html("");
$("#home_display").html(data).show();
$('html, body').animate({scrollTop: '0px'}, 300);
  $(".dashboard_holder").hide();
  $("#content_divesr").html("home_display");
            })
   }else{
    $("#dashboard_loaders").html("Retreaving pages..."+loader);
    $.post("Huduma_WhiteBox/innovator/"+history+".php",{my_id:my_id},function(data){
$("#dashboard_loaders").html("");
$("#home_display").html(data).show();
$('html, body').animate({scrollTop: '0px'}, 300);
  $(".dashboard_holder").hide();
  $("#content_divesr").html("home_display");
            })
   }     
       $("#log_touter").click(function(){
               var txt;
  var r = confirm("Do you wish to logout?");
  if (r == true) {
            
            $.post("login/logout.php",function(data){
                var ddata=atob(data)
                if(ddata=="success"){
             location.replace("index.php");
                }else{

                }
            });
  }else{
      
  }
     
       })
      
  })
</script>