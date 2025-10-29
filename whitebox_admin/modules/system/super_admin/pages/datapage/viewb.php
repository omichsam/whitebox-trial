<style type="text/css">
	  #header_innovation{
text-transform: uppercase;
text-align: center;
border-bottom: 1px solid #ccc;
border-radius:5px;

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
<div class="col-sm-12 col-xs-12" id="header_innovation"><?php echo $pagetittle?></div>
<table class="col-sm-12 col-xs-12">
<thead>


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
                                         
                                          if($counter==1){

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
/*}else{

}
}else{*/
?>
<th>
<?php echo $data?>		

</th>
<?php	
//}
}

?>
<!--
<th>
<?php echo $colm_d2?>		

</th>
<th>
<?php echo $colm_d3?>		

</th>
<th>
<?php echo $colm_d4?>		

</th>
<th>
<?php echo $colm_d5?>		

</th>
<th>
<?php echo $colm_d6?>		

</th>
<th>
<?php echo $colm_d7?>		

</th>
<th>
<?php echo $colm_d8?>		

</th>
<th>
<?php echo $colm_d9?>		

</th>
<th>
<?php echo $colm_d10?>		

</th>
<th>
<?php echo $colm_d11?>		

</th>
<th>
<?php echo $colm_d12?>		

</th>
<th>
<?php echo $colm_d13?>		

</th>
<th>
<?php echo $colm_d14?>		

</th>
<th>
<?php echo $colm_d15?>		

</th>
<th>
<?php echo $colm_d16?>		

</th>
<th>
<?php echo $colm_d17?>		

</th>
<th>
<?php echo $colm_d18?>		

</th>
<th>
<?php echo $colm_d19?>		

</th>
<th>
<?php echo $colm_d20?>		

</th>-->
</tr>

<?php
}
}
?>

</thead>
</table>
	

</table>
</div>