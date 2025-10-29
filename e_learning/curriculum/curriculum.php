<style type="text/css">
	.moduleholder{
		min-height: 200px;
		box-shadow: 0px 0px 2px #ccc;

		border-radius: 5px;
		margin-top: 15px;
		cursor: pointer;
	}
	  #analytics_base{
    margin-top: 10px;
    max-height: 430px;
    overflow: auto;
  }
  .data_dvsz{
    min-height: 100px;
    margin-top: 10px;
    box-shadow: 2px 2px 2px #ddd;
    background:#ddd;
    border-radius: 5px;
      cursor: pointer;

  }
  .active_btnd{
    min-height: 100px;
    margin-top: 10px;
    box-shadow: 0 0 15px #000;
    background:#ddd;
    border-radius: 5px;
      cursor: pointer;

  }
  .data_dvsz:hover{
    box-shadow: 0 0 15px #000;
    

  }
  .innovation_data{
    min-height: 10px;

  }
  .count_holder{
min-height: 20px;
border-radius: 5px;
text-align: center;
font-size: 24px;
  }
  .button_viewinno{
 cursor: pointer;
text-align: right;
text-transform: uppercase;
font-weight: bold;
color: #e7663c;
font-size: 29px;

  }
  .data_outer{
   border-radius: 5px;
border: #e6b234 solid 2px;
min-height: 165px;
  }
  .analytics_divs{
    margin: 10px;
    border-top: 2px dashed #ccc;
    /*box-shadow: 0 0 3px #ccc;
    min-height: 220px;
    padding-top: 10px;
    border-right: 2px solid #ccc;
    */
  }
  .topic_unit{font-size: 28px;
font-weight: bold;
}

</style>

<div class="col-sm-12 col-xs-12">
	<?php
	include("../../connect.php");
	$sql="SELECT * FROM curriculum_units where status='active' ORDER BY unit_name ASC";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
           $unit_name=$row['unit_name'];
           $description =$row['description'];
           $id=$row['id'];

	?>

<div class="col-sm-4 col-xs-12 ">
  <div class="col-sm-12 col-xs-12 no_padding data_dvsz" role="<?php echo $id?>">
    <div class="col-sm-12 no_padding col-xs-12 data_outer">
    <div class="col-sm-12 col-xs-12 default_header topic_unit"><?php echo $unit_name;?></div>
    <div class="col-sm-12 col-xs-12 no_padding innovation_data"></div>
    <div class="col-sm-12 col-xs-12 ">
    <!--<div class="col-sm-4 col-xs-4 no_padding">  

    </div>-->
    <div class="col-sm-12 col-xs-12 no_padding count_holder" id="count_holder"><?php echo $description?>
    </div>  

    </div>
    <div class="col-sm-12 col-xs-12 no_padding">
    <div class="col-sm-4 col-xs-4 no_padding">  

    </div>
    <div class="col-sm-4 col-xs-4 no_padding ">
    </div>  
       <div class="col-sm-4 col-xs-4 no_padding ">
        <span class="button_viewinno">Open </span>
    </div>
    </div>
  </div>
</div>



</div>
	<?php


	}

	?>

</div>
<script type="text/javascript">
	$(document).ready(function(){
		$(".data_dvsz").click(function(){
			var role=btoa($(this).attr("role"));
			$.post("e_learning/curriculum/view.php",{role:role},function(data){
				$("#learning_area").html(data);
			})
		})
	})
</script>