 <style type="text/css">
.search_input{
width: 87%;
padding: 4px;
border-radius: 5px;
border: 1px solid #908989;
position: absolute;
right: 0px;
margin: -6px 6px 0px;

   }
   .search_icon{
    color: #ccc;
position: absolute;
right: 13px;
padding: 3px;

   }
   
   #header_toped{
    min-height: 1px;
   }
   .top_nave{
    color: #000;
   }
   .nav_hd{
    text-transform: uppercase;
   }
   #WhiteBox_lg{
    margin-top: 1px !important;
    min-height: 39px;
    background-position: center !important;
    background-size: contain !important;
    background-repeat: no-repeat !important;
    background:url('images/Whitebox.png');
    border-radius:20px;

   }
 </style>
 <div class="col-sm-12 col-xs-12 theme_bg" id="header_toped"></div>
 <section id="header_top">
  
  		  <div class="col-sm-12 col-xs-12 no_padding">
      <ul>
  			

  			<li class="float_left btn s15" role="" id="WhiteBox_lg" title="" style="margin-top: -13px;">
  				
  				<!-- <strong><span class="float_left top_nave nav_hd">WhiteBox'S<br><?php echo $Admin_name."'s Panel"?></span></strong>-->
  			</li>
         <li class="col-sm-8 ol-xs-8" id="loading_top" style="text-align: center;float: center; color:#000"></li>
         <li class="col-sm-8 no_padding ol-xs-8" id="time_top" style="text-align: center;float: center; color:#000"></li>
        <li class="float_right btn desktop_hidden  " title="Menu" role="menuview">
          <i class="fa fa-bars top_nave desktop_hidden"></i>
        </li>
        <li class="float_right btn ">
           <strong><span class="top_nave"><?php echo $Name?></span></strong>
         <strong><span class="top_nave"><?php echo "[".$Admin_name."]"?></span></strong>
        </li>
  		
  		</ul>
    </div>
  </section>
  <script type="text/javascript">
    /* $.post("modules/system/header/time.php",{},function(data){
      $("#time_top").html(data)
     })
     */
  </script>
  