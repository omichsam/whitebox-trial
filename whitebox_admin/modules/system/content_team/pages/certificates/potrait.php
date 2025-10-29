<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="col-sm-12 col-xs-12">
    <div class="btn btn-success col-sm-3 col-xs-4" onclick="generatePDF()">Download <i class="fa fa-download"></i>
    </div>
</div>
   <div class="col-sm-12 col-xs-12 no_padding" id="certbs">

    <style>
    @media all and (max-width:768px){
.mobile_hidden{
    display: none;
}
.mobipdless{
    padding: 4px  !important;
 }

}
@media all and (min-width: 768px){
.desktop_hidden{
    display: none;
}

}

 .hapy_divs{
            display:inline;
        }
        .happy_day{
            height:100px !important; 
            width:80px !important;
            border:2px solid #000;
            border-radius:8px; 
            background-repeat:no-repeat !important;
            background-size:100% 100% !important;
           
            background-position:center center !important;
            margin-top:3px;
        }
         .happy_daysa{
            height:100px !important; 
            width:80px !important;
            border-radius:8px; 
            background-repeat:no-repeat !important;
            background-size:100% 100% !important;
           
            background-position:center center !important;
            margin-top:3px;
        }
       .not_shown{
           display:none;
       }
       #top_bun{
        margin-top: 30px;
        border-top:10px solid #02b0e3;
        border-left:10px solid #02b0e3;
        border-right:10px solid #02b0e3;
           height: 200px !important;
            background-repeat:no-repeat !important;
            background-size:100% 100% !important;
           background:url('modules/system/content_team/pages/certificates/heading.jpg');
            background-position:center center !important;
       
       }
       #photoh{
    height: 174px;
background-color: #a88c8c;
border-radius: 102px;
border: 5px solid #fff;

            background-repeat:no-repeat !important;
            background-size:100% 100% !important;
           background:url('modules/system/content_team/pages/certificates/foot.jpg');
            background-position:center center !important;
       }
       #photoh_small{
      height: 118px;

background-color: #a88c8c;

border-radius: 58px;

border: 5px solid #fff;

margin-top: 29px;

            background-repeat:no-repeat !important;
            background-size:100% 100% !important;
            background-position:center center !important;
       }
       #Headings_Big{
        /*color: linear-gradient(to bottom, #ffcc99 -3%, #ccffff 100%);*/
        color:#ccc;
        font-size: 37px;
font-family: algerian;
       }
       #Headings_small{
        color:#ccc;
        font-size: 19px;
font-family: algerian;
       }
       #body_holding{
        min-height: 578px;
        border-left:10px solid #02b0e3;
        border-right:10px solid #02b0e3;
        background: #fff;

       }
       #Body_left{
        min-height: 600px;
        border-right:4px solid #ccc;
       }
       #Body_rignt{
            min-height: 600px;
       }
       #botton_bun{

        border-left:10px solid #02b0e3;
        border-right:10px solid #02b0e3;
         height: 200px !important;
            background-repeat:no-repeat !important;
            background-size:100% 100% !important;
           background:url('modules/system/content_team/pages/certificates/foot.jpg');
            background-position:center center !important;
            
        border-bottom:10px solid #02b0e3;
       }
       #contacts_hods{
        min-height: 50px;
        margin-bottom: 5px;
       }
       .bodes_hods{
        height: 50px;
         background-repeat:no-repeat !important;
            background-size:100% 100% !important;
           background:url('modules/system/content_team/pages/certificates/rows.jpg');
            background-position:center center !important;
            
       }
       .base_headers{
        color:#ccc;
        font-size: 25px;
       font-family: algerian;
       text-transform: capitalize;
       }
       .justifiedtext{
        text-align:justify;
       }
       .conhnm{
        height: 29px;
        border-radius: 10px;
        background: #00a3e8;;
        color:#fff;
       }
       .content_holders{
        margin-top: 4px;
        margin-bottom: 4px;
       }
       .h_centers{
        font-weight: bolder;
        text-transform: uppercase;
        margin-top: 5px;
       }
       #experience_separator{
        margin-bottom: 10px;
       }
       .croses{
           margin-top:5px;
           min-height:300px;
           max-height:300px;
         
           border:2px solid #ccc;
           background-repeat:no-repeat !important;
            background-size:100% 100% !important;
            background-position:center center !important;
       }
       .croseed{
            margin-top:5px;
           min-height:300px;
           max-height:300px;
         
           background-repeat:no-repeat !important;
            background-size:100% 100% !important;
            background-position:center center !important;
       }
       .display_id_det{
    font-size: 12px;
    font-weight: 200px;
    text-align: center;
}
.p_sign{
    min-height: 50px;
}
.budges{
min-height: 101px;
    background-repeat: no-repeat;
    opacity: 1;
    
    background-image: url('modules/system/content_team/pages/certificates/award.jpg');
    background-repeat: no-repeat;
    background-size: contain;
    background-position: center;
}
#budges_holders{
    
margin-top: -101px;
}
    </style>
    <?php 


include "../../../../../connect.php";
$sql="SELECT * FROM e_learning_users Limit 0,10";
        $query_run=mysqli_query($con,$sql)or die($query_run."<br/><br/>".mysqli_error($con));
                while($row=mysqli_fetch_array($query_run)){
         
    $first_name=$row['first_name'];
    $Last_name=$row['Last_name'];
    $Gender=$row['Gender'];
    $useremail=$row['email'];

     
    $name="$first_name &nbsp;&nbsp;  $Last_name";
    

        
if($Gender=="Male"){
    $tgender="his";

}else{
$tgender="her";
}

       /* $sqldp="SELECT * FROM curriculum_coverage WHERE colm_4='$useremail'";
        $query_rundp=mysqli_query($con,$sqldp)or die($query_rundp."<br/><br/>".mysqli_error($con));
                while($row=mysqli_fetch_array($query_rundp)){
                    $coveragep=$row['colm_11'];

                   
                    if($coveragep){
                        $award="";
                        }else{
                        $award="not_shown";
                        }
                    
}
*/
    
 ?>
            <!--
            cv start -->
                <!--
                certificates-->
                
                    <div class="col-lg-12 col-md-12 col-sm-12 mobile_hidden " data-aos="flip-up" style="margin-bottom:90px" id=""> 
                  
                
          <div class="col-lg-12 col-md-12 col-sm-12  "> 
         <div class="col-lg-12 col-md-12 col-sm-12 mobile_hidden" id="top_bun">
                <div class="col-lg-12 col-md-12 col-sm-12 " style="height:25px" >&nbsp;</div>
                <div class="col-lg-12 col-md-12 col-sm-12 " >
                        <div class="col-lg-1 col-md-1 col-sm-1 col-md-1"></div>
                    
                  </div>
        </div>
<div class="col-lg-12 col-md-12 col-sm-12 col-md-12  no_padding" id="body_holding">
    

<div class="col-sm-12 col-xs-12 no_padding" style="text-align:center;font-size:45px;font-weight: bold;font-family:Times New Roman, Times, serif !important;min-height: 100px;"> CERTIFICATE OF PARTICIPATION</div>
<div class="col-sm-12 col-xs-12" style="text-align:center;font-size: 26px;min-height: 50px">AWARDED TO</div>
<div class="col-sm-12 col-xs-12" id="budges_holders">
        <div class="col-sm-6 col-xs-6 budges" style="background-position: left;"></div>
        <div class="col-sm-6 col-xs-6 budges" style="background-position:right;"></div>


    </div>
<div class="col-sm-12 col-xs-12 no_padding" ><div class="col-sm-1 col-xs-1"></div><div class="col-sm-10 col-xs-10"style="border-bottom:2px dashed #ccc;text-transform: uppercase; font-size: 40px;font-weight: bold;text-align:center;font-family: cursive !important;"><?php echo $name?></div></div>

<div class="col-sm-12 col-xs-12" style="/*min-height: 2383px;*/font-size: 32px; text-align: center;">
    <div class="col-sm-12 col-xs-12" style="min-height: 50px;"></div>
    <div class="col-sm-12 col-xs-12" style="font-family:Serif, Times New Roman !important;">
    For participating as a whitebox e-learner in the whitebox e-learning platform powered by the Kijiji. 
</div>
</div>

<div class="col-sm-12 col-xs-12" style="text-align:center">
     <div class="col-sm-2 col-xs-2" ></div>
  <div class="col-sm-8 col-xs-8" style="min-height: 267px;
min-height: 318px;
    background-repeat: no-repeat;
    opacity: 0.2;
    margin-top: -245px;
    background-image: url('modules/system/content_team/pages/certificates/logo.png');
    background-repeat: no-repeat;
    background-size: contain;
    background-position: center;
" ></div>  
</div>
<div class="col-sm-12 col-xs-12" >
<div class="col-sm-4 col-xs-4"> 
    <div class="col-sm-1 col-xs-1"></div>
<div class="  col-sm-10 co-xs-10 display_id_det">
           <div class="p_d_b no_padding col-sm-12 col-xs-12">Mr. Kevin Atibu</div>
            <div class=" no_padding col-sm-12 col-xs-12 "style="text-align:center"><div class="p_sign col-sm-12 col-xs-12" style="background-image:url('modules/system/content_team/pages/certificates/sign.png');background-size: contain !important;background-repeat: no-repeat !important;background-position: center;"></div></div>
          
            <div class=" no_padding p_d_b col-sm-12 col-xs-12">Head of Innovations, ICT-Authority</div>
            
       




 </div></div> 
<div class="col-sm-4 col-xs-4" style="text-align:center"> 
<div class="col-sm-12 col-xs-12" style="background-image: url('modules/system/content_team/pages/certificates/index.png');
min-height: 107px;
background-size: contain;
background-repeat: no-repeat;
background-position: center;
"></div>
</div> 
<div class="col-sm-4 col-xs-4"> 
    <div class="col-sm-1 col-xs-1"></div>
<div class="  col-sm-10 co-xs-10 display_id_det">
           <div class="p_d_b no_padding col-sm-12 col-xs-12">Mrs. Freyja Oddsdottir</div>
            <div class=" no_padding col-sm-12 col-xs-12 "style="text-align:center"><div class="p_sign col-sm-12 col-xs-12" style="background-image:url('modules/system/content_team/pages/certificates/signature2.png');background-size: contain !important;background-repeat: no-repeat !important;background-position: center;"></div></div>
          
            <div class=" no_padding p_d_b col-sm-12 col-xs-12">Director, The Kijiji</div>
            
        </div>
           


 </div> 
</div><!--
<div class="col-sm-12 col-xs-12" style="text-align:center;font-weight:bold;"><?php echo $faculty_name?></div>
<div class="col-sm-12 col-xs-12" style="text-align:center;"><?php echo $School?></div>-->

</div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-md-12" id="botton_bun"></div>
            </div>
                <div class="clearfix"></div>
            </div>
              <?php
          }

              ?>

              <!-- end of cv-->
        
</div>
        
            <script type="text/javascript">   
                
      function generatePDF(){
        /*
    var element = document.getElementById('certbs');
html2pdf(element);

   var worker = html2pdf();
   var worker = html2pdf().from(element).save();
*/

var element = document.getElementById('certbs');
var opt = {
  margin:       1,
  filename:     'myfile.pdf',
  image:        { type: 'jpeg', quality: 0.98 },
  html2canvas:  { scale: 2 },
  jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
};

// New Promise-based usage:
html2pdf().set(opt).from(element).save();

// Old monolithic-style usage:
html2pdf(element, opt);



}
</script>