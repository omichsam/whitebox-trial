<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


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
  height: 60px;
  width:60px;
  float:right;
  background-repeat: no-repeat;
  background-position: center center;
  background-size:100% 100%;
border-radius:40px;
}
.table_display{
min-height: 30px;
 border-bottom: 1px solid #ccc;
  background-color: #fff;
}
 </style>
 <script type="text/javascript">
   $(document).ready(function(){
    $("#add_landloard").click(function(){
     $.post("modules/system/receptionist/raiseissue/newissue.php",{

      },function(data){
        $("#home").html(data);
      })
    })
   })
 </script>
 <section >
      <div id="Dashboardhead" class="no_padding col-sm-12 col-xs-12" >
           <span class="float_left">issues</span>
             <span class="float_right " > Home>issues</span>
        
      </div>
      <div id="outer_dash" class="no_padding col-sm-12 col-xs-12" >

      <div id="main_dash" class="no_padding col-sm-12 col-xs-12" ></div>

      <div id="lower_dash" class="no_padding col-sm-12 col-xs-12" >
        <ul>
        <li class="float_left"><span class="online" >&nbsp;<i class="fa fa-bullhorn" style="color: #fff;"></i>&nbsp;</span> <span class="bluesd" id="add_landloard">Raise issue</span></li>
              <li class="float_right " ><i class="fa fa-print"></i> <span class="bluesd">Print</span></li>
            <li class="float_right export_page" ><i class="fa fa-upload"></i><span class="bluesd"> Export</span></li>
          </ul>
      </div>
<div class="col-sm-12 col-xs-12" id="searchchoir_display"></div>
        
      <div id="lower_table" class="no_padding col-sm-12 col-xs-12 displayer"  >
  <div id="lower_table " class="no_padding col-sm-12 col-xs-12" style="text-transform: uppercase;font-weight: bold;background: #ccc;">


      <div id="lower_table_header" class="no_padding col-sm-3 col-xs-5" > No. Department</div>

        <div id="lower_table_header" class="no_padding col-sm-2 col-xs-3" > Description</div>
      <div id="lower_table_header" class="no_padding col-sm-2  mobile_hidden" > Date_posted</div>

      <div id="lower_table_header" class="no_padding col-sm-2  mobile_hidden" > USER/DEPARTMENT</div>

      <div id="lower_table_header" class="no_padding col-sm-1 mobile_hidden" > Criticality</div>
      <div id="lower_table_header" class="no_padding col-sm-2 col-xs-3" >Date Posted<span style="float: right;"> Action</span></div>
      </div>
      <?php

include("../../../../connect.php");
$user=$_POST['user'];
//$category="";
     $get_userfh=mysqli_query($con,"SELECT * FROM users WHERE email='$user'") or die(mysqli_error($con));

$getfh=mysqli_fetch_assoc($get_userfh);

  $category=$getfh['category'];



$counter=0;
$sql="SELECT * FROM raise_issues where department='$category'";
    $query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){
      $description=$row['description'];
      $criticality=$row['criticality'];
    $status=$row['status'];
  $department=$row['department'];
  $device_type=$row['device_type'];
  $tag_number=$row['tag_number'];
  $assigned_to=$row['assigned_to'];
 $date_posted=$row['date_posted'];
  $posted_by=$row['posted_by'];
  $issueid=$row['id'];
$counter=$counter+1;

  $get_user=mysqli_query($con,"SELECT * FROM users WHERE category='$posted_by'") or die(mysqli_error($con));

$get=mysqli_fetch_assoc($get_user);
if($get){
  $category=$get['category'];
  $fname=$get['fname'];
  $sname=$get['sname'];
}else{

}
        ?>
<div id="lower_table " class=" table_display no_padding col-sm-12 col-xs-12" role="<?php echo $issueid ?>" >
  
      <div id="lower_table display_views_data" class="no_padding col-sm-3 col-xs-5" ><?php echo "$counter. $department"; ?> </div>

      <div id="lower_table display_views_data" class="no_padding col-sm-1 mobile_hidden"> <?php echo "$description"; ?></div>
        <div id="lower_table display_views_data" class="no_padding col-sm-2 col-xs-3"> <?php echo "$date_posted"; ?></div>
      
      <div id="lower_table display_views_data" class="no_padding col-sm-2 mobile_hidden" > <?php echo nl2br("$category\n$fname $sname");?></div>
      <div id="lower_table display_views_data" class="no_padding col-sm-1 col-xs-3" > <?php echo "$criticality"; ?></div>
            <div id="lower_table display_views_data" class="no_padding col-sm-3 col-xs-3" > <?php echo "$posted_by"; ?>  <span class="btn" style="float: right;"><i class="fa fa-eye"></i></span></div>
      
      </div>
        <?php
      }
      ?>
      </div>
      <!--<div id="lower_dash_footer" class="no_padding col-sm-12 col-xs-12" >
        <ul>
        <li class="float_left"> <span class="">search</span><input type="text" id="reg_no" class="" onkeyup="searchchoir()" placeholder="Name or registartion number or phone or email"  value=""></li>

              <li class="float_left " ><select>
                <option>select all</option>
                <option>select few</option>
              </select></li>
              <li class="float_left " ><span class="search_btns">Search</span></li>
            <li class="float_right " ><span class="search_btns"> Clear filtering</span></li>
          </ul>
      </div>
      <div id="lower_dash_footer" class="no_padding col-sm-12 col-xs-12" >
        <ul>
        <li class="float_left"> <span class="">Show</span>
          <select>
                <option>10</option>
                <option>5</option>
              </select></li>
              <li class="float_left " ><span class="">entries</span><i class="fa fa-previous"></i></li>
            <li class="float_right " ><span class=""></span></li>
          </ul>
      </div>-->
  </section>
  
 <script type="text/javascript">
 function searchchoir(){
	var reg_no=$("#reg_no").val();
	if(reg_no==""){
	   $.post("modules/system/coordinator/view/view.php",{
		
      },function(data){
      	$("#home").html(data);
      		
      		
      })
	}else{
	var loader=$("#loader").html();
	$(".displayer").html(loader);
	//alert(reg_no)
	
	  $.post("modules/system/coordinator/view/cheaking.php",{
			reg_no:reg_no
      },function(data){
      	$("#searchchoir_display").html(data);
      		$(".displayer").html("");

    })
	}
}
   $(document).ready(function(){
$("#search_data").change(function(){
    
})
$(".export_page").click(function(){
 $.post("modules/system/coordinator/view/export.php",{

},function(data){
  $("#home").html(data);
//alert(data)
})


})






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