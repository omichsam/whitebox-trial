<style type="text/css">
	#dashbord_h{
	    font-size:20px;
	    border-bottom:2px solid #ccc;
		text-transform: uppercase;
		text-align: center;
		font-weight:bolder !important;
	}
	#dashbord_sd{
	   font-size:20px;
		text-transform: uppercase;
		text-align: center;
		font-weight:bolder !important; 
	}
.dashboards{
	min-height: 120px;
    margin-top: 10px;
    box-shadow: 2px 2px 2px #ddd;
    background:#ddd;
    border-radius: 5px;
      cursor: pointer;

    margin-bottom: 5px;
}
.dashboards:hover{
    box-shadow: 0 0 15px #000;
}
.dashboarded{
    min-height: 125px;
border-radius: 5px;
    border:#e6b234  solid 2px;
}
#graph{
	min-height: 300px;
	margin-top: 20px;
	box-shadow: 0 0 3px #ccc;
	text-align: center;
}
.innovation_data{
    min-height: 10px;

  }
   .count_holder{
min-height: 20px;
border-radius: 5px;
text-align: center;
font-size: 32px;
  }
   .button_viewinno{
    cursor: pointer;
    text-align: right;
    text-transform: uppercase;
    font-weight: bold;
    color: #e7663c;

  }
</style>

<?php

include "../../../../../connect.php";
$my_user=$_POST['my_id'];
include("../../../../functions/security.php");
//$salt="A0007799Wagtreeyty";
$submit=encrypt("submission", $key);
$approve=encrypt("approved", $key);
$pendingds=encrypt("pending", $key);
$diasapproved=encrypt("disapproved", $key);
$implemented=encrypt("implementation", $key);
//$implemented=encrypt("waiting", $key);
$submitted=0;
$diasapprove=0;
$implement=0;
$waiting=0;
$evaluated=0;
$approved=0;
$my_userde=encrypt($my_user, $key);
$get_user=mysql_query("SELECT User_id FROM external_users WHERE Email_address='$my_userde'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
$user_id=$get['User_id'];
//echo $user_id;


$my_user=$_POST['my_id'];
$data_status=encrypt("pending",$key);
$my_userde=encrypt($my_user,$key);
$get_user=mysql_query("SELECT Id FROM administrators WHERE user_name='$my_userde'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
$User_id=$get['Id'];

$approved=0;
    $implementation=0;
    $disapproved=0;
    $evaluation=0;
    $submistion=0;
    $first_disapproved=0;
    $second_evaluation=0;

    
$sqlx="SELECT * FROM innovations_table where user_id='$user_id' and status !='$pendingds'";
//$counter=0;

    $query_runx=mysql_query($sqlx) or die($query_runx."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runx)){
    $Innovation_name=base64_decode(decrypt($row['Innovation_name'], $key));
   $Status=decrypt($row['Status'], $key);
   // $Status="disapproved";
    
$submistion=$submistion+1;
  if($Status=="evaluation"){
    $evaluation=$evaluation+1;
  }else if($Status=="second_evaluation"){
$evaluation=$evaluation+1;
$second_evaluation=$second_evaluation+1;
  }else if($Status=="approved"){
    $second_evaluation=$second_evaluation+1;
$approved=$approved+1;
  }else if($Status=="disapproved"){
    $second_evaluation=$second_evaluation+1;
    $disapproved=$disapproved+1;
  }else if($Status=="first_disapproved"){
$first_disapproved=$first_disapproved+1;
  }else if($Status=="implementation"){
    $second_evaluation=$second_evaluation+1;
$implementation=$implementation+1;
$approved=$approved+1;
  }else{

  }
 }
 
?>


<div class="col-sm-12 col-xs-12">
<div class="col-sm-12 col-xs-12" id="dashbord_h"><h5>My dashboard</h5></div>
<!--<div class="col-sm-12 col-xs-12" id="dashbord_sd"><h5>Innovations</h5></div>-->
<div class="col-xs-12 col-xs-12 no_padding">
    <!--
<div class="col-xs-6 col-sm-2">
	<div class="col-sm-12 col-xs-12 no_padding dashboards">
	    <div class="col-sm-12 col-xs-12 dashboarded">
		<div class="col-sm-12 col-xs-12"></div>
		 <div class="col-sm-12 col-xs-12 default_header">Submited</div>
    <div class="col-sm-12 col-xs-12 no_padding innovation_data"></div>
    <div class="col-sm-12 col-xs-12 no_padding">
    <div class="col-sm-4 col-xs-4 no_padding">  

    </div>
		<div class="col-sm-4 col-xs-4 no_padding count_holder" id="count_holder"><?php echo $submitted?>
    </div>  
    </div>
	<div class="col-sm-12 col-xs-12 no_padding">
    <div class="col-sm-4 col-xs-4 no_padding">  

    </div>
    <div class="col-sm-4 col-xs-4 no_padding ">
    </div>  
       <div class="col-sm-4 col-xs-4 no_padding ">
        <span class="button_viewinno">&nbsp; </span>
    </div>
    </div>
	
	
	
	
		</div>
	</div>
</div>-->
<!--<div class="col-xs-6 col-sm-2">
	<div class="col-sm-12 col-xs-12 dashboards">
		<div class="col-sm-12 col-xs-12">Innovations <br>Evaluated</div>
		<div class="col-sm-12 col-xs-12"><?php echo $evaluated?></div>
	</div>
</div>-->

<?php

for($d=1;$d<=6;$d++){
$data_d=0;
if($d=="1"){
    $data_d=$submistion;
    $data_header="Submited";
}else if($d=="2"){
    $data_d=$evaluation;
    $data_header="1St Evaluation";
}else if($d=="3"){
    $data_d=$second_evaluation;
    
    $data_header="2nd Evaluation";
}else if($d=="4"){
    $data_header="Accepted";
    $data_d=$approved;
}else if($d=="5"){
    $data_header="Implemented";
}else if($d=="6"){
    $data_d=$first_disapproved+$disapproved;
    $data_header="Declined";
}else{
    
}
?>
<div class="col-xs-6 col-sm-2">
	<div class="col-sm-12 col-xs-12 no_padding dashboards">
	    <div class="col-sm-12 col-xs-12 dashboarded">
		<div class="col-sm-12 col-xs-12"></div>
		 <div class="col-sm-12 col-xs-12 default_header"><?php echo $data_header?></div>
    <div class="col-sm-12 col-xs-12 no_padding innovation_data"></div>
    <div class="col-sm-12 col-xs-12 no_padding">
    <div class="col-sm-4 col-xs-4 no_padding">  

    </div>
		<div class="col-sm-4 col-xs-4 no_padding count_holder" id="count_holder"><?php echo $data_d?>
    </div>  
    </div>
	<div class="col-sm-12 col-xs-12 no_padding">
    <div class="col-sm-4 col-xs-4 no_padding">  

    </div>
    <div class="col-sm-4 col-xs-4 no_padding ">
    </div>  
       <div class="col-sm-4 col-xs-4 no_padding ">
        <span class="button_viewinno">&nbsp; </span>
    </div>
    </div>
	
	
	
	
		</div>
	</div>
</div>
<?php
}

?>
<!--
<div class="col-xs-6 col-sm-2">
	<div class="col-sm-12 col-xs-12 no_padding dashboards">
	    <div class="col-sm-12 col-xs-12 dashboarded">
		<div class="col-sm-12 col-xs-12"></div>
		 <div class="col-sm-12 col-xs-12 default_header">2nd Evaluation</div>
    <div class="col-sm-12 col-xs-12 no_padding innovation_data"></div>
    <div class="col-sm-12 col-xs-12 no_padding">
    <div class="col-sm-4 col-xs-4 no_padding">  

    </div>
		<div class="col-sm-4 col-xs-4 no_padding count_holder" id="count_holder"><?php echo $approved?>
    </div>  
    </div>
	<div class="col-sm-12 col-xs-12 no_padding">
    <div class="col-sm-4 col-xs-4 no_padding">  

    </div>
    <div class="col-sm-4 col-xs-4 no_padding ">
    </div>  
       <div class="col-sm-4 col-xs-4 no_padding ">
        <span class="button_viewinno">&nbsp; </span>
    </div>
    </div>
	
	
	
	
		</div>
	</div>
</div>



<!--<div class="col-xs-6 col-sm-2">
	<div class="col-sm-12 col-xs-12 dashboards">
		<div class="col-sm-12 col-xs-12">Accepted</div>
		<div class="col-sm-12 col-xs-12"><?php echo $approved?></div>
	</div>
</div>--->
<!--
<div class="col-xs-6 col-sm-2">
	<div class="col-sm-12 col-xs-12 no_padding dashboards">
	    <div class="col-sm-12 col-xs-12 dashboarded">
		<div class="col-sm-12 col-xs-12"></div>
		 <div class="col-sm-12 col-xs-12 default_header">Accepted</div>
    <div class="col-sm-12 col-xs-12 no_padding innovation_data"></div>
    <div class="col-sm-12 col-xs-12 no_padding">
    <div class="col-sm-4 col-xs-4 no_padding">  

    </div>
		<div class="col-sm-4 col-xs-4 no_padding count_holder" id="count_holder"><?php echo $implement?>
    </div>  
    </div>
	<div class="col-sm-12 col-xs-12 no_padding">
    <div class="col-sm-4 col-xs-4 no_padding">  

    </div>
    <div class="col-sm-4 col-xs-4 no_padding ">
    </div>  
       <div class="col-sm-4 col-xs-4 no_padding ">
        <span class="button_viewinno">&nbsp; </span>
    </div>
    </div>
	
	
	
	
		</div>
	</div>
</div>
<div class="col-xs-6 col-sm-2">
	<div class="col-sm-12 col-xs-12 no_padding dashboards">
	    <div class="col-sm-12 col-xs-12 dashboarded">
		<div class="col-sm-12 col-xs-12"></div>
		 <div class="col-sm-12 col-xs-12 default_header">Accepted</div>
    <div class="col-sm-12 col-xs-12 no_padding innovation_data"></div>
    <div class="col-sm-12 col-xs-12 no_padding">
    <div class="col-sm-4 col-xs-4 no_padding">  

    </div>
		<div class="col-sm-4 col-xs-4 no_padding count_holder" id="count_holder"><?php echo $implement?>
    </div>  
    </div>
	<div class="col-sm-12 col-xs-12 no_padding">
    <div class="col-sm-4 col-xs-4 no_padding">  

    </div>
    <div class="col-sm-4 col-xs-4 no_padding ">
    </div>  
       <div class="col-sm-4 col-xs-4 no_padding ">
        <span class="button_viewinno">&nbsp; </span>
    </div>
    </div>
	
	
	
	
		</div>
	</div>
</div>-->
<!--
<div class="col-xs-6 col-sm-2">
	<div class="col-sm-12 col-xs-12 dashboards">
		<div class="col-sm-12 col-xs-12">Implemented</div>
		<div class="col-sm-12 col-xs-12"><?php echo $implement?></div>
	</div>
</div>-->
<!--<div class="col-xs-6 col-sm-2">
	<div class="col-sm-12 col-xs-12 dashboards">
		<div class="col-sm-12 col-xs-12">Innovations <br>Waiting</div>
		<div class="col-sm-12 col-xs-12"><?php echo $waiting?></div>
	</div>
</div>-->
<div class="col-sm-12 col-xs-12 no_padding mobile_hidden" id="graph">



</div>
</div>


</div>
<script type="text/javascript">
$(document).ready(function(){
var my_id=$("#global_u_email").val();
var graph="modules/system/external/pages/Dashboard/innovations.php";
var paged="#graph";
$.post(""+graph+"",{my_id:my_id},function(data){$(paged).html(data)})

	})
</script>