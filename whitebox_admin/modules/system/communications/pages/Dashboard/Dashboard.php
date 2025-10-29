

<style type="text/css">
#dash_b_fg{
    min-height:50px;
}
  .dash_dives{
min-height: 100px;
box-shadow: 0 0 3px #ccc;
background-color: #00c0ef;
  }
  .dash_diveorange{
   min-height: 100px;
box-shadow: 0 0 3px #ccc; 
margin-bottom: 5px;
  }
  #Dashboardhead li{
    color: #000;
    display: inline;
   }
   .dash_dive{
min-height: 500px;
box-shadow: 0 0 3px #ccc;
  }
  .dash_di{
    margin-top: 5px;
  }
  .roundsd{
background-color: rgb(0, 163, 203);
border-radius: 30px;
  }
  .piechart{
    box-shadow: #ccc;
    margin-top:5px;
    /*background-image: url('images/Chart.jpeg');*/
    background-repeat: no-repeat;
    background-size: contain;
    background-position: center;
  }
  .buton_dastasd{
    cursor: pointer;
    margin-top: 5px;
  }
  .icon_controler{
    min-height: 80px;
     background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    border-radius: 10px;
  }
  .piedatas{
    background: #fff;
  }
  <style type="text/css">
  #table_headers{
    font-size: 11px;
    min-height: 30px;
    font-weight: bold;
    font-size: 19px;
    background:#ccc;
  }
  .table_datas{
    font-size: 11px;
   min-height: 30px;
   border-bottom: 2px solid #ccc;
   background: #fff;
   margin-top: 5px;
   cursor: pointer;
  }
  .table_data{
    font-size: 11px;
   min-height: 30px;
   border-bottom: 2px solid #ccc;
   margin-top: 5px;
   cursor: pointer;
  }
  .container {
  background-size: cover;
  background: rgb(226,226,226); /* Old browsers */
  background: -moz-linear-gradient(top,  rgba(226,226,226,1) 0%, rgba(219,219,219,1) 50%, rgba(209,209,209,1) 51%, rgba(254,254,254,1) 100%); /* FF3.6+ */
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(226,226,226,1)), color-stop(50%,rgba(219,219,219,1)), color-stop(51%,rgba(209,209,209,1)), color-stop(100%,rgba(254,254,254,1))); /* Chrome,Safari4+ */
  background: -webkit-linear-gradient(top,  rgba(226,226,226,1) 0%,rgba(219,219,219,1) 50%,rgba(209,209,209,1) 51%,rgba(254,254,254,1) 100%); /* Chrome10+,Safari5.1+ */
  background: -o-linear-gradient(top,  rgba(226,226,226,1) 0%,rgba(219,219,219,1) 50%,rgba(209,209,209,1) 51%,rgba(254,254,254,1) 100%); /* Opera 11.10+ */
  background: -ms-linear-gradient(top,  rgba(226,226,226,1) 0%,rgba(219,219,219,1) 50%,rgba(209,209,209,1) 51%,rgba(254,254,254,1) 100%); /* IE10+ */
  background: linear-gradient(to bottom,  rgba(226,226,226,1) 0%,rgba(219,219,219,1) 50%,rgba(209,209,209,1) 51%,rgba(254,254,254,1) 100%); /* W3C */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e2e2e2', endColorstr='#fefefe',GradientType=0 ); /* IE6-9 */
  padding: 20px;
}

.led-box {
  height: 30px;
  width: 25%;
  
  float: left;
}


.led-green {
  margin: 0 auto;
  width: 24px;
  height: 24px;
  background-color: #0dff00;
  border-radius: 50%;
  box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #1a823b 0 -1px 9px, rgba(0, 100, , 0.5) 0 2px 12px;
  -webkit-animation: blinkRed 1.5s infinite;
  -moz-animation: blinkRed 1.5s infinite;
  -ms-animation: blinkRed 1.5s infinite;
  -o-animation: blinkRed 1.5s infinite;
  animation: blinkRed 1.5s infinite;
}

@-webkit-keyframes blinkRed {
    from { background-color: #0dff00; }
    50% { background-color: #00aa2a; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #1a823b 0 -1px 9px, rgba(255, 0, 0, 0.5) 0 2px 0;}
    to { background-color: #0dff00; }
}
@-moz-keyframes blinkRed {
    from { background-color: #0dff00; }
    50% { background-color: #00aa2a; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #1a823b 0 -1px 9px, rgba(255, 0, 0, 0.5) 0 2px 0;}
    to { background-color: #0dff00; }
}
@-ms-keyframes blinkRed {
    from { background-color: #0dff00; }
    50% { background-color: #00aa2a; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #1a823b 0 -1px 9px, rgba(255, 0, 0, 0.5) 0 2px 0;}
    to { background-color: #0dff00; }
}
@-o-keyframes blinkRed {
    from { background-color: #0dff00; }
    50% { background-color: #00aa2a; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #1a823b 0 -1px 9px, rgba(255, 0, 0, 0.5) 0 2px 0;}
    to { background-color: #0dff00; }
}
@keyframes blinkRed {
    from { background-color: #0dff00; }
    50% { background-color: #00aa2a; box-shadow: rgba(0, 0, 0, 0.2) 0 -1px 7px 1px, inset #1a823b 0 -1px 9px, rgba(0, 100, 0, 0.5) 0 2px 0;}
    to { background-color: #0dff00; }
}

</style>
<script type="text/javascript">
  $(document).ready(function(){
$(".buton_dastasd").click(function(){

  
    type:type
  var type=$(this).attr("role")
  if(type=="Controlpanel"){

        $("#menu_page").show().removeClass("slideOutLeft").addClass("animated slideInLeft");
      }else{
 /* $.post("modules/system/admin/"+type+"/"+type+".php",{
    type:type

  },function(data){
    $("#home").html(data)
  })*/
}
  })
})
</script>

<?php

include("../../../../../connect.php");
 $members=0;
 $jobs=0;
 $t_total=0;
$sqlx="SELECT status,count(status) as Total FROM chat_users where status='active' group by status order by Total DESC LIMIT 0,10";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){

      $t_total=$row['Total'];
 }
    if($t_total==0){
      $showsystem="not_shown";

    }else{
$showsystem="";
    }
    $totalissues="";
/* $sqlxp="SELECT status,count(status) as totalissues FROM county_issues where status='submission' group by status order by totalissues DESC LIMIT 0,10";
    $query_runxp=mysqli_query($con,$sqlxp) or die($query_runxp."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxp)){

      $totalissues=$row['totalissues'];
 }
 */

?>
<div class="col-sm-12 col-xs-12 no_padding">
  <div id="Dashboardhead" class="no_padding col-sm-12 col-xs-12" >
           <span class="float_left">Dashboards</span>
             <span class="float_right " > home>Dashboard</span>
        
      </div>
<div class="col-sm-8 col-xs-12 no_padding">
  
<div class="col-sm-6 col-xs-12  animated fadeInLeftBig ">
  <div class="col-xs-12 col-sm-12 buton_dastasd dash_dives" role="view">
     <div class="col-xs-12 col-sm-12 dash_di no_padding">
    <span class="float_left col-xs-6 col-sm-7 no_padding " style="color: #000;margin-top: 0px;font-size: 12px;">
      <span style="border-bottom: 1px dashed #000;" class="no_padding ">Online chats</span><br><span style="font-size: 11px;">

        <div class="col-sm-12 col-xs-12 <?php echo $showsystem?>" style="font-size: 20px;">
     <?php echo "$t_total";?> <div class="led-box <?php echo $offline_data?>">
     <div class="led-green"></div>
  </div><br>
<span class="btn theme_bg" id="view_chats">view</span>
</div>

          
        </span>
      </span>
    <div class="float_right col-xs-6 col-sm-5  icon_controler"  ><i class="fa fa-comment fa-5x"></i></div>
  </div>
  
  </div>

</div>
<div class="col-sm-6 col-xs-12 animated fadeInDownBig ">
  <div class="col-xs-12 col-sm-12 buton_dastasd dash_dives" role="leaders">
    <div class="col-xs-12 col-sm-12 dash_di no_padding">
    <span class="float_left col-xs-6 col-sm-7 no_padding " style="color: #000;margin-top: 0px;font-size: 12px;">
      <span style="border-bottom: 1px dashed #000;" class="no_padding">Issues</span><br><span style="font-size: 20px;">
        <?php echo "$totalissues";?><br>

<!--<span class="btn theme_bg" id="view_issues">view</span>-->
          
        </span></span>
    <div class="float_right col-xs-6 col-sm-5   icon_controler"  ><i class="fa fa-user fa-5x"></i></div>
  </div>
  </div>
</div>

</div>
<div class="col-sm-4 col-xs-12 animated fadeInRightBig ">
  <div class="col-sm-12 col-xs-12 no_padding">
  <div class="col-xs-12 col-sm-12 no_padding dash_diveorange buton_dastasd" role="Families" style="background-color: #f39c12;">
    <div class="col-xs-12 col-sm-12 dash_di">
     <span class="float_left col-xs-6 col-sm-6  no_padding " style="color: #000;margin-top: 0px;font-size: 12px;">
      <span style="border-bottom: 1px dashed #000;" class="no_padding">Reports</span><br><span style="font-size: 11px;"><?php echo "Total = $jobs";?><br>
       <!-- <?php echo "Received = $recievedchicken $unitschicken";?><br>
        <?php echo "Sold = $totalchickenkg $unitschicken";?><br>
        
        <?php echo "collection = $grandchicken /=";?><br>-->
    </span></span>
    <div class="float_right col-xs-6 col-sm-6 icon_controler" > <i class="fa fa-briefcase fa-5x"></i></div>
  </div>
  </div>
</div>
</div>
<div class="col-xs-12 col-sm-12 ">

</div>



<!--
<div class="col-sm-4 col-xs-12 ">
  <div class="col-sm-12 col-xs-12 no_padding">
  <div class="col-xs-12 col-sm-12 no_padding dash_diveorange buton_dastasd" role="Families" style="background-color: #f39c12;">
    <div class="col-xs-12 col-sm-12 dash_di">
     <span class="float_left col-xs-6 col-sm-8  no_padding " style="color: #000;margin-top: 0px;font-size: 12px;">
      <span style="border-bottom: 1px dashed #000;" class="no_padding">Reports</span><br><span style="font-size: 11px;"><?php echo "Total = $families";?><br>
        <?php echo "Received = $recievedchicken $unitschicken";?><br>
        <?php echo "Sold = $totalchickenkg $unitschicken";?><br>
        
        <?php echo "collection = $grandchicken /=";?><br>
    </span></span>
    <div class="float_right col-xs-6 col-sm-4 icon_controler" > <i class="fa fa-briefcase fa-5x"></i></div>
  </div>
  </div>
</div>
<div class="col-sm-12 col-xs-12 no_padding">
  <div class="col-xs-12 col-sm-12 no_padding dash_diveorange buton_dastasd" role="Families" style="background-color: #f39c12;">
    <div class="col-xs-12 col-sm-12 dash_di">
     <span class="float_left col-xs-6 col-sm-8  no_padding " style="color: #000;margin-top: 0px;font-size: 12px;">
      <span style="border-bottom: 1px dashed #000;" class="no_padding">Reports</span><br><span style="font-size: 11px;"><?php echo "Total = $families";?><br>
        <?php echo "Received = $recievedchicken $unitschicken";?><br>
        <?php echo "Sold = $totalchickenkg $unitschicken";?><br>
        
        <?php echo "collection = $grandchicken /=";?><br>
    </span></span>
    <div class="float_right col-xs-6 col-sm-4 icon_controler" > <i class="fa fa-briefcase fa-5x"></i></div>
  </div>
  </div>
</div>
<div class="col-sm-12 col-xs-12 no_padding">
  <div class="col-xs-12 col-sm-12 buton_dastasd dash_divespink" role="PaymentsTransactions" style="background-color: #d81b60;margin-bottom: 5px;">
    <div class="col-xs-12 col-sm-12 dash_di">
    <span class="float_left " style="color: #fff;margin-top: 30px;font-size: 12px;"><span style="font-size: 20px;"><?php echo "$total_people";
    ?> </span><br>Total Personnel</span>
    <span class="float_right "><i class="fa fa-users fa-5x" style=""></i></span>
  </div>
  </div>
</div>
<div class="col-sm-12 col-xs-12 no_padding">
  <div class="col-xs-12 col-sm-12 buton_dastasd dash_divespink" role="alter_servers" style="background-color: #000;margin-bottom: 5px;">
    <div class="col-xs-12 col-sm-12 dash_di">
    <span class="float_left " style="color: #fff;margin-top: 30px;font-size: 12px;"><span style="font-size: 20px;"><?php echo "$alters";
    ?></span><br>Alter_servers</span>
    <span class="float_right "><i class="fa fa-users fa-5x" style=""></i></span>
  </div>
  </div>
</div>
<div class="col-sm-12 col-xs-12 no_padding">
  <div class="col-xs-12 col-sm-12 buton_dastasd dash_divespink" role="choir" style="background-color: #000;margin-bottom: 5px;">
    <div class="col-xs-12 col-sm-12 dash_di">
    <span class="float_left " style="color: #fff;margin-top: 30px;font-size: 12px;"><span style="font-size: 32px;"><?php echo "$choirs";
    ?></span><br>Chior members</span>
    <span class="float_right "><i class="fa fa-users fa-5x" style=""></i></span>
  </div>
  </div>
</div>
</div>-->
   <?php

   ?>

</div>
<div class="col-sm-12 col-xs-12" id="dash_b_fg">
  
</div>
<script type="text/javascript">
$(document).ready(function(){
var message_intervals="no";

  $("#view_chats").click(function(){
  $.post("modules/system/communications/pages/chats/chats.php",{message_intervals:message_intervals},function(data){
          $("#home").html(data);
         // alert(data)
         })
  })

  $("#view_issues").click(function(){
  $.post("modules/system/communications/pages/view/view.php",function(data){
          $("#home").html(data);
         // alert(data)
         })
  })
 
      $.post("modules/system/communications/pages/analytics/departments.php",function(data){
          $("#piechart").html(data);
         // alert(data)
         })


      $.post("modules/system/communications/pages/analytics/weekly.php",function(data){
          $("#piehouse").html(data);
         // alert(data)
         })
  })
</script>