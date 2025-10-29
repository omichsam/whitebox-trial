<?php
include "../../../../../connect.php";
include("../../../../functions/security.php");
$datad=$_POST['datad'];
$innovation=$_POST['innovation'];
//echo $innovation;
//echo $datad;
$sqlx="SELECT * FROM innovations_table where Innovation_Id='$innovation'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
  //$date_added=decrypt($row[$page], $key);

  $data_page=$row[$datad];
$Innovation_name=$row['$Innovation_name'];
}
?>
 
  <div class="col-sm-12 col-xs-12 evaluate_header"><?php echo $Innovation_name?></div>

    <div class="col-sm-12 col-xs-12">
  <div class="col-sm-12 colxs-12 default_header" style="text-align: center;text-transform: uppercase;font-weight: bold"><?php echo $datad?></div>
  <div class="col-sm-12 col-xs-12" id="innovationneed">
<?php echo $data_page?>
</div>
</div>