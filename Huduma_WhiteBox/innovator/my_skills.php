<?php
include("../../base_connect.php");
include("../../connect.php");
 $male="";
 $female="";
$user=base64_decode($_SESSION["username"]);
$get_user=mysqli_query($con,"SELECT * FROM users WHERE email='$user'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
 $user_id=$get['id'];
 ?>
            <section class="content-header">


                <!-- <div class="breadcum"> -->
                    <div class="container">
                       <!--  <ol class="breadcrumb">
                            <li>
                                <a href="https://www.whitebox.go.ke/innovator"> <i class="livicon icon3 icon4" data-name="home" data-size="18" data-loop="true" data-c="#3d3d3d" data-hc="#3d3d3d"></i>Dashboard
                                </a>
                            </li>
                            <li class="">
                                
                                <a href="" >My Skills</a>
                            </li>
                        </ol> -->
                        <div class="pull-right" style="padding: 10px;">
                              <!-- <div style="margin: 20px; float: right;"> -->
                             <button type="button" class="btn btn-success" data-target="#myModal" data-toggle="modal">
                                Add Skills
                            </button>
                           
                        </div>
                    </div>
                <!-- </div> -->
            </section>

            <!-- The Modal -->
<div class="modal" id="myModal" style="display: none;" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

<form method="POST" action="" id="users_skills">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add skills</h4>
        <button type="button" id="closeskillmodal" class="close" data-dismiss="modal" style="margin-top: -25px;">×</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="add-skill-body">
<div class="form-group" style="display: none">

                </div>

           <!--  <div class="form-group" >
                    <input type="text" name="skills[]" class="form-control" placeholder="Enter your skill">
               </div> -->
                <!-- <table class="table table-bordered" id="dynamic_field">  
                    <tr>  
                         <td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td>  
                         <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                    </tr>  
               </table> 

                <div class="add-skill-body controls">
                    <div class="entry input-group">
                        <input class="form-control" name="skills[]" type="text" placeholder="Enter your skills" />
                        <span class="input-group-btn">
                            <button class="btn btn-success btn-add" type="button">
                                <span class="glyphicon glyphicon-plus"></span>
                            </button>
                        </span>
                    </div>
                </div> -->
                
                <div class="skills-list">
                    <div class="list">
                        <div class="row">
                                    <div class="col-md-12 text-center">
                                        <h4>A - E</h4>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="col-sm-12 col-xs-12" style="text-align:left !important;">
                                            <input type="checkbox" value="Accounting and Finance" name="skills1">
                                            <span>Accounting and Finance</span>
                                        </label>
                                        <label class="col-sm-12 col-xs-12" style="text-align:left !important;">
                                            <input type="checkbox" value="Administrative and Clerical" name="skills2">
                                            <span>Administrative and Clerical </span>
                                        </label>
                                        <label class="col-sm-12 col-xs-12" style="text-align:left !important;">
                                            <input type="checkbox" value="Agricultural skills" name="skills3">
                                            <span>Agricultural skills</span>
                                        </label>
                                        <label class="col-sm-12 col-xs-12" style="text-align:left !important;">
                                            <input type="checkbox" value="Arts and Design" name="skills4">Arts and Design
                                            <span></span>
                                        </label>
                                        <label class="col-sm-12 col-xs-12" style="text-align:left !important;">
                                            <input type="checkbox" value="Banking and insurance skills" name="skills5">
                                            <span>Banking and insurance skills</span>
                                        </label>
                                        <label class="col-sm-12 col-xs-12" style="text-align:left !important;">
                                            <input type="checkbox" value="Basic computer skills" name="skills6">
                                            <span>Basic computer skills</span>
                                        </label>
                                        <label class="col-sm-12 col-xs-12" style="text-align:left !important;">
                                            <input type="checkbox" value="Business and Management" name="skills7">
                                            <span>Business and Management</span>
                                        </label>
                                        <label class="col-sm-12 col-xs-12" style="text-align:left !important;">
                                            <input type="checkbox" value="Computing and Software Development" name="skills8">
                                            <span>Computing and Software Development</span>
                                        </label>
                                        <label class="col-sm-12 col-xs-12" style="text-align:left !important;">
                                            <input type="checkbox" value="Construction, Architecture and Housing" name="skills9">
                                            <span>Construction, Architecture and Housing</span>
                                        </label>
                                        <label class="col-sm-12 col-xs-12" style="text-align:left !important;">
                                            <input type="checkbox" value="Driving skills" name="skills10">
                                            <span>Driving skills</span>
                                        </label>
                                        <label class="col-sm-12 col-xs-12" style="text-align:left !important;">
                                            <input type="checkbox" value="Electrical engineering" name="skills11">
                                            <span>Electrical engineering</span>
                                        </label>                        
                                        <label class="col-sm-12 col-xs-12" style="text-align:left !important;">
                                            <input type="checkbox" value="Energy and power generation" name="skills12">
                                            <span>Energy and power generation</span>
                                        </label>
                                        <label class="col-sm-12 col-xs-12" style="text-align:left !important;">
                                            <input type="checkbox" value="Engineering and Innovation" name="skills13">
                                            <span>Engineering and Innovation</span>
                                        </label>
                                        <label class="col-sm-12 col-xs-12" style="text-align:left !important;">
                                            <input type="checkbox" value="Entertainment" name="skills14">
                                            <span>Entertainment</span>
                                        </label>
                                    </div>

                                    <div class="col-md-12 text-center">
                                        <h4>F - J</h4>
                                    </div>
                                    <div class="col-md-12">
                                       
                                        <label class="col-sm-12 col-xs-12" style="text-align:left !important;">
                                            <input type="checkbox" value="Food processing" name="skills15">
                                            <span>Food processing</span>
                                        </label>
                                        <label class="col-sm-12 col-xs-12" style="text-align:left !important;">
                                            <input type="checkbox" value="Human Resources" name="skills16">
                                            <span>Human Resources</span>
                                        </label>
                                        <label class="col-sm-12 col-xs-12" style="text-align:left !important;">
                                            <input type="checkbox" value="Installation, maintenance and Repair" name="skills17">
                                            <span>Installation, maintenance and Repair</span>
                                        </label>
                                    </div>

                                    <div class="col-md-12 text-center">
                                        <h4>J - O</h4>
                                    </div>
                                    <div class="col-md-12">
                                       
                                         <label class="col-sm-12 col-xs-12" style="text-align:left !important;">
                                            <input type="checkbox" value="Legal and Compliance" name="skills18">
                                            <span>Legal and Compliance</span>
                                        </label>
                                        <label class="col-sm-12 col-xs-12" style="text-align:left !important;">
                                            <input type="checkbox" value="Auditing and Tax Consultancy" name="skills19">
                                            <span>Auditing and Tax Consultancy</span>
                                        </label>
                                        <label class="col-sm-12 col-xs-12" style="text-align:left !important;">
                                            <input type="checkbox" value="Organizational skills" name="skills20">
                                            <span>Organizational skills</span>
                                        </label>
                                        <label class="col-sm-12 col-xs-12" style="text-align:left !important;">
                                            <input type="checkbox" value="Mechanical engineering and Metal work" name="skills21">
                                            <span>Mechanical engineering and metal work</span>
                                        </label>
                                        <label class="col-sm-12 col-xs-12" style="text-align:left !important;">
                                            <input type="checkbox" value="Media, Communications and Languages" name="skills22">
                                            <span>Media, Communications and Languages</span>
                                        </label>
                                        <label class="col-sm-12 col-xs-12" style="text-align:left !important;">
                                            <input type="checkbox" value="Medical, Health and Psychology" name="skills23">
                                            <span>Medical, Health and Psychology</span>
                                        </label>
                                    </div>

                                    <div class="col-md-12 text-center">
                                       <h4>P - T</h4>
                                    </div>
                                    <div class="col-md-12">
                                       
                                        <label class="col-sm-12 col-xs-12" style="text-align:left !important;">
                                            <input type="checkbox" value="Restaurant, Hospitality and Travel" name="skills24">
                                            <span>Restaurant, Hospitality and Travel</span>
                                        </label>
                                        <label class="col-sm-12 col-xs-12" style="text-align:left !important;">
                                            <input type="checkbox" value="Sales, Marketing and Customer Care" name="skills25">
                                            <span>Sales, Marketing and Customer Care</span>
                                        </label>
                                        <label class="col-sm-12 col-xs-12" style="text-align:left !important;">
                                            <input type="checkbox" value="Teaching and Training" name="skills26">
                                            <span>Teaching and Training</span>
                                        </label>
                                        <label class="col-sm-12 col-xs-12" style="text-align:left !important;">
                                            <input type="checkbox" value="Telecommunications and Networks" name="skills27">
                                            <span>Telecommunications and Networks</span>
                                        </label>
                                        <label class="col-sm-12 col-xs-12" style="text-align:left !important;">
                                            <input type="checkbox" value="Security" name="skills28">Security
                                        </label>
                                        <label class="col-sm-12 col-xs-12" style="text-align:left !important;">
                                            <input type="checkbox" value="Research" name="skills29">
                                            <span>Research</span>
                                        </label>
                                        <label class="col-sm-12 col-xs-12" style="text-align:left !important;">
                                            <input type="checkbox" value="Textile, Leather and Footwear Production" name="skills30">
                                            <span>Textile, Leather and Footwear Production</span>
                                        </label>
                                    </div>


                                </div>
                    </div>
                </div>
           
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button> -->
        <span class="btn btn-info pull-right" id="add_skilss">Add</span>
        <div class="col-md-12" style="text-align: center;" id='skills_error'></div>
      </div>

      </form>
    </div>
  </div>
</div>

            <section class="content">

                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="my_skills">
                                <div class="row">

                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Skills</th>
                                            </tr>
                                        </thead>


                                        <tbody>

<?php 

$sqlx="SELECT * FROM skills where user_id='$user_id'";
$counter=0;
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){


    	 $skills=$row['skill'];



  $counter=$counter+1;
  if($counter % 2 != 0){ 


    ?>
    <tr role="row" class="odd">
<th><?php echo $counter?></th>
  <th style="text-align: left;"><?php echo $skills?></th>
   </tr>
  <?php
    }else{
      ?>
	  <tr role="row" class="even">
	<th><?php echo $counter?></th>
   <th style="text-align: left;"><?php echo $skills?></th>
    </tr>
     <?php
         }
      }
      ?>

                                                                                </tbody>
                                        
                                    </table>

                                   <!--  <ol>
                                        
                                    </ol> -->
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </section>

    <script type="text/javascript" src="Huduma_WhiteBox/js/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var loader=$("#loader").html();
		$("#add_skilss").click(function(){
$("#skills_error").html("saving.. "+loader);
var formData = new FormData($("#users_skills")[0]);
//$("#image_change").html(loader);
    $.ajax({
        url : 'Huduma_WhiteBox/innovator/skills/save.php',
        method : 'POST',
        data : formData,
        contentType : false,
        cache : false,
        processData : false,
        success : function (response){
        	var drest=atob(response);
          if($.trim(drest)=="success"){


           $("#skills_error").html(drest+"...redirecting.."+loader).css("color","#000");  

            $.get("Huduma_WhiteBox/innovator/my_skills.php",function(data){
                $("#closeskillmodal").click()
            	$("#home_display").html(data).show();
            	$('html, body').animate({scrollTop: '0px'}, 300);
            })
   // var my_id=$("#global_u_email").val();
/*$.get("Huduma_WhiteBox/innovator/profile/getpic.php",{

},function(data){
$("#pic_loader").html(data);

}) */
        }else{
         // alert(response)  
         $("#skills_error").html(drest).css("color","red");
        }
        }
    })
		})
       
	})
</script>