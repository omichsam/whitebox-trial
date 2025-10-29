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
   .lower_tableroww{
    background-color: #7bb6c3;
   }
   .lower_tablersummay{
    background-color: #c4c6c8;
    margin-top: 10px;
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
.total_data{
  border-top: 1px solid #000; 
}
.summaryables{
  margin-bottom: -38px;
}
 </style>
 <script type="text/javascript">
   $(document).ready(function(){

//css control



//


    $("#add_landloard").click(function(){
     $.post("modules/system/stock/register.php",{

      },function(data){
        $("#home").html(data);
      })
    })
   })
 </script>
 <section >
  		<div id="Dashboardhead" class="no_padding col-sm-12 col-xs-12" >
  				 <span class="float_left">Stock</span>
  			     <span class="float_right " > Home>Stock</span>
  			
  		</div>

  		<div id="main_dash" class="no_padding col-sm-12 col-xs-12" ></div>

  		<div id="lower_dash" class="no_padding col-sm-12 col-xs-12" >
  			<ul>
  			<li class="float_left"><span class="online" >&nbsp;<i class="fa fa-plus" style="color: #fff;"></i>&nbsp;</span> <span class="bluesd" id="add_landloard">Add Stock</span></li>
  			      <li class="float_right " ><i class="fa fa-print"></i> <span class="bluesd">Print</span></li>
  			    <li class="float_right " ><i class="fa fa-upload"></i><span class="bluesd"> Export</span></li>
  			  </ul>
  		</div>

  <?php
include("../../../connect.php");

$item_id=$_POST['type'];
$datey = date('Y');
$datem = date('m');
$dated = date('d ');
$datedd ="0".$dated-1;
$newdate=$datey."-".$datem."-".$datedd;

$sqlm="SELECT * FROM meat where id='$item_id'";
    $query_runm=mysqli_query($con,$sqlm)or die($query_runm."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runm)){
      $name=$row['name'];
      $cost_price=$row['cost_price'];
      $selling_price=$row['selling_price'];

    }

$finance="SELECT * FROM finance ORDER BY id DESC LIMIT 3";
    $query_finance=mysqli_query($con,$finance)or die($query_finance."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_finance)){
//variable declarations
$totalcash=0;
$totalwastes=0;
$totalexpene=0;
$totalcostvalue=0;
$totalcashvalue=0;
$totalvalues=0;
$margindata=0;
$margincash=0;
$summary=0;
$status="";
$cash=$row['cash'];
$wastes=$row['wastes'];
$expence=$row['expence'];
$dateadded=$row['dateadded'];
$yesterday=$row['yesterday'];


?>
     <div id="lower_table" class="no_padding col-sm-12 col-xs-12" >
<h5 style="text-align: center;"><?php echo $dateadded?></h5>
      <div id="lower_table " class="no_padding col-sm-12 col-xs-12 lower_tableroww" >
      <div id="lower_table_header" class="no_padding col-sm-1 col-xs-2" > Stock</div>
      <div id="lower_table_header" class="no_padding col-sm-1 col-xs-1 mobile_hidden" > B.C.F</div>
      <div id="lower_table_header" class="no_padding col-sm-1 col-xs-3 " > Recieved</div>
      <div id="lower_table_header" class="no_padding col-sm-1 col-xs-1 mobile_hidden" > Total</div>
      <div id="lower_table_header" class="no_padding col-sm-1 col-xs-1 mobile_hidden" > Sales</div>
      <div id="lower_table_header" class="no_padding col-sm-1 col-xs-1 mobile_hidden" > Balance</div>
      <!--<div id="lower_table_header" class="no_padding col-sm-1 col-xs-1 mobile_hidden" > Unit cost</div>-->
      <div id="lower_table_header" class="no_padding col-sm-1 col-xs-1 mobile_hidden" > total cost</div>
     <!-- <div id="lower_table_header" class="no_padding col-sm-1 col-xs-1 mobile_hidden" > Sales value</div>-->
      <div id="lower_table_header" class="no_padding col-sm-1 col-xs-3 " > Total value</div>
      <div id="lower_table_header" class="no_padding col-sm-1 col-xs-1 mobile_hidden" > Cash</div>
      <div id="lower_table_header" class="no_padding col-sm-1 col-xs-1 mobile_hidden" > expence</div>
      <div id="lower_table_header" class="no_padding col-sm-1 col-xs-1 mobile_hidden" > Waste</div>
      <div id="lower_table_header" class="no_padding col-sm-1 col-xs-4 " > Cash Value</div>
      <!--<div id="lower_table_header" class="no_padding col-sm-1 col-xs-1 mobile_hidden" > Added date</div>
     , <div id="lower_table_header" class="no_padding col-sm-1 col-xs-1 float_right" > Actions</div>-->
      </div>
      <?php



    
$sql="SELECT * FROM stock where dateadded='$dateadded' and item_id='$item_id'";
    $query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
          $id=$row['id'];
     // $item_id=$row['item_id'];
      $kg=$row['kg'];
      $phone=$row['supplier'];
      $idno=$row['user'];
      $date=$row['dateadded'];
      $sqlbal="SELECT * FROM meat_balance where dateadded='$dateadded' AND item_id='$item_id'";
    $query_runbal=mysqli_query($con,$sqlbal)or die($query_runbal."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runbal)){
      $balancekg=$row['kg'];




      
      $sqlm="SELECT * FROM meat where id='$item_id'";
    $query_runm=mysqli_query($con,$sqlm)or die($query_runm."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runm)){
      $name=$row['name'];
      $cost_price=$row['cost_price'];
      $selling_price=$row['selling_price'];

       $sqlbalan="SELECT * FROM meat_balance where dateadded='$yesterday' AND item_id='$item_id'";
    $query_runbalan=mysqli_query($con,$sqlbalan)or die($query_runbalan."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runbalan)){
      $bcf=$row['kg'];


      //start of rules
if ($name=="CHICKEN"){
  $units="Pieces";
}else{
  $units="KG";
}



      // end of rules

//start of calculations

$newkg=$bcf+$kg;

$sold=$newkg-$balancekg;
$costvalue=$cost_price*$sold;
$totalvalue=$selling_price*$sold;
$cashvalue=$cash+$wastes+$expence;
$totalcash=$totalcash+$cash;
$totalcostvalue=$totalcostvalue+$costvalue;
$totalcashvalue=$totalcashvalue+$totalvalue;
$totalexpene=$totalexpene+$expence;
$totalwastes=$totalwastes+$wastes;
$totalvalues=$totalvalues+$cashvalue;
$margincash=$totalcashvalue+$wastes+$expence;
$margindata=$totalvalues-$margincash;

if($margindata>1){
  
$summary="+$margindata";
  $status="Profit";
}elseif($margindata==0){
  $status="Balance";
}else{
  $status="Loss";
  $summary="$margindata";
}
      //end of calculations


        ?>
<div id="lower_table" class="no_padding col-sm-12 col-xs-12" >
      <div id="lower_table_data" class="no_padding col-sm-1 col-xs-2" > <?php echo "$name"; ?></div>
      <div id="lower_table_data" class="no_padding col-sm-1 col-xs-1 mobile_hidden" > <?php echo "$bcf $units"; ?></div>
      <div id="lower_table_data" class="no_padding col-sm-1 col-xs-3 " > <?php echo "$kg $units"; ?></div>
      <div id="lower_table_data" class="no_padding col-sm-1 col-xs-1 mobile_hidden" > <?php echo "$newkg $units"; ?></div>

      <div id="lower_table_data" class="no_padding col-sm-1 col-xs-1 mobile_hidden" > <?php echo "$sold $units"; ?></div>
      <div id="lower_table_data" class="no_padding col-sm-1 col-xs-1 mobile_hidden" > <?php echo "$balancekg $units"; ?></div>
      <!--<div id="lower_table_data" class="no_padding col-sm-1 col-xs-1 mobile_hidden" > Unit cost</div>-->
      <div id="lower_table_data" class="no_padding col-sm-1 col-xs-1 mobile_hidden" > <?php echo "$costvalue /="; ?></div>
     <!-- <div id="lower_table_data" class="no_padding col-sm-1 col-xs-1 mobile_hidden" > Sales value</div>-->
      <div id="lower_table_data" class="no_padding col-sm-1 col-xs-3 " > <?php echo "$totalvalue /="; ?></div>
      <div id="lower_table_data" class="no_padding col-sm-1 col-xs-1 mobile_hidden" > <?php echo "$cash /="; ?></div>
      <div id="lower_table_data" class="no_padding col-sm-1 col-xs-1 mobile_hidden" > <?php echo "$expence /="; ?></div>
      <div id="lower_table_data" class="no_padding col-sm-1 col-xs-1 mobile_hidden" > <?php echo "$wastes /="; ?></div>
      <div id="lower_table_data" class="no_padding col-sm-1 col-xs-4 " > <?php echo "$cashvalue /="; ?></div>
      </div>
        <?php
        $cash=0;
      $wastes=0;
      $expence=0;
      }
      }
      
}
//clear variables
      
     
    
    }
      ?>
<div id="lower_table" class="no_padding col-sm-12 col-xs-12" >
      <div id="" class="no_padding col-sm-1 total_data col-xs-2" > &nbsp;</div>
      <div id="" class="no_padding col-sm-1 total_data col-xs-1 mobile_hidden" > &nbsp;</div>
      <div id="" class="no_padding col-sm-1 total_data col-xs-3 " > &nbsp;</div>
      <div id="" class="no_padding col-sm-1 total_data col-xs-1 mobile_hidden" > &nbsp;</div>

      <div id="" class="no_padding col-sm-1 total_data col-xs-1 mobile_hidden" > &nbsp;</div>
      <div id="" class="no_padding col-sm-1 total_data col-xs-1 mobile_hidden" > &nbsp;</div>
      <!--<div id="" class="no_padding col-sm-1 total_data col-xs-1 mobile_hidden" > Unit cost</div>-->
      <div id="" class="no_padding col-sm-1 total_data col-xs-1 mobile_hidden" > <?php echo "$totalcostvalue /="; ?></div>
     <!-- <div id="" class="no_padding col-sm-1 total_data col-xs-1 mobile_hidden" > Sales value</div>-->
      <div id="" class="no_padding col-sm-1 total_data col-xs-3 " > <?php echo "$totalcashvalue /="; ?></div>
      <div id="" class="no_padding col-sm-1 total_data col-xs-1 mobile_hidden" > <?php echo "$totalcash /="; ?></div>
      <div id="" class="no_padding col-sm-1 total_data col-xs-1 mobile_hidden" > <?php echo "$totalexpene /="; ?></div>
      <div id="" class="no_padding col-sm-1 total_data col-xs-1 mobile_hidden" > <?php echo "$totalwastes /="; ?></div>
      <div id="" class="no_padding col-sm-1 total_data col-xs-4 " > <?php echo "$totalvalues /="; ?></div>
      </div>


       <!-- <div id="lower_table " class="no_padding col-sm-12 col-xs-12 lower_tablersummay" >
      <div id="lower_table_header" class="no_padding col-sm-1 col-xs-2" > &nbsp;</div>
      <div id="lower_table_header" class="no_padding col-sm-1 col-xs-1 mobile_hidden" > &nbsp;</div>
      <div id="lower_table_header" class="no_padding col-sm-1 col-xs-3 " > &nbsp;</div>
      <div id="lower_table_header" class="no_padding col-sm-1 col-xs-1 mobile_hidden" > &nbsp;</div>
      <div id="lower_table_header" class="no_padding col-sm-1 col-xs-1 mobile_hidden" > &nbsp;</div>
      <div id="lower_table_header" class="no_padding col-sm-1 col-xs-1 mobile_hidden" > &nbsp;</div>
      <!--<div id="lower_table_header" class="no_padding col-sm-1 col-xs-1 mobile_hidden" > Unit cost</div>-->
     <!-- <div id="lower_table_header" class="no_padding col-sm-1 col-xs-1 mobile_hidden" > &nbsp;</div>
     <!-- <div id="lower_table_header" class="no_padding col-sm-1 col-xs-1 mobile_hidden" > Sales value</div>-->
      <!--<div id="lower_table_header" class="no_padding col-sm-1 col-xs-3 " > &nbsp;</div>
      <div id="lower_table_header" class="no_padding col-sm-1 col-xs-1 mobile_hidden" > &nbsp;</div>
      <div id="lower_table_header" class="no_padding col-sm-1 col-xs-1 mobile_hidden" > Summary</div>
      <div id="lower_table_header" class="no_padding col-sm-1 col-xs-1 mobile_hidden" > margin</div>
      <div id="lower_table_header" class="no_padding col-sm-1 col-xs-4 " > Date</div>
      <!--<div id="lower_table_header" class="no_padding col-sm-1 col-xs-1 mobile_hidden" > Added date</div>
     , <div id="lower_table_header" class="no_padding col-sm-1 col-xs-1 float_right" > Actions</div>-->
      <!--</div>
     <!-- <div id="lower_table" class="no_padding col-sm-12 col-xs-12 summaryables" >
      <div id="" class="no_padding col-sm-1 total_data col-xs-2" > &nbsp;</div>
      <div id="" class="no_padding col-sm-1 total_data col-xs-1 mobile_hidden" > &nbsp;</div>
      <div id="" class="no_padding col-sm-1 total_data col-xs-3 " > &nbsp;</div>
      <div id="" class="no_padding col-sm-1 total_data col-xs-1 mobile_hidden" > &nbsp;</div>

      <div id="" class="no_padding col-sm-1 total_data col-xs-1 mobile_hidden" > &nbsp;</div>
      <div id="" class="no_padding col-sm-1 total_data col-xs-1 mobile_hidden" > &nbsp;</div>
      <!--<div id="" class="no_padding col-sm-1 total_data col-xs-1 mobile_hidden" > Unit cost</div>-->
      <!--<div id="" class="no_padding col-sm-1 total_data col-xs-1 mobile_hidden" > &nbsp;</div>
     <!-- <div id="" class="no_padding col-sm-1 total_data col-xs-1 mobile_hidden" > Sales value</div>-->
      <!--<div id="" class="no_padding col-sm-1 total_data col-xs-3 " > &nbsp;</div>
      <div id="" class="no_padding col-sm-1 total_data col-xs-1 mobile_hidden" > &nbsp;</div>
      <div id="" class="no_padding col-sm-1 total_data col-xs-1 mobile_hidden" > <?php echo "$status"; ?></div>
      <div id="" class="no_padding col-sm-1 total_data col-xs-1 mobile_hidden" > <?php echo "$summary /="; ?></div>
      <div id="" class="no_padding col-sm-1 total_data col-xs-4 " > <?php echo "$dateadded"; ?></div>
      </div>-->

      </div>
      <?php
      $status=0;
  $summary=0;
    }
      ?>
  		<!--<div id="lower_dash_footer" class="no_padding col-sm-12 col-xs-12" >
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
  		</div>-->
  </section>
  
 