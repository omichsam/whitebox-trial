<style type="text/css">
    #buton_n{
        margin-top: 10px;
        margin-bottom: 5px;
        text-align: right;
    }
</style>


<div class="col-sm-12 col-xs-12">
                <div class="col-sm-6 col-sm-12">
                    <h5 class="col-sm-12 col-xs-12 innovations_hed">Investors</h5>
                    <div  class="col-sm-12 col-xs-12 innovations_b font_justified">
                         <div  class="col-sm-12 col-xs-12 jutict ">
                       <strong>HeriHub Innovation Portal</strong> seeks to leverage <strong>innovations</strong> and <strong>technologies</strong> that promote <strong>cultural</strong> and <strong>natural heritage</strong>. This platform acts as a link between investors or implementers with innovations that have a high potential in providing sustainable solutions.

                    </div>
                     <div  class="col-sm-12 col-xs-12 jutict">

                        <strong>Investors /Implementers</strong> play a critical role in encouraging the public to come up with innovations and ideas that provide solutions to the challenges that the society faces by becoming champions of these solutions. The platform also acts as a provider for <strong>Corporate Social Responsibility projects</strong> to individuals and organizations.
                       
                    </div>
                   <!-- <div class="col-sm-12 col-xs-12">
                        <a href="application.html" class="f-s-0-88rem quicksand-font">Click here to become an investor</a>
                    </div>-->
                </div>

</div>
 <div class="col-xs-12 col-sm-6 jutict" >
                    <h5 class="innovations_hed">Application procedure</h5>

                    <div class="col-xs-12 col-sm-12  innovations_b font_justified">
                   <p class="col-sm-12 col-xs-12 no_padding">

                        To become an investor:
                    </p>
                    <p class="col-sm-12 col-xs-12 ">
                       1. Click on the <strong>apply</strong> button.
                    </p>
                    <p class="col-sm-12 col-xs-12 ">
                       2. <strong>Sign up</strong> if you are a <strong>new user</strong> then log in using <strong>username</strong> and <strong>password</strong>.
                    </p>
                    <p class="col-sm-12 col-xs-12 ">
                        3. Fill all the <strong>user details</strong> and <strong>save</strong>.
                    </p>
                    <p class="col-sm-12 col-xs-12 no_padding">
                       <strong>NB:</strong> You will receive email notifications on innovations that fall under your area of interest through your dashboard.
                    </p>
                    
                    <div class="col-xs-12 col-sm-12 " id="cont_div"><br><span class=" cont_div btn theme_bg " id="">Apply</span></div>
                   </div>
     </div>

   <!-- <div class="col-xs-12 col-sm-12 mobile_hidden">
                    <h5 class="innovations_hed">Our partners</h5>
                    <div class="col-xs-12 col-sm-12  innovations_b" id="patners">
                      
                  



                    </div>
    </div>-->









            </div>
            <script type="text/javascript">
                 $(document).ready(function(){
        $(".investors_o").click(function(){
             $(".home_parents").hide();
            $("#invlogin_holder").show();
            //alert("under construction");
            $(".side_menu").css("min-height","0px").removeClass("slideInLeft").addClass("animated slideOutLeft");
            $(".side_menu").addClass("mobile_hidden");

        
            
         // alert()
         
        })
 $.post("modules/body/web/patners.php",{

         },function(data){
            //alert(data)
        $("#patners").html(data)
           })
})
            </script>