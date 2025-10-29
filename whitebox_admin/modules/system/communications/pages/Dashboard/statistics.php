
<style type="text/css">
#mychart{
    min-height:200px;
    border:1px solid #ccc;
}
.graphfilters{
	cursor: pointer;

}
.graphfilters:hover{
	background: #ccc;
	color:green;

}

</style>
<?php
include "connect.php";
	
 $get_userppo=mysqli_query($con,"SELECT * FROM data_graphs ORDER BY Rand() LIMIT 0,1") or die(mysqli_error($con));
$getrp=mysqli_fetch_assoc($get_userppo);

$grapghtype=$getrp['name'];

    $get_userp=mysqli_query($con,"SELECT * FROM data_docs ORDER BY Rand() LIMIT 0,1") or die(mysqli_error($con));
$getr=mysqli_fetch_assoc($get_userp);

$pagetittle=$getr['tittle'];
$dataid=$getr['id'];

?>

<div class="col-sm-12 row col-xs-12 no_padding">
	<div class="col-sm-12 col-xs-12 default_header bordered" style="text-align: center;border-bottom: 1px solid #ccc;"><?php echo $pagetittle?></div>
<div class="col-sm-3 row col-xs-12">
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


                                          if($counter==2){
                                          $headings_d2=$row['colm_2'];
                                          $headings_d3=$row['colm_3'];
                                          $headings_d4=$row['colm_4'];
                                          $headings_d5=$row['colm_5'];
                                          $headings_d6=$row['colm_6'];
                                          $headings_d7=$row['colm_7'];
                                          $headings_d8=$row['colm_8'];
                                          $headings_d9=$row['colm_9'];
                                          $headings_d10=$row['colm_10'];
                                          $headings_d11=$row['colm_11'];
                                          $headings_d12=$row['colm_12'];
                                          $headings_d13=$row['colm_13'];
                                          $headings_d14=$row['colm_14'];
                                          $headings_d15=$row['colm_15'];
                                          $headings_d16=$row['colm_16'];
                                          $headings_d17=$row['colm_17'];
                                          $headings_d18=$row['colm_18'];
                                          $headings_d19=$row['colm_19'];
                                          $headings_d20=$row['colm_20'];
                                          }else{

                                          }

                                          if($counter==3){
                                          $data_d2=$row['colm_2'];
                                          $data_d3=$row['colm_3'];
                                          $data_d4=$row['colm_4'];
                                          $data_d5=$row['colm_5'];
                                          $data_d6=$row['colm_6'];
                                          $data_d7=$row['colm_7'];
                                          $data_d8=$row['colm_8'];
                                          $data_d9=$row['colm_9'];
                                          $data_d10=$row['colm_10'];
                                          $data_d11=$row['colm_11'];
                                          $data_d12=$row['colm_12'];
                                          $data_d13=$row['colm_13'];
                                          $data_d14=$row['colm_14'];
                                          $data_d15=$row['colm_15'];
                                          $data_d16=$row['colm_16'];
                                          $data_d17=$row['colm_17'];
                                          $data_d18=$row['colm_18'];
                                          $data_d19=$row['colm_19'];
                                          $data_d20=$row['colm_20'];
                                          }else{

                                          }
       if($counter>2){                             
?>
<div class="col-sm-6 col-xs-4 graphfilters" id="<?php echo $colm_d1?>"><?php echo $colm_d1 ?></div>

<?php

}else{

}
}
?>
</div>
<div class="col-sm-9 col-xs-12" id="graphcommon" style="background: #fff">
<canvas class="col-sm-12 col-xs-12" id="myChart"></canvas>
<div class="row">
          <div class="col-sm-10  col-xs-12" style="text-align: right;"></div>
           <div class="col-sm-2  col-xs-12">
            <button class="btn theme_bg loadgragh" role="graphs" style="float: right;">Read more.. <i class="fa fa-long-arrow-right arrow1" aria-hidden="true"></i></button>
          </div>
        </div>
</div>
<script type="text/javascript">
   $(document).ready(function(){


                                          var grapghtype='<?php echo $grapghtype?>';
                                          var headings_1='<?php echo $headings_d1 ?>';
                                          var headings_2='<?php echo $headings_d2 ?>';
                                          var headings_3='<?php echo $headings_d3 ?>';
                                          var headings_4='<?php echo $headings_d4 ?>';
                                          var headings_5='<?php echo $headings_d5 ?>';
                                          var headings_6='<?php echo $headings_d6 ?>';
                                          var headings_7='<?php echo $headings_d7 ?>';
                                          var headings_8='<?php echo $headings_d8 ?>';
                                          var headings_9='<?php echo $headings_d9 ?>';
                                          var headings_10='<?php echo $headings_d10 ?>';
                                          var headings_11='<?php echo $headings_d11 ?>';
                                          var headings_12='<?php echo $headings_d12 ?>';
                                          var headings_13='<?php echo $headings_d13 ?>';
                                          var headings_14='<?php echo $headings_d14 ?>';
                                          var headings_15='<?php echo $headings_d15 ?>';
                                          var headings_16='<?php echo $headings_d16 ?>';
                                          var headings_17='<?php echo $headings_d17 ?>';
                                          var headings_18='<?php echo $headings_d18 ?>';
                                          var headings_19='<?php echo $headings_d19 ?>';
                                          var headings_20='<?php echo $headings_d20 ?>';

                                          //data
                                           var data_1='<?php echo $data_d1 ?>';
                                          var data_2='<?php echo $data_d2 ?>';
                                          var data_3='<?php echo $data_d3 ?>';
                                          var data_4='<?php echo $data_d4 ?>';
                                          var data_5='<?php echo $data_d5 ?>';
                                          var data_6='<?php echo $data_d6 ?>';
                                          var data_7='<?php echo $data_d7 ?>';
                                          var data_8='<?php echo $data_d8 ?>';
                                          var data_9='<?php echo $data_d9 ?>';
                                          var data_10='<?php echo $data_d10 ?>';
                                          var data_11='<?php echo $data_d11 ?>';
                                          var data_12='<?php echo $data_d12 ?>';
                                          var data_13='<?php echo $data_d13 ?>';
                                          var data_14='<?php echo $data_d14 ?>';
                                          var data_15='<?php echo $data_d15 ?>';
                                          var data_16='<?php echo $data_d16 ?>';
                                          var data_17='<?php echo $data_d17 ?>';
                                          var data_18='<?php echo $data_d18 ?>';
                                          var data_19='<?php echo $data_d19 ?>';
                                          var data_20='<?php echo $data_d20 ?>';
       
var ctx = document.getElementById('myChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: grapghtype,

    // The data for our dataset
    data: {
        labels: [headings_2,headings_3, headings_4,headings_5,headings_6,headings_7,headings_8,headings_9,],
        datasets: [{
            label: '',
            backgroundColor: ['rgb(54, 162, 235, 0.8)',
                               'rgb(34, 84, 40, 0.8)',
                               'rgb(255, 206, 86, 0.8)',
                               'rgb(214, 172, 295, 0.8)',
                               'rgb(24, 184, 140, 0.8)',
                               'rgb(255, 106, 186, 0.8)',
                               'rgb(255, 0, 0, 0.8)',
                               'rgb(179, 102, 15, 0.8)'
                             ],
            borderColor: 'rgb(255, 99, 132)',
            data: [data_2,data_3, data_4,data_5,data_6,data_7,data_8,data_9]
        }]
    },

    // Configuration options go here
    options: {}
});
});
</script>



</div>
<script type="text/javascript">
	$(document).ready(function(){
		var my_id=$("#global_u_email").val();
		var dataid='<?php echo $dataid?>';
		var grapghtype='<?php echo $grapghtype?>';
		$(".graphfilters").click(function(){
			var filtered=$(this).attr("id");
			$.post('modules/system/communications/pages/datapage/filtergraph.php',{dataid:dataid,grapghtype:grapghtype,filtered:filtered},function(data){
				$("#graphcommon").html(data);

			})
		})
		$(".loadgragh").click(function(){
			$.post('modules/system/communications/pages/datapage/datapage.php',{dataid:dataid,grapghtype:grapghtype},function(data){
			
       $("#home").html(data)

			})
		})
	})
</script>