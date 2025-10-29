<style type="text/css">
	.innoheaders{
		border-bottom: 2px solid #cccc;
		border-radius: 15px;
	}
	.innovations_load{
		margin-bottom: 5px;
		min-height: 200px;
		box-shadow: 0 0 3px #ccc;
	}
</style>
<div class="default_header innoheaders">Approved innovations</div>
		<div class="col-sm-12 col-xs-12 innovations_load">
			<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$innovation=base64_decode($_POST['innovation']);

         $approved="second_evaluation";
			$sqlx="SELECT * FROM innovations_table where status='$approved'";

    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $Innovation_name=$row['Innovation_name'];
   $Innovation_Id=$row['Innovation_Id'];
				?>
        <div class="col-sm-12 col-xs-12 innovations_bn" id="<?php echo $Innovation_Id?>"><?php echo $Innovation_name?></div>
<?php
			}
			?>

		</div>
<div class="default_header innoheaders">Disaproved innovations</div>
		<div class="col-sm-12 col-xs-12 innovations_load">
		<?php
         $disapproved=encrypt("first_disapproved", $key);
			$sqlxy="SELECT * FROM innovations_table where status='$disapproved'";

    $query_runxd=mysqli_query($con,$sqlxy) or die($query_runxd."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxd)){
    $Innovation_name=$row['Innovation_name'];
   $Innovation_Id=$row['Innovation_Id'];
				?>
        <div class="col-sm-12 col-xs-12 innovations_bn" id="<?php echo $Innovation_Id?>"><?php echo $Innovation_name?></div>
<?php
			}
			?>

		</div>