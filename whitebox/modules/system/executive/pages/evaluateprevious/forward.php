<style type="text/css">
	.reports_body{
     min-height: 450px;
     box-shadow: 0 0 3px #ccc;
     background-color: #fff;
	}
	.reports_project{
     min-height: 200px;
     box-shadow: 0 0 3px #ccc;
     background-color: #fff;
     margin-top: 10px;
	}
	
	.innovations_load{
		min-height: 200px;
		margin-top: 5px;
		max-height: 200px;
		overflow: auto;

	}
	.innovations_bn{
		min-height: 20px;
		cursor: pointer;
		background-color: #ccc;
		margin-top: 3px;
	}
	.coments{
		border: 1px solid #ccc;
		resize: none;
		min-height: 420px;
		margin-top: 5px;
		margin-bottom: 5px;
	}
	.evaluate_btns{
		margin-top: 10px;
	}
	 .display_titles{
    background:#ccc;
    font-weight: bolder;
    font-size: 15px;
    margin-top: 10px;
  }

	.innovations_holder{
		min-height: 40px;
		box-shadow: 0 0 2px #ccc;
		margin-top:5px;
		background:#fff;
    overflow: hidden;
    max-height: 40px;
	}
</style>
<div class="col-sm-12 col-xs-12">
<div class=" col-sm-12 col-xs-12 default_header">INNOVATION IMPLEMENTATION</div>
<div class="col-sm-12 col-xs-12">
	<div class="col-sm-9 col-xs-12">
	<div class="col-sm-12 col-xs-12 reports_project">
		<?php
	include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";

$innovation=$_POST['innovation'];
$sqlx="SELECT * FROM innovations_table where Innovation_Id='$innovation'";
$counter=0;
    $query_runx=mysql_query($sqlx) or die($query_runx."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runx)){
    $Innovation_name=base64_decode(decrypt($row['Innovation_name'], $key));
      $Category=$row['Category'];
  $stage=base64_decode(decrypt($row['stage'], $key));
  $date_added=decrypt($row['date_added'], $key);
}
  ?>
<div class=" col-sm-12 col-xs-12 ">
	<div class="col-sm-12 no_padding col-xs-12 display_titles">
  <div class="col-xs-6 col-sm-6 mobile_hidden content_h" >INNOVATION</div>
  <div class="col-sm-6 col-xs-6" style="text-align: center;"> DESCRIPTION </div>

</div>

</div>
	<div class="col-sm-12 col-xs-12 even_row no_padding innovations_holder">
  <div class="col-xs-6 col-sm-6 mobile_hidden content_h" ><?php echo $Innovation_name?> </div>
  <div class="col-sm-6 col-xs-6"> National Museums of Kenya Innovation Portal is a product of National Museums of Kenya.  </div>


</div>



	</div>	


<div class="col-sm-12 col-xs-12 no_padding" id="investor_data">
	



	</div>	

	</div>
	<div class="col-sm-3 col-xs-12 reports_body">

<div class="default_header">Investors With interest</div>
		<div class="col-sm-12 col-xs-12 innovations_load">
		     	<?php

$sqlx="SELECT * FROM investors where interest='$Category'";
$counter=0;
    $query_runx=mysql_query($sqlx) or die($query_runx."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runx)){
    $Name=base64_decode(decrypt($row['Name'], $key));
      $Company=base64_decode(decrypt($row['Company'], $key));
     $Investor_id=$row['Investor_id'];

				
				?>
        <div class="col-sm-12 col-xs-12 innovations_bn" id="<?php echo $Investor_id ?>"><?php echo "Allan".", NTSC"?></div>
           <?php
			}
			?>

		</div>
<div class="default_header">Innovations linked</div>
		<div class="col-sm-12 col-xs-12 innovations_load">
			
                <?php

			for($number=1;$number<30;$number++){
				?>
        <div class="col-sm-12 col-xs-12 innovations_bn"></div>
           <?php
			}
			?>

		</div>


	</div>

</div>



</div>
<script type="text/javascript">
	$(document).ready(function(){
		$(".innovations_bn").click(function(){
			var investor=$(this).attr("id");
			var innovation='<?php echo $innovation?>'
			//alert(investor)
			var url_in="modules/system/executive/pages/evaluate/select_investor.php";
			var investor_t="#investor_data";
			$.post(""+url_in+"",{investors:investor,innovation:innovation},function(data){
				//alert(data)
				$(investor_t).html(data);
			})
		})
	})
</script>