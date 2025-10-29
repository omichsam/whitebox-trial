<?php
include("../../base_connect.php");
include("../../connect.php");
$company_name="";
 $company_registration_no="";
 $kra_pin="";
 $company_type="";



$my_id=base64_decode($_POST['my_id']);
//echo $my_id;
$sqluser="SELECT * FROM users WHERE email='$my_id'";
    $query_runp=mysqli_query($con,$sqluser) or die($query_runp."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runp)){
$user_id=$row['id'];
}
//$user_id=30;

$sql="SELECT * FROM  company WHERE user_id='$user_id' LIMIT 0,1";
    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_run)){     
  
$company_name=$row['company_name'];
 $company_registration_no=$row['company_registration_no'];
 $kra_pin=$row['kra_pin'];
 $company_type=$row['company_type'];

}
 if($company_type){
$showgap="";
 }else{
    $showgap="not_shown";
 }
?>





















<style type="text/css">
    .formcomany{
        text-transform: uppercase;
        font-weight: bolder;
    }
</style>

     <div id="company_data" class="">
           <form id="commentForm" action="" method="POST" enctype="multipart/form-data" class="form-horizontal col-md-12 bv-form no_padding" novalidate="novalidate">
                                <!-- progressbar -->

                                    <div class="col-md-12">&nbsp;</div>
                                <ul class="nav nav-pills">
                                    <li class="active bv-tab-error"><a href="#tab1" data-toggle="tab" aria-expanded="true">Please Provide your Company Details</a></li><!--<li id="mycompanies" class="btn-primary btns_comp btn">My company details</li>
                                    <li style="display: none;"  id="mycompaniesback" class="btn-success not_shown btns_comp btn">Add Company</li>
                                </ul>
                                 <div class="tab-content companypages " style="min-height:451px" id="companydisplay">
                                     
                                 </div>-->
                                <div class="tab-content companypages " >
                                    <!-- TAB 1 START  -->
                                    <div class="col-md-12">
                                        <h2 class="">Enter your company/organization details:&nbsp;</h2>
                                        <div class="form-group has-error">
                                            <label for="company_name" class="col-sm-3 compmay_dfiels control-label">Company
                                                Name *</label>
                                            <div class="col-sm-9">
                                                <input id="company_name" name="company_name" type="text" placeholder="Company Name" class="form-control formcomany required" required="" data-bv-field="company_name" value="<?php echo $company_name?>">

                                                
                                            <small style="" class="help-block" data-bv-validator="notEmpty" data-bv-for="company_name" data-bv-result="INVALID">This field is required</small></div>
                                        </div>

                                        <div class="form-group has-error">
                                            <label for="registered_name" class="col-sm-3 control-label">Company
                                                Registration Number
                                                *</label>
                                            <div class="col-sm-9">
                                                <input id="company_registration_no" name="company_registration_no" type="text" placeholder="Company Registration Number" class="compmay_dfiels form-control formcomany required" required="" data-bv-field="company_registration_no" value="<?php echo $company_registration_no?>">

                                                
                                            <small style="" class="help-block" data-bv-validator="notEmpty" data-bv-for="company_registration_no" data-bv-result="INVALID">This field is required</small></div>
                                        </div>


                                        <div class="form-group has-error">
                                            <label for="kra_pin" class="col-sm-3 control-label">KRA PIN *</label>
                                            <div class="col-sm-9">
                                                <input id="kra_pin" name="kra_pin" type="text" class="compmay_dfiels form-control formcomany required" placeholder="KRA PIN" required="" data-bv-field="kra_pin" value="<?php echo $kra_pin?>">

                                                
                                            <small style="" class="help-block" data-bv-validator="notEmpty" data-bv-for="kra_pin" data-bv-result="INVALID">This field is required</small></div>
                                        </div>


                                        <div class="form-group has-error">
                                            <label for="company_type" class="col-sm-3 control-label">What is your
                                                company type? Please select: *</label>
                                            <div class="col-sm-9">
                                                <select class="form-control formcomany compmay_dfiels" title="Select your company type..." name="company_type" required="" data-bv-field="company_type" id="company_type">
                                                    <option class="<?php echo $showgap?>"><?php echo $company_type?></option>
                                                    <option ></option>
                                                    <option>Sole Proprietorship</option>
                                                    <option>Limited Company</option>
                                                    <option>Partnership</option>
                                                    <option>Limited Liability partnership</option>
                                                    <option>Other</option>
                                                </select>
                                                <input type="text" value="<?php echo $_POST['my_id']?>" name="my_id" style="display: none;">
                                            <small style="" class="help-block" data-bv-validator="notEmpty" data-bv-for="company_type" data-bv-result="INVALID">This field is required</small></div>
                                            <span class="help-block"></span>
                                            <!-- Attachment Field -->
                                        <!--
                                            <div class="form-group col-sm-12">
                                                <label for="CompanyAttachment">Attachment:</label>
                                                <i>Please attach your company registration certificate <br>(.pdf, .png, .jpeg, .docx -  Max. 10MB)</i>
                                                <input name="CompanyAttachment" type="file" id="CompanyAttachment">

                                                <div class="clearfix"></div>
                                            </div>
                                            -->

                                        </div>


                                        <div class="form-group col-sm-12" style="color: #fff; text-align: center;">
                                             
                                             <span class="btn b " style="background-color: #4FAA41; color: #fff; " id="Submit_data" >Save</span>
                                          
                                        </div>
                                        <div class="form-group col-sm-12" id="div_companyerror" style=" text-align: center;">
                                             
                                          
                                        </div>
            
                                    </div>
                                </div>
                        </form>
                    </div>

                    <script type="text/javascript">
                    	$(document).ready(function(){
                            var my_id=$("#user_email").val();
                            $("#mycompanies").click(function(){
                                $.post("Huduma_WhiteBox/innovator/innovation/detailscompany.php",{my_id:my_id},function(data){
                                    $(".companypages").hide();
                                    $("#companydisplay").html(data).show();
                                    $(".btns_comp").show();
                                      $("#mycompanies").hide();

                                });
                            })
                             $("#mycompaniesback").click(function(){
                               
                                    $(".companypages").hide();
                                    $("#formbs").show();
                                    $(".btns_comp").show();
                                     $("#mycompaniesback").hide();
                               
                            });
                    	    var loader=$("#loader").html();
                        $("#Submit_data").click(function(){
                        	var company_name=$("#company_name").val()
					var registration_no=$("#company_registration_no").val();
					var kra_pin=$("#kra_pin").val();
					var company_type=$("#company_type").val()
					if(company_name && registration_no && kra_pin && company_type){
						$("#div_companyerror").html("Sending.."+loader).css("color","black");
						
						var formData = new FormData($("#commentForm")[0]);
    $.ajax({
        url : 'Huduma_WhiteBox/innovator/innovation/save_company.php',
        method : 'POST',
        data : formData,
        contentType : false,
        cache : false,
        processData : false,
        success : function (response){
            var responsed=atob(response)
            if(responsed=="success"){
	$("#div_companyerror").html("").css("color","black");
	
               $("#home_display").hide().html("");
  $(".dashboard_holder").show(); 
  $("#content_divesr").html("dashboard_holder");
  //$("#dashpdrt").html("Welcom "+fname);
  $('html, body').animate({scrollTop: '0px'}, 300);  
            }else{
              $("#div_companyerror").html(responsed).css("color","red");  
            }
        }
    })
						
						
						
					}else{
                    $("#div_companyerror").html("Fields Required!").css("color","red");
					}
                        })
                    	})
                    </script>