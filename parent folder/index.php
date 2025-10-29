<?php
session_start();
?>
<!DOCTYPE html>

<?php
$id="";
$datab="not_shown";
 
 if (isset($_SESSION["id"])){
 
  $loginuser=$_SESSION["username"];

$user=base64_decode($loginuser);
//echo $user;

include("connect.php");
$user_not="";



$checkExist=mysqli_query($con,"SELECT * FROM users WHERE email='$user'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)!=0){

 $user_not="dashboard";

}else{

$checkExist=mysqli_query($con,"SELECT * FROM e_learning_users WHERE email='$user'") or die(mysqli_error($con));

  if(mysqli_num_rows($checkExist)!=0){

 $user_not="e_learning";

}else{
   $_SESSION = array();
 
// Destroy the session.
session_destroy();
 //echo base64_encode("success");
 ?>
 <script type="text/javascript">
      location.replace("index.php");
 </script>
<?php 
}



}

 }else{
   $datab="";  
 }
 //echo $_SESSION["username"];
 ?>

<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    <style>
        @media all and (max-width:768px){
.mobile_hidden{
    display: none !important;
}
.mobipdless{
    padding: 4px  !important;
 }

}
@media all and (min-width: 768px){
.desktop_hidden{
    display: none !important;
}

}
    .default_header{
  text-align: center;
  text-transform: uppercase;
  font-weight: bolder;
}
</style>
<?php include('links.php');
?>
</head>

<input type="hidden" class="splashinputs" id="user_email">
<body class="no_padding" style="padding-left:0px !important;padding-right:0px !important;top:0px !important" id="bodysd_full">
  <div class="col-md-12 not_shown no_padding" id="landing_page"></div>
   <div class="col-md-12 no_padding " id="home_pagedata">
<?php include("header.php");?>

    <!-- slider / breadcrumbs section -->
    
    <!--Carousel Start -->


   <?php include("home.php");?>

<?php include("about.php");
?>
<?php include("advisory.php");
?>
<?php include("investor.php");
?>
<?php include("contact.php");
?>
<?php include("partners.php");
?>
<?php include("questions.php");
?>
<?php include("library.php");

?>
<?php include("news.php");

?>
 
<?php include("launch.php");

?> 
<!---end of contact us page -->
<?php include("property.php");
?>
<?php include("logins.php");

?>
 <!-- //Container End -->
<?php include("footer.php");
?>
    <div class="copyright">
        <div class="container">
        <p>Copyright © Huduma WhiteBox, <script type="text/javascript">
            document.write(new Date().getFullYear());
          </script></p>
        </div>
    </div>
    <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="" data-toggle="tooltip" data-placement="left" data-original-title="Return to top" aria-describedby="tooltip537746">
        <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white" id="livicon-20" style="width: 18px; height: 18px;"></i>
    </a><div class="tooltip fade left in" role="tooltip" id="tooltip537746" style="top: 0px; left: -96px; display: block;"><div class="tooltip-arrow" style="top: 0%;"></div><div class="tooltip-inner">Return to top</div>

<!--loaedr-->
</div>
</div>
<div class=" col-sm-12 col-xs-12 not_shown" id="loader">
    <img src="Huduma_WhiteBox/images/loader1.gif"  id="loaderimg">
</div>
 <script type="text/javascript" src="Huduma_WhiteBox/js/jquery.js"></script>
    <!--global js starts-->
    
    <!--page level js ends-->
     <script type="text/javascript">

        $('.count').each(function () {
            $(this).prop('Counter', 0).animate({
                Counter: $(this).text()
            }, {
                duration: 4000,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                }
            });
        });
    </script>
       <script>
            $(document).ready(function(){
                //var recoversource="";
               // alert()
            $("#loginmodaldd").click(function(){
//alert()

            })
                $("#about_us").click(function(){
                    $(".about_uspages").show();
                 $("#home_page").hide();
                })
                $("#home_pagedd").click(function(){
              
              $("#home_page").show();
              $(".about_uspages").hide();
                })
                $("#back_tologin").click(function(){
               $(".logins").hide();
               $("#login_page").show();
               $("#login_headers").html("LOGIN HERE")
                })
                $("#back_toregister").click(function(){
                    $("#login_headers").html("SIGN UP HERE")
                    $(".logins").hide();
                    $("#register_page").show();
                })
                   $("#back_toelearning").click(function(){
                    $("#login_headers").html("SIGN UP TO E-LEARNING")
                    $(".logins").hide();
                    $("#elearning_page").show();
                })
                

      //gto confirm acc 
      var loginuser='<?php echo $loginuser?>';
      //alert(loginuser)
      if(loginuser){
        var user_not='<?php echo $user_not?>';

          //  var busername=btoa('<?php echo $user?>');
            // alert(busername)
$("#user_email").val(loginuser);

 $.post("mydashboard/"+user_not+".php",{model:loginuser},function(data){
$(".modal-backdrop").hide();
    $('body').removeClass("modal-open");
            $("#error_data").html("");

$("#home_pagedata").hide().html("");
$("#home_pagedata").html("");
    $("#loginmodal").modal("hide").removeData();
    $("#landing_page").show().html(data);

        $("#confirm_dderror").html("").css("color","black");

//body.style.removeProperty('padding-right');


    //$("#home_page").hide();
    $("#error_data").html("");


})
}else{

}
   
 });
  </script>
    <!-- end page level js -->
      <script type="text/javascript"  src="minijava.js"></script>
    <script type="text/javascript" src="Huduma_WhiteBox/jquery.js"></script>
<script type="text/javascript" src="Huduma_WhiteBox/bootstrap.js"></script>
<script src="Huduma_WhiteBox/bootstrapValidator.js" type="text/javascript"></script>
<script type="text/javascript" src="Huduma_WhiteBox/icheck.js"></script>
<script type="text/javascript" src="Huduma_WhiteBox/register_custom.js"></script>
<!--global js end-->
<script type="text/javascript" src="Huduma_WhiteBox/slick.js"></script>
<!--page level js ends-->
<!-- <script type="text/javascript">
    $(document).ready(function(){
        $('.partners-logos').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1000,
            arrows: false,
            dots: false,
                pauseOnHover: false,
                responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 4
                }
            }, {
                breakpoint: 520,
                settings: {
                    slidesToShow: 3
                }
            }]
        });
    });
</script> -->

<script language="JavaScript">
$(document).ready(function(){
  $(document).bind("contextmenu",function(e){
        
//return false;
        
    })  
    
    
})




  /*  function ValidateForm(form) {
        ErrorText = "";
        if ((form.terms.checked == false)) {
            alert("Please Accept the Terms and Conditions");
            return false;
        }
        if (ErrorText = "") {
            form.submit()
        }
    }*/
</script>


<!--
<i title="Raphaël Colour Picker" style="display: none; color: purple;"></i>
<iframe scrolling="no" allowtransparency="true" src="Huduma_WhiteBox/widget_iframe.html" title="Twitter settings iframe" style="display: none;" frameborder="0"></iframe>
<iframe id="rufous-sandbox" scrolling="no" allowtransparency="true" allowfullscreen="true" style="position: absolute; visibility: hidden; display: none; width: 0px; height: 0px; padding: 0px; border: medium none;" title="Twitter analytics iframe" frameborder="0"></iframe>-->
</body>
</html>