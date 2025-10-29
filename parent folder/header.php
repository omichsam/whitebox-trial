 <!-- Header Start -->
    <style>
        .menu_dtz{
            cursor:pointer;
        }
        .menubtns{
            cursor:pointer;
        }
    </style>
<script type="text/javascript">
            $(document).ready(function(){
               // alert()
                $("#about_us").click(function(){
                    
                   $(".home_pages").hide();
                      $(".parentsd").hide();
                   $(".about_uspages").show();
                  
                // $("#home_page").hide();
                })
                $("#open_elerning").click(function(){
              // $("#loginview").click();
                  $("#login_headers").html("SIGN UP TO E-LEARNING")
                    $(".logins").hide();
                    $("#elearning_page").show();
                })
               $("#e_learningp").click(function(){
                // $("#loginview").click();
                  $("#login_headers").html("SIGN UP TO E-LEARNING")
                    $(".logins").hide();
                    $("#elearning_page").show();
                  // alert()
                })
                $("#home_pagedd").click(function(){
                $(".parentsd").hide();
              $(".home_pages").show();
              //$(".about_uspages").hide();
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
                


                 $("#backlogins").click(function(){
               $(".logins").hide();
               $("#login_page").show();
               $("#login_headers").html("LOGIN HERE")
                })
                 $("#forgot_pwd_title").click(function(){
                    //alert()
                   $("#login_headers").html("RESSET PASSWORD")
                    $(".logins").hide();
                    $("#pass_resetpage").show();
                   
                })
$(".menubtns").click(function(){
    var my_role=$(this).attr("role");
    //alert(my_role)
   //  $("#home_page").hide();
    $(".home_pages").hide();
   $(".modal-backdrop").hide();
    $('body').removeClass("modal-open");
     $("#mainMenu").modal("hide").removeData();
                 $(".parentsd").hide();
               $("."+my_role).show();
                
})

$(".loginview_btns").click(function(){

$(".logins").hide();
               $("#login_page").show();
               $("#login_headers").html("LOGIN HERE")
            })
})
</script>


    <header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!-- Icon Section Start -->
      <!--   -->
        <!-- //Icon Section End -->
        <!-- Nav bar Start -->
      <nav class="navbar navbar-default container-fluid">
     
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
                    <span><a href="#"><i class="livicon menu_dtz" data-name="responsive-menu" data-size="25" data-loop="true" data-c="#757b87" data-hc="#ccc" id="livicon-1" style="width: 25px; height: 25px;"></i>
                    </a></span>
                </button>
                <a class="navbar-brand" href="index.php"><img src="Huduma_WhiteBox/Whitebox.png" alt="logo" class="logo_position">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="collapse">

                <ul class="nav navbar-nav navbar-right">
                    <li class="active menu_dtz"><a id="home_pagedd"> Home</a>
                    </li>
                    <!--  -->
                  <!--   -->
                    <!--  -->
                     <li>
                        <a class="menu_dtz" id="about_us">Who we are</a> 

                     </li>
                   
                    
                                            <li><a href="#loginmodal" data-toggle="modal"  id="loginview" class="loginview_btns">Login</a>
                        </li>
                        
                                        <li>
                        <a href="#mainMenu" data-toggle="modal"> <i class="livicon" data-name="thumbnails-big" data-size="18" data-loop="true" data-c="#757b87" data-hc="#418BCA" id="livicon-2" style="width: 18px; height: 18px;"></i></a>
                    </li>
                      <li>
                        <a class="menu_dtz" id="e_learningp" href="#loginmodal" data-toggle="modal">E-learning</a> 

                     </li>
                    <!--  -->
                    <a class="navbar-brand "><img src="Huduma_WhiteBox/moict.png" alt="logo" class="logo_position"> </a>

                    <!-- The Modal -->
  <div class="modal" id="mainMenu">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
            <!--  -->
            <hr class="text-warning" style="border: solid 1px;">
          
         
        
        <!-- Modal body -->
        <div class="modal-body">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4 text-center">
                    <a id="open_advisory" role="advisory_pages" class="menubtns">
                        <i class="livicon" data-name="comments" data-size="40" data-loop="true" data-c="green" data-hc="#BC0000" id="livicon-3" style="width: 40px; height: 40px;"></i>
                    <p style="text-align: center;">Advisory Council </p>
                    </a>                    
                </div>
                 <!--<div class="col-md-4 col-sm-4 col-xs-4 text-center">
                   <a role="advisory_pages" class="menubtns">
                        <i class="livicon" data-name="users" data-size="40" data-loop="true" data-c="brown" data-hc="black" id="livicon-4" style="width: 40px; height: 40px;"></i>
                    <p style="text-align: center;">Secretariat</p>
                    </a>                  
                </div>-->
                
                <div class="col-md-4 col-sm-4 col-xs-4 text-center">
                    <a role="investor_pages" class="menubtns" >
                        <i class="livicon" data-name="briefcase" data-size="40" data-loop="true" data-c="purple" data-hc="orange" id="livicon-5" style="width: 40px; height: 40px;"></i>
                    <p style="text-align: center;">Investors</p>
                    </a>                    
                </div>                              
<div class="col-md-4 col-sm-4 col-xs-4 text-center">
                    <a role="partners_page" class="menubtns" >
                        <i class="livicon" data-name="link" data-size="40" data-loop="true" data-c="#ffad4e" data-hc="black" id="livicon-7" style="width: 40px; height: 40px;"></i>
                    <p style="text-align: center;">Partners</p>
                    </a>                    
                </div>
                
            </div>

            <hr class="text-primary">

            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-4 text-center">
                    <a role="contacts_pages" class="menubtns" >
                        <i class="livicon" data-name="tablet" data-size="40" data-loop="true" data-c="#757b87" data-hc="#5BC0DE" id="livicon-6" style="width: 40px; height: 40px;"></i>
                    <p style="text-align: center;">Talk to us </p>
                    </a>                    
                </div>
               <!-- <div class="col-md-4 col-sm-4 col-xs-4 text-center">
                    <a role="partners_page" class="menubtns" >
                        <i class="livicon" data-name="link" data-size="40" data-loop="true" data-c="#ffad4e" data-hc="black" id="livicon-7" style="width: 40px; height: 40px;"></i>
                    <p style="text-align: center;">Partners</p>
                    </a>                    
                </div>-->
                <div class="col-md-4 col-sm-4 col-xs-4 text-center">
                    <a role="questions" class="menubtns" >
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
                <div class="col-md-4 col-sm-4 col-xs-4 text-center">
                    <a href="https://drive.google.com/drive/u/2/folders/1cVxoGI1RoM7EPDfvbADR7jmwb8S6eDue" target="_blank">
                        <i class="livicon" data-name="desktop" data-size="40" data-loop="true" data-c="#88b0dd" data-hc="#44cecb" id="livicon-9" style="width: 40px; height: 40px;"></i>
                    <p style="text-align: center;"> Library</p>
                    </a>                    
                </div>

                
            </div>
            <hr class="text-primary">

            <div class="row">
                
               <!-- <div class="col-md-4 col-sm-4 col-xs-4 text-center">
                    <a href="https://goo.gl/pqfuzq" target="_blank">
                        <i class="livicon" data-name="desktop" data-size="40" data-loop="true" data-c="#88b0dd" data-hc="#44cecb" id="livicon-9" style="width: 40px; height: 40px;"></i>
                    <p style="text-align: center;"> Library</p>
                    </a>                    
                </div>-->
                <div class="col-md-4 col-sm-4 col-xs-4 text-center">
                    <a role="library" class="menubtns">
                        <i class="livicon" data-name="clapboard" data-size="40" data-loop="true" data-c="#4d79ff" data-hc="#ff1a1a" id="livicon-10" style="width: 40px; height: 40px;"></i>
                    <p style="text-align: center;">Media </p>
                    </a>                    
                </div>
                <!--  -->

                
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
    
