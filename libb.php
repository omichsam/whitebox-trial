<style type="text/css">
    .media-object{
        height: 100px !important;
    }
</style>
<div class="container not_shown parentsd library">
        <div class="row news">
            <div class="col-md-4">
                <div class="row ">
                    
                                          <div class="col-sm-12 news-body">
                        <div class="text-left">
                            <div>
                                <h4 class="border-warning"><span class="heading_border bg-warning">Popular News</span>
                                </h4>
                            </div>
                        </div>
                                 <div class="media media_3s" id="" style="cursor:pointer" role="library_launch">
                                <div class="media-left">
                                    <a >
                                        <img class="media-object" src="Huduma_WhiteBox/images/dOo9UrkyZC.png" alt="image">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <span class="text-danger">27-03-2019</span>
                                    <a>
                                        <h5 class="media-heading ">The launch of Huduma Whitebox</h5>
                                    </a>
                                </div>
                            </div>

                                                    <div class="media media_3s" style="cursor:pointer" role="news_libray">
                                <div class="media-left">
                                    <a>
                                        <img class="media-object" src="Huduma_WhiteBox/images/9Z4HzwiBZf.png" alt="image">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <span class="text-danger">11-03-2019</span>
                                    <a>
                                        <h5 class="media-heading ">About WhiteBox</h5>
                                    </a>
                                </div>
                            </div>

                                            </div>
                                                                
                        
                                        
                       </div>

            </div>
            <div class="col-md-8 ">
               
                </div>
                
           
            <div class="col-md-12 col-xs-12 col-sm-12 no_padding" id="calender_holder" style="min-height:400px"></div>
            
            <!-- Tab-content End -->
        </div>
       <script type="text/javascript">
       $(document).ready(function(){
        $.get("e_learning/calender/calender.php",function(data){
            $("#calender_holder").html(data);
            $(".fc-month-button").click()
           // alert(data)
        })
       $(".media_3s").click(function(){
       
       
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
       })
       </script>
