     <div id="company_data" class="">
           <form id="commentForm" action="" method="POST" enctype="multipart/form-data" class="form-horizontal col-md-12 bv-form no_padding" novalidate="novalidate">
                                <!-- progressbar -->

                                    <div class="col-md-12">&nbsp;</div>
                                <ul class="nav nav-pills">
                                    <li class="active bv-tab-error"><a href="#tab1" data-toggle="tab" aria-expanded="true">Please Provide your Company Details</a></li>
                                </ul>

                                <div class="tab-content">
                                    <!-- TAB 1 START  -->
                                    <div class="col-md-12">
                                        <h2 class="">Enter your company/organization details:&nbsp;</h2>
                                        <div class="form-group has-error">
                                            <label for="company_name" class="col-sm-3 compmay_dfiels control-label">Company
                                                Name *</label>
                                            <div class="col-sm-9">
                                                <input id="company_name" name="company_name" type="text" placeholder="Company Name" class="form-control required" required="" data-bv-field="company_name">

                                                
                                            <small style="" class="help-block" data-bv-validator="notEmpty" data-bv-for="company_name" data-bv-result="INVALID">This field is required</small></div>
                                        </div>

                                        <div class="form-group has-error">
                                            <label for="registered_name" class="col-sm-3 control-label">Company
                                                Registration Number
                                                *</label>
                                            <div class="col-sm-9">
                                                <input id="company_registration_no" name="company_registration_no" type="text" placeholder="Company Registration Number" class="compmay_dfiels form-control required" required="" data-bv-field="company_registration_no">

                                                
                                            <small style="" class="help-block" data-bv-validator="notEmpty" data-bv-for="company_registration_no" data-bv-result="INVALID">This field is required</small></div>
                                        </div>


                                        <div class="form-group has-error">
                                            <label for="kra_pin" class="col-sm-3 control-label">KRA PIN *</label>
                                            <div class="col-sm-9">
                                                <input id="kra_pin" name="kra_pin" type="text" class="compmay_dfiels form-control required" placeholder="KRA PIN" required="" data-bv-field="kra_pin">

                                                
                                            <small style="" class="help-block" data-bv-validator="notEmpty" data-bv-for="kra_pin" data-bv-result="INVALID">This field is required</small></div>
                                        </div>


                                        <div class="form-group has-error">
                                            <label for="company_type" class="col-sm-3 control-label">What is your
                                                company type? Please select: *</label>
                                            <div class="col-sm-9">
                                                <select class="form-control compmay_dfiels" title="Select your company type..." name="company_type" required="" data-bv-field="company_type" id="company_type">
                                                    <option></option>
                                                    <option>Sole Proprietorship</option>
                                                    <option>Limited Company</option>
                                                    <option>Partnership</option>
                                                    <option>Limited Liability partnership</option>
                                                    <option>Other</option>
                                                </select>
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