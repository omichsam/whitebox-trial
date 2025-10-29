<style>
    .rows_cart{
        min-height:40px;
        border-bottom:2 px solid #ccc;
    }
    .cellses{
        min-height:40px;
        border:2px solid #ccc;
    }
    .headers{
        min-height:30px;
        text-transform:uppercase;
        font-weight:bolder;
        background:#ccc;
        color:#1c0301;
    }
    .table_head{
        margin-top:20px;
    }
    .dataerd{
        
        font-size:15px;
        font-weight:bolder;
    }
</style>
<?php

include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$data_status="pending";
$sqlx="SELECT * FROM innovations_table Where status!='$data_status'";

//$sqlx="SELECT * FROM innovations_table LIMIT $offset,$no_of_records_per_page";


   
?>
<div class="col-sm-12 col-xs-12">
    <?php
    $totalsubmitted=0;
    $headerd="";
    $gyear=date('Y');
    //echo $gyear;
    $newy=$gyear-2;
    for($f=$gyear;$f>=$newy;$f--){
$jan=0;
$feb=0;
$mar=0;
$apr=0;
$may=0;
$jun=0;
$jul=0;
$aug=0;
$sep=0;
$oct=0;
$nov=0;
$dec=0;
$query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));
while($row=mysqli_fetch_array($query_runx)){
  $date_added=$row['date_added'];
  $new_state=$row['Status'];
  $afterdate=date('m/d/Y H:i:s', $date_added);
  
$time=strtotime($afterdate);
$month=date("M",$time);
$year=date("Y",$time);
 if($f==$year){
if($month=="Jan"){
    $jan=$jan+1;

    
}else if($month=="Feb"){
    $feb=$feb+1;
    
}else if($month=="Mar"){
    $mar=$mar+1;
}else if($month=="Apr"){
    $apr=$apr+1;
}else if($month=="May"){
    $may=$may+1;
}else if($month=="Jun"){
    $jun=$jun+1;
    
}else if($month=="Jul"){
    $jul=$jul+1;
}else if($month=="Aug"){
    $aug=$aug+1;
}else if($month=="Sep"){
    $sep=$sep+1;
}else if($month=="Oct"){
    $oct=$oct+1;
    
}else if($month=="Nov"){
    $nov=$nov+1;
}else if($month=="Dec"){
    $dec=$dec+1;
}else{
    
}
    }else{
        
    }
    
}
$janev=0;
$febev=0;
$marev=0;
$aprev=0;
$mayev=0;
$junev=0;
$julev=0;
$augev=0;
$sepev=0;
$octev=0;
$novev=0;
$decev=0;
//second evaluation
$jansec=0;
$febsec=0;
$marsec=0;
$aprsec=0;
$maysec=0;
$junsec=0;
$julsec=0;
$augsec=0;
$sepsec=0;
$octsec=0;
$novsec=0;
$decsec=0;
$jan_decline=0;
$feb_decline=0;
$mar_decline=0;
$apr_decline=0;
$may_decline=0;
$jun_decline=0;
$jul_decline=0;
$aug_decline=0;
$sep_decline=0;
$oct_decline=0;
$nov_decline=0;
$dec_decline=0;
//first evaluations
$jan_firstevaluates=0;
$feb_firstevaluates=0;
$mar_firstevaluates=0;
$apr_firstevaluates=0;
$may_firstevaluates=0;
$jun_firstevaluates=0;
$jul_firstevaluates=0;
$aug_firstevaluates=0;
$sep_firstevaluates=0;
$oct_firstevaluates=0;
$nov_firstevaluates=0;
$dec_firstevaluates=0;



//end of first evaluations
$jan_exedecline=0;
$feb_exedecline=0;
$mar_exedecline=0;
$apr_exedecline=0;
$may_exedecline=0;
$jun_exedecline=0;
$jul_exedecline=0;
$aug_exedecline=0;
$sep_exedecline=0;
$oct_exedecline=0;
$nov_exedecline=0;
$dec_exedecline=0;
//$data_status=encrypt("pending",$key);
$sqlxde="SELECT * FROM innovation_stamps";
$query_runxfr=mysqli_query($con,$sqlxde) or die($query_runxfr."<br/><br/>".mysqli_error($con));
while($row=mysqli_fetch_array($query_runxfr)){
$first_evaluation=intval($row['first_evaluation']);
$Second_evaluation=intval($row['Second_evaluation']);    
$Innovation_Id=$row['innovation_id'];
//echo $Innovation_Id;
$get_innovation=mysqli_query($con,"SELECT Status FROM innovations_table where Innovation_Id='$Innovation_Id'") or die(mysqli_error($con));
$get=mysqli_fetch_assoc($get_innovation);
$innovation_status=$get['Status'];  
//echo $innovation_status;
$first_evaluationd=date('m/d/Y H:i:s', $first_evaluation);
  //echo $first_evaluationd." ";
$first_evaluationt=strtotime($first_evaluationd);
$monthev=date("M",$first_evaluationt);
$yearev=date("Y",$first_evaluationt);

//first evalustion
//echo $monthev;
 if($f==$yearev){
if($monthev=="Jan"){
    $janev=$janev+1;
if($innovation_status=="first_disapproved"){
$jan_decline=$jan_decline=+1;

  }else{

  } 
       
    
    
}else if($monthev=="Feb"){
    $febev=$febev+1;
    if($innovation_status=="first_disapproved"){
$feb_decline=$feb_decline=+1;
  }else{

  } 
}else if($monthev=="Mar"){
    $marev=$marev+1;
      if($innovation_status=="first_disapproved"){
$mar_decline=$mar_decline=+1;
  }else{

  }
}else if($monthev=="Apr"){
    $aprev=$aprev+1;
        if($innovation_status=="first_disapproved"){
$apr_decline=$apr_decline=+1;
  }else{

  }
}else if($monthev=="May"){
    $mayev=$mayev+1;
         if($innovation_status=="first_disapproved"){
$may_decline=$may_decline=+1;
  }else{

  }
}else if($monthev=="Jun"){
    $junev=$junev+1;
            if($innovation_status=="first_disapproved"){
$jun_decline=$jun_decline=+1;
  }else{

  }
}else if($monthev=="Jul"){
    $julev=$julev+1;
               if($innovation_status=="first_disapproved"){
$jul_decline=$jul_decline=+1;
  }else{

  }
}else if($monthev=="Aug"){
    $augev=$augev+1;
               if($innovation_status=="first_disapproved"){
$aug_decline=$aug_decline=+1;
  }else{

  }
}else if($monthev=="Sep"){
    $sepev=$sepev+1;
               if($innovation_status=="first_disapproved"){
$sep_decline=$sep_decline=+1;
  }else{

  }
}else if($monthev=="Oct"){
    $octev=$octev+1;
               if($innovation_status=="first_disapproved"){
$oct_decline=$oct_decline=+1;
  }else{

  }
}else if($monthev=="Nov"){
    $novev=$novev+1;
if($innovation_status=="first_disapproved"){
$nov_decline=$nov_decline=+1;
  }else{

  }
}else if($monthev=="Dec"){
    $decev=$decev+1;
               if($innovation_status=="first_disapproved"){
$dec_decline=$dec_decline=+1;
  }else{

  }
}else{
    
}
    }else{
        
    }
    //secon evaluation
   // $Second_evaluationd=0;
    //$Second_evaluation=0;
$Second_evaluation=intval($row['Second_evaluation']);

$Second_evaluationd=date('m/d/Y H:i:s', $Second_evaluation);
  //echo $first_evaluationd." ";
$Second_evaluationt=strtotime($Second_evaluationd);
$monthsec=date("M",$Second_evaluationt);
$yearsec=date("Y",$Second_evaluationt);
//echo $monthev;

 if($f==$yearsec){
if($monthsec=="Jan"){
    $jansec=$jansec+1;
   if($innovation_status=="disapproved"){
$jan_exedecline=$dec_exedecline=+1;
  }else{

  }
}else if($monthsec=="Feb"){
    $febsec=$febsec+1;
      if($innovation_status=="disapproved"){
$feb_exedecline=$feb_exedecline=+1;
  }else{

  }
}else if($monthsec=="Mar"){
    $marsec=$marsec+1;
         if($innovation_status=="disapproved"){
$mar_exedecline=$mar_exedecline=+1;
  }else{

  }
}else if($monthsec=="Apr"){
    $aprsec=$aprsec+1;
         if($innovation_status=="disapproved"){
$apr_exedecline=$apr_exedecline=+1;
  }else{

  }
}else if($monthsec=="May"){
    $maysec=$maysec+1;
         if($innovation_status=="disapproved"){
$may_exedecline=$may_exedecline=+1;
  }else{

  }
}else if($monthsec=="Jun"){
    $junsec=$junsec+1;
         if($innovation_status=="disapproved"){
$jun_exedecline=$jun_exedecline=+1;
  }else{

  }
}else if($monthsec=="Jul"){
    $julsec=$julsec+1;
         if($innovation_status=="disapproved"){
$jul_exedecline=$jul_exedecline=+1;
  }else{

  }
}else if($monthsec=="Aug"){
    $augsec=$augsec+1;
         if($innovation_status=="disapproved"){
$aug_exedecline=$aug_exedecline=+1;
  }else{

  }
}else if($monthsec=="Sep"){
    $sepsec=$sepsec+1;
         if($innovation_status=="disapproved"){
$sep_exedecline=$sep_exedecline=+1;
  }else{

  }
}else if($monthsec=="Oct"){
    $octsec=$octsec+1;
         if($innovation_status=="disapproved"){
$oct_exedecline=$oct_exedecline=+1;
  }else{

  }
}else if($monthsec=="Nov"){
    $novsec=$novsec+1;
         if($innovation_status=="disapproved"){
$nov_exedecline=$nov_exedecline=+1;
  }else{

  }
}else if($monthsec=="Dec"){
    $decsec=$decsec+1;
         if($innovation_status=="disapproved"){
$dec_exedecline=$dec_exedecline=+1;
  }else{

  }
}else{
    
}
    }else{
        
    }
}
    ?>
    
    
    
    <div class="col-xs-12 col-sm-12 default_header table_head"><?php echo $f?></div>
    <?php
    $data_gh="";
    for($a=0;$a<=6;$a++){
        $header="";
        if($a=="0"){
            $cellcalss="headers";
        }else if($a=="1"){
            $cellcalss="";
            $data_gh="Submitted";
        }else if($a=="2"){
            $cellcalss="";
            $data_gh="1st Evaluation";
        }else if($a=="3"){
            $cellcalss="";
            $data_gh="2nd Evaluation";
        }else if($a=="4"){
            $cellcalss="";
            $data_gh="Accepted";
        }else if($a=="5"){
            $cellcalss="";
            $data_gh="Implemented";
        }else  if($a=="6"){
            $cellcalss="";
            $data_gh="Declined";
        }else{
            
        }
    ?>
    <div class="col-sm-12 col-xs-12 rows_cart no_padding <?php echo $cellcalss?>">
    <div class="col-sm-2 col-xs-2 cellses " style="font-weight:bolder"> <?php echo $data_gh?> </div>
    <div class="col-sm-9 col-xs-9 no_padding">
        
        <?php
        for($ds=1;$ds<=12;$ds++){
            if($cellcalss==""){
                if($data_gh=="Submitted"){
                if($ds=="1"){
                $header=$jan;
            }else if($ds=="2"){
                $header=$feb;
            }else if($ds=="3"){
                $header=$mar;
            }else if($ds=="4"){
                $header=$apr;
            }else if($ds=="5"){
                $header=$may;
            }else if($ds=="6"){
                $header=$jun;
            }else if($ds=="7"){
                $header=$jul;
            }else if($ds=="8"){
                $header=$aug;
            }else if($ds=="9"){
                $header=$sep;
            }else if($ds=="10"){
                $header=$oct;
            }else if($ds=="11"){
                $header=$nov;
            }else if($ds=="12"){
                $header=$dec;
            }else{
            
            }
           $totalsubmitted="";
              $totalsubmitted=$dec+$nov+$oct+$sep+$aug+$jul+$jun+$may+$apr+$mar+$feb+$jan;
            $headerd=$totalsubmitted;

                }else if($data_gh=="1st Evaluation"){
                        if($ds=="1"){
                $header=$janev;
              //  echo $header;
            }else if($ds=="2"){
                $header=$febev;
                //echo $header;
            }else if($ds=="3"){
                $header=$marev;
            }else if($ds=="4"){
                $header=$aprev;
            }else if($ds=="5"){
                $header=$mayev;
            }else if($ds=="6"){
                $header=$junev;
            }else if($ds=="7"){
                $header=$julev;
            }else if($ds=="8"){
                $header=$augev;
            }else if($ds=="9"){
                $header=$sepev;
            }else if($ds=="10"){
                $header=$octev;
            }else if($ds=="11"){
                $header=$novev;
            }else if($ds=="12"){
                $header=$decev;
            }else{
                $header="";
            }  
                    
                  $first_evaluates="";
              $first_evaluates=$decev+$novev+$octev+$sepev+$augev+$julev+$junev+$mayev+$aprev+$marev+$febev+$janev;
            $headerd=$first_evaluates;  
                }else if($data_gh=="2nd Evaluation"){
                        if($ds=="1"){
                $header=$jansec;
              //  echo $header;
            }else if($ds=="2"){
                $header=$febsec;
                //echo $header;
            }else if($ds=="3"){
                $header=$marsec;
            }else if($ds=="4"){
                $header=$aprsec;
            }else if($ds=="5"){
                $header=$maysec;
            }else if($ds=="6"){
                $header=$junsec;
            }else if($ds=="7"){
                $header=$julsec;
            }else if($ds=="8"){
                $header=$augsec;
            }else if($ds=="9"){
                $header=$sepsec;
            }else if($ds=="10"){
                $header=$octsec;
            }else if($ds=="11"){
                $header=$novsec;
            }else if($ds=="12"){
                $header=$decsec;
            }else{
                $header="";
            }  
                 $sec_evaluates="";
              $sec_evaluates=$decsec+$novsec+$octsec+$sepsec+$augsec+$julsec+$junsec+$maysec+$aprsec+$marsec+$febsec+$jansec;
            $headerd=$sec_evaluates; 
                    
                }else if($data_gh=="Declined"){
                        if($ds=="1"){
                $header=$jan_decline+$jan_exedecline;
              //  echo $header;
            }else if($ds=="2"){
                $header=$feb_decline+$feb_exedecline;
                //echo $header;
            }else if($ds=="3"){
                $header=$mar_decline+$mar_exedecline;
            }else if($ds=="4"){
                $header=$apr_decline+$apr_exedecline;
            }else if($ds=="5"){
                $header=$may_decline+$may_exedecline;
            }else if($ds=="6"){
                $header=$jun_decline+$jun_exedecline;
            }else if($ds=="7"){
                $header=$jul_decline+$jul_exedecline;
            }else if($ds=="8"){
                $header=$aug_decline+$aug_exedecline;
            }else if($ds=="9"){
                $header=$sep_decline+$sep_exedecline;
            }else if($ds=="10"){
                $header=$oct_decline+$oct_exedecline;
            }else if($ds=="11"){
                $header=$nov_decline+$nov_exedecline;
            }else if($ds=="12"){
                $header=$dec_decline+$dec_exedecline;
            }else{
                $header="";
            }  
                $declines="";
              $declines=$dec_decline+$nov_decline+$oct_decline+$sep_decline+$aug_decline+$jul_decline+$jun_decline+$may_decline+$apr_decline+$mar_decline+$feb_decline+$jan_decline+$dec_exedecline+$nov_exedecline+$oct_exedecline+$sep_exedecline+$aug_exedecline+$jul_exedecline+$jun_exedecline+$may_exedecline+$apr_exedecline+$mar_exedecline+$feb_exedecline+$jan_exedecline;
            $headerd=$declines;  
                    
                }else{
            $headerd="";  
                }
            }else{
            if($ds=="1"){
                $header="Jan";
            }else if($ds=="2"){
                $header="Feb";
            }else if($ds=="3"){
                $header="Mar";
            }else if($ds=="4"){
                $header="Apr";
            }else if($ds=="5"){
                $header="May";
            }else if($ds=="6"){
                $header="Jun";
            }else if($ds=="7"){
                $header="Jul";
            }else if($ds=="8"){
                $header="Aug";
            }else if($ds=="9"){
                $header="Sep";
            }else if($ds=="10"){
                $header="Oct";
            }else if($ds=="11"){
                $header="Nov";
            }else if($ds=="12"){
                $header="Dec";
            }else{
                $headerd="TOTAL";
            }
             $headerd="TOTAL";
            }
        ?>
        <div class="col-sm-1 col-xs-1 cellses dataerd"><?php echo $header?></div>
        <?php
        
        }
        ?>
    </div>






    <div class="col-sm-1 col-xs-1  cellses"><?php echo $headerd?> </div>



    </div>
    <?php
    
    }
}
?>
</div>
<div class="col-sm-12 col-xs-12" style="min-height:20px"></div>