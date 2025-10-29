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
min-height:30px;
font-size:13px;
margin-top:4px;
 border-bottom: 2px solid #ccc;
  background-color: #fff;
}
.inservice{
    background:#cda;
font-weight: bold;
text-transform: uppercase;
font-size: 15px;
}
 </style>
   <style type="text/css">

.report_tamplate{
  min-height:842px;
  background: #222; 
  
}
#paper_holder{
  min-height:842px;
  background: #fff; 
  margin-bottom: 20px;
}
#reportcontrols{
  height: 50px;
  color: #ddd;
  cursor: pointer;
  margin-top: 5px;
}
#report_footer{
  min-height: 50px;
}
#nmkg_logo{
  min-height: 100px;
  background-repeat: no-repeat;
  background-position: center;
  background-size: contain;
  background-image: url('images/logo_t.jpg');
}
.graphs_paper{
  min-height: 400px;
}
</style>
 <script type="text/javascript">
   $(document).ready(function(){
    $("#setdutyrota").click(function(){
     $.post("modules/system/coordinator/duty/setduty.php",{

      },function(data){
        $("#home").html(data);
      })
    })
   })
 </script>
 <section >
      <div id="Dashboardhead" class="no_padding col-sm-12 col-xs-12" >
           <span class="float_left">Duty</span>
             <span class="float_right " > Home>Duty</span>
        
      </div>
      <div id="outer_dash" class="no_padding col-sm-12 col-xs-12" >

      <div id="main_dash" class="no_padding col-sm-12 col-xs-12" ></div>

      <div id="lower_dash" class="no_padding col-sm-12 col-xs-12" >
        <ul>
        <li class="float_left"><span class="online" >&nbsp;<i class="fa fa-plus" style="color: #fff;"></i>&nbsp;</span> <span class="bluesd" id="setdutyrota">Set Duty rota</span></li>
              <li class="float_right " ><i class="fa fa-print"></i> <span class="bluesd">Print</span></li>
            <li class="float_right export_page" ><i class="fa fa-upload"></i><span class="bluesd"> Export</span></li>
          </ul>
      </div>

      <div id="lower_table " class="no_padding col-sm-12 col-xs-12" >
        <div class="col-xs-12 col-sm-12">
          <?php 
        include("../../../../connect.php");
$dutycount=0;
$sql="SELECT * FROM dutycount";
    $query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
$dutycount=$dutycount+1;
}
for($dduty=1;$dduty<=$dutycount;$dduty++){
  ?>
<div class="col-sm-1 col-xs-2  "><div class="col-xs-12 col-sm-12 btn loadolds" id="<?php echo $dduty;?>"><?php echo $dduty;?></div></div>
  <?php
}


$sql="SELECT * FROM duty_rota where Status='ready'";
    $query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
      $semester_id=$row['semester_id'];
      $yearid=$row['yearid'];
      }
      $sql="SELECT * FROM study_years where id='$yearid'";
    $query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
      $yearname=$row['name'];
      }
      $sql="SELECT * FROM launch_semesters where id='$semester_id'";
    $query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
      $semester_name=$row['name'];
      }

          ?>

        </div>
        <style type="text/css">

.report_tamplate{
  min-height:842px;
  background: #222; 
  
}
#paper_holder{
  min-height:842px;
  background: #fff; 
  margin-bottom: 20px;
}
#reportcontrols{
  height: 50px;
  color: #ddd;
  cursor: pointer;
  margin-top: 5px;
}
#report_footer{
  min-height: 50px;
}
#nmkg_logo{
  min-height: 100px;
  background-repeat: no-repeat;
  background-position: center;
  background-size: contain;
  background-image: url('images/logo.jpg');
}
.graphs_paper{
  min-height: 400px;
}
</style>
<div class="col-sm-12 col-xs-12">

<div class="col-sm-12 col-xs-12 report_tamplate">
  <div class="col-sm-12 col-xs-12" id="reportcontrols">
    <div class="col-sm-9 col-xs-12"></div>
<div class="col-sm-3 col-xs-12">
  <div class="col-sm-4 col-xs-4 printed" role="print" ><i class="fa fa-print fa-2x"></i></div>

  <!--<div class="col-sm-4 col-xs-4 printed" role="export"><i class="fa fa-save fa-2x"></i></div>-->

  <div class="col-sm-4 col-xs-4 printed" role="export"><i class="fa fa-download fa-2x"></i></div>
</div>

  </div>
<div class="col-xs-12 col-sm-12" id="paper_holder">
  



 <div class="col-xs-12 col-sm-12 no_padding" id="pagesuper">


</div>
</div>
</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
 var loadord='<?php echo $dutycount?>'
 var target="#pagesuper";
$.post("modules/system/coordinator/duty/loaddata.php",{
    loadord:loadord},function(data){$(target).html(data)})


var btng=".printed";
$(btng).click(function(){
var role=$(this).attr("role");
if(role=="export"){
  //alert(role)
 var url="modules/system/clerk/pages/generate/export.php";
 var target=".graphs_paper";
$.get(""+url+"",function(data){$(target).html(data)})
}else{
printDiv() 
}
})



  })
function printDiv() 
{
/*
  var divToPrint=document.getElementById('students_card');

  var newWin=window.open('','Print-Window');

  newWin.document.open();

  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

  newWin.document.close();

  setTimeout(function(){newWin.close();},10);
  */
   var prtContent = document.getElementById('paper_holder');
    var WinPrint = window.open('','','left=0,top=0,width=400,height=400,toolbar=0,scrollbars=0,status=0');
    WinPrint.document.write(prtContent.innerHTML);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    WinPrint.close();

}
</script>
    </div>
      <div id="lower_dash_footer" class="no_padding col-sm-12 col-xs-12" >
        <ul>
        <li class="float_left"> <span class="">search</span><input type="text" name=""></li>

              <li class="float_left " ><select>
                <option>select all</option>
                <option>select few</option>
              </select></li>
              <li class="float_left " ><span class="search_btns">Search</span></li>
            <li class="float_right " ><span class="search_btns"> Clear filtering</span></li>
          </ul>
      </div>
      <div id="lower_dash_footer" class="no_padding col-sm-12 col-xs-12" >
        <ul>
        <li class="float_left"> <span class="">Show</span>
          <select>
                <option>10</option>
                <option>5</option>
              </select></li>
              <li class="float_left " ><span class="">entries</span><i class="fa fa-previous"></i></li>
            <li class="float_right " ><span class=""></span></li>
          </ul>
      </div>
  </section>
  
 <script type="text/javascript">
   $(document).ready(function(){
$(".loadolds").click(function(){
  var loadord=$(this).attr("id");
  $.post("modules/system/coordinator/duty/loaddata.php",{
    loadord:loadord
  },function(data){
    $("#pagesuper").html(data);

  })
    })



   })
 </script>