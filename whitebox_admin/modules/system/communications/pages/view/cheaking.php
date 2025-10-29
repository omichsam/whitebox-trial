 <style type="text/css">
.search_input{
width: 87%;
padding: 4px;
border-radius: 5px;
border: 1px solid #908989;
position: absolute;
right: 0px;
margin: -6px 6px 0px;

   }
   .search_icon{
    color: #ccc;
position: absolute;
right: 13px;
padding: 3px;

   }
   #Dashboardhead li{
    color: #000;
    display: inline;
   }
   #Dashboardhead{
    min-height: 30px;
   }
   #outer_dash{

    box-shadow: 0 0 3px #dadada;
   }
   #main_dash{
    min-height: 30px;
    box-shadow: 0 0 2px #ccc;
    background-color: #ccc;
   }
   #lower_dash{
    background-color: #ededed;
   }
   li{
    display:inline;
    margin-right: 5px;
   }
   .online{
  min-height: 2px;
  border-radius:9px;
  background-color: green;
}
.bluesd{
  color: blue;
  cursor: pointer;
}
#lower_table_header{
  box-shadow: 0 0 2px #ccc;
  font-size: 14px;

}
#lower_table_data{
  background-color: #fff;
}
#lower_dash_footer{
  margin-top: 5px;
  background-color: #ededed;
}
.search_btns{
  box-shadow: 0 0 3px #ccc;
  min-height: 20px;
}
.img_hold{
  min-height: 50px;
  background-repeat: no-repeat;
  background-size: cover;
  box-shadow: 0 0 3px #ccc;
  background-position: center;

}
.table_display{

 border-bottom: 1px solid #ccc;
  background-color: #fff;
}
 </style>
 <script type="text/javascript">
   $(document).ready(function(){
    $("#add_landloard").click(function(){
     $.post("modules/system/register/register.php",{

      },function(data){
        $("#home").html(data);
      })
    })
   })
 </script>
 <section >
 	<?php 
 	$reg_no=$_POST['reg_no'];
		if(!$reg_no){
		}else{
			?>
  			
  		<div id="lower_table" class="no_padding col-sm-12 col-xs-12" >
  <div id="lower_table " class="no_padding col-sm-12 col-xs-12" >

      <div id="lower_table_header" class="no_padding col-sm-1 col-xs-1" >No.<div style="float:right"> Profile</div></div>

      <div id="lower_table_header" class="no_padding col-sm-3 col-xs-5" > Name</div>
        <div id="lower_table_header" class="no_padding col-sm-2 col-xs-3" > Phone</div>
      <div id="lower_table_header" class="no_padding col-sm-2 mobile_hidden" > Registration no.</div>
      <div id="lower_table_header" class="no_padding col-sm-3  mobile_hidden" > Course</div>
      <div id="lower_table_header" class="no_padding col-sm-1 col-xs-3" > Family</div>
      </div>
  		<?php

include("../../../../connect.php");
		
$counter=0;
$sql="SELECT * FROM register WHERE fname like '%$reg_no%' OR mname like '%$reg_no%' OR lname like '%$reg_no%' OR Registration_no like '%$reg_no%' OR email like '%$reg_no%' OR phone like '%$reg_no%' ORDER BY RAND() LIMIT 0, 9";
    $query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
     	$phone=$row['phone'];
		$mails=$row['email'];
	$post_fname=$row['fname'];
	$post_mname=$row['mname'];
	$post_lname=$row['lname'];
	$post_image=$row['picture'];
	$adm_no=$row['adm_no'];
	$School=$row['School'];
	$Registration_no=$row['Registration_no'];
	$family=$row['family'];
	$counter=$counter+1;
	$registered_date=$row['registered_date'];
		if($post_image){
		 
      	
		    $newimage=$post_image;
				
		}else{
			$newimage="images/students/user.jpg";
		}
  			?>
<div id="lower_table " class=" table_display no_padding col-sm-12 col-xs-12" role="<?php echo $adm_no ?>" >
  <div id="lower_table display_views_data" class="no_padding col-sm-1 col-xs-1" ><?php echo "$counter"; ?> <div class="img_hold mobile_hidden " style="background-image: url(<?php echo $newimage?>);" ></div> </div>
  
      <div id="lower_table display_views_data" class="no_padding col-sm-3 col-xs-5" ><?php echo "$post_fname $post_lname"; ?> </div>
        <div id="lower_table display_views_data" class="no_padding col-sm-2 col-xs-3"> <?php echo "$phone"; ?></div>
      <div id="lower_table display_views_data" class="no_padding col-sm-2 mobile_hidden"> <?php echo "$Registration_no"; ?></div>
      
      <div id="lower_table display_views_data" class="no_padding col-sm-2 mobile_hidden" > <?php echo "$School"; ?></div>
      <div id="lower_table display_views_data" class="no_padding col-sm-1 col-xs-3" > <?php echo "$family"; ?></div>
      
      
      </div>
  			<?php
  		}
  	}
  		?>
  		</div>
  		
  </section>
  
 <script type="text/javascript">
   $(document).ready(function(){
    $(".table_display").click(function(){
      var stadm_no=$(this).attr("role");
      //alert(stadm_no)
      $.post("modules/system/coordinator/view/checkupdate.php",{
			stadm_no:stadm_no
       },function(data){
       $("#home").html(data);
        });
    })



   })
 </script>