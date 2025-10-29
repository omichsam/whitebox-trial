 <style type="text/css">
     .check_mentors{
        opacity: 1 !important;
     }
 </style>
<?php
include("connect.php");
?>

  <div class="row not_shown parentsd investor_pages">
    <div class="col-md-2"></div>
        <div class="panel panel-default animation flipInX col-md-8  ">
            <div class="panel-header">
                 <h3 class=" border-primary text-center "><span class="heading_border bg-primary">Investors Request</span>
                <!-- <h2 class="text-primary "><strong>Investors Request</strong></h2> -->
            </h3></div>
            <div class="panel-body">
                <!--   -->
                <!-- Notifications -->
                <div id="notific">
                                    </div>
                <div class="row justify-content-center ">
                    <form action="" method="POST" id="investors">
                        <!-- CSRF Token -->
                        <input type="hidden" name="_token" value="oRxLkGOXFwuS1ihaiDX7yUhevbZxBhTslFzZaQnQ">

                        <div class="row ">
                            <div class="col-md-12 col-sm-12 col-xs-12 ">
                                <p class="text-center">The Huduma 
                                    WhiteBox Platform receives, evaluates and facilitates growth of Kenyan 
                                    Innovations, which we evaluate and scale as per their requirements.</p>
                                <!-- <p>By creating an account with us, you accepts the terms and services.</p> -->
                                <p class="text-center">If you would like
                                    to invest in any of the top innovations evaluated, kindly create an 
                                    account with us to view the viable solutions.</p>

                            </div>
                        </div>

                        <div class=" row">
                            <div class="form-group col-md-6 col-sm-6 col-lg-6 col-xs-12 ">
                                <label for="investorName">Investor Name:</label><span style="color: red;">*</span>
                                <input class="form-control required" placeholder="Full Name" required="" name="investorName" type="text" id="investorName">
                                
                            </div>
                             <div class="form-group col-md-6 col-sm-6 col-lg-6 col-xs-12 ">
                                <label for="Title">Title:</label><span style="color: red;">*</span>
                                <input class="form-control required" placeholder="Mr/Mrs/Miss/Dr/Prof/Eng" required="" name="Title" type="text" id="head_tt">
                                
                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-lg-6 col-xs-12 ">
                                <label for="email">Email Address:</label><span style="color: red;">*</span>
                                <input class="form-control required" placeholder="e.g username@example.com" required="" name="email" type="email" id="email" maxlength="50">
                                
                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-lg-6 col-xs-12 ">
                                <label for="PhoneNumber">Phone Number:</label><span style="color: red;">*</span>
                                <input class="form-control required" placeholder="e.g 0712345678 or +254712345678" required="" name="PhoneNumber" maxlength="13" type="text" id="PhoneNumber">
                                
                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-lg-6 col-xs-12 ">
                                <label for="CompanyName">Company Name:</label><span style="color: red;">*</span>
                                <input class="form-control required" placeholder="Company Name" required="" name="CompanyName" type="text" id="CompanyName">
                                
                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-lg-6 col-xs-12 ">
                                <label for="Company_type">Company Type</label><span style="color: red;">*</span>

                                <select class="form-control" id="company_types" title="Company Type" name="Company_type" required="">
                                    <option></option>
                                    <option>Sole Proprietorship</option>
                                    <option>Public Parastatal</option>
                                    <option>Limited Company</option>
                                    <option>Partnership</option>
                                    <option>Limited Liability  Partnership</option>
                                    <option>Other</option>
                                </select>

                                <span class="help-block"></span> 
                            </div> 
                        </div>
                        <div class="row">
                              <div class="form-group col-md-6 col-sm-6 col-lg-6 col-xs-12 ">
                                <label for="country">Country of Origin</label><span style="color: red;">*</span>
                                <select class="form-control select2" id="countries" name="country">
                                 
                             <option></option>
                                      <?php 
                                    $sql="SELECT * FROM countries";
                                        $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

                                        while($row=mysqli_fetch_array($query_run)){
                                               $country_name=$row['name'];
                                                ?>

                                    <option><?php echo $country_name ?></option>
                                    <?php
                                    }


                                    ?>
                                </select>
                                
                            </div>
                                                                 
                            <div class="form-group col-md-6 col-sm-6 col-lg-6 col-xs-12 ">
                                <label for="sector_id">Sector you would like to invest in:</label><span style="color: red;">*</span>
                                <select class="form-control required" required="" id="sector_id" name="sector_id">

                                  <option></option>

                                                   <?php 
                                                $sql="SELECT * FROM sectors";
                                                    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con,));

                                                    while($row=mysqli_fetch_array($query_run)){
                                                           $sector_name=$row['name'];
                                                            ?>

                                                <option><?php echo $sector_name ?></option>
                                                <?php
                                                }


                                                ?>
                                </select>
                                
                            </div>
                        </div>
                        <!-- <div class="ribbon"></div> -->
                        <div class="row">

                            <div class="form-groupcol-md-6 col-sm-6 col-lg-6 col-xs-12">
                                <label for="investor_type">Investor Type</label>  <span style="color: red;">*</span>
                                <select class="form-control required" required="" id="investor_type" name="investor_type">

                               <option></option>
                               <option>Patner</option>
                               <option>Investor/Venture Capitalist</option>
                               <option>Investor/Angel Investor</option>
                               <option>Investor/Peer-to-Peer lender</option>
                               <option>Investor/Personal Investor</option>
                               <option>Investor/Bank</option></select>
                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                <label for="HearAboutUs">How did you hear about Huduma WhiteBox?</label>
                                <span style="color: red;">*</span>
                                <select class="form-control required" required="" id="HearAboutUs" name="HearAboutUs">
                                    <option></option>
                                    <option>Internet</option>
                                    <option>Newspaper</option>
                                    <option>Radio</option>
                                    <option>Another Investor</option>
                                    <option>Flyer</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-lg-6 col-xs-12">
                                <label for="mentor">Would you like to mentor innovators at Huduma WhiteBox?</label>
                                <br>
                                <label class="radio-inline">
                                    <input checked="checked" name="mentor" type="radio" value="Yes" class="check_mentors" id="mentora"> Yes
                                </label>
                                <label class="radio-inline">
                                    <input name="mentor" type="radio" value="No" class="check_mentors" id="mentorb"> No
                                </label>
                            </div>


<!-- <div class="form-group col-md-6 col-sm-6 col-lg-6 col-xs-12">
<label for="HearAboutUs">How did you hear about HudumaWhiteBox?</label>
<span style="color: red;">*</span>
<select class="form-control required" required id="HearAboutUs" name="HearAboutUs"><option selected="selected" value="">Newspaper</option><option value="Internet">Internet</option><option value="Local ad">Local ad</option><option value="Newspaper">Newspaper</option><option value="Radio">Radio</option><option value="Another Investor">Another Investor</option><option value="Flyer">Flyer</option></select>
</div> -->
</div>
<div>
    <span class="btn btn-block btn-primary" id="submit_investor">Submit</span>
</div>

<!-- <button type="submit" class="btn btn-block btn-primary">Sign Up</button> -->
<!-- <input type="submit" class="btn btn-block btn-primary" name="SubmitButton" > -->


</form>
<div class="col-md-12" style="text-align: center;" id="add_investorerror"></div>
</div>


</div>
<!-- <div class="panel-footer text-center">
    <hr>
    <div>Already have an account? Please <a href="https://www.whitebox.go.ke/main_login"> Log In</a></div>

</div> -->

</div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
    var loader=$("#loader").html();
    $("#submit_investor").click(function(){
//alert()
var investorName=$("#investorName").val();
var head_tt=$("#head_tt").val();
var email=$("#email").val();
var PhoneNumber=$("#PhoneNumber").val();
var CompanyName=$("#CompanyName").val();
var company_types=$("#company_types").val();
var countries=$("#countries").val();
var sector_id=$("#sector_id").val();
var investor_type=$("#investor_type").val();
var HearAboutUs=$("#HearAboutUs").val();
var mentor="";
if($("#mentora").prop("checked")){
mentor="checked";
}else if($("#mentorb").prop("checked")){
mentor="checked";
}else{
mentor="";
}
if(investorName && head_tt && email && PhoneNumber && CompanyName && company_types && countries && sector_id && investor_type && HearAboutUs && mentor){
$("#add_investorerror").html("Sending, kindly wait.. "+loader).css("color","black")
var formData = new FormData($("#investors")[0]);
    $.ajax({
        url : 'save_d.php',
        method : 'POST',
        data : formData,
        contentType : false,
        cache : false,
        processData : false,
        success : function (response){
            var responsed=atob(response)
            if(responsed=="success"){
             $("#add_investorerror").html("Details successfully added ").css("color","black")
            }else{
             $("#add_investorerror").html("").css("color","red")   
            }
        }
    })




}else{
$("#add_investorerror").html("All fields required!").css("color","red")
}
       // alert()
    })
})
</script>