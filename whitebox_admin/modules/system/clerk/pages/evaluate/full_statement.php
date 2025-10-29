<?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$innovation=base64_decode($_POST['innovation']);

 // $loginuser=base64_decode($_SESSION["username"]);

 // id
$today=time();
/*
if($loginuser){


$get_user=mysqli_query($con,"SELECT * FROM users WHERE email='$loginuser'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_user);
$first_name=$get['first_name'];
$user_id=$get['id'];
$last_name=$get['last_name'];
}
*/
       //$new_status="6b7336564f3937355236464b693953304e50714a36716f365858447669562b383932635950796863436b413d";
       //$new_status=encrypt($status, $key);
$company_class="hidden";
$documenth="";
$originality_text="";
$older_ppt="";
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
 $commun="";
 $statement="";
 $statepart="";
 $statecommn="";
 $statefund="";
 $stateimple="";
 $checked_implementers="";
$checked_funding="";
$checked_ipartners="";
$checked_others="";
$show_others="not_shown";
$cheinnovations=mysqli_query($con,"SELECT * FROM innovations_table WHERE Innovation_Id='$innovation'") or die(mysqli_error($con));

  if(mysqli_num_rows($cheinnovations)>0){

$sqlx="SELECT * FROM innovations_table where Innovation_Id='$innovation'";

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
}
$orignal_data="not_shown";
$orignald_data="";
if($originality){
  if($originality=="Yes"){
$originality_text="Why it is my original idea";
  }else{
$originality_text="Why this innovation is not my own originality idea";
  }
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
    $older_ppt="fa fa-file-pdf-o fa-2x";
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
    if($petnership_implementors){
     $implementors=$petnership_implementors; 

 $checked_implementers="checked";
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
if($getbigid){
 $company_name=$getbigid['company_name'];

if($company_name){
$mycompany_id=$company_name;
}else{
    $mycompany_id="";
}

}else{

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

$havepatners="No";
$show_nbpart="not_shown";
$shownumbers="not_shown";
$howmany=0;
$sqlx="SELECT * FROM innovators_partners where Innovation_Id='$Innovation_Id'";

                                    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

                                    while($row=mysqli_fetch_array($query_runx)){
                                        $howmany=$howmany+1;
                                    }
                                    if($howmany>0){
                                    $show_nbpart="";
                                  $havepatners="Yes";
                                  $shownumbers="";
                                    }else{
                                 $havepatners="No";
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
$documenth="fa fa-file-pdf-o fa-2x";
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


                                      <table id="details_df" class="table table-responsive table-striped col-md-12 table-bordered" width="100%">
                                        <thead>
                                          <tr><th>Field Name</th><th>Innovator's description <span class="btn theme_bg close_fulld" style="float: right;">Close</span></th></tr></thead>

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
                          <tr><td>The Solution </td><td id="ptProblemSolution"><?php echo $solution?></td></tr>
                          <tr><td>Impact </td><td id="ptCommercialModel"><?php echo $impact?></td></tr>
                                    <tr><td>My original idea?</td><td id="ptFeasibility"><?php echo $originality?></td></tr>
                          <tr><td><?php echo $originality_text?> </td><td id="ptFeasibility"><?php echo $originality_explanation?></td></tr>

                                    <tr><td>Innovation Level </td><td id="innovation_led"><?php echo $InnovationLevel?></td></tr>
                          <tr><td>Did you do a research</td><td id="ptHowItWorks"><?php echo $research?></td></tr>
                          <tr><td>Background research</td><td id="interlectualfr"><?php echo $Research_sources?></td></tr>
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
                                    
                                    <tr><td>Reasons for submission </td><td id="PastAssociationd"><?php echo "$stateimple$implementors$statefund$fund$statecommn$commun$statepart$patner"?></td></tr>
                                    <tr><td>Have Intellectual protection</td><td id="YoutubePortfolioLinksde"><?php echo $have_property?></td></tr>
                                    <tr class="<?php echo $show_propertyd?>">
                                      <td>Intellectual protection document</td>
                                      <td id="YoutubePortfolioLinksde"> 
                                        <span class="btn support_viewerd">
                                          <i class="<?php echo $older_ppt?>"></i>
                                             </span>
                                             <span style="float: right;" class="btn view_doctet" id="<?php echo $property_attachement?>">
                                              <i class="fa fa-eye"></i>View</span> 
                                             </td></tr>


                                    <tr class="<?php echo $showdocs?>">
                                      <td>Supporting Document </td>
                                      <td id="PastAssociationd">
                                        <span class="btn support_viewd">
                                          <i class="<?php echo $documenth?>"></i>
                                        </span><span style="float: right;" class="btn view_doct" id="<?php echo $attachments?>">
                                          <i class="fa fa-eye"></i>View</span>
                                        </td>
                                      </tr>
                          <tr class="<?php echo $show_links?>"><td>Additional link</td><td id="Affiliationsd"><?php echo $useful_links?></td></tr>
                                     </tbody>
                                     </table>
                                   <!-- <embed class="col-sm-12 col-xs-12 not_shown" id="pdf_shows" style src="" type="application/pdf" width="100%" height="600px" />-->
                                     
<script type="text/javascript">
  $(document).ready(function(){
    $(".support_viewerd").click(function(){
      $(".view_doctet").click();
    })
    var innovation=btoa('<?php echo $innovation?>');
    $(".view_doctet").click(function(){
       var page=btoa("evaluate");
      var doc_data=btoa($(this).attr("id"));
      //alert(doc_data)
      if(doc_data){
          //$("#pdf_shows").attr("src")="doc_data";
            $.post("modules/system/clerk/pages/evaluate/property.php",{page:page,doc_data:doc_data,innovation:innovation},function(data){
       $("#home").html(data);
})
      }else{

      }
    })




    $(".support_viewd").click(function(){
      $(".view_doct").click();
    })
   // var innovation=btoa('<?php echo $innovation?>');
    $(".view_doct").click(function(){
      var page=btoa("evaluate");
      var doc_data=btoa($(this).attr("id"));
      //alert(doc_data)
      if(doc_data){
          //$("#pdf_shows").attr("src")="doc_data";
            $.post("modules/system/clerk/pages/evaluate/documents.php",{page:page,doc_data:doc_data,innovation:innovation},function(data){
       $("#home").html(data);
})
      }else{

      }
    })
    $(".close_fulld").click(function(){
      var innovation='<?php echo $innovation?>';
      $.post("modules/system/clerk/pages/evaluate/view_information.php",{innovation:innovation},function(data){
       $("#home").html(data);
       });
    })
  })
</script>