<style>
.inne_doc{
    margin-top:10px;
margin-bottom:10px;
        min-height:842;
        background:#fff;
        border:1px solid #ccc;
    }
    #outer_doc{
        background:#1a1818;
    }
    #headers_disc{
        font-weight:bolder;
        font-size:32px;
        text-align:center;
        margin-top:20px;
    }
    #headers_logo{	
        margin-top: 48px;
         min-height: 73px;
		background-position: center !important;
		background-size: 100% 100% !important;
		background-repeat: no-repeat !important;
		background:url('images/logo.png');
		border-radius:20px;
    }
    .herihubbb{
        text-align:center;
        font-size:19px;
        font-weight:bolder;
        margin-top:10px;
    }
    .herihubbd{
        font-size:17px;
        font-weight:bolder;
        margin-top:10px;  
    }
    .herihuaa{
        text-align:center;
        margin-top:10px;
    }
    .herihuccc{
        text-align:center;
        font-size:24px;
        font-weight:bolder;
        margin-top:10px;
    }
    #image_holder{
       min-height:150px;
      box-shadow:0 0 2px #ccc;
      border-radius:5px;
      margin-top:10px;
      background-repeat:no-repeat !important;
      background-size:100% 100% !important;
      background-position:center center !important;
    }
    .herilocal{
        font-size:12px;
        text-align:center;
        margin-top:10px;
    }
    .herilocaled{
      font-size:17px;
        margin-top:10px;  
    }
   
    .herihuhold{
        text-transform:uppercase;
        text-align:center;
        border-bottom:2px solid #ccc;
        
		font-weight: bolder;
		margin-top: 10px;
		font-weight:bolder;
    }
    .topped{
        min-height:100px;
    }
    .numbering_d{
        text-align:right;
        margin-top:10px;
    }
</style>
<?php
include "../../../../../connect.php";
$my_user=$_POST['my_id'];
include("../../../../functions/security.php");
//$salt="A0007799Wagtreeyty";
$date=date('Y-m-d');
$email=base64_decode($my_user);
$my_userde=encrypt($my_user,$key);
$get_user=mysql_query("SELECT * FROM investors WHERE Email='$my_userde'") or die(mysql_error());
$get=mysql_fetch_assoc($get_user);
$new_First_name=base64_decode(decrypt($get['Name'],$key));
$new_company=base64_decode(decrypt($get['Company'],$key));
$new_Location=base64_decode(decrypt($get['Location'],$key));
$new_contact=base64_decode(decrypt($get['Contact'],$key));
$new_interest=base64_decode(decrypt($get['interest'],$key));
$prof_rolesd=base64_decode(decrypt($get['role'],$key));
$image=$get['image'];
if($image){
   $new_pic=base64_decode(decrypt($image,$key)); 
}else{
    $new_pic="images/user.jpg";
}

?>
<div class="col-sm-12 col-xs-12" id="outer_doc">
    <div class="col-sm-12 col-xs-12 inne_doc" id="">
        
        <div class="topped col-sm-12 col-xs-12"></div>
        <div class="col-sm-12 col-xs-12" id="headers_disc">NON-DISCLOSURE AGREEMENT BETWEEN </div>
        <div class="col-sm-12 col-xs-12" id="">
            <div class="col-sm-4 col-xs-5"></div>
            <div class="col-sm-4 col-xs-2" id="headers_logo"></div>
            </div>
            
            <div class="col-sm-12 col-xs-12 herihubbb" id="">1.	HeriHub
            </div>
            <div class="col-sm-12 col-xs-12 " id=""> <div class="col-sm-2 col-xs-2 " id=""></div><div class="col-sm-8 col-xs-8 herihuaa" id="">  National Museums of Kenya Corporate Headquarters, Museum Hill, P.O. BOX 40658- 00100
Nairobi, Kenya. E-mail: publicrelations@museums.or.ke. Tel:+254-20-8164134/35/36
Website: www.museums.or.ke</div>
            </div>
       <div class="col-sm-12 col-xs-12 herihuccc" id="">AND
            </div>
            <div class="col-sm-12 col-xs-12" id="">
          <div class="col-sm-5 col-xs-5"></div>
            <div class="col-sm-2 col-xs-2" id="image_holder" style="background:url('<?php echo $new_pic;?>')"></div>
            </div>
          <div class="col-sm-12 col-xs-12 herilocal" id="">2.	<?php echo $prof_rolesd?>
            </div>
         <div class="col-sm-12 col-xs-12 " id=""> <div class="col-sm-2 col-xs-2 " id=""></div><div class="col-sm-8 col-xs-8 herihuhold" id=""><?php echo $new_First_name?>
            </div></div>
           <div class="col-sm-12 col-xs-12 " id=""> <div class="col-sm-2 col-xs-2 " id=""></div><div class="col-sm-8 col-xs-8 herihuaa" id="">
               Company: <?php echo $new_company?>, Phone No.: <?php echo $new_contact?>, Email: <?php echo $email?>
               </div></div>
               <div class="col-sm-12 col-xs-12 " id=""> <div class="col-sm-2 col-xs-2 " id=""></div><div class="col-sm-8 col-xs-8 herihuaa" id="">
              THIS AGREEMENT is made on the Date: <?php echo $date?>
               </div></div>
          
        </div>
    
    
    <div class="col-sm-12 col-xs-12 inne_doc" id="">
        <div class="col-sm-1 col-xs-12"></div>
        <div class="col-sm-10 col-xs-12">
        <div class="topped col-sm-12 col-xs-12"></div>
        <div class="col-sm-12 col-xs-12 herilocaled" id="">3.	The parties to this Agreement may be referred to individually as “Party” and jointly as parties.”
            </div>
            <div class="col-sm-12 col-xs-12 herihubbd" id=""><span style="border-bottom:2px solid #000">RECITALS</span></div>
            <div class="col-sm-12 col-xs-12 herilocaled jutict" id="">A. HeriHub is a research and innovation hub established by ICT Authority and National Museums of Kenya (NMK) in November 2017. The purpose of the initiative was to support Heritage research, innovation and entrepreneurial capacity through incubation and promotional activities for community members. The hub is located at the NMK headquarters in Nairobi at Museum Hill.
</div>
    <div class="col-sm-12 col-xs-12 herilocaled jutict" id="">B. These innovations will be disclosed to the Recipient in the latter’s involvement in the implementation process of the innovations on condition that the Recipient will NOT disclose to any third party nor make use of the information in any manner except as set out below.
</div>

   <div class="col-sm-12 col-xs-12 " id="" style="text-align:center"><span style="font-size:19px;font-weight:bolder">AGREEMENT</span></div>
            <div class="col-sm-12 col-xs-12 herilocaled" id="">The Parties agree as follows:
</div>
</div>
<div class="col-sm-12 col-xs-12 ">
        <div class="col-sm-1 col-xs-1 no_padding numbering_d">1.</div>
      <div class="col-sm-10 col-xs-10 herilocaled jutict" id="">“Proprietary Information” means confidential proprietary information (which may include but not limited to technical designs or data, business or financial, machine-readable or interpreted information, information contained in physical components, mask works or artworks in written or other permanent form) that is delivered to the Recipient through the innovation submission and evaluation process. A non-written disclosure shall be considered Proprietary Information to the extent that such disclosure is orally identified as Proprietary Information at the time of disclosure and is confirmed in writing by the HERIHUB.</div>
    </div>
    <div class="col-sm-12 col-xs-12 ">
        <div class="col-sm-1 col-xs-1 no_padding numbering_d">2.</div>
    <div class="col-sm-10 col-xs-10 herilocaled jutict" id="">The Recipient agrees not to disclose to any third party any Proprietary Information without the HERIHUB’s prior written authorization. The Recipient agrees to abide by nondisclosure terms in this Agreement. The Recipient will maintain the confidentiality of the Proprietary Information with at least the same degree of care that it uses to protect its own confidential information, but no less than a reasonable degree of care under the circumstances.</div>

</div>

    
</div>
    
    
        <div class="col-sm-12 col-xs-12 inne_doc" id="">
            
        <div class="topped col-sm-12 col-xs-12"></div>
        <div class="col-sm-12 col-xs-12 ">
        <div class="col-sm-1 col-xs-1 no_padding numbering_d">3.</div>
<div class="col-sm-10 col-xs-10 herilocaled jutict" id="">The Recipient will not be liable for the disclosure of any Proprietary Information that is: (a)
rightfully in the public domain other than by a breach of a duty to the HERIHUB; (b) rightfully received from a third party without any obligation of confidentiality; (c) rightfully known to the recipient without any limitation on use or disclosure prior to its receipt from the HERIHUB; (d) independently developed by the Recipient; or (e) generally made available to third parties by the HERIHUB without restriction on disclosure. Should the Recipient be faced with legal action or a requirement under Kenya Government regulations to disclose Proprietary Information received under this Agreement, the Recipient shall, as soon as possible, notify the HERIHUB, and upon receipt of the request, HERIHUB shall reasonably cooperate in contesting such disclosure. Except in association with a failure to discharge the responsibilities set forth in this paragraph, neither Party shall be liable for any disclosures made pursuant to judicial action or Kenya Government regulations.
</div>
</div>
       <div class="col-sm-12 col-xs-12 ">
        <div class="col-sm-1 col-xs-1 no_padding numbering_d">4.</div>
<div class="col-sm-10 col-xs-10 herilocaled jutict" id="">The Parties agree that after three (3) years from the date of this Agreement the Recipient shall be relieved of all obligations under this Agreement.</div>
</div>

 <div class="col-sm-12 col-xs-12 ">
        <div class="col-sm-1 col-xs-1 no_padding numbering_d">5.</div>
<div class="col-sm-10 col-xs-10 herilocaled jutict" id="">The Recipient will, upon receipt of a written request from the HERIHUB, make reasonable efforts to promptly destroy or return all of the HERIHUB’s Proprietary Information and copies (save for one copy for archival purposes) and immediately cease using the same.</div>
</div>

<div class="col-sm-12 col-xs-12 ">
        <div class="col-sm-1 col-xs-1 no_padding numbering_d">6.</div>
<div class="col-sm-10 col-xs-10 herilocaled jutict" id="">In this Agreement, references to the Recipient and the HERIHUB shall be deemed to include
respectively any Affiliate. For this purpose, Affiliate shall mean any corporate member of the
Party or any company controlling, controlled by or under common control with the relevant Party.
</div>
</div>
<div class="col-sm-12 col-xs-12 ">
        <div class="col-sm-1 col-xs-1 no_padding numbering_d">7.</div>
<div class="col-sm-10 col-xs-10 herilocaled jutict" id="">This Agreement does not create a joint venture, partnership or other form of business association between the Parties and does not obligate the Parties to enter into any such relationship. Both Parties understand and acknowledge that no license under any patents, trademarks, copyrights or mask works is granted to or conferred upon either Party in this Agreement or by the disclosure of any Proprietary Information.
</div>
</div>





</div>
    
    <div class="col-sm-12 col-xs-12 inne_doc" id="">
        <div class="topped col-sm-12 col-xs-12"></div>
        
        
<div class="col-sm-12 col-xs-12 ">
        <div class="col-sm-1 col-xs-1 no_padding numbering_d">8.</div>
<div class="col-sm-10 col-xs-10 herilocaled jutict" id="">Neither Party has any obligation to disclose Proprietary Information to the other. Either Party may terminate this Agreement at any time without cause upon written notice to the other Party, provided that each Party’s obligations with respect to Proprietary Information disclosed during the term of this Agreement will survive any termination. The failure of a Party to enforce a right under this Agreement will not be deemed a waiver of any subsequent right.</div>
</div>

<div class="col-sm-12 col-xs-12 ">
        <div class="col-sm-1 col-xs-1 no_padding numbering_d">9.</div>
<div class="col-sm-10 col-xs-10 herilocaled jutict" id="">This Agreement shall be governed by and construed in accordance with the law of the Republic of Kenya and the Parties hereby submit to the jurisdiction of the Republic of Kenya.</div>
</div>
        
        <div class="col-sm-12 col-xs-12 ">
        <div class="col-sm-1 col-xs-1 no_padding numbering_d"></div>
<div class="col-sm-10 col-xs-10 herilocaled jutict" id="">
  <div class="col-sm-12 col-xs-12">
<div class="col-xs-4 col-sm-8 no_padding">
<label class="input_ipc">
Agree
  <input type="checkbox" id="agreedisclosure">
  <span class="checkmark"></span>
  
</label>
</div>
<div class="col-xs-8 col-sm-4">
<span class="btn theme_bg span_disclamer" id="disclosure_agreed" role="agree">Save</span>
</div>
</div>  
  <div class="col-sm-12 col-xs-12" id="disclosure_error" style="text-align:center"></div>  
    
</div>
</div>
    </div>
    
</div>
<script>
    $(document).ready(function(){
        
       $("#disclosure_agreed").click(function(){
           if($("#agreedisclosure").prop("checked")){
               var my_id=$("#global_u_email").val();
               
               var loader=$("#loader").html();
                $("#disclosure_error").html(loader);
                  $.post("modules/system/investor/pages/profile/agreed.php",{
                      my_id:my_id  
                      },function(data){
                          if($.trim(data)=="success"){
                                $.post("modules/system/investor/pages/profile/profile.php",{
                      my_id:my_id  
                      },function(data){
                            $("#disclosure_error").html(""); 
                            $("#home").html(data);
                      })
                          }else{
                           
                $("#disclosure_error").html(data);   
                          }
                       })
                  }else{
                       $("#disclosure_error").html("Agree to the non-disclosure terms and conditions first!").css("color","red");
       
              // alert("not checked");
           }
       }) 
        
    })
</script>