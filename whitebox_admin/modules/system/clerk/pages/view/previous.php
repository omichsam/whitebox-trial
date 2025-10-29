<style type="text/css">
	
	#header_innovation{
text-transform: uppercase;
text-align: center;
border-bottom: 1px solid #ccc;
border-radius:5px;

	}
	.innovations_holder{
		min-height: 200px;
		box-shadow: 0 0 2px #ccc;
		margin-top:5px;
		background:#fff;
	}
	.content_ino{
		min-height: 200px;
		box-shadow: 0 0 2px #ccc;
	}
	.header_innov{
		min-height: 200px;
		box-shadow: 0 0 2px #ccc;
	}
	.in_headers{
		text-transform: uppercase;
		border-bottom: 1px solid #ccc;
	}
	.content_h{

		text-transform: uppercase;
		font-weight: bolder;
		text-align: center;
	}
	.innovation_attachements{
		min-height: 180px;
		background-size: cover !important;
		background-repeat: no-repeat !important;
		background-position: center !important;

	}
</style>
<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
?>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-12 col-xs-12" id="header_innovation"><h4 id="filter_headers">ALL INNOVATIONS SUBMITED</h4></div>	
<div class="col-sm-12 col-xs-12">
  <div class="col-sm-3 col-xs-12">
<div class="col-sm-12 col-xs-12">
  Filter by Category
    <select class="splashinputs filter_fields" role="category">
  
<option></option>
<option>Culture</option>
<option>Heritage</option>
 
</select>
</div>




    </div>
	<div class="col-sm-3 col-xs-12">
<div class="col-sm-12 col-xs-12">
	Filter by county
		<select class="splashinputs filter_fields" role="county">
	<option></option>
  <?php 
$sql="SELECT * FROM county_table ORDER BY County_name ASC";
    $query_run=mysql_query($sql) or die($query_run."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_run)){
           $County_name=$row['County_name'];
            ?>

<option><?php echo $County_name ?></option>
<?php
}


?>
</select>
</div>
	</div>
    <div class="col-sm-3 col-xs-12">

<div class="col-sm-12 col-xs-12">
	Filter by gender
		<select class="splashinputs filter_fields" role="gender">
	
 <option></option>
<option>MALE</option>
<option>FEMALE</option>
<option>OTHER</option>
</select>
</div>

    </div>
    <div class="col-sm-3 col-xs-12">
<div class="col-sm-12 col-xs-12">
	Filter by Education level
		<select class="splashinputs filter_fields" role="education">
	<option></option>
  <option>PhD</option>
<option>Masters</option>
<option>Bachelors</option>
<option>Diploma</option>
<option>Certificate</option>
<option>Secondary education</option>
<option>Primary education</option>
<option>Other</option>
</select>
</div>




    </div>


</div>
<div class="col-sm-12 col-xs-12" id="filtered_data">


<?php
$submission=encrypt("submission",$key);
$sqlx="SELECT * FROM innovations_table where Status='$submission'";
$counter=0;
    $query_runx=mysql_query($sqlx) or die($query_runx."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runx)){
    $Innovation_name=base64_decode(decrypt($row['Innovation_name'], $key));
      $Category=base64_decode(decrypt($row['Category'], $key));
  $stage=base64_decode(decrypt($row['stage'], $key));
  $date_added=decrypt($row['date_added'], $key);
   $Innovation_Id=$row['Innovation_Id'];
     $time_d="";
    $curenttime=time();
    $time_difference=$curenttime-$date_added;
    $seconds=$time_difference;
    $minutes=round($seconds/60);//minutes
    $hours=round($seconds/3600);//hours
    $days=round($seconds/86400);//days
    $weeks=round($seconds/604800);//weeks
    $months=round($seconds/2629440);//months
    $years=round($seconds/31553380);//years



    if($seconds<=60){
     return "Just now";
    }else if($minutes<=60){
      if($minutes==1){

      	$time_d="One minute ago";
      }else{
      	$time_d="$minutes minutes ago";
      }

    }elseif($hours<=24){

   if($hours==1){
   	$time_d="An hour ago";
   }else{
   	$time_d="$hours hrs ago";
   }


    }else if($days<=7){
    if($days==1){
    	$time_d="Yesterday";
    }else{
    	$time_d="$days days ago";
    }


    }else if($weeks<=4.3){
     if($weeks==1){
     	$time_d="A week ago";
     }else{
     	$time_d="$weeks weeks ago";
     }

    }else if($months<=12){

    	if($months==1){
    		$time_d="A month ago";
    	}else{

    		$time_d="$months months ago";
    	}
    }else{
  if($years==1){

  	$time_d="A year ago";
  }else{
  	$time_d="$years years ago";
  }

    }



$image='';

  if($Category=="Culture"){
$image='images/icons/culture.jpg';
  }else{
  	$image='images/icons/heritage.jpg';
  }
  $counter=$counter+1;
  if($counter % 2 != 0){ 

?>
<div class="col-sm-12 col-xs-12 innovations_holder">
<div class="col-sm-3 mobile_hidden header_innov">
	<div class="col-xs-12 col-sm-12 in_headers" ><?php echo $Category?> </div>
  <div class="col-sm-12 col-xs-12 innovation_attachements" style="background:url('<?php echo $image;?>')">
  	


  </div>
</div>
<div class="col-sm-9 col-xs-12 content_ino">
	
	<div class="col-xs-12 col-sm-12 content_h" ><?php echo $Innovation_name?> </div>
	<div class="col-sm-12 col-xs-12"> National Museums of Kenya Innovation Portal is a product of National Museums of Kenya. It is a platform that seeks to bridge the gap between innovators and implementers. The portal identifies innovations and ideas that have high potential impact and links them to implementers who are seeking sustainable solutions. </div>

	<div class="col-sm-12 col-xs-12"><strong><?php echo $time_d?> </strong> </div>
    <div class="col-sm-9 col-xs-12"></div>
  <div class="col-sm-3 col-xs-12"><strong><span id="<?php echo $Innovation_Id ?>" class="btn veiw_evaluate theme_bg">View</span> </strong> </div>
</div>
</div>

<?php
}else{
	?>
	<div class="col-sm-12 col-xs-12 innovations_holder">
<div class="col-sm-9 col-xs-12 content_ino">
	<div class="col-xs-12 col-sm-12 content_h" ><?php echo $Innovation_name?> </div>
	<div class="col-sm-12 col-xs-12"> National Museums of Kenya Innovation Portal is a product of National Museums of Kenya. It is a platform that seeks to bridge the gap between innovators and implementers. The portal identifies innovations and ideas that have high potential impact and links them to implementers who are seeking sustainable solutions. </div>
	<div class="col-sm-12 col-xs-12"><strong><?php echo $time_d?> </strong> </div>

  <div class="col-sm-9 col-xs-12"></div>
  <div class="col-sm-3 col-xs-12"><strong><span id="<?php echo $Innovation_Id ?>" class="btn veiw_evaluate theme_bg">View</span> </strong> </div>
</div>
<div class="col-sm-3 mobile_hidden header_innov">
	
	<div class="col-xs-12 col-sm-12 in_headers" ><?php echo $Category?></div>
	<div class="col-sm-12 col-xs-12 innovation_attachements" style="background:url('<?php echo $image;?>')" >
  	


  </div>
</div>

</div>
<?php
}
}


?>



</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
$(".filter_fields").change(function(){
var filter_role=$(this).attr("role");
var filter_value=$(this).val();

if(filter_value==""){

}else{
  var loader=$("#loader").html();
  var my_role=btoa(filter_role);
  var my_value=btoa(filter_value);
  var header_data="";
  if(filter_role=="county"){
header_data="innovations recieved from "+filter_value+" county";
  }else if(filter_role=="gender"){
header_data="innovations Submited by "+filter_value+" gender";
  }else if(filter_role=="category"){
header_data="innovations in "+filter_value+" category";
  }else{
header_data="innovations submited by "+filter_value+" holders";
  }
$("#filter_headers").html(header_data);
  $("#filtered_data").html(loader)
$.post("modules/system/clerk/pages/view/filter.php",{
my_role:my_role,
my_value:my_value
},function(data){
$("#filtered_data").html(data)
})
}

})

var view_evaluate=".veiw_evaluate";
var target="#home";
$(view_evaluate).click(function(){
  var innovation=$(this).attr("id");
var url="modules/system/clerk/pages/evaluate/evaluate.php";
$.post(url,{innovation:innovation},function(data){$(target).html(data)});
})
  })
</script>