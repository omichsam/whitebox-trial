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
$commments=base64_encode(encrypt("comments",$key));
?>
<div class="default_header innoheaders">COMMENTS</div>
		<div class="col-sm-12 col-xs-12 innovations_load">
		<?php
		$sqlxo="SELECT * FROM feedback where Innovation_id='$innovation' and status='$commments'";

    $query_runxd=mysql_query($sqlxo) or die($query_runxd."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runxd)){
    $need_feedback=$row['need_feedback'];
    $solution_feedback=$row['solution_feedback'];
    $impact_feedback=$row['impact_feedback'];
    $target_feedback=$row['target_feedback'];
    $businessmodel_feedback=$row['businessmodel_feedback'];
    $requirements_feedback=$row['requirements_feedback'];
    $reasons_feedback=$row['reasons_feedback'];
    
   ?>
<div class="col-sm-12 col-xs-12 innovations_bn" id="<?php echo $Innovation_Id?>"><?php echo $need_feedback?></div>
<?php
}
?>
	</div>