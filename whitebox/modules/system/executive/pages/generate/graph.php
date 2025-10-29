
<style>


/*
body, html {
  height: 100%;
}

body {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  font-family: "fira-sans-2", Verdana, sans-serif;
}*/

#q-graph {
  display: block;
  /* fixes layout wonkiness in FF1.5 */
  position: relative;
  width: 600px;
  height: 300px;
  margin: 1.1em 0 0;
  padding: 0;
  background: transparent;
  font-size: 11px;
}

#q-graph caption {
  caption-side: top;
  width: 600px;
  text-transform: uppercase;
  letter-spacing: .5px;
  top: -40px;
  position: relative;
  z-index: 10;
  font-weight: bold;
}

#q-graph tr, #q-graph th, #q-graph td {
  position: absolute;
  bottom: 0;
  width: 150px;
  z-index: 2;
  margin: 0;
  padding: 0;
  text-align: center;
}

#q-graph td {
  transition: all .3s ease;
}
#q-graph td:hover {
  background-color: #4d4d4d;
  opacity: .9;
  color: white;
}

#q-graph thead tr {
  left: 100%;
  top: 50%;
  bottom: auto;
  margin: -2.5em 0 0 5em;
}

#q-graph thead th {
  width: 7.5em;
  height: auto;
  padding: 0.5em 1em;
}

#q-graph thead th.sent {
  top: 0;
  left: 0;
  line-height: 2;
}

#q-graph thead th.paid {
  top: 2.75em;
  line-height: 2;
  left: 0;
}

#q-graph tbody tr {
  height: 296px;
  padding-top: 2px;
  border-right: 1px dotted #C4C4C4;
  color: #AAA;
}

#q-graph #q1 {
  left: 0;
}

#q-graph #q2 {
  left: 150px;
}

#q-graph #q3 {
  left: 300px;
}

#q-graph #q4 {
  left: 450px;
  border-right: none;
}

#q-graph tbody th {
  bottom: -1.75em;
  vertical-align: top;
  font-weight: normal;
  color: #333;
}

#q-graph .bar {
  width: 60px;
  border: 1px solid;
  border-bottom: none;
  color: #000;
}

#q-graph .bar p {
  margin: 5px 0 0;
  padding: 0;
  opacity: .4;
}

#q-graph .sent {
  left: 13px;
  background-color: #e6b234;
  border-color: transparent;
}

#q-graph .paid {
  left: 77px;
  background-color: #7fdbff;
  border-color: transparent;
}

#ticks {
  position: relative;
  top: -300px;
  left: 2px;
  width: 596px;
  height: 300px;
  z-index: 1;
  margin-bottom: -300px;
  font-size: 10px;
  font-family: "fira-sans-2", Verdana, sans-serif;
}

#ticks .tick {
  position: relative;
  border-bottom: 1px dotted #C4C4C4;
  width: 600px;
}

#ticks .tick p {
  position: absolute;
  left: -5em;
  top: -0.8em;
  margin: 0 0 0 0.5em;
}



</style>
<?php 

include "../../../../../connect.php";

include "../../../../../plugins/php_functions/security.php";
//$salt="A0007799Wagtreeyty";
$submit="Submition";
$approve="approved";
$disapproved="disapproved";
$implemented="implemented";
$implemented="waiting";
$submitted="";
$diasapprove="";
$implement="";
$waiting="";
$evaluated="";
$approved="";

$sqlx="SELECT * FROM innovations_table ";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){

$status=$row['Status'];
if($status==$submit){
	$submitted=$submitted+1;
}else if($status==$approve){
	$approved=$approved+1;
}else if($status==$diasapproved){
	$diasapprove=$diasapprove+1;
}else if($status==$implemented){
	$implement=$implement+1;
}else{

}
    
/*

    $Innovation_name=$row['Innovation_name'];
      $Category=$row['Category'];
  $stage=$row['stage'];
  $date_added=$row['date_added'];


  */

}

$evaluated=$approved+$diasapprove;
$waiting=$approved-$implement;





$height1=$submitted*0.65;
$heghttactual=$height1."px";
$evaluetedh=$evaluated*0.65;
$totalevalueted=$evaluetedh."px";

$approvedg=$diasapprove*0.65;
$total_approved=$approvedg."px";

$disapprovedg=$disapproved*0.65;
$ttdisapproved=$disapprovedg."px";

?>
<table id="q-graph">
<caption>Innovations</caption>
<thead>
<tr>
<th></th>
<th class="sent">Innovations</th>
<!--<th class="paid">Collected</th>-->
</tr>
</thead>
<tbody>
<tr class="qtr" id="q1">
<th scope="row">Submited</th>
<td class="sent bar" style="height: <?php echo $heghttactual;?>"><p><?php echo $submitted?></p></td>
<!--<td class="paid bar" style="height: 99px;"><p>$16,500.00</p></td>-->
</tr>
<tr class="qtr" id="q2">
<th scope="row">Evaluated</th>
<td class="sent bar" style="height: <?php echo $totalevalueted ?>"><p><?php echo $evaluated?></p></td>
<!--<td class="paid bar" style="height: 194px;"><p>$32,340.72</p></td>-->
</tr>
<tr class="qtr" id="q3">
<th scope="row">Approved</th>
<td class="sent bar" style="height: <?php echo $total_approved?>"><p><?php echo $approved ?> </p></td>
<!--<td class="paid bar" style="height: 193px;"><p>$32,225.52</p></td>-->
</tr>
<tr class="qtr" id="q4">
<th scope="row">Dissaproved</th>
<td class="sent bar" style="height: <?php echo $ttdisapproved?>"><p><?php echo $diasapprove?></p></td>
<!--<td class="paid bar" style="height: 195px;"><p>$32,425.00</p></td>-->
</tr>

</tbody>
</table>

<div id="ticks">
<div class="tick" style="height: 59px;"><p>500</p></div>
<div class="tick" style="height: 59px;"><p>400</p></div>
<div class="tick" style="height: 59px;"><p>300</p></div>
<div class="tick" style="height: 59px;"><p>200</p></div>
<div class="tick" style="height: 59px;"><p>100</p></div>
</div>

