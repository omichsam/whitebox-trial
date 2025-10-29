<?php
$yeard=base64_decode($_POST['yeard']);

?>
<style type="text/css">
	#cabinated{
    min-height: 200px;
    max-height: 200px;
    /*border: 2px solid #ccc;*/
    margin-top: 5px;
    background-size: contain !important;
background-repeat: no-repeat !important;
background-position: center center !important;
background:url('images/carbinate.jpg');
	}
	.drwasd{
min-height: 100px;
    max-height: 100px;
    /*border: 2px solid #ccc;*/
    margin-top: 5px;
    background-size: contain !important;
background-repeat: no-repeat !important;
background-position: center center !important;
background:url('images/draws.jpg');

	}
	.drwasdhd{
		text-align: center;
		text-transform: capitalize;
		font-weight: bolder;
	}
	.datab{
		text-align: center;
		font-weight: bolder;
		font-size: 30px;
		margin-top: 20px;
	}
</style>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-12 col-xs-12 default_header"><?php echo $yeard." carbinate"?><span style="float:right" class="btn theme_bg" id="cloaseds">Close</span></div>
<div class="col-sm-12 col-xs-12">
	<div class="col-sm-3 col-xs-12">
		<div class="col-sm-12 col-xs-12 " id="cabinated"></div>
	</div>
	<div class="col-sm-9 col-xs-12">
		
<?php

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


for($md=1;$md<=12;$md++){
	 if($md=="1"){
       $header="Jan";
          $datas=$jan;
               }else if($md=="2"){
                $header="Feb";
                $datas=$feb;  
                  }else if($md=="3"){
                $header="Mar";
                $datas=$mar;  
                  }else if($md=="4"){
                $header="Apr";
                $datas=$apr;  
                 }else if($md=="5"){
                $header="May";
                $datas=$may; 
                  }else if($md=="6"){
                $header="Jun";
                $datas=$jun;  
                   }else if($md=="7"){
                $header="Jul";
                $datas=$jul;  
                   }else if($md=="8"){
                $header="Aug";
                $datas=$aug;  
                   }else if($md=="9"){
                $header="Sep";
                $datas=$sep;  
                   }else if($md=="10"){
                $header="Oct";
                $datas=$oct;  
                   }else if($md=="11"){
                $header="Nov";
                $datas=$nov;  
                   }else if($md=="12"){
                $header="Dec";
       
       $datas=$dec;     }else{
               // $headerd="TOTAL"
       	$datas=""	;
            }
             $bz_ttb="";
            if($datas=="0"){
            	$bz_ttb="";
            }else{


           $bz_ttb="view_tda";
            }
?>
	<div class="col-sm-4 col-xs-6" style="border-bottom: 2px dashed #ccc;">

			<div class="col-sm-12 col-xs-12 drwasdhd"><?php echo $header?></div>
			<div class="col-sm-12 col-xs-12 btn drwasd <?php echo $bz_ttb?>" id="<?php echo $md?>" role="<?php echo $yeard?>">
				<div class="col-sm-12 col-xs-12 datab"><?php echo $datas?></div>
			</div>
	</div>

<?php
}

?>
	</div>
</div>	
</div>


<script type="text/javascript">
  $(document).ready(function(){
    $("#cloaseds").click(function(){
$.post("modules/system/super_admin/pages/innovations/innovations.php",function(data){
  $("#home").html(data);
      })
})
    $(".view_tda").click(function(){
    	var mt=btoa($(this).attr("id"));
    	var yt=btoa($(this).attr("role"));
    	$.post("modules/system/super_admin/pages/innovations/pages.php",{mt:mt,yt:yt},function(data){
  $("#home").html(data);
      })
    })
    })
</script>