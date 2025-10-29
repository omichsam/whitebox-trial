<style type="text/css">
	.reports_body{
     min-height: 450px;
     box-shadow: 0 0 3px #ccc;
     background-color: #fff;
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
</style>
<div class="col-sm-12 col-xs-12">
<div class=" col-sm-12 col-xs-12 default_header">WRITE REPORT</div>
<div class="col-sm-12 col-xs-12">
	<div class="col-sm-9 col-xs-12">
	<div class="col-sm-12 col-xs-12 reports_body">
		
<div class=" col-sm-12 col-xs-12 default_header">MY REPORT</div>

<div class=" col-sm-12 col-xs-12 ">
	
<textarea id="innovation_need" class="coments col-sm-12 col-xs-12"></textarea>



</div>

	</div>	


	</div>
	<div class="col-sm-3 col-xs-12 reports_body">

<div class="default_header">Approved innovations</div>
		<div class="col-sm-12 col-xs-12 innovations_load">
			<?php

			for($number=1;$number<30;$number++){
				?>
        <div class="col-sm-12 col-xs-12 innovations_bn"></div>
<?php
			}
			?>

		</div>
<div class="default_header">Disaproved innovations</div>
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


<div class="col-sm-4 col-xs-12 "></div>
<div class="col-sm-4 col-xs-12 "><span class="btn evaluate_btns theme_bg">Back</span> <span class="btn evaluate_btns theme_bg">Send</span> </div>


</div>