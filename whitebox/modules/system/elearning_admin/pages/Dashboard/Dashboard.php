<style type="text/css">
  #analytics_base{
    margin-top: 10px;
    max-height: 430px;
    overflow: auto;
  }
  .data_dvsz{
    min-height: 100px;
    margin-top: 10px;
    box-shadow: 2px 2px 2px #ddd;
    background:#ddd;
    border-radius: 5px;
      cursor: pointer;

  }
  .active_btnd{
    min-height: 100px;
    margin-top: 10px;
    box-shadow: 0 0 15px #000;
    background:#ddd;
    border-radius: 5px;
      cursor: pointer;

  }
  .data_dvsz:hover{
    box-shadow: 0 0 15px #000;
    

  }
  .innovation_data{
    min-height: 10px;

  }
  .count_holder{
min-height: 20px;
box-shadow: 0 0 2px #ccc;
border-radius: 5px;
text-align: center;
font-size: 32px;
font-weight: bold;
  }
  .button_viewinno{
    cursor: pointer;
    text-align: right;
    text-transform: uppercase;
    font-weight: bold;
    color: #e7663c;

  }
  .data_outer{
    border-radius: 5px;
    border:#e6b234  solid 2px;
  }
  .analytics_divs{
    margin: 10px;
    border-top: 2px dashed #ccc;
    /*box-shadow: 0 0 3px #ccc;
    min-height: 220px;
    padding-top: 10px;
    border-right: 2px solid #ccc;
    */
  }
    .chart_gr{
  display:table;
  table-layout: fixed;   
  
  width:60%;
  max-width:700px;
  height:200px;
  margin:0 auto;
  
  background-image:linear-gradient(bottom, rgba(0, 0, 0, 0.1) 2%, transparent 2%);
  background-size: 100% 50px;
  background-position: left top;
  
  li{
    position:relative;
    display:table-cell;
    vertical-align:bottom;
    height:200px;
  }
  
  span{
    margin:0 1em;
    display: block;
    background: rgba(#d1ecfa, .75);
    animation: draw 1s ease-in-out;
    
    &:before{
      position:absolute;
      left:0;right:0;top:100%;
      padding:5px 1em 0;
      display:block;
      text-align:center;
      content:attr(title);
      word-wrap: break-word;
    }
    
  }
  
}

@keyframes draw{
  0%{height:0;} 
}
</style>

<div class="col-sm-12 no_padding col-xs-12">
<div class="col-sm12 col-xs-12 default_header">
WELCOME TO THE DASHBOARD
</div>
<div class="col-sm-12 no_padding col-xs-12">
  <?php
include "../../../../../connect.php";
include "../../../../../plugins/php_functions/security.php";
$Name="";
   $Company="";
   $Location="";
   $Contact="";
   $interest="";

$learners = mysqli_query($con,"SELECT * FROM e_learning_users");
$alllearners = mysqli_num_rows($learners);
$Modulesd = mysqli_query($con,"SELECT * FROM curriculum_units");
$Modules = mysqli_num_rows($Modulesd);
$adminsd = mysqli_query($con,"SELECT * FROM e_learning_admin");
$alladmins = mysqli_num_rows($adminsd);
$feedback=0;

 $sqlx="SELECT * FROM e_learning_users where status='active'";
 //$sqlx="SELECT * FROM innovations_table";
    $query_runx=mysqli_query($con,$sqlx) or die($query_runx."<br/><br/>".mysqli_error($con));

    while($row=mysqli_fetch_array($query_runx)){
        $userid=$row['id'];
        for($d=1;$d<=7;$d++){
          
            $get_partic=mysqli_query($con,"SELECT * FROM curriculum_test where unit_id ='$d' and type='feedback'") or die(mysqli_error($con));
                        $partic=mysqli_fetch_assoc($get_partic);
                        if($partic){
                      $test_id=$partic['id'];

                        }else{
                       $test_id="";
                        }
    $checkExist=mysqli_query($con,"SELECT * FROM curriculum_exam_area where unit_id ='$d' and test_remarks='completed' and user_id='$userid' and test_id='$test_id'") or die(mysqli_error($con));

        if(mysqli_num_rows($checkExist)!=0){
            $feedback++;

        }else{
        }
    }
    }


$header="";
$innovation_count=0;
$role="";
for($div=1;$div<=4;$div++){
  if($div=="1"){
$header="E-learners";
$role="learners";
$innovation_count=number_format($alllearners);
  }else if($div=="2"){
    $role="Administrators";
$header="Administrators";
$innovation_count=number_format($alladmins);
  }else if($div=="3"){
    $role="Modules";
$header="Modules";
$innovation_count=number_format($Modules);
  }else if($div=="4"){
    $role="feedback";
$header="feedback";
$innovation_count=number_format($feedback);
  }else {}
?>
<div class="col-sm-3 col-xs-12 ">
  <div class="col-sm-12 col-xs-12 no_padding data_dvsz" role="<?php echo $role?>">
    <div class="col-sm-12 no_padding col-xs-12 data_outer">
    <div class="col-sm-12 col-xs-12 default_header"><?php echo $header?></div>
    <div class="col-sm-12 col-xs-12 no_padding innovation_data"></div>
    <div class="col-sm-12 col-xs-12 no_padding">
    <div class="col-sm-4 col-xs-4 no_padding">  

    </div>
    <div class="col-sm-4 col-xs-4 no_padding count_holder" id="count_holder"><?php echo $innovation_count?>
    </div>  

    </div>
    <div class="col-sm-12 col-xs-12 no_padding">
    <div class="col-sm-4 col-xs-4 no_padding">  

    </div>
    <div class="col-sm-4 col-xs-4 no_padding ">
    </div>  
       <div class="col-sm-4 col-xs-4 no_padding ">
        <span class="button_viewinno">View </span>
    </div>
    </div>
  </div>
</div>



</div>
<?php
}

  ?>
</div>
<script type="text/javascript">
$('.count_holder').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 3000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});
$(document).ready(function(){
  
   $(".analytics_divs").html("").hide();
   $.get("modules/system/super_admin/pages/Dashboard/analytics.php",function(data){$("#lower_analytics").html(data).show()})
  $(".data_dvsz").click(function(){
    var loader=$("#loader").html()
    var role=$(this).attr("role");
   // alert(role)
    if(role=="feedback"){

     $(".analytics_divs").html("").hide();
     
     $("#"+role).html("Loading content.."+loader).show()

    $.get("modules/system/content_team/pages/feedback/"+role+".php",function(data){
      //alert(data);

      ////$(".data_dvsz").css("box-shadow","2px 2px 2px #ddd");
      //$(this).css("box-shadow","0 0 15px #000")setAttribute("style","box-shadow:0 0 15px #000;background:#fff";
        
      $("#"+role).html(data).show()
    })
    }else if(role=="learners"){


     $(".analytics_divs").html("").hide();
     
     $("#"+role).html("Loading content.."+loader).show()

    $.get("modules/system/content_team/pages/view/view.php",function(data){
      //alert(data);

      ////$(".data_dvsz").css("box-shadow","2px 2px 2px #ddd");
      //$(this).css("box-shadow","0 0 15px #000")setAttribute("style","box-shadow:0 0 15px #000;background:#fff";
        
      $("#"+role).html(data).show()
    })


      
    }
  })
})
</script>
<div class="col-sm-12 col-xs-12 no_padding" id="analytics_base" style="overflow-x: hidden !important;">
<div class="col-sm-12 col-xs-12 analytics_divs" id="lower_analytics" ></div>
<div class="col-sm-12 col-xs-12 analytics_divs not_shown" id="learners"></div>
<div class="col-sm-12 col-xs-12 analytics_divs not_shown" id="feedback"></div>
<div class="col-sm-12 col-xs-12 analytics_divs not_shown" id="Investors"></div>
<div class="col-sm-12 col-xs-12 analytics_divs not_shown" id="external_users"></div>
</div>
</div>