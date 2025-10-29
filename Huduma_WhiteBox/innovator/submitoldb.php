<?php
include("../../base_connect.php");
include("../../connect.php");
  $loginuser=base64_decode($_SESSION["username"]);
if($loginuser){

}else{
    $loginuser=base64_decode($_POST['my_id']);
}
//echo $loginuser;
//echo "<script type='text/javascript'>alert('$loginuser');</script>";
 // id
$today=time();
if($loginuser){


$get_user=mysqli_query($con,"SELECT * FROM users WHERE email='$loginuser'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$first_name=$get['first_name'];
$user_id=$get['id'];
$last_name=$get['last_name'];
}
       //$new_status="6b7336564f3937355236464b693953304e50714a36716f365858447669562b383932635950796863436b413d";
       //$new_status=encrypt($status, $key);
$company_class="hidden";
$documenth="";
$older_ppt="";
$ppta="";
$sho_ppt="";
$show_nbpart="not_shown";
$orignald_data="";
$orignal_data="not_shown";
$newbig_sectorshow="not_shown";
 $companyshown="not_shown";
 $new_sectorshow="not_shown";
 $solution="";
 $targeted="";
 $mycompany_id="";
     $impact="";
     $need="";
     $originality="";
      $busines_model="";
     $target="";
     $requirements="";
     $attachments="";
     $individual_check="checked";
     $company_check="";
     $ip_check="";
     $terms_check="";
      $Innovation_Id="";
     $solution="";
     $impact="";
     $need="";
     $busines_model="";
     $property_attachement="";
     $accepts_terms_1="";
    $intellectual_protection="";


     $Innovation_name="";
     $sector_id="";
     $InnovationBig4Sector="";
     $innovator_type="";

       $originality_explanation="";
     $Research_sources="";
    
$research="";
     //$stage="";
     $intellectual_protection="";
      $newsector="";
  $bg4id_name="";
  $innovation_levelshow="not_shown";
  $InnovationLevel="";
  $useful_links="";
//$my_userde=encrypt($my_user,$key);
//echo base64_encode($new_status;
 $implementors="";
 $patner="";
 $fund="";
 $acquisition_d="";
 $commun="";
 $statement="";
 $statepart="";
 $statecommn="";
 $statefund="";
 $stateimple="";
 $checked_implementers="";
$checked_acquisition="";
$checked_funding="";
$checked_ipartners="";
$checked_others="";
$show_others="not_shown";
$cheinnovations=mysqli_query($con,"SELECT * FROM innovations_table WHERE user_id='$user_id' and Status='pending'") or die(mysqli_error($con));

  if(mysqli_num_rows($cheinnovations)>0){

$sqlx="SELECT * FROM innovations_table where user_id='$user_id' and Status='pending'";

    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
     $research=$row['research'];
     $Innovation_Id=$row['Innovation_Id'];
     $solution=$row['solution'];
     $impact=$row['impact'];
     $need=$row['need'];
     $busines_model=$row['busines_model'];
     $target=$row['target'];
     $requirements=$row['requirements'];
     $attachments=$row['attachments'];
     $accepts_terms_1=$row['accepts_terms_1'];
    $intellectual_protection=$row['intellectual_protection'];
$originality=$row['originality'];
     $company_id=$row['company_id'];
     $Innovation_name=$row['Innovation_name'];
     $sector_id=$row['sector_id'];
     $InnovationBig4Sector=$row['InnovationBig4Sector'];
     $innovator_type=$row['innovator_type'];

       $originality_explanation=$row['originality_explanation'];
     $property_attachement=$row['property_attachement'];
     $Research_sources=$row['Research_sources'];
  $InnovationLevel=$row['stage'];
     $accepts_terms_2=$row['accepts_terms_2'];
     //$stage=$row['stage'];
     $intellectual_protection=$row['intellectual_protection'];
     $useful_links=$row['useful_links'];
 }
$orignal_data="not_shown";
$orignald_data="";
if($originality){
$orignal_data="";
$orignald_data=$originality_explanation;
$origdata=$originality;
}else{
$origdata="";
$orignal_data="not_shown";
}
 $sho_ppt="not_shown";
    $ppta="";
     $older_ppt="";
if($property_attachement){
    $sho_ppt="";
    $ppta="Yes";
    $older_ppt="protection_document.pdf";
}else{
    $sho_ppt="not_shown";
    $ppta="No";
    $older_ppt="";
}

$sqlxW="SELECT * FROM innovation_expectation where Innovation_id='$Innovation_Id'";
    $query_runxW=mysqli_query($con,$sqlxW) or die($query_runxW."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runxW)){
  $petnership_implementors=$row['petnership_implementors'];
  $patnership_innovators=$row['patnership_innovators'];
   $funding=$row['funding'];
    $communities=$row['communities'];
    $acquisition=$row['acquisition'];
    if($petnership_implementors){
     $implementors=$petnership_implementors; 

 $checked_implementers="checked";
    }else{
        
    }
       if($acquisition){
     $acquisition_d=$acquisition;   
$checked_acquisition="checked";
    }else{
        
    }
     if($funding){
     $fund=$funding;   
$checked_funding="checked";
    }else{
        
    }
     if($communities){
     $commun=$communities;  
$checked_others="checked"; 
$show_others="";
    }else{
        
    }
     if($patnership_innovators){
     $patner=$patnership_innovators;
$checked_ipartners="checked";  
    }else{
        
    }
    
     if($acquisition_d){
      $setacquisition=" . ";
   }else{
       
   }
 
   if($implementors){
      $stateimple=" . ";
   }else{
       
   }
   if($fund){
      $statefund=" . ";
   }else{
       
   }
   if($commun){
      $statecommn=" . ";
   }else{
       
   }
    if($patner){
      $statepart=" . ";
   }else{
       
   }
    }
   
if($InnovationLevel){
$innovation_levelshow="";
}else{
$innovation_levelshow="not_shown";
}
 $company_name="";
 $get_bigfoursectors=mysqli_query($con,"SELECT company_name FROM company WHERE id='$company_id'") or die(mysqli_error($con));
$getbigid=mysqli_fetch_assoc($get_bigfoursectors);

 $company_name=isset($getbigid['company_name']);
if($company_name){
$mycompany_id=$company_name;
}else{
    $mycompany_id="";
}



 $company_class="hidden";
 $companyshown="not_shown";
 if($innovator_type=="Individual"){
$individual_check="checked";
$company_class="hidden";
  $company_check=""; 
   $companyshown="not_shown";    
 }else{
    $company_class="";
    $individual_check="";
   $company_check="checked"; 
    $companyshown="not_shown";
 }

if($intellectual_protection){
$ip_check="checked";
}else{
$ip_check="";
}

if($accepts_terms_1){
 $terms_check="checked";
}else{
 $terms_check="";
}

$get_sector=mysqli_query($con,"SELECT name FROM sectors WHERE id='$sector_id'") or die(mysqli_error($con));
$getid=mysqli_fetch_assoc($get_sector);

 $newsector=$getid['name'];
 $get_bigfoursectors=mysqli_query($con,"SELECT Name FROM bigfoursectors WHERE id='$InnovationBig4Sector'") or die(mysqli_error($con));
$getbigid=mysqli_fetch_assoc($get_bigfoursectors);

 $bg4id_name=$getbigid['Name'];

$newbig_sectorshow="not_shown";
if($bg4id_name){
$newbig_sectorshow="";
}else{
$newbig_sectorshow="not_shown";
}

$new_sectorshow="not_shown";
if($newsector){
$new_sectorshow="";
}else{
$new_sectorshow="not_shown";
}
  
if($intellectual_protection && $accepts_terms_1){

if($Innovation_name &&  $sector_id && $InnovationBig4Sector && $innovator_type){

if($solution && $impact && $need){


     //$requirements=$row['requirements'];
if($busines_model && $target && $requirements){

    if($busines_model && $requirements){


    
if($fund || $commun || $implementors || $patner || $acquisition_d){

if($accepts_terms_2){
    $page_now="first_page";
}else{
$page_now="sixth_page";
}

}else{
    $page_now="fifth_page";
}

}else{
    $page_now="fifth_page";
}

}else{
$page_now="fourth_page";
}



}else{
$page_now="third_page";
}
}else{
  $page_now="second_page";  
}
    
}else{
  $page_now="first_page";  
}


}else{
    
$page_now="first_page";   
}
$havepatners="";
$show_nbpart="not_shown";
$shownumbers="not_shown";
$howmany=0;
$sqlx="SELECT * FROM innovators_partners where Innovation_Id='$Innovation_Id'";

                                    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

                                    while($row=mysqli_fetch_array($query_runx)){
                                        $howmany=$howmany+1;
                                    }
                                    if($howmany>=1){
                                    $show_nbpart="";
                                  $havepatners="Yes";
                                  $shownumbers="";
                                    }else{
                                   if($howmany){
                                  $howmany="";
                                 $havepatners="No";
                                   }else{
                                $howmany="";
                                 $havepatners="";
                                   }
 
                                 $show_nbpart="not_shown";
                                 $shownumbers="not_shown";


                                    }
$show_propertyd="not_shown";
  $have_property="No";                                  
if($property_attachement){
 $have_property="Yes"; 
 $show_propertyd="";
}else{
     $have_property="No"; 
     $show_propertyd="not_shown";

}
$showdocs="not_shown";
$documenth="";
if($attachments){
$documenth="supporting_document.pdf";
$showdocs="";
}else{
$documenth="";
$showdocs="not_shown";
}

$show_links="not_shown";
if($useful_links){
    $show_links="";

}else{
    $show_links="not_shown";
}
$showredt="not_shown";
if($research){
$showredt="";
}else{
$showredt="not_shown";
}





?>

<style type="text/css">
    .splashinputs{
  width: 100%;
padding: 6px;
border: none;
border: 1px solid #ccc;
margin-bottom: 4px;
color: #6a8d96;

}
    #canva_holder{
        min-height: 700px;
         background-size: cover;
         background-repeat: no-repeat !important;
         background:url('canvas.jpg');
    }
</style>

    
    <!--section ends-->
    <section class=" col-md-12 no_padding paddingleft_right15">
        <div class="row no_padding">
            <div class="col-md-12 no_padding">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                       <h3 class="panel-title">
                            Submit an Innovation
                        </h3>
                        <!--<h3 class="panel-title">
                            <i class="livicon" data-name="plus" data-size="16" data-loop="true" data-c="#fff" data-hc="white" id="livicon-11" style="width: 16px; height: 16px !important;"></i> Submit an Innovation
                        </h3>-->
                    </div>

                    
                    <div class="panel-body not_shown no_padding pagesbbcg" id="innovation_businessmodess"></div>

                    <div class="panel-body not_shown pagesbbcg" id="innovation_stages"></div>
                    <div class="panel-body pagesbbcg" id="innovation_forms" style="text-align: left; font-size: 16px;">
                        <div id="notific">
                                                    </div>
                        <form id="commentForm" action="" method="POST" enctype="multipart/form-data" class="form-horizontal bv-form" novalidate="novalidate">
                         
                            <input type="hidden" name="token_bd" value="<?php echo $_POST['my_id']?>">
                            <!--<button type="submit" class="bv-hidden-submit" style="display: none; width: 0px; height: 0px;" disabled="disabled"></button>
                           
                            <input type="hidden" name="_token" value="lajdSKpWUrbaQSHsFNIa1Dqjt03qonu2i5njv8EL">
                            
                            <input type="hidden" name="basicinformation_id" id="basicinformation_id" value="0">
                           
                            <input type="hidden" name="submission_stage" id="submission_stage" value="1">
                            <input type="hidden" name="editing" id="editing" value="false">-->
                            <div id="rootwizard">
                                <ul class="nav nav-pills">
                                    <li class="">
                                        <a href="#tab1" data-toggle="tab" class="tabs" style="color: #337ab7 !Important;background-color: #fff !Important;" id="tabs1" class="">1. Terms and Conditions</a>
                                    </li>
                                    <li>
                                        <a href="#tab2" data-toggle="tab" class="tabs" id="tabs2">2. Basic Innovation Details</a>
                                    </li>
                                    <li>
                                        <a href="#tab3" data-toggle="tab" class="tabs" id="tabs3">3. Additional Information</a>
                                    </li>
                                    <li>
                                        <a href="#tab4" data-toggle="tab" class="tabs" id="tabs4">4. More Details</a>
                                    </li>
                                     <li>
                                        <a href="#tab5" data-toggle="tab" class="tabs" id="tabs5">5. Attachments</a>
                                    </li>
                                    <li>
                                        <a href="#tab6" data-toggle="tab" class="tabs" id="tabs6">6. Submission</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="tab1">
                                        <div class="col-sm-8">
                                            <h2 class="hidden">&nbsp;</h2>
                                            <div class="form-group col-sm-12 has-error">
                                                <h3>Terms and Conditions</h3>
                                                <label>
                                                    <div class="form-group col-sm-12 terms_modal">

                                                        <div class="copy">
                                                            <label style="text-align: justify;">
                                                                <p>The Participants agree that by submitting their idea,
                                                                    innovation or product to the Whitebox Facility they
                                                                    agree
                                                                    to the following terms and conditions which
                                                                    constitute a
                                                                    legally binding agreement between the Government and
                                                                    the Participants.Further,the Participants in
                                                                    registering
                                                                    with the facility confirm that they have read and
                                                                    fully understood
                                                                    and accepted these terms and conditions:</p>
                                                            </label>
                                                            <div style="text-align: justify; ">
                                                                <ol>
                                                                    <li>
                                                                        The Government is under no obligation to take up
                                                                        the idea, innovation or the product or apply it
                                                                        in any manner whatsoever;

                                                                    </li>
                                                                    <li>
                                                                        The Government is not responsible for the
                                                                        protection of the intellectual property rights
                                                                        for the idea, innovation or the
                                                                        product and neither does it guarantee any such
                                                                        protection
                                                                        within the Whitebox Facility. The Participants
                                                                        are advised to
                                                                        follow through with the appropriate Government
                                                                        bodies for the
                                                                        protection of their intellectual property
                                                                        rights.

                                                                    </li>
                                                                    <li>
                                                                        The Participants agree that they are voluntarily
                                                                        entering in the
                                                                        Whitebox
                                                                        Facility and fully understand its mode of
                                                                        operation. Their
                                                                        engagement with
                                                                        the Government and its partners is not
                                                                        compulsory and they can
                                                                        choose to opt
                                                                        out at any given time.
                                                                    </li>
                                                                    <li>
                                                                        The Participants acknowledge that the Whitebox
                                                                        Facility is not
                                                                        responsible
                                                                        for any contracts that the Participants may
                                                                        enter with any of
                                                                        the Facility’s
                                                                        partners. Any such contractual engagements or
                                                                        dealings are
                                                                        willingly entered
                                                                        by the Participants and they do not create any
                                                                        privity with the
                                                                        Government.

                                                                    </li>
                                                                    <li>
                                                                        The Participants fully understand the objectives
                                                                        of Whitebox Facility and as such the
                                                                        Participants have without
                                                                        any inducement or coercion submitted their
                                                                        ideas, innovations and
                                                                        products to the Facility and this participation
                                                                        does not create
                                                                        any binding legal obligations with the
                                                                        Government.
                                                                    </li>
                                                                </ol>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </label>

                                                <!-- Terms And Conditions Field -->
                                                <label class="checkbox-inline">
                                                    <input required="" <?php echo $terms_check?> id="terms_and_conditions" name="terms_and_conditions" type="checkbox" value="Yes" data-bv-field="terms_and_conditions">
                                                    I accept the Terms and Conditions <span style="color: red;">*</span>
                                                </label>
                                            <small style="" class="help-block" data-bv-validator="notEmpty" data-bv-for="terms_and_conditions" data-bv-result="INVALID"></small></div>
                                            <div class="form-group col-sm-12 has-error">
                                                <!--  Field -->
                                                <label class="checkbox-inline">
                                                    <input required="" <?php echo $ip_check?> name="ip" type="checkbox" id="ip_protect" value="Yes" data-bv-field="ip">
                                                    I have read and understood information on
                                                    <a href="http://www.kipi.go.ke/index.php/patents" target="_blank" style="color: darkblue; font-weight: bold; font-style: italic;">
                                                        <u >Intellectual Property (IP)</u>
                                                    </a> protection.
                                                    <span style="color: red;">*</span>
                                                </label>
                                            <small style="" class="help-block" data-bv-validator="notEmpty" data-bv-for="ip" data-bv-result="INVALID">You must agree that you have read and understood information on IP protection.</small></div>
                                            <div class="form-group col-sm-12">
                                                <label>
                                                    <i>
                                                        (If you have not protected your IP please contact
                                                        <a href="http://www.kipi.go.ke/" target="_blank" style="color: darkblue; font-weight: bold; font-style: italic;">
                                                            <u>Kenya Industrial Property Institute(KIPI)</u>
                                                        </a>) to get advice on the same.
                                                    </i>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 tips">
                                            <h3 style="text-align: center;"> Disclaimer:</h3>
                                            <ol>
                                                <li>-&gt;Terms and Conditions act as a legally binding
                                                    contract between you and us.
                                                </li>
                                                <li>-&gt; Kindly note, 
if your innovation is not protected we will not be liable for copyright 
infringement subject to your submission to WhiteBox.
                                                
                                                </li>

                                            </ol>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="tab2">
                                        <h2 class="hidden">&nbsp;</h2>
                                        <div class="col-sm-8">
                                            <div class="form-group col-sm-12 ">
                                                <label for="innovationName">Innovation Name:</label><span style="color: red;">*</span>
                                                <input class="form-control required" placeholder="E.g. Pamoja kenya app" required="" name="innovationName" type="text" id="innovationName" value="<?php echo $Innovation_name?>" data-bv-field="innovationName">
                                                
                                            <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="innovationName" data-bv-result="NOT_VALIDATED">Innovation name is required and must be at least 2 chars.</small></div>
                                            <!--innovator type-->

                                            <div class="form-group col-sm-12 ">
                                                <label for="innovator_type">Select if you are an Individual or Company:</label>
                                                <span style="color: red;">*</span>
                                                <br>
                                                <label class="radio-inline">
                                                    <input <?php echo $individual_check?> class="innovator_type" name="innovator_type" type="radio" value="Individual" id="innovator_type">
                                                    Individual
                                                </label>
                                                <label class="radio-inline">
                                                    <input name="innovator_type" <?php echo $company_check?> class="innovator_type" type="radio" value="Company" id="">
                                                    Company
                                                </label>


                                                <!--select company or add-->
                                            </div>
                                            <div class="form-group col-sm-12 ">
                                                <div id="displayCompany" class="<?php echo $company_class?>">
                                                    <label for="company_id">Company:</label><span style="color: red;">*</span>(if the company your are
                                                    applying for doesn't appear in the list, proceed to add it)

                                                    <select class="form-control required" required="" id="company_id" name="company_id" data-bv-field="company_id">
                                                 <option class="<?php echo $companyshown?>"><?php echo $mycompany_id?></option>
                                                <option></option>
                                                  <?php 
                                                $sql="SELECT * FROM company";
                                                    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

                                                    while($row=mysqli_fetch_array($query_run)){
                                                           $company_name=$row['company_name'];
                                                            ?>

                                                <option><?php echo $company_name ?></option>
                                                <?php
                                                }


                                                ?>
                                                 </select>
                                                    
                                                    <br>
                                                    OR:
                                                    <a id="add_newcompany" class="btn btn-primary" style="color: #fff;">
                                                        <i class="livicon" data-name="plus" data-size="18" data-c="#fff" data-hc="#fff" data-loop="true" id="livicon-12" style="width: 18px; height: 18px;"></i>
                                                         Add a New Company &gt;&gt;
                                                    </a>

                                                </div>

                            <div id="company_data" class="hidden">
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


                                        <div class="form-group col-sm-12" style="color: #fff;">

                                             <span class="btn btn-danger" id="close_company" >Close</span>
                                        </div>

                                    </div>
                                </div>
                        
                    </div>



</div>


























                                            

                                            <!-- Sector Id Field -->
                                            <div class="form-group col-sm-12 ">
                                                <label for="sector_id">Sector:</label><span style="color: red;">*</span>
                                                <select class="form-control required" required="" id="sector_id" name="sector_id" data-bv-field="sector_id">

                                                    <option class="<?php echo $new_sectorshow?>"><?php echo $newsector?></option>
                                                    <option style="color:red; font-weight: bold;">COVID-19 pandemic</option>

                                                   <?php 
                                                $sql="SELECT * FROM sectors where name!='COVID-19 pandemic'";
                                                    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

                                                    while($row=mysqli_fetch_array($query_run)){
                                                           $sector_name=$row['name'];
                                                            ?>

                                                <option><?php echo $sector_name ?></option>
                                                <?php
                                                }


                                                ?>
                                                </select>
                                                
                                            <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="sector_id" data-bv-result="NOT_VALIDATED">This field is required</small></div>

                                            <!-- Big4Sectors Field -->
                                            <div class="form-group col-sm-12">
                                                <label for="InnovationBig4Sector">Big 4 Agenda Sector of your Innovation:</label>
                                                <span style="color: red;">*</span>
                                                <select class="form-control required" required="" id="InnovationBig4Sector" name="InnovationBig4Sector" data-bv-field="InnovationBig4Sector">
                                                    <option class="<?php echo $newbig_sectorshow?>"><?php echo $bg4id_name?></option>
                                                <option></option>

                                                   <?php 
                                                $sql="SELECT * FROM bigfoursectors";
                                                    $query_run=mysqli_query($con,$sql) or die($query_run."<br/><br/>".mysqli_error($con));

                                                    while($row=mysqli_fetch_array($query_run)){
                                                           $bg4sector_name=$row['Name'];
                                                            ?>

                                                <option><?php echo $bg4sector_name ?></option>
                                                <?php
                                                }


                                                ?>
                                                </select>
                                            <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="InnovationBig4Sector" data-bv-result="NOT_VALIDATED">This field is required</small></div>

                                            <!-- Innovationlevel Field -->
                                           <!-- <div class="form-group col-sm-12">
                                                <label for="InnovationLevel">Innovation Level:</label><span style="color: red;">*</span>
                                                <ul style="margin-left: 20px;">
                                                    <li>Ideation -&gt; Just an idea</li>
                                                    <li>Incubation -&gt; Under implementation</li>
                                                    
                                                    <li>Growth -&gt; Already implemented, under expansion</li>
                                                    <li>Scale -&gt; Already implemented, integrating more
                                                        features/services
                                                    </li>
                                                </ul>
                                                <select class="form-control required" required="" id="InnovationLevel" name="InnovationLevel" data-bv-field="InnovationLevel">

                                                    <option></option>
                                                    <option>Ideation</option>
                                                    <option>Incubation</option>
                                                    <option>Growth</option>
                                                    <option>Scale</option>
                                                </select>
                                            <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="InnovationLevel" data-bv-result="NOT_VALIDATED">This field is required</small></div>-->

                                        </div>
                                        <div class="col-sm-4 tips">
                                            <h3>Important Tips:</h3>
                                            <ol>
                                                <li>-&gt; The choice of your innovation name should clearly depict what
                                                    your innovation is all about.
                                                </li>
                                                <li>-&gt; The sector you select should be the one that your innovation
                                                    seeks to bring a solution to.
                                                </li>
                                                <li>-&gt; It is good for you to provide an accurate level of your
                                                    innovation so that we can easily
                                                    determine where to chip in and provide support where possible.
                                                </li>
                                            </ol>
                                        </div>

                                    </div>

                                    <div class="tab-pane" id="tab3">
                                        <h2 class="hidden">&nbsp;</h2>
                                        <div class="col-sm-8">
                                            <!-- Problemsolution Field -->
                                            <div class="form-group col-sm-12 col-lg-12">
                                                <label for="Solution">What Gap/need/problem have you identified?.</label>
                                                <span style="color: red;">*</span> <i>(Maximum
                                                    600 characters)</i>
                                                <textarea class="form-control required" onkeyup="neednupdate(this.value)" id="Problemidentified" placeholder="Tell us the problem you identified, or what idea do you have in details" rows="6" maxlength="600" required="" name="Problemidentified" cols="50" data-bv-field="Problemidentified"><?php echo $need?></textarea>
                                                <label class="counter" id="need_counter" style="float: right;">0/600</label>
                                                <div class="clearfix"></div>
                                            <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="ProblemSolution" data-bv-result="NOT_VALIDATED">This field is required</small><small style="display: none;" class="help-block" data-bv-validator="stringLength" data-bv-for="ProblemSolution" data-bv-result="NOT_VALIDATED">Please enter a value with valid length</small></div>
                                              <!-- solution Field -->
                                            <div class="form-group col-sm-12 col-lg-12">
                                                <label for="Solution">What solution have you developed to address this gap/need/problem?</label>
                                                <span style="color: red;">*</span> <i>(Maximum
                                                    600 characters)</i>
                                                <textarea onkeyup="solutionupdate(this.value)"  class="form-control required" id="ProblemSolution" placeholder="Discribe how you are solving the problem you identified above, tell us how you wish to help, address the problem." rows="6" maxlength="600" required="" name="ProblemSolution" cols="50" data-bv-field="ProblemSolution"><?php echo $solution?></textarea>
                                                <label class="counter" id="solustion_counter" style="float: right;">0/600</label>
                                                <div class="clearfix"></div>
                                            <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="ProblemSolution" data-bv-result="NOT_VALIDATED">This field is required</small><small style="display: none;" class="help-block" data-bv-validator="stringLength" data-bv-for="ProblemSolution" data-bv-result="NOT_VALIDATED">Please enter a value with valid length</small></div>






                                            
                                               <!-- solution Field -->
                                            <div class="form-group col-sm-12 col-lg-12">
                                                <label for="Solution">What is the overall impact of your innovation/solution?</label>
                                                <span style="color: red;">*</span> <i>(Maximum
                                                    600 characters)</i>
                                                <textarea onkeyup="impactupdate(this.value)"  class="form-control required" id="impact" placeholder="Tell us how this idea you have impact when implemented" rows="6" maxlength="600" required="" name="impact" cols="50" data-bv-field="impact"><?php echo $impact?></textarea>
                                                <label class="counter" id="impact_counter" style="float: right;">0/600</label>
                                                <div class="clearfix"></div>
                                            <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="ProblemSolution" data-bv-result="NOT_VALIDATED">This field is required</small><small style="display: none;" class="help-block" data-bv-validator="stringLength" data-bv-for="ProblemSolution" data-bv-result="NOT_VALIDATED">Please enter a value with valid length</small></div>
                                             <!-- solution Field -->
                                            <div class="form-group col-sm-12 col-lg-12">
                                                <label for="Solution">Is this your original idea?</label>
                                               
                                             <select id="idea" name="ideas" class="form-control ">
                                                <option class="<?php echo $orignal_data?>"><?php echo $originality?></option>
                                                <option></option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                          </div>

                     

                                            <div class="form-group col-sm-12 <?php echo $orignal_data?> col-lg-12" id="explanation">
                                                <label for="Solution" id="idea_questions"></label>
                                                <span style="color: red;">*</span> <i>(Maximum
                                                    600 characters)</i>
                                                <textarea onkeyup="Explainupdate(this.value)"  class="form-control required" id="Explain" placeholder="Give a discription on the origin of this idea, if its not your own idea, point out the person or company involved and your role as a patner" rows="6" maxlength="600" required="" name="Explain" cols="50" data-bv-field="Explain"><?php echo $orignald_data?></textarea>
                                                <label class="counter" id="Explain_counter" style="float: right;">0/600</label>
                                                <div class="clearfix"></div>
                                            <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="ProblemSolution" data-bv-result="NOT_VALIDATED">This field is required</small><small style="display: none;" class="help-block" data-bv-validator="stringLength" data-bv-for="ProblemSolution" data-bv-result="NOT_VALIDATED">Please enter a value with valid length</small></div>








                                              <div class="form-group col-sm-12">
                                                <label for="InnovationLevel">Innovation Level:</label><span style="color: red;">*</span><span style="float: right;background-color: #337ab7;color: #fff" id="sample_stages" class="btn theme_bg">Learn More-&gt;</span>
                                                <ul style="margin-left: 20px;">
                                                    <li>Ideation -&gt; Just an idea</li>
                                                    <li>Incubation -&gt; Under implementation</li>
                                                    
                                                    <li>Growth -&gt; Already implemented, under expansion</li>
                                                    <li>Scale -&gt; Already implemented, integrating more
                                                        features/services
                                                    </li>
                                                </ul>
                                                <select class="form-control required" required="" id="InnovationLevel" name="InnovationLevel" data-bv-field="InnovationLevel">
                                                     <option class="<?php echo $innovation_levelshow?>"><?php echo $InnovationLevel?></option>
                                                    <option></option>
                                                    <option>Ideation</option>
                                                    <option>Incubation</option>
                                                    <option>Growth</option>
                                                    <option>Scale</option>
                                                </select>
                                            <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="InnovationLevel" data-bv-result="NOT_VALIDATED">This field is required</small></div>
                                            <!--pending integration-->

                                            <!-- Commercialmodel Field -->
                                            <!--
                                            <div class="form-group col-sm-12">
                                                <label for="Business Model">Business Model: What is your target market? how does your product stand out? What is attractive about it?</label>
                                                <span style="color: red;">*</span>
                                                <i>(Maximum 600 characters)</i>
                                                <textarea class="form-control required" id="CommercialModel" placeholder="Commercial Model" rows="6" maxlength="600" onkeyup="businessupdate(this.value)" required="" name="CommercialModel" cols="50" data-bv-field="CommercialModel"></textarea>
                                                <label class="counter" id="business_counter" style="float: right;">0/600</label>
                                                <div class="clearfix"></div>
                                            <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="CommercialModel" data-bv-result="NOT_VALIDATED">This field is required</small><small style="display: none;" class="help-block" data-bv-validator="stringLength" data-bv-for="CommercialModel" data-bv-result="NOT_VALIDATED">Please enter a value with valid length</small></div>

                                            <div class="form-group col-sm-12">
                                                <label for="Feasibility">Feasibility : How viable is your innovation? What resources are required ? Does the technology exists? What skills are required?</label>
                                                <span style="color: red;">*</span>
                                                <i>(Maximum 600 characters)</i>
                                                <textarea class="form-control required" onkeyup="feasibilityupdate(this.value)" id="Feasibility" placeholder="Feasibility" rows="6" maxlength="600" required="" name="Feasibility" cols="50" data-bv-field="Feasibility"></textarea>
                                                <label class="counter" id="feasibility_counter" style="float: right;">0/600</label>
                                                <div class="clearfix"></div>
                                            <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="Feasibility" data-bv-result="NOT_VALIDATED">This field is required</small><small style="display: none;" class="help-block" data-bv-validator="stringLength" data-bv-for="Feasibility" data-bv-result="NOT_VALIDATED">Please enter a value with valid length</small></div>

                                            <div class="form-group col-sm-12">
                                                <label for="HowItWorks">How it works: A brief explanation on how the proposed innovation works</label>
                                                <span style="color: red;">*</span>
                                                <i>(Maximum 600 characters)</i>
                                                <textarea class="form-control required" onkeyup="howitworksupdate(this.value)" id="HowItWorks" placeholder="How it Works" rows="6" maxlength="600" required="" name="HowItWorks" cols="50" data-bv-field="HowItWorks"></textarea>
                                                <label class="counter" id="howitworks_counter" style="float: right;">0/600</label>
                                                <div class="clearfix"></div>
                                            <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="HowItWorks" data-bv-result="NOT_VALIDATED">This field is required</small><small style="display: none;" class="help-block" data-bv-validator="stringLength" data-bv-for="HowItWorks" data-bv-result="NOT_VALIDATED">Please enter a value with valid length</small></div>

                                            <div class="form-group col-sm-12">
                                                <label for="InnovationAttachment">Attachment:</label>
                                                <i>(if your innovation/product/service concept cannot be captured in the
                                                    two fields above.
                                                    <br>eg. Business Plan (.pdf, .doc, .docx - Max. 5MB))</i>
                                                <input name="InnovationAttachment" type="file" id="InnovationAttachment" data-bv-field="InnovationAttachment">

                                                <div class="clearfix"></div>
                                            <small style="display: none;" class="help-block" data-bv-validator="file" data-bv-for="InnovationAttachment" data-bv-result="NOT_VALIDATED">File should be doc, docx of pdf and max 5 MB.</small></div>-->

                                        </div>
                                        <div class="col-sm-4 tips">
                                            <h3>Important Tips:</h3>
                                            <ol>
                                                <li>-&gt; Description of the problem your innovation aims to provide
                                                    a solution to, solution you are providing, innovations's feasibility and its
                                                    Business Model should be brief and straight to the point.
                                                </li>
                                            </ol>
                                        </div>

                                    </div>




                                    <div class="tab-pane" id="tab4">
                                        <h2 class="hidden">&nbsp;</h2>
                                        <div class="col-sm-8">
                                            <!-- Intellectual Protection Field -->
                                             <div class="form-group col-sm-12 col-lg-12">
                                                <label for="Solution">Have you carried out the necessary background research on your project?</label>
                                               
                                             <select id="research" class="form-control " name="research">
                                                <option class="<?php echo $showredt?>"><?php echo $research?></option>
                                                <option></option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                          </div>
                                           
                                         <div class="form-group <?php echo $showredt?> col-sm-12 col-lg-12" id="research_explain">
                                                <label for="Solution" id="research_lettertt">How did you do/did not do research?</label>
                                                <span style="color: red;">*</span> <i>(Maximum
                                                    600 characters)</i>
                                                <textarea onkeyup="researchnupdate(this.value)"  class="form-control required" id="research_letter" placeholder="Give a discription how you did your research if yes or how you came up with the idea if you did not do a research" rows="6" maxlength="600" required="" name="research_letter" cols="50" data-bv-field="research_letter"><?php echo $Research_sources?> </textarea>
                                                <label class="counter" id="research_counter" style="float: right;">0/600</label>
                                                <div class="clearfix"></div>
                                            <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="ProblemSolution" data-bv-result="NOT_VALIDATED">This field is required</small><small style="display: none;" class="help-block" data-bv-validator="stringLength" data-bv-for="ProblemSolution" data-bv-result="NOT_VALIDATED">Please enter a value with valid length</small></div>
                                             <div class="form-group col-sm-12 col-lg-12">
                                                <label for="Solution">Who is the direct consumer/target customer/partners/ potential implementers/users of the innovation /solution?</label>
                                                <span style="color: red;">*</span> <i>(Maximum
                                                    600 characters)</i>
                                                <textarea onkeyup="targetedupdate(this.value)"  class="form-control required" id="targeted" placeholder="Describe the group you are targeting. e.g This solution targets the youth more so the bodaboda riders within kenyan towns and cities who..." rows="6" maxlength="600" required="" name="targeted" cols="50" data-bv-field="targeted"><?php echo $target;?></textarea>
                                                <label class="counter" id="targeted_counter" style="float: right;">0/600</label>
                                                <div class="clearfix"></div>
                                            <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="ProblemSolution" data-bv-result="NOT_VALIDATED">This field is required</small><small style="display: none;" class="help-block" data-bv-validator="stringLength" data-bv-for="ProblemSolution" data-bv-result="NOT_VALIDATED">Please enter a value with valid length</small></div>
                                           <div class="form-group col-sm-12 col-lg-12">
                                                <label for="Solution">What is the business model/revenue streams/costs of project?</label>
                                                <span style="color: red;">*</span> <i>(Maximum
                                                    600 characters)</i><span class="btn" id="view_canvasses" style="float: right;background-color: #337ab7;color: #fff">Learn more-&gt;</span>
                                                <textarea onkeyup="businesdupdate(this.value)"  class="form-control required" id="busines_model" placeholder="Give a discription of the the key patners/suppliers, the key resources you get from the key patners. The value you deliver to the customers etc." rows="6" maxlength="600" required="" name="busines_model" cols="50" data-bv-field="busines_model"><?php echo $busines_model?></textarea>
                                                <label class="counter" id="busines_counter" style="float: right;">0/600</label>
                                                <div class="clearfix"></div>
                                            <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="ProblemSolution" data-bv-result="NOT_VALIDATED">This field is required</small><small style="display: none;" class="help-block" data-bv-validator="stringLength" data-bv-for="ProblemSolution" data-bv-result="NOT_VALIDATED">Please enter a value with valid length</small></div>

                                               <div class="form-group col-sm-12 col-lg-12">
                                                <label for="Solution">What resources/technical requirements (if any) are required to implement the solution?</label>
                                                <span style="color: red;">*</span> <i>(Maximum
                                                    600 characters)</i>
                                                <textarea onkeyup="requirementsdupdate(this.value)"  class="form-control required" id="requirements" placeholder="Describe the tools you may require e.g. laptops, writing materials, internet resources." rows="6" maxlength="600" required="" name="requirements" cols="50" data-bv-field="requirements"><?php echo $requirements?></textarea>
                                                <label class="counter" id="requirements_counter" style="float: right;">0/600</label>
                                                <div class="clearfix"></div>
                                            <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="ProblemSolution" data-bv-result="NOT_VALIDATED">This field is required</small><small style="display: none;" class="help-block" data-bv-validator="stringLength" data-bv-for="ProblemSolution" data-bv-result="NOT_VALIDATED">Please enter a value with valid length</small></div>











<!--
                                            <div class="form-group col-sm-12">
                                                <label for="InnovationWebsite">Innovation Website</label>
                                                <i>(if any)</i>
                                                <input class="form-control" name="InnovationWebsite" type="text" id="InnovationWebsite">
                                            </div>

                                            <div class="form-group col-sm-12">
                                                <label for="YoutubepPortfolioLinks">Youtube Portfolio Links</label>
                                                <i>(if several, please separate using commas)</i>
                                                <input class="form-control" name="YoutubepPortfolioLinks" type="text" id="YoutubepPortfolioLinks">
                                            </div>

                                            <div class="form-group col-sm-12">
                                                <label for="Affiliations">Hubs affiliated to</label>
                                                <i>(if any) If several, please list them separated with commas, e.g.
                                                    Nailab, iHub</i>
                                                <input class="form-control" name="Affiliations" type="text" id="Affiliations">
                                            </div>

                                            <div class="form-group col-sm-12" id="govtassociation">
                                                <label for="PastAssociation">Past association with government</label>
                                                 <span style="color: red;">*</span>
                                                <i>(past, current PDTP, Other...) </i>
                                                <input class="form-control required" rows="6" maxlength="20" required="" name="PastAssociation" type="text" id="PastAssociation" data-bv-field="PastAssociation">
                                            <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="PastAssociation" data-bv-result="NOT_VALIDATED">This field is required</small><small style="display: none;" class="help-block" data-bv-validator="stringLength" data-bv-for="PastAssociation" data-bv-result="NOT_VALIDATED">Please enter a value with valid length</small></div>-->

                                        </div>
                                        <div class="col-sm-4 tips">
                                            <h3>Important Tips:</h3>
                                            <ol>
                                                <li>-&gt; You may be asked to provide proof of your portfolio, hence it is
                                                    important for you to give accurate information.
                                                </li>
                                            </ol>
                                        </div>
                                    </div>


                                    <div class="tab-pane" id="tab5">
                                        <h2 class="hidden">&nbsp;</h2>
                                        <div class="col-sm-8">


                                         <div class="form-group col-sm-12 col-lg-12">
                                                <label for="Solution">Have you worked with any partners (individuals or institutions) on this innovation/project before?</label>
                                               
                                             <select id="partners_involved" class="form-control">
                                                <option class="<?php echo $show_nbpart?>"><?php echo $havepatners?></option>
                                                <option></option>
                                                <option>Yes</option>
                                                <option>No</option>
                                            </select>
                                          </div>

                                            <div class="form-group <?php echo $shownumbers?> col-sm-12 col-lg-12" id="partners_number">
                                                <label for="Solution">How many are they?</label>
                                               
                                             <select id="number_partners" class="form-control " name="number_partners">
                                                <option class="<?php echo $shownumbers?>"><?php echo $howmany?></option>

                                                <option></option>
                                                <?php for($i=1;$i<=5;$i++){
                                                    ?>
                                                <option><?php echo $i?></option>
                                                <?php
                                            }
                                                ?>
                                            </select>
                                          </div>

                                         
                                            <div class="form-group col-sm-12 col-lg-12" id="partnership_holders">
                                                

                                      <?php 
                                        $coutm=0;
                                  $sqlx="SELECT * FROM innovators_partners where Innovation_Id='$Innovation_Id'";

                                    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

                                    while($row=mysqli_fetch_array($query_runx)){
                                     $member_name=$row['member_name'];
                                     $member_role=$row['member_role'];
                                     $coutm=$coutm+1;
                                     ?>
                                         <div class="col-sm-12 col-xs-12 no_padding">
                                            <div class="col-sm-7 col-xs-7 ">
                                                <div class="col-sm-12 col-xs-12 no_padding">
                                                 <?php echo $coutm?> Name/company
                                                    <input type="text"  id="<?php echo "Member_".$coutm?>" name="<?php echo "Member_".$coutm?>" value="<?php echo $member_name?>" class="splashinputs">
                                                </div>
                                            </div>
                                            <div class="col-sm-5 col-xs-5 ">
                                                <div class="col-sm-12 col-xs-12 no_padding">
                                                    Role
                                                    <input type="text"  id="<?php echo "role_".$coutm?>" name="<?php echo "role_".$coutm?>" value="<?php echo $member_role?>" class="splashinputs">
                                                </div>
                                            </div>
                                            </div>




<?php
}
?>





                                            </div>

                                               <div class="form-group col-sm-12 col-lg-12">
                                                <label for="Solution">What are you looking for as an innovator? select all that apply.</label>
                                            </div>
                                               <div class="form-group col-sm-12 col-lg-12">
                                             <div class="col-sm-1 mobile_hidden"></div>
                                                <div class="col-sm-10 col-xs-12 no_padding">
                                               
                                                <div class="col-sm-12 col-xs-12">


                                               <label style="font-weight: initial !important" class="submit_radiosd">
                                                    <input type="checkbox" <?php echo $checked_ipartners?> value="patnership" id="patnership" name="patnership"  class="innovations_radio" role="patnership">
                                                  <span class="checkmarkd"></span>
                                                   Partnership with other innovators
                                            
                                                   </label>
                                                </div>
                                                 <div class="col-sm-12 col-xs-12">

                                                    <label style="font-weight: initial !important" class="submit_radiosd">

                                                <input type="checkbox"  id="implementers" <?php echo $checked_implementers?> value="implementers" name="implementers"  class="innovations_radio" role="implementers">
                                                  <span class="checkmarkd"></span>
                                                   Partnership with implementers
                                                   </label>
                                                </div>
                                                <div class="col-sm-12 col-xs-12">

                                              <label style="font-weight: initial !important" class="submit_radiosd">

                                                <input type="checkbox" id="acquisition" <?php echo $checked_acquisition?> value="acquisition" name="acquisition"  class="innovations_radio" role="acquisition">
                                                  <span class="checkmarkd"></span>
                                                   Acquisition
                                                   </label>

                                               </div>
                                                <div class="col-sm-12 col-xs-12">

                                              <label style="font-weight: initial !important" class="submit_radiosd">

                                                <input type="checkbox" id="funding" <?php echo $checked_funding?> value="funding" name="funding"  class="innovations_radio" role="funding">
                                                  <span class="checkmarkd"></span>
                                                   Funding
                                                   </label>

                                               </div>
                                               <div class="col-sm-12 col-xs-12">

                                                <label style="font-weight: initial !important" class="submit_radiosd">
                                                     <input type="checkbox" value="Communities" <?php echo $checked_others?> id="Others" name="othersd" class="innovations_radio" role="Communities">
                                                  <span class="checkmarkd"></span>
                                                   Other
                                                   </label>
                                                   
                                               
                                               </div>
                                               <div class="col-sm-12 col-xs-12 <?php echo $show_others?> " id="user_check">
                                                Specify here
                                                <input type="text" id="user_defined" value="<?php echo $commun?>" name="user_defined" class="form-control ">
                                               </div>
                                               </div>

                                              </div>





                                           <div class="form-group col-sm-12 col-lg-12">
                                                <label for="Solution">Does your idea/innovation have intellectual property protection? Yes/No</label>
                                               <select id="protection" class="form-control " name="propertyselected">
                                                <option class="<?php echo $sho_ppt; ?>"><?php echo $ppta?></option>
                                                    <option></option>
                                                    <option>Yes</option>
                                                    <option>No</option>
                                                </select>
                                            </div>
                                           <div class="form-group col-sm-12 <?php echo $sho_ppt?> col-lg-12" id="attachment_cover">
                                                <label for="Solution">A an intellectual property protection document.</label>
                                            <input type="file" name="doc" id="file" class="property_protection"> <a class="<?php echo $sho_ppt?>"><?php echo $older_ppt?></a>
                                            </div>
                                             <div class="form-group col-sm-12 col-lg-12">
                                                <label for="Solution">  Please include any link and/or attachment of any supporting material or document.</label>
                                               <div class=" col-sm-6 col-xs-12">
                Attach a file:
                <input type="file" id="attach_file" name="file" class="attach_document"  >
                <a class="<?php echo $showdocs?>"><?php echo $documenth?></a>
            </div>
            <div class="col-sm-6 col-xs-12"> Or give a link:
            <input type="text" class="form-control "id="link" value="<?php echo $useful_links?>" class="attachment_link" name="link">
            </div>
                                            </div>























































<!--

                                            <div class="form-group col-sm-12">
                                                <label for="intellectual_protection">Is your innovation protected by Intellectual Property Rights?</label>
                                                <br>
                                                <label class="radio-inline">
                                                    <input name="intellectual_protection" class="" type="radio" value="Yes" id="intellectual_protection"> Yes
                                                </label>
                                                <label class="radio-inline">
                                                    <input checked="checked" name="intellectual_protection" type="radio" value="No" id=""> No
                                                </label>
                                            </div>

                                            <div class="form-group col-sm-12">
                                                <label for="InnovationWebsite">Innovation Website</label>
                                                <i>(if any)</i>
                                                <input class="form-control" name="InnovationWebsite" type="text" id="InnovationWebsite">
                                            </div>

                                            <div class="form-group col-sm-12">
                                                <label for="YoutubepPortfolioLinks">Youtube Portfolio Links</label>
                                                <i>(if several, please separate using commas)</i>
                                                <input class="form-control" name="YoutubepPortfolioLinks" type="text" id="YoutubepPortfolioLinks">
                                            </div>

                                            <div class="form-group col-sm-12">
                                                <label for="Affiliations">Hubs affiliated to</label>
                                                <i>(if any) If several, please list them separated with commas, e.g.
                                                    Nailab, iHub</i>
                                                <input class="form-control" name="Affiliations" type="text" id="Affiliations">
                                            </div>

                                            <div class="form-group col-sm-12" id="govtassociation">
                                                <label for="PastAssociation">Past association with government</label>
                                                 <span style="color: red;">*</span>
                                                <i>(past, current PDTP, Other...) </i>
                                                <input class="form-control required" rows="6" maxlength="20" required="" name="PastAssociation" type="text" id="PastAssociation" data-bv-field="PastAssociation">
                                            <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="PastAssociation" data-bv-result="NOT_VALIDATED">This field is required</small><small style="display: none;" class="help-block" data-bv-validator="stringLength" data-bv-for="PastAssociation" data-bv-result="NOT_VALIDATED">Please enter a value with valid length</small></div>

                                        </div>
                                        <div class="col-sm-4 tips">
                                            <h3>Important Tips:</h3>
                                            <ol>
                                                <li>-&gt; You may be asked to provide proof of your portfolio, hence it is
                                                    important for you to give accurate information.
                                                </li>
                                            </ol>
                                        </div>-->
                                    </div>
                                   </div>









                                    <div class="tab-pane col-md-12 no_padding" id="tab6">
                                        <h2 class="hidden">&nbsp;</h2>
                                        <h3>Submission Summary</h3>
                                        <div id="summary" class="col-md-12 no_padding">
                                      <table class="table table-responsive table-striped col-md-12 table-bordered" width="100%">
                                        <thead>
                                            <tr><th>Field Name</th><th>Your input/selection</th></tr></thead>

                                            <tbody>

                                    <tr><td>Innovation Name </td><td id="innovation_displayer"><?php echo $Innovation_name?></td></tr>
                                    <tr><td>Submitting as </td><td id="innovator_poselector"><?php echo $innovator_type?></td></tr>
                                     <tr class="company_data not_shown "><td>Company Name </td><td id="company_d"></td></tr>
                                    <tr class="company_files not_shown"><td>Company Registration no. </td><td id="company_nreg"></td></tr>
                                    <tr class="company_files not_shown"><td>KRA Pin </td><td id="kra_pinhold"></td></tr>
                                    <tr class="company_files not_shown"><td>Company Type </td><td id="company_typenh"></td></tr>
                                    <tr><td>Sector </td><td id="sectord"><?php echo $newsector?></td></tr>
                                    <tr><td>Big 4 Agenda Sector </td><td id="InnovationBig4Sectords"><?php echo $bg4id_name?></td></tr>
                                    <tr><td>Gap Identified </td><td id="ptProblemidentified"><?php echo $need?></td></tr>
                                    <tr><td>Problem Solution </td><td id="ptProblemSolution"><?php echo $solution?></td></tr>
                                    <tr><td>Impact </td><td id="ptCommercialModel"><?php echo $impact?></td></tr>
                                    <tr><td>My original idea?</td><td id="ptFeasibility"><?php echo $originality?></td></tr>
                                    <tr><td>Why is/not my idea </td><td id="ptFeasibility"><?php echo $originality_explanation?></td></tr>

                                    <tr><td>Innovation Level </td><td id="innovation_led"><?php echo $InnovationLevel?></td></tr>
                                    <tr><td>Did you do a research</td><td id="ptHowItWorks"><?php echo $research?></td></tr>
                                    <tr><td>Why/how did you do the research</td><td id="interlectualfr"><?php echo $Research_sources?></td></tr>
                                    <tr><td>Direct consumer</td><td id="InnovationWebsitedf"><?php echo $target?></td></tr>
                                    <tr><td>Business model</td><td id="YoutubePortfolioLinksde"><?php echo $busines_model?></td></tr>
                                    <tr><td>Technical requirements </td><td id="PastAssociationd"><?php echo $requirements?></td></tr>
                                    <tr><td>Working with partners </td><td id="PastAssociationd"><?php echo $havepatners?></td></tr>
                                    
                                    <tr><td>How many are they </td><td id="PastAssociationd"><?php echo $howmany?></td></tr>
                                   <?php
                                 $coutm=0;
                                  $sqlx="SELECT * FROM innovators_partners where Innovation_Id='$Innovation_Id'";

                                    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

                                    while($row=mysqli_fetch_array($query_runx)){
                                     $member_name=$row['member_name'];
                                     $member_role=$row['member_role'];
                                     $coutm=$coutm+1;


                                   ?>
                                     <tr><td>Member/company <?php echo $coutm?> </td><td id="PastAssociationd"><?php echo $member_name." ->>>>".$member_role?></td></tr>
                                    <?php

                                    }

                                    ?>
                                    
                                    <tr><td>Reasons for submission </td><td id="PastAssociationd"><?php echo "$stateimple$implementors$statefund$fund$statecommn$commun$statepart$patner$setacquisition$acquisition_d"?></td></tr>
                                    <tr><td>Have Intellectual protection</td><td id="YoutubePortfolioLinksde"><?php echo $have_property?></td></tr>
                                    <tr class="<?php echo $show_propertyd?>"><td>Intellectual protection document</td><td id="YoutubePortfolioLinksde"><i class="fa fa-file-pdf-o "></i> protection_document.pdf</td></tr>
                                    <tr class="<?php echo $showdocs?>"><td>Supporting Document </td><td id="PastAssociationd"><?php echo $documenth?></td></tr>
                                    <tr class="<?php echo $show_links?>"><td>Additional link</td><td id="Affiliationsd"><?php echo $useful_links?></td></tr>
                                     </tbody>
                                     </table>
















                                        </div>
                                        <div class="col-sm-12">
                                            <!-- Terms And Conditions 2 Field -->
                                            <div class="form-group col-sm-6">
                                                <label for="terms_and_conditions_2">Please confirm that you agree to the terms and conditions again.</label>
                                                <label class="checkbox-inline">
                                                    <input required="" name="terms_and_conditions_2" type="checkbox" value="Yes" id="terms_and_conditions_2" data-bv-field="terms_and_conditions_2">
                                                    I accept the
                                                    <a href="#" id="show_terms" style="color: darkblue; font-weight: bold; font-style: italic;">
                                                        Terms and Conditions
                                                    </a>
                                                    <span style="color: red;">*</span>
                                                </label>
                                            <small style="display: none;" class="help-block" data-bv-validator="notEmpty" data-bv-for="terms_and_conditions_2" data-bv-result="NOT_VALIDATED">This field is required</small></div>
                                        </div>
                                    </div>

                                    <ul class="pager wizard col-sm-8">
                                        <li class="previous disabled">
                                            <a href="#" class="innov_buttons" style="background-color: #0f816a;">Previous</a>
                                        </li>
                                        <li hidden="true" id="">Page <i id="currentpage">1</i></li>
                                        <li class="next">
                                            <a href="#" class="innov_buttons" id="innov_next_button" style="background-color: #4FAA41;">Next</a>
                                        </li>
                                        <li class="next finish innov_buttons hidden not_shown" id="innov_submit_button">
                                            <a style="background-color: #4FAA41;cursor:pointer; color: #fff;">Submit
                                                Innovation</a>
                                        </li>
                                    </ul>
                                    <div class="col-md-12" style="text-align: center;" id="submision_error"></div>
                                </div>
                            </div>

                            <div id="terms_modal" class="form-group col-sm-12 terms_modal hidden">
                                <div>
                                    <h2>Terms and Conditions on the use of Whitebox Facility</h2>
                                </div>
                                <div class="copy">
                                    <label style="text-align: justify;">
                                        <p>The Participants agree that by submitting their idea, innovation or
                                            product to
                                            the Whitebox Facility they agree to the following terms and
                                            conditions which
                                            constitute a legally binding agreement between the Government and
                                            the
                                            Participants.Further,the Participants in registering with the
                                            Facility confirm
                                            that they have read and fully understood and accepted these terms
                                            and
                                            conditions.</p>
                                    </label>
                                    <div style="text-align: justify;">
                                        <ol>
                                            <li>
                                                The Government is under no obligation to take up the idea,
                                                innovation or the
                                                product or apply it in any manner whatsoever;

                                            </li>
                                            <li>
                                                The Government is not responsible for the protection of the
                                                intellectual
                                                property rights for the idea, innovation or the product and
                                                neither does it
                                                guarantee any such protection within the Whitebox Facility. The
                                                Participants
                                                are advised to follow through with the appropriate Government
                                                bodies for the
                                                protection of their intellectual property rights.

                                            </li>
                                            <li>
                                                The Participants agree that they are voluntarily entering in the
                                                Whitebox
                                                Facility and fully understand its mode of operation. Their
                                                engagement with
                                                the Government and its partners is not compulsory and they can
                                                choose to opt
                                                out at any given time.
                                            </li>
                                            <li>
                                                The Participants acknowledge that the Whitebox Facility is not
                                                responsible
                                                for any contracts that the Participants may enter with any of
                                                the Facility’s
                                                partners. Any such contractual engagements or dealings are
                                                willingly entered
                                                by the Participants and they do not create any privity with the
                                                Government.

                                            </li>
                                            <li>
                                                The Participants fully understand the objectives of Whitebox
                                                Facility and as
                                                such the Participants have without any inducement or coercion
                                                submitted
                                                their ideas, innovations and products to the Facility and this
                                                participation
                                                does not create any binding legal obligations with the
                                                Government.

                                            </li>


                                        </ol>
                                    </div>
                                </div>
                                <div style="text-align: center;">
                                    <a href="#" id="closeModal" class="btn btn-danger" style="color: #fff;">Hide Terms
                                        and
                                        Conditions</a>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript" src="Huduma_WhiteBox/js/jquery.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
   
            var dd='<?php echo $page_now ?>';
             // alert(dd)
          //  alert(dd)
       // alert(dd)
            if(dd=="first_page"){
var new_page=1;
$(".tab-pane").removeClass("active show").hide();
          // $(".previous").removeClass("disabled");
           $("#tab"+new_page).show();
           $(".tabs").css("background-color","#fff");
           $(".tabs").css("color","#337ab7");
           //$("#tabs"+new_page).addClass("active");
            $("#tabs"+new_page).css("background-color","#337ab7");
           $("#tabs"+new_page).css("color","#fff");
            $("#submision_error").html("").css("color","#000");
          $("#currentpage").html(new_page);
$('html, body').animate({scrollTop: '0px'}, 300);






            }else{

   var txt;
  var r = confirm("You did not complete innovation submission the last session, click OK to complete or CANCEL to start afresh?");
  if (r == true) {
  //  alert(dd)
            $("#tabs1").css("color","#337ab7");
           $("#tabs1").css("background-color","#fff");
           $(".tab-pane").removeClass("active show").hide();
             if(dd=="second_page"){
            
            var new_page=2;
           $(".tab-pane").removeClass("active show").hide();
          // $(".previous").removeClass("disabled");
           $("#tab"+new_page).show();
           $(".tabs").css("background-color","#fff");
           $(".tabs").css("color","#337ab7");

           $("#tabs1").removeClass("");

            $("#tabs1").css("color","#337ab7");
           $("#tabs1").css("background-color","#fff");
           //$("#tabs"+new_page).addClass("active");
            $("#tabs"+new_page).css("background-color","#337ab7");
           $("#tabs"+new_page).css("color","#fff");
            $("#submision_error").html("").css("color","#000");
          $("#currentpage").html(new_page);
$('html, body').animate({scrollTop: '0px'}, 300);


$(".previous").addClass("disabled");

            }else if(dd=="third_page"){
  var new_page=3;
           $(".tab-pane").removeClass("active show").hide();
          // $(".previous").removeClass("disabled");
           $("#tab"+new_page).show();
           $(".tabs").css("background-color","#fff");
           $(".tabs").css("color","#337ab7");

           $("#tabs1").removeClass("active show");

            $("#tabs1").css("color","#337ab7");
           $("#tabs1").css("background-color","#fff");
           //$("#tabs"+new_page).addClass("active");
            $("#tabs"+new_page).css("background-color","#337ab7");
           $("#tabs"+new_page).css("color","#fff");
            $("#submision_error").html("").css("color","#000");
          $("#currentpage").html(new_page);
$('html, body').animate({scrollTop: '0px'}, 300);
$(".previous").removeClass("disabled");

            }else if(dd=="fourth_page"){
  var new_page=4;
           $(".tab-pane").removeClass("active show").hide();
          // $(".previous").removeClass("disabled");
           $("#tab"+new_page).show();
           $(".tabs").css("background-color","#fff");
           $(".tabs").css("color","#337ab7");
           //$("#tabs"+new_page).addClass("active");
            $("#tabs"+new_page).css("background-color","#337ab7");
           $("#tabs"+new_page).css("color","#fff");
            $("#submision_error").html("").css("color","#000");
          $("#currentpage").html(new_page);
$('html, body').animate({scrollTop: '0px'}, 300);
$(".previous").removeClass("disabled");

            }else if(dd=="fifth_page"){
          var new_page=5;
           $(".tab-pane").removeClass("active show").hide();
          // $(".previous").removeClass("disabled");
           $("#tab"+new_page).show();
           $(".tabs").css("background-color","#fff");
           $(".tabs").css("color","#337ab7");

           $("#tabs1").removeClass("active show");

            $("#tabs1").css("color","#337ab7");
           $("#tabs1").css("background-color","#fff");
           //$("#tabs"+new_page).addClass("active");
            $("#tabs"+new_page).css("background-color","#337ab7");
           $("#tabs"+new_page).css("color","#fff");
            $("#submision_error").html("").css("color","#000");
          $("#currentpage").html(new_page);
$('html, body').animate({scrollTop: '0px'}, 300);
$(".previous").removeClass("disabled");
            }else if(dd=="sixth_page"){
          var new_page=6;

           $(".tab-pane").removeClass("active show").hide();
          // $(".previous").removeClass("disabled");
           $("#tab"+new_page).show();
           $(".tabs").css("background-color","#fff");
           $(".tabs").css("color","#337ab7");
           //$("#tabs"+new_page).addClass("active");

           $("#tabs1").removeClass("active show");

            $("#tabs1").css("color","#337ab7");
           $("#tabs1").css("background-color","#fff");
            $("#tabs"+new_page).css("background-color","#337ab7");
           $("#tabs"+new_page).css("color","#fff");
            $("#submision_error").html("").css("color","#000");
          $("#currentpage").html(new_page);
$('html, body').animate({scrollTop: '0px'}, 300);
$(".previous").removeClass("disabled");

        $("#innov_next_button").addClass("hidden")

$("#innov_submit_button").removeClass("hidden").show();
            }else{

            }}else{
         //if cancelled


             $.get("Huduma_WhiteBox/innovator/innovation/clear.php",{
        },function(data){
            var dataf=atob(data);
            if($.trim(dataf)=="success"){
             var loader=$("#loader").html();
            $("#dashboard_loaders").html("Loading..."+loader);
            $.post("Huduma_WhiteBox/innovator/submit.php",function(data){
$("#dashboard_loaders").html("");
$("#home_display").html(data).show();
$('html, body').animate({scrollTop: '0px'}, 300);
  $(".dashboard_holder").hide();
  $("#content_divesr").html("home_display");

            $("#tabs1").css("background-color","#337ab7");
           $("#tabs1").css("color","#fff");
            })

          
       }else{

       }
    })


            }
}
    
})
</script>


<script type="text/javascript">
 function solutionupdate(str) {
  var lng = str.length;
  document.getElementById("solustion_counter").innerHTML = lng + '/600';
}

 function neednupdate(str) {
  var lng = str.length;
  document.getElementById("need_counter").innerHTML = lng + '/600';
}
 function businessupdate(str) {
  var lng = str.length;
  document.getElementById("business_counter").innerHTML = lng + '/600';
}
 function feasibilityupdate(str) {
  var lng = str.length;
  document.getElementById("feasibility_counter").innerHTML = lng + '/600';
}
function howitworksupdate(str) {
  var lng = str.length;
  document.getElementById("howitworks_counter").innerHTML = lng + '/600';
}
function impactupdate(str) {
  var lng = str.length;
  document.getElementById("impact_counter").innerHTML = lng + '/600';
}
function Explainupdate(str) {
  var lng = str.length;
  document.getElementById("Explain_counter").innerHTML = lng + '/600';
}
function researchnupdate(str) {
  var lng = str.length;
  document.getElementById("research_counter").innerHTML = lng + '/600';
}
function targetedupdate(str) {
  var lng = str.length;
  document.getElementById("targeted_counter").innerHTML = lng + '/600';
}
function businesdupdate(str) {
  var lng = str.length;
  document.getElementById("busines_counter").innerHTML = lng + '/600';
}
function requirementsdupdate(str) {
  var lng = str.length;
  document.getElementById("requirements_counter").innerHTML = lng + '/600';
}

    $(document).ready(function(){
             $("#Others").change(function(){
if($("#Others").prop("checked")){
$("#user_check").show()
}else{
$("#user_check").hide()
}
    })
        $("#protection").change(function(){
            var protection=$(this).val()

                $(this).css("border","1px solid #ccc")
               if(protection==""){
              $("#attachment_cover").hide()
             // $("#fouthr_displaye").html("Required")
            //  $(this).css("border","2px solid red")
               }else{
               $(this).css("border","1px solid #ccc")

            if(protection=="Yes"){
                $("#attachment_cover").show()

            }else{
               $("#attachment_cover").hide()
            }
        }
        });
$("#number_partners").change(function(){
            var number_partners=$(this).val()
            if(number_partners==0){
                
        $(this).css("border","2px solid red")
              $("#fouthr_displaye").html("Select a value greater than 0")
              $("#partnership_holders").html("").hide()
            }else{
                $(this).css("border","1px solid #ccc")
                var numbers=btoa(number_partners)
              $("#fouthr_displaye").html(loader)
              $.post("Huduma_WhiteBox/innovator/innovation/get_fields.php",{
             numbers:numbers
              },function(data){
                $("#fouthr_displaye").html("")
                $("#partnership_holders").html(data).show()
              })
            }
        });
$("#partners_involved").change(function(){

                $(this).css("border","1px solid #ccc")
            var partners_involved=$(this).val()
            //$("#partnership_holders").html("").hide();
            if(partners_involved=="Yes"){

                $("#partners_number").show()


            }else{
                $("#partnership_holders").html("").hide()
               $("#partners_number").hide()
            }
        });
     $("#idea").change(function(){
          var idea=$(this).val();
         // alert(implementsp)
          if(idea=="Yes"){
            //alert()
          $("#explanation").show()
           $("#idea_questions").html("Please give more information");
          }else if(idea=="No"){
         $("#explanation").show()
         $("#idea_questions").html("Please give more information");
          }else{
            $("#explanation").hide()  
          }
        })

$("#research").change(function(){
            var research=$(this).val()
            if(research=="Yes"){
                $("#research_explain").show()
                $("#research_lettertt").html("Please provide more information on the research.");
            }else if(research=="No"){
               $("#research_explain").show();
                $("#research_lettertt").html("Please provide more information");
            }else{
                $("#research_explain").hide() 
            }
        })
        $("#tabs1").css("background-color","#337ab7");
        $("#tabs1").css("color","#fff");

        $("#innov_next_button").click(function(){
            var currentpage=parseInt($("#currentpage").html());
            var new_page=currentpage+1;
            if(currentpage=="1"){
            if($("#ip_protect").prop("checked")){
           if($("#terms_and_conditions").prop("checked")){
           $(".tab-pane").removeClass("active show").hide();
           $(".previous").removeClass("disabled");
           $("#tab"+new_page).show();
           $(".tabs").css("background-color","#fff");
           $(".tabs").css("color","#337ab7");
           //$("#tabs"+new_page).addClass("active");
            $("#tabs"+new_page).css("background-color","#337ab7");
           $("#tabs"+new_page).css("color","#fff");
            $("#submision_error").html("").css("color","#000");
          $("#currentpage").html(new_page);
          $('html, body').animate({scrollTop: '0px'}, 300);
           }else{
              $("#submision_error").html("Agree to the terms and conditions").css("color","red");
           }
            }else{
            $("#submision_error").html("Agree to the terms and conditions").css("color","red");
            }   
 




        }else if(currentpage=="2"){
var company_fields="";
var fields="";
  var innovator_type="";
if($("#innovator_type").prop("checked")){
innovator_type="Individual";
$(".compmay_dfiels").val("");
}else{
innovator_type="Company";
}






if(innovator_type=="Company"){
var company_id=$("#company_id").val()
$("#innovator_poselector").html("Company");
if(company_id){
$(".compmay_dfiels").val("");
company_fields="ready";
$(".company_data").show()
$("#company_d").html(company_id)
}else{

var company_name=$("#company_name").val()
var registration_no=$("#company_registration_no").val();
var kra_pin=$("#kra_pin").val();
var company_type=$("#company_type").val()
if(company_name && registration_no && kra_pin && company_type){
company_fields="ready";


$(".company_files").show();
$("#company_nreg").html(registration_no)
$("#kra_pinhold").html(kra_pin)
$("#company_typenh").html(company_type)
$("#company_d").html(company_name)




$('html, body').animate({scrollTop: '0px'}, 300);






}else{
//company_fields="";
}
}


}else if(innovator_type=="Individual"){
company_fields="ready";
$("#innovator_poselector").html("Individual");
}else{
    //company_fields="";
}

var innovationName=$("#innovationName").val();
var InnovationBig4Sector=$("#InnovationBig4Sector").val();
//var InnovationLevel=$("#InnovationLevel").val();
var sector_id=$("#sector_id").val();
//alert(company_fields+company_id+innovator_type);
if(innovationName && InnovationBig4Sector && sector_id && company_fields && innovator_type){

var formData = new FormData($("#commentForm")[0]);
    $.ajax({
        url : 'Huduma_WhiteBox/innovator/innovation/save_first.php',
        method : 'POST',
        data : formData,
        contentType : false,
        cache : false,
        processData : false,
        success : function (response){
            var responsed=atob(response)
            if(responsed=="success"){

            }else{
                
            }
        }
    })





//$("#submision_error").html("").css("color","#000");
$(".tab-pane").removeClass("active show").hide();
          // $(".previous").removeClass("disabled");
           $("#tab"+new_page).show();
           $(".tabs").css("background-color","#fff");
           $(".tabs").css("color","#337ab7");
           //$("#tabs"+new_page).addClass("active");
            $("#tabs"+new_page).css("background-color","#337ab7");
           $("#tabs"+new_page).css("color","#fff");
            $("#submision_error").html("").css("color","#000");
          $("#currentpage").html(new_page);
$('html, body').animate({scrollTop: '0px'}, 300);


}else{
    $("#submision_error").html("All Fields required").css("color","red");
}


           }else if(currentpage=="3"){
     var ProblemSolution=$("#ProblemSolution").val();
     var Problemidentified=$("#Problemidentified").val();
     var impact=$("#impact").val();
     var Explain=$("#Explain").val();
     var InnovationLevel=$("#InnovationLevel").val();

     if(ProblemSolution && Problemidentified && impact && Explain && InnovationLevel){


var formData = new FormData($("#commentForm")[0]);
    $.ajax({
        url : 'Huduma_WhiteBox/innovator/innovation/save_second.php',
        method : 'POST',
        data : formData,
        contentType : false,
        cache : false,
        processData : false,
        success : function (response){
            var responsed=atob(response)
            if(responsed=="success"){

            }else{
                
            }
        }
    })













$(".tab-pane").removeClass("active show").hide();
          // $(".previous").removeClass("disabled");
           $("#tab"+new_page).show();
           $(".tabs").css("background-color","#fff");
           $(".tabs").css("color","#337ab7");
           //$("#tabs"+new_page).addClass("active");
            $("#tabs"+new_page).css("background-color","#337ab7");
           $("#tabs"+new_page).css("color","#fff");
            $("#submision_error").html("").css("color","#000");
            $('html, body').animate({scrollTop: '0px'}, 300);
          $("#currentpage").html(new_page);
     }else{
            $("#submision_error").html("All Fields required").css("color","red");
     }

           }else if(currentpage=="4"){
            var research=$("#research").val();
           var research_letter=$("#research_letter").val();
           var targeted=$("#targeted").val();
           var busines_model=$("#busines_model").val();
           var requirements=$("#requirements").val();
           if(requirements && targeted && busines_model && requirements && research_letter && research){
var formData = new FormData($("#commentForm")[0]);
    $.ajax({
        url : 'Huduma_WhiteBox/innovator/innovation/save_third.php',
        method : 'POST',
        data : formData,
        contentType : false,
        cache : false,
        processData : false,
        success : function (response){
            var responsed=atob(response)
            if(responsed=="success"){

            }else{
                
            }
        }
    })






           $("#submision_error").html("").css("color","#000");
           $(".tab-pane").removeClass("active show").hide();
          // $(".previous").removeClass("disabled");
           $("#tab"+new_page).show();
           $(".tabs").css("background-color","#fff");
           $(".tabs").css("color","#337ab7");
           //$("#tabs"+new_page).addClass("active");
            $("#tabs"+new_page).css("background-color","#337ab7");
           $("#tabs"+new_page).css("color","#fff");
            $("#submision_error").html("").css("color","#000");
            $('html, body').animate({scrollTop: '0px'}, 300);
          $("#currentpage").html(new_page);
           }else{
            $("#submision_error").html("All Fields required").css("color","red");
           }

           }else if(currentpage=="5"){


var patn="";
var partners_involved=$("#partners_involved").val();
    if(partners_involved=="No"){
 patn="ready";
     $("#partners_involved").css("border","2px solid red")
        $("#submision_error").html("Required")
      }else if(partners_involved=="Yes"){

var number_partners=$("#number_partners").val()
        if(number_partners==0){
        $("#number_partners").css("border","2px solid red")
        $("#submision_error").html("Select a value greater than 0")
        }else{
    $("#number_partners").css("border","1px solid #ccc")
        $("#submision_error").html("")

var user_names=1;
    for(user_names=1;user_names<=number_partners;user_names++){
        var user_name="Member_"+user_names;
        var users=btoa(user_names);
        var members=btoa(number_partners)
        var rolei="role_"+user_names;
        var role=btoa($("#"+rolei).val());
        var member_name="name_"+user_names;
        var member_named=btoa($("#"+user_name).val());
        //alert(member_name+" "+member_named)
        if(member_named){
            $("#Member_"+user_names).css("border","1px solid #ccc")
            if(role){
             $("#role_"+user_names).css("border","1px solid #ccc")
            
        $("#submision_error").html("")
patn="ready";
}else{
  $("#role_"+user_names).css("border","1px solid red")   
   $("#submision_error").html("Required")
   patn="";
}}else{
    patn="";
$("#submision_error").html("Required")
  $("#Member_"+user_names).css("border","1px solid red");  
}
}
      }


}else{
 patn="";
}










            var patcheck="";

             var fund="";
             var acquisition_d="";
            var commn="";
            var patner="";
            var implement="";

            var Communities="";
             if($("#implementers").prop("checked")){
               var  implementers="implementers";
               var implement=btoa(implementers)
             }else{

             }
                if($("#acquisition").prop("checked")){
               var  acquisition="acquisition";
               var acquisition_d=btoa(acquisition)
             }else{

             }
             if($("#patnership").prop("checked")){
               var  patnership="patnership";
               var patner=btoa(patnership);
             }else{

             }
             if($("#funding").prop("checked")){
               var  funding="funding";
               var fund=btoa(funding);
             }else{

             }
             if($("#Others").prop("checked")){
                var commn="Others";
               var  Others=$("#user_defined").val();
               if(Others){
                $("#user_defined").css("border","1px solid #ccc")
               var commnd=btoa(Others);
           }else{
            $("#user_defined").css("border","2px solid red")

            $("#submision_error").html("Required")
           }
             }else{

             }
             
    if(fund || commn || implement || patner || acquisition_d){
        $(".submit_radiosd").css("color","#000");
        $("#submision_error").html("")
        patcheck="ready";
      var user_defined="";
         if($("#Others").prop("checked")){
               var  user_defined=$("#user_defined").val();
               if(user_defined){
                 patcheck="ready";
    //alert()
                $("#user_defined").css("border","1px solid #ccc")






}else{
 $("#user_defined").css("border","1px solid red")
  patcheck="";
}
}else{

}
}else{
patcheck="";
$(".submit_radiosd").css("color","red");
$("#submision_error").html("Required!")
}






var property_ed="";

      var protection=$("#protection").val()

                $("#protection").css("border","1px solid #ccc")
               if(protection==""){
property_ed="ready";
              $("#fouthr_displaye").html("Required")
              $("#protection").css("border","2px solid red")
               }else{
               $("#protection").css("border","1px solid #ccc")

            if(protection=="Yes"){
                 var olderppt='<?php echo $older_ppt ?>';
                 if(olderppt){
                 property_ed="ready";
                 }else{
               property_ed="";
                 }
                var property_file=$(".property_protection").val()
                if(property_file){
               property_ed="ready";
//check links

             var attach_document=$("#attach_file").val();


}else{
var olderppt='<?php echo $older_ppt?>';
                 if(olderppt){
                 property_ed="ready";
                 }else{
               property_ed="";
                 }
}

}else if(protection=="No"){

property_ed="ready";

}else{

}

}


var leafattach="";
   var attach_document=$("#attach_file").val();

             var attachment_link=$("#link").val();
             if(attach_document || attachment_link){
                //alert()
                leafattach="ready";
              $("#submision_error").html("")
              $("#link_datachments").css("border","0px solid black")

            //$("#fouthr_displaye").html(loader);

             }else{
                var docds='<?php echo $documenth ?>';
                if(docds){
                leafattach="ready";
              $("#submision_error").html("")
              $("#link_datachments").css("border","0px solid black")
                }else{
                leafattach="";
              $("#submision_error").html("Attach a file or add a link or add both").css("color","red")
              $("#link_datachments").css("border","2px solid red")
          }
             }



if(leafattach && property_ed && patcheck && patn){
var loader=$("#loader").html();
 $("#submision_error").html("Loading files, kindly wait.."+loader).css("color","black")
  $("#innov_next_button").addClass("hidden")
var formData = new FormData($("#commentForm")[0]);
    $.ajax({
        url : 'Huduma_WhiteBox/innovator/innovation/save_fourth.php',
        method : 'POST',
        data : formData,
        contentType : false,
        cache : false,
        processData : false,
        success : function (response){
           /* var responsed=atob(response)
            if(responsed=="success"){
                */
          $.get('Huduma_WhiteBox/innovator/innovation/show_table.php',function(data){
         $("#summary").html(data);
      // new_page=new_page+1;

$("#innov_submit_button").removeClass("hidden").show();
        $("#innov_next_button").addClass("hidden")
 $("#submision_error").html("").css("color","black")
$("#innov_submit_button").removeClass("hidden").show();
           $("#submision_error").html("").css("color","#000");
           $(".tab-pane").removeClass("active show").hide();
          // $(".previous").removeClass("disabled");
           $("#tab"+new_page).show();
           $(".tabs").css("background-color","#fff");
           $(".tabs").css("color","#337ab7");
           //$("#tabs"+new_page).addClass("active");
            $("#tabs"+new_page).css("background-color","#337ab7");
           $("#tabs"+new_page).css("color","#fff");
            $("#submision_error").html("").css("color","#000");
            $('html, body').animate({scrollTop: '0px'}, 300);
          $("#currentpage").html(new_page);

          })
           /* }else{
                
            }*/
        }
    })








         
}else{

 $("#submision_error").html("Required!").css("color","red") 
}


          




           }else{

           }




        })
        $(".previous").click(function(){
            var currentpage=parseInt($("#currentpage").html());
            if(currentpage<=1){

            }else{
        $("#innov_next_button").removeClass("hidden")

$("#innov_submit_button").addClass("hidden").hide();
            var previouspage=currentpage-1;
            $(".tab-pane").removeClass("active show").hide();
            $(".tabs").removeClass("active");
            $("#tab"+previouspage).show();
            $(".tabs").css("background-color","#fff");
           $(".tabs").css("color","#337ab7");
           $('html, body').animate({scrollTop: '0px'}, 300);
           //$("#tabs"+new_page).addClass("active");
            $("#tabs"+previouspage).css("background-color","#337ab7");
           $("#tabs"+previouspage).css("color","#fff");
            //$("#tabs"+previouspage).addClass("active");
            $("#currentpage").html(previouspage);
            if(previouspage==1){
           $(".previous").addClass("disabled");

            }else{

            }
        }

        })


        $(".innovator_type").change(function(){
    var innovator_type=$(this).val();
    //alert(innovator_type)
    if(innovator_type=="Company"){
   $("#displayCompany").removeClass("hidden");
    }else{
   $("#displayCompany").addClass("hidden");
   $("#company_data").hide()
   $(".compmay_dfiels").val("");
    }
})



        $("#add_newcompany").click(function(){
            $("#displayCompany").addClass("hidden");
            $("#company_data").removeClass("hidden");
        })
            $("#close_company").click(function(){
            $("#displayCompany").removeClass("hidden");
            $("#company_data").addClass("hidden");
        })
            $("#show_terms").click(function(){
                $("#terms_modal").removeClass("hidden");
            })
            $("#closeModal").click(function(){
                $("#terms_modal").addClass("hidden");
            })




            $("#innov_submit_button").click(function(){
                var loader=$("#loader").html();
         if($("#terms_and_conditions_2").prop("checked")){
            var r = confirm("Are you sure you want to submit this innovation?, click OK to proceed or CANCEL to stop ?");
  if (r == true) {
       $("#submision_error").html("Submiting... "+loader).css("color","#000");


  var my_id=$("#user_email").val();
 $.post("Huduma_WhiteBox/innovator/innovation/page.php",{my_id:my_id},function(data){
 var datad=atob(data);
if(datad=="success"){
 $.post("Huduma_WhiteBox/innovator/send_mail.php",{my_id:my_id},function(data){});


           $("#submision_error").html(datad+"...redirecting.."+loader).css("color","#000");  
             
  var my_id=$("#user_email").val();
            $.post("Huduma_WhiteBox/innovator/innovations.php",{my_id:my_id},function(data){
                $("#home_display").html(data).show();
                $('html, body').animate({scrollTop: '0px'}, 300);
            })
        }else{
          $("#submision_error").html("An error happened").css("color","#000");  
        }
   // var my_id=$("#global_u_email").val();
/*$.get("Huduma_WhiteBox/innovator/profile/getpic.php",{

},function(data){
$("#pic_loader").html(data);

}) */
        
    })



}else{

}



         }else{
              $("#submision_error").html("Agree to the terms and conditions").css("color","red");
         }



            })


    })
</script>

    <!-- content -->

<!-- Content -->

<script type="text/javascript">
    $(document).ready(function(){
        $("#sample_stages").click(function(){
        $(".pagesbbcg").hide();
         $("#innovation_stages").show();
         $('html, body').animate({scrollTop: '0px'}, 300);
        })
        $("#view_canvasses").click(function(){
           $(".pagesbbcg").hide();
         $("#innovation_businessmodess").show();
         $('html, body').animate({scrollTop: '0px'}, 300);
         
        })
$.post("Huduma_WhiteBox/innovator/stages.php",function(data){
    $("#innovation_stages").html(data);
})


$.post("Huduma_WhiteBox/innovator/canvas.php",function(data){
    $("#innovation_businessmodess").html(data);
})

            var dd='<?php echo $page_now ?>';
             // alert(dd)
          //  alert(dd)
       // alert(dd)
            if(dd=="first_page"){
            }else{
            $("#tabs1").css("color","#337ab7");
           $("#tabs1").css("background-color","#fff");
       }
    })
</script>