<?php
    include("../../../../../connect.php");
$datey = date('Y');
$datem = date('m');
$dated = date('d');
$datedd ="0".$dated-1;
$newdate=$datey."-".$datem."-".$datedd;

  $sqmn="SELECT * FROM month where id='$datem'";
    $query_runmn=mysql_query($sqmn)or die($query_runmn."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runmn)){
      $id=$row['id'];
      $month=$row['month'];
      $month_id=$row['year_id'];
    }

   


/*for($i=1;$i<30;$i++){
$sql=mysql_query("INSERT INTO cashflow VALUE('',
  '',
  '',
  '',
  '',
  '',
  '',
  '',
  '',
  '' )") or die(mysql_error());
}*/

  //declarations
   $sub_totals=0;
   $grand_totals=0;
   $totalcash=0;
   $totalbutcher=0;
   $totalpower=0;
   $totaldirector=0;
   $totalbones=0;
   $totalwastes=0;
   $totalattendant=0;
$totalsub_totals=0;
$totalsgrand_totals=0;
   //end of declarations
   $sqlm="SELECT * FROM cashflow where month_id='$datem'";
    $query_runm=mysql_query($sqlm)or die($query_runm."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runm)){
      $cash=$row['cash'];
      $month_id=$row['month_id'];
      $id=$row['id'];
      $attendant=$row['attendant'];
      $butcher=$row['butcher'];
      $power=$row['power'];
      $director=$row['director'];
      $bones=$row['bones'];
      $date=$row['date'];
      $wastes=$row['wastes'];



     // calculations//
    $totalwastes=$totalwastes+$wastes;
    $totalpower=$totalpower+$power;
    $totalcash=$totalcash+$cash;
    $totalbutcher=$totalbutcher+$butcher;
    $totaldirector=$totaldirector+$director;
    $totalbones=$totalbones+$bones;
    $totalattendant=$totalattendant+$attendant;
    $sub_totals=$bones+$wastes+$butcher+$director+$attendant+$power;
    $grand_totals=$sub_totals+$cash;
    $totalsub_totals=$totalsub_totals+$sub_totals;
    $totalsgrand_totals=$totalsgrand_totals+$grand_totals;

}

$piewaste=$totalwastes/$totalsgrand_totals*100;
$piepower=$totalpower/$totalsgrand_totals*100;
$piecash=$totalcash/$totalsgrand_totals*100;
$piebutcher=$totalbutcher/$totalsgrand_totals*100;
$piedirector=$totaldirector/$totalsgrand_totals*100;
$pieattendant=$totalattendant/$totalsgrand_totals*100;

?>
<script>
$(document).ready(function(){
	makechart()

alert()
})
function makechart(){

var chart = new CanvasJS.Chart("chartContainer", {
	exportEnabled: true,
	animationEnabled: true,
	title:{
		text: "Shamsia Butchery Data Analysis"
	},
	legend:{
		cursor: "pointer",
		itemclick: explodePie
	},
	data: [{
		type: "pie",
		showInLegend: true,
		toolTipContent: "{name}: <strong>{y}%</strong>",
		indexLabel: "{name} - {y}%",
		dataPoints: [
			{ y: <?php echo $piecash ?>, name: "Cash", exploded: true },
			{ y: <?php echo $piepower ?>, name: "Power" },
			{ y: <?php echo $piewaste ?>, name: "Wastes" },
			{ y: <?php echo $piebutcher ?>, name: "Butcher" },
			{ y: <?php echo $piedirector ?>, name: "Director" },
			{ y: <?php echo $pieattendant ?>, name: "attendant" }
			//{ y: <?php echo $piecash ?>, name: "Others"}
		]
	}]
});
chart.render();
}

function explodePie (e) {
	if(typeof (e.dataSeries.dataPoints[e.dataPointIndex].exploded) === "undefined" || !e.dataSeries.dataPoints[e.dataPointIndex].exploded) {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = true;
	} else {
		e.dataSeries.dataPoints[e.dataPointIndex].exploded = false;
	}
	e.chart.render();

}
</script>
<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
<script src="canvasjs.min.js"></script>
