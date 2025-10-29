
<div class="col-sm-12 col-xs-12 no_padding">
<div class="col-sm-12 col-xs-12 no_padding">
	<div class="col-sm-12 col-xs-12 no_padding">
	    <div class="col-sm-12 col-xs-12 reports_project not_shown no_padding" id="filtration"></div>
	<div class="col-sm-12 col-xs-12 no_padding reports_project" id="reports_project">

<div class="col-sm-12 no_padding col-xs-12 innovations_headers">
  <div class="col-xs-8 col-sm-6 content_h overflow_data" ><strong>No. INNOVATION NAME</strong></div>
  <div class="col-xs-4 col-sm-4 content_h overflow_data" ><strong>EXPECTATIONS</strong></div>
  <div class=" mobile_hidden col-sm-2 col-xs-2">ACTION</div>
  
</div>
		<?php
	include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$search=base64_decode($_POST['search']);
//echo $search;
$count="";
$delete=mysqli_query($con,"DELETE FROM investor_list") or die(mysqli_error($con));
$status="approved";
//$innovation=$_POST['innovation'];
$sqlx="SELECT * FROM innovations_table where Status='$status' and Innovation_name like '%$search%' OR Status='$status' OR Status='$status' OR Status='$status'and need like '%$search%' OR Status='$status'and solution like '%$search%' OR Status='$status'and impact like '%$search%' OR Status='$status' and originality_explanation like '%$search%' OR Status='$status'and busines_model like '%$search%' OR Status='$status'and target like '%$search%' OR Status='$status'and Research_sources like '%$search%' OR Status='$status'and requirements like '%$search%' OR Status='$status'and stage like '%$search%'";
$counter="";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $Innovation_name=$row['Innovation_name'];
     // $Category=$row['Category'];
  //$stage=$row['stage'];
 // $date_added=$row['date_added'];
 $Innovation_Id=$row['Innovation_Id'];
 $count=$count+1;
 $implementors="";
 $patner="";
 $fund="";
 $commun="";
 $statement="";
 $statepart="";
 $statecommn="";
 $statefund="";
 $stateimple="";
 $sqlxW="SELECT * FROM innovation_expectation where Innovation_id='$Innovation_Id'";
    $query_runxW=mysqli_query($con,$sqlxW) or die($query_runxW."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxW)){
  $petnership_implementors=$row['petnership_implementors'];
  $patnership_innovators=$row['patnership_innovators'];
   $funding=$row['funding'];
    $communities=$row['communities'];
    if($petnership_implementors){
     $implementors=$petnership_implementors;  
    }else{
        
    }
     if($funding){
     $fund=$funding;  
    }else{
        
    }
     if($communities){
     $commun=$communities;  
    }else{
        
    }
     if($patnership_innovators){
     $patner=$patnership_innovators;   
    }else{
        
    }
    
 
   if($implementors){
      $stateimple=" . ";
   }else{
       
   }
   if($fund){
      $statefund=" . ";
   }else{
       
   }
   if($commun){
      $statecommn=" . ";
   }else{
       
   }
    if($patner){
      $statepart=" . ";
   }else{
       
   }
    }
 
 
  ?>
	<div class="col-sm-12 no_padding col-xs-12 innovations_holder" role="<?php echo $Category?>" id="<?php echo $Innovation_Id?>">
  <div class="col-sm-6 col-xs-8 overflow_data"><?php echo $count.". ".$Innovation_name?></div>
  <div class="col-sm-4 col-xs-4 overflow_data"><?php echo "$stateimple$implementors$statefund$fund$statecommn$commun$statepart$patner";?></div>
   <div class="col-sm-2 col-xs-2 mobile_hidden no_padding"><span class="btn no_padding"><i class="fa fa-eye"></i> Link</span></div>
</div>
<?php
}

?>


	</div>	

<div class="col-sm-12 col-xs-12 not_shown reports_project no_padding" id="investor_dataholder">
<div class="col-sm-9 col-xs-12 no_padding" id="investor_data"></div>
<div class="col-sm-3 col-xs-12 reports_body" id="interested_investors">
	    <div class="col-sm-12 col-xs-12 no_padding not_shown lists_wraps">
	    <div class="col-sm-12 col-xs-12 default_header">List Of Investors</div>
	    <div class="col-sm-12 col-xs-12 no_padding display_titles">
	         <div class="col-sm-1 col-xs-1" > No. </div>
	          <div class="col-sm-6 col-xs-6" > DETAILS </div>
	          <div class="col-sm-4 col-xs-4" > ACTION </div>
	    </div>
	    </div>
	    <div class="col-sm-12 col-xs-12 no_padding" id="total_investors">
	        
	    </div>

<div class="col-sm-12 col-xs-12" id="error_assignment"></div>

	</div>
</div>
	</div>


</div>



</div>
<script type="text/javascript">


	$(document).ready(function(){
	    
	    var loader=$("#loader").html();
	    
	    
	   // alert()
	   $("#assingned_innovations").click(function(){
	       $.get("modules/system/executive/pages/assigned/assigned.php",{},function(data){
	           $("#home").html(data);
	       })
	   })
	       $(".filltereds").click(function(){
	           var roles=$(this).attr("role");
	           var role=btoa(roles)
	           //alert(roles)
	       $.post("modules/system/executive/pages/forward/filter.php",{role:role},function(data){
	         $(".reports_project").hide();
	       $("#investor_dataholder").hide();
	        $("#filtration").html(data).show();
	      // alert(data);
	          
	       })
	   })
	    
	     
	     
	     
	    $(".innovations_holder").click(function(){
	       var innovation=btoa($(this).attr("id"));
	       var category=btoa($(this).attr("role"));
	        $.post("modules/system/executive/pages/forward/select_investor.php",{category:category,innovation:innovation},function(data){
	       $(".reports_project").hide();
	       $("#investor_dataholder").show();
	        $("#investor_data").html(data).show();
	          $.get("modules/system/executive/pages/forward/key.php",{
	              
	          },function(data){ $("#total_investors").html(data)
	               $(".lists_wraps").hide();
	          })
	        })
	        
	    })
	    
		$(".innovations_bn").click(function(){
			var investor=$(this).attr("id");
			var innovation=$(this).attr("role");
			//alert(investor)
			var url_in="modules/system/executive/pages/forward/select_investor.php";
			var investor_t="#investor_data";
			$.post(""+url_in+"",{investors:investor,innovation:innovation},function(data){
				//alert(data)
				$(investor_t).html(data);
			})
		})
	
		
		
		
		
	})
</script>