<style type="text/css">
	.instrunctions_box{
		min-height: 250px;
		background-color: #fff;
		box-shadow: #ccc 2px 2px 0;
		margin-top: 10px;
	}
	.instrumentals{
	min-height: 69px;
background-color: #fff;
margin-top: 10px !important;
background-size: contain !important;
background-repeat: no-repeat;
background-position: center center !important;
	}
	.instrumentaled{
	background-color: #fff;	

box-shadow: #ccc 2px 2px 0;
cursor: pointer;
	}
	.header_pads{
		min-height: 10px;
	}
	.class_modify{
min-height: 238px;
background-color: #fff;
box-shadow: #ccc 2px 2px 0;
margin-top: 10px !important;
background-size: cover !important;
	}
	.circledd{
		min-height: 83px;
margin-top: 10px;
margin-bottom: 10px;
border-radius: 49px;
border: 2px solid #ccc;
font-size: 33px;
text-align: center;
padding-top: 17px;
font-weight: bold;
	}
	.cardsholders{
		margin-top: 5px;
	}
</style>
<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$moved=0;
$deleted=0;
$notified=0;

$sqlx="SELECT * FROM notify_tray where Status='done'";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    $action=$row['action'];
    if($action=="delete"){
    	$deleted=$deleted+1;
    }else if($action=="move"){
    	$moved=$moved+1;
    }else if($action=="notify"){
    	$notified=$notified+1;
    }else{

    }
    
}
?>

<div class="col-sm-12 col-xs-12">
	<div class="col-sm-12 col-xs-12 default_header">Manage Innovations</div>

<div class="col-sm-12 col-xs-12 header_pads" id=""></div>
<div class="col-sm-12 col-xs-12">
	<div class="col-sm-4 col-xs-4 ">

	<div class="col-xs-3 col-sm-3"></div>
	<div class="col-sm-6 col-xs-6 btn theme_bg managebtn" role="move">
		Move
	</div>
   </div>
   <div class="col-sm-4 col-xs-12 ">

	<div class="col-xs-3 col-sm-3"></div>
	<div class="col-sm-6 col-xs-6 btn theme_bg managebtn" role="delete">
		Delete
	</div>
</div>
<div class="col-sm-4 col-xs-12 ">
	<div class="col-xs-3 col-sm-3"></div>
	<div class="col-sm-6 col-xs-6 btn theme_bg managebtn" role="notify">
		Notify
	</div>
</div>
</div>

<div class="col-sm-12 col-xs-12 header_pads" id=""></div>
<div class="col-sm-12 col-xs-12" id="">
	
<div class="col-sm-4 col-xs-12 " id=""><div class="col-xs-12 col-xs-12 instrunctions_box">

	<div class="col-sm-12 col-xs-12 default_header">Move</div>
<div class="col-sm-12 col-xs-12 justify no_padding">
	Allows the movement of innovations from one stage to the other when needed. i.e. moving innovations from <strong>submistion</strong> to <strong>second evaluation</strong> or <strong> second evaluation</strong> to <strong>implementation</strong>. click <strong>Move</strong>, select the innovations to be moved, then click submit. All selected innovations will be moved to the preffered stage.
</div>


</div></div>

<div class="col-sm-4 col-xs-12 " id=""><div class="col-xs-12 col-xs-12 instrunctions_box">
	

	<div class="col-sm-12 col-xs-12 default_header">Delete</div>
	<div class="col-sm-12 col-xs-12 justify no_padding " >
	This function Allows users to permanently delete data from the system.Note, data will be moved to the trash with the admins' permission. A <strong>secret key</strong> is required for one to proceed with this Action. i.e. <strong>Deleting test data, duplicate data</strong> e.t.c. Click <strong>Delete</strong>, select the innovations to be deleted, click submit, input the secret key and then confirm. 
</div>
</div></div>

<div class="col-sm-4 col-xs-12 " id=""><div class="col-xs-12 col-xs-12 instrunctions_box">
	<div class="col-sm-12 col-xs-12 default_header">Notify</div>
	<div class="col-sm-12 col-xs-12 justify no_padding">
	Helps in notifying innovators,make follow up and directly link the system administrators and innovators.i.e. The admin may need to notify the innovators to respond to issues raised by the evaluating team. e.t.c. Click <strong>Notify</strong>, select the innovations, click submit, a window to allow preparation of message will show, create the message and click send. All innovators with the specified innovations will be notified. 
</div>
</div></div>

</div>








<div class="col-sm-12 col-xs-12 header_pads" id=""></div>
<div class="col-sm-12 col-xs-12" id="">
	
<div class="col-sm-4 col-xs-12 cardsholders " id="">
	<div class="col-xs-12 col-xs-12 instrumentaled" role="move">

	<div class="col-sm-12 col-xs-12 default_header">Moved</div>
<div class="col-sm-12 col-xs-12 no_padding instrumentals" style="background-image: url('images/move.jpg');">
</div>

<div class="col-xs-12 col-xs-12 namedpaper">
<div class="col-xs-4 col-xs-4"></div>	
<div class="col-xs-4 col-xs-4 circledd" id=""><?php echo $moved?></div>

</div>
</div>


</div>

<div class="col-sm-4 col-xs-12 cardsholders " id="">
	
<div class="col-xs-12 col-xs-12 instrumentaled" role="delete">
	<div class="col-sm-12 col-xs-12 default_header">Deleted</div>
	<div class="col-sm-12 col-xs-12 no_padding instrumentals" style="background-image: url('images/trash.jpg');">
	</div>
	<div class="col-xs-12 col-xs-12 namedpaper">
<div class="col-xs-4 col-xs-4"></div>	
<div class="col-xs-4 col-xs-4 circledd" id=""><?php echo $deleted?></div>

</div>
</div>
</div>

<div class="col-sm-4 col-xs-12 cardsholders " id="">
<div class="col-xs-12 col-xs-12 instrumentaled" role="notify">
	<div class="col-sm-12 col-xs-12 default_header">Notified</div>
<div class="col-sm-12 col-xs-12 no_padding instrumentals" style="background-image: url('images/notify.jpg');">
</div>
<div class="col-xs-12 col-xs-12 namedpaper">
<div class="col-xs-4 col-xs-4"></div>	
<div class="col-xs-4 col-xs-4 circledd" id=""><?php echo $notified?></div>

</div>
</div>


</div>





















</div>

<script type="text/javascript">
	$(document).ready(function(){
		$(".managebtn").click(function(){

      var user=$("#user_email").val();
			var myrole=$(this).attr("role");
			$.post("modules/system/super_admin/pages/manage/"+myrole+".php",{user:user},function(responce){$("#home").html(responce)});
		})
		$(".instrumentaled").click(function(){
			var role=btoa($(this).attr("role"));
			$.post("modules/system/super_admin/pages/manage/viewdetails.php",{role:role},function(responce){$("#home").html(responce)});
		
		})
	})
</script>