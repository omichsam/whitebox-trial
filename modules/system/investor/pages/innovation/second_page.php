<style type="text/css">
	#header_innovations{
		text-align: center;
		border-bottom: 1px solid #ccc;
		font-weight: bolder;
		text-transform: uppercase;
	}
	#innovation_wrapper{
		min-height: 200px;
		border-radius: 5px;
		box-shadow: 0 0 1px #ccc; 
	}
	#lower_foot{
		min-height: 100px;
	}
	#submit_innovation_holder{
		text-align: center;
		margin-top: 10px;
	}
	.textarea_p{
		border: 1px solid #ccc;
		resize: none;
		min-height: 100px;
	}
	#error_displayer{
		text-align: center;
	}
	.level_grows{
		min-height: 30px;
		border:2px solid #ccc;
		margin-top: 10px;
		border-radius: 50px;
	}
	.arro_grows{
		min-height: 30px;
		border-bottom: 5px solid #ccc;
	}
</style>
<?php
include "../../../../functions/security.php";
include "../../../../../connect.php";
//$salt="A0007799Wagtreeyty";
//getting variables
        $date = date('Y-m-d');
//$salt="A0007799Wagtreeyty";
$username=$_POST['my_user'];
$my_userde=encrypt($username, $key);
$get_user=mysql_query("SELECT User_id FROM external_users WHERE Email_address='$my_userde'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
$user_id=$get['User_id'];



      	$category=encrypt($_POST['category'],$key);
      	$staged=encrypt($_POST['staged'],$key);
      	$inno_name=encrypt($_POST['inno_name'],$key);
      	

  $sqlx="SELECT Innovation_Id FROM  innovations_table WHERE Innovation_name='$inno_name' and Category='$category' and stage='$staged' and user_id='$user_id'";
    $query_runx=mysql_query($sqlx) or die($query_runx."<br/><br/>".mysql_error());

    while($row=mysql_fetch_array($query_runx)){
    $Innovation_Id=$row['Innovation_Id'];
  
}


?>
<div class="col-sm-12 col-xs-12 " id="displayer">
	
<div class="col-sm-12 col-xs-12 no_padding">
	<div class="col-sm-4 col-xs-12"></div>
	<div class="col-sm-4 col-xs-12" id="header_innovations"><span class="">ADD MORE DETAILS AND PROCEED</span></div>

</div>
<div class="col-sm-12 col-xs-12 no_padding" id="level_submition">
	<div class="col-xs-1 col-sm-3"></div>
	<div class="col-xs-11 col-sm-6">
	<div class="col-sm-1 col-xs-1 level_grows theme_bg">1</div>
	<div class="col-sm-2 col-xs-2 arro_grows"></div>
    <div class="col-sm-1 col-xs-1 level_grows theme_bg">2</div>
    <div class="col-sm-2 col-xs-2 arro_grows"></div>
    <div class="col-sm-1 col-xs-1 level_grows"></div>
    <div class="col-sm-2 col-xs-2 arro_grows"></div>
    <div class="col-sm-1 col-xs-1 level_grows"></div>
</div>
</div>
<div class="col-xs-12 col-sm-3"></div>
	<div class="col-xs-12 col-sm-6 no_padding">
<div class="col-sm-12 col-xs-12 no_padding" id="innovation_wrapper">
	<div class="col-sm-12 col-xs-12">
		What Gap/need/problem have you identified?
		<textarea id="need" class="textarea_p col-sm-12 col-xs-12"></textarea>
	</div>


	<div class="col-sm-12 col-xs-12">
		What is the overall impact of your innovation/solution? 
		<textarea id="impact" class="textarea_p col-sm-12 col-xs-12"></textarea>
	</div>
	<div class="col-sm-12 col-xs-12">
		Is this your original idea?
		<select id="idea" class="splashinputs">
			<option></option>
			<option>Yes</option>
			<option>No</option>
		</select>
	</div>
<div class="col-sm-12 col-xs-12 not_shown" id="explanation">
		Explain 
		<textarea id="Explain" class="textarea_p col-sm-12 col-xs-12"></textarea>
	</div>

	<div class="col-sm-12 col-xs-12">
		What solution have you developed to address this gap/need/problem?  
		<textarea id="solution" class="textarea_p col-sm-12 col-xs-12"></textarea>
	</div>
	
	<div class="col-sm-12 col-xs-12" id="submit_innovation_holder">
		<span class="btn theme_bg" id="previous_innovation" role="first_page">Previous</span>
		<span class="btn theme_bg" id="next_innovation">Save and proceed</span>
		<span class="btn theme_bg not_shown" id="next_pages">Next Page</span>
	</div>
	<div class="col-sm-12 col-xs-12" id="error_displayer"></div>
	<div class="col-sm-12 col-xs-12" id="lower_foot">
		
	</div>
	
</div>

</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#previous_innovation").click(function(){
	
	 $(".innovation_pages").hide()
	 $("#first_page").show();
})
$("#next_pages").click(function(){
	
	 $(".innovation_pages").hide()
	 $("#third_page").show();
})

		var btnclick="#next_innovation";
		$(btnclick).click(function(){
			var Innovation_Id=btoa('<?php echo $Innovation_Id?>');
			var need=$("#need").val()
			var solution=$("#solution").val()
			var explain=$("#Explain").val()
			var impact=$("#impact").val()

			if(need && solution && impact){
			//alert(Innovation_Id)
var new_need=btoa(need);
var new_solution=btoa(solution);
var new_expalin=btoa(explain);
var new_impact=btoa(impact);
var loader=$("#loader").html()
var url="modules/system/external/pages/innovation/save_second.php";
var urld="modules/system/external/pages/innovation/third_page.php";
var target="#third_page";
var error="#error_displayer";
$(error).html(loader)
$.post(""+url+"",{
Innovation_Id:Innovation_Id,
new_solution:new_solution,
new_expalin:new_expalin,
new_impact:new_impact,
new_need:new_need
},function(data){
if($.trim(data)=="success"){
$.post(""+urld+"",{
	Innovation_Id:Innovation_Id
},function(data){
	$(error).html("")
$("#next_pages").show();
$("#next_innovation").hide();
     $(".innovation_pages").hide(data)
      		//$("#second_page").html(data).show()
	$(""+target+"").html(data).show();
})
}else{
$(error).html(data)
}
})
//alert();
}else{
	
	$(error).html("All fields required!")
}
})



		$("#idea").change(function(){
          var idea=$(this).val();
         // alert(implementsp)
          if(idea=="Yes"){
          $("#explanation").show()
          }else{
         $("#explanation").hide()
          }
		})
		/*$("#next_innovation").click(function(){
			var Innovation_Id='<?php echo $Innovation_Id ?>';
			var loader=$("#loader").html()
			var my_user=$("#global_u_email").val();
			
	}) */
	})
</script>
