<style type="text/css">
	  #header_innovation{
text-transform: uppercase;
text-align: center;
border-bottom: 1px solid #ccc;
border-radius:5px;
font-weight: bold;

  }
</style>

<?php
include "../../../../../connect.php";
$dataid=$_POST['innovation'];
$get_userp=mysqli_query($con,"SELECT * FROM data_docs WHERE id='$dataid'") or die(mysqli_error($con));
$getr=mysqli_fetch_assoc($get_userp);
if($getr){
$pagetittle=$getr['tittle'];
}else{
$pagetittle='';
}


?>
<div class="col-sm-12 col-xs-12">
	<div class="col-sm-12 col-xs-12">
<!--<div class="col-sm-2 col-xs-12">
	<select class="splashinputs" id="grapghtype">
		<?php
		$sqlxp="SELECT * FROM data_graphs";
    $query_runxk=mysqli_query($con,$sqlxp) or die($query_runxk."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxk)){
    $nameb=$row['name'];
    	?>
		<option><?php echo $nameb?></option>
		<?php
	}
	?>
	</select>
</div>-->
		<!--<span class="btn theme_bg">raw data</span>--> <span class="btn theme_bg" id="Graphpage">Send email</span></div>.
<div class="col-sm-12 col-xs-12" id="header_innovation"><?php echo $pagetittle?></div>

<table class="col-sm-12 col-xs-12">
<thead style="background: #fff">


<?php
$sqlx="SELECT * FROM data_table WHERE doc_id='$dataid'";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    	$counter=$counter+1;


                                          $colm_d1=$row['colm_1'];
                                          $colm_d2=$row['colm_2'];
                                          $colm_d3=$row['colm_3'];
                                          $colm_d4=$row['colm_4'];
                                          $colm_d5=$row['colm_5'];
                                          $colm_d6=$row['colm_6'];
                                          $colm_d7=$row['colm_7'];
                                          $colm_d8=$row['colm_8'];
                                          $colm_d9=$row['colm_9'];
                                          $colm_d10=$row['colm_10'];
                                          $colm_d11=$row['colm_11'];
                                          $colm_d12=$row['colm_12'];
                                          $colm_d13=$row['colm_13'];
                                          $colm_d14=$row['colm_14'];
                                          $colm_d15=$row['colm_15'];
                                          $colm_d16=$row['colm_16'];
                                          $colm_d17=$row['colm_17'];
                                          $colm_d18=$row['colm_18'];
                                          $colm_d19=$row['colm_19'];
                                          $colm_d20=$row['colm_20'];
                                          $colm_d21=$row['colm_21'];
                                          $colm_d22=$row['colm_22'];
                                          $colm_d23=$row['colm_23'];
                                          $colm_d24=$row['colm_24'];
                                          $colm_d25=$row['colm_25'];
                                          $colm_d26=$row['colm_26'];
                                          $colm_d27=$row['colm_27'];
                                          $colm_d28=$row['colm_28'];
                                          $colm_d29=$row['colm_29'];
                                          $colm_d30=$row['colm_30'];
                                          $colm_d31=$row['colm_31'];
                                          $colm_d32=$row['colm_32'];
                                          $colm_d33=$row['colm_33'];
                                          $colm_d34=$row['colm_34'];
                                          $colm_d35=$row['colm_35'];
                                          $colm_d36=$row['colm_36'];
                                          $colm_d37=$row['colm_37'];
                                          $colm_d38=$row['colm_38'];
                                          $colm_d39=$row['colm_39'];
                                          $colm_d40=$row['colm_40'];

                                         
                                          if($counter==1){

?>
<tr style="border-bottom: 1px solid #ccc;font-weight: bold;background: #ccc;text-transform: uppercase;">
<?php
for($d=1;$d<=40;$d++){
$data="0";
$fields='colm_d'.$d;
$data=$$fields;
/*if($counter>3){
if($data){
	*/
?>
<th>
<?php echo $data?>		

</th>

<?php	
//}
}

?>

</tr>
<?php



                                          }else{
                                          	

?>
<tr style="border-bottom: 1px solid #ccc;">
<?php
for($d=1;$d<=20;$d++){
$data="0";
$fields='colm_d'.$d;
$data=$$fields;
/*if($counter>3){
if($data){
	*/
?>
<th>
<?php echo $data?>		

</th>

<?php	
//}
}

?>

</tr>

<?php
}
}
?>

</thead>
</table>
	

</table>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		var dataid='<?php echo $dataid?>';
		$("#Graphpage").click(function(){
			var grapghtype=$("#grapghtype").val();
			$.post('modules/system/super_admin/pages/emails/emails.php',{dataid:dataid,grapghtype:grapghtype},function(data){
				$("#home").html(data);

			})
		})
	})
</script>