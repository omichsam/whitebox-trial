<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$innovation=$_POST['innovation'];

 // $loginuser=base64_decode($_SESSION["username"]);

 // id
$today=time();
  $research="";
     $Innovation_Id="";
     $solution="";
     $sector="";
     $need="";
     $maturity="";
     $beneficiaries="";
     $success_indicators="";
     $implementation_plan="";
     $innovator_Identity="";
    $collaborations="";
$relevancy="";


$sqlx="SELECT * FROM covid19_innovations where id='$innovation'";

    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
    
     $Innovation_Id=$row['id'];
     $solution=$row['solution'];
     $sector=$row['sector'];
     $need=$row['need'];
     $maturity=$row['maturity'];
     $beneficiaries=$row['beneficiaries'];
     $success_indicators=$row['success_indicators'];
     $implementation_plan=$row['implementation_plan'];
     $innovator_Identity=$row['innovator_Identity'];
    $collaborations=$row['collaborations'];
$relevancy=$row['relevancy'];
 }

?>


                                      <table class="table table-responsive table-striped col-md-12 table-bordered" width="100%">
                                        <thead>
                                          <tr><th>Field Name</th><th>Your description <span style="float: right;" class="btn_closedr btn theme_bg">Close</span></th></tr></thead>

                                          <tbody>
                               <!--
                                <tr><td>Innovation Name </td><td id="innovation_displayer"><?php echo $Innovation_name?></td></tr>
                                    <tr><td>Submitting as </td><td id="innovator_poselector"><?php echo $innovator_type?></td></tr>
                                     <tr class="company_data not_shown "><td>Company Name </td><td id="company_d"></td></tr>
                                    <tr class="company_files not_shown"><td>Company Registration no. </td><td id="company_nreg"></td></tr>
                                    <tr class="company_files not_shown"><td>KRA Pin </td><td id="kra_pinhold"></td></tr>
                                    <tr class="company_files not_shown"><td>Company Type </td><td id="company_typenh"></td></tr>-->
                              <tr><td>Problem Identified </td><td id="sectord"><?php echo $need?></td></tr>
                            <tr><td>Solution Provided</td><td id="InnovationBig4Sectords"><?php echo $solution?></td></tr>
                          <tr><td>Innovation sector</td><td id="ptProblemidentified"><?php echo $sector?></td></tr>
                          <tr><td>Maturity level </td><td id="ptProblemSolution"><?php echo $maturity?></td></tr>
                          <tr><td>Beneficiaries</td><td id="ptCommercialModel"><?php echo $beneficiaries?></td></tr>
                      
                          <tr><td>Implimentation plan</td><td id="ptFeasibility"><?php echo $implementation_plan?></td></tr>

                                    <tr><td>Success indicators</td><td id="innovation_led"><?php echo $success_indicators?></td></tr>
                          <tr><td>Innovator category</td><td id="ptHowItWorks"><?php echo $innovator_Identity?></td></tr>
                          <tr><td>Collaboration type</td><td id="interlectualfr"><?php echo $collaborations?></td></tr>
                          <tr><td>Relevance</td><td id="InnovationWebsitedf"><?php echo $relevancy?></td></tr>
                          
                                     </tbody>
                                     </table>
<script type="text/javascript">
	$(document).ready(function(){
		var innovation='<?php echo $innovation?>';
		  $(".btn_closedr").click(function(){
        var my_url="modules/system/clerk/pages/covid/evaluate.php";
$.post(""+my_url+"",{innovation:innovation},function(data){
        $("#home").html(data);})
  })
	})
</script>