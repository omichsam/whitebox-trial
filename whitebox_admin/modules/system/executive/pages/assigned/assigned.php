<style type="text/css">
	.reports_body{
     min-height: 200px;
     box-shadow: 0 0 3px #ccc;
     background-color: #fff;
     margin-top:10px;
	}
	.reports_project{
     min-height: 100px;
     margin-top: 10px;
     
	}
	
	.innovations_load{
		min-height: 40px;
		margin-top: 5px;
		max-height: 400px;
		overflow: auto;

	}
		.innovations_headers{
    min-height: 40px;
    box-shadow: 0 0 2px #ccc;
    margin-top:5px;
    background:#fff;
    overflow: hidden;
    max-height: 30px;
    background:#ccc;
    font-weight: bolder;
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
    max-height: 30px;
    cursor: pointer;
	}
	.data_roewrs{
	    min-height:30px;
	    border-bottom:2px solid #ccc;
	    margin-top:4px;
	}
	.sub_btnsa{
	    color:red;
	}
	#total_menu{
	    margin-top:5px;
	}
</style>
<div class="col-sm-12 col-xs-12 no_padding">
<div class=" col-sm-12 col-xs-12 default_header">CLOSED INNOVATIONS</div>
<div class=" col-sm-2 col-xs-12">&nbsp;</div>
<div class="col-sm-12 col-xs-12 no_padding">
	<div class="col-sm-12 col-xs-12 no_padding">
	<div class="col-sm-12 col-xs-12 reports_project">

<div class="col-sm-12 no_padding col-xs-12 innovations_headers">
  <div class="col-xs-12 col-sm-10 content_h overflow_data" ><strong>No. INNOVATION NAME</strong></div>
  <div class=" mobile_hidden col-sm-2 col-xs-2">ACTION <span class="btn " id="export_innovationsds"><a>Export <i class="fa fa-download"></i></a> </span></div>
  
</div>
		<?php
	include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$count=0;
$delete=mysqli_query($con,"DELETE FROM investor_list") or die(mysqli_error($con));
$status="implementation";

//$innovation=$_POST['innovation'];
$sqlx="SELECT * FROM innovations_table where Status='$status'";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $Innovation_name=$row['Innovation_name'];
      //$Category=$row['Category'];
  //$stage=$row['stage'];
 $Innovation_Id=$row['Innovation_Id'];
 $count=$count+1;
  ?>
	<div class="col-sm-12 no_padding col-xs-12 innovations_holder" role="<?php echo $Category?>" id="<?php echo $Innovation_Id?>">
  <div class="col-sm-10 col-xs-12"><?php echo $count.". ".$Innovation_name?></div>
   <div class="col-sm-2 col-xs-2 mobile_hidden no_padding"><span class="btn no_padding"><i class="fa fa-eye"></i> View investors</span></div>
</div>
<?php
}

?>


	</div>	


<div class="col-sm-12 col-xs-12 no_padding" id="investor_data">
	



	</div>	

	</div>
	<!--
<div class="col-sm-3 col-xs-12 reports_body" id="interested_investors">
	    <div class="col-sm-12 col-xs-12 default_header">List Of Investors</div>
	    <div class="col-sm-12 col-xs-12 no_padding display_titles">
	         <div class="col-sm-1 col-xs-1" > No. </div>
	          <div class="col-sm-6 col-xs-6" > DETAILS </div>
	          <div class="col-sm-4 col-xs-4" > ACTION </div>
	    </div>
	    <div class="col-sm-12 col-xs-12 no_padding" id="total_investors">
	        
	    </div>

<div class="col-sm-12 col-xs-12" id="error_assignment"></div>

	</div>-->

</div>



</div>
<script type="text/javascript">
	$(document).ready(function(){
	    $("#export_innovationsds").click(function(){
 var url="modules/system/executive/pages/assigned/exportone.php";
 var target="#home";
$.post(""+url+"",function(data){
//alert(data)
 $(target).html(data)
})
})
	    var loader=$("#loader").html();
	   // alert()
	   
	   // alert()
	
	      
	    $(".innovations_holder").click(function(){
	       var innovation=btoa($(this).attr("id"));
	       var category=btoa($(this).attr("role"));
	        $.post("modules/system/executive/pages/assigned/select_investor.php",{category:category,innovation:innovation},function(data){
	       $(".reports_project").hide();
	       $("#investor_dataholder").hide();
	        $("#filtration").html(data).show();
	        })
	        
	    })
	    
	/*	$(".innovations_bn").click(function(){
			var investor=$(this).attr("id");
			var innovation=$(this).attr("role");
			//alert(investor)
			var url_in="modules/system/executive/pages/assigned/select_investor.php";
			var investor_t="#investor_data";
			$.post(""+url_in+"",{investors:investor,innovation:innovation},function(data){
				//alert(data)
				$(investor_t).html(data);
			})
		})
		
		
		*/
		
	
	})
</script>