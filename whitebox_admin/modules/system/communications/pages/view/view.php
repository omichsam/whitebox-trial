<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


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
   #Dashboardhead li{
    color: #000;
    display: inline;
   }
   #Dashboardhead{
    min-height: 30px;
   }
   #outer_dash{

    box-shadow: 0 0 3px #dadada;
   }
   #main_dash{
    min-height: 30px;
    box-shadow: 0 0 2px #ccc;
    background-color: #ccc;
   }
   #lower_dash{
    background-color: #ededed;
   }
   li{
    display:inline;
    margin-right: 5px;
   }
   .online{
  min-height: 2px;
  border-radius:9px;
  background-color: green;
}
.bluesd{
  color: blue;
  cursor: pointer;
}
#lower_table_header{
  box-shadow: 0 0 2px #ccc;
  font-size: 14px;

}
#lower_table_data{
  background-color: #fff;
}
#lower_dash_footer{
  margin-top: 5px;
  background-color: #ededed;
}
.search_btns{
  box-shadow: 0 0 3px #ccc;
  min-height: 20px;
}
.img_hold{
  height: 60px;
  width:60px;
  float:right;
  background-repeat: no-repeat;
  background-position: center center;
  background-size:100% 100%;
border-radius:40px;
}
.table_display{
min-height: 30px;
 border-bottom: 1px solid #ccc;
  background-color: #fff;
  max-height: 40px;
  overflow: hidden;
}
.buttonsreed{
  color: blue;
}
.buttonsreed:hover{
  background: green;
  color:#fff;
}
 </style>
 <script type="text/javascript">
   $(document).ready(function(){
    $("#add_landloard").click(function(){
     $.post("modules/system/register/register.php",{

      },function(data){
        $("#home").html(data);
      })
    })
   })
 </script>
 <section >
      <div id="Dashboardhead" class="no_padding col-sm-12 col-xs-12" >
           <span class="float_left">issues</span>
             <span class="float_right " > Home>issues</span>
        
      </div>
      <div id="outer_dash" class="no_padding col-sm-12 col-xs-12" >

      <div id="main_dash" class="no_padding col-sm-12 col-xs-12" >
        <div class="col-sm-2 col-xs-3"><span class="btn buttonsreed" role="load">Submitted</span></div>
       <div class="col-sm-2 col-xs-3"><span class="btn buttonsreed" role="assigned">Assigned</span></div>
      <div class="col-sm-2 col-xs-3"><span class="btn buttonsreed" role="closed">Closed</span></div>
       <div class="col-sm-2 col-xs-3"><span class="btn buttonsreed" role="filtered">Filtered</span></div>
      </div>

      <div id="lower_dash" class="no_padding col-sm-12 col-xs-12" >
        <ul>
              <li class="float_right " ><i class="fa fa-print"></i> <span class="bluesd">Print</span></li>
            <li class="float_right export_page" ><i class="fa fa-upload"></i><span class="bluesd"> Export</span></li>
          </ul>
      </div>
<div class="col-sm-12 col-xs-12" id="searchchoir_display">
  
</div>
        
      <div id="lower_table" class="no_padding col-sm-12 col-xs-12 displayer"  >

      </div>
      </div>
  </section>
  
 <script type="text/javascript">
$(document).ready(function(){
 $.get("modules/system/callcenter/view/load.php",{
       },function(data){
        $("#lower_table").html(data);
          
          })

  $(".buttonsreed").click(function(){
    var mypage=$(this).attr("role");

     $.post("modules/system/callcenter/view/"+mypage+".php",{
       },function(data){
        $("#lower_table").html(data);
          
          })

  })

  $(".view_page").click(function(){


  var reg_no=$(this).attr("id");
  
     $.post("modules/system/callcenter/view/pageview.php",{
      reg_no:reg_no
       },function(data){
        $("#home").html(data);
          
          })
   })
$(".pdf_reading").click(function(){
  var emeded=$(this).attr("id");
 $.post("modules/system/callcenter/view/reader.php",{
      emeded:emeded
       },function(data){
        $("#home").html(data);
          
          })



})
      })

  
 </script>