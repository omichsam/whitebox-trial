<style type="text/css">
	
	#header_innovation{
text-transform: uppercase;
text-align: center;
border-bottom: 1px solid #ccc;
border-radius:5px;

	}
	.innovations_holder{
		min-height: 40px;
		box-shadow: 0 0 2px #ccc;
		margin-top:5px;
		background:#fff;
    overflow: hidden;
    max-height: 40px;
	}
	.content_ino{
		min-height: 10px;
		box-shadow: 0 0 2px #ccc;
	}
	.header_innov{
		min-height: 10px;
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
  .even_row{
    background: #e3edf0;
  }
  .viewed{
background: #ccc;
  }
  .veiw_evaluate{
    cursor: pointer;
  }
 
#filtered_data{
    min-height: 500px;
    max-height: 500px;
    overflow: auto;
    background: #fff;
  }
  #add_user{
    margin-top: 5px;
    margin-bottom: 5px;
  }
</style>
<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
?>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-12 col-xs-12" id="header_innovation"><h4 id="filter_headers">ALL USERS</h4></div>	
<div class="col-sm-12 col-xs-12">
  <span class="btn theme_bg" id="add_user">Add a user <i class="fa fa-plus"></i></span>
 <!-- <div class="col-sm-3 col-xs-12">
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
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
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

-->
</div>
<div class="col-sm-12 col-xs-12" id="filtered_data">

</div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
     $.get("modules/system/super_admin/pages/Dashboard/view_all.php",function(data){$("#filtered_data").html(data)})
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
$.post("modules/system/super_admin/pages/view/filter.php",{
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
var url="modules/system/super_admin/pages/evaluate/evaluate.php";
$.post(url,{innovation:innovation},function(data){$(target).html(data)});
})
$("#add_user").click(function(){
$.get("modules/system/super_admin/pages/view/add_user.php",function(data){
  $("#home").html(data);
})
  






})
  })
</script>